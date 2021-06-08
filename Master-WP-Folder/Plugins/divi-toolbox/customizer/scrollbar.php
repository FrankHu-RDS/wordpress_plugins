<?php
$wp_customize->add_setting( 'dtb_customize_title_scrollbar', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_scrollbar', array(
	'label' => __( 'Browser Scrollbar', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));

$wp_customize->add_setting( 'dtb_customize_scroll_width', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_scroll_width', array(
	'label' => __('Scrollbar Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 5,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_scroll_thumb_bg', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_scroll_thumb_bg', array(
	'label' => __('Scrollbar Thumb Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_scroll_thumb_bg'
)));
$wp_customize->add_setting( 'dtb_customize_scroll_thumb_border', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_scroll_thumb_border', array(
	'label' => __('Scrollbar Border Radius', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 25,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_scroll_track_bg', array(
	'default' => '#f4f4f4',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_scroll_track_bg', array(
	'label' => __('Scrollbar Track Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_scroll_track_bg'
)));
$wp_customize->add_setting( 'dtb_customize_scroll_shadow', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_scroll_shadow', array(
	'label' => __('Track Inset Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_scroll_shadow'
)));