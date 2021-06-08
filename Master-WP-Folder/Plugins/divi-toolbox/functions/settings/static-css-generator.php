<?php
require_once(DTB_TOOLBOX_PLUGIN_DIR.'util/minify-methods.php');
function dtb_get_static_css() {
   if(!function_exists( 'WP_Filesystem' )) {
	   return;
	}
	WP_filesystem();
	global $wp_filesystem;
	
	if ( ! function_exists( 'add_unit' ) ) {	
		function add_unit($val) {
		  if (is_numeric($val)) {
		    return $val . 'px';
		  }
		  if (($val == '') || ($val == '0')) {
		    return '0px';
		  }
		  return $val;
		}
	}
	/* Divi Customizer Options */
	$menu_height = et_get_option('menu_height');
	$header_style = et_get_option('header_style');
	$logo_height = et_get_option('logo_height');
	$dtb_grab_image = et_get_option('divi_grab_image');
	$show_search_icon = et_get_option('show_search_icon', '1');
	$fixed_menu_height = et_get_option('minimized_menu_height');
	$dtb_mobile_menu_height = get_option('dtb_customize_mobile_menu_height', '60');
	$dtb_mobile_logo_height = get_option('dtb_customize_mobile_logo_height', '80');
	$primary_nav_font = et_get_option('primary_nav_font');
	$body_font = et_get_option('body_font');
	$accent_color = et_get_option('accent_color');
	$website_content_width = et_get_option('content_width', '1080');
	$primary_nav_dropdown_animation = et_get_option('primary_nav_dropdown_animation', 'fade');
	
	/* Toolbox Settings */
	$dtb_home_header_layout_val = dtb_get_option('dtb_home_header_layout');
	$dtb_before_header_layout_val = dtb_get_option('dtb_before_header_layout');
	$dtb_404_header_val = dtb_get_option('dtb_404_header');
	$dtb_404_footer_val = dtb_get_option('dtb_404_footer');
	$dtb_enable_popup_val = dtb_get_option('dtb_enable_popup');
	$dtb_preloader_val = dtb_get_option('dtb_preloader');
	$dtb_btt_val = dtb_get_option('dtb_btt');
	$dtb_logo_box = dtb_get_option('dtb_logo_box');
	$dtb_cta_link = dtb_get_option('dtb_cta_link');
	$dtb_mobile_breakpoint = dtb_get_option('dtb_mobile_breakpoint', 980) ?: '980';
	$dtb_enable_equal_height_val = dtb_get_option('dtb_enable_equal_height');
	$dtb_equal_height_blurb_val = dtb_get_option('dtb_equal_height_blurb');
	$dtb_equal_height_pricing_val = dtb_get_option('dtb_equal_height_pricing');
	$dtb_equal_height_breakpoint_val = dtb_get_option('dtb_equal_height_breakpoint', 479) ?: '479';
	
	$dtb_enable_hamburger_icon = dtb_get_option('dtb_enable_hamburger_icon');
	$dtb_hamburger_icon = dtb_get_option('dtb_hamburger_icon');
	$dtb_m_mobile_trigger = dtb_get_option('dtb_m_mobile_trigger');
	$dtb_mobile_enable = dtb_get_option('dtb_mobile_enable');
   $dtb_enable_custom_m_menu = dtb_get_option('dtb_enable_custom_m_menu');
	$dtb_m_mobile_elements_social = dtb_get_option('dtb_m_mobile_elements_social');
	$dtb_social_enable = dtb_get_option('dtb_social_enable');
	$dtb_submenu = dtb_get_option('dtb_submenu');
	$dtb_sidebar_styles = dtb_get_option('dtb_sidebar_styles');
	$dtb_sidebar_archive = dtb_get_option('dtb_sidebar_archive');
	$dtb_post_meta = dtb_get_option('dtb_post_meta');
	$dtb_post_sidebar_layout = dtb_get_option('dtb_post_sidebar_layout');
	$dtb_custom_footer_enable = dtb_get_option('dtb_custom_footer_enable');
	$dtb_post_author = dtb_get_option('dtb_post_author');
	$dtb_post_prev_next = dtb_get_option('dtb_post_prev_next');
	$dtb_post_related = dtb_get_option('dtb_post_related');
	$dtb_related_heading = dtb_get_option('dtb_related_heading') ?: 'h4';
	$dtb_blog_layout = dtb_get_option('dtb_blog_layout');
	$dtb_comments_styles = dtb_get_option('dtb_comments_styles');
	$dtb_global_headings = dtb_get_option('dtb_global_headings');
	$dtb_scrollbar = dtb_get_option('dtb_scrollbar');
	$css_reverse_columns = dtb_get_option('css_reverse_columns');
	$css_txt_center_mobile = dtb_get_option('css_txt_center_mobile');
	$css_center_mobile = dtb_get_option('css_center_mobile');
	$css_btn_center_mobile = dtb_get_option('css_btn_center_mobile');
	$css_word_break_mobile = dtb_get_option('css_word_break_mobile');
	$css_no_word_break_mobile = dtb_get_option('css_no_word_break_mobile');
	$dtb_enable_particles = dtb_get_option('dtb_enable_particles');
	$dtb_footer_reveal = dtb_get_option('dtb_footer_reveal', '0');
	$dtb_footer_reveal_mobile_off = dtb_get_option('dtb_footer_reveal_mobile_off', '0');
	$css_vertical_align = dtb_get_option('css_vertical_align', '0');
	$css_full_height = dtb_get_option('css_full_height', '0');
	$dtb_pricing_border = dtb_get_option('dtb_pricing_border','0');
	$dtb_testimonial_photo = dtb_get_option('dtb_testimonial_photo','0');
	$dtb_toggle_icon = dtb_get_option('dtb_toggle_icon','0');
	$dtb_follow_the_mouse = dtb_get_option('dtb_follow_the_mouse','0');
	$dtb_sec_btn = dtb_get_option('dtb_sec_btn');
	$dtb_sec_btn_class = dtb_get_option('dtb_sec_btn_class', 'dtb-button') ?: 'dtb-button';
	$dtb_slim_email = dtb_get_option('dtb_slim_email');
	$dtb_rellax_mobile_off = dtb_get_option('dtb_rellax_mobile_off');
	$dtb_overflow_hidden = dtb_get_option('dtb_overflow_hidden');
	$dtb_fixed_scroll = dtb_get_option('dtb_fixed_scroll');
	$dtb_menu_type = dtb_get_option('dtb_menu_type');
	$dtb_enable_menu_hover = dtb_get_option('dtb_enable_menu_hover');
	$dtb_archive_styles = dtb_get_option('dtb_archive_styles');
	$dtb_mobile_nested = dtb_get_option('dtb_mobile_nested');
	$dtb_comments_btn_border_color_hover = get_option('dtb_comments_btn_border_color_hover');
	$dtb_enable_sticky = dtb_get_option('dtb_enable_sticky');
	$dtb_sticky_offset = dtb_get_option('dtb_sticky_offset');
	$dtb_sticky_breakpoint = dtb_get_option('dtb_sticky_breakpoint');
	$dtb_add_sticky_simple_class = dtb_get_option('dtb_add_sticky_simple_class');
	$dtb_sticky_simple_class = dtb_get_option('dtb_sticky_simple_class');
	$dtb_enable_password = dtb_get_option('dtb_enable_password');
	/* Toolbox Customizer Options */
	$dtb_hide_bottom_bar_val = get_theme_mod('dtb_modcustomize_hide_bottom_bar');
	$dtb_center_bottom_bar_val = get_theme_mod('dtb_modcustomize_center_bottom_bar');
	$dtb_social_move_val = get_theme_mod('dtb_modcustomize_social_move');
	$back_to_top_style = get_option( 'dtb_customize_back_to_top_style', 'default');
	$back_to_top_shadow = get_theme_mod( 'dtb_modcustomize_back_to_top_shadow', '1');
	$back_to_top_bg = get_option('dtb_customize_back_to_top_bg', '#00B5CF' );
	$back_to_top_txt = get_theme_mod('dtb_modcustomize_back_to_top_txt', 'TOP');
	$back_to_top_icon = get_option('dtb_customize_back_to_top_icon', '2' );
	$back_to_top_icon_col = get_option('dtb_customize_back_to_top_icon_col', '#fff');
	$back_to_top_bg_hover = get_option('dtb_customize_back_to_top_bg_hover', '#00B5CF');
	$back_to_top_icon_col_hover = get_option('dtb_customize_back_to_top_icon_col_hover', '#ffffff');
	$back_to_top_shadow_col = get_option('dtb_customize_back_to_top_shadow_col', 'rgba(0,0,0,0.2)');
	$back_to_top_shadow_offset_y = get_option('dtb_customize_back_to_top_shadow_offset_y', '8');
	$back_to_top_shadow_offset_x = get_option('dtb_customize_back_to_top_shadow_offset_x', '0');
	$back_to_top_shadow_blur = get_option('dtb_customize_back_to_top_shadow_blur', '20');
	$back_to_top_border = get_theme_mod('dtb_modcustomize_back_to_top_border', '0');
	$back_to_top_border_radius = get_option('dtb_customize_back_to_top_border_radius', '5');
	$back_to_top_border_width = get_option('dtb_customize_back_to_top_border_width', '0');
	$back_to_top_border_col = get_option('dtb_customize_back_to_top_border_col', '#00B5CF');
	$back_to_top_border_col_hover = get_option('dtb_customize_back_to_top_border_col_hover', '#00B5CF');
	$back_to_top_distance_right = get_option('dtb_customize_back_to_top_distance_right', '0');
	$back_to_top_distance_bottom = get_option('dtb_customize_back_to_top_distance_bottom', '100');
	$back_to_top_padding = get_option('dtb_customize_back_to_top_padding', '5');
	$back_to_top_hover = get_option('dtb_customize_back_to_top_hover', 'none');
	$back_to_top_icon_size = get_option('dtb_customize_back_to_top_icon_size', '30');
	$back_to_top_txt_size = get_option('dtb_customize_back_to_top_txt_size', '14');
	$dtb_btt_btn_font_weight = get_option('dtb_customize_btt_btn_font_weight', '400');
	$dtb_btt_font_lettersp = get_option('dtb_customize_btt_font_lettersp', '0');
	$dtb_btt_tt = get_theme_mod('dtb_modcustomize_btt_tt', 'none');
	$social_head_size = get_option('dtb_customize_social_head_size', '12');
	$social_head_color = get_option('dtb_customize_social_head_color', '#BDC8D5');
	$social_head_color_hover = get_option('dtb_customize_social_head_color_hover', '#21C9E2');
	$social_foot_size = get_option('dtb_customize_social_foot_size', '24');
	$social_foot_color = get_option('dtb_customize_social_foot_color', '#fff');
	$social_foot_color_hover = get_option('dtb_customize_social_foot_color_hover', '#fff');
	$social_foot_padding = get_option('dtb_customize_social_foot_padding', '10');
	$social_foot_bg_color = get_option('dtb_customize_social_foot_bg_color', 'rgba(0,0,0,0.2)');
	$social_foot_bg_color_hover = get_option('dtb_customize_social_foot_bg_color_hover', '#21C9E2');
	$social_foot_border_radius = get_option('dtb_customize_social_foot_border_radius', '3');
	$social_foot_border_width = get_option('dtb_customize_social_foot_border_width', '0');
	$social_foot_border_color = get_option('dtb_customize_social_foot_border_color', '#21C9E2');
	$social_foot_border_color_hover = get_option('dtb_customize_social_foot_border_color_hover', '#21C9E2');
	$social_foot_margin = get_option('dtb_customize_social_foot_margin', '0');
	$social_foot_margin_icon = get_option('dtb_customize_social_foot_margin_icon', '10');
	$dtb_social_mobile_add = get_theme_mod('dtb_modcustomize_social_mobile_add');
	$social_mobile_size = get_option('dtb_customize_social_mobile_size', '16');
	$social_mobile_color = get_option('dtb_customize_social_mobile_color', '#BDC8D5');
	$social_mobile_color_hover = get_option('dtb_customize_social_mobile_color_hover', '#fff');
	$social_mobile_height = get_option('dtb_customize_social_mobile_height', '40');
	$social_mobile_width = get_option('dtb_customize_social_mobile_width', '40');
	$social_mobile_bg_color = get_option('dtb_customize_social_mobile_bg_color', 'rgba(0,0,0,0.04)');
	$social_mobile_bg_color_hover = get_option('dtb_customize_social_mobile_bg_color_hover', '#21C9E2');
	$social_mobile_border_radius = get_option('dtb_customize_social_mobile_border_radius', '3');
	$social_mobile_border_width = get_option('dtb_customize_social_mobile_border_width', '0');
	$social_mobile_border_color = get_option('dtb_customize_social_mobile_border_color', '#21C9E2');
	$social_mobile_border_color_hover = get_option('dtb_customize_social_mobile_border_color_hover', '#21C9E2');
	$social_mobile_margin_icon = get_option('dtb_customize_social_mobile_margin_icon', '10');
	$social_mobile_align = get_theme_mod('dtb_modcustomize_social_mobile_align', 'left');
	$social_mobile_margin_top = add_unit(get_theme_mod('dtb_modcustomize_social_mobile_margin_top', '20px'));
	$social_mobile_margin_right = add_unit(get_theme_mod('dtb_modcustomize_social_mobile_margin_right', ''));
	$social_mobile_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_social_mobile_margin_bottom', '20px'));
	$social_mobile_margin_left = add_unit(get_theme_mod('dtb_modcustomize_social_mobile_margin_left', ''));
	$main_nav_border_radius = get_option('dtb_customize_main_nav_border_radius', '3');
	$main_nav_bg_color = get_option('dtb_customize_main_nav_bg_color', 'rgba(189,200,213,0.2)');
	$main_nav_line_radius = get_option('dtb_customize_main_nav_line_radius', '0');
	$main_nav_line_offset = get_option('dtb_customize_main_nav_line_offset', '20');
	$main_nav_line_height = get_option('dtb_customize_main_nav_line_height', '3');
	$main_nav_line_width = get_option('dtb_customize_main_nav_line_width', '100');
	$main_nav_line_color = get_option('dtb_customize_main_nav_line_color', '#00B5CF');
	$main_nav_col_hover = get_option('dtb_customize_main_nav_col_hover', '#BDC8D5');
	$main_nav_fixed_col_hover = get_option('dtb_customize_main_nav_fixed_col_hover', '#BDC8D5');
	$main_nav_font_weight = get_option('dtb_customize_main_nav_font_weight', '400');
	$main_nav_padding = get_option('dtb_customize_main_nav_padding', '8');
	$main_nav_font_tt = get_theme_mod('dtb_modcustomize_main_nav_font_tt', 'none');
	$main_nav_hover_active = get_theme_mod('dtb_modcustomize_main_nav_hover_active', '');
	$main_nav_submenu_active = get_theme_mod('dtb_modcustomize_main_nav_submenu_active', '1'); 
	$submenu_shad = get_theme_mod('dtb_modcustomize_submenu_shad', '1');
	$dtb_sub_font_size = get_option('dtb_customize_sub_font_size', '14');
	$dtb_sub_font_lettersp = get_option('dtb_customize_sub_font_lettersp', '0');
	$dtb_sub_tt = get_theme_mod('dtb_modcustomize_sub_tt', 'none');
	$dtb_submenu_shadow_offset_y = get_option('dtb_customize_submenu_shadow_offset_y', '-5');
	$dtb_submenu_shadow_offset_x = get_option('dtb_customize_submenu_shadow_offset_x', '0');
	$dtb_submenu_shadow_blur = get_option('dtb_customize_submenu_shadow_blur', '40');
	$dtb_submenu_shadow_color = get_option('dtb_customize_submenu_shadow_color', 'rgba(50, 50, 50, 0.1)');
	$sub_link = get_option('dtb_customize_sub_link', '#21C9E2');
	$sub_link_hover = get_option('dtb_customize_sub_link_hover', '#21C9E2');
	$sub_link_hover_bg = get_option('dtb_customize_sub_link_hover_bg', 'rgba(189,200,213,0.2)');
	$sub_bg = get_option('dtb_customize_sub_bg', '#ffffff');
	$sub_font_weight = get_option('dtb_customize_sub_font_weight', '400');
	$sub_border_radius = get_option('dtb_customize_sub_border_radius', '5');
	$sub_show_arrow = get_theme_mod('dtb_modcustomize_sub_show_arrow', '1');
	$sub_move_right_hover = get_theme_mod('dtb_modcustomize_sub_move_right_hover', '1');
	$sub_font_align = get_theme_mod('dtb_modcustomize_sub_font_align', '');
	$sub_align = get_option('dtb_customize_sub_align', 'default');
	$submenu_width = get_option('dtb_customize_submenu_width', '240');
	$dtb_logo_box_bg = get_option('dtb_customize_logo_box_bg', '#ffffff');
	$dtb_logo_box_bg_fixed = get_option('dtb_customize_logo_box_bg_fixed', '');
	$dtb_logo_box_shadow = get_theme_mod('dtb_modcustomize_logo_box_shadow', '1');
	$dtb_logo_shadow_color = get_option('dtb_customize_logo_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_logo_shadow_offset_y = get_option('dtb_customize_logo_shadow_offset_y', '5');
	$dtb_logo_shadow_offset_x = get_option('dtb_customize_logo_shadow_offset_x', '0');
	$dtb_logo_shadow_blur = get_option('dtb_customize_logo_shadow_blur', '50');
	$dtb_logo_box_width = get_option('dtb_customize_logo_box_width', '200');
	$dtb_logo_box_height = get_option('dtb_customize_logo_box_height', '200');
	$dtb_logo_box_width_fixed = get_option('dtb_customize_logo_box_width_fixed', '120');
	$dtb_logo_box_height_fixed = get_option('dtb_customize_logo_box_height_fixed', '120');
	$dtb_logo_box_padding = get_option('dtb_customize_logo_box_padding', '0');
	$dtb_logo_box_border = get_option('dtb_customize_logo_box_border', '0');
	$dtb_cta_font_weight = get_option('dtb_customize_cta_font_weight', '600');
	$dtb_cta_font_size = get_option('dtb_customize_cta_font_size', '15');
	$dtb_cta_lettersp = get_option('dtb_customize_cta_lettersp', '0');
	$dtb_cta_tt = get_theme_mod('dtb_modcustomize_cta_tt', 'none');
	$cta_text_color = get_option('dtb_customize_cta_text_color', '#21C9E2');
	$cta_bg_color = get_option('dtb_customize_cta_bg_color', 'rgba(189,200,213,0.2)');
	$cta_border_color = get_option('dtb_customize_cta_border_color', '#21C9E2');
	$cta_border_width = get_option('dtb_customize_cta_border_width', '2');
	$cta_border_radius = get_option('dtb_customize_cta_border_radius', '3');
	$cta_padding_vertical = get_option('dtb_customize_cta_padding_vertical', '8');
	$cta_padding_horizontal = get_option('dtb_customize_cta_padding_horizontal', '8');
	$cta_text_color_hover = get_option('dtb_customize_cta_text_color_hover', '#fff');
	$cta_bg_color_hover = get_option('dtb_customize_cta_bg_color_hover', '#21C9E2');
	$cta_border_color_hover = get_option('dtb_customize_cta_border_color_hover', '#21C9E2');
	$cta_fixed_style = get_theme_mod('dtb_modcustomize_cta_fixed_style', '');	
	$cta_fixed_text_color = get_option('dtb_customize_cta_fixed_text_color', '#21C9E2');
	$cta_fixed_bg_color = get_option('dtb_customize_cta_fixed_bg_color', 'rgba(189,200,213,0.2)');
	$cta_fixed_border_color = get_option('dtb_customize_cta_fixed_border_color', '#21C9E2');
	$cta_fixed_text_color_hover = get_option('dtb_customize_cta_fixed_text_color_hover', '#fff');
	$cta_fixed_bg_color_hover = get_option('dtb_customize_cta_fixed_bg_color_hover', '#21C9E2');
	$cta_fixed_border_color_hover = get_option('dtb_customize_cta_fixed_border_color_hover', '#21C9E2');
	$preloader_bg = get_option('dtb_customize_preloader_bg', '#fff');
	$preloader_color = get_option('dtb_customize_preloader_color', '#BDC8D5');
	$preloader_size = get_option('dtb_customize_preloader_size', '70');
	$preloader_img_size = get_option('dtb_customize_preloader_img_size', '250');
	$popup_bg = get_option('dtb_customize_popup_bg', 'rgba(0,0,0,0.7)');
	$popup_close = get_option('dtb_customize_popup_close', '#00B5CF');
	$popup_close_bg = get_option('dtb_customize_popup_close_bg', '#fff');
	$popup_close_hover = get_option('dtb_customize_popup_close_hover', '#fff');
	$popup_close_bg_hover = get_option('dtb_customize_popup_close_bg_hover', '#00B5CF');
	$dtb_mobile_fixed = get_theme_mod('dtb_modcustomize_mobile_fixed');
	$dtb_mobile_top = get_theme_mod('dtb_modcustomize_mobile_top');
	$dtb_mobile_fixed_top = get_theme_mod('dtb_modcustomize_mobile_fixed_top');
	$dtb_mobile_bar_shadow = get_theme_mod('dtb_modcustomize_mobile_bar_shadow', '1');
	$dtb_mobile_bar_shadow_color = get_option('dtb_customize_mobile_bar_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_mobile_bar_shadow_blur = get_option('dtb_customize_mobile_bar_shadow_blur', '25');
	$dtb_mobile_bar_shadow_offset = get_option('dtb_customize_mobile_bar_shadow_offset', '2');
	$dtb_hamburger_color = get_option('dtb_customize_hamburger_color', '#00B5CF');
	$dtb_hamburger_color_open = get_option('dtb_customize_hamburger_color_open', '#00B5CF');
	$dtb_hamburger_color_hover = get_option('dtb_customize_hamburger_color_hover', '#00B5CF');
	$dtb_hamburger_color_open_hover = get_option('dtb_customize_hamburger_color_open_hover', '#00B5CF');
	$dtb_mobile_bar_bg = get_option('dtb_customize_mobile_bar_bg', '#fff');
	$dtb_mobile_bar_fullwidth = get_theme_mod('dtb_modcustomize_mobile_bar_fullwidth', '1');
	$dtb_mobile_menu_fullwidth = get_theme_mod('dtb_modcustomize_mobile_menu_fullwidth', '');
	$dtb_hamburger_size = get_option('dtb_customize_hamburger_size', 'default');
	$dtb_mobile_menu_style = get_option('dtb_customize_mobile_menu_style');
	$dtb_mobile_dim_background = get_theme_mod('dtb_modcustomize_mobile_dim_background');
	$dtb_mobile_dim_color = get_option('dtb_customize_mobile_dim_color', 'rgba(0,0,0,0.7)');
	$dtb_mobile_menu_shadow = get_theme_mod('dtb_modcustomize_mobile_menu_shadow', '1');
	$dtb_mobile_menu_shadow_color = get_option('dtb_customize_mobile_menu_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_mobile_menu_shadow_offset_x = get_option('dtb_customize_mobile_menu_shadow_offset_x', '2');
	$dtb_mobile_menu_shadow_offset_y = get_option('dtb_customize_mobile_menu_shadow_offset_y', '10');
	$dtb_mobile_menu_shadow_blur = get_option('dtb_customize_mobile_menu_shadow_blur', '35');
	$dtb_mobile_separator = get_option('dtb_customize_mobile_separator', 'rgba(0,0,0,0.02)');
	$dtb_mobile_padding_top = get_option('dtb_customize_mobile_padding_top', '15');
	$dtb_mobile_padding_right = get_option('dtb_customize_mobile_padding_right', '15');
	$dtb_mobile_padding_bottom = get_option('dtb_customize_mobile_padding_bottom', '15');
	$dtb_mobile_padding_left = get_option('dtb_customize_mobile_padding_left', '15');
	$dtb_mobile_font_tt = get_theme_mod('dtb_modcustomize_mobile_font_tt', 'none');
	$dtb_mobile_font_lettersp = get_option('dtb_customize_mobile_font_lettersp', '0');
	$dtb_mobile_cta_lettersp = get_option('dtb_customize_mobile_cta_lettersp', '0');
	$dtb_mobile_cta_tt = get_theme_mod('dtb_modcustomize_mobile_cta_tt', 'none');
	$dtb_mobile_font_weight = get_option('dtb_customize_mobile_font_weight', '400');
	$dtb_mobile_font_size = get_option('dtb_customize_mobile_font_size', '15');
	$dtb_mobile_font_color_hover = get_option('dtb_customize_mobile_font_color_hover', '#fff');
	$dtb_mobile_menu_bg_hover = get_option('dtb_customize_mobile_menu_bg_hover', '#BDC8D5');
	$dtb_mobile_font_color = get_option('dtb_customize_mobile_font_color', '#00B5CF');
	$dtb_mobile_menu_bg = get_option('dtb_customize_mobile_menu_bg', '#fff');
	$dtb_mobile_menu_parent_bg = get_option('dtb_customize_mobile_menu_parent_bg', 'rgba(0,0,0,0.01)');
	$dtb_mobile_sub_parent_font_weight = get_option('dtb_customize_mobile_sub_parent_font_weight', '600');
	$dtb_mobile_submenu_icon_closed = get_option('dtb_customize_mobile_submenu_icon_closed', '#21C9E2');
	$dtb_mobile_submenu_icon_closed_bg = get_option('dtb_customize_mobile_submenu_icon_closed_bg', 'rgba(189,200,213,0.2)');
	$dtb_mobile_submenu_bg = get_option('dtb_customize_mobile_submenu_bg', 'rgba(0,0,0,0.02)');
	$dtb_mobile_submenu_icon_opened = get_option('dtb_customize_mobile_submenu_icon_opened', '#21C9E2');
	$dtb_mobile_submenu_icon_opened_bg = get_option('dtb_customize_mobile_submenu_icon_opened_bg', 'rgba(189,200,213,0.2)');
	$dtb_mobile_cta_color = get_option('dtb_customize_mobile_cta_color', '#fff');
	$dtb_mobile_cta_bg_color = get_option('dtb_customize_mobile_cta_bg_color', '#21C9E2');
	$dtb_mobile_cta_color_hover = get_option('dtb_customize_mobile_cta_color_hover', '#fff');
	$dtb_mobile_cta_bg_color_hover = get_option('dtb_customize_mobile_cta_bg_color_hover', '#BDC8D5');
	$dtb_mobile_cta_hover = get_theme_mod('dtb_modcustomize_mobile_cta_hover', '');
	$dtb_mobile_cta_padding = get_option('dtb_customize_mobile_cta_padding', '15');
	$dtb_mobile_cta_font_weight = get_option('dtb_customize_mobile_cta_font_weight', '700');
	$dtb_mobile_cta_font_size = get_option('dtb_customize_mobile_cta_font_size', '15');
	$dtb_search_icon_hide = get_theme_mod('dtb_modcustomize_search_icon_hide');
	$dtb_search_icon_color = get_option('dtb_customize_search_icon_color', '#BDC8D5');
	$dtb_search_close_icon_color = get_option('dtb_customize_search_close_icon_color', '#BDC8D5');
	$dtb_search_icon_color_hover = get_option('dtb_customize_search_icon_color_hover', '#BDC8D5');
	$dtb_search_close_icon_color_hover = get_option('dtb_customize_search_close_icon_color_hover', '#BDC8D5');
	$dtb_search_icon_size = get_option('dtb_customize_search_icon_size', 'default');
	$dtb_search_font_color = get_option('dtb_customize_search_font_color', '#BDC8D5');
	$dtb_hide_top_fixed = get_theme_mod('dtb_modcustomize_hide_top_fixed', '1');
	$dtb_main_header_shadow = get_theme_mod('dtb_modcustomize_main_header_shadow', '1');
	$dtb_main_header_shadow_color = get_option('dtb_customize_main_header_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_main_header_shadow_offset_y = get_option('dtb_customize_main_header_shadow_offset_y', '1');
	$dtb_main_header_shadow_offset_x = get_option('dtb_customize_main_header_shadow_offset_x', '0');
	$dtb_main_header_shadow_blur = get_option('dtb_customize_main_header_shadow_blur', '0');
	$dtb_fixed_header_shadow = get_theme_mod('dtb_modcustomize_fixed_header_shadow', '1');
	$dtb_fixed_header_shadow_color = get_option('dtb_customize_fixed_header_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_fixed_header_shadow_offset_y = get_option('dtb_customize_fixed_header_shadow_offset_y', '0');
	$dtb_fixed_header_shadow_offset_x = get_option('dtb_customize_fixed_header_shadow_offset_x', '0');
	$dtb_fixed_header_shadow_blur = get_option('dtb_customize_fixed_header_shadow_blur', '7');
	$dtb_top_bar_shadow = get_theme_mod('dtb_modcustomize_top_bar_shadow');
	$dtb_top_bar_shadow_color = get_option('dtb_customize_top_bar_shadow_color', 'rgba(0,0,0,0.5)');
	$dtb_top_bar_shadow_offset_y = get_option('dtb_customize_top_bar_shadow_offset_y', '-5');
	$dtb_top_bar_shadow_blur = get_option('dtb_customize_top_bar_shadow_blur', '40');
	$dtb_top_bar_font_weight = get_option('dtb_customize_top_bar_font_weight', '600');
	$dtb_top_bar_font_lettersp = get_option('dtb_customize_top_bar_font_lettersp', '0');
	$dtb_top_bar_font_tt = get_theme_mod('dtb_modcustomize_top_bar_font_tt', 'none');
	$dtb_sec_nav_color = get_option('dtb_customize_sec_nav_color', '#fff');
	$dtb_sec_nav_color_hover = get_option('dtb_customize_sec_nav_color_hover', '#fff');
	$dtb_sec_nav_bg_hover = get_option('dtb_customize_sec_nav_bg_hover', 'rgba(0,0,0,0)');
	$dtb_center_footer_menu = get_theme_mod('dtb_modcustomize_center_footer_menu');
	$dtb_footer_menu_font_weight = get_option('dtb_customize_footer_menu_font_weight', '500');
	$dtb_footer_menu_tt = get_theme_mod('dtb_modcustomize_footer_menu_tt', 'none');
	$dtb_footer_bottom_lettersp = get_option('dtb_customize_footer_bottom_lettersp', '0');
	$dtb_footer_bottom_tt = get_theme_mod('dtb_modcustomize_footer_bottom_tt', 'none');
	$dtb_footer_menu_padding = get_option('dtb_customize_footer_menu_padding', '15');
	$dtb_footer_menu_active_bg = get_option('dtb_customize_footer_menu_active_bg', 'rgba(0,0,0,0)');
	$dtb_footer_menu_txt_hover = get_option('dtb_customize_footer_menu_txt_hover', '#fff');
	$dtb_footer_menu_bg_hover = get_option('dtb_customize_footer_menu_bg_hover', 'rgba(0,0,0,0.1)');
	$dtb_footer_menu_shadow = get_theme_mod('dtb_modcustomize_footer_menu_shadow');
	$dtb_footer_menu_shadow_color = get_option('dtb_customize_footer_menu_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_footer_menu_shadow_offset_y = get_option('dtb_customize_footer_menu_shadow_offset_y', '10');
	$dtb_footer_menu_shadow_offset_x = get_option('dtb_customize_footer_menu_shadow_offset_x', '0');
	$dtb_footer_menu_shadow_blur = get_option('dtb_customize_footer_menu_shadow_blur', '35');
	$dtb_widget_header_style = get_option('dtb_customize_widget_header_style', 'default');
	$dtb_widget_header_font_weight = get_option('dtb_customize_widget_header_font_weight', '500');
	$dtb_widget_header_font_size = get_option('dtb_customize_widget_header_font_size', '18');
	$dtb_widget_header_font_lettersp = get_option('dtb_customize_widget_header_font_lettersp', '0');
	$dtb_widget_header_tt = get_theme_mod('dtb_modcustomize_widget_header_tt', 'none');
	$dtb_widget_boxed_bg = get_option('dtb_customize_widget_boxed_bg', 'rgba(0,0,0,0.3)');
	$dtb_widget_boxed_padding = get_option('dtb_customize_widget_boxed_padding', '15');
	$dtb_widget_boxed_border_radius = get_option('dtb_customize_widget_boxed_border_radius', '3');
	$dtb_widget_divider_color = get_option('dtb_customize_widget_divider_color', '#00B5CF');
	$dtb_widget_divider_lenght = get_option('dtb_customize_widget_divider_lenght', '100');
	$dtb_widget_divider_height = get_option('dtb_customize_widget_divider_height', '3');
	$dtb_widget_divider_border = get_option('dtb_customize_widget_divider_border', '0');
	$dtb_widget_remove_bullet = get_theme_mod('dtb_modcustomize_widget_remove_bullet', '1');
	$dtb_widget_add_icons = get_theme_mod('dtb_modcustomize_widget_add_icons', '1');
	$dtb_widget_txt_hover = get_option('dtb_customize_widget_txt_hover', '#fff');
	$dtb_widget_icon = get_option('dtb_customize_widget_icon', 'E');
	$dtb_widget_icon_color = get_option('dtb_customize_widget_icon_color', 'rgba(255,255,255,0.3)');
	$dtb_widget_icon_size = get_option('dtb_customize_widget_icon_size', '15');
	$dtb_sidebar_border = get_theme_mod('dtb_modcustomize_sidebar_border', '1');
	$dtb_sidebar_shadow = get_theme_mod('dtb_modcustomize_sidebar_shadow', '');
	$dtb_sidebar_shadow_color = get_option('dtb_customize_sidebar_shadow_color', 'rgba(0,0,0,0.05)');
	$dtb_sidebar_shadow_blur = get_option('dtb_customize_sidebar_shadow_blur', '25');
	$dtb_sidebar_padding = get_option('dtb_customize_sidebar_padding', '30');
	$dtb_sidebar_header_lettersp = get_option('dtb_customize_sidebar_header_lettersp', '0');
	$dtb_sidebar_header_tt = get_theme_mod('dtb_modcustomize_sidebar_header_tt', 'none');
	$dtb_sidebar_header_font_weight = get_option('dtb_customize_sidebar_header_font_weight', '600');
	$dtb_sidebar_header_size = get_option('dtb_customize_sidebar_header_size', '18');
	$dtb_sidebar_header_color = get_option('dtb_customize_sidebar_header_color', 'rgba(0,0,0,0.8)');
	$dtb_sidebar_header_style = get_option('dtb_customize_sidebar_header_style', 'default');
	$dtb_sidebar_header_boxed_bg = get_option('dtb_customize_sidebar_header_boxed_bg', 'rgba(11,37,81,0.04)');
	$dtb_sidebar_header_boxed_padding = get_option('dtb_customize_sidebar_header_boxed_padding', '15');
	$dtb_sidebar_header_boxed_border_radius = get_option('dtb_customize_sidebar_header_boxed_border_radius', '3');
	$dtb_sidebar_divider_color = get_option('dtb_customize_sidebar_divider_color', '#00B5CF');
	$dtb_sidebar_divider_lenght = get_option('dtb_customize_sidebar_divider_lenght', '200');
	$dtb_sidebar_divider_height = get_option('dtb_customize_sidebar_divider_height', '3');
	$dtb_sidebar_divider_border = get_option('dtb_customize_sidebar_divider_border', '0');
	$dtb_sidebar_widgets_style = get_option('dtb_customize_sidebar_widgets_style', 'default');
	$dtb_sidebar_widget_bg = get_option('dtb_customize_sidebar_widget_bg', '#fff');
	$dtb_sidebar_widget_shadow_color = get_option('dtb_customize_sidebar_widget_shadow_color', 'rgba(0,0,0,0.05)');
	$dtb_sidebar_widget_shadow_offset_x = get_option('dtb_customize_sidebar_widget_shadow_offset_x', '2');
	$dtb_sidebar_widget_shadow_offset_y = get_option('dtb_customize_sidebar_widget_shadow_offset_y', '10');
	$dtb_sidebar_widget_shadow_blur = get_option('dtb_customize_sidebar_widget_shadow_blur', '60');
	$dtb_sidebar_widget_margin = get_option('dtb_customize_sidebar_widget_margin', '40');
	$dtb_sidebar_widget_link = get_option('dtb_customize_sidebar_widget_link', '#BDC8D5');
	$dtb_sidebar_widget_link_hover = get_option('dtb_customize_sidebar_widget_link_hover', '#BDC8D5');
	$dtb_sidebar_add_icons = get_theme_mod('dtb_modcustomize_sidebar_add_icons', '');
	$dtb_sidebar_icon = get_option('dtb_customize_sidebar_icon', 'E');
	$dtb_sidebar_icon_color = get_option('dtb_customize_sidebar_icon_color', '#BDC8D5');
	$dtb_sidebar_icon_size = get_option('dtb_customize_sidebar_icon_size', '15');
	$dtb_sidebar_search = get_theme_mod('dtb_modcustomize_sidebar_search', '');
	$dtb_sidebar_search_bg = get_option('dtb_customize_sidebar_search_bg', 'rgba(189,200,213,0.26)');
	$dtb_sidebar_search_txt = get_option('dtb_customize_sidebar_search_txt', 'rgba(0,0,0,0.7)');
	$dtb_sidebar_search_height = get_option('dtb_customize_sidebar_search_height', '45');
	$dtb_sidebar_search_border_radius = get_option('dtb_customize_sidebar_search_border_radius', '4');
	$dtb_sidebar_search_border = get_option('dtb_customize_sidebar_search_border', '0');
	$dtb_sidebar_search_border_color = get_option('dtb_customize_sidebar_search_border_color', '#21C9E2');
	$dtb_sidebar_search_btn_bg = get_option('dtb_customize_sidebar_search_btn_bg', '#21C9E2');
	$dtb_sidebar_search_icon = get_option('dtb_customize_sidebar_search_icon', '#fff');
	$dtb_post_meta_font_weight = get_option('dtb_customize_post_meta_font_weight', '600');
	$dtb_post_meta_font_size = get_option('dtb_customize_post_meta_font_size', '13');
	$dtb_post_meta_lettersp = get_option('dtb_customize_post_meta_lettersp', '0');
	$dtb_post_meta_tt = get_theme_mod('dtb_modcustomize_post_meta_tt', 'none');
	$dtb_post_meta_font_color = get_option('dtb_customize_post_meta_font_color', '#BDC8D5');
	$dtb_post_meta_font_color_hover = get_option('dtb_customize_post_meta_font_color_hover', '#0C249F');
	$dtb_post_meta_icon_size = get_option('dtb_customize_post_meta_icon_size', '12');
	$dtb_post_meta_icon_color = get_option('dtb_customize_post_meta_icon_color', '#BDC8D5');
	$dtb_author_box_round = get_theme_mod('dtb_modcustomize_author_box_round', '1');
	$dtb_author_box_bg = get_option('dtb_customize_author_box_bg', '#fff');
	$dtb_author_box_padding = get_option('dtb_customize_author_box_padding', '25');
	$dtb_author_box_border_radius = get_option('dtb_customize_author_box_border_radius', '0');
	$dtb_author_box_border = get_theme_mod('dtb_modcustomize_author_box_border', '');
	$dtb_author_box_border_width = get_option('dtb_customize_author_box_border_width', '2');
	$dtb_author_box_border_color = get_option('dtb_customize_author_box_border_color', '#BDC8D5');
	$dtb_author_box_shadow = get_theme_mod('dtb_modcustomize_author_box_shadow', '1');
	$dtb_author_box_shadow_color = get_option('dtb_customize_author_box_shadow_color', 'rgba(0,0,0,0.1)');
	$dtb_author_box_shadow_offset_x = get_option('dtb_customize_author_box_shadow_offset_x', '2');
	$dtb_author_box_shadow_offset_y = get_option('dtb_customize_author_box_shadow_offset_y', '15');
	$dtb_author_box_shadow_blur = get_option('dtb_customize_author_box_shadow_blur', '65');
	$dtb_author_box_font_weight = get_option('dtb_customize_author_box_font_weight', '600');
	$dtb_author_name_size = get_option('dtb_customize_author_name_size', '18');
	$dtb_author_name_color = get_option('dtb_customize_author_name_color', '#BDC8D5');
	$dtb_archive_header_font_weight = get_option('dtb_customize_archive_header_font_weight', '400');
	$dtb_archive_header_font_size = get_option('dtb_customize_archive_header_font_size', '26');
	$dtb_archive_header_font_lettersp = get_option('dtb_customize_archive_header_font_lettersp', '0');
	$dtb_archive_header_tt = get_theme_mod('dtb_modcustomize_archive_header_tt', 'none');
	$dtb_archive_header_font_color = get_option('dtb_customize_archive_header_font_color', '#333');
	$dtb_hide_excerpt = get_theme_mod('dtb_modcustomize_hide_excerpt', '');
	$dtb_excerpt_font_weight = get_option('dtb_customize_excerpt_font_weight', '500');
	$dtb_excerpt_font_size = get_option('dtb_customize_excerpt_font_size', '14');
	$dtb_excerpt_font_lettersp = get_option('dtb_customize_excerpt_font_lettersp', '0');
	$dtb_excerpt_tt = get_theme_mod('dtb_modcustomize_excerpt_tt', 'none');
	$dtb_excerpt_font_color = get_option('dtb_customize_excerpt_font_color', '#666');
	$dtb_archive_button = get_theme_mod('dtb_modcustomize_archive_button', '1');
	$dtb_archive_btn_font_weight = get_option('dtb_customize_archive_btn_font_weight', '600');
	$dtb_archive_btn_font_size = get_option('dtb_customize_archive_btn_font_size', '12');
	$dtb_archive_btn_font_lettersp = get_option('dtb_customize_archive_btn_font_lettersp', '0');
	$dtb_archive_btn_tt = get_theme_mod('dtb_modcustomize_archive_btn_tt', 'none');
	$dtb_archive_btn_font_color = get_option('dtb_customize_archive_btn_font_color', '#fff');
	$dtb_archive_btn_padding = get_option('dtb_customize_archive_btn_padding', '8');
	$dtb_archive_btn_border_radius = get_option('dtb_customize_archive_btn_border_radius', '3');
	$dtb_archive_btn_border_width = get_option('dtb_customize_archive_btn_border_width', '0');
	$dtb_archive_btn_border_color = get_option('dtb_customize_archive_btn_border_color', '#00B5CF');
	$dtb_archive_btn_bg_color = get_option('dtb_customize_archive_btn_bg_color', '#BDC8D5');
	$dtb_archive_btn_font_color_hover = get_option('dtb_customize_archive_btn_font_color_hover', '#fff');
	$dtb_archive_btn_border_color_hover = get_option('dtb_customize_archive_btn_border_color_hover', '#00B5CF');
	$dtb_archive_btn_bg_color_hover = get_option('dtb_customize_archive_btn_bg_color_hover', '#BDC8D5');
	$dtb_archive_btn_hover = get_option('dtb_customize_archive_btn_hover', 'default');
	$dtb_archive_equal_height = get_theme_mod('dtb_modcustomize_archive_equal_height', '');
	$dtb_archive_overlay = get_theme_mod('dtb_modcustomize_archive_overlay', '1');
	$dtb_archive_overlay_show = get_option('dtb_customize_archive_overlay_show', 'hover');
	$dtb_archive_overlay_color = get_option('dtb_customize_archive_overlay_color', 'rgba(0,0,0,0.3)');
	$dtb_archive_img_hover = get_option('dtb_customize_archive_img_hover', 'none');
	$dtb_archive_overlay_gradient = get_theme_mod('dtb_modcustomize_archive_overlay_gradient', '0');
	$dtb_archive_overlay_gradient_direction = get_option('dtb_customize_archive_overlay_gradient_direction', 'to bottom right');
	$dtb_archive_overlay_gradient_color1 = get_option('dtb_customize_archive_overlay_gradient_color1', 'rgba(20,40,60,0.3)');
	$dtb_archive_overlay_gradient_color2 = get_option('dtb_customize_archive_overlay_gradient_color2', 'rgba(33,200,226,0.3)');
	$dtb_archive_overlay_blend = get_option('dtb_customize_archive_overlay_blend', 'normal');
	$dtb_archive_boxed_bg = get_option('dtb_customize_archive_boxed_bg', '#fff');
	$dtb_archive_boxed_padding = get_option('dtb_customize_archive_boxed_padding', '25');
	$dtb_archive_boxed_shadow = get_theme_mod('dtb_modcustomize_archive_boxed_shadow', '1');
	$dtb_archive_boxed_shadow_offset_x = get_option('dtb_customize_archive_boxed_shadow_offset_x', '2');
	$dtb_archive_boxed_shadow_offset_y = get_option('dtb_customize_archive_boxed_shadow_offset_y', '12');
	$dtb_archive_boxed_shadow_blur = get_option('dtb_customize_archive_boxed_shadow_blur', '30');
	$dtb_archive_boxed_shadow_color = get_option('dtb_customize_archive_boxed_shadow_color', 'rgba(0,0,0,0.05)');
	$dtb_archive_boxed_border_radius = get_option('dtb_customize_archive_boxed_border_radius', '0');
	$dtb_archive_boxed_border = get_theme_mod('dtb_modcustomize_archive_boxed_border', '');
	$dtb_archive_boxed_border_width = get_option('dtb_customize_archive_boxed_border_width', '2');
	$dtb_archive_boxed_border_color = get_option('dtb_customize_archive_boxed_border_color', '#BDC8D5');
	$dtb_next_prev_btn_font_weight = get_option('dtb_customize_next_prev_btn_font_weight', '700');
	$dtb_next_prev_btn_font_size = get_option('dtb_customize_next_prev_btn_font_size', '13');
	$dtb_next_prev_btn_font_lettersp = get_option('dtb_customize_next_prev_btn_font_lettersp', '0');
	$dtb_next_prev_btn_tt = get_theme_mod('dtb_modcustomize_next_prev_btn_tt', 'none');
	$dtb_next_prev_btn_font_color = get_option('dtb_customize_next_prev_btn_font_color', '#fff');
	$dtb_next_prev_btn_padding = get_option('dtb_customize_next_prev_btn_padding', '8');
	$dtb_next_prev_btn_border_radius = get_option('dtb_customize_next_prev_btn_border_radius', '3');
	$dtb_next_prev_btn_border_width = get_option('dtb_customize_next_prev_btn_border_width', '0');
	$dtb_next_prev_btn_border_color = get_option('dtb_customize_next_prev_btn_border_color', '#BDC8D5');
	$dtb_next_prev_btn_bg_color = get_option('dtb_customize_next_prev_btn_bg_color', '#BDC8D5');
	$dtb_next_prev_btn_font_color_hover = get_option('dtb_customize_next_prev_btn_font_color_hover', '#fff');
	$dtb_next_prev_btn_border_color_hover = get_option('dtb_customize_next_prev_btn_border_color_hover', '#00B5CF');
	$dtb_next_prev_btn_bg_color_hover = get_option('dtb_customize_next_prev_btn_bg_color_hover', '#00B5CF');
	$dtb_next_prev_font_weight = get_option('dtb_customize_next_prev_font_weight', '600');
	$dtb_next_prev_font_size = get_option('dtb_customize_next_prev_font_size', '12');
	$dtb_next_prev_font_lettersp = get_option('dtb_customize_next_prev_font_lettersp', '1');
	$dtb_next_prev_tt = get_theme_mod('dtb_modcustomize_next_prev_tt', 'uppercase');
	$dtb_next_prev_font_color = get_option('dtb_customize_next_prev_font_color', '#bdc8d5');
	$dtb_next_prev_font_color_hover = get_option('dtb_customize_next_prev_font_color_hover', '#97A0AA');
	$dtb_related_number = get_option('dtb_customize_related_number', '3');
	$dtb_related_header_font_weight = get_option('dtb_customize_related_header_font_weight', '500');
	$dtb_related_header_font_size = get_option('dtb_customize_related_header_font_size', '22');
	$dtb_related_header_font_lettersp = get_option('dtb_customize_related_header_font_lettersp', '0');
	$dtb_related_header_tt = get_theme_mod('dtb_modcustomize_related_header_tt', 'none');
	$dtb_related_header_font_color = get_option('dtb_customize_related_header_font_color', '#333');
	$dtb_related_link_font_weight = get_option('dtb_customize_related_link_font_weight', '400');
	$dtb_related_link_font_size = get_option('dtb_customize_related_link_font_size', '15');
	$dtb_related_link_font_lettersp = get_option('dtb_customize_related_link_font_lettersp', '0');
	$dtb_related_link_tt = get_theme_mod('dtb_modcustomize_related_link_tt', 'none');
	$dtb_related_link_font_color = get_option('dtb_customize_related_link_font_color', '#666');
	$dtb_related_link_font_color_hover = get_option('dtb_customize_related_link_font_color_hover', '#00B5CF');
	$dtb_related_box_padding = get_option('dtb_customize_related_box_padding', '15');
	$dtb_related_shadow = get_theme_mod('dtb_modcustomize_related_shadow', '1');
	$dtb_related_shadow_offset_x = get_option('dtb_customize_related_shadow_offset_x', '2');
	$dtb_related_shadow_offset_y = get_option('dtb_customize_related_shadow_offset_y', '12');
	$dtb_related_shadow_blur = get_option('dtb_customize_related_shadow_blur', '30');
	$dtb_related_shadow_color = get_option('dtb_customize_related_shadow_color', 'rgba(0,0,0,0.05)');
	$dtb_related_border_radius = get_option('dtb_customize_related_border_radius', '0');
	$dtb_related_border = get_theme_mod('dtb_modcustomize_related_border', '1');
	$dtb_related_border_width = get_option('dtb_customize_related_border_width', '2');
	$dtb_related_border_color = get_option('dtb_customize_related_border_color', '#BDC8D5');
	$dtb_related_bg_color = get_option('dtb_customize_related_bg_color', '#fff');
	$dtb_comments_half = get_theme_mod('dtb_modcustomize_comments_half', '1');
	$dtb_comments_textarea = get_option('dtb_customize_comments_textarea', '150');
	$dtb_comments_font_weight = get_option('dtb_customize_comments_font_weight', '400');
	$dtb_comments_font_size = get_option('dtb_customize_comments_font_size', '15');
	$dtb_comments_lettersp = get_option('dtb_customize_comments_lettersp', '0');
	$dtb_comments_tt = get_theme_mod('dtb_modcustomize_comments_tt', 'none');
	$dtb_comments_font_color = get_option('dtb_customize_comments_font_color', '#666');
	$dtb_comments_bg_color = get_option('dtb_customize_comments_bg_color', '#efefef');
	$dtb_comments_border_radius = get_option('dtb_customize_comments_border_radius', '3');
	$dtb_comments_border_width = get_option('dtb_customize_comments_border_width', '0');
	$dtb_comments_border_color = get_option('dtb_customize_comments_border_color', '#00B5CF');
	$dtb_comments_padding = get_option('dtb_customize_comments_padding', '12');
	$dtb_comments_border_color_focus = get_option('dtb_customize_comments_border_color_focus', '#00B5CF');
	$dtb_comments_bg_color_focus = get_option('dtb_customize_comments_bg_color_focus', '#fff');
	$dtb_comments_btn_font_weight = get_option('dtb_customize_comments_btn_font_weight', '600');
	$dtb_comments_btn_font_size = get_option('dtb_customize_comments_btn_font_size', '15');
	$dtb_comments_btn_lettersp = get_option('dtb_customize_comments_btn_lettersp', '0');
	$dtb_comments_btn_tt = get_theme_mod('dtb_modcustomize_comments_btn_tt', 'none');
	$dtb_comments_btn_font_color = get_option('dtb_customize_comments_btn_font_color', '#fff');
	$dtb_comments_btn_bg_color = get_option('dtb_customize_comments_btn_bg_color', '#BDC8D5');
	$dtb_comments_btn_border_radius = get_option('dtb_customize_comments_btn_border_radius', '3');
	$dtb_comments_btn_border_width = get_option('dtb_customize_comments_btn_border_width', '0');
	$dtb_comments_btn_border_color = get_option('dtb_customize_comments_btn_border_color', '#00B5CF');
	$dtb_comments_btn_padding = get_option('dtb_customize_comments_btn_padding', '8');
	$dtb_comments_btn_font_color_hover = get_option('dtb_customize_comments_btn_font_color_hover', '#fff');
	$dtb_comments_btn_bg_color_hover = get_option('dtb_customize_comments_btn_bg_color_hover', '#00B5CF');
	$dtb_body_font_weight = get_option('dtb_customize_body_font_weight', '400');
	$dtb_buttons_font_weight = get_option('dtb_customize_buttons_font_weight', '500');
	$dtb_h1_font_weight = get_option('dtb_customize_h1_font_weight', '500');
	$dtb_h1_lettersp = get_option('dtb_customize_h1_lettersp', '0');
	$dtb_h1_line_height = get_option('dtb_customize_h1_line_height', '1.2');
	$dtb_h1_tt = get_theme_mod('dtb_modcustomize_h1_tt', 'none');
	$dtb_h1_font_color = get_option('dtb_customize_h1_font_color', '666');
	$dtb_h2_font_weight = get_option('dtb_customize_h2_font_weight', '500');
	$dtb_h2_lettersp = get_option('dtb_customize_h2_lettersp', '0');
	$dtb_h2_line_height = get_option('dtb_customize_h2_line_height', '1.2');
	$dtb_h2_tt = get_theme_mod('dtb_modcustomize_h2_tt', 'none');
	$dtb_h2_font_color = get_option('dtb_customize_h2_font_color', '666');
	$dtb_h2_line_height_phone = get_option('dtb_customize_h2_line_height_phone', '1.2');
	$dtb_h3_font_weight = get_option('dtb_customize_h3_font_weight', '500');
	$dtb_h3_lettersp = get_option('dtb_customize_h3_lettersp', '0');
	$dtb_h3_line_height = get_option('dtb_customize_h3_line_height', '1.2');
	$dtb_h3_tt = get_theme_mod('dtb_modcustomize_h3_tt', 'none');
	$dtb_h3_font_color = get_option('dtb_customize_h3_font_color', '666');
	$dtb_h4_font_weight = get_option('dtb_customize_h4_font_weight', '500');
	$dtb_h4_lettersp = get_option('dtb_customize_h4_lettersp', '0');
	$dtb_h4_line_height = get_option('dtb_customize_h4_line_height', '1.2');
	$dtb_h4_tt = get_theme_mod('dtb_modcustomize_h4_tt', 'none');
	$dtb_h4_font_color = get_option('dtb_customize_h4_font_color', '666');
	$dtb_h5_font_weight = get_option('dtb_customize_h5_font_weight', '500');
	$dtb_h5_lettersp = get_option('dtb_customize_h5_lettersp', '0');
	$dtb_h5_line_height = get_option('dtb_customize_h5_line_height', '1.2');
	$dtb_h5_tt = get_theme_mod('dtb_modcustomize_h5_tt', 'none');
	$dtb_h5_font_color = get_option('dtb_customize_h5_font_color', '666');
	$dtb_h6_font_weight = get_option('dtb_customize_h6_font_weight', '500');
	$dtb_h6_lettersp = get_option('dtb_customize_h6_lettersp', '0');
	$dtb_h6_line_height = get_option('dtb_customize_h6_line_height', '1.2');
	$dtb_h6_tt = get_theme_mod('dtb_modcustomize_h6_tt', 'none');
	$dtb_h6_font_color = get_option('dtb_customize_h6_font_color', '666');
	$dtb_scroll_width = get_option('dtb_customize_scroll_width', '15');
	$dtb_scroll_thumb_bg = get_option('dtb_customize_scroll_thumb_bg', '#BDC8D5');
	$dtb_scroll_thumb_border = get_option('dtb_customize_scroll_thumb_border', '0');
	$dtb_scroll_track_bg = get_option('dtb_customize_scroll_track_bg', '#f4f4f4');
	$dtb_scroll_shadow = get_option('dtb_customize_scroll_shadow', 'rgba(0,0,0,0.1)');
	$dtb_login_bg = get_option('dtb_customize_login_bg', '#00A2BA');
	$dtb_follow_mouse_color1 = get_option('dtb_customize_follow_mouse_color1', 'rgba(33,201,226, 0.8)');
	$dtb_follow_mouse_color2 = get_option('dtb_customize_follow_mouse_color2', 'rgba(255,255,255, 0.8)');
	$dtb_follow_mouse_gradient = get_option('dtb_customize_follow_mouse_gradient', 'to bottom');
	$dtb_sec_btn_font_weight = get_option('dtb_customize_sec_btn_font_weight', '500');
	$dtb_sec_btn_font_size = get_option('dtb_customize_sec_btn_font_size', '15');
	$dtb_sec_btn_font_lettersp = get_option('dtb_customize_sec_btn_font_lettersp', '1');
	$dtb_sec_btn_tt = get_theme_mod('dtb_modcustomize_sec_btn_tt', 'none');
	$dtb_sec_btn_font_color = get_option('dtb_customize_sec_btn_font_color', '#fff');
	$dtb_sec_btn_bg_color = get_option('dtb_customize_sec_btn_bg_color', '#BDC8D5');
	$dtb_sec_btn_border_radius = get_option('dtb_customize_sec_btn_border_radius', '5');
	$dtb_sec_btn_border_width = get_option('dtb_customize_sec_btn_border_width', '2');
	$dtb_sec_btn_border_color = get_option('dtb_customize_sec_btn_border_color', '#BDC8D5');
	$dtb_sec_btn_icon_enable = get_option('dtb_customize_sec_btn_icon_enable', 'yes');
	$dtb_sec_btn_icon = get_option('dtb_customize_sec_btn_icon', '5');
	 $dtb_sec_btn_icon_size = 1.6 * intval( $dtb_sec_btn_font_size );
	$dtb_sec_btn_icon_color = get_option('dtb_customize_sec_btn_icon_color', '#fff');
	$dtb_sec_btn_icon_place = get_option('dtb_customize_sec_btn_icon_place', 'right');
	$dtb_sec_btn_icon_show = get_theme_mod('dtb_modcustomize_sec_btn_icon_show', '1');
	$dtb_sec_btn_font_color_hover = get_option('dtb_customize_sec_btn_font_color_hover', '#fff');
	$dtb_sec_btn_bg_color_hover = get_option('dtb_customize_sec_btn_bg_color_hover', '#21C9E2');
	$dtb_sec_btn_border_color_hover = get_option('dtb_customize_sec_btn_border_color_hover', '#21C9E2');
	$dtb_sec_btn_icon_color_hover = get_option('dtb_customize_sec_btn_icon_color_hover', '#fff');
	$dtb_sec_btn_border_radius_hover = get_option('dtb_customize_sec_btn_border_radius_hover', '5');
	$dtb_sec_btn_font_lettersp_hover = get_option('dtb_customize_sec_btn_font_lettersp_hover', '0');
	
if ($dtb_archive_boxed_border != '') {
	$dtb_archive_box_inner_width = ($dtb_archive_boxed_border_width*2)+($dtb_archive_boxed_padding*2);
} else {
	$dtb_archive_box_inner_width = ($dtb_archive_boxed_padding*2);
}

	// Fonts
	$post_meta_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'post_meta_font')));
	$author_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'author_font')));
	$archive_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'archive_header_font')));
	$excerpt_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'excerpt_font')));
	$archive_btn_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'archive_btn_font')));
	$prev_next_btn_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'prev_next_btn_font')));
	$prev_next_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'prev_next_font')));
	$related_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'related_header_font')));
	$related_link_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'related_link_font')));
	$submenu_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'submenu_font')));
	$cta_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'cta_font')));
	$footer_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_header_font')));
	$footer_menu_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_menu_font')));
	$footer_bottom_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_bottom_font')));
	$btt_btn_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'btt_btn_font')));
	$sidebar_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'sidebar_header_font')));
	$mobile_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'mobile_font')));
	$mobile_cta_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'mobile_cta_font')));
	$top_bar_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'top_bar_font')));
	$comments_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'comments_font')));
	$comments_btn_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'comments_btn_font')));
	$heading_h1_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h1_font')));
	$heading_h2_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h2_font')));
	$heading_h3_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h3_font')));
	$heading_h4_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h4_font')));
	$heading_h5_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h5_font')));
	$heading_h6_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h6_font')));
	$sec_btn_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'sec_btn_font')));  
	
	ob_start();?>

	body {font-weight:<?php echo esc_html($dtb_body_font_weight);?>;}
body.et_pb_button_helper_class .et_pb_button {font-weight:<?php echo esc_html($dtb_buttons_font_weight);?>;}

<?php if (( $dtb_home_header_layout_val != '') || ( $dtb_before_header_layout_val != '')) { ?>
	.et_fixed_nav #page-container {padding-top:0!important;}
	.et_fixed_nav #main-header:not(.et-fixed-header) {position:relative; top:0!important;}
	.et_fixed_nav #top-header:not(.et-fixed-header) {position:relative; top:0!important;}
<?php } ?>


<?php if ( $dtb_404_header_val == '1'){ ?>
	.error404 #main-header {display:none;}
	.error404 #page-container {padding-top:0!important;}
<?php } ?>


<?php if ( $dtb_404_footer_val == '1'){ ?>
	.error404 #main-footer {display:none;}
<?php } ?>


<?php if ( $dtb_enable_popup_val == '1'){ ?>
	/* Popup Styling */
	.blurred #main-header, .blurred #top-header, .blurred #dtb-before-header, .blurred #dtb-after-header, .blurred .et-l--header, .blurred .et-l--footer, .blurred #main-content, .blurred #dtb-before-footer, .blurred #dtb-after-footer, .blurred #main-footer, .blurred .et_pb_scroll_top {transition:all .5s cubic-bezier(.53, .06, .28, .99); filter:blur(5px);}
	.blurred .mfp-bg.toolbox {opacity:1; background:<?php echo esc_html($popup_bg); ?>;}
	.blurred .mfp-wrap.toolbox .mfp-close:active {top:0;}
	.mfp-ready.toolbox .toolbox-white-popup {transform:scale(1); opacity:1;}
	.toolbox .mfp-container {padding:0; height:100vh;}
	.toolbox .mfp-content {position:static!important;}
	.toolbox .mfp-content .et_pb_section {background:transparent;}
	.mfp-close-btn-in.toolbox .mfp-fade>.mfp-close {width:50px; height:50px; font-size:36px; opacity:1; transition:all .5s cubic-bezier(.53, .06, .28, .99); background:<?php echo esc_html($popup_close_bg); ?>; color:<?php echo esc_html($popup_close); ?>}
	.mfp-close-btn-in.toolbox .mfp-fade>.mfp-close:hover {background:<?php echo esc_html($popup_close_bg_hover); ?>!important; color:<?php echo esc_html($popup_close_hover); ?>}
	.toolbox .mfp-content {opacity: 0; transition: all 0.3s ease-in-out;}
	.toolbox.mfp-bg {opacity: 0; transition: all 0.5s ease-out;}
	.toolbox.mfp-ready .mfp-content {opacity: 1;}
	.toolbox.mfp-removing .mfp-content {opacity: 0;}
	.toolbox.mfp-removing.mfp-bg {opacity: 0;}
 <?php } ?>


<?php if ( $dtb_hide_bottom_bar_val == '1'){ ?>
	#footer-bottom {display:none;}
<?php } ?>


<?php if ( $dtb_center_bottom_bar_val == '1'){ ?>
	#footer-bottom .et-social-icons,
	#footer-info {float:none; text-align:center;}
	#footer-bottom .et-social-icons li:first-child {margin-left:0;}
<?php } ?>
	#footer-info {<?php if ($footer_bottom_font != '') {?>font-family:<?php echo esc_html($footer_bottom_font); ?>; <?php }?>letter-spacing: <?php echo esc_html($dtb_footer_bottom_lettersp); ?>px; <?php if ($dtb_footer_bottom_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_footer_bottom_tt); ?>; font-variant:normal;<?php } ?>}

<?php if ( $dtb_social_move_val == '1'){ ?>
	.et-cart-info {display:inline-block; padding-bottom:.75em;}
	#et-secondary-menu .et-social-icons {display:none;}
	#et-top-navigation .et-social-icon a {font-size:inherit; top:-.25em;}
	#et-top-navigation .et-social-icons {transition:all .3s ease-in-out; opacity:1;}
	.et_pb_menu_visible #et-top-navigation .et-social-icons {animation:fadeInBottom 1s 1 cubic-bezier(.77,0,.175,1);}
	.et_pb_menu_hidden #et-top-navigation .et-social-icons {opacity:0; animation:fadeOutBottom 1s 1 cubic-bezier(.77,0,.175,1);}
	@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		#et-top-navigation .et-social-icons {display:none;}
	}
<?php } ?>


<?php if ( $dtb_preloader_val == '1'){ ?>
	/* Preloader */
	div.preloader {position:fixed; top:0; left:0; right:0; bottom:0; background-color:<?php echo esc_html($preloader_bg); ?>; z-index:100011; height:100%; width:100%; overflow:hidden !important; display:flex; align-items:center; justify-content:center;}
	.preloader .status svg {height:<?php echo esc_html($preloader_size); ?>px; width:<?php echo esc_html($preloader_size); ?>px;}
	svg.preloader path,
	svg.preloader circle,
	svg.preloader rect {fill:<?php echo esc_html($preloader_color); ?>; stroke:<?php echo esc_html($preloader_color); ?>;}
	svg.preloader .none, svg.preloader .none * {fill:none!important;}
	svg.preloader.nostroke * {stroke:none!important;}
	.preloader .status svg.preloader7 {transform:scale(<?php echo esc_html($preloader_size)/70; ?>); transform-origin:center; width:auto; height:auto;}
	div.preloader img.dtb_custom_preloader_img {width:<?php echo esc_html($preloader_img_size);?>px;}
<?php } ?>


<?php if ($dtb_btt_val == '1') { ?>	
	/* Back to Top Button */
	.et_pb_scroll_top.et-pb-icon {background:<?php echo esc_html($back_to_top_bg); ?>; color:<?php echo esc_html($back_to_top_icon_col); ?>;  padding:<?php echo esc_html($back_to_top_padding); ?>px;
	 font-size:<?php echo esc_html($back_to_top_icon_size); ?>px; right:<?php echo esc_html($back_to_top_distance_right); ?>px; bottom:<?php echo esc_html($back_to_top_distance_bottom); ?>px;}
	.et_pb_scroll_top.et-pb-icon.et-visible {transition-duration:.3s; transition-timing-function: ease-in-out; transition-property:background, color, padding, font-size, transform, border;}
	 
	<?php if ($back_to_top_hover == 'grow') { ?>
		.et_pb_scroll_top.et-pb-icon:hover {transform:scale(1.1);}
	<?php } ?>
	
	<?php if ($back_to_top_hover == 'shrink') { ?> 
		.et_pb_scroll_top.et-pb-icon:hover {transform:scale(0.8);}
	<?php } ?>
	
	<?php if ($back_to_top_hover == 'move_up') { ?> 
		.et_pb_scroll_top.et-pb-icon:hover {transform:translateY(-10px);}
	<?php } ?>
	
	<?php if ($back_to_top_hover == 'move_down') { ?> 
		.et_pb_scroll_top.et-pb-icon:hover {transform:translateY(10px);}
	<?php } ?>
	
	a.btt_link {position:absolute; top:-5px; bottom:-5px; right:-5px; left:-5px;}
	.et_pb_scroll_top:before {content:'<?php echo esc_html($back_to_top_icon); ?>';}
	.et_pb_scroll_top.et-pb-icon:hover {background:<?php echo esc_html($back_to_top_bg_hover); ?>; color:<?php echo esc_html($back_to_top_icon_col_hover); ?>;}
	
	<?php if ($back_to_top_style == 'text') { ?>
		.et_pb_scroll_top.et-pb-icon{font-family:<?php if ($btt_btn_font != '') : echo esc_html($btt_btn_font); else : echo 'inherit' ; endif; ?>; font-size:<?php echo esc_html($back_to_top_txt_size); ?>px; padding:<?php echo esc_html($back_to_top_padding); ?>px; font-weight:<?php echo esc_html($dtb_btt_btn_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_btt_font_lettersp);?>px; <?php if ($dtb_btt_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_btt_tt); ?>; font-variant:normal;<?php } ?>}
		.et_pb_scroll_top:before{content:'<?php echo esc_html($back_to_top_txt); ?>';}
	<?php } ?>
	
	<?php if ($back_to_top_shadow == '1') { ?>
		.et_pb_scroll_top.et-pb-icon {box-shadow:<?php echo esc_html($back_to_top_shadow_offset_x); ?>px <?php echo esc_html($back_to_top_shadow_offset_y); ?>px <?php echo esc_html($back_to_top_shadow_blur); ?>px <?php echo esc_html($back_to_top_shadow_col); ?>;}
	<?php } ?>
	
	<?php if ($back_to_top_border == '1') { ?>
		.et_pb_scroll_top.et-pb-icon {border-radius:<?php echo esc_html($back_to_top_border_radius); ?>px; border-width:<?php echo esc_html($back_to_top_border_width); ?>px; border-style:solid; border-color:<?php echo esc_html($back_to_top_border_col); ?>;}
		.et_pb_scroll_top.et-pb-icon:hover {border-color:<?php echo esc_html($back_to_top_border_col_hover); ?>;}
	<?php } ?>
	
<?php } ?>






/* Hover Animations */
.pulse, .grow, .shrink, .buzz, .move_down, .move_up {transform:perspective(1px) translateZ(0); transition:all .3s ease-in-out!important;}
.jello:hover{animation:jello .9s both}
.wobble:hover{animation:wobble 0.82s cubic-bezier(.36,.07,.19,.97) both;}
.heartbeat:hover {animation:heartbeat 1.5s ease-in-out infinite both}
.pulse:hover {animation:pulse 1s ease-in-out infinite both}
.grow:hover {transform:scale(1.1);}
.shrink:hover {transform:scale(0.9);}
.move_up:hover {transform:translateY(-8px);}
.move_down:hover{transform:translateY(8px);}
@keyframes jello{0%,100%{transform:scale3d(1,1,1)}30%{transform:scale3d(1.25,.75,1)}40%{transform:scale3d(.75,1.25,1)}50%{transform:scale3d(1.15,.85,1)}65%{transform:scale3d(.95,1.05,1)}75%{transform:scale3d(1.05,.95,1)}}
@keyframes wobble{16.65%{transform:translateX(5px)}33.3%{transform:translateX(-4px)}49.95%{transform:translateX(3px)}66.6%{transform:translateX(-2px)}83.25%{transform:translateX(1px)}100%{transform:translateX(0)}}
@keyframes heartbeat{from{transform:scale(1);transform-origin:center center;animation-timing-function:ease-out}10%{transform:scale(.91);animation-timing-function:ease-in}17%{transform:scale(.98);animation-timing-function:ease-out}33%{transform:scale(.87);animation-timing-function:ease-in}45%{transform:scale(1);animation-timing-function:ease-out}}
@keyframes pulse{25%{transform:scale(1.1)}75%{transform:scale(.9)}}


.et-social-flickr a.icon:before {content:'\e0a6';}
.et-social-dribble a.icon:before {content:'\e09b';}
.et-social-icon a.move_up:hover {transform:translateY(-2px);}
.et-social-icon a.move_down:hover {transform:translateY(2px);}


<?php if ($dtb_menu_type == 'menu1') { ?>
	.toolbox_menu1 #top-menu>li>a:before,
	.toolbox_menu1 .dtb-menu ul.et-menu>li>a:before {content:''; display:block; background:<?php echo esc_html($main_nav_line_color);?>; width:<?php echo esc_html($main_nav_line_width);?>%; height:<?php echo esc_html($main_nav_line_height);?>px; left:50%; margin-left:-<?php echo esc_html($main_nav_line_width)/2;?>%; position:absolute; top:<?php echo esc_html($main_nav_line_offset)+5;?>px; transition:all .3s ease-in-out; opacity:0; border-radius:<?php echo esc_html($main_nav_line_radius);?>px;}
	.toolbox_menu1 #top-menu>li>a:hover:before,
	.toolbox_menu1 .dtb-menu ul.et-menu>li>a:hover:before<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu1 #top-menu>li.current_page_item>a:before,
	.toolbox_menu1 .dtb-menu ul.et-menu>li.current_page_item>a:before,
	.toolbox_menu1 #top-menu>li.current-menu-ancestor>a:before,
	.toolbox_menu1 .dtb-menu ul.et-menu>li.current-menu-ancestor>a:before<?php } ?> {top:<?php echo esc_html($main_nav_line_offset);?>px; opacity:1;}
	<?php if ($main_nav_submenu_active == '1') {?>
		.toolbox_menu1 #top-menu>li.menu-item-has-children>a:before,
		.toolbox_menu1 .dtb-menu ul.et-menu>li.menu-item-has-children>a:before {display:none;}
	<?php } ?>
	.toolbox_menu1 #top-menu>li>a>span, .toolbox_menu1 .dtb-menu ul.et-menu>li>a>span {z-index:2;}
<?php } ?>


<?php if ($dtb_menu_type == 'menu2') { ?>
	.toolbox_menu2 #top-menu>li>a:before,
	.toolbox_menu2 .dtb-menu ul.et-menu>li>a:before {content:''; display:block; background:<?php echo esc_html($main_nav_line_color);?>; width:0; height:<?php echo esc_html($main_nav_line_height);?>px; left:50%; position:absolute; top:<?php echo esc_html($main_nav_line_offset);?>px; transition:all .3s ease-in-out;
	opacity:0; border-radius:<?php echo esc_html($main_nav_line_radius);?>px;}
	.toolbox_menu2 #top-menu>li>a:hover:before,
	.toolbox_menu2 .dtb-menu ul.et-menu>li>a:hover:before<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu2 #top-menu>li.current_page_item>a:before,
	.toolbox_menu2 .dtb-menu ul.et-menu>li.current_page_item>a:before,
	.toolbox_menu2 #top-menu>li.current-menu-ancestor>a:before,
	.toolbox_menu2 .dtb-menu ul.et-menu>li.current-menu-ancestor>a:before<?php } ?> {width:<?php echo esc_html($main_nav_line_width);?>%; margin-left:-<?php echo esc_html($main_nav_line_width)/2;?>%; opacity:1;} 
	<?php if ($main_nav_submenu_active == '1') {?>
		.toolbox_menu2 #top-menu>li.menu-item-has-children>a:before,
		.toolbox_menu2 .dtb-menu ul.et-menu>li.menu-item-has-children>a:before {display:none;}
	<?php } ?>
	.toolbox_menu2 #top-menu>li>a>span, .toolbox_menu2 .dtb-menu ul.et-menu>li>a>span {z-index:2;}
<?php } ?>


<?php if ($dtb_menu_type == 'menu3') { ?>
	.toolbox_menu3 #top-menu>li>a>span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a>span:before,
	.toolbox_menu3 #top-menu>li>a>span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a>span:after {content:'['; display:inline-block; color:<?php echo esc_html($main_nav_line_color);?>; transition:all .15s ease-in-out; opacity:0; left:0; position:absolute;  font-size:120%;}
	.toolbox_menu3 #top-menu>li>a>span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a>span:after {content:']'; right:0; left:auto;}
	.toolbox_menu3 #top-menu>li>a:hover span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a:hover span:before<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu3 #top-menu>li.current_page_item>a span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current_page_item>a span:before,
	.toolbox_menu3 #top-menu>li.current-menu-ancestor>a span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current-menu-ancestor>a span:before<?php } ?> {left:-10px;}
	.toolbox_menu3 #top-menu>li>a:hover span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a:hover span:after<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu3 #top-menu>li.current_page_item>a span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current_page_item>a span:after,
	.toolbox_menu3 #top-menu>li.current-menu-ancestor>a span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current-menu-ancestor>a span:after<?php } ?> {right:-10px;}
	.toolbox_menu3 #top-menu>li>a:hover span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a:hover span:before,
	.toolbox_menu3 #top-menu>li>a:hover span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li>a:hover span:after<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu3 #top-menu>li.current_page_item>a span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current_page_item>a span:before,
	.toolbox_menu3 #top-menu>li.current_page_item>a span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current_page_item>a span:after,
	.toolbox_menu3 #top-menu>li.current-menu-ancestor>a span:before,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current-menu-ancestor>a span:before,
	.toolbox_menu3 #top-menu>li.current-menu-ancestor>a span:after,
	.toolbox_menu3 .dtb-menu ul.et-menu>li.current-menu-ancestor>a span:after<?php } ?> {opacity:1;}
	<?php if ($main_nav_submenu_active == '1') {?>
		.toolbox_menu3 #top-menu>li.menu-item-has-children>a>span:before,
		.toolbox_menu3 .dtb-menu ul.et-menu>li.menu-item-has-children>a>span:before,
		.toolbox_menu3 #top-menu>li.menu-item-has-children>a>span:after,
		.toolbox_menu3 .dtb-menu ul.et-menu>li.menu-item-has-children>a>span:after {display:none;}
	<?php } ?>
<?php } ?>


<?php if ($dtb_menu_type == 'menu4') { ?>
	.toolbox_menu4 #top-menu>li>a,
	.toolbox_menu4 .dtb-menu ul.et-menu>li>a {transition:none!important;}
	.toolbox_menu4 #top-menu>li>a>span,
	.toolbox_menu4 .dtb-menu ul.et-menu>li>a>span {transition:all .3s ease-in-out; padding:<?php echo esc_html($main_nav_padding);?>px <?php echo esc_html($main_nav_padding) * 1.2;?>px; margin:-<?php echo esc_html($main_nav_padding) * 1.2;?>px; border-radius:<?php echo esc_html($main_nav_border_radius);?>px; background:transparent; display:inline-block;}
	.toolbox_menu4 #top-menu>li:hover>a>span,
	.toolbox_menu4 .dtb-menu ul.et-menu>li:hover>a>span<?php if ($main_nav_hover_active != '') {?>,
	.toolbox_menu4 #top-menu>li.current_page_item>a span,
	.toolbox_menu4 .dtb-menu ul.et-menu>li.current_page_item>a span,
	.toolbox_menu4 #top-menu>li.current-menu-ancestor>a span,
	.toolbox_menu4 .dtb-menu ul.et-menu>li.current-menu-ancestor>a span<?php } ?> {background:<?php echo esc_html($main_nav_bg_color);?>;}
	.toolbox_menu4 #top-menu>li.menu-item-has-children>a>span,
	.toolbox_menu4 .dtb-menu ul.et-menu>li.menu-item-has-children>a>span {padding-right:25px; margin-right:-25px;}
	.toolbox_menu4 #top-menu>li.menu-item-has-children>a:first-child:after
	.toolbox_menu4 .dtb-menu ul.et-menu>li.menu-item-has-children>a:first-child:after {right:4px;}
	.toolbox_menu4 .dtb-menu ul.et-menu>li.menu-item-has-children>a span {transform:translateY(1px);}
	<?php if ($main_nav_submenu_active == '1') {?>
		.toolbox_menu2 #top-menu>li.menu-item-has-children>a>span,
		.toolbox_menu2 .dtb-menu ul.et-menu>li.menu-item-has-children>a>span {display:none;}
	<?php } ?>
<?php } ?>



<?php if ($dtb_submenu == '1') { ?>
	/* Submenu Styling */
	#top-menu li li ul, .dtb-menu ul.et-menu li li ul {top:0;}
	#top-menu li ul, #et-secondary-nav li ul,
	.dtb-menu ul.et-menu li ul,
	.et-db #et-boc .et-l .dtb-menu .nav li ul {border-top:none; padding:0; box-shadow:none; <?php if (($submenu_shad != '') && ($submenu_shad != '0')) { ?>box-shadow:<?php echo esc_html($dtb_submenu_shadow_offset_x);?>px <?php echo esc_html($dtb_submenu_shadow_offset_y);?>px <?php echo esc_html($dtb_submenu_shadow_blur);?>px <?php echo esc_html($dtb_submenu_shadow_color);?>;<?php } ?> border-radius:<?php echo esc_html($sub_border_radius);?>px; background:#fff}
	#top-menu li:not(.mega-menu) ul, #et-secondary-nav li ul,
	.dtb-menu ul.et-menu li:not(.mega-menu) ul {background:transparent; width:<?php echo esc_html($submenu_width);?>px}
	#top-menu li ul li, #et-secondary-nav li ul li, #top-menu li.mega-menu ul.sub-menu, .dtb-menu ul.et-menu li.mega-menu ul.sub-menu {background:<?php echo esc_html($sub_bg);?>;}
	#top-menu li ul li:first-child>a, #et-secondary-nav li ul li:first-child>a, .dtb-menu ul.et-menu li ul li:first-child>a,
	#top-menu li ul li:first-child, #et-secondary-nav li ul li:first-child, .dtb-menu ul.et-menu li ul li:first-child {border-radius:<?php echo esc_html($sub_border_radius);?>px <?php echo esc_html($sub_border_radius);?>px 0 0;}
	#top-menu li ul li:last-child>a, #et-secondary-nav li ul li:last-child>a, .dtb-menu ul.et-menu li ul li:last-child>a,
	#top-menu li ul li:last-child, #et-secondary-nav li ul li:last-child, .dtb-menu ul.et-menu li ul li:last-child {border-radius:0 0 <?php echo esc_html($sub_border_radius);?>px <?php echo esc_html($sub_border_radius);?>px;}
	#top-menu li ul li:first-child:last-child>a, #et-secondary-nav li ul li:first-child:last-child>a, .dtb-menu ul.et-menu li ul li:first-child:last-child>a,
	#top-menu li ul li:first-child:last-child, #et-secondary-nav li ul li:first-child:last-child, .dtb-menu ul.et-menu li ul li:first-child:last-child {border-radius:<?php echo esc_html($sub_border_radius);?>px;}
	#top-menu li.mega-menu li ul li>a, #et-secondary-nav li.mega-menu li ul li>a, .dtb-menu ul.et-menu li.mega-menu li ul li>a,
	#top-menu li.mega-menu li ul li, #et-secondary-nav li.mega-menu li ul li, .dtb-menu ul.et-menu li.mega-menu li ul li {border-radius:<?php echo esc_html($sub_border_radius);?>px;}
	#top-menu li li, #et-secondary-nav li li, .dtb-menu ul.et-menu li li,
	.et-db #et-boc .et-l .dtb-menu .nav li li {padding:0; display:block;}
	.et-fixed-header #top-menu li li a, #top-menu li li a, #et-secondary-nav li li a, .dtb-menu ul.et-menu li li a,
	.et-db #et-boc .et-l .dtb-menu ul.et-menu li li a {
		<?php if ($submenu_font != '') {?>font-family:<?php echo esc_html($submenu_font);?>; <?php } ?>
		padding:8px 15px 8px 20px;
		position:relative;
		transition:all .3s ease-in-out;
		display:block;
		width:100%;
		<?php if ($dtb_sub_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_sub_tt); ?>; font-variant:normal;<?php } ?>
		letter-spacing:<?php echo esc_html($dtb_sub_font_lettersp);?>px;
		font-size:<?php echo esc_html($dtb_sub_font_size);?>px;
		font-weight:<?php echo esc_html($sub_font_weight);?>;
		<?php if ($sub_font_align != 'left') {?>text-align:<?php echo esc_html($sub_font_align);?>; padding:8px 15px!important; <?php } ?>
		
	}
	.et-fixed-header #top-menu li li a, #top-menu li li a, #et-secondary-nav li li a, .dtb-menu.et_pb_menu .nav li ul.sub-menu a {
		color:<?php echo esc_html($sub_link);?>!important;
		background:<?php echo esc_html($sub_bg);?>;	
	}
	#top-menu li li a:hover, #et-secondary-nav li li a:hover, .dtb-menu.et_pb_menu .nav li ul.sub-menu a:hover, .et-db #et-boc .et-l .dtb-menu ul.et-menu li li a:hover {
		<?php if ($sub_move_right_hover != '') { ?>padding-left:25px!important;<?php }?>
		background:<?php echo esc_html($sub_link_hover_bg);?>;
		color:<?php echo esc_html($sub_link_hover);?>!important;
		opacity:1;
	}
	#top-menu li li a:hover, #et-secondary-nav li li a:hover {
		background:<?php echo esc_html($sub_link_hover_bg);?>!important;
		color:<?php echo esc_html($sub_link_hover);?>!important;
		
	}
	#et-secondary-nav li ul li {text-align:left;}
	#et-secondary-nav li .menu-item-has-children > a:first-child:after {right:.2em;left:auto;}
	#et-secondary-nav li li a {padding:13px;}
	#et-secondary-nav li li a:hover {padding-left:18px;}
	<?php if ($sub_align == 'centered') {?>
	#top-menu>li:not(.mega-menu)>ul, .dtb-menu ul.et-menu>li:not(.mega-menu)>ul, #et-secondary-nav>li>ul {left: calc(-<?php echo esc_html(($submenu_width/2));?>px + 50%);}
	#top-menu>li:not(.mega-menu)>ul {transform: translateX(-22px); }
	#et-secondary-nav>li>ul {transform: translateX(-7.5px); }
	.dtb-menu ul.et-menu>li:not(.mega-menu)>ul {transform: translateX(-11px);}
		
		<?php if ($primary_nav_dropdown_animation == 'expand') { ?>
			.et_primary_nav_dropdown_animation_expand #et-top-navigation ul li:not(.mega-menu):hover > ul {
				-webkit-animation: Grow_centered1 .4s ease-in-out;
				animation: Grow_centered1 .4s ease-in-out;
			}
			
			@-webkit-keyframes Grow_centered1 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-22px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-22px); } }
			
			@keyframes Grow_centered1 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-22px);
			            transform: scale(1, 0.5) translateX(-22px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-22px);
			            transform: scale(1, 1) translateX(-22px); } }
            
            
			.et_secondary_nav_dropdown_animation_expand #et-secondary-nav li:hover > ul {
				-webkit-animation: Grow_centered2 .4s ease-in-out;
				animation: Grow_centered2 .4s ease-in-out;
			}
			
			@-webkit-keyframes Grow_centered2 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-7.5px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-7.5px); } }
			
			@keyframes Grow_centered2 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-7.5px);
			            transform: scale(1, 0.5) translateX(-7.5px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-7.5px);
			            transform: scale(1, 1) translateX(-7.5px); } }
			
			.dtb-menu ul.et-menu>li:not(.mega-menu):hover>ul {
				-webkit-animation: Grow_centered3 .4s ease-in-out;
				animation: Grow_centered3 .4s ease-in-out;
			}
			
			@-webkit-keyframes Grow_centered3 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-11px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-11px); } }
			
			@keyframes Grow_centered3 {
			  0% {
			    opacity: 0;
			    -webkit-transform: scale(1, 0.5) translateX(-11px);
			            transform: scale(1, 0.5) translateX(-11px); }
			  100% {
			    opacity: 1;
			    -webkit-transform: scale(1, 1) translateX(-11px);
			            transform: scale(1, 1) translateX(-11px); } }
		<?php } ?>
		
		<?php if ($primary_nav_dropdown_animation == 'slide') { ?>
			.et_primary_nav_dropdown_animation_slide #et-top-navigation ul li:not(.mega-menu):hover > ul {
				-webkit-animation: fadeLeft_centered1 .4s ease-in-out;
				animation: fadeLeft_centered1 .4s ease-in-out;
			}
			 @-webkit-keyframes fadeLeft_centered1 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-15%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-22px); }
				   }
				
				@keyframes fadeLeft_centered1 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-15%);
				            transform: translateX(-15%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-22px);
				            transform: translateX(-22px); }
				}
				
			.et_secondary_nav_dropdown_animation_slide #et-secondary-nav li:hover > ul {
				-webkit-animation: fadeLeft_centered2 .4s ease-in-out;
				animation: fadeLeft_centered2 .4s ease-in-out;
			}
			 @-webkit-keyframes fadeLeft_centered2 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-14%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-7.5px); }
				   }
				
				@keyframes fadeLeft_centered2 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-14%);
				            transform: translateX(-14%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-7.5px);
				            transform: translateX(-7.5px); }
				}
			.dtb-menu ul.et-menu>li:not(.mega-menu):hover>ul {
				-webkit-animation: fadeLeft_centered3 .4s ease-in-out;
				animation: fadeLeft_centered3 .4s ease-in-out;
			}
			 @-webkit-keyframes fadeLeft_centered3 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-14%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-11px); }
				   }
				
				@keyframes fadeLeft_centered3 {
				  0% {
				    opacity: 0;
				    -webkit-transform: translateX(-14%);
				            transform: translateX(-14%); }
				  100% {
				    opacity: 1;
				    -webkit-transform: translateX(-11px);
				            transform: translateX(-11px); }
				}

		
		<?php } ?>
		
		<?php if ($primary_nav_dropdown_animation == 'flip') { ?>
			.et_primary_nav_dropdown_animation_flip #et-top-navigation ul li:not(.mega-menu) ul li:hover > ul {
				animation: flipInX_centered1 .6s ease-in-out;
			}
			.et_primary_nav_dropdown_animation_flip #et-top-navigation ul li:not(.mega-menu):hover > ul {
				animation: flipInY_centered1 .6s ease-in-out;
			}
			@keyframes flipInX_centered1 {
			  0% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 90deg) translateX(-22px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -20deg) translateX(-22px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 10deg) translateX(-22px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -5deg) translateX(-22px); }
			  100% {
			    transform: perspective(400px) translateX(-22px); } }
			@keyframes flipInY_centered1 {
			  0% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 90deg) translateX(-22px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -20deg) translateX(-22px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 10deg) translateX(-22px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -5deg) translateX(-22px); }
			  100% {
			    transform: perspective(400px) translateX(-22px); } }
				
			.et_secondary_nav_dropdown_animation_flip #et-secondary-nav ul li:hover > ul {
				animation: flipInX_centered2 .6s ease-in-out;
			}
			.et_secondary_nav_dropdown_animation_flip #et-secondary-nav li:hover > ul {
				animation: flipInY_centered2 .6s ease-in-out;
			}
			@keyframes flipInX_centered2 {
			  0% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 90deg) translateX(-7.5px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -20deg) translateX(-7.5px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 10deg) translateX(-7.5px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -5deg) translateX(-7.5px); }
			  100% {
			    transform: perspective(400px) translateX(-7.5px); } }
			@keyframes flipInY_centered2 {
			  0% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 90deg) translateX(-7.5px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -20deg) translateX(-7.5px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 10deg) translateX(-7.5px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -5deg) translateX(-7.5px); }
			  100% {
			    transform: perspective(400px) translateX(-7.5px); } }

			.dtb-menu ul.et-menu li:not(.mega-menu) ul li:hover > ul {
				animation: flipInX_centered3 .6s ease-in-out;
			}
			.dtb-menu ul.et-menu li:not(.mega-menu):hover > ul {
				animation: flipInY_centered3 .6s ease-in-out;
			}
			@keyframes flipInX_centered3 {
			  0% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 90deg) translateX(-11px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -20deg) translateX(-11px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(1, 0, 0, 10deg) translateX(-11px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(1, 0, 0, -5deg) translateX(-11px); }
			  100% {
			    transform: perspective(400px) translateX(-11px); } }
			@keyframes flipInY_centered3 {
			  0% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 90deg) translateX(-11px);
			    animation-timing-function: ease-in;
			    opacity: 0; }
			  40% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -20deg) translateX(-11px);
			    animation-timing-function: ease-in; }
			  60% {
			    transform: perspective(400px) rotate3d(0, 1, 0, 10deg) translateX(-11px);
			    opacity: 1; }
			  80% {
			    transform: perspective(400px) rotate3d(0, 1, 0, -5deg) translateX(-11px); }
			  100% {
			    transform: perspective(400px) translateX(-11px); } }
		
		<?php } ?>
			
	
    <?php } ?>
    .nav li li ul {left: <?php echo esc_html($submenu_width);?>px;}
    #et-secondary-nav li ul ul {right: <?php echo esc_html($submenu_width);?>px;}
	<?php if ($sub_show_arrow != '') { ?>
		@media (min-width:<?php echo esc_html($dtb_mobile_breakpoint)+1;?>px) {
			#top-menu>li:not(.mega-menu)>.sub-menu:after, #top-menu>li>.children:after,
			.dtb-menu ul.et-menu>li:not(.mega-menu)>.sub-menu:after {content:''; display:block; position:absolute; <?php if ($sub_align == 'centered') {?>left: <?php echo esc_html(($submenu_width/2)-10);?>px; <?php } else {?>left:20px;<?php } ?> top:-20px; width:0; height:0; border-top:10px solid transparent; border-right:10px solid transparent; border-left:10px solid transparent; z-index:1; border-bottom:10px <?php echo esc_html($sub_bg);?> solid;}
			#et-secondary-nav>li>.sub-menu:after {content:''; display:block; position:absolute; <?php if ($sub_align == 'centered') {?>right: <?php echo esc_html(($submenu_width/2)-10);?>px; <?php } else {?>right:20px;<?php } ?> top:-10px; width:0; height:0; border-top:5px solid transparent; border-right:5px solid transparent; border-left:5px solid transparent; z-index:1;
			border-bottom:5px <?php echo esc_html($sub_bg);?> solid;}
		}
	<?php } ?>
<?php } ?>


<?php if (($dtb_logo_box == '1') && ($header_style != 'centered')) { ?>
	/* Overlapping Logo */
	@media (min-width:<?php echo esc_html($dtb_mobile_breakpoint)+1;?>px) {
		.et_header_style_split .nav>li {
			position:static;
		}
		li.centered-inline-logo-wrap {
			width:<?php echo esc_html($dtb_logo_box_width)+22;?>px!important;
			min-width:<?php echo esc_html($dtb_logo_box_width)+22;?>px;
		}
		.logo_container a,
		.dtb-menu.et_pb_fullwidth_menu:not(.et_pb_fullwidth_menu--style-centered) .et_pb_menu__logo,
		.dtb-menu.et_pb_menu:not(.et_pb_menu--style-centered) .et_pb_menu__logo {
			transition:all .5s ease-in-out;
			position:absolute!important;
			top:0;
			height:<?php echo esc_html($dtb_logo_box_height);?>px!important;
			background:<?php echo esc_html($dtb_logo_box_bg);?>;
			width:<?php echo esc_html($dtb_logo_box_width);?>px;
			display:flex!important;
			<?php if ($dtb_logo_box_shadow == '1') { ?>box-shadow:<?php echo esc_html($dtb_logo_shadow_offset_x);?>px <?php echo esc_html($dtb_logo_shadow_offset_y);?>px <?php echo esc_html($dtb_logo_shadow_blur);?>px <?php echo esc_html($dtb_logo_shadow_color);?>;<?php } ?>
			<?php if ($dtb_logo_box_shadow != '1') { ?>box-shadow:none;<?php } ?>
			align-items:center;
			justify-content:center;
			padding:<?php echo esc_html($dtb_logo_box_padding);?>px;
			border-radius:0 0 <?php echo esc_html($dtb_logo_box_border);?>px <?php echo esc_html($dtb_logo_box_border);?>px;
		}
		.dtb-menu.et_pb_fullwidth_menu--style-left_aligned .et_pb_menu__logo-wrap,
		.dtb-menu.et_pb_menu--style-left_aligned .et_pb_menu__logo-wrap {
			width:<?php echo esc_html($dtb_logo_box_width)+20;?>px;
		}
		.dtb-menu.et_pb_fullwidth_menu--style-inline_centered_logo .et_pb_menu__logo-wrap,
		.dtb-menu.et_pb_menu--style-inline_centered_logo .et_pb_menu__logo-wrap {
			width:<?php echo esc_html($dtb_logo_box_width);?>px;
		}
		.et-fixed-header li.centered-inline-logo-wrap {
			width:<?php echo esc_html($dtb_logo_box_width_fixed)+22;?>px!important;
			min-width:<?php echo esc_html($dtb_logo_box_width_fixed)+22;?>px;
		}
		.et-fixed-header .logo_container a {
			height:<?php echo esc_html($dtb_logo_box_height_fixed);?>px!important;
			width:<?php echo esc_html($dtb_logo_box_width_fixed);?>px;
			background-color:<?php echo esc_html($dtb_logo_box_bg_fixed);?>;
		}
	}
<?php } ?>

<?php if ($dtb_cta_link == '1') { ?>
	#top-menu>li.cta-item>a>span,
	.dtb-menu .et-menu>li.cta-item>a>span,
	#et-secondary-nav li.cta-item>a>span {display:block;}
	#top-menu>li.cta-item>a:before,
	#top-menu>li.cta-item>a>span:before,
	#top-menu>li.cta-item>a>span:after,
	.dtb-menu .et-menu>li.cta-item>a:before,
	.dtb-menu .et-menu>li.cta-item>a>span:before,
	.dtb-menu .et-menu>li.cta-item>a>span:after,
	#et-secondary-nav li.cta-item a>span:before,
	#et-secondary-nav li.cta-item a>span:after {display:none!important;}
	.toolbox_menu4 #top-menu>li.cta-item>a,
	.toolbox_menu4 .dtb-menu .et-menu>li.cta-item>a,
	.toolbox_menu4 #et-secondary-nav li.cta-item>a {transition:all .3s ease-in-out!important;}
	#top-menu>li.cta-item:not(.menu-item-has-children), .dtb-menu .et-menu>li.cta-item:not(.menu-item-has-children),
	.et-db #et-boc .dtb-menu .et_pb_menu__menu>nav>ul>li.cta-item:not(.menu-item-has-children) {margin:0 <?php echo esc_html($cta_padding_horizontal);?>px;}
	#et-secondary-nav>li.cta-item:not(.menu-item-has-children) {margin:0 <?php echo esc_html($cta_padding_horizontal+16);?>px 0 <?php echo esc_html($cta_padding_horizontal);?>px;}
	#top-menu>li.cta-item>a>span,
	.dtb-menu .et-menu>li.cta-item>a>span,
	#et-secondary-nav>li.cta-item>a>span {transition:all .3s ease-in-out; padding:<?php echo esc_html($cta_padding_vertical);?>px <?php echo esc_html($cta_padding_horizontal);?>px!important; margin:-<?php echo esc_html($cta_padding_vertical);?>px -<?php echo esc_html($cta_padding_horizontal);?>px; border-radius:<?php echo esc_html($cta_border_radius);?>px; background:<?php echo esc_html($cta_bg_color);?>!important; color:<?php echo esc_html($cta_text_color);?>!important; border-style:solid; border-width:<?php echo esc_html($cta_border_width);?>px; border-color:<?php echo esc_html($cta_border_color);?>; <?php if ($cta_font != '1') { ?>font-family: <?php echo esc_html($cta_font); ?>; <?php }?> font-weight:<?php echo esc_html($dtb_cta_font_weight);?>; font-size:<?php echo esc_html($dtb_cta_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_cta_lettersp); ?>px; <?php if ($dtb_cta_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_cta_tt); ?>; font-variant:normal;<?php } ?>}
	#top-menu>li.cta-item>a:hover>span,
	.dtb-menu .et-menu>li.cta-item>a:hover>span,
	#et-secondary-nav>li.cta-item>a:hover>span {background:<?php echo esc_html($cta_bg_color_hover);?>!important; color:<?php echo esc_html($cta_text_color_hover);?>!important; border-color:<?php echo esc_html($cta_border_color_hover);?>;}
	#top-menu>li.cta-item>a:first-child:after,
	.dtb-menu .et-menu>li.cta-item>a:first-child:after,
	#et-secondary-nav>li.cta-item>a:first-child:after {right:4px;}
	#top-menu>li.cta-item.menu-item-has-children>a>span,
	.dtb-menu .et-menu>li.cta-item.menu-item-has-children>a>span,
	#et-secondary-nav>li.cta-item.menu-item-has-children>a>span {padding-right:<?php echo esc_html($cta_padding_horizontal)*2.5 ;?>px!important;}
	#top-menu>li.cta-item.menu-item-has-children>a:after,
	.dtb-menu .et-menu>li.cta-item.menu-item-has-children>a:after,
	#et-secondary-nav>li.cta-item.menu-item-has-children>a:after {right:<?php echo esc_html($cta_padding_horizontal)+4;?>px; color:<?php echo esc_html($cta_text_color);?>!important; top:<?php echo esc_html($cta_padding_vertical);?>px;}
	#top-menu>li.cta-item.menu-item-has-children>a:first-child:after,
	.dtb-menu .et-menu>li.cta-item.menu-item-has-children>a:first-child:after,
	#et-secondary-nav>li.cta-item.menu-item-has-children>a:first-child:after {right:4px;} 
	#top-menu>li.cta-item.menu-item-has-children>a:hover:after,
	.dtb-menu .et-menu>li.cta-item.menu-item-has-children>a:hover:after,
	#et-secondary-nav>li.cta-item.menu-item-has-children>a:hover:after {color:<?php echo esc_html($cta_text_color_hover);?>!important; z-index:2;}
	<?php if ($cta_fixed_style == '1') { ?>
		#main-header.et-fixed-header #top-menu>li.cta-item>a>span,
		.dtb-menu.et_pb_sticky .et-menu>li.cta-item>a>span, .et_pb_sticky .dtb-menu.et_pb_sticky_module .et-menu>li.cta-item>a>span,
		#main-header.et-fixed-header #et-secondary-nav>li.cta-item>a>span {background:<?php echo esc_html($cta_fixed_bg_color);?>!important; color:<?php echo esc_html($cta_fixed_text_color);?>!important; border-color:<?php echo esc_html($cta_fixed_border_color);?>;}
		#main-header.et-fixed-header #top-menu>li.cta-item>a:hover>span,
		.dtb-menu.et_pb_sticky .et-menu>li.cta-item>a:hover>span, .et_pb_sticky .dtb-menu.et_pb_sticky_module .et-menu>li.cta-item>a:hover>span,
		#main-header.et-fixed-header #et-secondary-nav>li.cta-item>a:hover>span {background:<?php echo esc_html($cta_fixed_bg_color_hover);?>!important; color:<?php echo esc_html($cta_fixed_text_color_hover);?>!important; border-color:<?php echo esc_html($cta_fixed_border_color_hover);?>;}
	<?php }?>
<?php } ?>
	
<?php if (($dtb_mobile_fixed != '') || ($dtb_mobile_fixed != '0')) { ?>
	#main-header, #top-header {transition:all .3s ease-in-out!important;}
	#main-header.et-fixed-header, #top-header.et-fixed-header {position:fixed!important;}
	@media (max-width:600px) {
		body.admin-bar.et_fixed_nav #main-header.et-fixed-header {transform:translateY(-46px);}
	}
<?php } ?>
	
	
<?php if (($dtb_mobile_top != '') || ($dtb_mobile_top != '0')) { ?>
	@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		#top-header {display:none!important}
	}
<?php } ?>
	
	
<?php if (($dtb_mobile_fixed != '') || ($dtb_mobile_fixed != '0')) { ?>
	@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		#main-header {transition:all .3s ease-in-out; height:auto; position:fixed!important;}
		#top-header {transition:all .3s ease-in-out!important; position:fixed!important;}
	}
	<?php if (($dtb_mobile_fixed_top != '') || ($dtb_mobile_fixed_top != '0')) { ?>
		@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
			#top-header.et-fixed-header {transform:translateY(-32px);}
			#main-header.et-fixed-header {top:0!important; z-index:200000;}
		}
		@media (max-width:600px) {
			body.admin-bar.et_fixed_nav #top-header.et-fixed-header {transform:translateY(-46px);}
		body.admin-bar.et_fixed_nav #main-header.et-fixed-header {transform:none;}
		}
	<?php } else { ?>
	
		@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
			#top-header.et-fixed-header {top:0!important; margin-bottom:60px;}
			.admin-bar #top-header.et-fixed-header {top:32px!important;}
		}
		@media (max-width:782px) {
			.admin-bar #top-header.et-fixed-header {top:46px!important;}
		}
		@media (max-width:600px) {
			.admin-bar #top-header.et-fixed-header {top:0!important;}
		}
		
	<?php } ?>
	
<?php } ?>

	
	
<?php if ($dtb_mobile_breakpoint < '981') { ?>

	@media only screen and ( min-width:<?php echo esc_html($dtb_mobile_breakpoint+1);?>px ) and (max-width:980px) {
		#logo, .logo_container, #main-header, .container {transition: all 0.4s ease-in-out;}
		#et_mobile_nav_menu {display:none!important;}
		#top-menu, nav#top-menu-nav {display:block;}
		#et-secondary-nav, #et-secondary-menu, #et-info .et-social-icons {display:inline-block!important;}
	   #et-info {padding-top:0;}
	   #top-header .container {padding-top:0.75em;}
	   .et_fixed_nav #page-container #main-header, .et_fixed_nav #page-container #top-header {position:fixed;}
		.et_hide_primary_logo #main-header:not(.et-fixed-header) .centered-inline-logo-wrap, .et_hide_fixed_logo #main-header.et-fixed-header .centered-inline-logo-wrap, .et_header_style_centered.et_hide_primary_logo #main-header:not(.et-fixed-header) .logo_container, .et_header_style_centered.et_hide_fixed_logo #main-header.et-fixed-header .logo_container, .et_header_style_split.et_hide_primary_logo #main-header:not(.et-fixed-header) .logo_container, .et_header_style_split.et_hide_fixed_logo #main-header.et-fixed-header .logo_container {
			height:0;
			padding:0;
			opacity:0;
		}
		.et_pb_fullwidth_menu.dtb-menu .et_pb_menu__menu, .et_pb_menu.dtb-menu .et_pb_menu__menu {display:flex;}
		.dtb-menu .et_mobile_nav_menu {display: none; float: right;}
		.et_pb_fullwidth_menu--style-inline_centered_logo.dtb-menu>div>.et_pb_menu__logo-wrap,
		.et_pb_menu--style-inline_centered_logo.dtb-menu>div>.et_pb_menu__logo-wrap {display:none;}
		
		<?php if ($header_style == 'centered') { ?>
			.et_header_style_centered nav#top-menu-nav {display:inline-block;}
			.et_header_style_centered.et_hide_primary_logo #main-header:not(.et-fixed-header) .logo_container, .et_header_style_centered.et_hide_fixed_logo #main-header.et-fixed-header .logo_container {height:<?php echo esc_html( $menu_height * .18 ); ?>px; }
			.et_header_style_centered #main-header {padding:0;}
			.et_header_style_centered #logo {max-height:<?php echo esc_html( $logo_height . '%' ); ?>;}
			.et_header_style_centered #page-container #main-header:not(.et-fixed-header) .logo_container {height:<?php echo esc_html( $menu_height ); ?>px; max-height:none;}
			.et_header_style_centered header#main-header.et-fixed-header .logo_container {height:<?php echo esc_html( $fixed_menu_height ); ?>px; max-height:none;}
			.et_header_style_centered.et_hide_primary_logo #page-container #main-header:not(.et-fixed-header) .logo_container, .et_header_style_centered.et_hide_fixed_logo #page-container #main-header.et-fixed-header .logo_container {height:<?php echo esc_html( $menu_height * .18 ); ?>px; }
			.et_header_style_centered #et_top_search {display:inline-block !important; float:none; margin:3px 0 0 22px;}
		<?php } ?>
		
		<?php if ($header_style == 'left') { ?>
			.et_header_style_left #logo {max-width:100%; max-height:<?php echo esc_html( $logo_height . '%' ); ?>;}
			.et_header_style_left #et-top-navigation, .et_header_style_split #et-top-navigation  {padding:<?php echo esc_html( round( $menu_height / 2 ) ); ?>px 0 0 0; }
			.et_header_style_left #et-top-navigation nav > ul > li > a {padding-bottom:<?php echo esc_html( round ( $menu_height / 2 ) ); ?>px; }
			.et_header_style_left .et-fixed-header #et-top-navigation nav > ul > li > a {padding-bottom:<?php echo esc_html( round( $fixed_menu_height / 2 ) ); ?>px; }
			.et_header_style_left .et-fixed-header #et-top-navigation {padding:<?php echo esc_html( intval( round( $fixed_menu_height / 2 ) ) ); ?>px 0 0 0; }
			#et_top_search {float:right; margin:-10px 0 0 22px;}
		<?php } ?>
		
		<?php if ($header_style == 'split') { ?>
			.et_header_style_split #et-top-navigation  {padding:<?php echo esc_html( round( $menu_height / 2 ) ); ?>px 0 0 0; }
			.et_header_style_split #et-top-navigation nav > ul > li > a {padding-bottom:<?php echo esc_html( round ( $menu_height / 2 ) ); ?>px; }
			.et_header_style_split .et-fixed-header #et-top-navigation nav > ul > li > a  {padding-bottom:<?php echo esc_html( round( $fixed_menu_height / 2 ) ); ?>px; }
			.et_header_style_split .et-fixed-header #et-top-navigation {padding:<?php echo esc_html( intval( round( $fixed_menu_height / 2 ) ) ); ?>px 0 0 0; }
			.et_header_style_split #main-header {padding:0;}
			.et_header_style_split #main-header #top-menu-nav {display:inline-block;}
			.et_header_style_split .centered-inline-logo-wrap {width:<?php echo esc_html( $menu_height ); ?>px; margin:-<?php echo esc_html( $menu_height ); ?>px 0; }
			.et_header_style_split .centered-inline-logo-wrap #logo {max-height:<?php echo esc_html( $menu_height ); ?>px; }
			.et_header_style_split .et-fixed-header .centered-inline-logo-wrap {width:auto; height:<?php echo esc_html( ( ( intval( $fixed_menu_height ) / 100 ) * $logo_height ) + 14 ); ?>px; margin:-<?php echo esc_html( round( $fixed_menu_height / 2 ) ); ?>px 0;}
			.et_header_style_split .centered-inline-logo-wrap #logo,
			.et_header_style_split .et-fixed-header .centered-inline-logo-wrap #logo {height:auto; max-height:100%; max-width:100%;}
			.et_header_style_split .et_mobile_menu {line-height:23px;}
			.et_header_style_split #et_top_search {display:inline-block !important; float:none; margin:3px 0 0 22px;}
			.et_header_style_split #et_search_icon:before {margin-top:-20px;}
			
		<?php } ?>
		
		<?php if ($header_style == 'slide') { ?>
			.et_header_style_slide #et-top-navigation {padding:<?php echo esc_html( round( ( $menu_height - 18 ) / 2 ) ); ?>px 0 <?php echo esc_html( round( ( $menu_height - 18 ) / 2 ) ); ?>px 0 !important; }
			.et_header_style_slide #main-header {transition:left 0.8s cubic-bezier(0.77, 0, 0.175, 1), background 0.4s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.4s cubic-bezier(0.77, 0, 0.175, 1), transform 0.4s ease-in-out;}
			.et_header_style_slide.et_pb_slide_menu_active #main-header {left:-320px!important;}
			body.admin-bar.et_fixed_nav.et_header_style_slide #main-header {top:32px!important}
			.et_header_style_slide .et-fixed-header #et-top-navigation {padding:<?php echo esc_html( round(($fixed_menu_height-18)/2)); ?>px 0 <?php echo esc_html( round( ( $fixed_menu_height - 18 ) / 2 ) ); ?>px 0!important;}
			.et_header_style_left #logo {max-width:100%; max-height:<?php echo esc_html( $logo_height . '%' ); ?>;}
		<?php } ?>
		
		<?php if ($header_style == 'fullscreen') { ?>
			.et_header_style_fullscreen #et-top-navigation {padding:<?php echo esc_html( round( ( $menu_height - 18 ) / 2 ) ); ?>px 0 <?php echo esc_html( round( ( $menu_height - 18 ) / 2 ) ); ?>px 0 !important; }
			.et_header_style_fullscreen .et-fixed-header #et-top-navigation {padding:<?php echo esc_html( round(($fixed_menu_height-18)/2)); ?>px 0 <?php echo esc_html( round( ( $fixed_menu_height - 18 ) / 2 ) ); ?>px 0!important;}
			.et_header_style_fullscreen #logo {max-width:100%; max-height:70%;}
		<?php } ?>
		
		.et_hide_primary_logo #main-header:not(.et-fixed-header) .logo_container, .et_hide_fixed_logo #main-header.et-fixed-header .logo_container {height:0;opacity:0;transition:all 0.4s ease-in-out;}		
	} /* end media query */
	
<?php } ?>	



<?php if ($dtb_mobile_breakpoint > '980') { ?>

	@media only screen and ( min-width:981px ) and (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		#et-top-navigation .et-cart-info {margin-top:5px;}	
		#main-header #et_top_search {float:left; margin:10px 15px 0 0;}
		#et_mobile_nav_menu {display:block;}
		#top-menu {display:none;}
		.et_hide_nav.et_non_fixed_nav.et_transparent_nav #top-header, .et_hide_nav.et_non_fixed_nav.et_transparent_nav #main-header, .et_hide_nav.et_fixed_nav #top-header, .et_hide_nav.et_fixed_nav #main-header {opacity:1; transform:translateY(0px) !important;}
		#et-top-navigation {margin-right:0; transition:none;}
		.et_non_fixed_nav.et_transparent_nav #main-header, .et_non_fixed_nav.et_transparent_nav #top-header, .et_fixed_nav #main-header, .et_fixed_nav #top-header {position:absolute;}
		.et_non_fixed_nav.et_transparent_nav #main-header, .et_fixed_nav #main-header {transition:none;}
		
		
		.et_pb_fullwidth_menu.dtb-menu .et_pb_menu__menu, .et_pb_menu.dtb-menu .et_pb_menu__menu {display:none;}
		.dtb-menu .et_mobile_nav_menu {display: flex;}
		.et_pb_fullwidth_menu--style-left_aligned.dtb-menu .et_pb_menu__wrap, .et_pb_menu--style-left_aligned.dtb-menu .et_pb_menu__wrap {justify-content:flex-end;}
		.et_pb_fullwidth_menu--style-left_aligned.dtb-menu .et_pb_menu_inner_container, .et_pb_fullwidth_menu--style-left_aligned.dtb-menu .et_pb_row, .et_pb_menu--style-left_aligned.dtb-menu .et_pb_menu_inner_container, .et_pb_menu--style-left_aligned.dtb-menu .et_pb_row {align-items:center;}
		.et_pb_fullwidth_menu--style-inline_centered_logo.dtb-menu .et_pb_menu_inner_container>.et_pb_menu__logo-wrap, .et_pb_fullwidth_menu--style-inline_centered_logo.dtb-menu .et_pb_row>.et_pb_menu__logo-wrap, .et_pb_menu--style-inline_centered_logo.dtb-menu .et_pb_menu_inner_container>.et_pb_menu__logo-wrap, .et_pb_menu--style-inline_centered_logo.dtb-menu .et_pb_row>.et_pb_menu__logo-wrap {display:flex;}
		.et_pb_fullwidth_menu.dtb-menu .et_mobile_menu, .et_pb_fullwidth_menu.dtb-menu .et_mobile_menu ul, .et_pb_menu.dtb-menu .et_mobile_menu, .et_pb_menu.dtb-menu .et_mobile_menu ul {text-align:left; list-style:none!important;}
		.et_pb_fullwidth_menu.dtb-menu .et_mobile_menu, .et_pb_menu.dtb-menu .et_mobile_menu {top:100%; padding:5%;}
		.et_pb_fullwidth_menu.dtb-menu .et_mobile_menu ul, .et_pb_menu.dtb-menu .et_mobile_menu ul {padding:0;}
		
		<?php if ($header_style == 'left') { ?>
			.et_header_style_left #page-container .et-fixed-header #et-top-navigation, .et_header_style_left #page-container #et-top-navigation {display:block; padding-top:24px;}	
			.et_vertical_nav.et_header_style_left .logo_container {position:absolute; height:100%;}
			.et_header_style_left #logo, .et_header_style_split #logo {max-width:50%;}
			.et_header_style_left #logo {max-height:54%;}
		<?php } ?>
		
		<?php if ($header_style == 'centered') { ?>
			.et_header_style_centered #et_top_search, .et_vertical_nav.et_header_style_centered #main-header #et_top_search {display:none!important}
			.et_header_style_centered #main-header {padding:20px 0;}
			.et_header_style_centered nav#top-menu-nav {display:none;}
			.et_header_style_centered #logo {max-height:60px;}
			.et_header_style_centered header#main-header .logo_container {height:auto; max-height:100px; padding:0;}
			.et_header_style_centered #main-header #logo {max-height:60px;}
			.et_header_style_centered .mobile_menu_bar, .et_header_style_split .mobile_menu_bar {opacity:1;}
			.et_header_style_centered #et_mobile_nav_menu {float:none; position:relative; margin-top:20px;}
			.et_header_style_centered #main-header .mobile_nav {display:block; padding:5px 10px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; background-color:rgba(0, 0, 0, 0.05); text-align:left;}
			.et_header_style_centered .mobile_nav .select_page, .et_header_style_split .mobile_nav .select_page {display:inline-block; color:#666; font-size:14px;}
			.et_header_style_centered .mobile_menu_bar {position:absolute; top:2px; right:5px;}
			.et_header_style_centered .et_mobile_menu {top:53px;}
			.et_header_style_centered #et-top-navigation .et-cart-info {display: none;}
		<?php } ?>
		
		<?php if ($header_style == 'split') { ?>
			.et_header_style_split #et_top_search, .et_vertical_nav.et_header_style_split #main-header #et_top_search {display:none!important}
			.et_header_style_split #main-header {padding:20px 0;}
			.et_header_style_split #et-top-navigation, .et_header_style_split .et-fixed-header #et-top-navigation {display:block; padding-top:0;}
			.et_header_style_split header#main-header .logo_container {height:auto; max-height:100px; padding:0;}
			.et_header_style_split #logo {max-height:60px; display:inline-block;}
			.et_header_style_split #et_mobile_nav_menu {display:block; float:none; position:relative; margin-top:20px;}
			.et_header_style_split nav#top-menu-nav {display:none;}
			.et_header_style_split #main-header .mobile_nav {display:block; padding:9px 10px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; background-color:rgba(0, 0, 0, 0.05); text-align:left;}
			.et_header_style_split .mobile_menu_bar {position:absolute; top:2px; right:5px;}
			.et_header_style_split .et_mobile_menu {top:53px; line-height:23px;}
			.et_header_style_split #main-header #et-top-navigation, .et_header_style_split #main-header.et-fixed-header #et-top-navigation {padding-top:0; display:block;}
			.et_header_style_split .mobile_nav .select_page {display:inline-block;}
		<?php } ?>
		body.admin-bar.et_fixed_nav.et_header_style_slide #main-header {top:0!important; left:0!important}
		
		.et_vertical_nav.et_right_sidebar #left-area, .et_vertical_nav.et_left_sidebar #left-area {width:auto;}
		#et-secondary-nav, #et-secondary-menu {display:none !important;}
		.et_non_fixed_nav.et_transparent_nav_temp #main-header, .et_secondary_nav_only_menu #main-header, .et_fixed_nav_temp #main-header, .et_secondary_nav_only_menu #main-header {top:0 !important;}
		.et_secondary_nav_only_menu #top-header {display:none;}
		#top-header .container {padding-top:0;}
		#et-info {padding-top:0.75em;}
		#logo, .logo_container, #main-header, .container {-webkit-transition:none; -moz-transition:none; transition:none;}
		.et_vertical_nav span.logo_helper {display:inline-block;}		
	} /* end media query */	
	
<?php } ?>


<?php if ( ($dtb_enable_hamburger_icon != '') ) { include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/css/hamburger-icon.php'); } ?>
<?php if ( ($dtb_m_mobile_trigger != '') ) { include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/css/mobile-menu-trigger.php'); } ?>


<?php if ($dtb_mobile_enable == '1') { ?>
 	
	@media (min-width:981px) and (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		.dtb_mobile #main-header #et_top_search {margin-right:0!important;}
	}
	@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		.et_header_style_centered #et-top-navigation .et-social-icons {display:none;}
		.et_header_style_centered .et_mobile_menu,
		.et_header_style_split .et_mobile_menu  {top:<?php echo esc_html($dtb_mobile_menu_height);?>px}
		.et_header_style_centered header#main-header .logo_container,
		.et_header_style_split header#main-header .logo_container {max-height:none;}
		<?php if ($dtb_hamburger_size == 'large') { ?> 
			#main-header .hamburger_menu_icon, #dtb-m-menu .hamburger_menu_icon {transform:scale(1.5);}
		 <?php } ?>
		/*.hamburger_menu_icon div {background:<?php echo esc_html($dtb_hamburger_color);?>;}
		.hamburger_menu_icon:hover div {background:<?php echo esc_html($dtb_hamburger_color_hover);?>;}
		.hamburger_menu_icon-toggled div {background:<?php echo esc_html($dtb_hamburger_color_open);?>;}
		.hamburger_menu_icon-toggled:hover div {background:<?php echo esc_html($dtb_hamburger_color_open_hover);?>;}*/
		.dtb_mobile #main-header,
		.dtb-menu.et_pb_module {padding:0;}
		.dtb_mobile #main-header .logo_container,
		.et_header_style_centered.dtb_mobile header#main-header .logo_container {
			position:relative;
			text-align:left;
			z-index:2;
			height:<?php echo esc_html($dtb_mobile_menu_height);?>px!important;
			max-width:calc(100% - 30px);
		}
		.dtb-menu.et_pb_module,
		.dtb-menu.et_pb_module .et_pb_menu_inner_container>.et_pb_menu__logo-wrap .et_pb_menu__logo, .dtb-menu.et_pb_module .et_pb_menu__logo-slot,
		.dtb-menu.et_pb_module>.et_pb_menu_inner_container  {max-width:100%;}
		.dtb-menu.et_pb_module>.et_pb_row {min-height:0;}
		.dtb-menu.et_pb_module .et_pb_menu__logo, .dtb-menu.et_pb_module .et_pb_menu__logo img, .dtb-menu.et_pb_module .et_pb_menu__logo a {max-height:100%; height:100%;}
		.dtb_mobile #main-header .logo_container,
		.et_header_style_centered.dtb_mobile.dtb_woo header#main-header .logo_container {
			max-width:calc(100% - 60px);
		}
		.dtb_mobile #main-header .select_page {display:none;}
		.dtb_mobile #main-header .mobile_nav {background:transparent;}
		.dtb_mobile #main-header #et_mobile_nav_menu, .et_header_style_centered.dtb_mobile #main-header #et_mobile_nav_menu,
		.dtb-menu #et_mobile_nav_menu {
			height:0;
			margin-top:0;
			display:flex;
			align-items:center;
			position:static!important;
		}
		.dtb_mobile #main-header #logo {
			max-height:<?php echo esc_html($dtb_mobile_logo_height);?>%!important;
			max-width:calc(100% - 30px);
			height:<?php echo esc_html($dtb_mobile_logo_height);?>%;
		}
		.dtb_mobile.dtb_woo #main-header #logo {
			max-width:calc(100% - 60px);
		}
		.dtb_mobile #main-header #et-top-navigation {
			padding:0!important;
			position:static!important;
		}
		.dtb_mobile #main-header .mobile_menu_bar,
		.et_header_style_centered.dtb_mobile #main-header .mobile_menu_bar{
			top:<?php echo esc_html(($dtb_mobile_menu_height/2)-16);?>px;
			<?php if (($dtb_hamburger_icon != '') && ($dtb_hamburger_icon != 'none')) { ?>top:<?php echo esc_html(($dtb_mobile_menu_height/2)-10);?>px;<?php } ?>
			padding:0;
			right:0;
			position:absolute;
			z-index:10001;
		}
		.et_header_style_centered header#main-header .logo_container
		.custom_hamburger_icon.dtb_mobile #main-header .mobile_menu_bar {top:<?php echo esc_html(($dtb_mobile_menu_height/2)-12);?>px;}
		
		<?php if ($dtb_mobile_bar_fullwidth == '1') { ?>
			.dtb_mobile #main-header .et_menu_container {width:100%; padding:0 10px;}
			.dtb_mobile #main-header .mobile_menu_bar {right:10px!important;}
			<?php if ($dtb_hamburger_size == 'large') { ?>
				.dtb_mobile #main-header .mobile_menu_bar {right:20px!important;}
			<?php } ?>
		<?php } ?>
		
		.dtb_mobile #main-header, .dtb_mobile #main-header.et-fixed-header, .dtb-menu.et_pb_module {
			background:<?php echo esc_html($dtb_mobile_bar_bg);?>!important;
			box-shadow:none!important;
			<?php if ($dtb_mobile_bar_shadow == '1') { ?>
				box-shadow:0 <?php echo esc_html($dtb_mobile_bar_shadow_offset);?>px <?php echo esc_html($dtb_mobile_bar_shadow_blur);?>px <?php echo esc_html($dtb_mobile_bar_shadow_color);?>!important;
			<?php } ?>
		}
		
		<?php if ($dtb_hamburger_size == 'large') { ?>
			.et_pb_menu_hidden .mobile_menu_bar.hamburger_menu_icon {
			  
			  animation: fadeOutBottomBig 1s 1 cubic-bezier(0.77, 0, 0.175, 1)!important; }
			
			.et_pb_menu_visible .mobile_menu_bar.hamburger_menu_icon {
			  
			  animation: fadeInBottomBig 1s 1 cubic-bezier(0.77, 0, 0.175, 1)!important; }
  
  
			@keyframes fadeInBottomBig {0% {opacity: 0; transform: translateY(60%) scale(1.5);} 100% {opacity: 1; transform: translateY(0) scale(1.5); } }
			@keyframes fadeOutBottomBig {0% {opacity: 1; transform: translateY(0) scale(1.5); } 100% {opacity: 0; transform: translateY(60%) scale(1.5); } }
		<?php } ?>
			
			
		<?php if ($dtb_enable_custom_m_menu != '1') { ?>
		
			<?php if ($dtb_hamburger_size == 'large') { ?>
				body:not(.custom-hamburger-icon) .mobile_menu_bar {transform:scale(1.5); top:<?php echo esc_html(($dtb_mobile_menu_height/2)-16);?>px; }
			<?php } ?>
			
			body:not(.custom-hamburger-icon) .mobile_menu_bar:before {
				<?php if ($dtb_hamburger_size == 'large') :echo 'transform:scale(1.5);'; endif; ?>
				color:<?php echo esc_html($dtb_hamburger_color);?>; transition: all .3s ease-in-out;
			}
			body:not(.custom-hamburger-icon) .mobile_menu_bar:hover:before {
				color:<?php echo esc_html($dtb_hamburger_color_hover);?>
			}
			body:not(.custom-hamburger-icon) .opened .mobile_menu_bar:before {
				color:<?php echo esc_html($dtb_hamburger_color_open);?>; content:'\4d';
			}
			body:not(.custom-hamburger-icon) .opened .mobile_menu_bar:hover:before {
				color:<?php echo esc_html($dtb_hamburger_color_open_hover);?>;;
			}
			.dtb_mobile #main-header .et_mobile_menu,
			.dtb_mobile .dtb-menu .et_mobile_menu,
			.dtb_mobile #et-boc .dtb-menu .et_mobile_menu {
				box-shadow:<?php echo esc_html($dtb_mobile_menu_shadow_offset_x)?>px <?php echo esc_html($dtb_mobile_menu_shadow_offset_y)?>px <?php echo esc_html($dtb_mobile_menu_shadow_blur)?>px <?php echo esc_html($dtb_mobile_menu_shadow_color)?>!important;
				<?php if (($dtb_mobile_menu_shadow == '') || ($dtb_mobile_menu_shadow == '0')) { ?>
					box-shadow:none!important;
				<?php } ?>
				background:<?php echo esc_html($dtb_mobile_menu_bg); ?>;
				border-top:none;
				padding:0;
			}
			.dtb_mobile #main-header .et_mobile_menu {
				<?php if (($dtb_mobile_bar_fullwidth != '') && ($dtb_mobile_menu_fullwidth != '1')) { ?>
					left:10%; width:80%;
				<?php } ?>
				<?php if (($dtb_mobile_bar_fullwidth != '1') && ($dtb_mobile_menu_fullwidth == '1')) { ?>
					width:100vw; left:-10vw;
				<?php } ?>
			}
			.dtb_mobile .et_mobile_menu li a,
			.dtb_mobile .dtb-menu .et_mobile_menu li a,
			.dtb_mobile #et-boc .dtb-menu .et_mobile_menu li a {
				border-bottom-color:<?php echo esc_html($dtb_mobile_separator); ?>;
				font-size:<?php echo esc_html($dtb_mobile_font_size);?>px;
				color:<?php echo esc_html($dtb_mobile_font_color)?>;
				font-weight:<?php echo esc_html($dtb_mobile_font_weight);?>;
				padding-top:<?php echo esc_html($dtb_mobile_padding_top);?>px;
				padding-bottom:<?php echo esc_html($dtb_mobile_padding_bottom);?>px;
				padding-right:<?php echo esc_html($dtb_mobile_padding_right);?>px;
				padding-left:<?php echo esc_html($dtb_mobile_padding_left);?>px;
				line-height:1;
				<?php if ($dtb_mobile_font_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_mobile_font_tt); ?>; font-variant:normal;<?php } ?>
				letter-spacing:<?php echo esc_html($dtb_mobile_font_lettersp);?>px;
				<?php if ($mobile_font != '') {?>font-family:<?php echo esc_html($mobile_font); ?>;<?php } ?>
			}
			.dtb_mobile .et_mobile_menu li.menu-item-has-children>a,
			.dtb_mobile .dtb-menu .et_mobile_menu li.menu-item-has-children>a{background:<?php echo esc_html($dtb_mobile_menu_parent_bg);?>;}
			.dtb_mobile .et_mobile_menu li a:hover,
			.dtb_mobile .dtb-menu .et_mobile_menu li a:hover {
				background:<?php echo esc_html($dtb_mobile_menu_bg_hover);?>;
				color:<?php echo esc_html($dtb_mobile_font_color_hover);?>;
				opacity:1;
			}
			.dtb_mobile.et_header_style_split .et_mobile_menu {line-height:23px;}
		<?php } ?>
		.dtb_mobile.dtb_woo #et-top-navigation .et-cart-info {position:absolute; top:<?php echo esc_html($dtb_mobile_menu_height/2-11);?>px; right:40px; margin-top:0;}
		<?php if (($show_search_icon != '') || ($show_search_icon != '0')) { ?>
			.dtb_mobile #et_top_search {float:none; margin:0!important; position:absolute; top:<?php echo esc_html($dtb_mobile_menu_height/2-9);?>px; right:0; display:block!important;}
			.dtb_mobile #et_top_search #et_search_icon:before {top:0;}
			.dtb_mobile.dtb_woo #et_top_search {right:0;}
			<?php if ($dtb_mobile_bar_fullwidth == '1') { ?>
				.dtb_mobile.dtb_woo #et_top_search {right:10px;}
			<?php } ?>
			.dtb_mobile.dtb_woo .et-cart-info span:before {margin-right:0;}
			<?php if ($dtb_search_icon_hide != '1') { ?>
				.dtb_mobile #main-header .mobile_menu_bar {margin-right:30px;}
			<?php } ?>
			<?php if ($dtb_search_icon_size == 'large') { ?>
				.dtb_mobile #et_top_search {transform:scale(1.5) translateY(-3px);}
				.dtb_mobile span.et_close_search_field {transform:scale(1.5);}
				<?php if (($dtb_mobile_bar_fullwidth != '1') && ($dtb_search_icon_hide != '1')) { ?>
					.dtb_mobile #main-header .mobile_menu_bar {margin-right:50px;}
				<?php } ?>
			<?php } ?>
			.dtb_mobile #et_search_icon:before {color:<?php echo esc_html($dtb_search_icon_color); ?>!important;}
			.dtb_mobile #et_search_icon:hover:before {color:<?php echo esc_html($dtb_search_icon_color_hover); ?>!important}
			.dtb_mobile span.et_close_search_field:after {color:<?php echo esc_html($dtb_search_close_icon_color); ?>!important}
			.dtb_mobile span.et_close_search_field:hover:after {color:<?php echo esc_html($dtb_search_close_icon_color_hover); ?>!important}
			
			.dtb_mobile .et_search_form_container input {font-family: <?php echo esc_html($primary_nav_font); ?>, "Open Sans", serif; color:<?php echo esc_html($dtb_search_font_color); ?>}
			.dtb_mobile #main-header input.et-search-field::placeholder {color:<?php echo esc_html($dtb_search_font_color); ?>; font-family: <?php echo esc_html($primary_nav_font); ?>, "Open Sans", serif;}
			.dtb_mobile #main-header input.et-search-field::-webkit-input-placeholder {color:<?php echo esc_html($dtb_search_font_color); ?>; font-family: <?php echo esc_html($primary_nav_font); ?>, "Open Sans", serif;}
			.dtb_mobile #main-header input.et-search-field::-moz-placeholder {color:<?php echo esc_html($dtb_search_font_color); ?>; font-family: <?php echo esc_html($primary_nav_font); ?>, "Open Sans", serif;}
			<?php if ($dtb_mobile_bar_fullwidth == '1') { ?>
				.dtb_mobile .et_search_form_container {margin-right:10px; }
			<?php } ?>
			
			<?php if ($dtb_search_icon_hide != '') { ?>
				.dtb_mobile #et_search_icon {display:none!important;}
			<?php } ?>
			.dtb_mobile #main-header .et_search_outer .container {max-width:50%!important; }
			.et_header_style_centered .et_search_outer, .et_header_style_split .et_search_outer {display:block;}
			.et_header_style_centered .et-search-form input, .et_header_style_centered span.et_close_search_field {top:0;}
			.et_pb_menu_hidden span.mobile_menu_bar.mobile_menu_bar_toggle {opacity:0;}
			.et_header_style_split #et_search_icon:before {margin-top:0;}
			.et_header_style_split span.logo_helper {display:inline-block;}
		
			
			
		<?php } ?>
		
		<?php if ($dtb_enable_custom_m_menu != '1') { ?>	
			<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			
				.dtb_mobile #et-top-navigation .et-cart-info {position:absolute; top:0; top:<?php echo esc_html($dtb_mobile_menu_height/2-9);?>px; right:30px; margin:0; z-index:10001; <?php if ($dtb_hamburger_size == 'large') :echo 'transform:scale(1.5);'; endif; ?>}
				.dtb_mobile #main-header #et_top_search {}
				.et_header_style_centered #et-top-navigation .et-cart-info {display:block;}
			
			<?php } ?>
			
			<?php if ($dtb_mobile_menu_style == 'slide') { ?>
				.dtb_mobile #mobile_menu {
					display:block !important;
					min-height:100vh;
					padding-top:<?php echo esc_html($dtb_mobile_menu_height);?>px!important;
					padding-bottom:<?php echo esc_html($dtb_mobile_menu_height);?>px!important;
					z-index:9998;
					width:100%;
					<?php if ($dtb_mobile_menu_fullwidth != '1') { ?>
						width:80%; min-width:200px; left:auto!important; max-width:350px; right:-10vw;
					<?php } ?>
					top:0;
					position:absolute; }	
				.dtb_mobile .dtb-menu .et_mobile_menu,
				.dtb_mobile #et-boc .dtb-menu .et_mobile_menu {
					display:block !important;
					min-height:100vh;
					padding-top:<?php echo esc_html($dtb_mobile_menu_height);?>px!important;
					padding-bottom:<?php echo esc_html($dtb_mobile_menu_height);?>px!important;
					z-index:9998;  width:80%; min-width:200px; left:auto!important; max-width:350px; right:-10vw; top:0;
					position:absolute; }	
					
				.dtb_mobile .mobile_nav.closed #mobile_menu,
				.dtb_mobile .dtb-menu .mobile_nav.closed .et_mobile_menu {
				 transform:rotateY(90deg); -webkit-transform:rotateY(90deg);
				 transform-origin:right; -webkit-transform-origin:right; transition:.8s ease-in-out !important; }
				.dtb_mobile .mobile_nav.opened #mobile_menu,
				.dtb_mobile .dtb-menu .mobile_nav.opened .et_mobile_menu {
				 transform:rotateY(0deg); -webkit-transform:rotateY(0deg);
				 transform-origin:right; -webkit-transform-origin:right; transition:.8s ease-in-out; }
				@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		body.noscroll #page-container #main-header, body.noscroll #page-container #top-header {position: fixed !important; }
		.et_mobile_menu { overflow: scroll !important; }
		.et_fixed_nav.noscroll #main-header {position: fixed !important;}	
		body.noscroll{overflow:hidden !important;}
				}
			<?php } ?>
			<?php if ($dtb_cta_link == '1') { ?>
				.dtb_mobile .et_mobile_menu li.cta-item>a,
				.dtb_mobile .dtb-menu .et_mobile_menu li.cta-item>a {
					font-size:<?php echo esc_html($dtb_mobile_cta_font_size);?>px;
					color:<?php echo esc_html($dtb_mobile_cta_color)?>;
					background:<?php echo esc_html($dtb_mobile_cta_bg_color)?>;
					font-weight:<?php echo esc_html($dtb_mobile_cta_font_weight);?>;
					padding-top:<?php echo esc_html($dtb_mobile_cta_padding);?>px;
					padding-bottom:<?php echo esc_html($dtb_mobile_cta_padding);?>px;
					<?php if ($dtb_mobile_cta_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_mobile_cta_tt); ?>; font-variant:normal;<?php } ?>
					letter-spacing:<?php echo esc_html($dtb_mobile_cta_lettersp);?>px;
					<?php if (($mobile_cta_font != '') || ($mobile_cta_font != 'none')) {?>font-family:<?php echo esc_html($mobile_cta_font); ?>;<?php } ?>
				}
				.dtb_mobile .et_mobile_menu li.cta-item>a:hover,
				.dtb_mobile .dtb-menu .et_mobile_menu li.cta-item>a:hover {
					color:<?php echo esc_html($dtb_mobile_cta_color_hover)?>;
					background:<?php echo esc_html($dtb_mobile_cta_bg_color_hover)?>;
					<?php if ($dtb_mobile_cta_hover!='') { ?>
					transform:none !important;
					animation:none!important;
					<?php } ?>
				}
			<?php } ?>
		
		<?php if ($dtb_mobile_dim_background != '') { ?>
			.mobile_nav:before {
				content: '';
				position: fixed;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0; z-index:3;
				display: block;
				transition:all 1s ease-in-out; opacity:0;visibility:hidden;
			}
			.mobile_nav.opened:before {visibility:visible; background:<?php echo esc_html($dtb_mobile_dim_color);?>; opacity:1;}
			.mobile_menu_bar {z-index:4;}
		<?php } ?>
			
		<?php } ?>
		
		
	
	}/* end media query */
<?php } ?>


<?php if ( ($dtb_social_enable == '1') || (($dtb_m_mobile_elements_social == '1') && ($dtb_enable_custom_m_menu == '1')) ){ ?>
	#top-header .et-social-icons a,
	#main-header .et-social-icons a {color:<?php echo esc_html($social_head_color); ?>; font-size:<?php echo esc_html($social_head_size); ?>px;}
	#top-header .et-social-icons a:hover,
	#main-header .et-social-icons a:hover {opacity:1; color:<?php echo esc_html($social_head_color_hover); ?>}
	/* Footer Icons */
	#footer-bottom .et-social-icons {margin:<?php echo esc_html($social_foot_margin); ?>px 0 <?php echo esc_html($social_foot_margin)+10; ?>px; display:flex; justify-content:center; flex-wrap:wrap;}
	#footer-bottom .et-social-icons li {float:left; display:block; margin:<?php echo esc_html($social_foot_margin_icon)/2; ?>px;}
	.et-social-google-plus a.icon:before {font-size:80%;}
	@media (min-width:981px) {
		#footer-bottom .et-social-icons li:last-child {margin-right:0;}
		<?php if ( $dtb_center_bottom_bar_val != '1'){ ?>
		#footer-info {margin:<?php echo esc_html($social_foot_margin); ?>px 0 <?php echo esc_html($social_foot_margin)+10; ?>px; padding:<?php echo esc_html($social_foot_padding)+(esc_html($social_foot_margin_icon)/2); ?>px 0;}
		<?php } ?>
		.et_header_style_centered #et-top-navigation .et-social-icons {float:none; display:inline-block;}
	}
	#footer-bottom .et-social-icons a {display:inline-block; font-size:<?php echo esc_html($social_foot_size); ?>px; color:<?php echo esc_html($social_foot_color); ?>; padding:<?php echo esc_html($social_foot_padding); ?>px; background-color:<?php echo esc_html($social_foot_bg_color); ?>; border-style:solid;
	border-width:<?php echo esc_html($social_foot_border_width); ?>px; border-color:<?php echo esc_html($social_foot_border_color); ?>; border-radius:<?php echo esc_html($social_foot_border_radius); ?>px;}
	#footer-bottom .et-social-icons a:hover {opacity:1; color:<?php echo esc_html($social_foot_color_hover); ?>; background-color:<?php echo esc_html($social_foot_bg_color_hover); ?>; border-color:<?php echo esc_html($social_foot_border_color_hover); ?>;}
	<?php if (( $dtb_social_mobile_add == '1') || ($dtb_m_mobile_elements_social == '1')) {?>
	@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) {
		.dtb-menu .et_mobile_menu .et-social-icons,
		#main-header .et_mobile_menu .et-social-icons,
		#dtb-m-menu .et-social-icons {display:flex; flex-wrap:wrap; justify-content:<?php if ($social_mobile_align == 'left') echo 'flex-start'; elseif ($social_mobile_align == 'right') echo 'flex-end'; elseif ($social_mobile_align == 'center') echo 'center'; ?>; margin:<?php echo esc_attr($social_mobile_margin_top . ' ' . $social_mobile_margin_right . ' ' . $social_mobile_margin_bottom . ' ' . $social_mobile_margin_left);?>;}
		.dtb-menu .et_mobile_menu .et-social-icons li,
		#main-header .et_mobile_menu .et-social-icons li,
		#dtb-m-menu .et-social-icons li {margin:<?php echo esc_html($social_mobile_margin_icon)/2; ?>px; vertical-align: middle;}
		.dtb-menu.et_pb_module .et_mobile_menu .et-social-icons a,
		#main-header .et_mobile_menu .et-social-icons a,
		#dtb-m-menu .et-social-icons a {display:inline-block; font-size:<?php echo esc_html($social_mobile_size); ?>px; color:<?php echo esc_html($social_mobile_color); ?>!important; padding:0!important; width:<?php echo esc_html($social_mobile_width); ?>px; height:<?php echo esc_html($social_mobile_height); ?>px; line-height:<?php echo esc_html($social_mobile_height); ?>px; background-color:<?php echo esc_html($social_mobile_bg_color); ?>; border-style:solid; display: flex; align-items: center; justify-content: center;
	border-width:<?php echo esc_html($social_mobile_border_width); ?>px; border-color:<?php echo esc_html($social_mobile_border_color); ?>; border-radius:<?php echo esc_html($social_mobile_border_radius); ?>px; animation:none; transform:none; top:auto;}
		.dtb_mobile .dtb-menu .et_mobile_menu .et-social-icons a:hover,
		#main-header .et_mobile_menu .et-social-icons a:hover,
		#dtb-m-menu .et-social-icons a:hover {opacity:1; color:<?php echo esc_html($social_mobile_color_hover); ?>!important; background-color:<?php echo esc_html($social_mobile_bg_color_hover); ?>; border-color:<?php echo esc_html($social_mobile_border_color_hover); ?>; }
	}
	<?php } ?>
	
<?php } ?>

<?php if ($dtb_mobile_nested == '1') { ?>
	/* Nest mobile elements */
	#main-header #mobile_menu.et_mobile_menu .menu-item-has-children,
	.dtb-menu .et_mobile_menu .menu-item-has-children,
	#dtb-m-menu .menu-item-has-children {position:relative;}
	#main-header #mobile_menu.et_mobile_menu .menu-item-has-children>a,
	.dtb-menu .et_mobile_menu .menu-item-has-children>a,
	#dtb-m-menu .menu-item-has-children>a {font-weight:<?php echo esc_html($dtb_mobile_sub_parent_font_weight);?>}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle,
	.dtb-menu .et_mobile_menu .sub-menu-toggle,
	#dtb-m-menu .sub-menu-toggle {
		position:absolute;
		background-color:<?php echo esc_html($dtb_mobile_submenu_icon_closed_bg);?>;
		color:<?php echo esc_html($dtb_mobile_submenu_icon_closed);?>;
		z-index:1;
		width:36px;
		height:36px;
		line-height:36px;
		border-radius:50%;
		top:<?php echo esc_html($dtb_mobile_padding_top/2);?>px;
		right:4px;
		cursor:pointer;
		text-align:center;
	}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle.popped,
	.dtb-menu .et_mobile_menu .sub-menu-toggle.popped,
	#dtb-m-menu .sub-menu-toggle.popped {
		background-color:<?php echo esc_html($dtb_mobile_submenu_icon_opened_bg);?>;
		color:<?php echo esc_html($dtb_mobile_submenu_icon_opened);?>;
	}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle::before,
	.dtb-menu .et_mobile_menu .sub-menu-toggle::before,
	#dtb-m-menu .sub-menu-toggle::before {
		font-family:"ETmodules" !important;
		font-weight:normal;
		-webkit-font-smoothing:antialiased;
		-moz-osx-font-smoothing:grayscale;
		line-height:36px;
		font-size:24px;
		text-transform:none;
		speak:none;
		content:'\33';
		transition:all .3s ease-in-out;
		display:block;
	}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle.popped::before,
	.dtb-menu .et_mobile_menu .sub-menu-toggle.popped::before,
	#dtb-m-menu .sub-menu-toggle.popped::before  {transform: rotate(-180deg) translateX(-1px);}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle ~ ul.sub-menu,
	.dtb-menu .et_mobile_menu .sub-menu-toggle ~ ul.sub-menu,
	#dtb-m-menu .sub-menu-toggle ~ ul.sub-menu {display:none !important; padding-left:0;}
	#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle.popped ~ ul.sub-menu,
	.dtb-menu .et_mobile_menu .sub-menu-toggle.popped ~ ul.sub-menu {display:block !important; background-color:<?php echo esc_html($dtb_mobile_submenu_bg);?>!important;}
	#dtb-m-menu .sub-menu-toggle.popped ~ ul.sub-menu {display:block !important;}
	#dtb-m-menu .sub-menu-toggle.popped ~ ul.sub-menu li {background-color:<?php echo esc_html($dtb_mobile_submenu_bg);?>!important;}
	#main-header #mobile_menu.et_mobile_menu li li,
	.dtb-menu .et_mobile_menu li li,
	#dtb-m-menu ul.dtb-mobile-menu li li {padding-left:0;}
	#main-header #mobile_menu.et_mobile_menu li a,
	.dtb-menu .et_mobile_menu li a {padding-left:20px;padding-right:20px;}
	#main-header #mobile_menu.et_mobile_menu li li a,
	.dtb-menu .et_mobile_menu li li a {padding-left:40px;padding-right:20px;}
	#main-header #mobile_menu.et_mobile_menu li li li a,
	.dtb-menu .et_mobile_menu li li li a {padding-left:60px;padding-right:20px;}
	#main-header #mobile_menu.et_mobile_menu .menu-item-has-children .sub-menu-toggle + a,
	.dtb-menu .et_mobile_menu .menu-item-has-children .sub-menu-toggle + a,
	#dtb-m-menu ul.dtb-mobile-menu .menu-item-has-children .sub-menu-toggle + a {padding-right:44px;}
	#main-header #mobile_menu.et_mobile_menu .menu-item-has-children > a:hover,
	.dtb-menu .et_mobile_menu .menu-item-has-children > a:hover,
	#dtb-m-menu ul.dtb-mobile-menu .menu-item-has-children > a:hover {opacity:1;}
<?php } ?>

<?php if ( ($dtb_enable_custom_m_menu == '1') && ($dtb_mobile_enable == '1') ) { include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/css/mobile-menu.php'); } ?>


/* Menu */
.et_pb_fullwidth_menu--without-logo.dtb-menu .et_pb_menu__menu>nav>ul>li, .et_pb_menu--without-logo.dtb-menu .et_pb_menu__menu>nav>ul>li {margin-top:0;}
.dtb-menu.et_pb_module {z-index:3;}

<?php if ( ($dtb_menu_type == 'none') || ($dtb_menu_type == 'menu1') || ($dtb_menu_type == 'menu2') || ($dtb_menu_type == 'menu3') || ($dtb_menu_type == 'menu4') ) { ?>
#top-menu-nav #top-menu>li>a,
.dtb-menu .et-menu>li>a {<?php if ($main_nav_font_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($main_nav_font_tt); ?>; font-variant:normal;<?php } ?>}
#top-menu-nav #top-menu>li>a {font-weight:<?php echo esc_html($main_nav_font_weight);?>!important;}
#top-menu-nav #top-menu>li>a:hover,
.dtb-menu ul.et-menu>li>a:hover,
.et-db #et-boc .et-l .dtb-menu a:hover,
.dtb-menu ul.et-menu>li:hover>a,
.et-db #et-boc .et-l .dtb-menu li:hover>a {opacity:1; color:<?php echo esc_html($main_nav_col_hover);?>;}
#main-header.et-fixed-header #top-menu-nav #top-menu>li>a:hover {color:<?php echo esc_html($main_nav_fixed_col_hover);?>!important;}
<?php } ?>
#main-header {
	box-shadow:none!important;
	<?php if ($dtb_main_header_shadow == '1') { ?>
		box-shadow:<?php echo esc_html($dtb_main_header_shadow_offset_x);?>px <?php echo esc_html($dtb_main_header_shadow_offset_y);?>px <?php echo esc_html($dtb_main_header_shadow_blur);?>px <?php echo esc_html($dtb_main_header_shadow_color);?>!important;
	<?php } ?>
}
#page-container #main-header.et-fixed-header {
	box-shadow:none!important;
	<?php if ($dtb_fixed_header_shadow == '1') { ?>
	box-shadow:<?php echo esc_html($dtb_fixed_header_shadow_offset_x);?>px <?php echo esc_html($dtb_fixed_header_shadow_offset_y);?>px <?php echo esc_html($dtb_fixed_header_shadow_blur);?>px <?php echo esc_html($dtb_fixed_header_shadow_color);?>!important;
	<?php } ?>
}
#top-header {
	box-shadow:none;
	<?php if ($dtb_top_bar_shadow != '') { ?>
	box-shadow:0 <?php echo esc_html($dtb_top_bar_shadow_offset_y);?>px <?php echo esc_html($dtb_top_bar_shadow_blur);?>px <?php echo esc_html($dtb_top_bar_shadow_color);?>;
	<?php } ?>
}
#et-info-email, #et-info-phone, .et-cart-info span, #et-secondary-nav>li>a {font-weight:<?php echo esc_html($dtb_top_bar_font_weight); ?>; letter-spacing:<?php echo esc_html($dtb_top_bar_font_lettersp); ?>px; <?php if ($dtb_top_bar_font_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_top_bar_font_tt); ?>; font-variant:normal;<?php } ?> <?php if ($top_bar_font != '') {?>font-family:<?php echo esc_html($top_bar_font); ?>; <?php }?>}
#et-info a, #et-secondary-menu>ul>li>a {color:<?php echo esc_html($dtb_sec_nav_color);?>; position:relative}
#et-info a:hover, #et-secondary-menu>ul>li>a:hover {opacity:1; color:<?php echo esc_html($dtb_sec_nav_color_hover);?>;}
#et-info a:after, #et-secondary-menu>ul:not(.et-social-icons)>li>a:before {content:''; display:block; position:absolute; top:-.8em; bottom:0em; right:-.75em;left:-.75em; transition: all .3s ease-in-out; z-index:-1;}
#et-info a:after {bottom:-0.65em;}
#et-info a:hover:after, #et-secondary-menu>ul>li>a:hover:before {background:<?php echo esc_html($dtb_sec_nav_bg_hover);?>;}


<?php if (($dtb_hide_top_fixed != '0') || ($dtb_hide_top_fixed != '')) { ?>
	@media (min-width:<?php echo esc_html($dtb_mobile_breakpoint+1);?>px) {
		#main-header {transition:all .3s ease-in-out; height:auto;}
		#wpadminbar {z-index:200001;}
		#main-header.et-fixed-header {top:0!important; z-index:200000;}
		#top-header.et-fixed-header {top:0!important; box-shadow:none}
		.admin-bar #main-header.et-fixed-header {top:32px!important;}
		.et_header_style_left.et-fixed-header #et-top-navigation {padding-top:30px!important;}
	}
	#main-header, #top-header {transition:all .3s ease-in-out!important;}
<?php } ?>


<?php if (($dtb_center_footer_menu != '0') || ($dtb_center_footer_menu != '')) { ?>
	#et-footer-nav ul {text-align:center;}
<?php } ?>


<?php if (($dtb_footer_menu_shadow != '') || ($dtb_footer_menu_shadow != '0')) { ?>
	#et-footer-nav {box-shadow:<?php echo esc_html($dtb_footer_menu_shadow_offset_x);?>px <?php echo esc_html($dtb_footer_menu_shadow_offset_y);?>px <?php echo esc_html($dtb_footer_menu_shadow_blur);?>px <?php echo esc_html($dtb_footer_menu_shadow_color);?>; position:relative;}
<?php } ?>





<?php if ($dtb_custom_footer_enable == '1') { ?>
	#et-footer-nav .bottom-nav, #et-footer-nav .bottom-nav li {padding:0;}
	#et-footer-nav .bottom-nav li a {transition: all .3s ease-in-out; display:block; padding:<?php echo esc_html($dtb_footer_menu_padding);?>px <?php echo esc_html($dtb_footer_menu_padding);?>px; <?php if ($footer_menu_font != '') {?>font-family:<?php echo esc_html($footer_menu_font); ?>; <?php }?><?php if ($dtb_footer_menu_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_footer_menu_tt); ?>; font-variant:normal;<?php } ?> font-weight:<?php echo esc_html($dtb_footer_menu_font_weight);?>;}
	#et-footer-nav .bottom-nav li.current-menu-item a {background:<?php echo esc_html($dtb_footer_menu_active_bg);?>; }
	#et-footer-nav .bottom-nav li a:hover {opacity:1; color:<?php echo esc_html($dtb_footer_menu_txt_hover);?>!important; background:<?php echo esc_html($dtb_footer_menu_bg_hover);?>;}	
	
	#footer-widgets h4.title {<?php if ($footer_header_font != '') {?>font-family:<?php echo esc_html($footer_header_font); ?>; <?php }?> font-weight:<?php echo esc_html($dtb_widget_header_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_widget_header_font_lettersp);?>px; font-size:<?php echo esc_html($dtb_widget_header_font_size);?>px; <?php if ($dtb_widget_header_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_widget_header_tt); ?>; font-variant:normal;<?php } ?>}
	<?php if ($dtb_widget_header_style == 'boxed') { ?>
		#footer-widgets .fwidget {min-width:80%;}
		#footer-widgets h4.title {padding:<?php echo esc_html($dtb_widget_boxed_padding);?>px <?php echo esc_html($dtb_widget_boxed_padding*1.2);?>px; background:<?php echo esc_html($dtb_widget_boxed_bg);?>; border-radius:<?php echo esc_html($dtb_widget_boxed_border_radius);?>px; display:block; margin-bottom:<?php echo esc_html($dtb_widget_boxed_padding);?>px;}
	<?php } ?>
	
	<?php if ($dtb_widget_header_style == 'divider') { ?>
		#footer-widgets h4.title {padding:0; display:block; text-indent:<?php echo esc_html($dtb_widget_divider_border/2); ?>px;}
		#footer-widgets h4.title:after {display:block; content:''; width:<?php echo esc_html($dtb_widget_divider_lenght); ?>px; height:<?php echo esc_html($dtb_widget_divider_height); ?>px; margin:15px 0 25px 0; border-radius:<?php echo esc_html($dtb_widget_divider_border); ?>px; background:<?php echo esc_html($dtb_widget_divider_color); ?>}
	<?php } ?>
	
	<?php if ($dtb_widget_remove_bullet == '1') { ?>
		#footer-widgets .footer-widget li {padding:0;}
		#footer-widgets .footer-widget li:before {display:none;}
	<?php } ?>
		#footer-widgets .footer-widget ul.menu li a,
		#footer-widgets .widget_categories li a,
		#footer-widgets .widget_archive li a,
		#footer-widgets .widget_meta li a {transition: all .3s ease-in-out;}
		#footer-widgets .footer-widget ul.menu li a:hover,
		#footer-widgets .widget_categories li a:hover,
		#footer-widgets .widget_archive li a:hover,
		#footer-widgets .widget_meta li a:hover {color:<?php echo esc_html($dtb_widget_txt_hover);?>!important;}
	<?php if ($dtb_widget_add_icons == '1') { ?>
		#footer-widgets .footer-widget ul.menu li a,
		#footer-widgets .widget_categories li a,
		#footer-widgets .widget_archive li a,
		#footer-widgets .widget_meta li a {position:relative;}
		#footer-widgets .footer-widget ul.menu li a:before,
		#footer-widgets .widget_categories li a:before,
		#footer-widgets .widget_archive li a:before,
		#footer-widgets .widget_meta li a:before {font-family:"ETModules"; display:block; content:'<?php echo esc_html($dtb_widget_icon);?>'; position:absolute; top:50%; margin-top:-<?php echo esc_html($dtb_widget_icon_size/2); ?>px; line-height:1; left:-2em; color:<?php echo esc_html($dtb_widget_icon_color);?>; font-size:<?php echo esc_html($dtb_widget_icon_size); ?>px; opacity:0; transition: all .3s ease-in-out;}
		#footer-widgets .footer-widget ul.menu li a:hover,
		#footer-widgets .widget_categories li a:hover,
		#footer-widgets .widget_archive li a:hover,
		#footer-widgets .widget_meta li a:hover {padding-left:.5em;}
		#footer-widgets .footer-widget ul.menu li a:hover:before,
		#footer-widgets .widget_categories li a:hover:before,
		#footer-widgets .widget_archive li a:hover:before,
		#footer-widgets .widget_meta li a:hover:before {left:-0.85em; opacity:1;}
	<?php } ?>
<?php } ?>



<?php if ($dtb_sidebar_styles != '') { ?>
	<?php if ($dtb_sidebar_border != '') { ?>
		#main-content .container:before {display:none;}
		.et_pb_widget_area.dtb-sidebar {border:none;}
	<?php } ?>
	<?php if ($dtb_sidebar_shadow != '') { ?>
		@media (min-width:981px) {
			#sidebar,
			.et_pb_widget_area_right.dtb-sidebar {box-shadow:-<?php echo esc_html($dtb_sidebar_shadow_blur*1.8);?>px <?php echo esc_html($dtb_sidebar_shadow_blur);?>px <?php echo esc_html($dtb_sidebar_shadow_blur*1.7);?>px -<?php echo esc_html($dtb_sidebar_shadow_blur*1.4);?>px <?php echo esc_html($dtb_sidebar_shadow_color);?>;}
			.et_left_sidebar #sidebar,
			.et_pb_widget_area_left.dtb-sidebar {box-shadow:<?php echo esc_html($dtb_sidebar_shadow_blur*1.8);?>px <?php echo esc_html($dtb_sidebar_shadow_blur);?>px <?php echo esc_html($dtb_sidebar_shadow_blur*1.7);?>px -<?php echo esc_html($dtb_sidebar_shadow_blur*1.4);?>px <?php echo esc_html($dtb_sidebar_shadow_color);?>;}
		}
	<?php } ?>
	<?php if ($dtb_sidebar_padding != '30') { ?>
		.et_right_sidebar #sidebar, .et_pb_widget_area_right.dtb-sidebar {padding-left:<?php echo esc_html($dtb_sidebar_padding);?>px;}
		.et_left_sidebar #sidebar, .et_pb_widget_area_left.dtb-sidebar {padding-right:<?php echo esc_html($dtb_sidebar_padding);?>px;}
	<?php } ?>
	
	
	#content-area h4.widgettitle,
	.et_pb_widget_area.dtb-sidebar .widgettitle {font-size:<?php echo esc_html($dtb_sidebar_header_size); ?>px; color:<?php echo esc_html($dtb_sidebar_header_color);?>; <?php if ($sidebar_header_font != '') {?>font-family:<?php echo esc_html($sidebar_header_font);?>;<?php }?> letter-spacing:<?php echo esc_html($dtb_sidebar_header_lettersp);?>px; <?php if ($dtb_sidebar_header_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_sidebar_header_tt); ?>; font-variant:normal;<?php } ?> font-weight:<?php echo esc_html($dtb_sidebar_header_font_weight);?>;}
	<?php if ($dtb_sidebar_header_style == 'boxed') { ?>
		#content-area h4.widgettitle,
		.et_pb_widget_area.dtb-sidebar .widgettitle  {padding:<?php echo esc_html($dtb_sidebar_header_boxed_padding);?>px; border-radius:<?php echo esc_html($dtb_sidebar_header_boxed_border_radius);?>px; background:<?php echo esc_html($dtb_sidebar_header_boxed_bg); ?>; margin-bottom:10px;}
	<?php } ?>
	<?php if ($dtb_sidebar_header_style == 'divider') { ?>
		#content-area h4.widgettitle:after,
	.et_pb_widget_area.dtb-sidebar .widgettitle:after  {content:''; display:block; margin:10px 0; width:<?php echo esc_html($dtb_sidebar_divider_lenght);?>px; height:<?php echo esc_html($dtb_sidebar_divider_height);?>px; background:<?php echo esc_html($dtb_sidebar_divider_color);?>; border-radius:<?php echo esc_html($dtb_sidebar_divider_border);?>px;}
	<?php } ?>
	<?php if ($dtb_sidebar_widgets_style == 'boxed') { ?>
		#content-area .et_pb_widget ul,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul  {background:<?php echo esc_html($dtb_sidebar_widget_bg);?>; box-shadow:<?php echo esc_html($dtb_sidebar_widget_shadow_offset_x);?>px <?php echo esc_html($dtb_sidebar_widget_shadow_offset_y);?>px <?php echo esc_html($dtb_sidebar_widget_shadow_blur);?>px <?php echo esc_html($dtb_sidebar_widget_shadow_color);?>; padding:10px 0!important; margin-top:-10px;}
		<?php if ($dtb_sidebar_header_style == 'boxed') { ?>
			#content-area .et_pb_widget ul,
			.et_pb_widget_area.dtb-sidebar .et_pb_widget ul {padding-left:<?php echo esc_html($dtb_sidebar_header_boxed_padding-10);?>px!important;}
		<?php } ?>
		<?php if ($dtb_sidebar_header_style == 'divider') { ?>
			#content-area .et_pb_widget ul,
			.et_pb_widget_area.dtb-sidebar .et_pb_widget ul {margin-top:-20px;}
		<?php } ?>
		#content-area .et_pb_widget ul li,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li {padding:0 10px; width:100%; display:block;}
		#content-area h4.widgettitle,
		.et_pb_widget_area.dtb-sidebar .widgettitle {border-bottom-right-radius:0; border-bottom-left-radius:0;}
	<?php } ?>
	
	#content-area .et_pb_widget,
	.et_pb_widget_area.dtb-sidebar .et_pb_widget {margin-bottom:<?php echo esc_html($dtb_sidebar_widget_margin); ?>px;}
	#content-area .et_pb_widget a,
	.et_pb_widget_area.dtb-sidebar .et_pb_widget a {color:<?php echo esc_html($dtb_sidebar_widget_link);?>; transition: all .3s ease-in-out;}
	#content-area .et_pb_widget a:hover,
	.et_pb_widget_area.dtb-sidebar .et_pb_widget a:hover {color:<?php echo esc_html($dtb_sidebar_widget_link_hover);?>;}
	<?php if ($dtb_sidebar_add_icons == '1') { ?>
		#content-area .et_pb_widget ul li,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li {transition:all .3s ease-in-out; position:relative;}
		#content-area .et_pb_widget ul li:hover,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:hover {padding-left:<?php echo esc_html($dtb_sidebar_icon_size+5); ?>px}
		#content-area .et_pb_widget ul li:before,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:before {content:'<?php echo esc_html($dtb_sidebar_icon); ?>'; font-family:"ETModules"; display:block; color:<?php echo esc_html($dtb_sidebar_icon_color); ?>; font-size:<?php echo esc_html($dtb_sidebar_icon_size); ?>px; opacity:0; transition:all .3s ease-in-out; position:absolute; top:50%; margin-top:-<?php echo esc_html($dtb_sidebar_icon_size/2); ?>px; left:0; line-height:1;}
		#content-area .et_pb_widget ul li:hover:before,
		.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:hover:before {left:5px; opacity:1;}
		<?php if ($dtb_sidebar_widgets_style != 'boxed') { ?>
			#content-area .et_pb_widget ul li:before,
			.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:before {left:-10px;}
			#content-area .et_pb_widget ul li:hover:before,
			.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:hover:before {left:-5px;}
			#content-area .et_pb_widget ul li:hover,
			.et_pb_widget_area.dtb-sidebar .et_pb_widget ul li:hover {padding-left:<?php echo esc_html($dtb_sidebar_icon_size); ?>px}
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if ($dtb_sidebar_search != '') { ?>
	.widget_search input#s {background:<?php echo esc_html($dtb_sidebar_search_bg);?>; color:<?php echo esc_html($dtb_sidebar_search_txt);?>; height:<?php echo esc_html($dtb_sidebar_search_height);?>px!important; border-radius:<?php echo esc_html($dtb_sidebar_search_border_radius);?>px; border-width:<?php echo esc_html($dtb_sidebar_search_border); ?>px; border-color:<?php echo esc_html($dtb_sidebar_search_border_color); ?>;}
	.widget_search input#searchsubmit {text-indent:-9999px; background:transparent; border:none; height:<?php echo esc_html($dtb_sidebar_search_height);?>px!important; width:<?php echo esc_html($dtb_sidebar_search_height);?>px!important;}
	.widget_search span.icon:before {transition: all .3s ease-in-out; content:'U'; position:absolute; top:0; right:0; bottom:0; height:<?php echo esc_html($dtb_sidebar_search_height);?>px; width:<?php echo esc_html($dtb_sidebar_search_height);?>px; border-radius:0 <?php echo esc_html($dtb_sidebar_search_border_radius);?>px <?php echo esc_html($dtb_sidebar_search_border_radius);?>px 0; background:<?php echo esc_html($dtb_sidebar_search_btn_bg); ?>; color:<?php echo esc_html($dtb_sidebar_search_icon); ?>; font-family:"ETModules"; font-weight:normal; font-size:20px; text-align:center; line-height:<?php echo esc_html($dtb_sidebar_search_height);?>px;}
<?php } ?>


<?php if ($dtb_post_meta != '') { ?>
	#left-area .post-meta, .et_pb_module.dtb-blog .et_pb_post .post-meta, .et_pb_module.dtb-blog .et_pb_post .post-meta a, #left-area .post-meta a,
	.et-db #et-boc .et-l .dtb-blog .et_pb_post .post-meta, .et-db #et-boc .et-l .dtb-blog .et_pb_post .post-meta a {<?php if ($post_meta_font != '') {?>font-family:<?php echo esc_html($post_meta_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_post_meta_font_weight);?>; font-size:<?php echo esc_html($dtb_post_meta_font_size);?>px; color:<?php echo esc_html($dtb_post_meta_font_color);?>; transition: all .3s ease-in-out; margin-bottom:0; letter-spacing:<?php echo esc_html($dtb_post_meta_lettersp); ?>px; <?php if ($dtb_post_meta_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_post_meta_tt); ?>; font-variant:normal;<?php } ?>}
	.et_pb_module.dtb-blog .et_pb_post .post-meta a:hover, #left-area .post-meta a:hover {color:<?php echo esc_html($dtb_post_meta_font_color_hover);?>;}
	#left-area .post-meta .author a:before, #left-area .published:before, #left-area a[rel~="category"]:before, #left-area a[rel~="tag"]:before, #left-area .comments-number a:before,
	.et_pb_module.dtb-blog .post-meta .author a:before, .et_pb_module.dtb-blog .published:before, .et_pb_module.dtb-blog a[rel~="category"]:before, .et_pb_module.dtb-blog a[rel~="tag"]:before, .et_pb_module.dtb-blog .comments-number a:before {font-family: 'ETModules'; margin-right: 3px; font-weight:normal; font-size:<?php echo esc_html($dtb_post_meta_icon_size); ?>px; color:<?php echo esc_html($dtb_post_meta_icon_color); ?>;}
	#left-area .post-meta .author a:before, .et_pb_module.dtb-blog .post-meta .author a:before {content:'\e08a';}
	#left-area .published:before, .et_pb_module.dtb-blog .published:before {content:'\e06b';}
	#left-area a[rel~="category"]:before, .et_pb_module.dtb-blog a[rel~="category"]:before,
	#left-area a[rel~="tag"]:before, .et_pb_module.dtb-blog a[rel~="tag"]:before {content:'\e07b';}
	#left-area .comments-number a:before, .et_pb_module.dtb-blog .comments-number a:before {content: '\e065';}
	.et_pb_module.dtb-blog .post-meta>a, .et_pb_module.dtb-blog .post-meta>span,
	.dtb_archives .post-meta>a, .dtb_archives .post-meta>span {margin-right: 10px;}
<?php } ?>


<?php if (($dtb_sidebar_archive != '') || ($dtb_post_sidebar_layout == 'fullwidth')) { ?>
	.dtb_no_sidebar #left-area {padding-right:0; padding-left:0;}
	.dtb_no_sidebar #sidebar {display:none;}
<?php } ?>

<?php if ($dtb_post_author != '') { ?>
	.dtb-author-box {
		margin-top:50px;display:flex; align-items:center; background:<?php echo esc_html($dtb_author_box_bg); ?>;
		padding:<?php echo esc_html($dtb_author_box_padding);?>px; border-radius:<?php echo esc_html($dtb_author_box_border_radius); ?>px;
		<?php if ($dtb_author_box_border != '') { ?>
			border:<?php echo esc_html($dtb_author_box_border_width); ?>px <?php echo esc_html($dtb_author_box_border_color); ?> solid;
		<?php } ?>
		<?php if ($dtb_author_box_shadow != '') { ?>
			box-shadow:<?php echo esc_html($dtb_author_box_shadow_offset_x);?>px <?php echo esc_html($dtb_author_box_shadow_offset_y);?>px <?php echo esc_html($dtb_author_box_shadow_blur);?>px <?php echo esc_html($dtb_author_box_shadow_color);?>;
		<?php } ?>
		}
	.dtb-author-box a {display:block; font-family:<?php echo esc_html($author_font);?>; font-weight:<?php echo esc_html($dtb_author_box_font_weight);?>; font-size:<?php echo esc_html($dtb_author_name_size);?>px; color:<?php echo esc_html($dtb_author_name_color);?>; line-height:1.4;}
	.dtb-author-box img {margin-right:20px;}
		<?php if ($dtb_author_box_round != '') { ?>
			.dtb-author-box img {border-radius:100%;}
		<?php } ?>
	
	@media (max-width:479px) {
		.dtb-author-box {display:block;}
	}
<?php } ?>


<?php if ($dtb_post_prev_next != '' ) { ?>
	.et_pb_post .dtb-single-post-nav, .et-l--body .dtb-single-post-nav {margin-top:50px; display:flex; width:100%; justify-content:space-between;}
	.et_pb_post .dtb-single-post-nav .dtb-button, .et-l--body .dtb-single-post-nav .dtb-button {margin-bottom:15px; display:inline-block; line-height:1.1; transition: all .3s ease-in-out; <?php if ($prev_next_btn_font != '') { ?>font-family:<?php echo esc_html($prev_next_btn_font);?>;<?php } ?> font-weight:<?php echo esc_html($dtb_next_prev_btn_font_weight);?>; font-size:<?php echo esc_html($dtb_next_prev_btn_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_next_prev_btn_font_lettersp); ?>px; <?php if ($dtb_next_prev_btn_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_next_prev_btn_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_next_prev_btn_font_color); ?>; padding:<?php echo esc_html($dtb_next_prev_btn_padding); ?>px <?php echo esc_html($dtb_next_prev_btn_padding*1.5); ?>px; border-radius:<?php echo esc_html($dtb_next_prev_btn_border_radius); ?>px; border-style:solid; border-width:<?php echo esc_html($dtb_next_prev_btn_border_width); ?>px; border-color:<?php echo esc_html($dtb_next_prev_btn_border_color); ?>; background:<?php echo esc_html($dtb_next_prev_btn_bg_color); ?>;}
	.dtb-single-post-nav .dtb-button:hover {color:<?php echo esc_html($dtb_next_prev_btn_font_color_hover); ?>; border-color:<?php echo esc_html($dtb_next_prev_btn_border_color_hover); ?>; background:<?php echo esc_html($dtb_next_prev_btn_bg_color_hover); ?>;}
	.et_pb_post .dtb-single-post-nav h5, .et-l--body .dtb-single-post-nav h5 {<?php if ($prev_next_font != '') { ?>font-family:<?php echo esc_html($prev_next_font);?>;<?php } ?> transition: all .3s ease-in-out; font-weight:<?php echo esc_html($dtb_next_prev_font_weight); ?>; font-size:<?php echo esc_html($dtb_next_prev_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_next_prev_font_lettersp); ?>px; <?php if ($dtb_next_prev_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_next_prev_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_next_prev_font_color); ?>;}
	.et_pb_post .dtb-single-post-nav h5:hover, .et-l--body .dtb-single-post-nav h5:hover {color:<?php echo esc_html($dtb_next_prev_font_color_hover); ?>;}
	.dtb-single-post-nav .single-nav-next {text-align:right;}
	.dtb-single-post-nav i {font-style: normal; vertical-align:1px;}
	@media (max-width:767px) {
		.dtb-single-post-nav {display: block;}
		.dtb-single-post-nav .single-nav-next a {text-align: right; display:block;}
	}
<?php } ?>

<?php if ($dtb_post_related != '') { ?>
	.dtb-related-posts {margin-top:50px;}
	#left-area #dtb-related-posts-list, .et-l--body #dtb-related-posts-list {padding:0; list-style:none; display:flex; justify-content: space-between; flex-wrap:wrap;}
	#dtb-related-posts-list img {width:100%;}
	<?php if ($dtb_related_number == '2') { ?>
		#dtb-related-posts-list li {flex-basis: 48%;}
	<?php } ?>
	<?php if (($dtb_related_number == '3') || ($dtb_related_number == '6')) { ?>
		#dtb-related-posts-list li {flex-basis: 31%; margin-bottom:3.5%;}
	<?php } ?>
	<?php if ($dtb_related_number == '4') { ?>
		#dtb-related-posts-list li {flex-basis: 23%;}
	<?php } ?>
	<?php if ($dtb_related_number == '5') { ?>
		#dtb-related-posts-list li {flex-basis: 19%;}
	<?php } ?>
	@media (max-width:980px) {
		#dtb-related-posts-list li {flex-basis: 31%; margin-bottom:3.5%;}
	}
	@media (max-width:767px) {
		#dtb-related-posts-list li {flex-basis: 48%; margin-bottom:4%;}
	}
	@media (max-width:479px) {
		#dtb-related-posts-list li {flex-basis: 100%; margin-bottom:6%;}
	}
	.et_pb_post .dtb-related-posts, .et-l--body .dtb-related-posts <?php echo esc_html($dtb_related_heading);?> {<?php if ($related_header_font != '') { ?>font-family:<?php echo esc_html($related_header_font);?>;<?php } ?>; font-weight:<?php echo esc_html($dtb_related_header_font_weight); ?>; font-size:<?php echo esc_html($dtb_related_header_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_related_header_font_lettersp); ?>px; <?php if ($dtb_related_header_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_related_header_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_related_header_font_color); ?>; margin-bottom:15px;}
	#dtb-related-posts-list li a {display:block; padding:<?php echo esc_html($dtb_related_box_padding); ?>px; line-height:1.2; <?php if ($dtb_related_shadow != '') {?>box-shadow: <?php echo esc_html($dtb_related_shadow_offset_x); ?>px <?php echo esc_html($dtb_related_shadow_offset_y); ?>px <?php echo esc_html($dtb_related_shadow_blur); ?>px <?php echo esc_html($dtb_related_shadow_color); ?>;<?php }?> transition:all .3s ease-in-out; background:<?php echo esc_html($dtb_related_bg_color); ?>; <?php if ($dtb_related_border != '') { ?>border:<?php echo esc_html($dtb_related_border_width);?>px solid <?php echo esc_html($dtb_related_border_color);?>;<?php }?> border-radius:<?php echo esc_html($dtb_related_border_radius);?>px;}
	#dtb-related-posts-list li a span.img-wrap {margin:-<?php echo esc_html($dtb_related_box_padding); ?>px -<?php echo esc_html($dtb_related_box_padding); ?>px 0; display:block; }
	#dtb-related-posts-list li a strong {margin-top:<?php echo esc_html($dtb_related_box_padding*.8); ?>px; display:block; <?php if ($related_link_font != '') { ?>font-family:<?php echo esc_html($related_link_font);?>;<?php } ?> font-weight:<?php echo esc_html($dtb_related_link_font_weight); ?>; font-size:<?php echo esc_html($dtb_related_link_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_related_link_font_lettersp); ?>; <?php if ($dtb_related_link_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_related_link_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_related_link_font_color); ?>; transition:all .3s ease-in-out;}
	#dtb-related-posts-list li a:hover strong {color:<?php echo esc_html($dtb_related_link_font_color_hover); ?>;}
	#dtb-related-posts-list li a:hover {transform:scale(1.05);}
	.et_monarch .et_social_networks.et_social_withcounts ul li p a .et_social_count {display: none;}
<?php } ?>


<?php if ($dtb_archive_styles != '') { ?> 
	/* Archives & Category pages */
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {height:auto!important;}
	.dtb_archives .et_link_content, .dtb_archives .et_audio_content, .dtb_archives .et_pb_audio_module_content, .dtb_archives .et_quote_content {width:100%;}
	.dtb_archives .et_pb_post .entry-title,
	.dtb-blog .et_pb_post .entry-title {<?php if ($archive_header_font != '') { ?>font-family:<?php echo esc_html($archive_header_font);?>; <?php } ?>font-weight:<?php echo esc_html($dtb_archive_header_font_weight); ?>; font-size:<?php echo esc_html($dtb_archive_header_font_size); ?>px!important; letter-spacing:<?php echo esc_html($dtb_archive_header_font_lettersp); ?>px; <?php if ($dtb_archive_header_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_archive_header_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_archive_header_font_color); ?>;}
	<?php if ($dtb_hide_excerpt == '1') {?>
		.dtb_archives .et_pb_post .dtb-post-content, .dtb_archives .et_pb_post p:not(.post-meta),
		.dtb-blog.et_pb_module .et_pb_post .post-content-inner {display:none;}
	<?php } ?>
	.dtb_archives .et_pb_post .dtb-post-content, .dtb_archives .et_pb_post p:not(.post-meta),
	.dtb-blog.et_pb_module .et_pb_post .post-content-inner, .dtb-blog.et_pb_module .et_pb_post .post-content-inner p, .dtb-blog.et_pb_module .et_pb_post .post-content>p {<?php if ($excerpt_font != '') { ?>font-family:<?php echo esc_html($excerpt_font);?>; <?php } ?>font-weight:<?php echo esc_html($dtb_excerpt_font_weight); ?>; font-size:<?php echo esc_html($dtb_excerpt_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_excerpt_font_lettersp); ?>px; <?php if ($dtb_excerpt_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_excerpt_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_excerpt_font_color); ?>;}
	.dtb_archives .et_pb_post .dtb-read-more,
	.dtb-blog.et_pb_module .et_pb_post .more-link,
	.et-db #et-boc .et-l .dtb-blog.et_pb_posts a.more-link {display:inline-block; margin-top:8px; line-height:1.1; <?php if ($archive_btn_font != '') { ?>font-family:<?php echo esc_html($archive_btn_font);?>; <?php } ?>font-weight:<?php echo esc_html($dtb_archive_btn_font_weight); ?>; font-size:<?php echo esc_html($dtb_archive_btn_font_size); ?>px; letter-spacing:<?php echo esc_html($dtb_archive_btn_font_lettersp); ?>px; <?php if ($dtb_archive_btn_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_archive_btn_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_archive_btn_font_color); ?>; padding:<?php echo esc_html($dtb_archive_btn_padding); ?>px <?php echo esc_html($dtb_archive_btn_padding*1.2);?>px; border-radius:<?php echo esc_html($dtb_archive_btn_border_radius); ?>px; border-style:solid; border-width:<?php echo esc_html($dtb_archive_btn_border_width); ?>px; border-color:<?php echo esc_html($dtb_archive_btn_border_color); ?>; background:<?php echo esc_html($dtb_archive_btn_bg_color); ?>; transition: all .3s ease-in-out;}
	.dtb_archives .et_pb_post .dtb-read-more:hover,
	.dtb-blog.et_pb_module .et_pb_post .more-link:hover,
	.et-db #et-boc .et-l .dtb-blog.et_pb_posts a.more-link:hover {color:<?php echo esc_html($dtb_archive_btn_font_color_hover); ?>; border-color:<?php echo esc_html($dtb_archive_btn_border_color_hover); ?>; background:<?php echo esc_html($dtb_archive_btn_bg_color_hover); ?>;}
	.dtb_archives .et_pb_post .entry-featured-image-url, 
	.et-db #et-boc .dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container, 
	.et-db #et-boc .dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.et-db #et-boc .dtb-blog.et_pb_module .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {margin-bottom:0; overflow:hidden;}
	<?php if ($dtb_archive_overlay == '1') { ?>
		.dtb_archives .et_pb_post .entry-featured-image-url:after,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url:after {display:block; position:absolute; content:''; top:0; left:0; right:0; bottom:0; background:<?php echo esc_html($dtb_archive_overlay_color); ?>; transition:all .3s ease-in-out; opacity:1; mix-blend-mode:<?php echo esc_html($dtb_archive_overlay_blend);?>;
		<?php if ($dtb_archive_overlay_gradient == '1') { ?>background:linear-gradient(<?php echo esc_html($dtb_archive_overlay_gradient_direction);?>, <?php echo esc_html($dtb_archive_overlay_gradient_color1);?>, <?php echo esc_html($dtb_archive_overlay_gradient_color2);?>); <?php }?>}
		.dtb_archives .et_pb_post:hover .entry-featured-image-url:after,
		.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url:after {opacity:0;}
		<?php if ($dtb_archive_overlay_show == 'hover') { ?>
			.dtb_archives .et_pb_post .entry-featured-image-url:after ,
			.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url:after {opacity:0;}
			.dtb_archives .et_pb_post:hover .entry-featured-image-url:after,
			.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url:after {opacity:1;}
		<?php } ?>
		<?php if ($dtb_archive_overlay_show == 'keep') { ?>
			.dtb_archives .et_pb_post .entry-featured-image-url:after ,
			.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url:after,
			.dtb_archives .et_pb_post:hover .entry-featured-image-url:after,
			.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url:after {opacity:1;}
		<?php } ?>
	<?php } ?>
	<?php if ($dtb_archive_overlay == '') { ?>
		.dtb_archives .et_pb_post .entry-featured-image-url:after,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url:after {display:none;}
	<?php } ?>
	
	<?php if ($dtb_archive_img_hover == 'grow') { ?>
		.dtb_archives .et_pb_post .entry-featured-image-url, {transition: all .4s ease-in-out;}
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url
		.dtb_archives .et_pb_post:hover .entry-featured-image-url,
		.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url {transform:scale(1.02);}
	<?php } ?>
	<?php if ($dtb_archive_img_hover == 'zoom') { ?>
		.dtb_archives .et_pb_post .entry-featured-image-url,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
		.dtb_archives .et_pb_post .entry-featured-image-url img,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url img {transition: all 3s ease-in-out;}
		.dtb_archives .et_pb_post .entry-featured-image-url,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url {overflow:hidden}
		.dtb_archives .et_pb_post:hover .entry-featured-image-url img,
		.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url img {transform:scale(1.11);}
	<?php } ?>
	<?php if ($dtb_archive_img_hover == 'zoom_rotate') { ?>
		.dtb_archives .et_pb_post .entry-featured-image-url,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
		.dtb_archives .et_pb_post .entry-featured-image-url img,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url img {transition: all 2s ease-in-out;}
		.dtb_archives .et_pb_post .entry-featured-image-url,
		.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url {overflow:hidden}
		.dtb_archives .et_pb_post:hover .entry-featured-image-url img,
		.dtb-blog.et_pb_module .et_pb_post:hover .entry-featured-image-url img {transform:scale(1.15) rotate(3deg);}
	<?php } ?>
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap,
	.et-db #et-boc .et-l .dtb-post-wrap {border-radius:<?php echo esc_html($dtb_archive_boxed_border_radius);?>px; background:<?php echo esc_html($dtb_archive_boxed_bg); ?>; padding:<?php echo esc_html($dtb_archive_boxed_padding); ?>px; <?php if ($dtb_archive_boxed_shadow != '') {?>box-shadow:<?php echo esc_html($dtb_archive_boxed_shadow_offset_x);?>px <?php echo esc_html($dtb_archive_boxed_shadow_offset_y);?>px <?php echo esc_html($dtb_archive_boxed_shadow_blur);?>px <?php echo esc_html($dtb_archive_boxed_shadow_color);?>; <?php } else { ?>box-shadow:none; <?php } ?><?php if ($dtb_archive_boxed_border != '') {?>border:<?php echo esc_html($dtb_archive_boxed_border_width);?>px solid <?php echo esc_html($dtb_archive_boxed_border_color);?>; <?php } ?>box-sizing:content-box;}

<?php } ?>

<?php if ($dtb_archive_styles == '') { ?>
.et_link_content, .et_audio_content, .et_pb_audio_module_content, .et_quote_content {width:100%;}
<?php if (($dtb_blog_layout == 'blog_list_1') || ($dtb_blog_layout == 'blog_list_3'))  { ?> 
@media (min-width:601px) {
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {padding-right:25px;}
}
<?php } ?>
<?php if ($dtb_blog_layout == 'blog_list_2')  { ?> 
@media (min-width:601px) {
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {padding-right:25px;}
	.dtb_archives .et_pb_post:nth-child(2n) .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post:nth-child(2n) .entry-featured-image-url,
	.dtb_archives .et_pb_post:nth-child(2n) .et_main_video_container,
	.dtb-blog.et_pb_module:nth-child(2n) .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post:nth-child(2n) .et_pb_slider,
	.dtb-blog.et_pb_module:nth-child(2n) .et_pb_post .et_pb_slider {padding-right:0; padding-left:25px;}
}
<?php } ?>
<?php } ?>
	
<?php if ($dtb_blog_layout == 'blog_grid_1') { ?>
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {width:48%; float:left; margin-left:4%; clear:none;}
	.dtb_archives .et_pb_post:nth-child(2n+1),
	.dtb-blog.et_pb_module .et_pb_post:nth-child(2n+1) {margin-left:0; clear:both;}
	@media (max-width:600px) {
		.dtb_archives .et_pb_post,
		.dtb-blog.et_pb_module .et_pb_post {width:100%; float:none; margin-left:0!important;}
	}
<?php } ?>


<?php if ($dtb_blog_layout == 'blog_grid_2') { ?>
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post  {width:30.33%; float:left; margin-left:3%; clear:none;}
	.dtb_archives .et_pb_post:nth-child(3n+1),
	.dtb-blog.et_pb_module .et_pb_post:nth-child(3n+1)  {margin-left:0; clear:both;}
	@media (max-width:980px) {
		.dtb_archives .et_pb_post,
		.dtb-blog.et_pb_module .et_pb_post  {width:48%; float:left; margin-left:4%;}
		.dtb_archives .et_pb_post:nth-child(3n+1),
		.dtb-blog.et_pb_module .et_pb_post:nth-child(3n+1) {margin-left:4%; clear:none;}
		.dtb_archives .et_pb_post:nth-child(2n+1),
		.dtb-blog.et_pb_module .et_pb_post:nth-child(2n+1)  {margin-left:0; clear:both;}
		
	}
	@media (max-width:600px) {
		.dtb_archives .et_pb_post,
		.dtb-blog.et_pb_module .et_pb_post {width:100%; float:none; margin-left:0!important;}
	}
<?php } ?>


<?php if ($dtb_blog_layout == 'blog_grid_3') { ?>
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {width:23.5%; float:left; margin-left:1.5%; clear:none;}
	.dtb_archives .et_pb_post:nth-child(4n+1),
	.dtb-blog.et_pb_module .et_pb_post:nth-child(4n+1) {margin-left:0; clear:both;}
	@media (max-width:980px) {
		.dtb_archives .et_pb_post,
		.dtb-blog.et_pb_module .et_pb_post {width:48%; float:left; margin-left:4%;}
		.dtb_archives .et_pb_post:nth-child(4n+1),
		.dtb-blog.et_pb_module .et_pb_post:nth-child(4n+1) {margin-left:4%; clear:none;}
		.dtb_archives .et_pb_post:nth-child(2n+1),
		.dtb-blog.et_pb_module .et_pb_post:nth-child(2n+1) {margin-left:0; clear:both;}
		
	}
	@media (max-width:600px) {
		.dtb_archives .et_pb_post,
		.dtb-blog.et_pb_module .et_pb_post {width:100%; float:none; margin-left:0!important;}
	}
<?php } ?>


<?php if (($dtb_blog_layout == 'blog_list_1') || ($dtb_blog_layout == 'blog_list_2') || ($dtb_blog_layout == 'blog_list_3')) { ?>
.dtb_archives .et_pb_post,
.dtb-blog.et_pb_module .et_pb_post {display:flex;  align-items:center;}
.dtb_archives .et_pb_post .dtb-post-wrap,
.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {align-self: stretch; display: flex; flex-direction: column; align-items: flex-start; justify-content: center; flex-basis:calc(50% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); transition: all .3s ease-in-out;}
	<?php if (($dtb_grab_image != '') || ($dtb_grab_image != '0')) { ?>
	.dtb_archives .et_pb_post:not(.has-post-thumbnail):not(.format-video):(.post-password-required) .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post.et_pb_no_thumb .dtb-post-wrap {flex-basis:calc(100% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin:0;}
	<?php } ?>
.dtb_archives .et_pb_post .entry-featured-image-url,
.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
.dtb_archives .et_pb_post .et_main_video_container,
.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
.dtb_archives .et_pb_post .et_pb_slider,
.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis:50%; transition: all .3s ease-in-out; min-width:50%;}
@media (max-width:1100px) {
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(60% - <?php echo esc_html($dtb_archive_box_inner_width);?>px);}
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis:40%; min-width:40%;}
}
@media (max-width:980px) {
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(70% - <?php echo esc_html($dtb_archive_box_inner_width);?>px);}
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis:30%; min-width:30%;}
}
@media (max-width:600px) {
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {display:block;}
}
@media (min-width:601px) {
	.dtb_archives.dtb_blog_list_2 .et_pb_post:nth-child(2n),
	.dtb_blog_list_2 .dtb-blog.et_pb_module .et_pb_post:nth-child(2n) {flex-direction: row-reverse;}
}
@media (min-width:981px) {
	.dtb_archives.dtb_blog_list_3 .et_pb_post .dtb-post-wrap,
	.dtb_blog_list_3 .dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(74% - <?php echo esc_html($dtb_archive_box_inner_width);?>px);}
	.dtb_archives.dtb_blog_list_3 .et_pb_post .entry-featured-image-url,
	.dtb_blog_list_3 .dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives.dtb_blog_list_3 .et_pb_post .et_main_video_container,
	.dtb_blog_list_3 .dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives.dtb_blog_list_3  .et_pb_post .et_pb_slider,
	.dtb_blog_list_3 .dtb-blog.et_pb_module .et_pb_post .et_pb_slider{flex-basis:26%; min-width:26%;}
}
	<?php if ($dtb_archive_equal_height != '') { ?>
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url {align-self:stretch; overflow:hidden;}
	.dtb_archives .et_pb_post .entry-featured-image-url img,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url img {object-fit:cover; height:100%;}
	<?php } ?>
	
<?php } ?>

<?php if ($dtb_blog_layout == 'blog_overlap_1') { ?>
.dtb_archives .et_pb_post,
.dtb-blog.et_pb_module .et_pb_post {display: flex; flex-wrap: nowrap; align-items: flex-end; justify-content: space-between; padding-bottom: 5%;}
.dtb_archives .et_pb_post .dtb-post-wrap,
.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis: calc(60% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-bottom: -5%; margin-left:-10%; transition: all .3s ease-in-out; z-index:1;}
.dtb_archives .et_pb_post .entry-featured-image-url,
.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
.dtb_archives .et_pb_post .et_main_video_container,
.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
.dtb_archives .et_pb_post .et_pb_slider,
.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis: 66%; min-width:66%; margin-right: -16%; z-index: 0; transition: all .3s ease-in-out;}
@media (max-width:980px) {
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {padding-bottom:10%;}
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis: calc(80% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:-20%; margin-bottom: -10%;}	
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis: 75%; min-width:75%; margin-right: -25%;}
}
@media (max-width:600px) {
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {padding-bottom:0; flex-wrap:wrap;}
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis: calc(92% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:8%; margin-bottom:0; margin-top:-20%;}	
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis: 92%; min-width:92%; margin-right:8%;}
}
	<?php if (($dtb_grab_image != '') || ($dtb_grab_image != '0')) { ?>
	.dtb_archives .et_pb_post:not(.has-post-thumbnail):not(.format-video):(.post-password-required) .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post.et_pb_no_thumb .dtb-post-wrap {flex-basis:calc(100% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin:0;}
	<?php } ?>
<?php } ?>

<?php if ($dtb_blog_layout == 'blog_overlap_2') { ?>
.dtb_archives .et_pb_post,
.dtb-blog.et_pb_module .et_pb_post {display: flex; flex-wrap: nowrap; align-items: center; justify-content: space-between;}

.dtb_archives .et_pb_post .dtb-post-wrap,
.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis: calc(33% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:17%; transition: all .3s ease-in-out; z-index:1;}
.dtb_archives .et_pb_post .entry-featured-image-url,
.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
.dtb_archives .et_pb_post .et_main_video_container,
.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
.dtb_archives .et_pb_post .et_pb_slider,
.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis: 75%; min-width:75%; margin-right: -25%; z-index: 0; transition: all .3s ease-in-out;}

@media (max-width:980px) {
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(50% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:0;}	
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container, {flex-basis: 80%; min-width:80%; margin-right: -30%;}
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider
}
@media (max-width:800px) {
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(70% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:-20%;}	
}
@media (max-width:600px) {
	.dtb_archives .et_pb_post,
	.dtb-blog.et_pb_module .et_pb_post {padding-bottom:0; flex-wrap:wrap;}
	.dtb_archives .et_pb_post .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post .dtb-post-wrap {flex-basis:calc(92% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin-left:8%; margin-bottom:0; margin-top:-20%;}	
	.dtb_archives .et_pb_post .entry-featured-image-url,
	.dtb-blog.et_pb_module .et_pb_post .entry-featured-image-url,
	.dtb_archives .et_pb_post .et_main_video_container,
	.dtb-blog.et_pb_module .et_pb_post .et_main_video_container,
	.dtb_archives .et_pb_post .et_pb_slider,
	.dtb-blog.et_pb_module .et_pb_post .et_pb_slider {flex-basis: 92%; min-width:92%; margin-right:8%;}
}

	<?php if (($dtb_grab_image != '') || ($dtb_grab_image != '0')) { ?>
	.dtb_archives .et_pb_post:not(.has-post-thumbnail):not(.format-video):(.post-password-required) .dtb-post-wrap,
	.dtb-blog.et_pb_module .et_pb_post.et_pb_no_thumb .dtb-post-wrap {flex-basis:calc(100% - <?php echo esc_html($dtb_archive_box_inner_width);?>px); margin:0;}
	<?php } ?>
<?php } ?>



<?php if ($dtb_comments_styles != '') { ?>
	<?php if ($dtb_comments_half != '') { ?>
	@media (min-width:768px) {
		body:not(.logged-in) #comment-wrap #respond .comment-form-comment,
		body:not(.logged-in) .dtb-comments #respond .comment-form-comment {width:50%; float:left;}
		body:not(.logged-in) #comment-wrap #respond .comment-form-author,
		body:not(.logged-in) #comment-wrap #respond .comment-form-email,
		body:not(.logged-in) #comment-wrap #respond .comment-form-url, 
		body:not(.logged-in) .dtb-comments #respond .comment-form-author,
		body:not(.logged-in) .dtb-comments #respond .comment-form-email,
		body:not(.logged-in) .dtb-comments #respond .comment-form-url {width:48%; float:right;}
		body:not(.logged-in) #comment-wrap #respond .form-submit,
		body:not(.logged-in) .dtb-comments #respond .form-submit {clear:both;}
		body:not(.logged-in) #comment-wrap #commentform input[type=email],
		body:not(.logged-in) #comment-wrap #commentform input[type=text],
		body:not(.logged-in) #comment-wrap #commentform input[type=url],
		body:not(.logged-in) .dtb-comments #commentform input[type=email],
		body:not(.logged-in) .dtb-comments #commentform input[type=text],
		body:not(.logged-in) .dtb-comments #commentform input[type=url] {width:100%;}
		body:not(.logged-in) #comment-wrap #respond .comment-form-cookies-consent,
		body:not(.logged-in) .dtb-comments #respond .comment-form-cookies-consent {clear:both;}
	}
	<?php } ?>
	#commentform textarea,
	.dtb-comments #commentform textarea {height:<?php echo esc_html($dtb_comments_textarea);?>px!important;}

	#commentform input[type=email], #commentform input[type=text], #commentform input[type=url], #commentform textarea,
	.dtb-comments #commentform input[type=email], .dtb-comments #commentform input[type=text], .dtb-comments #commentform input[type=url], .dtb-comments #commentform textarea {	
		font-family:<?php echo esc_html($comments_font);?>, <?php echo esc_html($body_font);?>, "Open Sans";
		padding:<?php echo esc_html($dtb_comments_padding); ?>px;
		font-weight:<?php echo esc_html($dtb_comments_font_weight); ?>;
		font-size:<?php echo esc_html($dtb_comments_font_size); ?>px;
		letter-spacing:<?php echo esc_html($dtb_comments_lettersp); ?>px;
		<?php if ($dtb_comments_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_comments_tt); ?>; font-variant:normal;<?php } ?>
		color:<?php echo esc_html($dtb_comments_font_color); ?>;
		background:<?php echo esc_html($dtb_comments_bg_color); ?>;
		border-radius:<?php echo esc_html($dtb_comments_border_radius);?>px;
		border-style:solid;
		border-width:<?php echo esc_html($dtb_comments_border_width);?>px;
		border-color:<?php echo esc_html($dtb_comments_border_color);?>;
		transition: all .3s ease-in-out;
	}
	#commentform input[type=email]:focus, #commentform input[type=text]:focus, #commentform input[type=url]:focus,#commentform textarea:focus,
	.dtb-comments #commentform input[type=email]:focus, .dtb-comments #commentform input[type=text]:focus, .dtb-comments #commentform input[type=url]:focus, .dtb-comments #commentform textarea:focus {
		background:<?php echo esc_html($dtb_comments_bg_color_focus); ?>;
		border-color:<?php echo esc_html($dtb_comments_border_color_focus); ?>;
	}
	#respond #submit, body.et_pb_button_helper_class .et_post_meta_wrapper .comment-reply-link,
	.dtb-comments #respond .submit, body.et_pb_button_helper_class .dtb-comments .comment-reply-link {
		font-family:<?php echo esc_html($comments_btn_font);?>, <?php echo esc_html($body_font);?>, "Open Sans";
		padding:<?php echo esc_html($dtb_comments_btn_padding); ?>px <?php echo esc_html($dtb_comments_btn_padding * 1.5); ?>px;
		font-weight:<?php echo esc_html($dtb_comments_btn_font_weight); ?>;
		font-size:<?php echo esc_html($dtb_comments_btn_font_size); ?>px;
		letter-spacing:<?php echo esc_html($dtb_comments_btn_lettersp); ?>px;
		<?php if ($dtb_comments_btn_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_comments_btn_tt); ?>; font-variant:normal;<?php } ?>
		color:<?php echo esc_html($dtb_comments_btn_font_color); ?>!important;
		background-color:<?php echo esc_html($dtb_comments_btn_bg_color); ?>;
		border-radius:<?php echo esc_html($dtb_comments_btn_border_radius); ?>px;
		border-style:solid;
		border-width:<?php echo esc_html($dtb_comments_btn_border_width); ?>px;
		border-color:<?php echo esc_html($dtb_comments_btn_border_color); ?>;
	}
	#respond #submit:hover, body.et_pb_button_helper_class .et_post_meta_wrapper .comment-reply-link:hover,
	.dtb-comments #respond .submit:hover, body.et_pb_button_helper_class .dtb-comments .comment-reply-link:hover {
		color:<?php echo esc_html($dtb_comments_btn_font_color_hover); ?>!important;
		background-color:<?php echo esc_html($dtb_comments_btn_bg_color_hover); ?>;
		border-color:<?php echo esc_html($dtb_comments_btn_border_color_hover); ?>;
	}
	body.et_pb_button_helper_class .et_post_meta_wrapper .comment-reply-link:after,
	body.et_pb_button_helper_class .dtb-comments .comment-reply-link:after,
	body.et_pb_button_helper_class .dtb-comments #respond .submit:after {
		opacity:0;
	}
<?php } ?>


<?php if ($dtb_global_headings == '1') { ?>
	h1, .et_pb_post h1, body h1 {<?php if (($heading_h1_font != 'none') && ($heading_h1_font != '')) { ?>font-family:<?php echo esc_html($heading_h1_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h1_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h1_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h1_line_height);?>; <?php if ($dtb_h1_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h1_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h1_font_color);?>;}
	h2, .et_pb_post h2, body h2 {<?php if (($heading_h2_font != 'none') && ($heading_h2_font != '')) { ?>font-family:<?php echo esc_html($heading_h2_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h2_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h2_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h2_line_height);?>; <?php if ($dtb_h2_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h2_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h2_font_color);?>;}
	h3, .et_pb_post h3, body h3 {<?php if (($heading_h3_font != 'none') && ($heading_h3_font != '')) { ?>font-family:<?php echo esc_html($heading_h3_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h3_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h3_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h3_line_height);?>; <?php if ($dtb_h3_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h3_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h3_font_color);?>;}
	h4, .et_pb_post h4, body h4 {<?php if (($heading_h4_font != 'none') && ($heading_h4_font != '')) { ?>font-family:<?php echo esc_html($heading_h4_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h4_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h4_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h4_line_height);?>; <?php if ($dtb_h4_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h4_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h4_font_color);?>;}
	h5, .et_pb_post h5, body h5 {<?php if (($heading_h5_font != 'none') && ($heading_h5_font != '')) { ?>font-family:<?php echo esc_html($heading_h5_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h5_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h5_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h5_line_height);?>; <?php if ($dtb_h5_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h5_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h5_font_color);?>;}
	h6, .et_pb_post h6, body h6 {<?php if (($heading_h6_font != 'none') && ($heading_h6_font != '')) { ?>font-family:<?php echo esc_html($heading_h6_font); ?>;<?php } ?> font-weight:<?php echo esc_html($dtb_h6_font_weight);?>; letter-spacing:<?php echo esc_html($dtb_h6_lettersp); ?>px; line-height:<?php echo esc_html($dtb_h6_line_height);?>; <?php if ($dtb_h6_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_h6_tt); ?>; font-variant:normal;<?php } ?> color:<?php echo esc_html($dtb_h6_font_color);?>;}


<?php } ?>


<?php if ($dtb_scrollbar !='') { ?>
	::-webkit-scrollbar {width: <?php echo esc_html($dtb_scroll_width);?>px; box-shadow: inset 0px 0 9px <?php echo esc_html($dtb_scroll_shadow);?>;}
	::-webkit-scrollbar-thumb {-webkit-border-radius:<?php echo esc_html($dtb_scroll_thumb_border);?>px; border-radius:<?php echo esc_html($dtb_scroll_thumb_border);?>px;}
	::-webkit-scrollbar-thumb:window-inactive {opacity: .5;}
	::-webkit-scrollbar-thumb {background:<?php echo esc_html($dtb_scroll_thumb_bg);?>;}
	::-webkit-scrollbar-thumb:window-inactive {background:<?php echo esc_html($dtb_scroll_thumb_bg);?>;}
	::-webkit-scrollbar {background:<?php echo esc_html($dtb_scroll_track_bg);?>;}
<?php } ?>




<?php if ( ($css_reverse_columns == '1') || ($css_center_mobile == '1') || ($css_txt_center_mobile == '1') || ($css_btn_center_mobile == '1') || ($css_word_break_mobile == '1') || ($css_no_word_break_mobile == '1')) {?>
@media (max-width:980px) {
	<?php if ($css_reverse_columns == '1') {?>.et_pb_row.reverse-columns-mobile {display: flex!important; flex-direction: column-reverse!important; }
	.et_pb_row.reverse-columns-mobile .et_pb_column:last-child, .et_pb_row.reverse-columns-mobile .et_pb_column.et-last-child {margin-bottom:30px;}
	.et_pb_row.reverse-columns-mobile .et_pb_column:first-child {margin-bottom:0; z-index:10;} <?php } ?>
	<?php if ($css_center_mobile == '1') {?>.et_pb_row .et_pb_module.module-center-mobile {margin-left:auto!important; margin-right:auto!important;}<?php } ?>
	<?php if ($css_txt_center_mobile == '1') {?>.et_pb_module.txt-center-mobile {text-align:center;}<?php } ?>
	<?php if ($css_btn_center_mobile == '1') {?>.btn-center-mobile .et_pb_button_module_wrapper {text-align:center;}<?php } ?>
	<?php if ($css_word_break_mobile == '1') {?>
	.word-break-mobile, .word-break-mobile * {
		overflow-wrap: break-word;
		word-wrap: break-word;
		-webkit-hyphens: auto;
		-ms-hyphens: auto;
		-moz-hyphens: auto;
		hyphens: auto;
	}
	<?php } ?>
	<?php if ($css_word_break_mobile == '1') {?>
	.no-word-break-mobile, .no-word-break-mobile * {
		overflow-wrap: normal;
	}
	<?php } ?>
	
}
<?php } ?>



<?php if ($dtb_enable_particles =='1') { ?>
	#particles-bg1 canvas, #particles-bg2 canvas {left: 0; position: absolute; top: 0; z-index: -1;}
	#particles-bg1, #particles-bg2 {position: relative;left: 0;top: 0;z-index: 1;}
<?php } ?>

<?php if ($dtb_footer_reveal =='1' && $dtb_footer_reveal_mobile_off != '1') { ?>

	#main-footer, .et-l--footer {z-index:0; position:fixed; bottom:0; right:0; left:0;}
	#et-main-area, .et_builder_inner_content {background: #fff;}
	#main-content {position:relative; z-index:1;}
	.et_boxed_layout #main-footer, .et_boxed_layout .et-l--footer {
		right: auto!important;
		left: auto!important;
		width:90%;
		max-width:<?php echo esc_html($website_content_width+160); ?>px;
	}
	#dtb-before-footer {position:relative; z-index:1}

<?php } ?>

<?php if ($dtb_footer_reveal =='1' && $dtb_footer_reveal_mobile_off == '1') { ?>
	@media (min-width: 980px){
		#main-footer, .et-l--footer {z-index:0; position:fixed; bottom:0; right:0; left:0;}
		#et-main-area, .et_builder_inner_content {background: #fff;}
		#main-content {position:relative; z-index:1;}
		.et_boxed_layout #main-footer, .et_boxed_layout .et-l--footer {
			right: auto!important;
			left: auto!important;
			width:90%;
			max-width:<?php echo esc_html($website_content_width+160); ?>px;
		}
	}
<?php } ?>

<?php if ($css_vertical_align =='1') { ?>
	.vertical-align {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
<?php } ?>

<?php if ($css_full_height =='1') { ?>
	.full-height {
		min-height:100vh;
		height:100vh;
	}
<?php } ?>

<?php if ($dtb_pricing_border =='1') { ?>
	.et_pb_pricing_content_top {border-bottom:none; padding-bottom:0;}
	@media (max-width: 767px) {
		.et_pb_column .et_pb_pricing_table {margin: 0!important;}
	}
<?php } ?>

<?php if ($dtb_testimonial_photo == '1') { ?>
	.et_pb_testimonial_description {margin-left:0!important;}
	.et_pb_testimonial .et_pb_testimonial_portrait {float:left; margin:10px 20px 0 0;}
	.et_pb_testimonial_author {margin-top:0; padding-top:26px;}
<?php } ?>

<?php if ($dtb_toggle_icon == '1') { ?>
	.et_pb_toggle_title:before {
		content:'3'!important;
		transition:all .3s ease-in-out;
		font-size:24px;
	}
	.et_pb_toggle_open .et_pb_toggle_title:before {
		transform:rotate(180deg);
	}
<?php } ?>



<?php if ($dtb_follow_the_mouse == '1') {?>
	.et_pb_portfolio .et_pb_portfolio_item, .et_pb_fullwidth_portfolio .et_pb_portfolio_item {position: relative; overflow:hidden;}
	.et_pb_portfolio .et_pb_portfolio_item .et_portfolio_image,
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item .et_portfolio_image {overflow:hidden;}
	.et_pb_portfolio .et_pb_portfolio_item .et_overlay, .et_pb_fullwidth_portfolio .et_pb_portfolio_item .et_overlay, .et_pb_gallery .et_pb_gallery_item .et_overlay {opacity: 1; z-index: 2; top: -200%; border: 0; transition: none;}
	.et_pb_portfolio .et_pb_portfolio_item .et_overlay:before,
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item .et_overlay:before {top: 28%; opacity: 0; transition: all .4s; transition-delay: .5s;}
	.et_pb_portfolio .et_pb_portfolio_item:hover .et_overlay:before,
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item:hover .et_overlay:before {top: 28%; opacity: 1;}
	.et_pb_portfolio .et_pb_portfolio_item .et_pb_module_header{
		position: absolute;
		top: 40%;
		text-align: center;
		width: 100%;
		opacity: 0;
		transition: all .4s cubic-bezier(.53, .06, .28, .99);
		z-index: 3;
		transform: scale(0.5);
	}
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item .et_pb_module_header {top: auto;}
	.et_pb_portfolio .et_pb_portfolio_item:hover .et_pb_module_header,
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item:hover .et_pb_module_header {opacity: 1; transform: scale(1);}
	@media only screen and (max-device-width: 1024px) {
		.et_pb_portfolio .et_pb_portfolio_item:hover .et_overlay,
		.et_pb_fullwidth_portfolio .et_pb_portfolio_item:hover .et_overlay, .et_pb_gallery .et_pb_gallery_item:hover .et_overlay {
			top: 0!important;
			left: 0!important;
		}
	}
	.et_pb_portfolio .et_pb_portfolio_item .et_overlay,
	.et_pb_fullwidth_portfolio .et_pb_portfolio_item .et_overlay,
	.et_pb_gallery .et_pb_gallery_item .et_overlay {background:linear-gradient(<?php echo esc_html($dtb_follow_mouse_gradient);?>, <?php echo esc_html($dtb_follow_mouse_color1);?>, <?php echo esc_html($dtb_follow_mouse_color2);?>);}
<?php } ?>

<?php if ($dtb_sec_btn == '1') {?>
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?> {
		<?php if (($sec_btn_font != 'none') && ($sec_btn_font != '')) { ?>font-family:<?php echo esc_html($sec_btn_font); ?>;<?php } ?>;
		font-weight: <?php echo esc_html($dtb_sec_btn_font_weight); ?>;
		font-size:<?php echo esc_html($dtb_sec_btn_font_size); ?>px;
		letter-spacing: <?php echo esc_html($dtb_sec_btn_font_lettersp);?>px;
		<?php if ($dtb_sec_btn_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_sec_btn_tt); ?>; font-variant:normal;<?php } ?> 
		color:<?php echo esc_html($dtb_sec_btn_font_color); ?>!important;
		background:<?php echo esc_html($dtb_sec_btn_bg_color); ?>!important;
		border-radius:<?php echo esc_html($dtb_sec_btn_border_radius); ?>px;
		border-width:<?php echo esc_html($dtb_sec_btn_border_width); ?>px;
		border-color:<?php echo esc_html($dtb_sec_btn_border_color);?>!important;
		display:inline-block;
	}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover {
		letter-spacing: <?php echo esc_html($dtb_sec_btn_font_lettersp_hover);?>px;
		color:<?php echo esc_html($dtb_sec_btn_font_color_hover); ?>!important;
		background:<?php echo esc_html($dtb_sec_btn_bg_color_hover); ?>!important;
		border-radius:<?php echo esc_html($dtb_sec_btn_border_radius_hover); ?>px;
		border-color:<?php echo esc_html($dtb_sec_btn_border_color_hover);?>!important;	
	}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {
		color:<?php echo esc_html($dtb_sec_btn_icon_color); ?>!important;
		font-size:<?php echo esc_html($dtb_sec_btn_icon_size);?>px;
		content:'<?php echo esc_html($dtb_sec_btn_icon);?>';
	}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover:after {
		color:<?php echo esc_html($dtb_sec_btn_icon_color_hover); ?>!important;
	}
<?php if ($dtb_sec_btn_icon_enable != 'no') {?>

<?php if (($dtb_sec_btn_icon_place != 'left') && ($dtb_sec_btn_icon_show == '1') ){ ?>
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?> {padding:.3em 1em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover {padding:.3em 2em .3em .7em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {left:auto!important; opacity:0!important; display:inline-block!important; line-height: 1em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover:after {left:auto!important; opacity:1!important; margin-left:0!important;}
<?php	} ?>
<?php if (($dtb_sec_btn_icon_place != 'left') && ($dtb_sec_btn_icon_show != '1') ){ ?>
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>,
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover {padding:.3em 2em .3em .7em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {left:auto!important; opacity:1!important; display:inline-block!important; margin-left:0!important;line-height: 1em!important;}
<?php	} ?>
<?php if (($dtb_sec_btn_icon_place == 'left') && ($dtb_sec_btn_icon_show == '1') ){ ?>
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?> {padding:.3em 1em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover {padding-right:.7em!important; padding-left: 2em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {left:.15em!important; opacity:0!important; display:inline-block!important;line-height: 1em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover:after {left:.15em!important; opacity:1!important; margin-left:0!important;}
<?php	} ?>
<?php if (($dtb_sec_btn_icon_place == 'left') && ($dtb_sec_btn_icon_show != '1') ){ ?>
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>,
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover,
	body.et_button_no_icon.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?> {padding:.3em .7em .3em 2em!important;}
	body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {left:.15em!important; opacity:1!important; display:inline-block!important; margin-left:0!important;line-height: 1em!important;}
<?php	} ?>
	
<?php } ?>
<?php if ($dtb_sec_btn_icon_enable == 'no') {?>
		body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after,
		body.et_pb_button_helper_class.et_button_icon_visible .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:after {display:none!important;}
		body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>, body.et_pb_button_helper_class .et_pb_button.<?php echo esc_html($dtb_sec_btn_class);?>:hover {padding:.3em 1em!important;}
<?php } ?> 
<?php } ?> 


<?php if ($dtb_slim_email != '') {?>
	@media (min-width:981px) {
		.et_pb_column_4_4 .slim-optin2.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_description {width: 30%;}
		.et_pb_column_4_4 .slim-optin2.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form {width:70%;}
	}
	.slim-optin1 .et_pb_newsletter_footer {flex-basis: 100%!important; margin-top: 0; font-size: 80%; max-width:100%}	
	.slim-optin1 .et_pb_newsletter_field, .slim-optin1 .et_pb_newsletter_button_wrap {flex-basis:49%!important; max-width:49%;}
	.slim-optin2 .et_pb_newsletter_field, .slim-optin2 .et_pb_newsletter_button_wrap {flex-basis:32.5%!important; max-width:32.5%;}
	.slim-optin2 .et_pb_newsletter_footer, .slim-optin3 .et_pb_newsletter_footer {margin-top:0;}
	.slim-optin2 .et_pb_module_header {padding-bottom:0;}
	.slim-optin3 .et_pb_newsletter_field, .slim-optin3 .et_pb_newsletter_button_wrap {flex-basis:24.5%!important; max-width:24.5%;}
	.slim-optin3.et_pb_newsletter.et_pb_subscribe,
	.et_pb_column:not(.et_pb_column_4_4) .slim-optin1.et_pb_newsletter.et_pb_subscribe,
	.et_pb_column:not(.et_pb_column_4_4) .slim-optin2.et_pb_newsletter.et_pb_subscribe {display:block;}
	.et_pb_column .slim-optin3.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form,
	.et_pb_column:not(.et_pb_column_4_4) .slim-optin1.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form,
	.et_pb_column:not(.et_pb_column_4_4) .slim-optin2.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form {padding-left:0;}
	.slim-optin3 .et_pb_newsletter_description, .slim-optin3 .et_pb_newsletter_form {width: 100%; padding: 0;}
	.et_pb_column>.slim-optin3.et_pb_newsletter .et_pb_newsletter_description {margin-bottom: 10px}
	
	@media (min-width:768px) and (max-width:980px) {
		.et_pb_column_4_4 .slim-optin1.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form,
		.et_pb_column_4_4 .slim-optin2.et_pb_newsletter.et_pb_subscribe .et_pb_newsletter_form {padding-left:0;}
	}
	@media (max-width:980px) {
		.et_pb_column_4_4 .slim-optin1, .et_pb_column_4_4 .slim-optin2 {display:block;}
		.slim-optin1 .et_pb_newsletter_description, .slim-optin1 .et_pb_newsletter_form,
		.slim-optin2 .et_pb_newsletter_description, .slim-optin2 .et_pb_newsletter_form {width: 100%; padding: 0;}
		.et_pb_column_4_4 .slim-optin1 .et_pb_newsletter_description,
		.et_pb_column_4_4 .slim-optin2 .et_pb_newsletter_description {margin-bottom: 10px;text-align:center;}
		.slim-optin1 .et_pb_newsletter_footer, .slim-optin2 .et_pb_newsletter_footer {text-align:center;}
	}
	@media (max-width:800px) {
		.slim-optin3 .et_pb_newsletter_field, .slim-optin3 .et_pb_newsletter_button_wrap {flex-basis:49%!important; max-width:49%;}
		.et_pb_column_4_4 .slim-optin3 .et_pb_newsletter_description {margin-bottom:10px;}
	}
	@media (max-width:600px) {
		.slim-optin2 .et_pb_newsletter_field {flex-basis:49%!important; max-width:49%}
		.slim-optin2 .et_pb_newsletter_button_wrap {flex-basis:100%!important; max-width:100%;}
	}
	@media (max-width:479px) {
		.slim-optin1 .et_pb_newsletter_field, .slim-optin1 .et_pb_newsletter_button_wrap, .slim-optin2 .et_pb_newsletter_field, .slim-optin3 .et_pb_newsletter_field, .slim-optin3 .et_pb_newsletter_button_wrap {flex-basis:100%!important; max-width:100%;}
	}
<?php } ?>
<?php if ($dtb_rellax_mobile_off != '') { ?>
	@media (max-width:980px) {
		[class^="scroll_speed_"], [class*=" scroll_speed_"] {transform:translate3d(0,0,0)!important;}
	}
<?php } ?> 

<?php if ($dtb_overflow_hidden != '') {?>
	#et-main-area {overflow-x: hidden; overflow-y:auto;}
<?php } ?> 
.dtb_layout_placeholder{
	height: 150px;
	display: flex;
	align-items: center;
	justify-content: center;
	background: #ccc;
	color: white;
}
.dtb_layout_placeholder > h3{
	color:white;
}
div[class^="count-"] {
	display: inline-block;
}

<?php if ($dtb_fixed_scroll != '') {?>
body:not(.et-fb) .dtb-fixed-header.et_pb_section,
body:not(.et-fb) .dtb-fixed-always.et_pb_section {
	position:fixed!important;
	top: 0;
	left: 0;
	right: 0;
	transform: translateY(-200%);
	transition: 0.3s transform cubic-bezier(.3,.73,.3,.74); z-index:20;
}

body.admin-bar:not(.et-fb)  .dtb-fixed-header.et_pb_section,
body.admin-bar:not(.et-fb)  .dtb-fixed-always.et_pb_section {top:32px}
@media (max-width:782px) {
	body.admin-bar:not(.et-fb) .dtb-fixed-header.et_pb_section,
	body.admin-bar:not(.et-fb) .dtb-fixed-always.et_pb_section {top:46px}
}
@media (max-width:600px) {
	body.admin-bar:not(.et-fb) .dtb-fixed-header.et_pb_section,
	body.admin-bar:not(.et-fb) .dtb-fixed-always.et_pb_section {top:0}
}

body.scrolled-down:not(.et-fb) .dtb-fixed-header.et_pb_section,
body:not(.et-fb) .dtb-fixed-always.et_pb_section {transform: translateY(0);}
<?php } ?>

<?php if ($dtb_enable_equal_height_val != '') {?>
	@media (max-width:<?php echo esc_attr( $dtb_equal_height_breakpoint_val ); ?>px) {
		<?php if ($dtb_equal_height_blurb_val != '') {?>
			.dtb-equal-height .et_pb_blurb_content {height:auto!important;}
		<?php } ?>
		<?php if ($dtb_equal_height_pricing_val != '') {?>
			.dtb-equal-height .et_pb_pricing_content {height:auto!important;}
		<?php } ?>
	}
	<?php if ($dtb_equal_height_pricing_val != '') {?>
		.dtb-equal-height .et_pb_pricing_content {box-sizing:content-box;}
	<?php } ?>
<?php } ?>

<?php if ($dtb_enable_sticky != '') {?>
	@media (min-width:<?php echo esc_attr( $dtb_sticky_breakpoint+1 ); ?>px) {
		.dtb-sticky<?php if (($dtb_add_sticky_simple_class != '') && ($dtb_sticky_simple_class != '')) : echo esc_html(', ' . $dtb_sticky_simple_class); endif; ?> {
			position: sticky!important;
			position: -webkit-sticky!important;
			top: <?php echo esc_html($dtb_sticky_offset);?>px;
			z-index:2;
		}
		#page-container.et-animated-content, #page-container.et-animated-content #et-main-area {
			overflow-y:initial !important;
			overflow-x:initial !important;
		}
	}
	.admin-bar .dtb-sticky<?php if (($dtb_add_sticky_simple_class != '') && ($dtb_sticky_simple_class != '')) : echo esc_html(', .admin-bar ' . $dtb_sticky_simple_class); endif; ?> {
		top: <?php echo esc_html($dtb_sticky_offset+46);?>px;
	}
	@media (min-width:783px) {
		.admin-bar .dtb-sticky<?php if (($dtb_add_sticky_simple_class != '') && ($dtb_sticky_simple_class != '')) : echo esc_html(', .admin-bar ' . $dtb_sticky_simple_class); endif; ?> {
			top: <?php echo esc_html($dtb_sticky_offset+32);?>px;
		}
	}
	
<?php } ?>


<?php 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/css/mobile-columns.php');
	if ($dtb_enable_password != '') { include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/css/password-form.php'); }

	
	
	$css = ob_get_contents();
	ob_end_clean();
	return dtb_minify_css($css);

	}