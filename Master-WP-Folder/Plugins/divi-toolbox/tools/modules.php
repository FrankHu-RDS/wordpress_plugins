<?php

	$dtb_follow_the_mouse_val = dtb_get_option('dtb_follow_the_mouse');
	$dtb_slim_email_val = dtb_get_option('dtb_slim_email');
	$dtb_toggle_icon_val = dtb_get_option('dtb_toggle_icon');
	$dtb_sec_btn_val = dtb_get_option('dtb_sec_btn');
	$dtb_sec_btn_class_val = dtb_get_option('dtb_sec_btn_class');
	$css_vertical_align_val = dtb_get_option('css_vertical_align');
	$dtb_testimonial_photo_val = dtb_get_option('dtb_testimonial_photo');
	$dtb_custom_map_marker_val = dtb_get_option('dtb_custom_map_marker');
	$dtb_custom_map_marker_image_url_val = dtb_get_option('dtb_custom_map_marker_image_url');
	$dtb_enable_tilt_val = dtb_get_option('dtb_enable_tilt');
	$dtb_enable_rellax_val = dtb_get_option('dtb_enable_rellax');
	$dtb_rellax_mobile_off_val = dtb_get_option('dtb_rellax_mobile_off');
	$dtb_rellax_center_val = dtb_get_option('dtb_rellax_center');
	$dtb_enable_equal_height_val = dtb_get_option('dtb_enable_equal_height');
	$dtb_equal_height_blurb_val = dtb_get_option('dtb_equal_height_blurb');
	$dtb_equal_height_pricing_val = dtb_get_option('dtb_equal_height_pricing');
	$dtb_equal_height_quote_val = dtb_get_option('dtb_equal_height_quote');
	$dtb_equal_height_breakpoint_val = dtb_get_option('dtb_equal_height_breakpoint');
	
	$dtb_enable_typing_val = dtb_get_option('dtb_enable_typing');
	
?>
<div id="modules" class="tool <?php echo $active_tab == 'modules' ? 'tool-active' : ''; ?>">

	



<h2 class="tool-section"><?php esc_html_e('Typing Effect', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Typing Effect', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This options adds a typing effect, which you can use in Divi Builder modules.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_typing" type="checkbox" value="1" <?php checked( '1', $dtb_enable_typing_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_typing' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use the Typing Effect?', 'divi-toolbox'); ?></h4>
					<p>
						<?php echo esc_html_e('The effect works inside the Text Modules.', 'divi-toolbox'); ?>
						<br/><br/><?php esc_html_e('Navigate to Text Module Setting → Advanced tab → CSS ID & Classes → CSS Class and add a&nbsp;custom class of:', 'divi-toolbox'); ?> <strong>dtb-typing</strong><br/><br/><?php esc_html_e('', 'divi-toolbox'); ?><?php printf(esc_html__('You can customize the effect parameters in the %s', 'divi-toolbox'), "<a href=".esc_url(admin_url( 'customize.php?autofocus[section]=dtb_typing' ))." target=_blank>". esc_attr('Toolbox Customizer', 'divi-toolbox') ."</a>"); ?>.</p>
				</div>
			</div>
		</div>
		
	</div>
</div>



<h2 class="tool-section"><?php esc_html_e('Gallery and Portfolio', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Follow-The-Mouse Hover Effect', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to add a direction-aware overlay hover effect to Portfolio and Gallery modules. You can customize the overlay appearance in the %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_modules')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_follow_the_mouse" type="checkbox" value="1" <?php checked( '1', $dtb_follow_the_mouse_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_modules' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('3D Tilt', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable 3D Tilt Effect', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This options adds a 3D tilt effect on hover.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_tilt" type="checkbox" value="1" <?php checked( '1', $dtb_enable_tilt_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_tilt' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use the effect?', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('The effect can be applied to any row, section, or for the best results: any module.', 'divi-toolbox'); ?><br/><br/><?php esc_html_e('Navigate to Setting → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-tilt</strong><br/><br/><?php esc_html_e('', 'divi-toolbox'); ?><?php printf(esc_html__('You can customize the effect parameters in the %s', 'divi-toolbox'), "<a href=".esc_url(admin_url( 'customize.php?autofocus[section]=dtb_tilt' ))." target=_blank>". esc_attr('Toolbox Customizer', 'divi-toolbox') ."</a>"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>	


<h2 class="tool-section"><?php esc_html_e('Equal Height', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Equalize Modules\' Height', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Enable this to dynamically equalize modules\' height within a container.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_equal_height" type="checkbox" value="1" <?php checked( '1', $dtb_enable_equal_height_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use it?', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('First, select what type of modules should have the same height using the checkboxes below.', 'divi-toolbox'); ?><br/><br/><?php esc_html_e('Next, navigate to Row or Section Setting → Advanced tab → CSS ID & Classes → CSS Class and add a&nbsp;custom CSS class of:', 'divi-toolbox'); ?> <strong>dtb-equal-height</strong><br/><br/><?php esc_html_e('All selected modules within that container will have te same height (as long as they use the same Sizing and Spacing settings).', 'divi-toolbox'); ?></p>
				</div>
			</div>
		</div>
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">	
				<div class="toolbox css" style="padding:0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_equal_height_blurb" type="checkbox" value="1" <?php checked( '1', $dtb_equal_height_blurb_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Equal Blurbs Height', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option to equalize height of all Blurb modules.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				<div class="toolbox css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_equal_height_pricing" type="checkbox" value="1" <?php checked( '1', $dtb_equal_height_pricing_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Equal Pricing Tables Height', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option to equalize height of all Pricing Table modules.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				<div class="toolbox css" style="padding:0 0 20px;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_equal_height_quote" type="checkbox" value="1" <?php checked( '1', $dtb_equal_height_quote_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Equal Testimonials Height', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option to equalize height of all Testimonial modules.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				<h5><?php esc_html_e('Disable on Mobile', 'divi-toolbox'); ?></h5>
				<p>Define the screen width, below which the Modules will go back to standard height.</p>
				<?php $dtb_equal_height_breakpoint = !empty($dtb_equal_height_breakpoint_val) ? $dtb_equal_height_breakpoint_val : '479'; ?>
				<input type="number" name="dtb_equal_height_breakpoint" placeholder="479" value="<?php echo esc_attr($dtb_equal_height_breakpoint);?>"/>
	
			</div>
		</div>
	</div>
</div>	

	
<h2 class="tool-section"><?php esc_html_e('E-mail Optin', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Slim Inline E-mail Optin', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to change the default Optin Module structure to slim, inline version.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_slim_email" type="checkbox" value="1" <?php checked( '1', $dtb_slim_email_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to create a slim Email Optin?', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('To change the default Email Optin module into a slim version, navigate to Setting → Advanced tab → CSS ID & Classes → CSS Class and add one of the following CSS classes:', 'divi-toolbox'); ?> <br/><br/><strong>slim-optin1</strong> - <?php esc_html_e('for optins with single e-mail field.', 'divi-toolbox'); ?><br/><strong>slim-optin2</strong> - <?php esc_html_e('for optins with two input fields: name and e-mail.', 'divi-toolbox'); ?><br/><strong>slim-optin3</strong> - <?php esc_html_e('for optins with three input fields (eg. first name, last name and e-mail).', 'divi-toolbox'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>


<h2 class="tool-section"><?php esc_html_e('Buttons', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
		
			<h3><?php esc_html_e('Secondary Buttons', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to set additional global button styles using %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_modules')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_sec_btn" type="checkbox" value="1" <?php checked( '1', $dtb_sec_btn_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_modules' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Button CSS Class Name', 'divi-toolbox'); ?></h5>
				<p><?php esc_html_e("Define the custom CSS class you're going to use for the secondary button style.", "divi-toolbox"); ?></p>			
				<?php $dtb_sec_btn_class = !empty($dtb_sec_btn_class_val) ? $dtb_sec_btn_class_val : 'dtb-button'; ?>
				<input type="text" name="dtb_sec_btn_class" value="<?php echo esc_attr($dtb_sec_btn_class);?>" placeholder="dtb-button"/>
			</div>
		</div>
	</div>
</div>	


<h2 class="tool-section"><?php esc_html_e('Maps', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Use custom map marker', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to use custom image as map marker.", "divi-toolbox"); ?></p></div>		
				
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input id="dtb_custom_map_marker" name="dtb_custom_map_marker" type="checkbox" value="1" <?php checked( '1', $dtb_custom_map_marker_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content upload">
				<input class="background_image" type="text" name="dtb_custom_map_marker_image_url" value="<?php echo esc_url($dtb_custom_map_marker_image_url_val) ?>" />
				<input class="upload_image_button btn" type="button" value="Choose Image" />
			</div>
			
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info" style="padding-top:20px; margin-top:20px;">
					<p><b><?php esc_html_e('Please note:', 'divi-toolbox'); ?></b><br/>
					<?php esc_html_e("Your custom image should be the same size, as Divi‘s default map marker, which is 46px x 43px.", 'divi-toolbox'); ?></p>
				</div>
				
			</div>
		</div>
	</div>
</div>	
	
	
<h2 class="tool-section"><?php esc_html_e('Useful Tweaks', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox css first">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="dtb_toggle_icon" type="checkbox" value="1" <?php checked( '1', $dtb_toggle_icon_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<div class="box-descr"><h5><?php esc_html_e('Accordion & Toggle', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Change the default icon to animated triangle arrow.", "divi-toolbox"); ?></p></div>			
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="dtb_testimonial_photo" type="checkbox" value="1" <?php checked( '1', $dtb_testimonial_photo_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<div class="box-descr"><h5><?php esc_html_e('Testimonials', 'divi-toolbox'); ?></h5><p><?php esc_html_e('Move the portrait image below the testimonial content, next to the author name.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_vertical_align" type="checkbox" value="1" <?php checked( '1', $css_vertical_align_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_attr_e('vertical-align', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to the', 'divi-toolbox'); ?> <u><?php esc_html_e('Column', 'divi-toolbox'); ?></u> <?php esc_html_e('to vertically center modules inside that column ("Equal Column Heights" option need to be enabled in that Row).', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
</div>	



	
	
<h2 class="tool-section"><?php esc_html_e('Parallax Scroll', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Parallax Scrolling for Modules', 'divi-toolbox'); ?></h3>		
			<div class="box-descr"><p><?php esc_html_e('This options adds ten different scrolling speeds you can apply to any module to achieve beautiful and smooth parallax scrolling effect.', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_enable_rellax" type="checkbox" value="1" <?php checked( '1', $dtb_enable_rellax_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use the effect?', 'divi-toolbox'); ?></h4>
					
					<p><?php esc_html_e('The effect can be applied to any row, section, or for the best results: any module.','divi-toolbox'); ?><br/><br/><?php esc_html_e('Navigate to Setting → Advanced tab → CSS ID & Classes → CSS Class and add a preffered custom class. Negative value makes it move slower than regular scrolling. Positive value makes it scroll faster than regular.', 'divi-toolbox'); ?><br/><br/><?php esc_html_e('Available classes:', 'divi-toolbox'); ?><br/><br/><strong>scroll_speed_-10</strong> <strong>scroll_speed_-9</strong> <strong>scroll_speed_-8</strong> <strong>scroll_speed_-7</strong> <strong>scroll_speed_-6</strong> <strong>scroll_speed_-5</strong> <strong>scroll_speed_-4</strong> <strong>scroll_speed_-3</strong> <strong>scroll_speed_-2</strong> <strong>scroll_speed_-1</strong> <strong>scroll_speed_1</strong> <strong>scroll_speed_2</strong> <strong>scroll_speed_3</strong> <strong>scroll_speed_4</strong> <strong>scroll_speed_5</strong> <strong>scroll_speed_6</strong> <strong>scroll_speed_7</strong> <strong>scroll_speed_8</strong> <strong>scroll_speed_9</strong> <strong>scroll_speed_10</strong> <br/></p>
					<p><?php esc_html_e('For more subtle effect use of of the following classes (scroll speed between 2 and -2)', 'divi-toolbox'); ?><br/><br/><strong>scroll_speed_-1_8</strong> <strong>scroll_speed_-1_6</strong> <strong>scroll_speed_-1_4</strong> <strong>scroll_speed_-1_2</strong> <strong>scroll_speed_-0_8</strong> <strong>scroll_speed_-0_6</strong> <strong>scroll_speed_-0_4</strong> <strong>scroll_speed_-0_2</strong> <strong>scroll_speed_0_2</strong> <strong>scroll_speed_0_4</strong> <strong>scroll_speed_0_6</strong> <strong>scroll_speed_0_8</strong> <strong>scroll_speed_1_2</strong> <strong>scroll_speed_1_4</strong> <strong>scroll_speed_1_6</strong> <strong>scroll_speed_1_8</strong> <br/></p>
				</div>
				
				
				<div class="toolbox css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_rellax_mobile_off" type="checkbox" value="1" <?php checked( '1', $dtb_rellax_mobile_off_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Disable on Mobile','divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option if you'd like to disable the parallax scrolling on smaller screen sizes.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
				
				
				<div class="toolbox css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_rellax_center" type="checkbox" value="1" <?php checked( '1', $dtb_rellax_center_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Center in viewport','divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option if you'd like to center the elements in the middle of the viewport.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
	
			</div>
		</div>
	</div>
</div>

</div>



