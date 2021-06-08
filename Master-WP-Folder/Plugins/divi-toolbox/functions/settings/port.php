<?php
$dtb_import_messages;
$dtb_import_messages = array(
    array(
        'Filed to import settings.',
        'This file is not a correct Toolbox export file. Please upload a JSON file.'
    ),
    array(
        'Settings imported successfully.'
    )
);

function set_import_fail_msg(){
    wp_safe_redirect( admin_url( 'admin.php?page=divi_toolbox&tab=settings' ) . '&import_success=0&import_msg=0' ); exit;

}
function dtb_import_admin_notice__success() {
    global $dtb_import_messages;
    ?>
    <?php if ( isset( $_GET['import_success'], $_GET['import_msg'] ) && '1' === $_GET['import_success'] && ! wp_verify_nonce( sanitize_key( $_GET['import_success'] ), 'import_success' ) ) : ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo esc_html( sanitize_text_field( wp_unslash( $dtb_import_messages[$_GET['import_success']][$_GET['import_msg']] ) ) ); ?></p>
        </div>
    <?php endif;
}
function dtb_import_admin_notice__fail() {
    global $dtb_import_messages
    ?>
    <?php if ( isset( $_GET['import_success'], $_GET['import_msg'] ) && '0' === $_GET['import_success'] && ! wp_verify_nonce( sanitize_key( $_GET['import_success'] ), 'import_success' ) ) : ?>
        <div class="notice notice-error is-dismissible">
            <p><?php echo esc_html( sanitize_text_field( wp_unslash( $dtb_import_messages[$_GET['import_success']][$_GET['import_msg']] ) ) ); ?></p>
        </div>
    <?php endif;
}

function dtb_import_notifications() {
    if (isset($_GET['import_success']) && $_GET['import_success'] == 1 && ! wp_verify_nonce( sanitize_key( $_GET['import_success'] ),'import_success' )) {
        add_action( 'admin_notices', 'dtb_import_admin_notice__success' );
    }
    else if (isset($_GET['import_success']) && $_GET['import_success'] == 0 && ! wp_verify_nonce( sanitize_key( $_GET['import_success'] ),'import_success' )) {
        add_action( 'admin_notices', 'dtb_import_admin_notice__fail' );
    }
}
function dtb_import_settings() {
    if ( !isset($_POST['dtb_subform_type']) || 'settings_import' != $_POST['dtb_subform_type']){
        return;
    }
    if ( empty( $_POST['dtb_import_settings_action'] ) || 'dtb_import_settings' != $_POST['dtb_import_settings_action'] ){
        return;
    }
    if ( isset( $_POST['dtb_import_settings_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['dtb_import_settings_nonce'], 'dtb_import_settings_nonce' ) ) ) {
        return;
    }
    if( ! current_user_can( 'manage_options' ) ){
        return;
    }
    if ( ! empty( $_FILES['import_file']['name'] ) ) {

        $extension = explode( '.', sanitize_text_field( wp_unslash( $_FILES['import_file']['name'] ) ) );
        $extension = end( $extension );
        if( $extension != 'json' && isset($_SERVER["HTTP_REFERER"]) ) {
            wp_safe_redirect( admin_url( 'admin.php?page=divi_toolbox&tab=settings' ) . '&import_success=0&import_msg=1' ); exit;

            header('Location: ' . sanitize_text_field( wp_unslash( $_SERVER["HTTP_REFERER"] ) ) );
            exit;

        }
    }
    if( isset($_FILES['import_file']['tmp_name']) ) {
        $import_file = sanitize_text_field( wp_unslash( $_FILES['import_file']['tmp_name'] ) );
        if ( empty( $import_file ) ) {
            set_import_fail_msg();
            return;
        }
    }
    // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
    // phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.WarnFilesystem
    $settings = json_decode( file_get_contents( $import_file ), true );

    if(isset($settings['settings'])){
        update_option( 'dtb_toolbox', $settings['settings'] );
    }
    if(isset($settings['customization'])){
        $all_options = wp_load_alloptions();
        foreach ($all_options as $key => $value) {
            $name = explode('_', $key);
            if($name[0] == 'dtb' && $name[1] == 'customize'){
                delete_option($key);
            }
        }
        foreach ( maybe_unserialize( $settings['customization'] ) as $key => $value ) {
            update_option($key, $value);
        }
    }
    if(isset($settings['modcustomization'])){
        $all_mods = get_theme_mods();
        foreach ($all_mods as $key => $value) {
            $name = explode('_', $key);
            if($name[0] == 'dtb' && $name[1] == 'modcustomize'){
                remove_theme_mod($key);
            }
        }
        foreach ( maybe_unserialize($settings['modcustomization']) as $key => $value) {
            set_theme_mod($key, $value);
        }
    }
    require_once DTB_TOOLBOX_PLUGIN_DIR. 'functions/settings/static-css.php';
    dtb_create_static_css();
    wp_safe_redirect( admin_url( 'admin.php?page=divi_toolbox&tab=settings' ) . '&import_success=1&import_msg=0' ); exit;
}
function dtb_export_settings() {
    if( !isset($_POST['dtb_subform_type']) || 'settings_export' != $_POST['dtb_subform_type'])
        return;
    if( empty( $_POST['dtb_export_settings_action'] ) || 'dtb_export_settings' != $_POST['dtb_export_settings_action'] )
        return;
    if( isset( $_POST['dtb_export_settings_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['dtb_export_settings_nonce'], 'dtb_export_settings_nonce' ) ) )
        return;
    if( ! current_user_can( 'manage_options' ) )
        return;
    $settings=array();
    if(isset($_POST['dtb_import_type_settings'])){
        $settings['settings'] = get_option( 'dtb_toolbox' );
    }
    if(isset($_POST['dtb_import_type_customizer'])){
        $customizer_settings_array = array();
        $customizer_mod_settings_array = array();
        $customizer_settings = wp_load_alloptions();
        $customizer_mod_settings = get_theme_mods();

        foreach ($customizer_settings as $key => $value) {
            $name = explode('_', $key);
            if($name[0] == 'dtb' && $name[1] == 'customize'){
                $customizer_settings_array[$key] = $value;
            }
        }
        foreach ($customizer_mod_settings as $key => $value) {
            $name = explode('_', $key);
            if($name[0] == 'dtb' && $name[1] == 'modcustomize'){
                $customizer_mod_settings_array[$key] = $value;
            }
        }
        $settings['customization'] = maybe_serialize( $customizer_settings_array );
        $settings['modcustomization'] = maybe_serialize( $customizer_mod_settings_array );
    }
    ignore_user_abort( true );
    nocache_headers();
    header( 'Content-Type: application/json; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=divi-toolbox-settings-' . gmdate( 'm-d-Y' ) . '.json' );
    header( "Expires: 0" );
    echo wp_json_encode( $settings );
    exit;
}