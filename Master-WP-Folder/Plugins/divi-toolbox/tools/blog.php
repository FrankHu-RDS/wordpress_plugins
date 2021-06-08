<?php
$blog_layouts = array(
	'blog_default' => array(
		'name' => 'blog_default',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_default.svg'
	),
	'blog_grid_1' => array(
		'name' => 'blog_grid_1',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_grid_1.svg'
	),
	'blog_grid_2' => array(
		'name' => 'blog_grid_2',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_grid_2.svg'
	),
	'blog_grid_3' => array(
		'name' => 'blog_grid_3',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_grid_3.svg'
	),
	'blog_list_1' => array(
		'name' => 'blog_list_1',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_list_1.svg'
	),
	'blog_list_2' => array(
		'name' => 'blog_list_2',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_list_2.svg'
	),
	'blog_list_3' => array(
		'name' => 'blog_list_3',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_list_3.svg'
	),
	'blog_overlap_1' => array(
		'name' => 'blog_overlap_1',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_overlap_1.svg'
	),
	'blog_overlap_2' => array(
		'name' => 'blog_overlap_2',
		'img' => DTB_TOOLBOX_PLUGIN_URI .'/assets/img/blog_overlap_2.svg'
	)
);
	$layout_query = array(
	'post_type'=>'et_pb_layout',
	'posts_per_page'=>-1,
	'meta_query' => array(
		array(
		'key' => '_et_pb_predefined_layout',
		'compare' => 'NOT EXISTS')
		)
	);
	
	$headings = array("h2","h3","h4","h5","h6");
	

	
	$dtb_readmore_text_enable_val = dtb_get_option('dtb_readmore_text_enable');
	$dtb_readmore_text_val = dtb_get_option('dtb_readmore_text');
	$dtb_post_fullwidth_val = dtb_get_option('dtb_post_fullwidth');
	$dtb_post_sidebar_layout_val = dtb_get_option('dtb_post_sidebar_layout');
	$dtb_sidebar_styles_val = dtb_get_option('dtb_sidebar_styles');
	$dtb_archive_styles_val = dtb_get_option('dtb_archive_styles');
	$dtb_comments_styles_val = dtb_get_option('dtb_comments_styles');
	$dtb_comments_text_val = dtb_get_option('dtb_comments_text');
	$dtb_post_meta_val = dtb_get_option('dtb_post_meta');
	$dtb_hide_post_title_val = dtb_get_option('dtb_hide_post_title');
	$dtb_post_author_val = dtb_get_option('dtb_post_author');
	$dtb_post_prev_next_val = dtb_get_option('dtb_post_prev_next');
	$dtb_post_related_val = dtb_get_option('dtb_post_related');
	$dtb_related_text_val = dtb_get_option('dtb_related_text');
	$dtb_related_heading_val = dtb_get_option('dtb_related_heading') ?: 'h4';
	$dtb_sidebar_archive_val = dtb_get_option('dtb_sidebar_archive');
	$dtb_blog_layout_val = dtb_get_option('dtb_blog_layout', 'blog_default');
	$dtb_blog_index_layout_val = dtb_get_option('dtb_blog_index_layout');
	$dtb_post_prev_text_val = dtb_get_option('dtb_post_prev_text');
	$dtb_post_next_text_val = dtb_get_option('dtb_post_next_text');

	
?>
<div id="blog" class="tool <?php echo $active_tab == 'blog' ? 'tool-active' : ''; ?>">
	

<h2 class="tool-section"><?php esc_html_e('Blog Post Lists', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Custom Post Meta', 'divi-toolbox'); ?> </h3>
			<div class="box-descr"><p> <?php esc_html_e('Add icons and customize the post meta info (post author, category, date etc)', 'divi-toolbox'); ?></p></div>
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_post_meta" type="checkbox" value="1" <?php checked( '1', $dtb_post_meta_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3> <?php esc_html_e('Customize Archives, Categories & Blog List', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to edit the default categories and archive pages.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_blog')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_archive_styles" type="checkbox" value="1" <?php checked( '1', $dtb_archive_styles_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			
			<div class="box-title">		
			</div>
			<div class="box-content">
				<div class="info">
					<p><b><?php esc_html_e('Please note:', 'divi-toolbox'); ?></b><br/><?php esc_html_e('This applies to the default Divi index pages (categories, archives etc.). If you\'d like to apply the same customizations to Blog module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-blog</strong></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="toolbox">
		<div class="box-title">
			<h3> <?php esc_html_e('Blog List Layout', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Choose the layout for Archive, Categories, Author, Tags & Search results pages.", "divi-toolbox"); ?> <?php esc_html_e("Use a custom CSS class of", "divi-toolbox"); ?> <b>dtb-blog</b> <?php esc_html_e("if you'd like to apply the same layout to the Blog module.", "divi-toolbox"); ?></p></div>
		</div>
		<div class="box-content">
			<div class="preloader-wrap blog-layouts">
			<?php foreach( $blog_layouts as $blog_layout ) : ?>
				<div class="menu-item">
				<input type="radio"  name="dtb_blog_layout" value="<?php esc_attr_e( $blog_layout['name'], 'divi-toolbox' ); ?>" id="<?php esc_attr_e( $blog_layout['name'] ); ?>" <?php checked( $dtb_blog_layout_val, $blog_layout['name'] ); ?>  class="customradio"/>
				<label for="<?php echo esc_attr($blog_layout['name']); ?>"><img src="<?php echo esc_url($blog_layout['img']); ?>" alt=""/></label>
				</div>
			<?php endforeach;?>
			</div>
		</div>
	</div>
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Change "Read More" Button Text', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__('Enable this to globally edit the "Read More" button text.', 'divi-toolbox'), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_blog')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_readmore_text_enable" type="checkbox" value="1" <?php checked( '1', $dtb_readmore_text_enable_val ); ?> />
			</div>
		</div>
	</div>
	<div class="hide">
		<div class="toolbox nopad">
			<div class="box-title">		
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('"Read More" Button Text', 'divi-toolbox'); ?></h5>
				<p><?php esc_html_e('Define the "Read More" button text for Blog Modules and archives.', "divi-toolbox"); ?></p>	
				<?php $dtb_readmore_text = !empty($dtb_readmore_text_val) ? $dtb_readmore_text_val : esc_attr('Read More', 'divi-toolbox'); ?>
				<input type="text" name="dtb_readmore_text" value="<?php echo esc_attr__($dtb_readmore_text);?>"/>
				
			</div>
		</div>
	</div>
</div>

	

<h2 class="tool-section"><?php esc_html_e('Sidebar', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">	
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Customize Sidebar & Widgets', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to edit the default sidebar appearance.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_blog')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_sidebar_styles" type="checkbox" value="1" <?php checked( '1', $dtb_sidebar_styles_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			
			<div class="box-title">		
			</div>
			<div class="box-content">
				<div class="info">
					<p><b><?php esc_html_e('Please note:', 'divi-toolbox'); ?></b><br/><?php esc_html_e('This applies to the default Divi sidebar on the index pages (categories, archives etc.). If you\'d like to apply the same customizations to Sidebar module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-sidebar</strong></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Hide Archives Sidebar', 'divi-toolbox'); ?></h3>
			<div class="box-descr"><p><?php esc_html_e("Enable this to hide sidebar on all archive pages.", "divi-toolbox") ?></p></div>
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_sidebar_archive" type="checkbox" value="1" <?php checked( '1', $dtb_sidebar_archive_val ); ?> />
			</div>
		</div>
	</div>
</div>
	
	
<h2 class="tool-section"><?php esc_html_e('Single Post', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Change Single Post Layout', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('This option globally changes the single post layout.', "divi-toolbox") ?></p></div>			
		</div>
		<div class="box-content">
			<select name="dtb_post_sidebar_layout">
				<?php $dtb_post_sidebar_layout = !empty(dtb_get_option('dtb_post_sidebar_layout')) ? dtb_get_option('dtb_post_sidebar_layout') : 'right'; ?>
				<option <?php selected($dtb_post_sidebar_layout_val, "right");?> value="right">Right Sidebar</option>
				<option <?php selected($dtb_post_sidebar_layout_val, "left");?> value="left">Left Sidebar</option>
				<option <?php selected($dtb_post_sidebar_layout_val, "fullwidth");?> value="fullwidth">Fullwidth</option>
			</select>
		</div>
	</div>
	<div class="toolbox">
		<div class="box-title">
			<h3><?php esc_html_e('Hide Post Title', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('Hide the post title globally on every blog post.', "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_hide_post_title" type="checkbox" value="1" <?php checked( '1', $dtb_hide_post_title_val ); ?> />
			</div>
		</div>
	</div>
	<div class="toolbox ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add Author Box', 'divi-toolbox'); ?></h3>						
			<div class="box-descr"><p><?php esc_html_e('Enable this to add an author box below the post content.', "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_post_author" type="checkbox" value="1" <?php checked( '1', $dtb_post_author_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<!-- ///////////////////////////////// -->
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add Prev/Next Posts Links', 'divi-toolbox'); ?></h3>			
			<div class="box-descr"><p><?php esc_html_e('Enable this to add previous and next post links globally to each post.', "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_post_prev_next" type="checkbox" value="1" <?php checked( '1', $dtb_post_prev_next_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">		
			</div>
			<div class="box-content">
				
				<div class="dtb-two-cols">
					<div>
						<h5><?php esc_html_e('Previous button text', 'divi-toolbox'); ?></h5>			
						<?php $dtb_post_prev_text = !empty($dtb_post_prev_text_val) ? $dtb_post_prev_text_val : esc_attr__('Previous', 'divi-toolbox'); ?>
						<input type="text" name="dtb_post_prev_text" value="<?php echo esc_attr($dtb_post_prev_text);?>" placeholder="Previous"/>
					</div>
					<div>
						<h5><?php esc_html_e('Next button text', 'divi-toolbox'); ?></h5>
						<?php $dtb_post_next_text = !empty($dtb_post_next_text_val) ? $dtb_post_next_text_val : esc_attr__('Next', 'divi-toolbox'); ?>
						<input type="text" name="dtb_post_next_text" value="<?php echo esc_attr($dtb_post_next_text);?>" placeholder="Next"/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Add Related Posts', 'divi-toolbox'); ?></h3>						
			<div class="box-descr"><p><?php esc_html_e('This option adds related posts section below the post content, which displays random posts from the same category.', "divi-toolbox"); ?></p></div>			
			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_post_related" type="checkbox" value="1" <?php checked( '1', $dtb_post_related_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	<div class="hide">
		<div class="toolbox first nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				
				<div class="dtb-two-cols">
					<div>
						<h5><?php esc_html_e('Related Posts Section Title', 'divi-toolbox'); ?></h5>			
						<p><?php esc_html_e('Define your header for "Related Posts" section', "divi-toolbox"); ?></p>			
						<?php $dtb_related_text = !empty($dtb_related_text_val) ? $dtb_related_text_val : esc_attr__('Related Posts', 'divi-toolbox'); ?>
						<input type="text" name="dtb_related_text" value="<?php echo esc_attr($dtb_related_text);?>" placeholder="Related Posts" class="mb20"/>
					</div>
					<div>
						<h5><?php esc_html_e('Related Posts Heading Level', 'divi-toolbox'); ?></h5>
						<p><?php esc_html_e("Choose the heading level for the Related Posts section title", 'divi-toolbox'); ?></p>
						<select name="dtb_related_heading">
							<?php foreach ($headings as $heading) {
							echo '<option ' . selected(esc_attr($heading), $dtb_related_heading_val, false) . ' value="' . esc_attr($heading) . '">' . esc_attr($heading) . '</option>';
							} ?>
						</select>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>


	
<h2 class="tool-section"><?php esc_html_e('Comments', 'divi-toolbox'); ?></h2>
<div class="tool-wrap">
	<div class="toolbox trigger ico-trigger">
		<div class="box-title">
			<h3><?php esc_html_e('Customize Comments Form', 'divi-toolbox'); ?></h3>	
			<div class="box-descr"><p><?php printf(esc_html__("Enable this if you'd like to use the %s to change the default comment form appearance.", "divi-toolbox"), '<a href=' . esc_url(admin_url( 'customize.php?autofocus[section]=dtb_blog')) . ' target=_blank>' . esc_attr('Toolbox Customizer', 'divi-toolbox') . '</a>' ); ?></p></div>			
		</div>
		<div class="box-content minibox">
			<div class="checkbox">
				<input name="dtb_comments_styles" type="checkbox" value="1" <?php checked( '1', $dtb_comments_styles_val ); ?> />
			</div>
		</div>
		<a class="dtb-cust-link" href="<?php echo esc_attr(admin_url( 'customize.php?autofocus[section]=dtb_blog' )); ?>" target="_blank"><?php include( DTB_TOOLBOX_PLUGIN_DIR. '/assets/img/gear-icon.php' );?></a>
	</div>
	
	<div class="hide">
		<div class="toolbox nopad">
			<div class="box-title">
			</div>
			<div class="box-content">
				<div class="info">
					<p><b><?php esc_html_e('Please note:', 'divi-toolbox'); ?></b> <?php esc_html_e('This applies to the default Divi theme comments, if you\'d like to apply the same customizations to the Comments module, please navigate to module Settings → Advanced tab → CSS ID & Classes → CSS Class and add a custom class of:', 'divi-toolbox'); ?> <strong>dtb-comments</strong></p>
				</div>
			</div>
		</div>

		<div class="toolbox first nopad">
			<div class="box-title">			
			</div>
			<div class="box-content">
				<h5><?php esc_html_e('Comments Title', 'divi-toolbox'); ?></h5>			
				<p><?php esc_html_e('Change the default text before the comment form.', "divi-toolbox"); ?></p>	
				<?php $dtb_comments_text = !empty($dtb_comments_text_val) ? $dtb_comments_text_val : esc_attr__('Submit a Comment', 'divi-toolbox'); ?>
				<input type="text" name="dtb_comments_text" value="<?php echo esc_attr($dtb_comments_text); ?>" placeholder="Submit a Comment"/>
			</div>
		</div>		
		
		
	</div>
</div>	
	

</div>



