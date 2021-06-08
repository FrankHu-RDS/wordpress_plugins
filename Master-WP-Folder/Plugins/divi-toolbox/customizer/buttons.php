<?php
$wp_customize->add_setting( 'dtb_customize_title_buttons', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_buttons', array(
	'label' => __( 'Buttons', 'divi-toolbox' ),
	'section' => 'dtb_modules'
)));
if ($dtb_sec_btn == '1') { 
	$wp_customize->add_setting( 'dtb_customize_title_default_button', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_default_button', array(
		'label' => __( 'Default Buttons', 'divi-toolbox' ),
		'section' => 'dtb_modules'
	)));
}
$wp_customize->add_setting( 'dtb_customize_buttons_font_weight', array(
	'default'       => 500,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_buttons_font_weight', array(
	'label'	      => __('Buttons Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_modules',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_buttons_hover', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_buttons_hover', array(
	'label' => __('Buttons Hover Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_modules',
	'choices' => array(
		'default'   => 'Default - None',
		'grow'      => 'Grow',
		'shrink'    => 'Shrink',
		'move_up'   => 'Move Up',
		'move_down' => 'Move Down',
		'wobble'    => 'Wobble',
		'heartbeat' => 'Heartbeat',
		'jello'     => 'Jello',
		'pulse'     => 'Pulse'
	)
));


if ($dtb_sec_btn == '1') { 
	$wp_customize->add_setting( 'dtb_customize_itle_sec_button', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_itle_sec_button', array(
		'label' => __( 'Secondary Buttons', 'divi-toolbox' ),
		'section' => 'dtb_modules'
	)));
	
	$wp_customize->add_setting( 'et_divi[sec_btn_font]', array(
		'default'		=> '',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'et_sanitize_font_choices',
	));
	$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[sec_btn_font]', array(
		'label'		=> esc_html__( 'Button Font', 'Divi' ),
		'section'	=> 'dtb_modules',
		'settings'	=> 'et_divi[sec_btn_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices,
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_weight', array(
		'default'       => '500',
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( 'dtb_customize_sec_btn_font_weight', array(
		'label'	      => __('Button Font Weight', 'divi-toolbox'),
		'section'     => 'dtb_modules',
		'type'        => 'select',
		'choices' => $font_weights
	));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_size', array(
		'default' => 15,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_font_size', array(
		'label' => __( 'Button Font Size', 'divi-toolbox' ),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 40,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_lettersp', array(
		'default' => 0,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_font_lettersp', array(
		'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_sec_btn_tt', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_sec_btn_tt', array(
		'label' => __( 'Button Text Transform', 'divi-toolbox' ),
		'section' => 'dtb_modules',
		'choices' => $text_transform
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_color', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_font_color', array(
		'label' => __('Button Font Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_font_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_bg_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_bg_color', array(
		'label' => __('Button Background Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_bg_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_border_radius', array(
		'default' => 5,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_border_radius', array(
		'label' => __('Button Border Radius', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_border_width', array(
		'default' => 2,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_border_width', array(
		'label' => __('Button Border Width', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_border_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_border_color', array(
		'label' => __('Button Border Color','divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_border_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_icon_enable', array(
		'default' => 'yes',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_sec_btn_icon_enable', array(
		'label' => __('Add Button Icon','divi-toolbox'),
		'type' => 'select',
		'section' => 'dtb_modules',
		'choices' => array(
			'yes'   => 'Yes',
			'no'      => 'No'
		)
	));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_icon', array(
		'default'       => '5',
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Icon_Picker_Option ( $wp_customize, 'dtb_customize_sec_btn_icon', array(
		'label'	      => esc_html__( 'Select Icon', 'Divi' ),
		'section'     => 'dtb_modules',
		'type'        => 'icon_picker',
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_icon_color', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_icon_color', array(
		'label' => __('Button Icon Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_icon_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_icon_place', array(
		'default' => 'right',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_sec_btn_icon_place', array(
		'label' => __('Icon Placement', 'divi-toolbox'),
		'type' => 'select',
		'section' => 'dtb_modules',
		'choices' => array(
			'right'   => 'Right',
			'left'      => 'Left'
		)
	));
	$wp_customize->add_setting( 'dtb_modcustomize_sec_btn_icon_show', array(
		'default' => 1,
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_sec_btn_icon_show', array(
	    'label' => __('Only Show Icon on Hover', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_modules'
	));
	$wp_customize->add_setting( 'dtb_customize_title_sec_button_hover', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_sec_button_hover', array(
		'label' => __( 'Secondary Buttons - Hover', 'divi-toolbox' ),
		'section' => 'dtb_modules'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_hover', array(
		'default' => 'default',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_sec_btn_hover', array(
		'label' => __('Button Hover Style', 'divi-toolbox'),
		'type' => 'select',
		'section' => 'dtb_modules',
		'choices' => array(
			'default'   => 'Default - None',
			'grow'      => 'Grow',
			'shrink'    => 'Shrink',
			'move_up'   => 'Move Up',
			'move_down' => 'Move Down',
			'wobble'    => 'Wobble',
			'heartbeat' => 'Heartbeat',
			'jello'     => 'Jello',
			'pulse'     => 'Pulse'
		)
	));

	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_color_hover', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_font_color_hover', array(
		'label' => __('Button Font Hover Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_font_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_bg_color_hover', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_bg_color_hover', array(
		'label' => __('Button Background Hover Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_bg_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_border_color_hover', array(
		'default' => '#21C9E2',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_border_color_hover', array(
		'label' => __('Button Border Hover Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_border_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_icon_color_hover', array(
		'default' => '#fff',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_sec_btn_icon_color_hover', array(
		'label' => __('Button Icon Hover Color', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'settings' => 'dtb_customize_sec_btn_icon_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_border_radius_hover', array(
		'default' => 5,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_border_radius_hover', array(
		'label' => __('Button Hover Border Radius', 'divi-toolbox'),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_sec_btn_font_lettersp_hover', array(
		'default' => 0,
		'type'          => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_sec_btn_font_lettersp_hover', array(
		'label' => __( 'Button Hover Letter Spacing', 'divi-toolbox' ),
		'section' => 'dtb_modules',
		'type'        => 'range',
		'input_attrs' => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1
		)
	)));
} // end buttons