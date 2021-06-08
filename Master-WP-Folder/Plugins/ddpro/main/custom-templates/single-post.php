<?php


// Add single blog post template

function ddpro_custom_single_post_template( $template ) {
    if(get_option('ddp_single_post_template') !== 'disabled') {
        $template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-single-blog-post.php';
        wp_enqueue_style('ddp-diana-single-post-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-single-post.css');
        wp_enqueue_script('ddp-diana-single-post-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaSinglePost.js');
    }

    
    return $template;
}

add_filter( "single_template", "ddpro_custom_single_post_template" );
