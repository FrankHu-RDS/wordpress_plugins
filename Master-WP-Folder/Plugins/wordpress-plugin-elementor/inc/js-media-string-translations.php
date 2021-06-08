<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



// in js: wp.media.view.l10n.
function lmp_jis_js_media_string_translations($strings,  $post){

	$jis_allowed_html	= array(
		'a' => array(
			'href'		=> array(),
			'target'	=> array(),
			'class'		=> array()
		),
		'br' => array()
	);

	$strings['jisVerifyKeyTitle']		= __('Connect to JumpStory', 'jumpstory-image-search');
	$strings['jisVerifyKeyPlaceholder']	= __('Enter API key here', 'jumpstory-image-search');
	$strings['jisSubmitBtn']			= __('Verify key', 'jumpstory-image-search');
	$strings['jisKeyLabel']				= __('API key', 'jumpstory-image-search');
	$strings['jisVerificationLabel']	= __('Key verification', 'jumpstory-image-search');
	$strings['jisKeyIsValid']			= __('Key is valid.', 'jumpstory_image_search');
	$strings['jisKeyIsInvalid']			= __('Key is invalid.', 'jumpstory_image_search');
	$strings['jisValidateSuccess']		= __('You can close this window and proceed to download.', 'jumpstory_image_search');
	$strings['jisValidationInProgress']	= __('... Checking key', 'jumpstory_image_search');
	$strings['jisLogout']				= __('Log out', 'jumpstory-image-search');
	$strings['jisConnectBtn']			= __('Connect to JumpStory', 'jumpstory-image-search');

	$strings['jisCreateAccountText']	= sprintf(
		wp_kses(
			__( 'If you don’t have a JumpStory account, you can create a free <a href="%s" target="_blank" class="jis_key_modal__anchor">trial account here</a>.', 'jumpstory-image-search' ),
			$jis_allowed_html
		),
		esc_url( JIS_CREATE_ACCOUNT_URL )
	);


	$strings['jisDescription']			= wp_kses(
		__('In order to download and use images from our mediaservice, you\'ll need to connect your JumpStory account. <br />To connect your account insert your API key and click the verify button.', 'jumpstory-image-search'),
		$jis_allowed_html
	);


	$strings['jisCreateKeyText']	= sprintf(
		wp_kses(
			__( 'You can create a key on your <a href="%s" target="_blank" class="jis_key_modal__anchor">JumpStory account</a>.', 'jumpstory-image-search' ),
			$jis_allowed_html
		),
		esc_url( JIS_CREATE_KEY_URL )
	);

    return $strings;
}

add_filter('media_view_strings', 'lmp_jis_js_media_string_translations', 10, 2);

?>