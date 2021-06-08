<?php
	

if ((($dtb_m_mobile_elements_social == '1') && ($dtb_enable_custom_m_menu == '1')) ||  ($dtb_enable_custom_m_menu != '1') ||  ($dtb_mobile_enable != '1')) { 
	$wp_customize->add_setting( 'dtb_customize_title_mobile_social', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_social', array(
		'label' => __( 'Mobile Menu Social Icons', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_add', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_social_mobile_add', array(
	    'label' => __('Add Icons to the default Mobile Menu', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_mobile'
	));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_title_align', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_mobile_title_align', array(
		'label' => __( 'Mobile Social Icons Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_align', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_social_mobile_align', array(
		'label' => __( 'Align Icons', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_margin_icon', array(
		'default' => 10,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_margin_icon', array(
		'label' => __('Spacing Between Icons', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		)
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_social_mobile_margin', array(
		'label' => __( 'Social Icons Container Container Margin', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_margin_top', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_social_mobile_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_margin_right', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_social_mobile_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_margin_bottom', array(
		'default' => '20px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_social_mobile_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_social_mobile_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_social_mobile_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	
	
	
	
	$wp_customize->add_setting( 'dtb_customize_social_mobile_title', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_mobile_title', array(
		'label' => __( 'Mobile Menu Social Icons Style', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_size', array(
		'default' => 16,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_size', array(
		'label' => __('Mobile Icons Font Size', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_color', array(
		'label' => __('Mobile Icons Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_color'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_social_mobile_bg_color', array(
		'default' => 'rgba(0,0,0,0.04)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_bg_color', array(
		'label' => __('Mobile Icons Background Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_bg_color'
	)));	
	$wp_customize->add_setting( 'dtb_customize_social_mobile_border_radius', array(
		'default' => 3,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_border_radius', array(
		'label' => __('Mobile Icons Border Radius', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_border_width', array(
		'default' => 0,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_border_width', array(
		'label' => __('Mobile Icons Border Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_border_color', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_border_color', array(
		'label' => __('Mobile Icons Border Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_border_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_height', array(
		'default' => 40,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_height', array(
		'label' => __('Mobile Icons Height', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_width', array(
		'default' => 40,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_mobile_width', array(
		'label' => __('Mobile Icons Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		)
	)));

	$wp_customize->add_setting( 'dtb_customize_social_mobile_hover_title', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_mobile_hover_title', array(
		'label' => __( 'Mobile Social Icons Hover Style', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));	
	$wp_customize->add_setting( 'dtb_customize_social_mobile_color_hover', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_color_hover', array(
		'label' => __('Mobile Icons Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_bg_color_hover', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_bg_color_hover', array(
		'label' => __('Mobile Icons Background Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_bg_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_social_mobile_border_color_hover', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_mobile_border_color_hover', array(
		'label' => __('Mobile Icons Border Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_social_mobile_border_color_hover'
	)));
}