<?php

// Mobile Menu Container
$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_container', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_container', array(
	'label' => __( 'Mobile Menu Container', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_size', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_container_size', array(
	'label' => __( 'Mobile Menu Container Size', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_width', array(
	'default' => '1',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_width', array(
    'label' => __('Menu Container Fullwidth', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_m_m_width_max', array(
	'default' => 240,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_width_max', array(
	'label' => __('Set Maximum Width (px)', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 100,
		'max'  => 500,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_position', array(
	'default'       => 'right',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_position', array(
	'label'	      => __('Menu Container Alignment', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => array(
		'right'   => __( 'Right', 'divi-toolbox' ),
		'left'  => __( 'Left', 'divi-toolbox' ),
		'center'  => __( 'Centered', 'divi-toolbox' )
	)
));

$wp_customize->add_setting( 'dtb_customize_m_m_container_bg', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_container_bg', array(
	'label' => __( 'Mobile Menu Container Background', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_color', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_container_bg_color', array(
	'label' => __('Container Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_container_bg_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_bg_img_enable', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_container_bg_img_enable', array(
    'label' => __('Add Background Image', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting('dtb_customize_m_m_container_bg_img', array(
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'dtb_customize_m_m_container_bg_img', array(
	'label' => __('Background Image', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_container_bg_img'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_size', array(
	'default'       => 'cover',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_bg_size', array(
	'label'	      => __('Background Image Size', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $bgsize
));	

$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_position', array(
	'default'       => 'center',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_bg_position', array(
	'label'	      => __('Background Image Position', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $bgposition
));
$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_blend', array(
	'default'       => 'normal',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_bg_blend', array(
	'label'	      => __('Background Image Blend Mode', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $blend_modes
));

$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_bg_gradient_enable', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_container_bg_gradient_enable', array(
    'label' => __('Add Background Gradient', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_gradient1', array(
	'default' => 'rgba(0,0,0,0.9)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_container_bg_gradient1', array(
	'label' => __('Background Gradient Color 1', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_container_bg_gradient1'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_gradient2', array(
	'default' => 'rgba(0,0,0,0.9)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_container_bg_gradient2', array(
	'label' => __('Background Gradient Color 2', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_container_bg_gradient2'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_bg_gradient_dir', array(
	'default'       => 'to bottom',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_bg_gradient_dir', array(
	'label'	      => __('Background Gradient Direction', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $gradient
));

$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_bg_gradient_above', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_container_bg_gradient_above', array(
    'label' => __('Place Gradient Above Image', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));

$wp_customize->add_setting( 'dtb_customize_m_m_container_spacing', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_container_spacing', array(
	'label' => __( 'Mobile Menu Container Spacing', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_padding', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_container_padding', array(
	'label' => __( 'Mobile Menu Container Padding', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_pad_top', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_pad_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_pad_right', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_pad_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_pad_bottom', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_pad_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_pad_left', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_pad_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_margin', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_container_margin', array(
	'label' => __( 'Mobile Menu Container Margin', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_margin_top', array(
	'default' => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_margin_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_margin_right', array(
	'default' => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_margin_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_margin_bottom', array(
	'default' => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_margin_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_margin_left', array(
	'default' => '0',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_container_margin_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_t_container_shadow', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_container_shadow', array(
	'label' => __( 'Menu Container Shadow', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_container_shadow', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_container_shadow', array(
    'label' => __('Add Menu Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_m_m_container_shadow_color', array(
	'default' => 'rgba(0,0,0,0.15)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_container_shadow_color', array(
	'label' => __('Menu Container Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_container_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_container_shadow_offset_x', array(
	'label' => __('Menu Container Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_shadow_offset_y', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_container_shadow_offset_y', array(
	'label' => __('Menu Container Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_container_shadow_blur', array(
	'default' => 50,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_container_shadow_blur', array(
	'label' => __('Menu Container Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));