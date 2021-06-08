<?php

$m_m_width = get_theme_mod('dtb_modcustomize_m_m_width', '1');
$m_m_width_max = get_option('dtb_customize_m_m_width_max', '240');
	if ($m_m_width != '') {
		$moveValue = '100%';
	} else { 
		$moveValue = ''.$m_m_width_max.'px';
	}
$m_m_position = get_option('dtb_customize_m_m_position', 'right');
$m_m_container_bg_color = get_option('dtb_customize_m_m_container_bg_color', '#ffffff');
$m_m_container_bg_img_enable = get_theme_mod('dtb_modcustomize_m_m_container_bg_img_enable', '');
$m_m_container_bg_img = get_option('dtb_customize_m_m_container_bg_img', '');
$m_m_container_bg_size = get_option('dtb_customize_m_m_container_bg_size', 'cover');
$m_m_container_bg_position = get_option('dtb_customize_m_m_container_bg_position', 'center');
$m_m_container_bg_blend = get_option('dtb_customize_m_m_container_bg_blend', 'normal');
$m_m_container_bg_gradient_enable = get_theme_mod('dtb_modcustomize_m_m_container_bg_gradient_enable', '');
$m_m_container_bg_gradient1 = get_option('dtb_customize_m_m_container_bg_gradient1', 'normal');
$m_m_container_bg_gradient2 = get_option('dtb_customize_m_m_container_bg_gradient2', 'normal');
$m_m_container_bg_gradient_dir = get_option('dtb_customize_m_m_container_bg_gradient_dir', 'to bottom');

$m_m_container_bg_gradient_above = get_theme_mod('dtb_modcustomize_m_m_container_bg_gradient_above', '');


$m_m_animation_page = get_theme_mod('dtb_modcustomize_m_m_animation_page', '');
$m_m_container_animation_in = get_option('dtb_customize_m_m_container_animation_in', 'fade');
$m_m_container_animation_out = get_option('dtb_customize_m_m_container_animation_out', 'fade');
$m_m_animation_type = get_option('dtb_customize_m_m_container_animation_type', 'move_left');
$m_m_dim_background = get_theme_mod('dtb_modcustomize_m_m_dim_background', '');
$m_m_dim_color = get_option('dtb_customize_m_m_dim_color', 'rgba(0,0,0,0.8)');

$m_m_container_pad_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_pad_top', '20px'));
$m_m_container_pad_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_pad_right', '20px'));
$m_m_container_pad_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_pad_bottom', '20px'));
$m_m_container_pad_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_pad_left', '20px'));
$m_m_container_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_margin_top', ''));
$m_m_container_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_margin_right', ''));
$m_m_container_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_margin_bottom', ''));
$m_m_container_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_container_margin_left', ''));
$m_m_container_shadow_color = get_option('dtb_customize_m_m_container_shadow_color', 'rgba(0,0,0,0.15)');
$m_m_container_shadow = get_theme_mod('dtb_modcustomize_m_m_container_shadow', '');
$m_m_container_shadow_offset_x = get_option('dtb_customize_m_m_container_shadow_offset_x', '0');
$m_m_container_shadow_offset_y = get_option('dtb_customize_m_m_container_shadow_offset_y', '0');
$m_m_container_shadow_blur = get_option('dtb_customize_m_m_container_shadow_blur', '50');

$m_m_hamburger_show = get_theme_mod('dtb_modcustomize_m_m_hamburger_show', '1');
$m_m_hamburger_align = get_theme_mod('dtb_modcustomize_m_m_hamburger_align', 'right');
$m_m_hamburger_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_hamburger_margin_top', '14px'));
$m_m_hamburger_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_hamburger_margin_right', '10px'));
$m_m_hamburger_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_hamburger_margin_left', ''));
$m_m_hamburger_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_hamburger_margin_bottom', ''));

$m_mobile_elements_logo = dtb_get_option('dtb_m_mobile_elements_logo');
$m_m_logo_align = get_theme_mod('dtb_modcustomize_m_m_logo_align', 'left');
$m_m_logo_max_width = get_option('dtb_customize_m_m_logo_max_width', '50');
$m_m_logo_width = get_option('dtb_customize_m_m_logo_width', '100');
$m_m_logo_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_logo_margin_top', ''));
$m_m_logo_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_logo_margin_right', ''));
$m_m_logo_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_logo_margin_left', ''));
$m_m_logo_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_logo_margin_bottom', ''));


$m_mobile_elements_search = dtb_get_option('dtb_m_mobile_elements_search');
$m_m_search_width = get_option('dtb_customize_m_m_search_width', '300');
$m_m_search_max_width = get_option('dtb_customize_m_m_search_max_width','100');
$m_m_search_align = get_theme_mod('dtb_modcustomize_m_m_search_align','left');

$m_m_search_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_search_margin_top', '20px'));
$m_m_search_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_search_margin_right', ''));
$m_m_search_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_search_margin_bottom', ''));
$m_m_search_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_search_margin_left', ''));
$m_m_search_bg_color = get_option('dtb_customize_m_m_search_bg_color','rgba(189,200,213,0.5)');
$m_m_search_padding_vert = get_option('dtb_customize_m_m_search_padding_vert','10');
$m_m_search_padding_hor = get_option('dtb_customize_m_m_search_padding_hor','15');
$m_m_search_font_weight = get_option('dtb_customize_m_m_search_font_weight','400');
$m_m_search_font_size = get_option('dtb_customize_m_m_search_font_size','14');
$m_m_search_lettersp = get_option('dtb_customize_m_m_search_lettersp','0');
$m_m_search_tt = get_theme_mod('dtb_modcustomize_m_m_search_tt', 'none');
$m_m_search_font_color_placeholder = get_option('dtb_customize_m_m_search_font_color_placeholder','#666');
$m_m_search_border_radius = get_option('dtb_customize_m_m_search_border_radius','3');
$m_m_search_border_width = get_option('dtb_customize_m_m_search_border_width','0');
$m_m_search_border_color = get_option('dtb_customize_m_m_search_border_color','rgba(0,0,0,0)');
$m_m_search_border_color_focus = get_option('dtb_customize_m_m_search_border_color_focus','rgba(0,0,0,0)');
$m_m_search_bg_color_focus = get_option('dtb_customize_m_m_search_bg_color_focus','rgba(189,200,213,0.8)');
$m_m_search_font_color = get_option('dtb_customize_m_m_search_font_color','#fff');
$m_m_search_icon_font = get_option('dtb_customize_title_m_m_search_icon_font','18');
$m_m_search_icon_font_color = get_option('dtb_customize_title_m_m_search_icon_font_color','#fff');
$m_m_search_icon_bg_color = get_option('dtb_customize_title_m_m_search_icon_bg_color','rgba(0,0,0,0)');
$m_m_search_icon_padding = get_option('dtb_customize_title_m_m_search_icon_padding','10');
$m_m_search_icon_border_radius = get_option('dtb_customize_title_m_m_search_icon_border_radius','0');
$m_m_search_icon_margin = get_option('dtb_customize_title_m_m_search_icon_margin','-40');
$m_m_search_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_search_font')));

$m_mobile_elements_widgets = dtb_get_option('dtb_m_mobile_elements_widgets', '');
$m_m_widgets_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_widgets_margin_top', ''));
$m_m_widgets_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_widgets_margin_right', ''));
$m_m_widgets_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_widgets_margin_bottom', ''));
$m_m_widgets_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_widgets_margin_left', ''));
$m_m_widgets_title_align = get_theme_mod('dtb_modcustomize_m_m_widgets_title_align','left');
$m_m_widgets_title_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_widgets_title_font')));
$m_m_widgets_title_font_weight = get_option('dtb_customize_m_m_widgets_title_font_weight','700');
$m_m_widgets_title_font_size = get_option('dtb_customize_m_m_widgets_title_font_size','17');
$m_m_widgets_title_lettersp = get_option('dtb_customize_m_m_widgets_title_lettersp','0');
$m_m_widgets_title_tt = get_theme_mod('dtb_modcustomize_m_m_widgets_title_tt', 'none');
$m_m_widgets_title_color = get_option('dtb_customize_m_m_widgets_title_color','#666666');

$m_mobile_elements_cart = dtb_get_option('dtb_m_mobile_elements_cart');
$m_m_shop_link_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_margin_top', '20px'));
$m_m_shop_link_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_margin_right', '20px'));
$m_m_shop_link_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_margin_bottom', '20px'));
$m_m_shop_link_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_margin_left', '20px'));
$m_m_shop_link_padding_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_padding_top', '8px'));
$m_m_shop_link_padding_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_padding_right', '20px'));
$m_m_shop_link_padding_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_padding_bottom', '8px'));
$m_m_shop_link_padding_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_shop_link_padding_left', '20px'));

$m_m_shop_link_bg_color = get_option('dtb_customize_m_m_shop_link_bg_color', 'rgba(0,0,0,0.8)');
$m_m_shop_link_border_radius = get_option('dtb_customize_m_m_shop_link_border_radius', '3');
$m_m_shop_link_border_width = get_option('dtb_customize_m_m_shop_link_border_width', '0');
$m_m_shop_link_border_color = get_option('dtb_customize_m_m_shop_link_border_color', 'rgba(0,0,0,0)');
$m_m_shop_link_align = get_theme_mod('dtb_modcustomize_m_m_shop_link_align', 'left');

$m_m_shop_link_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_shop_link_font')));
$m_m_shop_link_font_weight = get_option('dtb_customize_m_m_shop_link_font_weight', '400');
$m_m_shop_link_font_size = get_option('dtb_customize_m_m_shop_link_font_size', '17');
$m_m_shop_link_lettersp = get_option('dtb_customize_m_m_shop_link_lettersp', '0');
$m_m_shop_link_tt = get_theme_mod('dtb_modcustomize_m_m_shop_link_tt', 'none');
$m_m_shop_link_color = get_option('dtb_customize_m_m_shop_link_color', 'rgba(255,255,255,0.7)');
$m_m_shop_icon_color = get_option('dtb_customize_m_m_shop_icon_color', '#fff');
$m_m_shop_link_icon_size = get_option('dtb_customize_m_m_shop_link_icon_size', '17');
$m_m_shop_bg_color_hover = get_option('dtb_customize_m_m_shop_bg_color_hover', '#000000');
$m_m_shop_border_color_hover = get_option('dtb_customize_m_m_shop_border_color_hover', 'rgba(0,0,0,0)');
$m_m_shop_link_color_hover = get_option('dtb_customize_m_m_shop_link_color_hover', '#ffffff');
$m_m_shop_icon_color_hover = get_option('dtb_customize_m_m_shop_icon_color_hover', '#ffffff');


$m_m_links_container_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_container_margin_top', '20px'));
$m_m_links_container_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_container_margin_right', '0'));
$m_m_links_container_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_container_margin_bottom', '0'));
$m_m_links_container_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_container_margin_left', '0'));
$m_m_links_align = get_theme_mod('dtb_modcustomize_m_m_links_align', 'left');
$m_m_links_margin_bottom = get_option('dtb_customize_m_m_links_margin_bottom', '0');
$m_m_links_border_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_border_top', '0'));
$m_m_links_border_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_border_right', '0'));
$m_m_links_border_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_border_bottom', '0'));
$m_m_links_border_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_links_border_left', '0'));
$m_m_links_border_radius = get_option('dtb_customize_m_m_links_border_radius', '0');
$m_m_link_bg_color = get_option('dtb_customize_m_m_link_bg_color', '#ffffff');
$m_m_parent_color = get_option('dtb_customize_m_m_parent_color', '#00B5CF');

$dtb_cta_link_type = dtb_get_option('dtb_cta_link_type', '');
$m_m_cta_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_margin_top', '20px'));
$m_m_cta_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_margin_right', ''));
$m_m_cta_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_margin_bottom', ''));
$m_m_cta_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_margin_left', ''));
$m_m_cta_padding_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_padding_top', '15px'));
$m_m_cta_padding_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_padding_right', '25px'));
$m_m_cta_padding_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_padding_bottom', '15px'));
$m_m_cta_padding_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_cta_padding_left', '25px'));
$m_m_cta_fullwidth = get_theme_mod('dtb_modcustomize_m_m_cta_fullwidth', '');
$m_m_cta_align = get_theme_mod('dtb_modcustomize_m_m_cta_align', 'left');
$m_m_cta_text_align = get_theme_mod('dtb_modcustomize_m_m_cta_text_align', 'left');
$m_m_cta_border_width = get_option('dtb_customize_m_m_cta_border_width', '2');
$m_m_cta_border_radius = get_option('dtb_customize_m_m_cta_border_radius', '5');
$m_m_cta_border_color = get_option('dtb_customize_m_m_cta_border_color', '#21C9E2');
$m_m_cta_border_color_hover = get_option('dtb_customize_m_m_cta_border_color_hover', '#BDC8D5');
$m_m_cta_shadow_color = get_option('dtb_customize_m_m_cta_shadow_color', 'rgba(0,0,0,0.15)');
$m_m_cta_shadow = get_theme_mod('dtb_modcustomize_m_m_cta_shadow', '');
$m_m_cta_shadow_offset_x = get_option('dtb_customize_m_m_cta_shadow_offset_x', '2');
$m_m_cta_shadow_offset_y = get_option('dtb_customize_m_m_cta_shadow_offset_y', '10');
$m_m_cta_shadow_blur = get_option('dtb_customize_m_m_cta_shadow_blur', '30');

$dtb_m_mobile_trigger = dtb_get_option('dtb_m_mobile_trigger', '');

?>

@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) { 
	.et_header_style_slide #page-container {left:0!important;}
	.et_header_style_fullscreen .et_slide_in_menu_container, .et_header_style_slide .et_slide_in_menu_container {display:none!important;}
	<?php if ($dtb_m_mobile_trigger == '1')  { ?>
		.et_toggle_fullscreen_menu, .et_toggle_slide_menu:after, .mobile_menu_bar.et_pb_header_toggle {display:none!important;}
	<?php } ?>
	/* Toolbox Mobile Menu */
	#et_mobile_nav_menu #mobile_menu, .et_pb_module.dtb-menu .et_mobile_menu {display:none!important;}
	#dtb-m-menu {
		box-sizing:content-box;
		display:block;
		visibility:hidden;
		opacity:0;
		position:fixed;
		top:0;
		bottom:0;
		z-index:100005;
		background-color:<?php echo esc_html($m_m_container_bg_color);?>;
		
		<?php if ($m_m_container_bg_img_enable == '1') { ?>
			background-image:url(<?php echo esc_html($m_m_container_bg_img);?>);
			background-size:<?php echo esc_html($m_m_container_bg_size);?>;
			background-position:<?php echo esc_html($m_m_container_bg_position);?>;
			background-blend-mode:<?php echo esc_html($m_m_container_bg_blend);?>;
			background-repeat:no-repeat;
		<?php } ?>
		<?php if ($m_m_container_bg_gradient_enable == '1')  { ?>
			background-image:linear-gradient(<?php echo esc_html($m_m_container_bg_gradient_dir);?>, <?php echo esc_html($m_m_container_bg_gradient1);?>, <?php echo esc_html($m_m_container_bg_gradient2);?>);
			<?php if (($m_m_container_bg_img_enable == '1') && ($m_m_container_bg_gradient_above == '1')) { ?>
				background-image:linear-gradient(<?php echo esc_html($m_m_container_bg_gradient_dir);?>, <?php echo esc_html($m_m_container_bg_gradient1);?>, <?php echo esc_html($m_m_container_bg_gradient2);?>),url(<?php echo esc_html($m_m_container_bg_img);?>);
			<?php } if (($m_m_container_bg_img_enable == '1') && ($m_m_container_bg_gradient_above == '')) { ?>
				background-image:url(<?php echo esc_html($m_m_container_bg_img);?>),linear-gradient(<?php echo esc_html($m_m_container_bg_gradient_dir);?>, <?php echo esc_html($m_m_container_bg_gradient1);?>, <?php echo esc_html($m_m_container_bg_gradient2);?>);
			<?php } ?>
		<?php } ?>
		<?php if ($m_m_animation_page == '') { ?>
			margin: <?php echo esc_attr($m_m_container_margin_top . ' ' . $m_m_container_margin_right . ' ' . $m_m_container_margin_bottom .' '. $m_m_container_margin_left);?>;
		<?php } ?>
			width:calc(100%<?php if ($m_m_container_margin_right != '0px') : echo ' - ' . esc_attr($m_m_container_margin_right); endif; if ($m_m_container_margin_left != '0px') : echo esc_attr(' - ' . $m_m_container_margin_left); endif;?>);
		<?php if ($m_m_width == '') { ?>
			max-width:<?php echo esc_html($m_m_width_max);?>px; 
			<?php if ($m_m_position == 'right') { ?>
				right:0;
			<?php } elseif ($m_m_position == 'left') { ?>
				left:0;
			<?php } elseif ($m_m_position == 'center') {?>
				left:50%; margin-left:-<?php echo esc_html($m_m_width_max/2);?>px;
			<?php } ?>
			<?php if ($m_m_container_shadow != '' ) { ?>
				transition: box-shadow .5s ease-in-out;
			<?php } ?>
		<?php } ?>
	}
	.dtb-m-mobile-open #dtb-m-menu {
		<?php if ($m_m_container_shadow != '' ) { ?>
			box-shadow:<?php echo esc_html($m_m_container_shadow_offset_x . 'px ' . $m_m_container_shadow_offset_y . 'px ' . $m_m_container_shadow_blur . 'px ' . $m_m_container_shadow_color); ?>;
		<?php } ?>
	}
	#dtb-m-menu>.menu-wrapper {
		padding: <?php echo esc_html($m_m_container_pad_top . ' ' .  $m_m_container_pad_right . ' 0 ' . $m_m_container_pad_left);?>; height:100%; position: relative;
	}
	#dtb-m-menu>.menu-wrapper:after {content:''; display:block; height:<?php echo esc_html($m_m_container_pad_bottom);?>;}
	#dtb-m-menu>.menu-wrapper>.nav-wrapper>ul.dtb-mobile-menu {display:block!important; height:auto!important}
	body.stopscroll {touch-action: none; -webkit-overflow-scrolling: none; overflow: hidden; overscroll-behavior: none;}
	#dtb-m-menu .menu-wrapper { width: 100%; overflow-y: auto; -webkit-overflow-scrolling:touch;}
	body.admin-bar:not(.et-fb) #dtb-m-menu {top:32px;}
	
	#dtb-m-menu .dtb-mobile-menu {
		margin:<?php echo esc_attr($m_m_links_container_margin_top . ' ' . $m_m_links_container_margin_right . ' ' . $m_m_links_container_margin_bottom . ' ' . $m_m_links_container_margin_left);?>;
		text-align:<?php echo esc_html($m_m_links_align); ?>;
	}
	#dtb-m-menu .dtb-mobile-menu li {
		display:block;
	}
	#dtb-m-menu .dtb-mobile-menu li a {
		display: block;
		font-size:<?php echo esc_html($dtb_mobile_font_size);?>px;
		color:<?php echo esc_html($dtb_mobile_font_color)?>;
		font-weight:<?php echo esc_html($dtb_mobile_font_weight);?>;
		padding-top:<?php echo esc_html($dtb_mobile_padding_top);?>px;
		padding-bottom:<?php echo esc_html($dtb_mobile_padding_bottom);?>px;
		padding-right:<?php echo esc_html($dtb_mobile_padding_right);?>px;
		padding-left:<?php echo esc_html($dtb_mobile_padding_left);?>px;
		<?php if ($dtb_mobile_font_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_mobile_font_tt); ?>; font-variant:normal;<?php } ?>
		letter-spacing:<?php echo esc_html($dtb_mobile_font_lettersp);?>px;
		<?php if ($mobile_font != '') {?>font-family:<?php echo esc_html($mobile_font); ?>;<?php } ?>
		line-height:1.2;
		background-color:<?php echo esc_html($m_m_link_bg_color);?>;
		transition: all .3s ease-in-out;
	}
	#dtb-m-menu .dtb-mobile-menu li a:hover,
	#dtb-m-menu .dtb-mobile-menu li.menu-item-has-children>a:hover,
	#dtb-m-menu .dtb-mobile-menu .sub-menu-toggle.popped~ul.sub-menu li.menu-item-has-children>a:hover {
		color:<?php echo esc_html($dtb_mobile_font_color_hover)?>;
		background-color:<?php echo esc_html($dtb_mobile_menu_bg_hover);?>!important;
	}
	#dtb-m-menu .dtb-mobile-menu li.menu-item-has-children>a,
	#dtb-m-menu .dtb-mobile-menu .sub-menu-toggle.popped~ul.sub-menu li.menu-item-has-children>a {
		color: <?php echo esc_html($m_m_parent_color);?>;
		background-color:<?php echo esc_html($dtb_mobile_menu_parent_bg);?>;
		font-weight:<?php echo esc_html($dtb_mobile_sub_parent_font_weight);?>;
	}
	#dtb-m-menu .dtb-mobile-menu>li {
		margin-bottom:<?php echo esc_html($m_m_links_margin_bottom);?>px;
	}
	#dtb-m-menu .dtb-mobile-menu>li>ul>li {
		border-width:<?php echo esc_attr($m_m_links_border_top . ' ' . $m_m_links_border_right . ' ' . $m_m_links_border_bottom . ' ' . $m_m_links_border_left);?>;
		border-style:solid;
		border-color:<?php echo esc_html($dtb_mobile_separator); ?>;
	 }
	#dtb-m-menu .dtb-mobile-menu>li>ul>li:not(:first-child) {border-top:none;}
	<?php if ($m_m_links_border_top != '0px') { ?>
		#dtb-m-menu .dtb-mobile-menu li:not(:last-child),
		#dtb-m-menu .dtb-mobile-menu li.menu-item-has-children>a {border-bottom-width:<?php echo esc_attr($m_m_links_border_top);?>;}
	<?php } ?>
	#dtb-m-menu .dtb-mobile-menu>li>ul>li:first-child, #dtb-m-menu .dtb-mobile-menu>li>ul>li:first-child>a {
		border-radius:<?php echo esc_html($m_m_links_border_radius); ?>px <?php echo esc_html($m_m_links_border_radius); ?>px 0 0;
		border-top:0;
	}
	#dtb-m-menu .dtb-mobile-menu>li>ul>li:last-child, #dtb-m-menu .dtb-mobile-menu>li>ul>li:last-child>ul>li:last-child, #dtb-m-menu .dtb-mobile-menu>li>ul>li:last-child>a, #dtb-m-menu .dtb-mobile-menu>li>ul>li:last-child>ul>li:last-child>a {
		border-radius:0 0 <?php echo esc_html($m_m_links_border_radius); ?>px <?php echo esc_html($m_m_links_border_radius); ?>px;
	}
	#dtb-m-menu .dtb-mobile-menu>li>ul>li li {
		border-top:<?php echo esc_attr($m_m_links_border_top . ' solid ' . $dtb_mobile_separator);?>;
		
	}
	 
	#dtb-m-menu .dtb-mobile-menu>li>a {
		border-radius:<?php echo esc_html($m_m_links_border_radius); ?>px;
		border-width:<?php echo esc_attr($m_m_links_border_top . ' ' . $m_m_links_border_right . ' ' . $m_m_links_border_bottom . ' ' . $m_m_links_border_left);?>;
		border-style:solid;
		border-color:<?php echo esc_html($dtb_mobile_separator); ?>;
	}


	#dtb-m-menu ul.dtb-mobile-menu li li a {padding-left:<?php echo esc_html($dtb_mobile_padding_left+20);?>px;}

	#dtb-m-menu ul.dtb-mobile-menu li li li a {padding-left:<?php echo esc_html($dtb_mobile_padding_left+40);?>px;}
	<?php if ($m_m_links_align == 'center') { ?>
		
		.dtb_mobile #dtb-m-menu ul.dtb-mobile-menu li a {
			padding-left:10px!important;
			padding-right:10px!important;
		}
		#dtb-m-menu ul.dtb-mobile-menu .menu-item-has-children .sub-menu-toggle + a {
			padding-left:40px!important;
			padding-right:40px!important;}
	<?php } ?>
	
	<?php if ($dtb_mobile_nested == '1') { ?>
		.dtb-mobile-menu>li>.sub-menu-toggle {
			margin-right:<?php echo esc_attr($m_m_links_border_right);?>;
			margin-top:<?php echo esc_attr($m_m_links_border_top);?>
		}
		#dtb-m-menu .sub-menu-toggle {
			top:<?php echo esc_html($dtb_mobile_padding_top-((36-$dtb_mobile_font_size)/2));?>px;
		}
		#dtb-m-menu .dtb-mobile-menu li .sub-menu-toggle.popped~ul.sub-menu li a {
			background-color:<?php echo esc_html($dtb_mobile_submenu_bg);?>;
		}
	<?php } ?>	
	
	<?php if (($m_m_links_margin_bottom == '0') && ($m_m_links_border_bottom != '0px')) { ?>
	.dtb-mobile-menu>li:not(:first-child)>a {
    border-top: transparent!important;
    }
    <?php } ?>

	<?php if ($dtb_cta_link == '1') { ?>
		#dtb-m-menu .dtb-mobile-menu li.cta-link>a
		<?php if ($dtb_cta_link_type == 'first_item') echo ', .dtb_mobile #dtb-m-menu .dtb-mobile-menu>li:first-of-type>a'; elseif ($dtb_cta_link_type == 'last_item') echo ', .dtb_mobile #dtb-m-menu .dtb-mobile-menu>li:last-of-type>a'; ?>
		 {
			font-size:<?php echo esc_html($dtb_mobile_cta_font_size);?>px;
			color:<?php echo esc_html($dtb_mobile_cta_color)?>;
			background:<?php echo esc_html($dtb_mobile_cta_bg_color)?>;
			font-weight:<?php echo esc_html($dtb_mobile_cta_font_weight);?>;
			padding: <?php echo esc_attr($m_m_cta_padding_top . ' ' . $m_m_cta_padding_right . ' ' . $m_m_cta_padding_bottom .' '. $m_m_cta_padding_left);?>!important;
			<?php if ($dtb_mobile_cta_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($dtb_mobile_cta_tt); ?>; font-variant:normal;<?php } ?>
				letter-spacing:<?php echo esc_html($dtb_mobile_cta_lettersp);?>px;
			<?php if (($mobile_cta_font != '') || ($mobile_cta_font != 'none')) {?>
				font-family:<?php echo esc_html($mobile_cta_font); ?>;
			<?php } ?>
			text-align:<?php echo esc_html($m_m_cta_text_align); ?>;
			border-radius:<?php echo esc_html($m_m_cta_border_radius); ?>px;
			border:<?php echo esc_attr($m_m_cta_border_width . 'px ' . $m_m_cta_border_color . ' solid');?>!important;
			<?php if ($m_m_cta_shadow != '' ) { ?>
				box-shadow:<?php echo esc_html($m_m_cta_shadow_offset_x . 'px ' . $m_m_cta_shadow_offset_y . 'px ' . $m_m_cta_shadow_blur . 'px ' . $m_m_cta_shadow_color); ?>
			<?php } ?>
		}
		#dtb-m-menu .dtb-mobile-menu li.cta-link>a:hover
		<?php if ($dtb_cta_link_type == 'first_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:first-of-type>a:hover'; elseif ($dtb_cta_link_type == 'last_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:last-of-type>a:hover'; ?> {
			color:<?php echo esc_html($dtb_mobile_cta_color_hover)?>!important;
			background:<?php echo esc_html($dtb_mobile_cta_bg_color_hover)?>!important;
			border-color:<?php echo esc_attr($m_m_cta_border_color_hover);?>!important;
		}
		#dtb-m-menu .dtb-mobile-menu li.cta-link
		<?php if ($dtb_cta_link_type == 'first_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:first-of-type'; elseif ($dtb_cta_link_type == 'last_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:last-of-type'; ?> {
			margin: <?php echo esc_attr($m_m_cta_margin_top . ' ' . $m_m_cta_margin_right . ' ' . $m_m_cta_margin_bottom .' '. $m_m_cta_margin_left);?>;
			text-align:<?php echo esc_html($m_m_cta_align); ?>
		}
		<?php if ($m_m_cta_fullwidth != '1') { ?>
			#dtb-m-menu .dtb-mobile-menu li.cta-link>a
		<?php if ($dtb_cta_link_type == 'first_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:first-of-type>a'; elseif ($dtb_cta_link_type == 'last_item') echo ', #dtb-m-menu .dtb-mobile-menu>li:last-of-type>a'; ?> {
				display:inline-block;
			}
		<?php } ?>
	<?php } ?>			
				
}

@media (max-width:782px) {
	body.admin-bar:not(.et-fb) #dtb-m-menu {top:46px;}
}
@media (max-width:600px) {
	body.admin-bar:not(.et-fb) #dtb-m-menu {top:46px;}
}


@media (max-width:<?php echo esc_html($dtb_mobile_breakpoint);?>px) { 
	<?php if ($m_m_dim_background != '') { ?>
	.dtb-m-menu-overlay {transition:all 1s cubic-bezier(.23,.91,.23,.91); transition-delay:.2s; display:block; visibility:hidden; opacity:0; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background:transparent; z-index:100001;}
	.dtb-m-mobile-open .dtb-m-menu-overlay {visibility:visible; opacity:1; background: <?php echo esc_html($m_m_dim_color);?>; }
	<?php } ?>
	
	<?php if ($m_m_animation_page == '') { ?>
	/* ----------------------------------------------
	 * Generated by Animista
	 * Licensed under FreeBSD License.
	 * See http://animista.net/license for more info. 
	 * w: http://animista.net, t: @cssanimista
	 * ---------------------------------------------- */
	
		<?php if ($m_m_container_animation_in == 'fade') {?>
			@keyframes dtb-fade-in{0%{opacity:0}100%{opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-fade-in .6s cubic-bezier(.39,.575,.565,1.000) both}
		
		<?php } elseif ($m_m_container_animation_in == 'none') {?>		
			#dtb-m-menu.dtb-in {animation:none; opacity:1; visibility:visible;}
			
		<?php } elseif ($m_m_container_animation_in == 'scale') {?>		
			@keyframes dtb-scale-in{0%{transform:scale(0);opacity:1}100%{transform:scale(1);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-scale-in .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'scale_hor') {?>		
			@keyframes dtb-scale-in-hor{0%{transform:scaleX(0);opacity:1}100%{transform:scaleX(1);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-scale-in-hor .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'scale_ver') {?>		
			@keyframes dtb-scale-in-ver{0%{transform:scaleY(0);opacity:1}100%{transform:scaleY(1);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-scale-in-ver .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'flip_hor') {?>		
			@keyframes dtb-flip-in-hor{0%{transform:rotateX(80deg);opacity:0}100%{transform:rotateX(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-flip-in-hor .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'flip_ver') {?>		
			@keyframes dtb-flip-in-ver{0%{transform:rotateY(80deg);opacity:0}100%{transform:rotateY(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-flip-in-ver .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'flip_diag') {?>		
			@keyframes dtb-flip-in-diag{0%{transform:rotate3d(1,1,0,80deg);opacity:0}100%{transform:rotate3d(1,1,0,0deg);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-flip-in-diag .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'slide_top') {?>		
			@keyframes dtb-slide-in-top{0%{transform:translateY(-1000px);opacity:0}100%{transform:translateY(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-slide-in-top .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'slide_right') {?>		
			@keyframes dtb-slide-in-right{0%{transform:translateX(1000px);opacity:0}100%{transform:translateX(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-slide-in-right .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'slide_bottom') {?>	
			@keyframes dtb-slide-in-bottom{0%{transform:translateY(1000px);opacity:0}100%{transform:translateY(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'slide_left') {?>		
			@keyframes dtb-slide-in-left{0%{transform:translateX(-1000px);opacity:0}100%{transform:translateX(0);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-slide-in-left .5s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'bounce_top') {?>		
			@keyframes dtb-bounce-in-top{0%{transform:translateY(-500px);animation-timing-function:ease-in;opacity:0}38%{transform:translateY(0);animation-timing-function:ease-out;opacity:1}55%{transform:translateY(-65px);animation-timing-function:ease-in}72%{transform:translateY(0);animation-timing-function:ease-out}81%{transform:translateY(-28px);animation-timing-function:ease-in}90%{transform:translateY(0);animation-timing-function:ease-out}95%{transform:translateY(-8px);animation-timing-function:ease-in}100%{transform:translateY(0);animation-timing-function:ease-out;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-bounce-in-top 1.1s both}
		
		<?php } elseif ($m_m_container_animation_in == 'bounce_right') {?>		
			@keyframes dtb-bounce-in-right{0%{transform:translateX(600px);animation-timing-function:ease-in;opacity:0}38%{transform:translateX(0);animation-timing-function:ease-out;opacity:1}55%{transform:translateX(68px);animation-timing-function:ease-in}72%{transform:translateX(0);animation-timing-function:ease-out}81%{transform:translateX(32px);animation-timing-function:ease-in}90%{transform:translateX(0);animation-timing-function:ease-out}95%{transform:translateX(8px);animation-timing-function:ease-in}100%{transform:translateX(0);animation-timing-function:ease-out;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-bounce-in-right 1.1s both}
		
		<?php } elseif ($m_m_container_animation_in == 'bounce_bottom') {?>		
			@keyframes dtb-bounce-in-bottom{0%{transform:translateY(500px);animation-timing-function:ease-in;opacity:0}38%{transform:translateY(0);animation-timing-function:ease-out;opacity:1}55%{transform:translateY(65px);animation-timing-function:ease-in}72%{transform:translateY(0);animation-timing-function:ease-out}81%{transform:translateY(28px);animation-timing-function:ease-in}90%{transform:translateY(0);animation-timing-function:ease-out}95%{transform:translateY(8px);animation-timing-function:ease-in}100%{transform:translateY(0);animation-timing-function:ease-out;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-bounce-in-bottom 1.1s both}
		
		<?php } elseif ($m_m_container_animation_in == 'bounce_left') {?>	
			@keyframes dtb-bounce-in-left{0%{transform:translateX(-600px);animation-timing-function:ease-in;opacity:0}38%{transform:translateX(0);animation-timing-function:ease-out;opacity:1}55%{transform:translateX(-68px);animation-timing-function:ease-in}72%{transform:translateX(0);animation-timing-function:ease-out}81%{transform:translateX(-28px);animation-timing-function:ease-in}90%{transform:translateX(0);animation-timing-function:ease-out}95%{transform:translateX(-8px);animation-timing-function:ease-in}100%{transform:translateX(0);animation-timing-function:ease-out;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-bounce-in-left 1.1s both}
		
			
		<?php } elseif ($m_m_container_animation_in == 'tilt_top') {?>	
			@keyframes dtb-tilt-in-top{0%{transform:rotateY(-30deg) translateY(-300px) skewY(30deg);opacity:0}100%{transform:rotateY(0deg) translateY(0) skewY(0deg);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-tilt-in-top .7s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'tilt_bottom') {?>		
			@keyframes dtb-tilt-in-bottom{0%{transform:rotateY(-30deg) translateY(300px) skewY(30deg);opacity:0}100%{transform:rotateY(0deg) translateY(0) skewY(0deg);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-tilt-in-bottom .7s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'tilt_right') {?>		
			@keyframes dtb-tilt-in-right{0%{transform:rotateX(-30deg) translateX(300px) skewX(30deg);opacity:0}100%{transform:rotateX(0deg) translateX(0) skewX(0deg);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-tilt-in-right .7s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'tilt_left') {?>		
			@keyframes dtb-tilt-in-left{0%{transform:rotateX(-30deg) translateX(-300px) skewX(-30deg);opacity:0}100%{transform:rotateX(0deg) translateX(0) skewX(0deg);opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-tilt-in-left .7s cubic-bezier(.25,.46,.45,.94) both}
		
		<?php } elseif ($m_m_container_animation_in == 'swing_top') {?>		
			@keyframes dtb-swing-in-top{0%{transform:rotateX(-100deg);transform-origin:top;opacity:0}100%{transform:rotateX(0deg);transform-origin:top;opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-swing-in-top .7s cubic-bezier(.175,.885,.32,1.275) both}
		
		<?php } elseif ($m_m_container_animation_in == 'swing_right') {?>		
			@keyframes dtb-swing-in-right{0%{transform:rotateY(-100deg);transform-origin:right;opacity:0}100%{transform:rotateY(0);transform-origin:right;opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-swing-in-right .7s cubic-bezier(.175,.885,.32,1.275) both}
		
		<?php } elseif ($m_m_container_animation_in == 'swing_bottom') {?>		
			@keyframes dtb-swing-in-bottom{0%{transform:rotateX(100deg);transform-origin:bottom;opacity:0}100%{transform:rotateX(0);transform-origin:bottom;opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-swing-in-bottom .7s cubic-bezier(.175,.885,.32,1.275) both}
		
		<?php } elseif ($m_m_container_animation_in == 'swing_left') {?>		
			@keyframes dtb-swing-in-left{0%{transform:rotateY(100deg);transform-origin:left;opacity:0}100%{transform:rotateY(0);transform-origin:left;opacity:1;visibility:visible;}}
			#dtb-m-menu.dtb-in {animation:dtb-swing-in-left .7s cubic-bezier(.175,.885,.32,1.275) both}
		<?php } ?>
		
		#dtb-m-menu.dtb-in {visibility:visible; opacity:1;}
		
		<?php if ($m_m_container_animation_out == 'fade') {?>
		@keyframes dtb-fade-out {0%{opacity:1}100%{opacity:0;visibility:hidden}}
		#dtb-m-menu.dtb-out {animation:dtb-fade-out .5s ease-out both}
		
		<?php } elseif ($m_m_container_animation_out == 'none') {?>		
			#dtb-m-menu.dtb-out {animation:none; opacity:0; visibility:hidden;}
			#dtb-m-menu.dtb-out * {animation:none!important; transition:none!important;}
			
		<?php } elseif ($m_m_container_animation_out == 'scale') {?>	
			@keyframes dtb-scale-out-center{0%{transform:scale(1);opacity:1}100%{transform:scale(0);opacity:1;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-scale-out-center .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'scale_ver') {?>	
			@keyframes dtb-scale-out-vertical{0%{transform:scaleY(1);opacity:1}100%{transform:scaleY(0);opacity:1;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-scale-out-vertical .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'scale_hor') {?>	
			@keyframes dtb-scale-out-horizontal{0%{transform:scaleX(1);opacity:1}100%{transform:scaleX(0);opacity:1;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-scale-out-horizontal .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'flip_hor') {?>	
			@keyframes dtb-flip-out-hor{0%{transform:rotateX(0);opacity:1}100%{transform:rotateX(70deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-flip-out-hor .45s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'flip_ver') {?>	
			@keyframes dtb-flip-out-ver{0%{transform:rotateY(0);opacity:1}100%{transform:rotateY(70deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-flip-out-ver .45s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'flip_diag') {?>	
			@keyframes dtb-flip-out-diag{0%{transform:rotate3d(1,1,0,0deg);opacity:1}100%{transform:rotate3d(1,1,0,70deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-flip-out-diag .45s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'slide_top') {?>	
			@keyframes dtb-slide-out-top{0%{transform:translateY(0);opacity:1}100%{transform:translateY(-1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-slide-out-top .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'slide_right') {?>		
			@keyframes dtb-slide-out-right{0%{transform:translateX(0);opacity:1}100%{transform:translateX(1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-slide-out-right .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'slide_bottom') {?>		
			@keyframes dtb-slide-out-bottom{0%{transform:translateY(0);opacity:1}100%{transform:translateY(1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-slide-out-bottom .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'slide_left') {?>		
			@keyframes dtb-slide-out-left{0%{transform:translateX(0);opacity:1}100%{transform:translateX(-1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-slide-out-left .5s cubic-bezier(.55,.085,.68,.53) both}
		
		<?php } elseif ($m_m_container_animation_out == 'bounce_top') {?>		
			@keyframes dtb-bounce-out-top{0%{transform:translateY(0);animation-timing-function:ease-out}5%{transform:translateY(-30px);animation-timing-function:ease-in}15%{transform:translateY(0);animation-timing-function:ease-out}25%{transform:translateY(-38px);animation-timing-function:ease-in}38%{transform:translateY(0);animation-timing-function:ease-out}52%{transform:translateY(-75px);animation-timing-function:ease-in}70%{transform:translateY(0);animation-timing-function:ease-out}85%{opacity:1}100%{transform:translateY(-800px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-bounce-out-top 1.5s both}
		
		<?php } elseif ($m_m_container_animation_out == 'bounce_right') {?>		
			@keyframes dtb-bounce-out-right{0%{transform:translateX(0);animation-timing-function:ease-out}5%{transform:translateX(30px);animation-timing-function:ease-in}15%{transform:translateX(0);animation-timing-function:ease-out}25%{transform:translateX(38px);animation-timing-function:ease-in}38%{transform:translateX(0);animation-timing-function:ease-out}52%{transform:translateX(80px);animation-timing-function:ease-in}65%{transform:translateX(0);animation-timing-function:ease-out}85%{opacity:1}100%{transform:translateX(1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-bounce-out-right 1.5s both}
		
		<?php } elseif ($m_m_container_animation_out == 'bounce_bottom') {?>		
			@keyframes dtb-bounce-out-bottom{0%{transform:translateY(0);animation-timing-function:ease-out}5%{transform:translateY(30px);animation-timing-function:ease-in}15%{transform:translateY(0);animation-timing-function:ease-out}25%{transform:translateY(38px);animation-timing-function:ease-in}38%{transform:translateY(0);animation-timing-function:ease-out}52%{transform:translateY(75px);animation-timing-function:ease-in}70%{transform:translateY(0);animation-timing-function:ease-out}85%{opacity:1}100%{transform:translateY(800px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-bounce-out-bottom 1.5s both}
		
		<?php } elseif ($m_m_container_animation_out == 'bounce_left') {?>		
			@keyframes dtb-bounce-out-left{0%{transform:translateX(0);animation-timing-function:ease-out}5%{transform:translateX(-30px);animation-timing-function:ease-in}15%{transform:translateX(0);animation-timing-function:ease-out}25%{transform:translateX(-38px);animation-timing-function:ease-in}38%{transform:translateX(0);animation-timing-function:ease-out}52%{transform:translateX(-80px);animation-timing-function:ease-in}70%{transform:translateX(0);animation-timing-function:ease-out}85%{opacity:1}100%{transform:translateX(-1000px);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-bounce-out-left 1.5s both}
		
		
		<?php } elseif ($m_m_container_animation_out == 'tilt_top') {?>	
			@keyframes dtb-tilt-out-top{0%{transform:rotateY(0deg) translateY(0) skewY(0deg);opacity:1}100%{transform:rotateY(30deg) translateY(-300px) skewY(-30deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-tilt-out-top .7s cubic-bezier(.94,.45,.46,.25) both}
		
		<?php } elseif ($m_m_container_animation_out == 'tilt_bottom') {?>		
			@keyframes dtb-tilt-out-bottom{0%{transform:rotateY(0deg) translateY(0) skewY(0deg);opacity:1}100%{transform:rotateY(30deg) translateY(300px) skewY(-30deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-tilt-out-bottom .7s cubic-bezier(.94,.45,.46,.25) both}
		
		<?php } elseif ($m_m_container_animation_out == 'tilt_right') {?>		
			@keyframes dtb-tilt-out-right{0%{transform:rotateX(0deg) translateX(0) skewX(0deg);opacity:1}100%{transform:rotateX(30deg) translateX(300px) skewX(30deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-tilt-out-right .7s cubic-bezier(.94,.45,.46,.25) both}
		
		<?php } elseif ($m_m_container_animation_out == 'tilt_left') {?>		
			@keyframes dtb-tilt-out-left{0%{transform:rotateX(0deg) translateX(0) skewX(0deg);opacity:1}100%{transform:rotateX(30deg) translateX(-300px) skewX(-30deg);opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-tilt-out-left .7s cubic-bezier(.94,.45,.46,.25) both}
		
		<?php } elseif ($m_m_container_animation_out == 'swing_top') {?>		
			@keyframes dtb-swing-out-top{0%{transform:rotateX(0deg);transform-origin:top;opacity:1}100%{transform:rotateX(-100deg);transform-origin:top;opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-swing-out-top .45s cubic-bezier(.6,-.28,.735,.045) both}
		
		<?php } elseif ($m_m_container_animation_out == 'swing_right') {?>	
			@keyframes dtb-swing-out-right{0%{transform:rotateY(0);transform-origin:right;opacity:1}100%{transform:rotateY(-100deg);transform-origin:right;opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-swing-out-right .45s cubic-bezier(.6,-.28,.735,.045) both}
		
		<?php } elseif ($m_m_container_animation_out == 'swing_bottom') {?>	
			@keyframes dtb-swing-out-bottom{0%{transform:rotateX(0);transform-origin:bottom;opacity:1}100%{transform:rotateX(100deg);transform-origin:bottom;opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-swing-out-bottom .45s cubic-bezier(.6,-.28,.735,.045) both}
		
		<?php } elseif ($m_m_container_animation_out == 'swing_left') {?>	
			@keyframes dtb-swing-out-left{0%{transform:rotateY(0);transform-origin:left;opacity:1}100%{transform:rotateY(100deg);transform-origin:left;opacity:0;visibility:hidden;}}
			#dtb-m-menu.dtb-out {animation:dtb-swing-out-left .45s cubic-bezier(.6,-.28,.735,.045) both}
		<?php } ?>
		
	
	<?php } ?>
	
	
	
	
	
	<?php if ($m_m_animation_page != '') { ?>
	.dtb-body-wrapper {
		top:0; left:0;
		width: 100%;
		height: 100%; overflow-x: hidden; overflow-y: inherit;
	}
	body:not(.et-tb-has-header) .dtb-body-wrapper,
	body:not(.et-fb) .dtb-body-wrapper {
		/*position:absolute;*/
	}
	.dtb-page-container {
		backface-visibility: hidden;
		opacity:1; visibility: visible; position: relative;
	}
	
	#page-container{	
	}
	
	#dtb-m-menu { 
		visibility: hidden;
		overflow: hidden;
		backface-visibility: hidden;
		opacity:1;
		position: fixed; -webkit-perspective:1200px; -webkit-backface-visibility:none;
	}
	
	
	.dtb-page-container.noanimation {animation: none!important;}

	
	
	<?php if ($m_m_animation_type == 'move_left') {?>
		#dtb-m-menu {left:auto; right:-<?php echo esc_html($moveValue)?>; visibility:visible; }	
	<?php } elseif ($m_m_animation_type == 'move_right') {?>
		#dtb-m-menu {right:auto; left:-<?php echo esc_html($moveValue)?>; visibility:visible;}	
	<?php } elseif ($m_m_animation_type == 'move_bottom') {?>
		#dtb-m-menu {right:0; left:0; bottom:auto; width:100%; height:auto; visibility:visible;  max-width:100%;}
		#dtb-m-menu .menu-wrapper {height:auto; max-height:100vh;}
		#wpadminbar {z-index:100007;}
	<?php } elseif ($m_m_animation_type == 'move_top') {?>
		#dtb-m-menu {right:0; left:0; top:auto; width:100%; height:auto; visibility:visible;  max-width:100%;}
		#dtb-m-menu .menu-wrapper {height:auto; max-height:100vh;}
	<?php } ?>
	
	
	#dtb-m-menu.dtb-mobile-opacity {opacity:1;}
	
	<?php } ?>


} /* end m query */

@media (min-width:<?php echo esc_html($dtb_mobile_breakpoint+1);?>px) {
	#dtb-m-menu, #dtb-m-menu.dtb-in {visibility:hidden; opacity:0; display:none}

}

<?php if ($m_m_hamburger_show == '1')  { ?>
	#dtb-m-menu .mobile_menu_bar {
		position:absolute;
		display:block;
		<?php if ($m_m_hamburger_margin_top != '')  { ?>
			top:<?php echo esc_attr($m_m_hamburger_margin_top);?>;
		<?php } ?>
		<?php if ($m_m_hamburger_margin_bottom != '')  { ?>
			bottom:<?php echo esc_attr($m_m_hamburger_margin_bottom);?>;
		<?php } ?>
		<?php if ($m_m_hamburger_align == 'right')  { ?>
			right:<?php echo esc_attr($m_m_hamburger_margin_right);?>;
			left:auto;
		<?php } ?>
		<?php if ($m_m_hamburger_align == 'left')  { ?>
			left:<?php echo esc_attr($m_m_hamburger_margin_left);?>;
			right:auto;
		<?php } ?>
		<?php if ($m_m_hamburger_align == 'center')  { ?>
			left:0;
			transform:<?php if ($dtb_hamburger_size == 'large') :echo 'scale(1.5)'; endif; ?> translateX(<?php echo esc_attr($m_m_hamburger_margin_left);?>) translateX(<?php echo esc_attr(- $m_m_hamburger_margin_right);?>) translateY(<?php echo esc_attr(- $m_m_hamburger_margin_bottom);?>);
			right:0;
			margin: 0 auto;
		<?php } ?>
	}
	#dtb-m-menu .mobile_menu_bar.hamburger_menu_icon-toggled:before {content: '\4d';}
<?php } ?>
<?php if ($m_m_hamburger_show == '')  { ?>
	#dtb-m-menu .mobile_menu_bar {
		display:none;
	}
<?php } ?>
body:not(.custom-hamburger-icon) .mobile_menu_bar:before {color:<?php echo esc_html($dtb_hamburger_color);?>;}
body:not(.custom-hamburger-icon) .mobile_menu_bar:hover:before {color:<?php echo esc_html($dtb_hamburger_color_hover);?>}
body:not(.custom-hamburger-icon) .opened .mobile_menu_bar:before {color:<?php echo esc_html($dtb_hamburger_color_open);?>;}
body:not(.custom-hamburger-icon) .opened .mobile_menu_bar:hover:before {color:<?php echo esc_html($dtb_hamburger_color_open_hover);?>;}


<?php if ($m_mobile_elements_logo == '1')  { ?>
	#dtb-m-menu .dtb-m-logo-wrap {
		width: 100%;
		padding:<?php echo esc_attr($m_m_logo_margin_top . ' ' . $m_m_logo_margin_right . ' ' . $m_m_logo_margin_bottom . ' ' . $m_m_logo_margin_left);?>;
		text-align:<?php echo esc_attr($m_m_logo_align);?>;
		}
	#dtb-m-menu .dtb-m-logo {
		display:inline-block;
		width:<?php echo esc_html($m_m_logo_width);?>px;
		max-width:<?php echo esc_html($m_m_logo_width);?>%;
	}
<?php } ?>

<?php if ($m_mobile_elements_search == '1')  { ?>
	#dtb-m-menu .dtb-m-search-wrap {
		width: 100%;
		padding:<?php echo esc_attr($m_m_search_margin_top . ' ' . $m_m_search_margin_right . ' ' . $m_m_search_margin_bottom . ' ' . $m_m_search_margin_left);?>;
		text-align:<?php echo esc_attr($m_m_search_align);?>;
	}
	#dtb-m-menu .dtb-m-search-wrap .dtb-m-search {
		width:<?php echo esc_html($m_m_search_width);?>px;
		max-width:<?php echo esc_html($m_m_search_max_width);?>%;	
		display:inline-block;
	}
	#dtb-m-menu .dtb-m-search-wrap form {
		display:flex;
		align-items:center;
		width:100%;
	}
	#dtb-m-menu .dtb-m-search-wrap input[type=search] {
		background-color:<?php echo esc_html($m_m_search_bg_color);?>;
		padding:<?php echo esc_html($m_m_search_padding_vert . 'px ' . $m_m_search_padding_hor . 'px'); ?>;
		font-weight:<?php echo esc_html($m_m_search_font_weight);?>;
		font-size:<?php echo esc_html($m_m_search_font_size);?>px;
		color:<?php echo esc_html($m_m_search_font_color);?>;
		<?php if ($m_m_search_font != '') : echo esc_html('font-family:' . $m_m_search_font . ';'); endif; ?>
		border: <?php echo esc_html($m_m_search_border_width);?>px <?php echo esc_html($m_m_search_border_color);?> solid;
		border-radius: <?php echo esc_html($m_m_search_border_radius);?>px;
		letter-spacing: <?php echo esc_html($m_m_search_lettersp);?>px;
		<?php if ($m_m_search_tt == 'small-caps') : echo 'text-transform:none; font-variant:small-caps;'; else : echo esc_html('text-transform:' . $m_m_search_tt . ';'); endif;?>
		width:inherit;
		transition: all .3s ease-in-out;
	}
	#dtb-m-menu .dtb-m-search-wrap input[type=search]:active,
	#dtb-m-menu .dtb-m-search-wrap input[type=search]:focus {
		background-color:<?php echo esc_html($m_m_search_bg_color_focus);?>;
		border-color:<?php echo esc_html($m_m_search_border_color_focus);?>;
	}
	#dtb-m-menu .dtb-m-search-wrap input[type=search]::placeholder {
		color:<?php echo esc_html($m_m_search_font_color_placeholder);?>;
	}

	#dtb-m-menu .dtb-m-search-wrap button[type=submit] {
		font-family:ETModules;
		display:block;
		border:none;
		border-radius:<?php echo esc_html($m_m_search_icon_border_radius)?>px;
		margin-left:<?php echo esc_html($m_m_search_icon_margin)?>px;
		background-color:<?php echo esc_html($m_m_search_icon_bg_color)?>;
		display:inline-block;
		text-align:center;
		width:<?php echo esc_html(($m_m_search_icon_padding*2)+($m_m_search_icon_font))?>px;
		height:<?php echo esc_html(($m_m_search_icon_padding*2)+($m_m_search_icon_font))?>px;
		line-height:<?php echo esc_html(($m_m_search_icon_padding*2)+($m_m_search_icon_font))?>px;
		position:relative;
		padding:0;
		transition: all .3s ease-in-out;
		
	}
	#dtb-m-menu .dtb-m-search-wrap button[type=submit]:before {
		content:'\55';
		font-family:"ETmodules";
		font-size:<?php echo esc_html($m_m_search_icon_font)?>px;
		color:<?php echo esc_html($m_m_search_icon_font_color)?>;
		position: absolute; 
		left:0;
		top:0;
		right:0;
	}

<?php } ?>


<?php if ($m_mobile_elements_widgets == '1')  { ?>
	#dtb-m-menu .dtb-m-widget {
		margin:<?php echo esc_attr($m_m_widgets_margin_top . ' ' . $m_m_widgets_margin_right . ' ' . $m_m_widgets_margin_bottom . ' ' . $m_m_widgets_margin_left);?>;
	}
	#dtb-m-menu .widgettitle {
		text-align:<?php echo esc_attr($m_m_widgets_title_align);?>;
		font-weight:<?php echo esc_html($m_m_widgets_title_font_weight);?>;
		font-size:<?php echo esc_html($m_m_widgets_title_font_size);?>px;
		color:<?php echo esc_html($m_m_widgets_title_color);?>;
		<?php if ($m_m_widgets_title_font != '') : echo esc_html('font-family:' . $m_m_widgets_title_font . ';'); endif; ?>
		letter-spacing: <?php echo esc_html($m_m_widgets_title_lettersp);?>px;
		<?php if ($m_m_widgets_title_tt == 'small-caps') : echo 'text-transform:none; font-variant:small-caps;'; else : echo esc_html('text-transform:' . $m_m_widgets_title_tt . ';'); endif;?>
	}

<?php } ?>


<?php if ($m_mobile_elements_cart == '1')  { ?>
	#dtb-m-menu .et-cart-info {
		display:block;
		transition: all .3s ease-in-out;
		margin:<?php echo esc_attr($m_m_shop_link_margin_top . ' ' . $m_m_shop_link_margin_right . ' ' . $m_m_shop_link_margin_bottom . ' ' . $m_m_shop_link_margin_left);?>;
		padding:<?php echo esc_attr($m_m_shop_link_padding_top . ' ' . $m_m_shop_link_padding_right . ' ' . $m_m_shop_link_padding_bottom . ' ' . $m_m_shop_link_padding_left);?>;
		border: <?php echo esc_html($m_m_shop_link_border_width);?>px <?php echo esc_html($m_m_shop_link_border_color);?> solid;
		border-radius:<?php echo esc_html($m_m_shop_link_border_radius)?>px;
		<?php if ($m_m_shop_link_font != '') : echo esc_html('font-family:' . $m_m_shop_link_font . ';'); endif; ?>
		font-size:<?php echo esc_html($m_m_shop_link_font_size);?>px;
		background-color:<?php echo esc_html($m_m_shop_link_bg_color);?>;
		color:<?php echo esc_html($m_m_shop_link_color);?>;
		text-align:<?php echo esc_attr($m_m_shop_link_align);?>;	
	}
	#dtb-m-menu .et-cart-info span {
		<?php if ($m_m_shop_link_tt == 'small-caps') : echo 'text-transform:none; font-variant:small-caps;'; else : echo esc_html('text-transform:' . $m_m_shop_link_tt . ';'); endif;?>
		font-weight:<?php echo esc_html($m_m_shop_link_font_weight);?>;
		letter-spacing: <?php echo esc_html($m_m_shop_link_lettersp);?>px;
	}
	#dtb-m-menu .et-cart-info span:before {
		margin-right:10px;
	}
	#dtb-m-menu .et-cart-info span:before {
		transition: all .3s ease-in-out;
		font-size:<?php echo esc_html($m_m_shop_link_icon_size);?>px;
		color:<?php echo esc_html($m_m_shop_icon_color);?>;
	}
	#dtb-m-menu .et-cart-info:hover {
		color:<?php echo esc_html($m_m_shop_link_color_hover);?>;
		background-color:<?php echo esc_html($m_m_shop_bg_color_hover);?>;
		border-color:<?php echo esc_html($m_m_shop_border_color_hover);?>;
		
	}
	#dtb-m-menu .et-cart-info:hover span:before {
		font-weight:400;
		color:<?php echo esc_html($m_m_shop_icon_color_hover);?>;
		
	}
<?php }