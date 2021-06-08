<?php


/**
 * Class - Debug
 */
class wps_ic_debug extends wps_ic {


  public function __construct() {

  	add_action('wp_ajax_debug_image_download', array(&$this, 'image_upload'));
  	add_action('wp_ajax_debug_image_compress', array(&$this, 'image_compress'));
  	add_action('wp_ajax_debug_image_restore', array(&$this, 'image_restore'));

  }


  public function get_memory_usage() {
  	$memory = size_format(memory_get_usage(), 2);
  	return $memory;
	}


  public function image_upload() {
		$message = array();

    // Remove on upload
		$init_memory = $this->get_memory_usage();
		$message[] = 'Start Memory Usage: ' . $this->get_memory_usage();

    $options      = get_option(WPS_IC_SETTINGS);
    $old_settings = $options;
    delete_option(WPS_IC_SETTINGS);

    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Test Image
    $image = 'https://plugin.wpcompress.xyz/test-image.jpg';

    // Was it already uploaded?
    $test_image = get_option('wps_ic_test_image');

    if (!empty($test_image)) {
      delete_option('wps_ic_test_image');
      wp_delete_attachment($test_image, true);
      $test_image = false;
    }

    $call_the_image = wp_remote_get($image, array('timeout' => 30, 'sslverify' => false));
    if (wp_remote_retrieve_response_code($call_the_image) !== 200) {

    	$message[] = "We were unable to open the remote testing image.";
			$message[] = "Remote Image URL: " . $image;
			$message[] = "Response Code: " . wp_remote_retrieve_response_code($call_the_image);
			$message[] = "Issue:";
			$message[] = "Maybe your ISP is blocking our testing URL?";
			$message[] = "Maybe your ISP does not allow wp_remote_get function?";
			$message[] = "Maybe our testing image is not working?";
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();

    	wp_send_json_error(array('code' => wp_remote_retrieve_response_code($call_the_image), 'message' => $message));
		} else {

    	$message[] = 'We have <span class="green">successfully</span> opened the remote testing image.';

			$media = media_sideload_image($image, 0, '', 'id');
			update_option('wps_ic_test_image', $media);
			update_option(WPS_IC_SETTINGS, $old_settings);


			if (is_wp_error($media) || !$media) {
				$message[] = "We were <span class=\"error\">unable to download</span> the remote testing image with WordPress media_sideload_image.";
				$message[] = $media->get_error_message();
				$message[] = "Issue:";
				$message[] = "Maybe your server does not allow media_sideload_image WordPress/PHP Function?";
				$message[] = "Maybe you don't have write privileges on your uploads directory?";
				$message[] = "Maybe your server does not have enough disk space?";
				$message[] = 'Memory Usage: ' . $this->get_memory_usage();
				wp_send_json_error(array('message' => $message));
			} else {
				$message[] = "We have <span class=\"green\">successfully</span> downloaded the remote testing image.";
				$message[] = "Attachment ID: " . $media;
				$message[] = 'Memory Usage: ' . $this->get_memory_usage();
				wp_send_json_success(array('message' => $message));
			}

		}

  }


  public function image_compress() {
		$message = array();
		$message[] = 'Start Memory Usage: ' . $this->get_memory_usage();

    global $wps_ic;
    $wps_ic = new wps_ic();

    if (!empty($_POST['attachmentID'])) {
			$attachmentID = sanitize_text_field($_POST['attachmentID']);
			$compress_test = $attachmentID;
			update_option('wps_ic_test_image', $compress_test);
			update_option('wps_ic_debug_tool_media_lib_image', 'true');
		} else {
			$attachmentID = false;
			$compress_test = get_option('wps_ic_test_image');
		}


		if (!$compress_test || empty($compress_test)) {
			$message[] = "Testing image does not exist.";
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();
			wp_send_json_error(array('message' => $message));
		}

    // API Key
    $tmp_key = get_option('wps_ic_tmp_apikey');
    $apikey  = sanitize_text_field($tmp_key);

		if (!$apikey || empty($apikey)) {
			$message[] = "API Key does not exist.";
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();
			wp_send_json_error(array('message' => $message));
		}

    $debug = $wps_ic->compress->bulk(array('attachments' => array($compress_test)), $apikey, false, '', true);

    $data = get_post_meta($compress_test, 'wps_ic_data', true);

    if ( ! empty($data)) {

			$compressed_value   = get_post_meta($compress_test, 'wps_ic_compressed_size', true);
			$uncompressed_value = get_post_meta($compress_test, 'wps_ic_noncompressed_size', true);
			$image = wp_get_attachment_image_url($compress_test, 'full');

			$message[] = "We have <span class=\"green\">successfully</span> compressed the testing image.";
			$message[] = "URL: " . $image;
			$message[] = "Non-Compressed Image Size: " . size_format($uncompressed_value, 2);
			$message[] = "Compressed Image Size: " . size_format($compressed_value, 2);
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();

			$message[] = print_r(get_post_meta($compress_test, 'request_params', true), true);
			$message[] = get_post_meta($compress_test, 'request_response_code', true);
			$message[] = get_post_meta($compress_test, 'request_response_body', true);

			delete_post_meta($compress_test, 'request_params');
			delete_post_meta($compress_test, 'request_response_code');
			delete_post_meta($compress_test, 'request_response_body');

			wp_send_json_success(array('message' => $message));

    } else {

			$media_library_image = get_option('wps_ic_debug_tool_media_lib_image');

			if (!$media_library_image) {
				wp_delete_attachment($compress_test, true);
			}

      delete_option('wps_ic_test_image');
      delete_option('wps_ic_debug_tool_media_lib_image');

			$message[] = "We were <span class=\"error\">unable</span> to compress the testing image.";
			$message[] = print_r(get_post_meta($compress_test, 'request_params', true), true);
			$message[] = get_post_meta($compress_test, 'request_response_code', true);
			$message[] = get_post_meta($compress_test, 'request_response_body', true);
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();

			$debug = json_decode($debug);
			$image = wp_get_attachment_image_url($compress_test, 'full');

			$message[] = "Response from API:";
			$message[] = $debug->data;
			$message[] = "Issue:";
			$message[] = "We were unable to download the image from URL " . $image;
			$message[] = "Maybe your file does not have write permissions?";
			$message[] = "Maybe your ISP is blocking our API endpoints (cloudflare, firewall...)?";
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();

			delete_post_meta($compress_test, 'request_params');
			delete_post_meta($compress_test, 'request_response_code');
			delete_post_meta($compress_test, 'request_response_body');

			wp_send_json_error(array('message' => $message));
    }

		$message[] = "Unkown error occured.";
		wp_send_json_error(array('message' => $message));
  }


  public function image_restore() {
    global $wps_ic;
    $wps_ic = new wps_ic();

    // Test Image
    $test_image = get_option('wps_ic_test_image');

    if (!$test_image || empty($test_image)) {
    	delete_option('wps_ic_debug_tool_media_lib_image');
			$message[] = "We were <span class=\"error\">unable</span> to fetch the testing image.";
			$message[] = 'Memory Usage: ' . $this->get_memory_usage();

			wp_send_json_error(array('message' => $message));
		} else {

      $queue = $wps_ic->queue->add_queue($test_image, 'hidden_restore_bulk');
      $restore = $wps_ic->compress->bulk_restore(array('attachments' => array($test_image)));

      $media_library_image = get_option('wps_ic_debug_tool_media_lib_image');
      $data = get_post_meta($test_image, 'wps_ic_data', true);

      if (!$media_library_image) {
				wp_delete_attachment($test_image, true);
			}

      delete_option('wps_ic_test_image');
			delete_option('wps_ic_debug_tool_media_lib_image');

      if ( ! empty($data)) {
				$message[] = "We were <span class=\"error\">unable</span> to restore the testing image.";
				$message[] = 'Memory Usage: ' . $this->get_memory_usage();
				wp_send_json_error(array('message' => $message));
      } else {
				$message[] = "We were <span class=\"green\">successfully</span> restored the testing image.";
				$message[] = 'Memory Usage: ' . $this->get_memory_usage();
				wp_send_json_success(array('message' => $message));
      }

    }
  }

}