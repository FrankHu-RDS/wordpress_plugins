<?php

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) )
	exit('Direct file access is not allowed.');



if( !defined('JIS_PLUGIN_VERSION') )
    define( 'JIS_PLUGIN_VERSION', '0.1.0' );

if( !defined('JIS_DIR') )
    define( 'JIS_DIR', plugin_dir_path( __FILE__ ) );

if( !defined('JIS_DIR_URI') )
    define( 'JIS_DIR_URI', plugin_dir_url( __FILE__ ) );

if( !defined('JIS_API_PROTOCOL') )
	define( 'JIS_API_PROTOCOL', 'https://' );

if( !defined('JIS_API_BASE_URL') )
	define( 'JIS_API_BASE_URL', 'wp-plugin.jumpstory-api.com' );

if( !defined('JIS_API_AUTH_URL') )
	define('JIS_API_AUTH_URL', 'universe.jumpstory.com/wp-json/integrations');

if( !defined('JIS_API_AUTH_HEADER') )
	define('JIS_API_AUTH_HEADER', 'Bearer '); // Space required.

if( !defined('JIS_API_VERSION') )
	define( 'JIS_API_VERSION', 'v1' );

if( !defined('JIS_API_DEFAULT_SEARCH_TERM') )
	define('JIS_API_DEFAULT_SEARCH_TERM', 'Landscapes of mountains');

if( !defined('JIS_CREATE_ACCOUNT_URL') )
	define( 'JIS_CREATE_ACCOUNT_URL', 'https://universe.jumpstory.com/get-started/' );

if( !defined('JIS_CREATE_KEY_URL') )
	define( 'JIS_CREATE_KEY_URL', 'https://universe.jumpstory.com/my-account/integrations/' );


function lmp_api_filters() {

		$type_options = array(
			'photos' => array(
				'label' => __('Photos', 'jumpstory-image-search'),
				'value' => 'photos'
			),
			'videos' => array(
				'label' => __('Videos', 'jumpstory-image-search'),
				'value' => 'videos'
			),
			'illustrations' => array(
				'label' => __('Illustrations', 'jumpstory-image-search'),
				'value' => 'illustrations'
			),
			'vectors' => array(
				'label' => __('Vectors', 'jumpstory-image-search'),
				'value' => 'vectors'
			),
			'icons' => array(
				'label' => __('Icons', 'jumpstory-image-search'),
				'value' => 'icons'
			)
		);

		$color_options = array(
			'all' => array(
				'label' => __('All', 'jumpstory-image-search'),
				'value' => 'all'
			),
			'red' => array(
				'label' => __('Red', 'jumpstory-image-search'),
				'value' => 'red'
			),
			'orange' => array(
				'label' => __('Orange', 'jumpstory-image-search'),
				'value' => 'orange'
			),
			'yellow' => array(
				'label' => __('Yellow', 'jumpstory-image-search'),
				'value' => 'yellow'
			),
			'green' => array(
				'label' => __('Green', 'jumpstory-image-search'),
				'value' => 'green'
			),
			'turqouise' => array(
				'label' => __('Turqouise', 'jumpstory-image-search'),
				'value' => 'turqouise'
			),
			'blue' => array(
				'label' => __('Blue', 'jumpstory-image-search'),
				'value' => 'blue'
			),
			'purple' => array(
				'label' => __('Purple', 'jumpstory-image-search'),
				'value' => 'purple'
			),
			'pink' => array(
				'label' => __('Pink', 'jumpstory-image-search'),
				'value' => 'pink'
			),
			'white' => array(
				'label' => __('White', 'jumpstory-image-search'),
				'value' => 'white'
			),
			'grey' => array(
				'label' => __('Grey', 'jumpstory-image-search'),
				'value' => 'grey'
			),
			'brown' => array(
				'label' => __('Brown', 'jumpstory-image-search'),
				'value' => 'brown'
			),
			'beige' => array(
				'label' => __('Beige', 'jumpstory-image-search'),
				'value' => 'beige'
			),
			'black' => array(
				'label' => __('Black', 'jumpstory-image-search'),
				'value' => 'black'
			),
			'greyscale' => array(
				'label' => __('Greyscale', 'jumpstory-image-search'),
				'value' => 'greyscale'
			)
		);

		$orientation_options = array(
			 'all' => array(
 				'label' => __('All', 'jumpstory-image-search'),
 				'value' => 'all'
 			),
			 'vertical' => array(
 				'label' => __('Vertical', 'jumpstory-image-search'),
 				'value' => 'vertical'
 			),
			 'horizontal' => array(
 				'label' => __('Horizontal', 'jumpstory-image-search'),
 				'value' => 'horizontal'
 			),
			 'square' => array(
 				'label' => __('Square', 'jumpstory-image-search'),
 				'value' => 'square'
 			)
		);

		$people_options = array(
			'all' => array(
				'label' => __('All', 'jumpstory-image-search'),
				'value' => 'all'
			),
			'with' => array(
				'label' => __('With people', 'jumpstory-image-search'),
				'value' => 'with'
			),
			'without' => array(
				'label' => __('Without people', 'jumpstory-image-search'),
				'value' => 'without'
			)
		);

		$safe_options = array(
			'off' => array(
				'label' => __('Off', 'jumpstory-image-search'),
				'value' => 'off'
			),
			'on' => array(
				'label' => __('On', 'jumpstory-image-search'),
				'value' => 'on'
			)
		);

		$region_options = array(
			'all' => array(
				'label' => __('All', 'jumpstory-image-search'),
				'value' => 'all'
			),
			'africa' => array(
				'label' => __('Africa', 'jumpstory-image-search'),
				'value' => 'africa'
			),
			'asia' => array(
				'label' => __('Asia', 'jumpstory-image-search'),
				'value' => 'asia'
			),
			'caribbean' => array(
				'label' => __('Caribbean', 'jumpstory-image-search'),
				'value' => 'caribbean'
			),
			'central_america' => array(
				'label' => __('Central America', 'jumpstory-image-search'),
				'value' => 'central_america'
			),
			'eastern_europe' => array(
				'label' => __('Eastern Europe', 'jumpstory-image-search'),
				'value' => 'eastern_europe'
			),
			'middle_east' => array(
				'label' => __('Middle East', 'jumpstory-image-search'),
				'value' => 'middle_east'
			),
			'north_america' => array(
				'label' => __('North America', 'jumpstory-image-search'),
				'value' => 'north_america'
			),
			'oceania' => array(
				'label' => __('Oceania', 'jumpstory-image-search'),
				'value' => 'oceania'
			),
			'south_america' => array(
				'label' => __('South America', 'jumpstory-image-search'),
				'value' => 'south_america'
			),
			'western_europe' => array(
				'label' => __('Western Europe', 'jumpstory-image-search'),
				'value' => 'western_europe'
			)
		);

		$orderby_options = array(
			'relevance' => array(
				'label' => __('Relevance', 'jumpstory-image-search'),
				'value' => 'relevance'
			),
			'created_at' => array(
				'label' => __('Fresh content', 'jumpstory-image-search'),
				'value' => 'created_at'
			)
		);



		$filters = array(
			'type' => array(
				'parameter'		=> 'type',
				'title'			=> __('Type of asset', 'jumpstory-image-search'),
				'options'		=> $type_options,
				'cardinality'	=> 'single', // single or multiple
				'default'		=> 'photos'
			),
			'order_by' => array(
				'parameter'		=> 'order_by',
				'title'			=> __('Sort by', 'jumpstory-image-search'),
				'options'		=> $orderby_options,
				'cardinality'	=> 'single',
				'default'		=> 'relevance'
			),
			'region' => array(
				'parameter'		=> 'region',
				'title'			=> __('Location', 'jumpstory-image-search'),
				'options'		=> $region_options,
				'cardinality'	=> 'single',
				'default'		=> 'all'
			),
			'orientation' => array(
				'parameter'		=> 'orientation',
				'title'			=> __('Orientation', 'jumpstory-image-search'),
				'options'		=> $orientation_options,
				'cardinality'	=> 'single',
				'default'		=> 'all'
			),
			'color' => array(
				'parameter'		=> 'color',
				'title'			=> __('Color', 'jumpstory-image-search'),
				'options'		=> $color_options,
				'cardinality'	=> 'single',
				'default'		=> 'all'
			),
			'people' => array(
				'parameter'		=> 'people',
				'title'			=> __('People', 'jumpstory-image-search'),
				'options'		=> $people_options,
				'cardinality'	=> 'single',
				'default'		=> 'all'
			),
			'safesearch' => array(
				'parameter'		=> 'safesearch',
				'title'			=> __('Safe search', 'jumpstory-image-search'),
				'options'		=> $safe_options,
				'cardinality'	=> 'single',
				'default'		=> 'off' // Get from settings
			)
		);

		return $filters;
}
?>