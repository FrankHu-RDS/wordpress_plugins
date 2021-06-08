<?php


class wps_ic_legacy {

  public static $site_url;
  public static $adaptive_enabled;
  public static $webp_enabled;
  public static $lazy;
  public static $settings;
  public static $updir;
  public static $svg_placeholder;
  public static $excluded_list;

  public function __construct() {

    if ( ! empty($_GET['ignore_ic'])) {
      return;
    }

		self::$settings         = get_option(WPS_IC_SETTINGS);
		if (!empty(self::$settings['live-cdn']) && self::$settings['live-cdn'] == '0') {
			return;
		}

    if ( ! is_admin()) {

      self::$site_url         = site_url();
      self::$adaptive_enabled = self::$settings['generate_adaptive'];
      self::$webp_enabled     = self::$settings['generate_webp'];
      self::$lazy             = self::$settings['lazy'];
      self::$svg_placeholder  = 'data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20#width#%20#height#%22%20width%3D%22#width#%22%20height%3D%22#height#%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E';
      self::$excluded_list         = get_option('wps_ic_excluded_list');

      add_filter('the_content', array($this, 'searchContent'), 10000);
      add_filter('the_excerpt', array($this, 'searchContent'), 10000);
      add_filter('post_thumbnail_html', array($this, 'searchContent'));
    }

  }


  public function legacyObStart() {
    ob_start(array(&$this, 'searchContent'));
  }


  public function searchContent($content) {

    if (($this->webpEnabled() && $this->webpSupported()) || $this->adaptiveEnabled()) {
      // WebP
      self::$updir = wp_upload_dir();
      $content     = preg_replace_callback('/<img[^>]*>/i', array(&$this, 'convertImagetoWebp'), $content);
    } else {
      // noWebP
      self::$updir = wp_upload_dir();
      $content     = preg_replace_callback('/<img[^>]*>/i', array(&$this, 'convertImagetoWPC'), $content);
    }

    return $content;
  }


  public function is_excluded($image_element, $image_link = '') {
    if (empty($image_link)) {
      preg_match('@src="([^"]+)"@', $image_element, $match_url);
      $basename_original = basename($match_url[1]);
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

    if (!empty(self::$excluded_list) && in_array($basename, self::$excluded_list)) {
      return true;
    } else {
      return false;
    }

  }


  public function get_attributes($element) {
    $dom = new DOMDocument();
    @$dom->loadHTML($element);
    $image      = $dom->getElementsByTagName('img')->item(0);
    $attributes = array();

    if ( ! is_object($image)) {
      return false;
    }

    foreach ($image->attributes as $attr) {
      $attributes[ $attr->nodeName ] = $attr->nodeValue;
    }

    return $attributes;
  }


  public function image_url_matching_site_url($image) {
    $site_url          = self::$site_url;
    $site_url_protocol = parse_url($site_url, PHP_URL_SCHEME);
    $image_protocol    = parse_url($image, PHP_URL_SCHEME);

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


  public function is_st() {
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

    $pingdom  = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'pingdom');
    $gtmetrix = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'gtmetrix');
    $google   = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'google page speed');

    if ( ! empty($_GET['simulate_test'])) {
      return true;
    }

    if ($pingdom !== false) {
      return true;
    }

    if ($gtmetrix !== false) {
      return true;
    }

    if ($google !== false) {
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


  public function convertImagetoWPC($image) {

    if ($this->is_excluded($image[0])) {
      return $image[0];
    }

    // Fetch image attributes
    $img = self::get_attributes($image[0]);
    $sourceInfo   = $this->Get($img, 'src');
    $source       = $sourceInfo['value'];
    $sourcePrefix = $sourceInfo['prefix'];

    $sourcesetInfo   = $this->Get($img, 'srcset');
    $sourceset       = $sourcesetInfo['value'];
    $sourcesetPrefix = $sourceset ? $sourceInfo['prefix'] : $sourceInfo['prefix'];

    $sizesInfo   = $this->Get($img, 'sizes');
    $sizes       = $sizesInfo['value'];
    $sizesPrefix = $sizesInfo['prefix'];

    if ($this->is_st()) {
      $sizes = '(max-width: 230px) 100vw, 230px';
    }

    //some attributes should not be moved from <img>
    $altAttr    = isset($img['alt']) && strlen($img['alt']) ? ' alt="' . $img['alt'] . '"' : '';
    $idAttr     = isset($img['id']) && strlen($img['id']) ? ' id="' . $img['id'] . '"' : '';
    $heightAttr = isset($img['height']) && strlen($img['height']) ? ' height="' . $img['height'] . '"' : '';
    $widthAttr  = isset($img['width']) && strlen($img['width']) ? ' width="' . $img['width'] . '"' : '';

    if ( ! preg_match('/\.(jpg|jpeg|png|gif)/', $source, $matches)) {
      return $image[0];
    }

    if ( ! $this->image_url_matching_site_url($image[0])) {
      return $image[0];
    }

    if (preg_match('/\.svg/', $source, $matches)) {
      return $image[0];
    }

    $lazy_loading = '';
    $svg          = '';
    $source_svg   = $source;
    if (self::$lazy == '1') {
      $lazy_loading = 'loading="lazy"';

      $image_base_dir = self::$updir['basedir'];
      $image_base_url = self::$updir['baseurl'];
      $fileDir        = str_replace($image_base_url, $image_base_dir, $source);

      if (file_exists($fileDir)) {
        $image_size = getimagesize($fileDir);
        $svg        = str_replace('#width#', '100%', self::$svg_placeholder);
        $svg        = str_replace('#height#', '100%', $svg);
        $source_svg = $svg;
      }
    }

    $output = '<img src="' . $source_svg . '"  ' . self::create_attributes($img) . ' srcset="' . $sourceset . '"' . ' sizes="' . $sizes . '"' . $lazy_loading . ' class="' . $img['class'] . '" />';

    return $output;

  }


  public function convertImagetoWebp($image) {

    if ($this->is_excluded($image[0])) {
      return $image[0];
    }

    // Fetch image attributes
    $img = self::get_attributes($image[0]);

    $sourceInfo   = $this->Get($img, 'src');
    $source       = $sourceInfo['value'];
    $sourcePrefix = $sourceInfo['prefix'];

    $sourcesetInfo   = $this->Get($img, 'srcset');
    $sourceset       = $sourcesetInfo['value'];
    $sourcesetPrefix = $sourceset ? $sourceInfo['prefix'] : $sourceInfo['prefix'];

    $sizesInfo   = $this->Get($img, 'sizes');
    $sizes       = $sizesInfo['value'];
    $sizesPrefix = $sizesInfo['prefix'];

    if ($this->is_st()) {
      $sizes = '(max-width: 230px) 100vw, 230px';
    }

    //some attributes should not be moved from <img>
    $altAttr    = isset($img['alt']) && strlen($img['alt']) ? ' alt="' . $img['alt'] . '"' : '';
    $idAttr     = isset($img['id']) && strlen($img['id']) ? ' id="' . $img['id'] . '"' : '';
    $heightAttr = isset($img['height']) && strlen($img['height']) ? ' height="' . $img['height'] . '"' : '';
    $widthAttr  = isset($img['width']) && strlen($img['width']) ? ' width="' . $img['width'] . '"' : '';

    if ( ! preg_match('/\.(jpg|jpeg|png|gif)/', $source, $matches)) {
      return $image[0];
    }

    if ( ! $this->image_url_matching_site_url($image[0])) {
      return $image[0];
    }

    if (preg_match('/\.svg/', $source, $matches)) {
      return $image[0];
    }

    $sourceSet_Webp = self::replaceSrcSet($img['srcset']);

    if (empty($sourceSet_Webp)) {
      $sourceSet_Webp = '';
      $image_base_dir = self::$updir['basedir'];
      $image_base_url = self::$updir['baseurl'];

      $fileWebPDir = str_replace($image_base_url, $image_base_dir, $source);
      $fileWebPDir = str_replace(array('.jpg', '.png', '.gif'), '.webp', $fileWebPDir);

      if (file_exists($fileWebPDir)) {
        $fileWebP       = str_replace(array('.jpg', '.png', '.gif'), '.webp', $source);
        $sourceSet_Webp .= $fileWebP;
      }
    }

    $lazy_class = '';
    $lazy_loading = '';
    $svg          = '';
    $source_svg   = $source;
    if (self::$lazy == '1') {
      $lazy_loading = 'loading="lazy" ';
      $lazy_class = 'wps-ic-lazy-enabled wps-ic-local';

      $image_base_dir = self::$updir['basedir'];
      $image_base_url = self::$updir['baseurl'];
      $fileDir        = str_replace($image_base_url, $image_base_dir, $source);

      if (file_exists($fileDir)) {
        $image_size = getimagesize($fileDir);
        $svg        = str_replace('#width#', '100%', self::$svg_placeholder);
        $svg        = str_replace('#height#', '100%', $svg);
        $source_svg = $svg;
      }
    }

    if ($this->webpEnabled() && $this->webpSupported()) {

      $source_webp = $source;
      if (strpos($source, '.webp') === false) {
        $source_webp    = '';
        $image_base_dir = self::$updir['basedir'];
        $image_base_url = self::$updir['baseurl'];

        $fileWebPDir = str_replace($image_base_url, $image_base_dir, $source);
        $fileWebPDir = str_replace(array('.jpg', '.png', '.gif'), '.webp', $fileWebPDir);
        if (file_exists($fileWebPDir)) {
          $fileWebP    = str_replace(array('.jpg', '.png', '.gif'), '.webp', $source);
          $source_webp = $fileWebP;
        } else {
          $source_webp = $source;
        }

        if (self::$lazy == '0' || empty(self::$lazy)) {
          $source_svg = $source_webp;
        }

      }

      if ( ! $source_webp) {
        $source_webp    = $source;
        $sourceSet_Webp = $img['srcset'];
      }

      $output = '<img src="' . $source_svg . '" class="' . $img['class'] . ' ' . $lazy_class . '" data-src="' . $source_webp . '" data-srcset="' . $sourceSet_Webp . '" sizes="' . $sizes . '" ' . $lazy_loading . ' />';

    } else {

      $output = '<img src="' . $source_svg . '"  class="' . $img['class'] . ' ' . $lazy_class . '" srcset="' . $sourceset . '"' . ' sizes="' . $sizes . '"' . $lazy_loading . ' />';
    }

    return $output;

  }


  public function create_attributes($attribute_array) {
    $attributes = '';

    foreach ($attribute_array as $attribute => $value) {
      if ($attribute == 'class') {
        $value .= ' lazyload';
      }
      $attributes .= $attribute . '="' . $value . '" ';
    }

    return substr($attributes, 0, - 1);
  }


  public function Get($img, $type) {
    return array(
      'value'  => (isset($img[ 'data-lazy-' . $type ]) && strlen($img[ 'data-lazy-' . $type ])) ? $img[ 'data-lazy-' . $type ] : (isset($img[ 'data-' . $type ]) && strlen($img[ 'data-' . $type ]) ? $img[ 'data-' . $type ] : (isset($img[ $type ]) && strlen($img[ $type ]) ? $img[ $type ] : false)),
      'prefix' => (isset($img[ 'data-lazy-' . $type ]) && strlen($img[ 'data-lazy-' . $type ])) ? 'data-lazy-' : (isset($img[ 'data-' . $type ]) && strlen($img[ 'data-' . $type ]) ? 'data-' : (isset($img[ $type ]) && strlen($img[ $type ]) ? '' : false))
    );
  }


  public function replaceSrcSet($srcset) {
    $srcsetWebP = '';
    if ($srcset) {

      $image_base_dir = self::$updir['basedir'];
      $image_base_url = self::$updir['baseurl'];

      $defs = explode(",", $srcset);
      foreach ($defs as $item) {
        $parts = preg_split('/\s+/', trim($item));

        $fileWebPDir = str_replace($image_base_url, $image_base_dir, $parts[0]);
        $fileWebPDir = str_replace(array('.jpg', '.png', '.gif'), '.webp', $fileWebPDir);

        if (file_exists($fileWebPDir)) {
          $fileWebP   = str_replace(array('.jpg', '.png', '.gif'), '.webp', $parts[0]);
          $srcsetWebP .= $fileWebP . (isset($parts[1]) ? ' ' . $parts[1] : '') . ',';
        }

      }
    }

    $srcsetWebP = rtrim($srcsetWebP, ',');

    return $srcsetWebP;
  }


  public function adaptiveEnabled() {
    if (self::$adaptive_enabled) {
      return true;
    } else {
      return false;
    }
  }


  public function webpEnabled() {
    if (self::$webp_enabled) {
      return true;
    } else {
      return false;
    }
  }


  public function webpSupported() {
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false || strpos($_SERVER['HTTP_USER_AGENT'], ' chrome/') !== false)) {
      return true;
    } else {
      return false;
    }
  }

}