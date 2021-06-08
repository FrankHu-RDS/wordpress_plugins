<?php

$m_m_trigger_position = get_option('dtb_customize_m_m_trigger_position', 'top');
$m_m_trigger_align = get_theme_mod('dtb_modcustomize_m_m_trigger_align', 'right');
$m_m_trigger_container_margin_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_container_margin_top', '5px'));
$m_m_trigger_container_margin_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_container_margin_right', '20px'));
$m_m_trigger_container_margin_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_container_margin_bottom', ''));
$m_m_trigger_container_margin_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_container_margin_left', ''));
$m_m_trigger_width = get_option('dtb_customize_m_m_trigger_width', '50');
$m_m_trigger_height = get_option('dtb_customize_m_m_trigger_height', '50');
$m_m_trigger_bg_color = get_option('dtb_customize_m_m_trigger_bg_color', 'rgba(255,255,255,0.9)');
$m_m_trigger_bg_color_hover = get_option('dtb_customize_m_m_trigger_bg_color_hover', '#fff');
$m_m_trigger_bg_color_open = get_option('dtb_customize_m_m_trigger_bg_color_open', '#fff');
$m_m_trigger_bg_color_hover_open = get_option('dtb_customize_m_m_trigger_bg_color_hover_open', '#fff');
$m_m_trigger_add_text = get_theme_mod('dtb_modcustomize_m_m_trigger_add_text', '');
$m_m_trigger_text_position = get_option('dtb_customize_m_m_trigger_text_position', 'right');
$m_m_trigger_text = get_theme_mod('dtb_modcustomize_m_m_trigger_text', 'MENU');

$m_m_trigger_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_trigger_font')));
$m_m_trigger_font_weight = get_option('dtb_customize_m_m_trigger_font_weight', '400');
$m_m_trigger_font_size = get_option('dtb_customize_m_m_trigger_font_size', '15');
$m_m_trigger_font_lettersp = get_option('dtb_customize_m_m_trigger_font_lettersp', '0');
$m_m_trigger_txt_color = get_option('dtb_customize_m_m_trigger_txt_color', '#000');
$m_m_trigger_txt_color_hover = get_option('dtb_customize_m_m_trigger_txt_color_hover', '#000');
$m_m_trigger_txt_color_open = get_option('dtb_customize_m_m_trigger_txt_color_open', '#000');
$m_m_trigger_txt_color_hover_open = get_option('dtb_customize_m_m_trigger_txt_color_hover_open', '#000');
$m_m_trigger_border_top = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_border_top', ''));
$m_m_trigger_border_right = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_border_right', ''));
$m_m_trigger_border_bottom = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_border_bottom', ''));
$m_m_trigger_border_left = add_unit(get_theme_mod('dtb_modcustomize_m_m_trigger_border_left', ''));
$m_m_trigger_border_radius = get_option('dtb_customize_m_m_trigger_border_radius', '3');
$m_m_trigger_border_color = get_option('dtb_customize_m_m_trigger_border_color', '#fff');
$m_m_trigger_border_color_hover = get_option('dtb_customize_m_m_trigger_border_color_hover', '#fff');
$m_m_trigger_border_color_open = get_option('dtb_customize_m_m_trigger_border_color_open', '#fff');
$m_m_trigger_border_color_hover_open = get_option('dtb_customize_m_m_trigger_border_color_hover_open', '#fff');
$m_m_trigger_shadow = get_theme_mod('dtb_modcustomize_m_m_trigger_shadow', '');
$m_m_trigger_shadow_color = get_option('dtb_customize_m_m_trigger_shadow_color', 'rgba(0,0,0,0.15)');
$m_m_trigger_shadow_color_open = get_option('dtb_customize_m_m_trigger_shadow_color_open', 'rgba(0,0,0,0)');
$m_m_trigger_shadow = get_theme_mod('dtb_modcustomize_m_m_trigger_shadow', '');
$m_m_trigger_shadow_offset_x = get_option('dtb_customize_m_m_trigger_shadow_offset_x', '2');
$m_m_trigger_shadow_offset_y = get_option('dtb_customize_m_m_trigger_shadow_offset_y', '10');
$m_m_trigger_shadow_blur = get_option('dtb_customize_m_m_trigger_shadow_blur', '30');
	
?>
	
	
.dtb-m-menu-trigger  {
	position:fixed;
	z-index:100005;
	<?php if ($m_m_trigger_position == 'top')  { ?>
		top:<?php echo esc_html($m_m_trigger_container_margin_top);?>;
		bottom:auto;
	<?php } ?>
	<?php if ($m_m_trigger_position == 'bottom')  { ?>
		top:auto;
		bottom:<?php echo esc_html($m_m_trigger_container_margin_bottom);?>;
	<?php } ?>
	<?php if ($m_m_trigger_align == 'left')  { ?>
		left:<?php echo esc_html($m_m_trigger_container_margin_left);?>;
		right:auto;
	<?php } ?>
	<?php if ($m_m_trigger_align == 'right')  { ?>
		left:auto;
		right:<?php echo esc_html($m_m_trigger_container_margin_right);?>;
	<?php } ?>
	<?php if ($m_m_trigger_align == 'center')  { ?>
		left:50%;
		right:auto;
		margin-left:<?php echo esc_attr($m_m_trigger_width / -2)?>px;
	<?php } ?>
	cursor:pointer;
	
}

.dtb-m-menu-trigger .mobile_menu_bar {
	width:<?php echo esc_attr($m_m_trigger_width)?>px;
	height:<?php echo esc_attr($m_m_trigger_height)?>px;
	background-color:<?php echo esc_attr($m_m_trigger_bg_color)?>;
	display:flex;
	align-items:center;
	justify-content:center;
	transition: all .3s ease-in-out;
	
	<?php if ($m_m_trigger_text_position == 'left')  { ?>
		flex-direction: row-reverse;
	<?php } elseif ($m_m_trigger_text_position == 'above') { ?>
		flex-direction: column-reverse;
	<?php } elseif ($m_m_trigger_text_position == 'below') { ?>
		flex-direction: column;
	<?php } elseif ($m_m_trigger_text_position == 'right') { ?>
		flex-direction: row;
	<?php } ?>
	border-style:solid;
	border-width:<?php echo esc_attr($m_m_trigger_border_top . ' ' . $m_m_trigger_border_right . ' ' . $m_m_trigger_border_bottom . ' ' . $m_m_trigger_border_left);?>;
	border-color:<?php echo esc_attr($m_m_trigger_border_color)?>;
	<?php if ($m_m_trigger_shadow != '' ) { ?>
		box-shadow:<?php echo esc_html($m_m_trigger_shadow_offset_x . 'px ' . $m_m_trigger_shadow_offset_y . 'px ' . $m_m_trigger_shadow_blur . 'px ' . $m_m_trigger_shadow_color); ?>;
	<?php } ?>
	border-radius:<?php echo esc_attr( $m_m_trigger_border_radius ); ?>px;
}
.dtb-m-menu-trigger .mobile_menu_bar:hover {
	background-color:<?php echo esc_attr($m_m_trigger_bg_color_hover)?>;
	border-color:<?php echo esc_attr($m_m_trigger_border_color_hover)?>;
}
.dtb-m-mobile-open .dtb-m-menu-trigger .mobile_menu_bar {
	background-color:<?php echo esc_attr($m_m_trigger_bg_color_open)?>;
	border-color:<?php echo esc_attr($m_m_trigger_border_color_open)?>;
	box-shadow:none;
	<?php if ($m_m_trigger_shadow != '' ) { ?>
		box-shadow:<?php echo esc_html($m_m_trigger_shadow_offset_x . 'px ' . $m_m_trigger_shadow_offset_y . 'px ' . $m_m_trigger_shadow_blur . 'px ' . $m_m_trigger_shadow_color_open); ?>;
	<?php } ?>
}
.dtb-m-mobile-open .dtb-m-menu-trigger .mobile_menu_bar:hover {
	background-color:<?php echo esc_attr($m_m_trigger_bg_color_hover_open)?>;
	border-color:<?php echo esc_attr($m_m_trigger_border_color_hover_open)?>;
}
.dtb-m-menu-trigger .mobile_menu_bar .dtb-hamburger {
	position:relative;
}
.dtb-m-menu-trigger .mobile_menu_bar:after {
	display:none;
}
<?php if ($m_m_trigger_add_text != '')  { ?>
	.dtb-m-menu-trigger .mobile_menu_bar:after {
		display:inline-block;
		content:'<?php echo esc_html($m_m_trigger_text);?>';
		color: <?php echo esc_attr( $m_m_trigger_txt_color )?>;
		font-weight:<?php echo esc_html($m_m_trigger_font_weight);?>;
		font-size:<?php echo esc_html($m_m_trigger_font_size);?>px;
		<?php if ($m_m_trigger_font != '') : echo esc_html('font-family:' . $m_m_trigger_font . ';'); endif; ?>
		letter-spacing: <?php echo esc_html($m_m_trigger_font_lettersp);?>px;
		line-height:1;
		padding:5px;
	}
	.dtb-m-menu-trigger:hover .mobile_menu_bar:after {
		color: <?php echo esc_attr( $m_m_trigger_txt_color_hover )?>;
	}
	.dtb-m-mobile-open .dtb-m-menu-trigger .mobile_menu_bar:after {
		color: <?php echo esc_attr( $m_m_trigger_txt_color_open )?>;
	}
	.dtb-m-mobile-open .dtb-m-menu-trigger:hover .mobile_menu_bar:after {
		color: <?php echo esc_attr( $m_m_trigger_txt_color_hover_open )?>;
	}

<?php } ?>



@media (max-width:782px) {
	.admin-bar .dtb-m-menu-trigger {transform:translateY(46px);}
}
@media (min-width:783px) {
	.admin-bar .dtb-m-menu-trigger {transform:translateY(32px);}
}
@media (min-width:<?php echo esc_html($dtb_mobile_breakpoint+1);?>px) {
	.dtb-m-menu-trigger {display:none;}
}