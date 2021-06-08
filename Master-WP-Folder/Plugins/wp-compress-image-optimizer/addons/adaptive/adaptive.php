<?php


class wps_addon_adaptive {


	public function __construct() {

		// Options
		$options = get_option(WPS_IC_SETTINGS);

		/**
		 * Register new image sizes for Adaptive Images
		 */
		$this->register_new_sizes();
		add_action('init', array(&$this, 'register_new_sizes'), 1);

		/**
		 * If Option "Adaptive Images" is enabled
		 */
		if ( ! empty($options['adaptive']) && $options['adaptive'] == '1') {

			if (is_admin()) {
				return;
			}

		}

		// Edit Htaccess
		add_action('admin_init', array(&$this, 'write_htaccess'));
	}


	/***
	 * Write htaccess, add deflate
	 * TODO: Check nginx servers
	 */
	public function write_htaccess() {
		$htaccess_written  = get_option('ic_htaccess');
		$htaccess_version = '4.20.1';

		if ( ! $htaccess_written || $htaccess_written !== $htaccess_version) {
			$htaccess_writable = $this->is_htaccess_writeable();

			if ($htaccess_writable) {
				$htaccess              = ABSPATH . '.htaccess';
				$htaccess_old_contents = file_get_contents($htaccess);

				if (strpos($htaccess_old_contents, 'WP ImageCompress Start') !== false) {

					// Remove HTAcess
					$htaccess_old_contents = trim($htaccess_old_contents);
					$start = strpos($htaccess_old_contents, '#WP ImageCompress Start');
					$end   = strpos($htaccess_old_contents, '#WP ImageCompress End');

					if ($start !== false && $end !== false) {
						$end = $end + strlen('#WP ImageCompress End');

						$len              = $end - $start;
						$htaccess_updated = substr_replace($htaccess_old_contents, '', $start, $len);
						$copy             = copy($htaccess, $htaccess . '_backup_edited');

						if ($copy) {
							$htaccess_new_contents = $htaccess_updated;

							// Is Gzip Existing?
							if (strpos($htaccess_updated, 'mod_deflate') == false) {
								// Gzip Block
								$gzip_block = '';
								$gzip_block .= "\n";
								$gzip_block .= "#WP ImageCompress Start";
								$gzip_block .= "\n";
								$gzip_block .= "<IfModule mod_deflate.c>" . "\n";
								$gzip_block .= "AddType x-font/woff .woff" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE image/svg+xml" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE text/plain" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE text/html" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE text/xml" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE text/css" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE text/javascript" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/xml" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/xhtml+xml" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/rss+xml" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/javascript" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/x-javascript" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/x-font-ttf" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE application/vnd.ms-fontobject" . "\n";
								$gzip_block .= "AddOutputFilterByType DEFLATE font/opentype font/ttf font/eot font/otf" . "\n";
								$gzip_block .= "</IfModule>" . "\n";
								$gzip_block .= "\n";
								$gzip_block .= "#WP ImageCompress End";
								$htaccess_new_contents .= $gzip_block;
							}

							$write                 = file_put_contents($htaccess, $htaccess_new_contents);
							if ($write) {
								update_option('ic_htaccess', $htaccess_version);
							}
						}
					}
				}

				flush_rewrite_rules();
			}
		}
	}


	/**
	 * Is htaccess writeable?
	 * @return bool
	 */
	public static function is_htaccess_writeable() {
		$htaccess = ABSPATH . '.htaccess';

		return
			( ! file_exists($htaccess) && @fopen($htaccess, 'w')) ||
			(file_exists($htaccess) && is_writable($htaccess));
	}


	/**
	 * Thumbnail rebuild, in case of some issues we use it to rebuild original thumbs back
	 * @param $attachment_ID
	 * @return array
	 * TODO: Maybe remove?
	 */
	public function thumbnail_rebuild($attachment_ID) {

		if ( ! defined('ABSPATH')) {
			/** Set up WordPress environment */
			require_once(dirname(__FILE__) . '/wp-load.php');
		}

		if ( ! function_exists('wp_generate_attachment_metadata')) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
		}

		if ( ! function_exists('download_url')) {
			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			require_once(ABSPATH . "wp-admin" . '/includes/file.php');
			require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		}

		if ( ! function_exists('update_option')) {
			require_once(ABSPATH . "wp-includes" . '/option.php');
		}

		// Count offset
		$count = get_option('wps_ic_rebuild_offset');
		update_option('wps_ic_rebuild_offset', $count + 1);
		// Get the path.
		$fullsizepath = get_attached_file($attachment_ID);

		// Regen the attachment.
		if (false !== $fullsizepath && file_exists($fullsizepath)) {
			wp_update_attachment_metadata((int)$attachment_ID, wp_generate_attachment_metadata((int)$attachment_ID, $fullsizepath));

			return ['regenrated' => true];
		} else {
			return [
				'src'   => wp_get_attachment_thumb_url($attachment_ID),
				'error' => sprintf(
					__('This file does not exists and have not been regenerated :<br/><a target="_blank" href="%1$s" >%2$s</a>', 'simple-image-sizes'),
					get_edit_post_link($attachment_ID),
					get_the_title($attachment_ID)
				),
			];

		}

		return [
			'src'   => wp_get_attachment_thumb_url($attachment_ID),
			'title' => get_the_title($attachment_ID),
		];
	}


	/**
	 * Count all attachments which mime_type is image.
	 * TODO: Maybe remove?
	 */
	public function count_attachments() {
		$attachments = get_children(
			[
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'numberposts'    => - 1,
				'post_status'    => null,
				'post_parent'    => null, // any parent
				'output'         => 'ids',
			]
		);
		// Return the Id's and Title of medias
		wp_send_json(array('total' => count($attachments)));
	}


	public function register_new_sizes() {
		add_image_size('img-2880', 2880, 9999, false);
		add_image_size('img-2280', 2280, 9999, false);
		add_image_size('img-1440', 1440, 9999, false);
		add_image_size('img-1140', 1140, 9999, false);
		add_image_size('img-720', 720, 9999, false);
		add_image_size('img-652', 652, 9999, false);
		add_image_size('img-570', 570, 9999, false);
		add_image_size('img-360', 360, 9999, false);
		add_image_size('img-180', 180, 9999, false);
	}


}