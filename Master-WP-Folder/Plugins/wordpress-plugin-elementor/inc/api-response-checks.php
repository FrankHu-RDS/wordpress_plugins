<?php

if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_check_search_response($response) {

	$error = new WP_Error();

	if( !is_array($response) ) {

		$error_data = '';

		if( is_object( $response ) ) {
			$error_data = ( property_exists($response, 'errors') && isset($response->errors['http_request_failed'][0]) ) ? $response->errors['http_request_failed'][0] : json_encode($response);
			$error->add('is_object', 'Search response is an object. Expected an array.', $error_data);
		}

		$error_msg	= __('Request failed. Response is not an array.', 'jumpstory-image-search');
		$error->add('not_array', $error_msg, $error_data);
	}

	if( isset($response['response']) && isset($response['response']['message']) && $response['response']['message'] !== 'OK' ) {

		$format		= __( 'Request failed. Response "not OK". Message: %1$s. Code: %2$s', 'jumpstory-image-search');
		$message	= $response['response']['message'];
		$code		= (isset($response['response']['code'])) ? $response['response']['code'] : __( 'Response code not set', 'jumpstory-image-search' );

		$error_msg	= sprintf( $format, $message, $code );
		$error->add('not_ok', $error_msg, $response);
	}

	if( !empty($error->get_error_codes()) )
		return $error;

	return $response;
}




function lmp_check_key_response($response) {

	$error = new WP_Error();

	$allowed_html	= array(
		'a' => array(
			'href' => array(),
			'target'	=> array(),
			'class'		=> array()
		),
		'br' => array()
	);

	$create_account_url	= esc_url( JIS_CREATE_ACCOUNT_URL );
	$create_key_url		= esc_url( JIS_CREATE_KEY_URL );

	if( !is_array($response) ) {

		$error_data = '';

		if( is_object( $response ) ) {
			$error_data = ( property_exists($response, 'errors') && isset($response->errors['http_request_failed'][0]) ) ? $response->errors['http_request_failed'][0] : json_encode($response);
			$error_msg	= __('Key response is an object. Expected an array.', 'jumpstory-image-search');
			$error->add('is_object', $error_msg, $error_data);
		}

		$error_msg	= __('Request failed. Response is not an array.', 'jumpstory-image-search');
		$error->add('not_array', $error_msg, $error_data);
	}

	if( !isset($response['response']) ) {
		$error_msg	= __('Request failed. Response not set.', 'jumpstory-image-search');
		$error->add('response_not_set', $error_msg, $response);
	}

	if( !isset($response['response']['message']) ) {
		$error_msg	= __('Request failed. Response message not set.', 'jumpstory-image-search');
		$error->add('response_message_not_set', $error_msg, $response);
	}

	if( !isset($response['body']) ) {
		$error_msg	= __('Request failed. Body not set.', 'jumpstory-image-search');
		$error->add('body_not_set', $error_msg, $response);
	}

	if( !empty($error->get_error_codes()) )
		return $error;


	$body = json_decode($response['body']);

	$body_code		= ( isset($body->code) ) ? $body->code : false;
	$body_message	= ( isset($body->message) ) ? $body->message : false;
	$data_status	= ( isset($body->data->status) ) ? $body->data->status : false;

	if( $body_code == 'rest_success' && $data_status == 200 ) {
		return $response;
	}
	elseif( $body_code == 'rest_unauthorized' && $data_status == 401 ) {

		if( $body_message == 'Key already verified' ){
			$error_msg = sprintf(
				wp_kses(
					__( 'Your key has already been verified! Create a new one on your <a href="%s" target="_blank" class="jis_key_modal__anchor jis_key_modal__anchor--notice">JumpStory account.</a>', 'jumpstory-image-search' ),
					$allowed_html
				),
				$create_key_url
			);
			$error->add('token_verified', $error_msg);

		}
		elseif( $body_message == 'Expired token' ) {
			$error_msg = sprintf(
				wp_kses(
					__( 'Your key has expired, go to your <a href="%s" target="_blank" class="jis_key_modal__anchor jis_key_modal__anchor--notice">JumpStory account,</a> and generate a new key.', 'jumpstory-image-search' ),
					$allowed_html
				),
				$create_key_url
			);
			$error->add('token_expired', $error_msg);
		}
		else {
			$error_msg = sprintf(
				wp_kses(
					__( 'Invalid key, please verify that the key matches the one on your <a href="%s" target="_blank" class="jis_key_modal__anchor jis_key_modal__anchor--notice">JumpStory account.</a>', 'jumpstory-image-search' ),
					$allowed_html
				),
				$create_key_url
			);
			$error->add('failed_group_401', $error_msg, $response);
		}
	}
	elseif( $body_code == 'rest_payment_required' && $data_status == 402 ) {
		$error_msg =  sprintf(
			wp_kses(
				__( 'You don\'t have an active subscription, please your information on your <a href="%s" target="_blank" class="jis_key_modal__anchor jis_key_modal__anchor--notice">JumpStory account.</a>', 'jumpstory-image-search' ),
				$allowed_html
			),
			$create_account_url
		);
		$error->add('payment_required', $error_msg);
	}
	elseif( $body_code == 'rest_not_found' && $data_status == 404 ) {
		$error->add('not_found', $body_message);
	}
	elseif( $body_code == 'rest_internal_server_error' && $data_status == 500 ) {
		$error->add('remote_server_processing_error', $body_message);
	}
	else {
		$error_msg = sprintf( __('Request failed. Unknown error. Status: %1$s. Code: %2$s.', 'jumpstory-image-search'), $data_status, $body_code);
		$error->add('unknown_error', $error_msg, $response);
	}

	if( !empty($error->get_error_codes()) )
		return $error;
}




function lmp_token_check_error_codes( $error_obj = false ) {

	if( !$error_obj || !is_object($error_obj) )
		return 'unknown_error';

	$error_codes	= $error_obj->get_error_codes();

	switch (true) {
		case in_array('token_invalid', $error_codes):
			$error_code	= 'token_invalid';
			break;

		case in_array('token_expired', $error_codes):
			$error_code	= 'token_expired';
			break;

		case in_array('api_key_not_verified', $error_codes):
			$error_code	= 'token_invalid';
			break;

		case in_array('api_key_not_set', $error_codes):
			$error_code	= 'token_invalid';
			break;

		default:
			$error_code	= $error_obj->get_error_code();
			break;
	}

	return $error_code;
}
?>