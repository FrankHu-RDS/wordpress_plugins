<?php
$wp_customize->add_setting( 'dtb_customize_title_mobile_submenu', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_submenu', array(
	'label' => __( 'Nested Submenus', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
if ($dtb_enable_custom_m_menu != '1') { 
	$wp_customize->add_setting( 'dtb_customize_mobile_sub_parent_font_weight', array(
		'default'       => '600',
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_mobile_sub_parent_font_weight', array(
		'label'	      => __('Parent Item Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_mobile',
		'type'			=> 'select',
		'choices' => $font_weights
	));
}
$wp_customize->add_setting( 'dtb_customize_mobile_submenu_icon_closed', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_submenu_icon_closed', array(
	'label' => __('Closed Icon Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_submenu_icon_closed'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_submenu_icon_closed_bg', array(
	'default' => 'rgba(189,200,213,0.2)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_submenu_icon_closed_bg', array(
	'label' => __('Closed Icon Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_submenu_icon_closed_bg'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_submenu_bg', array(
	'default' => 'rgba(0,0,0,0.02)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_submenu_bg', array(
	'label' => __('Submenu Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_submenu_bg'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_submenu_icon_opened', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_submenu_icon_opened', array(
	'label' => __('Opened Icon Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_submenu_icon_opened'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_submenu_icon_opened_bg', array(
	'default' => 'rgba(0,0,0,0.02)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_submenu_icon_opened_bg', array(
	'label' => __('Opened Icon Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_submenu_icon_opened_bg'
)));