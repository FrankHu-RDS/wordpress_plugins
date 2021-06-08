<?php
	$dtb_login_link_type_val = dtb_get_option('dtb_login_link_type') ?: 'no_url';
	
	if ($dtb_login_link_type_val == 'home_url') {
		
		function dtb_login_headerurl( $url ) {
			return esc_url( home_url( '/' ) );
		}
		add_filter( 'login_headerurl', 'dtb_login_headerurl' );
		function dtb_login_headertitle( $title ) {
			return get_bloginfo ( 'name' ) . ' – ' . get_bloginfo ( 'description' );
		}
		add_filter( 'login_headertext', 'dtb_login_headertitle' );	
		
	}
	
	if ($dtb_login_link_type_val == 'other_url') {
	
		function dtb_login_headerurl( $url ) {
			$dtb_login_link_val = dtb_get_option('dtb_login_link');
			return esc_url( $dtb_login_link_val );
		}
		add_filter( 'login_headerurl', 'dtb_login_headerurl' );
		function dtb_login_headertitle( $title ) {
			return '';
		}
		add_filter( 'login_headertext', 'dtb_login_headertitle' );	
	
		
	}