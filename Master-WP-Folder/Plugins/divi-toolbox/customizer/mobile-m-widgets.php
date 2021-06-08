<?php

$dtb_m_mobile_elements_widgets = dtb_get_option('dtb_m_mobile_elements_widgets', '');

if ($dtb_m_mobile_elements_widgets != '') {	
		
	// Mobile Menu Widgets
	$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_widgets', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_widgets', array(
		'label' => __( 'Mobile Menu Widgets', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));

	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_container', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_widgets_container', array(
		'label' => __( 'Mobile Menu Widgets Container', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_widgets_margin', array(
		'label' => __( 'Widget Container Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_margin_top', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_widgets_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_widgets_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_margin_bottom', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_widgets_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_widgets_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));

	
	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_title', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_widgets_title', array(
		'label' => __( 'Mobile Menu Widgets Title', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_title_align', array(
		'default' => 'left',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_widgets_title_align', array(
		'label' => __( 'Widget Title Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	$wp_customize->add_setting( 'et_divi[m_m_widgets_title_font]', array(
		'default'		=> '',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'et_sanitize_font_choices',
	));
	$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[m_m_widgets_title_font]', array(
		'label'		=> esc_html__( 'Widget Title Font', 'Divi' ),
		'section'	=> 'dtb_mobile',
		'settings'	=> 'et_divi[m_m_widgets_title_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices,
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_title_font_weight', array(
		'default'       => '700',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_m_m_widgets_title_font_weight', array(
		'label'	      => __('Widget Title Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_mobile',
		'type'			=> 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_title_font_size', array(
		'default' => 17,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_widgets_title_font_size', array(
		'label' => __( 'Widget Title Font Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_title_lettersp', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_widgets_title_lettersp', array(
		'label' => __( 'Widget Title Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_widgets_title_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_widgets_title_tt', array(
		'label' => __( 'Widget Title Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_widgets_title_color', array(
		'default' => '#666666',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_widgets_title_color', array(
		'label' => __('Widget Title Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_widgets_title_color'
	)));


	
} 
