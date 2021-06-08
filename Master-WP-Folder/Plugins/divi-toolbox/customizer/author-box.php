<?php
$wp_customize->add_setting( 'dtb_customize_title_author_box', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_author_box', array(
	'label' => __( 'Author Box', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));

$wp_customize->add_setting( 'dtb_modcustomize_author_box_round', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_author_box_round', array(
    'label' => __('Rounded Author Avatar', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_author_avatar', array(
	'default' => 100,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_author_avatar', array(
	'label' => __('Author Avatar Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_box_bg', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_author_box_bg', array(
	'label' => __('Box Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_author_box_bg'
)));
$wp_customize->add_setting( 'dtb_customize_author_box_padding', array(
	'default' => 25,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_padding', array(
	'label' => __('Author Box Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_box_border_radius', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_border_radius', array(
	'label' => __('Author Box Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_author_box_border', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_author_box_border', array(
    'label' => __('Add Box Border', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_author_box_border_width', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_border_width', array(
	'label' => __('Author Box Border Width', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_box_border_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_author_box_border_color', array(
	'label' => __('Box Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_author_box_border_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_author_box_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_author_box_shadow', array(
    'label' => __('Add Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_author_box_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_author_box_shadow_color', array(
	'label' => __('Box Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_author_box_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_author_box_shadow_offset_x', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_shadow_offset_x', array(
	'label' => __('Box Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_box_shadow_offset_y', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_shadow_offset_y', array(
	'label' => __('Box Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_box_shadow_blur', array(
	'default' => 65,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_box_shadow_blur', array(
	'label' => __('Box Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));

$wp_customize->add_setting( 'et_divi[author_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));

$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[author_font]', array(
	'label'		=> esc_html__( 'Author Name Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[author_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_author_box_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_author_box_font_weight', array(
	'label'	      => __('Author Name Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_author_name_size', array(
	'default' => 18,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_author_name_size', array(
	'label' => __('Author Name Font Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 60,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_author_name_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_author_name_color', array(
	'label' => __('Author Name Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_author_name_color'
)));