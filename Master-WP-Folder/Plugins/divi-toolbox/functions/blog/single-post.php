<?php
	
	// Author Box
	$dtb_post_author = dtb_get_option('dtb_post_author');
	$dtb_author_avatar = get_option('dtb_author_avatar');
	if (($dtb_post_author != '') && (is_single())) {
		echo '<div class="dtb-author-box">';
		echo get_avatar( get_the_author_meta('email'), $dtb_author_avatar );
		echo '<div class="dtb-author-description">';
		the_author_posts_link();
		the_author_meta('description');
		echo '</div></div>';
	}
	
	// Prev Next Post Navigation
	$dtb_post_prev_next = dtb_get_option('dtb_post_prev_next');
	$dtb_post_prev_text_val = dtb_get_option('dtb_post_prev_text');
	$dtb_post_next_text_val = dtb_get_option('dtb_post_next_text');
	if (( $dtb_post_prev_next != '') && (is_single())) {
		global $post;
		?>
		<nav class="dtb-single-post-nav">
			<span class="single-nav-prev"> <?php previous_post_link('%link', '<span class="dtb-button"><i class="arrow">&lsaquo;</i> ' . esc_attr__($dtb_post_prev_text_val, 'divi-toolbox') . '</span> <h5>%title</h5>' ); ?></span>
			<span class="single-nav-next"><?php next_post_link( '%link', '<span class="dtb-button">' . esc_attr__($dtb_post_next_text_val, 'divi-toolbox') . ' <i class="arrow">&rsaquo;</i></span> <h5>%title</h5>' ); ?></span>
		</nav>
		<?php 
	}
	
	// Related Posts
	$dtb_post_related = dtb_get_option('dtb_post_related');
	$dtb_related_text = dtb_get_option('dtb_related_text') ?: 'Related Posts';
	$dtb_related_heading = dtb_get_option('dtb_related_heading') ?: 'h4';
	$dtb_related_number = get_option('dtb_customize_related_number') ?: '3';
	$related_first_image_thumbnail_val = et_get_option('divi_grab_image');
	if ( $dtb_post_related != '' && is_single() && get_post_type() == 'post') {
		global $post;
		if( $related_first_image_thumbnail_val ){
			include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/blog/index.php');
		}
		
		$categories = get_the_category($post -> ID);
		if ($categories){
			$category_ids = array();
			foreach($categories as $individual_category){
				$category_ids[] = $individual_category -> term_id;
				}
			$args = array(
				'category__in' => $category_ids,
				'post__not_in' => array($post -> ID),
				'showposts' => $dtb_related_number, // Number of related posts that will be shown.
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand'
				);
			$my_query = new wp_query($args);
			if ($my_query -> have_posts()) {
				$dtb_rel_posts = $my_query->posts;
				echo "<div class='dtb-related-posts'><" .esc_attr($dtb_related_heading). ">" . esc_attr($dtb_related_text, 'divi-toolbox') . "</" .esc_attr($dtb_related_heading). ">";
				echo "<ul id='dtb-related-posts-list'>";
					for ($x = 0; $x <= count($dtb_rel_posts) - 1 ; $x++) {
						$img = '';
						if(get_the_post_thumbnail_url($dtb_rel_posts[$x]->ID) != ''){
							$img = get_the_post_thumbnail_url($dtb_rel_posts[$x]->ID, 'et-pb-post-main-image');
							$thumbnail_id = get_post_thumbnail_id( $dtb_rel_posts[$x]->ID );
							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   

						} 
						elseif($related_first_image_thumbnail_val == 'on') {
							$img = dtb_first_image($dtb_rel_posts[$x]);
							$alt = dtb_first_image_alt($dtb_rel_posts[$x]);
						}
					?>
						<li>
						
						<a href="<?php echo esc_url(get_permalink($dtb_rel_posts[$x]->ID)); ?>">
						<span class="img-wrap"><img src="<?php echo esc_attr($img); ?>" <?php if (!empty($alt)) echo 'alt="'. esc_attr($alt) .'"' ?> /></span> 
						<strong><?php echo esc_attr($dtb_rel_posts[$x]->post_title); ?></strong>
						</a>
					</li>
					

				<?php
				} 	
				echo "</ul></div>";
			}
		}
	}