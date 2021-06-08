<?php
$wp_customize->add_setting( 'dtb_customize_title_main_header', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_main_header', array(
	'label' => __( 'Default Divi Header', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_t_primary_nav', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_primary_nav', array(
	'label' => __( 'Main Header Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_modcustomize_main_header_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_main_header_shadow', array(
    'label' => __('Display Main Header Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_main_header_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_main_header_shadow_color', array(
	'label' => __('Header Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_main_header_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_main_header_shadow_offset_y', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_header_shadow_offset_y', array(
	'label' => __('Header Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_main_header_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_header_shadow_offset_x', array(
	'label' => __('Header Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_main_header_shadow_blur', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_main_header_shadow_blur', array(
	'label' => __('Header Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_t_secondary_nav', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_secondary_nav', array(
	'label' => __( 'Fixed Header Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_modcustomize_fixed_header_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_fixed_header_shadow', array(
    'label' => __('Display Fixed Header Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_fixed_header_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_fixed_header_shadow_color', array(
	'label' => __('Fixed Header Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_fixed_header_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_fixed_header_shadow_offset_y', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_fixed_header_shadow_offset_y', array(
	'label' => __('Fixed Header Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_fixed_header_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_fixed_header_shadow_offset_x', array(
	'label' => __('Fixed Header Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_fixed_header_shadow_blur', array(
	'default' => 7,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_fixed_header_shadow_blur', array(
	'label' => __('Fixed Header Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));