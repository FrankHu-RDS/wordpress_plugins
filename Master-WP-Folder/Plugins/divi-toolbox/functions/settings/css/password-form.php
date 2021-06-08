<?php

	$pass_form_bg_color = get_option('dtb_customize_pass_form_bg_color', 'rgba(255,255,255,0)');
	$pass_container_padding_top = add_unit(get_theme_mod('dtb_modcustomize_pass_container_padding_top', '80px'));
	$pass_container_padding_right = add_unit(get_theme_mod('dtb_modcustomize_pass_container_padding_right', ''));
	$pass_container_padding_bottom = add_unit(get_theme_mod('dtb_modcustomize_pass_container_padding_bottom', '80px'));
	$pass_container_padding_left = add_unit(get_theme_mod('dtb_modcustomize_pass_container_padding_left', ''));
	$pass_content_max_width = get_option('dtb_customize_pass_content_max_width', 1080);
	$pass_content_align = get_theme_mod('dtb_modcustomize_pass_content_align', 'left');
	$dtb_enable_password_image = dtb_get_option('dtb_enable_password_image');
	$pass_image_max_width = get_option('dtb_customize_pass_image_max_width', 300);
	$pass_image_padding = get_option('dtb_customize_pass_image_padding', 20);
	$pass_title_font_weight = get_option('dtb_customize_pass_title_font_weight', '700');
	$pass_title_font_size = get_option('dtb_customize_pass_title_font_size', 16);
	$pass_title_lettersp = get_option('dtb_customize_pass_title_lettersp', 0);
	$pass_title_tt = get_theme_mod('dtb_modcustomize_pass_title_tt', 'none');
	$pass_title_color = get_option('dtb_customize_pass_title_color', '#666666');
	$pass_message_font_weight = get_option('dtb_customize_pass_message_font_weight', '400');
	$pass_message_font_size = get_option('dtb_customize_pass_message_font_size', '15');
	$pass_message_lettersp = get_option('dtb_customize_pass_message_lettersp', '0');
	$pass_message_tt = get_theme_mod('dtb_modcustomize_pass_message_tt', 'none');
	$pass_message_color = get_option('dtb_customize_pass_message_color', '#666666');
	$pass_message_margin_bot = get_option('dtb_customize_pass_message_margin_bot', 30);
	$pass_input_max_width = get_option('dtb_customize_pass_input_max_width', 300);
	$pass_input_padding_ver = get_option('dtb_customize_pass_input_padding_ver', 10);
	$pass_input_padding_hor = get_option('dtb_customize_pass_input_padding_hor', 15);
	$pass_input_bg = get_option('dtb_customize_pass_input_bg', '#fff');
	$pass_input_bg_focus = get_option('dtb_customize_pass_input_bg_focus', '#fff');
	$pass_input_font_weight = get_option('dtb_customize_pass_input_font_weight', 400);
	$pass_input_font_size = get_option('dtb_customize_pass_input_font_size', 15);
	$pass_input_lettersp = get_option('dtb_customize_pass_input_lettersp', 0);
	$pass_input_tt = get_theme_mod('dtb_modcustomize_pass_input_tt', 'none');
	$pass_input_color = get_option('dtb_customize_pass_input_color', '#666666');
	$pass_input_placeholder = get_option('dtb_customize_pass_input_placeholder', 'rgba(0,0,0,0.3)');
	$pass_input_border_width = get_option('dtb_customize_pass_input_border_width', 1);
	$pass_input_border_radius = get_option('dtb_customize_pass_input_border_radius', 3);
	$pass_input_border_color = get_option('dtb_customize_pass_input_border_color', 'rgba(0,0,0,0.1)');
	$pass_input_border_focus = get_option('dtb_customize_pass_input_border_focus', 'rgba(0,0,0,0.3)');
	$pass_button_padding_ver = get_option('dtb_customize_pass_button_padding_ver', 10);
	$pass_button_padding_hor = get_option('dtb_customize_pass_button_padding_hor', 15);
	$pass_button_bg = get_option('dtb_customize_pass_button_bg', '#00b5cf');
	$pass_button_bg_hover = get_option('dtb_customize_pass_button_bg_hover', '#00b5cf');
	$pass_button_font_weight = get_option('dtb_customize_pass_button_font_weight', '700');
	$pass_button_font_size = get_option('dtb_customize_pass_button_font_size', 15);
	$pass_button_lettersp = get_option('dtb_customize_pass_button_lettersp', 0);
	$pass_button_tt = get_theme_mod('dtb_modcustomize_pass_button_tt', 'none');
	$pass_button_color = get_option('dtb_customize_pass_button_color', '#fff');
	$pass_button_color_hover = get_option('dtb_customize_pass_button_color_hover', '#ffffff');
	$pass_button_border_width = get_option('dtb_customize_pass_button_border_width', 0);
	$pass_button_border_radius = get_option('dtb_customize_pass_button_border_radius', 3);
	$pass_button_border_color = get_option('dtb_customize_pass_button_border_color', 'rgba(0,0,0,0)');
	$pass_button_border_hover = get_option('dtb_customize_pass_button_border_hover', 'rgba(0,0,0,0)');
	
	$pass_title_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_title_font')));
	$pass_message_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_message_font')));
	$pass_input_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_input_font')));
	$pass_button_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_button_font')));
	
?>


#dtb-password-protected {
	background-color:<?php echo esc_html($pass_form_bg_color);?>;
	display:flex;
	align-items:center;
	justify-content:center;
	padding:<?php echo esc_attr($pass_container_padding_top . ' ' . $pass_container_padding_right . ' ' . $pass_container_padding_bottom . ' ' . $pass_container_padding_left);?>;
	width:100%;
}
#dtb-password-protected form {
	width:80%;
	max-width:<?php echo esc_html($pass_content_max_width . 'px');?>;
	text-align:<?php echo esc_html($pass_content_align);?>;
	display: flex;
   flex-direction: column;
   align-items:<?php if ($pass_content_align == 'center') : echo 'center'; elseif ($pass_content_align == 'left') : echo 'flex-start'; elseif ($pass_content_align == 'right') : echo 'flex-end'; endif; ?>;
}
article.et_pb_post #dtb-password-protected form {
	width:100%;
}
<?php if ($dtb_enable_password_image != '') { ?>
	#dtb-password-protected .dtb-pass-image {
		max-width:<?php echo esc_html($pass_image_max_width . 'px');?>;
		padding-bottom:<?php echo esc_html($pass_image_padding . 'px');?>;
	}
<?php } ?>


#dtb-password-protected .dtb-pass-title {
	font-size:<?php echo esc_html($pass_title_font_size);?>px;
	color:<?php echo esc_html($pass_title_color)?>;
	font-weight:<?php echo esc_html($pass_title_font_weight);?>;
	<?php if ($pass_title_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($pass_title_tt); ?>; font-variant:normal;<?php } ?>
	letter-spacing:<?php echo esc_html($pass_title_lettersp);?>px;
	<?php if ($pass_title_font != '') {?>font-family:<?php echo esc_html($pass_title_font); ?>;<?php } ?>
}
#dtb-password-protected .dtb-pass-message {
	font-size:<?php echo esc_html($pass_message_font_size);?>px;
	color:<?php echo esc_html($pass_message_color)?>;
	font-weight:<?php echo esc_html($pass_message_font_weight);?>;
	<?php if ($pass_message_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($pass_message_tt); ?>; font-variant:normal;<?php } ?>
	letter-spacing:<?php echo esc_html($pass_message_lettersp);?>px;
	<?php if ($pass_message_font != '') {?>font-family:<?php echo esc_html($pass_message_font); ?>;<?php } ?>
	margin-bottom:<?php echo esc_html($pass_message_margin_bot . 'px'); ?>;
}

#dtb-password-protected .dtb-pass-form {
	width:100%;
	max-width:<?php echo esc_html( $pass_input_max_width .'px' );?>;
	display:flex;
	justify-content:stretch;
	align-items:center;
}
#dtb-password-protected .dtb-pass-form input[type=password] {
	width:100%;
	padding:<?php echo esc_html( $pass_input_padding_ver . 'px ' . $pass_input_padding_hor . 'px'); ?>;
	background-color:<?php echo esc_html( $pass_input_bg);?>;
	border-radius:<?php echo esc_html($pass_input_border_radius . 'px'); ?>;
	font-size:<?php echo esc_html($pass_input_font_size);?>px;
	color:<?php echo esc_html($pass_input_color)?>;
	font-weight:<?php echo esc_html($pass_input_font_weight);?>;
	<?php if ($pass_input_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($pass_input_tt); ?>; font-variant:normal;<?php } ?>
	letter-spacing:<?php echo esc_html($pass_input_lettersp);?>px;
	<?php if ($pass_input_font != '') {?>font-family:<?php echo esc_html($pass_input_font); ?>;<?php } ?>
	border:<?php echo esc_html($pass_input_border_width . 'px ' . $pass_input_border_color . ' solid'); ?>;
}
#dtb-password-protected .dtb-pass-form input[type=password]:focus {
	background-color:<?php echo esc_html( $pass_input_bg_focus);?>;
	border-color:<?php echo esc_html($pass_input_border_focus);?>;
}
#dtb-password-protected .dtb-pass-form input[type=password]::placeholder {
	color:<?php echo esc_html($pass_input_placeholder)?>;
}

#dtb-password-protected .dtb-pass-form input[type=submit] {
	padding:<?php echo esc_html( $pass_button_padding_ver . 'px ' . $pass_button_padding_hor . 'px'); ?>;
	background-color:<?php echo esc_html( $pass_button_bg);?>;
	border-radius:<?php echo esc_html($pass_button_border_radius . 'px'); ?>;
	font-size:<?php echo esc_html($pass_button_font_size);?>px;
	color:<?php echo esc_html($pass_button_color)?>;
	font-weight:<?php echo esc_html($pass_button_font_weight);?>;
	<?php if ($pass_button_tt == 'small-caps') { ?>text-transform:none; font-variant:small-caps;<?php } else { ?>text-transform:<?php echo esc_html($pass_button_tt); ?>; font-variant:normal;<?php } ?>
	letter-spacing:<?php echo esc_html($pass_button_lettersp);?>px;
	<?php if ($pass_button_font != '') {?>font-family:<?php echo esc_html($pass_button_font); ?>;<?php } ?>
	border:<?php echo esc_html($pass_button_border_width . 'px ' . $pass_button_border_color . ' solid'); ?>;
	transition:all .3s ease-in-out;
	margin:0 0 0 5px;
	cursor:pointer;
}
#dtb-password-protected .dtb-pass-form input[type=submit]:hover {
	background-color:<?php echo esc_html( $pass_button_bg_hover);?>;
	color:<?php echo esc_html($pass_button_color_hover)?>;
	border-color:<?php echo esc_html($pass_button_border_hover)?>;
}










