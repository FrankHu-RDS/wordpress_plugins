<?php
$wp_customize->add_setting( 'dtb_customize_title_overlapping_logo', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_overlapping_logo', array(
	'label' => __( 'Overlapping Logo', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_title_logo_box_style', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_logo_box_style', array(
	'label' => __( 'Logo Box Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_padding', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_padding', array(
	'label' => __('Logo Box Padding', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_border', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_border', array(
	'label' => __('Logo Box Bottom Border Radius', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_bg', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_logo_box_bg', array(
	'label' => __('Logo Box Background Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_logo_box_bg'
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_width', array(
	'default' => 200,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_width', array(
	'label' => __('Logo Box Width', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 500,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_height', array(
	'default' => 200,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_height', array(
	'label' => __('Logo Box Height', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 500,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_title_logo_box_shadow', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_logo_box_shadow', array(
	'label' => __( 'Logo Box Shadow', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));
$wp_customize->add_setting( 'dtb_modcustomize_logo_box_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_logo_box_shadow', array(
    'label' => __('Display Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_header'
));
$wp_customize->add_setting( 'dtb_customize_logo_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_logo_shadow_color', array(
	'label' => __('Logo Box Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_logo_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_logo_shadow_offset_y', array(
	'default' => 5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_shadow_offset_y', array(
	'label' => __('Logo Box Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_shadow_offset_x', array(
	'label' => __('Logo Box Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_shadow_blur', array(
	'default' => 55,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_shadow_blur', array(
	'label' => __('Logo Box Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_title_logo_box_fixed', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_logo_box_fixed', array(
	'label' => __( 'Fixed Logo Box Style', 'divi-toolbox' ),
	'section' => 'dtb_header'
)));

$wp_customize->add_setting( 'dtb_customize_logo_box_bg_fixed', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_logo_box_bg_fixed', array(
	'label' => __('Logo Box Background Color when Fixed', 'divi-toolbox'),
	'section' => 'dtb_header',
	'settings' => 'dtb_customize_logo_box_bg_fixed'
)));

$wp_customize->add_setting( 'dtb_customize_logo_box_width_fixed', array(
	'default' => 120,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_width_fixed', array(
	'label' => __('Logo Box Width when Fixed', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 500,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_logo_box_height_fixed', array(
	'default' => 120,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_logo_box_height_fixed', array(
	'label' => __('Logo Box Height when Fixed', 'divi-toolbox'),
	'section' => 'dtb_header',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 500,
		'step' => 1
	)
)));