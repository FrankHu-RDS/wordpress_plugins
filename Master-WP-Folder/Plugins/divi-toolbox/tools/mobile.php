<?php
$menu_icons = array(
	'none' => array(
		'name' => 'none',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_none.gif'
	),
	'menu_icon1' => array(
		'name' => 'menu_icon1',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_1.gif'
	),
	'menu_icon2' => array(
		'name' => 'menu_icon2',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_2.gif'
	),
	'menu_icon3' => array(
		'name' => 'menu_icon3',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_3.gif'
	),
	'menu_icon4' => array(
		'name' => 'menu_icon4',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_4.gif'
	),
	'menu_icon5' => array(
		'name' => 'menu_icon5',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_5.gif'
	),
	'menu_icon6' => array(
		'name' => 'menu_icon6',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_6.gif'
	),
	'menu_icon7' => array(
		'name' => 'menu_icon7',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_7.gif'
	),
	'menu_icon8' => array(
		'name' => 'menu_icon8',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_8.gif'
	),
	'menu_icon9' => array(
		'name' => 'menu_icon9',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/menu_9.gif'
	)
);
	$dtb_mobile_breakpoint_val = dtb_get_option('dtb_mobile_breakpoint');
	$dtb_tablet_breakpoint_val = dtb_get_option('dtb_tablet_breakpoint');
	$dtb_phone_breakpoint_val = dtb_get_option('dtb_phone_breakpoint');
	$dtb_mobile_logo_url_val = dtb_get_option('dtb_mobile_logo_url');
	$dtb_mobile_logo_val = dtb_get_option('dtb_mobile_logo');
	$dtb_mobile_fixed_val = dtb_get_option('dtb_modcustomize_mobile_fixed');
	$dtb_mobile_top_val = dtb_get_option('dtb_modcustomize_mobile_top');
	$dtb_mobile_top_fixed_val = dtb_get_option('dtb_mobile_top_fixed');
	$dtb_enable_hamburger_icon_val = dtb_get_option('dtb_enable_hamburger_icon');
	$dtb_hamburger_icon_val = dtb_get_option('dtb_hamburger_icon', 'none');
	$dtb_mobile_nested_val = dtb_get_option('dtb_mobile_nested');
	$dtb_mobile_enable_val = dtb_get_option('dtb_mobile_enable');
   $dtb_enable_custom_m_menu_val = dtb_get_option('dtb_enable_custom_m_menu');
   $dtb_custom_m_menu_val = dtb_get_option('dtb_custom_m_menu');
	$css_reverse_columns_val = dtb_get_option('css_reverse_columns');
	$css_word_break_mobile_val = dtb_get_option('css_word_break_mobile');
	$css_no_word_break_mobile_val = dtb_get_option('css_no_word_break_mobile');
	$css_columns_mobile_val = dtb_get_option('css_columns_mobile');
	$css_columns_mobile_width_val = dtb_get_option('css_columns_mobile_width');
	$dtb_mobile_theme_color_enable_val = dtb_get_option('dtb_mobile_theme_color_enable');
	$dtb_mobile_theme_color_val = dtb_get_option('dtb_mobile_theme_color');
	$dtb_mobile_parallax_val = dtb_get_option('dtb_mobile_parallax');
	
	$dtb_m_mobile_trigger_val = dtb_get_option('dtb_m_mobile_trigger');
	$dtb_m_mobile_elements_logo = dtb_get_option('dtb_m_mobile_elements_logo');
	$dtb_m_mobile_elements_social = dtb_get_option('dtb_m_mobile_elements_social');
	$dtb_m_mobile_elements_search = dtb_get_option('dtb_m_mobile_elements_search');
	$dtb_m_mobile_elements_widgets = dtb_get_option('dtb_m_mobile_elements_widgets');
	$dtb_m_mobile_elements_cart = dtb_get_option('dtb_m_mobile_elements_cart');


?>
<div id="mobile" class="tool <?php echo $active_tab == 'mobile' ? 'tool-active' : ''; ?>">
	
<h2 class="tool-section"><?php esc_html_e('Mobile Browser', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Mobile Browser Theme Color', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to choose a theme color for mobile browsers (the address bar and header color).", "divi-toolbox"); ?></p></div>		
				
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_mobile_theme_color_enable" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_mobile_theme_color_enable_val) ); ?> />
			</div>
		</div>
	</div>
	
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<?php $dtb_mobile_theme_color = !empty($dtb_mobile_theme_color_val) ? $dtb_mobile_theme_color_val : '#ffffff'; ?>
				<input type="text" name="dtb_mobile_theme_color" value="<?php echo esc_attr($dtb_mobile_theme_color);?>" class="dtb-color-field"/>
			</div>
		</div>
	</div>
</div>

			
<h2 class="tool-section"><?php esc_html_e('Mobile Menu', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Mobile Menu Breakpoint', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Define the screen width, below which the header changes to mobile version. (By default it's 980px).", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content">
			<?php $dtb_mobile_breakpoint = !empty($dtb_mobile_breakpoint_val) ? $dtb_mobile_breakpoint_val : '980'; ?>
			<input style="margin-top:10px;" type="number" name="dtb_mobile_breakpoint" value="<?php echo esc_attr($dtb_mobile_breakpoint);?>"/>
		</div>
	</div>
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Custom Mobile Menu Style', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to edit the mobile menu appearance.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_mobile')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_mobile_enable" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_mobile_enable_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_mobile' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox trigger ico-trigger">
			<div class="box-title">
				<h3><span class="new">new</span><?php esc_html_e('Use a separate mobile menu with more styling options', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Check this option if you'd like to use a different menu version on mobile and enable additional styling options.", 'divi-toolbox'); ?></p></div>			
				
			</div>
			<div class="box-content minibox">
				<div class="checkbox">
					<input name="dtb_enable_custom_m_menu" type="checkbox" value="1" <?php checked( '1', $dtb_enable_custom_m_menu_val ); ?> />
				</div>
			</div>
			<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_mobile' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
		</div>

		<div class="hide">
			<div class="toolbox nopad">
				<div class="box-title"></div>			
				<div class="box-content">
					<h5><?php esc_html_e('Assign the Mobile Menu', 'divi-toolbox'); ?></h5>
					<?php $m_menus = wp_get_nav_menus();
						
						if($m_menus && count($m_menus)) {
							?>
							<p><?php esc_html_e("This menu will be used globally as the mobile menu. It can include different menu items than the desktop menu version.", "divi-toolbox"); ?></p>
							<select name="dtb_custom_m_menu">
							<option value="">----- <?php esc_html_e('Default', 'divi-toolbox'); ?> -----</option>
							<?php
							foreach ($m_menus as $m_menu) {
								echo '<option ' . selected(esc_attr($m_menu->slug), $dtb_custom_m_menu_val, false) . ' value="' . esc_attr($m_menu->slug) . '">' . esc_attr($m_menu->name) . '</option>';
							}
							echo '</select>';
							
						}
						else { ?>
							<p><?php printf(esc_html__("Sorry, it appears that you haven't created any menus yet. Navigate to Appearance -> %s and create a new menu.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'nav-menus.php')) . ' target=_blank>' . esc_html_e('Menus', 'divi-toolbox') . '</a>' ); ?></p>	
						<?php }
					?>
					
					
					<h5 class="top-space"><?php esc_html_e('Additional Mobile Menu Elements:', 'divi-toolbox'); ?></h5>
					<div><input type="checkbox" name="dtb_m_mobile_elements_logo" id="dtb_m_mobile_elements_logo" class="minicheckbox" value="1" <?php checked( '1', esc_attr($dtb_m_mobile_elements_logo) ); ?>><label class="minicheckbox" for="dtb_m_mobile_elements_logo"><?php echo esc_html_e('Website Logo'); ?></label></div>
					<div><input type="checkbox" name="dtb_m_mobile_elements_search" id="dtb_m_mobile_elements_search" class="minicheckbox" value="1" <?php checked( '1', esc_attr($dtb_m_mobile_elements_search) ); ?>><label class="minicheckbox" for="dtb_m_mobile_elements_search"><?php echo esc_html_e('Search Bar'); ?></label></div>
					<?php if ( class_exists( 'WooCommerce' ) ) { ?>
					<div><input type="checkbox" name="dtb_m_mobile_elements_cart" id="dtb_m_mobile_elements_cart" class="minicheckbox" value="1" <?php checked( '1', esc_attr($dtb_m_mobile_elements_cart) ); ?>><label class="minicheckbox" for="dtb_m_mobile_elements_cart"><?php echo esc_html_e('Shopping Cart Link'); ?></label></div>
					<?php } ?>
					<div><input type="checkbox" name="dtb_m_mobile_elements_social" id="dtb_m_mobile_elements_social" class="minicheckbox" value="1" <?php checked( '1', esc_attr($dtb_m_mobile_elements_social) ); ?>><label class="minicheckbox" for="dtb_m_mobile_elements_social"><?php echo esc_html_e('Social Icons'); ?></label></div>
					<div><input type="checkbox" name="dtb_m_mobile_elements_widgets" id="dtb_m_mobile_elements_widgets" class="minicheckbox" value="1" <?php checked( '1', esc_attr($dtb_m_mobile_elements_widgets) ); ?>><label class="minicheckbox" for="dtb_m_mobile_elements_widgets"><?php echo esc_html_e('Widget Areas'); ?></label></div>
					
					
					
					<div class="toolbox css" style="padding:20px 0;">
						<div class="box-content minibox">
							<div class="on-off">
								<input name="dtb_m_mobile_trigger" type="checkbox" value="1" <?php checked( '1', $dtb_m_mobile_trigger_val ); ?> />
							</div>
						</div>
						<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_mobile' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
						<div class="box-title">
							<div class="box-descr"><h5><?php esc_html_e('Use Custom Menu Trigger', 'divi-toolbox'); ?></h5><p><?php esc_html_e("Check this option if you'd like to replace the default hamburger icon with fixed button.", 'divi-toolbox'); ?></p></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="toolbox first nopad">
			
			<div class="box-title">		
			</div>
			<div class="box-content">
				<div class="info">
					<p><?php esc_html_e('The custom mobile menu styling applies to the default Divi navigation, if you\'d like to apply the same customizations to the Menu or Fullwidth Menu module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-menu</strong></p>
				</div>
			</div>
		</div>

	</div>
	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Change Logo on Mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to show different logo image on mobile.", "divi-toolbox"); ?></p></div>		
				
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_mobile_logo" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_mobile_logo_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content upload">
				<input class="background_image" type="text" name="dtb_mobile_logo_url" value="<?php echo esc_attr($dtb_mobile_logo_url_val) ?>" />
				<input class="upload_image_button btn" type="button" value="Choose Image" />
			</div>
		</div>
	</div>
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Enable Custom Hamburger Icon', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Enable this if you\'d like to customize the hamburger icon appearance and animation.', 'divi-toolbox'); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_enable_hamburger_icon" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_enable_hamburger_icon_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_mobile' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Hamburger Icon Click Effect', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Choose the animation style for the hamburger menu icon.", "divi-toolbox"); ?></p></div>			
			</div>
			<div class="box-content">
				<div class="hamburger-wrap">
				<?php foreach( $menu_icons as $menu_icon ) : ?>
					<div class="menu-item">
					<input type="radio"  name="dtb_hamburger_icon" value="<?php esc_attr_e( $menu_icon['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $menu_icon['name'] ); ?>" <?php checked( $dtb_hamburger_icon_val, $menu_icon['name'] ); ?>  class="customradio"/>
					<label for="<?php echo esc_attr_e($menu_icon['name']); ?>"><img src="<?php echo esc_attr_e($menu_icon['img']); ?>" alt=""/></label>
					</div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Collapse Nested Sub Menu', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to collapse the sub menu elements on mobile.", "divi-toolbox"); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_mobile_nested" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_mobile_nested_val) ); ?> />
			</div>
		</div>
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



<h2 class="tool-section"><?php esc_html_e('Mobile Columns', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Change Mobile Column Count', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this if you'd like to use custom CSS classes to change the number of columns for Tablets and Phones.", 'divi-toolbox'); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="css_columns_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_columns_mobile_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">
				<h3><span class="new">new</span><?php esc_html_e('Custom Columns Mobile Breakpoints', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Define the screen width, below which the custom column structure changes from Desktop to Tablet and from Tablet to Phone.", "divi-toolbox"); ?></p></div>			
			</div>
			<div class="box-content">
				<div class="dtb-two-cols">
					<div>
						<div class="box-descr"><h5><?php esc_html_e('Desktop / Tablet', 'divi-toolbox'); ?></h5></div>
						<?php $dtb_tablet_breakpoint = !empty($dtb_tablet_breakpoint_val) ? $dtb_tablet_breakpoint_val : '980'; ?>
						<input type="number" name="dtb_tablet_breakpoint" placeholder="980" value="<?php echo esc_attr($dtb_tablet_breakpoint);?>"/>
					</div>
					<div>
						<div class="box-descr"><h5><?php esc_html_e('Tablet / Phone', 'divi-toolbox'); ?></h5></div>
						<?php $dtb_phone_breakpoint = !empty($dtb_phone_breakpoint_val) ? $dtb_phone_breakpoint_val : '479'; ?>
						<input type="number" name="dtb_phone_breakpoint" placeholder="479" value="<?php echo esc_attr($dtb_phone_breakpoint);?>"/>
					</div>
				</div>
			</div>
		</div>
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use it:', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e("Add one (or two) of these classes to", 'divi-toolbox'); ?> <u><?php esc_html_e("Row Settings", 'divi-toolbox'); ?></u>:</p>
					<p>
					<strong><?php esc_html_e('tablet-two-cols', 'divi-toolbox'); ?></strong> - to display two columns on tablets<br/>
					<strong><?php esc_html_e('tablet-three-cols', 'divi-toolbox'); ?></strong> - to display three columns on tablets<br/>
					<strong><?php esc_html_e('tablet-four-cols', 'divi-toolbox'); ?></strong> - to display four columns on tablets<br/>
					<strong><?php esc_html_e('tablet-five-cols', 'divi-toolbox'); ?></strong> - to display five columns on tablets<br/>
					<strong><?php esc_html_e('tablet-six-cols', 'divi-toolbox'); ?></strong> - to display six columns on tablets<br/>
					<strong><?php esc_html_e('phone-two-cols', 'divi-toolbox'); ?></strong> - to display two columns on phones<br/>
					<strong><?php esc_html_e('phone-three-cols', 'divi-toolbox'); ?></strong> - to display three columns on phones<br/>
					<strong><?php esc_html_e('phone-four-cols', 'divi-toolbox'); ?></strong> - to display four columns on phones</p>
				</div>
			</div>
		</div><div class="toolbox trigger">
			<div class="box-title">
				<h3><span class="new">new</span><?php esc_html_e('Use Mixed Column Widths', 'divi-toolbox'); ?></h3>
				<div class="box-descr"><p><?php esc_html_e("Add CSS classes for different column widths, eg. one-third and two-thirds.", 'divi-toolbox'); ?></p></div>			
				
			</div>
			<div class="box-content minibox">
				<div class="checkbox">
					<input name="css_columns_mobile_width" type="checkbox" value="1" <?php checked( '1', esc_attr($css_columns_mobile_width_val) ); ?> />
				</div>
			</div>
		</div>
		<div class="hide">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('Additional CSS Classes:', 'divi-toolbox'); ?></h4>
					<p><?php esc_html_e("Add one (or two) of these classes to", 'divi-toolbox'); ?> <u><?php esc_html_e("Row Settings", 'divi-toolbox'); ?></u>:</p>
					<p>
					<strong><?php esc_html_e('tablet-2cols-1-2', 'divi-toolbox'); ?></strong> - two columns, one-third and two-thirds wide, on tablets<br/>
					<strong><?php esc_html_e('tablet-2cols-2-1', 'divi-toolbox'); ?></strong> - two columns, two-thirds and one-third wide, on tablets<br/>
					<strong><?php esc_html_e('tablet-2cols-1-3', 'divi-toolbox'); ?></strong> - two columns, one-fourth and three-fourths wide, on tablets<br/>
					<strong><?php esc_html_e('tablet-2cols-3-1', 'divi-toolbox'); ?></strong> - two columns, three-fourths and one-fourth wide, on tablets<br/>
					<strong><?php esc_html_e('phone-2cols-1-2', 'divi-toolbox'); ?></strong> - two columns, one-third and two-thirds wide, on phones<br/>
					<strong><?php esc_html_e('phone-2cols-2-1', 'divi-toolbox'); ?></strong> - two columns, two-thirds and one-third wide, on phones<br/>
					<strong><?php esc_html_e('phone-2cols-1-3', 'divi-toolbox'); ?></strong> - two columns, one-fourth and three-fourths wide, on phones<br/>
					<strong><?php esc_html_e('phone-2cols-3-1', 'divi-toolbox'); ?></strong> - two columns, three-fourths and one-fourth wide, on phones<br/>
				</div>
			</div>
		</div>
		
	</div>
</div>

	
<h2 class="tool-section"><?php esc_html_e('Parallax Background', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">		
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Enable Parallax Background Effect on Mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('This options enables the parallax background effect when viewed on mobile device. ', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox trigger-hide">
			<div class="checkbox">
				<input name="dtb_mobile_parallax" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_mobile_parallax_val) ); ?> />
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
					<p>
						<?php esc_html_e('Navigate to Section, Row or Module Setting → Advanced tab → CSS ID & Classes → CSS Class and add a&nbsp;custom class of:', 'divi-toolbox'); ?> <strong>dtb-mobile-parallax</strong><br/><br/>
						<?php esc_html_e('Add a background image and make sure the Parallax Effect is enabled. Both the "CSS Parallax" and the "True Parallax" option will be displayed as "True Parallax". Please note it\'s best to use this effect only sparingly as it may cause your page to be jumpy, especially on content- and image-heavy pages.', 'divi-toolbox'); ?></p>
				</div>
			</div>
		</div>
		
	</div>
</div>	

<h2 class="tool-section"><?php esc_html_e('CSS Classes', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title fullw">
			<h3><?php esc_html_e('Useful CSS Classes', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('To add a custom CSS class to any element - navigate to Settings → Advanced tab → CSS ID & Classes → CSS Class.', 'divi-toolbox'); ?></p></div>			
		</div>
	</div>
	<div class="toolbox css nopad">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_reverse_columns" type="checkbox" value="1" <?php checked( '1', esc_attr($css_reverse_columns_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('reverse-columns-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to the', 'divi-toolbox'); ?> <u><?php esc_html_e('Row Settings', 'divi-toolbox'); ?></u> <?php esc_html_e('to switch columns order on mobile.', 'divi-toolbox'); ?></p></div>
		</div>
	</div>
	<div class="toolbox css">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_word_break_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_word_break_mobile_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('word-break-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to any element to add hyphens, when word reaches the end of line. It will aplly to', 'divi-toolbox'); ?> <u><?php esc_html_e('element and all its children.', 'divi-toolbox'); ?></u></p></div>
		</div>
	</div>
	<div class="toolbox css last">
		<div class="box-content minibox">
			<div class="on-off">
				<input name="css_no_word_break_mobile" type="checkbox" value="1" <?php checked( '1', esc_attr($css_no_word_break_mobile_val) ); ?> />
			</div>
		</div>
		<div class="box-title">
			<h3><?php esc_html_e('no-word-break-mobile', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e('Add this class to any element to prevent words wrapping to a new line. It will aplly to', 'divi-toolbox'); ?> <u><?php esc_html_e('element and all its children.', 'divi-toolbox'); ?></u></p></div>
		</div>
	</div>
</div>



</div>



