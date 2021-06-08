<?php
$dtb_enable_hamburger_icon_val = dtb_get_option('dtb_enable_hamburger_icon');
// Search Icon
if (($dtb_mobile_enable == '1') && (($show_search_icon != '') || ($show_search_icon != '0'))) {
	$wp_customize->add_setting( 'dtb_customzie_title_search_icon', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customzie_title_search_icon', array(
		'label' => __( 'Menu Bar Search Icon', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_search_icon_hide', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_search_icon_hide', array(
	    'label' => __('Hide Search Icon on mobile', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_mobile'
	));
	$wp_customize->add_setting( 'dtb_customize_search_icon_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_search_icon_color', array(
		'label' => __('Search Icon Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_search_icon_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_search_icon_color_hover', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_search_icon_color_hover', array(
		'label' => __('Search Icon Hover Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_search_icon_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_search_close_icon_color', array(
		'default' => '#BDC8D5',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_search_close_icon_color', array(
		'label' => __('Search Close Icon Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_search_close_icon_color'
	)));
	$wp_customize->add_setting( 'dtb_customize_search_close_icon_color_hover', array(
		'default' => '#BDC8D5',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_search_close_icon_color_hover', array(
		'label' => __('Search Close Hover Icon Color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_search_close_icon_color_hover'
	)));
	$wp_customize->add_setting( 'dtb_customize_search_icon_size', array(
		'default' => 'default',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_search_icon_size', array(
		'label' => __('Search & Close Icon Size', 'divi-toolbox'),
		'type' => 'radio',
		'section' => 'dtb_mobile',
		'choices' => array(
			'default'   => 'Default',
			'large'      => 'Large'
		)
	));
	$wp_customize->add_setting( 'dtb_customize_search_font_color', array(
		'default' => '#BDC8D5',
		'type' => 'option', 
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_search_font_color', array(
		'label' => __('Search Input Field Text color', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'settings' => 'dtb_customize_search_font_color'
	)));

} // endif show_search_icon




// Hamburger Icon
$wp_customize->add_setting( 'dtb_customize_title_hamburger', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_hamburger', array(
	'label' => __( 'Hamburger Icon', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));
$wp_customize->add_setting( 'dtb_customize_m_m_hamburger_color', array(
	'default' => '',
	'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_hamburger_color', array(
	'label' => __( 'Hamburger Icon Color', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));

$wp_customize->add_setting( 'dtb_customize_hamburger_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_hamburger_color', array(
	'label' => __('Hamburger Icon Color Closed', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_hamburger_color'
)));
$wp_customize->add_setting( 'dtb_customize_hamburger_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_hamburger_color_hover', array(
	'label' => __('Hamburger Icon Color Closed Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_hamburger_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_hamburger_color_open', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_hamburger_color_open', array(
	'label' => __('Hamburger Icon Color Opened', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_hamburger_color_open'
)));
$wp_customize->add_setting( 'dtb_customize_hamburger_color_open_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_hamburger_color_open_hover', array(
	'label' => __('Hamburger Icon Color Opened Hover', 'divi-toolbox'),
	'section' => 'dtb_mobile',
	'settings' => 'dtb_customize_hamburger_color_open_hover'
)));


	
$wp_customize->add_setting( 'dtb_customize_m_m_hamburger_size', array(
	'default' => '',
	'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_hamburger_size', array(
	'label' => __( 'Hamburger Icon Size', 'divi-toolbox' ),
	'section' => 'dtb_mobile'
)));


if ($dtb_enable_hamburger_icon_val == '') {
	$wp_customize->add_setting( 'dtb_customize_hamburger_size', array(
		'default' => 'default',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'dtb_customize_hamburger_size', array(
		'label' => __('Choose Icon Size', 'divi-toolbox'),
		'type' => 'radio',
		'section' => 'dtb_mobile',
		'choices' => array(
			'default'   => 'Default',
			'large'      => 'Large'
		)
	));

}
else {


	$wp_customize->add_setting( 'dtb_customize_hamburger_layer_width', array(
		'default' => 20,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_hamburger_layer_width', array(
		'label' => __('Hamburger Layer Width', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 60,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_hamburger_layer_height', array(
		'default' => 2,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_hamburger_layer_height', array(
		'label' => __('Hamburger Layer Height', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 15,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_hamburger_layer_spacing', array(
		'default' => 4,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_hamburger_layer_spacing', array(
		'label' => __('Hamburger Layer Spacing', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 20,
			'step' => 1
		)
	)));
	$wp_customize->add_setting( 'dtb_customize_hamburger_border_radius', array(
		'default' => 2,
		'type'			  => 'option',
		'capability'    => 'edit_theme_options'
	));
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_hamburger_border_radius', array(
		'label' => __('Hamburger Layer Border Radius', 'divi-toolbox'),
		'section' => 'dtb_mobile',
		'type'			=> 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 15,
			'step' => 1
		)
	)));
	
}

if (($dtb_enable_custom_m_menu == '1') && ($dtb_m_mobile_trigger != '1')) {
	$wp_customize->add_setting( 'dtb_customize_m_m_hamburger_align_t', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_m_m_hamburger_align_t', array(
		'label' => __( 'Hamburger Icon inside the Mobile Menu', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_show', array(
		'default' => '1',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_m_m_hamburger_show', array(
	    'label' => __('Show Close Icon inside the Mobile Menu', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_mobile'
	));
	
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_align', array(
		'default' => 'right',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_m_m_hamburger_align', array(
		'label' => __( 'Hamburger Icon Alignment', 'divi-toolbox' ),
		'section' => 'dtb_mobile',
		'choices' => $text_align
	)));



	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_margin', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Label( $wp_customize, 'dtb_modcustomize_m_m_hamburger_margin', array(
		'label' => __( 'Hamburger Icon Offset', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_margin_top', array(
		'default' => '14px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_hamburger_margin_top', array(
		'label' => __( 'Top', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_margin_right', array(
		'default' => '10px',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_hamburger_margin_right', array(
		'label' => __( 'Right', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_margin_bottom', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_hamburger_margin_bottom', array(
		'label' => __( 'Bottom', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));
	$wp_customize->add_setting( 'dtb_modcustomize_m_m_hamburger_margin_left', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( new Toolbox_Mini_Text( $wp_customize, 'dtb_modcustomize_m_m_hamburger_margin_left', array(
		'label' => __( 'Left', 'divi-toolbox' ),
		'section' => 'dtb_mobile'
	)));


}