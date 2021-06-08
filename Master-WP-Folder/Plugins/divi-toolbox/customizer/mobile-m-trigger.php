<?php

$wp_customize->add_setting( 'dtb_customize_title_mobile_menu_trigger', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_mobile_menu_trigger', array(
	'label' => __( 'Mobile Menu Trigger', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_container', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_trigger_container', array(
	'label' => __( 'Mobile Menu Trigger Position', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_position', array(
	'default' => 'top',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_m_m_trigger_position', array(
	'label' => __('Trigger Position', 'divi-toolbox'),
	'type' => 'radio',
	'section' => 'dtb_mobile',
	'choices' => array(
		'top'   => 'Top',
		'bottom'   => 'Bottom'
	)
));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_align', array(
	'default' => 'right',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_trigger_align', array(
	'label' => __( 'Trigger Alignment', 'divi-toolbox' ),
	'section' => 'dtb_mobile',
	'choices' => $text_align
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_trigger_container_margin', array(
	'label' => __( 'Trigger Container Margin', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin_top', array(
	'default' => '5px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_container_margin_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin_right', array(
	'default' => '20px',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_container_margin_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin_bottom', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_container_margin_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_container_margin_left', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_container_margin_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_size', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_trigger_size', array(
	'label' => __( 'Mobile Menu Trigger Size', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_width', array(
	'default' => 50,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_width', array(
	'label' => __('Trigger Width', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 300,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_height', array(
	'default' => 50,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_height', array(
	'label' => __('Trigger Height', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 20,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_colors', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_trigger_colors', array(
	'label' => __( 'Mobile Menu Trigger Colors', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_bg_color', array(
	'default' => 'rgba(255,255,255,0.9)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_bg_color', array(
	'label' => __('Trigger Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_bg_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_bg_color_hover', array(
	'label' => __('Trigger Background Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_bg_color_hover'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_trigger_bg_color_open', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_bg_color_open', array(
	'label' => __('Opened Trigger Background Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_bg_color_open'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_bg_color_hover_open', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_bg_color_hover_open', array(
	'label' => __('Opened Trigger Background Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_bg_color_hover_open'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_trigger_text', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_trigger_text', array(
	'label' => __( 'Mobile Menu Trigger Text', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_add_text', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_trigger_add_text', array(
    'label' => __('Add Text', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_text', array(
	'default' => 'MENU',
	'capability'    => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_trigger_text', array(
	'label' => 'Trigger Text',
	'section' => 'dtb_mobile',
	'type'        => 'text'
));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_text_position', array(
	'default' => 'right',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_m_m_trigger_text_position', array(
	'label' => __('Trigger Text Position', 'divi-toolbox'),
	'type' => 'radio',
	'section' => 'dtb_mobile',
	'choices' => array(
		'left'   => 'Left side',
		'right'   => 'Right side',
		'above'   => 'Above the Icon',
		'below'   => 'Below the Icon'
	)
));
$wp_customize->add_setting( 'et_divi[m_m_trigger_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[m_m_trigger_font]', array(
	'label'		=> esc_html__( 'Trigger Text Font', 'Divi' ),
	'section'	=> 'dtb_mobile',
	'settings'	=> 'et_divi[m_m_trigger_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_m_m_trigger_font_weight', array(
	'label'	      => __('Trigger Text Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_mobile',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_font_size', array(
	'default' => 15,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_font_size', array(
	'label' => __('Trigger Text Font Size', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_font_lettersp', array(
	'label' => __( 'Trigger Text Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_txt_color', array(
	'default' => '#000',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_txt_color', array(
	'label' => __('Trigger Text Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_txt_color'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_txt_color_hover', array(
	'default' => '#000',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_txt_color_hover', array(
	'label' => __('Trigger Text Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_txt_color_hover'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_trigger_txt_color_open', array(
	'default' => '#000',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_txt_color_open', array(
	'label' => __('Opened Trigger Text Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_txt_color_open'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_txt_color_hover_open', array(
	'default' => '#000',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_txt_color_hover_open', array(
	'label' => __('Opened Trigger Text Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_txt_color_hover_open'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_trigger_border', array(
	'label' => __( 'Mobile Menu Trigger Border', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_border', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_trigger_border', array(
	'label' => __( 'Trigger Border Width', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_border_top', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_border_top', array(
	'label' => __( 'Top', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_border_right', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_border_right', array(
	'label' => __( 'Right', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_border_bottom', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_border_bottom', array(
	'label' => __( 'Bottom', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_border_left', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_trigger_border_left', array(
	'label' => __( 'Left', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_border_radius', array(
	'label' => __('Trigger Border Radius', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_border_color', array(
	'label' => __('Trigger Border Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_border_color_hover', array(
	'label' => __('Trigger Border Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_border_color_hover'
)));

$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border_color_open', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_border_color_open', array(
	'label' => __('Opened Trigger Border Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_border_color_open'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_border_color_hover_open', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_border_color_hover_open', array(
	'label' => __('Opened Trigger Border Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_border_color_hover_open'
)));



$wp_customize->add_setting( 'dtb_customize_m_m_t_trigger_shadow', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_t_trigger_shadow', array(
	'label' => __( 'Mobile Menu Trigger Shadow', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_modcustomize_m_m_trigger_shadow', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_m_m_trigger_shadow', array(
    'label' => __('Add Menu Trigger Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_mobile'
));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_shadow_offset_x', array(
	'label' => __('Menu Trigger Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_shadow_offset_y', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_shadow_offset_y', array(
	'label' => __('Menu Trigger Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_shadow_blur', array(
	'default' => 50,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_m_m_trigger_shadow_blur', array(
	'label' => __('Menu Trigger Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_shadow_color', array(
	'default' => 'rgba(0,0,0,0.15)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_shadow_color', array(
	'label' => __('Menu Trigger Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_shadow_color'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_trigger_shadow_color_open', array(
	'default' => 'rgba(0,0,0,0.15)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_m_m_trigger_shadow_color_open', array(
	'label' => __('Opened Menu Trigger Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_m_m_trigger_shadow_color_open'
)));