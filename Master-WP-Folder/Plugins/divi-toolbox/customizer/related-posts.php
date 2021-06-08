<?php
$wp_customize->add_setting( 'dtb_customize_title_related_posts', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_related_posts', array(
	'label' => __( 'Related Posts', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_customize_related_number', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_number', array(
	'label' => __('Number of Posts', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 2,
		'max'  => 6,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_section_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_related_section_title', array(
	'label' => __( 'Section Title', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));

$wp_customize->add_setting( 'et_divi[related_header_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[related_header_font]', array(
	'label'		=> esc_html__( 'Related Section Header Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[related_header_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_related_header_font_weight', array(
	'default'       => '500',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_related_header_font_weight', array(
	'label'	      => __('Header Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_related_header_font_size', array(
	'default' => 22,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_header_font_size', array(
	'label' => __( 'Header Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_header_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_header_font_lettersp', array(
	'label' => __( 'Header Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_related_header_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_related_header_tt', array(
	'label' => __( 'Header Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_related_header_font_color', array(
	'default' => '#333',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_header_font_color', array(
	'label' => __('Header Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_header_font_color'
)));	
$wp_customize->add_setting( 'related_section_links', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'related_section_links', array(
	'label' => __( 'Posts List', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'et_divi[related_link_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[related_link_font]', array(
	'label'		=> esc_html__( 'Links Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[related_link_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_related_link_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_related_link_font_weight', array(
	'label'	      => __('Links Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_related_link_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_link_font_size', array(
	'label' => __( 'Links Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_link_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_link_font_lettersp', array(
	'label' => __( 'Links Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_related_link_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_related_link_tt', array(
	'label' => __( 'Links Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_related_link_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_link_font_color', array(
	'label' => __('Links Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_link_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_related_link_font_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_link_font_color_hover', array(
	'label' => __('Links Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_link_font_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_related_box_padding', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_box_padding', array(
	'label' => __( 'Post Box Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_related_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_related_shadow', array(
    'label' => __('Add Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_related_shadow_offset_x', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_shadow_offset_x', array(
	'label' => __( 'Box Shadow Offset-X', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_shadow_offset_y', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_shadow_offset_y', array(
	'label' => __( 'Box Shadow Offset-Y', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_shadow_blur', array(
	'default' => 30,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_shadow_blur', array(
	'label' => __( 'Box Shadow Blur', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_shadow_color', array(
	'default' => 'rgba(0,0,0,0.05)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_shadow_color', array(
	'label' => __('Box Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_related_border_radius', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_border_radius', array(
	'label' => __( 'Box Border Radius' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_bg_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_bg_color', array(
	'label' => __('Box Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_bg_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_related_border', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_related_border', array(
    'label' => __('Add Box Border', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_related_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_related_border_width', array(
	'label' => __( 'Box Border Width', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_related_border_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_related_border_color', array(
	'label' => __('Box Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_related_border_color'
)));