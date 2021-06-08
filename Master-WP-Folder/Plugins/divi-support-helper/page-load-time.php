<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$limit = 10;
$ctx = stream_context_create(array('http'=>
	array(
		'timeout' => $limit
	)
));

$start = microtime(true);
$homepage_content = @file_get_contents( home_url( '/' ), false, $ctx );
$timeout = microtime(true) - $start;
unset($homepage_content);

if ( $timeout > $limit ) {
	echo $limit . 's+';
} else {
	echo number_format($timeout, 1) . 's';
}
