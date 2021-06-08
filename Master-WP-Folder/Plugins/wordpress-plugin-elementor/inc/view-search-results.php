<?php

function lmp_search_results_view( $images = false, $insert_btn = false ) {

	ob_start();

		// Search results
		if( $images && !empty($images) ):

			$jis_allowed_html	= array(
				'span' => array(
					'class'		=> array()
				)
			);

			echo '<div class="media_sizer"></div>';

			foreach( $images as $item ) {

				if( is_object($item) ) {

					$media_id		= ( property_exists($item, 'id') )				? $item->id : false;
					$media_type		= ( property_exists($item, 'type') )			? $item->type : false;
					$thumbnail_url	= ( property_exists($item, 'thumbnail_url') )	? $item->thumbnail_url : '';

					$preview_url	= ( property_exists($item, 'small_video') )		? $item->small_video : false;
					$media_title	= ( property_exists($item, 'title') )			? $item->title : '';
					$media_duration	= ( property_exists($item, 'duration') )		? $item->duration : '';

					$media_caption	= ( property_exists($item, 'caption') )			? $item->caption : '';
					$media_location	= ( property_exists($item, 'location') )		? $item->location : '';

				}elseif( is_array($item) ) {

					$media_id		= ( array_key_exists('id', $item) )				? $item['id'] : false;
					$media_type		= ( array_key_exists('type', $item) )			? $item['type'] : false;
					$thumbnail_url	= ( array_key_exists('thumbnail_url', $item) )	? $item['thumbnail_url'] : '';

					$preview_url	= ( array_key_exists('small_video', $item) )	? $item['small_video'] : false;
					$media_title	= ( array_key_exists('title', $item) )			? $item['title'] : '';
					$media_duration	= ( array_key_exists('duration', $item) )		? $item['duration'] : '';

					$media_caption	= ( array_key_exists('caption', $item )	)		? $item['caption'] : '';
					$media_location	= ( array_key_exists('location', $item) )		? $item['location'] : '';
				}else {

					$media_id		= false;
					$media_type		= false;
					$thumbnail_url	= '';

					$preview_url	= false;
					$media_title	= '';
					$media_duration	= '';

					$media_caption	= '';
					$media_location	= '';
				}



				echo '<div class="media" id="media-' . $media_id . '">';
					echo '<img src="' . $thumbnail_url . '" alt="' . $media_caption . '" class="media__thumbnail">';

					echo '<div class="media__details ">';

						echo '<div class="media__controls">';

							if( $preview_url ) {
								echo '<div class="media__btn media__video_preview_btn" data-media-type="' . $media_type . '" data-preview-url="' . $preview_url . '" data-media-title="' . $media_title . '" data-media-duration="' . $media_duration . '">';
									echo '<span class="preview__icon preview__icon--video dashicons dashicons-controls-play"></span>';
									echo '<p class="btn__text download__text">';
										_e('Preview', 'jumpstory-image-search');
									echo '</p>';
								echo '</div>';
							}

							echo '<button type="button" class="media__btn media__download_btn media__download_btn--active media__download_btn--archive" name="jis_download_archive" value="' . $media_id . '" data-media-id="' . $media_id . '" data-media-type="' . $media_type . '">';
								echo '<img src="' . JIS_DIR_URI . '/assets/images/icon_download.svg" alt="download" class="download__icon">';
								echo '<p class="download__text">';
									_e('Download', 'jumpstory-image-search');
								echo '</p>';
							echo '</button>';

							if( $insert_btn ) {
								echo '<button type="button" class="media__btn media__insert_btn media__insert_btn--active" name="jis_download_insert" value="' . $media_id . '" data-media-id="' . $media_id . '" data-media-type="' . $media_type . '">';
									echo '<img src="' . JIS_DIR_URI . '/assets/images/icon_download.svg" alt="download" class="download__icon">';
									echo '<p class="btn__text download__text">';
										_e('Insert', 'jumpstory-image-search');
									echo '</p>';
								echo '</button>';
							}
						echo '</div>'; // END .media__controls

						echo '<div class="media__notice">';
						echo '</div>';

						echo lmp_loader_elements('media__downloading');

						if( !empty($media_location) ) {
							echo '<div class="media__location location">';
								echo '<p class="location__text">';
									printf(
										wp_kses(
											__( '<span class="location__icon"></span>Location: %s', 'jumpstory-image-search' ),
											$jis_allowed_html
										),
										$media_location
									);
								echo '</p>';
							echo '</div>';
						}
					echo '</div>';

				echo '</div>';
			}

		else:

			echo '<p class="results__paragraph results__no_results">';
				_e('Your search returned no results.', 'jumpstory-image-search');
			echo '</p>';

		endif; // END if search_term is set

		$search_results_view = ob_get_contents();

	ob_end_clean();

	return $search_results_view;

}



function lmp_video_preview_view( $url = false ) {
	if(!$url) {
		return;
	}

	ob_start();
		echo '<video class="preview_modal__video" controls>';
	    	echo '<source src="' . $url . '" type="video/mp4">';
			_e('Sorry, your browser doesn\'t support embedded videos.', 'jumpstory-image-search');
		echo '</video>';

		$return = ob_get_contents();
	ob_end_clean();

	return $return;
}



function lmp_image_preview_view( $url = false ) {

	if(!$url) {
		return;
	}

	ob_start();
		echo '<img class="preview_modal__image" href="' . $url . '" alt="">';

		$return = ob_get_contents();
	ob_end_clean();

	return $return;
}


function lmp_media_preview_view( $url = false, $type = false, $title = false ) {

	if( !$url || !$type )
		return __('Unknown media type or url.', 'jumpstory-image-search');

	ob_start();
		echo '<div class="preview_modal__content">';
			echo '<div class="preview_modal__info">';
				switch ($type) {
					case 'video':
						echo lmp_video_preview_view($url);
						break;

					default:
						echo lmp_image_preview_view($url);
						break;
				}
				echo '<a class="preview_modal__close" href="#">';
					_e('Close', 'jumpstory-image-search');
				echo '</a>';
			echo '</div>';
		echo '</div>';
		echo '<div class="preview_modal__overlay"></div>';
		$return = ob_get_contents();
	ob_end_clean();
	return $return;
}



function lmp_ajax_media_preview_view() {

	$url			= ( isset($_POST['ajax_preview_url']) ) ? $_POST['ajax_preview_url'] : false;
	$media_type		= ( isset($_POST['ajax_media_type']) ) ? $_POST['ajax_media_type'] : false;
	$media_title	= ( isset($_POST['ajax_media_title']) ) ? $_POST['ajax_media_title'] : false;

	echo lmp_media_preview_view($url, $media_type, $media_title);
	exit();
}
add_action( 'wp_ajax_lmp_media_preview_view', 'lmp_ajax_media_preview_view' );



function lmp_pagination_view( $current_page = false, $applied_filters = false, $total = false) {

	if( !$current_page )
		return; // 'current page not set';

	$current_type 		= ( isset($applied_filters) && isset($applied_filters['type']) ) ? $applied_filters['type'] : lmp_api_filters()['type']['default'];
	$results_pr_page	= 50;
	$max_page_links		= 7;

	if( is_object($total) && property_exists($total, $current_type) ) {
		$type_total = $total->$current_type;
	}
	elseif( is_array($total) && array_key_exists($current_type, $total) ) {
		$type_total = $total[$current_type];
	}
	else {
		$type_total = false;
	}


	if( !$type_total )
		return; // 'total_type false';



// @DEV ??? total is in nested array instead of pure string/int.
$type_total = ( is_array($type_total) ) ? $type_total[0] : $type_total;

// @DEV API bug, pages and results.
$bug_total		= ( $type_total >= 250 ) ? (intval($type_total) / 10) : $type_total;
$total_pages	= ceil( ($bug_total / $results_pr_page) );


	ob_start();

		if($current_page > 1) {
			echo '<button name="jis_current_page" value="1" class="pagination__item pagination__btn">' . __('First', 'jumpstory-image-search') . '</button>';
			echo '<button name="jis_current_page" value="' . ($current_page - 1) . '" class="pagination__item pagination__btn">' . __('Prev', 'jumpstory-image-search') . '</button>';
		}

		if($current_page < $max_page_links) {
			$pagination_start_point = 1;
		}
		elseif($current_page >= ($total_pages - floor($max_page_links / 2)) ){
			$pagination_start_point = $total_pages - $max_page_links + 1;
		}
		elseif($current_page >= $max_page_links) {
			$pagination_start_point = $current_page - floor($max_page_links/2);
		}

		if($current_page >= $max_page_links) {

			echo '<button name="jis_current_page" value="1" class="pagination__item pagination__btn">1</button>';
			echo '<div class="pagination__item pagination__item--spacer">...</div>';
		}


		for($i = $pagination_start_point; $i <= ( $pagination_start_point + $max_page_links - 1 ); $i++){
			if($i > $total_pages)
				continue;

			$current_class = ( $i == $current_page ) ? 'pagination__item--current' : '';
			echo '<button name="jis_current_page" value="' . $i . '" class="pagination__item  pagination__btn ' . $current_class . '">' . /*number_format_i18n(*/$i/*)*/ . '</button>';
		}

		if($current_page < ($total_pages - floor($max_page_links / 2)) && $total_pages > $max_page_links ) {
			echo '<div class="pagination__item pagination__item--spacer">...</div>';
			echo '<button name="jis_current_page" value="' . $total_pages . '" class="pagination__item pagination__btn">' . /*number_format_i18n(*/ $total_pages /*)*/ . '</button>';
		}

		if( $current_page < $total_pages ) {
			echo '<button name="jis_current_page" value="' . ($current_page + 1) . '" class="pagination__item pagination__btn">' . __('Next', 'jumpstory-image-search') . '</button>';
//			echo '<button name="jis_current_page" value="' . $total_pages . '" class="pagination__item pagination__btn">' . __('Last', 'jumpstory-image-search') . '</button>';
		}

		$return = ob_get_contents();

	ob_end_clean();

	return $return;
}

?>