<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



function lmp_jis_register_search_menu() {

	add_menu_page(
		__('JumpStory search', 'jumpstory-image-search'),
		__('JumpStory', 'jumpstory-image-search'),
		'upload_files',
		'jumpstory-search',
		'lmp_jis_search_page_view',
		'dashicons-images-alt2',
		12
	);
}

add_action('admin_menu', 'lmp_jis_register_search_menu');

?>