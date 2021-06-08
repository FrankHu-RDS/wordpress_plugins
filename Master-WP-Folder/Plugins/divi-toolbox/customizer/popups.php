<?php
$wp_customize->add_setting( 'dtb_customize_title_popup', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_popup', array(
	'label' => __( 'Popups', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_popup_bg', array(
	'default' => 'rgba(0,0,0,0.8);',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_popup_bg', array(
	'label' => __('Popup Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_popup_bg'
)));
$wp_customize->add_setting( 'dtb_customize_popup_close', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_popup_close', array(
	'label' => __('Close Button Icon Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_popup_close'
)));
$wp_customize->add_setting( 'dtb_customize_popup_close_bg', array(
	'default' => '#fff;',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_popup_close_bg', array(
	'label' => __('Close Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_popup_close_bg'
)));
$wp_customize->add_setting( 'dtb_customize_popup_close_hover', array(
	'default' => '#ffffff;',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_popup_close_hover', array(
	'label' => __('Close Button Icon Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_popup_close_hover'
)));
$wp_customize->add_setting( 'dtb_customize_popup_close_bg_hover', array(
	'default' => '#00B5CF;',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_popup_close_bg_hover', array(
	'label' => __('Close Button Background Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_popup_close_bg_hover'
)));