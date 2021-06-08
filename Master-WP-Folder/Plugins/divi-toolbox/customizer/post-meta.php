<?php
$wp_customize->add_setting( 'dtb_customize_title_post_meta', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_post_meta', array(
	'label' => __( 'Post Meta', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'et_divi[post_meta_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));

$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[post_meta_font]', array(
	'label'		=> esc_html__( 'Post Meta Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[post_meta_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_post_meta_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_post_meta_font_weight', array(
	'label'	      => __('Post Meta Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_post_meta_font_size', array(
	'default' => 13,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_post_meta_font_size', array(
	'label' => __('Post Meta Font Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 5,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_post_meta_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_post_meta_lettersp', array(
	'label' => __( 'Post Meta Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_post_meta_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_post_meta_tt', array(
	'label' => __( 'Post Meta Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));	
$wp_customize->add_setting( 'dtb_customize_post_meta_font_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_post_meta_font_color', array(
	'label' => __('Post Meta Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_post_meta_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_post_meta_font_color_hover', array(
	'default' => '#0C249F',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_post_meta_font_color_hover', array(
	'label' => __('Post Meta Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_post_meta_font_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_post_meta_icon_size', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_post_meta_icon_size', array(
	'label' => __('Post Meta Icon Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 5,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_post_meta_icon_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_post_meta_icon_color', array(
	'label' => __('Post Meta Icon Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_post_meta_icon_color'
)));