<?php
	
function dtb_vb_layout_placeholder($id){
	$p = (get_post($id));
	echo '<div class="dtb_layout_placeholder"><h3>This is your layout <b>"'.esc_attr($p->post_name).'".</b> To edit it navigate to Divi Library.</h3></div>';
}
function dtb_display_layout($id){
	echo do_shortcode('[et_pb_section global_module="'.esc_attr($id).'"][/et_pb_section]');
}
function dtb_display_divi_section($id){
	
	if ( et_fb_is_enabled() && ( function_exists('et_builder_tb_enabled') && !et_builder_tb_enabled()) ) {
		dtb_vb_layout_placeholder(get_post($id));
	}
	elseif ( function_exists('et_builder_tb_enabled') && et_builder_tb_enabled()) {
		return;
	}
	else{
		dtb_display_layout($id);
	}
	
}

	
function dtb_after_content_layouts() {
	if ( ! is_page_template( 'page-template-blank.php' ) ) :

		$dtb_404_footer_val = dtb_get_option('dtb_404_footer');

		if(!($dtb_404_footer_val && is_404())){
			$dtb_footer_layout_val = dtb_get_option('dtb_footer_layout');
			if ( $dtb_footer_layout_val != '') {
				echo '<div id="dtb-before-footer">';
				dtb_display_divi_section($dtb_footer_layout_val);
				echo '</div>';
			}
			
			$dtb_after_footer_layout_val = dtb_get_option('dtb_after_footer_layout');
			if ( $dtb_after_footer_layout_val != '') {
				echo '<div id="dtb-after-footer">';
				dtb_display_divi_section($dtb_after_footer_layout_val);
				echo '</div>';
			}
		}
		
		$dtb_404_header_val = dtb_get_option('dtb_404_header');
		if(!($dtb_404_header_val && is_404())){
			$dtb_home_header_layout_val = dtb_get_option('dtb_home_header_layout');
			$dtb_before_header_layout_val = dtb_get_option('dtb_before_header_layout');
			if (( $dtb_home_header_layout_val != '') && is_front_page()) {
				echo '<div id="dtb-before-header">';
				dtb_display_divi_section($dtb_home_header_layout_val);
				echo '</div>';
			}
			
			elseif ( $dtb_before_header_layout_val != '') {
				echo '<div id="dtb-before-header">';
				dtb_display_divi_section($dtb_before_header_layout_val);
				echo '</div>';
			}
		}
		
				
	endif;
				
	$dtb_enable_popup_val = dtb_get_option('dtb_enable_popup');
	if ( $dtb_enable_popup_val == 1)  {
		$dtb_popup_number_val = dtb_get_option('dtb_popup_number');
		$dtb_popup1_layout_val = dtb_get_option('dtb_popup1_layout');
		$dtb_popup2_layout_val = dtb_get_option('dtb_popup2_layout');
		$dtb_popup3_layout_val = dtb_get_option('dtb_popup3_layout');
		$dtb_popup4_layout_val = dtb_get_option('dtb_popup4_layout');
		$dtb_popup5_layout_val = dtb_get_option('dtb_popup5_layout');
		
		if (( $dtb_popup_number_val == '1') || ( $dtb_popup_number_val == '2') || ( $dtb_popup_number_val == '3') || ( $dtb_popup_number_val == '4') || ( $dtb_popup_number_val == '5') ) { ?>
			<div id="popup1" class="mfp-hide mfp-fade">
				<?php 
					dtb_display_divi_section($dtb_popup1_layout_val);
				?>
			</div>
		<?php }
		if (( $dtb_popup_number_val == '2') || ( $dtb_popup_number_val == '3') || ( $dtb_popup_number_val == '4') || ( $dtb_popup_number_val == '5')) { ?>
			<div id="popup2" class="mfp-hide mfp-fade">
				<?php 
					dtb_display_divi_section($dtb_popup2_layout_val);
				?>
			</div>
		<?php }
		if (( $dtb_popup_number_val == '3') || ( $dtb_popup_number_val == '4') || ( $dtb_popup_number_val == '5')) { ?>
			<div id="popup3" class="mfp-hide mfp-fade">
				<?php 
					dtb_display_divi_section($dtb_popup3_layout_val);
				?>
			</div>
		<?php }
		if (( $dtb_popup_number_val == '4') || ( $dtb_popup_number_val == '5')) { ?>
			<div id="popup4" class="mfp-hide mfp-fade">
				<?php 
					dtb_display_divi_section($dtb_popup4_layout_val);
				?>
			</div>
		<?php }
		if ( $dtb_popup_number_val == '5') { ?>
			<div id="popup5" class="mfp-hide mfp-fade">
				<?php 
					dtb_display_divi_section($dtb_popup5_layout_val);
				?>
			</div>
		<?php }
	} 	
}
add_action('et_after_main_content', 'dtb_after_content_layouts');
function dtb_theme_builder_footer_enabled( $layout_id, $layout_enabled, $template_id ) {
	if ( !( 0 === $layout_id && $layout_enabled )) {
		dtb_after_content_layouts();
	}
}
add_action('et_theme_builder_template_after_footer', 'dtb_theme_builder_footer_enabled', 10, 3 );


function dtb_before_content_layouts() {	
	$dtb_404_header_val = dtb_get_option('dtb_404_header');
	if (( ! is_page_template( 'page-template-blank.php' ) ) && !(  is_404() && $dtb_404_header_val )) :
		$dtb_after_header_layout_val = dtb_get_option('dtb_after_header_layout');
		$dtb_archive_header_layout_val = dtb_get_option('dtb_archive_header_layout');
		$dtb_category_header_layout_val = dtb_get_option('dtb_category_header_layout');
		$dtb_author_header_layout_val = dtb_get_option('dtb_author_header_layout');
		$dtb_search_header_layout_val = dtb_get_option('dtb_search_header_layout');
		$dtb_shop_header_layout_val = dtb_get_option('dtb_shop_header_layout');
		$dtb_shop_cat_header_layout_val = dtb_get_option('dtb_shop_cat_header_layout');
		$dtb_product_header_layout_val = dtb_get_option('dtb_product_header_layout');
		$dtb_single_header_layout_val = dtb_get_option('dtb_single_header_layout');
		$dtb_404_layout_val = dtb_get_option('dtb_404_layout');
		$dtb_blog_index_layout_val = dtb_get_option('dtb_blog_index_layout');
		$dtb_homepage_after_header_layout_val = dtb_get_option('dtb_homepage_after_header_layout');


		if (( $dtb_category_header_layout_val != '') && is_category()) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_category_header_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_author_header_layout_val != '') && is_author())  {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_author_header_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_archive_header_layout_val != '') && is_archive()) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_archive_header_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_search_header_layout_val != '') && is_search()) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_search_header_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_single_header_layout_val != '') && is_singular( 'post' )) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_single_header_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_blog_index_layout_val != '') && ( !is_front_page() && is_home() )) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_blog_index_layout_val);
			echo '</div>';
		}
		elseif (( $dtb_homepage_after_header_layout_val != '') && is_front_page() ) {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_homepage_after_header_layout_val );
			echo '</div>';
		}
		elseif ( $dtb_after_header_layout_val != '') {
			echo '<div id="dtb-after-header">';
			dtb_display_divi_section($dtb_after_header_layout_val);
			echo '</div>';
		}
		
		elseif ( class_exists( 'WooCommerce' ) ) {
			if (( $dtb_shop_header_layout_val != '') && is_shop()) {
				echo '<div id="dtb-after-header">';
				dtb_display_divi_section($dtb_shop_header_layout_val);
				echo '</div>';
			}
			elseif (( $dtb_product_header_layout_val != '') && is_product()) {
				echo '<div id="dtb-after-header">';
				dtb_display_divi_section($dtb_product_header_layout_val);
				echo '</div>';
			}
		}
	endif;
}
add_action('et_before_main_content', 'dtb_before_content_layouts');