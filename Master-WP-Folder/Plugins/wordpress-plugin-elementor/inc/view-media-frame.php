<?php


// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_media_frame_view($classname = '', $insert_btn = false) {

	$avaliable_filters	= lmp_api_filters();
	$search_term		= lmp_old_value('jis_search_term');
	$current_page		= ( isset($_POST['jis_current_page']) && !empty($_POST['jis_current_page']) ) ? $_POST['jis_current_page'] : 1;
	$applied_filters	= false;

	if( isset($_POST['jis_search_term']) ):

		$applied_filters = array();

		foreach( $_POST as $filter_key => $filter_value ) {

			if( array_key_exists( $filter_key, $avaliable_filters ) ) {
				$applied_filters[$filter_key] = $filter_value;
			}
		}

		$results = lmp_search( $_POST['jis_search_term'], $applied_filters, $current_page );

	else:

		$results		= lmp_search(JIS_API_DEFAULT_SEARCH_TERM);
		$search_term	= JIS_API_DEFAULT_SEARCH_TERM;

	endif; // END if search_term is set


	$total		= ( $results && property_exists($results, 'total') ) ? $results->total : false;
	$pagination	= lmp_pagination_view($current_page, $applied_filters, $total);


	ob_start();

		echo '<div class="jis-content jis-media-frame ' . $classname . '">';

            echo '<div id="jis_modal" class="jis_modal__background jis-content--media-modal-background jis_modal__background--hidden">';
            echo '</div>';

            echo '<div class="jis_notice">';
            echo '</div>';

			echo '<form id="jumpstory-imagesearch-form" action="#jumpstory-image-search" method="post">';

				echo '<div id="jumpstory-imagesearch-filters" class="js_data">';
					echo json_encode($applied_filters);
				echo '</div>';

				echo '<div id="jumpstory-imagesearch-current-page" class="js_data">';
					echo $current_page;
				echo '</div>';

				echo '<div class="searchbar">';
					echo '<input class="searchbar__input" type="text" value="' . $search_term . '" name="jis_search_term" id="jumpstory-imagesearch-term">';
					echo '<button class="searchbar__submit" type="submit" title="' . __('Search', 'jumpstory-image-search') . '" />';
						echo '<img src="' . JIS_DIR_URI . '/assets/images/icon_lookingglass.svg" alt="" class="searchbar__icon">';
					echo '</button>';
				echo '</div>';


				echo '<div class="filters">';
					echo lmp_type_filter_view( $avaliable_filters, $total );
					echo lmp_filters_view( $avaliable_filters, $total );
				echo '</div>';


				echo '<div class="results">';

					echo '<div class="pagination pagination__top">';
						echo $pagination;
					echo '</div>';

					echo '<div id="jumpstory-imagesearch-results" class="results__list">';
						if( !is_wp_error($results) && property_exists($results, 'images') ) {
							echo lmp_search_results_view( $results->images );
						}elseif( defined('WP_DEBUG') && WP_DEBUG ) {
							echo '<pre>';
								var_dump($results);
							echo '</pre>';
						}else{
							echo $results->get_error_message();
						}
					echo '</div>';

					echo '<div class="pagination pagination__bottom pagination--hide_while_loading">';
						echo $pagination;
					echo '</div>';

					echo lmp_loader_elements('results__loading');
				echo '</div>'; // END .results
			echo '</form>';
		echo '</div>'; // END .jis-content

		$output = ob_get_contents();

	ob_end_clean();

	return $output;
}



function lmp_ajax_media_frame_view() {

	$classname	= ( isset($_POST['ajax_classname']) ) ? $_POST['ajax_classname'] : '';
	$insert_btn	= ( isset($_POST['ajax_insert_btn']) ) ? $_POST['ajax_insert_btn'] : false;

	echo lmp_media_frame_view( $classname, $insert_btn );
	exit();
}

add_action( 'wp_ajax_lmp_media_frame_view', 'lmp_ajax_media_frame_view' );

?>