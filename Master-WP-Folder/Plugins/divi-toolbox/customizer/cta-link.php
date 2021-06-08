<?php
$wp_customize->add_setting( 'dtb_customize_title_cta_link', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_cta_link', array(
	'label' => __( 'CTA Menu Button', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_t_cta_button_font', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_cta_button_font', array(
	'label' => __( 'CTA Button Font', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'et_divi[cta_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[cta_font]', array(
	'label'		=> esc_html__( 'Button Font', 'Divi' ),
	'section'	=> 'dtb_header',
	'settings'	=> 'et_divi[cta_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_cta_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_cta_font_weight', array(
	'label'	      => __('Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_header',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_cta_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_font_size', array(
	'label' => __( 'Button Font Size', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_cta_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_lettersp', array(
	'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_cta_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_cta_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_cta_text_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_text_color', array(
	'label' => __('Button Text Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_text_color'
)));
$wp_customize->add_setting( 'dtb_customize_t_cta_button_style', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_cta_button_style', array(
	'label' => __( 'CTA Button Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));

$wp_customize->add_setting( 'dtb_customize_cta_bg_color', array(
	'default' => 'rgba(189,200,213,0.2)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_bg_color', array(
	'label' => __('Button Background Color','divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_cta_padding_vertical', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_padding_vertical', array(
	'label' => __('Button Vertical Padding', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1
	)
)));


$wp_customize->add_setting( 'dtb_customize_cta_padding_horizontal', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_padding_horizontal', array(
	'label' => __('Button Horizontal Padding', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_t_cta_button_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_cta_button_border', array(
	'label' => __( 'CTA Button Border', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_cta_border_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_border_color', array(
	'label' => __('Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_cta_border_width', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_border_width', array(
	'label' => __('Button Border Width','divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_cta_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_cta_border_radius', array(
	'label' => __('Button Border Radius', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));


$wp_customize->add_setting( 'cta_text_hover', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'cta_text_hover', array(
	'label' => __( 'CTA Button on Hover', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_cta_text_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_text_color_hover', array(
	'label' => __('Button Text Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_text_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_cta_bg_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_bg_color_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_bg_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_cta_border_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_border_color_hover', array(
	'label' => __('Button Border Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_border_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_cta_hover_style', array(
	'default' => 'none',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_cta_hover_style', array(
	'label' => __('Button Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_header',
	'choices' => array(
		'none'   	=> 'None',
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

$wp_customize->add_setting( 'dtb_modcustomize_cta_fixed_style', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_cta_fixed_style', array(
    'label' => __('Change CTA Button colors when Menu becomes Fixed/Sticky', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_text_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_text_color', array(
	'label' => __('Button Text Color (fixed)', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_text_color'
)));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_bg_color', array(
	'default' => 'rgba(189,200,213,0.2)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_bg_color', array(
	'label' => __('Button Background Color (fixed)','divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_border_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_border_color', array(
	'label' => __('Button Border Color (fixed)', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_text_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_text_color_hover', array(
	'label' => __('Button Text Hover Color (fixed)', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_text_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_bg_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_bg_color_hover', array(
	'label' => __('Button Background Hover Color (fixed)', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_bg_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_cta_fixed_border_color_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_cta_fixed_border_color_hover', array(
	'label' => __('Button Border Hover Color (fixed)', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_cta_fixed_border_color_hover'
)));