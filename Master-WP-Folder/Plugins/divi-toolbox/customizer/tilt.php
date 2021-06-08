<?php
$wp_customize->add_setting( 'dtb_customize_title_tilt', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_tilt', array(
	'label' => __( '3D Tilt Effect', 'divi-toolbox' ),
	'section' => 'dtb_modules'
)));
$wp_customize->add_setting( 'dtb_customize_title_tilt_desc', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_tilt_desc', array(
	'description'  => esc_html__( 'Thie effect will be visible on any element with the custom CSS class of dtb-tilt' ),
	'section' => 'dtb_modules'
)));
$wp_customize->add_setting( 'dtb_customize_tilt_max_tilt', array(
	'default' => 20,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_tilt_max_tilt', array(
	'label' => __('Max Tilt', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 1,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_tilt_perspective', array(
	'default' => 1000,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_tilt_perspective', array(
	'label' => __('Perspective', 'divi-toolbox'),
	'description' => 'The lower the more extreme the tilt gets.',
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1500,
		'step' => 10
	)
)));
$wp_customize->add_setting( 'dtb_customize_tilt_scale', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_tilt_scale', array(
	'label' => __('Scale', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 1,
		'max'  => 1.5,
		'step' => 0.01
	)
)));
$wp_customize->add_setting( 'dtb_customize_tilt_speed', array(
	'default' => 300,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_tilt_speed', array(
	'label' => __('Speed', 'divi-toolbox'),
	'description' => 'Speed of the enter/exit transition.',
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 100,
		'max'  => 2000,
		'step' => 10
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_tilt_glare', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_tilt_glare', array(
    'label' => __('Add Glare Effect', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_modules'
));
$wp_customize->add_setting( 'dtb_customize_tilt_max_glare', array(
	'default' => 0.5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_tilt_max_glare', array(
	'label' => __('Max Glare', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.1
	)
)));