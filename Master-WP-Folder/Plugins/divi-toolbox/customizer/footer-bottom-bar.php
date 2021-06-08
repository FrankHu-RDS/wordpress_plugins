<?php
$wp_customize->add_setting( 'dtb_customize_title_footer_bottom', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_footer_bottom', array(
	'label' => __( 'Footer Bottom Bar', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_modcustomize_hide_bottom_bar', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_hide_bottom_bar', array(
    'label' => __('Hide Bottom Bar', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'et_divi[footer_bottom_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[footer_bottom_font]', array(
	'label'		=> esc_html__( 'Bottom Footer Font', 'Divi' ),
	'section'	=> 'dtb_footer',
	'settings'	=> 'et_divi[footer_bottom_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_footer_bottom_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_footer_bottom_lettersp', array(
	'label' => __( 'Bottom Footer Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_footer_bottom_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_footer_bottom_tt', array(
	'label' => __( 'Bottom Footer Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_modcustomize_center_bottom_bar', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_center_bottom_bar', array(
    'label' => 'Center Align Bottom Bar',
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));