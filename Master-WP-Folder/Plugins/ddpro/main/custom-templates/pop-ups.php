<?php
// pop ups
function ddpro_pop_ups_template($archive_template) {
    global $post;
    wp_reset_query();  // Restore global post data stomped by the_post()

    if (get_option('ddp_pop_up_template') === 'disabled' && get_theme_mod('ddp_pop_up_disable_clicks', true) == 1 ) { }
    else {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-pop-ups.php';
        include_once($archive_template);

        wp_enqueue_script('ddp-diana-cookies-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-jquery.cookie.js');

        wp_enqueue_script('ddp-diana-pop-up-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaPopups.js');
        $ddp_dataToBePassed = array(
            'ddp_pop_template'  => get_option('ddp_pop_up_template'),
            'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
            'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
            'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
            'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
            'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
            'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
            'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
            'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
            'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
            'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
            'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
        );
        wp_localize_script( 'ddp-diana-pop-up-js', 'ddp_php_vars', $ddp_dataToBePassed);

        if(!get_theme_mod('ddp_pop_up_disable_clicks', true)) { // on click is enabled

            wp_enqueue_style('ddp-diana-pop-up-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups.css');

           if(ddp_is_divi_item_exists('Kingly Form Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up6-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups6.css');

           if(ddp_is_divi_item_exists('Renowned Pricing Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up8-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups8.css');

           if(ddp_is_divi_item_exists('Great Portfolio Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up7-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups7.css');

            if(ddp_is_divi_item_exists('Striking Search Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up5-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups5.css');

            if(ddp_is_divi_item_exists('Prominent Search Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up4-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups4.css');

            if(ddp_is_divi_item_exists('Special Search Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up3-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups3.css');

            if(ddp_is_divi_item_exists('Salient Search Pop-Up - PHP Templ - Diana')) wp_enqueue_style('ddp-diana-pop-up2-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups2.css');

            for ($i = 1; $i < 18 ; $i++) {
                if(ddp_is_divi_item_exists('Pop-Up V'.$i.' - PHP Templ - Ragnar')) {
                    wp_enqueue_script('ddp-ragnar-pop-up'.$i.'-js', WP_PLUGIN_URL.'/ddpro/include/ragnar/js/ragnar-popups/ragnarPopupsV'.$i.'.js');
                    wp_enqueue_style('ddp-ragnar-pop-up'.$i.'-css', WP_PLUGIN_URL.'/ddpro/include/ragnar/css/ragnar-popups/ragnar-popups-v'.$i.'.css');
                }

            }
        }
        else {
            wp_enqueue_style('ddp-diana-pop-up-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups.css');

            if (get_option('ddp_pop_up_template') === 'diana_1') wp_enqueue_style('ddp-diana-pop-up6-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups6.css');
            if (get_option('ddp_pop_up_template') === 'diana_2') wp_enqueue_style('ddp-diana-pop-up8-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups8.css');
            if (get_option('ddp_pop_up_template') === 'diana_3') wp_enqueue_style('ddp-diana-pop-up7-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups7.css');
            if (get_option('ddp_pop_up_template') === 'diana_4') wp_enqueue_style('ddp-diana-pop-up5-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups5.css');
            if (get_option('ddp_pop_up_template') === 'diana_5') wp_enqueue_style('ddp-diana-pop-up4-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups4.css');
            if (get_option('ddp_pop_up_template') === 'diana_6') wp_enqueue_style('ddp-diana-pop-up3-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups3.css');
            if (get_option('ddp_pop_up_template') === 'diana_7') wp_enqueue_style('ddp-diana-pop-up2-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-overlays-popups2.css');

            for ($i = 1; $i < 18 ; $i++) {
                if (get_option('ddp_pop_up_template') === 'ragnar_'.$i) {
                    wp_enqueue_script('ddp-ragnar-pop-up'.$i.'-js', WP_PLUGIN_URL.'/ddpro/include/ragnar/js/ragnar-popups/ragnarPopupsV'.$i.'.js');
                    wp_enqueue_style('ddp-ragnar-pop-up'.$i.'-css', WP_PLUGIN_URL.'/ddpro/include/ragnar/css/ragnar-popups/ragnar-popups-v'.$i.'.css');
                }
            }

        }


   } //else
} //function ddpro_pop_ups_template($archive_template)

add_action('wp_footer', 'ddpro_pop_ups_template');