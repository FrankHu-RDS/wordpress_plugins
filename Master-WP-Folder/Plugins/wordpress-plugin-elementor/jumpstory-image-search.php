<?php
/*
Plugin Name: JumpStory Image Search
Plugin URI: https://jumpstory.com/
Text Domain: jumpstory-image-search
Domain Path: /languages
Description: Adds image search functionality to various content builders.
Version: 1.0.0
Author: JumpStory
Author URI: https://jumpstory.com/customer-support/
License: WTFPL – http://www.wtfpl.net/about/
*/

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');

/* ------------------------
----- Functionalities -----
------------------------ */
require_once( plugin_dir_path( __FILE__ ) . 'config.php' );
require_once( JIS_DIR . 'inc/enqueue-assets.php' );
require_once( JIS_DIR . 'inc/register-settings.php' );
require_once( JIS_DIR . 'inc/helper-functions.php' );
require_once( JIS_DIR . 'inc/register-admin-pages.php' );
require_once( JIS_DIR . 'inc/api-response-checks.php' );
require_once( JIS_DIR . 'inc/api-credentials-and-key-handling.php' );
require_once( JIS_DIR . 'inc/api-account-and-media-handling.php' );
require_once( JIS_DIR . 'inc/view-search-filters.php' );
require_once( JIS_DIR . 'inc/view-search-results.php' );
require_once( JIS_DIR . 'inc/view-admin-menu-pages.php' );
require_once( JIS_DIR . 'inc/view-media-frame.php' );
require_once( JIS_DIR . 'inc/js-media-string-translations.php' );
require_once( JIS_DIR . 'inc/view-underscore-templates.php' );

/* ------------------------
------- Text Domain -------
------------------------ */
function lmp_load_jis_textdomain() {
    load_plugin_textdomain( 'jumpstory-image-search', false, JIS_DIR . 'languages/' );
}
add_action( 'plugins_loaded', 'lmp_load_jis_textdomain' );

require_once plugin_dir_path(__FILE__) . 'vendor/plugin-update-checker-4.10/plugin-update-checker.php';
Puc_v4_Factory::buildUpdateChecker(
    'https://universe.jumpstory.com/wp-content/uploads/plugins/image-search/manifest.json',
    __FILE__, //Full path to the main plugin file or functions.php.
    'jumpstory-image-search'
);