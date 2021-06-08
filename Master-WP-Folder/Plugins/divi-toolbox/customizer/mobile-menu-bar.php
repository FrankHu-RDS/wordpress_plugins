<?php
$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_bar', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_bar', array(
	'label' => __( 'Menu Bar', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_bar_default', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_bar_default', array(
	'label' => __( 'Default Divi Nav Mobile Bar Style', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_top', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_top', array(
    'label' => __('Hide Top Bar (phone & email)', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_fixed', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_fixed', array(
    'label' => __('Enable Fixed Mobile Bar', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_fixed_top', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_fixed_top', array(
    'label' => __('Hide Top Bar when Fixed', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_bar_fullwidth', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_bar_fullwidth', array(
    'label' => __('Make Menu Bar Fullwidth', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_height', array(
	'default' => 60,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_menu_height', array(
	'label' => __('Menu Bar Height (px)', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 30,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_logo_height', array(
	'default' => 80,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_logo_height', array(
	'label' => __('Logo Height (%)', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 30,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_bar_tb', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_bar_tb', array(
	'label' => __( 'Default Divi Nav & Menu Module Mobile Bar Style', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_bar_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_bar_shadow', array(
    'label' => __('Add Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_mobile_bar_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_bar_shadow_color', array(
	'label' => __('Menu Bar Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_bar_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_bar_shadow_offset', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_bar_shadow_offset', array(
	'label' => __('Menu Bar Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_bar_shadow_blur', array(
	'default' => 25,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_bar_shadow_blur', array(
	'label' => __('Menu Bar Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_bar_bg', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_bar_bg', array(
	'label' => __('Menu Bar Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_bar_bg'
)));