<?php

$dtb_m_mobile_elements_logo = dtb_get_option('dtb_m_mobile_elements_logo');

if ($dtb_m_mobile_elements_logo != '') {	
		
	// Mobile Menu Logo
	$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_logo', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_logo', array(
		'label' => __( 'Mobile Menu Logo', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_logo_size', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_logo_size', array(
		'label' => __( 'Mobile Menu Logo Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_logo_width', array(
		'default' => 100,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_logo_width', array(
		'label' => __('Logo Image Width (px)', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 300,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_logo_max_width', array(
		'default' => 50,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_logo_max_width', array(
		'label' => __('Logo Image Max Width (%)', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_logo_align_t', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_logo_align_t', array(
		'label' => __( 'Logo Image Position', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_align', array(
		'default' => 'left',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_logo_align', array(
		'label' => __( 'Logo Image Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	
	
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_logo_margin', array(
		'label' => __( 'Logo Image Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_margin_top', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_logo_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_logo_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_margin_bottom', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_logo_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_logo_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_logo_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	
	
} // end if logo