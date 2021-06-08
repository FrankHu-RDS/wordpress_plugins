<?php
function dtb_set_marker_icon($icon_url) {
	$dtb_custom_map_marker_image_url_val = dtb_get_option('dtb_custom_map_marker_image_url');
	$destination = get_template_directory() . '/includes/builder/images/marker.png';
	include_once ABSPATH . 'wp-admin/includes/file.php';
	if(!function_exists( 'WP_Filesystem' )) {
        	return;
	}
	WP_filesystem();
	global $wp_filesystem;
	if(!$wp_filesystem->exists($destination) || !$icon_url){
		return;
	}
	$wp_filesystem->delete($destination);
	$wp_filesystem->copy($icon_url, $destination);

}
function dtb_set_default_marker_icon() {
	$default_marker = DTB_TOOLBOX_PLUGIN_DIR . 'assets/img/dtb_marker.png';
	$destination = get_template_directory() . '/includes/builder/images/marker.png';
	include_once ABSPATH . 'wp-admin/includes/file.php';
	if(!function_exists( 'WP_Filesystem' )) {
        return;
	}
	WP_filesystem();
	global $wp_filesystem;
	if(!$wp_filesystem->exists($destination)){
		return;
	}
	$wp_filesystem->delete($destination);
	$wp_filesystem->copy($default_marker, $destination);
}