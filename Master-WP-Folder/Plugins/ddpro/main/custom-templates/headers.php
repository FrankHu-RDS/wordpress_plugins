<?php 
// headers
function ddpro_header_template($archive_template) {
   // echo "get_option('ddp_header_template') ".get_option('ddp_header_template');
    if(get_option('ddp_header_template') !== 'disabled' && get_option('ddp_coming_soon_template') === 'disabled') {
        global $post;
        wp_reset_query();  // Restore global post data stomped by the_post()

            $archive_template = WP_PLUGIN_DIR.'/ddpro/include/diana/templates/diana-header-template.php';
            include_once($archive_template);
    }

    $title = str_replace("&#8211;", "-", get_option('ddp_header_custom')[get_option('ddp_header_template')]);
    //echo ' $title '. $title;
    $header_layouts = get_posts(array(
        'post_type'   => 'et_pb_layout',
        'post_status' => 'publish',
        'title' => $title,
        )
    );

    //print_r($header_layout);

   if(!empty($header_layouts)) {
    foreach ($header_layouts as $header_layout):
       $header_id = $header_layout->ID;
       $header_title = $header_layout->post_title;
      // echo ' $header_id '.$header_id;
       if(has_term("Diana Collection", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-diana-headers', WP_PLUGIN_URL.'/ddpro/include/diana/css/diana-headers.css');
        wp_enqueue_script('ddp-sliders-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-sliders.js');
        wp_enqueue_script('ddp-social-icons-js', WP_PLUGIN_URL.'/ddpro/include/diana/js/diana-social-icons.js');
       }

       if(has_term("Impi Collection", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-impi-headers', WP_PLUGIN_URL.'/ddpro/include/impi/css/impi-headers.css');
       }

       if(has_term("Coco Collection", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-coco-headers', WP_PLUGIN_URL.'/ddpro/include/coco/css/coco-headers.css');
        wp_enqueue_style('ddp-coco-sliders', WP_PLUGIN_URL.'/ddpro/include/coco/css/coco-sliders.css');
        wp_enqueue_script('ddp-coco-sliders-js', WP_PLUGIN_URL.'/ddpro/include/coco/js/sliders-coco.js');
        wp_enqueue_script('ddp-coco-socials-js', WP_PLUGIN_URL.'/ddpro/include/coco/js/socials-coco.js');
       }

       if(has_term("Sigmund Collection", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-sigmund-header', WP_PLUGIN_URL.'/ddpro/include/sigmund/css/headers-sigmund.css');
        wp_enqueue_style('ddp-sigmund-contact-pages', WP_PLUGIN_URL.'/ddpro/include/sigmund/css/contact_pages_sigmund.css');
        wp_enqueue_script('ddp-sigmund-typed-js', WP_PLUGIN_URL.'/ddpro/include/sigmund/js/typed-sigmund.js');
        wp_enqueue_script('ddp-sigmund-typing-js', WP_PLUGIN_URL.'/ddpro/include/sigmund/js/typing-sigmund.js');
        wp_enqueue_script('ddp-sigmund-service-page1-js', WP_PLUGIN_URL.'/ddpro/include/sigmund/js/sigmund-services-1.js');
       }

       if(has_term("Venus Bundle", 'layout_category', $header_id )) {
         wp_enqueue_style('ddp-venus-header', WP_PLUGIN_URL.'/ddpro/include/venus/css/header-venus.css');
         wp_enqueue_style('ddp-venus-features', WP_PLUGIN_URL.'/ddpro/include/venus/css/features-venus.css');
         wp_enqueue_script('ddp-venus-charming-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/charming.min.js');
         wp_enqueue_script('ddp-venus-hoverdir-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/jquery.hoverdir.js');
         wp_enqueue_script('ddp-venus-inview-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/jquery.inview.js');
         wp_enqueue_script('ddp-venus-masonry-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/masonry.pkgd.min.js');
         wp_enqueue_script('ddp-venus-nearby-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/nearby.js');
         wp_enqueue_script('ddp-venus-tweenmax-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/TweenMax.min.js');
         wp_enqueue_script('ddp-venus-header-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/venus-header.js');
         wp_enqueue_script('ddp-venus-features-js', WP_PLUGIN_URL.'/ddpro/include/venus/js/venus-features.js');
       }

       if(has_term("Pegasus Bundle", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-pegasus-headers', WP_PLUGIN_URL.'/ddpro/include/pegasus/css/pegasus-headers.css');
        wp_enqueue_script('ddp-pegasus-hoverdir-js', WP_PLUGIN_URL.'/ddpro/include/pegasus/js/jquery.hoverdir.js');
        wp_enqueue_script('ddp-pegasus-inview-js', WP_PLUGIN_URL.'/ddpro/include/pegasus/js/jquery.inview.js');
        wp_enqueue_script('ddp-pegasus-masonry-js', WP_PLUGIN_URL.'/ddpro/include/pegasus/js/masonry.pkgd.min.js');
        wp_enqueue_script('ddp-pegasus-js', WP_PLUGIN_URL.'/ddpro/include/pegasus/js/pegasus_divi.js');
       }

       if(has_term("Falkor Bundle", 'layout_category', $header_id )) {
        wp_enqueue_style('ddp-falkor-headers', WP_PLUGIN_URL.'/ddpro/include/falkor/css/falkor-headers.css');
        wp_enqueue_script('ddp-falkor-js', WP_PLUGIN_URL.'/ddpro/include/falkor/js/falkor_divi.js');
       }

       if(has_term("Pixie Bundle", 'layout_category', $header_id )) {
         wp_enqueue_style('ddp-pixie-header', WP_PLUGIN_URL.'/ddpro/include/pixie/css/pixie-headers.css');
         wp_enqueue_script('ddp-pixie-js', WP_PLUGIN_URL.'/ddpro/include/pixie/js/pixie_divi.js');
       }

       if(has_term("Unicorn Bundle", 'layout_category', $header_id )) {
         wp_enqueue_style('ddp-unicorn-header', WP_PLUGIN_URL.'/ddpro/include/unicorn/css/header-unicorn-divi-layout-kit.css');
         wp_enqueue_script('ddp-unicorn-js', WP_PLUGIN_URL.'/ddpro/include/unicorn/js/unicorn_divi.js');
       }
    endforeach;
   }


} //function ddpro_pop_ups_template($archive_template)

add_action('wp_footer', 'ddpro_header_template');