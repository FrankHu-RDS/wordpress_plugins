<?php
    function dtb_first_image($post) {
            
        $img = '';

        if ( empty( $post->ID ) ) {
            return $img;
        }

        $unprocessed_content = $post->post_content;

        if ( function_exists( 'et_strip_shortcodes' ) ) {
            $unprocessed_content = et_strip_shortcodes( $post->post_content, true );
        }

        $processed_content = apply_filters( 'the_content', $unprocessed_content );

        $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $processed_content, $matches );
        if ( isset( $matches[1][0] ) ) $img = $matches[1][0];

        return trim( $img );
    }
    function dtb_first_image_alt($post) {
            
        $alt = '';

        if ( empty( $post->ID ) ) {
            return $alt;
        }

        $unprocessed_content = $post->post_content;

        if ( function_exists( 'et_strip_shortcodes' ) ) {
            $unprocessed_content = et_strip_shortcodes( $post->post_content, true );
        }

        $processed_content = apply_filters( 'the_content', $unprocessed_content );

        $output = preg_match_all( '/<img.+alt=[\'"]([^\'"]+)[\'"].*>/i', $processed_content, $matches );
        if ( isset( $matches[1][0] ) ) $alt = $matches[1][0];

        return trim( $alt );
    }