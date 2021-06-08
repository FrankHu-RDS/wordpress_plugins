<?php
function ddp_register_coming_soon_template_css() {
    if(get_option('ddp_coming_soon_template') === 'diana_1')  {
        wp_enqueue_style('ddp-diana1-coming-soon-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-coming-soon-page1.css');
    }

    if(get_option('ddp_coming_soon_template') === 'diana_2')  {
        wp_enqueue_style('ddp-diana2-coming-soon-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-coming-soon-page2.css');
    }

    for ($i = 1; $i < 10 ; $i++) {
        if (get_option('ddp_coming_soon_template') === 'ragnar_'.$i) {
            wp_enqueue_style('ddp-ragnar-coming-soon'.$i.'-css', WP_PLUGIN_URL.'/ddpro/include/ragnar/css/ragnar-coming-soon/ragnar-coming-soon-'.$i.'.css');
        }
    }
}

add_action('wp_footer', 'ddp_register_coming_soon_template_css');
add_action('et_fb_enqueue_assets', 'ddp_register_coming_soon_template_css', 1);


function ddp_coming_soon($archive_template ){
    global $post;
    $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-coming-soon-template.php';
    return $archive_template;
}
//add_filter( 'template_include', 'ddp_coming_soon' );

function ddp_coming_soon_main() {
if(get_option('ddp_coming_soon_template') !== 'disabled') {
    if(!current_user_can('edit_themes') || !is_user_logged_in() || is_customize_preview()) add_filter( 'template_include', 'ddp_coming_soon' );
    }
}


add_action('wp', 'ddp_coming_soon_main');