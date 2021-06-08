<?php
if ( defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    global $wpdb;
    $wpdb->query($wpdb->prepare( 'DELETE FROM `{$wpdb->base_prefix}options` WHERE option_name LIKE %s', "%disable-ddpro%" ));
}