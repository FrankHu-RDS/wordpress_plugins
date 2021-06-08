<?php
	
function dtb_add_custom_m_menu() {

	$dtb_custom_m_menu_val = dtb_get_option('dtb_custom_m_menu');
	$dtb_m_m_overlay = get_theme_mod('dtb_modcustomize_m_m_dim_background');
	$dtb_m_mobile_elements_logo = dtb_get_option('dtb_m_mobile_elements_logo');
	$dtb_m_mobile_elements_social = dtb_get_option('dtb_m_mobile_elements_social');
	$dtb_m_mobile_elements_cart = dtb_get_option('dtb_m_mobile_elements_cart');
	$dtb_mobile_logo = dtb_get_option('dtb_mobile_logo');
	$dtb_mobile_logo_url = dtb_get_option('dtb_mobile_logo_url');
	$dtb_customize_m_m_search_place = get_option('dtb_customize_m_m_search_place', 'before');
	$m_mobile_trigger = dtb_get_option('dtb_m_mobile_trigger');
	
	
	function dtb_print_search_bar() {
		$dtb_m_mobile_elements_search = dtb_get_option('dtb_m_mobile_elements_search');
		if ( $dtb_m_mobile_elements_search != '') {
		?>
		<div class="dtb-m-search-wrap">
			<div class="dtb-m-search">
				<form role="search" method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
						printf( '<input type="search" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
							esc_attr__( 'Search&hellip;', 'Divi' ),
							get_search_query(),
							esc_attr__( 'Search for:', 'Divi' )
						);
						do_action( 'et_search_form_fields' );
					?>
					<button type="submit" id="searchsubmit_header"></button>
				</form>
			</div>
		</div>
		<?php
		}
	}
	
	
	
	if ( $dtb_m_m_overlay != ''){ ?>
		<div class="dtb-m-menu-overlay"></div>
	<?php }
	if ( $m_mobile_trigger != ''){ ?>
		<div class="dtb-m-menu-trigger">
			<div class="mobile_menu_bar mobile_menu_bar_toggle"></div>
		</div>
	<?php } ?>
	
	<div id="dtb-m-menu" class="dtb-out">
	<div class="menu-wrapper">
	
	<?php
	if ( $dtb_m_mobile_elements_logo != '') {
		
		if (($dtb_mobile_logo == '') || (($dtb_mobile_logo != '') && ($dtb_mobile_logo_url == ''))){ 
			$dtb_m_logo_img = ( $divi_user_logo = et_get_option( 'divi_logo' ) ) && ! empty( $divi_user_logo ) ? $divi_user_logo : get_template_directory_uri() . '/images/logo.png';
		}
		if (($dtb_mobile_logo != '') && ($dtb_mobile_logo_url != '')) {
			$dtb_m_logo_img = $dtb_mobile_logo_url;
		}
	?>
		<div class="dtb-m-logo-wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $dtb_m_logo_img ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="dtb-m-logo"/></a>
		</div>
	<?php
	} 
	
	if ($dtb_customize_m_m_search_place == 'before') {
		dtb_print_search_bar();
	}
	
	
	 
	if ( $dtb_m_mobile_elements_cart != '') {
	et_show_cart_total();	
	
	}
	


	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Before Mobile Menu") ) : endif;


	echo '<div class="nav-wrapper">';
	if ( $dtb_custom_m_menu_val != ''){
		wp_nav_menu(array(
			'container' => 'ul',
			'menu_class' => 'dtb-mobile-menu',
			'menu' => $dtb_custom_m_menu_val
		));
	}
	else {
		wp_nav_menu(array(
			'container' => 'ul',
			'menu_class' => 'dtb-mobile-menu',
			'theme_location' => 'primary-menu'
		));
	}
	echo '</div>';
	
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("After Mobile Menu") ) : endif;
	
	
	if ( ($dtb_m_mobile_elements_social == '1')){
		get_template_part( 'includes/social_icons', 'header' );
	}
	
	
	if ($dtb_customize_m_m_search_place == 'after') {
		dtb_print_search_bar();
	}
	
	
	echo '</div></div>';
}

add_action('wp_footer', 'dtb_add_custom_m_menu');


/* Register Widget Areas */
$dtb_m_mobile_elements_widgets = dtb_get_option('dtb_m_mobile_elements_widgets');
if ($dtb_m_mobile_elements_widgets != '') {
	function dtb_register_mobile_menu_widget() {
		register_sidebar(array(
			'name' => 'Before Mobile Menu',
			'id' => 'dtb-before-mobile-menu',
			'before_widget' => '<div id="%1$s" class="dtb-m-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => 'After Mobile Menu',
			'id' => 'dtb-after-mobile-menu',
			'before_widget' => '<div id="%1$s" class="dtb-m-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
	}
	add_action('widgets_init', 'dtb_register_mobile_menu_widget');
}