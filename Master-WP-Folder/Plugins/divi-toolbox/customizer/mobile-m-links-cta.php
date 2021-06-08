<?php
if ($dtb_cta_link == '1') { 
	$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_cta', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_cta', array(
		'label' => __( 'Mobile Menu Call To Action Button', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_title_cta_button', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_cta_button', array(
		'label' => __( 'Mobile CTA Button Sizing', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_fullwidth', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_m_m_cta_fullwidth', array(
	    'label' => __('CTA Button Full-width', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_mobile'
	));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_align', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_cta_align', array(
		'label' => __( 'Button Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_cta_margin', array(
		'label' => __( 'Mobile CTA Button Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_margin_top', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_margin_bottom', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_padding', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_cta_padding', array(
		'label' => __( 'Mobile CTA Button Padding', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_padding_top', array(
		'default' => '15px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_padding_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_padding_right', array(
		'default' => '25px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_padding_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_padding_bottom', array(
		'default' => '15px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_padding_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_padding_left', array(
		'default' => '25px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_cta_padding_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	
	$wp_customize->add_setting( 'dtb_customize_m_m_t_cta_style', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_cta_style', array(
		'label' => __( 'Mobile CTA Button Font Style', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'et_divi[mobile_cta_font]', array(
		'default'		=> '',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'et_sanitize_font_choices',
	));
	$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[mobile_cta_font]', array(
		'label'		=> esc_html__( 'Mobile CTA Button Font', 'Divi' ),
		'section'	=> 'dtb_mobile',
		'settings'	=> 'et_divi[mobile_cta_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices,
	)));
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_font_weight', array(
		'default'       => '700',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_mobile_cta_font_weight', array(
		'label'	      => __('CTA Item Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_mobile',
		'type'			=> 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_font_size', array(
		'default' => 15,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_cta_font_size', array(
		'label' => __('CTA Item Font Size', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		)
	)));	
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_lettersp', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_cta_lettersp', array(
		'label' => __( 'CTA Item Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_mobile_cta_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_mobile_cta_tt', array(
		'label' => __( 'CTA Item Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_transform
	)));	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_text_align', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_cta_text_align', array(
		'label' => __( 'Button Text Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	
	$wp_customize->add_setting( 'dtb_customize_m_m_t_cta_colors', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_cta_colors', array(
		'label' => __( 'Mobile CTA Button Colors', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_color', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_cta_color', array(
		'label' => __('Mobile CTA Font Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_mobile_cta_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_bg_color', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_cta_bg_color', array(
		'label' => __('Mobile CTA Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_mobile_cta_bg_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_color_hover', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_cta_color_hover', array(
		'label' => __('Mobile CTA Font Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_mobile_cta_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_mobile_cta_bg_color_hover', array(
		'default' => '#ffffff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_cta_bg_color_hover', array(
		'label' => __('Mobile CTA Background Color on Hover', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_mobile_cta_bg_color_hover'
	)));
	
	
	$wp_customize->add_setting( 'dtb_customize_m_m_t_cta_border', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_cta_border', array(
		'label' => __( 'Mobile CTA Button Border', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));

	$wp_customize->add_setting( 'dtb_customize_m_m_cta_border_width', array(
		'default' => 2,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_cta_border_width', array(
		'label' => __('Mobile CTA Border Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_border_radius', array(
		'default' => 5,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_cta_border_radius', array(
		'label' => __('Mobile CTA Border Radius', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_border_color', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_cta_border_color', array(
		'label' => __('Mobile CTA Border Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_cta_border_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_border_color_hover', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_cta_border_color_hover', array(
		'label' => __('Mobile CTA Border Color on hover', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_cta_border_color_hover'
	)));
	
	
	$wp_customize->add_setting( 'dtb_customize_m_m_t_cta_shadow', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_cta_shadow', array(
		'label' => __( 'Mobile CTA Button Shadow', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_cta_shadow', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_m_m_cta_shadow', array(
	    'label' => __('Add Button Shadow', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_mobile'
	));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_shadow_color', array(
		'default' => 'rgba(0,0,0,0.15)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_cta_shadow_color', array(
		'label' => __('Mobile CTA Button Shadow Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_m_m_cta_shadow_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_shadow_offset_x', array(
		'default' => 2,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_cta_shadow_offset_x', array(
		'label' => __('Mobile CTA Button Shadow Offset-X', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_shadow_offset_y', array(
		'default' => 10,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_cta_shadow_offset_y', array(
		'label' => __('Mobile CTA Button Shadow Offset-Y', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_m_m_cta_shadow_blur', array(
		'default' => 30,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_cta_shadow_blur', array(
		'label' => __('Mobile CTA Button Shadow Blur', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	
	
} // endif cta button 