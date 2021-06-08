<?php

$wp_customize->add_setting( 'dtb_customize_title_footer_social', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_footer_social', array(
	'label' => __( 'Footer Social Icons', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_margin', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_margin', array(
	'label' => __('Footer Icons Container Spacing', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_foot_title', array(
	'label' => __( 'Footer Social Icons Style', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_size', array(
	'default' => 24,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_size', array(
	'label' => __('Footer Icons Font Size', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 5,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_color', array(
	'label' => __('Footer Icons Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_color'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_bg_color', array(
	'default' => 'rgba(0,0,0,0.2)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_bg_color', array(
	'label' => __('Footer Icons Background Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_bg_color'
)));	
$wp_customize->add_setting( 'dtb_customize_social_foot_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_border_radius', array(
	'label' => __('Footer Icons Border Radius', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_border_width', array(
	'label' => __('Footer Icons Border Width', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_border_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_border_color', array(
	'label' => __('Footer Icons Border Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_padding', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_padding', array(
	'label' => __('Footer Icons Padding', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_margin_icon', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_social_foot_margin_icon', array(
	'label' => __('Footer Icon Spacing', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));

$wp_customize->add_setting( 'dtb_customize_social_foot_hover_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_social_foot_hover_title', array(
	'label' => __( 'Footer Social Icons Hover Style', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));	
$wp_customize->add_setting( 'dtb_customize_social_foot_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_color_hover', array(
	'label' => __('Footer Icons Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_bg_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_bg_color_hover', array(
	'label' => __('Footer Icons Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_bg_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_border_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));

$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_social_foot_border_color_hover', array(
	'label' => __('Footer Icons Border Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_social_foot_border_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_social_foot_hover', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_social_foot_hover', array(
	'label' => __('Footer Icons Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_footer',
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