<?php
$wp_customize->add_setting( 'dtb_customize_title_sidebar', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_sidebar', array(
	'label' => __( 'Sidebar', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sidebar_border', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sidebar_border', array(
    'label' => __('Remove Sidebar Border', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_modcustomize_sidebar_shadow', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sidebar_shadow', array(
    'label' => __('Add Sidebar Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_sidebar_shadow_color', array(
	'default' => 'rgba(0,0,0,0.05)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_shadow_color', array(
	'label' => __('Sidebar Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_shadow_blur', array(
	'default' => 30,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_shadow_blur', array(
	'label' => __('Sidebar Shadow Blur Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 70,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_padding', array(
	'default' => 30,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_padding', array(
	'label' => __('Sidebar Inner Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
// Sidebar Widgets
$wp_customize->add_setting( 'dtb_customize_title_sidebar_widget', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_sidebar_widget', array(
	'label' => __( 'Sidebar Widgets', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'et_divi[sidebar_header_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[sidebar_header_font]', array(
	'label'		=> esc_html__( 'Sidebar Headers Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[sidebar_header_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));

$wp_customize->add_setting( 'dtb_customize_sidebar_header_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_sidebar_header_font_weight', array(
	'label'	      => __('Sidebar Headers Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_size', array(
	'default' => 18,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_header_size', array(
	'label' => __('Sidebar Headers Font Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 60,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_header_lettersp', array(
	'label' => __( 'Sidebar Headers Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_sidebar_header_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_sidebar_header_tt', array(
	'label' => __( 'Sidebar Headers Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_color', array(
	'default' => 'rgba(0,0,0,0.8)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_header_color', array(
	'label' => __('Sidebar Headers Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_header_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_style', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_sidebar_header_style', array(
	'label' => __('Sidebar Headers Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
	'choices' => array(
		'default' => 'Default',
		'boxed' => 'Boxed',
		'divider' => 'With Divider'
	)
));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_boxed_bg', array(
	'default' => 'rgba(11,37,81,0.04)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_header_boxed_bg', array(
	'label' => __('Headers Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_header_boxed_bg'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_boxed_padding', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_header_boxed_padding', array(
	'label' => __('Headers Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_header_boxed_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_header_boxed_border_radius', array(
	'label' => __('Headers Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_divider_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_divider_color', array(
	'label' => __('Headers Divider Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_divider_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_divider_lenght', array(
	'default' => 100,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_divider_lenght', array(
	'label' => __('Headers Divider Lenght', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 250,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_divider_height', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_divider_height', array(
	'label' => __('Headers Divider Height', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_divider_border', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_divider_border', array(
	'label' => __('Headers Divider Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widgets_style', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_sidebar_widgets_style', array(
	'label' => __('Sidebar Widgets Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
	'choices' => array(
		'default' => 'Default',
		'boxed' => 'Boxed'
	)
));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_bg', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_widget_bg', array(
	'label' => __('Widget Box Background', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_widget_bg'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_shadow_color', array(
	'default' => 'rgba(0,0,0,0.05)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_widget_shadow_color', array(
	'label' => __('Widget Box Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_widget_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_shadow_offset_x', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_widget_shadow_offset_x', array(
	'label' => __('Widget Box Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_shadow_offset_y', array(
	'default' => 10,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_widget_shadow_offset_y', array(
	'label' => __('Widget Box Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_shadow_blur', array(
	'default' => 60,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_widget_shadow_blur', array(
	'label' => __('Widget Box Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_margin', array(
	'default' => 40,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_widget_margin', array(
	'label' => __('Widget Box Bottom Margin', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_link', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_widget_link', array(
	'label' => __('Sidebar Widget Links Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_widget_link'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_widget_link_hover', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_widget_link_hover', array(
	'label' => __('Widget Links Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_widget_link_hover'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sidebar_add_icons', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sidebar_add_icons', array(
    'label' => 'Add Link Icon on Hover',
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_sidebar_icon', array(
	'default'       => 'E',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Icon_Picker_Option ( $wp_customize, 'dtb_customize_sidebar_icon', array(
	'label'	      => esc_html__( 'Select Icon', 'Divi' ),
	'section'     => 'dtb_blog',
	'type'			=> 'icon_picker',
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_icon_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_icon_color', array(
	'label' => __('Icon Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_icon_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_icon_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_icon_size', array(
	'label' => __('Icon Size', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));
//Sidebar Search
$wp_customize->add_setting( 'dtb_customize_title_sidebar_search', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_sidebar_search', array(
	'label' => __( 'Sidebar Search', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_sidebar_search', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_sidebar_search', array(
    'label' => __('Customize Search Widget', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_bg', array(
	'default' => 'rgba(189,200,213,0.26)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_search_bg', array(
	'label' => __('Search Widget Input Background', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_search_bg'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_txt', array(
	'default' => 'rgba(0,0,0,0.7)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_search_txt', array(
	'label' => __('Search Widget Input Text', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_search_txt'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_height', array(
	'default' => 45,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_search_height', array(
	'label' => __('Search Widget Height', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 80,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_border_radius', array(
	'default' => 4,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_search_border_radius', array(
	'label' => __('Search Widget Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_border', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sidebar_search_border', array(
	'label' => __('Search Input Border Width', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_border_color', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_search_border_color', array(
	'label' => __('Search Input Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_search_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_btn_bg', array(
	'default' => '#21C9E2',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_search_btn_bg', array(
	'label' => __('Search Button Background', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_search_btn_bg'
)));
$wp_customize->add_setting( 'dtb_customize_sidebar_search_icon', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sidebar_search_icon', array(
	'label' => __('Search Button Icon Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_sidebar_search_icon'
)));