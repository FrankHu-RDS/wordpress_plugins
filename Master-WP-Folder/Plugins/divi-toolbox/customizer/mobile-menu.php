<?php
$wp_customize->add_setting( 'dtb_customize_title_mobile_menu', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu', array(
	'label' => __( 'Mobile Menu', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_menu_fullwidth', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_menu_fullwidth', array(
    'label' => __('Make Mobile Menu Fullwidth', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_style', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_mobile_menu_style', array(
	'label' => __('Mobile Menu Animation', 'divi-toolbox'),
	'type' => 'radio',
	'section' => 'dtb_mobile',
	'choices' => array(
		'default'   => 'Slide Down',
		'slide'      => 'Slide In from Right'
	)
));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_dim_background', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_dim_background', array(
    'label' => __('Dim Background when Open', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_mobile_dim_color', array(
	'default' => 'rgba(0,0,0,0.7)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_dim_color', array(
	'label' => __('Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_dim_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_menu_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_mobile_menu_shadow', array(
    'label' => __('Add Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_menu_shadow_color', array(
	'label' => __('Menu Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_menu_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_shadow_offset_y', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_menu_shadow_offset_y', array(
	'label' => __('Menu Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_shadow_offset_x', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_menu_shadow_offset_x', array(
	'label' => __('Menu Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_shadow_blur', array(
	'default' => 35,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_menu_shadow_blur', array(
	'label' => __('Menu Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_bg', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_menu_bg', array(
	'label' => __('Mobile Menu Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_menu_bg'
)));