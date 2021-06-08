<?php

$dtb_m_mobile_elements_search = dtb_get_option('dtb_m_mobile_elements_search');

if ($dtb_m_mobile_elements_search != '') {	
		
	// Mobile Menu Search Bar
	$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_search', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_search', array(
		'label' => __( 'Mobile Menu Search Bar', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_place', array(
		'default' => 'before',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_m_m_search_place', array(
		'label' => __('Search Bar Placement', 'divi-toolbox'),
		'type' => 'radio',
		'section' => 'dtb_mobile',
		'choices' => array(
			'before'   => 'Before Mobile Navigation',
			'after'      => 'After Mobile Navigation'
		)
	));

	$wp_customize->add_setting( 'dtb_customize_m_m_search_size', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_search_size', array(
		'label' => __( 'Mobile Menu Search Bar Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_width', array(
		'default' => 300,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_width', array(
		'label' => __('Search Bar Width (px)', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_max_width', array(
		'default' => 100,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_max_width', array(
		'label' => __('Search Bar Max Width (%)', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_align_t', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_search_align_t', array(
		'label' => __( 'Search Bar Position', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_align', array(
		'default' => 'left',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_search_align', array(
		'label' => __( 'Search Bar Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	
	
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_search_margin', array(
		'label' => __( 'Search Container Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_margin_top', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_search_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_search_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_margin_bottom', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_search_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_search_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_input', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_m_m_search_input', array(
		'label' => __( 'Search Input Field', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));	
	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_bg_color', array(
		'default' => 'rgba(189,200,213,0.5)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_bg_color', array(
		'label' => __('Search Field Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_bg_color'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_padding_vert', array(
		'default' => 10,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_padding_vert', array(
		'label' => __('Search Field Vertical Padding ↕', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));$wp_customize->add_setting( 'dtb_customize_m_m_search_padding_hor', array(
		'default' => 15,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_padding_hor', array(
		'label' => __('Search Field Horizontal Padding ↔', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_field_font', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_m_m_search_field_font', array(
		'label' => __( 'Search Input Field Font', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'et_divi[m_m_search_font]', array(
		'default'		=> '',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'et_sanitize_font_choices',
	));
	$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[m_m_search_font]', array(
		'label'		=> esc_html__( 'Search Field Font', 'Divi' ),
		'section'	=> 'dtb_mobile',
		'settings'	=> 'et_divi[m_m_search_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices,
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_font_weight', array(
		'default'       => '400',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_m_m_search_font_weight', array(
		'label'	      => __('Search Field Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_mobile',
		'type'			=> 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_font_size', array(
		'default' => 14,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_font_size', array(
		'label' => __( 'Search Field Font Size', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_lettersp', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_lettersp', array(
		'label' => __( 'Search Field Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_search_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_search_tt', array(
		'label' => __( 'Search Field Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_font_color_placeholder', array(
		'default' => '#666',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_font_color_placeholder', array(
		'label' => __('Search Field Font Color (placeholder)', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_font_color'
	)));


	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_border', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_m_m_search_border', array(
		'label' => __( 'Search Input Field Border', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));

	$wp_customize->add_setting( 'dtb_customize_m_m_search_border_radius', array(
		'default' => 3,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_border_radius', array(
		'label' => __('Search Field Border Radius', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_border_width', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_search_border_width', array(
		'label' => __('Search Field Border Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_border_color', array(
		'default' => 'rgba(0,0,0,0)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_border_color', array(
		'label' => __('Search Field Border Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_border_color'
	)));

	
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_focus', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_m_m_search_focus', array(
		'label' => __( 'Input Field on Focus, Active Field', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));	
	$wp_customize->add_setting( 'dtb_customize_m_m_search_border_color_focus', array(
		'default' => 'rgba(0,0,0,0)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_border_color_focus', array(
		'label' => __('Active Field Border Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_border_color_focus'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_search_bg_color_focus', array(
		'default' => 'rgba(189,200,213,0.8)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_bg_color_focus', array(
		'label' => __('Active Field Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_bg_color_focus'
	)));

	$wp_customize->add_setting( 'dtb_customize_m_m_search_font_color', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_search_font_color', array(
		'label' => __('Active Field Font Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_search_font_color'
	)));
	
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_m_m_search_icon', array(
		'label' => __( 'Search Icon Style', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_font', array(
		'default' => 18,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_title_m_m_search_icon_font', array(
		'label' => __('Search Icon Font Size', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_font_color', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_title_m_m_search_icon_font_color', array(
		'label' => __('Search Icon Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_title_m_m_search_icon_font_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_bg_color', array(
		'default' => 'rgba(0,0,0,0)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_title_m_m_search_icon_bg_color', array(
		'label' => __('Search Icon Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_title_m_m_search_icon_bg_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_padding', array(
		'default' => 10,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_title_m_m_search_icon_padding', array(
		'label' => __( 'Search Icon Padding', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_border_radius', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_title_m_m_search_icon_border_radius', array(
		'label' => __( 'Search Icon Border Radius', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_customize_title_m_m_search_icon_margin', array(
		'default' => -40,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_title_m_m_search_icon_margin', array(
		'label' => __( 'Search Icon Left Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -40,
			'max'  => 50,
			'step' => 1
		)
	)));

	
} // end if logo