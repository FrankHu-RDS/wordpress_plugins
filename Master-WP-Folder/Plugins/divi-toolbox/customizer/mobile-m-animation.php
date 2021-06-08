<?php

// Mobile Menu Container Animation
$wp_customize->add_setting( 'dtb_customize_m_m_container_animation_t', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_m_m_container_animation_t', array(
	'label' => __( 'Mobile Menu Animation', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_container_animation', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_container_animation', array(
	'label' => __( 'Menu Animation Style', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));


$wp_customize->add_setting( 'dtb_modcustomize_m_m_animation_page', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_animation_page', array(
    'label' => __('Enable Page Animation', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));




$wp_customize->add_setting( 'dtb_customize_m_m_container_animation_in', array(
	'default'       => 'fade',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_animation_in', array(
	'label'	      => __('Menu Animation on open', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => array(
		'none'   => __( 'None', 'divi-toolbox' ),
		'fade'   => __( 'Fade in', 'divi-toolbox' ),
		'scale'  => __( 'Scale In', 'divi-toolbox' ),
		'scale_hor'  => __( 'Scale In Horizontal', 'divi-toolbox' ),
		'scale_ver'  => __( 'Scale In Vertical', 'divi-toolbox' ),
		'flip_hor'  => __( 'Flip In Horizontal', 'divi-toolbox' ),
		'flip_ver'  => __( 'Flip In Vertical', 'divi-toolbox' ),
		'flip_diag'  => __( 'Flip In Diagonal ', 'divi-toolbox' ),
		'slide_right'  => __( 'Slide In Right ←', 'divi-toolbox' ),
		'slide_left'  => __( 'Slide In Left →', 'divi-toolbox' ),
		'slide_top'  => __( 'Slide In Top ↓', 'divi-toolbox' ),
		'slide_bottom'  => __( 'Slide In Bottom ↑', 'divi-toolbox' ),
		'bounce_right'  => __( 'Bounce In Right ←', 'divi-toolbox' ),
		'bounce_left'  => __( 'Bounce In Left →', 'divi-toolbox' ),
		'bounce_top'  => __( 'Bounce In Top ↓', 'divi-toolbox' ),
		'bounce_bottom'  => __( 'Bounce In Bottom ↑', 'divi-toolbox' ),
		'tilt_right'  => __( 'Tilt In Right ←', 'divi-toolbox' ),
		'tilt_left'  => __( 'Tilt In Left →', 'divi-toolbox' ),
		'tilt_top'  => __( 'Tilt In Top ↓', 'divi-toolbox' ),
		'tilt_bottom'  => __( 'Tilt In Bottom ↑', 'divi-toolbox' ),
		'swing_right'  => __( 'Swing In Right ←', 'divi-toolbox' ),
		'swing_left'  => __( 'Swing In Left →', 'divi-toolbox' ),
		'swing_top'  => __( 'Swing In Top ↓', 'divi-toolbox' ),
		'swing_bottom'  => __( 'Swing In Bottom ↑', 'divi-toolbox' )
	)
));

$wp_customize->add_setting( 'dtb_customize_m_m_container_animation_out', array(
	'default'       => 'fade',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_animation_out', array(
	'label'	      => __('Menu Animation on close', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => array(
		'none'   => __( 'None', 'divi-toolbox' ),
		'fade'   => __( 'Fade Out', 'divi-toolbox' ),
		'scale'  => __( 'Scale Out', 'divi-toolbox' ),
		'scale_hor'  => __( 'Scale Out Horizontal', 'divi-toolbox' ),
		'scale_ver'  => __( 'Scale Out Vertical', 'divi-toolbox' ),
		'flip_hor'  => __( 'Flip Out Horizontal', 'divi-toolbox' ),
		'flip_ver'  => __( 'Flip Out Vertical', 'divi-toolbox' ),
		'flip_diag'  => __( 'Flip Out Diagonal ', 'divi-toolbox' ),
		'slide_right'  => __( 'Slide Out Right →', 'divi-toolbox' ),
		'slide_left'  => __( 'Slide Out Left ←', 'divi-toolbox' ),
		'slide_top'  => __( 'Slide Out Top ↑', 'divi-toolbox' ),
		'slide_bottom'  => __( 'Slide Out Bottom ↓', 'divi-toolbox' ),
		'bounce_right'  => __( 'Bounce Out Right →', 'divi-toolbox' ),
		'bounce_left'  => __( 'Bounce Out Left ←', 'divi-toolbox' ),
		'bounce_top'  => __( 'Bounce Out Top ↑', 'divi-toolbox' ),
		'bounce_bottom'  => __( 'Bounce Out Bottom ↓', 'divi-toolbox' ),
		'tilt_right'  => __( 'Tilt Out Right →', 'divi-toolbox' ),
		'tilt_left'  => __( 'Tilt Out Left ←', 'divi-toolbox' ),
		'tilt_top'  => __( 'Tilt Out Top ↑', 'divi-toolbox' ),
		'tilt_bottom'  => __( 'Tilt Out Bottom ↓', 'divi-toolbox' ),
		'swing_right'  => __( 'Swing Out Right →', 'divi-toolbox' ),
		'swing_left'  => __( 'Swing Out Left ←', 'divi-toolbox' ),
		'swing_top'  => __( 'Swing Out Top ↑', 'divi-toolbox' ),
		'swing_bottom'  => __( 'Swing Out Bottom ↓', 'divi-toolbox' )
	)
));


$wp_customize->add_setting( 'dtb_customize_m_m_container_animation_type', array(
	'default'       => 'move_right',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_container_animation_type', array(
	'label'	      => __('Page & Menu Animation type', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => array(
		'move_right'  => __( 'Slide In Left to Right →', 'divi-toolbox' ),
		'move_left'  => __( 'Side In Right to Left ←', 'divi-toolbox' ),
		'move_top'  => __( 'Slide In from the Bottom ↑', 'divi-toolbox' ),
		'move_bottom'  => __( 'Slide In from the Top ↓', 'divi-toolbox' )
	)
));

$wp_customize->add_setting( 'dtb_customize_m_m_page_overlay', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_page_overlay', array(
	'label' => __( 'Page Content Overlay', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_dim_background', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_dim_background', array(
    'label' => __('Add Page Overlay when Open', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_m_m_dim_color', array(
	'default' => 'rgba(0,0,0,0.7)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_dim_color', array(
	'label' => __('Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_dim_color'
)));