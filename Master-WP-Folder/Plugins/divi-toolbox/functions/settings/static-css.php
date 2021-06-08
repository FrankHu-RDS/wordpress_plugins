<?php
require_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/static-css-generator.php');
function dtb_delete_static_css() {
    if(!function_exists( 'WP_Filesystem' )) {
        	return;
	}
	WP_filesystem();
	global $wp_filesystem;
    global $wpdb;
    $cached_files = $wp_filesystem->dirlist(DTB_TOOLBOX_PLUGIN_CACHE_DIR);
    foreach ($cached_files as $file) {
        if(explode('dtb-style', $file['name'])[0] == $wpdb->prefix && $file['type'] == 'f'){
            $wp_filesystem->delete(DTB_TOOLBOX_PLUGIN_CACHE_DIR.$file['name']);
        }
    }
}
function dtb_get_static_css_path() {
   if(!function_exists( 'WP_Filesystem' )) {
        	return;
	}
	WP_filesystem();
	global $wp_filesystem;
   global $wpdb;
	$static_css_path = false;
	if($wp_filesystem->exists(DTB_TOOLBOX_PLUGIN_CACHE_DIR)){
		$cached_files = $wp_filesystem->dirlist(DTB_TOOLBOX_PLUGIN_CACHE_DIR);
		foreach ($cached_files as $file) {
			if(explode('dtb-style', $file['name'])[0] == $wpdb->prefix && $file['type'] == 'f'){
				$static_css_path = DTB_TOOLBOX_PLUGIN_CACHE_URI.$file['name'];
				break;
			}
		}
	}
	return $static_css_path;
}
function dtb_enqueue_static_css() {
	wp_enqueue_style('dtb-static-css', dtb_get_static_css_path());
} 
function dtb_create_static_css() {
    include_once ABSPATH . 'wp-admin/includes/file.php';
    global $wp_filesystem;
    if(!$wp_filesystem->exists(DTB_TOOLBOX_PLUGIN_CACHE_DIR)){
        $wp_filesystem->mkdir(DTB_TOOLBOX_PLUGIN_CACHE_DIR);
    }
    if(!function_exists( 'WP_Filesystem' )) {
        return;
    }
    if(WP_Filesystem(false, DTB_TOOLBOX_PLUGIN_DIR)!='direct'){
        return;
    };
    dtb_delete_static_css();
    global $wpdb;
    $filename = $wpdb->prefix . 'dtb-style-'.rand(1000000,10000000).'.css';
    $wp_filesystem->put_contents(DTB_TOOLBOX_PLUGIN_CACHE_DIR.$filename, dtb_get_static_css(), FS_CHMOD_FILE);
}
function dtb_clear_cache() {
   if(!function_exists( 'WP_Filesystem' )) {
        	return;
	}
	WP_filesystem();
	global $wp_filesystem;
	if($wp_filesystem->exists(DTB_TOOLBOX_PLUGIN_CACHE_DIR)){
        $wp_filesystem->delete(DTB_TOOLBOX_PLUGIN_CACHE_DIR, true);
    }
}