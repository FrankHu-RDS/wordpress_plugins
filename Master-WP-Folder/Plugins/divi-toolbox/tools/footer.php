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
	$dtb_footer_layout_val = dtb_get_option('dtb_footer_layout');
	$dtb_after_footer_layout_val = dtb_get_option('dtb_after_footer_layout');
	$dtb_sticky_footer_val = dtb_get_option('dtb_sticky_footer');
	$dtb_footer_reveal_val = dtb_get_option('dtb_footer_reveal');
	$dtb_custom_footer_enable_val = dtb_get_option('dtb_custom_footer_enable');
	$dtb_btt_val = dtb_get_option('dtb_btt');
	$dtb_btt_link_val = dtb_get_option('dtb_btt_link');
	$dtb_btt_url_val = dtb_get_option('dtb_btt_url');
	$dtb_footer_reveal_mobile_off_val = dtb_get_option('dtb_footer_reveal_mobile_off');
	?>
<div id="footer" class="tool <?php echo $active_tab == 'footer' ? 'tool-active' : ''; ?>">
	
	
<h2 class="tool-section"><?php esc_html_e('Sticky Footer', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			
			<h3><?php esc_html_e('Sticky Footer', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Move the footer to the bottom of browser window even if there isn't enough content to fill the page.", "divi-toolbox"); ?></p></div>			
			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_sticky_footer" type="checkbox" value="1" <?php checked( '1', $dtb_sticky_footer_val ); ?> />
			</div>
		</div>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Footer Reveal', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Footer Reveal Effect', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('The footer is hidden behind the page content and becomes visible once you scroll to the bottom of the page.', "divi-toolbox"); ?></p></div>			
			
	
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_footer_reveal" type="checkbox" value="1" <?php checked( '1', $dtb_footer_reveal_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first">
			<div class="box-title">
			</div>
			<div class="box-content">	
				<div class="toolbox css" style="padding:20px 0;">
					<div class="box-content minibox">
						<div class="on-off">
							<input name="dtb_footer_reveal_mobile_off" type="checkbox" value="1" <?php checked( '1', $dtb_footer_reveal_mobile_off_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Disable on Mobile', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option if you'd like to disable the Footer Reveal effect on smaller screen sizes.", 'divi-toolbox'); ?></p></div>
					</div>
				</div>
	
			</div>
		</div>
	</div>
</div>


<h2 class="tool-section"><?php esc_html_e('Footer Menu & Widgets', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Customize Footer Menu & Widgets', 'divi-toolbox'); ?></h3>
			
			
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to edit the footer elements appearance.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_footer')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
		
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_custom_footer_enable" type="checkbox" value="1" <?php checked( '1', $dtb_custom_footer_enable_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_footer' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
</div>


<h2 class="tool-section"><?php esc_html_e('Back to Top Button', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Back to Top Button Customization', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("You can customize the button appearance in", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_footer')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_btt" type="checkbox" value="1" <?php checked( '1', $dtb_btt_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_footer' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		<div class="toolbox trigger">
			<div class="box-title">
			<h3><?php esc_html_e('Use Custom Button Link', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('If enabled you can add custom link target.', "divi-toolbox"); ?></p></div>			
				
		
			</div>
			<div class="box-content minibox">
				<div class="checkbox">
					<input name="dtb_btt_link" type="checkbox" value="1" <?php checked( '1', $dtb_btt_link_val ); ?> />
				</div>
			</div>
		</div>
		<div class="hide">
			<div class="toolbox nopad">
				<div class="box-title">	
				</div>
				<div class="box-content">
					<h5><?php esc_html_e('Custom Button URL', 'divi-toolbox'); ?></h5>
					<p><?php esc_html_e('Define custom URL for the button (will be used instead of the scroll to the top function).', "divi-toolbox"); ?></p>		
					<?php $dtb_btt_url_val = !empty($dtb_btt_url_val) ? $dtb_btt_url_val : '#'; ?>
					<input type="text" name="dtb_btt_url" value="<?php echo esc_url($dtb_btt_url_val);?>"/>
				</div>
			</div>
		</div>
	</div>
</div>

			
<h2 class="tool-section"><?php esc_html_e('Custom Layouts', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Before Footer Layout', 'divi-toolbox'); ?></h3>
			
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally before the default Divi footer.', "divi-toolbox"); ?></p></div>			
		
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_footer_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_footer_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('After Footer Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally after the default Divi footer. Please note: it will be moved before the footer if Sticky Footer or Footer Reveal option is enabled.', "divi-toolbox"); ?></p></div>			
			
	
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_after_footer_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_after_footer_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
</div>		
</div>



