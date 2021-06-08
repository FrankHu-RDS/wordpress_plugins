<?php
$wp_customize->add_setting( 'dtb_customize_title_dropdown_menu', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_dropdown_menu', array(
	'label' => __( 'Dropdown Menus', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_t_submenu_style', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_submenu_style', array(
	'label' => __( 'Submenu Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));


$wp_customize->add_setting( 'dtb_customize_sub_align', array(
	'default'       => 'default',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_sub_align', array(
	'label'	      => __('Submenu Alignment', 'divi-toolbox'),
	'section'     => 'dtb_header',
	'type'			=> 'select',
	'choices' => array(
		'default'  => 'Default',
		'centered'  => 'Centered'
	)
));
$wp_customize->add_setting( 'dtb_customize_submenu_width', array(
	'default' => 240,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_submenu_width', array(
	'label' => __('Submenu Width', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 120,
		'max'  => 350,
		'step' => 1
	)
)));

$wp_customize->add_setting( 'dtb_customize_sub_border_radius', array(
	'default' => 5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sub_border_radius', array(
	'label' => __('Submenu Border Radius', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_submenu_shad', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_submenu_shad', array(
    'label' => __('Display Box Shadow','divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_submenu_shadow_color', array(
	'default' => 'rgba(50, 50, 50, 0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_submenu_shadow_color', array(
	'label' => __('Menu Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_submenu_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_submenu_shadow_offset_y', array(
	'default' => -5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_submenu_shadow_offset_y', array(
	'label' => __('Menu Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_submenu_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_submenu_shadow_offset_x', array(
	'label' => __('Menu Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_submenu_shadow_blur', array(
	'default' => 40,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_submenu_shadow_blur', array(
	'label' => __('Menu Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_sub_bg', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sub_bg', array(
	'label' => __('Submenu Background Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sub_bg'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sub_show_arrow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sub_show_arrow', array(
    'label' => __('Add Triangle Top Arrow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));

$wp_customize->add_setting( 'dtb_customize_t_submenu_font', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_submenu_font', array(
	'label' => __( 'Submenu Font Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sub_font_align', array(
	'default' => 'left',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_sub_font_align', array(
	'label' => __( 'Submenu Text Align', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'choices' => $text_align
)));
$wp_customize->add_setting( 'et_divi[submenu_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[submenu_font]', array(
	'label'		=> esc_html__( 'Submenu Font', 'Divi' ),
	'section'	=> 'dtb_header',
	'settings'	=> 'et_divi[submenu_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_sub_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_sub_font_weight', array(
	'label'	      => 'Link Font Weight',
	'section'     => 'dtb_header',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_sub_font_size', array(
	'default' => 14,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sub_font_size', array(
	'label' => __( 'Submenu Font Size', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sub_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sub_font_lettersp', array(
	'label' => __( 'Submenu Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_sub_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_sub_tt', array(
	'label' => __( 'Submenu Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_header',
	'choices' => $text_transform
)));

$wp_customize->add_setting( 'dtb_customize_sub_link', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sub_link', array(
	'label' => __('Submenu Link Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sub_link'
)));


$wp_customize->add_setting( 'sub_hover_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'sub_hover_title', array(
	'label' => __( 'Submenu Font Hover Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_sub_link_hover_bg', array(
	'default' => 'rgba(189,200,213,0.2)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sub_link_hover_bg', array(
	'label' => __('Link Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sub_link_hover_bg'
)));
$wp_customize->add_setting( 'dtb_customize_sub_link_hover', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sub_link_hover', array(
	'label' => __('Link Hover Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_sub_link_hover'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sub_move_right_hover', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sub_move_right_hover', array(
    'label' => __('Move Text Right On Hover', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));