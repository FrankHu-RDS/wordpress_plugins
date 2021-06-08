<?php


function dtb_register_post_type_args($args, $post_type) {
		
	if ('project' !== $post_type) {
		return $args;
	}
	
	$dtb_projects_singular_val = dtb_get_option('dtb_projects_singular');
	$dtb_projects_plural_val = dtb_get_option('dtb_projects_plural');
	$dtb_projects_slug_val = dtb_get_option('dtb_projects_slug');
	$dtb_projects_icon_val = dtb_get_option('dtb_projects_icon');

	$args['labels']['name'] = $dtb_projects_plural_val;
	$args['labels']['singular_name'] = $dtb_projects_singular_val;
	$args['labels']['menu_name'] = $dtb_projects_plural_val;
	$args['labels']['name_admin_bar'] = $dtb_projects_singular_val;
	$args['labels']['add_new_item'] = 'Add New ' . $dtb_projects_singular_val;
	$args['labels']['edit_item'] = 'Edit ' . $dtb_projects_singular_val;
	$args['labels']['view_item'] = 'View ' . $dtb_projects_singular_val;
	$args['labels']['search_items'] = 'Search ' . $dtb_projects_plural_val;
	$args['labels']['all_items'] = 'All ' . $dtb_projects_plural_val;
	$args['menu_icon'] = $dtb_projects_icon_val;
	$args['rewrite']['slug'] = $dtb_projects_slug_val;

	flush_rewrite_rules();

	return $args;
}
add_filter('register_post_type_args', 'dtb_register_post_type_args', 10, 2);

function dtb_register_taxonomy_args($args, $taxonomy, $object_type){
	
	$dtb_projects_singular_val = dtb_get_option('dtb_projects_singular');
	$dtb_projects_plural_val = dtb_get_option('dtb_projects_plural');
	$dtb_project_category_slug_val = dtb_get_option('dtb_project_category_slug');
	$dtb_project_tag_slug_val = dtb_get_option('dtb_project_tag_slug');

	if ('project_category' == $taxonomy) {
		$args['labels']['name'] = $dtb_projects_plural_val . ' Categories';
		$args['labels']['singular_name'] = $dtb_projects_singular_val . ' Category';
		$args['rewrite']['slug'] = $dtb_project_category_slug_val;
	}

	if ('project_tag' == $taxonomy) {
		$args['labels']['name'] = $dtb_projects_plural_val . ' Tags';
		$args['labels']['singular_name'] = $dtb_projects_singular_val . ' Tag';
		$args['rewrite']['slug'] = $dtb_project_tag_slug_val;
	}

	return $args;
}
add_filter('register_taxonomy_args', 'dtb_register_taxonomy_args', 10, 3);