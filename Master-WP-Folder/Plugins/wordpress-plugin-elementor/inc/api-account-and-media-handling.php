<?php

if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');




function lmp_jumpstory_account_info() {

	$key			= get_option('jis_api_key');
	$key_verified	= get_option('jis_api_key_verified');
	$return			= lmp_return_msg_parameters();

	if( $key_verified && !empty($key) ) {
		list(, $payload, )	= explode('.', $key);
		$account_info		= json_decode(base64_decode($payload));

		$return['success']	= true;
		$return['code']		= 'account_info_key_valid';
		$return['name']		= $account_info->data->user->display_name;
		$return['email']	= $account_info->data->user->user_email;
	}
	else {
		$return['success']	= false;
		$return['code']		= 'token_not_verified';
	}

	return $return;
}




function lmp_decode_response_body($response = null) {

	$checked_response	= lmp_check_search_response( $response );

	if( !is_wp_error( $checked_response ) ) {
		$body = json_decode( $checked_response['body'] );
		return $body;
	}else {
		return $checked_response;
	}

}




function lmp_search($query = '', $filters = array(), $page = 1 ) {

	$error	= new WP_Error;
	$api	= lmp_api_credentials('public');

	$headers = array(
		'Content-Type'	=> 'application/json',
		'Accept'		=> 'application/json',
	);

	$body = array(
		'query'	=> $query,
		'page'	=> $page
	);

	foreach( $filters as $filter_key => $filter_value ) {
		if( $filter_value == 'all' )
			continue;
		$body[$filter_key] = ( is_array( $filter_value ) ) ? implode(' ', $filter_value) : $filter_value;
	}

	$response = wp_remote_request(
		$api['url'],
		array(
			'method'	=> 'POST',
			'headers'	=> $headers,
			'body'		=> json_encode( $body )
		)
	);

	if ( !is_wp_error( $response ) ) {
		return lmp_decode_response_body($response);
	}
	else {
		return $response;
	}

}




function lmp_ajax_search() {

	$search_term	= ( isset($_POST['ajax_search_term']) ) ? $_POST['ajax_search_term'] : '';
	$filters		= ( isset($_POST['ajax_filters']) && is_array($_POST['ajax_filters']) ) ? $_POST['ajax_filters'] : array();
	$current_page	= ( isset($_POST['ajax_current_page']) ) ? $_POST['ajax_current_page'] : 1;

	$results	= lmp_search( $search_term, $filters, $current_page );

	if(!is_wp_error($results)){
		echo json_encode( $results );
	}
	else {
		echo $results->get_error_message();
	}

	exit();
}
add_action( 'wp_ajax_lmp_search', 'lmp_ajax_search' );




function lmp_ajax_search_results_view() {

	$images	= ( isset($_POST['ajax_images']) ) ? $_POST['ajax_images'] : false;

	echo lmp_search_results_view( $images );
	exit();
}
add_action( 'wp_ajax_lmp_results_view', 'lmp_ajax_search_results_view' );




function lmp_ajax_pagination_view() {

	$current_page	= ( isset($_POST['ajax_current_page']) ) ? $_POST['ajax_current_page'] : 1;
	$filters		= ( isset($_POST['ajax_filters']) && is_array($_POST['ajax_filters']) ) ? $_POST['ajax_filters'] : array();
	$total			= ( isset($_POST['ajax_total']) ) ? $_POST['ajax_total'] : false;

	echo lmp_pagination_view($current_page, $filters, $total);
	exit();
}
add_action( 'wp_ajax_lmp_pagination_view', 'lmp_ajax_pagination_view' );




function lmp_ajax_download_media() {

	$search_term		= ( isset($_POST['ajax_search_term']) ) ? $_POST['ajax_search_term'] : _x('Unknown', 'Media name when downloading', 'jumpstory-image-search');
	$media_type			= ( isset($_POST['ajax_media_type']) ) ? $_POST['ajax_media_type'] : false;
	$media_id			= ( isset($_POST['ajax_media_id']) ) ? $_POST['ajax_media_id'] : false;
	$post_id			= ( isset($_POST['ajax_post_id']) ) ? $_POST['ajax_post_id'] : 0;
	$download_action	= ( isset($_POST['ajax_download_action']) ) ? $_POST['ajax_download_action'] : 'media-library';

	$response 			= lmp_remote_media_url($media_id, $media_type);
	$return				= lmp_return_msg_parameters();


	if ( !is_wp_error( $response ) ) {

		$checked_response	= lmp_check_key_response( $response );
		$response_code		= lmp_response_code($response);

		if( !is_wp_error( $checked_response ) ) {
			$body				= json_decode( $checked_response['body'] );
			$media_title		= $search_term . '_' . $media_id;


            $return = lmp_save_to_media_library( $body->data->resource, $media_title, $post_id );
		}
		else {

			if( $response_code == 401 ) {
				lmp_remove_key(true);
			}

			$return['success']	= false;
			$return['code']		= lmp_token_check_error_codes($checked_response);
			$return['msg_dev']	= array('Error returned from download response check.', $checked_response->get_error_messages());
			$return['msg_user']	= ( $response_code == 401 || $response_code == 402 ) ? $checked_response->get_error_message() : $return['msg_user'];
		}

	} else {
		$return['success']	= false;
		$return['code']		= lmp_token_check_error_codes($response);
		$return['msg_dev']	= array( 'Error returned from download API request', $response->get_error_messages() );
//		$return['msg_user']	= $response->get_error_message();
	}
$return['debug_response'] = $response;

	echo json_encode($return);
	exit();
}
add_action( 'wp_ajax_lmp_download_media', 'lmp_ajax_download_media' );




function lmp_save_to_media_library($url = false, $name = false, $post_id = 0) {

	$return		= lmp_return_msg_parameters();

	if(!$url){
		$return['success']	= false;
		$return['msg_dev']	= __('API media URL is empty.', 'jumpstory-image-search');
		return $return;
	}

	$tmp = download_url( $url );

	if( is_wp_error( $tmp ) ){
		if(file_exists($tmp))
    		unlink($tmp);

		$return['success']	= false;
		$return['msg_dev']	= $tmp->get_error_messages();
		return $return;
	}


	$url_path	= parse_url($url, PHP_URL_PATH);
	$path_array	= explode('.', $url_path);
	$path_ext	= end($path_array);

	$file_array = array(
		'name'		=> ( is_string($name) && is_string($path_ext) ) ? $name . '.' . $path_ext : wp_basename($url),
		'tmp_name'	=> $tmp
	);

	$media_id = media_handle_sideload( $file_array, $post_id);

	if( is_wp_error( $media_id ) ) {
		if(file_exists($tmp))
    		unlink($tmp);

		$return['success']	= false;
		$return['msg_dev']	= $media_id->get_error_messages();
		return $return;
	}


	$media_url = wp_get_attachment_url( $media_id );

	if( $media_url ) {
		$return['success']	= true;
		$return['url']		= $media_url;
		$return['id']		= $media_id;
		$return['msg_user']	= __('File added', 'jumpstory-image-search');
	}else {
		$return['success']	= false;
		$return['msg_dev']	= __('Could not retrive the media/attachment url.', 'jumpstory_image_search');
	}

	if(file_exists($tmp))
		unlink($tmp);

	return $return;
}



/* **
	Returns wp_error on failure. API response on Success.
*/
function lmp_remote_media_url( $media_id = false, $media_type = false ) {

	$error			= new WP_Error();
	$return_error	= lmp_return_msg_parameters();

	$key			= get_option('jis_api_key');
	$key_verified	= get_option('jis_api_key_verified');


	if( !$media_id )
		$error->add('media_id_not_set', 'Media ID is missing.');

	if( !$media_type )
		$error->add('media_type_not_set', 'Media type is not set.');

	if( empty($key) )
		$error->add('api_key_not_set', 'The API key has not been set.');

	if( !$key_verified )
		$error->add('api_key_not_verified', 'The API key is not valid.');



	if( empty($error->get_error_codes()) ) {

		$api		= lmp_api_credentials('download');
		$headers	= array(
			'Content-Type'	=> 'application/json',
			'Accept'		=> 'application/json',
			'Authorization'	=> JIS_API_AUTH_HEADER . $key
		);

		$args = array(
			'resource_id'	=> $media_id,
			'type'			=> $media_type
		);

		$response = wp_remote_request(
			$api['protocol'] . $api['auth_url'] . '/' . $api['version'] . '/' . $api['resource'],
			array(
				'method'	=> 'POST',
				'headers'	=> $headers,
				'body'		=> json_encode( $args )
			)
		);

		return $response;
	} else {
		return $error;
	}
}
?>