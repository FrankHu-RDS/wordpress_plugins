<?php

function dtb_cppm_filter_text($output) {
	
	$dtb_enable_password_image_val = dtb_get_option('dtb_enable_password_image');
	$dtb_password_image_val = dtb_get_option('dtb_password_image');
	$dtb_password_title_val = dtb_get_option('dtb_password_title', 'Password Protected Content');
	$dtb_password_message_val = dtb_get_option('dtb_password_message', 'To view this protected post, enter the password below:');
	$dtb_password_input_val = dtb_get_option('dtb_password_input', 'Password');
	$dtb_password_submit_val = dtb_get_option('dtb_password_submit', 'Submit Password');
	$label = 'dtb-'.( empty( $post->ID ) ? rand() : $post->ID );
	
	if ($dtb_enable_password_image_val != '') : $image = '<div class="dtb-pass-image"><img src="' .  esc_url($dtb_password_image_val) .'" alt="' . get_bloginfo ("name") . ' - ' . esc_attr__($dtb_password_title_val) .'" /></div>';
	else : $image = ''; endif;
	
	$form = '<div id="dtb-password-protected">
	<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">' . $image . '<div class="dtb-pass-title">' . esc_attr__($dtb_password_title_val) . '</div><div class="dtb-pass-message">' . esc_html__($dtb_password_message_val) . '</div><div class="dtb-pass-form"><input name="post_password" placeholder="' .  esc_attr__($dtb_password_input_val) . '" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__($dtb_password_submit_val) . '" /></div></form>
   </div>';
   return $form;
}
add_filter('the_password_form', 'dtb_cppm_filter_text', 999);