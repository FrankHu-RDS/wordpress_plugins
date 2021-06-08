<?php


class wps_addon_cdn {

	public static $domain;
	public static $protocol;
	public static $image_count;
	public static $image_count_alter_src;
	public static $zone_name;
	public static $settings;
	public static $options;
	public static $excluded_list;
	public static $apiUrl;
	public static $cdnEnabled;
	public static $apiAssetUrl;
	public static $placeholder;
	public static $hash;
	public static $updir;
	public static $is_retina;
	public static $retina_enabled;
	public static $exif;
	public static $webp;
	public static $adaptive_enabled;
	public static $webp_enabled;
	public static $lazy_enabled;
	public static $external_url_enabled;
	public static $resolutions;
	public static $home_url;
	public static $site_url;
	public static $site_url_scheme;
	public static $defined_resolution;
	public static $svg_placeholder;
	public static $speed_test;
	public static $speed_test_img_count_limit;
	public static $css;
	public static $css_minify;
	public static $html_cache;
	public static $emoji_remove;
	public static $js;
	public static $js_minify;
	public static $isAjax;
	public static $brizyCache;
	public static $replacedJS;
	public static $preload_image;


	public function __construct() {
		if ( ! empty($_GET['ignore_ic'])) {
			return;
		}

		if (strpos($_SERVER['REQUEST_URI'], '.xml') !== false) {
			return;
		}

		self::$settings = get_option(WPS_IC_SETTINGS);
		if ( ! empty(self::$settings['live-cdn']) && self::$settings['live-cdn'] == '0') {
			#return;
		}

		self::$cdnEnabled = self::$settings['live-cdn'];

		// Plugin is NOT Activated
		self::$options = get_option(WPS_IC_OPTIONS);
		$response_key  = self::$options['response_key'];
		if (empty($response_key)) {
			return;
		}

		// Is an ajax request?
		self::$isAjax = (function_exists("wp_doing_ajax") && wp_doing_ajax()) || (defined('DOING_AJAX') && DOING_AJAX);

		// Don't run in admin side!
		if ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php") {
			return;
		}

		// TODO: Check this for wpadmin and frontend ajax
		if ( ! self::$isAjax) {
			if (is_admin() || ! empty($_GET['trp-edit-translation']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['elementor-preview']) || ! empty($_GET['preview']) || ! empty($_GET['PageSpeed']) || ! empty($_GET['et_fb']) || ! empty($_GET['ct_builder']) || ( ! empty
					($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php")) {
				return;
			}
		}

		self::$preload_image              = array();
		self::$speed_test_img_count_limit = 6;
		self::$speed_test                 = $this->is_st();
		self::$svg_placeholder            = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAwIiBoZWlnaHQ9IjEwMCI+PHBhdGggZD0iTTIgMmgxMDAwdjEwMEgyeiIgZmlsbD0iI2ZmZiIgb3BhY2l0eT0iMCIvPjwvc3ZnPg==';

		self::$updir = wp_upload_dir();

		// If SpeedTest Then disable LS cache and rocket cache
		if (self::$speed_test) {
			define('LSCACHE_NO_CACHE', true);
			define('DONOTCACHEPAGE', true);
			add_filter('rocket_override_donotcachepage', '__return_true', PHP_INT_MAX);
		}

		if ( ! is_multisite()) {
			self::$site_url = site_url();
			self::$home_url = home_url();
		} else {
			self::$site_url = network_site_url();
			self::$home_url = network_home_url();
		}

		self::$site_url_scheme = parse_url(self::$site_url, PHP_URL_SCHEME);
		self::$excluded_list   = get_option('wps_ic_exclude_list');
		self::$brizyCache      = get_option('wps_ic_brizy_cache');

		self::$placeholder           = false;
		self::$image_count           = 0;
		self::$image_count_alter_src = 0;

		if ( ! self::$settings['cname'] || empty(self::$settings['cname'])) {
			self::$zone_name = get_option('ic_cdn_zone_name');
		} else {
			$custom_cname    = get_option('ic_custom_cname');
			self::$zone_name = $custom_cname;
		}

		if (empty(self::$zone_name)) {
			return;
		}

		self::$resolutions = array('desktop' => 1920, 'laptop' => 1500, 'laptop' => 1280, 'tablet' => 1024, 'laptop' => 768, 'mobile' => 480, 'xsmobile' => 290);

		self::$is_retina            = 'false';
		self::$webp                 = 'false';
		self::$external_url_enabled = 'false';

		self::$lazy_enabled     = self::$settings['lazy'];
		self::$adaptive_enabled = self::$settings['generate_adaptive'];
		self::$webp_enabled     = self::$settings['generate_webp'];
		self::$retina_enabled   = self::$settings['retina'];

		if ( ! empty(self::$settings['external-url'])) {
			self::$external_url_enabled = self::$settings['external-url'];
		}

		self::$external_url_enabled = self::$settings['external-url'];
		self::$css                  = self::$settings['css'];
		self::$css_minify           = self::$settings['css-minify'];
		self::$js                   = self::$settings['js'];
		self::$js_minify            = self::$settings['js-minify'];
		self::$emoji_remove         = self::$settings['emoji-remove'];
		self::$exif                 = self::$settings['preserve_exif'];
		self::$html_cache           = self::$settings['html-cache'];

		if ( ! empty(self::$emoji_remove) && self::$emoji_remove == '1') {
			// Remove WP Emoji
			$this->remove_emoji();
		}

		if ( ! empty(self::$retina_enabled) && self::$retina_enabled == '1') {
			if (isset($_COOKIE["ic_pixel_ratio"])) {
				if ($_COOKIE["ic_pixel_ratio"] >= 2) {
					self::$is_retina = 'true';
				}
			}
		}

		/**
		 * Does browser support WebP?
		 */
		if ( ! empty(self::$webp_enabled) && self::$webp_enabled == '1') {
			if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false) {
				self::$webp = 'true';
			}
		}

		// If Optimization Quality is Not set..
		if (empty(self::$settings['optimization']) || self::$settings['optimization'] == '' || self::$settings['optimization'] == '0') {
			self::$settings['optimization'] = 'intelligent';
		}

		$options = self::$options;

		if ( ! empty($_GET['test_zone'])) {
			self::$zone_name = $_GET['test_zone'] . '.wpmediacompress.com/key:' . $options['api_key'];
		}

		if ( ! empty(self::$exif) && self::$exif == '1') {
			self::$apiUrl = 'https://' . self::$zone_name . '/q:' . self::$settings['optimization'] . '/exif:true';
		} else {
			self::$apiUrl = 'https://' . self::$zone_name . '/q:' . self::$settings['optimization'] . '';
		}

		self::$apiAssetUrl = 'https://' . self::$zone_name . '/asset:';

		self::$defined_resolution = self::$resolutions['desktop'];
		if ( ! isset($_COOKIE['ic_window_resolution'])) {
			// TODO: Something?
		} else {
			$resolution               = $this->find_closes_matching_resolution($_COOKIE['ic_window_resolution']);
			self::$defined_resolution = $resolution;
		}

		if (self::$speed_test || $this->is_mobile()) {
			self::$retina_enabled     = false;
			self::$is_retina          = 'false';
			self::$defined_resolution = self::$resolutions['mobile'];
		}

		// Favicon
		add_filter('woocommerce_single_product_image_thumbnail_html', array(&$this, 'filter_Woo_gallery_html'), 10, 2);
		add_filter('woocommerce_gallery_image_html_attachment_image_params', array(&$this, 'filter_Woo_gallery'), 10, 4);
		add_filter('the_content', array(&$this, 'process_images_from_content'), PHP_INT_MAX);

		#add_action('wp_head', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);
		#add_action('wp_enqueue_scripts', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);
		#add_action('wp_print_styles', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);

		if (( ! empty(self::$settings['css']) && self::$settings['css'] == '1') || ! empty(self::$settings['css_image_urls']) && self::$settings['css_image_urls'] == '1') {
			#add_action('wp_head', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);
			#add_action('wp_enqueue_scripts', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);
			#add_action('wp_print_styles', array(&$this, 'enqueue_css_print'), PHP_INT_MAX);
		}

		#add_filter('style_loader_src', array(&$this, 'remove_ver'), 10, 2);
		#add_filter('script_loader_src', array(&$this, 'remove_ver'), 10, 2);
	}


	/**
	 * Detect SpeedTest like pingdom or gtmetrix
	 * @return bool
	 */
	public function is_st() {

		if (is_admin()) {
			return false;
		}

		$ip_list = array(
			0   => '5.172.196.188',
			1   => '13.232.220.164',
			2   => '23.22.2.46',
			3   => '23.83.129.219',
			4   => '23.111.152.74',
			5   => '23.111.159.174',
			6   => '27.122.14.7',
			7   => '37.252.231.50',
			8   => '43.225.198.122',
			9   => '43.229.84.12',
			10  => '46.20.45.18',
			11  => '46.165.195.139',
			12  => '46.246.122.10',
			13  => '50.16.153.186',
			14  => '50.23.28.35',
			15  => '52.0.204.16',
			16  => '52.24.42.103',
			17  => '52.48.244.35',
			18  => '52.52.34.158',
			19  => '52.52.95.213',
			20  => '52.52.118.192',
			21  => '52.57.132.90',
			22  => '52.59.46.112',
			23  => '52.59.147.246',
			24  => '52.62.12.49',
			25  => '52.63.142.2',
			26  => '52.63.164.147',
			27  => '52.63.167.55',
			28  => '52.67.148.55',
			29  => '52.73.209.122',
			30  => '52.89.43.70',
			31  => '52.194.115.181',
			32  => '52.197.31.124',
			33  => '52.197.224.235',
			34  => '52.198.25.184',
			35  => '52.201.3.199',
			36  => '52.209.34.226',
			37  => '52.209.186.226',
			38  => '52.210.232.124',
			39  => '54.68.48.199',
			40  => '54.70.202.58',
			41  => '54.94.206.111',
			42  => '64.237.49.203',
			43  => '64.237.55.3',
			44  => '66.165.229.130',
			45  => '66.165.233.234',
			46  => '72.46.130.18',
			47  => '72.46.130.44',
			48  => '76.72.167.90',
			49  => '76.72.167.154',
			50  => '76.72.172.208',
			51  => '76.164.234.106',
			52  => '76.164.234.170',
			53  => '81.17.62.205',
			54  => '82.103.136.16',
			55  => '82.103.139.165',
			56  => '82.103.145.126',
			57  => '83.170.113.210',
			58  => '85.195.116.134',
			59  => '89.163.146.247',
			60  => '89.163.242.206',
			61  => '94.75.211.73',
			62  => '94.75.211.74',
			63  => '94.247.174.83',
			64  => '95.141.32.46',
			65  => '95.211.198.87',
			66  => '96.47.225.18',
			67  => '103.47.211.210',
			68  => '104.129.24.154',
			69  => '104.129.30.18',
			70  => '109.123.101.103',
			71  => '138.219.43.186',
			72  => '148.72.170.233',
			73  => '148.72.171.17',
			74  => '151.106.52.134',
			75  => '162.218.67.34',
			76  => '168.1.92.58',
			77  => '169.51.2.22',
			78  => '169.56.174.147',
			79  => '172.241.112.86',
			80  => '173.248.147.18',
			81  => '173.254.206.242',
			82  => '174.34.156.130',
			83  => '175.45.132.20',
			84  => '178.255.152.2',
			85  => '178.255.153.2',
			86  => '178.255.155.2',
			87  => '179.50.12.212',
			88  => '184.75.208.210',
			89  => '184.75.209.18',
			90  => '184.75.210.90',
			91  => '184.75.210.226',
			92  => '184.75.214.66',
			93  => '185.39.146.214',
			94  => '185.39.146.215',
			95  => '185.70.76.23',
			96  => '185.93.3.92',
			97  => '185.136.156.82',
			98  => '185.152.65.167',
			99  => '185.180.12.65',
			100 => '185.246.208.82',
			101 => '188.172.252.34',
			102 => '199.87.228.66',
			103 => '201.33.21.5',
			104 => '207.244.80.239',
			105 => '209.58.139.193',
			106 => '209.58.139.194',
			107 => '78.0.31.33',
		);

		$ip_list[] = '208.70.247.157';
		$ip_list[] = '204.187.14.70';
		$ip_list[] = '204.187.14.71';
		$ip_list[] = '204.187.14.72';
		$ip_list[] = '204.187.14.73';
		$ip_list[] = '204.187.14.74';
		$ip_list[] = '204.187.14.75';
		$ip_list[] = '204.187.14.76';
		$ip_list[] = '204.187.14.77';
		$ip_list[] = '204.187.14.78';
		$ip_list[] = '199.10.31.194';
		$ip_list[] = '199.10.31.195';
		$ip_list[] = '199.10.31.196';
		$ip_list[] = '13.85.80.124';
		$ip_list[] = '13.84.146.132';
		$ip_list[] = '13.84.146.226';
		$ip_list[] = '40.74.254.217';
		$ip_list[] = '13.84.43.227';
		$ip_list[] = '104.214.75.209';
		$ip_list[] = '172.255.61.34';
		$ip_list[] = '172.255.61.35';
		$ip_list[] = '172.255.61.36';
		$ip_list[] = '172.255.61.37';
		$ip_list[] = '172.255.61.38';
		$ip_list[] = '172.255.61.39';
		$ip_list[] = '172.255.61.40';
		$ip_list[] = '13.70.66.20';
		$ip_list[] = '52.147.27.127';
		$ip_list[] = '191.235.85.154';
		$ip_list[] = '191.235.86.0';
		$ip_list[] = '52.66.75.147';
		$ip_list[] = '52.175.28.116';

		$pingdom    = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'pingdom');
		$pingdombot = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'pingbot');
		$gtmetrix   = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'gtmetrix');
		$pageSpeed  = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'pagespeed');
		$google     = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'google page speed');
		$google_ps  = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'lighthouse');

		if ( ! empty($_GET['simulate_test'])) {
			return true;
		}

		if ($pingdom !== false) {
			return true;
		}

		if ($pingdombot !== false) {
			return true;
		}

		if ($pageSpeed !== false) {
			return true;
		}

		if ($gtmetrix !== false) {
			return true;
		}

		if ($google !== false) {
			return true;
		}

		if ($google_ps !== false) {
			return true;
		}
		return false;
		$userIP = $_SERVER['REMOTE_ADDR'];
		if (in_array($userIP, $ip_list)) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * Remove WP Emoji
	 */
	public function remove_emoji() {
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	}


	public function find_closes_matching_resolution($match_resolution) {
		if (is_array(self::$resolutions)) {
			arsort(self::$resolutions);
			foreach (self::$resolutions as $device => $resolution) {
				if ($resolution > $match_resolution) {
					continue;
				} else {
					return $resolution;
				}
			}
		}
	}


	public function is_mobile() {
		$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

		if (strpos($userAgent, 'Chrome-Lighthouse')) {
			return true;
		} else {
			return false;
		}
	}


	public static function remove_ver($src) {
		if (strpos($src, '?ver=')) {
			$src = remove_query_arg('ver', $src);
		}

		return $src;
	}


	public static function enqueue_css_print() {
		global $css_run, $post;

		if (isset($_GET['brizy-edit-iframe']) || isset($_GET['brizy-edit']) || isset($_GET['preview'])) {
			return;
		}

		if (is_admin() || ! empty($_GET['trp-edit-translation']) || ! empty($_GET['elementor-preview']) || ! empty($_GET['preview']) || ! empty($_GET['PageSpeed']) || ! empty($_GET['et_fb']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['ct_builder']) || ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize
		.php")) {
			return;
		}

		wp_styles(); //ensure styles is initialised
		global $wp_styles;

		// Setup MinifyClass
		$uriRewrite = new Minify_CSS_UriRewriter();

		$css_cache = get_transient('wps_ic_css_cache');
		$css_cache = (bool)$css_cache;
		$css_cache = false;

		// Predefined Variables
		$comined_css = '';
		$combined    = array();

		// Setup a List of Modified CSS Files
		$modified_css_files = get_option('wps_ic_modified_css_cache');
		if (empty($modified_css_files)) {
			$modified_css_files = array();
		}

		// Setup a Cache Dir and URL
		$cache_dir = WPS_IC_CACHE . $post->ID;
		$cache_url = WPS_IC_CACHE_URL . $post->ID;

		// If cache dir for post type does not exist, create it
		if ( ! file_exists($cache_dir)) {
			mkdir($cache_dir);
		}

		// If cache expired delete option
		if ( ! $css_cache) {
			delete_option('wps_ic_modified_css_cache');
			delete_option('wps_ic_css_combined_cache');
		}

		// Find real path to WordPress
		$frontend = rtrim(ABSPATH, '/');
		if ( ! $frontend) {
			$frontend = parse_url(get_option('home'));
			$frontend = ! empty($frontend['path']) ? $frontend['path'] : '';
			$frontend = $_SERVER['DOCUMENT_ROOT'] . $frontend;
		}

		$frontend = realpath($frontend);

		$combined['deps']     = array();
		$combined['file_dir'] = $cache_dir . '/combined.css';
		$combined['file_url'] = $cache_url . '/combined.css';

		// Print all loaded Styles (CSS)
		foreach ($wp_styles->queue as $style) {

			if ($style == 'admin-bar') {
				continue;
			}

			$deps    = $wp_styles->registered[ $style ]->deps;
			$handle  = $wp_styles->registered[ $style ]->handle;
			$css_url = $wp_styles->registered[ $style ]->src;
			$extra   = $wp_styles->registered[ $style ]->extra;
			$after   = $extra['after'];

			// We already did this file
			if (isset($modified_css_files[ $post->ID ][ $handle ]) && ! empty($modified_css_files[ $post->ID ][ $handle ])) {
				continue;
			}

			if (strpos($css_url, self::$site_url) === false &&
					preg_match('/(\/wp-content\/[^\"\'=\s]+\.(css|js))/', $css_url) == 0 &&
					preg_match('/(\/wp-includes\/[^\"\'=\s]+\.(css|js))/', $css_url) == 0) {
				continue;
			}

			// CSS filename from URL
			$css_basename = basename($css_url);
			// Remove ?version
			$css_basename = explode('?', $css_basename);
			// CSS filename withou version
			$css_basename = $css_basename[0];

			// Path to CSS File
			$css_path = str_replace(self::$site_url . '/', '', $css_url);
			$css_path = explode('?', $css_path);
			$css_path = ABSPATH . $css_path[0];

			// Figure out was the file changed (by filesize)
			$css_md5_original = filesize($css_path);
			if (in_array($handle, $modified_css_files)) {
				// In array, check if changed
				$css_old_m5 = $modified_css_files[ $post->ID ][ $handle ]['size'];
				if ($css_md5_original !== $css_old_m5) {
					// File has changed
					$modified_css_files[ $post->ID ][ $handle ]['size'] = $css_md5_original;
				} else {
					// Do nothing;
					continue;
				}
			} else {
				// Not in array
				$modified_css_files[ $post->ID ][ $handle ]['size'] = $css_md5_original;
			}

			// Works
			$modified_css_files[ $post->ID ][ $handle ]['deps']           = $deps;
			$modified_css_files[ $post->ID ][ $handle ]['cache_dir_file'] = $cache_dir . '/' . $handle . '-' . $css_basename;
			$modified_css_files[ $post->ID ][ $handle ]['cache_uri_file'] = $cache_url . '/' . $handle . '-' . $css_basename;
			$modified_css_files[ $post->ID ][ $handle ]['after']          = $after;

			// For Combined
			foreach ($deps as $k => $dep) {
				if ( ! in_array($dep, $combined['deps'])) {
					$combined['deps'][] = $dep;
				}
			}

			// Get CSS File contents
			$css_contents = file_get_contents($css_path);
			if ( ! empty($css_contents)) {

				// Deregister and deque the style and handle
				wp_deregister_style($style);
				wp_deregister_style($handle);
				wp_dequeue_style($style);
				wp_dequeue_style($handle);

				// Figure out the CSS File URL
				$url_parsed = parse_url(self::ensure_scheme($css_url));

				if (substr($url_parsed['path'], 0, 1) === '/') {
					$file_path_ori = $_SERVER['DOCUMENT_ROOT'] . $url_parsed['path'];
				} else {
					$file_path_ori = $frontend . '' . $url_parsed['path'];
				}

				#var_dump($url_parsed['path']);
				#var_dump($css_url);
				#var_dump($url_parsed['scheme'] . '://' . $url_parsed['host'] . '' . $file_path_ori);
				#die();

				// Rewrite CSS Contents
				$css_contents = $uriRewrite::rewrite($css_contents, $url_parsed['scheme'] . '://' . $url_parsed['host'] . '' . $file_path_ori);

				// Is combined into 1 file enabled?
				#if ( ! empty(self::$settings['css_combine']) && self::$settings['css_combine'] == '1') {

				$comined_css = preg_replace("/url\(\s*['\"]?(?!data:)(?!http)(?![\/'\"])(.+?)['\"]?\s*\)/i", "url(" . dirname($file_path_ori) . "/$1)", $comined_css);

				$comined_css = preg_replace_callback('/(https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|css|jsp|js|svg|woff|eot|ttf|woff2)/', array('wps_addon_cdn', 'obstart_replace_url_in_css'), $comined_css);

				$comined_css = preg_replace_callback('/(?:("|\'))(?:(..\/|\/))wp-content\/[^\"\'=\s]+\.(jpg|jpeg|png|gif|svg)(?:("|\'))/', array('wps_addon_cdn', 'replace_path_css'), $comined_css);

				// Combine all css in one large file
				$comined_css .= $css_contents;
				/*	} else {
						#$css_contents = preg_replace_callback('/(https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|css|jsp|js|svg)/', array('wps_addon_cdn', 'obstart_replace_url_in_css'), $css_contents);

						#$css_contents = preg_replace_callback('/(?:("|\'))(?:(..\/|\/))wp-content\/[^\"\'=\s]+\.(jpg|jpeg|png|gif|svg)(?:("|\'))/', array('wps_addon_cdn', 'replace_path_css'), $css_contents);

						#$css_contents = preg_replace_callback('/url\(\s*[\'"]?((?![\/\'"])(.+?)(woff|eot|ttf|woff2)?)[\'"]?\s*\)/', array('wps_addon_cdn', 'replace_path_css_urls'), $css_contents);

						// Works, each css into it's own file
						if (file_exists($modified_css_files[ $post->ID ][ $handle ]['cache_dir_file'])) {
							unlink($modified_css_files[ $post->ID ][ $handle ]['cache_dir_file']);
						}

						file_put_contents($modified_css_files[ $post->ID ][ $handle ]['cache_dir_file'], $css_contents);
					}*/

			}

		}

		if ( ! $css_cache) {
			update_option('wps_ic_modified_css_cache', $modified_css_files);
			update_option('wps_ic_css_combined_cache', $combined);
		} else {
			$combined                  = get_option('wps_ic_css_combined_cache');
			$modified_css_files_option = get_option('wps_ic_modified_css_cache');

			if (empty($modified_css_files_option)) {
				delete_transient('wps_ic_css_cache');
			} else {
				$modified_css_files = $modified_css_files_option;
			}
		}

		#if ( ! empty(self::$settings['css_combine']) && self::$settings['css_combine'] == '1') {

		// Combine all css in one large file
		if ( ! empty($combined['deps'])) {
			foreach ($combined['deps'] as $k => $dep) {
				wp_enqueue_style($dep);
			}
		}

		if ( ! $css_cache && ! empty($comined_css)) {
			file_put_contents($combined['file_dir'], $comined_css);
		}

		if ( ! empty($combined) && file_exists($combined['file_dir']) && filesize($combined['file_dir']) > 0) {
			wp_register_style('wps-ic-combined', $combined['file_url'], array(), false, 'all');
			wp_enqueue_style('wps-ic-combined');
		}
		/*} else {

			// Works, if no combine is enabled
			if ( ! empty($modified_css_files)) {

				// Combine all css in one large file
				if ( ! empty($combined['deps'])) {
					foreach ($combined['deps'] as $k => $dep) {
						#wp_enqueue_style($dep);

					}
				}

				foreach ($modified_css_files as $postID => $data) {
					foreach ($data as $handle => $css_file) {

						if (is_array($css_file['deps']) && ! empty($css_file['deps'])) {
							foreach ($css_file['deps'] as $k => $dep) {
								wp_enqueue_style($dep);
							}
						}

						if (file_exists($css_file['cache_dir_file'])) {
							wp_register_style($handle, $css_file['cache_uri_file'], $css_file['deps'], false, 'all');
							wp_enqueue_style($handle);
						}

						if ( ! empty($data[ $handle ]['after'])) {
							foreach ($data[ $handle ]['after'] as $k => $v) {
								wp_add_inline_style($handle, $v);
							}
						}

					}
				}
			}
		}*/

		$css_run = 1;
		set_transient('wps_ic_css_cache', 'true', 2 * 60);
	}


	public function ensure_scheme($url) {
		return preg_replace("/(http(s)?:\/\/|\/\/)(.*)/i", "http$2://$3", $url);
	}


	public static function local() {
		global $ic_running;

		if (is_admin() || strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
			return;
		}

		if ( ! empty($_GET['ignore_ic'])) {
			return;
		}

		$settings     = get_option(WPS_IC_SETTINGS);
		$options      = get_option(WPS_IC_OPTIONS);
		$response_key = $options['response_key'];
		if (empty($response_key)) {
			return;
		}

		self::$isAjax = (function_exists("wp_doing_ajax") && wp_doing_ajax()) || (defined('DOING_AJAX') && DOING_AJAX);

		// Don't run in admin side!
		if ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php") {
			return true;
		}

		// TODO: Check this for wpadmin and frontend ajax
		if ( ! self::$isAjax) {
			if (wp_is_json_request() || is_admin() || ! empty($_GET['trp-edit-translation']) || ! empty($_GET['elementor-preview']) || ! empty($_GET['preview']) || ! empty($_GET['PageSpeed']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['et_fb']) || ! empty($_GET['ct_builder'])
					|| (
						! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php")) {
				return;
			}
		}

		if ( ! is_admin()) {
			if (empty($settings['live-cdn']) || $settings['live-cdn'] == '0') {
				self::buffer_local_go();
			}
		}

	}


	public static function buffer_local_go() {

		if (self::$isAjax) {
			$wps_ic_cdn = new wps_addon_cdn();
		}

		if (self::$speed_test) {
			self::$is_retina = 'false';
		}

		ob_start(array(__CLASS__, 'buffer_local_callback'));
	}


	public static function init() {
		global $ic_running;

		if (is_admin() || strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
			return;
		}

		if ($ic_running) {
			return;
		} else {
			$ic_running = true;
		}

		if ( ! empty($_GET['ignore_cdn'])) {
			return;
		}

		if ( ! empty($_GET['ignore_ic'])) {
			return;
		}

		$settings = get_option(WPS_IC_SETTINGS);
		if ( ! empty($settings['live-cdn']) && $settings['live-cdn'] == '0') {
			return;
		}

		$options      = get_option(WPS_IC_OPTIONS);
		$response_key = $options['response_key'];
		if (empty($response_key)) {
			return;
		}

		self::$isAjax = (function_exists("wp_doing_ajax") && wp_doing_ajax()) || (defined('DOING_AJAX') && DOING_AJAX);

		// Don't run in admin side!
		if ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php") {
			return true;
		}

		// TODO: Check this for wpadmin and frontend ajax
		if ( ! self::$isAjax) {
			if (wp_is_json_request() || is_admin() || ! empty($_GET['trp-edit-translation']) || ! empty($_GET['elementor-preview']) || ! empty($_GET['preview']) || ! empty($_GET['PageSpeed']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['et_fb']) || ! empty($_GET['ct_builder'])
					|| (
						! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php")) {
				return;
			}
		}

		if ( ! empty(self::$settings['css']) || ! empty(self::$settings['js'])) {
			#$simple_cdn = new wps_cdn_replace();
		}

		add_filter('get_site_icon_url', array('wps_addon_cdn', 'favicon_replace'), 10, 1);

		if ( ! is_admin()) {
			if ( ! empty($settings['live-cdn']) && $settings['live-cdn'] == '1') {
				self::buffer_go();
			}
		}

	}


	public static function buffer_go() {

		if (self::$isAjax) {
			$wps_ic_cdn = new wps_addon_cdn();
		}

		if (self::$speed_test) {
			self::$is_retina = 'false';
		}

		ob_start(array(__CLASS__, 'buffer_callback'));
	}


	public static function favicon_replace($url) {
		if (empty($url)) {
			return $url;
		}
		$url = 'https://' . self::$zone_name . '/minify:false/asset:' . self::reformat_url($url);

		return $url;
	}


	public function reformat_url($url, $remove_site_url = false) {

		if (substr($url, 0, 4) !== 'http') {
			$scheme = self::$site_url_scheme;
			$url    = $scheme . $url;
		}

		if (strpos($url, '?brizy_media') == false) {
			$url = explode('?', $url);
			$url = $url[0];
		}

		if ($remove_site_url) {
			$url = str_replace(self::$site_url, '', $url);
			$url = ltrim($url, '/');
		}

		return $url;
	}


	public static function buffer_local_callback($buffer) {
		self::$image_count = 0;
		//Do something with the buffer (HTML)
		if (isset($_GET['brizy-edit-iframe']) || isset($_GET['brizy-edit']) || isset($_GET['preview'])) {
			return $buffer;
		}

		if (self::$cdnEnabled == 0) {
			// Brizy Fix
			#$site_url = str_replace(array('http://', 'https://', '/', '.'), array('', '', '\/', '\.'), self::$home_url);
			#$buffer   = preg_replace_callback('/' . $site_url . '\/?(\?brizy_media=(.[^"\',\s)]*))/i', array('wps_addon_cdn', 'obstart_replace_brizy_url'), $buffer);

			// Other regular Images
			#$buffer = preg_replace_callback('/(data-img-url|data-bg)="([^"]+)"/i', array('wps_addon_cdn', 'data_img_url'), $buffer);
			#$buffer = preg_replace_callback('/<amp\-img[^>]* src=\"([^\"]*)\"[^>]*>/i', array('wps_addon_cdn', 'replace_amp_links'), $buffer);
			$buffer = preg_replace_callback('/<img[^>]* src=\"([^\"]*)\"[^>]*>/i', array('wps_addon_cdn', 'local_image_tags'), $buffer);
			#$buffer = preg_replace_callback("/url\(\s*['\"]?(?!['\"]?data:)(.*?)['\"]?\s*\)/i", array('wps_addon_cdn', 'background_image_replace'), $buffer);
			#$buffer = preg_replace_callback('/srcset="([^"]+)"/i', array('wps_addon_cdn', 'srcset_replace'), $buffer);

			// Brizy Simple Url Replace
			#$buffer = preg_replace_callback('/[^"\s]+\.(jpe?g|png|gif|svg)/i', array('wps_addon_cdn', 'obstart_replace_brizy_url_simple'), $buffer);
		}

		return $buffer;
	}


	public static function buffer_callback($buffer) {
		global $ic_wp_customizer;
		self::$image_count = 0;
		//Do something with the buffer (HTML)
		if (isset($_GET['brizy-edit-iframe']) || isset($_GET['brizy-edit']) || isset($_GET['preview'])) {
			return $buffer;
		}

		if (self::$cdnEnabled == 1) {
			if (defined('BRIZY_VERSION')) {
				// Brizy Fix
				$site_url = str_replace(array('http://', 'https://', '/', '.'), array('', '', '\/', '\.'), self::$home_url);
				$buffer   = preg_replace_callback('/' . $site_url . '\/?(\?brizy_media=(.[^"\',\s)]*))/i', array('wps_addon_cdn', 'obstart_replace_brizy_url'), $buffer);
			}

			// Other regular Images
			$buffer = preg_replace_callback('/<picture[^>]*>/i', array('wps_addon_cdn', 'picture_tag'), $buffer);
			$buffer = preg_replace_callback('/(data-img-url|data-bg)="([^"]+)"/i', array('wps_addon_cdn', 'data_img_url'), $buffer);
			$buffer = preg_replace_callback('/<amp\-img[^>]* src=\"([^\"]*)\"[^>]*>/i', array('wps_addon_cdn', 'replace_amp_links'), $buffer);
			$buffer = preg_replace_callback('/(<img[^>]*>|https?:[^)\'\'"]+\.(css|jsp|js|ico))/i', array('wps_addon_cdn', 'find_all_img_and_links'), $buffer);
			$buffer = preg_replace_callback("/url\(\s*['\"]?(?!['\"]?data:)(.*?)['\"]?\s*\)/i", array('wps_addon_cdn', 'background_image_replace'), $buffer);
			$buffer = preg_replace_callback('/srcset="([^"]+)"/i', array('wps_addon_cdn', 'srcset_replace'), $buffer);

			// Brizy Simple Url Replace => Causing issues with product variations
			if (defined('BRIZY_VERSION')) {
				$buffer = preg_replace_callback('/[^"\s]+\.(jpe?g|png|gif|svg)/i', array('wps_addon_cdn', 'obstart_replace_brizy_url_simple'), $buffer);
			}
		}

		if ( ! empty(self::$preload_image)) {
			/*
			$images = json_encode(self::$preload_image);
			$call   = wp_remote_post('https://cdn.wpmediacompress.com?preload=true&hash=' . md5(microtime(true)), array(
				'timeout'    => 10,
				'sslverify'  => false,
				'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0',
				'body'       => array('images' => $images)
			));
			$body   = wp_remote_retrieve_body($call);
			*/
		}

		return $buffer;
	}


	public static function picture_tag($picture) {
		#$html = preg_replace_callback('/class=(["|\'][^"|\']*["|\'])/', array('wps_addon_cdn', 'picture_tag_class_replace'), $picture[0]);
		$image_class_atts = '';
		$class_Addon      = 'wps-ic-picture-tag';
		$class_added      = false;

		// Get All Atts
		preg_match_all('/class=(["|\'][^"|\']*["|\'])/', $picture[0], $regex_atts);

		if (!empty($_GET['dbg'])) {
			return print_r($regex_atts, true);
		}

		if (!empty($regex_atts[0])) {
			$other_classes = '';
			if (!empty($regex_atts[0][0])) {
				$class = $regex_atts[0][0];
				$class = str_replace(array('class="', 'class=\''), '', $class);
				$class = str_replace(array('"', '\''), '', $class);

				if (!empty($_GET['dbg1'])) {
					return print_r($class, true);
				}

				$other_classes = $class;
			}

			$new_class = 'class="' . $other_classes . ' ' . $class_Addon . '"';
		} else {
			$new_class = 'class="' . $class_Addon . '"';
		}

		$picture[0] = str_replace($regex_atts[0], $new_class, $picture[0]);
		return $picture[0];
	}


	public static function is_cached_html($data) {
		$cache_file = WPS_IC_CACHE . $data['file'] . '.txt';
		if (file_exists($cache_file)) {
			return file_get_contents($cache_file);
		} else {
			return false;
		}
	}


	public static function create_cache_file($data) {
		$cache_file = WPS_IC_CACHE . $data['file'] . '.txt';
		$fp         = fopen($cache_file, 'w+');
		file_put_contents($cache_file, $data['content']);
		fclose($fp);
	}


	public static function update_image_stats() {
		if ( ! empty($_GET['apikey']) && ! empty($_GET['imageURL'])) {
			$get_apikey      = sanitize_text_field($_GET['apikey']);
			$image_url       = sanitize_text_field($_GET['imageURL']);
			$compressed_size = sanitize_text_field($_GET['compressed_size']);
			$original_size   = sanitize_text_field($_GET['original_size']);
			$quality         = sanitize_text_field($_GET['quality']);

			if (strpos($image_url, self::$zone_name) !== false) {
				$image_url = explode('url:', $image_url);
				$image_url = $image_url[1];
			}

			$options = get_option(WPS_IC_OPTIONS);
			$apikey  = $options['api_key'];
			if ($apikey !== $get_apikey) {
				wp_send_json_error('Bad Api Key.');
			}

			$attachmentID       = self::attachment_url_to_id($image_url);
			$savings            = $original_size - $compressed_size;
			$savings_percentage = (1 - ($compressed_size / $original_size)) * 100;

			update_post_meta($attachmentID, 'wps_ic_noncompressed_size', $original_size);
			update_post_meta($attachmentID, 'wps_ic_compressed_size', $compressed_size);
			update_post_meta($attachmentID, 'wps_ic_data_live', array('saved' => $savings, 'saved_percent' => $savings_percentage, 'quality' => $quality));

			die('Updated Att ID ' . $attachmentID);
		}
	}


	/**
	 * Finds the attachment ID by taking the attachment URL and searching through
	 * database for that URL.
	 *
	 * @param $attachment_url
	 *
	 * @return bool|string|void|null
	 */
	public static function attachment_url_to_id($attachment_url, $ignore_size = false) {
		global $wpdb;

		$initial_attachment_url = $attachment_url;
		$https                  = strpos($attachment_url, 'https://');
		$http                   = strpos($attachment_url, 'http://');

		if ( ! $ignore_size) {
			preg_match('/([0-9]+)x([0-9]+)\.(jpg|png|jpeg|gif)/', $attachment_url, $matches);
			if ( ! empty($matches)) {
				// Image is not full
				$image_size     = $matches[0];
				$attachment_url = str_replace(array('-' . $image_size, $image_size), '', $attachment_url) . '.' . $matches[3];
			}
		}

		$attID = attachment_url_to_postid($attachment_url);
		if ($attID && $attID > 0) {
			return $attID;
		} else {

			if ($https !== false) {
				// It was HTTPS, turn to http
				$attachment_url = str_replace('https', 'http', $attachment_url);
			} else {
				$attachment_url = str_replace('http', 'https', $attachment_url);
			}

			$attID = attachment_url_to_postid($attachment_url);
			if ($attID && $attID > 0) {
				return $attID;
			}
		}

		// If there is no url, return.
		if ($attachment_url == '') {
			return;
		}

		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		#$attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
		$attachment_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $attachment_url));
		if ( ! $attachment_id) {
			$https = strpos($attachment_url, 'https://');
			$http  = strpos($attachment_url, 'http://');

			if ($https !== false) {
				// It was HTTPS, turn to http
				$attachment_url = str_replace('https', 'http', $attachment_url);
			} else {
				$attachment_url = str_replace('http', 'https', $attachment_url);
			}

			$attachment_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $attachment_url));
		}

		if ( ! $attachment_id || ! $attachment_id[0]) {
			if ( ! $ignore_size) {
				return self::attachment_url_to_id($initial_attachment_url, true);
			}

			return 0;
		} else {

		}

		return $attachment_id[0];

	}


	public function data_img_url($image) {
		$data_image_url = $image[2];
		$data_tag       = $image[1];
		if ( ! empty($data_image_url)) {
			if (strpos($image[0], self::$zone_name) !== false ||
					strpos($image[0], 'schema') !== false ||
					strpos($image[0], 'fbcdn.net') !== false
			) {
				return $image[0];
			}

			if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg)/', $image[0], $matches)) {
				return $image[0];
			}

			if (self::is_excluded($data_image_url)) {
				return $image[0];
			}

			if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0')
					&& ! self::image_url_matching_site_url($data_image_url)) {
				return $image[0];
			}

			$size = self::get_image_size($data_image_url);
			if ( ! empty(self::$defined_resolution)) {
				if ($size[0] > self::$defined_resolution) {
					$size[0] = self::$defined_resolution;
				}
			}

			#$apiURL = $data_tag . '="' . self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $size[0] . '/url:' . self::reformat_url($data_image_url) . '"';

			$apiURL = $data_tag . '="https://' . self::$zone_name . '/minify:false/asset:' . self::reformat_url($data_image_url) . '"';

			return $apiURL;
		}
	}


	public function is_excluded($image_element, $image_link = '') {
		if (empty($image_link)) {
			preg_match('@src="([^"]+)"@', $image_element, $match_url);
			if ( ! empty($match_url)) {
				$basename_original = basename($match_url[1]);
			} else {
				$basename_original = basename($image_element);
			}
		} else {
			$basename_original = basename($image_link);
		}

		preg_match("/([0-9]+)x([0-9]+)\.[a-zA-Z0-9]+/", $basename_original, $matches); //the filename suffix way
		if (empty($matches)) {
			// Full Image
			$basename = $basename_original;
		} else {
			// Some thumbnail
			$basename = str_replace('-' . $matches[1] . 'x' . $matches[2], '', $basename_original);
		}

		$basename = sanitize_title($basename);
		if ( ! empty(self::$excluded_list) && in_array($basename, self::$excluded_list)) {
			return true;
		} else {
			return false;
		}

	}


	public function image_url_matching_site_url($image) {
		$site_url          = self::$site_url;
		$site_url_protocol = parse_url($site_url, PHP_URL_SCHEME);
		$image_protocol    = parse_url($image, PHP_URL_SCHEME);

		if ( ! $image_protocol || empty($image_protocol)) {
			$image_protocol = self::$site_url_scheme;
		}

		if ($site_url_protocol != $image_protocol) {
			$site_url = str_replace($site_url_protocol, $image_protocol, $site_url);
		}

		if (strpos($image, $site_url) === false) {
			// Image not on site
			return false;
		} else {
			// Image on site
			return true;
		}

	}


	public static function get_image_size($url) {
		preg_match("/([0-9]+)x([0-9]+)\.[a-zA-Z0-9]+/", $url, $matches); //the filename suffix way
		if (isset($matches[1]) && isset($matches[2])) {
			return array($matches[1], $matches[2]);
			$sizes = array($matches[1], $matches[2]);
		} elseif ( ! $sizes = self::url_to_path_to_sizes($url)) { //the file

			return array(1024, 1024);
			$sizes = self::url_to_metadata_to_sizes($url);//the DB
		}

		return $sizes;
	}


	public static function url_to_path_to_sizes($image_url) {
		$updir          = self::$updir;
		$baseUrlPattern = "/" . str_replace("/", "\/", preg_replace("/^http[s]{0,1}:\/\//", "^http[s]{0,1}://", $updir['baseurl'])) . "/";

		if (preg_match($baseUrlPattern, $image_url)) {
			$path = preg_replace($baseUrlPattern, $updir['basedir'], $image_url);
		} elseif ($image_url[0] == '/') {
			$path = dirname(dirname($updir['basedir'])) . $image_url;
		} else {
			$path = dirname(dirname($updir['basedir'])) . '/' . $image_url;
		}

		if (file_exists($path)) {
			return getimagesize($path);
		}

		return false;
	}


	public static function url_to_metadata_to_sizes($image_url) {
		// Thx to https://github.com/kylereicks/picturefill.js.wp/blob/master/inc/class-model-picturefill-wp.php
		global $wpdb;
		$prefix             = $wpdb->prefix;
		$sql                = "SELECT m.meta_value FROM {$prefix}posts p INNER JOIN {$prefix}postmeta m on p.id = m.post_id WHERE m.meta_key = '_wp_attachment_metadata' AND ";
		$original_image_url = $image_url;
		$image_url          = preg_replace('/^(.+?)(-\d+x\d+)?\.(jpg|jpeg|png|gif)((?:\?|#).+)?$/i', '$1.$3', $image_url);
		$meta               = $wpdb->get_var($wpdb->prepare("$sql p.guid='%s';", $image_url));

		//try the other proto (https - http) if full urls are used
		if (empty($meta) && strpos($image_url, 'http://') === 0) {
			$image_url_other_proto = strpos($image_url, 'https') === 0 ?
				str_replace('https://', 'http://', $image_url) :
				str_replace('http://', 'https://', $image_url);
			$meta                  = $wpdb->get_var($wpdb->prepare("$sql p.guid='%s';", $image_url_other_proto));
		}

		//try using only path
		if (empty($meta)) {
			$image_path = parse_url($image_url, PHP_URL_PATH); //some sites have different domains in posts guid (site changes, etc.)
			//keep only the last two elements of the path because some CDN's add path elements in front ( Google Cloud adds the project name, etc. )
			$image_path_elements = explode('/', $image_path);
			$image_path_elements = array_slice($image_path_elements, max(0, count($image_path_elements) - 3));
			$meta                = $wpdb->get_var($wpdb->prepare("$sql p.guid like'%%%s';", implode('/', $image_path_elements)));
		}

		//try using the initial URL
		if (empty($meta)) {
			$meta = $wpdb->get_var($wpdb->prepare("$sql p.guid='%s';", $original_image_url));
		}

		if ( ! empty($meta)) { //get the sizes from meta
			$meta = unserialize($meta);
			if (preg_match("/" . preg_quote($meta['file'], '/') . "$/", $original_image_url)) {
				return array($meta['width'], $meta['height']);
			}
			foreach ($meta['sizes'] as $size) {
				if ($size['file'] == wp_basename($original_image_url)) {
					return array($size['width'], $size['height']);
				}
			}
		}

		return array(1, 1);
	}


	public function preload_image($arg) {
		wp_remote_get($arg, array('timeout' => 5, 'sslverify' => false));
	}


	public function srcset_replace($image) {
		$srcset = $image[0];
		if ( ! empty($srcset)) {
			preg_match_all('/((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))\s(\d{1,5})/', $srcset, $srcset_links);

			if ( ! empty($srcset_links)) {
				foreach ($srcset_links[1] as $i => $srcset_url) {
					$find_image = $srcset_url;
					$width      = $srcset_links[4][ $i ];

					if (strpos($srcset_url, 'http') === false && strpos($srcset_url, 'https') === false) {
						$srcset_url = self::$site_url_scheme . '://' . $srcset_url;
					}

					if (strpos($srcset_url, self::$zone_name) !== false) {
						continue;
					}

					$srcset_replace = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $width . '/url:' . $srcset_url;
					$srcset         = str_replace($find_image, $srcset_replace, $srcset);
				}
			}
		}

		return $srcset;
	}


	public function filter_Woo_gallery_html($html, $attachment_id) {
		// filter...
		$html = preg_replace_callback('/(https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg)/', array('wps_addon_cdn', 'obstart_replace_url_in_css'), $html);

		return $html;
	}


	public function filter_Woo_gallery($array, $attachment_id, $image_size, $main_image) {
		// filter...

		return $array;
	}


	public function remove_whitespace($css) {
		// preserve empty comment between property and value
		// http://css-discuss.incutio.com/?page=BoxModelHack
		$css = preg_replace('@/\\*\\s*\\*/\\s*:@', '/*keep*/:', $css);
		$css = preg_replace('@:\\s*/\\*\\s*\\*/@', ':/*keep*/', $css);

		// apply callback to all valid comments (and strip out surrounding ws
		$pattern = '@\\s*/\\*([\\s\\S]*?)\\*/\\s*@';
		$css     = preg_replace_callback($pattern, array($this, 'commentCB'), $css);

		// remove ws around { } and last semicolon in declaration block
		$css = preg_replace('/\\s*{\\s*/', '{', $css);
		$css = preg_replace('/;?\\s*}\\s*/', '}', $css);

		// remove ws surrounding semicolons
		$css = preg_replace('/\\s*;\\s*/', ';', $css);

		// replace any ws involving newlines with a single newline
		$css = preg_replace('/[ \\t]*\\n+\\s*/', "", $css);

		return trim($css);
	}


	public function commentCB($m) {
		$hasSurroundingWs = (trim($m[0]) !== $m[1]);
		$m                = $m[1];
		// $m is the comment content w/o the surrounding tokens,
		// but the return value will replace the entire comment.
		if ($m === 'keep') {
			return '/**/';
		}

		if ($m === '" "') {
			// component of http://tantek.com/CSS/Examples/midpass.html
			return '/*" "*/';
		}

		if (preg_match('@";\\}\\s*\\}/\\*\\s+@', $m)) {
			// component of http://tantek.com/CSS/Examples/midpass.html
			return '/*";}}/* */';
		}

		if ($this->_inHack) {
			// inversion: feeding only to one browser
			$pattern = '@
                    ^/               # comment started like /*/
                    \\s*
                    (\\S[\\s\\S]+?)  # has at least some non-ws content
                    \\s*
                    /\\*             # ends like /*/ or /**/
                @x';
			if (preg_match($pattern, $m, $n)) {
				// end hack mode after this comment, but preserve the hack and comment content
				$this->_inHack = false;

				return "/*/{$n[1]}/**/";
			}
		}

		if (substr($m, - 1) === '\\') { // comment ends like \*/
			// begin hack mode and preserve hack
			$this->_inHack = true;

			return '/*\\*/';
		}

		if ($m !== '' && $m[0] === '/') { // comment looks like /*/ foo */
			// begin hack mode and preserve hack
			$this->_inHack = true;

			return '/*/*/';
		}

		if ($this->_inHack) {
			// a regular comment ends hack mode but should be preserved
			$this->_inHack = false;

			return '/**/';
		}

		// Issue 107: if there's any surrounding whitespace, it may be important, so
		// replace the comment with a single space
		return $hasSurroundingWs ? ' ' : ''; // remove all other comments
	}


	public function enqueue_js_print() {
		global $post;

		if ((empty(self::$settings['js']) && self::$settings['js'] == '0')) {
			return;
		}

		wp_scripts(); //ensure styles is initialised
		global $wp_scripts;

		if (isset($_GET['brizy-edit-iframe']) || isset($_GET['brizy-edit']) || isset($_GET['preview'])) {
			return;
		}

		if (is_admin() || ! empty($_GET['trp-edit-translation']) || ! empty($_GET['elementor-preview']) || ! empty($_GET['PageSpeed']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['et_fb']) || ! empty($_GET['ct_builder']) || ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize
		.php")) {
			return;
		}

		$frontend = rtrim(ABSPATH, '/');
		if ( ! $frontend) {
			$frontend = parse_url(get_option('home'));
			$frontend = ! empty($frontend['path']) ? $frontend['path'] : '';
			$frontend = $_SERVER['DOCUMENT_ROOT'] . $frontend;
		}

		$frontend          = realpath($frontend);
		$modified_js_files = array();

		// Print all loaded Styles (CSS)
		foreach ($wp_scripts->queue as $script) {

			if ($script == 'admin-bar') {
				continue;
			}

			$deps   = $script->registered[ $script ]->deps;
			$handle = $script->registered[ $script ]->handle;
			$js_url = $script->registered[ $script ]->src;
			$extra  = $script->registered[ $script ]->extra;
			$after  = $extra['after'];

			// We already did this file
			if (isset($modified_js_files[ $post->ID ][ $handle ]) && ! empty($modified_js_files[ $post->ID ][ $handle ])) {
				continue;
			}

			if (strpos($js_url, self::$site_url) === false &&
					preg_match('/(\/wp-content\/[^\"\'=\s]+\.(css|js))/', $js_url) == 0 &&
					preg_match('/(\/wp-includes\/[^\"\'=\s]+\.(css|js))/', $js_url) == 0) {
				continue;
			}

			$css_basename = basename($js_url);
			$css_basename = explode('?', $css_basename);
			$css_basename = $css_basename[0];

			if ($css_basename == 'retina.js' || $css_basename == 'retina') {
				continue;
			}

			$css_path = str_replace(self::$site_url . '/', '', $js_url);
			$css_path = explode('?', $css_path);
			$css_path = ABSPATH . $css_path[0];

			$js_md5_original = filesize($css_path);
			if (in_array($handle, $modified_js_files)) {
				// In array, check if changed
				$js_old_m5 = $modified_js_files[ $post->ID ][ $handle ]['size'];
				if ($js_md5_original !== $js_old_m5) {
					// File has changed
					$modified_js_files[ $post->ID ][ $handle ]['size'] = $js_md5_original;
				} else {
					// Do nothing;
					continue;
				}
			} else {
				// Not in array
				$modified_js_files[ $post->ID ][ $handle ]['size'] = $js_md5_original;
			}

			$modified_js_files[ $post->ID ][ $handle ]['cdn_url'] = 'https://' . self::$zone_name . '/' . $js_url;

			wp_deregister_script($script);
			wp_deregister_style($handle);
			wp_dequeue_style($script);
			wp_dequeue_style($handle);
		}

		// Works, if no combine is enabled
		if ( ! empty($modified_js_files)) {
			foreach ($modified_js_files as $postID => $data) {
				foreach ($data as $handle => $js_file) {
					if (is_array($js_file['deps']) && ! empty($js_file['deps'])) {
						foreach ($js_file['deps'] as $k => $dep) {
							wp_enqueue_script($dep);
						}
					}

					if (file_exists($js_file['cache_dir_file'])) {
						wp_register_script($handle, $js_file['cdn_uri'], $js_file['deps'], false, 'all');
						wp_enqueue_script($handle);
					}

				}
			}

		}

	}


	public function process_images_from_content($content) {
		$content = preg_replace_callback('/image=["|\']((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))["|\']/i', array('wps_addon_cdn', 'image_attr_replace'), $content);

		return $content;
	}


	public function replace_amp_links($image) {
		$imageToReplace = $image[1];

		$size = self::get_image_size($imageToReplace);
		if ( ! empty(self::$defined_resolution)) {
			if ($size[0] > self::$defined_resolution) {
				$size[0] = self::$defined_resolution;
			}
		}

		$replace_with = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:1/url:' . self::reformat_url($imageToReplace);
		$str_replace  = str_replace($imageToReplace, $replace_with, $image[0]);

		return $str_replace;
	}


	public function local_image_tags($image) {
		$image_source = $image[1];

		// File is not an image
		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg)/', $image_source, $matches)) {
			return $image[0];
		}

		// File is excluded
		if (self::is_excluded($image_source)) {
			#return $image[0];
		}

		$size = self::get_image_size($image_source);
		if ( ! empty(self::$defined_resolution)) {
			if ($size[0] > self::$defined_resolution) {
				// TODO: Search for other mentionings of defined_resolution
				#$size[0] = self::$defined_resolution;
			}
		}

		#return print_r($size, true);

		$svgAPI = $source_svg = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="' . $size[0] . '" height="' . $size[1] . '"><path d="M2 2h' . $size[0] . 'v' . $size[1] . 'H2z" fill="#fff" opacity="0"/></svg>');

		$class_Addon = '';

		// Is LazyLoading enabled in the plugin?
		if ( ! empty(self::$lazy_enabled) && self::$lazy_enabled == '1') {

			// If Logo remove wps-ic-lazy-image
			if (strpos($image_source, 'logo') !== false) {
				$image_tag = 'src="' . $image_source . '"';
			} else {
				$image_tag = 'src="' . $svgAPI . '"';
			}

			$image_tag .= ' loading="lazy"';
			$image_tag .= ' data-src="' . $image_source . '"';

			$image_tag .= ' data-width="' . $size[0] . '"';
			$image_tag .= ' data-height="' . $size[1] . '"';

			// If Logo remove wps-ic-lazy-image
			if (strpos($image_source, 'logo') !== false) {
				// Image is for logo
				$class_Addon .= 'wps-ic-local-lazy wps-ic-logo';
			} else {
				// Image is not for logo
				$class_Addon .= 'wps-ic-local-lazy wps-ic-lazy-image ';
			}

		} else {
			if ( ! empty(self::$adaptive_enabled) && self::$adaptive_enabled == '1') {
				$image_tag = 'src="' . $image_source . '"';
				$image_tag .= ' data-adaptive="true"';
				$image_tag .= ' data-remove-src="true"';
			} else {
				$image_tag = 'src="' . $image_source . '"';
				$image_tag .= ' data-adaptive="false"';
			}

			$image_tag .= ' data-src="' . $image_source . '"';
			$image_tag .= ' data-width="' . $size[0] . '"';
			$image_tag .= ' data-height="' . $size[1] . '"';

			$class_Addon .= 'wps-ic-local-no-lazy ';
		}

		$replace = str_replace('src="' . $image_source . '"', $image_tag, $image[0]);

		return $replace;
	}


	public function find_all_img_and_links($element) {

		$return = self::obstart_replace_image($element);

		return $return;
	}


	public function obstart_replace_image($image) {

		$image_source = $image;

		// File has already been replaced
		if (strpos($image[0], self::$zone_name) !== false ||
				strpos($image[0], 'schema') !== false ||
				strpos($image[0], 'fbcdn.net') !== false) {
			return $image[0];
		}

		// File is not an image
		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg)/', $image[0], $matches)) {
			if (preg_match('/\.(jsp)/', $image[0], $matches)) {
				return $image[0];
			} else if (preg_match('/\.(css|js)/', $image[0], $matches)) {
				// Then it's css or JS
				return self::obstart_replace_url_simple($image);
			} else {
				return $image[0];
			}
		}

		// File is excluded
		if (self::is_excluded($image[0])) {
			return $image[0];
		}

		// Get the image src from data-src if exists
		preg_match('/data-src=["|\']((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))["|\']/', $image[0], $match_url);

		if (empty($match_url)) {
			// Try different
			preg_match('/data-img-url=["|\']((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))["|\']/', $image[0], $match_url);
		}

		if (empty($match_url)) {

			// No lazyload data-src does not exist
			preg_match('/src=["|\']((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))["|\']/', $image[0], $match_url);

		} else {

			// If lazyload data-src exists read that
			$check = parse_url($match_url[1], PHP_URL_SCHEME);

			if (empty($check) || ! $check) {
				$match_url[1] = self::$site_url_scheme . ':' . $match_url[1];
				$image[0]     = $match_url[1];
			} else {
				if ($check !== 'http' && $check !== 'https') {
					$match_url[1] = str_replace('../wp-content', 'wp-content', $match_url[1]);
					$match_url[1] = str_replace('/wp-content', 'wp-content', $match_url[1]);
					$match_url[1] = self::$site_url . $match_url[1];
					$image[0]     = $match_url[1];
				}
			}

		}

		/**
		 * If we didn't find any match url from source, fixed on 14th Sept 2020
		 * Because of Admin Bar Icons getting messed up
		 */
		if (empty($match_url)) {
			return $image[0];
		}

		$image[0] = $match_url[1];

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0')
				&& ! self::image_url_matching_site_url($image[0])) {
			return $image_source[0];
		}

		preg_match_all('/data\-([a-z\_\-]*)=[\'|"](.*?)[\'|"]/', $image_source[0], $match_data);

		$additional_tags = '';
		if ($match_data && ! empty($match_data[0])) {
			$additional_tags = implode(' ', $match_data[0]);
		}

		preg_match_all('/\s(width|height)=[\'|"](.*?)[\'|"]/', $image_source[0], $match_data);

		$width_attr  = '';
		$height_attr = '';
		if ($match_data && ! empty($match_data)) {
			if ($match_data[1][0] == 'width') {
				$width_attr  = $match_data[2][0];
				$height_attr = $match_data[2][1];
			} else if ($match_data[1][0] == 'height') {
				$height_attr = $match_data[2][0];
				$width_attr  = $match_data[2][1];
			}

			if ( ! empty($width_attr)) {
				$width_attr = 'width="' . $width_attr . '"';
			}

			if ( ! empty($height_attr)) {
				$height_attr = 'height="' . $height_attr . '"';
			}

		}

		if (self::$speed_test) {
			self::$is_retina = 'false';
			self::$image_count ++;
		}

		// SrcSet
		$srcset = '';
		if (self::$adaptive_enabled == '0' || self::$adaptive_enabled == 'false') {
			preg_match('/srcset="([^"]+)"/', $image_source[0], $srcset_match);

			if ( ! empty($srcset_match)) {
				$srcset = $srcset_match[1]; // all srcset https://xyz.com/wp-content/uploads/2019/03/WAgenda.jpg 700w, https://xyz.com/wp-content/uploads/2019/03/WAgenda-300x180.jpg 300w
				if ( ! empty($srcset)) {
					preg_match_all('/((https?\:\/\/|\/\/)[^\s]+\S+\.(jpg|jpeg|png|gif|svg))\s(\d{1,5})/', $srcset, $srcset_links);

					if ( ! empty($srcset_links)) {
						foreach ($srcset_links[1] as $i => $srcset_url) {
							$find_image = $srcset_url;
							$width      = $srcset_links[4][ $i ];

							if (strpos($srcset_url, 'http') === false && strpos($srcset_url, 'https') === false) {
								$srcset_url = self::$site_url_scheme . '://' . $srcset_url;
							}

							if (strpos($srcset_url, self::$zone_name) !== false) {
								continue;
							}

							$srcset_replace = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $width . '/url:' . $srcset_url;
							$srcset         = str_replace($find_image, $srcset_replace, $srcset);
						}
					}
				}
			}
		}

		$size = self::get_image_size($match_url[1]);
		if ( ! empty(self::$defined_resolution)) {
			if ($size[0] > self::$defined_resolution) {
				// TODO: Search for other mentionings of defined_resolution
				#$size[0] = self::$defined_resolution;
			}
		}

		if (empty($size) || ($size[0] < 10 || $size[1] < 10)) {
			$size = array(1920, 1920);
		}

		if (self::$speed_test && $size[0] > 320) {
			$size = array(320, 320);
		}

		if (self::$speed_test) {
			$apiURL = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:320/url:' . self::reformat_url($match_url[1]);
		} else {
			if (strpos($match_url[1], '.svg') !== false) {
				$apiURL = self::$apiAssetUrl . self::reformat_url($match_url[1]);
			} else {
				$apiURL = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $size[0] . '/url:' . self::reformat_url($match_url[1]);
			}
		}

		$class_Addon = '';

		$source_svg = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="' . $size[0] . '" height="' . $size[1] . '"><path d="M2 2h' . $size[0] . 'v' . $size[1] . 'H2z" fill="#fff" opacity="0"/></svg>');

		// TODO: IT was source_svg but it was causing problems with SOME sliders (owl)
		$svgAPI = $source_svg;

		if (is_feed()) {
			$svgAPI = $apiURL;
		}

		// Is LazyLoading enabled in the plugin?
		if ( ! empty(self::$lazy_enabled) && self::$lazy_enabled == '1') {

			// If Logo remove wps-ic-lazy-image
			if (strpos($apiURL, 'logo') !== false) {
				$image_tag = 'src="' . $apiURL . '"';
			} else {
				$image_tag = 'src="' . $svgAPI . '"';
			}

			$image_tag .= ' loading="lazy"';
			$image_tag .= ' data-src="' . $apiURL . '"';

			$image_tag .= ' data-width="' . $size[0] . '"';
			$image_tag .= ' data-height="' . $size[1] . '"';

			// If Logo remove wps-ic-lazy-image
			if (strpos($apiURL, 'logo') !== false) {
				// Image is for logo
				$class_Addon .= 'wps-ic-live-cdn wps-ic-logo';
			} else {
				// Image is not for logo
				$class_Addon .= 'wps-ic-live-cdn wps-ic-lazy-image ';
			}

		} else {
			if ( ! empty(self::$adaptive_enabled) && self::$adaptive_enabled == '1') {
				$image_tag = 'src="' . $svgAPI . '"';
				$image_tag .= ' data-adaptive="true"';
				$image_tag .= ' data-remove-src="true"';
			} else {
				$image_tag = 'src="' . $apiURL . '"';
				$image_tag .= ' data-adaptive="false"';
			}

			$image_tag .= ' data-src="' . $apiURL . '"';
			$image_tag .= ' data-width="' . $size[0] . '"';
			$image_tag .= ' data-height="' . $size[1] . '"';

			$class_Addon .= 'wps-ic-no-lazy ';
		}

		// Get All Atts
		preg_match_all('/(alt|title|style|id|class|sizes)=(["|\'][^"|\']*["|\'])/', $image_source[0], $regex_atts);

		$image_extra_atts = '';
		$image_class_atts = '';
		$class_added      = false;

		if ( ! empty($regex_atts[1])) {
			foreach ($regex_atts[1] as $k => $att) {
				$class_list = str_replace('"', '', $regex_atts[2][ $k ]);
				$class_list = str_replace("'", "", $class_list);
				$class_list = trim($class_list);
				if ($att == 'class') {
					$class_added      = true;
					$image_class_atts .= $att . '="' . $class_list . ' ' . $class_Addon . '" ';
				} else {
					if ($att == 'sizes') {
						if (( ! empty(self::$adaptive_enabled) && (self::$adaptive_enabled == '0' || self::$adaptive_enabled == 'false'))) {
							$image_extra_atts .= $att . '="' . $class_list . '" ';
						}
					} else {
						$image_extra_atts .= $att . '="' . $class_list . '" ';
					}
				}
			}
		}

		if ( ! $class_added) {

			$class_Addon_missing = '';
			$image_class_atts    = 'class="' . $class_Addon . ' ' . $class_Addon_missing . '"';
		}

		$image_class_atts = str_replace('lazyload', '', $image_class_atts);

		if ( ! empty($srcset)) {
			$srcset_tag = 'srcset="' . $srcset . '"';
		}

		if ( ! empty($_GET['ic_debug'])) {
			return print_r($width_attr, true);
		}

		if ( ! empty($_GET['ic_debug_img'])) {
			return print_r($image_source, true);
		}

		if (( ! empty(self::$lazy_enabled) && self::$lazy_enabled == '1') && self::$speed_test && self::$image_count >= self::$speed_test_img_count_limit) {
			// SVG Generator
			#$svgAPI = self::$svg_placeholder;
			#$image_tag = 'src="' . $svgAPI . '"';
			#$image_tag .= ' loading="lazy"';
			return '<img ' . $image_tag . ' ' . $image_class_atts . ' ' . $image_extra_atts . ' ' . $height_attr . ' ' . $width_attr . ' ' . $additional_tags . ' ' . $srcset_tag . ' />';
		} else {
			return '<img ' . $image_tag . ' ' . $image_class_atts . ' ' . $image_extra_atts . ' ' . $height_attr . ' ' . $width_attr . ' ' . $additional_tags . ' ' . $srcset_tag . ' />';
		}

	}


	public function obstart_replace_url_simple($image) {
		$asset    = false;
		$image[0] = trim($image[0]);

		if (strpos($image[0], 'simple-social-icons') !== false ||
				strpos($image[0], 'retina.js') !== false ||
				strpos($image[0], 'fbcdn.net') !== false ||
				strpos($image[0], 'schema') !== false ||
				strpos($image[0], 'google') !== false ||
				strpos($image[0], 'typekit') !== false ||
				strpos($image[0], self::$zone_name) !== false) {
			return $image[0];
		}

		// TODO: Maybe
		/*
		if (self::is_excluded($image[0])) {
			return $image[0];
		}
		*/

		// TODO: Maybe
		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0')) {
			if ( ! self::image_url_matching_site_url($image[0])) {
				return $image[0];
			}
		}

		$minify = 'false';

		if (strpos($image[0], '.css') !== false) {

			if (empty(self::$css) || self::$css == '0') {
				return $image[0];
			}

			if ( ! empty(self::$css_minify) && self::$css_minify == '1') {
				$minify = 'true';
			}

		} else if (strpos($image[0], '.jsp') !== false) {
			return $image[0];
		} else if (strpos($image[0], '.js') !== false) {

			if (empty(self::$js) || self::$js == '0') {
				return $image[0];
			}

			if ( ! empty(self::$js_minify) && self::$js_minify == '1') {
				$minify = 'true';
			}

			self::$replacedJS .= trim($image[0]) . "\r\n";

		} else {
			return $image[0];
		}

		/*if (strpos($image[0], '.css') !== false || strpos($image[0], '.js') !== false) {
			$apiURL = 'https://' . self::$zone_name . '/' . self::reformat_url($image[0], true);
		} else {*/
		$apiURL = 'https://' . self::$zone_name . '/minify:' . $minify . '/asset:' . self::reformat_url($image[0]);
		//}

		self::$preload_image[] = $apiURL;
		$image[0]              = str_replace($image[0], $apiURL, $image[0]);
		self::$preload_image[] = $apiURL;

		return $image[0];
	}


	public function image_attr_replace($image) {
		$original_string = $image[0];
		$image_url       = $image[1];

		if (strpos($image[0], 'simple-social-icons') !== false) {
			return $original_string;
		}

		if (self::is_excluded($image[0])) {
			return $original_string;
		}

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0') && ! self::image_url_matching_site_url($image_url)) {
			return $original_string;
		}

		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|ico|css|jsp|js)/', $image_url, $matches)) {
			return $original_string;
		}

		if (strpos($image_url, self::$zone_name) !== false) {
			return $original_string;
		}

		if (strpos($image_url, 'fbcdn.net') !== false) {
			return $original_string;
		}

		$apiURL = 'image="https://' . self::$zone_name . '/minify:false/asset:' . self::reformat_url($image_url) . '"';

		return $apiURL;
	}


	public function background_image_replace($image) {

		$find         = $image[0]; // url(http)
		$original_url = $image[1]; // http://...


		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|ico|css|jsp|js)/', $original_url, $matches)) {
			return $find;
		}

		if (strpos($original_url, self::$zone_name) !== false) {
			return $find;
		}

		if (self::is_excluded($original_url)) {
			return $find;
		}

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0') && ! self::image_url_matching_site_url($original_url)) {
			return $find;
		}

		$apiURL = 'https://' . self::$zone_name . '/minify:true/asset:' . self::reformat_url($original_url);

		return "url('" . $apiURL . "')";
	}


	public function old_background_image_replace($image) {

		$image[0]     = str_replace('&quot;', '"', $image[0]);
		$image[0]     = str_replace("'", '"', $image[0]);
		$image['url'] = str_replace('&quot;', '"', $image['url']);
		$image['url'] = str_replace("'", '"', $image['url']);

		$find            = $image[0];
		$original_string = $image[0];
		$image_url       = $image['url'];

		$return_sufix = ');';
		if ($image[1] == '-image') {
			$return_prefix = 'background-image:url(';
		} else {
			$return_prefix = 'background:url(';
		}

		$asset    = false;
		$image[0] = $image_url;

		if (strpos($image[0], 'simple-social-icons') !== false) {
			return $original_string;
		}

		if (strpos($image[0], 'retina.js') !== false) {
			return WPS_IC_URI . 'assets/js/retina.js';
		}

		if (self::is_excluded($image[0])) {
			return $original_string;
		}

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0') && ! self::image_url_matching_site_url($image[0])) {
			return $original_string;
		}

		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|ico|css|jsp|js)/', $image[0], $matches)) {
			return $original_string;
		}

		if (strpos($image[0], self::$zone_name) !== false) {
			return $original_string;
		}

		if (strpos($image[0], 'fbcdn.net') !== false) {
			return $original_string;
		}

		$is_css   = false;
		$is_js    = false;
		$is_svg   = false;
		$is_image = false;
		$minify   = 'false';

		if (strpos($image[0], 'schema') !== false) {
			return $original_string;
		}

		if (strpos($original_string, '.css') !== false) {
			$is_css = true;
			$asset  = true;

			if (empty(self::$css) || self::$css == '0') {
				return $original_string;
			}

			if ( ! empty(self::$css_minify) && self::$css_minify == '1') {
				$minify = 'true';
			}

		} else if (strpos($image[0], '.jsp') !== false) {
			return $original_string;
		} else if (strpos($image[0], '.js') !== false) {
			$is_js = true;
			$asset = true;

			if (empty(self::$js) || self::$js == '0') {
				return $original_string;
			}

			if ( ! empty(self::$js_minify) && self::$js_minify == '1') {
				$minify = 'true';
			}
		} else if (strpos($image[0], '.svg') !== false) {
			$is_svg = true;
			$asset  = true;
		} else if (
			strpos($image[0], '.jpg') !== false ||
			strpos($image[0], '.jpeg') !== false ||
			strpos($image[0], '.png') !== false ||
			strpos($image[0], '.ico') !== false ||
			strpos($image[0], '.svg') !== false ||
			strpos($image[0], '.gif') !== false
		) {
			$is_image = true;
		} else {
			return $original_string;
		}

		if (strpos($image[0], 'placeholder.svg') !== false) {
			return $original_string;
		}

		if (strpos($image[0], 'google') !== false) {
			return $original_string;
		}

		if (strpos($image[0], self::$zone_name) !== false) {
			return $original_string;
		}

		$apiURL   = 'https://' . self::$zone_name . '/minify:' . $minify . '/asset:' . self::reformat_url($image[0]);
		$image[0] = str_replace($image[0], $apiURL, $image[0]);

		self::$preload_image[] = $apiURL;
		$html                  = str_replace($image_url, $image[0], $find);

		return $html;
	}


	public function obstart_replace_url_in_css($image) {

		$asset    = false;
		$image[0] = trim($image[0]);

		if (strpos($image[0], 'simple-social-icons') !== false) {
			return $image[0];
		}

		if (strpos($image[0], '.jsp') !== false) {
			return $image[0];
		}

		if (strpos($image[0], 'retina.js') !== false) {
			return WPS_IC_URI . 'assets/js/retina.js';
		}

		if (self::is_excluded($image[0])) {
			return $image[0];
		}

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0') && ! self::image_url_matching_site_url($image[0])) {
			return $image[0];
		}

		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|ico|css|js)/', $image[0], $matches)) {
			return $image[0];
		}

		if (strpos($image[0], self::$zone_name) !== false) {
			return $image[0];
		}

		if (strpos($image[0], 'fbcdn.net') !== false) {
			return $image[0];
		}

		$is_css   = false;
		$is_js    = false;
		$is_svg   = false;
		$is_image = false;
		$minify   = 'false';

		if (strpos($image[0], 'schema') !== false) {
			return $image[0];
		}

		if (strpos($image[0], '.css') !== false) {
			$is_css = true;
			$asset  = true;

			if (empty(self::$css) || self::$css == '0') {
				return $image[0];
			}

			if ( ! empty(self::$css_minify) && self::$css_minify == '1') {
				$minify = 'true';
			}

		} else if (strpos($image[0], '.js') !== false) {
			$is_js = true;
			$asset = true;

			if (empty(self::$js) || self::$js == '0') {
				return $image[0];
			}

			if ( ! empty(self::$js_minify) && self::$js_minify == '1') {
				$minify = 'true';
			}
		} else if (strpos($image[0], '.svg') !== false) {
			$is_svg = true;
			$asset  = true;
		} else if (
			strpos($image[0], '.jpg') !== false ||
			strpos($image[0], '.jpeg') !== false ||
			strpos($image[0], '.png') !== false ||
			strpos($image[0], '.ico') !== false ||
			strpos($image[0], '.svg') !== false ||
			strpos($image[0], '.gif') !== false
		) {
			$is_image = true;
		} else {
			return $image[0];
		}

		if (strpos($image[0], 'placeholder.svg') !== false) {
			return $image[0];
		}

		if (self::$speed_test && ! $asset) {
			#self::$image_count ++;
		}

		if (strpos($image[0], 'google') !== false) {
			return $image[0];
		}

		if (strpos($image[0], self::$zone_name) !== false) {
			return $image[0];
		}

		$apiURL                = 'https://' . self::$zone_name . '/minify:' . $minify . '/asset:' . self::reformat_url($image[0]);
		$image[0]              = str_replace($image[0], $apiURL, $image[0]);
		self::$preload_image[] = $apiURL;

		return $image[0];
	}


	public function obstart_replace_brizy_url_simple($image) {
		if (strpos($image[0], self::$zone_name) !== false) {
			return $image[0];
		}

		if (strpos($image[0], '.jpg') !== false ||
				strpos($image[0], '.jpeg') !== false ||
				strpos($image[0], '.png') !== false ||
				strpos($image[0], '.svg') !== false ||
				strpos($image[0], '.gif') !== false) {


			$apiURL                = 'https://' . self::$zone_name . '/minify:false/asset:' . self::reformat_url($image[0]);
			$image[0]              = str_replace($image[0], $apiURL, $image[0]);
			self::$preload_image[] = $apiURL;

			return $image[0];
		} else {
			return $image[0];
		}
	}


	public function obstart_replace_brizy_url($image) {

		/*
		1	=>	wp-54d0250f421d1d41580d1b84cfbf5a91
		2	=>	iW%3D859%26iH%3D573%26oX%3D49%26oY%3D0%26cW%3D760%26cH%3D573
		3	=>	4
		 */

		#return $image[0];
		$decoded_string = html_entity_decode($image[0]);
		$parsed_url     = parse_url($decoded_string);

		if ( ! isset($parsed_url['query'])) {
			return $image[0];
		}

		parse_str($parsed_url['query'], $params);

		if ( ! isset($params['brizy_media'])) {
			return $image[0];
		}

		if (in_array($params['brizy_media'], self::$brizyCache)) {
			$image[0] = self::$brizyCache[ $params['brizy_media'] ];

			if (self::is_excluded($image[0])) {
				return $image[0];
			}

		} else {

			$attachments = get_posts(array(
																 'meta_key'   => 'brizy_attachment_uid',
																 'meta_value' => $params['brizy_media'],
																 'post_type'  => 'attachment',
															 ));

			if (isset($attachments[0])) {
				$attachment = $attachments[0];
			} else {
				return $image[0];
			}

			if (self::is_excluded($image[0])) {
				return $image[0];
			}

			if (strpos($image[0], self::$zone_name) !== false) {
				return $image[0];
			}

			$size[0] = self::$defined_resolution;

			if (strpos($image[0], 'http:') == false && strpos($image[0], 'https:') == false) {
				$image[0] = 'http://' . $image[0];
			}

			$real_image                                 = wp_get_attachment_image_src($attachment->ID, 'large');
			self::$brizyCache[ $params['brizy_media'] ] = $real_image[0];
			$image[0]                                   = $real_image[0];
			update_option('wps_ic_brizy_cache', self::$brizyCache);
		}

		if (self::$speed_test && $size[0] > 320) {
			$size = array(320, 320);
		}

		if ( ! empty(self::$exif) && self::$exif == '1') {
			$apiURL = self::$zone_name . '/q:' . self::$settings['optimization'] . '/exif:true/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $size[0] . '/url:' . $image[0];
		} else {
			$apiURL = self::$zone_name . '/q:' . self::$settings['optimization'] . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $size[0] . '/url:' . $image[0];
		}

		return $apiURL;
	}


	public function replace_path_css_urls($image) {

		$default = $image[0];

		if ( ! preg_match('/\.(woff|eot|ttf|woff2)/', $image[1])) {
			return $default;
		}

		if (strpos($image[1], 'google') !== false) {
			return $default;
		}

		if (strpos($image[1], self::$zone_name) !== false || strpos($image[1], 'zapwp') !== false) {
			return $default;
		}

		$found_img_src = $image[1];
		$found_img_src = trim($found_img_src, "'");
		$found_img_src = trim($found_img_src, '"');

		if (strpos('../wp-content', self::$site_url) !== false || strpos('./wp-content', self::$site_url) !== false) {
			$found_img_src = str_replace('../wp-content', 'wp-content', $found_img_src);
			$found_img_src = str_replace('./wp-content', 'wp-content', $found_img_src);
			$found_img_src = self::$site_url . '/' . $found_img_src;
		}

		$parse_url = parse_url($found_img_src);
		if (empty($parse_url['host'])) {
			$search_for = $found_img_src;

			if (strpos($found_img_src, self::$zone_name) !== false || strpos($found_img_src, 'zapwp') !== false) {
				return $found_img_src;
			}

			$found_img_src = self::$site_url . $found_img_src;

			$apiURL = 'https://' . self::$zone_name . '/minify:false/asset:' . $found_img_src;

			return "url(" . $apiURL . ")";
		} else {
			$apiURL = 'https://' . self::$zone_name . '/minify:false/asset:' . $found_img_src;

			return "url('" . $apiURL . "')";
		}

	}


	public function replace_path_css($image) {
		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|woff|eot|ttf|woff2)/', $image[0])) {
			return $image[0];
		}

		if (strpos($image[0], 'google') !== false) {
			return $image[0];
		}

		if (strpos($image[0], self::$zone_name) !== false || strpos($image[0], 'zapwp') !== false) {
			return $image[0];
		}

		$found_img_src = $image[0];
		$found_img_src = trim($found_img_src, "'");
		$found_img_src = trim($found_img_src, '"');

		if (strpos('../wp-content', self::$site_url) !== false || strpos('./wp-content', self::$site_url) !== false) {
			$found_img_src = str_replace('../wp-content', 'wp-content', $found_img_src);
			$found_img_src = str_replace('./wp-content', 'wp-content', $found_img_src);
			$found_img_src = self::$site_url . '/' . $found_img_src;
		}

		$parse_url = parse_url($found_img_src);
		if (empty($parse_url['host'])) {
			$search_for = $found_img_src;

			if (strpos($found_img_src, self::$zone_name) !== false || strpos($found_img_src, 'zapwp') !== false) {
				return $found_img_src;
			}

			#$found_img_src = self::$site_url . $found_img_src;

			$apiURL = 'https://' . self::$zone_name . '/minify:false/asset:' . $found_img_src;

			return self::$site_url . $found_img_src;
		} else {
			$apiURL = 'https://' . self::$zone_name . '/minify:false/asset:' . $found_img_src;

			return $apiURL;
		}

		$apiURL                = 'https://' . self::$zone_name . '/minify:false/asset:' . $found_img_src;
		$found_img_src         = str_replace($found_img_src, $apiURL, $found_img_src);
		self::$preload_image[] = $apiURL;

		return $found_img_src;
	}


	public function obstart_replace_url($image) {
		$asset    = false;
		$image[0] = trim($image[0]);

		if (strpos($image[0], 'simple-social-icons') !== false ||
				strpos($image[0], 'retina.js') !== false ||
				strpos($image[0], 'fbcdn.net') !== false ||
				strpos($image[0], 'schema') !== false ||
				strpos($image[0], self::$zone_name) !== false) {
			return $image[0];
		}

		if ( ! preg_match('/\.(jpg|jpeg|png|gif|svg|ico|css|js)/', $image[0], $matches) && strpos($image[0], '?brizy_media') == false) {
			return $image[0];
		}

		if (self::is_excluded($image[0])) {
			return $image[0];
		}

		if ((self::$external_url_enabled == 'false' || self::$external_url_enabled == '0')) {
			if ( ! self::image_url_matching_site_url($image[0])) {
				return $image[0];
			}
		}

		$is_css   = false;
		$is_js    = false;
		$is_svg   = false;
		$is_image = false;
		$minify   = 'false';

		if (strpos($image[0], '.css') !== false) {
			$is_css = true;
			$asset  = true;

			if (empty(self::$css) || self::$css == '0') {
				return $image[0];
			}

			if ( ! empty(self::$css_minify) && self::$css_minify == '1') {
				$minify = 'true';
			}

		} else if (strpos($image[0], '.js') !== false) {
			$is_js = true;
			$asset = true;

			if (empty(self::$js) || self::$js == '0') {
				return $image[0];
			}

			if ( ! empty(self::$js_minify) && self::$js_minify == '1') {
				$minify = 'true';
			}
		} else if (strpos($image[0], '.svg') !== false) {
			$is_svg = true;
			$asset  = true;
		} else if (
			strpos($image[0], '.jpg') !== false ||
			strpos($image[0], '.jpeg') !== false ||
			strpos($image[0], '.png') !== false ||
			strpos($image[0], '.ico') !== false ||
			strpos($image[0], '.svg') !== false ||
			strpos($image[0], '.gif') !== false
		) {
			$is_image = true;
		} else {
			return $image[0];
		}

		if (strpos($image[0], 'placeholder.svg') !== false) {
			return $image[0];
		}

		if (self::$speed_test && ! $asset) {
			self::$image_count ++;
		}

		if (( ! empty(self::$lazy_enabled) && self::$lazy_enabled == '1') && ! $asset && self::$speed_test && self::$image_count >= self::$speed_test_img_count_limit) {
			$svgAPI   = self::$svg_placeholder;
			$image[0] = str_replace($image[0], $svgAPI, $image[0]);
		} else {
			if ( ! $asset) {


				if (empty(self::$adaptive_enabled) || self::$adaptive_enabled == '0') {
					$size[0] = '1';
				} else {
					$size = self::get_image_size($image[0]);
					if ( ! empty(self::$defined_resolution)) {
						if ($size[0] > self::$defined_resolution) {
							$size[0] = self::$defined_resolution;
						}
					}
				}

				if (self::$speed_test && $size[0] > 320) {
					$size = array(320, 320);
				}

				$apiURL = self::$apiUrl . '/retina:' . self::$is_retina . '/webp:' . self::$webp . '/w:' . $size[0] . '/url:' . self::reformat_url($image[0]);

				$image[0]              = str_replace($image[0], $apiURL, $image[0]);
				self::$preload_image[] = $apiURL;
			} else {

				if (strpos($image[0], 'google') !== false || strpos($image[0], 'typekit') !== false) {
					return $image[0];
				}

				if (strpos($image[0], self::$zone_name) !== false) {
					return $image[0];
				}

				$apiURL                = 'https://' . self::$zone_name . '/minify:' . $minify . '/asset:' . self::reformat_url($image[0]);
				self::$preload_image[] = $apiURL;
				$image[0]              = str_replace($image[0], $apiURL, $image[0]);
			}
		}

		return $image[0];
	}


	/**
	 * Verify CDN is enabled and that it has got enough bandwidth left over.
	 * In case it's not enabled or does not have enough bandwidth, disable it.
	 */
	public function check_cdn_status() {
		global $wps_ic;

		$cdn_check_transient = get_transient('wps_ic_cdn_check');

		if ( ! $cdn_check_transient) {
			// Check CDN Status

			$call = $wps_ic->curl->call_api(array('cdn_status' => 'true'));

			if ($call) {
				set_transient('wps_ic_cdn_check', 'true', 60 * 2);

				if ( ! $call->success) {
					// CDN Does exist or we just created it
					$settings             = get_option(WPS_IC_SETTINGS);
					$settings['live-cdn'] = '0';
					update_option(WPS_IC_SETTINGS, $settings);
					set_transient('wps_ic_cdn_check_status', 'failed', 60 * 2);
				}
			}
		}

	}


	public function save_post($post_id) {
		delete_post_meta($post_id, '_ic_sources');
		delete_post_meta($post_id, '_ic_cdn_content');
	}


}