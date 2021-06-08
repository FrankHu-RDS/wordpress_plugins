<?php
$wp_customize->add_setting( 'dtb_customize_title_archives', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_archives', array(
	'label' => __( 'Categories, Archives & Blog List', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'title_blog_title', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'title_blog_title', array(
	'label' => __( 'Post Title', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'et_divi[archive_header_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[archive_header_font]', array(
	'label'		=> esc_html__( 'Post Title Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[archive_header_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_archive_header_font_weight', array(
	'default'       => '400',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_archive_header_font_weight', array(
	'label'	      => __('Title Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_archive_header_font_size', array(
	'default' => 26,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_header_font_size', array(
	'label' => __( 'Title Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_header_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_header_font_lettersp', array(
	'label' => __( 'Title Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_header_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_archive_header_tt', array(
	'label' => __( 'Title Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_archive_header_font_color', array(
	'default' => '#333',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_header_font_color', array(
	'label' => __('Title Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_header_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_title_blog_excerpt', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_blog_excerpt', array(
	'label' => __( 'Blog Post Content', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_hide_excerpt', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_hide_excerpt', array(
    'label' => __('Hide Excerpt Content', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'et_divi[excerpt_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[excerpt_font]', array(
	'label'		=> esc_html__( 'Post Content Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[excerpt_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_excerpt_font_weight', array(
	'default'       => '500',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_excerpt_font_weight', array(
	'label'	      => __('Content Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_excerpt_font_size', array(
	'default' => 14,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_excerpt_font_size', array(
	'label' => __( 'Content Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_excerpt_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_excerpt_font_lettersp', array(
	'label' => __( 'Content Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_excerpt_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_excerpt_tt', array(
	'label' => __( 'Content Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_excerpt_font_color', array(
	'default' => '#666',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_excerpt_font_color', array(
	'label' => __('Content Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_excerpt_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_title_blog_button', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_blog_button', array(
	'label' => __( '"Read More" Button', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_button', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_archive_button', array(
    'label' => __('Add "Read More" Button', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'et_divi[archive_btn_font]', array(
	'default'		=> '',
	'type'			=> 'option',
	'capability'	=> 'edit_theme_options',
	'sanitize_callback' => 'et_sanitize_font_choices',
));
$wp_customize->add_control( new ET_Divi_Select_Option ( $wp_customize, 'et_divi[archive_btn_font]', array(
	'label'		=> esc_html__( 'Button Font', 'Divi' ),
	'section'	=> 'dtb_blog',
	'settings'	=> 'et_divi[archive_btn_font]',
	'type'		=> 'select',
	'choices'	=> $font_choices,
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_font_weight', array(
	'default'       => '600',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_archive_btn_font_weight', array(
	'label'	      => __('Button Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $font_weights
));
$wp_customize->add_setting( 'dtb_customize_archive_btn_font_size', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_btn_font_size', array(
	'label' => __( 'Button Font Size', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_font_lettersp', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_btn_font_lettersp', array(
	'label' => __( 'Button Letter Spacing', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => -5,
		'max'  => 5,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_btn_tt', array(
	'default' => 'none',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Image_Radio( $wp_customize, 'dtb_modcustomize_archive_btn_tt', array(
	'label' => __( 'Button Text Transform', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'choices' => $text_transform
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_font_color', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_font_color', array(
	'label' => __('Button Font Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_font_color'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_padding', array(
	'default' => 8,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_btn_padding', array(
	'label' => __( 'Button Padding', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 2,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_border_radius', array(
	'default' => 3,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_btn_border_radius', array(
	'label' => __( 'Button Border Radius', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_border_width', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_btn_border_width', array(
	'label' => __( 'Button Border Width', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_border_color', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_border_color', array(
	'label' => __('Button Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_border_color'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_bg_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_bg_color', array(
	'label' => __('Button Background Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_bg_color'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_font_color_hover', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_font_color_hover', array(
	'label' => __('Button Font Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_font_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_border_color_hover', array(
	'default' => '#00B5CF',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_border_color_hover', array(
	'label' => __('Button Border Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_border_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_bg_color_hover', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_btn_bg_color_hover', array(
	'label' => __('Button Background Hover Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_btn_bg_color_hover'
)));
$wp_customize->add_setting( 'dtb_customize_archive_btn_hover', array(
	'default' => 'default',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_archive_btn_hover', array(
	'label' => __('Button Hover Style', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
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
$wp_customize->add_setting( 'dtb_customize_title_blog_image', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_blog_image', array(
	'label' => __( 'Featured Image', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));

$dtb_blog_layout = dtb_get_option('dtb_blog_layout');
if (($dtb_blog_layout == 'blog_list_1') || ($dtb_blog_layout == 'blog_list_2') || ($dtb_blog_layout == 'blog_list_3')) { 
	$wp_customize->add_setting( 'dtb_modcustomize_archive_equal_height', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_archive_equal_height', array(
	    'label' => __('Image and content box equal height', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_blog'
	));
}
else {
	$wp_customize->add_setting( 'dtb_modcustomize_equal_archive_img', array(
		'default' => '',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'dtb_modcustomize_equal_archive_img', array(
	    'label' => __('All Images Equal Height', 'divi-toolbox'),
	    'type' => 'checkbox',
	    'section' => 'dtb_blog'
	));
}

$wp_customize->add_setting( 'dtb_modcustomize_archive_overlay', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_archive_overlay', array(
    'label' => __('Add Featured Image Overlay', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_show', array(
	'default' => 'hover',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_archive_overlay_show', array(
	'label' => __('Overlay Behaviour', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
	'choices' => array(
		'hover'    => 'Show on Hover',
		'before'      => 'Hide on Hover',
		'keep'      => 'Always Visible'
		
	)
));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_color', array(
	'default' => 'rgba(0,0,0,0.3)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_overlay_color', array(
	'label' => __('Image Overlay Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_overlay_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_overlay_gradient', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_archive_overlay_gradient', array(
    'label' => __('Use Overlay Gradient', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_gradient_direction', array(
	'default'       => 'to bottom right',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_archive_overlay_gradient_direction', array(
	'label'	      => __('Overlay Gradient Direction', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $gradient
));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_gradient_color1', array(
	'default' => 'rgba(20,40,60,0.3)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_overlay_gradient_color1', array(
	'label' => __('Overlay Gradient Color 1', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_overlay_gradient_color1'
)));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_gradient_color2', array(
	'default' => 'rgba(33,200,226,0.3)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_overlay_gradient_color2', array(
	'label' => __('Overlay Gradient Color 2', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_overlay_gradient_color2'
)));
$wp_customize->add_setting( 'dtb_customize_archive_overlay_blend', array(
	'default'       => 'normal',
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_archive_overlay_blend', array(
	'label'	      => __('Overlay Blend Mode', 'divi-toolbox'),
	'section'     => 'dtb_blog',
	'type'			=> 'select',
	'choices' => $blend_modes
));
$wp_customize->add_setting( 'dtb_customize_archive_img_hover', array(
	'default' => 'none',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'dtb_customize_archive_img_hover', array(
	'label' => __('Image Hover Effect', 'divi-toolbox'),
	'type' => 'select',
	'section' => 'dtb_blog',
	'choices' => array(
		'none'      => 'Default - None',
		'grow'      => 'Grow',
		'zoom'      => 'Zoom-In',
		'zoom_rotate'      => 'Zoom-In & Rotate'
	)
));

$wp_customize->add_setting( 'dtb_customize_title_blog_box', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Descriptions( $wp_customize, 'dtb_customize_title_blog_box', array(
	'label' => __( 'Blog Content Box', 'divi-toolbox' ),
	'section' => 'dtb_blog'
)));
$wp_customize->add_setting( 'dtb_modcustomize_equal_archive_boxed', array(
	'default' => '',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_equal_archive_boxed', array(
    'label' => __('Equalize Box Height', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_bg', array(
	'default' => '#fff',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_boxed_bg', array(
	'label' => __('Content Box Background', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_boxed_bg'
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_padding', array(
	'default' => 25,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_padding', array(
	'label' => __('Content Box Padding', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_border_radius', array(
	'default' => 0,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_border_radius', array(
	'label' => __('Content Box Border Radius', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 150,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_boxed_shadow', array(
	'default' => 1,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_archive_boxed_shadow', array(
    'label' => __('Add Content Box Shadow', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_shadow_offset_x', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_shadow_offset_x', array(
	'label' => __( 'Box Shadow Offset-X', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_shadow_offset_y', array(
	'default' => 12,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_shadow_offset_y', array(
	'label' => __( 'Box Shadow Offset-Y', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_shadow_blur', array(
	'default' => 30,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_shadow_blur', array(
	'label' => __( 'Box Shadow Blur', 'divi-toolbox' ),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_shadow_color', array(
	'default' => 'rgba(0,0,0,0.05)',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_boxed_shadow_color', array(
	'label' => __('Box Shadow Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_boxed_shadow_color'
)));
$wp_customize->add_setting( 'dtb_modcustomize_archive_boxed_border', array(
	'default' => 0,
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( 'dtb_modcustomize_archive_boxed_border', array(
    'label' => __('Add Border', 'divi-toolbox'),
    'type' => 'checkbox',
    'section' => 'dtb_blog'
));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_border_width', array(
	'default' => 2,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dtb_customize_archive_boxed_border_width', array(
	'label' => __('Content Border Width', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'type'			=> 'range',
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1
	)
)));
$wp_customize->add_setting( 'dtb_customize_archive_boxed_border_color', array(
	'default' => '#BDC8D5',
	'type' => 'option', 
	'capability' => 'edit_theme_options'
));
$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dtb_customize_archive_boxed_border_color', array(
	'label' => __('Content Border Color', 'divi-toolbox'),
	'section' => 'dtb_blog',
	'settings' => 'dtb_customize_archive_boxed_border_color'
)));