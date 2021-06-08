<?php
	
$wp_customize->add_setting( 'dtb_customize_title_particles', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_particles', array(
	'label' => __( 'Moving Particles Background', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));	
	
// #1

$wp_customize->add_setting( 'dtb_customize_title_particles1_desc', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_particles1_desc', array(
	'description'  => esc_html__( 'The first set of controls applies to any element with the custom CSS ID of particles-bg1 and the second set of controls applies to an element with CSS ID of particles-bg2' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_title_particles1', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_particles1', array(
	'label' => __( 'Particle Background #1', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_particles1_number', array(
	'default' => 80,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_number', array(
	'label' => __('Number of Particles', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 300,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dtb_customize_particles1_color', array(
	'label' => __('Particles Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_particles1_color'
)));




$wp_customize->add_setting( 'dtb_customize_particles1_opacity', array(
	'default' => 0.5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_opacity', array(
	'label' => __('Particles Opacity', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_shape', array(
	'default' => 'circle',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control( 'dtb_customize_particles1_shape', array(
	'label' => __('Particles Shape', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_general',
	'choices' => array(
		'circle'   => 'Circle',
		'edge'      => 'Square',
		'polygon'    => 'Poygon',
		'star'   => 'Star'
	)
));
$wp_customize->add_setting( 'dtb_customize_particles1_size', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_size', array(
	'label' => __('Particles Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_speed', array(
	'default' => 6,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_speed', array(
	'label' => __('Particles Speed', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 1,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_lines', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_lines', array(
	'label' => __('Lines Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_lines_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dtb_customize_particles1_lines_color', array(
	'label' => __('Lines Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_particles1_lines_color'
)));
$wp_customize->add_setting( 'dtb_customize_particles1_lines_opacity', array(
	'default' => 0.4,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles1_lines_opacity', array(
	'label' => __('Lines Opacity', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles1_activity', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_particles1_activity', array(
	'label' => __('Particles Interactivity', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_general',
	'choices' => array(
		'none'   => 'None',
		'grab'      => 'Grab',
		'bubble'    => 'Bubble',
		'repulse'   => 'Repulse'
	)
));
// #2

$wp_customize->add_setting( 'dtb_customize_title_particles2', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_particles2', array(
	'label' => __( 'Particle Background #2', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));

$wp_customize->add_setting( 'dtb_customize_particles2_number', array(
	'default' => 80,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_number', array(
	'label' => 'Number of Particles',
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 300,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dtb_customize_particles2_color', array(
	'label' => __('Particles Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_particles2_color'
)));
$wp_customize->add_setting( 'dtb_customize_particles2_opacity', array(
	'default' => 0.5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_opacity', array(
	'label' => __('Particles Opacity', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_shape', array(
	'default' => 'circle',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control( 'dtb_customize_particles2_shape', array(
	'label' => __('Particles Shape', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_general',
	'choices' => array(
		'circle'   => 'Circle',
		'edge'      => 'Square',
		'polygon'    => 'Poygon',
		'star'   => 'Star'
	)
));
$wp_customize->add_setting( 'dtb_customize_particles2_size', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_size', array(
	'label' => __('Particles Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_speed', array(
	'default' => 6,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_speed', array(
	'label' => __('Particles Speed', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 1,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_lines', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_lines', array(
	'label' => __('Lines Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_lines_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dtb_customize_particles2_lines_color', array(
	'label' => __('Lines Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_particles2_lines_color'
)));
$wp_customize->add_setting( 'dtb_customize_particles2_lines_opacity', array(
	'default' => 0.4,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_particles2_lines_opacity', array(
	'label' => __('Lines Opacity', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.1
	)
)));
$wp_customize->add_setting( 'dtb_customize_particles2_activity', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_particles2_activity', array(
	'label' => __('Particles Interactivity','divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_general',
	'choices' => array(
		'none'   => 'None',
		'grab'      => 'Grab',
		'bubble'    => 'Bubble',
		'repulse'   => 'Repulse'
	)
));