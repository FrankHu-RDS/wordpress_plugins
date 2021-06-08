<?php


class wps_autooptimize extends wps_ic {

	/**
	 * Our main class constructor
	 */
	public function __construct() {
		if ( ! is_admin()) {
			return;
		}

		// What is unlocked?
		$settings = parent::$settings;

		if ( ! empty($settings)) {

			/**
			 * Compress on upload
			 */
			#add_filter('add_attachment', array($this, 'on_upload'), 10, 2);
		}

		#$this->on_upload('0');

		/**
		 * Update attachment metadata on upload
		 */
		#add_filter('add_attachment', array($this, 'metadata_update'), 10, 2);
	}


	public static function download_thumbs() {
		if ( ! empty($_GET['wps_ic_action']) && $_GET['wps_ic_action'] === 'ic_download_thumbs') {

			if ( ! function_exists('download_url')) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				require_once(ABSPATH . "wp-admin" . '/includes/file.php');
				require_once(ABSPATH . "wp-admin" . '/includes/media.php');
			}

			if ( ! function_exists('update_option')) {
				require_once(ABSPATH . "wp-includes" . '/option.php');
			}

			$options = get_option(WPS_IC_OPTIONS);

			// Get attachment ID
			$attach_id = sanitize_text_field($_GET['attID']);
			$attach_id = (int)$attach_id;

			$get_image_list = wp_remote_get(WPS_IC_APIURL . '/?thumbs_download=true&apikey=' . $options['api_key'] . '&attID=' . $attach_id . '&hash=' . time(),
																			array('timeout' => 120, 'sslverify' => false, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'));

			$get_image_list = wp_remote_retrieve_body($get_image_list);
			$get_image_list = json_decode($get_image_list, true);

			$image_list = $get_image_list['data'];

			if ($image_list) {
				foreach ($image_list as $attID => $image) {

					foreach ($image as $size => $data) {

						$output = $data['compressed'];

						$attachment_ID    = $attID;
						$webp_image       = $output['webp'];
						$compressed_image = $output['uri'];
						$original_size    = $output['original'];
						$compressed_size  = $output['size'];

						$current_thumbnail_path = '';
						if ($size !== 'full') {
							$fullsizepath           = get_attached_file($attachment_ID);
							$path_to_thumb          = str_replace(basename($fullsizepath), '', $fullsizepath);
							$current_size           = $compressed_image;
							$current_thumbnail      = basename($current_size);
							$current_thumbnail_path = $path_to_thumb . $current_thumbnail;
							$file_data              = $current_thumbnail_path;
						} else {
							$file_data = get_attached_file($attachment_ID);
						}

						clearstatcache();
						$temp_file = download_url($compressed_image, 120);

						if ( ! is_wp_error($temp_file) && $temp_file) {

							$uncompressed_file_size  = filesize($file_data);
							$uncompressed_dimensions = getimagesize($file_data);

							if (copy($temp_file, $file_data)) {
								unlink($temp_file);
								clearstatcache();

								// Download webP
								// First delete the current file
								clearstatcache();
								if ( ! empty($webp_image)) {
									$temp_file_Webp = download_url($webp_image, 60);
									if ( ! is_wp_error($temp_file_Webp) && $temp_file_Webp) {
										// First delete the current file
										clearstatcache();

										// Rename image into webp
										$permfile = str_replace(array('.jpg', '.jpeg', '.png'), '.webp', $file_data);

										// Copy image from temporary file into real file
										if (file_exists($permfile)) {
											unlink($permfile);
										}

										if (copy($temp_file_Webp, $permfile)) {
											unlink($temp_file_Webp);
										}
									}
								}
							} // copy

						} else {
							$error[] = $temp_file;
						}
					}

					wp_send_json_success(array('errors' => $error));
				}
			}

			wp_send_json_error();
		}
	}


	public static function download_image() {
		if ( ! empty($_GET['wps_ic_action']) && $_GET['wps_ic_action'] === 'ic_download') {

			if ( ! function_exists('download_url')) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				require_once(ABSPATH . "wp-admin" . '/includes/file.php');
				require_once(ABSPATH . "wp-admin" . '/includes/media.php');
			}

			if ( ! function_exists('update_option')) {
				require_once(ABSPATH . "wp-includes" . '/option.php');
			}

			$options = get_option(WPS_IC_OPTIONS);

			// Get attachment ID
			$attach_id = sanitize_text_field($_GET['attID']);
			$attach_id = (int)$attach_id;

			$get_image_list = wp_remote_get(WPS_IC_APIURL . '/?client_download=true&apikey=' . $options['api_key'] . '&attID=' . $attach_id . '&hash=' . time(),
																			array('timeout' => 120, 'sslverify' => false, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'));
			$get_image_list = wp_remote_retrieve_body($get_image_list);
			$get_image_list = json_decode($get_image_list, true);

			$image_list = $get_image_list['data'];

			if ($image_list) {
				foreach ($image_list as $attID => $image) {
					delete_post_meta($attID, 'wps_ic_state');

					foreach ($image as $size => $data) {

						$output = $data['compressed'];

						$attachment_ID    = $attID;
						$webp_image       = $output['webp'];
						$compressed_image = $output['uri'];
						$original_size    = $output['original'];
						$compressed_size  = $output['size'];

						$current_thumbnail_path = '';
						if ($size !== 'full') {
							$fullsizepath           = get_attached_file($attachment_ID);
							$path_to_thumb          = str_replace(basename($fullsizepath), '', $fullsizepath);
							$current_size           = $compressed_image;
							$current_thumbnail      = basename($current_size);
							$current_thumbnail_path = $path_to_thumb . $current_thumbnail;
							$file_data              = $current_thumbnail_path;
						} else {
							$file_data = get_attached_file($attachment_ID);
						}

						clearstatcache();
						$temp_file = download_url($compressed_image, 120);

						if ( ! is_wp_error($temp_file) && $temp_file) {

							$uncompressed_file_size = filesize($file_data);
							$compressed_file_size   = filesize($temp_file);

							if ($uncompressed_file_size <= $compressed_file_size) {
								// No further savings
								update_post_meta($attachment_ID, 'wps_ic_noncompressed_size', $uncompressed_file_size);
								update_post_meta($attachment_ID, 'wps_ic_compressed_size', $uncompressed_file_size);
								$compressed_dimensions = getimagesize($file_data);

								$metadata           = get_post_meta($attachment_ID, '_wp_attachment_metadata', true);
								$metadata['width']  = $compressed_dimensions[0];
								$metadata['height'] = $compressed_dimensions[1];
								update_post_meta($attachment_ID, '_wp_attachment_metadata', $metadata);
								$child_metadata['_wp_attachment_metadata'] = $metadata;

								$dimensions['new']['width']  = $compressed_dimensions[0];
								$dimensions['new']['height'] = $compressed_dimensions[1];
								update_post_meta($attachment_ID, 'wps_ic_dimmensions', $dimensions);
								$child_metadata['wps_ic_dimmensions'] = $dimensions;

								$compress_data['old']['size'] = $uncompressed_file_size;
								$compress_data['new']['size'] = $uncompressed_file_size;

								update_post_meta($attachment_ID, 'wps_ic_data', $compress_data);
								delete_post_meta($attachment_ID, 'wps_ic_status');
							} else {

								if (copy($temp_file, $file_data)) {
									unlink($temp_file);
									clearstatcache();

									if ($size == 'full') {
										$compressed_dimensions = getimagesize($file_data);
										$compressed_file_size  = filesize($file_data);

										clearstatcache();

										if ($uncompressed_file_size >= $compressed_file_size) {
											update_post_meta($attachment_ID, 'wps_ic_noncompressed_size', $uncompressed_file_size);
											update_post_meta($attachment_ID, 'wps_ic_compressed_size', $compressed_file_size);
										} else {
											update_post_meta($attachment_ID, 'wps_ic_noncompressed_size', $uncompressed_file_size);
											update_post_meta($attachment_ID, 'wps_ic_compressed_size', $uncompressed_file_size);
										}

										$metadata           = get_post_meta($attachment_ID, '_wp_attachment_metadata', true);
										$metadata['width']  = $compressed_dimensions[0];
										$metadata['height'] = $compressed_dimensions[1];
										update_post_meta($attachment_ID, '_wp_attachment_metadata', $metadata);
										$child_metadata['_wp_attachment_metadata'] = $metadata;

										$dimensions['new']['width']  = $compressed_dimensions[0];
										$dimensions['new']['height'] = $compressed_dimensions[1];
										update_post_meta($attachment_ID, 'wps_ic_dimmensions', $dimensions);
										$child_metadata['wps_ic_dimmensions'] = $dimensions;

										$compress_data['old']['size'] = $uncompressed_file_size;
										$compress_data['new']['size'] = $compressed_file_size;

										update_post_meta($attachment_ID, 'wps_ic_data', $compress_data);
										delete_post_meta($attachment_ID, 'wps_ic_status');
									}

									// Download webP
									// First delete the current file
									clearstatcache();
									if ( ! empty($webp_image)) {
										$temp_file_Webp = download_url($webp_image, 60);
										if ( ! is_wp_error($temp_file_Webp) && $temp_file_Webp) {
											// First delete the current file
											clearstatcache();

											// Rename image into webp
											$permfile = str_replace(array('.jpg', '.jpeg', '.png'), '.webp', $file_data);

											// Copy image from temporary file into real file
											if (file_exists($permfile)) {
												unlink($permfile);
											}

											if (copy($temp_file_Webp, $permfile)) {
												unlink($temp_file_Webp);
											}
										}
									}

									// Download thumbs
									$ch = curl_init(WPS_IC_APIURL . '?pull_thumbs_from_client=true&apikey=' . $options['api_key'] . '&attID=' . $attachment_ID);

									// No Body return
									$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
									curl_setopt($ch, CURLOPT_USERAGENT, $agent);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
									curl_setopt($ch, CURLOPT_TIMEOUT, 5);
									curl_setopt($ch, CURLOPT_HEADER, 0);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
									curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
									curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
									curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
									curl_exec($ch);
									curl_close($ch);

								} else {
									// Cannot copy
									delete_post_meta($attachment_ID, 'wps_ic_data');
									delete_post_meta($attachment_ID, 'wps_ic_status');
								}
							}

						} else {
							// Cannot download
							$error[] = $temp_file;

							delete_post_meta($attachment_ID, 'wps_ic_data');
							delete_post_meta($attachment_ID, 'wps_ic_status');

						}

						update_post_meta($attachment_ID, 'wps_ic_done_compressing', 'true');
					}

					wp_send_json_success(array('errors' => $error));
				}
			}

			wp_send_json_error();
		}
	}


	public static function run_compress_verification() {
		$cdn_verification = get_transient('wps_ic_cnd_verification');
		if ( ! $cdn_verification) {
			$options = get_option(WPS_IC_OPTIONS);
			$call    = wp_remote_get(WPS_IC_KEYSURL . '?action=cdn_verification&apikey=' . $options['api_key'], array('timeout' => 60, 'sslverify' => false));
			if (wp_remote_retrieve_response_code($call) == 200) {
				$body             = wp_remote_retrieve_body($call);
				$cdn_verification = json_decode($body);
				if ($cdn_verification > 0) {
					set_transient('wps_ic_cnd_verification', $cdn_verification, 60 * 5);
				} else {
					set_transient('wps_ic_cnd_verification', 'false', 60 * 5);
					$settings                   = get_option(WPS_IC_SETTINGS);
					$settings['live-cdn'] = '0';
					update_option(WPS_IC_SETTINGS, $settings);
				}
			}
		}
	}


	public static function pull_image() {
		if ( ! empty($_GET['wps_ic_action']) && $_GET['wps_ic_action'] === 'ic_pull') {
			// Get attachment ID
			$attach_id = sanitize_text_field($_GET['attID']);
			$attach_id = (int)$attach_id;

			// Get all image sizes
			$thumbs         = array();
			$thumbs['full'] = wp_get_attachment_image_src($attach_id, 'full');
			$uri            = explode('?', $thumbs['full'][0]);
			$thumbs['full'] = $uri[0];

			wp_send_json_success(array($attach_id => $thumbs, 'ts' => count(get_intermediate_image_sizes())));
		}
	}


	public static function pull_image_no_credits() {
		if ( ! empty($_GET['wps_ic_action']) && $_GET['wps_ic_action'] === 'ic_no_credits') {
			// Get attachment ID
			$attach_id = sanitize_text_field($_GET['attID']);
			$attach_id = (int)$attach_id;

			update_post_meta($attach_id, 'wps_ic_no_credits', 'true');

			wp_send_json_success(array($attach_id));
		}
	}


	public static function pull_thumbs() {
		if ( ! empty($_GET['wps_ic_action']) && $_GET['wps_ic_action'] === 'ic_pull_thumbs') {
			// Get attachment ID
			$attach_id = sanitize_text_field($_GET['attID']);
			$attach_id = (int)$attach_id;

			// Get all image sizes
			$thumbs = array();

			$thumbs['full'] = wp_get_attachment_image_src($attach_id, 'full');
			$thumbs['full'] = $thumbs['full'][0];
			$sizesa         = get_intermediate_image_sizes();

			if (is_array($sizesa)) {
				foreach ($sizesa as $size => $value) {

					// Is thumbnail size set to active in settings
					if ( ! isset($settings['thumbnails'][ $value ])) {
						#continue;
					}

					$thumbs[ $value ] = wp_get_attachment_image_src($attach_id, $value);
					$uri              = explode('?', $thumbs[ $value ][0]);
					#$uri[0] = str_replace($site_url, '', $uri[0]);

					if ($uri[0] == $thumbs['full']) {
						unset($thumbs[ $value ]);
						continue;
					} else {
						$thumbs[ $value ] = $uri[0];
					}
				}
			}

			if (class_exists('WooCommerce')) {
				$thumbs['woocommerce_thumbnail']         = wp_get_attachment_image_src($attach_id, 'woocommerce_thumbnail');
				$thumbs['woocommerce_thumbnail']         = $thumbs['woocommerce_thumbnail'][0];
				$thumbs['woocommerce_single']            = wp_get_attachment_image_src($attach_id, 'woocommerce_single');
				$thumbs['woocommerce_single']            = $thumbs['woocommerce_single'][0];
				$thumbs['woocommerce_gallery_thumbnail'] = wp_get_attachment_image_src($attach_id, 'woocommerce_gallery_thumbnail');
				$thumbs['woocommerce_gallery_thumbnail'] = $thumbs['woocommerce_gallery_thumbnail'][0];
			}

			wp_send_json_success(array($attach_id => $thumbs));
		}
	}


	public static function run_compress_per_att() {
		if ( ! empty($_GET['run_compress_per_att']) && ! empty($_GET['attID'])) {
			$attID = sanitize_text_field($_GET['attID']);
			delete_post_meta($attID, 'wps_ic_data');

			$args = array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => 1,
				'meta_query'     => array(
					array(
						'key'     => 'wps_ic_data',
						'compare' => 'NOT EXISTS'
					)
				)
			);

			$compressed_attachments = new WP_Query($args);
			if ($compressed_attachments->have_posts()) {
				$options = get_option(WPS_IC_OPTIONS);
				$sent    = array();

				while ($compressed_attachments->have_posts()) {
					$compressed_attachments->the_post();
					$attID = get_the_ID();

					update_post_meta($attID, 'wps_ic_data', 'working');
					update_post_meta($attID, 'wps_ic_status', array('time' => time(), 'type' => 'compress'));

					$ch = curl_init(WPS_IC_APIURL . '?pull_from_client=true&apikey=' . $options['api_key'] . '&attID=' . $attID);

					// No Body return
					$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
					curl_setopt($ch, CURLOPT_USERAGENT, $agent);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
					curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
					curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
					curl_exec($ch);
					curl_close($ch);

					$sent[] = $attID;
				}

			}
		}
	}


	public static function run_compress() {
		if ( ! empty($_GET['run_compress'])) {

			ini_set('memory_limit', '2024M');
			ini_set('max_execution_time', '180');

			$stop       = get_option('wps_ic_bg_process_stop');
			$bg_process = get_option('wps_ic_bg_process');

			if (empty($_GET['automatic'])) {
				update_option('wps_ic_legacy_bulk_start', date('d.m.Y H:i:s'));
				delete_option('wps_ic_bg_process_stop');
			}

			if ($stop) {
				delete_option('wps_ic_bg_stopping');
				delete_option('wps_ic_bg_process_stop');
				wp_send_json_error('stopped');
			}

			$args = array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => 1,
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => 'wps_ic_locked',
						'compare' => '=',
						'value'   => 'true'
					),
					array(
						'key'     => 'wps_ic_data',
						'compare' => 'NOT EXISTS'
					),
					array(
						'key'     => 'wps_ic_exclude',
						'compare' => 'NOT EXISTS'
					)
				)
			);

			$compressed_attachments = new WP_Query($args);
			if ($compressed_attachments->have_posts()) {
				$options = get_option(WPS_IC_OPTIONS);
				$sent    = array();

				while ($compressed_attachments->have_posts()) {
					$compressed_attachments->the_post();
					$attID = get_the_ID();

					$type = get_post_mime_type($attID);
					if ($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/gif') {
						delete_post_meta($attID, 'wps_ic_locked', 'true');
					} else {

						$bg_process['count']    = $bg_process['count'] + 1;
						$bg_process['last_run'] = time() + 60;
						$bg_process['type']     = 'compress';
						update_option('wps_ic_bg_process', $bg_process);

						delete_post_meta($attID, 'wps_ic_locked');
						update_post_meta($attID, 'wps_ic_data', 'working');
						update_post_meta($attID, 'wps_ic_status', array('time' => time(), 'type' => 'compress'));

						$settings = get_option(WPS_IC_SETTINGS);
						$ch       = curl_init(WPS_IC_APIURL . '?pull_from_client=true&apikey=' . $options['api_key'] . '&attID=' . $attID . '&settings[quality]=' . $settings['optimization'] . '&settings[resize]=' . $settings['resize_larger_images'] . '&settings[resize_width]=' . $settings['resize_larger_images_width']);

						// No Body return
						$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
						curl_setopt($ch, CURLOPT_USERAGENT, $agent);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
						curl_setopt($ch, CURLOPT_TIMEOUT, 15);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
						curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
						curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
						curl_exec($ch);
						curl_close($ch);

						$sent[] = $attID;
					}
				}

				$options = get_option(WPS_IC_OPTIONS);
				$ch      = curl_init(site_url('?run_compress=true&hash_time=' . md5(time()) . '&time=' . time() . '&automatic=true&apikey=' . $options['api_key']));

				// No Body return
				$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
				curl_setopt($ch, CURLOPT_USERAGENT, $agent);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
				curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
				curl_exec($ch);
				curl_close($ch);

				die();
			}

			$bg_process          = get_option('wps_ic_bg_process');
			$bg_process['count'] = $bg_process['total'];
			update_option('wps_ic_bg_process', $bg_process);
			delete_option('wps_ic_bg_process_stop');
			delete_option('wps_ic_bg_process_stats');
			delete_option('wps_ic_bg_process_running');

			update_option('wps_ic_legacy_bulk_end', date('d.m.Y H:i:s'));

			wp_send_json_error('no-att');
		}
	}


	public
	static function run_restore_per_att() {
		if ( ! empty($_GET['run_compress_per_att']) && ! empty($_GET['attID'])) {
			$attID = sanitize_text_field($_GET['attID']);
			delete_post_meta($attID, 'wps_ic_data');

			$args = array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => 1,
				'meta_query'     => array(
					array(
						'key'     => 'wps_ic_data',
						'compare' => '!=',
						'value'   => 'working'
					)
				)
			);

			$compressed_attachments = new WP_Query($args);

			if ($compressed_attachments->have_posts()) {
				$options = get_option(WPS_IC_OPTIONS);
				$sent    = array();

				while ($compressed_attachments->have_posts()) {
					$compressed_attachments->the_post();
					$attachmentID = get_the_ID();
					$attID        = $attachmentID;

					update_post_meta($attID, 'wps_ic_data', 'working');
					update_post_meta($attID, 'wps_ic_status', array('time' => time(), 'type' => 'restore'));

					update_post_meta($attachmentID, 'wps_ic_restoring', 'true');
					update_post_meta($attachmentID, 'wps_ic_in_bulk', 'true');

					$call = wp_remote_get(WPS_IC_APIURL . '?restore_client=true&apikey=' . $options['api_key'] . '&attID=' . $attachmentID . '&hash=' . time(),
																array('timeout' => 120, 'sslverify' => false, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'));

					if (wp_remote_retrieve_response_code($call) == 200) {
						$body = wp_remote_retrieve_body($call);
						$body = json_decode($body, true);

						if ($body['success'] == false) {

							// Cannot restore
							clearstatcache();
							$file_data = get_attached_file($attachmentID);
							update_post_meta($attachmentID, 'wps_ic_noncompressed_size', filesize($file_data));
							delete_post_meta($attachmentID, 'wps_ic_compressed_size');
							delete_post_meta($attachmentID, 'wps_ic_data');
							delete_post_meta($attachmentID, 'wps_ic_dimmensions');
							delete_post_meta($attachmentID, 'wps_ic_restoring');
							delete_post_meta($attachmentID, 'wps_ic_in_bulk');
							delete_post_meta($attachmentID, 'wps_ic_state');
							delete_post_meta($attachmentID, 'wps_ic_status');

						} else {

							$image_list = $body['data'];
							delete_post_meta($attachmentID, 'wps_ic_state');

							if ($image_list) {
								foreach ($image_list as $size => $uri) {

									$url_filename = basename(parse_url($uri, PHP_URL_PATH));
									$temp_file    = wp_tempnam($url_filename);
									$fp           = fopen($temp_file, 'w+');

									// Call the remote file
									$ch = curl_init();

									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($ch, CURLOPT_URL, $uri);
									curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
									curl_setopt($ch, CURLOPT_POSTREDIR, 7);
									curl_setopt($ch, CURLOPT_FILE, $fp);
									curl_setopt($ch, CURLOPT_HEADER, 0);
									curl_setopt($ch, CURLOPT_TIMEOUT, 60);

									$data = curl_exec($ch);

									// Fetch the response code
									$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
									curl_close($ch);
									fclose($fp);

									if ($retcode == 200) {

										$file_data = get_attached_file($attachmentID);

										if ($size !== 'full') {
											$fullsizepath           = get_attached_file($attachmentID);
											$path_to_thumb          = str_replace(basename($fullsizepath), '', $fullsizepath);
											$current_thumbnail      = basename($uri);
											$current_thumbnail_path = $path_to_thumb . $current_thumbnail;
											$file_data              = $current_thumbnail_path;
										}

										if (copy($temp_file, $file_data)) {
											if ($size == 'full') {
												clearstatcache();
												$file_data = get_attached_file($attachmentID);
												update_post_meta($attachmentID, 'wps_ic_noncompressed_size', filesize($file_data));
												delete_post_meta($attachmentID, 'wps_ic_compressed_size');
												delete_post_meta($attachmentID, 'wps_ic_data');
												delete_post_meta($attachmentID, 'wps_ic_dimmensions');
												delete_post_meta($attachmentID, 'wps_ic_restoring');
												delete_post_meta($attachmentID, 'wps_ic_in_bulk');
												delete_post_meta($attachmentID, 'wps_ic_status');

												#wp_update_attachment_metadata((int)$attachment->ID, wp_generate_attachment_metadata((int)$attachment->ID, $file_data));
											}

											unlink($temp_file);
										}
									}
								}

							}

						}

					}

					$sent[] = $attID;
				}
			}
		}
	}


	public
	static function run_restore() {
		if ( ! empty($_GET['run_restore'])) {

			if ( ! function_exists('download_url')) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
				require_once(ABSPATH . "wp-admin" . '/includes/file.php');
				require_once(ABSPATH . "wp-admin" . '/includes/media.php');
			}

			if ( ! function_exists('update_option')) {
				require_once(ABSPATH . "wp-includes" . '/option.php');
			}

			ini_set('memory_limit', '2024M');
			ini_set('max_execution_time', '180');

			$stop       = get_option('wps_ic_bg_process_stop');
			$bg_process = get_option('wps_ic_bg_process');

			if (empty($_GET['automatic'])) {
				update_option('wps_ic_legacy_bulk_start', date('d.m.Y H:i:s'));
				delete_option('wps_ic_bg_process_stop');
			}

			if ($stop) {
				delete_option('wps_ic_bg_stopping');
				delete_option('wps_ic_bg_process_stop');
				wp_send_json_error('stopped');
			}

			ini_set('memory_limit', '2024M');
			ini_set('max_execution_time', '180');

			$args = array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => 3,
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => 'wps_ic_data',
						'compare' => 'EXISTS'
					),
					array(
						'key'     => 'wps_ic_exclude',
						'compare' => 'NOT EXISTS'
					),
					array(
						'key'     => 'wps_ic_data',
						'compare' => '!=',
						'value'   => 'working'
					)
				)
			);

			$compressed_attachments = new WP_Query($args);

			if ($compressed_attachments->have_posts()) {
				$options = get_option(WPS_IC_OPTIONS);
				$sent    = array();

				while ($compressed_attachments->have_posts()) {
					$compressed_attachments->the_post();
					$attachmentID = get_the_ID();
					$attID        = $attachmentID;

					$bg_process['count']    = $bg_process['count'] + 1;
					$bg_process['type']     = 'restore';
					$bg_process['last_run'] = time() + 60;
					update_option('wps_ic_bg_process', $bg_process);

					delete_post_meta($attID, 'wps_ic_locked');
					update_post_meta($attID, 'wps_ic_data', 'working');
					update_post_meta($attID, 'wps_ic_status', array('time' => time(), 'type' => 'restore'));

					update_post_meta($attachmentID, 'wps_ic_restoring', 'true');
					update_post_meta($attachmentID, 'wps_ic_in_bulk', 'true');

					$call = wp_remote_get(WPS_IC_APIURL . '?restore_client=true&apikey=' . $options['api_key'] . '&attID=' . $attachmentID . '&hash=' . time(),
																array('timeout' => 120, 'sslverify' => false, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'));

					if (wp_remote_retrieve_response_code($call) == 200) {
						$body = wp_remote_retrieve_body($call);
						$body = json_decode($body, true);

						if ($body['success'] == false) {

							// Cannot restore
							clearstatcache();
							$file_data = get_attached_file($attachmentID);
							update_post_meta($attachmentID, 'wps_ic_noncompressed_size', filesize($file_data));
							delete_post_meta($attachmentID, 'wps_ic_compressed_size');
							delete_post_meta($attachmentID, 'wps_ic_data');
							delete_post_meta($attachmentID, 'wps_ic_dimmensions');
							delete_post_meta($attachmentID, 'wps_ic_restoring');
							delete_post_meta($attachmentID, 'wps_ic_in_bulk');
							delete_post_meta($attachmentID, 'wps_ic_state');
							delete_post_meta($attachmentID, 'wps_ic_status');

						} else {

							$image_list = $body['data'];
							delete_post_meta($attachmentID, 'wps_ic_state');

							if ($image_list) {
								foreach ($image_list as $size => $uri) {

									$url_filename = basename(parse_url($uri, PHP_URL_PATH));
									$temp_file    = wp_tempnam($url_filename);
									$fp           = fopen($temp_file, 'w+');

									// Call the remote file
									$ch = curl_init();

									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($ch, CURLOPT_URL, $uri);
									curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
									curl_setopt($ch, CURLOPT_POSTREDIR, 15);
									curl_setopt($ch, CURLOPT_FILE, $fp);
									curl_setopt($ch, CURLOPT_HEADER, 0);
									curl_setopt($ch, CURLOPT_TIMEOUT, 60);

									$data = curl_exec($ch);

									// Fetch the response code
									$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
									curl_close($ch);
									fclose($fp);

									if ($retcode == 200) {

										$file_data = get_attached_file($attachmentID);

										if ($size !== 'full') {
											$fullsizepath           = get_attached_file($attachmentID);
											$path_to_thumb          = str_replace(basename($fullsizepath), '', $fullsizepath);
											$current_thumbnail      = basename($uri);
											$current_thumbnail_path = $path_to_thumb . $current_thumbnail;
											$file_data              = $current_thumbnail_path;
										}

										if (copy($temp_file, $file_data)) {
											if ($size == 'full') {
												clearstatcache();
												$file_data = get_attached_file($attachmentID);
												update_post_meta($attachmentID, 'wps_ic_noncompressed_size', filesize($file_data));
												delete_post_meta($attachmentID, 'wps_ic_compressed_size');
												delete_post_meta($attachmentID, 'wps_ic_data');
												delete_post_meta($attachmentID, 'wps_ic_dimmensions');
												delete_post_meta($attachmentID, 'wps_ic_restoring');
												delete_post_meta($attachmentID, 'wps_ic_in_bulk');
												delete_post_meta($attachmentID, 'wps_ic_status');

												#wp_update_attachment_metadata((int)$attachment->ID, wp_generate_attachment_metadata((int)$attachment->ID, $file_data));
											}

											unlink($temp_file);
										}
									}
								}

							}

						}

					}

					$sent[] = $attID;
				}

				$options = get_option(WPS_IC_OPTIONS);
				$ch      = curl_init(site_url('?run_restore=true&hash_time=' . md5(time()) . '&time=' . time() . '&automatic=true&apikey=' . $options['api_key']));

				// No Body return
				$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
				curl_setopt($ch, CURLOPT_USERAGENT, $agent);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_TIMEOUT, 15);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
				curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
				curl_exec($ch);
				curl_close($ch);

				wp_send_json_success('running');

			}

			$bg_process          = get_option('wps_ic_bg_process');
			$bg_process['count'] = $bg_process['total'];
			update_option('wps_ic_bg_process', $bg_process);
			delete_option('wps_ic_bg_process_stop');
			delete_option('wps_ic_bg_process_stats');
			delete_option('wps_ic_bg_process_running');

			update_option('wps_ic_legacy_bulk_end', date('d.m.Y H:i:s'));

			wp_send_json_error('no-att');
		}
	}


	public
	static function restore_all() {
		global $wps_ic;

		$options      = get_option(WPS_IC_OPTIONS);
		$stop_running = get_option('wps_ic_bg_process_stop');

		if ($stop_running == 'true') {
			delete_option('wps_ic_bg_process_stop');
			delete_option('wps_ic_bg_process_running');
			delete_option('wps_ic_bg_process_stats');
			delete_option('wps_ic_bg_last_run_restore');
			delete_option('wps_ic_bg_last_run_compress');
			#wp_mail('hrvoje.krbavac@gmail.com', 'WP Compress is forcefully stopped', 'we are stopped!');
			die();
		}

		update_option('wps_ic_bg_last_run_restore', time());

		$attachments = self::get_compressed_images(1);
		update_option('ic_last_restore_queue', print_r($attachments, true));

		if ($attachments) {
			$compress_queue = array();

			foreach ($attachments as $id => $data) {
				$compress_queue[] = $id;
			}

			if ( ! empty($compress_queue)) {
				$wps_ic->compress->bulk_restore(array('attachments' => $compress_queue), $options['api_key']);
			}

			$ch = curl_init(site_url('?remote_restore_legacy=true&hash_time=' . md5(time()) . '&time=' . time()));

			// No Body return
			$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 6);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_exec($ch);
			curl_close($ch);

			wp_send_json_success($compress_queue);
		}

		#wp_mail('hrvoje.krbavac@gmail.com', 'WP Compress is done', 'we are done!');
		delete_option('wps_ic_bg_last_run_restore');
		wp_send_json_error('No attachments to compress');
	}


	public
	static function compress_all() {
		global $wps_ic;

		ini_set('memory_limit', '2024M');
		ini_set('max_execution_time', '180');

		$log_file = WPS_IC_DIR . '/bulk-run-new.txt';
		$time     = current_time('mysql');

		if ( ! file_exists($log_file)) {
			fopen($log_file, 'w');
		}

		$log = file_get_contents($log_file);

		// Check
		$options        = get_option(WPS_IC_OPTIONS);
		$credits_legacy = get_option('ic_credits_legacy');

		if ( ! $credits_legacy || $credits_legacy == 0) {
			$call = wp_remote_get(WPS_IC_KEYSURL . '?action=get_credits&apikey=' . $options['api_key'], array('timeout' => 60, 'sslverify' => false));
			if (wp_remote_retrieve_response_code($call) == 200) {
				$body = wp_remote_retrieve_body($call);
				$body = json_decode($body);
				update_option('ic_credits_legacy', $body);

				if ($body <= 0) {
					// Stop all, send mail
					update_option('wps_ic_bg_process_stop', 'true');
					delete_option('wps_ic_bg_process_running');
					delete_option('wps_ic_bg_process_stats');
					delete_option('wps_ic_bg_last_run_restore');
					delete_option('wps_ic_bg_last_run_compress');
					update_option('ic_error', 'error on no credits 117 ' . WPS_IC_KEYSURL . '?action=get_credits&apikey=' . $options['api_key']);

					$log .= '[' . $time . '] - Stopped bulk - No Credits' . "\r\n";
					file_put_contents($log_file, $log);
					wp_send_json_error('Not enough credits');
				}

			} else {
				// Stop all, send mail
				update_option('wps_ic_bg_process_stop', 'true');
				delete_option('wps_ic_bg_process_running');
				delete_option('wps_ic_bg_process_stats');
				delete_option('wps_ic_bg_last_run_restore');
				delete_option('wps_ic_bg_last_run_compress');

				update_option('ic_error', array('msg' => 'error on no credits 130', 'url' => WPS_IC_KEYSURL . '?action=get_credits&apikey=' . $options['api_key'], 'code' => wp_remote_retrieve_response_code($call), 'body' => wp_remote_retrieve_body($call)));

				$log .= '[' . $time . '] - Stopped bulk - No Credits' . "\r\n";
				file_put_contents($log_file, $log);
				wp_send_json_error('Not enough credits');
			}
		} else {

			if ($credits_legacy - 1 <= 0) {
				// Stop all, send mail
				update_option('wps_ic_bg_process_stop', 'true');
				delete_option('wps_ic_bg_process_running');
				delete_option('wps_ic_bg_process_stats');
				delete_option('wps_ic_bg_last_run_restore');
				delete_option('wps_ic_bg_last_run_compress');

				update_option('ic_error', array('msg' => 'error on no credits 146'));
			}

		}

		$options      = get_option(WPS_IC_OPTIONS);
		$stop_running = get_option('wps_ic_bg_process_stop');

		update_option('wps_ic_bg_last_run_compress', time());

		if ($stop_running == 'true') {
			delete_option('wps_ic_bg_process_stop');
			delete_option('wps_ic_bg_process_running');
			delete_option('wps_ic_bg_process_stats');
			delete_option('wps_ic_bg_last_run_restore');
			delete_option('wps_ic_bg_last_run_compress');
			#wp_mail('hrvoje.krbavac@gmail.com', 'WP Compress is forcefully stopped', 'we are stopped!');
			die();
		}

		$log .= '[' . $time . '] - Started bulk' . "\r\n";
		file_put_contents($log_file, $log);

		$attachments = self::get_uncompressed_images(1);
		update_option('ic_last_compress_queue', print_r($attachments, true));

		$log .= '[' . $time . '] - Got attachments' . "\r\n";
		$log .= print_r($attachments, true) . "\r\n";
		file_put_contents($log_file, $log);

		if ($attachments) {
			$compress_queue = array();

			foreach ($attachments as $id => $data) {
				$compress_queue[] = $id;
			}

			$log .= "Queue:" . "\r\n";
			$log .= print_r($compress_queue, true) . "\r\n";
			file_put_contents($log_file, $log);

			if ( ! empty($compress_queue)) {
				$wps_ic->compress->bulk(array('attachments' => $compress_queue), $options['api_key']);
			}

			$log .= "Sending GET Request at " . date('d.m.Y H:i:s', time()) . "\r\n";
			file_put_contents($log_file, $log);
			sleep(1);

			$ch = curl_init(site_url('?remote_compress_legacy=true&hash_time=' . md5(time()) . '&time=' . time()));

			// No Body return
			$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 6);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_exec($ch);
			curl_close($ch);

			$log .= "GET Request Finished at " . date('d.m.Y H:i:s', time()) . "\r\n";
			#$log .= print_r($get, true) . "\r\n";
			file_put_contents($log_file, $log);

			$log .= "Get Call:" . "\r\n";
			#$log .= wp_remote_retrieve_response_code($get) . "\r\n";
			#$log .= wp_remote_retrieve_body($get) . "\r\n";
			#file_put_contents($log_file, $log);

			wp_send_json_success(array('queue' => $compress_queue));
		}

		delete_option('wps_ic_bg_last_run_compress');
		wp_send_json_error('No attachments to compress');
	}


	/**
	 * On attachment upload, update metadata
	 *
	 * @param $post_ID
	 */
	public
	static function metadata_update(
		$post_ID
	) {
		// Dimensions
		$dimensions_metadata = wp_get_attachment_metadata($post_ID);
		$dimensions          = get_post_meta($post_ID, 'wps_ic_dimmensions', true);
		if ( ! $dimensions) {
			$dimensions = array();
		}

		$dimensions['new']['width']  = $dimensions_metadata['width'];
		$dimensions['new']['height'] = $dimensions_metadata['height'];
		update_post_meta($post_ID, 'wps_ic_dimmensions', $dimensions_metadata);
	}


	/***
	 * Compress attachment on upload
	 *
	 * @param $post_ID
	 */
	public
	static function on_upload(
		$post_ID
	) {
		global $wps_ic;
		$attachment_ID = $post_ID;
		$curl          = new wps_ic_curl();

		$file_data = get_attached_file($attachment_ID);
		$type      = wp_check_filetype($file_data);

		$allowed_types         = array();
		$allowed_types['jpg']  = 'jpg';
		$allowed_types['jpeg'] = 'jpeg';
		$allowed_types['gif']  = 'gif';
		$allowed_types['png']  = 'png';

		if ( ! in_array(strtolower($type['ext']), $allowed_types)) {
			return;
		}

		$options  = get_option(WPS_IC_OPTIONS);
		$settings = get_option(WPS_IC_SETTINGS);

		update_post_meta($attachment_ID, 'wps_ic_data', 'working');
		update_post_meta($attachment_ID, 'wps_ic_library_run', 'true');
		update_post_meta($attachment_ID, 'wps_ic_action_compress', 'true');

		$ch = curl_init(WPS_IC_APIURL . '?pull_from_client=true&apikey=' . $options['api_key'] . '&attID=' . $attachment_ID . '&settings[quality]=' . $settings['optimization'] . '&settings[resize]=' . $settings['resize_larger_images'] . '&settings[resize_width]=' . $settings['resize_larger_images_width']);

		// No Body return
		$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0';
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_exec($ch);
		curl_close($ch);
	}

}