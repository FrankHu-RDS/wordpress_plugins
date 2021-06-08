<?php
	$layout_query = array(
	'post_type'=>'et_pb_layout',
	'posts_per_page'=>-1,
	'meta_query' => array(
		array(
		'key' => '_et_pb_predefined_layout',
		'compare' => 'NOT EXISTS')
		)
	);
	$popups = array("1","2","3","4","5");

	$dtb_enable_popup_val = dtb_get_option('dtb_enable_popup');
	
	
	$dtb_popup_number_val = dtb_get_option('dtb_popup_number');
	$dtb_popup1_layout_val = dtb_get_option('dtb_popup1_layout');
	$dtb_popup2_layout_val = dtb_get_option('dtb_popup2_layout');
	$dtb_popup3_layout_val = dtb_get_option('dtb_popup3_layout');
	$dtb_popup4_layout_val = dtb_get_option('dtb_popup4_layout');
	$dtb_popup5_layout_val = dtb_get_option('dtb_popup5_layout');
	$dtb_preloader_val = dtb_get_option('dtb_preloader');
	$dtb_preloader_home_val = dtb_get_option('dtb_preloader_home');
	$dtb_preloader_type_val = dtb_get_option('dtb_preloader_type');
	$dtb_preloader_effect_val = dtb_get_option('dtb_preloader_effect');
	$dtb_preloader_speed_val = dtb_get_option('dtb_preloader_speed');
	$dtb_enable_particles_val = dtb_get_option('dtb_enable_particles');
	$dtb_particles_mobile_off_val = dtb_get_option('dtb_particles_mobile_off');
	$dtb_custom_preloader_image_val = dtb_get_option('dtb_custom_preloader_image');
	$dtb_custom_preloader_image_url_val = dtb_get_option('dtb_custom_preloader_image_url');
	$dtb_custom_preloader_image_alt_val = dtb_get_option('dtb_custom_preloader_image_alt');
	
	$dtb_scrollbar_val = dtb_get_option('dtb_scrollbar');
	$dtb_social_enable_val = dtb_get_option('dtb_social_enable');
	$dtb_social_links_val = dtb_get_option('dtb_social_links');
	$dtb_social_move_val = dtb_get_option('dtb_modcustomize_social_move');
	$dtb_social_target_val = dtb_get_option('dtb_social_target');
	$dtb_youtube_url_val = dtb_get_option('dtb_youtube_url');
	$dtb_linkedin_url_val = dtb_get_option('dtb_linkedin_url');
	$dtb_pinterest_url_val = dtb_get_option('dtb_pinterest_url');
	$dtb_tumblr_url_val = dtb_get_option('dtb_tumblr_url');
	$dtb_flickr_url_val = dtb_get_option('dtb_flickr_url');
	$dtb_dribble_url_val = dtb_get_option('dtb_dribble_url');
	$dtb_vimeo_url_val = dtb_get_option('dtb_vimeo_url');
	$dtb_skype_url_val = dtb_get_option('dtb_skype_url');
	
	$dtb_enable_password_val = dtb_get_option('dtb_enable_password');
	$dtb_enable_password_image_val = dtb_get_option('dtb_enable_password_image');
	$dtb_password_image_val = dtb_get_option('dtb_password_image');
	$dtb_password_title_val = dtb_get_option('dtb_password_title');
	$dtb_password_message_val = dtb_get_option('dtb_password_message');
	$dtb_password_input_val = dtb_get_option('dtb_password_input');
	$dtb_password_submit_val = dtb_get_option('dtb_password_submit');
	
	$dtb_enable_sticky_val = dtb_get_option('dtb_enable_sticky');
	$dtb_sticky_offset_val = dtb_get_option('dtb_sticky_offset');
	$dtb_sticky_breakpoint_val = dtb_get_option('dtb_sticky_breakpoint');
	$dtb_enable_sticky_js_val = dtb_get_option('dtb_enable_sticky_js');
	$dtb_add_sticky_simple_class_val = dtb_get_option('dtb_add_sticky_simple_class');
	$dtb_sticky_simple_class_val = dtb_get_option('dtb_sticky_simple_class');
	$dtb_sticky_class_val = dtb_get_option('dtb_sticky_class');
	$dtb_sticky_pushup_class_val = dtb_get_option('dtb_sticky_pushup_class');
?>
<div id="global" class="tool <?php echo $active_tab == 'global' ? 'tool-active' : ''; ?>">



<h2 class="tool-section"><?php esc_html_e('Preloader', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Preloaders', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p> <?php esc_html_e("Enable this if you'd like to show loading animation during the page load.", 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_preloader" type="checkbox" value="1" <?php checked( '1', $dtb_preloader_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_general' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Only on the Home Page', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("This options will display preloader only for the Home Page.", "divi-toolbox"); ?></p></div>
			</div>
			<div class="box-content minibox">
				<div class="checkbox">
					<input name="dtb_preloader_home" type="checkbox" value="1" <?php checked( '1', $dtb_preloader_home_val ); ?> />
				</div>
			</div>
		</div>
	

		<?php		
		// Store preloaders  in an array
		$preloaders = array(
			'preloader1' => array(
				'name' => 'preloader1',
				'value' =>
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><path d="M10 40v-1.1-1.3-.8c0-.3.1-.6.1-.9.1-.6.1-1.4.2-2.1.2-.8.3-1.6.5-2.5.2-.9.6-1.8.8-2.8.3-1 .8-1.9 1.2-3 .5-1 1.1-2 1.7-3.1.7-1 1.4-2.1 2.2-3.1 1.6-2.1 3.7-3.9 6-5.6 2.3-1.7 5-3 7.9-4.1.7-.2 1.5-.4 2.2-.7.7-.3 1.5-.3 2.3-.5.8-.2 1.5-.3 2.3-.4l1.2-.1.6-.1h.6c1.5 0 2.9-.1 4.5.2.8.1 1.6.1 2.4.3.8.2 1.5.3 2.3.5 3 .8 5.9 2 8.5 3.6 2.6 1.6 4.9 3.4 6.8 5.4 1 1 1.8 2.1 2.7 3.1.8 1.1 1.5 2.1 2.1 3.2.6 1.1 1.2 2.1 1.6 3.1.4 1 .9 2 1.2 3 .3 1 .6 1.9.8 2.7.2.9.3 1.6.5 2.4.1.4.1.7.2 1 0 .3.1.6.1.9.1.6.1 1 .1 1.4.4 1 .4 1.4.4 1.4.2 2.2-1.5 4.1-3.7 4.3s-4.1-1.5-4.3-3.7v-.7-.9-1.1-.7c0-.2-.1-.5-.1-.8-.1-.6-.1-1.2-.2-1.9s-.3-1.4-.4-2.2c-.2-.8-.5-1.6-.7-2.4-.3-.8-.7-1.7-1.1-2.6-.5-.9-.9-1.8-1.5-2.7-.6-.9-1.2-1.8-1.9-2.7-1.4-1.8-3.2-3.4-5.2-4.9-2-1.5-4.4-2.7-6.9-3.6-.6-.2-1.3-.4-1.9-.6-.7-.2-1.3-.3-1.9-.4-1.2-.3-2.8-.4-4.2-.5h-2c-.7 0-1.4.1-2.1.1-.7.1-1.4.1-2 .3-.7.1-1.3.3-2 .4-2.6.7-5.2 1.7-7.5 3.1-2.2 1.4-4.3 2.9-6 4.7-.9.8-1.6 1.8-2.4 2.7-.7.9-1.3 1.9-1.9 2.8-.5 1-1 1.9-1.4 2.8-.4.9-.8 1.8-1 2.6-.3.9-.5 1.6-.7 2.4-.2.7-.3 1.4-.4 2.1-.1.3-.1.6-.2.9 0 .3-.1.6-.1.8 0 .5-.1.9-.1 1.3-.2.7-.2 1.1-.2 1.1z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="360 40 40" dur="1.5s" repeatCount="indefinite"/></path></svg>'
		
			),
			'preloader2' => array(
				'name' => 'preloader2',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><path d="M10 40v-1.1-1.3-.8c0-.3.1-.6.1-.9.1-.6.1-1.4.2-2.1.2-.8.3-1.6.5-2.5.2-.9.6-1.8.8-2.8.3-1 .8-1.9 1.2-3 .5-1 1.1-2 1.7-3.1.7-1 1.4-2.1 2.2-3.1 1.6-2.1 3.7-3.9 6-5.6 2.3-1.7 5-3 7.9-4.1.7-.2 1.5-.4 2.2-.7.7-.3 1.5-.3 2.3-.5.8-.2 1.5-.3 2.3-.4l1.2-.1.6-.1h.6c1.5 0 2.9-.1 4.5.2.8.1 1.6.1 2.4.3.8.2 1.5.3 2.3.5 3 .8 5.9 2 8.5 3.6 2.6 1.6 4.9 3.4 6.8 5.4 1 1 1.8 2.1 2.7 3.1.8 1.1 1.5 2.1 2.1 3.2.6 1.1 1.2 2.1 1.6 3.1.4 1 .9 2 1.2 3 .3 1 .6 1.9.8 2.7.2.9.3 1.6.5 2.4.1.4.1.7.2 1 0 .3.1.6.1.9.1.6.1 1 .1 1.4.4 1 .4 1.4.4 1.4.2 2.2-1.5 4.1-3.7 4.3s-4.1-1.5-4.3-3.7v-.7-.9-1.1-.7c0-.2-.1-.5-.1-.8-.1-.6-.1-1.2-.2-1.9s-.3-1.4-.4-2.2c-.2-.8-.5-1.6-.7-2.4-.3-.8-.7-1.7-1.1-2.6-.5-.9-.9-1.8-1.5-2.7-.6-.9-1.2-1.8-1.9-2.7-1.4-1.8-3.2-3.4-5.2-4.9-2-1.5-4.4-2.7-6.9-3.6-.6-.2-1.3-.4-1.9-.6-.7-.2-1.3-.3-1.9-.4-1.2-.3-2.8-.4-4.2-.5h-2c-.7 0-1.4.1-2.1.1-.7.1-1.4.1-2 .3-.7.1-1.3.3-2 .4-2.6.7-5.2 1.7-7.5 3.1-2.2 1.4-4.3 2.9-6 4.7-.9.8-1.6 1.8-2.4 2.7-.7.9-1.3 1.9-1.9 2.8-.5 1-1 1.9-1.4 2.8-.4.9-.8 1.8-1 2.6-.3.9-.5 1.6-.7 2.4-.2.7-.3 1.4-.4 2.1-.1.3-.1.6-.2.9 0 .3-.1.6-.1.8 0 .5-.1.9-.1 1.3-.2.7-.2 1.1-.2 1.1z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="360 40 40" dur="0.8s" repeatCount="indefinite"/></path><path d="M62 40.1s0 .2-.1.7c0 .2 0 .5-.1.8v.5c0 .2-.1.4-.1.7-.1.5-.2 1-.3 1.6-.2.5-.3 1.1-.5 1.8-.2.6-.5 1.3-.7 1.9-.3.7-.7 1.3-1 2.1-.4.7-.9 1.4-1.4 2.1-.5.7-1.1 1.4-1.7 2-1.2 1.3-2.7 2.5-4.4 3.6-1.7 1-3.6 1.8-5.5 2.4-2 .5-4 .7-6.2.7-1.9-.1-4.1-.4-6-1.1-1.9-.7-3.7-1.5-5.2-2.6s-2.9-2.3-4-3.7c-.6-.6-1-1.4-1.5-2-.4-.7-.8-1.4-1.2-2-.3-.7-.6-1.3-.8-2l-.6-1.8c-.1-.6-.3-1.1-.4-1.6-.1-.5-.1-1-.2-1.4-.1-.9-.1-1.5-.1-2v-.7s0 .2.1.7c.1.5 0 1.1.2 2 .1.4.2.9.3 1.4.1.5.3 1 .5 1.6.2.6.4 1.1.7 1.8.3.6.6 1.2.9 1.9.4.6.8 1.3 1.2 1.9.5.6 1 1.3 1.6 1.8 1.1 1.2 2.5 2.3 4 3.2 1.5.9 3.2 1.6 5 2.1 1.8.5 3.6.6 5.6.6 1.8-.1 3.7-.4 5.4-1 1.7-.6 3.3-1.4 4.7-2.4 1.4-1 2.6-2.1 3.6-3.3.5-.6.9-1.2 1.3-1.8.4-.6.7-1.2 1-1.8.3-.6.6-1.2.8-1.8.2-.6.4-1.1.5-1.7l.3-1.5c.1-.4.1-.8.1-1.2 0-.2 0-.4.1-.5v-.5-.8-.7c0-1.1.9-2 2-2s2 .9 2 2c.1-.1.1 0 .1 0z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="-360 40 40" dur="0.6s" repeatCount="indefinite"/></path></svg>'
			),	
			'preloader3' => array(
				'name' => 'preloader3',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="2 2 35 35"><path opacity=".3" d="M20.201 5.169c-8.254 0-14.946 6.692-14.946 14.946 0 8.255 6.692 14.946 14.946 14.946s14.946-6.691 14.946-14.946c-.001-8.254-6.692-14.946-14.946-14.946zm0 26.58c-6.425 0-11.634-5.208-11.634-11.634 0-6.425 5.209-11.634 11.634-11.634 6.425 0 11.633 5.209 11.633 11.634 0 6.426-5.208 11.634-11.633 11.634z"/><path d="M26.013 10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012v3.312c2.119 0 4.1.576 5.812 1.566z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite"/></path></svg>'
			),	
			'preloader4' => array(
				'name' => 'preloader4',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 15 56 70"><circle cx="8" cy="50" r="6"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin=".1"/></circle><circle cx="28" cy="50" r="6"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin=".2"/></circle><circle cx="48" cy="50" r="6"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin=".3"/></circle></svg>'
			),	
			'preloader5' => array(
				'name' => 'preloader5',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect class="none" fill="none"  stroke-width="4" x="25" y="25" width="50" height="50"><animateTransform attributeName="transform" dur="0.5s" from="0 50 50" to="180 50 50" type="rotate" id="b" attributeType="XML" begin="a.end"/></rect><rect x="27" y="27" width="46" height="50"><animate attributeName="height" dur="1.3s" attributeType="XML" from="50" to="0" id="a" fill="freeze" begin="0s;b.end"/></rect></svg>'
			),	
			'preloader6' => array(
				'name' => 'preloader6',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="-15 25 100 100"><rect x="16" y="50" width="8" height="20"><animateTransform attributeType="xml" attributeName="transform" type="translate" values="0 0; 0 20; 0 0" begin="0" dur="0.8s" repeatCount="indefinite"/></rect><rect x="30" y="50" width="8" height="20"><animateTransform attributeType="xml" attributeName="transform" type="translate" values="0 0; 0 20; 0 0" begin="0.2s" dur="0.8s" repeatCount="indefinite"/></rect><rect x="44" y="50" width="8" height="20" ><animateTransform attributeType="xml" attributeName="transform" type="translate" values="0 0; 0 20; 0 0" begin="0.4s" dur="0.8s" repeatCount="indefinite"/></rect></svg>'
			),	
			'preloader7' => array(
				'name' => 'preloader7',
				'value' => 
					'<svg class="preloader preloader7" width="70" height="70" xmlns="http://www.w3.org/2000/svg"><g class="none" fill-rule="evenodd" stroke-width="2"><circle cx="35" cy="35" r="1"><animate attributeName="r" begin="0s" dur="1.8s" values="1; 26" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite"/><animate attributeName="stroke-opacity" begin="0s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite"/></circle><circle cx="35" cy="35" r="1"><animate attributeName="r" begin="-0.9s" dur="1.8s" values="1; 26" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite"/><animate attributeName="stroke-opacity" begin="-0.9s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite"/></circle></g></svg>'
			),	
			'preloader8' => array(
				'name' => 'preloader8',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 24 30"><rect y="13" width="4" height="5"><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite"/><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite"/></rect><rect x="10" y="13" width="4" height="5"><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite"/><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite"/></rect><rect x="20" y="13" width="4" height="5" ><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite"/><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite"/></rect></svg>'
			),	
			'preloader9' => array(
				'name' => 'preloader9',
				'value' => 
					'<svg class="preloader" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 40 30"><rect width="4" height="20"><animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0s" dur="0.6s" repeatCount="indefinite"/></rect><rect x="11" width="4" height="20"><animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.2s" dur="0.6s" repeatCount="indefinite"/></rect><rect x="22" width="4" height="20"><animate attributeName="opacity" attributeType="XML" values="1; .2; 1" begin="0.4s" dur="0.6s" repeatCount="indefinite"/></rect></svg>'
			),	
			'preloader10' => array(
				'name' => 'preloader10',
				'value' => 
					'<svg class="preloader" width="60" viewBox="0 -10 80 60"><rect width="20" height="20" rx="3" ry="3"><animate attributeName="width" values="0;20;20;20;0" dur="1000ms" repeatCount="indefinite"/><animate attributeName="height" values="0;20;20;20;0" dur="1000ms" repeatCount="indefinite"/><animate attributeName="x" values="10;0;0;0;10" dur="1000ms" repeatCount="indefinite"/><animate attributeName="y" values="10;0;0;0;10" dur="1000ms" repeatCount="indefinite"/></rect><rect width="20" height="20" x="25" rx="3" ry="3"><animate attributeName="width" values="0;20;20;20;0" begin="200ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="height" values="0;20;20;20;0" begin="200ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="x" values="35;25;25;25;35" begin="200ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="y" values="10;0;0;0;10" begin="200ms" dur="1000ms" repeatCount="indefinite"/></rect><rect width="20" height="20" x="50" rx="3" ry="3"><animate attributeName="width" values="0;20;20;20;0" begin="400ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="height" values="0;20;20;20;0" begin="400ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="x" values="60;50;50;50;60" begin="400ms" dur="1000ms" repeatCount="indefinite"/><animate attributeName="y" values="10;0;0;0;10" begin="400ms" dur="1000ms" repeatCount="indefinite"/></rect></svg>'
			),	
			'preloader11' => array(
				'name' => 'preloader11',
				'value' => 
					'<svg class="preloader none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"style="background:0 0"><path class="none" fill="none" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-width="4" stroke-dasharray="159.085 97.504"><animate attributeName="stroke-dashoffset" calcMode="linear" values="0;256.58892822265625" keyTimes="0;1" dur="1" begin="0s" repeatCount="indefinite"/></path></svg>'
			),	
			'preloader12' => array(
				'name' => 'preloader12',
				'value' => 
					'<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="translate(80 50)"><circle r="6" transform="scale(1.21152)"><animateTransform attributeName="transform" type="scale" begin="-0.525s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.525s"/></circle></g><g transform="rotate(45 -50.355 121.569)"><circle r="6" fill-opacity=".875" transform="scale(1.31152)"><animateTransform attributeName="transform" type="scale" begin="-0.44999999999999996s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.44999999999999996s"/></circle></g><g transform="rotate(90 -15 65)"><circle r="6" fill-opacity=".75" transform="scale(1.41152)"><animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.375s"/></circle></g><g transform="rotate(135 -.355 41.569)"><circle r="6" fill-opacity=".625" transform="scale(1.51152)"><animateTransform attributeName="transform" type="scale" begin="-0.3s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.3s"/></circle></g><g transform="rotate(180 10 25)"><circle r="6" fill-opacity=".5" transform="scale(1.61152)"><animateTransform attributeName="transform" type="scale" begin="-0.22499999999999998s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.22499999999999998s"/></circle></g><g transform="rotate(-135 20.355 8.431)"><circle r="6" fill-opacity=".375" transform="scale(1.71152)"><animateTransform attributeName="transform" type="scale" begin="-0.15s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.15s"/></circle></g><g transform="rotate(-90 35 -15)"><circle r="6" fill-opacity=".25" transform="scale(1.01152)"><animateTransform attributeName="transform" type="scale" begin="-0.075s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="-0.075s"/></circle></g><g transform="rotate(-45 70.355 -71.569)"><circle r="6" fill-opacity=".125" transform="scale(1.11152)"><animateTransform attributeName="transform" type="scale" begin="0s" values="1.8 1.8;1 1" keyTimes="0;1" dur="0.6s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="0.6s" repeatCount="indefinite" values="1;0" begin="0s"/></circle></g></svg>'
			),	
			'preloader13' => array(
				'name' => 'preloader13',
				'value' => 
					'<svg viewBox="-10 -10 75 100" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke"> <g transform="matrix(1 0 0 -1 0 80)"> <rect width="10" height="20" rx="3"> <animate attributeName="height" begin="0s" dur="4.3s" values="20;45;57;80;64;32;66;45;64;23;66;13;64;56;34;34;2;23;76;79;20" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="15" width="10" height="80" rx="3"> <animate attributeName="height" begin="0s" dur="2s" values="80;55;33;5;75;23;73;33;12;14;60;80" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="30" width="10" height="50" rx="3"> <animate attributeName="height" begin="0s" dur="1.4s" values="50;34;78;23;56;23;34;76;80;54;21;50" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="45" width="10" height="30" rx="3"> <animate attributeName="height" begin="0s" dur="2s" values="30;45;13;80;56;72;45;76;34;23;67;30" calcMode="linear" repeatCount="indefinite" /> </rect> </g> </svg>'
			),	
			'preloader14' => array(
				'name' => 'preloader14',
				'value' => 
					'<svg viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg" class="preloader"> <g fill="none" fill-rule="evenodd"> <g transform="translate(1 1)" stroke-width="2"> <circle cx="5" cy="50" r="5"> <animate attributeName="cy" begin="0s" dur="2.2s" values="50;5;50;50" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="cx" begin="0s" dur="2.2s" values="5;27;49;5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="27" cy="5" r="5"> <animate attributeName="cy" begin="0s" dur="2.2s" from="5" to="5" values="5;50;50;5" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="cx" begin="0s" dur="2.2s" from="27" to="27" values="27;49;5;27" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="49" cy="50" r="5"> <animate attributeName="cy" begin="0s" dur="2.2s" values="50;50;5;50" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="cx" from="49" to="49" begin="0s" dur="2.2s" values="49;5;27;49" calcMode="linear" repeatCount="indefinite" /> </circle> </g> </g> </svg>'
			),	
			'preloader15' => array(
				'name' => 'preloader15',
				'value' => 
					'<svg viewBox="-20 -20 185 210" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke"> <rect y="10" width="15" height="120" rx="6"> <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="30" y="10" width="15" height="120" rx="6"> <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="60" width="15" height="140" rx="6"> <animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="90" y="10" width="15" height="120" rx="6"> <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite" /> </rect> <rect x="120" y="10" width="15" height="120" rx="6"> <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite" /> </rect> </svg>'
			),	
			'preloader16' => array(
				'name' => 'preloader16',
				'value' => 
					'<svg viewBox="-10 -10 160 160" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke"> <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"> <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="1.875s" repeatCount="indefinite"/> </path> <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"> <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="6s" repeatCount="indefinite"/> </path> </svg>'
			),	
			'preloader17' => array(
				'name' => 'preloader17',
				'value' => 
					'<svg viewBox="-20 -20 150 150" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke"> <circle cx="12.5" cy="12.5" r="12.5"> <animate attributeName="fill-opacity" begin="0s" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="12.5" cy="52.5" r="12.5" fill-opacity=".5"> <animate attributeName="fill-opacity" begin="100ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="52.5" cy="12.5" r="12.5"> <animate attributeName="fill-opacity" begin="300ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="52.5" cy="52.5" r="12.5"> <animate attributeName="fill-opacity" begin="600ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="92.5" cy="12.5" r="12.5"> <animate attributeName="fill-opacity" begin="800ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="92.5" cy="52.5" r="12.5"> <animate attributeName="fill-opacity" begin="400ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="12.5" cy="92.5" r="12.5"> <animate attributeName="fill-opacity" begin="700ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="52.5" cy="92.5" r="12.5"> <animate attributeName="fill-opacity" begin="500ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="92.5" cy="92.5" r="12.5"> <animate attributeName="fill-opacity" begin="200ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite" /> </circle> </svg>'
			),	
			'preloader18' => array(
				'name' => 'preloader18',
				'value' => 
					'<svg viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" class="preloader"> <g class="none" fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="2"> <circle cx="22" cy="22" r="6" stroke-opacity="0"> <animate attributeName="r" begin="1.5s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="stroke-opacity" begin="1.5s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="stroke-width" begin="1.5s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="22" cy="22" r="6" stroke-opacity="0"> <animate attributeName="r" begin="3s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="stroke-opacity" begin="3s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="22" cy="22" r="8"> <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6" calcMode="linear" repeatCount="indefinite" /> </circle> </g> </svg>'
			),
			'preloader19' => array(
				'name' => 'preloader19',
				'value' => 
					'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="preloader"><circle fill="none" class="none" stroke="#fff" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/> <circle fill="#fff" stroke="#e74c3c" stroke-width="3" cx="8" cy="54" r="6" > <animateTransform attributeName="transform" dur="2s" type="rotate" from="0 50 48" to="360 50 52" repeatCount="indefinite" /> </circle> </svg>'
			),	
			'preloader20' => array(
				'name' => 'preloader20',
				'value' => 
					'<svg viewBox="0 -50 130 150" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> </svg>'
			),	
			'preloader21' => array(
				'name' => 'preloader21',
				'value' => 
					'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="preloader"><circle cx="50" cy="30.2246" r="15" fill="#e15b64"><animate attributeName="cy" dur="1s" repeatCount="indefinite" calcMode="spline" keySplines="0.45 0 0.9 0.55;0 0.45 0.55 0.9" keyTimes="0;0.5;1" values="25;75;25"></animate>
</circle></svg>'
			),	
			'preloader22' => array(
				'name' => 'preloader22',
				'value' => 
					'<svg xmlns="http://www.w3.org/2000/svg" viewBox="20 20 60 60" preserveAspectRatio="xMidYMid" class="preloader">
<circle cx="50" cy="50" r="17.8511" class="none" stroke-width="11">
  <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;18" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s"></animate>
  <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s"></animate>
</circle>
<circle cx="50" cy="50" r="10.9377" class="none" stroke-width="11">
  <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;18" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline"></animate>
  <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline"></animate>
</circle></svg>'
			),	
			'preloader23' => array(
				'name' => 'preloader23',
				'value' => 
					'<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="25 25 50 50" preserveAspectRatio="xMidYMid"> <g transform="rotate(0 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8814102564102564s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(30 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8012820512820512s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(60 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.7211538461538461s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(90 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.641025641025641s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(120 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.5608974358974359s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(150 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4807692307692307s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(180 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.4006410256410256s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(210 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.3205128205128205s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(240 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.24038461538461536s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(270 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.16025641025641024s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(300 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.08012820512820512s" repeatCount="indefinite"></animate> </rect> </g><g transform="rotate(330 50 50)"> <rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7"> <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="0s" repeatCount="indefinite"></animate> </rect> </g></svg>'
			),	
			'preloader24' => array(
				'name' => 'preloader24',
				'value' => 
					'<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" viewBox="10 10 80 80" preserveAspectRatio="xMidYMid">
<g transform="translate(50 50)">
<g transform="rotate(42.4967)">
<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.5586592178770949s" repeatCount="indefinite"></animateTransform><path d="M24.387496796514398 -5.5 L31.387496796514398 -5.5 L31.387496796514398 5.5 L24.387496796514398 5.5 A25 25 0 0 1 21.133651657506547 13.355477064454524 L21.133651657506547 13.355477064454524 L26.08339912581238 18.305224532760356 L18.305224532760356 26.083399125812377 L13.355477064454524 21.133651657506544 A25 25 0 0 1 5.500000000000001 24.387496796514398 L5.500000000000001 24.387496796514398 L5.500000000000002 31.387496796514398 L-5.4999999999999964 31.387496796514398 L-5.499999999999997 24.387496796514398 A25 25 0 0 1 -13.355477064454519 21.13365165750655 L-13.355477064454519 21.13365165750655 L-18.30522453276035 26.083399125812385 L-26.083399125812377 18.305224532760352 L-21.133651657506547 13.35547706445452 A25 25 0 0 1 -24.387496796514398 5.500000000000008 L-24.387496796514398 5.500000000000008 L-31.387496796514398 5.500000000000009 L-31.387496796514398 -5.500000000000001 L-24.387496796514398 -5.500000000000002 A25 25 0 0 1 -21.13365165750655 -13.355477064454515 L-21.13365165750655 -13.355477064454515 L-26.083399125812385 -18.30522453276035 L-18.305224532760356 -26.083399125812377 L-13.355477064454524 -21.133651657506547 A25 25 0 0 1 -5.500000000000009 -24.387496796514398 L-5.500000000000009 -24.387496796514398 L-5.50000000000001 -31.387496796514398 L5.499999999999999 -31.387496796514398 L5.5 -24.387496796514398 A25 25 0 0 1 13.355477064454515 -21.13365165750655 L13.355477064454515 -21.13365165750655 L18.30522453276035 -26.083399125812385 L26.083399125812377 -18.305224532760356 L21.133651657506547 -13.355477064454524 A25 25 0 0 1 24.387496796514398 -5.500000000000011 M0 -18A18 18 0 1 0 0 18 A18 18 0 1 0 0 -18"></path></g></g></svg>'
			),	
			'preloader25' => array(
				'name' => 'preloader25',
				'value' => 
					'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="preloader nostroke">
<rect x="15" y="15" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
</rect><rect x="41" y="15" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"></animate>
</rect><rect x="67" y="15" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"></animate>
</rect><rect x="15" y="41" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"></animate>
</rect><rect x="67" y="41" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"></animate>
</rect><rect x="15" y="67" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"></animate>
</rect><rect x="41" y="67" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"></animate>
</rect><rect x="67" y="67" width="18" height="18">
  <animate attributeName="opacity" values="1;0.3;0.3" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"></animate>
</rect>	</svg>'
			)
		
		); ?>

		<div class="toolbox" id='dtb_preloaders_list'>
			<div class="box-title">
				<h3><?php esc_html_e('Preloader Type', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php printf(esc_html__("Choose the preloader image. You can ceasily change preloader colors in the %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_preloader' )) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>							
			</div>
			<div class="box-content" >
				<div class="preloader-wrap">
				<?php foreach( $preloaders as $preloader ) : ?>
					<div class="preloader-item">
						<input type="radio"  name="dtb_preloader_type" value="<?php esc_attr_e( $preloader['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $preloader['name'] ); ?>" <?php checked( $dtb_preloader_type_val, $preloader['name'] ); ?>  class="customradio"/>
						<label for="<?php echo esc_attr($preloader['name']); ?>"><?php echo et_core_esc_previously($preloader['value']); ?></label>
					</div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Use custom preloader image', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to show custom image as preloader.", "divi-toolbox"); ?></p></div>		
				
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input id="dtb_custom_preloader_image" name="dtb_custom_preloader_image" type="checkbox" value="1" <?php checked( '1', $dtb_custom_preloader_image_val ); ?> />
			</div>
		</div>
		</div>
		<div class="hide">
			<div class="toolbox first nopad">
				<div class="box-title">
				</div>
				<div class="box-content upload">
					<input class="background_image" type="text" name="dtb_custom_preloader_image_url" value="<?php echo esc_url($dtb_custom_preloader_image_url_val) ?>" />
					<input class="upload_image_button btn" type="button" value="Choose Image" />
					
				<div class="clear">
					<?php $dtb_custom_preloader_image_alt = !empty($dtb_custom_preloader_image_alt_val) ? $dtb_custom_preloader_image_alt_val : __('', 'divi-toolbox'); ?>
					<input class="top10" type="text" name="dtb_custom_preloader_image_alt" value="<?php echo esc_attr($dtb_custom_preloader_image_alt);?>"/>
					<p><?php esc_html_e('Define the ALT attribute of the preloader image.', "divi-toolbox"); ?></p>
				</div>
				</div>
			</div>
		</div>
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Preloader Page Transition Type', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e('Choose animation effect for the preloader.', 'divi-toolbox'); ?></p></div>
			</div>
			<div class="box-content">
				<select name="dtb_preloader_effect">
					<option value="fadeOut" <?php selected( 'fadeOut', $dtb_preloader_effect_val ); ?>><?php esc_html_e('Fade Out', 'divi-toolbox'); ?></option>
					<option value="slideUp" <?php selected( 'slideUp', $dtb_preloader_effect_val ); ?>><?php esc_html_e('Slide Up', 'divi-toolbox'); ?></option>
				</select>
				
			</div>
		</div>
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Preloader Transition Speed', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e('Choose the speed of the transition.', 'divi-toolbox') ;?></p></div>
			</div>
			<div class="box-content">
				<select name="dtb_preloader_speed">
					<option value="slow" <?php selected( 'slow', $dtb_preloader_speed_val ); ?>><?php esc_html_e('Slow', 'divi-toolbox'); ?></option>
					<option value="fast" <?php selected( 'fast', $dtb_preloader_speed_val ); ?>><?php esc_html_e('Fast', 'divi-toolbox'); ?></option>
				</select>
				
			</div>
		</div>
		
	</div> <!-- /end Preloaders -->
</div>

<h2 class="tool-section"><?php esc_html_e('Popups', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Popups', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This options adds a Popup, which you can design with the Divi Builder', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_popup" type="checkbox" value="1" <?php checked( '1', $dtb_enable_popup_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_general' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Number of Popups', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Choose how many Popup areas you're going to use", 'divi-toolbox'); ?></p></div>
			</div>
			<div class="box-content">
				<select name="dtb_popup_number">
					<?php foreach ($popups as $popup) {
					echo '<option ' . selected(esc_attr($popup), $dtb_popup_number_val, false) . ' value="' . esc_attr($popup) . '">' . esc_attr($popup) . '</option>';
					} ?>
				</select>
						
				
				</select>
			</div>
		</div>
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to trigger a Popup?', 'divi-toolbox'); ?></h4>
					<p>
						<?php
							echo esc_html_e('Each of the popups can be triggered by any link on the site. It can be a menu item, a button module, any link in the text module etc. The link just needs to have a target URL set to ', 'divi-toolbox'); ?> <strong>#popup1</strong> (or <strong>#popup2</strong>, <strong>#popup3</strong>, <strong>#popup4</strong>, <strong>#popup5</strong> <?php echo esc_html_e(' if you\'re using more than one). You can customize the appearance of background and close button in the ');
							?>
						<a href='customize.php?autofocus[section]=dtb_popup' target="_blank"><?php echo esc_attr('Toolbox Customizer', 'divi-toolbox') ?></a>.
					</p>
				</div>
			</div>
		</div>
		
	
		<div class="toolbox pop1">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Popup #1 Layout', 'divi-toolbox'); ?></h5>
				<p><?php printf(esc_html__('This layout will be displayed inside the first popup. Use %s link target to trigger it.'), '<strong>#popup1</strong>'); ?> </p>
				<?php	
					if ($layouts = get_posts($layout_query)) {
						?>
						<select name="dtb_popup1_layout">
						<option value="">----- None -----</option>
						<?php
						foreach ($layouts as $layout) {
							echo '<option ' . selected(esc_attr($layout->ID), $dtb_popup1_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
						}
						echo '</select>';
						
					}
					else {
						printf('<p class="info">%s</p>', esc_html_e('Sorry, your Divi Library is empty. Create and save some layouts first...', 'divi-toolbox'));
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="toolbox pop2">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Popup #2 Layout', 'divi-toolbox'); ?></h5>
				<p><?php printf(esc_html__('This layout will be displayed inside the second popup. Use %s link target to trigger it.'), '<strong>#popup2</strong>'); ?> </p>
				<?php	
					if ($layouts = get_posts($layout_query)) {
						?>
						<select name="dtb_popup2_layout">
						<option value="">----- None -----</option>
						<?php
						foreach ($layouts as $layout) {
							echo '<option ' . selected(esc_attr($layout->ID), $dtb_popup2_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
						}
						echo '</select>';
						
					}
					else {
						printf('<p class="info">%s</p>', esc_html_e('Sorry, your Divi Library is empty. Create and save some layouts first...', 'divi-toolbox'));
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="toolbox pop3">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Popup #3 Layout', 'divi-toolbox'); ?></h5>
				<p><?php printf(esc_html__('This layout will be displayed inside the third popup. Use %s link target to trigger it.'), '<strong>#popup3</strong>'); ?> </p>
				<?php	
					if ($layouts = get_posts($layout_query)) {
						?>
						<select name="dtb_popup3_layout">
						<option value="">----- None -----</option>
						<?php
						foreach ($layouts as $layout) {
							echo '<option ' . selected(esc_attr($layout->ID), $dtb_popup3_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
						}
						echo '</select>';
						
					}
					else {
						printf('<p class="info">%s</p>', esc_html_e('Sorry, your Divi Library is empty. Create and save some layouts first...', 'divi-toolbox'));	
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="toolbox pop4">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Popup #4 Layout', 'divi-toolbox'); ?></h5>
				<p><?php printf(esc_html__('This layout will be displayed inside the fourth popup. Use %s link target to trigger it.'), '<strong>#popup4</strong>'); ?> </p>
				<?php	
					if ($layouts = get_posts($layout_query)) {
						?>
						<select name="dtb_popup4_layout">
						<option value="">----- None -----</option>
						<?php
						foreach ($layouts as $layout) {
							echo '<option ' . selected(esc_attr($layout->ID), $dtb_popup4_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
						}
						echo '</select>';
						
					}
					else {
						printf('<p class="info">%s</p>', esc_html_e('Sorry, your Divi Library is empty. Create and save some layouts first...', 'divi-toolbox'));	
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="toolbox pop5">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Popup #5 Layout', 'divi-toolbox'); ?></h5>
				<p><?php printf(esc_html__('This layout will be displayed inside the fifth popup. Use %s link target to trigger it.'), '<strong>#popup5</strong>'); ?> </p>
				<?php	
					if ($layouts = get_posts($layout_query)) {
						?>
						<select name="dtb_popup5_layout">
						<option value="">----- None -----</option>
						<?php
						foreach ($layouts as $layout) {
							echo '<option ' . selected(esc_attr($layout->ID), $dtb_popup5_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
						}
						echo '</select>';
						
					}
					else {
						printf('<p class="info">%s</p>', esc_html_e('Sorry, your Divi Library is empty. Create and save some layouts first...', 'divi-toolbox'));
					}
				?>
				</select>
			</div>
		</div>
		
	</div><!-- /end Popups -->
</div>	

<h2 class="tool-section"><?php esc_html_e('Social Icons', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Custom Social Icons Style', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to edit social icons appearance", "divi-toolbox"), '<a href=' . esc_attr(admin_url( 'customize.php?autofocus[panel]=dtb_toolbox')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_social_enable" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_social_enable_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[panel]=dtb_toolbox' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Open Social Links in a New Tab', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to open Divi social links in new browser window (please note it won't work in the customizer preview).", "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_social_target" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_social_target_val) ); ?> />
			</div>
		</div>
	</div>
	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add More Social Icons', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Add additional links to social networks (displayed in Divi header and footer).", "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_social_links" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_social_links_val) ); ?> />
			</div>
		</div>
	</div>
	
	<div class="hide">
		<div class="social-tools">
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Youtube', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_youtube_url" value="<?php echo esc_url($dtb_youtube_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('LinkedIn', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_linkedin_url" value="<?php echo esc_url($dtb_linkedin_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Pinterest', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_pinterest_url" value="<?php echo esc_url($dtb_pinterest_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Tumblr', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_tumblr_url" value="<?php echo esc_url($dtb_tumblr_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Flickr', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_flickr_url" value="<?php echo esc_url($dtb_flickr_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Dribbble', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_dribble_url" value="<?php echo esc_url($dtb_dribble_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Vimeo', 'divi-toolbox'); ?></h5>	
					<input type="text" name="dtb_vimeo_url" value="<?php echo esc_url($dtb_vimeo_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
			<div class="toolbox">
				<div class="box-content">
					<h5><?php esc_html_e('Skype', 'divi-toolbox'); ?></h5>
					<input type="text" name="dtb_skype_url" value="<?php echo esc_url($dtb_skype_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
				</div>
			</div>
		</div>
		
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Sticky Elements', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Enable Sticky Elements', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This feature adds ads an option to stick any element to the top of the page upon scroll.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_sticky" type="checkbox" value="1" <?php checked( '1', $dtb_enable_sticky_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
				<h3><?php esc_html_e('Top Offset', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e('Define the space between top of page and sticky element.', 'divi-toolbox'); ?></p></div>
			</div>
			<div class="box-content">
				<?php $dtb_sticky_offset = !empty($dtb_sticky_offset_val) ? $dtb_sticky_offset_val : '0'; ?>
				<input type="number" name="dtb_sticky_offset" placeholder="0" value="<?php echo esc_attr($dtb_sticky_offset);?>"/>
			</div>
		</div>
		<div class="toolbox nopad">
			<div class="box-title">
				<h3><?php esc_html_e('Mobile Breakpoint', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e('Define the screen width, below which the elements won\'t stick to the top.', 'divi-toolbox'); ?></p></div>
			</div>
			<div class="box-content">
				<?php $dtb_sticky_breakpoint = !empty($dtb_sticky_breakpoint_val) ? $dtb_sticky_breakpoint_val : '980'; ?>
				<input type="number" name="dtb_sticky_breakpoint" placeholder="980" value="<?php echo esc_attr($dtb_sticky_breakpoint);?>"/>
	
				<div class="info top-space">
					<h4><?php esc_html_e('1. Simple Sticky Elements - stick inside the container', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('To make any element sticky (preferably a column or a module), navigate to element\'s Settings → Advanced tab → CSS ID & Classes → CSS Class and add a&nbsp;custom class of:', 'divi-toolbox'); ?> <strong>dtb-sticky</strong> <?php esc_html_e('Element with this CSS class will stick (stop scrolling) when it reaches the top of the page when you scroll down. It will un&#8209;stick and move up once it reaches the bottom of the parent container.', 'divi-toolbox'); ?></p>
				</div>
				<div class="toolbox trigger css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_add_sticky_simple_class" type="checkbox" value="1" <?php checked( '1', $dtb_add_sticky_simple_class_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Use Custom Selectors', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option to use custom CSS selectors for the simple sticky elements. Separate multiple selectors with commas.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				<div class="hide mb20">
					<input type="text" name="dtb_sticky_simple_class" value="<?php echo esc_attr($dtb_sticky_simple_class_val);?>" class="mb20" placeholder="#sampleID, .sampleClass"/>
				</div>	
				<div class="info top-space">
					<h4><?php esc_html_e('2. Global Sticky Element - sticks outsite the container, relative to page window', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('A single element can become sticky once it reaches the top of the page, and stay sticky even when you scroll past it\'s parent container.', 'divi-toolbox'); ?>&nbsp;<?php esc_html_e('This effect can be applied to only one element per page.', 'divi-toolbox'); ?>
					</p>
				</div>
				<div class="toolbox trigger css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_enable_sticky_js" type="checkbox" value="1" <?php checked( '1', $dtb_enable_sticky_js_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Use Global Sticky Element', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option to enable global sticky element.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				<div class="hide">
					<h5><?php esc_html_e('Global Sticky Element Selector', 'divi-toolbox'); ?></h5>
					
					<p><?php esc_html_e('Assign a CSS Class or ID of the sticky element, make sure your selector is unique (there is only one element on the page with the selector you\'re using).', 'divi-toolbox'); ?> <?php esc_html_e('Use dot if it\'s a classname or # symbol if it\'s an ID (.sampleClass or #sampleID)', 'divi-toolbox'); ?></p>
					<?php $dtb_sticky_class = !empty($dtb_sticky_class_val) ? $dtb_sticky_class_val : '#stick-this'; ?>
					<input type="text" name="dtb_sticky_class" value="<?php echo esc_attr($dtb_sticky_class);?>" placeholder="#stick-this" class="mb20"/>
					
					<h5><?php esc_html_e('"Push-Up" Element Selector (optional)', 'divi-toolbox'); ?></h5>
					<p><?php esc_html_e('You can assign a CSS Class or ID of the "push-up" element, which is located below the sticky element and will un-stick it upon scroll.', 'divi-toolbox'); ?></p>		
					<?php $dtb_sticky_pushup_class = !empty($dtb_sticky_pushup_class_val) ? $dtb_sticky_pushup_class_val : '.un-stick'; ?>
					<input type="text" name="dtb_sticky_pushup_class" value="<?php echo esc_attr($dtb_sticky_pushup_class);?>" placeholder=".un-stick"/>
						
				</div>
			</div>
		</div>
		
	</div>
</div>


<h2 class="tool-section"><?php esc_html_e('Protected Content', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Custom Password Protected Form', 'divi-toolbox'); ?></h3>	
			<div class="box-descr"><p><?php echo esc_html__("Enable this option if you'd like to edit the content and appearance of the form displayed for password protected website elements.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_enable_password" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_enable_password_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_general' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		
		<div class="toolbox trigger">
			<div class="box-title">
				<h3><?php esc_html_e('Add Image', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to add an image to the form.", "divi-toolbox"); ?></p></div>		
					
			</div>
			<div class="box-content minibox">
				<div class="checkbox">
					<input name="dtb_enable_password_image" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_enable_password_image_val) ); ?> />
				</div>
			</div>
		</div>
		<div class="hide">
			<div class="toolbox first nopad">
				<div class="box-title">
				</div>
				<div class="box-content upload">
					<input class="background_image" type="text" name="dtb_password_image" value="<?php echo esc_attr($dtb_password_image_val) ?>" />
					<input class="upload_image_button btn" type="button" value="Choose Image" />
				</div>
			</div>
		</div>
		
		
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Edit Form Content', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Define your custom message for the password protected form.", "divi-toolbox"); ?></p></div>		
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Form Title', 'divi-toolbox'); ?></h5>			
				<?php $dtb_password_title = !empty($dtb_password_title_val) ? $dtb_password_title_val : esc_attr_e('Password Protected Content', 'divi-toolbox'); ?>
				<input type="text" name="dtb_password_title" value="<?php echo esc_attr($dtb_password_title);?>" placeholder="Password Protected Content" class="mb20"/>
				
				
				<h5><?php esc_html_e('Form Message', 'divi-toolbox'); ?></h5>			
				<?php $dtb_password_message = !empty($dtb_password_message_val) ? $dtb_password_message_val : esc_attr_e('To view this protected post, enter the password below:', 'divi-toolbox'); ?>
				<textarea id="dtb_password_message" name="dtb_password_message" rows="2" type="textarea" placeholder="To view this protected post, enter the password below:" class="mb20"><?php echo esc_attr($dtb_password_message);?></textarea>
				
				<div class="dtb-two-cols">
					<div>
						<h5><?php esc_html_e('Input Field Placeholder', 'divi-toolbox'); ?></h5>			
						<?php $dtb_password_input = !empty($dtb_password_input_val) ? $dtb_password_input_val : esc_attr_e('Password', 'divi-toolbox'); ?>
						<input type="text" name="dtb_password_input" value="<?php echo esc_attr($dtb_password_input);?>" placeholder="Password" class="mb20"/>
					</div>
					
					<div>
						<h5><?php esc_html_e('Submit Button Value', 'divi-toolbox'); ?></h5>			
						<?php $dtb_password_submit = !empty($dtb_password_submit_val) ? $dtb_password_submit_val : esc_attr_e('Submit Password', 'divi-toolbox'); ?>
						<input type="text" name="dtb_password_submit" value="<?php echo esc_attr($dtb_password_submit);?>" placeholder="Submit Password" class="mb20"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
	
<h2 class="tool-section"><?php esc_html_e('Moving Particles', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Particles Background', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This options adds a moving particles background effect to any element.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_particles" type="checkbox" value="1" <?php checked( '1', $dtb_enable_particles_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_general' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to add moving particles as a background?', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('The effect can be applied to any row, section or even to a module.', 'divi-toolbox'); ?><br/><br/><?php esc_html_e('Navigate to Setting → Advanced tab → CSS ID & Classes → CSS ID and add one of the two IDs:', 'divi-toolbox'); ?> <strong>particles-bg1</strong> or <strong>particles-bg2</strong><br/><br/><?php esc_html_e('', 'divi-toolbox'); ?><?php printf(esc_html__('You can customize the effect of each of the two instances in the %s', 'divi-toolbox'), "<a href=".esc_url(admin_url( 'customize.php?autofocus[section]=dtb_general' ))." target=_blank>". esc_attr('Toolbox Customizer', 'divi-toolbox') ."</a>"); ?></p>
				</div>
			</div>
		</div>
		<div class="toolbox nopad">
			<div class="box-title">
			</div>
			<div class="box-content">	
				<div class="toolbox css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_particles_mobile_off" type="checkbox" value="1" <?php checked( '1', $dtb_particles_mobile_off_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Disable on Mobile', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option if you'd like to disable the Particles Background effect on smaller screen sizes.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
	
			</div>
		</div>
	</div>
</div>	

<h2 class="tool-section"><?php esc_html_e('Scrollbar', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Custom Browser Scrollbar', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this to change the default Scrollbar appearance. Works only in webkit-based browsers (eg. Chrome and Safari).", "divi-toolbox"); ?></p></div>			
	
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_scrollbar" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_scrollbar_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_general' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
</div>	

</div>



