<?php
$wp_customize->add_setting( 'dtb_customize_title_back_to_top', array(
	'default' => '',
	'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_back_to_top', array(
	'label' => __( 'Back to Top Button', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));

$wp_customize->add_setting( 'dtb_customize_back_to_top_style', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_back_to_top_style', array(
	'label' => __('Button Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_footer',
	'choices'	=> array(
		'default'    => 'Default - Icon',
		'text'    => 'Button with Text',
	)
));

$wp_customize->add_setting( 'dtb_customize_back_to_top_icon', array(
	'default'       => '2',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Icon_Picker_Option ( $wp_customize, 'dtb_customize_back_to_top_icon', array(
	'label'	      => esc_html__( 'Select Icon', 'Divi' ),
	'section'     => 'dtb_footer',
	'type'			=> 'icon_picker',
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_icon_size', array(
	'default' => 30,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_icon_size', array(
	'label' => __('Button Icon Size', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_back_to_top_txt', array(
	'default' => 'TOP',
	'capability'    => 'edit_theme_options',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_back_to_top_txt', array(
	'label' => __('Button Text', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'text'
));

$wp_customize->add_setting( 'et_divi[btt_btn_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[btt_btn_font]', array(
	'label'		=> esc_html__( 'Button Font', 'Divi' ),
	'section'	=> 'dtb_footer',
	'settings'	=> 'et_divi[btt_btn_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));

$wp_customize->add_setting( 'dtb_customize_btt_btn_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_btt_btn_font_weight', array(
	'label'	      => __('Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_footer',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_back_to_top_txt_size', array(
	'default' => 14,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_txt_size', array(
	'label' => __('Button Text Size', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 8,
		'max'  => 30,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_btt_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_btt_font_lettersp', array(
	'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_btt_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_btt_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_footer',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_distance_right', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_distance_right', array(
	'label' => __('Distance from the right side', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_distance_bottom', array(
	'default' => 100,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_distance_bottom', array(
	'label' => __('Distance from the bottom', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_padding', array(
	'default' => 5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_padding', array(
	'label' => __('Button Padding', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_bg', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_bg', array(
	'label' => __('Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_bg'
)));

$wp_customize->add_setting( 'dtb_customize_back_to_top_icon_col', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_icon_col', array(
	'label' => __('Button Icon/Text Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_icon_col'
)));	
$wp_customize->add_setting( 'dtb_modcustomize_back_to_top_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_back_to_top_shadow', array(
    'label' => __('Add Box Shadow','divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));
$wp_customize->add_setting( 'dtb_customize_back_to_top_shadow_col', array(
	'default' => 'rgba(0,0,0,0.2);',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_shadow_col', array(
	'label' => __('Button Box Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_shadow_col'
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_shadow_offset_y', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_shadow_offset_y', array(
	'label' => __('Button Box Shadow Offset-Y', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_shadow_offset_x', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_shadow_offset_x', array(
	'label' => __('Button Box Shadow Offset-X', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -50,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_shadow_blur', array(
	'default' => 20,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_shadow_blur', array(
	'label' => __('Button Box Shadow Blur', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_back_to_top_border', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_back_to_top_border', array(
    'label' => __('Change Button Border', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_footer'
));

$wp_customize->add_setting( 'dtb_customize_back_to_top_border_radius', array(
	'default' => 5,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_border_radius', array(
	'label' => __('Button Border Radius', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_back_to_top_border_width', array(
	'label' => __('Button Border Width','divi-toolbox'),
	'section' => 'dtb_footer',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_border_col', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_border_col', array(
	'label' => __('Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_border_col'
)));
$wp_customize->add_setting( 'dtb_customize_btt_hover_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_btt_hover_title', array(
	'label' => __( 'Hover', 'divi-toolbox' ),
	'section' => 'dtb_footer'
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_bg_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_bg_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_bg_hover'
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_icon_col_hover', array(
	'default' => '#ffffff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_icon_col_hover', array(
	'label' => __('Button Icon/Text Hover Color', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_icon_col_hover'
)));
$wp_customize->add_setting( 'dtb_customize_back_to_top_border_col_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_back_to_top_border_col_hover', array(
	'label' => __('Button Border Color on Hover', 'divi-toolbox'),
	'section' => 'dtb_footer',
	'settings' => 'dtb_customize_back_to_top_border_col_hover'
)));

$wp_customize->add_setting( 'dtb_customize_back_to_top_hover', array(
	'default' => 'none',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_back_to_top_hover', array(
	'label' => __('Button Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_footer',
	'choices'	=> array(
	'none'    => 'Default / None',
	'grow'    => 'Grow',
	'shrink'    => 'Shrink',
	'move_up'    => 'Move Up',
	'move_down'    => 'Move Down'
	)
));