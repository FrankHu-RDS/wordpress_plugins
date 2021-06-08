<?php

$wp_customize->add_setting( 'dtb_customize_title_pass_form', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_pass_form', array(
	'label' => __( 'Password Protected Form', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));

$wp_customize->add_setting( 'dtb_customize_t_pass_container', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_container', array(
	'label' => __( 'Password Form Container', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));

$wp_customize->add_setting('dtb_customize_pass_form_bg_color', array(
	'default' => 'rgba(255,255,255,0)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_form_bg_color', array(
	'label' => __('Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_form_bg_color'
)));

$wp_customize->add_setting( 'dtb_modcustomize_pass_container_padding', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_pass_container_padding', array(
	'label' => __( 'Container Padding', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_container_padding_top', array(
	'default' => '80px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_pass_container_padding_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_container_padding_right', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_pass_container_padding_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_container_padding_bottom', array(
	'default' => '80px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_pass_container_padding_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_container_padding_left', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_pass_container_padding_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));

$wp_customize->add_setting('dtb_customize_pass_content_max_width', array(
	'default' => '1080',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_content_max_width', array(
	'label' => __('Content Max Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'        => 'range',
	'input_attrs' => array(
		'min'  => 300,
		'max'  => 1920,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_content_align', array(
	'default' => 'left',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_pass_content_align', array(
	'label' => __( 'Content Alignment', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_align
)));



$dtb_enable_password_image = dtb_get_option('dtb_enable_password_image');
$dtb_password_image = dtb_get_option('dtb_password_image');

if (($dtb_enable_password_image != '') && ($dtb_password_image != '')) {
	
	$wp_customize->add_setting( 'dtb_customize_t_pass_image', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_image', array(
		'label' => __( 'Password Form Image', 'divi-toolbox' ),
		'section' => 'dtb_general'
	)));
	$wp_customize->add_setting('dtb_customize_pass_image_max_width', array(
		'default' => '300',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_image_max_width', array(
		'label' => __('Image Max Width', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1920,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_pass_image_padding', array(
		'default' => '20',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_image_padding', array(
		'label' => __('Image Bottom Padding', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	
}


$wp_customize->add_setting( 'dtb_customize_t_pass_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_title', array(
	'label' => __( 'Password Form Title', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[pass_title_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[pass_title_font]', array(
	'label'		=> esc_html__( 'Title Font', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[pass_title_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_pass_title_font_weight', array(
	'default'       => '700',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_pass_title_font_weight', array(
	'label'	      => __('Title Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_pass_title_font_size', array(
	'default' => 16,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_title_font_size', array(
	'label' => __('title Font Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 1,
		'max'  => 40,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_pass_title_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_title_lettersp', array(
	'label' => __( 'Title Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_title_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_pass_title_tt', array(
	'label' => __( 'Title Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));	
$wp_customize->add_setting('dtb_customize_pass_title_color', array(
	'default' => '#666666',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_title_color', array(
	'label' => __('Title Text Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_title_color'
)));

$wp_customize->add_setting( 'dtb_customize_t_pass_message', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_message', array(
	'label' => __( 'Password Form Message', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'et_divi[pass_message_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[pass_message_font]', array(
	'label'		=> esc_html__( 'Message Font', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[pass_message_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_pass_message_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_pass_message_font_weight', array(
	'label'	      => __('Message Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_pass_message_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_message_font_size', array(
	'label' => __('message Font Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_pass_message_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_message_lettersp', array(
	'label' => __( 'Message Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_message_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_pass_message_tt', array(
	'label' => __( 'Message Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));	
$wp_customize->add_setting('dtb_customize_pass_message_color', array(
	'default' => '#666666',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_message_color', array(
	'label' => __('Message Text Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_message_color'
)));
$wp_customize->add_setting( 'dtb_customize_pass_message_margin_bot', array(
	'default' => 20,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_message_margin_bot', array(
	'label' => __( 'Message Bottom Margin', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));

$wp_customize->add_setting( 'dtb_customize_t_pass_input', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_input', array(
	'label' => __( 'Password Form Input Field', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_max_width', array(
	'default' => 300,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_max_width', array(
	'label' => __('Password Form Max Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 100,
		'max'  => 1980,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_padding_ver', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_padding_ver', array(
	'label' => __('Password Input Vertical Padding', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_padding_hor', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_padding_hor', array(
	'label' => __('Password Input Horizontal Padding', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));	
$wp_customize->add_setting('dtb_customize_pass_input_bg', array(
	'default' => '#ffffff',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_bg', array(
	'label' => __('Password Input Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_bg'
)));
$wp_customize->add_setting('dtb_customize_pass_input_bg_focus', array(
	'default' => '#ffffff',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_bg_focus', array(
	'label' => __('Input Background Focus Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_bg_focus'
)));	


$wp_customize->add_setting( 'dtb_customize_t_pass_input_font', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_input_font', array(
	'label' => __( 'Password Form Input Field Font', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));	
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[pass_input_font]', array(
	'label'		=> esc_html__( 'Password Input Font', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[pass_input_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_pass_input_font_weight', array(
	'label'	      => __('Password Input Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_pass_input_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_font_size', array(
	'label' => __('Password Input Font Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_pass_input_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_lettersp', array(
	'label' => __( 'Password Input Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_input_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_pass_input_tt', array(
	'label' => __( 'Password Input Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));	
$wp_customize->add_setting('dtb_customize_pass_input_color', array(
	'default' => '#666666',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_color', array(
	'label' => __('Password Input Text Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_color'
)));	

$wp_customize->add_setting('dtb_customize_pass_input_placeholder', array(
	'default' => 'rgba(0,0,0,0.3)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_placeholder', array(
	'label' => __('Input Placeholder Text Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_placeholder'
)));	
$wp_customize->add_setting( 'dtb_customize_t_pass_input_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_input_border', array(
	'label' => __( 'Password Form Input Field Border', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_border_width', array(
	'default' => 1,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_border_width', array(
	'label' => __('Password Input Border Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_pass_input_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_input_border_radius', array(
	'label' => __('Password Input Border Radius', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting('dtb_customize_pass_input_border_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_border_color', array(
	'label' => __('Password Input Border Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_border_color'
)));

$wp_customize->add_setting('dtb_customize_pass_input_border_focus', array(
	'default' => 'rgba(0,0,0,0.3)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_input_border_focus', array(
	'label' => __('Password Input Border Focus Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_input_border_focus'
)));


$wp_customize->add_setting( 'dtb_customize_t_pass_button', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_button', array(
	'label' => __( 'Password Submit Button', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_pass_button_padding_ver', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_padding_ver', array(
	'label' => __('Password Button Vertical Padding', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => 0,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_pass_button_padding_hor', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_padding_hor', array(
	'label' => __('Password Button Horizontal Padding', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));	
$wp_customize->add_setting('dtb_customize_pass_button_bg', array(
	'default' => '#00b5cf',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_bg', array(
	'label' => __('Password Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_bg'
)));
$wp_customize->add_setting('dtb_customize_pass_button_bg_hover', array(
	'default' => '#00b5cf',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_bg_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_bg_hover'
)));	


$wp_customize->add_setting( 'dtb_customize_t_pass_button_font', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_button_font', array(
	'label' => __( 'Password Submit Button Font', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));	
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[pass_button_font]', array(
	'label'		=> esc_html__( 'Submit Button Font', 'Divi' ),
	'section'	=> 'dtb_general',
	'settings'	=> 'et_divi[pass_button_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_pass_button_font_weight', array(
	'default'       => '700',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_pass_button_font_weight', array(
	'label'	      => __('Password Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_pass_button_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_font_size', array(
	'label' => __('Password Button Font Size', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_customize_pass_button_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_lettersp', array(
	'label' => __( 'Password Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_pass_button_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_pass_button_tt', array(
	'label' => __( 'Password Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_general',
	'choices' => $text_transform
)));	
$wp_customize->add_setting('dtb_customize_pass_button_color', array(
	'default' => '#ffffff',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_color', array(
	'label' => __('Password Button Text Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_color'
)));	

$wp_customize->add_setting('dtb_customize_pass_button_color_hover', array(
	'default' => '#ffffff',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_color_hover', array(
	'label' => __('Button Button Text Hover Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_color_hover'
)));	
$wp_customize->add_setting( 'dtb_customize_t_pass_button_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_pass_button_border', array(
	'label' => __( 'Password Submit Button Border', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_pass_button_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_border_width', array(
	'label' => __('Password Button Border Width', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_pass_button_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_pass_button_border_radius', array(
	'label' => __('Password Button Border Radius', 'divi-toolbox'),
	'section' => 'dtb_general',
	'type'			=> 'range',
	'button_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting('dtb_customize_pass_button_border_color', array(
	'default' => 'rgba(0,0,0,0)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_border_color', array(
	'label' => __('Password Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_border_color'
)));

$wp_customize->add_setting('dtb_customize_pass_button_border_hover', array(
	'default' => 'rgba(0,0,0,0)',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_pass_button_border_hover', array(
	'label' => __('Password Button Border Hover Color', 'divi-toolbox'),
	'section' => 'dtb_general',
	'settings' => 'dtb_customize_pass_button_border_hover'
)));