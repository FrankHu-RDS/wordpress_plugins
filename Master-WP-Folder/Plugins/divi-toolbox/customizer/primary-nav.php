<?php
if ( ($dtb_menu_type == 'none') || ($dtb_menu_type == 'menu1') || ($dtb_menu_type == 'menu2') || ($dtb_menu_type == 'menu3') || ($dtb_menu_type == 'menu4') ) {
	$wp_customize->add_setting( 'dtb_customize_title_primary_nav', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_primary_nav', array(
		'label' => __( 'Primary Navigation (Menu)', 'divi-toolbox' ),
		'section' => 'dtb_header'
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_font_weight', array(
		'default'       => '400',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_main_nav_font_weight', array(
		'label'	      => __('Links Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_header',
		'type'			=> 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_modcustomize_main_nav_font_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_main_nav_font_tt', array(
		'label' => __( 'Links Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_header',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_col_hover', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_main_nav_col_hover', array(
		'label' => __('Links Hover Color', 'divi-toolbox'),
		'section' => 'dtb_header',
		'settings' => 'dtb_customize_main_nav_col_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_fixed_col_hover', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_main_nav_fixed_col_hover', array(
		'label' => __('Links Hover Color on Fixed Nav', 'divi-toolbox'),
		'section' => 'dtb_header',
		'settings' => 'dtb_customize_main_nav_fixed_col_hover'
	)));
}

if (($dtb_menu_type == 'menu1') || ($dtb_menu_type == 'menu2') || ($dtb_menu_type == 'menu3')) {
	$wp_customize->add_setting( 'dtb_customize_main_nav_line_color', array(
		'default' => '#00B5CF',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_main_nav_line_color', array(
		'label' => __('Underline (Brackets) Color'),
		'section' => 'dtb_header',
		'settings' => 'dtb_customize_main_nav_line_color'
	)));
}

if (($dtb_menu_type == 'menu1') || ($dtb_menu_type == 'menu2')) {
	$wp_customize->add_setting( 'dtb_customize_main_nav_line_height', array(
		'default' => 3,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_line_height', array(
		'label' => __('Underline Height (px)', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_line_width', array(
		'default' => 100,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_line_width', array(
		'label' => __('Underline Width (%)', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_line_radius', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_line_radius', array(
		'label' => __('Underline Border Radius', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_line_offset', array(
		'default' => 20,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_line_offset', array(
		'label' => __('Underline Offset', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -50,
			'max'  => 100,
			'step' => 1
		)
	)));
}
if ($dtb_menu_type == 'menu4') {
	$wp_customize->add_setting( 'dtb_customize_main_nav_bg_color', array(
		'default' => 'rgba(189,200,213,0.2)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_main_nav_bg_color', array(
		'label' => __('Links Background Color', 'divi-toolbox'),
		'section' => 'dtb_header',
		'settings' => 'dtb_customize_main_nav_bg_color'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_main_nav_border_radius', array(
		'default' => 3,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_border_radius', array(
		'label' => __('Links Border Radius', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_main_nav_padding', array(
		'default' => 8,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_nav_padding', array(
		'label' => __('Links Padding', 'divi-toolbox'),
		'section' => 'dtb_header',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		)
	)));
}

if (($dtb_menu_type == 'menu1') || ($dtb_menu_type == 'menu2') || ($dtb_menu_type == 'menu3') || ($dtb_menu_type == 'menu4')) {
	$wp_customize->add_setting( 'dtb_modcustomize_main_nav_hover_active', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_main_nav_hover_active', array(
	    'label' => __('Keep the hover style on active item','divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_header'
	));
	$wp_customize->add_setting( 'dtb_modcustomize_main_nav_submenu_active', array(
		'default' => '1',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_main_nav_submenu_active', array(
	    'label' => __('Disable hover on parent menu items','divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_header'
	));

}