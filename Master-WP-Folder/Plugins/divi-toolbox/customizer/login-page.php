<?php
function dtb_customize_login_editor( $wp_customize ) {
	// Font Weights
	$font_weights = array(
		'100'   => __( 'Thin' ,'divi-toolbox' ),
	   '200'  => __( 'Ultra Light', 'divi-toolbox' ),
	   '300'  => __( 'Light', 'divi-toolbox' ),
	   '400'  => __( 'Regular', 'divi-toolbox' ),
		'500'   => __( 'Medium', 'divi-toolbox' ),
	   '600'  => __( 'Semi Bold', 'divi-toolbox' ),
	   '700'  => __( 'Bold', 'divi-toolbox' ),
	   '800'  => __( 'Ultra Bold', 'divi-toolbox' ),
	   '900'  => __( 'Heavy', 'divi-toolbox' )
	);
	
	// Text Transform
	$text_transform = array(
		'none' => array(
			'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . '../assets/img/tt-none.svg',
			'name' => __( 'None', 'divi-toolbox' )
		),
		'uppercase' => array(
			'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . '../assets/img/tt-uppercase.svg',
			'name' => __( 'Uppercase', 'divi-toolbox' )
		),
		'capitalize' => array(
			'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . '../assets/img/tt-capitalize.svg',
			'name' => __( 'Capitalize', 'divi-toolbox' )
		),
		'lowercase' => array(
			'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . '../assets/img/tt-lowercase.svg',
			'name' => __( 'Lowercase', 'divi-toolbox' )
		)
	);
	
	$wp_customize->add_setting( 'dtb_customize_title_login_editor', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_login_editor', array(
		'label' => __( 'Login Page', 'divi-toolbox' ),
		'section' => 'dtb_general'
	)));
	
	$wp_customize->add_setting( 'dtb_customize_title_section_logo', array(
		'default' => '',
		'transport' => 'refresh'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_logo', array(
		'label' => __( 'Login Page Logo', 'divi-toolbox' ),
		'section' => 'dtb_general'
	)));
	
	$wp_customize->add_setting('dtb_customize_login_logo', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'dtb_customize_login_logo', array(
		'label' => __('Login Logo Image', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_logo'
	)));

	$wp_customize->add_setting('dtb_customize_login_logo_width', array(
		'default' => '84',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_logo_width', array(
		'label' => __('Logo Width', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 600,
			'step' => 1
		)
	)));

	$wp_customize->add_setting('dtb_customize_login_logo_height', array(
		'default' => '84',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_logo_height', array(
		'label' => __('Logo Height', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 300,
			'step' => 1
		)
	)));

	$wp_customize->add_setting('dtb_customize_login_logo_padding', array(
		'default' => '5',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_logo_padding', array(
		'label' => __('Padding Bottom', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		)
	)));

	$wp_customize->add_setting( 'dtb_customize_title_section_bg', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_bg', array(
		'label' => __( 'Login Page Background', 'divi-toolbox' ),
		'section' => 'dtb_general'
	)));
	
	$wp_customize->add_setting('dtb_customize_login_bg_image', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'dtb_customize_login_bg_image', array(
		'label' => __('Background Image', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_bg_image'
	)));

	$wp_customize->add_setting('dtb_customize_login_bg_color', array(
		'default' => '#F1F1F1',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dtb_customize_login_bg_color', array(
		'label' => __('Background Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_bg_color'
	)));

	$wp_customize->add_setting( 'dtb_customize_title_section_form_bg', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_form_bg', array(
		'label' => __( 'Login Page Form', 'divi-toolbox' ),
		'section' => 'dtb_general'
	))); 
	$wp_customize->add_setting('dtb_customize_login_form_bg_color', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_form_bg_color', array(
		'label' => __('Background Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_form_bg_color'
	)));

	$wp_customize->add_setting('dtb_customize_login_form_width', array(
		'default' => 320,
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_width', array(
		'label' => __('Form Width', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 300,
			'max'  => 600,
			'step' => 1
		)
	)));

	$wp_customize->add_setting('dtb_customize_login_form_height', array(
		'default' => 190,
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_height', array(
		'label' => __('Form Height', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 150,
			'max'  => 600,
			'step' => 1
		)
	)));

	$wp_customize->add_setting('dtb_customize_login_form_padding', array(
		'default' => 25,
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_padding', array(
		'label' => __('Form Padding', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_login_form_border_width', array(
		'default' => 1,
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_border_width', array(
		'label' => __('Form Border Width', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_login_form_border_radius', array(
		'default' => 0,
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_border_radius', array(
		'label' => __('Form Border Radius', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_login_form_border_color', array(
		'default' => '#ccd0d4',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_form_border_color', array(
		'label' => __('Form Border Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_form_border_color'
	)));
	
	$wp_customize->add_setting( 'dtb_modcustomize_login_form_shadow', array(
		'default' => 1,
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_login_form_shadow', array(
		'label' => __('Add Box Shadow', 'divi-toolbox'),
		'type' => 'checkbox',
		'section' => 'dtb_general'
	));
	$wp_customize->add_setting( 'dtb_customize_login_form_shadow_offset_x', array(
		'default' => 2,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_shadow_offset_x', array(
		'label' => __( 'Box Shadow Offset-X', 'divi-toolbox'),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_form_shadow_offset_y', array(
		'default' => 12,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_shadow_offset_y', array(
		'label' => __( 'Box Shadow Offset-Y', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_form_shadow_blur', array(
		'default' => 30,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_form_shadow_blur', array(
		'label' => __( 'Box Shadow Blur', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_form_shadow_color', array(
		'default' => 'rgba(0,0,0,0.08)',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_login_form_shadow_color', array(
		'label' => __('Box Shadow Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_form_shadow_color'
	)));
	
	
	
	
	
	
	$wp_customize->add_setting( 'dtb_customize_title_section_form_fields', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_form_fields', array(
		'label' => __( 'Login Page Form Fields', 'divi-toolbox' ),
		'section' => 'dtb_general'
	))); 

	$wp_customize->add_setting('dtb_customize_login_field_bg', array(
		'default' => '#f7f7f7',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_field_bg', array(
		'label' => __('Input Field Background', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_field_bg'
	)));

	$wp_customize->add_setting('dtb_customize_login_field_color', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_field_color', array(
		'label' => __('Input Field Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_field_color'
	)));

	$wp_customize->add_setting( 'dtb_customize_login_field_border_radius', array(
		'default' => 3,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_field_border_radius', array(
		'label' => __( 'Input Field Border Radius', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_field_border_width', array(
		'default' => 1,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_field_border_width', array(
		'label' => __( 'Input Field Border Width', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_login_field_border_color', array(
		'default' => '#ddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_field_border_color', array(
		'label' => __('Input Field Border Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_field_border_color'
	)));
	$wp_customize->add_setting('dtb_customize_login_field_border_color_focus', array(
		'default' => '#bbb',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_field_border_color_focus', array(
		'label' => __('Input Field Border Color (Focus)', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_field_border_color_focus'
	)));
	$wp_customize->add_setting( 'dtb_customize_login_label_font_size', array(
		'default' => 14,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_label_font_size', array(
		'label' => __( 'Label Font Size', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_label_lettersp', array(
		'default' => 0,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_label_lettersp', array(
		'label' => __( 'Label Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_login_label_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_login_label_tt', array(
		'label' => __( 'Label Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting('dtb_customize_login_label_color', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_label_color', array(
		'label' => __('Label Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_label_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_title_section_button', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_button', array(
		'label' => __( 'Login Page Button', 'divi-toolbox' ),
		'section' => 'dtb_general'
	))); 
	$wp_customize->add_setting( 'dtb_customize_login_button_font_size', array(
		'default' => 15,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_button_font_size', array(
		'label' => __( 'Button Font Size', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_button_lettersp', array(
		'default' => 0,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_button_lettersp', array(
		'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_login_button_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_login_button_tt', array(
		'label' => __( 'Button Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'choices' => $text_transform
	)));

	$wp_customize->add_setting('dtb_customize_login_button_color', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_color', array(
		'label' => __('Button Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_color'
	)));	
	$wp_customize->add_setting('dtb_customize_login_button_bg', array(
		'default' => '#2EA2CC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_bg', array(
		'label' => __('Button Background', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_bg'
	)));

	$wp_customize->add_setting( 'dtb_customize_login_button_border_radius', array(
		'default' => 3,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_button_border_radius', array(
		'label' => __( 'Button Border Radius', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_login_button_border_width', array(
		'default' => 1,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_login_button_border_width', array(
		'label' => __( 'Button Border Width', 'divi-toolbox' ),
		'section' => 'dtb_general',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 10,
			'step' => 1
		)
	)));
	$wp_customize->add_setting('dtb_customize_login_button_border', array(
		'default' => '#0074A2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_border', array(
		'label' => __('Button Border', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_border'
	)));

	$wp_customize->add_setting('dtb_customize_login_button_hover_bg', array(
		'default' => '#1E8CBE',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_hover_bg', array(
		'label' => __('Button Background (Hover)', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_hover_bg'
	)));

	$wp_customize->add_setting('dtb_customize_login_button_hover_border', array(
		'default' => '#0074A2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_hover_border', array(
		'label' => __('Button Border (Hover)', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_hover_border'
	)));

	$wp_customize->add_setting('dtb_customize_login_button_hover_color', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_button_hover_color', array(
		'label' => __('Button Color (Hover)', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_button_hover_color'
	)));	

	$wp_customize->add_setting( 'dtb_customize_title_section_txt', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_section_txt', array(
		'label' => __( 'Login Page Text', 'divi-toolbox' ),
		'section' => 'dtb_general'
	))); 
	$wp_customize->add_setting('dtb_customize_login_text_color', array(
		'default' => '#999',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_text_color', array(
		'label' => __('Text Color', 'divi-toolbox'),
		'section' => 'dtb_general',
		'settings' => 'dtb_customize_login_text_color'
	)));

	$wp_customize->add_setting('dtb_customize_login_text_color_hover', array(
		'default' => '#2EA2CC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new ET_Divi_Customize_Color_Alpha_Control($wp_customize, 'dtb_customize_login_text_color_hover', array(
		'label' => __('Text Color (Hover)', 'divi-toolbox'),
		'section' => 'dtb_general',
		'priority' => 10,
		'settings' => 'dtb_customize_login_text_color_hover'
	)));
	
}
add_action( 'customize_register', 'dtb_customize_login_editor' );

function dtb_login_css() {
	$logo_url = get_option('dtb_customize_login_logo');
	$logo_width = get_option('dtb_customize_login_logo_width', '84');
	$logo_height = get_option('dtb_customize_login_logo_height', '84');
	$logo_padding = get_option('dtb_customize_login_logo_padding', '5');
	$bg_img = get_option('dtb_customize_login_bg_image');
	$bg_color = get_option('dtb_customize_login_bg_color', '#f1f1f1');
	$form_bg_color = get_option('dtb_customize_login_form_bg_color', '#fff');
	$form_width = get_option('dtb_customize_login_form_width', '320');
	$form_height = get_option('dtb_customize_login_form_height', '190');
	$form_padding = get_option('dtb_customize_login_form_padding', '25');
	$form_border_radius = get_option('dtb_customize_login_form_border_radius', '0');
	$form_border_width = get_option('dtb_customize_login_form_border_width', '1');
	$form_border_color = get_option('dtb_customize_login_form_border_color', 'ccd0d4');
	$form_shadow = get_theme_mod('dtb_modcustomize_login_form_shadow', '1');
	$form_shadow_offset_x = get_option('dtb_customize_login_form_shadow_offset_x', '2');
	$form_shadow_offset_y = get_option('dtb_customize_login_form_shadow_offset_y', '12');
	$form_shadow_blur = get_option('dtb_customize_login_form_shadow_blur', '30');
	$form_shadow_color = get_option('dtb_customize_login_form_shadow_color', 'rgba(0,0,0,0.08)');		
	$field_bg = get_option('dtb_customize_login_field_bg', '#f7f7f7');
	$field_color = get_option('dtb_customize_login_field_color', '#333');
	$field_border_radius = get_option('dtb_customize_login_field_border_radius', '3');
	$field_border_width = get_option('dtb_customize_login_field_border_width', '1');
	$field_border_color = get_option('dtb_customize_login_field_border_color', '#ddd');
	$field_border_color_focus = get_option('dtb_customize_login_field_border_color_focus', '#bbb');
	$label_font_size = get_option('dtb_customize_login_label_font_size', '14');
	$label_lettersp = get_option('dtb_customize_login_label_lettersp', '0');
	$label_tt = get_theme_mod('dtb_modcustomize_login_label_tt', 'none');
	$label_color = get_option('dtb_customize_login_label_color', '#777');
	$button_font_size = get_option('dtb_customize_login_button_font_size', '15');
	$button_lettersp = get_option('dtb_customize_login_button_lettersp', '0');
	$button_tt = get_theme_mod('dtb_modcustomize_login_button_tt', 'none');
	$button_border_radius = get_option('dtb_customize_login_button_border_radius', '3');
	$button_border_width = get_option('dtb_customize_login_button_border_width', '1');
	$button_hover_color = get_option('dtb_customize_login_button_hover_color', '#FFF');
	$button_bg = get_option('dtb_customize_login_button_bg', '#2EA2CC');
	$button_border = get_option('dtb_customize_login_button_border', '#0074A2');
	$button_color = get_option('dtb_customize_login_button_color', '#fff');
	$button_hover_bg = get_option('dtb_customize_login_button_hover_bg', '#1E8CBE');
	$button_hover_border = get_option('dtb_customize_login_button_hover_border', '#0074A2');
	$other_color = get_option('dtb_customize_login_text_color', '#2EA2CC');
	$other_color_hover = get_option('dtb_customize_login_text_color_hover', '#2EA2CC');
	$other_css = get_option('dtb_login_custom_css');
	?>
	
	<style type="text/css">
	
		body.login {
		<?php if( !empty($bg_img)) : ?>
		background-image: url(<?php echo esc_url($bg_img); ?>) !important;
		<?php endif; ?>
		background-color: <?php echo esc_html($bg_color); ?> !important;
		background-size: cover!important;
		background-repeat: no-repeat;
		}
		
		body.login #login h1 a {
		<?php if( !empty($logo_url)) : ?>
		background-image: url(<?php echo esc_url($logo_url); ?>) !important;
		<?php endif; ?>
		width: <?php echo esc_html($logo_width); ?>px !important;
		height: <?php echo esc_html($logo_height); ?>px !important;
		background-size: <?php echo esc_html($logo_width); ?>px <?php echo esc_html($logo_height); ?>px !important;
		padding-bottom: <?php echo esc_html($logo_padding); ?>px !important;
		 margin:0 auto;
		}
		
		#loginform, #login form, #registerform {
		background-color: <?php echo esc_html($form_bg_color); ?> !important;
		height:auto!important;
		min-height: <?php echo esc_html($form_height); ?>px !important;
		padding: <?php echo esc_html($form_padding); ?>px !important;
		border-radius:<?php echo esc_html($form_border_radius); ?>px;
		<?php if ($form_shadow != '') { ?>
		box-shadow: <?php echo esc_html($form_shadow_offset_x); ?>px <?php echo esc_html($form_shadow_offset_y); ?>px <?php echo esc_html($form_shadow_blur); ?>px <?php echo esc_html($form_shadow_color); ?>;
		<?php } else { ?>
		box-shadow:none;
		<?php } ?>
		border-width: <?php echo esc_html($form_border_width); ?>px !important;
		border-color: <?php echo esc_html($form_border_color); ?> !important;
		 margin-top:0;
		 display: flex;
		flex-direction: column;
		justify-content: center;
		}
		
		#login {
		width: <?php echo esc_html($form_width); ?>px !important;
		}
		
		.login form .input, .login input[type="text"], .login input[type="password"] {
		background: <?php echo esc_html($field_bg); ?> !important;
		color: <?php echo esc_html($field_color); ?> !important;
		border-radius:<?php echo esc_html($field_border_radius); ?>px;
		border-width:<?php echo esc_html($field_border_width); ?>px!important;
		border-style:solid;
		border-color:<?php echo esc_html($field_border_color); ?>!important;
		box-shadow:none!important;
		}
		.login form .input:focus, .login input[type="text"]:focus, .login input[type="password"]:focus {
		border-color:<?php echo esc_html($field_border_color_focus); ?>!important;
		box-shadow:none!important;
		}
		
		.login label {
		color: <?php echo esc_html($label_color); ?> !important;
		font-size:<?php echo esc_html($label_font_size); ?>px!important;
		letter-spacing:<?php echo esc_html($label_lettersp); ?>px;
		text-transform:<?php echo esc_html($label_tt); ?>;
		}
		
		.wp-core-ui .button-primary {
		font-size:<?php echo esc_html($button_font_size); ?>px!important;
		letter-spacing:<?php echo esc_html($button_lettersp); ?>px!important;
		border-radius:<?php echo esc_html($button_border_radius); ?>px!important;
		border-width:<?php echo esc_html($button_border_width); ?>px!important;
		background: <?php echo esc_html($button_bg); ?> !important;
		border-color: <?php echo esc_html($button_border); ?> !important;
		box-shadow: none!important;
		color: <?php echo esc_html($button_color); ?> !important;
		text-transform:<?php echo esc_html($button_tt); ?>;
		text-shadow: none!important;
		display:inline-block;
		height:auto!important;
		line-height:1!important;
		padding:8px 18px!important;
		}
		
		.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
		background: <?php echo esc_html($button_hover_bg); ?> !important;
		border-color: <?php echo esc_html($button_hover_border); ?> !important;
		color: <?php echo esc_html($button_hover_color); ?> !important;
		}
		
		.login #backtoblog a, .login #nav a, .privacy-policy-link {
		color: <?php echo esc_html($other_color); ?> !important;
		}
		
		.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover, .privacy-policy-link:hover  {
		color: <?php echo esc_html($other_color_hover); ?> !important;
		}
	</style>
	
	<?php
}
add_action( 'login_enqueue_scripts', 'dtb_login_css' );