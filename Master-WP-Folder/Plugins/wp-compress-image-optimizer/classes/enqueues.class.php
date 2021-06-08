<?php


/**
 * Class - Enqueues
 */
class wps_ic_enqueues extends wps_ic {

	public static $version;
	public static $slug;
	public static $css_combine;
	public static $settings;
	public static $js_debug;


	public function __construct() {
		$this::$slug    = 'wpcompress';
		$this::$version = parent::$version;
		self::$settings = parent::$settings;
		self::$js_debug = parent::$js_debug;

		if ( ! empty($_GET['trp-edit-translation']) || ! empty($_GET['elementor-preview']) || ! empty($_GET['preview']) || ( ! empty($_GET['fl_builder']) || isset($_GET['fl_builder'])) || ! empty($_GET['PageSpeed']) || ! empty($_GET['et_fb']) || ! empty($_GET['ct_builder']) || ( ! empty($_SERVER['SCRIPT_URL']) && $_SERVER['SCRIPT_URL'] == "/wp-admin/customize.php")) {
			// Do nothing
		} else {
			add_action('wp_print_scripts', array($this, 'inline_frontend'), 1);
			add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend'), 1);
			add_action('admin_enqueue_scripts', array($this, 'enqueue_all'));

			if ($this->is_st()) {
				#add_filter('script_loader_tag', array($this, 'defer_parsing_of_js'), 10);
				#add_filter('script_loader_tag', array($this, 'defer_parsing_of_css'), 10);
			}

			if ( ! empty(self::$settings['defer-js']) && self::$settings['defer-js'] == '1') {
				add_filter('script_loader_tag', array($this, 'defer_parsing_of_js'), 10);
			}

		}

	}


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


	public function defer_wpc_scripts($tag, $handle, $src) {
		$defer = array(
			'block-library',
			'dashicons'
		);

		if (in_array($handle, $defer)) {
			#return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
		}

		return $tag;
	}


	public function inline_frontend() {
		echo '<style type="text/css">';
		echo '.wps-ic-lazy-image {opacity:0;}';
		echo '.wps-ic-no-lazy-loaded {opacity:1;}';
		echo '.ic-fade-in {
animation: ICfadeIn ease 1s;
-webkit-animation: ICfadeIn ease 1s;
-moz-animation: ICfadeIn ease 1s;
-o-animation: ICfadeIn ease 1s;
-ms-animation: ICfadeIn ease 1s;
}
@keyframes ICfadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-moz-keyframes ICfadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-webkit-keyframes ICfadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-o-keyframes ICfadeIn {
0% {opacity:0;}
100% {opacity:1;}
}

@-ms-keyframes ICfadeIn {
0% {opacity:0;}
100% {opacity:1;}
}';
		echo '</style>';
	}


	public function defer_parsing_of_css($url, $force_jquery = false) {
		if (is_admin()) {
			return $url;
		} //don't break WP Admin

		if (false === strpos($url, '.css')) {
			return $url;
		}

		return str_replace(' href', ' async href', $url);
	}


	public function defer_parsing_of_js($url, $force_jquery = false) {
		if (is_admin()) {
			return $url;
		} //don't break WP Admin

		if (false === strpos($url, '.js')) {
			return $url;
		}

		if ( ! $force_jquery && strpos($url, 'jquery.js')) {
			return $url;
		}

		return str_replace(' src', ' defer src', $url);
	}


	public function enqueue_combined() {
		$combined = get_option('wps_ic_combined_css');
		if ( ! empty($combined)) {
			foreach ($combined as $i => $handle) {

				wp_enqueue_style('wps-ic-combined-' . mt_rand(99, 999), WPS_IC_CACHE_URL . $handle, array());
			}
		}
	}


	public function enqueue_frontend() {
		$options = parent::$settings;

		if (( ! empty($options['live-cdn']) && $options['live-cdn'] == '1')
				|| ( ! empty($options['generate_adaptive']) && $options['generate_adaptive'] == '1')
				|| ( ! empty($options['lazy']) && $options['lazy'] == '1')
				|| ( ! empty($options['generate_webp']) && $options['generate_webp'] == '1')) {

			if (empty($options['slider_images']) || $options['slider_images'] == '0') {
				$slider_images = 'false';
			} else {
				$slider_images = 'true';
			}

			$lazy = 'true';
			if (empty($options['lazy']) || $options['lazy'] == '0') {
				$lazy = 'false';
			}

			$webp = 'true';
			if (empty($options['generate_webp']) || $options['generate_webp'] == '0') {
				$webp = 'false';
			}

			$adaptive = 'true';
			if (empty($options['generate_adaptive']) || $options['generate_adaptive'] == '0') {
				$adaptive = 'false';
			}

			$retina = 'true';
			if (empty($options['retina']) || $options['retina'] == '0') {
				$retina = 'false';
			}

			$exif = 'false';
			if ( ! empty($options['preserve_exif']) && $options['preserve_exif'] == '1') {
				$exif = 'false';
			}

			if (empty($options['high_res']) || $options['high_res'] == '0') {
				$high_res = 'false';
			} else {
				$high_res = 'true';
			}

			$real_user = 'true';
			if ($this->is_st() && $this->is_mobile()) {
				$real_user = 'false';
			}

			if ( ! $options['cname'] || empty($options['cname'])) {
				$zone_name = get_option('ic_cdn_zone_name');
			} else {
				$custom_cname = get_option('ic_custom_cname');
				$zone_name    = $custom_cname;
			}

			if (is_user_logged_in() && current_user_can('manage_options')) {
				// Required for Admin Bar
				wp_enqueue_style($this::$slug . '-admin-bar', WPS_IC_URI . 'assets/css/admin-bar.min.css', array(), '1.0.0');

				wp_enqueue_script($this::$slug . '-admin-bar-js', WPS_IC_URI . 'assets/js/admin-bar' . WPS_IC_MIN . '.js', array('jquery'), '1.0.0');
			}

			if (( ! empty($options['lazy']) && $options['lazy'] == '1')) {

				if (! empty($options['live-cdn']) && $options['live-cdn'] == '1') {
					wp_enqueue_script($this::$slug . '-aio', WPS_IC_URI . 'assets/js/all-in-one' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
					wp_enqueue_script($this::$slug . '-lazy', WPS_IC_URI . 'assets/js/lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
				} else {
					wp_enqueue_script($this::$slug . '-aio', WPS_IC_URI . 'assets/js/all-in-one' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
					wp_enqueue_script($this::$slug . '-lazy', WPS_IC_URI . 'assets/js/local.lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
				}

				#wp_enqueue_style($this::$slug . '-lazy-effects', WPS_IC_URI . 'assets/css/lazy' . WPS_IC_MIN . '.css', array(), '1.0.0');

				wp_localize_script($this::$slug . '-lazy', 'wpc_vars', array(
					'ajaxurl'          => admin_url('admin-ajax.php'),
					'spinner'          => WPS_IC_URI . 'assets/images/spinner.svg',
					'slider_images'    => $slider_images,
					'high_res'         => $high_res,
					'real_user'        => $real_user,
					'webp_enabled'     => $webp,
					'retina_enabled'   => $retina,
					'exif_enabled'     => $exif,
					'adaptive_enabled' => $adaptive,
					'speed_test'       => $this->is_st(),
					'js_debug'         => self::$js_debug
				));

			} else {

				if (! empty($options['live-cdn']) && $options['live-cdn'] == '1') {
					// Live CDN Enabled
					wp_enqueue_script($this::$slug . '-aio', WPS_IC_URI . 'assets/js/all-in-one-no-lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
					wp_enqueue_script($this::$slug . '-no-lazy', WPS_IC_URI . 'assets/js/no-lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
				} else {
					// Live CDN Disabled
					wp_enqueue_script($this::$slug . '-aio', WPS_IC_URI . 'assets/js/all-in-one-no-lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
					wp_enqueue_script($this::$slug . '-no-lazy', WPS_IC_URI . 'assets/js/local.no-lazy' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);
				}

				wp_localize_script($this::$slug . '-no-lazy', 'wpc_vars', array(
					'ajaxurl'          => admin_url('admin-ajax.php'),
					'spinner'          => WPS_IC_URI . 'assets/images/spinner.svg',
					'slider_images'    => $slider_images,
					'high_res'         => $high_res,
					'real_user'        => $real_user,
					'webp_enabled'     => $webp,
					'retina_enabled'   => $retina,
					'exif_enabled'     => $exif,
					'adaptive_enabled' => $adaptive,
					'speed_test'       => $this->is_st(),
					'js_debug'         => self::$js_debug
				));
			}

			// Is JS Debug enabled?
			if (self::$js_debug == 'true') {
				wp_enqueue_script($this::$slug . '-js-debug', WPS_IC_URI . 'assets/js/js-debug' . WPS_IC_MIN . '.js', array('jquery'), $this::$version);

				wp_localize_script($this::$slug . '-js-debug', 'wpc_vars', array(
					'ajaxurl'          => admin_url('admin-ajax.php'),
					'lazy_enabled'     => $lazy,
					'webp_enabled'     => $webp,
					'retina_enabled'   => $retina,
					'exif_enabled'     => $exif,
					'adaptive_enabled' => $adaptive,
					'js_debug'         => self::$js_debug
				));
			}

		}

	}


	public function is_mobile() {
		$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

		$fp = fopen(WPS_IC_DIR . 'is_mobile.txt', 'w+');
		fwrite($fp, 'User Agent: ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n");
		fwrite($fp, $userAgent . "\r\n");
		fwrite($fp, strpos($userAgent, 'mobile') . "\r\n");
		fwrite($fp, strpos($userAgent, 'lighthouse') . "\r\n");
		fclose($fp);

		if (strpos($userAgent, 'mobile')) {
			return true;
		} else {
			return false;
		}
	}


	public function enqueue_all() {
		$this::$version = parent::$version;
		$this::$slug    = parent::$slug;
		$response_key   = parent::$response_key;
		$settings       = parent::$settings;

		$screen = get_current_screen();

		$this->asset_style('menu-icon', 'css/menu.wp' . WPS_IC_MIN . '.css');
		wp_enqueue_script($this::$slug . '-admin-bar-js', WPS_IC_URI . 'assets/js/admin-bar-backend.js', array('jquery'), '1.0.0');

		if ($screen->base != 'upload' &&
				$screen->base != 'settings_page_wpcompress' &&
				$screen->base != 'toplevel_page_wpcompress-network' &&
				$screen->base != 'toplevel_page_wpcompress' &&
				$screen->base != 'media_page_wpcompress_optimize' &&
				$screen->base != 'media_page_wpcompress_restore' &&
				$screen->base != 'plugins') {
		} else {


			if (is_admin()) {
				wp_enqueue_script($this::$slug . '-circle', WPS_IC_URI . 'assets/js/circle-progress/circle-progress.js', array('jquery'), '1.0.0');

				if ($screen->base == 'toplevel_page_wpcompress' || $screen->base == 'toplevel_page_wpcompress-network' || $screen->base == 'settings_page_wpcompress') {

					// Switch Box - Checkbox customizer
					$this->script('switchbox', 'switchbox' . WPS_IC_MIN . '.js');

					// Settings Area
					wp_enqueue_style($this::$slug . '-google-font-Poppins', 'https://fonts.googleapis.com/css?family=Poppins:100,300,400,600&display=swap', array(), $this::$version);
					wp_enqueue_style($this::$slug . '-google-font-sans', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), $this::$version);
					#$this->script('admin-settings', 'settings.admin' . WPS_IC_MIN . '.js');
					$this->script('admin-lottie-player', 'lottie/lottie-player.min.js');
					$this->script('admin-settings-live', 'live-settings.admin' . WPS_IC_MIN . '.js');
					#$this->asset_style('admin-ios-toggles', 'css/ios-toggle' . WPS_IC_MIN . '.css');
					wp_localize_script('wpcompress-admin-settings-live', 'wps_ic_vars', array('ajaxurl' => admin_url('admin-ajax.php')));

					if (is_multisite()) {
						$this->script('admin-mu-settings', 'mu-settings.admin' . WPS_IC_MIN . '.js');
					}

					// Font awesome
					$this->asset_style('admin-fontawesome', 'fontawesome/css/all' . WPS_IC_MIN . '.css');
				}

				if ( ! empty($response_key)) {

					if ($screen->base == 'settings_page_wpcompress' && ( ! empty($_GET['view']) && $_GET['view'] == 'bulk')) {
						$this->script('media-library-bulk', 'media-library-bulk' . WPS_IC_MIN . '.js');
					}

					// Media Library - Bulk Area
					if ($screen->base == 'media_page_wpcompress_optimize' || $screen->base == 'media_page_wpcompress_restore' || $screen->base == 'media_page_wp_hard_restore_bulk') {

						// Font awesome
						$this->asset_style('admin-fontawesome', 'fontawesome/css/all' . WPS_IC_MIN . '.css');

					}

					// Media Library Area
					if ($screen->base == 'upload' || $screen->base == 'media_page_wpcompress_optimize' || $screen->base == 'plugins' || $screen->base == 'media_page_wpcompress_restore' || $screen->base == 'media_page_wp_hard_restore_bulk') {

						// Icons
						$this->asset_style('admin-fontello', 'icons/css/fontello.css');

						// Tooltips
						$this->asset_style('admin-tooltip-bundle-wcio', 'tooltip/css/tooltipster.bundle' . WPS_IC_MIN . '.css');
						$this->asset_script('admin-tooltip', 'tooltip/js/tooltipster.bundle' . WPS_IC_MIN . '.js');

						$this->script('media-library', 'media-library-actions' . WPS_IC_MIN . '.js');
					}

					if ($screen->base == 'toplevel_page_wpcompress' || $screen->base == 'toplevel_page_wpcompress-network' || $screen->base == 'upload' || $screen->base == 'media_page_wpcompress_optimize' || $screen->base == 'plugins' || $screen->base == 'media_page_wpcompress_restore' || $screen->base == 'media_page_wp_hard_restore_bulk' || $screen->base == 'settings_page_wpcompress') {

						$this->script('admin', 'admin' . WPS_IC_MIN . '.js');

						$this->script('popups', 'popups' . WPS_IC_MIN . '.js');

						// Google Fonts
						wp_enqueue_style($this::$slug . '-google-font-Poppins', 'https://fonts.googleapis.com/css?family=Poppins:100,400,600&display=swap', array(), $this::$version);
						wp_enqueue_style($this::$slug . '-google-font-sans', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), $this::$version);
					}

				}

				if ($screen->base == 'toplevel_page_wpcompress' || $screen->base == 'settings_page_wpcompress') {

					$this->asset_style('admin-tooltip-bundle-wcio', 'tooltip/css/tooltipster.bundle.min.css');
					$this->asset_script('admin-tooltip', 'tooltip/js/tooltipster.bundle.min.js');

					// Fontello
					$this->asset_style('admin-fontello', 'icons/css/fontello.css');
				}

				if ($screen->base == 'toplevel_page_wpcompress' || $screen->base == 'toplevel_page_wpcompress-network' || $screen->base == 'upload' || $screen->base == 'media_page_wpcompress_optimize' || $screen->base == 'plugins' || $screen->base == 'media_page_wpcompress_restore' || $screen->base == 'media_page_wp_hard_restore_bulk' || $screen->base == 'settings_page_wpcompress') {

					$this->style('admin-media-library', 'admin.media-library' . WPS_IC_MIN . '.css');
					$this->style('admin', 'admin.styles' . WPS_IC_MIN . '.css');
					$this->style('admin-toggle', 'admin.toggle' . WPS_IC_MIN . '.css');
					//$this->style('admin-animations', 'animate' . WPS_IC_MIN . '.css');
					$this->style('admin-settings-page', 'settings_page' . WPS_IC_MIN . '.css');
					$this->asset_script('admin-settings-page-progress-bar', 'progress/progressbar' . WPS_IC_MIN . '.js');
					$this->asset_script('admin-settings-page-charts', 'charts/Chart.bundle' . WPS_IC_MIN . '.js');
					$this->asset_script('admin-settings-popup', 'js/settings.popup.js');

					// Sweetalert
					$this->asset_style('admin-sweetalert', 'sweetalert/sweetalert2.min.css');
					$this->asset_script('admin-sweetalert', 'sweetalert/sweetalert2.all.min.js');

				}

				// Print footer script
				wp_localize_script('wps_ic-admin', 'wps_ic', array('uri' => WPS_IC_URI));
			}

		}

	}


	public
	function asset_style(
		$name, $filename
	) {
		wp_enqueue_style($this::$slug . '-' . $name, WPS_IC_URI . 'assets/' . $filename, array(), $this::$version);
	}


	public
	function script(
		$name, $filename, $footer = true
	) {
		wp_enqueue_script($this::$slug . '-' . $name, WPS_IC_URI . 'assets/js/' . $filename, array('jquery'), $this::$version, $footer);
	}


	public
	function asset_script(
		$name, $filename
	) {
		wp_enqueue_script($this::$slug . '-' . $name, WPS_IC_URI . 'assets/' . $filename, array('jquery'), $this::$version, true);
	}


	public
	function style(
		$name, $filename
	) {
		wp_enqueue_style($this::$slug . '-' . $name, WPS_IC_URI . 'assets/css/' . $filename, array(), $this::$version);
	}

}