<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * API KEY from https://www.who-hosts-this.com/APIKey.
 * Free API KEY allows 1000 requests per month with frequency 1 request per 10s.
 */
$key = "5796cacddd8f0c686462fd21a60196ca2f0a67740b98d3f10de85be5d2db57ad32668b";

require( plugin_dir_path( __FILE__ ) . 'lib/vendor/autoload.php' );
$detector = new \WhoHostsThis\WhoHostsThis($key);
//$check_url = $_SERVER['HTTP_HOST'];
$check_url = home_url( '/' );
$result = $detector->CheckUrl($check_url);
if( !empty( $result['results'][0]['isp_name'] ) ){
	echo $result['results'][0]['isp_name'];
} else {
	echo 'N/A';
}
