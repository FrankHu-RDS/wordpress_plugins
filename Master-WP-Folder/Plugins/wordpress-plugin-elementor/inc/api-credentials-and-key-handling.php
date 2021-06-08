<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_api_credentials($resource = '') {

	$api['key']			= get_option('jis_api_key');
	$api['version']		= get_option('jis_api_version', JIS_API_VERSION);
	$api['protocol']	= get_option('jis_api_protocol', JIS_API_PROTOCOL);
	$api['base_url']	= get_option('jis_api_base_url', JIS_API_BASE_URL);
	$api['auth_url']	= get_option('jis_api_auth_url', JIS_API_AUTH_URL);
	$api['resource']	= $resource;
	$api['url']			= $api['protocol'] . $api['base_url'] . '/' . $api['version'] . '/' . $api['resource'];

	return $api;
}




function lmp_verify_key($key = null) {

	$return = lmp_return_msg_parameters();

	if( $key == null || $key == false || empty($key) ) {
		$return['code']		= 'token_invalid';
		$return['msg_user']	= 'API key missing';
		$return['success']	= false;

		return $return;
	}

	$api = lmp_api_credentials('verify-key');

	$headers	= array(
		'Content-Type'	=> 'application/json',
		'Accept'		=> 'application/json',
		'Authorization'	=> JIS_API_AUTH_HEADER . $key
	);

	$response = wp_remote_request(
		$api['protocol'] . $api['auth_url'] . '/' . $api['version'] . '/' . $api['resource'],
		array(
			'method'	=> 'POST',
			'headers'	=> $headers
		)
	);

	if ( !is_wp_error( $response ) ) {

		$checked_response	= lmp_check_key_response( $response );
		$response_code		= lmp_response_code( $response );

		if( !is_wp_error($checked_response) && array_key_exists('body', $checked_response) ) {

			$body				= json_decode( $checked_response['body'] );
			$return['code']		= 'token_valid';
			$return['msg_user']	= __('Success', 'jumpstory-image-search');
			$return['success']	= true;
		}
		else {

			if( $response_code == 401 ) {
				lmp_remove_key(true);
			}

			$return['msg_user'] = ( $response_code == 401 || $response_code == 402 ) ? $checked_response->get_error_message() : $return['msg_user'];;
			$return['code']		= lmp_token_check_error_codes($checked_response);
			$return['msg_dev']	= array( 'Error returned from verify response check.', $checked_response->get_error_messages() );
			$return['success']	= false;
//			$return['body_code']	= $response_code;
//			$return['api_response']	= $response;
		}
	} else {
//		$return['msg_user'] = $response->get_error_message();
		$return['code']		= lmp_token_check_error_codes($response);
		$return['msg_dev']	= array( 'Error returned from verify API request', $response->get_error_messages() );
		$return['success']	= false;
	}

	return $return;
}




function lmp_ajax_verify_key() {

	$key				= ( isset($_POST['ajax_key_token']) ) ? trim($_POST['ajax_key_token']) : false;
	$verified_return	= lmp_verify_key($key);

	if( $verified_return['success'] === true ) {

		$key_updated		= update_option('jis_api_key', $key);
		$verified_updated	= update_option('jis_api_key_verified', true);

		if( !$key_updated || !$verified_updated ) {
			$verified_return['success']		= false;
			$verified_return['code']		= 'token_local_not_updated';
			$verified_return['msg_user']	= __('Internal error. Key was not saved.', 'jumpstory-image-search');
		}

		$account_info				= lmp_jumpstory_account_info();
		$verified_return['name']	= $account_info['name'];
		$verified_return['email']	= $account_info['email'];
	}

	echo json_encode($verified_return);
	exit();
}
add_action( 'wp_ajax_lmp_verify_key', 'lmp_ajax_verify_key' );




function lmp_remove_key( $remove = false ) {

	$return = lmp_return_msg_parameters();

	if( !$remove ){
		$return['success']	= false;
		$return['code']		= 'token_not_removed';
		$return['msg_user']	= __('The key could not be removed', 'jumpstory-image-search');
		return $return;
	}

	if( $remove ){
		$key_value_updated	= update_option('jis_api_key', null);

		if( $key_value_updated ) {
			update_option('jis_api_key_verified', false);
			$return['success']	= true;
			$return['code']		= 'token_removed';
			$return['msg_user']	= __('The key was removed', 'jumpstory-image-search');
			return $return;
		}
	}

	return $return;
}




function lmp_ajax_remove_key() {

	$remove_key	= ( isset($_POST['ajax_remove_key']) && $_POST['ajax_remove_key'] == true ) ? true : false;
	$return		= lmp_remove_key( $remove_key );

	echo json_encode( $return );
	exit();
}
add_action( 'wp_ajax_lmp_remove_key', 'lmp_ajax_remove_key' );




function lmp_key_values( $return_values = false ) {

	$return 				= lmp_return_msg_parameters();
	$return['key_value']	= null;
	$return['key_verified']	= null;

	if( !$return_values ){
		$return['success']	= false;
		$return['code']		= 'token_values_not_allowed';
//		$return['msg_user']	= __('The key values are not to be returned.', 'jumpstory-image-search');
		return $return;
	}

	if( $return_values ){
		$key_value		= get_option('jis_api_key');
		$key_verified	= get_option('jis_api_key_verified');

		$return['success']		= true;
		$return['code']			= 'token_local_retrived';
		$return['msg_user']		= __('The local key information was retrived', 'jumpstory-image-search');
		$return['key_value']	= $key_value;
		$return['key_verified']	= $key_verified;
	}

	return $return;
}




function lmp_ajax_key_values() {

	$return_values	= ( isset($_POST['ajax_return_values']) && $_POST['ajax_return_values'] == true ) ? true : false;
	$return			= lmp_key_values( $return_values );

	echo json_encode( $return );
	exit();
}
add_action('wp_ajax_lmp_key_values', 'lmp_ajax_key_values');

?>