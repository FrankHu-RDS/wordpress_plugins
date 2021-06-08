<?php
$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_links', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_links', array(
	'label' => __( 'Mobile Menu Links', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_t_links_container', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_links_container', array(
	'label' => __( 'Mobile Menu Links Container', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_container_margin', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_links_container_margin', array(
	'label' => __( 'Links Container Margin', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_container_margin_top', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_container_margin_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_container_margin_right', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_container_margin_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_container_margin_bottom', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_container_margin_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_container_margin_left', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_container_margin_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_t_links_style', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_links_style', array(
	'label' => __( 'Mobile Menu Links Font Style', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'et_divi[mobile_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[mobile_font]', array(
	'label'		=> esc_html__( 'Links Font', 'Divi' ),
	'section'	=> 'dtb_mobile',
	'settings'	=> 'et_divi[mobile_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_mobile_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_mobile_font_weight', array(
	'label'	      => __('Links Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_mobile_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_font_size', array(
	'label' => __('Links Font Size', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_font_lettersp', array(
	'label' => __( 'Links Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_mobile_font_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_mobile_font_tt', array(
	'label' => __( 'Links Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_mobile',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_align', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_links_align', array(
	'label' => __( 'Links Text Alignment', 'divi-toolbox' ),
	'section' => 'dtb_mobile',
	'choices' => $text_align
)));


$wp_customize->add_setting( 'dtb_customize_m_m_t_links_spacing', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_links_spacing', array(
	'label' => __( 'Mobile Menu Links Spacing', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_padding_top', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_padding_top', array(
	'label' => __('Links Top Padding', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_padding_right', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_padding_right', array(
	'label' => __('Links Right Padding', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_padding_bottom', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_padding_bottom', array(
	'label' => __('Links Bottom Padding', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_padding_left', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_mobile_padding_left', array(
	'label' => __('Links Left Padding', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_links_margin_bottom', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_links_margin_bottom', array(
	'label' => __('Links Bottom Margin', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));

$wp_customize->add_setting( 'dtb_customize_m_m_t_links_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_links_border', array(
	'label' => __( 'Mobile Menu Links Border', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_links_border', array(
	'label' => __( 'Links Border Width', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_border_top', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_border_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_border_right', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_border_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_border_bottom', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_border_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_links_border_left', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_links_border_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_links_border_radius', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_links_border_radius', array(
	'label' => __('Links Border Radius', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_mobile_separator', array(
	'default' => 'rgba(0,0,0,0.02)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_separator', array(
	'label' => __('Links Border Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_separator'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_t_links_colors', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_links_colors', array(
	'label' => __( 'Mobile Menu Links Colors', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_font_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_font_color', array(
	'label' => __('Links Font Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_font_color'
)));

$wp_customize->add_setting( 'dtb_customize_mobile_font_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_font_color_hover', array(
	'label' => __('Links Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_font_color_hover'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_link_bg_color', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_link_bg_color', array(
	'label' => __('Links Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_link_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_bg_hover', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_menu_bg_hover', array(
	'label' => __('Links Background Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_menu_bg_hover'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_t_parent_links', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_parent_links', array(
	'label' => __( 'Parent Links Style', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_parent_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_parent_color', array(
	'label' => __('Parent Links Font Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_parent_color'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_menu_parent_bg', array(
	'default' => 'rgba(0,0,0,0.01)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_mobile_menu_parent_bg', array(
	'label' => __('Parent Links Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_mobile_menu_parent_bg'
)));
$wp_customize->add_setting( 'dtb_customize_mobile_sub_parent_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_mobile_sub_parent_font_weight', array(
	'label'	      => __('Parent Links Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $font_weights
));