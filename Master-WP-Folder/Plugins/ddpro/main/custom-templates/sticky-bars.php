<?php // sticky bars
function ddpro_sticky_bars_template($archive_template) {
    global $post;
    wp_reset_query();  // Restore global post data stomped by the_post()

    if (strpos(get_option('ddp_sticky_bar_template'), 'diana') !== false && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-sticky-bars.php';
        include($archive_template);

        wp_enqueue_script('ddp-diana-sticky-bars-cookies-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-jquery.cookie.js');

        wp_enqueue_script('ddp-diana-sticky-bars-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaStickyHeaders.js');
        $ddp_dataToBePassed = array(
            'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
            'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
            'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
            'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
            'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
            'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
            'ddp_pop_template'  => get_option('ddp_pop_up_template'),
            'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
            'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
            'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
            'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
            'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
        );
        wp_localize_script( 'ddp-diana-sticky-bars-js', 'ddp_php_vars', $ddp_dataToBePassed);

        wp_enqueue_style('ddp-diana-sticky-bar-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-sticky-header.css');

        $diana_sticky_template = get_option('ddp_sticky_bar_template');
        $diana_sticky_template_number = str_replace("diana_", "", $diana_sticky_template);

        wp_enqueue_style('ddp-diana-sticky-bar'.$diana_sticky_template_number.'-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-sticky-header'.$diana_sticky_template_number.'.css');

    } //if (strpos(get_option('ddp_sticky_bar_template'), 'diana') !== false && get_option('ddp_coming_soon_template') === 'disabled') 
    if (strpos(get_option('ddp_sticky_bar_template'), 'custom') !== false && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-sticky-bars.php';
        include($archive_template);

        wp_enqueue_script('ddp-diana-sticky-bars-cookies-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-jquery.cookie.js');

        wp_enqueue_script('ddp-diana-sticky-bars-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaStickyHeaders.js');
        $ddp_dataToBePassed = array(
            'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
            'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
            'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
            'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
            'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
            'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
            'ddp_pop_template'  => get_option('ddp_pop_up_template'),
            'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
            'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
            'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
            'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
            'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
        );
        wp_localize_script( 'ddp-diana-sticky-bars-js', 'ddp_php_vars', $ddp_dataToBePassed);

        wp_enqueue_style('ddp-diana-sticky-bar-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-sticky-header.css');
    }
} //function ddpro_sticky_bars_template($archive_template)

add_action('wp_footer', 'ddpro_sticky_bars_template');