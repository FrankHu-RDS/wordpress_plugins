<?php
function lmp_jis_add_admin_assets() {

    wp_register_style(
        'jis-admin-styles',
        JIS_DIR_URI . 'assets/css/admin-styles.css',
        array('forms'),
        JIS_PLUGIN_VERSION,
        'all'
    );
    wp_enqueue_style('jis-admin-styles');

    wp_register_style(
        'jis-underscore-template-styles',
        JIS_DIR_URI . 'assets/css/underscore-templates.css',
        array('forms'),
        JIS_PLUGIN_VERSION,
        'all'
    );
    wp_enqueue_style('jis-underscore-template-styles');

    wp_register_script(
        'jis-app',
        JIS_DIR_URI . 'assets/js/app.js',
        array('jquery', 'wp-util'),
        JIS_PLUGIN_VERSION,
        true
    );
    wp_enqueue_script('jis-app');
    $account_info = lmp_jumpstory_account_info();
    wp_localize_script('jis-app', 'JIS_APP', [
        'logged_in' => $account_info['success'],
        'default_search_term' => JIS_API_DEFAULT_SEARCH_TERM,
        'ajaxurl' => admin_url('admin-ajax.php'),
    ]);

    if ( wp_script_is( 'et_pb_media_library' ) === true ) {
        wp_dequeue_script( 'et_pb_media_library' );
        wp_deregister_script( 'et_pb_media_library' );
        wp_enqueue_script( 'et_pb_media_library', ET_BUILDER_URI . '/scripts/ext/media-library.js', array(
            'media-editor',
            'jis-app'
        ), ET_BUILDER_PRODUCT_VERSION, true );
    }
}
add_action('wp_enqueue_media', 'lmp_jis_add_admin_assets', 9);
add_action('admin_enqueue_scripts', 'lmp_jis_add_admin_assets');