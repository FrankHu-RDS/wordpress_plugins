<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_jis_register_settings() {


	// --- Register settings --- //

	register_setting(
		'jis_api_connection',
		'jis_api_key',
		array(
			'type'				=> 'string',
			'description'		=> __('Set API key from your Jumpstory account.', 'jumpstory-image-search'),
			'default'			=> null,
			'sanitize_callback'	=> 'lmp_sanitize_api_key'
		)
	);

	register_setting(
		'jis_api_connection',
		'jis_api_key_verified',
		array(
			'type'				=> 'boolean',
			'description'		=> __('True when key has been verified.', 'jumpstory-image-search'),
			'default'			=> null
		)
	);




	// --- Fields --- //

	add_settings_field(
		'jis_api_key',
		__('API Key', 'jumpstory-image-search'),
		'jis_api_key_field_view',
		'jis_api_connection',
		'jis_api_user_settings',
		array(
			'label_for'	=> 'jis-key-input',
			'class'		=> 'jis_key_input'
		)
	);

	add_settings_field(
		'jis_api_key_verified',
		__('Key verification', 'jumpstory-image-search'),
		'jis_api_key_verified_field_view',
		'jis_api_connection',
		'jis_api_user_settings',
		array(
			'class'		=> 'jis_key_verification'
		)
	);




	// --- Sections --- //

	add_settings_section(
		'jis_api_user_settings',
		'User specific API settings',
		'jis_api_user_settings_view',
		'jis_api_connection'
	);

} // END lmp_jis_register_settings()
add_action('admin_init', 'lmp_jis_register_settings');



function lmp_sanitize_api_key( $key ) {

	if($key == null || empty($key) ) {
		$type		= 'error';
		$message	= __('API key is required.', 'jumpstory-image-search');

		add_settings_error(
			'jis_api_key',
			esc_attr( 'jis-key-input' ),
			$message,
			$type
		);
	}else{
		$key		= trim($key);

		$old_key	= get_option('jis_api_key');
		if( $old_key !== $key ) {
			$response = lmp_verify_key( $key );
			if( isset($response['success']) && $response['success'] === true && isset($response['code']) && $response['code'] == 'token_valid' ) {
				update_option('jis_api_key_verified', true);
			}
		}
	}
	return $key;
}



function jis_api_key_field_view() {
	$option_name	= 'jis_api_key';
    $key_option		= get_option($option_name);
	$key			= ( isset($key_option) && !empty($key_option) ? $key_option : '' );
	$error_key		= get_settings_errors($option_name);
	$error_verified	= get_settings_errors('jis_api_key_verified');
	$css_class_list	= array('regular-text', 'jis_form__input');
	$is_error		= null;

	if( !empty($error_key) && array_key_exists('type', $error_key[0]) && $error_key[0]['type'] == 'error'
		||
		!empty($error_verified) && array_key_exists('type', $error_verified[0]) && $error_verified[0]['type'] == 'error'
	) {
		array_push($css_class_list, 'jis_form__input--error');
		$is_error = true;
	}

	$classname	= implode(' ', $css_class_list);

	if($is_error)
		echo '<div class="jis_form__error">';

	echo '<input type="text" id="jis-key-input" class="' . $classname . '" name="' . $option_name . '" value="' . $key . '">';

	if($is_error)
		echo '</div>';
}


function jis_api_key_verified_field_view() {
	$option_name	= 'jis_api_key_verified';
    $stored_value	= get_option($option_name);
	$key_verified	= ( isset($stored_value) && !empty($stored_value) ? $stored_value : false );
	$api_key		= get_option('jis_api_key');

	if( $key_verified ) {
		echo '<div class="jis_key_verification jis_key_verification--verified">';
			_e('Key is valid.', 'jumpstory-image-search');
		echo '</div>';
	}
	elseif( !$key_verified && empty($api_key) ) {
		echo '<div class="jis_key_verification jis_key_verification--empty">';
			echo '<p>';
				wp_kses(
					_e('Paste in the key and click <em>Save settings</em> to verify.', 'jumpstory-image-search'),
					array('em' => array() )
				);
			echo '</p>';
		echo '</div>';
	}
	else {
		echo '<div class="jis_key_verification jis_key_verification--not-verified">';
			echo '<p><strong>';
				_e('Key not valid!', 'jumpstory-image-search');
			echo '</strong></p>';
			echo '<p>';
				wp_kses(
					_e('Check the key and click <em>Save settings</em> to verify any key changes.', 'jumpstory-image-search'),
					array('em' => array() )
				);
			echo '</p>';
		echo '</div>';
	}
}



function jis_admin_notices() {
	settings_errors('jis_api_key');
	settings_errors('jis_api_key_verified');
}
add_action( 'admin_notices', 'jis_admin_notices' );
?>