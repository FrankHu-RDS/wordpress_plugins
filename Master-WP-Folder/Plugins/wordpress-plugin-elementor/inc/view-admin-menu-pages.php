<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_jis_search_page_view() {

	$avaliable_filters	= lmp_api_filters();
	$search_term		= lmp_old_value('jis_search_term');
	$current_page		= ( isset($_POST['jis_current_page']) && !empty($_POST['jis_current_page']) ) ? $_POST['jis_current_page'] : 1;
	$results			= false;
	$applied_filters	= false;
	$account_info		= lmp_jumpstory_account_info();
	wp_enqueue_media();


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

	endif; // END if search_term is set


	echo '<div id="jis_admin_page_container" class="jis_content">';

		echo '<div id="jis_modal" class="jis_modal__background jis_modal__background--hidden">';
		echo '</div>';

		echo '<div class="jis_notice">';
		echo '</div>';

		echo '<div class="jis_content__header jis_header">';
		 	echo '<div class="jis_header__logo">';
				echo '<img src="' . JIS_DIR_URI . '/assets/images/logo_jumpstory.png' . '" alt="' . __('JumpStory', 'jumpstory-image-search') . '" srcset="' . JIS_DIR_URI . '/assets/images/logo_jumpstory.svg' . '" class="jis_header__img">';
			echo '</div>';


			echo '<div class="jis_account">';
				if( $account_info['success'] ) {
				    echo '<input type="hidden" id="user_logged_in" value="1">';
					echo '<div class="jis_account__user">';
						echo $account_info['name'];
					echo '</div>';
					echo '<a href="#" class="jis_account__logout_btn">';
						_e('Log out', 'jumpstory-image-search');
					echo '</a>';
				}
				else {
                    echo '<input type="hidden" id="user_logged_in" value="0">';
					echo '<div class="jis_account__connect_btn">';
						_e('Connect to JumpStory', 'jumpstory-image-search');
					echo '</div>';
				}
			echo '</div>';
		echo '</div>';


		if( !is_wp_error($results) ) :

			$total		= ( $results && property_exists($results, 'total') ) ? $results->total : false;
			$pagination	= lmp_pagination_view($current_page, $applied_filters, $total);

			echo '<form id="jumpstory-imagesearch-form" action="#jumpstory-image-search" method="post">';

				echo '<p id="jumpstory-imagesearch-filters" class="js_data">';
					echo json_encode($applied_filters);
				echo '</p>';

				echo '<p id="jumpstory-imagesearch-current-page" class="js_data">';
					echo $current_page;
				echo '</p>';

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
						if( is_object($results) && property_exists($results, 'images') ) {
							echo lmp_search_results_view( $results->images );
						}elseif( defined('WP_DEBUG') && WP_DEBUG ) {
							echo '<pre>';
								var_dump($results);
							echo '</pre>';
						}
					echo '</div>';

					echo '<div class="pagination pagination__bottom pagination--hide_while_loading">';
						echo $pagination;
					echo '</div>';

					echo lmp_loader_elements('results__loading');
				echo '</div>'; // END .results
			echo '</form>';
		else :
			echo $results->get_error_message();
		endif; // END else is_wp_error results

	echo '</div>'; // END .jis_content
    do_action('print_media_templates');
} // END function lmp_jis_search_page_view

?>