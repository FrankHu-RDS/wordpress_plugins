<?php

function ddp_register_category_template_css() {
    if(is_category()) {
    if (get_option('ddp_category_page_template') === 'diana_1' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page.css');
        wp_enqueue_style('ddp-diana-category-sidebar-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-sidebar-page.css');
    }

    if (get_option('ddp_category_page_template') === 'diana_2' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page.css');
        wp_enqueue_style('ddp-diana-2columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page-2col.css');
    }

    if (get_option('ddp_category_page_template') === 'diana_3' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page.css');
        wp_enqueue_style('ddp-diana-3columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page-3col.css');
    }

    if (get_option('ddp_category_page_template') === 'diana_4' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page.css');
        wp_enqueue_style('ddp-diana-2columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-cat-page-4col.css');
    }
} // if(is_category())
}

add_action('wp_footer', 'ddp_register_category_template_css');
add_action('et_fb_enqueue_assets', 'ddp_register_category_template_css', 1);

function ddp_register_tag_template_css() {
    if (is_tag()) {
    if (get_option('ddp_tag_page_template') === 'diana_1'  || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page.css');
        wp_enqueue_style('ddp-diana-category-sidebar-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-sidebar-page.css');
    }

    if (get_option('ddp_tag_page_template') === 'diana_2' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page.css');
        wp_enqueue_style('ddp-diana-2columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page-2col.css');
    }

    if (get_option('ddp_tag_page_template') === 'diana_3' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page.css');
        wp_enqueue_style('ddp-diana-3columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page-3col.css');
    }

    if (get_option('ddp_tag_page_template') === 'diana_4' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page.css');
        wp_enqueue_style('ddp-diana-4columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-tag-page-4col.css');
    }
} //if (is_tag())
}

add_action('wp_footer', 'ddp_register_tag_template_css');
add_action('et_fb_enqueue_assets', 'ddp_register_tag_template_css', 1);

function ddp_register_author_template_css() {
    if (is_author()) {
    if (get_option('ddp_author_page_template') === 'diana_1'  || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1')) {
        wp_enqueue_style('ddp-diana-category-sidebar-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-sidebar.css');
    }

    if (get_option('ddp_author_page_template') === 'diana_2' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-cols.css');
        wp_enqueue_style('ddp-diana-2columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-col2.css');
    }

    if (get_option('ddp_author_page_template') === 'diana_3' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-cols.css');
        wp_enqueue_style('ddp-diana-3columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-col3.css');
    }

    if (get_option('ddp_author_page_template') === 'diana_4' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) {
        wp_enqueue_style('ddp-diana-columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-cols.css');
        wp_enqueue_style('ddp-diana-4columns-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-author-col4.css');
    }
} //if (is_author())
}

add_action('wp_footer', 'ddp_register_author_template_css');
add_action('et_fb_enqueue_assets', 'ddp_register_author_template_css', 1);


function ddp_register_search_results_template_css() {
    if (is_search() && get_option('ddp_search_results_page_template') === 'diana_1')  {
        wp_enqueue_style('ddp-search-results-page-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-search-page.css');
    }
}

add_action('wp_footer', 'ddp_register_search_results_template_css');
add_action('et_fb_enqueue_assets', 'ddp_register_search_results_template_css', 1);

// diana js
function ddp_register_diana_templates_js() {
    global $post;
    if (is_category()) {
        if(get_option('ddp_category_page_template') === 'diana_1' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1'))
            wp_enqueue_script('ddp-diana-category-sidebar-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaCatPageSidebar.js');

        if(get_option('ddp_category_page_template') === 'diana_2' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) wp_enqueue_script('ddp-diana-category-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaCatPage.js');

        if(get_option('ddp_category_page_template') === 'diana_3' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) wp_enqueue_script('ddp-diana-category-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaCatPage.js');

        if(get_option('ddp_category_page_template') === 'diana_4' || (get_option('ddp_category_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) wp_enqueue_script('ddp-diana-category-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaCatPage.js');
    }

    if (is_tag()) {
        if(get_option('ddp_tag_page_template') === 'diana_1' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1'))
            wp_enqueue_script('ddp-diana-tag-sidebar-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaTagPageSidebar.js');

        if(get_option('ddp_tag_page_template') === 'diana_2' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) wp_enqueue_script('ddp-diana-tag-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaTagPage.js');

        if(get_option('ddp_tag_page_template') === 'diana_3' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) wp_enqueue_script('ddp-diana-tag-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaTagPage.js');

        if(get_option('ddp_tag_page_template') === 'diana_4' || (get_option('ddp_tag_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) wp_enqueue_script('ddp-diana-tag-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaTagPage.js');
    }

    if (is_search() && strpos(get_option('ddp_search_results_page_template'), 'diana') !== false) {
        if(get_option('ddp_search_results_page_template') === 'diana_1'){
            wp_enqueue_script('ddp-diana-search-sidebar-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaSearchPage.js');
        }
    }

    if (is_author()) {
        if(get_option('ddp_author_page_template') === 'diana_1' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_1')) wp_enqueue_script('ddp-diana-author-sidebar-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaAuthorPageSidebar.js');

        if(get_option('ddp_author_page_template') === 'diana_2' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_2')) wp_enqueue_script('ddp-diana-author-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaAuthorPage.js');

        if(get_option('ddp_author_page_template') === 'diana_3' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_3')) wp_enqueue_script('ddp-diana-author-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaAuthorPage.js');

        if(get_option('ddp_author_page_template') === 'diana_4' || (get_option('ddp_author_page_template') === 'global' && get_option('ddp_global_page_template') === 'diana_4')) wp_enqueue_script('ddp-diana-author-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaAuthorPage.js');
    }

    if(is_404()) {
        if(get_option('ddp_404_page_template') === 'diana_3') {
            wp_enqueue_script('ddp-diana-404-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana404.js');
        }
    } // if(is_404())

    if(get_option('ddp_coming_soon_template') === 'diana_1' || get_option('ddp_coming_soon_template') === 'diana_2') {
            wp_enqueue_script('ddp-diana-coming-soon-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaComingSoon.js');
    }
}

add_action('wp_footer', 'ddp_register_diana_templates_js');
add_action('et_fb_enqueue_assets', 'ddp_register_diana_templates_js');


function ddpro_custom_archive_template( $archive_template ) {
    global $post;

// global category and tag

    if(get_option('ddp_global_page_template') !== 'disabled') {
         if (is_category() && get_option('ddp_category_page_template') === 'global' || is_tag() && get_option('ddp_tag_page_template') === 'global') {
             if(get_option('ddp_global_page_template') === 'diana_1'){
                $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-sidebar.php';
             }
             else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-columns.php';

             return $archive_template;
         }

     wp_reset_query();  // Restore global post data stomped by the_post().

     if(is_author() && get_option('ddp_author_page_template') === 'global') {
        if(get_option('ddp_global_page_template') === 'diana_1'){
                $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-author-sidebar.php';
             }
             else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-author-columns.php';

             return $archive_template;
         }

    }

// category
    if (is_category() && strpos(get_option('ddp_category_page_template'), 'diana') !== false) {
        //remove_filter('the_content', 'wpautop');
         if(get_option('ddp_category_page_template') === 'diana_1'){
            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-sidebar.php';
         }
         else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-columns.php';

         return $archive_template;
         }

     wp_reset_query();  // Restore global post data stomped by the_post().

// tag
    if (is_tag() && strpos(get_option('ddp_tag_page_template'), 'diana') !== false) {
        //remove_filter('the_content', 'wpautop');
         if(get_option('ddp_tag_page_template') === 'diana_1'){
            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-sidebar.php';
         }
         else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-archive-columns.php';

         return $archive_template;
         }

     wp_reset_query();  // Restore global post data stomped by the_post().

}

add_filter( 'archive_template', 'ddpro_custom_archive_template' ) ;

// search and author
function ddpro_custom_page_template( $archive_template ) {
    if (is_search() && strpos(get_option('ddp_search_results_page_template'), 'diana') !== false) {
        //remove_filter('the_content', 'wpautop');
         if(get_option('ddp_search_results_page_template') === 'diana_1'){
            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-search-sidebar.php';
         }
         else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-search-columns.php';

         return $archive_template;
    }

    if (is_author() && strpos(get_option('ddp_author_page_template'), 'diana') !== false) {
        //remove_filter('the_content', 'wpautop');
         if(get_option('ddp_author_page_template') === 'diana_1'){
            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-author-sidebar.php';
         }
         else $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-author-columns.php';

         return $archive_template;
    }

    return $archive_template;
}

add_filter('template_include','ddpro_custom_page_template');