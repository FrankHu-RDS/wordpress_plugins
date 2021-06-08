<?php
$wp_customize->add_setting( 'dtb_customize_title_footer_widgets', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_footer_widgets', array(
	'label' => __( 'Footer Widgets', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_t_widgets_headers', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_widgets_headers', array(
	'label' => __( 'Widgets\' Headers', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'et_divi[footer_header_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[footer_header_font]', array(
	'label'		=> esc_html__( 'Widget Headers Font', 'Divi' ),
	'section'	=> 'dtb_footer',
	'settings'	=> 'et_divi[footer_header_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_widget_header_font_weight', array(
	'default'       => '500',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_widget_header_font_weight', array(
	'label'	      => __('Headers Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_footer',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_widget_header_font_size', array(
	'default' => 18,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_header_font_size', array(
	'label' => __( 'Headers Font Size', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_widget_header_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_header_font_lettersp', array(
	'label' => __( 'Headers Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_widget_header_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_widget_header_tt', array(
	'label' => __( 'Headers Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'choices' => $text_transform
)));	
$wp_customize->add_setting( 'dtb_customize_widget_header_style', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_widget_header_style', array(
	'label' => __('Widgets Header Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_footer',
	'choices' => array(
		'default' => 'Default',
		'boxed' => 'Boxed',
		'divider' => 'With Divider'
	)
));
$wp_customize->add_setting( 'dtb_customize_t_widgets_headers_boxed', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_widgets_headers_boxed', array(
	'label' => __( 'Boxed Headers', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_widget_boxed_bg', array(
	'default' => 'rgba(0,0,0,0.3);',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_widget_boxed_bg', array(
	'label' => __('Header Background Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_widget_boxed_bg'
)));
$wp_customize->add_setting( 'dtb_customize_widget_boxed_padding', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_boxed_padding', array(
	'label' => __('Header Padding', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 500,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_widget_boxed_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_boxed_border_radius', array(
	'label' => __('Header Border Radius', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_t_widgets_headers_divider', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_widgets_headers_divider', array(
	'label' => __( 'Headers\' Dividers', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_widget_divider_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_widget_divider_color', array(
	'label' => __('Header Divider Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_widget_divider_color'
)));
$wp_customize->add_setting( 'dtb_customize_widget_divider_lenght', array(
	'default' => 100,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_divider_lenght', array(
	'label' => __('Header Divider Lenght', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 250,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_widget_divider_height', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_divider_height', array(
	'label' => __('Header Divider Height', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_widget_divider_border', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_divider_border', array(
	'label' => __('Header Divider Border Radius', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_t_widgets_menu_footer', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_t_widgets_menu_footer', array(
	'label' => __( 'Menu Widgets', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_modcustomize_widget_remove_bullet', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_widget_remove_bullet', array(
    'label' => __('Remove Menu Bullets', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'dtb_customize_widget_txt_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_widget_txt_hover', array(
	'label' => __('Links Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_widget_txt_hover'
)));
$wp_customize->add_setting( 'dtb_modcustomize_widget_add_icons', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_widget_add_icons', array(
    'label' => __('Add Link Icon on Hover', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'dtb_customize_widget_icon', array(
	'default'       => 'E',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Icon_Picker_Option ( $wp_customize, 'dtb_customize_widget_icon', array(
	'label'	      => esc_html__( 'Select Icon', 'Divi' ),
	'section'     => 'dtb_footer',
	'type'			=> 'icon_picker',
)));
$wp_customize->add_setting( 'dtb_customize_widget_icon_color', array(
	'default' => 'rgba(255,255,255,0.3)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_widget_icon_color', array(
	'label' => __('Icon Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_widget_icon_color'
)));
$wp_customize->add_setting( 'dtb_customize_widget_icon_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_widget_icon_size', array(
	'label' => __('Icon Size', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));

// Footer Menu
$wp_customize->add_setting( 'dtb_customize_title_footer_menu', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_footer_menu', array(
	'label' => __( 'Footer Menu', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'et_divi[footer_menu_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[footer_menu_font]', array(
	'label'		=> esc_html__( 'Footer Menu Font', 'Divi' ),
	'section'	=> 'dtb_footer',
	'settings'	=> 'et_divi[footer_menu_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_font_weight', array(
	'default'       => '500',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_footer_menu_font_weight', array(
	'label'	      => __('Footer Menu Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_footer',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_modcustomize_footer_menu_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_footer_menu_tt', array(
	'label' => __( 'Footer Menu Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'choices' => $text_transform
)));

$wp_customize->add_setting( 'dtb_modcustomize_footer_menu_shadow', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_footer_menu_shadow', array(
    'label' => __('Display Footer Menu Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'dtb_customize_footer_menu_shadow_color', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_footer_menu_shadow_color', array(
	'label' => __('Footer Menu Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_footer_menu_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_shadow_offset_y', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_footer_menu_shadow_offset_y', array(
	'label' => __('Footer Menu Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_footer_menu_shadow_offset_x', array(
	'label' => __('Footer Menu Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_shadow_blur', array(
	'default' => 35,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_footer_menu_shadow_blur', array(
	'label' => __('Footer Menu Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));	
$wp_customize->add_setting( 'dtb_modcustomize_center_footer_menu', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_center_footer_menu', array(
    'label' => __('Center Align Footer Menu', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'dtb_customize_footer_menu_padding', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_footer_menu_padding', array(
	'label' => __('Footer Menu Items Padding', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_active_bg', array(
	'default' => 'rgba(0,0,0,0)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_footer_menu_active_bg', array(
	'label' => __('Active Link Background Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_footer_menu_active_bg'
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_txt_hover', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_footer_menu_txt_hover', array(
	'label' => __('Footer Menu Link Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_footer_menu_txt_hover'
)));
$wp_customize->add_setting( 'dtb_customize_footer_menu_bg_hover', array(
	'default' => 'rgba(0,0,0,0.1)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_footer_menu_bg_hover', array(
	'label' => __('Link Hover Background Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_footer_menu_bg_hover'
)));