<?php

// menu
function ddpro_custom_menu_template( $archive_template ) {
    global $post;
    wp_reset_query();  // Restore global post data stomped by the_post()

    if (get_option('ddp_menu_template') === 'diana_1' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-menu1-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-menu1-styles.css');
        wp_enqueue_script('ddp-diana-menu1-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-menu.js');
    }

    if (get_option('ddp_menu_template') === 'diana_2' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-menu2-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-menu2-styles.css');
        wp_enqueue_script('ddp-diana-menu2-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-menu-2.js');
    }

    if (get_option('ddp_menu_template') === 'diana_3' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-menu3-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-menu3-styles.css');
        wp_enqueue_script('ddp-diana-menu3-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-menu-3.js');
    }

     if (strpos(get_option('ddp_menu_template'), 'custom') !== false && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-menu-styles.css');
        wp_enqueue_script('ddp-diana-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-menu-global.js');
    }

    if (get_option('ddp_menu_template') === 'diana_4' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-arch-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-arch.css');
        wp_enqueue_script('ddp-diana-arch-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuArch.js');
    }

     if (get_option('ddp_menu_template') === 'diana_5' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-first-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-first.css');
        wp_enqueue_script('ddp-diana-first-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuFirst.js');
    }

     if (get_option('ddp_menu_template') === 'diana_6' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-champion-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-champion.css');
        wp_enqueue_script('ddp-diana-champion-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuChampion.js');
    }

     if (get_option('ddp_menu_template') === 'diana_7' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-front-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-front.css');
        wp_enqueue_script('ddp-diana-front-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuFront.js');
    }

     if (get_option('ddp_menu_template') === 'diana_8' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-leading-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-leading.css');
        wp_enqueue_script('ddp-diana-leading-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuLeading.js');
    }
     if (get_option('ddp_menu_template') === 'diana_9' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-main-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-main.css');
        wp_enqueue_script('ddp-diana-main-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuMain.js');
    }
     if (get_option('ddp_menu_template') === 'diana_10' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-pioneer-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-pioneer.css');
        wp_enqueue_script('ddp-diana-pioneer-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuPioneer.js');
    }
     if (get_option('ddp_menu_template') === 'diana_11' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-primer-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-premier.css');
        wp_enqueue_script('ddp-diana-primer-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuPremier.js');
    }
     if (get_option('ddp_menu_template') === 'diana_12' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-prime-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-prime.css');
        wp_enqueue_script('ddp-diana-prime-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuPrime.js');
    }
     if (get_option('ddp_menu_template') === 'diana_13' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-principal-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-principal.css');
        wp_enqueue_script('ddp-diana-principal-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuPrincipal.js');
    }
     if (get_option('ddp_menu_template') === 'diana_14' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-diana-stellar-menu-css', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-nav-menu-stellar.css');
        wp_enqueue_script('ddp-diana-stellar-menu-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/dianaNavMenuStellar.js');
    }
    if (get_option('ddp_menu_template') === 'freddie_1' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-prize', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-prize-menu.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-prize-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptPrizeMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_2' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-attac-dragon', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-dragon-attack.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-attac-dragon-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptAttackDragonMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_3' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-earth', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-earth.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-earth-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptEarthMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_4' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-funny-how-love', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-funny-how-love.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-funny-how-love-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptFunnyHowLoveMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_5' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-hang-on-in-there', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-hang-on-in-there.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-hang-on-in-there-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptHangOnInThereMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_6' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-menu-lover-boy', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-menu-lover-boy.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-lover-boy-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptLoverBoyMenu.js');
    }

    if (get_option('ddp_menu_template') === 'freddie_7' && get_option('ddp_coming_soon_template') === 'disabled') {
        $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-menu.php';
        include($archive_template);
        wp_enqueue_style('ddp-freddie-hijack-my-heart', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-hijack-my-heart.css');

        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-menu-hijack-my-heart-jsocials-s', WP_PLUGIN_URL.'/ddpro/include/freddie/js/socials-freddie.js');
        wp_enqueue_script('ddp-freddie-menu-lover-boy-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieHijackMyHeart.js');
    }
}

add_action('wp_footer', 'ddpro_custom_menu_template');