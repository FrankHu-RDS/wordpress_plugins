<?php
	
// Add new classes to body
function dtb_body_class( $classes ) {
	
	$dtb_enable_hamburger_icon_val = dtb_get_option('dtb_enable_hamburger_icon');
	$dtb_hamburger_icon_val = dtb_get_option('dtb_hamburger_icon');
	if ($dtb_enable_hamburger_icon_val != '') {
		$classes[] = 'hamburger_'.$dtb_hamburger_icon_val.' custom_hamburger_icon';
	}
	$dtb_mobile_enable_val = dtb_get_option('dtb_mobile_enable');
	$dtb_mobile_menu_style = get_option('dtb_customize_mobile_menu_style');
	if ($dtb_mobile_enable_val != '') {
		$classes[] = 'dtb_mobile dtb_mobile_'.$dtb_mobile_menu_style.'';
	}	
	
	$dtb_sidebar_archive = dtb_get_option('dtb_sidebar_archive');
	if (( $dtb_sidebar_archive != '') && ((is_archive()) || (is_home()) || (is_search()))) {
		if (in_array('et_right_sidebar', $classes)) {
			unset( $classes[array_search('et_right_sidebar', $classes)] );
		}
		$classes[] = 'et_no_sidebar dtb_no_sidebar';
	}
	
	$dtb_post_sidebar_layout = dtb_get_option('dtb_post_sidebar_layout');
	if (( $dtb_post_sidebar_layout == 'fullwidth') && ( is_single() && 'post' == get_post_type() )) {
		$classes[] = 'et_no_sidebar dtb_no_sidebar';
		foreach ( $classes as $key => $value ) {
			if ( $value == 'et_right_sidebar' ) unset( $classes[ $key ] );
		}
	}
	
	if (( $dtb_post_sidebar_layout == 'left') && ( is_single() && 'post' == get_post_type() )) {
		$classes[] = 'et_left_sidebar';
		foreach ( $classes as $key => $value ) {
			if ( $value == 'et_right_sidebar' ) unset( $classes[ $key ] );
		}
	}
		
	$dtb_blog_layout = dtb_get_option('dtb_blog_layout') ?: 'blog_default';
	if ((is_archive()) || (is_home()) || (is_search())) {
		$classes[] = 'dtb_archives';
	
	}
	$classes[] = 'dtb_'.$dtb_blog_layout.'';
	
	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'dtb_woo';
	}
		
		
	return $classes;
}
add_filter('body_class', 'dtb_body_class', 10, 2 );

// Remove et_right_sidebar class from body
function dtb_body_class_remove( $classes ) {
	$dtb_sidebar_archive = dtb_get_option('dtb_sidebar_archive');
	$dtb_post_sidebar_layout = dtb_get_option('dtb_post_sidebar_layout');
	if ((( $dtb_sidebar_archive != '') && ((is_archive()) || (is_home()) || (is_search()))) || (( $dtb_post_sidebar_layout == 'fullwidth') && ( is_single() && 'post' == get_post_type() )) || (( $dtb_post_sidebar_layout == 'left') && ( is_single() && 'post' == get_post_type() )) ){
		if (in_array('et_right_sidebar', $classes)) {
			unset( $classes[array_search('et_right_sidebar', $classes)] );
		}
	}
	return $classes;
}
add_filter('body_class', 'dtb_body_class_remove', 20, 2 );