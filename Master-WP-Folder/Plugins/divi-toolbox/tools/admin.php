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
	
	$dtb_layout_shortcode_val = dtb_get_option('dtb_layout_shortcode');
	$dtb_svg_uploads_val = dtb_get_option('dtb_svg_uploads');
	$dtb_ttf_uploads_val = dtb_get_option('dtb_ttf_uploads');
	$dtb_hide_projects_val = dtb_get_option('dtb_hide_projects');
	$dtb_rename_projects_val = dtb_get_option('dtb_rename_projects');
	$dtb_projects_singular_val = dtb_get_option('dtb_projects_singular');
	$dtb_projects_plural_val = dtb_get_option('dtb_projects_plural');
	$dtb_projects_slug_val = dtb_get_option('dtb_projects_slug');
	$dtb_project_category_slug_val = dtb_get_option('dtb_project_category_slug');
	$dtb_project_tag_slug_val = dtb_get_option('dtb_project_tag_slug');
	$dtb_projects_icon_val = dtb_get_option('dtb_projects_icon');
	

	
	$dtb_custom_login_val = dtb_get_option('dtb_custom_login');
	$dtb_login_link_type_val = dtb_get_option('dtb_login_link_type');
	$dtb_login_link_type_val = !empty($dtb_login_link_type_val) ? $dtb_login_link_type_val : 'no_url'; 
	$dtb_login_link_val = dtb_get_option('dtb_login_link');
	

$login_links = array(
	'no_url' => array(
		'name' => 'no_url',
		'value' => 'Do not change the URL'
	),
	'home_url' => array(
		'name' => 'home_url',
		'value' => 'Use the website homepage URL'
	),
	'other_url' => array(
		'name' => 'other_url',
		'value' => 'Use a different URL:'
	)
);

?>
<div id="admin" class="tool <?php echo $active_tab == 'admin' ? 'tool-active' : ''; ?>">

<h2 class="tool-section"><?php esc_html_e('Login Page', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Customize Login Page', 'divi-toolbox'); ?></h3>	
			
					
			<div class="box-descr"><p><?php printf(esc_html__("Enable this option if you'd like to edit the standard login page appearance using %s", "divi-toolbox"), '<a href=' . esc_attr(admin_url( 'customize.php?et_customizer_option_set=theme&autofocus[section]=dtb_general&url=' )) . rawurlencode( wp_login_url() ) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_custom_login" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_custom_login_val) ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?et_customizer_option_set=theme&autofocus[section]=dtb_general&url=' )) . rawurlencode( wp_login_url() ); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">
				<h3><?php esc_html_e('Login Logo URL', 'divi-toolbox'); ?></h3>			
				<div class="box-descr"><p><?php esc_html_e("You can change the URL of the logo image link (the default is WordPress.org website).", "divi-toolbox"); ?></p></div>		
			</div>
			<div class="box-content">
				<div class="menu-wrap">
					<?php foreach( $login_links as $login_link ) : ?>
						<div class="menu-item">
						<input type="radio"  name="dtb_login_link_type" value="<?php esc_attr_e( $login_link['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $login_link['name'] ); ?>" <?php checked( $dtb_login_link_type_val, esc_attr($login_link['name']) ); ?>  class="customradio"/>
						<label for="<?php echo esc_attr($login_link['name']); ?>"><?php echo esc_attr($login_link['value']); ?></label>
						</div>
					<?php endforeach;?>
				</div>
				
				<input type="text" name="dtb_login_link" value="<?php echo esc_url($dtb_login_link_val);?>" placeholder="https://"/>
			</div>
		</div>
	</div>
</div>	

<h2 class="tool-section"><?php esc_html_e('Shortcodes', 'divi-toolbox'); ?></h2>	
<div class="tool-wrap">
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Divi Layouts Shortcode', 'divi-toolbox'); ?></h3>
					
			<div class="box-descr"><p><?php esc_html_e("This option enables the possibility to display any layout from the Divi Library as a shortcode. You can display modules inside other modules, widgets, etc.", "divi-toolbox"); ?></p></div>			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_layout_shortcode" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_layout_shortcode_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<h4><?php esc_html_e('How to use the Shortcodes?', 'divi-toolbox'); ?></h4>
					<p>
						<?php echo esc_html_e('1. Save any Module, Row or Section in the Divi Library.', 'divi-toolbox'); ?><br/>
						<?php echo esc_html_e('2. Navigate to Divi → Divi Library.', 'divi-toolbox'); ?><br/>
						<?php echo esc_html_e('3. Copy the shortcode you\'ll see on the Layouts list, eg.', 'divi-toolbox'); ?> <strong>[showlayout id=123]</strong><br/>
						<?php echo esc_html_e('4. Paste the shortcode inside any module, widget or any other place on your website.', 'divi-toolbox'); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<h2 class="tool-section"><?php esc_html_e('Projects', 'divi-toolbox'); ?></h2>	
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Hide Projects', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("This options hides the Projects post type and corresponding page builder modules from the Dashboard view.", "divi-toolbox"); ?></p></div>			
			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_hide_projects" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_hide_projects_val) ); ?> />
			</div>
		</div>
	</div>
	
	<div class="toolbox trigger">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Rename Projects Post Type', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this option to change the Projects post name and slug.", "divi-toolbox"); ?></p></div>			
			

		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_rename_projects" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_rename_projects_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox">
			<div class="box-title">	
			</div>
			
			<div class="box-content">
				<h5><?php esc_html_e('Singular Name', 'divi-toolbox'); ?></h5>	
				<p><?php esc_html_e("Define the singular name of the post type.", "divi-toolbox"); ?></p>
				<?php $dtb_projects_singular = !empty($dtb_projects_singular_val) ? $dtb_projects_singular_val : esc_attr('Project', 'divi-toolbox'); ?>
				<input type="text" name="dtb_projects_singular" value="<?php echo esc_attr($dtb_projects_singular);?>" placeholder="Project" class="mb20"/>
				
				<h5><?php esc_html_e('Plural Name', 'divi-toolbox'); ?></h5>	
				<p><?php esc_html_e("Define the plural name of the post type.", "divi-toolbox"); ?></p>
				<?php $dtb_projects_plural = !empty($dtb_projects_plural_val) ? $dtb_projects_plural_val : esc_attr('Projects', 'divi-toolbox'); ?>
				<input type="text" name="dtb_projects_plural" value="<?php echo esc_attr($dtb_projects_plural);?>" placeholder="Projects" class="mb20"/>
				
				<h5><?php esc_html_e('Slug Name', 'divi-toolbox'); ?></h5>
				<p><?php esc_html_e("Define the slug of the post type (visible in the URL).", "divi-toolbox"); ?></p>
				<?php $dtb_projects_slug = !empty($dtb_projects_slug_val) ? $dtb_projects_slug_val : 'projects'; ?>
				<input type="text" name="dtb_projects_slug" value="<?php echo esc_attr($dtb_projects_slug);?>" placeholder="projects" class="mb20"/>
				
				<h5><?php esc_html_e('Category Slug Name', 'divi-toolbox'); ?></h5>
				<p><?php esc_html_e("Define the slug of the post type category (visible in the URL).", "divi-toolbox"); ?></p>
				<?php $dtb_project_category_slug = !empty($dtb_project_category_slug_val) ? $dtb_project_category_slug_val : 'project_category'; ?>
				<input type="text" name="dtb_project_category_slug" value="<?php echo esc_attr($dtb_project_category_slug);?>" placeholder="project_category" class="mb20"/>
				
				<h5><?php esc_html_e('Tag Archive Slug Name', 'divi-toolbox'); ?></h5>
				<p><?php esc_html_e("Define the slug of the post type tag archive (visible in the URL).", "divi-toolbox"); ?></p>
				<?php $dtb_project_tag_slug = !empty($dtb_project_tag_slug_val) ? $dtb_project_tag_slug_val : 'project_tag'; ?>
				<input type="text" name="dtb_project_tag_slug" value="<?php echo esc_attr($dtb_project_tag_slug);?>" placeholder="project_tag" class="mb20"/>
			</div>
			
		</div>
		<div class="toolbox nopad">
			<div class="box-title">
			<h3><?php esc_html_e('Change Dashboard Icon', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enter the name of the WordPress Dashicon. You can see the list of available icons on %s page.", "divi-toolbox"), '<a href="https://developer.wordpress.org/resource/dashicons" target=_blank>' . esc_attr('this', 'divi-toolbox') . '</a>' ); ?></p></div>			
			</div>
			<div class="box-content">
				<?php $dtb_projects_icon = !empty($dtb_projects_icon_val) ? $dtb_projects_icon_val : 'dashicons-admin-post'; ?>
				<input type="text" name="dtb_projects_icon" value="<?php echo esc_attr($dtb_projects_icon);?>" placeholder="dashicons-admin-post"/>
				<div class="info top-space">
					<h4><?php esc_html_e('Reseting Permalinks', 'divi-toolbox'); ?></h4>
					<p>
						<?php echo esc_html_e('Save the options and reload your Dashboard to see the change. In some cases, you might need to re-save your Permalinks structure to get the changes applied to existing projects. To do this, head over to Settings → Permalinks and click the Save Changes button.', 'divi-toolbox'); ?>
					</p>
				</div>
			</div>
		</div>
		
	</div>	
	
</div>

<h2 class="tool-section"><?php esc_html_e('File Types', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Allow SVG File Type Uploads', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Add SVG support in the WordPress Media Library.", "divi-toolbox"); ?></p></div>			
			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_svg_uploads" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_svg_uploads_val) ); ?> />
			</div>
		</div>
	</div>
	<div class="toolbox">
		<div class="box-title">
			<h3><span class="new">new</span><?php esc_html_e('Allow TTF and OTF Font Files Uploads', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Add TTF and OTF font files support in the Divi Builder.", "divi-toolbox"); ?></p></div>			
			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_ttf_uploads" type="checkbox" value="1" <?php checked( '1', esc_attr($dtb_ttf_uploads_val) ); ?> />
			</div>
		</div>
	</div>
</div>	



	

</div>



