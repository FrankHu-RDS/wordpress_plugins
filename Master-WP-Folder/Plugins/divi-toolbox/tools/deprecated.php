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
	
	
	
	$dtb_global_headings_val = dtb_get_option('dtb_global_headings');
	$dtb_instagram_url_val = dtb_get_option('dtb_instagram_url');
	$dtb_404_layout_val = dtb_get_option('dtb_404_layout');
	$dtb_404_footer_val = dtb_get_option('dtb_404_footer');
	$dtb_404_header_val = dtb_get_option('dtb_404_header');
	
	$dtb_home_header_layout_val = dtb_get_option('dtb_home_header_layout');
	$dtb_homepage_after_header_layout_val = dtb_get_option('dtb_homepage_after_header_layout');
	
	$dtb_archive_header_layout_val = dtb_get_option('dtb_archive_header_layout');
	$dtb_category_header_layout_val = dtb_get_option('dtb_category_header_layout');
	$dtb_author_header_layout_val = dtb_get_option('dtb_author_header_layout');
	$dtb_search_header_layout_val = dtb_get_option('dtb_search_header_layout');
	$dtb_single_header_layout_val = dtb_get_option('dtb_single_header_layout');
	$dtb_single_before_content_layout_val = dtb_get_option('dtb_single_before_content_layout');
	$dtb_single_after_content_layout_val = dtb_get_option('dtb_single_after_content_layout');
	$dtb_pricing_border_val = dtb_get_option('dtb_pricing_border');
	$dtb_overflow_hidden_val = dtb_get_option('dtb_overflow_hidden');
	$css_txt_center_mobile_val = dtb_get_option('css_txt_center_mobile');
	$css_center_mobile_val = dtb_get_option('css_center_mobile');
	$css_btn_center_mobile_val = dtb_get_option('css_btn_center_mobile');
	$css_full_height_val = dtb_get_option('css_full_height');
	
?>
<div id="deprecated" class="tool <?php echo $active_tab == 'deprecated' ? 'tool-active' : ''; ?>">
	
	
	<div class="toolbox" style="padding:0 0 30px;">
		<div class="info" style="background:transparent;">
			<h4><?php esc_html_e('What are the deprecated functions?', 'divi-toolbox'); ?></h4>
			<p><?php echo esc_html_e('On this page you\'ll  find a list of features, which are no longer required with the latest Divi version.', 'divi-toolbox'); ?><br/>
			<p><?php echo esc_html_e('This features continue to work, but using the new Divi theme options to achieve the same results is recommended.', 'divi-toolbox'); ?></p>
		</div>
	</div>		
		
	
	
<h2 class="tool-section first"><?php esc_html_e('Global', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Global Headings Style', 'divi-toolbox'); ?></h3>
					
			<div class="box-descr"><p><?php printf(esc_html__("Enable this option if you'd like to set global H1-H6 headings appearance using %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_general')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_global_headings" type="checkbox" value="1" <?php checked( '1', $dtb_global_headings_val ); ?> />
			</div>
		</div>
	</div>
	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Instagram Social Icon', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enter the URL to display the icon if \"Additional Social Icons\" option is enabled.", "divi-toolbox"); ?></p></div>
		</div>
		<div class="box-content">
			<input type="text" name="dtb_instagram_url" value="<?php echo esc_url($dtb_instagram_url_val);?>" placeholder="<?php esc_attr_e("Enter your URL to display the icon.", "divi-toolbox"); ?>"/>
		</div>
	</div>
</div>


<h2 class="tool-section"><?php esc_html_e('Error 404 page', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('No Results - Error 404 Page Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Choose the Divi Library layout to be displayed on "no results" 404 error pages.', "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_404_layout">
					<option value="none">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_404_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Hide the 404 Header', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This option will hide the header and navigation on 404 error pages.", "divi-toolbox"); ?></p></div>			
			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_404_header" type="checkbox" value="1" <?php checked( '1', $dtb_404_header_val ); ?> />
			</div>
		</div>
	</div>
	
	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Hide the 404 Footer', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This option will hide the footer and navigation on 404 error pages.", "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_404_footer" type="checkbox" value="1" <?php checked( '1', $dtb_404_footer_val ); ?> />
			</div>
		</div>
	</div>
</div>

	
<h2 class="tool-section"><?php esc_html_e('Custom Header Layouts', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Before Navigation - Homepage Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This layout will be displayed before the main header and navigation on the homepage only.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_home_header_layout">
					<option value="">----- <?php esc_html_e('None', 'divi-toolbox'); ?> -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_home_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('After Navigation - Homepage Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This layout will be displayed on the homepage after the main header and navigation.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_homepage_after_header_layout">
					<option value="">----- <?php esc_html_e('None', 'divi-toolbox'); ?> -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_homepage_after_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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

	
<h2 class="tool-section"><?php esc_html_e('Custom Blog Layouts', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox">
		<div class="box-title">
		<h3><?php esc_html_e('Single Post Header Layout - After Navigation', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally after the main header and navigation on every blog post.', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_single_header_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_single_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
		<h3><?php esc_html_e('Single Post - Before Content Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally before the content of every blog post. (since Divi 3.18.8)', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_single_before_content_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_single_before_content_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
		<h3><?php esc_html_e('Single Post - After Content Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally after the content of every blog post. (since Divi 3.18.8)', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_single_after_content_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_single_after_content_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Archives Header Layout - After Navigation', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally after the main header and navigation on archive pages.', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_archive_header_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_archive_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Categories Header Layout - After Navigation', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed globally after the main header and navigation on category archive pages.', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_category_header_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_category_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Author Pages Header Layout - After Navigation', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed after the main header and navigation on author archive pages.', "divi-toolbox"); ?></p></div>						
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_author_header_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_author_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Search Results Header Layout - After Navigation', 'divi-toolbox'); ?></h3>		
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed after the main header and navigation on search results pages.', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_search_header_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_search_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('Blog Index Page Header Layout - After Navigation', 'divi-toolbox'); ?></h3>		
			<div class="box-descr"><p><?php esc_html_e('This layout will be displayed after the main header and navigation on blog index page.', "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_blog_index_layout">
					<option value="">----- None -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_blog_index_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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


<h2 class="tool-section"><?php esc_html_e('Various Tweaks', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
		<div class="toolbox css first">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="dtb_pricing_border" type="checkbox" value="1" <?php checked( '1', $dtb_pricing_border_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<div class="box-descr"><h5><?php esc_html_e('Pricing Table', 'divi-toolbox'); ?></h5><p><?php esc_html_e('Remove the horizontal bottom border and bottom padding from the price container.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="dtb_overflow_hidden" type="checkbox" value="1" <?php checked( '1', $dtb_overflow_hidden_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<div class="box-descr"><h5><?php esc_html_e('Hide horizontal scrollbars', 'divi-toolbox'); ?></h5><p><?php esc_html_e('This option hides the unwanted horizontal scroll, which can appear on the website when there are elements with negative margins going outside of the row or section width.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>

</div>	

<h2 class="tool-section"><?php esc_html_e('CSS Classes', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_txt_center_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_txt_center_mobile_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('txt-center-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to the', 'divi-toolbox'); ?> <u><?php esc_html_e('Text Module', 'divi-toolbox'); ?></u> <?php esc_html_e('to center the text on mobile.', 'divi-toolbox'); ?> </p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_center_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_center_mobile_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('module-center-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to any', 'divi-toolbox'); ?> <u><?php esc_html_e('Module', 'divi-toolbox'); ?></u><?php esc_html_e(' to align it center on mobile.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_btn_center_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_btn_center_mobile_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('btn-center-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to the', 'divi-toolbox'); ?> <u><?php esc_html_e('parent container - Row or Section', 'divi-toolbox'); ?></u> <?php esc_html_e('to center the Button Module on mobile.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_full_height" type="checkbox" value="1" <?php checked( '1', $css_full_height_val ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('full-height', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Add this class to any element to change it's height to 100% of viewport height.", "divi-toolbox"); ?></p></div>			
		</div>
	</div>
</div>


</div>



