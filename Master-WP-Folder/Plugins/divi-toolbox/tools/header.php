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
	$dtb_before_header_layout_val = dtb_get_option('dtb_before_header_layout');
	$dtb_after_header_layout_val = dtb_get_option('dtb_after_header_layout');
	$dtb_archive_header_layout_val = dtb_get_option('dtb_archive_header_layout');
	$dtb_category_header_layout_val = dtb_get_option('dtb_category_header_layout');
	$dtb_author_header_layout_val = dtb_get_option('dtb_author_header_layout');
	$dtb_search_header_layout_val = dtb_get_option('dtb_search_header_layout');
	
	
	$dtb_menu_type_val = dtb_get_option('dtb_menu_type');
	
	$dtb_enable_menu_hover_val = dtb_get_option('dtb_enable_menu_hover');
	if((dtb_get_option('dtb_menu_type') != '') ){
			$dtb_enable_menu_hover_val = dtb_get_option('dtb_enable_menu_hover') ?: '1';
			
		}
		else {
			$dtb_enable_menu_hover_val = dtb_get_option('dtb_enable_menu_hover') ?: '0';
		}
		
		
		
	$dtb_submenu_val = dtb_get_option('dtb_submenu');
	$dtb_fixed_scroll_val = dtb_get_option('dtb_fixed_scroll');
	$dtb_fixed_scroll_offset_val = dtb_get_option('dtb_fixed_scroll_offset');
	$dtb_move_page_below_header_val = dtb_get_option('dtb_move_page_below_header');
	$dtb_logo_box_val = dtb_get_option('dtb_logo_box');
	$dtb_cta_link_val = dtb_get_option('dtb_cta_link');
	$dtb_cta_link_type_val = dtb_get_option('dtb_cta_link_type');
	$dtb_hide_top_fixed_val = dtb_get_option('dtb_modcustomize_hide_top_fixed');
	
	$dtb_fixed_logo_url_val = dtb_get_option('dtb_fixed_logo_url');
	$dtb_fixed_logo_val = dtb_get_option('dtb_fixed_logo');
	
	?>
<div id="header" class="tool <?php echo $active_tab == 'header' ? 'tool-active' : ''; ?>">
	

<?php		
// Store layouts views in array
$dtb_menus = array(
	'none' => array(
		'name' => 'none',
		'value' => 'None'
	),
	'menu1' => array(
		'name' => 'menu1',
		'value' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu1_hover.gif'
	),
	'menu2' => array(
		'name' => 'menu2',
		'value' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu2_hover.gif'
	),
	'menu3' => array(
		'name' => 'menu3',
		'value' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu3_hover.gif'
	),
	'menu4' => array(
		'name' => 'menu4',
		'value' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu4_hover.gif'
	)
);
$cta_links = array(
	'last_item' => array(
		'name' => 'last_item',
		'value' => 'Apply to the last menu item'
	),
	'first_item' => array(
		'name' => 'first_item',
		'value' => 'Apply to the first menu item'
	),
	'custom_class' => array(
		'name' => 'custom_class',
		'value' => 'Use a custom CSS class of "cta-link"'
	)
);
 ?>
<h2 class="tool-section"><?php esc_html_e('Main Navigation', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add Menu Hover Effects', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Enable this if you\'d like to Customize the hover animation of the default navigation and Menu modules.', 'divi-toolbox'); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_enable_menu_hover" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_enable_menu_hover_val) ); ?> />
			</div>
		</div>
	</div>
	
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Navigation Hover Effect Type', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php printf(esc_html__("Choose the hover effect for the Primary Navigation. You can easily customize the effect with %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_header')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?>. <?php esc_html_e('This applies to the default Divi navigation, if you\'d like to use the effect on the Menu or Fullwidth Menu module - use a custom CSS class of', 'divi-toolbox'); ?> <strong>dtb-menu</strong>.</p></div>			
				
			</div>
			<div class="box-content">
				<div class="menu-wrap"> 
				<?php foreach( $dtb_menus as $dtb_menu ) : ?>
					<div class="menu-item">
					<input type="radio"  name="dtb_menu_type" value="<?php esc_attr_e( $dtb_menu['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $dtb_menu['name'] ); ?>" <?php checked( $dtb_menu_type_val, $dtb_menu['name'] ); ?>  class="customradio"/>
					<label for="<?php echo esc_attr_e($dtb_menu['name']); ?>"><?php if ($dtb_menu['name'] != 'none') { ?><img src="<?php echo esc_attr_e($dtb_menu['value']); ?>" alt=""/><?php } else { ?> None (color change) <?php } ?></label>
					</div>
				<?php endforeach;?>
				</div>
			</div>
			<a class="dtb-cust-link dtb-visible" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_header' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
		</div>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Fixed Section', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">			
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Enable Custom Fixed Header', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Enable this if you\'d like to show a custom fixed header (always visible or slide-in after scroll).', 'divi-toolbox'); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_fixed_scroll" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_fixed_scroll_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			
			<div class="box-title">
				<h3><?php esc_html_e('Slide-In Header Scroll Offset', 'divi-toolbox'); ?></h3>			
				<div class="box-descr"><p><?php esc_html_e('Define the pixel value (of page scroll) for the fixed header to slide down', "divi-toolbox"); ?></p></div>			
			</div>
			<div class="box-content">
				<?php $dtb_fixed_scroll_offset = !empty($dtb_fixed_scroll_offset_val) ? $dtb_fixed_scroll_offset_val : 100; ?>
				<input type="number" name="dtb_fixed_scroll_offset" value="<?php echo esc_attr($dtb_fixed_scroll_offset);?>"/>
				<div class="info top-space">
					<h4><?php esc_html_e('1. Fixed (slide-in) header', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('This slide-down from the top effect can be applied to any section. Navigate to Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-fixed-header</strong><br/><br/>
					<?php esc_html_e('A section with this CSS class will slide down and stay fixed after user scrolls the number of pixels set in the "Scroll Offset" field.', 'divi-toolbox'); ?></p>
					<p>&nbsp;</p>
					<h4><?php esc_html_e('2. Fixed (always visible) header', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e('The standard (always fixed at the top of the page) effect can be applied to any section. Navigate to Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-fixed-always</strong><br/><br/>
					<?php esc_html_e('A section with this CSS class will stay fixed to the top of the browser window.', 'divi-toolbox'); ?> <?php esc_html_e('By default, your website content will be placed underneath the fixed section, but if you don\'t want the content to hide behind the header, you can enable the option to move it below the fixed section.', 'divi-toolbox'); ?></p>
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
							<input name="dtb_move_page_below_header" type="checkbox" value="1" <?php checked( '1', $dtb_move_page_below_header_val ); ?> />
						</div>
					</div>
					<div class="box-title">
						<div class="box-descr"><h5><?php esc_html_e('Move Page Content Below the Header', 'divi-toolbox'); ?></h5><p><?php esc_html_e('Enable this option to move the website content below the "Always Fixed" header section.', 'divi-toolbox'); ?></p></div>
					</div>
				</div>
	
			</div>
		</div>


	</div>
</div>



<h2 class="tool-section"><?php esc_html_e('Dropdown Menu', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">			
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Custom Dropdown Menu', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to show bubble-style submenu. You can change colors using %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_header')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_submenu" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_submenu_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_header' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			
			<div class="box-title">		
			</div>
			<div class="box-content">
				<div class="info">
					<p><?php esc_html_e('This applies to the default Divi navigation, if you\'d like to apply the same customizations to the Menu or Fullwidth Menu module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-menu</strong></p>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Call to Action', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add CTA Menu Button', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to change one of the Primary Menu items to a Call To Action Button. You can customize the button appearance using %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_header')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_cta_link" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_cta_link_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_header' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="menu-wrap menu-wrap2">
					<?php foreach( $cta_links as $cta_link ) : ?>
						<div class="menu-item">
						<input type="radio"  name="dtb_cta_link_type" value="<?php esc_attr_e( $cta_link['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $cta_link['name'] ); ?>" <?php checked( $dtb_cta_link_type_val, $cta_link['name'] ); ?>  class="customradio"/>
						<label for="<?php echo esc_attr($cta_link['name']); ?>"><?php echo esc_attr($cta_link['value']); ?></label>
						</div>
					<?php endforeach;?>
				</div>
				
				<div class="info">
					<h4><?php esc_html_e('CTA menu item using CSS class.', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e("If you'd like to apply this style to menu item, which is not first nor the last one, follow these steps:", 'divi-toolbox'); ?><br/>
					<?php esc_html_e('1. Navigate to Appearance -> Menus', 'divi-toolbox'); ?><br/>
					<?php esc_html_e('2. Click on the "Screen Options" button in the top right corner of the dashboard', 'divi-toolbox'); ?><br/>
					<?php esc_html_e('3. Make sure that the "CSS Classes" option is enabled', 'divi-toolbox'); ?><br/>
					<?php esc_html_e('4. Click on one of the menu items and add a CSS class of', 'divi-toolbox'); ?> <strong><?php esc_html_e('cta-link', 'divi-toolbox'); ?></strong><br/>
					<?php esc_html_e('5. Save your menu', 'divi-toolbox'); ?><br/><br/><b><?php esc_html_e('Please note:', 'divi-toolbox'); ?></b> <?php esc_html_e('This applies to the default Divi navigation, if you\'d like to apply the same customizations to the Menu or Fullwidth Menu module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-menu</strong></p>
				</div>
			</div>
		</div>
	</div>
</div>

	
<h2 class="tool-section"><?php esc_html_e('Header Logo', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Change Logo on Fixed Menu', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to show different logo image when navigation is fixed.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_fixed_logo" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_fixed_logo_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content upload">
				<input class="background_image" type="text" name="dtb_fixed_logo_url" value="<?php echo esc_attr($dtb_fixed_logo_url_val) ?>" />
				<input class="upload_image_button btn" type="button" value="Choose Image" />
			</div>
		</div>
	</div>
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Overlapping Logo Effect', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like your logo to overlap your navigation bar. You can customize the appearance in %s", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_logo')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_logo_box" type="checkbox" value="1" <?php checked( '1', $dtb_logo_box_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_logo' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>	
	<div class="hide">
		<div class="toolbox first nopad">
			
			<div class="box-title">		
			</div>
			<div class="box-content">
				<div class="info">
					<p><?php esc_html_e('This applies to the default Divi navigation, if you\'d like to apply the same customizations to the Menu or Fullwidth Menu module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-menu</strong></p>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Custom Layouts', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Before Navigation Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This layout will be displayed globally before the main header and navigation.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_before_header_layout">
					<option value="">----- <?php esc_html_e('None', 'divi-toolbox'); ?> -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_before_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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
			<h3><?php esc_html_e('After Navigation Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This layout will be displayed globally after the main header and navigation.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php	
				if ($layouts = get_posts($layout_query)) {
					?>
					<select name="dtb_after_header_layout">
					<option value="">----- <?php esc_html_e('None', 'divi-toolbox'); ?> -----</option>
					<?php
					foreach ($layouts as $layout) {
						echo '<option ' . selected(esc_attr($layout->ID), $dtb_after_header_layout_val, false) . ' value="' . esc_attr($layout->ID) . '">' . esc_attr($layout->post_title) . '</option>';
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


