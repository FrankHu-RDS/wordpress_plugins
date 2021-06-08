<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $dsh_start, $dsh_elapsed, $dsh_max_time, $dsh_iterations;
$dsh_max_time = ini_get('max_execution_time') ? (float)(ini_get('max_execution_time') / 2) : (float)(30);
$dir = WP_CONTENT_DIR . '/cache';
$dsh_start = microtime(true);
//$dsh_elapsed = 0;
$dsh_iterations = 0;

function dsh_folder_size( $dir ){
	global $dsh_start, $dsh_elapsed, $dsh_max_time, $dsh_iterations;//usleep(100000);
	$dsh_iterations++;
	$size = 0;
	$dsh_elapsed = microtime(true) - $dsh_start;//echo $dsh_elapsed.'<br>';
	if ( $dsh_elapsed >= $dsh_max_time ) {
		return $size;
	}
	foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
		$size += is_file($each) ? filesize($each) : dsh_folder_size($each);
	}
	return $size;
}
if ( is_dir( $dir ) ) {//var_dump($dsh_max_time);
	$folder_size = dsh_format_size_units( dsh_folder_size( $dir ) );
	if ( $dsh_elapsed >= $dsh_max_time ){
		//echo $folder_size . "+" . " t$dsh_elapsed i$dsh_iterations";
		echo $folder_size . "+";
	} else {
		//echo $folder_size . " t". $dsh_elapsed . " i$dsh_iterations";
		echo $folder_size;
	}
} else {
	echo 'N/A';
}
