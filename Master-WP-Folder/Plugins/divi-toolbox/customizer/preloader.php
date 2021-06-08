<?php
$wp_customize->add_setting( 'dtb_customize_title_preloader', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_preloader', array(
	'label' => __( 'Preloader', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));



$wp_customize->add_setting( 'dtb_customize_preloader_bg', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_preloader_bg', array(
	'label' => __('Preloader Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_preloader_bg'
)));

$dtb_custom_preloader_image_val = dtb_get_option('dtb_custom_preloader_image');
if($dtb_custom_preloader_image_val){
	$wp_customize->add_setting( 'dtb_customize_preloader_img_size', array(
		'default' => 250,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_preloader_img_size', array(
		'label' => __('Preloader Image Width', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 20,
			'max'  => 1000,
			'step' => 1
		)
	)));
} else {
	$wp_customize->add_setting( 'dtb_customize_preloader_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_preloader_color', array(
		'label' => __('Preloader Spinner Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_preloader_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_preloader_size', array(
		'default' => 70,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_preloader_size', array(
		'label' => __('Preloader Spinner Size', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 20,
			'max'  => 300,
			'step' => 1
		)
	)));
}