<?php


/**
 * Class - Media Library
 */
class wps_ic_media_library_live extends wps_ic {

	public static $logo_compressed;
	public static $logo_uncompressed;
	public static $logo_excluded;
	public static $load_spinner;
	public static $allowed_types;

	public static $allow_local;
	public static $exclude_list;
	public static $settings;
	public static $options;


	public function __construct() {

		self::$settings     = parent::$settings;
		self::$options      = parent::$options;
		self::$exclude_list = get_option('wps_ic_exclude_list');
		self::$allow_local  = $this->get_local_status();

		if (empty(self::$exclude_list)) {
			self::$exclude_list = array();
		}

		self::$load_spinner      = WPS_IC_URI . 'assets/images/spinner.svg';
		self::$logo_compressed   = WPS_IC_URI . 'assets/images/compressed.png';
		self::$logo_uncompressed = WPS_IC_URI . 'assets/images/not-compressed.png';
		self::$logo_excluded     = WPS_IC_URI . 'assets/images/excluded.png';
		self::$allowed_types     = array('jpg' => 'jpg', 'jpeg' => 'jpeg', 'gif' => 'gif', 'png' => 'png');

		if (empty(self::$settings['live-cdn']) || self::$settings['live-cdn'] == '0') {
			if (empty(self::$options['hide_compress']) || self::$options['hide_compress'] == '') {
				// Register new columns
				add_filter('manage_media_columns', array($this, 'wps_compress_column'));
				add_action('manage_media_custom_column', array($this, 'wps_compress_column_value'), 10, 2);
				add_filter('media_row_actions', array($this, 'add_exclude_link'), 10, 2);
			} else {
				#add_action('admin_print_scripts', array(__CLASS__, 'wps_ic_hide_compress'), 99);
				add_action('pre_current_active_plugins', array($this, 'wps_ic_hide_compress_plugin_list'));
			}
		}

	}


	public function get_local_status() {
		if (empty(self::$options['api_key'])) {
			return 0;
		}

		$allow_local = get_transient('ic_allow_local');
		if ( ! empty($allow_local)) {
			return $allow_local;
		}

		$call = wp_remote_get(WPS_IC_KEYSURL . '?action=get_credits&apikey=' . self::$options['api_key'] . '&v=2&hash=' . md5(mt_rand(999, 9999)),
													array('timeout' => 30, 'sslverify' => false, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'));

		if (wp_remote_retrieve_response_code($call) == 200) {
			$body = wp_remote_retrieve_body($call);
			$body = json_decode($body);
			$body = $body->data;

			if ( ! empty($body)) {
				update_option('wps_ic_allow_local', $body->agency->allow_local);
				set_transient('ic_allow_local', $body->agency->allow_local, 30);

				return $body->agency->allow_local;
			} else {
				return 0;
			}

		} else {
			return 0;
		}
	}


	public function wps_ic_hide_compress_plugin_list() {
		global $wp_list_table;
		$hidearr   = array('wp-compress-image-optimizer/wp-compress.php');
		$myplugins = $wp_list_table->items;
		foreach ($myplugins as $key => $val) {
			if (in_array($key, $hidearr)) {
				unset($wp_list_table->items[ $key ]);
			}
		}
	}


	public function wps_ic_hide_compress() {
		echo '<script type="text/javascript">';
		echo 'jQuery(document).ready(function($){';
		echo '$("tr[data-slug=\'wp-compress-image-optimizer\']").hide();';
		echo '$("#wp-compress-image-optimizer-update").hide();';
		echo '});';
		echo '</script>';
	}


	public function wps_compress_column($cols) {
		$old           = $cols;
		$cols          = array();
		$cols['cb']    = $old['cb'];
		$cols['title'] = $old['title'];
		#$cols["wps_ic_all"]     = "";
		$cols["wps_ic_actions"] = "";
		$cols['author']         = $old['author'];
		$cols['parent']         = $old['parent'];
		$cols['comments']       = $old['comments'];
		$cols['date']           = $old['date'];

		return $cols;
	}


	public function wps_compress_column_value($column_name, $id) {
		global $wps_ic;

		if ($column_name != 'wps_ic_actions') {
			return true;
		}

		$output    = '';
		$file_data = get_attached_file($id);
		$type      = wp_check_filetype($file_data);

		// Is file extension allowed
		if ( ! in_array(strtolower($type['ext']), self::$allowed_types)) {

			/**
			 * Extensions is NOT allowed
			 */

			if ($column_name == 'wps_ic_all') {
				$output .= '<div class="wps-ic-excluded">';
				$output .= '<img src="' . self::$logo_excluded . '" />';
				$output .= '<h5>Excluded</h5>';
				$output .= '</div>';
			} else if ($column_name == 'wps_ic_actions') {
				$output .= '<div class="wps-ic-media-actions-toolbox">';
				$output .= '<ul class="wps-ic-include">';
				$output .= '<li class="no-padding">';

				$output .= '<div class="btn-group">';
				$output .= 'Not supported';
				$output .= '</div>';

				$output .= '</li>';
				$output .= '</ul>';
				$output .= '</div>';
			}

			echo $output;
		} else {
			if (in_array($id, self::$exclude_list)) {
				// Excluded
				$output .= '<div class="wps-ic-media-actions-container wps-ic-media-actions-' . $id . '">';
				$output .= '<div class="wps-ic-compressed-logo">';
				$output .= '<img src="' . self::$logo_excluded . '" />';
				$output .= '</div>';

				$output .= '<div class="wps-ic-compressed-info">';
				$output .= '<h5>Excluded</h5>';
				$output .= '</div>';

				$output .= '<a class="wps-ic-exclude-live" data-attachment_id="' . $id . '">Include</a>';
				$output .= '</div>';
				$output .= '<div class="wps-ic-image-loading-' . $id . ' wps-ic-image-loading-container" id="wp-ic-image-loading-' . $id . '" style="display:none;"><img src="' . self::$load_spinner . '" /></div>';
			}
			else {

				$compressing = get_transient('wps_ic_compress_' . $id);
				if ( ! empty($compressing['status'])) {
					if ($compressing['status'] == 'compressing') {
						$output .= '<div class="wps-ic-media-actions-container wps-ic-media-actions-' . $id . '" style="display:none;">';
						$output .= $this->compress_details($id);
						$output .= '</div>';

						$output .= '<div class="wps-ic-image-loading-' . $id . ' wps-ic-image-loading-container" id="wp-ic-image-loading-' . $id . '"><img src="' . self::$load_spinner . '" /></div>';
					} else if ($compressing['status'] == 'compressed') {
						$output .= '<div class="wps-ic-media-actions-container wps-ic-media-actions-' . $id . '">';
						$output .= $this->compress_details($id);
						$output .= '</div>';

						$output .= '<div class="wps-ic-image-loading-' . $id . ' wps-ic-image-loading-container" id="wp-ic-image-loading-' . $id . '" style="display:none;"><img src="' . self::$load_spinner . '" /></div>';
					}
				} else {
					$output .= '<div class="wps-ic-media-actions-container wps-ic-media-actions-' . $id . '">';
					$output .= $this->compress_details($id);
					$output .= '</div>';

					$output .= '<div class="wps-ic-image-loading-' . $id . ' wps-ic-image-loading-container" id="wp-ic-image-loading-' . $id . '" style="display:none;"><img src="' . self::$load_spinner . '" /></div>';
				}

			}

			echo $output;

		}
	}


	public function compress_details($imageID) {
		$output      = '';
		$stats       = get_post_meta($imageID, 'ic_stats', true);
		$compressing = get_transient('wps_ic_compress_' . $imageID);

		if ($compressing['status'] == 'compressed' || ! empty($stats)) {
			$savings_percent = number_format((1 - ($stats['full']['compressed']['size'] / $stats['full']['original']['size'])) * 100, 1);
			$savings_kb      = round($stats['full']['original']['size'] - $stats['full']['compressed']['size']);
			$savings_kb      = wps_ic_format_bytes($savings_kb);

			$output .= '<div class="wps-ic-compressed-logo">';
			$output .= '<img src="' . self::$logo_compressed . '" />';
			$output .= '</div>';

			$output .= '<div class="wps-ic-compressed-info">';
			$output .= '<h5>' . $savings_percent . '%</h5>';
			$output .= '<h5>' . $savings_kb . '</h5>';
			$output .= '<h5>Saved</h5>';
			$output .= '</div>';

			$output .= '<a class="wps-ic-compress-details" data-attachment_id="' . $imageID . '">Details</a>';
			$output .= '<a class="wps-ic-restore-live" data-attachment_id="' . $imageID . '">Restore</a>';

			$output .= '<div class="wps-ic-compress-details-popup-' . $imageID . '" style="display:none;">';
			$output .= '</div>';

		} else if ($compressing['status'] == 'compressing') {
		} else {
			$output .= '<div class="wps-ic-compressed-logo">';
			$output .= '<img src="' . self::$logo_uncompressed . '" />';
			$output .= '</div>';

			$output .= '<div class="wps-ic-compressed-info">';
			#$output .= '<h5>' . $savings_kb . '</h5>';
			$output .= '<h5>Not Compressed</h5>';
			$output .= '</div>';

			$output .= '<a class="wps-ic-compress-live" data-attachment_id="' . $imageID . '">Compress</a>';
			$output .= '<a class="wps-ic-exclude-live" data-attachment_id="' . $imageID . '">Exclude</a>';
		}

		return $output;
	}


	public function compress_details_popup($imageID) {
		$output           = '';
		$savings_list     = '';
		$combined_savings = 0;

		$imageFull = wp_get_attachment_image_src($imageID, 'full');
		$stats     = get_post_meta($imageID, 'ic_stats', true);
		$filename  = basename($imageFull[0]);

		if ($stats && ! empty($stats)) {
			foreach ($stats as $size => $image) {
				$imageDetails    = wp_get_attachment_image_src($imageID, $size);
				$filenameDetails = basename($imageDetails[0]);

				$original_size   = $image['original']['size'];
				$compressed_size = $image['compressed']['size'];
				if ($original_size > $compressed_size) {
					$savings          = $original_size - $compressed_size;
					$combined_savings += $savings;
				} else {
					$savings = 0;
				}

				if (empty($image['original']['size']) || ! isset($image['original']['size']) || is_null($image['original']['size'])) {
					$original_size = 'Not Existing';
				} else {
					$original_size = wps_ic_format_bytes($original_size);
				}

				$savings_list .= '<tr>';
				$savings_list .= '<td>' . $size . '</td>';
				$savings_list .= '<td>' . $original_size . '</td>';
				$savings_list .= '<td>' . wps_ic_format_bytes($compressed_size) . '</td>';
				$savings_list .= '<td>' . wps_ic_format_bytes($savings) . '</td>';
				$savings_list .= '</tr>';
			}
		} else {
			$savings_list .= '<tr>';
			$savings_list .= '<td colspan="4" style="text-align:center;">Sorry, there has been an error!</td>';
			$savings_list .= '</tr>';
		}

		#$output .= '<div class="wps-ic-compress-details-popup-' . $imageID . '" style="display:none;">';
		$output .= '<div class="wps-ic-compress-details-popup-inner">';

		$output .= '<div class="wps-ic-cd-left">';
		$output .= '<h2>' . $filename . '</h2>';
		$output .= '<img src="' . $imageFull[0] . '" />';
		$output .= '<h2>Combined Savings</h2>';
		$output .= wps_ic_format_bytes($combined_savings);
		$output .= '</div>';

		$output .= '<div class="wps-ic-cd-right overflow-scroll">';
		$output .= '<table class="wp-list-table widefat fixed striped wp-compress-details-table">';
		$output .= '<thead>';
		$output .= '<tr>';
		$output .= '<th>Size</th>';
		$output .= '<th>Original</th>';
		$output .= '<th>Compressed</th>';
		$output .= '<th>Savings KB</th>';
		$output .= '</tr>';
		$output .= '</thead>';
		$output .= '<tbody>';

		$output .= $savings_list;

		$output .= '</tbody>';
		$output .= '</table>';
		$output .= '</div>';

		$output .= '</div>';

		#$output .= '</div>';

		return $output;
	}


	/**
	 * Finds all images and saves them to queue
	 */
	public function prepare_restore() {
		$compressed_images_queue = $this->find_compressed_images();
		if ($compressed_images_queue) {
			wp_send_json_success();
		} else {
			wp_send_json_error();
		}
	}


	public function find_compressed_images($queue = false) {
		$compressed_images = array();
		$images            = get_posts(array(
																		 'post_type'      => 'attachment',
																		 'posts_per_page' => - 1,
																		 'meta_query'     => array(
																			 // meta query takes an array of arrays, watch out for this!
																			 array(
																				 'key'     => 'ic_stats',
																				 'compare' => 'EXISTS'
																			 )
																		 )
																	 ));

		if ($images) {
			foreach ($images as $image) {
				$stats = get_post_meta($image->ID, 'ic_stats', true);

				$file_data = get_attached_file($image->ID);
				$type      = wp_check_filetype($file_data);

				// Is file extension allowed
				if ( ! in_array(strtolower($type['ext']), self::$allowed_types)) {
					continue;
				}

				if ($stats && ! empty($stats)) {
					$compressed_images[] = $image->ID;
				}
			}
		}

		if ($queue) {
			update_option('wps_ic_restore_queue', array('total_images' => count($compressed_images), 'queue' => $compressed_images));

			return $compressed_images;
		} else {
			update_option('wps_ic_restore_queue', array('total_images' => count($compressed_images), 'queue' => $compressed_images));

			return $compressed_images;
		}
	}


	/**
	 * Finds all images and saves them to queue
	 */
	public function prepare_compress() {
		$uncompressed_images_queue = $this->find_uncompressed_images();
		if ($uncompressed_images_queue) {
			wp_send_json_success();
		} else {
			wp_send_json_error();
		}
	}


	public function find_uncompressed_images($queue = false) {
		$uncompressed_images = array();
		$excluded_list       = get_option('wps_ic_exclude_list');
		$images              = get_posts(array(
																			 'post_type'      => 'attachment',
																			 'posts_per_page' => - 1,
																			 'meta_query'     => array(
																				 // meta query takes an array of arrays, watch out for this!
																				 array(
																					 'key'     => 'ic_stats',
																					 'compare' => 'NOT EXISTS'
																				 )
																			 )
																		 ));

		if ($images) {
			foreach ($images as $image) {
				$stats     = get_post_meta($image->ID, 'ic_stats', true);
				$file_data = get_attached_file($image->ID);
				$type      = wp_check_filetype($file_data);

				if (!empty($excluded_list[$image->ID])) {
					continue;
				}

				// Is file extension allowed
				if ( ! in_array(strtolower($type['ext']), self::$allowed_types)) {
					continue;
				}

				if ( ! $stats || empty($stats)) {
					$uncompressed_images[] = $image->ID;
				}
			}
		}

		if ($queue) {
			update_option('wps_ic_compress_queue', array('total_images' => count($uncompressed_images), 'queue' => $uncompressed_images));

			return $uncompressed_images;
		} else {
			update_option('wps_ic_compress_queue', array('total_images' => count($uncompressed_images), 'queue' => $uncompressed_images));

			return $uncompressed_images;
		}
	}


	public function start_compress() {
		$uncompressed_images_queue = get_option('wps_ic_compress_queue');

		if ($uncompressed_images_queue['queue']) {

			// First Image
			$this->run_bulk_compress($uncompressed_images_queue['queue'][0]);

			unset($uncompressed_images_queue['queue'][0]);
			update_option('wps_ic_compress_queue', $uncompressed_images_queue);

			wp_send_json_success();
		}

		wp_send_json_error();
	}


	public function run_bulk_compress($image) {
		set_transient('wps_ic_compress_' . $image, array('imageID' => $image, 'status' => 'compressing'), 0);

		$this->local->backup_image($image);
		$this->local->compress_image($image);

		set_transient('wps_ic_compress_' . $image, array('imageID' => $image, 'status' => 'compressed'), 0);
	}


	public function add_exclude_link($actions, $att) {
		$filedata = get_attached_file($att->ID);
		$basename = sanitize_title(basename($filedata));

		$exclude = 'style="display:none;"';
		$include = 'style="display:none;"';

		if ( ! in_array($basename, self::$exclude_list)) {
			$exclude = '';
		} else {
			$include = '';
		}

		$actions['exclude'] = '<a href="#" class="wps-ic-exclude-live-link" id="wps-ic-exclude-live-link-' . $att->ID . '" data-action="exclude" data-attachment_id="' . $att->ID . '" title="Exclude this item from WP Compress" ' . $exclude . '>Exclude</a>';

		$actions['exclude'] .= '<a href="#" class="wps-ic-include-live-link" id="wps-ic-include-live-link-' . $att->ID . '" data-action="include" data-attachment_id="' . $att->ID . '" title="Include this item into WP Compress" ' . $include . '>Include</a>';

		$actions['exclude'] .= '<div class="wps-ic-image-loading-mini" id="wp-ic-image-loading-' .
													 $att->ID . '" style="display:none;"><img src="' . WPS_IC_URI . 'assets/images/spinner.svg" /></div>';

		return $actions;
	}

}