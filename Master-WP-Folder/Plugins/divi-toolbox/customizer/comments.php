<?php
$wp_customize->add_setting( 'dtb_customize_title_comments', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_comments', array(
	'label' => __( 'Comments Form', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_comments_half', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_comments_half', array(
    'label' => __('Message Field Half-Width', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_comments_textarea', array(
	'default' => 150,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_textarea', array(
	'label' => __('Message Field Height', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 50,
		'max'  => 300,
		'step' => 1
	)
)));	

$wp_customize->add_setting( 'dtb_customize_title_comments_fields', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_comments_fields', array(
	'label' => __( 'Form Fields', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));		
$wp_customize->add_setting( 'et_divi[comments_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[comments_font]', array(
	'label'		=> esc_html__( 'Fields Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[comments_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_comments_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_comments_font_weight', array(
	'label'	      => __('Fields Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_comments_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_font_size', array(
	'label' => __( 'Fields Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_comments_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_lettersp', array(
	'label' => __( 'Fields Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_comments_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_comments_tt', array(
	'label' => __( 'Fields Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_comments_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_font_color', array(
	'label' => __('Fields Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_bg_color', array(
	'default' => '#efefef',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_bg_color', array(
	'label' => __('Fields Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_border_radius', array(
	'label' => __('Fields Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_comments_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_border_width', array(
	'label' => __('Fields Border Width', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_comments_border_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_border_color', array(
	'label' => __('Fields Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_padding', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_padding', array(
	'label' => __('Fields Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_title_comments_focus', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_comments_focus', array(
	'label' => __( 'Focus Field', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));	
$wp_customize->add_setting( 'dtb_customize_comments_border_color_focus', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_border_color_focus', array(
	'label' => __('Fields Border Focus Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_border_color_focus'
)));
$wp_customize->add_setting( 'dtb_customize_comments_bg_color_focus', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_bg_color_focus', array(
	'label' => __('Fields Background Focus Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_bg_color_focus'
)));
$wp_customize->add_setting( 'dtb_customize_title_comments_submit', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_comments_submit', array(
	'label' => __( 'Submit Button', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));	
$wp_customize->add_setting( 'et_divi[comments_btn_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[comments_btn_font]', array(
	'label'		=> esc_html__( 'Button Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[comments_btn_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_comments_btn_font_weight', array(
	'label'	      => __('Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_comments_btn_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_btn_font_size', array(
	'label' => __( 'Button Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_btn_lettersp', array(
	'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_comments_btn_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_comments_btn_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_font_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_btn_font_color', array(
	'label' => __('Button Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_btn_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_bg_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_btn_bg_color', array(
	'label' => __('Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_btn_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_btn_border_radius', array(
	'label' => __('Button Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_btn_border_width', array(
	'label' => __('Button Border Width', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_comments_btn_border_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_btn_border_color', array(
	'label' => __('Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_btn_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_padding', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_comments_btn_padding', array(
	'label' => __('Button Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_title_comments_submit_hover', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_comments_submit_hover', array(
	'label' => __( 'Submit Button on Hover', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_font_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_btn_font_color_hover', array(
	'label' => __('Button Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_btn_font_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_bg_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_comments_btn_bg_color_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_comments_btn_bg_color_hover'
)));
$wp_customize->add_setting( 'dtb_comments_btn_border_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_comments_btn_border_color_hover', array(
	'label' => __('Button Border Hover Color'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_comments_btn_border_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_comments_btn_hover', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_comments_btn_hover', array(
	'label' => __('Button Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
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