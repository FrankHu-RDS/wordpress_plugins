<?php
/*
Plugin Name: Divi Support Helper
Plugin URI: https://www.peeayecreative.com/product/divi-support-helper/
Description: Need help with your Divi website? This plugin creates a handy report for you to share with those providing support so they can narrow down the issue and give appropriate recommendations.
Author: Pee-Aye Creative
Version: 1.0
Author URI: https://www.peeayecreative.com/
*/

/**
 * Make sure we don't expose any info if called directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add Wordpress admin menu item.
 */
add_action('admin_menu', function(){
	$plugin_page = add_menu_page( 'Divi Support Helper', 'Support Helper', 'manage_options', 'divi-support-helper', 'dsh_render_page', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNjAuMjYgMTYwLjI2Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2EwYTVhYTt9PC9zdHlsZT48L2RlZnM+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik0xNDkuNDQsNTRsLTMuNS0zLjVhNzIsNzIsMCwwLDAtMTAuNDEtMTYuNTgsNi40OCw2LjQ4LDAsMCwwLS43My04LjIzbC0uMjQtLjI0YTYuNDgsNi40OCwwLDAsMC04LjIzLS43Myw3Miw3MiwwLDAsMC0xNi41OC0xMC40MWwtMy41LTMuNWEzNi45NCwzNi45NCwwLDAsMC01Mi4yNCwwbC0zLjUsMy41QTcyLDcyLDAsMCwwLDMzLjkzLDI0LjczYTYuNDYsNi40NiwwLDAsMC04LjIyLjczbC0uMTIuMTItLjEzLjEyYTYuNDgsNi40OCwwLDAsMC0uNzMsOC4yM0E3Miw3MiwwLDAsMCwxNC4zMiw1MC41MUwxMC44Miw1NGEzNi45NCwzNi45NCwwLDAsMCwwLDUyLjI0bDMuNSwzLjVhNzIsNzIsMCwwLDAsMTAuNDEsMTYuNTgsNi40Niw2LjQ2LDAsMCwwLC43Myw4LjIybC4xMy4xMi4xMi4xM2E2LjQ2LDYuNDYsMCwwLDAsOC4yMi43Myw3Miw3MiwwLDAsMCwxNi41OCwxMC40MWwzLjUsMy41YTM2Ljk0LDM2Ljk0LDAsMCwwLDUyLjI0LDBsMy41LTMuNWE3Miw3MiwwLDAsMCwxNi41OC0xMC40MSw2LjQ4LDYuNDgsMCwwLDAsOC4yMy0uNzNsLjEyLS4xMy4xMi0uMTJhNi40Niw2LjQ2LDAsMCwwLC43My04LjIyLDcyLDcyLDAsMCwwLDEwLjQxLTE2LjU4bDMuNS0zLjVhMzYuOTQsMzYuOTQsMCwwLDAsMC01Mi4yNFpNMTAuNjgsOTkuNzhhMzIuODEsMzIuODEsMCwwLDEsMC0zOS4zMSw3Mi4zNyw3Mi4zNywwLDAsMCwwLDM5LjMxWk04MC4xMyw0LjE0YTMyLjUzLDMyLjUzLDAsMCwxLDE5LjY2LDYuNTQsNzIuMzcsNzIuMzcsMCwwLDAtMzkuMzEsMEEzMi40OCwzMi40OCwwLDAsMSw4MC4xMyw0LjE0Wm0wLDE1MmEzMi40OCwzMi40OCwwLDAsMS0xOS42NS02LjU0LDcyLjM3LDcyLjM3LDAsMCwwLDM5LjMxLDBBMzIuNTMsMzIuNTMsMCwwLDEsODAuMTMsMTU2LjEyWm00My41NC00MS40M2E2LjU2LDYuNTYsMCwwLDAtNy43LDEuMThsLS4wOS4xYTYuNTMsNi41MywwLDAsMC0xLjE4LDcuNjksNTUuNDksNTUuNDksMCwwLDEtNjkuMTMsMEE2LjU2LDYuNTYsMCwwLDAsNDQuMzksMTE2bC0uMS0uMWE2LjU2LDYuNTYsMCwwLDAtNy42OS0xLjE4LDU1LjQ5LDU1LjQ5LDAsMCwxLDAtNjkuMTMsNi41Myw2LjUzLDAsMCwwLDcuNjktMS4xOGwuMS0uMDlhNi41Niw2LjU2LDAsMCwwLDEuMTgtNy43LDU1LjQ5LDU1LjQ5LDAsMCwxLDY5LjEzLDAsNi41Myw2LjUzLDAsMCwwLDEuMTgsNy43bC4wOS4wOWE2LjUzLDYuNTMsMCwwLDAsNy43LDEuMTgsNTUuNDksNTUuNDksMCwwLDEsMCw2OS4xM1ptMjUuOTEtNTQuMjJhMzIuODEsMzIuODEsMCwwLDEsMCwzOS4zMSw3Mi4zNyw3Mi4zNywwLDAsMCwwLTM5LjMxWiIvPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTExNC40Myw2OS4xMmMtNC0xNi45MS0xNy4wNS0yNy40Mi0zNC0yNy40M2gtMTljLTEuNiwwLTIuODQsMC0zLjguOTNzLTEsMi4yLTEsMy43OFY4OC4wNmMwLDguNzIsMCwxNy40NCwwLDI2LjE1YTQuNDQsNC40NCwwLDAsMCwxLjEyLDMuMjgsNC4zNiw0LjM2LDAsMCwwLDMuMjEsMS4wOGMyLjY5LDAsNS4zOCwwLDguMDcsMGg0LjFjMi44NywwLDUuNzgsMCw4LjY2LS4xMiwxMi44Mi0uNDMsMjIuNTMtNi4zOCwyOC44NC0xNy43QzExNS44Nyw5MS4yNywxMTcuMTcsODAuNjIsMTE0LjQzLDY5LjEyWk03MywxMDdINzAuMDljLS45MSwwLTEuODEsMC0yLjcxLDAsMC02Ljc4LDAtMTMuNjYsMC0yMC4zMVY3My41MnEwLTEwLjE0LDAtMjAuMjdjMi4yNywwLDQuNTUsMCw2Ljc3LDAsMS43NywwLDMuNTUsMCw1LjMyLDAsMTAuOTEuMTIsMTguNTcsNS40NiwyMi4xNCwxNS40NFMxMDQuMzYsODguMjksOTksOTYuODJjLTQsNi40Mi0xMC4wNiw5LjgyLTE4LDEwLjExQzc4LjM3LDEwNyw3NS42MiwxMDcsNzMsMTA3WiIvPjwvZz48L2c+PC9zdmc+' );
	// Load JS and CSS conditionally
	add_action( 'load-' . $plugin_page, 'dsh_load_admin_css_js' );
} );

/**
 * This function is only called when our plugin's page loads!
 */
function dsh_load_admin_css_js(){
	// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
	add_action( 'admin_enqueue_scripts', 'dsh_enqueue_admin_css_js' );
}

/**
 * Enqueue admin styles and scripts.
 */
function dsh_enqueue_admin_css_js(){
	wp_enqueue_style( 'dsh-style', plugin_dir_url( __FILE__ ) . 'css/styles.css' );
	wp_enqueue_script( 'dsh-html2canvas', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js', array(), false, true );
	wp_register_script( 'dsh-script', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array('jquery', 'dsh-html2canvas'), false, true );
	/* $jsObj = array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'dsh-script', 'dshObj', $jsObj ); */
	wp_enqueue_script( 'dsh-script' );
}

/**
 * Render admin page.
 */
function dsh_render_page(){
	/* ob_start();
	include( plugin_dir_path( __FILE__ ) . 'cache-counter.php' );
	$cache = ob_get_clean(); */
	?>
	<div class="dsh-wrap">
		<h2>Divi Support Helper Report</h2>
		<div id="dsh-report" class="dsh-report">
			<h3><strong>Website Report For:</strong> <span><?php bloginfo('name'); ?></span></h3>
			<table class="dsh-table">
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/website-url.png" alt=""></td>
					<td><strong>Website URL:</strong> <span><?php
					//echo $_SERVER['HTTP_HOST'];
					$website_url = esc_url( home_url( '/' ) );
					$remove_schemes = array( "https://", "http://" );
					$website_url = str_replace( $remove_schemes, "", rtrim($website_url, '/') );
					echo $website_url;
					?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/hosting-provider.png" alt=""></td>
					<td><strong>Hosting Provider:</strong> <span><?php include( plugin_dir_path( __FILE__ ) . 'hosting-provider.php' ); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/wordpress-version.png" alt=""></td>
					<td><strong>WordPress Version:</strong> <span><?php global $wp_version; echo $wp_version; ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/divi-version.png" alt=""></td>
					<td><strong>Divi Version:</strong> <span><?php
					$divi_theme = wp_get_theme( 'Divi' );
					if ( $divi_theme->exists() )
						echo $divi_theme->get( 'Version' );
					else
						echo 'Not installed';
					?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/child-theme.png" alt=""></td>
					<td><strong>Child Theme:</strong> <span><?php
					$current_theme = wp_get_theme();
					if ( ! empty( $current_theme->get( 'Template' ) ) )
						echo $current_theme;
					else
						echo 'None';
					?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/plugins.png" alt=""></td>
					<td><strong>Plugins:</strong> <span><?php
					$plugins = array();
					$all = get_plugins();
					$active = get_option('active_plugins');
					foreach( $all as $key => $value ){
						if( in_array( $key, $active ) ){
							$plugins[] = $value["Name"];
						}
					}
					echo implode( ", ", $plugins ); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/php-version.png" alt=""></td>
					<td><strong>PHP Version:</strong> <span><?php echo PHP_VERSION; ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/memory-limit.png" alt=""></td>
					<td><strong>Memory Limit:</strong> <span><?php echo get_php_memory_limit(); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/max-execution-time.png" alt=""></td>
					<td><strong>Max Execution Time:</strong> <span><?php echo get_php_max_execution(); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/max-input-time.png" alt=""></td>
					<td><strong>Max Input Time:</strong> <span><?php echo get_php_max_input_time(); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/page-load-time.png" alt=""></td>
					<td><strong>Homepage Load Speed:</strong> <span><?php include( plugin_dir_path( __FILE__ ) . 'page-load-time.php' ); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/security.png" alt=""></td>
					<td><strong>Security:</strong> <span><?php
					if ( is_ssl() )
						echo 'Connection Is Secure With HTTPS';
					else
						echo 'Connection Is Insecure';
					?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/caching-plugin.png" alt=""></td>
					<td><strong>Caching Plugin:</strong> <span><?php echo dsh_get_caching_system_used(); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/cache.png" alt=""></td>
					<td><strong>Cache:</strong> <span><?php include( plugin_dir_path( __FILE__ ) . 'cache-counter.php' ); ?></span></td>
				</tr>
				<tr>
					<td><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/date-and-time.png" alt=""></td>
					<td><strong>Date/Time:</strong> <span><?php echo current_time('F j, Y \a\t g:i A T'); ?></span></td>
				</tr>
			</table>
		</div>
		<button id="dsh-clipboard" class="dsh-button"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/copy-report.svg" alt=""> Copy Report</button>&nbsp;&nbsp;&nbsp;&nbsp;
		<button id="dsh-screenshot" class="dsh-button"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/download-image.svg" alt=""> Download Image</button>
	</div>
	<?php
}

/**
 * PHP Memory Limit.
 */
if(!function_exists('get_php_memory_limit')) {
	function get_php_memory_limit() {
		if(ini_get('memory_limit')) {
			$memory_limit = ini_get('memory_limit');
		} else {
			$memory_limit = 'N/A';
		}
		return $memory_limit;
	}
}

/**
 * PHP Maximum Execution Time.
 */
if(!function_exists('get_php_max_execution')) {
	function get_php_max_execution() {
		if(ini_get('max_execution_time')) {
			$max_execute = ini_get('max_execution_time') . 's';
		} else {
			$max_execute = 'N/A';
		}
		return $max_execute;
	}
}

/**
 * PHP Maximum Input Time.
 */
if(!function_exists('get_php_max_input_time')) {
	function get_php_max_input_time() {
		if(ini_get('max_input_time')) {
			$max_input_time = ini_get('max_input_time') . 's';
		} else {
			$max_input_time = 'N/A';
		}
		return $max_input_time;
	}
}

/**
 * Convert Size With Units.
 */
function dsh_format_size_units($bytes){
	if ($bytes >= 1073741824)
	{
		$bytes = number_format($bytes / 1073741824, 0) . 'gb';
	}
	elseif ($bytes >= 1048576)
	{
		$bytes = number_format($bytes / 1048576, 0) . 'mb';
	}
	elseif ($bytes >= 1024)
	{
		$bytes = number_format($bytes / 1024, 0) . 'kb';
	}
	elseif ($bytes > 1)
	{
		$bytes = $bytes . ' bytes';
	}
	elseif ($bytes == 1)
	{
		$bytes = $bytes . ' byte';
	}
	else
	{
		$bytes = '0 bytes';
	}

	return $bytes;
}

/**
 * Return the first caching system found.
 */
function dsh_get_caching_system_used(){
	$cache_system = '';
	if ( function_exists( 'w3tc_pgcache_flush' ) ) {
		$cache_system = 'W3 Total Cache';
	}
	else if ( function_exists( 'wp_cache_clean_cache' ) ) {
		$cache_system = 'WP Super Cache';
	}
	else if ( class_exists( 'WpeCommon' ) ) {
		$cache_system = 'WPEngine Cache';
	}
	else if ( method_exists( 'WpFastestCache', 'deleteCache' ) ) {
		$cache_system = 'WP Fastest Cache';
	}
	else if ( class_exists( '\WPaaS\Cache' ) ) {
		$cache_system = 'GoDaddy Cache';
	}
	else if ( class_exists( 'WP_Optimize' ) && defined( 'WPO_PLUGIN_MAIN_PATH' ) ) {
		$cache_system = 'WP Optimize';
	}
	else if ( class_exists( '\Kinsta\Cache' ) ) {
		$cache_system = 'Kinsta Cache';
	}
	else if ( class_exists( 'Breeze_Admin' ) ) {
		$cache_system = 'Breeze';
	}
	else if ( class_exists( 'LiteSpeed_Cache_Purge' ) ) {
		$cache_system = 'LiteSpeed Cache';
	}
	else if ( function_exists( 'sg_cachepress_purge_cache' ) ) {
		$cache_system = 'SiteGround SuperCacher';
	}
	else if ( class_exists( 'autoptimizeCache' ) ) {
		$cache_system = 'Autoptimize';
	}
	else if ( class_exists( 'Cache_Enabler' ) ) {
		$cache_system = 'Cache Enabler';
	}
	else {
		$cache_system = 'N/A';
	}
	return $cache_system;
}
