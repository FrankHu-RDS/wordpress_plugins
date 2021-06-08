<?php // footers
function ddpro_footer_template($archive_template) {
    if(get_option('ddp_footer_template') !== 'disabled' && get_option('ddp_coming_soon_template') === 'disabled') {
        global $post;
        wp_reset_query();  // Restore global post data stomped by the_post()

            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-footer-template.php';
            include_once($archive_template);
    }

    $title = str_replace("&#8211;", "-", get_option('ddp_footer_custom')[get_option('ddp_footer_template')]);
    //echo ' $title '. $title;
    $footer_layouts = get_posts(array(
        'post_type'   => 'et_pb_layout',
        'post_status' => 'publish',
        'title' => $title,
        )
    );

    //print_r($footer_layout);

   if(!empty($footer_layouts)) {
    foreach ($footer_layouts as $footer_layout):
       $footer_id = $footer_layout->ID;
       $footer_title = $footer_layout->post_title;
      // echo ' $footer_id '.$footer_id;
       if(has_term("Coco Collection", 'layout_category', $footer_id )) {
        wp_enqueue_style('ddp-coco-footers', WP_PLUGIN_URL.'/ddpro/include/coco/css/coco-footers.css');
        wp_enqueue_script('ddp-coco-newsletter-js', WP_PLUGIN_URL.'/ddpro/include/coco/js/newsletter-coco.js');
       }

       if(has_term("Diana Collection", 'layout_category', $footer_id )) {
        wp_enqueue_style('ddp-diana-footers', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-footers.css');
        wp_enqueue_script('ddp-footers-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-footers.js');
       }

       if(has_term("Pegasus Bundle", 'layout_category', $footer_id )) {
        wp_enqueue_style('ddp-pegasus-footers', WP_PLUGIN_URL.'/ddpro/include/pegasus/css/pegasus-footers.css');
        wp_enqueue_script('ddp-pegasus-js', WP_PLUGIN_URL.'/ddpro/include/pegasus/js/pegasus_divi.js');
       }

       if(has_term("Pixie Bundle", 'layout_category', $footer_id )) {
         wp_enqueue_style('ddp-pixie-footer', WP_PLUGIN_URL.'/ddpro/include/pixie/css/pixie-footer.css');
         wp_enqueue_script('ddp-pixie-js', WP_PLUGIN_URL.'/ddpro/include/pixie/js/pixie_divi.js');
       }

       if(has_term("Unicorn Bundle", 'layout_category', $footer_id )) {
         wp_enqueue_style('ddp-unicorn-footer', WP_PLUGIN_URL.'/ddpro/include/unicorn/css/footer-unicorn-divi-layout-kit.css');
         wp_enqueue_script('ddp-unicorn-js', WP_PLUGIN_URL.'/ddpro/include/unicorn/js/unicorn_divi.js');
       }

       if(has_term("Falkor Bundle", 'layout_category', $footer_id )) {
         wp_enqueue_style('ddp-falkor-footer', WP_PLUGIN_URL.'/ddpro/include/falkor/css/falkor-footers.css');
         wp_enqueue_script('ddp-falkor-js', WP_PLUGIN_URL.'/ddpro/include/falkor/js/falkor_divi.js');
       }

       if(has_term("Freddie Collection", 'layout_category', $footer_id )) {
        wp_enqueue_style('ddp-freddie-footer', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-footers.css');
        wp_enqueue_script('ddp-freddie-gsap-jquery-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/jquery.gsap.min.js');
        wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/AttrPlugin.min.js');
        wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/CustomEase.min.js');
        wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/DrawSVGPlugin.min.js');
        wp_enqueue_script('ddp-freddie-gsap-split-text-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/SplitText.min.js');
        wp_enqueue_script('ddp-freddie-gsap-tween-max-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TweenMax.min.js');
        wp_enqueue_script('ddp-freddie-gsap-scroll-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/ScrollToPlugin.min.js');
        wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/MorphSVGPlugin.min.js');
        wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/gsap/TextPlugin.min.js');
        wp_enqueue_script('ddp-freddie-newsletter-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieNewsletter.js');
        wp_enqueue_script('ddp-freddie-footers-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddieScriptsFooters.js');

        wp_enqueue_style('ddp-freddie-button-party', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-buttons-party.css');
        wp_enqueue_script('ddp-freddie-button-party-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddie-button-party.js');

        wp_enqueue_style('ddp-freddie-button-ogre-battle', WP_PLUGIN_URL.'/ddpro/include/freddie/css/freddie-buttons-ogre-battle.css');
        wp_enqueue_script('ddp-freddie-button-ogre-battle-js', WP_PLUGIN_URL.'/ddpro/include/freddie/js/freddie-button-ogre-battle.js');
       }
    endforeach;
   }


} //function ddpro_pop_ups_template($archive_template)

add_action('wp_footer', 'ddpro_footer_template');