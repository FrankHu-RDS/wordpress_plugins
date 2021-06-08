<?php

$dtb_m_mobile_elements_cart = dtb_get_option('dtb_m_mobile_elements_cart');

if ($dtb_m_mobile_elements_cart != '') {	
		
	// Mobile Menu Widgets
	$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_shop_link', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_shop_link', array(
		'label' => __( 'Shopping Cart Link', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));

	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_t_sizing', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_shop_link_t_sizing', array(
		'label' => __( 'Shopping Cart Link Sizing', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_shop_link_margin', array(
		'label' => __( 'Shopping Cart Link Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_margin_top', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_margin_bottom', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_padding', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_shop_link_padding', array(
		'label' => __( 'Shopping Cart Link Padding', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_padding_top', array(
		'default' => '15px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_padding_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_padding_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_padding_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_padding_bottom', array(
		'default' => '15px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_padding_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_padding_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_shop_link_padding_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_t_style', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_shop_link_t_style', array(
		'label' => __( 'Shopping Cart Link Style', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_bg_color', array(
		'default' => '#bdc8d5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_link_bg_color', array(
		'label' => __('Link Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_link_bg_color'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_border_radius', array(
		'default' => 3,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_shop_link_border_radius', array(
		'label' => __('Link Border Radius', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_border_width', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_shop_link_border_width', array(
		'label' => __('Link Border Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_border_color', array(
		'default' => 'rgba(0,0,0,0)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_link_border_color', array(
		'label' => __('Link Border Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_link_border_color'
	)));
	
	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_shop_link', array(
		'label' => __( 'Shopping Cart Link Text', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_align', array(
		'default' => 'center',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_shop_link_align', array(
		'label' => __( 'Link Text Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	$wp_customize->add_setting( 'et_divi[m_m_shop_link_font]', array(
		'default'		=> '',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'et_sanitize_font_choices',
	));
	$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[m_m_shop_link_font]', array(
		'label'		=> esc_html__( 'Link Text Font', 'Divi' ),
		'section'	=> 'dtb_mobile',
		'settings'	=> 'et_divi[m_m_shop_link_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices,
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_font_weight', array(
		'default'       => '600',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_m_m_shop_link_font_weight', array(
		'label'	      => __('Link Text Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_mobile',
		'type'			=> 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_font_size', array(
		'default' => 15,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_shop_link_font_size', array(
		'label' => __( 'Link Text Font Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_lettersp', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_shop_link_lettersp', array(
		'label' => __( 'Link Text Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_shop_link_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_shop_link_tt', array(
		'label' => __( 'Link Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_color', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_link_color', array(
		'label' => __('Link Text Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_link_color'
	)));

	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_icon', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_shop_icon', array(
		'label' => __( 'Shopping Cart Link Icon', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_icon_color', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_icon_color', array(
		'label' => __('Link Icon Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_icon_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_icon_size', array(
		'default' => 15,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_shop_link_icon_size', array(
		'label' => __( 'Link Icon Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_hover', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_shop_hover', array(
		'label' => __( 'Shopping Cart Hover Styles', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_bg_color_hover', array(
		'default' => '#00b5cf',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_bg_color_hover', array(
		'label' => __('Link Background Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_bg_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_border_color_hover', array(
		'default' => 'rgba(0,0,0,0)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_border_color_hover', array(
		'label' => __('Link Border Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_border_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_link_color_hover', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_link_color_hover', array(
		'label' => __('Link Text Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_link_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_shop_icon_color_hover', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_shop_icon_color_hover', array(
		'label' => __('Link Icon Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_shop_icon_color_hover'
	)));
	
}