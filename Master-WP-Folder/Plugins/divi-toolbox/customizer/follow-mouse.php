<?php
$wp_customize->add_setting( 'dtb_customize_title_follow_mouse', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_follow_mouse', array(
	'label' => __( 'Follow-The-Mouse Effect', 'divi-toolbox' ),
	'section' => 'dtb_modules'
)));
$wp_customize->add_setting( 'dtb_customize_follow_mouse_color1', array(
	'default' => 'rgba(33,201,226, 0.8)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_follow_mouse_color1', array(
	'label' => __('Overlay Color 1', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'settings' => 'dtb_customize_follow_mouse_color1'
)));
$wp_customize->add_setting( 'dtb_customize_follow_mouse_color2', array(
	'default' => 'rgba(255,255,255,0.8)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_follow_mouse_color2', array(
	'label' => __('Overlay Color 2', 'divi-toolbox'),
	'section' => 'dtb_modules',
	'settings' => 'dtb_customize_follow_mouse_color2'
)));

$wp_customize->add_setting( 'dtb_customize_follow_mouse_gradient', array(
	'default'       => 'to bottom',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_follow_mouse_gradient', array(
	'label'	      => __('Gradient Direction', 'divi-toolbox'),
	'section'     => 'dtb_modules',
	'type'			=> 'select',
	'choices' => $gradient
));