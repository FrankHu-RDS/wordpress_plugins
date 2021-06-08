<?php
$wp_customize->add_setting( 'dtb_customize_title_typing', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_typing', array(
	'label' => __( 'Typing Effect', 'divi-toolbox' ),
	'section' => 'dtb_modules'
)));
$wp_customize->add_setting( 'dtb_customize_title_typing_desc', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_typing_desc', array(
	'description'  => esc_html__( 'Thie effect will be visible on any Text Module with the custom CSS class of dtb-typing' ),
	'section' => 'dtb_modules'
)));
$wp_customize->add_setting( 'dtb_customize_typing_speed', array(
	'default' => 50,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_typing_speed', array(
	'label' => __('Type Speed', 'divi-toolbox'),
	'description' => '(in milliseconds)',
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_typing_start_delay', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_typing_start_delay', array(
	'label' => __('Start Delay', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 5000,
		'step' => 10
	)
)));
$wp_customize->add_setting( 'dtb_customize_typing_back_speed', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_typing_back_speed', array(
	'label' => __('Back Speed', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_typing_back_delay', array(
	'default' => 1000,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_typing_back_delay', array(
	'label' => __('Back Delay', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 5000,
		'step' => 10
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_typing_smart_backspace', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_typing_smart_backspace', array(
	'label' => __('only backspace what doesn\'t match the previous string', 'divi-toolbox'),
	'type' => 'checkbox',
	'section' => 'dtb_modules'
));
$wp_customize->add_setting( 'dtb_modcustomize_typing_loop', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_typing_loop', array(
	'label' => __('Loop Strings', 'divi-toolbox'),
	'type' => 'checkbox',
	'section' => 'dtb_modules'
));
$wp_customize->add_setting( 'dtb_modcustomize_typing_cursor', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_typing_cursor', array(
	'label' => __('Show Cursor', 'divi-toolbox'),
	'type' => 'checkbox',
	'section' => 'dtb_modules'
));