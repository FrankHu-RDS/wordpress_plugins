<?php
// scrollbar
function ddpro_scrollbar_template() {

	//echo "SCROLLBAR ".get_theme_mod('ddp_scrollbar', false);

    if (get_theme_mod('ddp_scrollbar', false) == 1 ) {

        // wp_enqueue_style('ddp-scrollbar-overlay-scrollbars-css', WP_PLUGIN_URL.'/ddpro/css/OverlayScrollbars.css');
        // wp_enqueue_script('ddp-scrollbar-overlay-scrollbars-js', WP_PLUGIN_URL.'/ddpro/js/jquery.overlayScrollbars.min.js');
        // wp_enqueue_script('ddp-scrollbar-js', WP_PLUGIN_URL.'/ddpro/js/ddp-scrollbar.js');
       
    
    } // if (get_theme_mod('ddp_scrollbar', false) == 1

} //function ddproscrollbar_template

add_action('wp_footer', 'ddpro_scrollbar_template');