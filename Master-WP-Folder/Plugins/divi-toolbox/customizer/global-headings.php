<?php
	
// H1
$wp_customize->add_setting( 'dtb_customize_title_h1', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_h1', array(
	'label' => __( 'H1 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h1_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h1_font]', array(
	'label'		=> esc_html__( 'H1 Font Family', 'divi-toolbox' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h1_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h1_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h1_font_weight', array(
	'label'	      => __('H1 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h1_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h1_lettersp', array(
	'label' => __( 'H1 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h1_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h1_line_height', array(
	'label' => __( 'H1 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h1_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h1_tt', array(
	'label' => __( 'H1 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h1_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h1_font_color', array(
	'label' => __('H1 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h1_font_color'
)));

// H2
$wp_customize->add_setting( 'dtb_customize_title_h2', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_h2', array(
	'label' => __( 'H2 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h2_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h2_font]', array(
	'label'		=> esc_html__( 'H2 Font Family', 'divi-toolbox' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h2_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h2_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h2_font_weight', array(
	'label'	      => __('H2 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h2_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h2_lettersp', array(
	'label' => __( 'H2 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h2_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h2_line_height', array(
	'label' => __( 'H2 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h2_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h2_tt', array(
	'label' => __( 'H2 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h2_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h2_font_color', array(
	'label' => __('H2 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h2_font_color'
)));

// H3
$wp_customize->add_setting( 'dtb_customize_title_h3_desktop', array(
	'default' => '',
	'transport' => 'refresh'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_h3_desktop', array(
	'label' => __( 'H3 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h3_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h3_font]', array(
	'label'		=> esc_html__( 'H3 Font Family', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h3_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h3_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h3_font_weight', array(
	'label'	      => __('H3 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h3_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h3_lettersp', array(
	'label' => __( 'H3 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h3_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h3_line_height', array(
	'label' => __( 'H3 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h3_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h3_tt', array(
	'label' => __( 'H3 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h3_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h3_font_color', array(
	'label' => __('H3 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h3_font_color'
)));
// H4
$wp_customize->add_setting( 'title_h4_desktop', array(
	'default' => '',
	'transport' => 'refresh'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'title_h4_desktop', array(
	'label' => __( 'H4 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h4_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h4_font]', array(
	'label'		=> esc_html__( 'H4 Font Family', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h4_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h4_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h4_font_weight', array(
	'label'	      => __('H4 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h4_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h4_lettersp', array(
	'label' => __( 'H4 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h4_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h4_line_height', array(
	'label' => __( 'H4 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h4_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h4_tt', array(
	'label' => __( 'H4 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h4_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h4_font_color', array(
	'label' => __('H4 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h4_font_color'
)));
// H5
$wp_customize->add_setting( 'dtb_customize_title_h5_desktop', array(
	'default' => '',
	'transport' => 'refresh'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_h5_desktop', array(
	'label' => __( 'H5 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h5_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h5_font]', array(
	'label'		=> esc_html__( 'H5 Font Family', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h5_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h5_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h5_font_weight', array(
	'label'	      => __('H5 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h5_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h5_lettersp', array(
	'label' => __( 'H5 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h5_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h5_line_height', array(
	'label' => __( 'H5 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h5_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h5_tt', array(
	'label' => __( 'H5 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h5_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h5_font_color', array(
	'label' => __('H5 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h5_font_color'
)));
// H6
$wp_customize->add_setting( 'dtb_customize_title_h6_desktop', array(
	'default' => '',
	'transport' => 'refresh'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_h6_desktop', array(
	'label' => __( 'H6 Heading', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[heading_h6_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[heading_h6_font]', array(
	'label'		=> esc_html__( 'H6 Font Family', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[heading_h6_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_h6_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_h6_font_weight', array(
	'label'	      => __('H6 Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_h6_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h6_lettersp', array(
	'label' => __( 'H6 Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_h6_line_height', array(
	'default' => 1.2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_h6_line_height', array(
	'label' => __( 'H6 Line Height', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0.5,
		'max'  => 2.5,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_h6_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_h6_tt', array(
	'label' => __( 'H6 Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_h6_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_h6_font_color', array(
	'label' => __('H6 Font Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_h6_font_color'
)));