<?php
$wp_customize->add_setting( 'dtb_customize_title_top_bar', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_top_bar', array(
	'label' => __( 'Top Bar (Secondary Nav)', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_modcustomize_hide_top_fixed', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_hide_top_fixed', array(
    'label' => __('Hide Top Bar on Scroll', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_modcustomize_top_bar_shadow', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_top_bar_shadow', array(
    'label' => __('Display Top Bar Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_top_bar_shadow_color', array(
	'default' => 'rgba(0,0,0,0.5)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_top_bar_shadow_color', array(
	'label' => __('Top Bar Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_top_bar_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_top_bar_shadow_offset_y', array(
	'default' => -5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_top_bar_shadow_offset_y', array(
	'label' => __('Top Bar Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_top_bar_shadow_blur', array(
	'default' => 40,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_top_bar_shadow_blur', array(
	'label' => __('Top Bar Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'et_divi[top_bar_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[top_bar_font]', array(
	'label'		=> esc_html__( 'Top Bar Font', 'Divi' ),
	'section'	=> 'dtb_header',
	'settings'	=> 'et_divi[top_bar_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_top_bar_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_top_bar_font_weight', array(
	'label'	      => __('Top Bar Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_header',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_top_bar_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_top_bar_font_lettersp', array(
	'label' => __( 'Top Bar Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_top_bar_font_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_top_bar_font_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_sec_nav_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_nav_color', array(
	'label' => __('Top Bar Links Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sec_nav_color'
)));
$wp_customize->add_setting( 'dtb_customize_sec_nav_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_nav_color_hover', array(
	'label' => __('Top Bar Links Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sec_nav_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_sec_nav_bg_hover', array(
	'default' => 'rgba(0,0,0,0)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_nav_bg_hover', array(
	'label' => __('Top Bar Links Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sec_nav_bg_hover'
)));