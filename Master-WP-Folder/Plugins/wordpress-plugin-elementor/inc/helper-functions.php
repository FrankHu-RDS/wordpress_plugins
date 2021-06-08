<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');




function lmp_old_value($inputname = false, $default = '') {

	if( !$inputname )
		return '';

	$old_value	= ( isset($_POST[$inputname]) && !empty($_POST[$inputname]) ) ? $_POST[$inputname] : false;

	return ( $old_value ) ? $old_value : $default;
}




function lmp_loader_elements( $css_class = 'loading' ) {

	ob_start();
		echo '<div class="' . $css_class . '">';
			echo '<div class="lds-grid"><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div></div>';
		echo '</div>';
		$output	= ob_get_contents();
	ob_end_clean();

	return $output;
}




function lmp_ajax_loader_elements() {

	$classname	= ( isset($_POST['ajax_classname']) && !empty($_POST['ajax_classname']) ) ? $_POST['ajax_classname'] : null;

	echo lmp_loader_elements( $classname );
	exit();
}

add_action( 'wp_ajax_lmp_loader_elements', 'lmp_ajax_loader_elements' );




function lmp_return_msg_parameters() {
	return array(
		'success'	=> false,
		'code'		=> null,
		'msg_user'	=> __('An error has occurred.', 'jumpstory-image-search'),
		'msg_dev'	=> '',
		'url'		=> ''
	);
}



function lmp_response_code( $response = false ) {

	$code = ( is_array($response) && isset($response['response']) && isset($response['response']['code']) ) ? $response['response']['code'] : false;
	return $code;
}
?>