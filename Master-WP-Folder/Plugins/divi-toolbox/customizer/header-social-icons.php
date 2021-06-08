<?php
$wp_customize->add_setting( 'dtb_customize_title_header_social', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_header_social', array(
	'label' => __( 'Header Social Icons', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));

$wp_customize->add_setting( 'dtb_modcustomize_social_move', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_social_move', array(
    'label' => __('Move Icons to Primary Nav', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_social_head_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_head_title', array(
	'label' => __( 'Header Social Icons Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_social_head_size', array(
	'default' => 14,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_head_size', array(
	'label' => __('Header Icons Font Size', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 5,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_head_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_head_color', array(
	'label' => __('Header Icons Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_social_head_color'
)));

$wp_customize->add_setting( 'dtb_customize_social_head_hover_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_head_hover_title', array(
	'label' => __( 'Header Social Icons Hover Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));

$wp_customize->add_setting( 'dtb_customize_social_head_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_head_color_hover', array(
	'label' => __('Header Icons Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_social_head_color_hover'
)));

$wp_customize->add_setting( 'dtb_customize_social_head_hover', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_social_head_hover', array(
	'label' => __('Header Icons Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_header',
	'choices' => array(
		'default'   => 'Default - None',
		'grow'      => 'Grow',
		'shrink'    => 'Shrink',
		'move_up'   => 'Move Up',
		'move_down' => 'Move Down',
		'wobble'    => 'Wobble',
		'heartbeat' => 'Heartbeat',
		'jello'     => 'Jello',
		'pulse'     => 'Pulse'
	)
));