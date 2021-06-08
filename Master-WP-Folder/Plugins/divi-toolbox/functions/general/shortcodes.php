<?php

// Add shortcode
function dtb_showlayout_shortcode($atts) {
	$atts = shortcode_atts(array('id' => ''), $atts);
	return do_shortcode('[et_pb_section global_module="'.$atts['id'].'"][/et_pb_section]');	
}
add_shortcode('showlayout', 'dtb_showlayout_shortcode');
	
// Add shortcode to layouts list
function dtb_shortcode_column( $columns ) {
   $columns['dtb_layout_shortcode'] = 'Shortcode';
   return $columns;
}
add_filter( 'manage_et_pb_layout_posts_columns', 'dtb_shortcode_column', 5 );


function dtb_shortcode_column_content( $column, $id ) {
  if( 'dtb_layout_shortcode' == $column ) {
    echo '[showlayout id='.esc_attr($id).']';
  }
}
add_action( 'manage_et_pb_layout_posts_custom_column', 'dtb_shortcode_column_content', 5, 2 );