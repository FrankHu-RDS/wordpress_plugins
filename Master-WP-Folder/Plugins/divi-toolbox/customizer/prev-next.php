<?php
$wp_customize->add_setting( 'dtb_customize_title_next_prev', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_next_prev', array(
	'label' => __( 'Next / Prev Links', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_customize_title_next_button', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_next_button', array(
	'label' => __( 'Button', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'et_divi[prev_next_btn_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[prev_next_btn_font]', array(
	'label'		=> esc_html__( 'Button Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[prev_next_btn_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_font_weight', array(
	'default'       => '700',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_next_prev_btn_font_weight', array(
	'label'	      => __('Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_font_size', array(
	'default' => 13,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_btn_font_size', array(
	'label' => __( 'Button Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_btn_font_lettersp', array(
	'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_next_prev_btn_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_next_prev_btn_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_font_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_font_color', array(
	'label' => __('Button Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_padding', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_btn_padding', array(
	'label' => __( 'Button Padding', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 2,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_btn_border_radius', array(
	'label' => __( 'Button Border Radius', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_btn_border_width', array(
	'label' => __( 'Button Border Width', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_border_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_border_color', array(
	'label' => __('Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_bg_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));

$wp_customize->add_setting( 'dtb_customize_title_next_button_hover', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_next_button_hover', array(
	'label' => __( 'Button on Hover', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_bg_color', array(
	'label' => __('Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_font_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_font_color_hover', array(
	'label' => __('Button Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_font_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_border_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_border_color_hover', array(
	'label' => __('Button Border Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_border_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_btn_bg_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_btn_bg_color_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_btn_bg_color_hover'
)));	
$wp_customize->add_setting( 'et_divi[prev_next_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_setting( 'dtb_customize_title_next_link', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_next_link', array(
	'label' => __( 'Post Title', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[prev_next_font]', array(
	'label'		=> esc_html__( 'Link Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[prev_next_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_next_prev_font_weight', array(
	'label'	      => __('Link Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_next_prev_font_size', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_font_size', array(
	'label' => __( 'Link Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_font_lettersp', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_next_prev_font_lettersp', array(
	'label' => __( 'Link Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_next_prev_tt', array(
	'default' => 'uppercase',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_next_prev_tt', array(
	'label' => __( 'Link Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_font_color', array(
	'default' => '#bdc8d5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_font_color', array(
	'label' => __('Link Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_next_prev_font_color_hover', array(
	'default' => '#97A0AA',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_next_prev_font_color_hover', array(
	'label' => __('Link Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_next_prev_font_color_hover'
)));