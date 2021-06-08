<?php
/*
Plugin Name: Divi Den Pro
Plugin URI:  https://seku.re/GoPro
Description: Get easy access to tons of Free and Premium Divi Page Layouts to speed up your work flow. Find great designs and build awesome pages. Search by keyword or browse by topic, page type, product or Divi module. Use the preview button to see live and working demos of the layouts before you import them. We look forward to your feedback, so we can make it even more awesome.

Version:     5.0.4
Author:      WP Den
Author URI:  https://seku.re/wp-den-team
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Text Domain: ddpro
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
    exit;
}

//======================================================================
// Load Persist Admin notices Dismissal
//======================================================================

if (!class_exists('PAnD')) {
    require_once(plugin_dir_path(__FILE__) . '/include/persist-admin-notices-dismissal.php');
    add_action('admin_init', array(
        'PAnD',
        'init'
    ));
}

//======================================================================
//  Load the main plugin class
//======================================================================

if (!class_exists('ddp_AM_License_Menu')) {
    require_once(plugin_dir_path(__FILE__) . 'ddpro-main.php');
    ddp_AM_License_Menu::instance(__FILE__, 'Divi Den Pro Membership', '5.0.4', 'plugin', 'https://wp-den.com/');
}

if (!function_exists('ddp_allowed_html')) {
     require_once(plugin_dir_path(__FILE__) . 'include/ddp-allowed-html-tags.php');
}

//======================================================================
// CHECK IF DIVI THEME INSTALLED
//======================================================================

function ddp_not_installed_admin_notice__error()
{
    $class   = 'notice notice-error is-dismissible';
    $message = __('<strong>Action Required:</strong> The Divi Theme is not installed. You must install the Divi Theme for the ', 'ddpro').DDP_NAME.__(' to work. If you do not already have it,', 'ddpro').' <a href="https://seku.re/get-divi" target="_blank">'.__('Get it here', 'ddpro').'</a>';

    printf('<div data-dismissible="disable-ddp-status-warning-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
}

$divi_theme = wp_get_theme('Divi');
if (!($divi_theme->exists()))
    add_action('admin_notices', 'ddp_not_installed_admin_notice__error');

//======================================================================
// DDP DM IS ACTIVE NOTICE
//======================================================================

function ddp_ddprodm_active_admin_notice__error() {
    $class   = 'notice notice-error is-dismissible ddpdm-active-notice';
    $message = __('<strong>WARNING:</strong> Two different versions of the Divi Den Pro plugin was detected. Only one version should be used. To avoid errors, please', 'ddpro').' <a href="'.admin_url('plugins.php').'">'.__('deactivate', 'ddpro').'</a> '.__('either "Divi Den Pro DM" or "Divi Den Pro".', 'ddpro').'<br>'.__('<strong>IMPORTANT:</strong> Please create a backup of your website and database before making the switch. Backward compatibility cannot be guaranteed. Please proceed with caution and test thoroughly after any changes. ', 'ddpro').' <a href="https://seku.re/ddp-wpnotice-support" target="_blank">'.__('Contact support', 'ddpro').'</a> '.__('if you have any questions', 'ddpro').'.';

    if (PAnD::is_admin_notice_active( 'disable-ddpdm-active-notice-forever'))  printf('<div data-dismissible="disable-ddpdm-active-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
}

//======================================================================
// CHECK IF DDP WPD IS ACTIVE
//======================================================================

function ddp_check_ddpdm() {
    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }

    if (is_plugin_active('ddprodm/ddprodm.php') ) {
        add_action('admin_notices', 'ddp_ddprodm_active_admin_notice__error');
    }
}
add_action('admin_init', 'ddp_check_ddpdm');

//======================================================================
// HIDE DDFREE
//======================================================================

function ddp_hide_plugin_ddd()
{
    global $wp_list_table;
    $hidearr   = array(
        'ddfree/ddfree.php'
    );
    $myplugins = $wp_list_table->items;
    foreach ($myplugins as $key => $val) {
        if (in_array($key, $hidearr)) {
            unset($wp_list_table->items[$key]);
        }
    }
}

add_action('pre_current_active_plugins', 'ddp_hide_plugin_ddd');

function ddp_mu_hide_plugins_network($plugins)
{
    if (in_array('ddfree/dfree.php', array_keys($plugins))) {
        unset($plugins['ddfree/ddfree.php']);
    }
    return $plugins;
}

add_filter('all_plugins', 'ddp_mu_hide_plugins_network');

function ddp_remove_menus_ddd()
{
   if (file_exists(str_replace('ddpro', 'divi-den-on-demand', plugin_dir_path(__FILE__)) . 'divi-den-on-demand.php')) {
        remove_menu_page('divi_den_on_demand_dashboard'); //DDD
    }
}
//add_action('admin_init', 'ddp_remove_menus_ddd');

//======================================================================
// HIDE TABS IF WL ENABLED
//======================================================================

function ddp_wl_hide_tabs()
{
    if (get_option('ddp_wl') == 'enabled') {// update_option('ddp_enable', 'disabled');
    }
    else {
        update_option('ddp_enable', 'enabled');
        update_option('ddp_allow_upd','enabled');
    }
}
add_action('admin_init', 'ddp_wl_hide_tabs');



//======================================================================
// ADD ADMIN SCRIPTS
//======================================================================

add_action('admin_enqueue_scripts', 'ddp_enqueue_admin_js');
add_action('et_builder_ready', 'ddp_enqueue_admin_js_to_vb');

function ddp_enqueue_admin_js($hook_suffix)
{
    wp_enqueue_script('ddp-clipboard', plugins_url('js/clipboard.min.js', __FILE__), array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-cookie', plugins_url('include/diana/js/diana-jquery.cookie.js', __FILE__), array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-alphanum', plugins_url('js/jquery.alphanum.js', __FILE__), array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-admin-masonry', plugins_url('js/masonry.pkgd.js', __FILE__), array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-admin', plugins_url('js/ddp-admin.js', __FILE__), array( 'wp-i18n' ), "5.0.4", 'false');
    if(get_theme_mod('ddp_icons_fa', false) == 1 || get_theme_mod('ddp_icons_fa', false) == 1 ) wp_enqueue_script('ddp-icons-admin', plugins_url('js/ddp-admin-custom-icons.js', __FILE__), array( 'wp-i18n' ), "5.0.0", 'false');
    if (get_option('ddp_wl') == 'enabled' && get_option('ddp_plugin_name')) {
        $ddp_wl_pn = get_option('ddp_plugin_name');
    } else $ddp_wl_pn = 'Divi Den Pro';

    if (get_option('ddp_wl') == 'enabled') {
        if (get_option('ddp_plugin_icon') != '') $ddp_wl_i = get_option('ddp_plugin_icon');
            else $ddp_wl_i = plugin_dir_url(__FILE__) . '/include/ddp-wl-default-icon.png';
    } else $ddp_wl_i = plugin_dir_url(__FILE__) . '/include/ddp-icon.png';

    $ddp_status = get_option('ddp_enable');

    $ddp_on_hold_status = get_option('ddp_subscription_on_hold');

    $ddp_js_options_array = array(
        'ddp_wl_pn_for_js' => $ddp_wl_pn,
        'ddp_wl_i_for_js' => $ddp_wl_i,
        'ddp_ajax_url' => admin_url( 'admin-ajax.php' ),
        'ddp_plugin_setting_tab_position' => get_option( 'ddp_plugin_setting_tab_position'),
        'ddp_status' => $ddp_status,
        'ddp_on_hold_status' => $ddp_on_hold_status,
        'ddp_nonce' => wp_create_nonce('ddp-main-nonce'),
    );

    wp_localize_script('ddp-admin', 'ddp_wl_options_for_js', $ddp_js_options_array);
}

function ddp_enqueue_admin_js_to_vb($hook_suffix)
{
    $time = '<span>1</span>';
    wp_enqueue_script('jquery');
    wp_enqueue_script('ddp-clipboard', plugins_url('js/clipboard.min.js', __FILE__),  array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-alphanum', plugins_url('js/jquery.alphanum.js', __FILE__),  array(), "5.0.0", 'false');
    wp_enqueue_script('ddp-admin', plugins_url('js/ddp-admin.js', __FILE__), array( 'wp-i18n' ), "5.0.4", 'false');
    if (get_option('ddp_wl') == 'enabled' && get_option('ddp_plugin_name')) {
        $ddp_wl_pn = get_option('ddp_plugin_name');
    } else
        $ddp_wl_pn = 'Divi Den Pro';
    if (get_option('ddp_wl') == 'enabled' && get_option('ddp_plugin_icon')) {
        $ddp_wl_i = get_option('ddp_plugin_icon');
    } else
        $ddp_wl_i = plugin_dir_url(__FILE__) . '/include/ddp-icon.png';

    $ddp_status = get_option('ddp_enable');

    $ddp_on_hold_status = get_option('ddp_subscription_on_hold');

    $ddp_js_options_array = array(
        'ddp_wl_pn_for_js' => $ddp_wl_pn,
        'ddp_wl_i_for_js' => $ddp_wl_i,
        'ddp_ajax_url' => admin_url( 'admin-ajax.php' ),
        'ddp_plugin_setting_tab_position' => get_option( 'ddp_plugin_setting_tab_position'),
        'ddp_status' => $ddp_status,
        'ddp_on_hold_status' => $ddp_on_hold_status,
        'ddp_nonce' => wp_create_nonce('ddp-main-nonce'),
    );

    wp_localize_script('ddp-admin', 'ddp_wl_options_for_js', $ddp_js_options_array);
}


//======================================================================
// ADD ADMIN CSS
//======================================================================

add_action('admin_enqueue_scripts', 'ddp_enqueue_admin_css');

function ddp_enqueue_admin_css()
{

    if (get_theme_mod('ddp_icons_fa', false) == 1) {
        wp_register_style('ddp-admin-font-awesome', plugins_url('fonts/font-awesome/all.min.css', __FILE__), array(), '5.0.0', 'all');
        wp_enqueue_style('ddp-admin-font-awesome');
    }

    if (get_theme_mod('ddp_icons_md', false) == 1) {
        wp_register_style('ddp-admin-material-design-icons', plugins_url('fonts/material-design/iconfont/material-icons.css', __FILE__), array(), '5.0.0', 'all');
        wp_enqueue_style('ddp-admin-material-design-icons');
    }

    wp_register_style('ddp-admin', plugins_url('css/ddp-admin.css', __FILE__),  array(), '5.0.4', 'all');
    wp_register_style('ddp-admin-eb', plugins_url('css/ddp-admin-eb.css', __FILE__),  array(), '5.0.2', 'all');
    wp_enqueue_style('ddp-admin');
    wp_enqueue_style('ddp-admin-eb');

}


//======================================================================
// ADD ADMIN CSS FOR VB
//======================================================================

add_action('et_builder_ready', 'ddp_enqueue_admin_css_for_vb');
//add_action('admin_enqueue_scripts', 'ddp_enqueue_admin_css_for_vb');

function ddp_enqueue_admin_css_for_vb()
{
    wp_register_style('ddp-admin-css-vb', plugins_url('css/ddp-admin-vb.css', __FILE__),  array(), '5.0.0', 'all');
    wp_enqueue_style('ddp-admin-css-vb');
}


//======================================================================
// New options for plugin's setting
//======================================================================
    function ddp_add_options_on_activate()
    {

        if (!get_option('ddp_enable'))
            add_option('ddp_enable', 'enabled');
        if (!get_option('ddp_allow_upd'))
            add_option('ddp_allow_upd', 'enabled');

    }

register_activation_hook(__FILE__, 'ddp_add_options_on_activate');

//======================================================================
// New options for plugin's setting
//======================================================================

function ddp_add_options() {

if (!get_option( 'ddp_404_page_template')) add_option( 'ddp_404_page_template', 'disabled' );

if (!get_option( 'ddp_category_page_template')) add_option( 'ddp_category_page_template', 'global' );

if (!get_option( 'ddp_author_page_template')) add_option( 'ddp_author_page_template', 'global' );

if (!get_option( 'ddp_tag_page_template')) add_option( 'ddp_tag_page_template', 'global' );

if (!get_option( 'ddp_global_page_template')) add_option( 'ddp_global_page_template', 'disabled' );

if (!get_option( 'ddp_search_results_page_template')) add_option( 'ddp_search_results_page_template', 'disabled' );

if (!get_option( 'ddp_menu_template')) add_option( 'ddp_menu_template', 'disabled' );

if (!get_option( 'ddp_coming_soon_template')) add_option( 'ddp_coming_soon_template', 'disabled' );

if (!get_option( 'ddp_sticky_bar_template')) add_option( 'ddp_sticky_bar_template', 'disabled' );

if (!get_option( 'ddp_sticky_bar_delay')) add_option( 'ddp_sticky_bar_delay', 0 );

if (!get_option( 'ddp_sticky_bar_cookie_days')) add_option( 'ddp_sticky_bar_cookie_days', 120 );

if (!get_option( 'ddp_sticky_show_close')) add_option( 'ddp_sticky_show_close', true );

if (!get_option( 'ddp_sticky_show_leave')) add_option( 'ddp_sticky_show_leave', false );

if (!get_option( 'ddp_pop_up_template')) add_option( 'ddp_pop_up_template', 'disabled' );

if (!get_option( 'ddp_pop_up_scroll_per')) add_option( 'ddp_pop_up_scroll_per', 20 );

if (!get_option( 'ddp_single_post_template')) add_option( 'ddp_single_post_template', 'disabled');

if (!get_option( 'ddp_footer_template')) add_option( 'ddp_footer_template', 'disabled');

if (!get_option( 'ddp_header_template')) add_option( 'ddp_header_template', 'disabled' );

if (!get_option( 'ddp_mobile_menu_template')) add_option( 'ddp_mobile_menu_template', 'disabled' );

if (!get_option( 'ddp_plugin_setting_tab_position')) add_option( 'ddp_plugin_setting_tab_position', 'on' );

if (post_type_exists( 'et_footer_layout' )) add_post_type_support( 'et_footer_layout', 'custom-fields');

if (post_type_exists( 'et_header_layout' )) add_post_type_support( 'et_header_layout', 'custom-fields');

if (post_type_exists( 'et_body_layout' )) add_post_type_support( 'et_body_layout', 'custom-fields');


}

add_action( 'plugins_loaded', 'ddp_add_options' );

include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

//if ( class_exists( 'WP_Customize_Control' ) ) { require_once(plugin_dir_path(__FILE__) . 'include/extentions/ddp-customizer-range-control.php');}

add_action('admin_footer', 'ddp_load_userback');
function ddp_load_userback() {
    echo "<script>
   Userback = window.Userback || {};
   Userback.access_token = '9457|18534|FC9chXgenIsR4uvctylhyvdDUG8lONFvGLTuPRwULwnG7LREge';
   (function(id) {
       var s = document.createElement('script');
       s.async = 1;s.src = 'https://static.userback.io/widget/v1.js';
       var parent_node = document.head || document.body;parent_node.appendChild(s);
   })('userback-sdk');
</script>";
}


if (get_option('divi_den_pro_membership_activated') == 'Activated') {

      //======================================================================
    // CHECK IF OLD BETA VERSION IS ACTIVE
    //======================================================================

    function ddpro_beta_version_installed_admin_notice__warning() {
        $class   = 'notice notice-warning is-dismissible';
        $message = __('Divi Den on Demand BETA plugin is not required anymore. It has been deactivated and can safely be removed - ', 'ddpro').'<a href="';
        $message .= admin_url('plugins.php');
        $message .= '">'.__('Go to plugins page to remove', 'ddpro').'</a>';

        if (PAnD::is_admin_notice_active( 'disable-ddpro-beta-warning-notice-forever'))  printf('<div data-dismissible="disable-ddpro-beta-warning-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
    }

    if (file_exists(str_replace('ddpro', 'divi-den-on-demand', plugin_dir_path(__FILE__)) . 'divi-den-on-demand.php') ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if (get_option('ddp_wl') != 'enabled') add_action('admin_notices', 'ddpro_beta_version_installed_admin_notice__warning');
        deactivate_plugins('/divi-den-on-demand/divi-den-on-demand.php');
    }

    $ddp_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
    $ddp_plugin_version = $ddp_plugin_data['Version'];

    define ( 'DDP_VERSION', $ddp_plugin_version );


    //======================================================================
    // pop-ups notice
    //======================================================================

    function ddpro_pop_ups_admin_notice__warning() {
        $class   = 'notice notice-warning is-dismissible ddp-pop-ups-warning';
        $message = '<strong>'.__('Important Notice','ddpro').': </strong>'.__('Are you using Divi Den Pro "Pop-ups" that trigger "on click"? Please enable the scripts once more by going to Customizer > Divi Den Pro Global Settings > Pop-up Customizer. Default: Changed to "Checked"', 'ddpro');

        if (PAnD::is_admin_notice_active( 'disable-ddpro-pop-ups-notice-forever'))  printf('<div data-dismissible="disable-ddpro-pop-ups-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
    }

    if (get_option('ddp_wl') != 'enabled') add_action('admin_notices', 'ddpro_pop_ups_admin_notice__warning');



    //======================================================================
    // ADD A LINK TO SETTINGS PAGE
    //======================================================================
    function add_ddpro_settings_link($links)
    {
        return array_merge($links, array(
            '<a href="' . admin_url('/admin.php?page=' . DDP_LINK . '_dashboard') . '">' . __('Settings') . '</a>'
        ));
    }

    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_ddpro_settings_link');

   // require_once(ABSPATH . 'wp-admin/includes/plugin.php');

    //======================================================================
    // CHECK IF ASSISTANT PLUGINS ARE ACTIVE
    //======================================================================

    function ddpro_assistant_plugins_installed_admin_notice__warning()
    {

        $list_of_assistant_plugins_text = '';


        if (file_exists(str_replace('ddpro', 'falkor-assistant', plugin_dir_path(__FILE__)) . 'falkor-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Falkor Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'jackson-assistant', plugin_dir_path(__FILE__)) . 'jackson-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Jackson Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'mermaid-divi', plugin_dir_path(__FILE__)) . 'mermaid-divi.php')) {
            $list_of_assistant_plugins_text .= 'Mermaid Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'mozart-assistant', plugin_dir_path(__FILE__)) . 'mozart-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Mozart Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'pegasus-assistant', plugin_dir_path(__FILE__)) . 'pegasus-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Pegasus Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'pixie-assistant', plugin_dir_path(__FILE__)) . 'pixie-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Pixie Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'unicorn-assistant', plugin_dir_path(__FILE__)) . 'unicorn-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Unicorn Assistant, ';
        }

        if (file_exists(str_replace('ddpro', 'venus-assistant', plugin_dir_path(__FILE__)) . 'venus-assistant.php')) {
            $list_of_assistant_plugins_text .= 'Venus Assistant, ';
        }

        $class   = 'notice notice-warning is-dismissible';
        $message = __('<strong>Action Required:</strong> To avoid conflicts with ', 'ddpro').DDP_NAME.__(' plugin, it is <strong>strongly recommended</strong> to remove the following plugins: <strong><i>', 'ddpro');
        $message .= substr($list_of_assistant_plugins_text, 0, -2) . '</i></strong>.';
        $message .= __(' Please <a href="https://seku.re/conflict-avoid-ddp" target="_blank">read this article</a> for best results. Then  <a href="', 'ddpro');
        $message .= admin_url('plugins.php');
        $message .= __('">go to the plugins page</a> to deactivate and remove the plugins.', 'ddpro');

        if (get_option('ddp_wl') !== 'enabled' && PAnD::is_admin_notice_active( 'disable-ddpro-assistant-plugins-installed-warning-notice-forever')) printf('<div data-dismissible="disable-ddpro-assistant-plugins-installed-warning-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
    }

    function ddp_add_meta_on_plugin_activation() {

        if(get_option('ddp_posts_saved') != 'yes') {
        $ddp_pages = get_posts( array('post_type' => 'page', 'post_status'      => 'publish' ) );

        foreach ( $ddp_pages as $ddp_page ):
            wp_update_post( $ddp_page );
        endforeach;

        $ddp_posts = get_posts( array('post_type' => 'post', 'post_status'      => 'publish' ) );

        foreach ( $ddp_posts as $ddp_post ):
            wp_update_post( $ddp_post );
        endforeach;

        $ddp_projects = get_posts( array('post_type' => 'project', 'post_status'      => 'publish' ) );

        foreach ( $ddp_projects as $ddp_project ):
            wp_update_post( $ddp_project );
        endforeach;

        update_option('ddp_posts_saved', 'yes');
        }
    }

    $list_of_assistant_plugins = array();

    if (file_exists(str_replace('ddpro', 'falkor-assistant', plugin_dir_path(__FILE__)) . 'falkor-assistant.php')) {
        $list_of_assistant_plugins[] = 'falkor-assistant/falkor-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'jackson-assistant', plugin_dir_path(__FILE__)) . 'jackson-assistant.php')) {
        $list_of_assistant_plugins[] = 'jackson-assistant/jackson-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'mermaid-divi', plugin_dir_path(__FILE__)) . 'mermaid-divi.php')) {
        $list_of_assistant_plugins[] = 'mermaid-divi/mermaid-divi.php';
    }

    if (file_exists(str_replace('ddpro', 'mozart-assistant', plugin_dir_path(__FILE__)) . 'mozart-assistant.php')) {
        $list_of_assistant_plugins[] = 'mozart-assistant/mozart-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'pegasus-assistant', plugin_dir_path(__FILE__)) . 'pegasus-assistant.php')) {
        $list_of_assistant_plugins[] = 'pegasus-assistant/pegasus-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'pixie-assistant', plugin_dir_path(__FILE__)) . 'pixie-assistant.php')) {
        $list_of_assistant_plugins[] = 'pixie-assistant/pixie-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'unicorn-assistant', plugin_dir_path(__FILE__)) . 'unicorn-assistant.php')) {
        $list_of_assistant_plugins[] = 'unicorn-assistant/unicorn-assistant.php';
    }

    if (file_exists(str_replace('ddpro', 'venus-assistant', plugin_dir_path(__FILE__)) . 'venus-assistant.php')) {
        $list_of_assistant_plugins[] = 'venus-assistant/venus-assistant.php';
    }

    if (!empty($list_of_assistant_plugins) && get_option('ddp_subscription_cancelled') == 'no') {
       // echo 'NOT EMPTY';
        add_action('admin_notices', 'ddpro_assistant_plugins_installed_admin_notice__warning');
       // deactivate_plugins($list_of_assistant_plugins);

        if(get_option('ddp_posts_saved') != 'yes') { ddp_add_meta_on_plugin_activation();}
    }

    if (!get_option('ddp_hide_menu')) add_option('ddp_hide_menu', 'disabled');

    if (!get_option('ddp_hide_customizer')) add_option('ddp_hide_customizer', 'disabled');

        // hide premade divi layouts
    if (get_option('ddp_wl') == 'enabled') {
        if (get_option('ddp_hide_premade') == 'enabled') {
            add_action('wp_head', 'ddp_hide_premade_function');
            add_action('admin_head', 'ddp_hide_premade_function');
        }
    }

    // hide View details for WL

    if (get_option('ddp_wl') == 'enabled') {
        add_action('admin_head', 'ddp_hide_view_details_function');
    }

    function ddp_hide_view_details_function() {
        echo '<style>body.wp-admin tr[data-plugin="ddpro/ddpro.php"] .open-plugin-details-modal {display: none !important;}</style>';

    }


    function ddp_hide_premade_function() {
     echo '<style>
       body.wp-admin .et-fb-main-settings--load_layout .et-pb-options-tabs-links li.et-pb-new-module, body.wp-admin .et-fb-main-settings--load_layout div.et-pb-all-modules-tab{display:none !important;}
       body.wp-admin .et-fb-main-settings--load_layout div.et-pb-all-modules-tab {opacity: 0 !important;}
       .et-fb-main-settings--load_layout li.et-fb-settings-options_tab_modules_all {display:none !important;}
      </style>';
      echo "<script>jQuery(document).ready(function($) {
        $(document).on('mouseup', '.et-pb-layout-buttons-load', function() {
            $('div.et-pb-all-modules-tab').attr('style', 'display:none !important; opacity: 0;');
                   setTimeout(function() {
                    var tabbar = $('.et-pb-saved-modules-switcher');
                        if (tabbar.length) {
                            $('li.et-pb-new-module').remove();
                            setInterval(function(){
                                if(!$('li[data-open_tab=et-pb-existing_pages-tab]').hasClass('et-pb-options-tabs-links-active')) {
                                    $('li[data-open_tab=et-pb-saved-modules-tab] a').click();

                                    setTimeout(function() {
                                   $('div.et-pb-all-modules-tab').attr('style', 'display:block !important; opacity: 1 !important;');
                                    }, 200);
                                }
                            }, 2000);

                        }

                    }, 200);

    });
    setInterval(function(){
      var tabbar_vb = $('.et-fb-main-settings--load_layout .et-fb-settings-tabs-nav');
                    if (tabbar_vb.length) {

                                if(!$('li.et-fb-settings-options_tab_existing_pages').hasClass('et-fb-settings-tabs-nav-item--active')) {
                                    $('li.et-fb-settings-options_tab_modules_library').addClass('et-fb-settings-tabs-nav-item--active');
                                   $('li.et-fb-settings-options_tab_modules_library a')[0].click();
                                  $(this).parents('#et-fb-settings-column').addClass('et-fb-modal-settings--modules_library').removeClass('et-fb-modal-settings--modules_all ');
                                   // $('div.et-pb-all-modules-tab').show();
                                }

                    }
         }, 500);
 }); </script>";
    }


    //======================================================================
    // For ajax get and set options
    //======================================================================

    function ddp_get_option()
    {
        echo esc_attr(get_option('ddp_enable'));
        die();
    }

    function ddp_get_option_subscription()
    {
        echo esc_attr(get_option('ddp_subscription_cancelled'));
        die();
    }

    function ddp_get_option_wl()
    {
        echo esc_attr(get_option('ddp_wl'));
        die();
    }

    function ddp_get_option_ddp_plugin_setting_tab_position()
    {
        echo esc_attr(get_option('ddp_plugin_setting_tab_position'));
        die();
    }

    function ddp_update_option()
    {
        // NONCE VERIFICATION
        if ( !isset($_POST['ddp_nonce']) || !wp_verify_nonce( sanitize_key($_POST['ddp_nonce']), 'ddp-main-nonce')) die();

        if(isset($_POST['ddp_option']) && isset($_POST['ddp_option_val'])) update_option(sanitize_text_field($_POST['ddp_option']), wp_kses($_POST['ddp_option_val'], ddp_allowed_html()));

    }

    function ddp_get_plugin_activation_state()
    {
        // NONCE VERIFICATION
        if ( !isset($_POST['ddp_nonce']) || !wp_verify_nonce( sanitize_key($_POST['ddp_nonce']), 'ddp-main-nonce')) die();

        if(isset($_GET['plugin_name'])) {
            $plugin_name = sanitize_text_field($_GET['plugin_name']) . '_assistant_activated';
            echo esc_html(get_option($plugin_name));
        }

        die();
    }


     if (is_admin()) {
        add_action('wp_ajax_ddp_update_option', 'ddp_update_option', 10, 2);
        add_action('wp_ajax_ddp_get_option', 'ddp_get_option', 9, 1);
        add_action('wp_ajax_ddp_get_option_subscription', 'ddp_get_option_subscription', 9, 1);
        add_action('wp_ajax_ddp_get_plugin_activation_state', 'ddp_get_plugin_activation_state', 8, 1);
        add_action('wp_ajax_ddp_import_posts', 'ddp_import_posts', 5, 1);
        add_action('wp_ajax_ddp_import_featured_image', 'ddp_import_featured_image', 3, 1);
        add_action('wp_ajax_ddp_show_featured_image', 'ddp_show_featured_image', 2, 1);
    }

    add_action('wp_ajax_ddp_get_option_wl', 'ddp_get_option_wl', 9, 1);
    add_action('wp_ajax_nopriv_ddp_get_option_wl', 'ddp_get_option_wl', 9, 1);
    add_action('wp_ajax_ddp_get_option_ddp_plugin_setting_tab_position', 'ddp_get_option_ddp_plugin_setting_tab_position', 9, 1);

    if(get_option('ddp_enable') == 'enabled') {

        /* Theme Builder */

    function ddp_for_theme_builder_page($hook_suffix) {
        if($hook_suffix == 'divi_page_et_theme_builder') {
             wp_register_style('ddp-tb-admin', plugins_url('css/ddp-tb-admin.css', __FILE__),  array(), '5.0.0', 'all');
             wp_enqueue_style('ddp-tb-admin');

            wp_enqueue_script('ddp-tb-admin', plugins_url('js/ddp-tb-admin.js', __FILE__), array(), '5.0.0', 'false');
        }
    }

    if (get_option('ddp_wl') != 'enabled' && get_option('ddp_subscription_on_hold') != 'yes') { add_action('admin_enqueue_scripts', 'ddp_for_theme_builder_page'); }

    function ddp_set_filesystem() {
        global $wp_filesystem;

       // add_filter( 'filesystem_method', array( 'replace_filesystem_method' ) );
        WP_Filesystem();

        return $wp_filesystem;
    }

    //======================================================================
    // UPLOAD IMAGES
    //======================================================================

    function ddp_upload_images( $images ) {
        $filesystem = ddp_set_filesystem();

        foreach ( $images as $key => $image ) {
            $basename    = sanitize_file_name( wp_basename( $image['url'] ) );
            $attachments = get_posts( array(
                'posts_per_page' => -1,
                'post_type'      => 'attachment',
                'meta_key'       => '_wp_attached_file',
                'meta_value'     => pathinfo( $basename, PATHINFO_FILENAME ),
                'meta_compare'   => 'LIKE',
            ) );
            $id = 0;
            $url = '';

            // Avoid duplicates.
            if ( ! is_wp_error( $attachments ) && ! empty( $attachments ) ) {
                foreach ( $attachments as $attachment ) {
                    $attachment_url = wp_get_attachment_url( $attachment->ID );
                    $file           = get_attached_file( $attachment->ID );
                    $filename       = sanitize_file_name( wp_basename( $file ) );

                    // Use existing image only if the content matches.
                    if ( $filesystem->get_contents( $file ) === base64_decode( $image['encoded'] ) ) {
                        $id = isset( $image['id'] ) ? $attachment->ID : 0;
                        $url = $attachment_url;

                        break;
                    }
                }
            }

            // Create new image.
            if ( empty( $url ) ) {
                $temp_file = wp_tempnam();
                $filesystem->put_contents( $temp_file, base64_decode( $image['encoded'] ) );
                $filetype = wp_check_filetype_and_ext( $temp_file, $basename );

                // Avoid further duplicates if the proper_file name match an existing image.
                if ( isset( $filetype['proper_filename'] ) && $filetype['proper_filename'] !== $basename ) {
                    if ( isset( $filename ) && $filename === $filetype['proper_filename'] ) {
                        // Use existing image only if the basenames and content match.
                        if ( $filesystem->get_contents( $file ) === $filesystem->get_contents( $temp_file ) ) {
                            $filesystem->delete( $temp_file );
                            continue;
                        }
                    }
                }

                $file = array(
                    'name'     => $basename,
                    'tmp_name' => $temp_file,
                );
                $upload = media_handle_sideload( $file, 0 );

                if ( ! is_wp_error( $upload ) ) {
                    // Set the replacement as an id if the original image was set as an id (for gallery).
                    $id = isset( $image['id'] ) ? $upload : 0;
                    $url = wp_get_attachment_url( $upload );
                } else {
                    // Make sure the temporary file is removed if media_handle_sideload didn't take care of it.
                    $filesystem->delete( $temp_file );
                }
            }

            // Only declare the replace if a url is set.
            if ( $id > 0 ) {
                $images[$key]['replacement_id'] = $id;
            }

            if ( ! empty( $url ) ) {
                $images[$key]['replacement_url'] = $url;
            }

            unset( $url );
        }

        return $images;
    }

    //======================================================================
    // REPLACE IMAGES URL
    //======================================================================

    function ddp_replace_image_url( $subject, $image ) {
        if ( isset( $image['replacement_id'] ) && isset( $image['id'] ) ) {
            $search      = $image['id'];
            $replacement = $image['replacement_id'];
            $subject     = preg_replace( "/(gallery_ids=.*){$search}(.*\")/", "\${1}{$replacement}\${2}", $subject );
        }

        if ( isset( $image['url'] ) && isset( $image['replacement_url'] ) && $image['url'] !== $image['replacement_url'] ) {
            $search      = $image['url'];
            $replacement = $image['replacement_url'];
            $subject     = str_replace( $search, $replacement, $subject );
        }

        return $subject;
    }

    function ddp_replace_images_urls( $images, $data ) {
        foreach ( $data as $post_id => &$post_data ) {
            foreach ( $images as $image ) {
                if ( is_array( $post_data ) ) {
                    foreach ( $post_data as $post_param => &$param_value ) {
                        if ( ! is_array( $param_value ) ) {
                            $data[ $post_id ][ $post_param ] = ddp_replace_image_url( $param_value, $image );
                        }
                    }
                    unset($param_value);
                } else {
                    $data[ $post_id ] = ddp_replace_image_url( $post_data, $image );
                }
            }
        }
        unset($post_data);

        return $data;
    }

    function ddp_temp_file( $id, $group, $temp_file = false ) {
        $temp_files = get_option( '_et_core_portability_temp_files', array() );

        if ( ! isset( $temp_files[$group] ) ) {
            $temp_files[$group] = array();
        }

        if ( isset( $temp_files[$group][$id] ) && file_exists( $temp_files[$group][$id] ) ) {
            return $temp_files[$group][$id];
        }

        $temp_file = $temp_file ? $temp_file : wp_tempnam();
        $temp_files[$group][$id] = $temp_file;

        update_option( '_et_core_portability_temp_files', $temp_files, false );

        return $temp_file;
    }


    function ddp_maybe_paginate_images( $images, $method, $timestamp ) {
        et_core_nonce_verified_previously();

        /**
         * Filters whether or not images in the file being imported should be paginated.
         *
         * @since 3.0.99
         *
         * @param bool $paginate_images Default `true`.
         */
        $paginate_images = apply_filters( 'et_core_portability_paginate_images', true );

        if ( $paginate_images && count( $images ) > 5 ) {
             $images = $method( $images );
        } else {
            $images = $method( $images );
        }
        return $images;
    }

    function ddp_get_timestamp() {
        et_core_nonce_verified_previously();

        return isset( $_POST['timestamp'] ) && ! empty( $_POST['timestamp'] ) ? sanitize_text_field( $_POST['timestamp'] ) : current_time( 'timestamp' );
    }

    //======================================================================
    // SAVE TO DIVI LIBRALY
    //======================================================================

    function ddp_import_posts($posts)
    {

        // NONCE VERIFICATION
        if ( !isset($_POST['ddp_nonce']) || !wp_verify_nonce( sanitize_key($_POST['ddp_nonce']), 'ddp-main-nonce')) {
            return;
            die();
        }

        global $wpdb;
        session_start();

        if (!function_exists('post_exists')) {
            require_once(ABSPATH . 'wp-admin/includes/post.php');
        }

        if (!get_option('ddp_post_id_for_image')) add_option('ddp_post_id_for_image', '');

        $imported = array();

        if(isset($_POST['posts'])) $posts_raw = $_POST['posts']; // phpcs:ignore
        else return;


        if (empty($posts_raw)) {
            //echo 'empry posts raw';
            return;
        }

        $posts = str_replace('\\"', '"', $posts_raw);
        $posts = str_replace('\\\\', '\\', $posts);
        $posts = str_replace("\'", "'", $posts);
        $posts = html_entity_decode($posts, ENT_COMPAT, 'UTF-8');
        $posts = json_decode($posts, true);

        if (empty($posts)) {
            return;
        }


       $posts_data = $posts['data'];
            // Upload images and replace current urls.
        if ( isset( $posts['images'] ) ) {
            $posts_images = $posts['images'];
            $timestamp = ddp_get_timestamp();
            $new_images = ddp_maybe_paginate_images( (array) $posts_images, 'ddp_upload_images', $timestamp );
            $posts_data = ddp_replace_images_urls( $new_images, $posts_data);
        }

        foreach ( $posts_data as $old_post_id => $post) {
            if (isset($post['post_status']) && 'auto-draft' === $post['post_status']) {
                continue;
            }

            $post_exists = post_exists($post['post_title']);

            // Make sure the post is published and stop here if the post exists.
            if ($post_exists && get_post_type($post_exists) == $post['post_type']) {
                if ('publish' == get_post_status($post_exists)) {
                    $imported[$post_exists] = $post['post_title'];
                    //$_SESSION['ddp_post_id_for_image'] = $post_exists; //echo 'SET $_SESSION: '.$_SESSION['ddp_post_id_for_image'];
                    update_option('ddp_post_id_for_image', $post_exists);
                    $time = current_time('mysql');

                    wp_update_post(
                        array (
                            'ID'            => $post_exists, // ID of the post to update
                            'post_date'     => $time,
                            'post_date_gmt' => get_gmt_from_date( $time )
                        )
                    );
                    continue;
                }
            }

            if (isset($post['ID'])) {
                $post['import_id'] = $post['ID'];
                unset($post['ID']);
            }


            $post['post_author'] = (int) get_current_user_id();

            $post['post_date'] = current_time('mysql');

            $post['post_date_gmt'] = current_time('mysql', 1);

            // Insert or update post.
            $post_id = wp_insert_post($post, true);

            if (!$post_id || is_wp_error($post_id)) {
                continue;
            }

            if (!isset($post['terms'])) {
                $post['terms'] = array();
            }

            $post['terms'][] = array(
                'name' => 'Divi Den',
                'slug' => 'divi-den',
                'taxonomy' => 'layout_category',
                'parent' => 0,
                'description' => ''
            );

            // Insert and set terms.
            if (count($post['terms']) > 0) {
                $processed_terms = array();

                foreach ($post['terms'] as $term) {

                    if (empty($term['parent'])) {
                        $parent = 0;
                    } else {
                        $parent = term_exists($term['name'], $term['taxonomy'], $term['parent']);

                        if (is_array($parent)) {
                            $parent = $parent['term_id'];
                        }
                    }

                    if (!$insert = term_exists($term['name'], $term['taxonomy'], $term['parent'])) {
                        $insert = wp_insert_term($term['name'], $term['taxonomy'], array(
                            'slug' => $term['slug'],
                            'description' => $term['description'],
                            'parent' => intval($parent)
                        ));
                    }

                    if (is_array($insert) && !is_wp_error($insert)) {
                        $processed_terms[$term['taxonomy']][] = $term['slug'];
                    }
                }

                // Set post terms.
                foreach ($processed_terms as $taxonomy => $ids) {
                    wp_set_object_terms($post_id, $ids, $taxonomy);
                }
            }

            // Insert or update post meta.
            if (isset($post['post_meta']) && is_array($post['post_meta'])) {
                foreach ($post['post_meta'] as $meta_key => $meta) {

                    $meta_key = sanitize_text_field($meta_key);

                    if (count($meta) < 2) {
                        $meta = wp_kses_post($meta[0]);
                    } else {
                        $meta = array_map('wp_kses_post', $meta);
                    }

                    update_post_meta($post_id, $meta_key, $meta);
                }
            }

            $imported[$post_id] = $post['post_title'];

        }

        if(!empty($post_id) && $post_id !== 0) {
            //$_SESSION['ddp_post_id_for_image'] = $post_id; //echo 'SET $_SESSION: '.$_SESSION['ddp_post_id_for_image'];
            update_option('ddp_post_id_for_image', $post_id);
        }

        return $imported;

        die();
    }


function ddp_media_file_already_exists($filename){
    global $wpdb;
  //  $query = $wpdb->prepare("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE %s", '%/$filename');

    if ($wpdb->get_var($wpdb->prepare("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE %s", '%/$filename')) ){
        return $wpdb->get_var($wpdb->prepare("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE %s", '%/$filename'));
    }

    return 0;
}



//======================================================================
// ADD FEATURED IMAGE
//======================================================================
function ddp_import_featured_image($ddp_featured_image) {

    global $wpdb;
    session_start();

    // NONCE VERIFICATION
    if ( !isset($_POST['ddp_nonce']) || !wp_verify_nonce( sanitize_key($_POST['ddp_nonce']), 'ddp-main-nonce')) {
        exit();
    }

    if(isset($_POST['ddp_featured_image'])) $ddp_featured_image = sanitize_text_field($_POST['ddp_featured_image']);
    else return;


    if(isset($_SESSION['ddp_post_id_for_image'])) $ddp_post_id_for_featured_image = $_SESSION['ddp_post_id_for_image'];
    else  $ddp_post_id_for_featured_image = get_option('ddp_post_id_for_image');

    if (empty($ddp_featured_image) || empty($ddp_post_id_for_featured_image)) {
        return;
    }

    if (!function_exists('post_exists')) {
        require_once(ABSPATH . 'wp-admin/includes/post.php');
    }

    $ddp_post_title = strstr($ddp_featured_image, 'http', true);
    $ddp_image_link = str_replace($ddp_post_title,"",$ddp_featured_image);
    $ddp_post_title = sanitize_file_name($ddp_post_title);
    $ddp_filename = $ddp_post_title.'-featured-image-ddp.jpg';

   $post_id =  $ddp_post_id_for_featured_image;


    if($post_id) {
        if (ddp_media_file_already_exists($ddp_filename) === 0) {
            $ddp_upload_file = wp_upload_bits($ddp_filename, null, @file_get_contents($ddp_image_link));
            if(!$ddp_upload_file['error']) {
              //if succesfull insert the new file into the media library (create a new attachment post type)
              $ddp_wp_filetype = wp_check_filetype($ddp_filename, null );
              $ddp_attachment = array(
                'post_mime_type' => $ddp_wp_filetype['type'],
                'post_parent' => $post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $ddp_filename),
                'post_content' => '',
                'post_status' => 'inherit'
              );
              //wp_insert_attachment( $ddp_attachment, $ddp_filename, $parent_post_id );
              $ddp_attachment_id = wp_insert_attachment( $ddp_attachment, $ddp_upload_file['file'], $post_id );
              if (!is_wp_error($ddp_attachment_id)) {
                 //if attachment post was successfully created, insert it as a thumbnail to the post $post_id
                 require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                 //wp_generate_attachment_metadata( $ddp_attachment_id, $file ); for images
                 $ddp_attachment_data = wp_generate_attachment_metadata( $ddp_attachment_id, $ddp_upload_file['file'] );
                 wp_update_attachment_metadata( $ddp_attachment_id,  $ddp_attachment_data );
                 set_post_thumbnail( $post_id, $ddp_attachment_id );
               }
            }
        }
        else {
            set_post_thumbnail( $post_id, ddp_media_file_already_exists($ddp_filename));
        }
    }



    die();

} //ddp_import_featured_image($ddp_featured_image)



//======================================================================
// SHOW FEATURED IMAGE
//======================================================================
    function ddp_show_featured_image($ddp_title_image)
    {

        // NONCE VERIFICATION
        if ( !isset($_POST['ddp_nonce']) || !wp_verify_nonce( sanitize_key($_POST['ddp_nonce']), 'ddp-main-nonce')) die();


        global $wpdb;

        if(isset($_POST['ddp_title_image'])) $ddp_title_image = sanitize_text_field($_POST['ddp_title_image']);
        else return;

        if (empty($ddp_title_image)) {
            //echo 'empry posts raw';
            return;
        }

        if (!function_exists('post_exists')) {
            require_once(ABSPATH . 'wp-admin/includes/post.php');
        }


        $page = get_page_by_title( html_entity_decode($ddp_title_image, ENT_COMPAT, 'UTF-8'), OBJECT, 'et_pb_layout' );

        if (isset($page)) $post_id =  $page->ID;

        if(isset($post_id)) {
            if (has_post_thumbnail( $post_id ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                echo esc_html($ddp_title_image)."|".esc_html($image[0]);
            }
        }

        die();

    } //ddp_show_featured_image

    //======================================================================
    // CHECK DIVI GLOBAL TEMPLATES
    //======================================================================

    function ddp_check_divi_global_templates() {

        $layouts = et_theme_builder_get_template_layouts();

        if (isset($layouts['et_header_layout']) && $layouts['et_header_layout']['override'] === true) {
            $post = get_post($layouts['et_header_layout']['id']);
            ddp_register_css($post);
            ddp_register_js($post);
        }

        if (isset($layouts['et_body_layout']) && $layouts['et_body_layout']['override'] === true) {
            $post = get_post($layouts['et_body_layout']['id']);
            ddp_register_css($post);
            ddp_register_js($post);
        }

        if (isset($layouts['et_footer_layout']) && $layouts['et_footer_layout']['override'] === true) {
            $post = get_post($layouts['et_footer_layout']['id']);
            ddp_register_css($post);
            ddp_register_js($post);
        }
    }


    // let's check the Divi's version

    $divi_theme = wp_get_theme('Divi');

    $diviVersion = $divi_theme->get( 'Version' )[0];

    if ((int)$diviVersion > 3) {
        add_action('wp_footer', 'ddp_check_divi_global_templates');
        add_action('et_fb_enqueue_assets', 'ddp_check_divi_global_templates', 1);
    }

    //======================================================================
    // ON POST SAVE
    //======================================================================

    add_action('save_post', 'ddp_save_post_function', 10, 3);

    function ddp_save_post_function($post_id, $post, $update) {

        delete_post_meta($post_id, 'ddp-css-falkor');
        delete_post_meta($post_id, 'ddp-css-jackson');
        delete_post_meta($post_id, 'ddp-css-mermaid');
        delete_post_meta($post_id, 'ddp-css-mozart');
        delete_post_meta($post_id, 'ddp-css-pegasus');
        delete_post_meta($post_id, 'ddp-css-pixie');
        delete_post_meta($post_id, 'ddp-css-unicorn');
        delete_post_meta($post_id, 'ddp-css-venus');
        delete_post_meta($post_id, 'ddp-css-sigmund');
        delete_post_meta($post_id, 'ddp-css-impi');
        delete_post_meta($post_id, 'ddp-css-jamie');
        delete_post_meta($post_id, 'ddp-css-coco');
        delete_post_meta($post_id, 'ddp-css-demo');
        delete_post_meta($post_id, 'ddp-css-diana');
        delete_post_meta($post_id, 'ddp-css-freddie');
        delete_post_meta($post_id, 'ddp-css-tina');

        $post_content = get_post_field('post_content', $post_id);

        // Falkor

        if (strpos($post_content, 'falkor')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'animated-lines');
        }


        if (strpos($post_content, 'falkor_blog')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-blog');
        }


        if (preg_match('/_class="blurb.{3,}f"/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-blurb');
        }


        if (preg_match('/_class="call_to_action_._f/', $post_content) || preg_match('/_class="falkor-cta-."/', $post_content) || strpos($post_content, 'call_to_action_1_f')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-cta');
        }


        if (preg_match('/_class="contact_._falkor/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-contact-forms');
        }


        if (strpos($post_content, 'falkor-contact-page')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-contact-page');
        }


        if (preg_match('/_class="content.{3,}f"/', $post_content) || strpos($post_content, 'content_2_f') || strpos($post_content, 'content_8_f')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-content');
        }


        if (preg_match('/_class="footer.{3,}f"/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-footers');
        }


        if (preg_match('/_class="headers.{3}f"/', $post_content) || strpos($post_content, 'header_') || strpos($post_content, 'demo_header') ) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-headers');
        }


        if (preg_match('/_class="home.{3,}f"/', $post_content) || strpos($post_content, 'falkor_home') || strpos($post_content, 'falkor-home')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-home-pages');
        }


        if (preg_match('/_class="contentpage.{3,}f"/', $post_content) || preg_match('/_class="blurb_services.{3,}f"/', $post_content) || strpos($post_content, 'falkor_logos_team')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-inside-pages');
        }


        if (strpos($post_content, 'falkor_logos_')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-logos');
        }


        if (strpos($post_content, 'falkor_numers_')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-numbers');
        }


        if (preg_match('/_class="person_._falkor"/', $post_content) || preg_match('/_class="person.{3,}f"/', $post_content) || strpos($post_content, 'person_4_f')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-person');
        }


        if (strpos($post_content, 'falkor-pt') || strpos($post_content, 'pricing_tabel_falkor')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-pricing-table');
        }


        if (strpos($post_content, 'falkor_slider')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-slider');
        }


        if (strpos($post_content, 'falkor-testimonial')) {
            add_post_meta($post_id, 'ddp-css-falkor', 'falkor-testimonials');
        }

        // Jackson

        if (strpos($post_content, 'error_404_page')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-404');
        }


        if (strpos($post_content, 'seo_about_')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-about');
        }


        if (strpos($post_content, 'author-info ')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-author');
        }


        if (strpos($post_content, 'seo_blog')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-blog');
        }


        if (strpos($post_content, 'seo-case-study')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-case-study');
        }


        if (strpos($post_content, 'cat_page_content')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-category-page');
        }


        if (strpos($post_content, 'seo-contact')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-contact');
        }

        if (strpos($post_content, 'seo_content_') || strpos($post_content, 'seo-sidebar-list')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-content');
        }

        if (strpos($post_content, 'seo_footer')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-footer');
        }


        if (strpos($post_content, 'seo_home')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-home');
        }


        if (strpos($post_content, 'seo_how_we_work_')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-how-we-work');
        }


        if (strpos($post_content, 'seo_services')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-services');
        }

        if (strpos($post_content, 'seo_team_')) {
            add_post_meta($post_id, 'ddp-css-jackson', 'jackson-team');
        }

        // Mermaid

        if (preg_match('/_class="blog.*_M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-blog');
        }

        if (preg_match('/_class="blurbs.{3,}M/', $post_content) || preg_match('/_class="blurb.{3,}M"/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-blurbs');
        }

        if (preg_match('/_class="contact_form.{3,}M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-contact=form');
        }

        if (preg_match('/_class="content.{3,}M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-content');
        }

        if (strpos($post_content, 'footer_top')) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-footer');
        }

        if (preg_match('/_class="list_style."/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-lists');
        }

        if (preg_match('/_class="mask_._M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-masks');
        }

        if (strpos($post_content, 'super_size_button') ||  strpos($post_content, 'button_') || strpos($post_content, 'mermaid_button')) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-buttons');
        }

        if (strpos($post_content, 'showreel_section') || strpos($post_content, 'contact_map') || strpos($post_content, 'content_page_') || strpos($post_content, 'services_boxed')) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-pages');
        }

        if (preg_match('/_class="person.{2,}M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-persons');
        }

        if (preg_match('/_class="slider.{3,}M/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-slider');
        }

        if (strpos($post_content, 'aboutM') || strpos($post_content, 'about_page_bonusM')) {
            add_post_meta($post_id, 'ddp-css-mermaid', 'mermaid-about-page');
        }

        // Mozart

        if (strpos($post_content, 'moz_about_')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-about');
        }

        if (strpos($post_content, 'mozart_accountant')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-accountant');
        }

        if (strpos($post_content, 'author-info')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-author');
        }

        if (strpos($post_content, 'moz_simple_blog') || strpos($post_content, 'moz_blog')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-blog');
        }

        if (strpos($post_content, 'cat_page_content')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-category-page');
        }

        if (strpos($post_content, 'mozart_coach_')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-coach');
        }

        if (strpos($post_content, 'mozart_conference_')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-conference');
        }

        if (strpos($post_content, 'mozart_consult')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-consulting');
        }

        if (strpos($post_content, 'moz_contact')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-contact');
        }

        if (strpos($post_content, 'mozart_corporation')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-corporation');
        }

        if (strpos($post_content, 'moz_dig_bus')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-digital-business');
        }

        if (strpos($post_content, 'mozart_faq') || strpos($post_content, 'mazart_faq')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-faq');
        }

        if (strpos($post_content, 'mozart_footer')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-footer');
        }

        if (strpos($post_content, 'mozart_consult_header') || strpos($post_content, 'moz-header1') ) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-header');
        }

        if (strpos($post_content, 'case_study_') || strpos($post_content, 'moz_content_page') || strpos($post_content, 'moz_video_section') || strpos($post_content, 'moz_services_') || strpos($post_content, 'moz_list_style')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-inside');
        }

        if (strpos($post_content, 'mozart_investment')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-investment');
        }

        if (strpos($post_content, 'mozart_law') || strpos($post_content, 'mozart_text_boxes') ) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-law');
        }

        if (strpos($post_content, 'single_blog_page_content')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-single-post');
        }

        if (strpos($post_content, 'mozart_start_up')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-start-up');
        }

        if (strpos($post_content, 'moz_team_')) {
            add_post_meta($post_id, 'ddp-css-mozart', 'mozart-team');
        }

        //Pegasus
        if (strpos($post_content, 'pegasus_blog')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-blog-pages');
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-blogs');
        }

        if (strpos($post_content, 'pegasus-blurb')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-blurb');
        }

        if (strpos($post_content, 'pegasus-cta')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-cta');
        }

        if (strpos($post_content, 'contact_page_') || strpos($post_content, 'contact-page') ) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-contact-page');
        }

        if (strpos($post_content, 'pegasus-content')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-content');
        }

        if (strpos($post_content, 'pegasus-footer')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-footer');
        }

        if (strpos($post_content, 'pegasus_form')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-forms');
        }

        if (strpos($post_content, 'pegasus_header')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-headers');
        }

        if (strpos($post_content, 'pegasus-landscape-portfolio') || strpos($post_content, 'pegasus_agency_video') || strpos($post_content, 'pegasus_about_us') || strpos($post_content, 'pegasus_about_us2') || strpos($post_content, 'pegasus_team_landing')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-pages');
        }

        if (strpos($post_content, 'pegasus_person')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-persons');
        }

        if (strpos($post_content, 'pegasus_portfolio')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-portfolio');
        }

        if (strpos($post_content, 'pegasus_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-pricing-tables');
        }

        if (strpos($post_content, 'pegasus_project_planner')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-project-planner-page');
        }

        if (strpos($post_content, 'pegasus_slider')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-sliders');
        }

        if (strpos($post_content, 'pegasus_tabs')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-tabs');
        }

        if (strpos($post_content, 'pegasus-tstm')) {
            add_post_meta($post_id, 'ddp-css-pegasus', 'pegasus-testimonials');
        }

        // Pixie

        if (preg_match('/blog_._pixie/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-blog');
        }

        if (strpos($post_content, 'pixie_blurb')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-blurbs');
        }

        if (strpos($post_content, 'pixie-cta')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-cta');
        }

        if (strpos($post_content, 'pixie-contact-basic-map')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-contact-basic-map');
        }

        if (strpos($post_content, 'pixie-contact')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-contact');
        }

        if (strpos($post_content, 'pixie-content')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-content');
        }

        if (strpos($post_content, 'pixie-footer') || strpos($post_content, 'pixel-footer')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-footer');
        }

        if (strpos($post_content, 'pixie-header')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-headers');
        }

        if (strpos($post_content, 'pixie')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-master');
        }

        if (strpos($post_content, 'pixie_numbers')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-numbers');
        }

        if (strpos($post_content, 'pixie_person')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-person');
        }

        if (strpos($post_content, 'portfolio_content') || strpos($post_content, 'portfolio_slider')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-personal-portfolio');
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-project-page');
        }

        if (strpos($post_content, 'pixie_portfolio')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-portfolio');
        }

        if (strpos($post_content, 'pricing_tables_pixie')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-pricing-tables');
        }

        if (strpos($post_content, 'pixie_tabs')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-tabs');
        }

        if (strpos($post_content, 'pixie_testimonials')) {
            add_post_meta($post_id, 'ddp-css-pixie', 'pixie-testimonials');
        }

        // Unicorn

        if (preg_match('/_class="blog_./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-blog');
        }

        if (preg_match('/_class="blurb.{2,}/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-blurbs');
        }

        if (preg_match('/_class="contact_./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-contact-form');
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-contact-page');
        }

        if (preg_match('/_class="content.{1,}/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-content');
        }

        if (preg_match('/_class="form_./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-optin');
        }

        if (preg_match('/_class="features.{1,}/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-feature');
        }

        if (preg_match('/_class="footer./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-footer');
        }

        if (preg_match('/_class="header./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-header');
        }

        if (preg_match('/_class="team.{1,}/', $post_content) || preg_match('/_class="team."/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-person');
        }

        if (preg_match('/_class="price_table_./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-pricing-tables');
        }

        if (preg_match('/_class="testimonial./', $post_content)) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-testimonials');
        }

        if (strpos($post_content, 'unicorn_about')) {
            add_post_meta($post_id, 'ddp-css-unicorn', 'unicorn-about-bonus');
        }


        // Venus

        if (preg_match('/_class="blog._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'blog');
        }


        if (preg_match('/_class="blurb._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'blurbs');
        }


        if (preg_match('/_class="contact_form._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'contact');
        }


        if (preg_match('/_class="cta._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'cta');
        }


        if (preg_match('/_class="faq._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'faq');
        }


        if (preg_match('/_class="feature.-venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'features');
        }


        if (preg_match('/_class="header._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'header');
        }


        if (preg_match('/_class="person.-venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'person');
        }


        if (preg_match('/_class="pricing-tables.-venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'pricing-tables');
        }


        if (preg_match('/_class="optin_module._venus/', $post_content)) {
            add_post_meta($post_id, 'ddp-css-venus', 'subscribe');
        }


        // Sigmund

        if (strpos($post_content, 'about_us1') || strpos($post_content, 'about_us2') || strpos($post_content, 'about_us3') || strpos($post_content, 'about_me1') || strpos($post_content, 'header-socialmedia') || strpos($post_content, 'about_me2') || strpos($post_content, 'cv-socialmedia')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'about-pages');
        }


        if (strpos($post_content, 'studio_blurbs') || strpos($post_content, 'skills_blurbs') || strpos($post_content, 'studio_blurbs') || strpos($post_content, 'job_Experience_blurbs') || strpos($post_content, 'counting_Blurbs') || strpos($post_content, 'timeline_process_blurbs') || strpos($post_content, 'sigmund_blurbs') || strpos($post_content, 'cute_circle_blurbs') || strpos($post_content, 'helpful_blurbs') || strpos($post_content, 'lovely_blurb') || strpos($post_content, 'Interests_blurbs') || strpos($post_content, 'contact_us3_growing_blurbs') || strpos($post_content, 'sigmund_blurbs_images_hover') ) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'blurbs');
        }

         if (strpos($post_content, 'contact_form_header') || strpos($post_content, 'pop_form_contact') || strpos($post_content, 'sigmund_blurbs_social_hover') || strpos($post_content, 'sigmund_hover_effect_article') || strpos($post_content, 'sigmund_pages_footer') || strpos($post_content, 'questions_header ') || strpos($post_content, 'contact_us1_blurbs') || strpos($post_content, 'get_in_touch_form') || strpos($post_content, 'contact_us3_growing_blurbs') || strpos($post_content, 'compact_cta') || strpos($post_content, 'studio_blurbs') || strpos($post_content, 'sigmun_make_jump_header') || strpos($post_content, 'sigmund_home2_big_pop_person') || strpos($post_content, 'contact_us_2_contact_team') || strpos($post_content, 'text_effect_slider')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'contact-pages');
        }

        if (strpos($post_content, 'pop_form_contact') || strpos($post_content, 'support_form')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'contact');
        }

        if (strpos($post_content, 'pop_form')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'forms');
        }

        if (strpos($post_content, 'sigmund_hover_effect') || strpos($post_content, 'sigmund_column_hover_effect') || strpos($post_content, 'sigmund_blurbs_images_hover') || strpos($post_content, 'blurb_4_header') || strpos($post_content, 'triangle_header') || strpos($post_content, 'image_split_header')  || strpos($post_content, 'animate_header') || strpos($post_content, 'our_office_header') || strpos($post_content, 'questions_header') || strpos($post_content, 'contact_form_header') || strpos($post_content, 'sigmund_say_hello_header')  || strpos($post_content, 'sigmun_make_jump_header')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'headers');
        }

        if (strpos($post_content, 'office_top_row') || strpos($post_content, 'our_office') || strpos($post_content, 'blurb_module_text') || strpos($post_content, 'map_form_contact')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'office');
        }

        if (strpos($post_content, 'engaging_person') || strpos($post_content, 'hello_person') || strpos($post_content, 'sweet_person_module') || strpos($post_content, 'big_pop_person') || strpos($post_content, 'sigmund_home2_big_pop_person')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'persons');
        }

        if (strpos($post_content, 'pleasing_portfolio') || strpos($post_content, 'pop_portfolio')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'portfolio');
        }

        if (strpos($post_content, 'sigmund_committed_content') || strpos($post_content, 'sigmund_home2_result_content')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'contents');
        }

        if (strpos($post_content, 'sigmund_showcase_cta') || strpos($post_content, 'sigmund_start_project_cta')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'cta');
        }

        if (strpos($post_content, 'pricing2_questions') || strpos($post_content, 'sigmund_boxey_faq')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'faq');
        }

        if (strpos($post_content, 'sigmund_logos_section')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'table-page1');
        }

        if (strpos($post_content, 'sigmund_landscape_pricing_tables') || strpos($post_content, 'sigmund_tall_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'pricing-tables');
        }

        if (strpos($post_content, 'sigmund_big_options_content') || strpos($post_content, 'sigmund_pricing1_intro_content') || strpos($post_content, 'pricing2_questions') || strpos($post_content, 'sigmund_services_skills_blurbs')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'services-page1');
        }

        if (strpos($post_content, 'sigmund_cute_slider') || strpos($post_content, 'sigmund_team_text_effect_slider') || strpos($post_content, 'sigmund_text_effect_slider')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'team-page1');
        }

        if (strpos($post_content, 'sigmund_achieved_content') || strpos($post_content, 'sigmund_team3_engaging_person')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'team-page2');
        }

        if (strpos($post_content, 'intro_tabs')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'tabs');
        }

        if (strpos($post_content, 'blue_accordion')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'accordion');
        }

        if (strpos($post_content, 'Rated_testimonials') || strpos($post_content, 'incredible_testimonials')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'testimonials');
        }

         if (strpos($post_content, 'sigmund_pages_footer')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'footers');
        }

        if (strpos($post_content, 'sigmund_tailored_testimonails') || strpos($post_content, 'sigmund_pricing1_testimnoials') || strpos($post_content, 'sigmund_home2_testimonial')) {
            add_post_meta($post_id, 'ddp-css-sigmund', 'testimonials');
        }


        // Impi

        if (strpos($post_content, 'impi_3col_partner_header') || strpos($post_content, 'impi_question_header') || strpos($post_content, 'impi_next_here_header') || strpos($post_content, 'impi_ally_header') || strpos($post_content, 'impi_endorser_header') || strpos($post_content, 'impi_top_dog_header') || strpos($post_content, 'impi_about_me_question_header')) {
            add_post_meta($post_id, 'ddp-css-impi', 'headers');
        }

        if (strpos($post_content, 'impi_circle_click_testimonials') || strpos($post_content, 'impi_3_col_testimonails') || strpos($post_content, 'impi_trooper_testimonial') || strpos($post_content, 'impi_victor_testimonials')) {
            add_post_meta($post_id, 'ddp-css-impi', 'testimonials');
        }

        if (strpos($post_content, 'impi_blurbs') || strpos($post_content, 'impi_partner_benefits_blurbs') || strpos($post_content, 'impi_neat_circle_blurbs') || strpos($post_content, 'impi_all_plans_blurbs') || strpos($post_content, 'impi_patron_blurbs') || strpos($post_content, 'impi_work_with_blurbs') || strpos($post_content, 'impi_perks_blurbs') || strpos($post_content, 'impi_faq2_accordion')) {
            add_post_meta($post_id, 'ddp-css-impi', 'blurbs');
        }

        if (strpos($post_content, 'impi_pink_faq_accordion') || strpos($post_content, 'impi_pink_accordion') || strpos($post_content, 'impi_faq2_accordion')) {
            add_post_meta($post_id, 'ddp-css-impi', 'faq');
        }

        if (strpos($post_content, 'impi_fill_me_portfolio') || strpos($post_content, 'impi_warrior_slider_portfolio') || strpos($post_content, 'impi_champ_portfolio') || strpos($post_content, 'impi_about_me_portfolio')) {
            add_post_meta($post_id, 'ddp-css-impi', 'portfolio');
        }

        if (strpos($post_content, 'impi_person') || strpos($post_content, 'impi_box_slider_person') || strpos($post_content, 'impi_guardian_person')) {
            add_post_meta($post_id, 'ddp-css-impi', 'persons');
        }

        if (strpos($post_content, 'impi_home')) {
            add_post_meta($post_id, 'ddp-css-impi', 'home-pages');
        }

        if (strpos($post_content, 'impi_supporter_woo_products')) {
            add_post_meta($post_id, 'ddp-css-impi', 'products');
        }

        if (strpos($post_content, 'impi_services')) {
            add_post_meta($post_id, 'ddp-css-impi', 'service-pages');
        }

        if (strpos($post_content, 'side_by_side_blog') || strpos($post_content, 'impi_fill_up_blog') || strpos($post_content, 'impi_postcard_blog') || strpos($post_content, 'impi_timeline_blog')) {
            add_post_meta($post_id, 'ddp-css-impi', 'blogs');
        }

        if (strpos($post_content, 'impi_say_hello_form') || strpos($post_content, 'impi_get_in_touch_form') || strpos($post_content, 'impi_paladin_signup') || strpos($post_content, 'impi_tight_cta')) {
            add_post_meta($post_id, 'ddp-css-impi', 'forms');
        }

        if (strpos($post_content, 'impi_pro_pricing_table') || strpos($post_content, 'impi_box_pricing_tables') || strpos($post_content, 'impi_fill_up_pricing_tables') || strpos($post_content, 'impi_victor_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-impi', 'pricing-tables');
        }

        if (strpos($post_content, 'impi_slider') || strpos($post_content, 'impi_heroine_product_slider') || strpos($post_content, 'impi_endorser_slider') || strpos($post_content, 'impi_our_work_slider')) {
            add_post_meta($post_id, 'ddp-css-impi', 'sliders');
        }

        if (strpos($post_content, 'impi_pages_footer')) {
            add_post_meta($post_id, 'ddp-css-impi', 'footers');
        }

        if (strpos($post_content, 'impi_about')) {
            add_post_meta($post_id, 'ddp-css-impi', 'about-page');
        }

        if (strpos($post_content, 'impi_stories_content') || strpos($post_content, 'impi_clients_content') || strpos($post_content, 'impi_learn_more_content') || strpos($post_content, 'impi_accredit_intro_content') || strpos($post_content, 'impi_123_video_content') || strpos($post_content, 'impi_mid_way_content') || strpos($post_content, 'impi_low_down_content') || strpos($post_content, 'impi_ally_content') || strpos($post_content, 'impi_boxy_case_study_content') || strpos($post_content, 'impi_case_study_video_content') || strpos($post_content, 'impi_about_me_text_content') || strpos($post_content, 'impi_about_me_clients_content')|| strpos($post_content, 'impi_about_me_specialization') || strpos($post_content, 'impi_opening_content')) {
            add_post_meta($post_id, 'ddp-css-impi', 'contents');
        }

        if (strpos($post_content, 'impi_get_started_cta') || strpos($post_content, 'impi_tight_cta')) {
            add_post_meta($post_id, 'ddp-css-impi', 'cta');
        }

        if (strpos($post_content, 'impi_intro_logos')) {
            add_post_meta($post_id, 'ddp-css-impi', 'logos');
        }

        if (strpos($post_content, 'impi_team')) {
            add_post_meta($post_id, 'ddp-css-impi', 'team-page');
        }

        // Jamie

        if (strpos($post_content, 'jamie_about')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'about');
        }

        if (strpos($post_content, 'jamie_blog_6') || strpos($post_content, 'jamiefooter2')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'blog-landing-1');
        }

        if (strpos($post_content, 'jamie_blog')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'blog');
        }

        if (strpos($post_content, 'jamie_contact')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'contact');
        }

        if (strpos($post_content, 'jamie-content')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'content');
        }

        if (strpos($post_content, 'jamie-events')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'events');
        }

        if (strpos($post_content, 'jamie_footer')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'footer');
        }

        if (strpos($post_content, 'jamie_home')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'home');
        }

        if (strpos($post_content, 'jamie_menu')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'menu');
        }

        if (strpos($post_content, 'jamie_services')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'services');
        }

        if (strpos($post_content, 'jamie-team-detail')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'team-detail');
        }

        if (strpos($post_content, 'jamie-team-page')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'team-page');
        }

        if (strpos($post_content, 'jamie-home-bar') || strpos($post_content, 'jamie_bar') || strpos($post_content, 'jamie_home_bunner_bar')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'home-bar-page');
        }

        if (strpos($post_content, 'jamie-home-hotel')) {
            add_post_meta($post_id, 'ddp-css-jamie', 'home-hotel-page');
        }


         // Coco

        if (strpos($post_content, 'coco_chic_blurbs') || strpos($post_content, 'coco_eclectic_blurbs') || strpos($post_content, 'coco_shop_blurbs') || strpos($post_content, 'coco_decide_blurbs') || strpos($post_content, 'coco_kind_blurbs') || strpos($post_content, 'coco_decorative_blurbs')) {
            add_post_meta($post_id, 'ddp-css-coco', 'blurbs');
        }

        if (strpos($post_content, 'coco_sleek_footer') || strpos($post_content, 'coco_basic_footer') || strpos($post_content, 'coco_step_footer') || strpos($post_content, 'coco_drop_footer')|| strpos($post_content, 'coco_cast_footer') || strpos($post_content, 'coco_boxy_footer') || strpos($post_content, 'coco_image_footer') || strpos($post_content, 'coco_square_footer') || strpos($post_content, 'coco_idea_footer') || strpos($post_content, 'coco_services_simple_footer')) {
            add_post_meta($post_id, 'ddp-css-coco', 'footers');
        }

        if (strpos($post_content, 'coco_empowered_slider_header') || strpos($post_content, 'coco_style_header') || strpos($post_content, 'coco_go_header') || strpos($post_content, 'coco_fresh_header') || strpos($post_content, 'coco_groove_header') || strpos($post_content, 'coco_want_header') || strpos($post_content, 'coco_empowered_header') || strpos($post_content, 'coco_cult_header') || strpos($post_content, 'coco_image_swop_header') || strpos($post_content, 'coco_tailor_header') || strpos($post_content, 'coco_property_header') || strpos($post_content, 'coco_convert_header') || strpos($post_content, 'coco_services_header') || strpos($post_content, 'coco_in_the_loop_contact_header')) {
            add_post_meta($post_id, 'ddp-css-coco', 'headers');
        }

        if (strpos($post_content, 'coco_flashy_pricing_tabels') || strpos($post_content, 'coco_bold_pricing_tables') || strpos($post_content, 'coco_want_pricing_table') || strpos($post_content, 'coco_hip_pricing_tables') || strpos($post_content, 'coco_flashy_pricing_tabels') || strpos($post_content, 'coco_together_pricing_tables') || strpos($post_content, 'coco_smart_pricing_tables') || strpos($post_content, 'coco_sqweez2_want_pricing_table')) {
            add_post_meta($post_id, 'ddp-css-coco', 'pricing-tables');
        }

        if (strpos($post_content, 'coco_artistic_signup')) {
            add_post_meta($post_id, 'ddp-css-coco', 'newsletter');
        }

        if (strpos($post_content, 'coco_lifestyle_slider') || strpos($post_content, 'coco_case_study_slider') || strpos($post_content, 'coco_vogue_slider') || strpos($post_content, 'coco_sassy_slider') || strpos($post_content, 'coco_our_history_timeline')) {
            add_post_meta($post_id, 'ddp-css-coco', 'sliders');
        }

        if (strpos($post_content, 'coco_dotty_content') || strpos($post_content, 'coco_snappy_content') || strpos($post_content, 'coco_magical_content') || strpos($post_content, 'coco_committed_content') || strpos($post_content, 'coco_ability_content') || strpos($post_content, 'coco_class_content') || strpos($post_content, 'coco_start_today_content') || strpos($post_content, 'coco_tone_content') || strpos($post_content, 'coco_fit_content') || strpos($post_content, 'coco_good_intro_content') || strpos($post_content, 'coco_direct_content') || strpos($post_content, 'coco_peasant_conten') || strpos($post_content, 'coco_wow_case_study') || strpos($post_content, 'coco_dream_case_study') || strpos($post_content, 'coco_we_are_content') || strpos($post_content, 'coco_desire_content') || strpos($post_content, 'coco_this_way_that_way_content') || strpos($post_content, 'coco_video_content') || strpos($post_content, 'coco_champions_content') || strpos($post_content, 'coco_contact_basic_dream_case_study') || strpos($post_content, 'coco_applique_content') || strpos($post_content, 'coco_history_wow_case_study')){
            add_post_meta($post_id, 'ddp-css-coco', 'content');
        }

        if (strpos($post_content, 'coco_intend_testimonial') || strpos($post_content, 'coco_attitude_testimonial') || strpos($post_content, 'coco_diva_testimonials') || strpos($post_content, 'coco_tab_testimonials') || strpos($post_content, 'demo_tab_testimonials') || strpos($post_content, 'coco_tab_testimonials') || strpos($post_content, 'coco_love_testimonial')  || strpos($post_content, 'coco_popular_testimonials') || strpos($post_content, 'coco_grow_testimonials') || strpos($post_content, 'coco_gaiter_testimonials')) {
            add_post_meta($post_id, 'ddp-css-coco', 'testimonials');
        }

        if (strpos($post_content, 'coco_objective_portfolio') || strpos($post_content, 'coco_decor_portfolio')) {
            add_post_meta($post_id, 'ddp-css-coco', 'portfolio');
        }

        if (strpos($post_content, 'coco_purpose_call_to_action') || strpos($post_content, 'coco_hello_call_to_action') || strpos($post_content, 'coco_target_call_to_action') || strpos($post_content, 'coco_groovy_sign_up') || strpos($post_content, 'coco_display_call_to_action') || strpos($post_content, 'coco_target_call_to_action')) {
            add_post_meta($post_id, 'ddp-css-coco', 'cta');
        }

        if (strpos($post_content, 'coco_idea_person_module') || strpos($post_content, 'coco_tall_person_module') || strpos($post_content, 'coco_sleek_person') || strpos($post_content, 'coco_catwalk_person') || strpos($post_content, 'coco_tall_person_module_cont')) {
            add_post_meta($post_id, 'ddp-css-coco', 'persons');
        }

        if (strpos($post_content, 'coco_committed_content') || strpos($post_content, 'coco_dotty_content') || strpos($post_content, 'coco_objective_portfolio')) {
            add_post_meta($post_id, 'ddp-css-coco', 'image-loader');
        }

        if (strpos($post_content, 'coco_say_hello_form') || strpos($post_content, 'coco_convert_header')) {
            add_post_meta($post_id, 'ddp-css-coco', 'forms');
        }

        if (strpos($post_content, 'coco_contact_page_banner') || strpos($post_content, 'coco_contact_intro_section') || strpos($post_content, 'coco_contact_page_footer')) {
            add_post_meta($post_id, 'ddp-css-coco', 'contact-page');
        }

        if (strpos($post_content, 'coco_hot_new_products') || strpos($post_content, 'coco_hot_featured_products')) {
            add_post_meta($post_id, 'ddp-css-coco', 'products');
        }

         if (strpos($post_content, 'coco_ecommerce_style_header')) {
            add_post_meta($post_id, 'ddp-css-coco', 'ecommerce-pages');
        }


        // Demo

        if (strpos($post_content, 'demo_personal_trainer')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-personal-trainer-page');
        }

        if (strpos($post_content, 'demos_dentist')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-dentist-page');
        }

        if (strpos($post_content, 'demo_electrician')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-electrician-page');
        }

        if (strpos($post_content, 'demo_driving_school')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-driving-school-page');
        }

        if (strpos($post_content, 'demo_vet')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-vet-page');
        }

        if (strpos($post_content, 'demo_plumber')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-plumber-page');
        }

        if (strpos($post_content, 'demo_landscaping')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-landscaping-page');
        }

        if (strpos($post_content, 'demo_band')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-band-page');
        }

        if (strpos($post_content, 'demo_hairdresser')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-hairdresser-page');
        }

        if (strpos($post_content, 'demo_high_school')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-high-school-page');
        }

        if (strpos($post_content, 'demo_ngo')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-ngo-page');
        }

        if (strpos($post_content, 'demo_onlineapp')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-onlineapp');
        }

        if (strpos($post_content, 'demo_real_estate')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-real-estate');
        }

        if (strpos($post_content, 'demo_handyman')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-handyman');
        }

        if (strpos($post_content, 'demo_catering')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-catering');
        }

        if (strpos($post_content, 'demo_call_center')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-call-center');
        }

        if (strpos($post_content, 'demo_dance_studio')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-dance-studio');
        }

        if (strpos($post_content, 'demo_clinic')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-clinic');
        }

        if (strpos($post_content, 'demo_florist')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-florist');
        }

        if (strpos($post_content, 'demo_cleaner')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-cleaner');
        }

        if (strpos($post_content, 'dietitian_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-dietitian');
        }

        if (strpos($post_content, 'factory_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-factory');
        }

        if (strpos($post_content, 'flooring_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-flooring');
        }

        if (strpos($post_content, 'movers_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-movers');
        }

        if (strpos($post_content, 'logistics_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-logistics');
        }

        if (strpos($post_content, 'kindergarten_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-kindergarten');
        }

        if (strpos($post_content, 'massage_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-massage');
        }

        if (strpos($post_content, 'model_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-model');
        }

        if (strpos($post_content, 'novelist_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-novelist');
        }

        if (strpos($post_content, 'psyhologist_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-psychologist');
        }

        if (strpos($post_content, 'ski_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-ski');
        }

        if (strpos($post_content, 'wedding_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-wedding');
        }

        if (strpos($post_content, 'taxi_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-taxi');
        }

        if (strpos($post_content, 'tea_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-tea');
        }

        if (strpos($post_content, 'summer_camp_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-summer-camp');
        }

        if (strpos($post_content, 'tailor_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-tailor');
        }

        if (strpos($post_content, 'surf_club_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-surf-club');
        }

        if (strpos($post_content, 'beer_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-beer');
        }

        if (strpos($post_content, 'translator_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-translator');
        }

        if (strpos($post_content, 'vegetable_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-vegetable');
        }

        if (strpos($post_content, 'demo_photographer')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-photographer');
        }

        if (strpos($post_content, 'demo_eat_your_slider')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-eat-your-slider');
        }

        if (strpos($post_content, 'camp_ground_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-camp-ground');
        }

        if (strpos($post_content, 'wine_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-wine');
        }

        if (strpos($post_content, 'upholsterer_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-upholsterer');
        }

        if (strpos($post_content, 'marina_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-marina');
        }

        if (strpos($post_content, 'nail_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-nail');
        }

        if (strpos($post_content, 'print_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-print');
        }

        if (strpos($post_content, 'security_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-security');
        }

        if (strpos($post_content, 'animalshelter_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-animalshelter');
        }

        if (strpos($post_content, 'horse_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-horse');
        }

        if (strpos($post_content, 'icecream_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-icecream');
        }

        if (strpos($post_content, 'demo_fight_')) {
            add_post_meta($post_id, 'ddp-css-demo', 'demo-fight');
        }


        // Diana

        if (strpos($post_content, 'diana_stately_blog') || strpos($post_content, 'diana_baronial_blog')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blogs');
        }

        if (strpos($post_content, 'diana_extraordinary_blurbs') || strpos($post_content, 'diana_great_intro_blurbs') || strpos($post_content, 'diana_marked_blurbs') || strpos($post_content, 'diana_no_sweat_blurbs') || strpos($post_content, 'diana_common_blurbs') || strpos($post_content, 'diana_petticoat_blurbs') || strpos($post_content, 'diana_about2_blurbs') || strpos($post_content, 'diana_gal_blurbs') || strpos($post_content, 'diana_great_flip_blurbs') || strpos($post_content, 'diana_eminent_contact_blurbs') || strpos($post_content, 'diana_grandiose_blurbs') || strpos($post_content, 'diana_home8_blurbs') || strpos($post_content, 'diana_tycoon_blurbs') || strpos($post_content, 'diana_babe_blurbs') || strpos($post_content, 'diana_yes_please_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blurbs');
        }

        if (strpos($post_content, 'diana_brilliant_content') || strpos($post_content, 'diana_home2_content') || strpos($post_content, 'diana_evident_video_content') || strpos($post_content, 'diana_boxey_content') || strpos($post_content, 'diana_love_this_content') || strpos($post_content, 'diana_magnificent_content') || strpos($post_content, 'diana_mama_content') || strpos($post_content, 'diana_case_study_content') || strpos($post_content, 'diana_doll_content') || strpos($post_content, 'diana_tour_timeline') || strpos($post_content, 'diana_video_content') || strpos($post_content, 'diana_special_content') || strpos($post_content, 'diana_superb_content') || strpos($post_content, 'diana_highborn_content') || strpos($post_content, 'diana_renowned_content') || strpos($post_content, 'diana_kingly_content ') || strpos($post_content, 'diana_glorious_content') || strpos($post_content, 'diana_reputable_content') ||strpos($post_content, 'diana_right_bullet_content') || strpos($post_content, 'diana_left_bullet_content') || strpos($post_content, 'diana_news_intro_content') || strpos($post_content, 'diana_crowned_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-contents');
        }

        if (strpos($post_content, 'diana_marked_footer') || strpos($post_content, 'diana_glorious_footer') || strpos($post_content, 'diana_piece_of_cake_footer') || strpos($post_content, 'diana_ample_footer') || strpos($post_content, 'diana_dignified_footer') || strpos($post_content, 'diana_salient_footer') || strpos($post_content, 'diana_judge_footer') || strpos($post_content, 'diana_home9_footer')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-footers');
        }

        if (strpos($post_content, 'diana_celebrated_header') || strpos($post_content, 'diana_noted_header') || strpos($post_content, 'diana_noble_header') || strpos($post_content, 'diana_majestic_header') || strpos($post_content, 'diana_authoritative_header') || strpos($post_content, 'diana_simple_social_header') || strpos($post_content, 'diana_case_study_header') || strpos($post_content, 'diana_fancy_header') || strpos($post_content, 'diana_leader_header') || strpos($post_content, 'diana_showy_header') || strpos($post_content, 'diana_discover_header') || strpos($post_content, 'diana_dean_header') || strpos($post_content, 'diana_top_brass_header') || strpos($post_content, 'diana_fashion_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-headers');
        }

        if (strpos($post_content, 'diana_noble_person_module') || strpos($post_content, 'diana_high_person') || strpos($post_content, 'diana_vip_person_module') || strpos($post_content, 'diana_light_person_module') || strpos($post_content, 'diana_simple_person_module') || strpos($post_content, 'diana_dignified_person_module') || strpos($post_content, 'diana_officer_person_module') || strpos($post_content, 'diana_executive_person_module')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-persons');
        }

        if (strpos($post_content, 'diana_famed_slider') || strpos($post_content, 'diana_prominent_slider') || strpos($post_content, 'diana_princely_slider') || strpos($post_content, 'diana_imperial_slider') || strpos($post_content, 'diana_dig_slider')  || strpos($post_content, 'diana_crowned_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-sliders');
        }

        if (strpos($post_content, 'diana_royal_testimonial') || strpos($post_content, 'diana_celebrated_testimonial') || strpos($post_content, 'diana_boxy_testimonials') || strpos($post_content, 'diana_no_sweat_testimonials') || strpos($post_content, 'diana_cute_testimonial') || strpos($post_content, 'diana_numbers_testimonial')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-testimonials');
        }

        if (strpos($post_content, 'diana_animated_eye_404')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-404');
        }

        if (strpos($post_content, 'diana_vetical_coming_soon')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-vetical-coming-soon');
        }

        if (strpos($post_content, 'diana_full_width_under_construction')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-full-width-under-construction');
        }

        if (strpos($post_content, 'diana_sticky_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-sticky-bars');
        }

        if (strpos($post_content, 'diana_overlays_popup')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-pop-up');
        }

        if (strpos($post_content, 'diana_mare_cta') || strpos($post_content, 'diana_eminent_call_to_action')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-cta');
        }

        if (strpos($post_content, 'diana_single_post_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-single-post-v1');
        }

        if (strpos($post_content, 'diana_side_strip_numbers') || strpos($post_content, 'diana_chief_numbers')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-numbers');
        }

        if (strpos($post_content, 'diana_ruling_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-ruling-header');
        }

        if (strpos($post_content, 'diana_venerable_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-pricing-tables');
        }

        if (strpos($post_content, 'diana_fashion_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-fashion-header');
        }

        if (strpos($post_content, 'diana_authoritative_products')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-authoritative-products');
        }

        if (strpos($post_content, 'diana_about_four')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-about-four');
        }

        if (strpos($post_content, 'diana_norma_jean_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-norma-jean-content');
        }

        if (strpos($post_content, 'diana_never_knew_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-never-knew-content');
        }

        if (strpos($post_content, 'diana_no_sweat_v2_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-no-sweat-v2-blurbs');
        }

        if (strpos($post_content, 'diana_you_change_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-you-change-content');
        }

        if (strpos($post_content, 'diana_woodwork_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-woodwork-header');
        }

        if (strpos($post_content, 'diana_treadmill_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-treadmill-content');
        }

        if (strpos($post_content, 'diana_your_brain_call_to_action')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-your-brain-call-to-action');
        }

        if (strpos($post_content, 'diana_your_name_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-your-name-content');
        }

        if (strpos($post_content, 'diana_cling_to_testimonial')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-cling-to-testimonial');
        }

        if (strpos($post_content, 'diana_known_you_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-known-you-content');
        }

        if (strpos($post_content, 'diana_seems_numbers')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-seems-numbers');
        }

        if (strpos($post_content, 'diana_your_life_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-your-life-content');
        }

        if (strpos($post_content, 'diana_set_in_call_to_action')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-set-in-call-to-action');
        }

        if (strpos($post_content, 'diana_boxey_v2_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-boxey-v2-content');
        }

        if (strpos($post_content, 'diana_in_the_wind_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-content-in-the-wind');
        }

        if (strpos($post_content, 'diana_candle_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blurbs-candle');
        }

        if (strpos($post_content, 'diana_cling_to_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-content-cling-to');
        }

        if (strpos($post_content, 'diana_set_in_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-content-set-in');
        }

        if (strpos($post_content, 'diana_always_know_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-content-always-know');
        }

        if (strpos($post_content, 'diana_big_dream_cta')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-cta-big-dream');
        }

        if (strpos($post_content, 'diana_ever_did_header')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-header-ever-did');
        }

        if (strpos($post_content, 'diana_your_legend_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blurbs-your-legend');
        }

        if (strpos($post_content, 'diana_who_sees_content')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-content-who-sees');
        }

        if (strpos($post_content, 'diana_just_our_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blurbs-just-our');
        }

        if (strpos($post_content, 'diana_goodbye_blurbs')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-blurbs-goodbye');
        }

        if (strpos($post_content, 'diana_just_a_kid_testimonial')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-testimonial-just-a-kid');
        }

        if (strpos($post_content, 'diana_services_button')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana-services-button');
        }

        // Menus

        if (strpos($post_content, 'menu1_logo_section')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_1');
        }
        if (strpos($post_content, 'menu2_top_section')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_2');
        }
        if (strpos($post_content, 'menu3_top_section')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_3');
        }
        if (strpos($post_content, 'diana_arch_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_4');
        }
        if (strpos($post_content, 'diana_first_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_5');
        }
        if (strpos($post_content, 'diana_champion_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_6');
        }
        if (strpos($post_content, 'diana_front_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_7');
        }
        if (strpos($post_content, 'diana_leading_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_8');
        }
        if (strpos($post_content, 'diana_main_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_9');
        }
        if (strpos($post_content, 'diana_pioneer_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_10');
        }
        if (strpos($post_content, 'diana_premier_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_11');
        }
        if (strpos($post_content, 'diana_prime_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_12');
        }
        if (strpos($post_content, 'diana_principal_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_13');
        }
        if (strpos($post_content, 'diana_stellar_menu')) {
            add_post_meta($post_id, 'ddp-css-diana', 'diana_menu_14');
        }


    // Freddie


        if (strpos($post_content, 'page_loader') || strpos($post_content, 'freddie_doing_all_right_content') || strpos($post_content, 'freddie_big_spender_intro_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-transitions');
        }

        // menu templates

        if (strpos($post_content, 'freddie_gimme_the_prize_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-prize');
        }

        if (strpos($post_content, 'freddie_attack_dragon_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-attac-dragon');
        }

        if (strpos($post_content, 'freddie_earth_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-earth');
        }

        if (strpos($post_content, 'freddie_funny_love_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-funny-love');
        }

        if (strpos($post_content, 'freddie_hang_on_in_there_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-hang-on-in-there');
        }

        if (strpos($post_content, 'freddie_lover_boy_menu_container')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-lover-boy');
        }

        if (strpos($post_content, 'freddie_hijack_my_heart')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-hijack-my-heart');
        }

        // usual modules

        if (strpos($post_content, 'freddie_kind_of_magic_header') || strpos($post_content, 'freddie_all_dead_header') || strpos($post_content, 'freddie_drowse_header') || strpos($post_content, 'freddie_for_everyone_header') || strpos($post_content, 'freddie_princes_of_the_universe') || strpos($post_content, 'freddie_fairy_king_header') || strpos($post_content, 'freddie_i_want_it_all_header') || strpos($post_content, 'freddie_bring_music_header') || strpos($post_content, 'freddie_dont_try_header') || strpos($post_content, 'freddie_the_show_header') || strpos($post_content, 'freddie_friends_header') || strpos($post_content, 'freddie_we_are_header') || strpos($post_content, 'freddie_hang_on_header') || strpos($post_content, 'freddie_born_to_header') || strpos($post_content, 'freddie_leap_ahead_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-headers');
        }

        if (strpos($post_content, 'frddie_all_dead_header_hero') || strpos($post_content, 'freddie_all_dead_header_hero')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-header-not-dead');
        }

        if (strpos($post_content, 'freddie_big_spender_intro_content') || strpos($post_content, 'freddie_body_langauge_content') || strpos($post_content, 'freddie_doing_all_right_content') || strpos($post_content, 'freddie_cool_cat_content') || strpos($post_content, 'freddie_fun_it_content') || strpos($post_content, 'freddie_fine_sensation_content') || strpos($post_content, 'freddie_innuendo_content') || strpos($post_content, 'freddie_info_content') || strpos($post_content, 'freddie_rain_must_fall_content') || strpos($post_content, 'freddie_scandal_content') || strpos($post_content, 'freddie_home6_images_content') || strpos($post_content, 'freddie_tutti_frutti_content') || strpos($post_content, 'freddie_artist_case_study_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-contents');
        }

        if (strpos($post_content, 'freddie_brighton_rock_blurbs') || strpos($post_content, 'freddie_fight_from_the_inside_blurbs') || strpos($post_content, 'freddie_good_company_blurbs') || strpos($post_content, 'freddie_blurred_vision_blurbs') || strpos($post_content, 'freddie_live_with_you_blurbs') || strpos($post_content, 'freddie_nevermore_blurbs') || strpos($post_content, 'freddie_now_im_here_blurbs') || strpos($post_content, 'freddie_tutti_blurbs') || strpos($post_content, 'freddie_home_studio_blurbs')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blurbs');
        }

        if (strpos($post_content, 'freddie_gimme_some_lovin_slider') || strpos($post_content, 'freddie_back_chat_slider') || strpos($post_content, 'freddie_love_you_slider')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-sliders');
        }

        if (strpos($post_content, 'freddie_hammer_to_fall_testimonals') || strpos($post_content, 'freddie_breakthru_testimonails') || strpos($post_content, 'freddie_seven_days_testmonail') || strpos($post_content, 'freddie_close_to_pleasure_testimonials') || strpos($post_content, 'freddie_frutti_testimonial')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-testimonials');
        }

        if (strpos($post_content, 'freddie_hello_mary_lou_pricing_tables')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pricing-tables');
        }

        if (strpos($post_content, 'freddie_the_miracle_footer') || strpos($post_content, 'freddie_prowl_footer') || strpos($post_content, 'freddie_father_to_son_footer') || strpos($post_content, 'freddie_open_windows_footer') || strpos($post_content, 'freddie_dear_friends_footer') || strpos($post_content, 'freddie_days_of_our_lifes_footer') || strpos($post_content, 'freddie_we_created_footer') || strpos($post_content, 'freddie_wavy_footer')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-footers');
        }

        if (strpos($post_content, 'freddie_blurred_vision_accordion')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-accordions');
        }

        if (strpos($post_content, 'freddie_dead_on_time_personal') || strpos($post_content, 'freddie_lap_of_gods_person_module') || strpos($post_content, 'freddie_waltz_person_module') || strpos($post_content, 'freddie_alive_on_time_person') || strpos($post_content, 'freddie_dead_on_time_person') || strpos($post_content, 'freddie-nevermore-person-module')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-persons');
        }

        if (strpos($post_content, 'freddie_drowse_blog') || strpos($post_content, 'freddie_hard_life_blog') || strpos($post_content, 'freddie_hot_and_cold_blog')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blogs');
        }

        if (strpos($post_content, 'freddie_more_info')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-more-info');
        }

        if (strpos($post_content, 'freddie_album')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-album');
        }

        if (strpos($post_content, 'freddie_song_slider')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-song-slider');
        }

        if (strpos($post_content, 'freddie_music')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-music');
        }

        if (strpos($post_content, 'freddie_music_speak_cta') || strpos($post_content, 'freddie_make_things_cta')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-cta');
        }

        if (strpos($post_content, 'freddie_process_circle')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-process-circle');
        }

        if (strpos($post_content, 'freddie_sidewalk_header')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-sidewalk-header');
        }

        if (strpos($post_content, 'freddie_song_for_lennon_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-song-for-lennon-content');
        }

        if (strpos($post_content, 'freddie_stealin_video_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-stealin-video-content');
        }

        if (strpos($post_content, 'freddie_sweet_lady_slider')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-sweet-lady-slider');
        }

        if (strpos($post_content, 'freddie_event')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-portfolio');
        }

        if (strpos($post_content, 'freddie_film_studio_header')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-film-studio-header');
        }

        if (strpos($post_content, 'freddie_bicycle_blurbs')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-bicycle-blurbs');
        }

        if (strpos($post_content, 'freddie_our_films_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-our-films-content');
        }

        if (strpos($post_content, 'freddie_race_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-race-content');
        }

        if (strpos($post_content, 'freddie_film_studio_music')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-film-studio-hitman-music-module');
        }

        if (strpos($post_content, 'freddie_nevermore_person_module')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-nevermore-person-module');
        }

        if (strpos($post_content, 'freddie_my_heart_header')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-heart-header');
        }

        if (strpos($post_content, 'freddie_blown_over_blurbs')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blown-over-blurbs');
        }

        if (strpos($post_content, 'freddie_by_the_way_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-by-the-way-content');
        }

        if (strpos($post_content, 'freddie_desert_me_faq')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-desert-me-faq');
        }

        if (strpos($post_content, 'freddie_other_day_testimonial')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-other-day-testimonial');
        }

        if (strpos($post_content, 'freddie_going_to_look_optin')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-going-to-look-optin');
        }

        if (strpos($post_content, 'freddie_be_better_footer')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-be-better-footer');
        }

        if (strpos($post_content, 'modern_times_blog_') || strpos($post_content, 'mtbs')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-modern-times-blog');
        }

        if (strpos($post_content, 'old-times-blog-') || strpos($post_content, 'otbs')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-old-times-blog');
        }

        if (strpos($post_content, 'freddie_let_me_header')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-let-me-header');
        }

        if (strpos($post_content, 'freddie_open_windows_products')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-open-windows-products');
        }

        if (strpos($post_content, 'freddie_ga_ga_content')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-ga-ga-content');
        }

        if (strpos($post_content, 'freddie_party_footer')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-party-footer');
        }

        if (strpos($post_content, 'pop_product')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pop-product');
        }

        if (strpos($post_content, 'product_webdesign_package_top') || strpos($post_content, 'freddie_included_section')){
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-product-details-webdesign-package');
        }

        if (strpos($post_content, 'freddie_cuff_me_archive')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-cuff-me-archive');
        }

        if (strpos($post_content, 'freddie_really_does_archive')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-really-does-archive');
        }

        if (strpos($post_content, 'freddie_misfire_search_results')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-misfire-search-results');
        }

        if (strpos($post_content, 'freddie_baby_does_search_results')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-baby-does-search-results');
        }

        if (strpos($post_content, 'freddie_that_glitter_blog_post')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-that-glitter-blog-post');
        }

        if (strpos($post_content, 'freddie_thunderbolt_product')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-thunderbolt-product');
        }

        if (strpos($post_content, 'freddie_happy_man_tastymonial') || strpos($post_content, 'freddie_razzmatazz_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-happy-man-testimonial');
        }

        if (strpos($post_content, 'freddie_pretty_lights_tabs')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pretty-lights-tabs');
        }

        if (strpos($post_content, 'freddie_my_body_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-body-testimonial');
        }

        if (strpos($post_content, 'freddie_we_will_rock_you_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-we-will-rock-you-header');
        }

        if (strpos($post_content, 'freddie_live_forever_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-live-forever-content');
        }

        if (strpos($post_content, 'freddie_best_friend_blurbs')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-best-friend-blurbs');
        }

        if (strpos($post_content, 'freddie_dont_care_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-dont-care-content');
        }

        if (strpos($post_content, 'freddie_nevermore_person_module_about')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-nevermore-person-module-about');
        }

        if (strpos($post_content, 'freddie_winters_tale_footer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-winters-tale-footer');
        }

        if (strpos($post_content, 'freddie_about2')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-about-page-2');
        }

        if (strpos($post_content, 'freddie_crueladeville_slider')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-crueladeville-slider');
        }

        if (strpos($post_content, 'freddie_pleasure_chest_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pleasure-chest-content');
        }

        if (strpos($post_content, 'freddie_pull_you_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pull-you-testimonial');
        }

        if (strpos($post_content, 'freddie_some_good_blurbs')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-some-good-blurbs');
        }

        if (strpos($post_content, 'freddie_about3')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-about-page-3');
        }

        if (strpos($post_content, 'freddie_sell_you_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-sell-you-testimonial');
        }

        if (strpos($post_content, 'freddie_nothing_but_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-nothing-but-content');
        }

        if (strpos($post_content, 'freddie_about5')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-about-page-5');
        }

        if (strpos($post_content, 'freddie_attraction_timeline')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-attraction-timeline');
        }

        if (strpos($post_content, 'freddie_gonna_rock_footer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gonna-rock-footer');
        }

        if (strpos($post_content, 'freddie_some_action_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-some-action-content');
        }

        if (strpos($post_content, 'freddie_tonight_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-tonight-content');
        }

        if (strpos($post_content, 'freddie_black_lips_content')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-black-lips-content');
        }

        if (strpos($post_content, 'freddie_youre_hot_contact_form')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-youre-hot-contact-form');
        }

        if (strpos($post_content, 'freddie_gonna_look_footer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gonna-look-footer');
        }

        if (strpos($post_content, 'freddie_step_on_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-step-on-testimonial');
        }

        if (strpos($post_content, 'freddie_my_life_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-life-testimonial');
        }

        if (strpos($post_content, 'freddie_galileo_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-galileo-header');
        }

        if (strpos($post_content, 'freddie_really_matters_product_detail')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-really-matters-product-detail');
        }

        if (strpos($post_content, 'freddie_my_time_recent_products')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-time-recent-products');
        }

        if (strpos($post_content, 'freddie_drummer_footer_white')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-drummer-footer-white');
        }


        if (strpos($post_content, 'freddie_person_module_my_band')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-person-module-my-band');
        }


        if (strpos($post_content, 'freddie_thank_you_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-thank-you-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_greatest_treasure')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-greatest-treasure-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_rocking_world')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-rocking-world-person-module');
        }

        if (strpos($post_content, 'freddie_ride_em_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-ride-em-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_my_pleasure')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-pleasure-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_you_got')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-you-got-person-module');
        }

        if (strpos($post_content, 'freddie_world_go_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-world-go-person-module');
        }

        if (strpos($post_content, 'freddie_bikes_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-bikes-person-module');
        }

        if (strpos($post_content, 'freddie_singing_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-singing-person-module');
        }

        if (strpos($post_content, 'freddie_the_bones_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-the-bones-person-module');
        }

        if (strpos($post_content, 'freddie_blue_eyed_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blue-eyed-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_nanny')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-nanny-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_red_fire')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-red-fire-person-module');
        }

        if (strpos($post_content, 'freddie_every_time_person_module')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-every-time-person-module');
        }

        if (strpos($post_content, 'freddie_person_module_skinny_lad')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-person-module-skinny-lad');
        }

        if (strpos($post_content, 'freddie_hanging_gardens_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-hanging-gardens-pricing-tables');
        }

        if (strpos($post_content, 'freddie_sahara_desert_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-sahara-desert-pricing-tables');
        }

        if (strpos($post_content, 'freddie_world_go_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-world-go-pricing-tables');
        }

        if (strpos($post_content, 'freddie_one_thing_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-one-thing-pricing-tables');
        }

        if (strpos($post_content, 'freddie_creations_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-creations-pricing-tables');
        }

        if (strpos($post_content, 'freddie_on_earth_pricing_tables')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-on-earth-pricing-tables');
        }




        // featured blurbs (features)

        if (strpos($post_content, 'freddie_calling_me_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-calling-me-blurb');
        }

        if (strpos($post_content, 'freddie_entertain_you_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-entertain-you-blurb');
        }

        if (strpos($post_content, 'freddie_get_better_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-get-better-blurb');
        }

        if (strpos($post_content, 'freddie_i_have_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-i-have-blurb');
        }

        if (strpos($post_content, 'freddie_main_thing_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-main-thing-blurb');
        }

        if (strpos($post_content, 'freddie_my_shoes_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-my-shoes-blurb');
        }

        if (strpos($post_content, 'freddie_no_blame_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-no-blame-blurb');
        }

        if (strpos($post_content, 'freddie_on_my_way_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-on-my-way-blurb');
        }

        if (strpos($post_content, 'freddie_only_way_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-only-way-blurb');
        }

        if (strpos($post_content, 'freddie_satisfied_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-satisfied-blurb');
        }

        if (strpos($post_content, 'freddie_steps_nearer_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-steps-nearer-blurb');
        }

        if (strpos($post_content, 'freddie_the_line_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-the-line-blurb');
        }

        if (strpos($post_content, 'freddie_your_time_blurb')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-your-time-blurb');
        }

        if (strpos($post_content, 'freddie_needs_you_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-needs-you-header');
        }

        if (strpos($post_content, 'freddie_put_out_products')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-put-out-products');
        }

        if (strpos($post_content, 'freddie_drummer_footer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-drummer-footer');
        }

        // Gallery

        if (strpos($post_content, 'freddie_gallery_a_hero')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-a-hero');
        }

        if (strpos($post_content, 'freddie_gallery_every_child')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-every-child');
        }

        if (strpos($post_content, 'freddie_gallery_the_mighty')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-the-mighty');
        }

        if (strpos($post_content, 'freddie_gallery_oooh_yeah')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-oooh-yeah');
        }

        if (strpos($post_content, 'freddie_gallery_my_friend')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-my-friend');
        }

        if (strpos($post_content, 'freddie_gallery_every_one')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-every-one');
        }

        if (strpos($post_content, 'freddie_gallery_be_somebody')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-gallery-be-somebody');
        }


        // buttons

        if (strpos($post_content, 'freddie_brighton_rock_blurbs')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blurbs');
        }

        if (strpos($post_content, 'freddie_the_miracle_footer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-footers');
        }

        if (strpos($post_content, 'freddie_button_')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-buttons');
        }

        if (strpos($post_content, 'freddie_button_jealousy')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-jealousy');
        }

        if (strpos($post_content, 'freddie_button_the_loser')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-the-loser');
        }

        if (strpos($post_content, 'freddie_button_lazing_on')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-lazing-on');
        }

        if (strpos($post_content, 'freddie_button_liar')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-liar');
        }

        if (strpos($post_content, 'freddie_button_love_kills')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-love-kills');
        }

        if (strpos($post_content, 'freddie_button_misfire')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-misfire');
        }

        if (strpos($post_content, 'freddie_button_been_saved')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-been-saved');
        }

        if (strpos($post_content, 'freddie_button_mother_love')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-mother-love');
        }

        if (strpos($post_content, 'freddie_button_ogre_battle')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-ogre-battle');
        }

        if (strpos($post_content, 'freddie_button_party')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-party');
        }

        if (strpos($post_content, 'freddie_button_the_fire')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-the-fire');
        }

        if (strpos($post_content, 'freddie_button_wild_wind')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-wild-wind');
        }

        if (strpos($post_content, 'freddie_button_seaside')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-seaside');
        }

        if (strpos($post_content, 'freddie_button_rendezvous')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-rendezvous');
        }

        if (strpos($post_content, 'freddie_button_some_day')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-some-day');
        }

        if (strpos($post_content, 'freddie_button_one_day')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-one-day');
        }

        if (strpos($post_content, 'freddie_button_soul_brother')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-soul-brother');
        }

        if (strpos($post_content, 'freddie_button_step_on_me')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-step-on-me');
        }

        if (strpos($post_content, 'freddie_button_tear_it_up')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-tear-it-up');
        }

        if (strpos($post_content, 'freddie_button_teo_torriate')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-teo-torriate');
        }

        if (strpos($post_content, 'freddie_button_fairy_feller')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-fairy-feller');
        }

        if (strpos($post_content, 'freddie_button_radio_ga_ga')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-radio-ga-ga');
        }

        if (strpos($post_content, 'freddie_button_under_pressure')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-under-pressure');
        }

        if (strpos($post_content, 'freddie_button_you_andi')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-you-andi');
        }

        if (strpos($post_content, 'freddie_button_action_this_day')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-action-this-day');
        }

        if (strpos($post_content, 'freddie_button_april_lady')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-april-lady');
        }

        if (strpos($post_content, 'freddie_button_bicycle_race')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-bicycle-race');
        }

        if (strpos($post_content, 'freddie_button_blag')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-blag');
        }

        if (strpos($post_content, 'freddie_button_bohemian')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-bohemian');
        }

        if (strpos($post_content, 'freddie_button_rhapsody')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-rhapsody');
        }

        if (strpos($post_content, 'freddie_button_calling_All_girls')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-calling-all-girls');
        }

        if (strpos($post_content, 'freddie_button_dancer')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-dancer');
        }

        if (strpos($post_content, 'freddie_button_delilah')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-delilah');
        }

        if (strpos($post_content, 'freddie_button_dont_stop_me')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-dont-stop-me');
        }

        if (strpos($post_content, 'freddie_button_fat_bottomed')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-fat-bottomed');
        }

        if (strpos($post_content, 'freddie_button_get_down')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-get-down');
        }

        if (strpos($post_content, 'freddie_button_the_queen')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-the-queen');
        }

        if (strpos($post_content, 'freddie_button_good_old')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-good-old');
        }

        if (strpos($post_content, 'freddie_button_headlong')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-headlong');
        }

        if (strpos($post_content, 'freddie_button_break_free')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-break-free');
        }

        if (strpos($post_content, 'freddie_button_beat_them')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-beat-them');
        }

        if (strpos($post_content, 'freddie_button_beautiful_day')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-beautiful-day');
        }

        if (strpos($post_content, 'freddie_button_killer_queen')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-killer-queen');
        }

        if (strpos($post_content, 'freddie_button_life_is_real')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-life-is-real');
        }

        if (strpos($post_content, 'freddie_button_love_of')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-love-of');
        }

        if (strpos($post_content, 'freddie_button_made_in_heaven')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-made-in-heaven');
        }

        if (strpos($post_content, 'freddie_button_melancholy_blues')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-melancholy-blues');
        }

        if (strpos($post_content, 'freddie_button_no_violins')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-no-violins');
        }

        if (strpos($post_content, 'freddie_button_one_vision')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-one-vision');
        }

        if (strpos($post_content, 'freddie_button_play_the_game')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-button-play-the-game');
        }

        // Menus

        if (strpos($post_content, 'freddie_gimme_the_prize_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-1');
        }

        if (strpos($post_content, 'freddie_attack_dragon_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-2');
        }

        if (strpos($post_content, 'ffreddie_earth_menu') || strpos($post_content, 'freddie_earth_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-3');
        }

        if (strpos($post_content, 'freddie_funny_love_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-4');
        }

        if (strpos($post_content, 'freddie_hang_on_in_there_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-5');
        }

        if (strpos($post_content, 'freddie_lover_boy_menu')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-6');
        }

        if (strpos($post_content, 'freddie_hijack_my_heart')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-menu-7');
        }

        // TB Blog Posts

        if (strpos($post_content, 'freddie_to_son')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blog-post-to-son');
        }

        if (strpos($post_content, 'freddie_drowse_post')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blog-post-drowse');
        }

        if (strpos($post_content, 'freddie_all_girls_post')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blog-post-all-girls');
        }

        if (strpos($post_content, 'freddie_make_love_blog_post')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-make-love-blog-post');
        }

        if (strpos($post_content, 'freddie_funster_testimonial')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-funster-testimonial');
        }

        if (strpos($post_content, 'freddie_blog_post_mother_love')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blog-post-mother-love');
        }

        if (strpos($post_content, 'freddie_blog_post_human_body')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-blog-post-human-body');
        }

        // TB Navigation Menus

        if (strpos($post_content, 'freddie_without_counting_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-without-counting-header');
        }

        if (strpos($post_content, 'freddie_bali_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-bali-header');
        }

        if (strpos($post_content, 'freddie_hungry_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-hungry-header');
        }

        if (strpos($post_content, 'freddie_breaking_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-breaking-header');
        }

        if (strpos($post_content, 'freddie_mona_lis_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-mona-lis-header');
        }

        if (strpos($post_content, 'freddie_private_affair_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-private-affair-header');
        }

        if (strpos($post_content, 'freddie_pleading_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-pleading-header');
        }

        if (strpos($post_content, 'freddie_headline_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-headline-header');
        }

        if (strpos($post_content, 'freddie_twisted_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-twisted-header');
        }

        if (strpos($post_content, 'freddie_get_started_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-get-started-header');
        }

        if (strpos($post_content, 'freddie_he_pulled_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-he-pulled-header');
        }

        if (strpos($post_content, 'freddie_no_one_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-no-one-header');
        }

        if (strpos($post_content, 'freddie_just_like_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-just-like-header');
        }

        if (strpos($post_content, 'freddie_got_all_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-got-all-header');
        }

        if (strpos($post_content, 'freddie_i_know_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-i-know-header');
        }

        if (strpos($post_content, 'freddie_come_back_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-come-back-header');
        }

        if (strpos($post_content, 'freddie_day_next_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-day-next-header');
        }

        if (strpos($post_content, 'freddie_jamming_header')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-jamming-header');
        }

        if (strpos($post_content, 'freddie_header_las_palabras_de_amor')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-header-las-palabras-de-amor');
        }

        if (strpos($post_content, 'freddie_content_let_me_live')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-content-let-me-live');
        }

        if (strpos($post_content, 'freddie_content_long_away')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-content-long-away');
        }

        if (strpos($post_content, 'freddie_testimonial_back_to_humans')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-testimonial-back-to-humans');
        }

        if (strpos($post_content, 'freddie_tabs_more_of_that_jazz')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-tabs-more-of-that-jazz');
        }

        if (strpos($post_content, 'freddie_footer_black_queen')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-footer-black-queen');
        }

        if (strpos($post_content, 'freddie_header_going_slightly_mad')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-header-going-slightly-mad');
        }

        if (strpos($post_content, 'freddie_content_lap_of_the_gods')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-content-lap-of-the-gods');
        }

        if (strpos($post_content, 'freddie_content_everybody_happy')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-content-everybody-happy');
        }

        if (strpos($post_content, 'freddie_person_module_Its_late')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-person-module-its-late');
        }

        if (strpos($post_content, 'freddie_footer_keep_yourself_alive')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-footer-keep-yourself-alive');
        }

        if (strpos($post_content, 'freddie_author_worthwhile')) {
            add_post_meta($post_id, 'ddp-css-freddie', 'freddie-author-1');
        }


        // Tina
        if (strpos($post_content, 'tina_the_girl_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-the-girl');
        }

        if (strpos($post_content, 'tina_easy_babe_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-easy-babe');
        }

        if (strpos($post_content, 'tina_the_change_tabs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-tabs-the-change');
        }

        if (strpos($post_content, 'tina_she_talks_person_module')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-person-module-she-talks');
        }

        if (strpos($post_content, 'tina_down_to_me_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-down-to-me');
        }

        if (strpos($post_content, 'tina_its_alright_blog')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-its-alright');
        }

        if (strpos($post_content, 'tina_siamese_testimonial')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-siamese');
        }

        if (strpos($post_content, 'tina_the_change_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-footer-the-change');
        }

        if (strpos($post_content, 'tina_private_dancer_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-private-dancer');
        }

        if (strpos($post_content, 'tina_these_places_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-these-places');
        }

        if (strpos($post_content, 'tina_these_places_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-their-faces');
        }

        if (strpos($post_content, 'tina_a_dancer_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-a-dancer');
        }

        if (strpos($post_content, 'tina_my_thumb_person_module')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-person-module-my-thumb');
        }

        if (strpos($post_content, 'tina_a_diamond_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-a-diamond');
        }

        if (strpos($post_content, 'tina_all_day_blog')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-all-day');
        }

        if (strpos($post_content, 'tina_dont_walk_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-footer-dont-walk');
        }

        if (strpos($post_content, 'tina_see_this_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-see-this');
        }

        if (strpos($post_content, 'tina_smile_to_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-smile-to');
        }

        if (strpos($post_content, 'tina_a_fire_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-a-fire');
        }

        if (strpos($post_content, 'tina_get_enough_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-get-enough');
        }

        if (strpos($post_content, 'tina_goes_around_numbers')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-numbers-goes-around');
        }

        if (strpos($post_content, 'tina_flowing_persons')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-persons-flowing');
        }

        if (strpos($post_content, 'tina_seek_call_to_action')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-call-to-action-seek');
        }

        if (strpos($post_content, 'tina_the_flame_blog')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-the-flame');
        }

        if (strpos($post_content, 'tina_still_play_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-footer-still-play');
        }

        if (strpos($post_content, 'tina_my_lover_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-lover-sidebar');
        }

        if (strpos($post_content, 'tina_he_belongs_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-he-belongs');
        }

        if (strpos($post_content, 'tina_never_been_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-never-been');
        }

        if (strpos($post_content, 'tina_buy_into_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-buy-into');
        }

        if (strpos($post_content, 'tina_the_flame_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-the-flame');
        }

        if (strpos($post_content, 'tina_i_wanna_be_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-i-wanna-be');
        }

        if (strpos($post_content, 'tina_you_lead_me_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-you-lead-me');
        }

        if (strpos($post_content, 'tina_who_did_testimonial')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-who-did');
        }

        if (strpos($post_content, 'tina_time_to_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-time-footer-to');
        }

        // optins

        if (strpos($post_content, 'tina_so_familiar_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-so-familiar');
        }

        if (strpos($post_content, 'tina_you_need_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-you-need');
        }

        if (strpos($post_content, 'tina_gonna_be_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-gonna-be');
        }

        if (strpos($post_content, 'tina_be_right_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-be-right');
        }

        if (strpos($post_content, 'tina_right_here_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-right-here');
        }

        if (strpos($post_content, 'tina_your_kiss_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-your-kiss');
        }

        if (strpos($post_content, 'tina_a_kind_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-a-kind');
        }

        if (strpos($post_content, 'tina_other_lives_optin')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-optin-other-lives');
        }

        // Content Pages

        if (strpos($post_content, 'tina_content_page_1') || strpos($post_content, 'tina_page_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-1');
        }

        if (strpos($post_content, 'tina_content_page2') || strpos($post_content, 'tina_page_content_2')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-2');
        }

        if (strpos($post_content, 'tina_page_content_3') || strpos($post_content, 'tina_content3')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-3');
        }

        if (strpos($post_content, 'tina_page_content_4') || strpos($post_content, 'tina_content4')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-4');
        }

        if (strpos($post_content, 'tina_page_content_5')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-5');
        }

        if (strpos($post_content, 'tina_page_content_6')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-6');
        }

        if (strpos($post_content, 'tina_page_content_7')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-7');
        }

        if (strpos($post_content, 'tina_page_content_8') || strpos($post_content, 'tina_contentpage8')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-8');
        }

        if (strpos($post_content, 'tina_page_content_9')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-9');
        }

        if (strpos($post_content, 'tina_page_content_10')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-10');
        }

        if (strpos($post_content, 'tina_page_content_11')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-page-11');
        }


        // Sidebars

        if (strpos($post_content, 'tina_my_end_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-end-sidebar');
        }

        if (strpos($post_content, 'tina_my_beggining_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-beggining-sidebar');
        }

        if (strpos($post_content, 'tina_feel_like_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-feel-like-sidebar');
        }

        if (strpos($post_content, 'tina_this_time_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-this-time-sidebar');
        }

        if (strpos($post_content, 'tina_be_right_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-be-right-sidebar');
        }

        if (strpos($post_content, 'tina_waiting_baby_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-waiting-baby-sidebar');
        }

        if (strpos($post_content, 'tina_will_be_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-will-be-sidebar');
        }

        if (strpos($post_content, 'tina_this_life_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-this-life-sidebar');
        }

        if (strpos($post_content, 'tina_contentpage10_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-contentpage10-sidebar');
        }

        if (strpos($post_content, 'tina_the_sun_sidebar')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-the-sun-sidebar');
        }

        if (strpos($post_content, 'sidewalk-contact')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-sidewalk-contact-page');
        }

        if (strpos($post_content, 'tina_here_waiting_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-here-waiting-blurbs');
        }

        if (strpos($post_content, 'tina_my_friend_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-friend-content');
        }

        if (strpos($post_content, 'tina_go_down_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-go-down-content');
        }

        if (strpos($post_content, 'tina_good_times_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-good-times-blurbs');
        }

        if (strpos($post_content, 'tina_way_down_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-way-down-blurbs');
        }

        if (strpos($post_content, 'tina_wanna_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-wanna-content');
        }

        if (strpos($post_content, 'tina_every_inch_testimonial')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-every-inch-testimonial');
        }

        if (strpos($post_content, 'tina_come_on_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-come-on-blurbs');
        }

        if (strpos($post_content, 'tina_finest_girl_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-finest-girl-content');
        }

        if (strpos($post_content, 'tina_know_girl_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-know-girl-content');
        }

        if (strpos($post_content, 'tina_perks_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-perks-content');
        }

        if (strpos($post_content, 'tina_your_decisions_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-your-decisions-header');
        }

        if (strpos($post_content, 'tina_sometimes_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-sometimes-content');
        }

        if (strpos($post_content, 'tina_and_that_tabs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-and-that-tabs');
        }

        if (strpos($post_content, 'tina_stronger_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-stronger-content');
        }

        if (strpos($post_content, 'tina_you_again_tabs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-you-again-tabs');
        }

        if (strpos($post_content, 'tina_about_all_blog')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-about-all-blog');
        }

        if (strpos($post_content, 'tina_I_can_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-I-can-footer');
        }

        if (strpos($post_content, 'tina_backdoor_man_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-backdoor-man-content');
        }

        if (strpos($post_content, 'tina_coolin_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-coolin-content');
        }

        if (strpos($post_content, 'tina_schoolin_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-schoolin-content');
        }

        if (strpos($post_content, 'tina_every_inch_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-every-inch-blurbs');
        }

        if (strpos($post_content, 'tina_shake_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-shake-content');
        }

        if (strpos($post_content, 'tina_girl_testimonial')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-girl-testimonial');
        }

        // Accordions

        if (strpos($post_content, 'tina_accordion_chardge_of')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-charge-of');
        }

        if (strpos($post_content, 'tina_accordion_you_alone')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-you-alone');
        }

        if (strpos($post_content, 'tina_accordion_da_dap')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-da-dap');
        }

        if (strpos($post_content, 'tina_accordion_looked_down')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-looked-down');
        }

        if (strpos($post_content, 'tina_accordion_anybody')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-anybody');
        }

        if (strpos($post_content, 'tina_accordion_the_start')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-the-start');
        }

        if (strpos($post_content, 'tina_accordion_my_heart')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-my-heart');
        }

        if (strpos($post_content, 'tina_accordion_my_home')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-my-home');
        }

        if (strpos($post_content, 'tina_accordion_key_to')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-key-to');
        }

        if (strpos($post_content, 'tina_accordion_common_sense')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-common-sense');
        }

        if (strpos($post_content, 'tina_accordion_i_grew')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-accordion-i-grew');
        }

        // accordions end

        if (strpos($post_content, 'tina_thinking_about_header')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-thinking-about-header');
        }

        if (strpos($post_content, 'tina_the_past_content')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-the-past-content');
        }

        if (strpos($post_content, 'tina_my_shoulder_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-shoulder-blurbs');
        }

        if (strpos($post_content, 'tina_lifetime_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-lifetime-blurbs');
        }

        if (strpos($post_content, 'tina_all_behind_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-all-behind-blurbs');
        }

        if (strpos($post_content, 'tina_all_behind_button')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-all-behind-button');
        }

        if (strpos($post_content, 'tina_orgotten_moments_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-orgotten-moments-blurbs');
        }

        if (strpos($post_content, 'tina_other_lives_blurbs')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-other-lives-blurbs');
        }

        if (strpos($post_content, 'tina_my_lover_blog')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-my-lover-blog');
        }

        if (strpos($post_content, 'tina_I_breathe_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-I-breathe-footer');
        }

        if (strpos($post_content, 'tina_contact_3_')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-contact-3-page');
        }

        if (strpos($post_content, 'tina_content_second_try')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-second-try');
        }

        if (strpos($post_content, 'tina_contact_form_talk_now')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-contact-form-talk-now');
        }

        if (strpos($post_content, 'tina_blurbs_hear_my')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-hear-my');
        }

        if (strpos($post_content, 'tina_content_eight_wheeler')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-eight-wheeler');
        }

        if (strpos($post_content, 'tina_cta_im_moving')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-cta-im-moving');
        }

        if (strpos($post_content, 'tina_testimonial_i_got')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-i-got');
        }

        if (strpos($post_content, 'tina_content_throttle')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-throttle');
        }

        if (strpos($post_content, 'tina_content_ease')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-ease');
        }

        if (strpos($post_content, 'tina_testimonial_you_got')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-you-got');
        }

        if (strpos($post_content, 'tina_content_listen')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-listen');
        }

        if (strpos($post_content, 'tina_content_mister')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-mister');
        }

        if (strpos($post_content, 'tina_testimonial_told_you')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-told-you');
        }

        if (strpos($post_content, 'tina_come_on_projects')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-come-on-projects');
        }

        if (strpos($post_content, 'tina_blurbs_second_try')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-second-try');
        }

        if (strpos($post_content, 'tina_content_back_baby')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-back-baby');
        }

        if (strpos($post_content, 'tina_content_wanna_hear')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-wanna-hear');
        }

        if (strpos($post_content, 'tina_person_talk_now')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-person-talk-now');
        }

        if (strpos($post_content, 'tina_slider_sail_away')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-slider-sail-away');
        }

        if (strpos($post_content, 'tina_slider_you_take')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-slider-you-take');
        }

        if (strpos($post_content, 'tina_slider_you_take_V2')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-slider-you-take-v2');
        }

        if (strpos($post_content, 'tina_portfolio_bayou')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-portfolio-bayou');
        }

        if (strpos($post_content, 'tina_portfolio_ribbon')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-portfolio-ribbon');
        }

        if (strpos($post_content, 'tina_header_have_ridden')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-have-ridden');
        }

        if (strpos($post_content, 'tina_numbers_orignal')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-numbers-orignal');
        }

        if (strpos($post_content, 'tina_video_sage')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-video-sage');
        }

        if (strpos($post_content, 'tina_case_studies_takes_two')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-case-studies-takes-two');
        }

        if (strpos($post_content, 'tina_blurbs_me_and_you')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-me-and-you');
        }

        if (strpos($post_content, 'tina_footer_proud')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-footer-proud');
        }

        if (strpos($post_content, 'tina_content_the_people')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-the-people');
        }

        if (strpos($post_content, 'tina_content_the_fields')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-the-fields');
        }

        if (strpos($post_content, 'tina_blurbs_church_house')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-church-house');
        }

        if (strpos($post_content, 'tina_content_call_it')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-call-it');
        }

        if (strpos($post_content, 'tina_testimonial_go_to')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-go-to');
        }

        if (strpos($post_content, 'tina_person_call_it')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-person-call-it');
        }

        if (strpos($post_content, 'tina_content_church_house')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-church-house');
        }

        if (strpos($post_content, 'tina_blurbs_speed_limit')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-speed-limit');
        }

        if (strpos($post_content, 'tina_tabs_highway')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-tabs-highway');
        }

        if (strpos($post_content, 'tina_testimonial_city_limites')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-city-limites');
        }

        if (strpos($post_content, 'tina_archive_1')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-archive-1');
        }

        if (strpos($post_content, 'tina_footer_nutbush')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-footer-nutbush');
        }

        if (strpos($post_content, 'tina_header_switched')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-switched');
        }

        if (strpos($post_content, 'tina_blog_rain_falling')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-rain-falling');
        }

        if (strpos($post_content, 'tina_blog_bad_enough')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-bad-enough');
        }

        if (strpos($post_content, 'tina_products_working_for')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-products-working-for');
        }

        if (strpos($post_content, 'tina_video_talk_much')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-video-talk-much');
        }

        if (strpos($post_content, 'tina_blog_this_town')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-this-town');
        }

        if (strpos($post_content, 'tina_content_the_movies')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-the-movies');
        }

        if (strpos($post_content, 'tina_pricing_tables_pinch_of')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-pricing-tables-pinch-of');
        }

        if (strpos($post_content, 'tina_testimonial_one_can')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-one-can');
        }

        if (strpos($post_content, 'tina_pricing_1_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-pricing-1-footer');
        }

        if (strpos($post_content, 'tina_magazine_still_play_footer')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-magazine-still-play-footer');
        }

        if (strpos($post_content, 'tina_header_pale_moon')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-pale-moon');
        }

        if (strpos($post_content, 'tina_pricing_table_pretending')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-pricing-table-pretending');
        }

        if (strpos($post_content, 'tina_testimonial_two_can')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-two-can');
        }

        if (strpos($post_content, 'tina_blog_1')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-1');
        }

        if (strpos($post_content, 'tina_blog_2')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-2');
        }

        if (strpos($post_content, 'tina_blog_3')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-3');
        }

        if (strpos($post_content, 'tina_blog_4')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-4');
        }

        if (strpos($post_content, 'tina_blog_5')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-5');
        }

        if (strpos($post_content, 'tina_blog_6')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-6');
        }

        if (strpos($post_content, 'tina_blog_7')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blog-7');
        }

        if (strpos($post_content, 'tina_header_girls')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-girls');
        }

        if (strpos($post_content, 'tina_content_lets_dance')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-lets-dance');
        }

        if (strpos($post_content, 'tina_content_broom')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-broom');
        }

        if (strpos($post_content, 'tina_testimonials_idolize_you')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonials-idolize-you');
        }

        if (strpos($post_content, 'tina_numbers_acid')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-numbers-acid');
        }

        if (strpos($post_content, 'tina_pricing_table_tonight')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-pricing-table-tonight');
        }

        if (strpos($post_content, 'tina_person_module_open_arms')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-person-module-open-arms');
        }

        if (strpos($post_content, 'tina_blurbs_I_see')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurbs-i-see');
        }

        if (strpos($post_content, 'tina_header_steam')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-steam');
        }

        if (strpos($post_content, 'tina_content_universe')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-universe');
        }

        if (strpos($post_content, 'tina_content_liberty')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-liberty');
        }

        if (strpos($post_content, 'tina_content_cause')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-cause');
        }

        if (strpos($post_content, 'tina_content_producers')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-producers');
        }

        if (strpos($post_content, 'tina_content_eternal')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-eternal');
        }

        if (strpos($post_content, 'tina_testimonials_lead_3')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonials-lead-3');
        }

        if (strpos($post_content, 'tina_header_crazy')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-header-crazy');
        }

        if (strpos($post_content, 'tina_content_way')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-content-way');
        }

        if (strpos($post_content, 'tina_blurb_white')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-blurb-white');
        }

        if (strpos($post_content, 'tina_trusted_by_logo')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-trusted-by-logo');
        }

        if (strpos($post_content, 'tina_testimonial_finest_girl')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-testimonial-finest-girl');
        }

        if (strpos($post_content, 'tina_pricing_table_it_on')) {
            add_post_meta($post_id, 'ddp-css-tina', 'tina-pricing-table-it-on');
        }

        // Tina ends

        // Ragnar

        // for 25 Nov

        if (strpos($post_content, 'ragnar_header_arne')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-arne');
        }

        if (strpos($post_content, 'ragnar_content_eagle')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-eagle');
        }

        if (strpos($post_content, 'ragnar_blurbs_birger')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blurbs-birger');
        }

        if (strpos($post_content, 'ragnar_blurbs_keeper')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blurbs-keeper');
        }

        if (strpos($post_content, 'ragnar_blog_bjorn')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blog-bjorn');
        }

        if (strpos($post_content, 'ragnar_content_bear')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-bear');
        }

        if (strpos($post_content, 'ragnar_footer_ro')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-footer-bo');
        }

        if (strpos($post_content, 'ragnar_header_resident')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-resident');
        }

        if (strpos($post_content, 'ragnar_content_erik')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-erik');
        }

        if (strpos($post_content, 'ragnar_blurbs_ruler')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blurbs-ruler');
        }

        if (strpos($post_content, 'ragnar_content_frode')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-frode');
        }

        if (strpos($post_content, 'ragnar_tesimonails_gorm')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-testimonails-gorm');
        }

        if (strpos($post_content, 'ragnar_blog_halfdan')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blog-halfdan');
        }

        if (strpos($post_content, 'ragnar_footer_danish')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-footer-danish');
        }

        if (strpos($post_content, 'ragnar_header_left')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-left');
        }

        if (strpos($post_content, 'ragnar_content_curly')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-curly');
        }

        if (strpos($post_content, 'ragnar_content_kare')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-kare');
        }

        if (strpos($post_content, 'ragnar_content_knot')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-knot');
        }

        if (strpos($post_content, 'ragnar_blog_knud')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blog-knud');
        }

        if (strpos($post_content, 'ragnar_header_descendant')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-descendant');
        }

        if (strpos($post_content, 'ragnar_content_njal')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-njal');
        }

        if (strpos($post_content, 'ragnar_content_giant')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-giant');
        }

        if (strpos($post_content, 'ragnar_content_roar')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-roar');
        }

        if (strpos($post_content, 'ragnar_content_fame')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-fame');
        }

        if (strpos($post_content, 'ragnar_blog_rune')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blog-rune');
        }

        if (strpos($post_content, 'ragnar_content_movin_on')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-movin-on');
        }

        if (strpos($post_content, 'ragnar_content_wheeler')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-wheeler');
        }

        if (strpos($post_content, 'ragnar_testimonial_daddy')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-testimonial-daddy');
        }

        if (strpos($post_content, 'ragnar_blog_loud_whistle')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-blog-loud-whistle');
        }

        if (strpos($post_content, 'ragnar_footer_my_mother')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-footer-my-mother');
        }


        // for 26 Nov

        if (strpos($post_content, 'ragnar_contact_trygve_office')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-trygve');
        }

        if (strpos($post_content, 'ragnar_footer_harald')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-footer-harald');
        }


        if (strpos($post_content, 'ragnar_header_wolf')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-wolf');
        }

        if (strpos($post_content, 'ragnar_contact_wealth')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-wealth');
        }


        if (strpos($post_content, 'ragnar_header_age')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-age');
        }

        if (strpos($post_content, 'ragnar_contact_ploughs')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-ploughs');
        }

        if (strpos($post_content, 'ragnar_person_ancestor')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-person-ancestor');
        }


        if (strpos($post_content, 'ragnar_contact_loved')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-loved');
        }

        if (strpos($post_content, 'ragnar_content_astrid')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-astrid');
        }


        if (strpos($post_content, 'ragnar_content_bodil')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-bodil');
        }

        if (strpos($post_content, 'ragnar_contact_penance')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-penance');
        }


        if (strpos($post_content, 'ragnar_content_tove')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-tove');
        }

        if (strpos($post_content, 'ragnar_contact_form_dove')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-contact-form-dove');
        }


        if (strpos($post_content, 'ragnar_header_toke')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-header-toke');
        }

        if (strpos($post_content, 'ragnar_slider_thor')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-slider-thor');
        }

        if (strpos($post_content, 'ragnar_content_helmet')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-helmet');
        }

        if (strpos($post_content, 'ragnar_content_torsten')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-torsten');
        }


        if (strpos($post_content, 'ragnar_slider_voice_id_sing')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-slider-voice-id-sing');
        }

        if (strpos($post_content, 'ragnar_content_noble_barque')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-noble-barque');
        }

        if (strpos($post_content, 'ragnar_content_i_steer')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-i-steer');
        }

        if (strpos($post_content, 'ragnar_projects_good_oars')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-projects-good-oars');
        }


        if (strpos($post_content, 'ragnar_person_module_roar')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-person-module-roar');
        }

        if (strpos($post_content, 'ragnar_content_spear')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-content-spear');
        }


        if (strpos($post_content, 'ragnar_portfolio_good_oars')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-portfolio-good-oars');
        }

        if (strpos($post_content, 'ragnar_subscribe_galleys')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-subscribe-galleys');
        }


        // for 27 Nov


        if (strpos($post_content, 'ragnar_menu_farmer')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-farmer');
        }

        if (strpos($post_content, 'ragnar_menu_hulks')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-hulks');
        }

        if (strpos($post_content, 'ragnar_menu_idun')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-idun');
        }

        if (strpos($post_content, 'ragnar_menu_longhouse')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-longhouse');
        }

        if (strpos($post_content, 'ragnar_menu_pursuit')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-pursuit');
        }

        if (strpos($post_content, 'ragnar_menu_skalds')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-skalds');
        }

        if (strpos($post_content, 'ragnar_menu_valhalla')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-menu-valhalla');
        }


        // for 30 Nov

        if (strpos($post_content, 'ragnar-not-found-1')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-1');
        }

        if (strpos($post_content, 'ragnar-not-found-2')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-2');
        }

        if (strpos($post_content, 'ragnar-not-found-3')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-3');
        }

        if (strpos($post_content, 'ragnar-not-found-4')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-4');
        }

        if (strpos($post_content, 'ragnar-not-found-5')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-5');
        }

        if (strpos($post_content, 'ragnar-not-found-6')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-6');
        }

        if (strpos($post_content, 'ragnar-not-found-7')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-7');
        }

        if (strpos($post_content, 'ragnar-not-found-8')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-8');
        }

        if (strpos($post_content, 'ragnar-not-found-9')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-9');
        }

        if (strpos($post_content, 'ragnar-not-found-10')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-10');
        }

        if (strpos($post_content, 'ragnar-not-found-11')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-11');
        }

        if (strpos($post_content, 'ragnar-not-found-12')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-12');
        }

        if (strpos($post_content, 'ragnar-not-found-13')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-13');
        }

        if (strpos($post_content, 'ragnar-not-found-14')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-14');
        }

        if (strpos($post_content, 'ragnar-not-found-15')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-15');
        }

        if (strpos($post_content, 'ragnar-not-found-16')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-16');
        }

        if (strpos($post_content, 'ragnar-not-found-17')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-17');
        }

        if (strpos($post_content, 'ragnar-not-found-18')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-18');
        }

        if (strpos($post_content, 'ragnar-not-found-19')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-19');
        }

        if (strpos($post_content, 'ragnar-not-found-20')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-20');
        }

        if (strpos($post_content, 'ragnar-not-found-21')) {
            add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-not-found-21');
        }

        // for 2 Dec

        for ($i = 1; $i < 18; $i++) {
            if (strpos($post_content, 'ragnar_popups_'.$i)) {
                add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-popups-'.$i);
            }
        }

        for ($i = 1; $i < 10; $i++) {
            if (strpos($post_content, 'ragnar_coming_soon_'.$i)) {
                add_post_meta($post_id, 'ddp-css-ragnar', 'ragnar-coming-soon-'.$i);
            }
        }

        // Ragnar ends

    } // function ddp_save_post_function($post_id, $post, $update)

} // ddp enabled check ends

     //======================================================================
    // LOAD CSS BASED ON POST META
    //======================================================================

    function ddp_register_css($post_here){
        // Fancybox
        wp_register_style('ddp-fancybox-css', plugins_url('include/fancybox/jquery.fancybox.css', __FILE__));
        wp_enqueue_style('ddp-fancybox-css');

        //print_r($post_here);

        if(!$post_here) $post = get_post();
        else $post = $post_here;

      //  echo "<br>";
       // echo $post->ID;

        if($post) {

        // Falkor
        foreach ((array) get_post_meta($post->ID, 'ddp-css-falkor') as $ddp_css_falkor) {
            if ($ddp_css_falkor == 'animated-lines') {
                wp_enqueue_style('ddp-falkor-animated-lines', plugins_url('include/falkor/css/falkor-bg-color-for-animated-lines.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-blog') {
                wp_enqueue_style('ddp-falkor-blog', plugins_url('include/falkor/css/falkor-blogs.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-blurb') {
                wp_enqueue_style('ddp-falkor-blurb', plugins_url('include/falkor/css/falkor-blurb.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-cta') {
                wp_enqueue_style('ddp-falkor-call-to-action', plugins_url('include/falkor/css/falkor-call-to-action.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-contact-forms') {
                wp_enqueue_style('ddp-falkor-contact-forms', plugins_url('include/falkor/css/falkor-contact-forms.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-contact-page') {
                wp_enqueue_style('ddp-falkor-contact-page', plugins_url('include/falkor/css/falkor-contact-page.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-content') {
                wp_enqueue_style('ddp-falkor-content', plugins_url('include/falkor/css/falkor-content.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-footers') {
                wp_enqueue_style('ddp-falkor-footers', plugins_url('include/falkor/css/falkor-footers.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-headers') {
                wp_enqueue_style('ddp-falkor-headers', plugins_url('include/falkor/css/falkor-headers.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-home-pages') {
                wp_enqueue_style('ddp-falkor-home-pages', plugins_url('include/falkor/css/falkor-home-pages.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-inside-pages') {
                wp_enqueue_style('ddp-falkor-inside-pages', plugins_url('include/falkor/css/falkor-inside-pages.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-logos') {
                wp_enqueue_style('ddp-falkor-logos', plugins_url('include/falkor/css/falkor-logos.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-numbers') {
                wp_enqueue_style('ddp-falkor-numbers', plugins_url('include/falkor/css/falkor-numbers.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-person') {
                wp_enqueue_style('ddp-falkor-person', plugins_url('include/falkor/css/falkor-person.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-pricing-table') {
                wp_enqueue_style('ddp-falkor-pricing-table', plugins_url('include/falkor/css/falkor-pricing-table.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-slider') {
                wp_enqueue_style('ddp-falkor-slider', plugins_url('include/falkor/css/falkor-slider.css', __FILE__));
            }
            if ($ddp_css_falkor == 'falkor-testimonials') {
                wp_enqueue_style('ddp-falkor-testimonials', plugins_url('include/falkor/css/falkor-testimonials.css', __FILE__));
            }
        }

        //Jackson

        if (!empty(get_post_meta($post->ID, 'ddp-css-jackson'))) {
            wp_enqueue_style('ddp-jackson-home', plugins_url('include/jackson/css/jackson-home.css', __FILE__));
        }

        foreach ((array) get_post_meta($post->ID, 'ddp-css-jackson') as $ddp_css_jackson) {
            if ($ddp_css_jackson == 'jackson-404') {
                wp_enqueue_style('ddp-jackson-404', plugins_url('include/jackson/css/jackson-404.css', __FILE__));
                wp_enqueue_style('ddp-jackson-blog', plugins_url('include/jackson/css/jackson-blog.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-about') {
                wp_enqueue_style('ddp-jackson-about', plugins_url('include/jackson/css/jackson-about.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-author') {
                wp_enqueue_style('ddp-jackson-author', plugins_url('include/jackson/css/jackson-author.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-blog') {
                wp_enqueue_style('ddp-jackson-blog', plugins_url('include/jackson/css/jackson-blog.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-case-study') {
                wp_enqueue_style('ddp-jackson-case-study', plugins_url('include/jackson/css/jackson-case-study.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-category-page') {
                wp_enqueue_style('ddp-jackson-blog', plugins_url('include/jackson/css/jackson-blog.css', __FILE__));
                wp_enqueue_style('ddp-jackson-category-page', plugins_url('include/jackson/css/jackson-category-page.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-contact') {
                wp_enqueue_style('ddp-jackson-contact', plugins_url('include/jackson/css/jackson-contact.css', __FILE__));
                wp_enqueue_style('ddp-jackson-about', plugins_url('include/jackson/css/jackson-about.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-content') {
                wp_enqueue_style('ddp-jackson-blog', plugins_url('include/jackson/css/jackson-blog.css', __FILE__));
                wp_enqueue_style('ddp-jackson-content', plugins_url('include/jackson/css/jackson-content.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-footer') {
                wp_enqueue_style('ddp-jackson-blog', plugins_url('include/jackson/css/jackson-blog.css', __FILE__));
                wp_enqueue_style('ddp-jackson-footer', plugins_url('include/jackson/css/jackson-footer.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-how-we-work') {
                wp_enqueue_style('ddp-jackson-how-we-work', plugins_url('include/jackson/css/jackson-how-we-work.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-search') {
                wp_enqueue_style('ddp-jackson-search', plugins_url('include/jackson/css/jackson-search.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-services') {
                wp_enqueue_style('ddp-jackson-services', plugins_url('include/jackson/css/jackson-services.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-single-post') {
                wp_enqueue_style('ddp-jackson-single-post', plugins_url('include/jackson/css/jackson-single-post.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-team') {
                wp_enqueue_style('ddp-jackson-team', plugins_url('include/jackson/css/jackson-team.css', __FILE__));
            }
            if ($ddp_css_jackson == 'jackson-transitions') {
                wp_enqueue_style('ddp-jackson-transitions', plugins_url('include/jackson/css/jackson-transitions.css', __FILE__));
            }
        }

        // Mermaid

        foreach ((array) get_post_meta($post->ID, 'ddp-css-mermaid') as $ddp_css_mermaid) {
            if ($ddp_css_mermaid == 'mermaid-blog') {
                wp_enqueue_style('ddp-mermaid-blog', plugins_url('include/mermaid/css/blog_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-blurbs') {
                wp_enqueue_style('ddp-mermaid-blurbs', plugins_url('include/mermaid/css/blurbs_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-contact=form') {
                wp_enqueue_style('ddp-mermaid-contact', plugins_url('include/mermaid/css/contact_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-content') {
                wp_enqueue_style('ddp-mermaid-content', plugins_url('include/mermaid/css/content_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-footer') {
                wp_enqueue_style('ddp-mermaid-footer', plugins_url('include/mermaid/css/footer_mermaid.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-lists') {
                wp_enqueue_style('ddp-mermaid-lists', plugins_url('include/mermaid/css/lists_mermaid.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-masks') {
                wp_enqueue_style('ddp-mermaid-masks', plugins_url('include/mermaid/css/masks_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-buttons') {
                wp_enqueue_style('ddp-mermaid-buttons', plugins_url('include/mermaid/css/mermaid_16_buttons_with_hover_effects_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-pages') {
                wp_enqueue_style('ddp-mermaid-pages', plugins_url('include/mermaid/css/pages_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-persons') {
                wp_enqueue_style('ddp-mermaid-persons', plugins_url('include/mermaid/css/persons_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-slider') {
                wp_enqueue_style('ddp-mermaid-slider', plugins_url('include/mermaid/css/slider_mermaid_divi_kit.css', __FILE__));
            }
            if ($ddp_css_mermaid == 'mermaid-about-page') {
                wp_enqueue_style('ddp-mermaid-about-page', plugins_url('include/mermaid/css/mermaid-about-page-bonus.css', __FILE__));
            }
        }

        //Mozart
        foreach ((array) get_post_meta($post->ID, 'ddp-css-mozart') as $ddp_css_mozart) {
            if ($ddp_css_mozart == 'mozart-about') {
                wp_enqueue_style('ddp-mozart-about', plugins_url('include/mozart/css/mozart-about.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-accountant') {
                wp_enqueue_style('ddp-mozart-accountant', plugins_url('include/mozart/css/mozart-accountant.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-author') {
                wp_enqueue_style('ddp-mozart-author', plugins_url('include/mozart/css/mozart-author-page.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-blog') {
                wp_enqueue_style('ddp-mozart-blog', plugins_url('include/mozart/css/mozart-blog.css', __FILE__));
                wp_enqueue_style('ddp-mozart-category-page', plugins_url('include/mozart/css/mozart-category-page.css', __FILE__));
                wp_enqueue_style('ddp-mozart-single-post', plugins_url('include/mozart/css/mozart-single-post.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-category-page') {
                wp_enqueue_style('ddp-mozart-blog', plugins_url('include/mozart/css/mozart-blog.css', __FILE__));
                wp_enqueue_style('ddp-mozart-category-page', plugins_url('include/mozart/css/mozart-category-page.css', __FILE__));
                wp_enqueue_style('ddp-mozart-single-post', plugins_url('include/mozart/css/mozart-single-post.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-coach') {
                wp_enqueue_style('ddp-mozart-coach', plugins_url('include/mozart/css/mozart-coach.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-conference') {
                wp_enqueue_style('ddp-mozart-conference', plugins_url('include/mozart/css/mozart-conference.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-consulting') {
                wp_enqueue_style('ddp-mozart-consulting', plugins_url('include/mozart/css/mozart-consulting.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-contact') {
                wp_enqueue_style('ddp-mozart-contact', plugins_url('include/mozart/css/mozart-contact.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-corporation') {
                wp_enqueue_style('ddp-mozart-corporation', plugins_url('include/mozart/css/mozart-corporation.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-digital-business') {
                wp_enqueue_style('ddp-mozart-digital-business', plugins_url('include/mozart/css/mozart-digital-business.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-faq') {
                wp_enqueue_style('ddp-mozart-faq', plugins_url('include/mozart/css/mozart-faq.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-footer') {
                wp_enqueue_style('ddp-mozart-footer', plugins_url('include/mozart/css/mozart-footer.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-header') {
                wp_enqueue_style('ddp-mozart-header', plugins_url('include/mozart/css/mozart-header.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-inside') {
                wp_enqueue_style('ddp-mozart-inside', plugins_url('include/mozart/css/mozart-inside.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-investment') {
                wp_enqueue_style('ddp-mozart-investment', plugins_url('include/mozart/css/mozart-investment.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-law') {
                wp_enqueue_style('ddp-mozart-law', plugins_url('include/mozart/css/mozart-law.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-search') {
                wp_enqueue_style('ddp-mozart-search', plugins_url('include/mozart/css/mozart-search.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-single-post') {
                wp_enqueue_style('ddp-mozart-single-post', plugins_url('include/mozart/css/mozart-single-post.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-start-up') {
                wp_enqueue_style('ddp-mozart-start-up', plugins_url('include/mozart/css/mozart-start-up.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-team') {
                wp_enqueue_style('ddp-mozart-team', plugins_url('include/mozart/css/mozart-team.css', __FILE__));
            }
            if ($ddp_css_mozart == 'mozart-transitions') {
                wp_enqueue_style('ddp-mozart-transitions', plugins_url('include/mozart/css/mozart-transitions.css', __FILE__));
            }
        }

        // Pegasus
        foreach ((array) get_post_meta($post->ID, 'ddp-css-pegasus') as $ddp_css_pegasus) {
            if ($ddp_css_pegasus == 'pegasus-blog-pages') {
                wp_enqueue_style('ddp-pegasus-blog-pages', plugins_url('include/pegasus/css/pegasus-blog-pages.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-blogs') {
                wp_enqueue_style('ddp-pegasus-blogs', plugins_url('include/pegasus/css/pegasus-blogs.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-blurb') {
                wp_enqueue_style('ddp-pegasus-blurbs', plugins_url('include/pegasus/css/pegasus-blurbs.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-cta') {
                wp_enqueue_style('ddp-pegasus-cta', plugins_url('include/pegasus/css/pegasus-call-to-action.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-contact-page') {
                wp_enqueue_style('ddp-pegasus-contact-page', plugins_url('include/pegasus/css/pegasus-contact-page.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-content') {
                wp_enqueue_style('ddp-pegasus-content', plugins_url('include/pegasus/css/pegasus-content.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-footers' || $ddp_css_pegasus == 'pegasus-footer') {
                wp_enqueue_style('ddp-pegasus-footers', plugins_url('include/pegasus/css/pegasus-footers.css', __FILE__));
                 wp_enqueue_style('ddp-pegasus-pages', plugins_url('include/pegasus/css/pegasus-pages.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-forms') {
                wp_enqueue_style('ddp-pegasus-forms', plugins_url('include/pegasus/css/pegasus-forms.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-headers') {
                wp_enqueue_style('ddp-pegasus-headers', plugins_url('include/pegasus/css/pegasus-headers.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-pages') {
                wp_enqueue_style('ddp-pegasus-pages', plugins_url('include/pegasus/css/pegasus-pages.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-persons') {
                wp_enqueue_style('ddp-pegasus-persons', plugins_url('include/pegasus/css/pegasus-persons.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-portfolio') {
                wp_enqueue_style('ddp-pegasus-portfolio', plugins_url('include/pegasus/css/pegasus-portfolio.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-pricing-tables') {
                wp_enqueue_style('ddp-pegasus-pricing-tables', plugins_url('include/pegasus/css/pegasus-pricing-tables.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-project-planner-page') {
                wp_enqueue_style('ddp-pegasus-project-planner-page', plugins_url('include/pegasus/css/pegasus-project-planner-page.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-sliders') {
                wp_enqueue_style('ddp-pegasus-sliders', plugins_url('include/pegasus/css/pegasus-sliders.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-tabs') {
                wp_enqueue_style('ddp-pegasus-tabs', plugins_url('include/pegasus/css/pegasus-tabs.css', __FILE__));
            }
            if ($ddp_css_pegasus == 'pegasus-testimonials') {
                wp_enqueue_style('ddp-pegasus-testimonials', plugins_url('include/pegasus/css/pegasus-testimonials.css', __FILE__));
            }
        }

        // Pixie
        foreach ((array) get_post_meta($post->ID, 'ddp-css-pixie') as $ddp_css_pixie) {
            if ($ddp_css_pixie == 'pixie-blog') {
                wp_enqueue_style('ddp-pixie-blog', plugins_url('include/pixie/css/pixie-blog.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-blurbs') {
                wp_enqueue_style('ddp-pixie-blurbs', plugins_url('include/pixie/css/pixie-blurbs.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-cta') {
                wp_enqueue_style('ddp-pixie-cta', plugins_url('include/pixie/css/pixie-call-to-action.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-contact-basic-page') {
                wp_enqueue_style('ddp-pixie-contact-basic-page', plugins_url('include/pixie/css/pixie-contact-basic-page.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-contact') {
                wp_enqueue_style('ddp-pixie-contact', plugins_url('include/pixie/css/pixie-contact.css', __FILE__));
                wp_enqueue_style('ddp-pixie-footer', plugins_url('include/pixie/css/pixie-footer.css', __FILE__));
                wp_enqueue_style('ddp-pixie-content', plugins_url('include/pixie/css/pixie-content.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-content') {
                wp_enqueue_style('ddp-pixie-content', plugins_url('include/pixie/css/pixie-content.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-footer') {
                wp_enqueue_style('ddp-pixie-footer', plugins_url('include/pixie/css/pixie-footer.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-headers') {
                wp_enqueue_style('ddp-pixie-headers', plugins_url('include/pixie/css/pixie-headers.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-master') {
                wp_enqueue_style('ddp-pixie-master', plugins_url('include/pixie/css/pixie-master.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-numbers') {
                wp_enqueue_style('ddp-pixie-numbers', plugins_url('include/pixie/css/pixie-numbers.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-person') {
                wp_enqueue_style('ddp-pixie-person', plugins_url('include/pixie/css/pixie-person.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-personal-portfolio') {
                wp_enqueue_style('ddp-personal-portfolio', plugins_url('include/pixie/css/pixie-personal-portfolio.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-portfolio') {
                wp_enqueue_style('ddp-pixie-portfolio', plugins_url('include/pixie/css/pixie-portfolio.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-pricing-tables') {
                wp_enqueue_style('ddp-pixie-pricing-tables', plugins_url('include/pixie/css/pixie-pricing-tables.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-project-page') {
                wp_enqueue_style('ddp-pixie-project-page', plugins_url('include/pixie/css/pixie-project-page.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-tabs') {
                wp_enqueue_style('ddp-pixie-tabs', plugins_url('include/pixie/css/pixie-tabs.css', __FILE__));
            }
            if ($ddp_css_pixie == 'pixie-testimonials') {
                wp_enqueue_style('ddp-pixie-testimonials', plugins_url('include/pixie/css/pixie-testimonials.css', __FILE__));
            }

        }

        // Unicorn
        foreach ((array) get_post_meta($post->ID, 'ddp-css-unicorn') as $ddp_css_unicorn) {
            if ($ddp_css_unicorn == 'unicorn-blog') {
                wp_register_style( 'ddp-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
                wp_enqueue_style( 'ddp-fontawesome' );
                wp_enqueue_style('ddp-unicorn-blog', plugins_url('include/unicorn/css/blog-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-blurbs') {
                wp_enqueue_style('ddp-unicorn-blurbs', plugins_url('include/unicorn/css/blurbs-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-contact-form') {
                wp_enqueue_style('ddp-unicorn-contact-form', plugins_url('include/unicorn/css/contact-form-unicorn-divi-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-contact-page') {
                wp_enqueue_style('ddp-unicorn-contact-page', plugins_url('include/unicorn/css/contact-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-content') {
                wp_register_style( 'ddp-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
                wp_enqueue_style( 'ddp-fontawesome' );
                wp_enqueue_style('ddp-unicorn-content', plugins_url('include/unicorn/css/content-unicorn-divi-layout-kit.css', __FILE__));
                // FontAwesome
            }
            if ($ddp_css_unicorn == 'unicorn-optin') {
                wp_enqueue_style('ddp-unicorn-optin', plugins_url('include/unicorn/css/email-optin-unicorn-divi-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-feature') {
                wp_enqueue_style('ddp-unicorn-feature', plugins_url('include/unicorn/css/feature-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-footer') {
                wp_enqueue_style('ddp-unicorn-footer', plugins_url('include/unicorn/css/footer-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-header') {
                wp_enqueue_style('ddp-unicorn-header', plugins_url('include/unicorn/css/header-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-person') {
                wp_enqueue_style('ddp-unicorn-person', plugins_url('include/unicorn/css/person-module-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-pricing-tables') {
                wp_register_style( 'ddp-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
                wp_enqueue_style( 'ddp-fontawesome' );
                wp_enqueue_style('ddp-unicorn-pricing-tables', plugins_url('include/unicorn/css/pricing-tables-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-testimonials') {
                wp_enqueue_style('ddp-unicorn-testimonials', plugins_url('include/unicorn/css/testimonial-unicorn-divi-layout-kit.css', __FILE__));
            }
            if ($ddp_css_unicorn == 'unicorn-about-bonus') {
                wp_enqueue_style('ddp-unicorn-about-bonus', plugins_url('include/unicorn/css/unicorn-about-bonus-layout.css', __FILE__));
            }
        }

        // Venus
        foreach ((array) get_post_meta($post->ID, 'ddp-css-venus') as $ddp_css_venus) {
            if ($ddp_css_venus == 'blog') {
                wp_enqueue_style('ddp-venus-blog', plugins_url('include/venus/css/blog-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'blurbs') {
                wp_enqueue_style('ddp-venus-blurbs', plugins_url('include/venus/css/blurbs-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'contact') {
                wp_enqueue_style('ddp-venus-contact', plugins_url('include/venus/css/contact-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'cta') {
                wp_enqueue_style('ddp-venus-cta', plugins_url('include/venus/css/cta-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'faq') {
                wp_enqueue_style('ddp-venus-faq', plugins_url('include/venus/css/faq-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'features') {
                wp_enqueue_style('ddp-venus-features', plugins_url('include/venus/css/features-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'header') {
                wp_enqueue_style('ddp-venus-header', plugins_url('include/venus/css/header-venus.css', __FILE__));
                wp_enqueue_style('ddp-venus-features', plugins_url('include/venus/css/features-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'person') {
                wp_enqueue_style('ddp-venus-persons', plugins_url('include/venus/css/persons-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'pricing-tables') {
                wp_enqueue_style('ddp-venus-pricing-tables', plugins_url('include/venus/css/pricing-tables-venus.css', __FILE__));
            }
            if ($ddp_css_venus == 'subscribe') {
                wp_enqueue_style('ddp-venus-subscribe', plugins_url('include/venus/css/subscribe-venus.css', __FILE__));
            }
        }

        // Sigmund
        foreach ((array) get_post_meta($post->ID, 'ddp-css-sigmund') as $ddp_css_sigmund) {
            if ($ddp_css_sigmund == 'about-pages') {
                wp_enqueue_style('ddp-sigmund-about-pages', plugins_url('include/sigmund/css/about_pages_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'blurbs') {
                wp_enqueue_style('ddp-sigmunt-blurbs', plugins_url('include/sigmund/css/blurbs-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'contact-pages') {
                wp_enqueue_style('ddp-sigmund-contact-pages', plugins_url('include/sigmund/css/contact_pages_sigmund.css', __FILE__));
                wp_enqueue_style('ddp-sigmund-contact', plugins_url('include/sigmund/css/contact_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'contact') {
                wp_enqueue_style('ddp-sigmund-contact', plugins_url('include/sigmund/css/contact_sigmund.css', __FILE__));
                wp_enqueue_style('ddp-sigmund-contact-pages', plugins_url('include/sigmund/css/contact_pages_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'forms') {
                wp_enqueue_style('ddp-sigmund-forms', plugins_url('include/sigmund/css/form-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'headers') {
                wp_enqueue_style('ddp-sigmund-header', plugins_url('include/sigmund/css/headers-sigmund.css', __FILE__));
                wp_enqueue_style('ddp-sigmund-contact-pages', plugins_url('include/sigmund/css/contact_pages_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'persons') {
                wp_enqueue_style('ddp-sigmund-persons', plugins_url('include/sigmund/css/persons-sigmund.css', __FILE__));
                wp_enqueue_style('ddp-sigmund-contact-pages', plugins_url('include/sigmund/css/contact_pages_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'portfolio') {
                wp_enqueue_style('ddp-sigmund-portfolio', plugins_url('include/sigmund/css/portfolio-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'tabs') {
                wp_enqueue_style('ddp-sigmund-tabs', plugins_url('include/sigmund/css/tabs-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'accordion') {
                wp_enqueue_style('ddp-sigmund-contact-pages', plugins_url('include/sigmund/css/contact_pages_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'testimonials') {
                wp_enqueue_style('ddp-sigmund-testimonials', plugins_url('include/sigmund/css/testimonials-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'footers') {
                wp_enqueue_style('ddp-sigmund-footers', plugins_url('include/sigmund/css/footer-sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'office') {
                wp_enqueue_style('ddp-sigmund-office', plugins_url('include/sigmund/css/office_sigmund.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'contents') {
                wp_enqueue_style('ddp-sigmund-contents', plugins_url('include/sigmund/css/sigmund-contents.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'cta') {
                wp_enqueue_style('ddp-sigmund-cta', plugins_url('include/sigmund/css/sigmund-cta.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'faq') {
                wp_enqueue_style('ddp-sigmund-faq', plugins_url('include/sigmund/css/sigmund-faq.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'table-page1') {
                wp_enqueue_style('ddp-sigmund-table-page1', plugins_url('include/sigmund/css/sigmund-pricing-tabel-page1.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'pricing-tables') {
                wp_enqueue_style('ddp-sigmund-pricing-tables', plugins_url('include/sigmund/css/sigmund-pricing-tabels.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'services-page1') {
                wp_enqueue_style('ddp-sigmund-service-page1', plugins_url('include/sigmund/css/sigmund-services-page1.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'team-page1') {
                wp_enqueue_style('ddp-sigmund-team-page1', plugins_url('include/sigmund/css/sigmund-team-page1.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'team-page2') {
                wp_enqueue_style('ddp-sigmund-team-page2', plugins_url('include/sigmund/css/sigmund-team-page2.css', __FILE__));
            }
            if ($ddp_css_sigmund == 'testimonials') {
                wp_enqueue_style('ddp-sigmund-testimonials', plugins_url('include/sigmund/css/testimonials-sigmund.css', __FILE__));
            }
        }

        // Impi
        foreach ((array) get_post_meta($post->ID, 'ddp-css-impi') as $ddp_css_impi) {

            if ($ddp_css_impi == 'headers') {
                wp_enqueue_style('ddp-impi-headers', plugins_url('include/impi/css/impi-headers.css', __FILE__));
            }

            if ($ddp_css_impi == 'testimonials') {
                wp_enqueue_style('ddp-impi-tesimonials', plugins_url('include/impi/css/impi-testimonials.css', __FILE__));
            }

            if ($ddp_css_impi == 'blurbs') {
                wp_enqueue_style('ddp-impi-blurbs', plugins_url('include/impi/css/impi-blurbs.css', __FILE__));
            }

            if ($ddp_css_impi == 'persons') {
                wp_enqueue_style('ddp-impi-persons', plugins_url('include/impi/css/impi-persons.css', __FILE__));
            }

            if ($ddp_css_impi == 'blogs') {
                wp_enqueue_style('ddp-impi-blogs', plugins_url('include/impi/css/impi-blogs.css', __FILE__));
            }

            if ($ddp_css_impi == 'forms') {
                wp_enqueue_style('ddp-impi-forms', plugins_url('include/impi/css/impi-forms.css', __FILE__));
            }

            if ($ddp_css_impi == 'pricing-tables') {
                wp_enqueue_style('ddp-impi-pricing-tables', plugins_url('include/impi/css/impi-pricing-table.css', __FILE__));
            }

            if ($ddp_css_impi == 'sliders') {
                wp_enqueue_style('ddp-impi-sliders', plugins_url('include/impi/css/impi-sliders.css', __FILE__));
            }

            if ($ddp_css_impi == 'footers') {
                wp_enqueue_style('ddp-impi-footers', plugins_url('include/impi/css/impi_pages_footer.css', __FILE__));
            }

            if ($ddp_css_impi == 'home-pages') {
                wp_enqueue_style('ddp-impi-home-page', plugins_url('include/impi/css/impi-home-page.css', __FILE__));
            }

            if ($ddp_css_impi == 'service-pages') {
                wp_enqueue_style('ddp-impi-service-page', plugins_url('include/impi/css/impi-services-page.css', __FILE__));
            }

            if ($ddp_css_impi == 'about-page') {
                wp_enqueue_style('ddp-impi-about-page', plugins_url('include/impi/css/impi-about-page.css', __FILE__));
            }

            if ($ddp_css_impi == 'team-page') {
                wp_enqueue_style('ddp-impi-team-page', plugins_url('include/impi/css/impi-team-page.css', __FILE__));
            }

            if ($ddp_css_impi == 'contents') {
                wp_enqueue_style('ddp-impi-contents', plugins_url('include/impi/css/impi-contents.css', __FILE__));
            }

            if ($ddp_css_impi == 'cta') {
                wp_enqueue_style('ddp-impi-cta', plugins_url('include/impi/css/impi-cta.css', __FILE__));
            }

            if ($ddp_css_impi == 'logos') {
                wp_enqueue_style('ddp-impi-logos', plugins_url('include/impi/css/impi-logos.css', __FILE__));
            }

            if ($ddp_css_impi == 'faq') {
                wp_enqueue_style('ddp-impi-faq', plugins_url('include/impi/css/impi-faq.css', __FILE__));
            }

            if ($ddp_css_impi == 'portfolio') {
                wp_enqueue_style('ddp-impi-portfolio', plugins_url('include/impi/css/impi-portfolio.css', __FILE__));
            }

            if ($ddp_css_impi == 'products') {
                wp_enqueue_style('ddp-impi-product', plugins_url('include/impi/css/impi-product.css', __FILE__));
            }

        }

        // Coco
        foreach ((array) get_post_meta($post->ID, 'ddp-css-coco') as $ddp_css_coco) {
            if ($ddp_css_coco == 'blurbs') {
                wp_enqueue_style('ddp-coco-blurbs', plugins_url('include/coco/css/coco-blurbs.css', __FILE__));
            }

            if ($ddp_css_coco == 'footers') {
                wp_enqueue_style('ddp-coco-footers', plugins_url('include/coco/css/coco-footers.css', __FILE__));
            }

            if ($ddp_css_coco == 'headers') {
                wp_enqueue_style('ddp-coco-headers', plugins_url('include/coco/css/coco-headers.css', __FILE__));
                wp_enqueue_style('ddp-coco-sliders', plugins_url('include/coco/css/coco-sliders.css', __FILE__));
            }

            if ($ddp_css_coco == 'pricing-tables') {
                wp_enqueue_style('ddp-coco-pricing-tables', plugins_url('include/coco/css/coco-pricing-tabels.css', __FILE__));
            }

            if ($ddp_css_coco == 'newsletter') {
                wp_enqueue_style('ddp-coco-newsletter', plugins_url('include/coco/css/coco-signup-forms.css', __FILE__));
            }

            if ($ddp_css_coco == 'sliders') {
                wp_enqueue_style('ddp-coco-sliders', plugins_url('include/coco/css/coco-sliders.css', __FILE__));
            }

            if ($ddp_css_coco == 'content') {
                wp_enqueue_style('ddp-coco-content', plugins_url('include/coco/css/coco-contents.css', __FILE__));
            }

            if ($ddp_css_coco == 'testimonials') {
                wp_enqueue_style('ddp-coco-testimonials', plugins_url('include/coco/css/coco-testimonials.css', __FILE__));
            }

            if ($ddp_css_coco == 'portfolio') {
                wp_enqueue_style('ddp-coco-portfolio', plugins_url('include/coco/css/coco-portfolio.css', __FILE__));
            }

            if ($ddp_css_coco == 'cta') {
                wp_enqueue_style('ddp-coco-cta', plugins_url('include/coco/css/coco-cta.css', __FILE__));
            }

            if ($ddp_css_coco == 'persons') {
                wp_enqueue_style('ddp-coco-persons', plugins_url('include/coco/css/coco-persons.css', __FILE__));
            }

            if ($ddp_css_coco == 'image-loader') {
                wp_enqueue_style('ddp-coco-image-loader', plugins_url('include/coco/css/coco-image-loader.css', __FILE__));
            }

            if ($ddp_css_coco == 'forms') {
                wp_enqueue_style('ddp-coco-forms', plugins_url('include/coco/css/coco-forms.css', __FILE__));
            }

            if ($ddp_css_coco == 'contact-page') {
                wp_enqueue_style('ddp-coco-contact-page', plugins_url('include/coco/css/coco-contact-page.css', __FILE__));
            }

            if ($ddp_css_coco == 'ecommerce-pages') {
                wp_enqueue_style('ddp-coco-ecommerce-pages', plugins_url('include/coco/css/coco-ecommerce-pages.css', __FILE__));
            }

            if ($ddp_css_coco == 'products')  {
                wp_enqueue_style('ddp-coco-products', plugins_url('include/coco/css/coco-products.css', __FILE__));
            }


        }


        // Jamie
        if (!empty(get_post_meta($post->ID, 'ddp-css-jamie'))) {
             wp_enqueue_style('ddp-jamie-home', plugins_url('include/jamie/css/jamie-home.css', __FILE__));
             wp_enqueue_style('ddp-jamie-menu', plugins_url('include/jamie/css/jamie-menu.css', __FILE__));
             wp_enqueue_style('ddp-jamie-about', plugins_url('include/jamie/css/jamie-about.css', __FILE__));
             wp_enqueue_style('ddp-jamie-blog-landing', plugins_url('include/jamie/css/jamie-blog-landing1.css', __FILE__));
             wp_enqueue_style('ddp-jamie-blog', plugins_url('include/jamie/css/jamie-blog.css', __FILE__));
             wp_enqueue_style('ddp-jamie-contact', plugins_url('include/jamie/css/jamie-contact.css', __FILE__));
             wp_enqueue_style('ddp-jamie-content', plugins_url('include/jamie/css/jamie-content.css', __FILE__));
             wp_enqueue_style('ddp-jamie-events', plugins_url('include/jamie/css/jamie-event.css', __FILE__));
             wp_enqueue_style('ddp-jamie-services', plugins_url('include/jamie/css/jamie-services.css', __FILE__));
             wp_enqueue_style('ddp-jamie-team-detail', plugins_url('include/jamie/css/jamie-team-detail.css', __FILE__));
             wp_enqueue_style('ddp-jamie-team-page', plugins_url('include/jamie/css/jamie-team.css', __FILE__));
             wp_enqueue_style('ddp-jamie-home-bar-page', plugins_url('include/jamie/css/jamie-home-bar.css', __FILE__));
             wp_enqueue_style('ddp-jamie-home-hotel-page', plugins_url('include/jamie/css/jamie-home-hotel.css', __FILE__));
             wp_enqueue_style('ddp-jamie-footer', plugins_url('include/jamie/css/jamie-footer.css', __FILE__));

        }

        // Demo
        foreach ((array) get_post_meta($post->ID, 'ddp-css-demo') as $ddp_css_demo) {
            if ($ddp_css_demo == 'demo-personal-trainer-page') {
                wp_enqueue_style('ddp-demo-personal-trainer-page', plugins_url('include/demo/css/demo-personal-trainer.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-dentist-page') {
                wp_enqueue_style('ddp-demo-dentist-page', plugins_url('include/demo/css/demo-dentist.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-electrician-page') {
                wp_enqueue_style('ddp-demo-electrician-page', plugins_url('include/demo/css/demo-electrician.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-driving-school-page') {
                wp_enqueue_style('ddp-demo-driving-school-page', plugins_url('include/demo/css/demo-driving-school.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-vet-page') {
                wp_enqueue_style('ddp-demo-vet-page', plugins_url('include/demo/css/demo-vet.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-plumber-page') {
                wp_enqueue_style('ddp-demo-plumber-page', plugins_url('include/demo/css/demo-plumber.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-landscaping-page') {
                wp_enqueue_style('ddp-demo-landscaping-page', plugins_url('include/demo/css/demo-landscaping.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-band-page') {
                wp_enqueue_style('ddp-demo-band-page', plugins_url('include/demo/css/demo-band.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-hairdresser-page') {
                wp_enqueue_style('ddp-demo-hairdresser-page', plugins_url('include/demo/css/demo-hairdresser.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-high-school-page') {
                wp_enqueue_style('ddp-demo-high-school-page', plugins_url('include/demo/css/demo-high-school.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-ngo-page') {
                wp_enqueue_style('ddp-demo-ngo-page', plugins_url('include/demo/css/demo-ngo.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-onlineapp') {
                wp_enqueue_style('ddp-demo-onlineapp-page', plugins_url('include/demo/css/demo-onlineapp.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-catering') {
                wp_enqueue_style('ddp-demo-catering-page', plugins_url('include/demo/css/demo-catering.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-real-estate') {
                wp_enqueue_style('ddp-demo-real-estate-page', plugins_url('include/demo/css/demo-real-estate.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-handyman') {
                wp_enqueue_style('ddp-demo-handyman-page', plugins_url('include/demo/css/demo-handyman.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-call-center') {
                wp_enqueue_style('ddp-demo-callcenter-page', plugins_url('include/demo/css/demo-call-center.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-dance-studio') {
                wp_enqueue_style('ddp-demo-dance-studior-page', plugins_url('include/demo/css/demo-dance-studio.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-clinic') {
                wp_enqueue_style('ddp-demo-clinic-page', plugins_url('include/demo/css/demo-clinic.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-florist') {
                wp_enqueue_style('ddp-demo-florist-page', plugins_url('include/demo/css/demo-florist.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-cleaner') {
                wp_enqueue_style('ddp-demo-cleaner-page', plugins_url('include/demo/css/demo-cleaner.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-dietitian') {
                wp_enqueue_style('ddp-demo-dietitian-page', plugins_url('include/demo/css/demo-dietitian.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-factory') {
                wp_enqueue_style('ddp-demo-factory-page', plugins_url('include/demo/css/demo-factory.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-flooring') {
                wp_enqueue_style('ddp-pegasus-persons', plugins_url('include/pegasus/css/pegasus-persons.css', __FILE__));
                wp_enqueue_style('ddp-demo-flooring-page', plugins_url('include/demo/css/demo-flooring.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-movers') {
                wp_enqueue_style('ddp-demo-movers-page', plugins_url('include/demo/css/demo-movers.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-logistics') {
                wp_enqueue_style('ddp-demo-logistics-page', plugins_url('include/demo/css/demo-logistics.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-kindergarten') {
                wp_enqueue_style('ddp-demo-kindergarten-page', plugins_url('include/demo/css/demo-kindergarten.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-massage') {
                wp_enqueue_style('ddp-demo-massage-page', plugins_url('include/demo/css/demo-massage.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-model') {
                wp_enqueue_style('ddp-demo-model-page', plugins_url('include/demo/css/demo-model.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-novelist') {
                wp_enqueue_style('ddp-demo-novelist-page', plugins_url('include/demo/css/demo-novelist.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-psychologist') {
                wp_enqueue_style('ddp-demo-psychologist-page', plugins_url('include/demo/css/demo-psychologist.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-ski') {
                wp_enqueue_style('ddp-demo-ski-page', plugins_url('include/demo/css/demo-ski.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-wedding') {
                wp_enqueue_style('ddp-demo-wedding-page', plugins_url('include/demo/css/demo-wedding.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-taxi') {
                wp_enqueue_style('ddp-demo-taxi-page', plugins_url('include/demo/css/demo-taxi.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-tea') {
                wp_enqueue_style('ddp-demo-tea-page', plugins_url('include/demo/css/demo-tea.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-summer-camp') {
                wp_enqueue_style('ddp-demo-summer-camp', plugins_url('include/demo/css/demo-summer-camp.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-tailor') {
                wp_enqueue_style('ddp-demo-tailor-page', plugins_url('include/demo/css/demo-tailor.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-surf-club') {
                wp_enqueue_style('ddp-demo-surf-club-page', plugins_url('include/demo/css/demo-surf-club.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-beer') {
                wp_enqueue_style('ddp-demo-beer-page', plugins_url('include/demo/css/demo-beer.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-translator') {
                wp_enqueue_style('ddp-demo-translator-page', plugins_url('include/demo/css/demo-translator.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-vegetable') {
                wp_enqueue_style('ddp-demo-vegetable-page', plugins_url('include/demo/css/demo-vegetable.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-photographer') {
                wp_enqueue_style('ddp-demo-photographer-page', plugins_url('include/demo/css/demo-photographer.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-camp-ground') {
                wp_enqueue_style('ddp-demo-camp-ground-page', plugins_url('include/demo/css/demo-camp-ground.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-wine') {
                wp_enqueue_style('ddp-demo-wine-page', plugins_url('include/demo/css/demo-wine.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-upholsterer') {
                wp_enqueue_style('ddp-demo-upholsterer-page', plugins_url('include/demo/css/demo-upholsterer.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-marina') {
                wp_enqueue_style('ddp-demo-marina-page', plugins_url('include/demo/css/demo-marina.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-nail') {
                wp_enqueue_style('ddp-demo-nail-page', plugins_url('include/demo/css/demo-nail.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-print') {
                wp_enqueue_style('ddp-demo-print-page', plugins_url('include/demo/css/demo-print.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-security') {
                wp_enqueue_style('ddp-demo-security-page', plugins_url('include/demo/css/demo-security.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-animalshelter') {
                wp_enqueue_style('ddp-demo-animalshelter-page', plugins_url('include/demo/css/demo-animalshelter.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-horse') {
                wp_enqueue_style('ddp-demo-horse-page', plugins_url('include/demo/css/demo-horse.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-icecream') {
                wp_enqueue_style('ddp-demo-icecream-page', plugins_url('include/demo/css/demo-ice-cream.css', __FILE__));
            }

            if ($ddp_css_demo == 'demo-fight') {
                wp_enqueue_style('ddp-demo-fight-page', plugins_url('include/demo/css/demo-fight.css', __FILE__));
            }

        }

        // Diana
        foreach ((array) get_post_meta($post->ID, 'ddp-css-diana') as $ddp_css_diana) {
            if ($ddp_css_diana == 'diana-blogs') {
                wp_enqueue_style('ddp-diana-blogs', plugins_url('include/diana/css/diana-blogs.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-blurbs') {
                wp_enqueue_style('ddp-diana-blurbs', plugins_url('include/diana/css/diana-blurbs.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-contents') {
                wp_enqueue_style('ddp-diana-contents', plugins_url('include/diana/css/diana-contents.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-footers') {
                wp_enqueue_style('ddp-diana-footers', plugins_url('include/diana/css/diana-footers.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-headers') {
                wp_enqueue_style('ddp-diana-headers', plugins_url('include/diana/css/diana-headers.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-persons') {
                wp_enqueue_style('ddp-diana-persons', plugins_url('include/diana/css/diana-persons.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-cta') {
                wp_enqueue_style('ddp-diana-cta', plugins_url('include/diana/css/diana-cta.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-sliders') {
                wp_enqueue_style('ddp-diana-sliders', plugins_url('include/diana/css/diana-sliders.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-testimonials') {
                wp_enqueue_style('ddp-diana-testimonials', plugins_url('include/diana/css/diana-testimonials.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-404') {
                wp_enqueue_style('ddp-diana-404-page-1', plugins_url('include/diana/css/diana-404-page1.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-vetical-coming-soon') {
                wp_enqueue_style('ddp-diana-coming-soon-page-1', plugins_url('include/diana/css/diana-coming-soon-page1.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-full-width-under-construction') {
                wp_enqueue_style('ddp-diana-coming-soon-page-2', plugins_url('include/diana/css/diana-coming-soon-page2.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-single-post-v1') {
                wp_enqueue_style('ddp-diana-single-post-v1', plugins_url('include/diana/css/diana-single-post-v1-divi.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-sticky-bars') {
                wp_enqueue_style('ddp-diana-sticky-bar-css', plugins_url('include/diana/css/diana-sticky-header.css', __FILE__));

                for ($i = 1; $i <= 11; $i++) {
                    wp_enqueue_style('ddp-diana-sticky-bar'.$i.'-css', plugins_url('include/diana/css/diana-sticky-header'.$i.'.css', __FILE__));
                }
            }
            if ($ddp_css_diana == 'diana-pop-up') {
                wp_enqueue_style('ddp-diana-pop-up-css', plugins_url('include/diana/css/diana-overlays-popups.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up6-css', plugins_url('include/diana/css/diana-overlays-popups6.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up8-css', plugins_url('include/diana/css/diana-overlays-popups8.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up7-css', plugins_url('include/diana/css/diana-overlays-popups7.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up5-css', plugins_url('include/diana/css/diana-overlays-popups5.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up4-css', plugins_url('include/diana/css/diana-overlays-popups4.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up3-css', plugins_url('include/diana/css/diana-overlays-popups3.css', __FILE__));
                wp_enqueue_style('ddp-diana-pop-up2-css', plugins_url('include/diana/css/diana-overlays-popups2.css', __FILE__));

            }
            if ($ddp_css_diana == 'diana-pricing-tables') {
                wp_enqueue_style('ddp-diana-pricing-tables', plugins_url('include/diana/css/diana-pt.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-ruling-header') {
                wp_enqueue_script('ddp-social-icons-js', plugins_url('include/diana/js/diana-social-icons.js', __FILE__), array( 'wp-i18n' ));
                wp_enqueue_style('ddp-diana-ruling-header', plugins_url('include/diana/css/diana-ruling-header.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana-numbers') {
                wp_enqueue_style('ddp-diana-numbers', plugins_url('include/diana/css/diana-numbers.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-fashion-header') {
                wp_enqueue_style('ddp-diana-fashion-header', plugins_url('include/diana/css/diana-fashion-header.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-authoritative-products') {
                wp_enqueue_style('ddp-diana-authoritative-products', plugins_url('include/diana/css/diana-authoritative-products.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-about-four') {
                wp_enqueue_style('ddp-diana-about-page-4', plugins_url('include/diana/css/diana-about-4.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-never-knew-content') {
                wp_enqueue_style('ddp-diana-never-knew-content', plugins_url('include/diana/css/diana-never-knew-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-no-sweat-v2-blurbs') {
                wp_enqueue_style('ddp-diana-no-sweat-v2-blurbs', plugins_url('include/diana/css/diana-no-sweat-v2-blurbs.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-norma-jean-content') {
                wp_enqueue_style('ddp-diana-norma-jean-content', plugins_url('include/diana/css/diana-norma-jean-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-you-change-content') {
                wp_enqueue_style('ddp-diana-you-change-content', plugins_url('include/diana/css/diana-you-change-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-woodwork-header') {
                wp_enqueue_style('ddp-diana-woodwork-header', plugins_url('include/diana/css/diana-woodwork-header.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-boxey-v2-content') {
                wp_enqueue_style('ddp-diana-boxey-2-content', plugins_url('include/diana/css/diana-boxey-v2-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-cling-to-testimonial') {
                wp_enqueue_style('ddp-diana-cling-to-testimonial', plugins_url('include/diana/css/diana-cling-to-testimonial.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-known-you-content') {
                wp_enqueue_style('ddp-diana-know-you-content', plugins_url('include/diana/css/diana-known-you-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-seems-numbers') {
                wp_enqueue_style('ddp-diana-seems-numbers', plugins_url('include/diana/css/diana-seems-numbers.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-set-in-call-to-action') {
                wp_enqueue_style('ddp-diana-set-in-call-to-action', plugins_url('include/diana/css/diana-set-in-call-to-action.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-treadmill-content') {
                wp_enqueue_style('ddp-diana-treadmill-content', plugins_url('include/diana/css/diana-treadmill-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-your-brain-call-to-action') {
                wp_enqueue_style('ddp-diana-your-brain-call-to-action', plugins_url('include/diana/css/diana-your-brain-call-to-action.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-your-life-content') {
                wp_enqueue_style('ddp-diana-your-life-content', plugins_url('include/diana/css/diana-your-life-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-your-name-content') {
                wp_enqueue_style('ddp-diana-your-name-content', plugins_url('include/diana/css/diana-your-name-content.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-content-in-the-wind') {
                wp_enqueue_style('ddp-diana-content-in-the-wind', plugins_url('include/diana/css/diana-services-1/diana-content-in-the-wind.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-services-button') {
                wp_enqueue_style('ddp-diana-services-button', plugins_url('include/diana/css/diana-services-1/diana-services-1.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-blurbs-candle') {
                wp_enqueue_style('ddp-diana-blurbs-candle', plugins_url('include/diana/css/diana-services-1/diana-blurbs-candle.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-content-cling-to') {
                wp_enqueue_style('ddp-diana-content-cling-to', plugins_url('include/diana/css/diana-services-1/diana-content-cling-to.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-content-set-in') {
                wp_enqueue_style('ddp-diana-content-set-in', plugins_url('include/diana/css/diana-services-1/diana-content-set-in.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-content-always-know') {
                wp_enqueue_style('ddp-diana-content-always-know', plugins_url('include/diana/css/diana-services-1/diana-content-always-know.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-cta-big-dream') {
                wp_enqueue_style('ddp-diana-cta-big-dream', plugins_url('include/diana/css/diana-services-1/diana-cta-big-dream.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-header-ever-did') {
                wp_enqueue_style('ddp-diana-header-ever-did', plugins_url('include/diana/css/diana-services-2/diana-header-ever-did.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-blurbs-your-legend') {
                wp_enqueue_style('ddp-diana-blurbs-your-legend', plugins_url('include/diana/css/diana-services-2/diana-blurbs-your-legend.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-content-who-sees') {
                wp_enqueue_style('ddp-diana-conetnt-who-sees', plugins_url('include/diana/css/diana-services-2/diana-content-who-sees.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-blurbs-just-our') {
                wp_enqueue_style('ddp-diana-blurbs-just-our', plugins_url('include/diana/css/diana-services-2/diana-blurbs-just-our.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-blurbs-goodbye') {
                wp_enqueue_style('ddp-diana-blurbs-goodbye', plugins_url('include/diana/css/diana-services-2/diana-blurbs-goodbye.css', __FILE__));
            }

            if ($ddp_css_diana == 'diana-testimonial-just-a-kid') {
                wp_enqueue_style('ddp-diana-testimonial-just-a-kid', plugins_url('include/diana/css/diana-services-2/diana-testimonial-just-a-kid.css', __FILE__));
            }



            // menus

            if ($ddp_css_diana == 'diana_menu_1') {
                 wp_enqueue_style('ddp-diana-menu1-css', plugins_url('include/diana/css/diana-menu1-styles.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_2') {
                 wp_enqueue_style('ddp-diana-menu2-css', plugins_url('include/diana/css/diana-menu2-styles.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_3') {
                 wp_enqueue_style('ddp-diana-menu3-css', plugins_url('include/diana/css/diana-menu3-styles.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_4') {
                 wp_enqueue_style('ddp-diana-menu4-css', plugins_url('include/diana/css/diana-nav-menu-arch.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_5') {
                 wp_enqueue_style('ddp-diana-menu5-css', plugins_url('include/diana/css/diana-nav-menu-first.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_6') {
                 wp_enqueue_style('ddp-diana-menu6-css', plugins_url('include/diana/css/diana-nav-menu-champion.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_7') {
                 wp_enqueue_style('ddp-diana-menu7-css', plugins_url('include/diana/css/diana-nav-menu-front.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_8') {
                 wp_enqueue_style('ddp-diana-menu8-css', plugins_url('include/diana/css/diana-nav-menu-leading.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_9') {
                 wp_enqueue_style('ddp-diana-menu9-css', plugins_url('include/diana/css/diana-nav-menu-main.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_10') {
                 wp_enqueue_style('ddp-diana-menu10-css', plugins_url('include/diana/css/diana-nav-menu-pioneer.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_11') {
                 wp_enqueue_style('ddp-diana-menu11-css', plugins_url('include/diana/css/diana-nav-menu-premier.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_12') {
                 wp_enqueue_style('ddp-diana-menu12-css', plugins_url('include/diana/css/diana-nav-menu-prime.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_13') {
                 wp_enqueue_style('ddp-diana-menu13-css', plugins_url('include/diana/css/diana-nav-menu-principal.css', __FILE__));
            }
            if ($ddp_css_diana == 'diana_menu_14') {
                 wp_enqueue_style('ddp-diana-menu14-css', plugins_url('include/diana/css/diana-nav-menu-stellar.css', __FILE__));
            }

        }
        // Freddie

        foreach ((array) get_post_meta($post->ID, 'ddp-css-freddie') as $ddp_css_freddie) {
            if ($ddp_css_freddie == 'freddie-transitions') {
                   wp_enqueue_style('ddp-freddie-transitions', plugins_url('include/freddie/css/freddie-transitions.css', __FILE__));
                }

                // menu templates
                if ($ddp_css_freddie == 'freddie-menu-attac-dragon') {
                    wp_enqueue_style('ddp-freddie-menu-attac-dragon', plugins_url('include/freddie/css/freddie-menu-dragon-attack.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-prize') {
                    wp_enqueue_style('ddp-freddie-menu-prize', plugins_url('include/freddie/css/freddie-menu-prize-menu.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-earth') {
                    wp_enqueue_style('ddp-freddie-menu-earth', plugins_url('include/freddie/css/freddie-menu-earth.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-funny-love') {
                    wp_enqueue_style('ddp-freddie-menu-funny-love', plugins_url('include/freddie/css/freddie-menu-funny-how-love.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-hang-on-in-there') {
                    wp_enqueue_style('ddp-freddie-menu-hang-on-in-there', plugins_url('include/freddie/css/freddie-menu-hang-on-in-there.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-lover-boy') {
                    wp_enqueue_style('ddp-freddie-menu-lover-boy', plugins_url('include/freddie/css/freddie-menu-lover-boy.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-hijack-my-heart') {
                    wp_enqueue_script('ddp-freddie-menu-hijack-my-heart-socials', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-menu-hijack-my-heart', plugins_url('include/freddie/css/freddie-hijack-my-heart.css', __FILE__));
                }

                // usual modules
                if ($ddp_css_freddie == 'freddie-headers' || $ddp_css_freddie == 'freddie-header-not-dead') {
                    wp_enqueue_style('ddp-freddie-headers', plugins_url('include/freddie/css/freddie-headers.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-blurbs') {
                    wp_enqueue_style('ddp-freddie-blurbs', plugins_url('include/freddie/css/freddie-blurbs.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-contents') {
                    wp_enqueue_style('ddp-freddie-contents', plugins_url('include/freddie/css/freddie-contents.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-footers') {
                    wp_enqueue_style('ddp-freddie-footers', plugins_url('include/freddie/css/freddie-footers.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-accordions') {
                    wp_enqueue_style('ddp-freddie-accordions', plugins_url('include/freddie/css/freddie-accordions.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-blogs') {
                    wp_enqueue_style('ddp-freddie-blogs', plugins_url('include/freddie/css/freddie-blogs.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-persons') {
                    wp_enqueue_style('ddp-freddie-persons', plugins_url('include/freddie/css/freddie-persons.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-pricing-tables') {
                    wp_enqueue_style('ddp-freddie-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-sliders') {
                    wp_enqueue_style('ddp-freddie-sliders', plugins_url('include/freddie/css/freddie-sliders.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-testimonials') {
                    wp_enqueue_style('ddp-freddie-testimonial', plugins_url('include/freddie/css/freddie-testimonials.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-more-info') {
                    wp_enqueue_style('ddp-freddie-more-info', plugins_url('include/freddie/css/freddie-more-info.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-album') {
                    wp_enqueue_style('ddp-freddie-album', plugins_url('include/freddie/css/freddie-album.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-song-slider') {
                    wp_enqueue_style('ddp-freddie-song-slider', plugins_url('include/freddie/css/freddie-song-slider.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-music') {
                    wp_enqueue_style('ddp-freddie-music', plugins_url('include/freddie/css/freddie-music.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-cta') {
                    wp_enqueue_style('ddp-freddie-cta', plugins_url('include/freddie/css/freddie-cta.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-process-circle') {
                    wp_enqueue_style('ddp-freddie-process-circle', plugins_url('include/freddie/css/freddie-process-circle.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-sidewalk-header') {
                    wp_enqueue_style('ddp-freddie-sidewalk-header', plugins_url('include/freddie/css/freddie-sidewalk-header.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-song-for-lennon-content') {
                    wp_enqueue_style('ddp-freddie-song-for-lennon-content', plugins_url('include/freddie/css/freddie-song-for-lennon-content.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-stealin-video-content') {
                    wp_enqueue_style('ddp-freddie-stealin-video-content', plugins_url('include/freddie/css/freddie-stealin-video-content.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-sweet-lady-slider') {
                    wp_enqueue_style('ddp-freddie-sweet-lady-slider', plugins_url('include/freddie/css/freddie-sweet-lady-slider.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-portfolio') {
                    wp_enqueue_style('ddp-freddie-portfolio', plugins_url('include/freddie/css/freddie-event.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-film-studio-header') {
                    wp_enqueue_style('ddp-freddie-film-studio-header', plugins_url('include/freddie/css/freddie-film-studio-header.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-bicycle-blurbs') {
                    wp_enqueue_style('ddp-freddie-bicycle-blurbs', plugins_url('include/freddie/css/freddie-bicycle-blurbs.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-our-films-content') {
                    wp_enqueue_style('ddp-freddie-our-films-content', plugins_url('include/freddie/css/freddie-our-films-content.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-race-content') {
                    wp_enqueue_style('ddp-freddie-race-content', plugins_url('include/freddie/css/freddie-race-content.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-film-studio-hitman-music-module') {
                    wp_enqueue_style('ddp-freddie-film-studio-hitman-music-module', plugins_url('include/freddie/css/freddie-film-studio-hitman_music_module.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-nevermore-person-module') {
                    wp_enqueue_style('ddp-freddie-nevermore-person-module', plugins_url('include/freddie/css/freddie-nevermore_person_module.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-heart-header') {
                    wp_enqueue_style('ddp-frreddie-my-heart-header', plugins_url('include/freddie/css/freddie-my-heart-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blown-over-blurbs') {
                    wp_enqueue_style('ddp-freddie-blown-over-blurbs', plugins_url('include/freddie/css/freddie-blown-over-blurbs.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-by-the-way-content') {
                    wp_enqueue_style('ddp-freddie-by-the-way-content', plugins_url('include/freddie/css/freddie-by-the-way-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-desert-me-faq') {
                    wp_enqueue_style('ddp-freddie-desert-me-faq', plugins_url('include/freddie/css/freddie-desert-me-faq.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-other-day-testimonial') {
                    wp_enqueue_style('ddp-freddie-other-day-testimonial', plugins_url('include/freddie/css/freddie-other-day-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-going-to-look-optin') {
                    wp_enqueue_style('ddp-freddie-going-to-look-optin', plugins_url('include/freddie/css/freddie-going-to-look-optin.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-be-better-footer') {
                    wp_enqueue_style('ddp-freddie-be-better-footer', plugins_url('include/freddie/css/freddie-be-better-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-modern-times-blog') {
                    wp_enqueue_style('ddp-freddie-modern-times-blog', plugins_url('include/freddie/css/freddie-modern-times-blog.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-old-times-blog') {
                    wp_enqueue_style('ddp-freddie-old-times-blog', plugins_url('include/freddie/css/freddie-old-times-blog.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-let-me-header') {
                    wp_enqueue_style('ddp-freddie-let-me-header', plugins_url('include/freddie/css/freddie-let-me-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-open-windows-products') {
                    wp_enqueue_style('ddp-freddie-open-windows-products', plugins_url('include/freddie/css/freddie-open-windows-products.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-ga-ga-content') {
                    wp_enqueue_style('ddp-freddie-ga-ga-content', plugins_url('include/freddie/css/freddie-ga-ga-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-party-footer') {
                    wp_enqueue_style('ddp-freddie-party-footer', plugins_url('include/freddie/css/freddie-party-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pop-product') {
                    wp_enqueue_style('ddp-freddie-pop-product', plugins_url('include/freddie/css/freddie-pop-product.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-product-details-webdesign-package') {
                    wp_enqueue_style('ddp-freddie-product-details-webdesign-package', plugins_url('include/freddie/css/freddie-product-details-webdesign-package.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-cuff-me-archive') {
                    wp_enqueue_style('ddp-freddie-cuff-me-archive', plugins_url('include/freddie/css/freddie-cuff-me-archive.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-really-does-archive') {
                    wp_enqueue_style('ddp-freddie-really-does-archive', plugins_url('include/freddie/css/freddie-really-does-archive.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-misfire-search-results') {
                    wp_enqueue_style('ddp-freddie-misfire-search-results', plugins_url('include/freddie/css/freddie-misfire-search-results.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-baby-does-search-results') {
                    wp_enqueue_style('ddp-freddie-baby-does-search-results', plugins_url('include/freddie/css/freddie-baby-does-search-results.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-that-glitter-blog-post') {
                    wp_enqueue_style('ddp-freddie-that-glitter-blog-post', plugins_url('include/freddie/css/freddie-that-glitter-blog-post.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-thunderbolt-product') {
                    wp_enqueue_style('ddp-freddie-thunderbolt-product', plugins_url('include/freddie/css/freddie-thunderbolt-product.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-happy-man-testimonial') {
                    wp_enqueue_style('ddp-freddie-happy-man-testimonial', plugins_url('include/freddie/css/freddie-happy-man-tastimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-we-will-rock-you-header') {
                    wp_enqueue_style('ddp-freddie-we-will-rock-you-header', plugins_url('include/freddie/css/freddie-we-will-rock-you-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-live-forever-content') {
                    wp_enqueue_style('ddp-freddie-live-forever-content', plugins_url('include/freddie/css/freddie-live-forever-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-best-friend-blurbs') {
                    wp_enqueue_style('ddp-freddie-best-friend-blurbs', plugins_url('include/freddie/css/freddie-best-friend-blurbs.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-dont-care-content') {
                    wp_enqueue_style('ddp-freddie-dont-care-content', plugins_url('include/freddie/css/freddie-dont-care-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-nevermore-person-module-about') {
                    wp_enqueue_style('ddp-freddie-nevermore-person-module-about', plugins_url('include/freddie/css/freddie_about_page_nevermore_person_module.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-winters-tale-footer') {
                    wp_enqueue_style('ddp-freddie-winters-tale-footer', plugins_url('include/freddie/css/freddie-winters-tale-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-about-page-2') {
                    wp_enqueue_style('ddp-freddie-about-page-2', plugins_url('include/freddie/css/freddie-about2.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-crueladeville-slider') {
                    wp_enqueue_style('ddp-freddie-crueladeville-slider', plugins_url('include/freddie/css/freddie-crueladeville-slider.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pleasure-chest-content') {
                    wp_enqueue_style('ddp-freddie-pleasure-chest-content', plugins_url('include/freddie/css/freddie-pleasure-chest-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pull-you-testimonial') {
                    wp_enqueue_style('ddp-freddie-pull-you-testimonial', plugins_url('include/freddie/css/freddie-pull-you-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-some-good-blurbs') {
                    wp_enqueue_style('ddp-freddie-some-good-blurbs', plugins_url('include/freddie/css/freddie-some-good-blurbs.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-about-page-3') {
                    wp_enqueue_style('ddp-freddie-about-page-3', plugins_url('include/freddie/css/freddie-about3.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-sell-you-testimonial') {
                    wp_enqueue_style('ddp-freddie-sell-you-testimonial', plugins_url('include/freddie/css/freddie-sell-you-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-nothing-but-content') {
                    wp_enqueue_style('ddp-freddie-nothing-but-content', plugins_url('include/freddie/css/freddie-nothing-but-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-about-page-5') {
                    wp_enqueue_style('ddp-freddie-about-page-5', plugins_url('include/freddie/css/freddie-about5.css,', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-attraction-timeline') {
                    wp_enqueue_style('ddp-freddie-attraction-timeline', plugins_url('include/freddie/css/freddie-attraction-timeline.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gonna-rock-footer') {
                    wp_enqueue_style('ddp-freddie-gonna-rock-footer', plugins_url('include/freddie/css/freddie-gonna-rock-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-some-action-content') {
                    wp_enqueue_style('ddp-freddie-some-action-content', plugins_url('include/freddie/css/freddie-some-action-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-tonight-content') {
                    wp_enqueue_style('ddp-freddie-tonight-content', plugins_url('include/freddie/css/freddie-tonight-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-black-lips-content') {
                    wp_enqueue_style('ddp-freddie-black-lips-content', plugins_url('include/freddie/css/freddie-black-lips-content.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-youre-hot-contact-form') {
                    wp_enqueue_style('ddp-freddie-youre-hot-contact-form', plugins_url('include/freddie/css/freddie-youre-hot-contact-form.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gonna-look-footer') {
                    wp_enqueue_style('ddp-freddie-gonna-look-footer', plugins_url('include/freddie/css/freddie-gonna-look-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-step-on-testimonial') {
                    wp_enqueue_style('ddp-freddie-step-on-testimonial', plugins_url('include/freddie/css/freddie-step-on-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-life-testimonial') {
                    wp_enqueue_style('ddp-freddie-my-life-testimonial', plugins_url('include/freddie/css/freddie-my-life-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-needs-you-header') {
                    wp_enqueue_style('ddp-freddie-needs-you-header', plugins_url('include/freddie/css/freddie-needs-you-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-put-out-products') {
                    wp_enqueue_style('ddp-freddie-put-out-products', plugins_url('include/freddie/css/freddie-put-out-products.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-drummer-footer') {
                    wp_enqueue_style('ddp-freddie-drummer-footer', plugins_url('include/freddie/css/freddie-drummer-footer.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-galileo-header') {
                    wp_enqueue_style('ddp-freddie-galileo-header', plugins_url('include/freddie/css/freddie-galileo-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-really-matters-product-detail') {
                    wp_enqueue_style('ddp-freddie-really-matters-product-detail', plugins_url('include/freddie/css/freddie-really-matters-product-detail.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-time-recent-products') {
                    wp_enqueue_style('ddp-freddie-my-time-recent-products', plugins_url('include/freddie/css/freddie-my-time-recent-products.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-drummer-footer-white') {
                    wp_enqueue_style('ddp-freddie-drummer-footer-white', plugins_url('include/freddie/css/freddie-drummer-footer-white.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-hanging-gardens-pricing-tables') {
                    wp_enqueue_script('ddp-freddie-hanging-gardens-pricing-tables', plugins_url('include/freddie/js/freddiePricingTablesHangingGardens.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-hanging-gardens-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables-hanging-gardens.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-sahara-desert-pricing-tables') {
                    wp_enqueue_script('ddp-freddie-sahara-desert-pricing-tables', plugins_url('include/freddie/js/freddiePricingTablesSaharaDesert.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-sahara-desert-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables-sahara-desert.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-world-go-pricing-tables') {
                    wp_enqueue_script('ddp-freddie-world-go-pricing-tables', plugins_url('include/freddie/js/freddiePricingTablesWorldGo.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-world-go-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables-world-go.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-one-thing-pricing-tables') {
                    wp_enqueue_script('ddp-freddie-one-thing-pricing-tables', plugins_url('include/freddie/js/freddiePricingTablesOneThing.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-one-thing-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables-one-thing.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-creations-pricing-tables') {
                    wp_enqueue_style('ddp-freddie-creations-pricing-tables', plugins_url('include/freddie/css/freddie-pricing-tables-creations.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-on-earth-pricing-tables') {
                    wp_enqueue_style('ddp-freddie-on-earth-pricing-tables', plugins_url('include/freddie/css/freddie-on-earth-pricing-tables.css', __FILE__));
                }


                // features (featured  blurbs)

                if ($ddp_css_freddie == 'freddie-calling-me-blurb') {
                    wp_enqueue_style('ddp-freddie-calling-me-blurb', plugins_url('include/freddie/css/freddie-features/freddie-calling-me-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-entertain-you-blurb') {
                    wp_enqueue_style('ddp-freddie-entertain-you-blurb', plugins_url('include/freddie/css/freddie-features/freddie-entertain-you-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-get-better-blurb') {
                    wp_enqueue_style('ddp-freddie_get_better_blurb', plugins_url('include/freddie/css/freddie-features/freddie-get-better-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-i-have-blurb') {
                    wp_enqueue_style('ddp-freddie_i_have_blurb', plugins_url('include/freddie/css/freddie-features/freddie-i-have-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-main-thing-blurb') {
                    wp_enqueue_style('ddp-freddie-main-thing-blurb', plugins_url('include/freddie/css/freddie-features/freddie-main-thing-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-shoes-blurb') {
                    wp_enqueue_style('ddp-freddie-my-shoes-blurb', plugins_url('include/freddie/css/freddie-features/freddie-my-shoes-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-no-blame-blurb') {
                    wp_enqueue_style('ddp-freddie-no-blame-blurb', plugins_url('include/freddie/css/freddie-features/freddie-no-blame-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-on-my-way-blurb') {
                    wp_enqueue_style('ddp-freddie-on-my-way-blurb', plugins_url('include/freddie/css/freddie-features/freddie-on-my-way-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-only-way-blurb') {
                    wp_enqueue_style('ddp-freddie-only-way-blurb', plugins_url('include/freddie/css/freddie-features/freddie-only-way-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-satisfied-blurb') {
                    wp_enqueue_style('ddp-freddie-satisfied-blurb', plugins_url('include/freddie/css/freddie-features/freddie-satisfied-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-steps-nearer-blurb') {
                    wp_enqueue_style('ddp-freddie-steps-nearer-blurb', plugins_url('include/freddie/css/freddie-features/freddie-steps-nearer-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-the-line-blurb') {
                    wp_enqueue_style('ddp-freddie-the-line-blurb', plugins_url('include/freddie/css/freddie-features/freddie-the-line-blurb.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-your-time-blurb') {
                    wp_enqueue_style('ddp-freddie-your-time-blurb', plugins_url('include/freddie/css/freddie-features/freddie-your-time-blurb.css', __FILE__));
                }

                // gallery

                if ($ddp_css_freddie == 'freddie-gallery-a-hero') {
                    wp_enqueue_style('ddp-freddie-gallery-a-hero', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-a-hero.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-every-child') {
                    wp_enqueue_style('ddp-freddie-gallery-every-child', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-every-child.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-the-mighty') {
                    wp_enqueue_style('ddp-freddie-gallery-the-mighty', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-the-mighty.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-oooh-yeah') {
                    wp_enqueue_style('ddp-freddie-gallery-oooh-yeah', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-oooh-yeah.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-my-friend') {
                    wp_enqueue_style('ddp-freddie-gallery-my-friend', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-my-friend.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-every-one') {
                    wp_enqueue_style('ddp-freddie-gallery-every-one', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-every-one.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-be-somebody') {
                    wp_enqueue_style('ddp-freddie-gallery-be-somebody', plugins_url('include/freddie/css/freddie-gallery/freddie-gallery-be-somebody.css', __FILE__));
                }



                // buttons
                if ($ddp_css_freddie == 'freddie-button-jealousy') {
                    wp_enqueue_style('ddp-freddie-button-jealousy', plugins_url('include/freddie/css/freddie-buttons-jealousy.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-loser') {
                    wp_enqueue_style('ddp-freddie-button-the-loser', plugins_url('include/freddie/css/freddie-buttons-the-loser.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-lazing-on') {
                    wp_enqueue_style('ddp-freddie-button-lazing-on', plugins_url('include/freddie/css/freddie-buttons-lazing-on.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-liar') {
                    wp_enqueue_style('ddp-freddie-button-liar', plugins_url('include/freddie/css/freddie-buttons-liar.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-love-kills') {
                    wp_enqueue_style('ddp-freddie-button-love-kills', plugins_url('include/freddie/css/freddie-buttons-love-kills.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-misfire') {
                    wp_enqueue_style('ddp-freddie-button-misfire', plugins_url('include/freddie/css/freddie-buttons-misfire.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-been-saved') {
                    wp_enqueue_style('ddp-freddie-button-been-saved', plugins_url('include/freddie/css/freddie-buttons-been-saved.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-mother-love') {
                    wp_enqueue_style('ddp-freddie-button-mother-love', plugins_url('include/freddie/css/freddie-buttons-mother-love.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-ogre-battle') {
                    wp_enqueue_style('ddp-freddie-button-ogre-battle', plugins_url('include/freddie/css/freddie-buttons-ogre-battle.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-party') {
                    wp_enqueue_style('ddp-freddie-button-party', plugins_url('include/freddie/css/freddie-buttons-party.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-fire') {
                    wp_enqueue_style('ddp-freddie-button-the-fire', plugins_url('include/freddie/css/freddie-buttons-the-fire.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-wild-wind') {
                    wp_enqueue_style('ddp-freddie-button-wild-wind', plugins_url('include/freddie/css/freddie-buttons-wild-wind.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-seaside') {
                    wp_enqueue_style('ddp-freddie-button-seaside', plugins_url('include/freddie/css/freddie-buttons-seaside.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-rendezvous') {
                    wp_enqueue_style('ddp-freddie-button-rendezvous', plugins_url('include/freddie/css/freddie-buttons-rendezvous.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-some-day') {
                    wp_enqueue_style('ddp-freddie-button-some-day', plugins_url('include/freddie/css/freddie-buttons-some-day.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-one-day') {
                    wp_enqueue_style('ddp-freddie-button-one-day', plugins_url('include/freddie/css/freddie-buttons-one-day.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-soul-brother') {
                    wp_enqueue_style('ddp-freddie-button-soul-brother', plugins_url('include/freddie/css/freddie-buttons-soul-brother.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-step-on-me') {
                    wp_enqueue_style('ddp-freddie-button-step-on-me', plugins_url('include/freddie/css/freddie-buttons-step-on-me.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-tear-it-up') {
                    wp_enqueue_style('ddp-freddie-button-tear-it-up', plugins_url('include/freddie/css/freddie-buttons-tear-it-up.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-teo-torriate') {
                    wp_enqueue_style('ddp-freddie-button-teo-torriate', plugins_url('include/freddie/css/freddie-buttons-teo-torriate.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-fairy-feller') {
                    wp_enqueue_style('ddp-freddie-button-fairy-feller', plugins_url('include/freddie/css/freddie-buttons-fairy-feller.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-radio-ga-ga') {
                    wp_enqueue_style('ddp-freddie-button-radio-ga-ga', plugins_url('include/freddie/css/freddie-buttons-radio-ga-ga.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-under-pressure') {
                    wp_enqueue_style('ddp-freddie-button-under-pressure', plugins_url('include/freddie/css/freddie-buttons-under-pressure.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-you-andi') {
                    wp_enqueue_style('ddp-freddie-button-you-andi', plugins_url('include/freddie/css/freddie-buttons-you-andi.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-action-this-day') {
                    wp_enqueue_style('ddp-freddie-button-action-this-day', plugins_url('include/freddie/css/freddie-buttons-action-this-day.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-april-lady') {
                    wp_enqueue_style('ddp-freddie-button-april-lady', plugins_url('include/freddie/css/freddie-buttons-april-lady.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-bicycle-race') {
                    wp_enqueue_style('ddp-freddie-button-bicycle-race', plugins_url('include/freddie/css/freddie-buttons-bicycle-race.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-blag') {
                    wp_enqueue_style('ddp-freddie-button-blag', plugins_url('include/freddie/css/freddie-buttons-blag.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-bohemian') {
                    wp_enqueue_style('ddp-freddie-button-bohemian', plugins_url('include/freddie/css/freddie-buttons-bohemian.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-rhapsody') {
                    wp_enqueue_style('ddp-freddie-button-rhapsody', plugins_url('include/freddie/css/freddie-buttons-rhapsody.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-calling-all-girls') {
                    wp_enqueue_style('ddp-freddie-button-calling-all-girls', plugins_url('include/freddie/css/freddie-buttons-calling-all-girls.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-dancer') {
                    wp_enqueue_style('ddp-freddie-button-dancer', plugins_url('include/freddie/css/freddie-buttons-dancer.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-delilah') {
                    wp_enqueue_style('ddp-freddie-button-delilah', plugins_url('include/freddie/css/freddie-buttons-delilah.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-dont-stop-me') {
                    wp_enqueue_style('ddp-freddie-button-dont-stop-me', plugins_url('include/freddie/css/freddie-buttons-dont-stop-me.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-fat-bottomed') {
                    wp_enqueue_style('ddp-freddie-button-fat-bottomed', plugins_url('include/freddie/css/freddie-buttons-fat-bottomed.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-get-down') {
                    wp_enqueue_style('ddp-freddie-button-get-down', plugins_url('include/freddie/css/freddie-buttons-get-down.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-queen') {
                    wp_enqueue_style('ddp-freddie-button-the-queen', plugins_url('include/freddie/css/freddie-buttons-the-queen.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-good-old') {
                    wp_enqueue_style('ddp-freddie-button-good-old', plugins_url('include/freddie/css/freddie-buttons-good-old.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-headlong') {
                    wp_enqueue_style('ddp-freddie-button-headlong', plugins_url('include/freddie/css/freddie-buttons-headlong.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-break-free') {
                    wp_enqueue_style('ddp-freddie-button-break-free', plugins_url('include/freddie/css/freddie-buttons-break-free.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-beat-them') {
                    wp_enqueue_style('ddp-freddie-button-beat-them', plugins_url('include/freddie/css/freddie-buttons-beat-them.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-beautiful-day') {
                    wp_enqueue_style('ddp-freddie-button-beautiful-day', plugins_url('include/freddie/css/freddie-buttons-beautiful-day.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-killer-queen') {
                    wp_enqueue_style('ddp-freddie-button-killer-queen', plugins_url('include/freddie/css/freddie-buttons-killer-queen.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-life-is-real') {
                    wp_enqueue_style('ddp-freddie-button-life-is-real', plugins_url('include/freddie/css/freddie-buttons-life-is-real.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-love-of') {
                    wp_enqueue_style('ddp-freddie-button-love-of', plugins_url('include/freddie/css/freddie-buttons-love-of.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-made-in-heaven') {
                    wp_enqueue_style('ddp-freddie-button-made-in-heaven', plugins_url('include/freddie/css/freddie-buttons-made-in-heaven.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-melancholy-blues') {
                    wp_enqueue_style('ddp-freddie-button-melancholy-blues', plugins_url('include/freddie/css/freddie-buttons-melancholy-blues.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-no-violins') {
                    wp_enqueue_style('ddp-freddie-button-no-violins', plugins_url('include/freddie/css/freddie-buttons-no-violins.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-one-vision') {
                    wp_enqueue_style('ddp-freddie-button-one-vision', plugins_url('include/freddie/css/freddie-buttons-one-vision.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-play-the-game') {
                    wp_enqueue_style('ddp-freddie-button-play-the-game', plugins_url('include/freddie/css/freddie-buttons-play-the-game.css', __FILE__));
                }

                // Menus

                if ($ddp_css_freddie == 'freddie-menu-1') {
                    wp_enqueue_style('ddp-freddie-menu-prize', plugins_url('include/freddie/css/freddie-menu-prize-menu.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-2') {
                    wp_enqueue_style('ddp-freddie-menu-dragon-attack', plugins_url('include/freddie/css/freddie-menu-dragon-attack.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-3') {
                    wp_enqueue_style('ddp-freddie-menu-earth', plugins_url('include/freddie/css/freddie-menu-earth.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-4') {
                    wp_enqueue_style('ddp-freddie-menu-funny-how-love', plugins_url('include/freddie/css/freddie-menu-funny-how-love.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-5') {
                    wp_enqueue_style('ddp-freddie-menu-hang-on-in-there', plugins_url('include/freddie/css/freddie-menu-hang-on-in-there.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-6') {
                    wp_enqueue_style('ddp-freddie-menu-lover-boy', plugins_url('include/freddie/css/freddie-menu-lover-boy.css', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-7') {
                    wp_enqueue_style('ddp-freddie-hijack-my-heart', plugins_url('include/freddie/css/freddie-hijack-my-heart.css', __FILE__));
                }

                // Blogs

                if ($ddp_css_freddie == 'freddie-blog-post-to-son') {
                    wp_enqueue_style('ddp-freddie-blog-post-to-son', plugins_url('include/freddie/css/freddie-blog-post-to-son.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-drowse') {
                    wp_enqueue_style('ddp-freddie-blog-post-drowse', plugins_url('include/freddie/css/freddie-blog-post-drowse.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-all-girls') {
                    wp_enqueue_style('freddie-blog-post-all-girls', plugins_url('include/freddie/css/freddie-blog-post-all-girls.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-make-love-blog-post') {
                    wp_enqueue_style('ddp-freddie-make-love-blog-post', plugins_url('include/freddie/css/freddie-make-love-blog-post.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-mother-love') {
                    wp_enqueue_style('ddp-freddie-blog-post-mother-love', plugins_url('include/freddie/css/freddie-blog-post-mother-love.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-human-body') {
                    wp_enqueue_style('ddp-freddie-blog-post-human-body', plugins_url('include/freddie/css/freddie-blog-post-human-body.css', __FILE__));
                }



                if ($ddp_css_freddie == 'freddie-funster-testimonial') {
                    wp_enqueue_style('ddp-freddie-funster-testimonial', plugins_url('include/freddie/css/freddie-funster-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-body-testimonial') {
                    wp_enqueue_style('ddp-freddie-my-body-testimonial', plugins_url('include/freddie/css/freddie-my-body-testimonial.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pretty-lights-tabs') {
                    wp_enqueue_style('ddp-freddie-pretty-lights-tabs', plugins_url('include/freddie/css/freddie-pretty-lights-tabs.css', __FILE__));
                }

                // TB Navigation Menus

                if ($ddp_css_freddie == 'freddie-without-counting-header') {
                    wp_enqueue_style('ddp-freddie-without-counting-header', plugins_url('include/freddie/css/tb-navigation-menus/without-counting-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-bali-header') {
                    wp_enqueue_style('ddp-freddie-bali-header', plugins_url('include/freddie/css/tb-navigation-menus/bali-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-hungry-header') {
                    wp_enqueue_style('ddp-freddie-hungry-header', plugins_url('include/freddie/css/tb-navigation-menus/hungry-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-breaking-header') {
                    wp_enqueue_style('ddp-freddie-breaking-header', plugins_url('include/freddie/css/tb-navigation-menus/breaking-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-mona-lis-header') {
                    wp_enqueue_style('ddp-freddie-mona-lis-header', plugins_url('include/freddie/css/tb-navigation-menus/mona-lisa-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-private-affair-header') {
                    wp_enqueue_style('ddp-freddie-private-affair-header', plugins_url('include/freddie/css/tb-navigation-menus/private-affair.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pleading-header') {
                    wp_enqueue_style('ddp-freddie-pleadingg-header', plugins_url('include/freddie/css/tb-navigation-menus/pleading-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-headline-header') {
                    wp_enqueue_style('ddp-freddie-headline-header', plugins_url('include/freddie/css/tb-navigation-menus/headline-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-twisted-header') {
                    wp_enqueue_style('ddp-freddie-twisted-header', plugins_url('include/freddie/css/tb-navigation-menus/twisted-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-get-started-header') {
                    wp_enqueue_style('ddp-freddie-get-started-header', plugins_url('include/freddie/css/tb-navigation-menus/get-started-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-jamming-header') {
                    wp_enqueue_style('ddp-freddie-jamming-header', plugins_url('include/freddie/css/tb-navigation-menus/jamming-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-day-next-header') {
                    wp_enqueue_style('ddp-freddie-day-next-header', plugins_url('include/freddie/css/tb-navigation-menus/day-next-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-come-back-header') {
                    wp_enqueue_style('ddp-freddie-come-back-header', plugins_url('include/freddie/css/tb-navigation-menus/come-back-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-got-all-header') {
                    wp_enqueue_style('ddp-freddie-got-all-header', plugins_url('include/freddie/css/tb-navigation-menus/got-all-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-i-know-header') {
                    wp_enqueue_style('ddp-freddie-i-know-header', plugins_url('include/freddie/css/tb-navigation-menus/i-know-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-just-like-header') {
                    wp_enqueue_style('ddp-freddie-just-like-header', plugins_url('include/freddie/css/tb-navigation-menus/freddie-just-like-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-he-pulled-header') {
                    wp_enqueue_style('ddp-freddie-he-pulled-header', plugins_url('include/freddie/css/tb-navigation-menus/freddie-he-pulled-header.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-no-one-header') {
                    wp_enqueue_style('ddp-freddie-no-one-header', plugins_url('include/freddie/css/tb-navigation-menus/freddie-no-one-header.css', __FILE__));
                }

                 if ($ddp_css_freddie == 'freddie-on-earth-pricing-tables') {
                    wp_enqueue_style('ddp-freddie-on-earth-pricing-tables', plugins_url('include/freddie/css/freddie-on-earth-pricing-tables.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-person-module-my-band') {
                    wp_enqueue_script('ddp-freddie-person-module-my-band', plugins_url('include/freddie/js/freddiePersonMyBand.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-person-module-my-band ', plugins_url('include/freddie/css/freddie-person-module-my-band.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-thank-you-person-module') {
                    wp_enqueue_script('ddp-freddie-thank-you-person-module', plugins_url('include/freddie/js/freddiePersonThankYou.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-thank-you-person-module ', plugins_url('include/freddie/css/freddie-person-module-thank-you.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-greatest-treasure-person-module') {
                    wp_enqueue_style('ddp-freddie-greatest-treasure-person-module', plugins_url('include/freddie/css/freddie-person-module-greatest-treasure.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-rocking-world-person-module') {
                    wp_enqueue_script('ddp-freddie-rocking-world-person-module', plugins_url('include/freddie/js/freddiePersonRockingWorlde.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-rocking-world-person-module', plugins_url('include/freddie/css/freddie-person-module-rocking-world.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-ride-em-person-module') {
                    wp_enqueue_script('ddp-freddie-ride-em-person-module', plugins_url('include/freddie/js/freddiePersonRideEm.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-ride-em-person-module', plugins_url('include/freddie/css/freddie-person-module-ride-em.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-pleasure-person-module') {
                    wp_enqueue_script('ddp-freddie-my-pleasure-person-module', plugins_url('include/freddie/js/freddiePersonMyPleasure.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-my-pleasure-person-module', plugins_url('include/freddie/css/freddie-person-module-my-pleasure.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-you-got-person-module') {
                    wp_enqueue_script('ddp-freddie-you-got-person-module', plugins_url('include/freddie/js/freddiePersonYouGot.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-you-got-person-module', plugins_url('include/freddie/css/freddie-person-module-you-got.css', __FILE__));
                }


                if ($ddp_css_freddie == 'freddie-world-go-person-module') {
                    wp_enqueue_style('ddp-freddie-world-go-person-module', plugins_url('include/freddie/css/freddie-person-module-world-go.css', __FILE__));
                }


                if ($ddp_css_freddie == 'freddie-bikes-person-module') {
                    wp_enqueue_style('ddp-freddie-bikes-person-module', plugins_url('include/freddie/css/freddie-person-module-bikes.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-singing-person-module') {
                    wp_enqueue_script('ddp-freddie-singing-person-module', plugins_url('include/freddie/js/freddiePersonSinging.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-singing-person-module', plugins_url('include/freddie/css/freddie-person-module-singing.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-the-bones-person-module') {
                    wp_enqueue_script('ddp-freddie-the-bones-person-module', plugins_url('include/freddie/js/freddiePersonTheBones.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-the-bones-person-module', plugins_url('include/freddie/css/freddie-person-module-the-bones.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blue-eyed-person-module') {
                    wp_enqueue_script('ddp-freddie-blue-eyed-person-module', plugins_url('include/freddie/js/freddiePersonBlueEyed.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-blue-eyed-person-module', plugins_url('include/freddie/css/freddie-person-module-blue-eyed.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-nanny-person-module') {
                    wp_enqueue_script('ddp-freddie-nanny-person-module', plugins_url('include/freddie/js/freddiePersonNanny.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-nanny-person-module', plugins_url('include/freddie/css/freddie-person-module-nanny.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-red-fire-person-module') {
                    wp_enqueue_script('ddp-freddie-red-fire-person-module', plugins_url('include/freddie/js/freddiePersonRedFire.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-red-fire-person-module', plugins_url('include/freddie/css/freddie-person-module-red-fire.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-every-time-person-module') {
                    wp_enqueue_script('ddp-freddie-every-time-person-module', plugins_url('include/freddie/js/freddiePersonEveryTime.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-every-time-person-module', plugins_url('include/freddie/css/freddie-person-module-every-time.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-person-module-skinny-lad') {
                    wp_enqueue_script('ddp-freddie-person-module-skinny-lad', plugins_url('include/freddie/js/freddiePersonSkinnyLad.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-person-module-skinny-lad', plugins_url('include/freddie/css/freddie-person-module-skinny-lad.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-header-las-palabras-de-amor') {
                    wp_enqueue_script('ddp-freddie-header-las-palabras-de-amor', plugins_url('include/freddie/js/freddie-home9/freddieHeaderLasPalabrasDeAmor.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-header-las-palabras-de-amor', plugins_url('include/freddie/css/freddie-home9/freddie-header-las-palabras-de-amor.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-content-let-me-live') {
                    wp_enqueue_style('ddp-freddie-content-let-me-live', plugins_url('include/freddie/css/freddie-home9/freddie-content-let-me-live.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-content-long-away') {
                    wp_enqueue_style('ddp-freddie-content-long-away', plugins_url('include/freddie/css/freddie-home9/freddie-content-long-away.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-footer-black-queen') {
                    wp_enqueue_style('ddp-freddie-footer-black-queen', plugins_url('include/freddie/css/freddie-home9/freddie-footer-black-queen.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-testimonial-back-to-humans') {
                    wp_enqueue_script('ddp-freddie-testimonial-back-to-humans', plugins_url('include/freddie/js/freddie-home9/freddieTestimonialBackToHumans.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-testimonial-back-to-humans', plugins_url('include/freddie/css/freddie-home9/freddie-testimonial-back-to-humans.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-tabs-more-of-that-jazz') {
                    wp_enqueue_script('ddp-freddie-tabs-more-of-that-jazz', plugins_url('include/freddie/js/freddie-home9/freddieTabsMoreOfThatJazz.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-tabs-more-of-that-jazz', plugins_url('include/freddie/css/freddie-home9/freddie-tabs-more-of-that-jazz.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-header-going-slightly-mad') {
                    wp_enqueue_script('ddp-freddie-header-going-slightly-mad', plugins_url('include/freddie/js/freddie-home10/freddieHeaderGoingSlightlyMad.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-header-going-slightly-mad', plugins_url('include/freddie/css/freddie-home10/freddie-header-going-slightly-mad.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-content-lap-of-the-gods') {
                    wp_enqueue_style('ddp-freddie-content-lap-of-the-gods', plugins_url('include/freddie/css/freddie-home10/freddie-content-lap-of-the-gods.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-content-everybody-happy') {
                    wp_enqueue_script('ddp-freddie-content-everybody-happy', plugins_url('include/freddie/js/freddie-home10/freddieContentEverybodyHappy.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-content-everybody-happy', plugins_url('include/freddie/css/freddie-home10/freddie-content-everybody-happy.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-person-module-its-late') {
                    wp_enqueue_script('ddp-freddie-person-module-its-late', plugins_url('include/freddie/js/freddie-home10/freddiePersonModuleItsLate.js', __FILE__));
                    wp_enqueue_style('ddp-freddie-person-module-its-late', plugins_url('include/freddie/css/freddie-home10/freddie-person-module-its-late.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-footer-keep-yourself-alive') {
                    wp_enqueue_style('ddp-freddie-footer-keep-yourself-alive', plugins_url('include/freddie/css/freddie-home10/freddie-footer-keep-yourself-alive.css', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-author-1') {
                    wp_enqueue_style('ddp-freddie-author-1', plugins_url('include/freddie/css/freddie-author-worthwhile/freddie-author-worthwhile.css', __FILE__));
                }


        } // Freddie end

        // mobile menus

        if (get_option('ddp_menu_template') === 'disabled') {

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_1') {
                    wp_enqueue_style('ddp-responsive-menu-1', plugins_url('include/responsive-menus/css/responsive-menu-1.css', __FILE__));
            }

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_2') {
                    wp_enqueue_style('ddp-responsive-menu-2', plugins_url('include/responsive-menus/css/responsive-menu-2.css', __FILE__));
            }

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_3') {
                    wp_enqueue_style('ddp-responsive-menu-3', plugins_url('include/responsive-menus/css/responsive-menu-3.css', __FILE__));
            }
        }

         // Tina

        foreach ((array) get_post_meta($post->ID, 'ddp-css-tina') as $ddp_css_tina) {
            if ($ddp_css_tina == 'tina-header-the-girl') {
                   wp_enqueue_style('ddp-tina-header-the-girl', plugins_url('include/tina/css/home1/tina-header-the-girl.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-easy-babe') {
                   wp_enqueue_style('ddp-tina-blurbs-easy-babe', plugins_url('include/tina/css/home1/tina-blurbs-easy-babe.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-tabs-the-change') {
                   wp_enqueue_style('ddp-tina-tabs-the-change', plugins_url('include/tina/css/home1/tina-tabs-the-change.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-person-module-she-talks') {
                   wp_enqueue_style('ddp-tina-person-module-she-talks', plugins_url('include/tina/css/home1/tina-person-module-she-talks.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-down-to-me') {
                   wp_enqueue_style('ddp-tina-content-down-to-me', plugins_url('include/tina/css/home1/tina-content-down-to-me.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-its-alright') {
                   wp_enqueue_style('ddp-tina-blog-its-alright', plugins_url('include/tina/css/home1/tina-blog-its-alright.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-siamese') {
                   wp_enqueue_style('ddp-tina-testimonial-siamese', plugins_url('include/tina/css/home1/tina-testimonial-siamese.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-footer-the-change') {
                   wp_enqueue_style('ddp-tina-footer-the-change', plugins_url('include/tina/css/home1/tina-footer-the-change.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-private-dancer') {
                   wp_enqueue_style('ddp-tina-header-private-dancer', plugins_url('include/tina/css/home2/tina-header-private-dancer.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-these-places') {
                   wp_enqueue_style('ddp-tina-content-these-places', plugins_url('include/tina/css/home2/tina-content-these-places.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-their-faces') {
                   wp_enqueue_style('ddp-tina-content-their-faces', plugins_url('include/tina/css/home2/tina-content-their-faces.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-a-dancer') {
                   wp_enqueue_style('ddp-tina-content-a-dancer', plugins_url('include/tina/css/home2/tina-content-a-dancer.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-person-module-my-thumb') {
                   wp_enqueue_style('ddp-tina-person-module-my-thumb', plugins_url('include/tina/css/home2/tina-person-module-my-thumb.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-a-diamond') {
                   wp_enqueue_style('ddp-tina-content-a-diamond', plugins_url('include/tina/css/home2/tina-content-a-diamond.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-all-day') {
                   wp_enqueue_style('ddp-tina-blog-all-day', plugins_url('include/tina/css/home2/tina-blog-all-day.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-footer-dont-walk') {
                   wp_enqueue_style('ddp-tina-footer-dont-walk', plugins_url('include/tina/css/home2/tina-footer-dont-walk.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-see-this') {
                   wp_enqueue_style('ddp-tina-header-see-this', plugins_url('include/tina/css/home3/tina-header-see-this.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-smile-to') {
                   wp_enqueue_style('ddp-tina-blurbs-smile-to', plugins_url('include/tina/css/home3/tina-blurbs-smile-to.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-a-fire') {
                   wp_enqueue_style('ddp-tina-blurbs-a-fire', plugins_url('include/tina/css/home3/tina-blurbs-a-fire.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-get-enough') {
                   wp_enqueue_style('ddp-tina-blurbs-get-enough', plugins_url('include/tina/css/home3/tina-blurbs-get-enough.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-numbers-goes-around') {
                   wp_enqueue_style('ddp-tina-numbers-goes-around', plugins_url('include/tina/css/home3/tina-numbers-goes-around.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-persons-flowing') {
                   wp_enqueue_style('ddp-tina-persons-flowing', plugins_url('include/tina/css/home3/tina-persons-flowing.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-call-to-action-seek') {
                   wp_enqueue_style('ddp-tina-call-to-action-seek', plugins_url('include/tina/css/home3/tina-call-to-action-seek.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-the-flame') {
                   wp_enqueue_style('ddp-tina-blog-the-flame', plugins_url('include/tina/css/home3/tina-blog-the-flame.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-footer-still-play') {
                   wp_enqueue_style('ddp-tina-footer-still-play', plugins_url('include/tina/css/home3/tina-footer-still-play.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-he-belongs') {
                   wp_enqueue_style('ddp-tina-header-he-belongs', plugins_url('include/tina/css/home4/tina-header-he-belongs.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-never-been') {
                   wp_enqueue_style('ddp-tina-blurbs-never-been', plugins_url('include/tina/css/home4/tina-blurbs-never-been.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-buy-into') {
                   wp_enqueue_style('ddp-tina-blurbs-buy-into', plugins_url('include/tina/css/home4/tina-blurbs-buy-into.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-the-flame') {
                   wp_enqueue_style('ddp-tina-content-the-flame', plugins_url('include/tina/css/home4/tina-content-the-flame.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-i-wanna-be') {
                   wp_enqueue_style('ddp-tina-blurbs-i-wanna-be', plugins_url('include/tina/css/home4/tina-blurbs-i-wanna-be.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-you-lead-me') {
                   wp_enqueue_style('ddp-tina-blurbs-you-lead-me', plugins_url('include/tina/css/home4/tina-blurbs-you-lead-me.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-who-did') {
                   wp_enqueue_style('ddp-tina-testimonial-who-did', plugins_url('include/tina/css/home4/tina-testimonial-who-did.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-time-footer-to') {
                   wp_enqueue_style('ddp-tina-time-footer-to', plugins_url('include/tina/css/home4/tina-time-footer-to.css', __FILE__));
            }

            // optins

            if ($ddp_css_tina == 'tina-optin-other-lives') {
                   wp_enqueue_style('ddp-tina-optin-other-lives', plugins_url('include/tina/css/email-optin/tina-optin-other-lives.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-a-kind') {
                   wp_enqueue_style('ddp-tina-optin-a-kind', plugins_url('include/tina/css/email-optin/tina-optin-a-kind.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-your-kiss') {
                   wp_enqueue_style('ddp-tina-optin-your-kiss', plugins_url('include/tina/css/email-optin/tina-optin-your-kiss.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-right-here') {
                   wp_enqueue_style('ddp-tina-optin-right-here', plugins_url('include/tina/css/email-optin/tina-optin-right-here.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-be-right') {
                   wp_enqueue_style('ddp-tina-optin-be-right', plugins_url('include/tina/css/email-optin/tina-optin-be-right.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-gonna-be') {
                   wp_enqueue_style('ddp-tina-optin-gonna-be', plugins_url('include/tina/css/email-optin/tina-optin-gonna-be.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-you-need') {
                   wp_enqueue_style('ddp-tina-optin-you-need', plugins_url('include/tina/css/email-optin/tina-optin-you-need.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-optin-so-familiar') {
                   wp_enqueue_style('ddp-tina-optin-so-familiar', plugins_url('include/tina/css/email-optin/tina-optin-so-familiar.css', __FILE__));
            }

            // Content Pages

            if ($ddp_css_tina == 'tina-content-page-1') {
                   wp_enqueue_style('ddp-tina-content-page-1', plugins_url('include/tina/css/content-page1/tina-contentpage1.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-2') {
                   wp_enqueue_style('ddp-tina-content-page-2', plugins_url('include/tina/css/content-page2/tina-content-page2.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-3') {
                   wp_enqueue_style('ddp-tina-content-page-3', plugins_url('include/tina/css/content-page3/tina-content-page3.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-4') {
                   wp_enqueue_style('ddp-tina-content-page-4', plugins_url('include/tina/css/content-page4/tina-content-page4.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-5') {
                   wp_enqueue_style('ddp-tina-content-page-5', plugins_url('include/tina/css/content-page5/tina-content-page5.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-6') {
                   wp_enqueue_style('ddp-tina-content-page-6', plugins_url('include/tina/css/content-page6/tina-content-page6.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-7') {
                   wp_enqueue_style('ddp-tina-content-page-7', plugins_url('include/tina/css/content-page7/tina-content-page7.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-8') {
                   wp_enqueue_style('ddp-tina-content-page-8', plugins_url('include/tina/css/content-page8/tina-content-page8.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-9') {
                   wp_enqueue_style('ddp-tina-content-page-9', plugins_url('include/tina/css/content-page9/tina-content-page9.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-10') {
                   wp_enqueue_style('ddp-tina-content-page-10', plugins_url('include/tina/css/content-page10/tina-content-page10.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-page-11') {
                   wp_enqueue_style('ddp-tina-content-page-11', plugins_url('include/tina/css/content-page11/tina-content-page11.css', __FILE__));
            }

            // Sidebars

            if ($ddp_css_tina == 'tina-my-lover-sidebar') {
                wp_enqueue_style('ddp-tina-my-lover-sidebar', plugins_url('include/tina/css/content-page1/tina-my-lover-sidebar.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-my-end-sidebar') {
                wp_enqueue_style('ddp-tina-my-end-sidebar', plugins_url('include/tina/css/content-page2/tina-sidebar-my-end.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-my-beggining-sidebar') {
                wp_enqueue_style('ddp-tina-my-beggining-sidebar', plugins_url('include/tina/css/content-page3/tina-sidebar-my-beggining.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-feel-like-sidebar') {
               wp_enqueue_style('ddp-tina-feel-like-sidebar', plugins_url('include/tina/css/content-page4/tina-sidebar-feel-like.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-this-time-sidebar') {
               wp_enqueue_style('ddp-tina-this-time-sidebar', plugins_url('include/tina/css/content-page5/tina-sidebar-this-time.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-be-right-sidebar') {
               wp_enqueue_style('ddp-tina-be-right-sidebar', plugins_url('include/tina/css/content-page6/tina-sidebar-be-right.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-waiting-baby-sidebar') {
               wp_enqueue_style('ddp-tina-waiting-baby-sidebar', plugins_url('include/tina/css/content-page7/tina-sidebar-waiting-baby.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-will-be-sidebar') {
               wp_enqueue_style('ddp-tina-twill-be-sidebar', plugins_url('include/tina/css/content-page8/tina-sidebar-will-be.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-this-life-sidebar') {
               wp_enqueue_style('ddp-tina-this-life-sidebar', plugins_url('include/tina/css/content-page9/tina-sidebar-this-life.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-contentpage10-sidebar') {
               wp_enqueue_style('ddp-tina-contentpage10-sidebar', plugins_url('include/tina/css/content-page10/tina-sidebar-contentpage10.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-the-sun-sidebar') {
               wp_enqueue_style('ddp-tina-the-sun-sidebar', plugins_url('include/tina/css/content-page11/tina-sidebar-the-sun.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-sidewalk-contact-page') {
               wp_enqueue_style('ddp-tina-sidewalk-contact-page', plugins_url('include/tina/css/contact-page1/tina-sidewalk-contact.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-here-waiting-blurbs') {
               wp_enqueue_style('ddp-tina-here-waiting-blurbs', plugins_url('include/tina/css/services-page1/tina-blurbs-here-waiting.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-go-down-content') {
               wp_enqueue_style('ddp-tina-go-down-content', plugins_url('include/tina/css/services-page1/tina-content-go-down.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-my-friend-content') {
               wp_enqueue_style('ddp-tina-my-friend-content', plugins_url('include/tina/css/services-page1/tina-content-my-friend.css', __FILE__));
               wp_enqueue_style('ddp-tina-services-page1', plugins_url('include/tina/css/services-page1/tina-services-page1.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-good-times-blurbs') {
              wp_enqueue_style('ddp-tina-good-times-blurbs', plugins_url('include/tina/css/services-page2/tina-blurbs-good-times.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-way-down-blurbs') {
              wp_enqueue_style('ddp-tina-way-down-blurbs', plugins_url('include/tina/css/services-page2/tina-blurbs-way-down.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-wanna-content') {
              wp_enqueue_style('ddp-tina-wanna-content', plugins_url('include/tina/css/services-page2/tina-content-wanna.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-every-inch-testimonial') {
              wp_enqueue_style('ddp-tina-every-inch-testimonial', plugins_url('include/tina/css/services-page2/tina-testimonial-every-inch.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-come-on-blurbs') {
              wp_enqueue_style('ddp-tina-come-on-blurbs', plugins_url('include/tina/css/careers/tina-blurbs-come-on.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-finest-girl-content') {
              wp_enqueue_style('ddp-tina-finest-girl-content', plugins_url('include/tina/css/careers/tina-content-finest-girl.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-know-girl-content') {
              wp_enqueue_style('ddp-tina-know-girl-content', plugins_url('include/tina/css/careers/tina-content-know-girl.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-perks-content') {
              wp_enqueue_style('ddp-tina-perks-content', plugins_url('include/tina/css/careers/tina-content-perks.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-your-decisions-header') {
              wp_enqueue_style('ddp-tina-header-your-decisions', plugins_url('include/tina/css/home5/tina-header-your-decisions.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-sometimes-content') {
              wp_enqueue_style('ddp-tina-sometimes-content', plugins_url('include/tina/css/home5/tina-content-sometimes.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-and-that-tabs') {
              wp_enqueue_style('ddp-tina-and-that-tabs', plugins_url('include/tina/css/home5/tina-tabs-and-that.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-stronger-content') {
              wp_enqueue_style('ddp-tina-stronger-content', plugins_url('include/tina/css/home5/tina-content-stronger.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-you-again-tabs') {
              wp_enqueue_style('ddp-tina-you-again-tabs', plugins_url('include/tina/css/home5/tina-tabs-you-again.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-about-all-blog') {
              wp_enqueue_style('ddp-tina-about-all-blog', plugins_url('include/tina/css/home5/tina-blog-about-all.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-I-can-footer') {
              wp_enqueue_style('ddp-tina-I-can-footer', plugins_url('include/tina/css/home5/tina-footer-I-can.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-backdoor-man-content') {
              wp_enqueue_style('ddp-tina-backdoor-man-content', plugins_url('include/tina/css/about1/tina-content-backdoor-man.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-coolin-content') {
              wp_enqueue_style('ddp-tina-coolin-content', plugins_url('include/tina/css/about1/tina-content-coolin.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-schoolin-content') {
              wp_enqueue_style('ddp-tina-schoolin-content', plugins_url('include/tina/css/about1/tina-content-schoolin.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-every-inch-blurbs') {
              wp_enqueue_style('ddp-tina-every-inch-blurbs', plugins_url('include/tina/css/about1/tina-blurbs-every-inch.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-shake-content') {
              wp_enqueue_style('ddp-tina-shake-content', plugins_url('include/tina/css/about1/tina-content-shake.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-girl-testimonial') {
              wp_enqueue_style('ddp-tina-girl-testimonial', plugins_url('include/tina/css/about1/tina-testimonial-girl.css', __FILE__));
            }

            // Accordions

            if ($ddp_css_tina == 'tina-accordion-anybody') {
              wp_enqueue_style('ddp-tina-accordion-anybody', plugins_url('include/tina/css/accordions/tina-accordion-anybody.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-charge-of') {
              wp_enqueue_style('ddp-tina-accordion-charge-of', plugins_url('include/tina/css/accordions/tina-accordion-charge-of.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-common-sense') {
              wp_enqueue_style('ddp-tina-accordion-common-sense', plugins_url('include/tina/css/accordions/tina-accordion-common-sense.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-da-dap') {
              wp_enqueue_style('ddp-tina-accordion-da-dap', plugins_url('include/tina/css/accordions/tina-accordion-da-dap.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-i-grew') {
              wp_enqueue_style('ddp-tina-accordion-i-grew', plugins_url('include/tina/css/accordions/tina-accordion-i-grew.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-key-to') {
              wp_enqueue_style('ddp-tina-accordion-key-to', plugins_url('include/tina/css/accordions/tina-accordion-key-to.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-looked-down') {
              wp_enqueue_style('ddp-tina-accordion-looked-down', plugins_url('include/tina/css/accordions/tina-accordion-looked-down.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-my-heart') {
              wp_enqueue_style('ddp-tina-accordion-my-heart', plugins_url('include/tina/css/accordions/tina-accordion-my-heart.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-my-home') {
              wp_enqueue_style('ddp-tina-accordion-my-home', plugins_url('include/tina/css/accordions/tina-accordion-my-home.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-the-start') {
              wp_enqueue_style('ddp-tina-accordion-the-start', plugins_url('include/tina/css/accordions/tina-accordion-the-start.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-accordion-you-alone') {
              wp_enqueue_style('ddp-tina-accordion-you-alone', plugins_url('include/tina/css/accordions/tina-accordion-you-alone.css', __FILE__));
            }

            // accordions end

            if ($ddp_css_tina == 'tina-thinking-about-header') {
              wp_enqueue_style('ddp-tina-thinking-about-header', plugins_url('include/tina/css/home6/tina-header-thinking-about.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-the-past-content') {
              wp_enqueue_style('ddp-tina-the-past-content', plugins_url('include/tina/css/home6/tina-content-the-past.css,', __FILE__));
            }

            if ($ddp_css_tina == 'tina-my-shoulder-blurbs') {
              wp_enqueue_style('ddp-tina-my-shoulder-blurbs', plugins_url('include/tina/css/home6/tina-blurbs-my-shoulder.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-lifetime-blurbs') {
              wp_enqueue_style('ddp-tina-lifetime-blurbs', plugins_url('include/tina/css/home6/tina-blurbs-lifetime.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-all-behind-blurbs') {
              wp_enqueue_style('ddp-tina-all-behind-blurbs', plugins_url('include/tina/css/home6/tina-blurbs-all-behind.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-all-behind-button') {
              wp_enqueue_style('ddp-tina-all-behind-button', plugins_url('include/tina/css/tina-all-behind-button.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-orgotten-moments-blurbs') {
              wp_enqueue_style('ddp-tina-forgotten-moments-blurbs', plugins_url('include/tina/css/home6/tina-blurbs-orgotten-moments.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-other-lives-blurbs') {
              wp_enqueue_style('ddp-tina-other-lives-blurbs', plugins_url('include/tina/css/home6/tina-blurbs-other-lives.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-my-lover-blog') {
              wp_enqueue_style('ddp-tina-my-lover-blog', plugins_url('include/tina/css/home6/tina-blog-my-lover.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-I-breathe-footer') {
              wp_enqueue_style('ddp-tina-I-breathe-footer', plugins_url('include/tina/css/home6/tina-footer-i-breathe.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-contact-form-talk-now') {
              wp_enqueue_style('ddp-tina-contact-form-talk-now', plugins_url('include/tina/css/contact-page2/tina-contact-form-talk-now.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-second-try') {
              wp_enqueue_style('ddp-tina-content-second-try', plugins_url('include/tina/css/contact-page3/tina-content-second-try.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-contact-3-page') {
              wp_enqueue_style('ddp-tina-tina-contact-3-page', plugins_url('include/tina/css/contact-page3/tina-contact-3.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-hear-my') {
              wp_enqueue_style('ddp-tina-blurbs-hear-my', plugins_url('include/tina/css/services-page3/tina-blurbs-hear-my.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-eight-wheeler') {
              wp_enqueue_style('ddp-tina-content-eight-wheeler', plugins_url('include/tina/css/services-page3/tina-content-eight-wheeler.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-cta-im-moving') {
              wp_enqueue_style('ddp-tina-cta-im-moving', plugins_url('include/tina/css/services-page3/tina-cta-im-moving.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-i-got') {
              wp_enqueue_style('ddp-tina-testimonial-i-got', plugins_url('include/tina/css/services-page3/tina-testimonial-i-got.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-throttle') {
              wp_enqueue_style('ddp-tina-content-throttle', plugins_url('include/tina/css/process-page1/tina-content-throttle.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-ease') {
              wp_enqueue_style('ddp-tina-content-ease', plugins_url('include/tina/css/process-page1/tina-content-ease.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-you-got') {
              wp_enqueue_style('ddp-tina-testimonial-you-got', plugins_url('include/tina/css/process-page1/tina-testimonial-you-got.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-listen') {
              wp_enqueue_style('ddp-tina-content-listen', plugins_url('include/tina/css/process-page2/tina-content-listen.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-mister') {
              wp_enqueue_style('ddp-tina-content-mister', plugins_url('include/tina/css/process-page2/tina-content-mister.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-told-you') {
              wp_enqueue_style('ddp-tina-testimonial-told-you', plugins_url('include/tina/css/process-page2/tina-testimonial-told-you.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-come-on-projects') {
              wp_enqueue_style('ddp-tina-come-on-projects', plugins_url('include/tina/css/careers/tina-come-on-projects.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-second-try') {
              wp_enqueue_style('ddp-tina-blurbs-second-try', plugins_url('include/tina/css/about2/tina-blurbs-second-try.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-back-baby') {
              wp_enqueue_style('ddp-tina-content-back-baby', plugins_url('include/tina/css/about2/tina-content-back-baby.css ', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-wanna-hear') {
              wp_enqueue_style('ddp-tina-content-wanna-hear', plugins_url('include/tina/css/about2/tina-content-wanna-hear.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-person-talk-now') {
              wp_enqueue_style('ddp-tina-person-module-talk-now', plugins_url('include/tina/css/about2/tina-person-module-talk-now.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-slider-sail-away') {
              wp_enqueue_style('ddp-tina-slider-sail-away', plugins_url('include/tina/css/tina-slider-sail-away.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-slider-you-take') {
              wp_enqueue_style('ddp-tina-slider-you-take', plugins_url('include/tina/css/home7/tina-slider-you-take.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-slider-you-take-v2') {
              wp_enqueue_style('ddp-tina-slider-you-take-v2', plugins_url('include/tina/css/home7/tina-slider-you-take-V2.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-portfolio-bayou') {
              wp_enqueue_style('ddp-tina-portfolio-bayou', plugins_url('include/tina/css/portfolio-1/tina-portfolio-bayou.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-portfolio-ribbon') {
              wp_enqueue_style('ddp-tina-portfolio-ribbon', plugins_url('include/tina/css/portfolio-2/tina-portfolio-ribbon.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-have-ridden') {
              wp_enqueue_style('ddp-tina-header-have-ridden', plugins_url('include/tina/css/home8/tina-header-have-ridden.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-numbers-orignal') {
              wp_enqueue_style('ddp-tina-numbers-orignal', plugins_url('include/tina/css/home8/tina-numbers-orignal.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-video-sage') {
              wp_enqueue_style('ddp-tina-video-sage', plugins_url('include/tina/css/home8/tina-video-sage.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-case-studies-takes-two') {
              wp_enqueue_style('ddp-tina-case-studies-takes-two', plugins_url('include/tina/css/home8/tina-case-studies-takes-two.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-me-and-you') {
              wp_enqueue_style('ddp-tina-blurbs-me-and-you', plugins_url('include/tina/css/home8/tina-blurbs-me-and-you.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-footer-proud') {
              wp_enqueue_style('ddp-tina-footer-proud', plugins_url('include/tina/css/home8/tina-footer-proud.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-the-people') {
              wp_enqueue_style('ddp-tina-content-the-people', plugins_url('include/tina/css/about3/tina-content-the-people.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-the-fields') {
              wp_enqueue_style('ddp-tina-content-the-fields', plugins_url('include/tina/css/about3/tina-content-the-fields.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-church-house') {
              wp_enqueue_style('ddp-tina-blurbs-church-house.css', plugins_url('include/tina/css/about3/tina-blurbs-church-house.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-call-it') {
              wp_enqueue_style('ddp-tina-tina-content-call-it', plugins_url('include/tina/css/about3/tina-content-call-it.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-go-to') {
              wp_enqueue_style('ddp-tina-testimonial-go-to', plugins_url('include/tina/css/about3/tina-testimonial-go-to.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-person-call-it') {
              wp_enqueue_style('ddp-tina-person-module-call-it', plugins_url('include/tina/css/about3/tina-person-module-call-it.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-church-house') {
              wp_enqueue_style('ddp-tina-content-church-house', plugins_url('include/tina/css/home9/tina-content-church-house.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-speed-limit') {
              wp_enqueue_style('ddp-tina-blurbs-speed-limit', plugins_url('include/tina/css/home9/tina-blurbs-speed-limit.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-tabs-highway') {
              wp_enqueue_style('ddp-tina-tabs-highway', plugins_url('include/tina/css/home9/tina-tabs-highway.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-city-limites') {
              wp_enqueue_style('ddp-tina-testimonial-city-limites', plugins_url('include/tina/css/home9/tina-testimonial-city-limites.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-archive-1') {
              wp_enqueue_style('ddp-tina-archive-1', plugins_url('include/tina/css/archive1/tina-archive1.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-footer-nutbush') {
              wp_enqueue_style('ddp-tina-footer-nutbush', plugins_url('include/tina/css/home9/tina-footer-nutbush.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-switched') {
              wp_enqueue_style('ddp-tina-header-switched', plugins_url('include/tina/css/magazine/tina-header-switched.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-rain-falling') {
              wp_enqueue_style('ddp-tina-blog-rain-falling', plugins_url('include/tina/css/magazine/tina-blog-rain-falling.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-bad-enough') {
              wp_enqueue_style('ddp-tina-blog-bad-enough', plugins_url('include/tina/css/magazine/tina-blog-bad-enough.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-products-working-for') {
              wp_enqueue_style('ddp-tina-products-working-for', plugins_url('include/tina/css/magazine/tina-products-working-for.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-video-talk-much') {
              wp_enqueue_style('ddp-tina-video-talk-much', plugins_url('include/tina/css/magazine/tina-video-talk-much.css', __FILE__));
           }

            if ($ddp_css_tina == 'tina-blog-this-town') {
              wp_enqueue_style('ddp-tina-blog-this-town', plugins_url('include/tina/css/magazine/tina-blog-this-town.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-magazine-still-play-footer') {
              wp_enqueue_style('ddp-tina-magazine-still-play-footer', plugins_url('include/tina/css/magazine/tina-footer-magazine-still-play.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-the-movies') {
              wp_enqueue_style('ddp-tina-content-the-movies', plugins_url('include/tina/css/pricing-1/tina-content-the-movies.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-pricing-tables-pinch-of') {
              wp_enqueue_style('ddp-tina-pricing-tables-pinch-of', plugins_url('include/tina/css/pricing-1/tina-pricing-tables-pinch-of.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-one-can') {
              wp_enqueue_style('ddp-tina-testimonial-one-can', plugins_url('include/tina/css/pricing-1/tina-testimonial-one-can.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-pricing-1-footer') {
              wp_enqueue_style('ddp-tina-pricing-1-footer', plugins_url('include/tina/css/pricing-1/tina-pricing-1-footer.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-header-pale-moon') {
              wp_enqueue_style('ddp-tina-header-pale-moon', plugins_url('include/tina/css/pricing-2/tina-header-pale-moon.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-pricing-table-pretending') {
              wp_enqueue_style('ddp-tina-pricing-table-pretending', plugins_url('include/tina/css/pricing-2/tina-pricing-table-pretending.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-two-can') {
              wp_enqueue_style('ddp-tina-testimonial-two-can', plugins_url('include/tina/css/pricing-2/tina-testimonial-two-can.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-1') {
              wp_enqueue_style('ddp-tina-blog-1', plugins_url('include/tina/css/blogs/blog1/tina-blog-1.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-2') {
              wp_enqueue_style('ddp-tina-blog-2', plugins_url('include/tina/css/blogs/blog2/tina-blog-2.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-3') {
              wp_enqueue_style('ddp-tina-blog-3', plugins_url('include/tina/css/blogs/blog3/tina-blog-3.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-4') {
              wp_enqueue_style('ddp-tina-blog-4', plugins_url('include/tina/css/blogs/blog4/tina-blog-4.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-5') {
              wp_enqueue_style('ddp-tina-blog-5', plugins_url('include/tina/css/blogs/blog5/tina-blog-5.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-6') {
              wp_enqueue_style('ddp-tina-blog-6', plugins_url('include/tina/css/blogs/blog6/tina-blog-6.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blog-7') {
              wp_enqueue_style('ddp-tina-blog-7', plugins_url('include/tina/css/blogs/blog7/tina-blog-7.css', __FILE__));
            }

            // Landing Page 1

            if ($ddp_css_tina == 'tina-header-girls') {
                wp_enqueue_style('ddp-tina-header-girls', plugins_url('include/tina/css/tina-lead-1/tina-header-girls.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-lets-dance') {
                wp_enqueue_style('ddp-tina-content-lets-dance', plugins_url('include/tina/css/tina-lead-1/tina-content-lets-dance.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-broom') {
                wp_enqueue_style('ddp-tina-content-broom', plugins_url('include/tina/css/tina-lead-1/tina-content-broom.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonials-idolize-you') {
                wp_enqueue_style('ddp-tina-testimonials-idolize-you', plugins_url('include/tina/css/tina-lead-1/tina-testimonials-idolize-you.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-numbers-acid') {
                wp_enqueue_style('ddp-tina-numbers-acid', plugins_url('include/tina/css/tina-lead-1/tina-numbers-acid.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-pricing-table-tonight') {
                wp_enqueue_style('ddp-tina-pricing-table-tonight', plugins_url('include/tina/css/tina-lead-1/tina-pricing-table-tonight.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-person-module-open-arms') {
                wp_enqueue_style('ddp-tina-person-module-open-arms', plugins_url('include/tina/css/tina-lead-1/tina-person-module-open-arms.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurbs-i-see') {
                wp_enqueue_style('ddp-tina-blurbs-i-see', plugins_url('include/tina/css/tina-lead-1/tina-blurbs-I-see.css', __FILE__));
            }

            // Landing Page 2

            if ($ddp_css_tina == 'tina-header-crazy') {
                wp_enqueue_style('ddp-tina-header-crazy', plugins_url('include/tina/css/tina-lead-2/tina-header-crazy.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-way') {
                wp_enqueue_style('ddp-tina-tina-content-way', plugins_url('include/tina/css/tina-lead-2/tina-content-way.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-blurb-white') {
                wp_enqueue_style('ddp-tina-blurb-white', plugins_url('include/tina/css/tina-lead-2/tina-blurb-white.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-trusted-by-logo') {
                wp_enqueue_style('ddp-tina-trusted-by-logo', plugins_url('include/tina/css/tina-lead-2/tina-trusted-by-logo.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonial-finest-girl') {
                wp_enqueue_style('ddp-tina-testimonial-finest-girl', plugins_url('include/tina/css/tina-lead-2/tina-testimonial-finest-girl.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-pricing-table-it-on') {
                wp_enqueue_style('ddp-tina-pricing-table-it-on', plugins_url('include/tina/css/tina-lead-2/tina-pricing-table-it-on.css', __FILE__));
            }

            // Landing Page 3

            if ($ddp_css_tina == 'tina-header-steam') {
                wp_enqueue_style('ddp-tina-header-steam', plugins_url('include/tina/css/tina-lead-3/tina-header-steam.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-universe') {
                wp_enqueue_style('ddp-tina-content-universe', plugins_url('include/tina/css/tina-lead-3/tina-content-universe.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-liberty') {
                wp_enqueue_style('ddp-tina-content-liberty', plugins_url('include/tina/css/tina-lead-3/tina-content-liberty.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-cause') {
                wp_enqueue_style('ddp-tina-content-cause', plugins_url('include/tina/css/tina-lead-3/tina-content-cause.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-producers') {
                wp_enqueue_style('ddp-tina-content-producers', plugins_url('include/tina/css/tina-lead-3/tina-content-producers.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-content-eternal') {
                wp_enqueue_style('ddp-tina-content-eternal', plugins_url('include/tina/css/tina-lead-3/tina-content-eternal.css', __FILE__));
            }

            if ($ddp_css_tina == 'tina-testimonials-lead-3') {
                wp_enqueue_style('ddp-tina-testimonials-lead-3', plugins_url('include/tina/css/tina-lead-3/tina-testimonials-lead-3.css', __FILE__));
            }

        } // Tina end

        // Ragnar

    if (!empty(get_post_meta($post->ID, 'ddp-css-ragnar'))) {
        foreach ((array) get_post_meta($post->ID, 'ddp-css-ragnar') as $ddp_css_ragnar) {
            // for 25 Nov
            if ($ddp_css_ragnar == 'ragnar-header-arne') {
               wp_enqueue_style('ddp-ragnar-header-arne', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-header-arne.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-eagle') {
               wp_enqueue_style('ddp-ragnar-content-eagle', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-content-eagle.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blurbs-birger') {
               wp_enqueue_style('ddp-ragnar-blurbs-birger', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-blurbs-birger.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blurbs-keeper') {
               wp_enqueue_style('ddp-ragnar-blurbs-keeper', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-blurbs-keeper.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blog-bjorn') {
               wp_enqueue_style('ddp-ragnar-blog-bjorn', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-blog-bjorn.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-bear') {
               wp_enqueue_style('ddp-ragnar-content-bear', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-content-bear.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-footer-bo') {
               wp_enqueue_style('ddp-ragnar-footer-bo', plugins_url('include/ragnar/css/ragnar-home-1/ragnar-footer-Bo.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-header-resident') {
               wp_enqueue_style('ddp-ragnar-header-resident', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-header-resident.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-erik') {
               wp_enqueue_style('ddp-ragnar-content-erik', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-content-erik.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blurbs-ruler') {
               wp_enqueue_style('ddp-ragnar-blurbs-ruler', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-blurbs-ruler.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-frode') {
               wp_enqueue_style('ddp-ragnar-content-frode', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-content-frode.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-testimonails-gorm') {
               wp_enqueue_style('ddp-ragnar-testimonails-gorm', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-tesimonails-gorm.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blog-halfdan') {
               wp_enqueue_style('ddp-ragnar-blog-halfdan', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-blog-halfdan.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-footer-danish') {
               wp_enqueue_style('ddp-ragnar-footer-danish', plugins_url('include/ragnar/css/ragnar-home-2/ragnar-footer-danish.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-header-left') {
               wp_enqueue_style('ddp-ragnar-header-left', plugins_url('include/ragnar/css/ragnar-home-3/ragnar-header-left.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-curly') {
               wp_enqueue_style('ddp-ragnar-content-curly', plugins_url('include/ragnar/css/ragnar-home-3/ragnar-content-curly.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-kare') {
               wp_enqueue_style('ddp-ragnar-content-kare', plugins_url('include/ragnar/css/ragnar-home-3/ragnar-content-kare.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-knot') {
               wp_enqueue_style('ddp-ragnar-content-knot', plugins_url('include/ragnar/css/ragnar-home-3/ragnar-content-knot.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blog-knud') {
               wp_enqueue_style('ddp-ragnar-blog-knud', plugins_url('include/ragnar/css/ragnar-home-3/ragnar-blog-knud.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-header-descendant') {
               wp_enqueue_style('ddp-ragnar-header-descendant', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-header-descendant.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-njal') {
               wp_enqueue_style('ddp-ragnar-content-njal', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-content-njal.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-giant') {
               wp_enqueue_style('ddp-ragnar-content-giant', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-content-giant.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-roar') {
               wp_enqueue_style('ddp-ragnar-content-roar', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-content-roar.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-fame') {
               wp_enqueue_style('ddp-ragnar-content-fame', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-content-fame.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blog-rune') {
               wp_enqueue_style('ddp-ragnar-blog-rune', plugins_url('include/ragnar/css/ragnar-home-4/ragnar-blog-rune.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-content-movin-on') {
               wp_enqueue_style('ddp-ragnar-content-movin-on', plugins_url('include/ragnar/css/ragnar-home-5/ragnar-content-movin-on.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-wheeler') {
               wp_enqueue_style('ddp-ragnar-content-wheeler', plugins_url('include/ragnar/css/ragnar-home-5/ragnar-content-wheeler.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-testimonial-daddy') {
               wp_enqueue_style('ddp-ragnar-testimonial-daddy', plugins_url('include/ragnar/css/ragnar-home-5/ragnar-testimonial-daddy.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-blog-loud-whistle') {
               wp_enqueue_style('ddp-ragnar-blog-loud-whistle', plugins_url('include/ragnar/css/ragnar-home-5/ragnar-blog-loud-whistle.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-footer-my-mother') {
               wp_enqueue_style('ddp-ragnar-footer-my-mother', plugins_url('include/ragnar/css/ragnar-home-5/ragnar-footer-my-mother.css', __FILE__));
            }

             // for 26 Nov
            if ($ddp_css_ragnar == 'ragnar-contact-trygve') {
               wp_enqueue_style('ddp-ragnar-contact-trygve', plugins_url('include/ragnar/css/ragnar-contact-1/ragnar-contact-trygve.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-footer-harald') {
               wp_enqueue_style('ddp-ragnar-footer-harald', plugins_url('include/ragnar/css/ragnar-contact-1/ragnar-footer-harald.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-header-wolf') {
               wp_enqueue_style('ddp-ragnar-header-wolf', plugins_url('include/ragnar/css/ragnar-contact-2/ragnar-header-wolf.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-contact-wealth') {
               wp_enqueue_style('ddp-ragnar-contact-wealth', plugins_url('include/ragnar/css/ragnar-contact-2/ragnar-contact-wealth.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-header-age') {
               wp_enqueue_style('ddp-ragnar-header-age', plugins_url('include/ragnar/css/ragnar-contact-3/ragnar-header-age.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-contact-ploughs') {
               wp_enqueue_style('ddp-ragnar-contact-ploughs', plugins_url('include/ragnar/css/ragnar-contact-3/ragnar-contact-ploughs.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-person-ancestor') {
               wp_enqueue_style('ddp-ragnar-person-ancestor', plugins_url('include/ragnar/css/ragnar-contact-3/ragnar-person-ancestor.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-contact-loved') {
               wp_enqueue_style('ddp-ragnar-contact-loved', plugins_url('include/ragnar/css/ragnar-contact-4/ragnar-contact-loved.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-astrid') {
               wp_enqueue_style('ddp-ragnar-content-astrid', plugins_url('include/ragnar/css/ragnar-contact-4/ragnar-content-astrid.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-content-bodil') {
               wp_enqueue_style('ddp-ragnar-content-bodil', plugins_url('include/ragnar/css/ragnar-contact-5/ragnar-content-bodil.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-contact-penance') {
               wp_enqueue_style('ddp-ragnar-contact-penance', plugins_url('include/ragnar/css/ragnar-contact-5/ragnar-contact-penance.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-content-tove') {
               wp_enqueue_style('ddp-ragnar-content-tove', plugins_url('include/ragnar/css/ragnar-contact-6/ragnar-content-tove.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-contact-form-dove') {
               wp_enqueue_style('ddp-ragnar-contact-form-dove', plugins_url('include/ragnar/css/ragnar-contact-6/ragnar-contact-form-dove.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-header-toke') {
               wp_enqueue_style('ddp-ragnar-header-toke', plugins_url('include/ragnar/css/ragnar-case-study-1/ragnar-header-toke.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-slider-thor') {
               wp_enqueue_style('ddp-ragnar-slider-thor', plugins_url('include/ragnar/css/ragnar-case-study-1/ragnar-slider-thor.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-helmet') {
               wp_enqueue_style('ddp-ragnar-content-helmet', plugins_url('include/ragnar/css/ragnar-case-study-1/ragnar-content-helmet.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-torsten') {
               wp_enqueue_style('ddp-ragnar-content-torsten', plugins_url('include/ragnar/css/ragnar-case-study-1/ragnar-content-torsten.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-slider-voice-id-sing') {
               wp_enqueue_style('ddp-ragnar-slider-voice-id-sing', plugins_url('include/ragnar/css/ragnar-case-study-2/ragnar-slider-voice-id-sing.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-noble-barque') {
               wp_enqueue_style('ddp-ragnar-content-noble-barque', plugins_url('include/ragnar/css/ragnar-case-study-2/ragnar-content-noble-barque.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-i-steer') {
               wp_enqueue_style('ddp-ragnar-content-i-steer', plugins_url('include/ragnar/css/ragnar-case-study-2/ragnar-content-i-steer.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-projects-good-oars') {
               wp_enqueue_style('ddp-ragnar-projects-good-oars', plugins_url('include/ragnar/css/ragnar-case-study-2/ragnar-projects-good-oars.css', __FILE__));
            }


            if ($ddp_css_ragnar == 'ragnar-person-module-roar') {
               wp_enqueue_style('ddp-ragnar-person-module-roar', plugins_url('include/ragnar/css/ragnar-team-1/ragnar-person-module-roar.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-content-spear') {
               wp_enqueue_style('ddp-ragnar-content-spear', plugins_url('include/ragnar/css/ragnar-team-1/ragnar-content-spear.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-person-module-roar') {
               wp_enqueue_style('ddp-ragnar-person-module-roar', plugins_url('include/ragnar/css/ragnar-team-1/ragnar-person-module-roar.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-portfolio-good-oars') {
               wp_enqueue_style('ddp-ragnar-portfolio-good-oars', plugins_url('include/ragnar/css/ragnar-our-work/ragnar-portfolio-good-oars.css', __FILE__));
            }
            if ($ddp_css_ragnar == 'ragnar-subscribe-galleys') {
               wp_enqueue_style('ddp-ragnar-subscribe-galleys', plugins_url('include/ragnar/css/ragnar-our-work/ragnar-subscribe-galleys.css', __FILE__));
            }

            // for 27 Nov

            if ($ddp_css_ragnar == 'ragnar-menu-farmer') {
               wp_enqueue_style('ddp-ragnar-menu-farmer', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-farmer.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-hulks') {
               wp_enqueue_style('ddp-ragnar-menu-hulks', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-hulks.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-idun') {
               wp_enqueue_style('ddp-ragnar-menu-idun', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-idun.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-longhouse') {
               wp_enqueue_style('ddp-ragnar-menu-longhouse', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-longhouse.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-pursuit') {
               wp_enqueue_style('ddp-ragnar-menu-pursuit', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-pursuit.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-skalds') {
               wp_enqueue_style('ddp-ragnar-menu-skalds', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-skalds.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-menu-valhalla') {
               wp_enqueue_style('ddp-ragnar-menu-valhalla', plugins_url('include/ragnar/css/ragnar-menus/ragnar-menu-valhalla.css', __FILE__));
            }

            // for 30 Nov

            if ($ddp_css_ragnar == 'ragnar-not-found-2') {
               wp_enqueue_style('ddp-ragnar-not-found-2', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v2.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-4') {
               wp_enqueue_style('ddp-ragnar-not-found-4', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v4.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-5') {
               wp_enqueue_style('ddp-ragnar-not-found-5', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v5.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-6') {
               wp_enqueue_style('ddp-ragnar-not-found-6', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v6.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-7') {
               wp_enqueue_style('ddp-ragnar-not-found-7', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v7.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-8') {
               wp_enqueue_style('ddp-ragnar-not-found-8', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v8.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-9') {
               wp_enqueue_style('ddp-ragnar-not-found-9', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v9.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-10') {
               wp_enqueue_style('ddp-ragnar-not-found-10', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v10.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-11') {
               wp_enqueue_style('ddp-ragnar-not-found-11', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v11.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-13') {
               wp_enqueue_style('ddp-ragnar-not-found-13', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v13.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-15') {
               wp_enqueue_style('ddp-ragnar-not-found-15', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v15.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-16') {
               wp_enqueue_style('ddp-ragnar-not-found-16', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v16.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-17') {
               wp_enqueue_style('ddp-ragnar-not-found-17', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v17.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-18') {
               wp_enqueue_style('ddp-ragnar-not-found-18', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v18.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-19') {
               wp_enqueue_style('ddp-ragnar-not-found-19', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v19.css', __FILE__));
            }

            if ($ddp_css_ragnar == 'ragnar-not-found-21') {
               wp_enqueue_style('ddp-ragnar-not-found-21', plugins_url('include/ragnar/css/ragnar-not-found/ragnar-404-v21.css', __FILE__));
            }

            // for 2 Dec

            for ($i = 1; $i < 18; $i++) {
                if ($ddp_css_ragnar == 'ragnar-popups-'.$i) {
                    wp_enqueue_style('ddpdm-ragnar-pop-up'.$i.'-css',plugins_url('/include/ragnar/css/ragnar-popups/ragnar-popups-v'.$i.'.css', __FILE__));
                }
            }

            for ($i = 1; $i < 10; $i++) {
                if ($ddp_css_ragnar == 'ragnar-coming-soon-'.$i) {
                    wp_enqueue_style('ddpdm-ragnar-coming-soon'.$i.'-css',plugins_url('/include/ragnar/css/ragnar-coming-soon/ragnar-coming-soon-'.$i.'.css', __FILE__));
                }
            }

        }
    }

    // Ragnar ends

    } // end if($post)
    }


    add_action('wp_footer', 'ddp_register_css');
    add_action('et_fb_enqueue_assets', 'ddp_register_css', 1);

    //======================================================================
    // LOAD JS BASED ON POST META
    //======================================================================

    function ddp_register_js($post_here) {
        if(!$post_here) $post = get_post();
        else $post = $post_here;

        if($post) {

        // Fancybox
        wp_enqueue_script('ddp-fancybox-js', plugins_url('include/fancybox/jquery.fancybox.js', __FILE__));
        wp_enqueue_script('ddp-fancybox-pack-js', plugins_url('include/fancybox/jquery.fancybox.pack.js', __FILE__));

        if (!empty(get_post_meta($post->ID, 'ddp-css-falkor'))) {
            wp_enqueue_script('ddp-falkor-js', plugins_url('include/falkor/js/falkor_divi.js', __FILE__), array( 'wp-i18n' ));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-jackson'))) {
            wp_enqueue_script('ddp-jackson-js', plugins_url('include/jackson/js/jackson_divi.js', __FILE__), array( 'wp-i18n' ));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-mermaid'))) {
            wp_enqueue_script('ddp-mermaid-js', plugins_url('include/mermaid/js/mermaid_divi.js', __FILE__));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-mozart'))) {
            wp_enqueue_script('ddp-mozart-js', plugins_url('include/mozart/js/mozart_divi.js', __FILE__), array( 'wp-i18n' ));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-pegasus'))) {
            wp_enqueue_script('ddp-pegasus-hoverdir-js', plugins_url('include/pegasus/js/jquery.hoverdir.js', __FILE__));
            wp_enqueue_script('ddp-pegasus-inview-js', plugins_url('include/pegasus/js/jquery.inview.js', __FILE__));
            wp_enqueue_script('ddp-pegasus-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
            wp_enqueue_script('ddp-pegasus-js', plugins_url('include/pegasus/js/pegasus_divi.js', __FILE__), array( 'wp-i18n' ));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-pixie'))) {
            wp_enqueue_script('ddp-pixie-js', plugins_url('include/pixie/js/pixie_divi.js', __FILE__));
        }
        if (!empty(get_post_meta($post->ID, 'ddp-css-unicorn'))) {
            wp_enqueue_script('ddp-unicorn-js', plugins_url('include/unicorn/js/unicorn_divi.js', __FILE__), array( 'wp-i18n' ));
        }
        // Venus
        if (!empty(get_post_meta($post->ID, 'ddp-css-venus'))) {
            wp_enqueue_script('ddp-venus-charming-js', plugins_url('include/venus/js/charming.min.js', __FILE__));
            wp_enqueue_script('ddp-venus-hoverdir-js', plugins_url('include/venus/js/jquery.hoverdir.js', __FILE__));
            wp_enqueue_script('ddp-venus-inview-js', plugins_url('include/venus/js/jquery.inview.js', __FILE__));
            wp_enqueue_script('ddp-venus-masonry-js', plugins_url('include/venus/js/masonry.pkgd.min.js', __FILE__));
            wp_enqueue_script('ddp-venus-nearby-js', plugins_url('include/venus/js/nearby.js', __FILE__));
            wp_enqueue_script('ddp-venus-tweenmax-js', plugins_url('include/venus/js/TweenMax.min.js', __FILE__));
            foreach ((array) get_post_meta($post->ID, 'ddp-css-venus') as $ddp_css_venus) {
                if ($ddp_css_venus == 'blog') {
                    wp_enqueue_script('ddp-venus-blog-js', plugins_url('include/venus/js/venus-blog.js', __FILE__));
                }
                if ($ddp_css_venus == 'cta') {
                    wp_enqueue_script('ddp-venus-cta-js', plugins_url('include/venus/js/venus-cta.js', __FILE__));
                }
                if ($ddp_css_venus == 'faq') {
                    wp_enqueue_script('ddp-venus-faq-js', plugins_url('include/venus/js/venus-faq.js', __FILE__));
                }
                if ($ddp_css_venus == 'features') {
                    wp_enqueue_script('ddp-venus-features-js', plugins_url('include/venus/js/venus-features.js', __FILE__));
                }
                if ($ddp_css_venus == 'form' || $ddp_css_venus == 'contact') {
                   // wp_enqueue_script('ddp-venus-nearby-js', plugins_url('include/venus/js/nearby.js', __FILE__));
                    wp_enqueue_script('ddp-venus-form-js', plugins_url('include/venus/js/venus-form.js', __FILE__));
                }
                if ($ddp_css_venus == 'header') {
                    wp_enqueue_script('ddp-venus-header-js', plugins_url('include/venus/js/venus-header.js', __FILE__));
                    wp_enqueue_script('ddp-venus-features-js', plugins_url('include/venus/js/venus-features.js', __FILE__));
                }
                if ($ddp_css_venus == 'person') {
                    wp_enqueue_script('ddp-venus-person-js', plugins_url('include/venus/js/venus-person.js', __FILE__));
                }
                if ($ddp_css_venus == 'pricing-tables') {
                    wp_enqueue_script('ddp-venus-pricint-tables-js', plugins_url('include/venus/js/venus-pricing-tables.js', __FILE__));
                }
                if ($ddp_css_venus == 'subscribe') {
                    wp_enqueue_script('ddp-venus-subscribe-js', plugins_url('include/venus/js/venus-subscribe.js', __FILE__));
                }
            }
        }
        // Sigmund

        if (!empty(get_post_meta($post->ID, 'ddp-css-sigmund'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-sigmund') as $ddp_css_sigmund) {
                if ($ddp_css_sigmund == 'persons') {
                    wp_enqueue_script('ddp-sigmund-hoverdir-js', plugins_url('include/venus/js/jquery.hoverdir.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-persons-js', plugins_url('include/sigmund/js/persons-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'portfolio') {
                    wp_enqueue_script('ddp-sigmund-masonry-js', plugins_url('include/venus/js/masonry.pkgd.min.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-portfolio-js', plugins_url('include/sigmund/js/portfolio-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'testimonials') {
                    wp_enqueue_script('ddp-sigmund-testimonials-js', plugins_url('include/sigmund/js/testimonial-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'tabs') {
                    wp_enqueue_script('ddp-sigmund-tabs-js', plugins_url('include/sigmund/js/tabs-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'accordion') {
                    wp_enqueue_script('ddp-sigmund-accordion-js', plugins_url('include/sigmund/js/accordion-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'contact' || $ddp_css_sigmund == 'forms' || $ddp_css_sigmund == 'contact-pages') {
                    wp_enqueue_script('ddp-sigmund-accordion-js', plugins_url('include/sigmund/js/accordion-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-blog-js', plugins_url('include/sigmund/js/blog-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-contact-js', plugins_url('include/sigmund/js/contact-forms-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-newsletter-js', plugins_url('include/sigmund/js/newsletter-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-typed-js', plugins_url('include/sigmund/js/typed-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-typing-js', plugins_url('include/sigmund/js/typing-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-slider-js', plugins_url('include/sigmund/js/slider-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'footers') {
                    wp_enqueue_script('ddp-sigmund-newsletter-js', plugins_url('include/sigmund/js/newsletter-sigmund.js', __FILE__));
                }
                if ($ddp_css_sigmund == 'headers') {
                    wp_enqueue_script('ddp-sigmund-typed-js', plugins_url('include/sigmund/js/typed-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-typing-js', plugins_url('include/sigmund/js/typing-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-service-page1-js', plugins_url('include/sigmund/js/sigmund-services-1.js', __FILE__));
                }

                if ($ddp_css_sigmund == 'office') {
                    wp_enqueue_script('ddp-sigmund-contact-js', plugins_url('include/sigmund/js/contact-forms-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-newsletter-js', plugins_url('include/sigmund/js/newsletter-sigmund.js', __FILE__));

                }

                if ($ddp_css_sigmund == 'services-page1') {
                    wp_enqueue_script('ddp-sigmund-testimonials-js', plugins_url('include/sigmund/js/testimonial-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-service-page1-js', plugins_url('include/sigmund/js/sigmund-services-1.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-pricing-tables-js', plugins_url('include/sigmund/js/sigmund-pricing-tables.js', __FILE__));

                }

                if ($ddp_css_sigmund == 'table-page1') {
                    wp_enqueue_script('ddp-sigmund-testimonials-js', plugins_url('include/sigmund/js/testimonial-sigmund.js', __FILE__));
                    wp_enqueue_script('ddp-sigmund-pricing-tables-js', plugins_url('include/sigmund/js/sigmund-pricing-tables.js', __FILE__));

                }
                if ($ddp_css_sigmund == 'pricing-tables') {
                    wp_enqueue_script('ddp-sigmund-pricing-tables-js', plugins_url('include/sigmund/js/sigmund-pricing-tables.js', __FILE__));

                }
            }
        }

        // Jamie

        if (!empty(get_post_meta($post->ID, 'ddp-css-jamie'))) {
            wp_enqueue_script('ddp-jamie-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
            wp_enqueue_script('ddp-jamie-js', plugins_url('include/jamie/js/jamie_divi.js', __FILE__));
        }

        // Impi
        if (!empty(get_post_meta($post->ID, 'ddp-css-impi'))) {
            wp_enqueue_script('ddp-impi-fancybox-js', plugins_url('include/impi/js/impi-fancybox.js', __FILE__));
            foreach ((array) get_post_meta($post->ID, 'ddp-css-impi') as $ddp_css_impi) {
                if ($ddp_css_impi == 'testimonials') {
                   wp_enqueue_script('ddp-impi-tesimonials-js', plugins_url('include/impi/js/impi-testimonials.js', __FILE__));
                }
                if ($ddp_css_impi == 'persons') {
                   wp_enqueue_script('ddp-impi-persons-js', plugins_url('include/impi/js/impi-persons.js', __FILE__));
                }

                if ($ddp_css_impi == 'blogs') {
                    wp_enqueue_script('ddp-impi-blog-js', plugins_url('include/impi/js/impi-blog.js', __FILE__));
                }

                if ($ddp_css_impi == 'sliders' || $ddp_css_impi == 'headers') {
                    wp_enqueue_script('ddp-impi-sliders-js', plugins_url('include/impi/js/impi-sliders.js', __FILE__));
                }

                if ($ddp_css_impi == 'forms') {
                    wp_enqueue_script('ddp-impi-forms-js', plugins_url('include/impi/js/impi-contact-forms.js', __FILE__));
                }

                if ($ddp_css_impi == 'contents') {
                    wp_enqueue_script('ddp-impi-contents-js', plugins_url('include/impi/js/impi-contents.js', __FILE__));
                }

                if ($ddp_css_impi == 'faq') {
                    wp_enqueue_script('ddp-impi-faq-js', plugins_url('include/impi/js/impi-faq.js', __FILE__));
                }

                if ($ddp_css_impi == 'portfolio') {
                    wp_enqueue_script('ddp-impi-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
                    wp_enqueue_script('ddp-impi-hoverdir-js', plugins_url('include/pegasus/js/jquery.hoverdir.js', __FILE__));
                    wp_enqueue_script('ddp-impi-portfolio-js', plugins_url('include/impi/js/impi-portfolio.js', __FILE__));
                }

                if ($ddp_css_impi == 'pricing-tables') {
                    wp_enqueue_script('ddp-impi-pricing-tables-js', plugins_url('include/impi/js/impi-pricing.js', __FILE__));
                }

            }
        }


        // Coco
        if (!empty(get_post_meta($post->ID, 'ddp-css-coco'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-coco') as $ddp_css_coco) {
                if ($ddp_css_coco == 'newsletter' || $ddp_css_coco == 'footers') {
                   wp_enqueue_script('ddp-coco-newsletter-js', plugins_url('include/coco/js/newsletter-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'sliders' || $ddp_css_coco == 'headers' || $ddp_css_coco == 'persons') {
                    wp_enqueue_script('ddp-coco-sliders-js', plugins_url('include/coco/js/sliders-coco.js', __FILE__));
                    wp_enqueue_script('ddp-coco-socials-js', plugins_url('include/coco/js/socials-coco.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_coco == 'image-loader') {
                   wp_enqueue_script('ddp-coco-image-loader-js', plugins_url('include/coco/js/image-load-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'testimonials') {
                   wp_enqueue_script('ddp-coco-testimonials-js', plugins_url('include/coco/js/testimonials-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'content') {
                   wp_enqueue_script('ddp-coco-contents-js', plugins_url('include/coco/js/contents-coco.js', __FILE__));
                   wp_enqueue_script('ddp-coco-animations-js', plugins_url('include/coco/js/sections-add-class-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'pricing-tables') {
                   wp_enqueue_script('ddp-coco-pricing-tables-js', plugins_url('include/coco/js/pricing-tables-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'persons') {
                   wp_enqueue_script('ddp-coco-persons-js', plugins_url('include/coco/js/persons-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'portfolio') {
                   wp_enqueue_script('ddp-coco-portfolio-js', plugins_url('include/coco/js/portfolio-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'forms') {
                   wp_enqueue_script('ddp-coco-forms-js', plugins_url('include/coco/js/contact-forms-coco.js', __FILE__));
                }

                if ($ddp_css_coco == 'products') {
                    wp_enqueue_script('ddp-coco-products-js', plugins_url('include/coco/js/single-product-woo-coco.js', __FILE__));
                }

            }
        }

        // Demo

        if (!empty(get_post_meta($post->ID, 'ddp-css-demo'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-demo') as $ddp_css_demo) {
                if ($ddp_css_demo == 'demo-band-page') {
                   wp_enqueue_script('ddp-demo-band-js', plugins_url('include/demo/js/demo-band.js', __FILE__));
                }

                if ($ddp_css_demo == 'demo-florist') {
                    wp_enqueue_script('ddp-demo-florist-page-js', plugins_url('include/demo/js/demo-florist.js', __FILE__));
                }

                if ($ddp_css_demo == 'demo-flooring') {
                    wp_enqueue_script('ddp-demo-flooring-page-js', plugins_url('include/demo/js/demo-flooring.js', __FILE__));
                }

                if ($ddp_css_demo == 'demo-eat-your-slider') {
                    wp_enqueue_script('ddp-demo-eat-your-slider-js', plugins_url('include/demo/js/demoEatYourSlider.js', __FILE__));
                }

                if ($ddp_css_demo == 'demo-marina') {
                    wp_enqueue_script('ddp-demo-marina-page-js', plugins_url('include/demo/js/demo-marina.js', __FILE__));
                }

                if ($ddp_css_demo == 'demo-fight') {
                    wp_enqueue_script('ddp-demo-fight-page-js', plugins_url('include/demo/js/demo-fight.js', __FILE__));
                }

            }
        }

        // Diana

        if (!empty(get_post_meta($post->ID, 'ddp-css-diana'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-diana') as $ddp_css_diana) {
                if ($ddp_css_diana == 'diana-blogs') {
                   wp_enqueue_script('ddp-blogs-js', plugins_url('include/diana/js/diana-blogs.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-blurbs') {
                   wp_enqueue_script('ddp-blurbs-js', plugins_url('include/diana/js/diana-blurbs.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-persons') {
                   wp_enqueue_script('ddp-persons-js', plugins_url('include/diana/js/diana-persons.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-sliders' || $ddp_css_diana == 'diana-headers') {
                   wp_enqueue_script('ddp-sliders-js', plugins_url('include/diana/js/diana-sliders.js', __FILE__));
                   wp_enqueue_script('ddp-social-icons-js', plugins_url('include/diana/js/diana-social-icons.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_diana == 'diana-testimonials') {
                   wp_enqueue_script('ddp-testimonials-js', plugins_url('include/diana/js/diana-testimonials.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-footers') {
                   wp_enqueue_script('ddp-footers-js', plugins_url('include/diana/js/diana-footers.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-contents') {
                   wp_enqueue_script('ddp-contents-js', plugins_url('include/diana/js/diana-contents.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-vetical-coming-soon' || $ddp_css_diana == 'diana-full-width-under-construction') {
                   wp_enqueue_script('ddp-coming-soon-js', plugins_url('include/diana/js/dianaComingSoon.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-single-post-v1') {
                    wp_enqueue_script('ddp-diana-single-post-js', plugins_url('include/diana/js/dianaSinglePost.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-sticky-bars') {
                    wp_enqueue_script('ddp-diana-sticky-bars-cookies-js', plugins_url('include/diana/js/diana-jquery.cookie.js', __FILE__));
                    wp_enqueue_script('ddp-diana-sticky-bars-js', plugins_url('include/diana/js/dianaStickyHeaders.js', __FILE__));
                    $ddp_dataToBePassed = array(
                        'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
                        'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
                        'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
                        'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
                        'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
                        'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
                        'ddp_pop_template'  => get_option('ddp_pop_up_template'),
                        'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
                        'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
                        'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
                        'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
                        'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
                    );
                    wp_localize_script( 'ddp-diana-sticky-bars-js', 'ddp_php_vars', $ddp_dataToBePassed);
                }

                if ($ddp_css_diana == 'diana-pop-up') {
                    wp_enqueue_script('ddp-diana-cookies-js', plugins_url('include/diana/js/diana-jquery.cookie.js', __FILE__));
                    wp_enqueue_script('ddp-diana-pop-up-js', plugins_url('include/diana/js/dianaPopups.js', __FILE__));
                        $ddp_dataToBePassed = array(
                            'ddp_pop_template'  => get_option('ddp_pop_up_template'),
                            'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
                            'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
                            'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
                            'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
                            'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
                            'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
                            'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
                            'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
                            'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
                            'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
                            'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
                        );
                    wp_localize_script( 'ddp-diana-pop-up-js', 'ddp_php_vars', $ddp_dataToBePassed);
                }
                if ($ddp_css_diana == 'diana-pricing-tables') {
                    wp_enqueue_script('ddp-diana-pricing-tables-js', plugins_url('include/diana/js/diana-pt.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana-ruling-header') {
                    wp_enqueue_script('ddp-diana-ruling-header-js', plugins_url('include/diana/js/dianaRulingHeader.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana-fashion-header') {
                    wp_enqueue_script('ddp-diana-fashion-header-js', plugins_url('include/diana/js/dianaFashionHeader.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-authoritative-products') {
                    wp_enqueue_script('ddp-diana-tilt-js', plugins_url('include/diana/js/tilt.jquery.js', __FILE__));
                    wp_enqueue_script('ddp-diana-authoritative-products-js', plugins_url('include/diana/js/dianaAuthoritativeProducts.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-cling-to-testimonial') {
                    wp_enqueue_script('ddp-diana-cling-to-testimonial-js', plugins_url('include/diana/js/dianaClingToTestimonial.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-woodwork-header') {
                    wp_enqueue_script('ddp-diana-woodwork-header-js', plugins_url('include/diana/js/dianaWoodWorkHeader.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-content-always-know') {
                    wp_enqueue_script('ddp-diana-content-always-know-js', plugins_url('include/diana/js/diana-services-1/dianaContentAlwaysKnow.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-blurbs-just-our') {
                    wp_enqueue_script('ddp-diana-blurbs-just-our-js', plugins_url('include/diana/js/diana-services-2/dianaBlurbsJustOur.js', __FILE__));
                }

                if ($ddp_css_diana == 'diana-blurbs-goodbye') {
                    wp_enqueue_script('ddp-diana-blurbs-goodbye-js', plugins_url('include/diana/js/diana-services-2/dianaBlurbsGoodbye.js', __FILE__));
                }


                // menus
                if ($ddp_css_diana == 'diana_menu_1') {
                     wp_enqueue_script('ddp-diana-menu1-js', plugins_url('include/diana/js/diana-menu.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_2') {
                     wp_enqueue_script('ddp-diana-menu2-js', plugins_url('include/diana/js/diana-menu-2.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_3') {
                     wp_enqueue_script('ddp-diana-menu3-js', plugins_url('include/diana/js/diana-menu-3.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_4') {
                     wp_enqueue_script('ddp-diana-menu4-js', plugins_url('include/diana/js/dianaNavMenuArch.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_5') {
                     wp_enqueue_script('ddp-diana-menu5-js', plugins_url('include/diana/js/dianaNavMenuFirst.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_6') {
                     wp_enqueue_script('ddp-diana-menu6-js', plugins_url('include/diana/js/dianaNavMenuChampion.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_7') {
                     wp_enqueue_script('ddp-diana-menu7-js', plugins_url('include/diana/js/dianaNavMenuFront.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_8') {
                     wp_enqueue_script('ddp-diana-menu8-js', plugins_url('include/diana/js/dianaNavMenuLeading.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_9') {
                     wp_enqueue_script('ddp-diana-menu9-js', plugins_url('include/diana/js/dianaNavMenuMain.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_10') {
                     wp_enqueue_script('ddp-diana-menu10-js', plugins_url('include/diana/js/dianaNavMenuPioneer.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_11') {
                     wp_enqueue_script('ddp-diana-menu11-js', plugins_url('include/diana/js/dianaNavMenuPremier.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_12') {
                     wp_enqueue_script('ddp-diana-menu12-js', plugins_url('include/diana/js/dianaNavMenuPrime.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_13') {
                     wp_enqueue_script('ddp-diana-menu13-js', plugins_url('include/diana/js/dianaNavMenuPrincipal.js', __FILE__));
                }
                if ($ddp_css_diana == 'diana_menu_14') {
                     wp_enqueue_script('ddp-diana-menu14-js', plugins_url('include/diana/js/dianaNavMenuStellar.js', __FILE__));
                }

            }
        }

        // Freddie

         if (!empty(get_post_meta($post->ID, 'ddp-css-freddie'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-freddie') as $ddp_css_freddie) {
                // gsap
                if ($ddp_css_freddie == 'freddie-blue-eyed-person-module' || $ddp_css_freddie == 'freddie-the-bones-person-module' || $ddp_css_freddie == 'freddie-singing-person-module' || $ddp_css_freddie == 'freddie-thank-you-person-module' || $ddp_css_freddie == 'freddie-menu-prize' || $ddp_css_freddie == 'freddie-menu-attac-dragon' || $ddp_css_freddie == 'freddie-contents'  || $ddp_css_freddie == 'freddie-blurbs' || $ddp_css_freddie == 'freddie-buttons' || $ddp_css_freddie == 'freddie-headers' || $ddp_css_freddie == 'freddie-footers' || $ddp_css_freddie == 'freddie-testimonials' || $ddp_css_freddie == 'freddie-sliders' || $ddp_css_freddie == 'freddie-pricing-tables' || $ddp_css_freddie == 'freddie-menu-earth' || $ddp_css_freddie == 'freddie-menu-funny-love' || $ddp_css_freddie == 'freddie-menu-hang-on-in-there' || $ddp_css_freddie == 'freddie-menu-lover-boy' || $ddp_css_freddie == 'freddie-menu-hijack-my-heart' || $ddp_css_freddie == 'freddie-blogs' || $ddp_css_freddie == 'freddie-persons' ||  $ddp_css_freddie == 'freddie-more-info' ||  $ddp_css_freddie == 'freddie-song-slider' ||  $ddp_css_freddie == 'freddie-music' || $ddp_css_freddie == 'freddie-cta' || $ddp_css_freddie == 'freddie-footers' || $ddp_css_freddie == 'freddie-process-circle' || $ddp_css_freddie == 'freddie-header-not-dead'  || $ddp_css_freddie == 'freddie-sidewalk-header'  || $ddp_css_freddie == 'freddie-sweet-lady-slider' || $ddp_css_freddie == 'freddie-product-details-webdesign-package' || $ddp_css_freddie =='freddie-the-line-blurb' || $ddp_css_freddie =='freddie-satisfied-blurb' || $ddp_css_freddie =='freddie-steps-nearer-blurb' || $ddp_css_freddie =='freddie-your-time-blurb' || $ddp_css_freddie =='freddie-on-my-way-blurb' || $ddp_css_freddie =='freddie-person-module-skinny-lad' || $ddp_css_freddie =='freddie-bali-header' || $ddp_css_freddie =='freddie-gallery-oooh-yeah' || $ddp_css_freddie =='freddie-gallery-my-friend' || $ddp_css_freddie =='freddie-author-1' || $ddp_css_freddie == 'freddie-footer-keep-yourself-alive' || $ddp_css_freddie =='freddie-content-lap-of-the-gods')  {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-transitions' || $ddp_css_freddie == 'freddie-contents') {
                    wp_enqueue_script('ddp-freddie-transitions-js', plugins_url('include/freddie/js/freddieScriptPageTransition.js', __FILE__));
                }

                // menu templates
                if ($ddp_css_freddie == 'freddie-menu-prize') {
                    wp_enqueue_script('ddp-freddie-menu-prize-js', plugins_url('include/freddie/js/freddieScriptPrizeMenu.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-menu-attac-dragon') {
                    wp_enqueue_script('ddp-freddie-menu-attac-dragon-js', plugins_url('include/freddie/js/freddieScriptAttackDragonMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-earth') {
                    wp_enqueue_script('ddp-freddie-menu-earth-js', plugins_url('include/freddie/js/freddieScriptEarthMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-funny-love') {
                    wp_enqueue_script('ddp-freddie-menu-funny-love-js', plugins_url('include/freddie/js/freddieScriptFunnyHowLoveMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-hang-on-in-there') {
                    wp_enqueue_script('ddp-freddie-menu-hang-on-in-there-js', plugins_url('include/freddie/js/freddieScriptHangOnInThereMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-lover-boy') {
                    wp_enqueue_script('ddp-freddie-menu-lover-boy-js', plugins_url('include/freddie/js/freddieScriptLoverBoyMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-hijack-my-heart') {
                    wp_enqueue_script('ddp-freddie-menu-hijack-my-heart-js', plugins_url('include/freddie/js/freddieHijackMyHeart.js', __FILE__));
                }

                // usual modules
                if ($ddp_css_freddie == 'freddie-headers') {
                    wp_enqueue_script('ddp-freddie-headers-socials', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-headers-three', plugins_url('include/freddie/js/three.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-headers-hovers', plugins_url('include/freddie/js/hover-effect.umd.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-headers-js', plugins_url('include/freddie/js/freddieScriptsHeaders.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-header-not-dead') {
                    wp_enqueue_script('ddp-freddie-headers-socials', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-headers-js', plugins_url('include/freddie/js/freddieScriptsHeaders.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-header-not-dead-pixi-js', plugins_url('include/freddie/js/pixi.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-header-not-dead-js', plugins_url('include/freddie/js/freddieNotDeadHeader.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-contents') {
                    wp_enqueue_script('ddp-freddie-contents-js', plugins_url('include/freddie/js/freddieScriptsContents.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-footers') {
                    wp_enqueue_script('ddp-freddie-newsletter-js', plugins_url('include/freddie/js/freddieNewsletter.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-footers-js', plugins_url('include/freddie/js/freddieScriptsFooters.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-accordions') {
                    wp_enqueue_script('ddp-freddie-accordions-js', plugins_url('include/freddie/js/freddieScriptsAccordions.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-blogs') {
                    wp_enqueue_script('ddp-freddie-blogs-js', plugins_url('include/freddie/js/freddieScriptsBlogs.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-blurbs') {
                    wp_enqueue_script('ddp-freddie-blurbs-js', plugins_url('include/freddie/js/freddieScriptsBlurbs.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-persons') {
                    wp_enqueue_script('ddp-freddie-persons-js', plugins_url('include/freddie/js/freddieScriptsPersons.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-pricing-tables') {
                    wp_enqueue_script('ddp-freddie-pricing-tables-js', plugins_url('include/freddie/js/freddieScriptsPricingTables.js', __FILE__), array( 'wp-i18n' ));
                }
                if ($ddp_css_freddie == 'freddie-sliders') {
                    wp_enqueue_script('ddp-freddie-sliders-js', plugins_url('include/freddie/js/freddieScriptsSliders.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-testimonials') {
                    wp_enqueue_script('ddp-freddie-testimonial-js', plugins_url('include/freddie/js/freddieScriptsTestimonials.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-more-info') {
                    wp_enqueue_script('ddp-freddie-more-info-js', plugins_url('include/freddie/js/freddieMoreInfo.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-album') {
                    wp_enqueue_script('ddp-freddie-album-js', plugins_url('include/freddie/js/freddieScriptAlbum.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-song-slider') {
                    wp_enqueue_script('ddp-freddie-song-slider-js', plugins_url('include/freddie/js/freddieScriptSongSlider.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-music') {
                    wp_enqueue_script('ddp-freddie-music-js', plugins_url('include/freddie/js/freddieScriptMusic.js', __FILE__), array( 'wp-i18n' ));
                }
                if ($ddp_css_freddie == 'freddie-cta') {
                    wp_enqueue_script('ddp-freddie-cta-js', plugins_url('include/freddie/js/freddieScriptCta.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-process-circle') {
                    wp_enqueue_script('ddp-freddie-process-circle-js', plugins_url('include/freddie/js/freddieScriptProcessCircle.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-sidewalk-header') {
                    wp_enqueue_script('ddp-freddie-sidewalk-header-js', plugins_url('include/freddie/js/freddieSidewalkHeader.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-song-for-lennon-content') {
                    wp_enqueue_script('ddp-freddie-song-for-lennon-content-js', plugins_url('include/freddie/js/freddie-song-for-lennon-content.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-stealin-video-content') {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-stealin-video-content-js', plugins_url('include/freddie/js/freddieStealinVideoContent.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-sweet-lady-slider') {
                    wp_enqueue_script('ddp-freddie-sweet-lady-slider-js', plugins_url('include/freddie/js/freddieSweetLadySlider.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-portfolio') {
                    wp_enqueue_script('ddp-freddie-portfolio-js', plugins_url('include/freddie/js/freddieScriptEvent.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-race-content') {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-race-content-js', plugins_url('include/freddie/js/freddieScriptsRaceContent.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-our-films-content') {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-our-films-content', plugins_url('include/freddie/js/freddieScriptOurFilmsContent.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-nevermore-person-module') {
                    wp_enqueue_script('ddp-freddie-nevermore-person-module-js', plugins_url('include/freddie/js/freddieScriptsNevermorePersonModule.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-heart-header') {
                    wp_enqueue_script('ddp-freddie-my-heart-header-js', plugins_url('include/freddie/js/freddieMyHeartHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-other-day-testimonial') {
                    wp_enqueue_script('ddp-freddie-other-day-testimonial-js', plugins_url('include/freddie/js/freddieOtherDayTestimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-going-to-look-optin') {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-going-to-look-optin-js', plugins_url('include/freddie/js/freddieGoingToLookOptin.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-modern-times-blog') {
                    wp_enqueue_script('ddp-freddie-modern-times-blog-js', plugins_url('include/freddie/js/modernTimesBlog.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-old-times-blog') {
                    wp_enqueue_script('ddp-freddie-old-times-blog-tilt-js', plugins_url('include/freddie/js/tilt.jquery.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-old-times-blog-js', plugins_url('include/freddie/js/oldTimesBlog.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-let-me-header') {
                    wp_enqueue_script('ddp-freddie-headers-socials', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-let-me-header-js', plugins_url('include/freddie/js/freddieLetMeHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-open-windows-products') {
                    wp_enqueue_script('ddp-freddie-open-windows-products-js', plugins_url('include/freddie/js/freddieOpenWindowsProducts.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pop-product') {
                    wp_enqueue_script('ddp-freddie-pop-product-js', plugins_url('include/freddie/js/freddieScriptPopProduct.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_freddie == 'freddie-product-details-webdesign-package') {
                    wp_enqueue_script('ddp-freddie-product-details-webdesign-package-js', plugins_url('include/freddie/js/freddieProductDetailsWebdesignPackage.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-happy-man-testimonial') {
                    wp_enqueue_script('ddp-freddie-happy-man-testimonial-js', plugins_url('include/freddie/js/freddieScriptHappyManTestimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pretty-lights-tabs') {
                    wp_enqueue_script('ddp-freddie-pretty-lights-tabs-js', plugins_url('include/freddie/js/freddieScriptPrettyLightsTabs.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-body-testimonial') {
                    wp_enqueue_script('ddp-freddie-my-body-testimonial-js', plugins_url('include/freddie/js/freddieScriptMyBodyTestimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-nevermore-person-module-about') {
                    wp_enqueue_script('ddp-freddie-nevermore-person-module-about', plugins_url('include/freddie/js/freddieAboutNevermorePerson.js,', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-winters-tale-footer') {
                    wp_enqueue_script('ddp-freddie-winters-tale-footer-js', plugins_url('include/freddie/js/freddieScriptWintersTaleFooter.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-crueladeville-slider') {
                    wp_enqueue_script('ddp-freddie-crueladeville-slider-js', plugins_url('include/freddie/js/freddieCrueladevilleSlider.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pull-you-testimonial') {
                    wp_enqueue_script('ddp-freddie-pull-you-testimonial-js', plugins_url('include/freddie/js/freddiePullYouTestimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-nothing-but-content') {
                    wp_enqueue_script('ddp-freddie-nothing-but-content-js', plugins_url('include/freddie/js/freddieNothingButContent.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-attraction-timeline') {
                    wp_enqueue_script('ddp-freddie-attraction-timeline-js', plugins_url('include/freddie/js/freddieAttractionTimeline.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-some-action-content') {
                    wp_enqueue_script('ddp-freddie-some-action-content-js', plugins_url('include/freddie/js/freddieScriptSomeActionContent.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-some-action-content') {
                    wp_enqueue_script('ddp-freddie-some-action-content-js', plugins_url('include/freddie/js/freddieScriptSomeActionContent.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-youre-hot-contact-form') {
                    wp_enqueue_script('ddp-freddie-youre-hot-contact-form-js', plugins_url('include/freddie/js/freddieScriptYoureHotContactForm.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-black-lips-content') {
                    wp_enqueue_script('ddp-freddie-headers-socials', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-funster-testimonial') {
                    wp_enqueue_script('ddp-freddie-funster-testimonial-js', plugins_url('include/freddie/js/freddie-funster-testimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-life-testimonial') {
                    wp_enqueue_script('ddp-freddie-my-life-testimonial-js', plugins_url('include/freddie/js/freddieScriptMyLifeTestimonial.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-needs-you-header') {
                    wp_enqueue_script('ddp-freddie-needs-you-header-js', plugins_url('include/freddie/js/freddie-needs-you-header.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-put-out-products') {
                    wp_enqueue_script('ddp-freddie-put-out-products-js', plugins_url('include/freddie/js/freddiePutOutProducts.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-really-matters-product-detail') {
                    wp_enqueue_script('ddp-freddie-really-matters-product-detail-js', plugins_url('include/freddie/js/freddieReallyMattersProductDetail.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-my-time-recent-products') {
                    wp_enqueue_script('ddp-freddie-my-time-recent-products-js', plugins_url('include/freddie/js/freddieMyTimeRecentProducts.js', __FILE__));
                }

                // features

                if ($ddp_css_freddie == 'freddie-the-line-blurb') {
                    wp_enqueue_script('ddp-freddie-the-line-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptTheLineBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-satisfied-blurb') {
                    wp_enqueue_script('ddp-freddie-satisfied-blurb', plugins_url('include/freddie/js/freddie-features/freddieScriptSatisfiedBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-steps-nearer-blurb') {
                    wp_enqueue_script('ddp-freddie-steps-nearer-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptStepsNearerBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-your-time-blurb') {
                    wp_enqueue_script('ddp-freddie-your-time-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptYourTimeBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-on-my-way-blurb') {
                    wp_enqueue_script('ddp-freddie-on-my-way-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptMyWayBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-no-blame-blurb') {
                    wp_enqueue_script('ddp-freddie-no-blame-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptNoBlameBlurb.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-i-have-blurb') {
                    wp_enqueue_script('ddp-freddie-i-have-blurb-js', plugins_url('include/freddie/js/freddie-features/freddieScriptHaveBlurb.js', __FILE__));
                }

                // gallery

                if ($ddp_css_freddie == 'freddie-gallery-a-hero') {
                    wp_enqueue_script('ddp-freddie-gallery-a-hero-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryHero.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-every-child') {
                    wp_enqueue_script('ddp-freddie-gallery-every-child-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryEveryChild.js', __FILE__));
                }

                 if ($ddp_css_freddie == 'freddie-gallery-the-mighty') {
                    wp_enqueue_script('ddp-freddie-gallery-the-mighty-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryTheMighty.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-oooh-yeah') {
                    wp_enqueue_script('ddp-freddie-gallery-oooh-yeah-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryOoohYeah.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-my-friend') {
                    wp_enqueue_script('ddp-freddie-gallery-my-friend-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryMyFriend.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-every-one') {
                    wp_enqueue_script('ddp-pegasus-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
                    wp_enqueue_script('ddp-venus-hoverdir-js', plugins_url('include/venus/js/jquery.hoverdir.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gallery-every-one-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryEveryOne.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-gallery-be-somebody') {
                    wp_enqueue_script('ddp-pegasus-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
                    wp_enqueue_script('ddp-venus-hoverdir-js', plugins_url('include/venus/js/jquery.hoverdir.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gallery-be-somebody-js', plugins_url('include/freddie/js/freddie-gallery/freddieGalleryBeSomebody.js', __FILE__));
                }



                // buttons
                if ($ddp_css_freddie == 'freddie-button-jealousy') {
                    wp_enqueue_script('ddp-freddie-button-jealousy-js', plugins_url('include/freddie/js/freddie-button-jealousy.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-loser') {
                    wp_enqueue_script('ddp-freddie-button-the-loser-js', plugins_url('include/freddie/js/freddie-button-the-loser.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-lazing-on') {
                    wp_enqueue_script('ddp-freddie-button-lazing-on-js', plugins_url('include/freddie/js/freddie-button-lazing-on.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-liar') {
                    wp_enqueue_script('ddp-freddie-button-liar-js', plugins_url('include/freddie/js/freddie-button-liar.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-love-kills') {
                    wp_enqueue_script('ddp-freddie-button-love-kills-js', plugins_url('include/freddie/js/freddie-button-love-kills.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-misfire') {
                    wp_enqueue_script('ddp-freddie-button-misfire-js', plugins_url('include/freddie/js/freddie-button-misfire.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-been-saved') {
                    wp_enqueue_script('ddp-freddie-button-been-saved-js', plugins_url('include/freddie/js/freddie-button-been-saved.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-mother-love') {
                    wp_enqueue_script('ddp-freddie-button-mother-love-js', plugins_url('include/freddie/js/freddie-button-mother-love.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-ogre-battle') {
                    wp_enqueue_script('ddp-freddie-button-ogre-battle-js', plugins_url('include/freddie/js/freddie-button-ogre-battle.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-party') {
                    wp_enqueue_script('ddp-freddie-button-party-js', plugins_url('include/freddie/js/freddie-button-party.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-fire') {
                    wp_enqueue_script('ddp-freddie-button-the-fire-js', plugins_url('include/freddie/js/freddie-button-the-fire.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-wild-wind') {
                    wp_enqueue_script('ddp-freddie-button-wild-wind-js', plugins_url('include/freddie/js/freddie-button-wild-wind.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-seaside') {
                    wp_enqueue_script('ddp-freddie-button-seaside-js', plugins_url('include/freddie/js/freddie-button-seaside.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-rendezvous') {
                    wp_enqueue_script('ddp-freddie-button-rendezvous-js', plugins_url('include/freddie/js/freddie-button-rendezvous.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-some-day') {
                    wp_enqueue_script('ddp-freddie-button-some-day-js', plugins_url('include/freddie/js/freddie-button-some-day.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-one-day') {
                    wp_enqueue_script('ddp-freddie-button-one-day-js', plugins_url('include/freddie/js/freddie-button-one-day.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-soul-brother') {
                    wp_enqueue_script('ddp-freddie-button-soul-brother-js', plugins_url('include/freddie/js/freddie-button-soul-brother.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-step-on-me') {
                    wp_enqueue_script('ddp-freddie-button-step-on-me-js', plugins_url('include/freddie/js/freddie-button-step-on-me.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-tear-it-up') {
                    wp_enqueue_script('ddp-freddie-button-tear-it-up-js', plugins_url('include/freddie/js/freddie-button-tear-it-up.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-teo-torriate') {
                    wp_enqueue_script('ddp-freddie-button-teo-torriate-js', plugins_url('include/freddie/js/freddie-button-teo-torriate.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-fairy-feller') {
                    wp_enqueue_script('ddp-freddie-button-fairy-feller-js', plugins_url('include/freddie/js/freddie-button-fairy-feller.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-radio-ga-ga') {
                    wp_enqueue_script('ddp-freddie-button-radio-ga-ga-js', plugins_url('include/freddie/js/freddie-button-radio-ga-ga.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-under-pressure') {
                    wp_enqueue_script('ddp-freddie-button-under-pressure-js', plugins_url('include/freddie/js/freddie-button-under-pressure.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-you-andi') {
                    wp_enqueue_script('ddp-freddie-button-you-andi-js', plugins_url('include/freddie/js/freddie-button-you-andi.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-action-this-day') {
                    wp_enqueue_script('ddp-freddie-button-action-this-day-js', plugins_url('include/freddie/js/freddie-button-action-this-day.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-april-lady') {
                    wp_enqueue_script('ddp-freddie-button-april-lady-js', plugins_url('include/freddie/js/freddie-button-april-lady.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-bicycle-race') {
                    wp_enqueue_script('ddp-freddie-button-bicycle-race-js', plugins_url('include/freddie/js/freddie-button-bicycle-race.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-blag') {
                    wp_enqueue_script('ddp-freddie-button-blag-js', plugins_url('include/freddie/js/freddie-button-blag.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-bohemian') {
                    wp_enqueue_script('ddp-freddie-button-bohemian-js', plugins_url('include/freddie/js/freddie-button-bohemian.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-rhapsody') {
                    wp_enqueue_script('ddp-freddie-button-rhapsody-js', plugins_url('include/freddie/js/freddie-button-rhapsody.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-calling-all-girls') {
                    wp_enqueue_script('ddp-freddie-button-calling-all-girls-js', plugins_url('include/freddie/js/freddie-button-calling-all-girls.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-dancer') {
                    wp_enqueue_script('ddp-freddie-button-dancer-js', plugins_url('include/freddie/js/freddie-button-dancer.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-delilah') {
                    wp_enqueue_script('ddp-freddie-button-delilah-js', plugins_url('include/freddie/js/freddie-button-delilah.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-dont-stop-me') {
                    wp_enqueue_script('ddp-freddie-button-dont-stop-me-js', plugins_url('include/freddie/js/freddie-button-dont-stop-me.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-fat-bottomed') {
                    wp_enqueue_script('ddp-freddie-button-fat-bottomed-js', plugins_url('include/freddie/js/freddie-button-fat-bottomed.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-get-down') {
                    wp_enqueue_script('ddp-freddie-button-get-down-js', plugins_url('include/freddie/js/freddie-button-get-down.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-the-queen') {
                    wp_enqueue_script('ddp-freddie-button-the-queen-js', plugins_url('include/freddie/js/freddie-button-the-queen.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-good-old') {
                    wp_enqueue_script('ddp-freddie-button-good-old-js', plugins_url('include/freddie/js/freddie-button-good-old.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-headlong') {
                    wp_enqueue_script('ddp-freddie-button-headlong-js', plugins_url('include/freddie/js/freddie-button-headlong.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-break-free') {
                    wp_enqueue_script('ddp-freddie-button-break-free-js', plugins_url('include/freddie/js/freddie-button-break-free.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-beat-them') {
                    wp_enqueue_script('ddp-freddie-button-beat-them-js', plugins_url('include/freddie/js/freddie-button-beat-them.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-beautiful-day') {
                    wp_enqueue_script('ddp-freddie-button-beautiful-day-js', plugins_url('include/freddie/js/freddie-button-beautiful-day.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-killer-queen') {
                    wp_enqueue_script('ddp-freddie-button-killer-queen-js', plugins_url('include/freddie/js/freddie-button-killer-queen.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-life-is-real') {
                    wp_enqueue_script('ddp-freddie-button-life-is-real-js', plugins_url('include/freddie/js/freddie-button-life-is-real.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-love-of') {
                    wp_enqueue_script('ddp-freddie-button-love-of-js', plugins_url('include/freddie/js/freddie-button-love-of.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-made-in-heaven') {
                    wp_enqueue_script('ddp-freddie-button-made-in-heaven-js', plugins_url('include/freddie/js/freddie-button-made-in-heaven.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-melancholy-blues') {
                    wp_enqueue_script('ddp-freddie-button-melancholy-blues-js', plugins_url('include/freddie/js/freddie-button-melancholy-blues.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-no-violins') {
                    wp_enqueue_script('ddp-freddie-button-no-violins-js', plugins_url('include/freddie/js/freddie-button-no-violins.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-one-vision') {
                    wp_enqueue_script('ddp-freddie-button-one-vision-js', plugins_url('include/freddie/js/freddie-button-one-vision.js', __FILE__));
                }
                if ($ddp_css_freddie == 'freddie-button-play-the-game') {
                    wp_enqueue_script('ddp-freddie-button-play-the-game-js', plugins_url('include/freddie/js/freddie-button-play-the-game.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-to-son') {
                    wp_enqueue_script('ddp-freddie-blog-post-to-son-js', plugins_url('include/freddie/js/freddie-blog-post-to-son.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-drowse') {
                    wp_enqueue_script('ddp-freddie-blog-post-drowse-js', plugins_url('include/freddie/js/freddie-blog-post-drowse.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-all-girls') {
                    wp_enqueue_script('ddp-freddie-blog-post-all-girls-js', plugins_url('include/freddie/js/freddie-blog-post-all-girls.js', __FILE__));
                }

                 if ($ddp_css_freddie == 'freddie-blog-post-mother-love') {
                    wp_enqueue_script('ddp-freddie-blog-post-mother-love-js', plugins_url('include/freddie/js/freddie-blog-post-mother-love.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-make-love-blog-post') {
                    wp_enqueue_script('ddp-freddie-make-love-blog-post-js', plugins_url('include/freddie/js/freddie-make-love-blog-post.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-blog-post-human-body') {
                    wp_enqueue_script('ddp-freddie-blog-post-human-body-js', plugins_url('include/freddie/js/freddie-blog-post-human-body.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-misfire-search-results') {
                    wp_enqueue_script('ddp-freddie-misfire-search-results-js', plugins_url('include/freddie/js/freddie-misfire-search-results.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-baby-does-search-results') {
                    wp_enqueue_script('ddp-freddie-baby-does-search-results-js', plugins_url('include/freddie/js/freddie-baby-does-search-results.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-that-glitter-blog-post') {
                    wp_enqueue_script('ddp-freddie-that-glitter-blog-post-js', plugins_url('include/freddie/js/freddie-that-glitter-blog-post.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-thunderbolt-product') {
                    wp_enqueue_script('ddp-freddie-thunderbolt-product-js', plugins_url('include/freddie/js/freddie-thunderbolt-product.js', __FILE__));
                }

                // Menus
                if ($ddp_css_freddie == 'freddie-menu-1') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-prize-js',  plugins_url('include/freddie/js/freddieScriptPrizeMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-2') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-attac-dragon-js',  plugins_url('include/freddie/js/freddieScriptAttackDragonMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-3') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-earth-js',  plugins_url('include/freddie/js/freddieScriptEarthMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-4') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-funny-love-js',  plugins_url('include/freddie/js/freddieScriptFunnyHowLoveMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-5') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-hang-on-in-there-js',  plugins_url('include/freddie/js/freddieScriptHangOnInThereMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-6') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-lover-boy-js',  plugins_url('include/freddie/js/freddieScriptLoverBoyMenu.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-menu-7') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-hijack-my-heart-jsocials-s', plugins_url('include/freddie/js/socials-freddie.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-menu-hijack-my-heart-js',  plugins_url('include/freddie/js/freddieHijackMyHeart.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-bali-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptBaliHeader.js', __FILE__));
                }

                // TB Navigation Menus

                if ($ddp_css_freddie == 'freddie-bali-header') {
                    wp_enqueue_script('ddp-freddie-bali-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptBaliHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-hungry-header') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-hungry-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptHungryHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-breaking-header') {
                    wp_enqueue_script('ddp-freddie-breaking-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptBreakingHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-private-affair-header') {
                    wp_enqueue_script('ddp-freddie-private-affair-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptPrivateAffairHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-pleading-header') {
                    wp_enqueue_script('ddp-freddie-pleadingg-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptPleadingHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-headline-header') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-headline-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptHeadlineHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-twisted-header') {
                    wp_enqueue_script('ddp-freddie-twisted-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptTwistedHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-get-started-header') {
                    wp_enqueue_script('ddp-freddie-get-started-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptGetStartedHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-just-like-header') {
                    wp_enqueue_script('ddp-freddie-hoverdir-js', plugins_url('include/pegasus/js/jquery.hoverdir.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-just-like-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptJustLikeHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-he-pulled-header') {
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js',  plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js',  plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js',  plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js',  plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-he-pulled-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptHePulledHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-no-one-header') {
                    wp_enqueue_script('ddp-freddie-no-one-header-js', plugins_url('include/freddie/js/tb-navigation-menus/freddieScriptNoOneHeader.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-content-lap-of-the-gods') {
                    wp_enqueue_script('ddp-freddie-content-lap-of-the-gods-js', plugins_url('include/freddie/js/freddie-home10/freddieContentLapOfTheGods.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-footer-keep-yourself-alive') {
                    wp_enqueue_script('ddp-freddie-footer-keep-yourself-alive-js', plugins_url('include/freddie/js/freddie-home10/freddieFooterKeepYourselfAlive.js', __FILE__));
                }

                if ($ddp_css_freddie == 'freddie-author-1') {
                    wp_enqueue_script('ddp-freddie-author-1-js', plugins_url('include/freddie/js/freddie-author-worthwhile/freddieAuthorWorthwhile.js', __FILE__));
                }


            }
        }

         if (get_option('ddp_menu_template') === 'disabled') {

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_1') {
                wp_enqueue_script('ddp-responsive-menu-1', plugins_url('include/responsive-menus/js/responsive-menu-1.js', __FILE__));
            }

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_2') {
                wp_enqueue_script('ddp-responsive-menu-2', plugins_url('include/responsive-menus/js/responsive-menu-2.js', __FILE__));
            }

            if(get_option('ddp_mobile_menu_template') === 'mobile_menu_3') {
                wp_enqueue_script('ddp-responsive-menu-3', plugins_url('include/responsive-menus/js/responsive-menu-3.js', __FILE__));
            }
        }

        // Tina starts

        if (!empty(get_post_meta($post->ID, 'ddp-css-tina'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-tina') as $ddp_css_tina) {
                // gsap
                if ($ddp_css_tina == 'tina-person-talk-now' || $ddp_css_tina == 'tina-my-lover-sidebar' || $ddp_css_tina == 'tina-tabs-the-change' || $ddp_css_tina == 'tina-header-he-belongs' || $ddp_css_tina == 'tina-testimonial-who-did' || $ddp_css_tina == 'tina-sometimes-content' || $ddp_css_tina == 'tina-content-eight-wheeler' || $ddp_css_tina == 'tina-content-throttle' || $ddp_css_tina == 'tina-content-ease' || $ddp_css_tina == 'tina-content-listen' || $ddp_css_tina == 'tina-content-wanna-hear' || $ddp_css_tina == 'tina-person-module-talk-now' || $ddp_css_tina == 'tina-slider-sail-away' || $ddp_css_tina == 'tina-portfolio-bayou' || $ddp_css_tina == 'tina-portfolio-ribbon' || $ddp_css_tina == 'tina-header-have-ridden') {
                    wp_enqueue_script('ddp-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddp-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                }

                //lake.js
                if ($ddp_css_tina == 'tina-content-wanna-hear' || $ddp_css_tina == 'tina-person-module-talk-now') {
                    wp_enqueue_script('ddp-tina-lake-js', plugins_url('include/tina/js/about2/lake.js', __FILE__));
                }

                // plugins.js, sly.min.js, tilt.jquery.js
                if ($ddp_css_tina == 'tina-slider-you-take' || $ddp_css_tina == 'tina-slider-you-take-v2') {
                    wp_enqueue_script('ddp-tina-plugins-js', plugins_url('include/tina/js/home7/plugins.js', __FILE__));
                    wp_enqueue_script('ddp-tina-sly-js', plugins_url('include/tina/js/home7/sly.min.js', __FILE__));
                    wp_enqueue_script('ddp-tina-tilt-js', plugins_url('include/tina/js/home7/tilt.jquery.js', __FILE__));
                }

                // masonry.pkgd.min.js

                if ($ddp_css_tina == 'tina-portfolio-bayou' || $ddp_css_tina == 'tina-portfolio-ribbon') {
                    wp_enqueue_script('ddp-pegasus-masonry-js', plugins_url('include/pegasus/js/masonry.pkgd.min.js', __FILE__));
                }


                if ($ddp_css_tina == 'tina-header-the-girl') {
                    wp_enqueue_script('ddp-tina-header-the-girl-js', plugins_url('include/tina/js/home1/tinaHeaderTheGirl.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blurbs-easy-babe') {
                    wp_enqueue_script('ddp-tina-blurbs-easy-babe-js', plugins_url('include/tina/js/home1/tinaBlurbsEasyBabe.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-tabs-the-change') {
                    wp_enqueue_script('ddp-tina-tabs-the-change-js', plugins_url('include/tina/js/home1/tinaTabsTheChange.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-person-module-she-talks') {
                    wp_enqueue_script('ddp-tina-person-module-she-talks-js', plugins_url('include/tina/js/home1/tinaPersonModuleSheTalks.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blog-its-alright') {
                    wp_enqueue_script('ddp-tina-blog-its-alright-js', plugins_url('include/tina/js/home1/tinaBlogItsAlright.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-header-private-dancer') {
                    wp_enqueue_script('ddp-tina-header-private-dancer-js', plugins_url('include/tina/js/home2/tinaHeaderPrivateDancer.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-content-these-places') {
                    wp_enqueue_script('ddp-tina-content-these-places-js', plugins_url('include/tina/js/home2/tinaContentThesePlaces.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-person-module-my-thumb') {
                    wp_enqueue_script('ddp-tina-person-module-my-thumb-js', plugins_url('include/tina/js/home2/tinaPersonModuleMyThumb.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blog-all-day') {
                    wp_enqueue_script('ddp-tina-blog-all-day-js', plugins_url('include/tina/js/home2/tinaBlogAllday.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-header-see-this') {
                    wp_enqueue_script('ddp-tina-header-see-this-js', plugins_url('include/tina/js/home3/tinaHeaderSeeThis.js', __FILE__), array( 'wp-i18n' ));
                }
                if ($ddp_css_tina == 'tina-blurbs-smile-to') {
                    wp_enqueue_script('ddp-tina-blurbs-smile-to-js', plugins_url('include/tina/js/home3/tinaBlurbsSmileTo.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blurbs-a-fire') {
                    wp_enqueue_script('ddp-tina-blurbs-a-fire-js', plugins_url('include/tina/js/home3/tinaBlurbsaFire.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blurbs-get-enough') {
                    wp_enqueue_script('ddp-tina-blurbs-get-enough-js', plugins_url('include/tina/js/home3/tinaBlurbsGetEnough.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-persons-flowing') {
                    wp_enqueue_script('ddp-tina-persons-flowing-js', plugins_url('include/tina/js/home3/tinaPersonsFlowing.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-call-to-action-seek') {
                    wp_enqueue_script('ddp-tina-call-to-action-seek-js', plugins_url('include/tina/js/home3/tinaCallToActionSeek.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blog-the-flame') {
                    wp_enqueue_script('ddp-tina-blog-the-flame-js', plugins_url('include/tina/js/home3/tinaBlogTheFlame.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-header-he-belongs') {
                    wp_enqueue_script('ddp-tina-header-he-belongs-js', plugins_url('include/tina/js/home4/tinaHeaderHeBelongs.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blurbs-i-wanna-be') {
                    wp_enqueue_script('ddp-tina-blurbs-i-wanna-be-js', plugins_url('include/tina/js/home4/tinaBlurbsWannaBe.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-blurbs-you-lead-me') {
                    wp_enqueue_script('ddp-tina-blurbs-you-lead-me-js', plugins_url('include/tina/js/home4/tinaBlurbsYouLeadMe.js', __FILE__));
                }
                if ($ddp_css_tina == 'tina-testimonial-who-did') {
                    wp_enqueue_script('ddp-tina-testimonial-who-did-js', plugins_url('include/tina/js/home4/tinaTestimonialWhoDid.js', __FILE__));
                }

                // optins

                if ($ddp_css_tina == 'tina-optin-so-familiar') {
                    wp_enqueue_script('ddp-tina-optin-so-familiar-js', plugins_url('include/tina/js/email-optin/tinaOptinSoFamiliar.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-you-need') {
                    wp_enqueue_script('ddp-tina-optin-you-need-js', plugins_url('include/tina/js/email-optin/tinaOptinYouNeed.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-gonna-be') {
                    wp_enqueue_script('ddp-tina-optin-gonna-be-js', plugins_url('include/tina/js/email-optin/tinaOptinGonnaBe.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-be-right') {
                    wp_enqueue_script('ddp-tina-optin-be-right-js', plugins_url('include/tina/js/email-optin/tinaOptinBeRight.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-right-here') {
                    wp_enqueue_script('ddp-tina-optin-right-here-js', plugins_url('include/tina/js/email-optin/tinaOptinRightHere.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-a-kind') {
                    wp_enqueue_script('ddp-tina-optin-a-kind-js', plugins_url('include/tina/js/email-optin/tinaOptinAkind.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-other-lives') {
                    wp_enqueue_script('ddp-tina-optin-other-lives-js', plugins_url('include/tina/js/email-optin/tinaOptinOtherLives.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-optin-your-kiss') {
                    wp_enqueue_script('ddp-tina-optin-your-kiss-js', plugins_url('include/tina/js/email-optin/tinaOptinYourKiss.js', __FILE__));
                }

                // Content Pages

                if ($ddp_css_tina == 'tina-content-page3') {
                    wp_enqueue_script('ddp-tina-content-page-3-js', plugins_url('include/tina/js/content-page3/tinaContentPage3.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-page8') {
                    wp_enqueue_script('ddp-tina-content-page-8-js', plugins_url('include/tina/js/content-page8/tinaContentPage8.js', __FILE__));
                }

                // Sidebars

                if ($ddp_css_tina == 'tina-my-lover-sidebar') {
                    wp_enqueue_script('ddp-tina-my-lover-sidebar-js', plugins_url('include/tina/js/content-page1/tinaSidebarMyLover.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-my-beggining-sidebar') {
                    wp_enqueue_script('ddp-tina-my-beggining-sidebar-js', plugins_url('include/tina/js/content-page3/tinaSidebarMyBeggining.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-feel-like-sidebar') {
                    wp_enqueue_script('ddp-tina-feel-like-sidebar-js', plugins_url('include/tina/js/content-page4/tinaSidebarFeelLike.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-waiting-baby-sidebar') {
                    wp_enqueue_script('ddp-tina-waiting-baby-sidebar-js', plugins_url('include/tina/js/content-page7/tinaSidebarWaitingBaby.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-this-life-sidebar') {
                    wp_enqueue_script('ddp-tina-this-life-sidebar-js', plugins_url('include/tina/js/content-page9/tinaSidebarThisLife.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-contentpage10-sidebar') {
                    wp_enqueue_script('ddp-tina-contentpage10-sidebar-js', plugins_url('include/tina/js/content-page10/tinaSidebarContentPage10.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-the-sun-sidebar') {
                    wp_enqueue_script('ddp-tina-the-sun-sidebar-js', plugins_url('include/tina/js/content-page11/tinaSidebarTheSun.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-sidewalk-contact-page') {
                    wp_enqueue_script('ddp-tina-sidewalk-contact-page-js', plugins_url('include/tina/js/contact-page1/tinaContactSidewalk.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-my-friend-content') {
                    wp_enqueue_script('ddp-tina-my-friend-content-js', plugins_url('include/tina/js/services-page1/tinaContentMyFriend.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-way-down-blurbs') {
                    wp_enqueue_script('ddp-tina-way-down-blurbs-js', plugins_url('include/tina/js/services-page2/tinaBlurbsWayDown.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-wanna-content') {
                    wp_enqueue_script('ddp-tina-wanna-content-js', plugins_url('include/tina/js/services-page2/tinaContentWanna.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-every-inch-testimonial') {
                    wp_enqueue_script('ddp-tina-every-inch-testimonial-js', plugins_url('include/tina/js/services-page2/tinaTestimonialEveryInch.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-your-decisions-header') {
                    wp_enqueue_script('ddp-tina-header-your-decisions-js', plugins_url('include/tina/js/home5/tinaHeaderYourDecisions.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-sometimes-content') {
                    wp_enqueue_script('ddp-tina-sometimes-content-js', plugins_url('include/tina/js/home5/tinaContentSometimes.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-you-again-tabs') {
                    wp_enqueue_script('ddp-tina-you-again-tabs-js', plugins_url('include/tina/js/home5/tinaTabsYouAgain.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-about-all-blog') {
                    wp_enqueue_script('ddp-tina-about-all-blog-js', plugins_url('include/tina/js/home5/tinaBlogAboutAll.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-I-can-footer') {
                    wp_enqueue_script('ddp-tina-I-can-footer-js', plugins_url('include/tina/js/home5/tinaFooterIcan.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-girl-testimonial') {
                    wp_enqueue_script('ddp-tina-girl-testimonial-js', plugins_url('include/tina/js/about1/tinaTestimonialGirl.js', __FILE__));
                }

                // Accordion

                if ($ddp_css_tina == 'tina-accordion-anybody') {
                    wp_enqueue_script('ddp-tina-accordion-anybody-js', plugins_url('include/tina/js/accordions/tinaAccordionAnybody.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-charge-of') {
                    wp_enqueue_script('ddp-tina-accordion-charge-of-js', plugins_url('include/tina/js/accordions/tinaAccordionChargeOf.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-you-alone') {
                    wp_enqueue_script('ddp-tina-accordion-you-alone-js', plugins_url('include/tina/js/accordions/tinaAccordionYouAlone.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-da-dap') {
                    wp_enqueue_script('ddp-tina-accordion-da-dap-js', plugins_url('include/tina/js/accordions/tinaAccordionDaDap.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-looked-down') {
                    wp_enqueue_script('ddp-tina-accordion-looked-down-js', plugins_url('include/tina/js/accordions/tinaAccordionLookedDown.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-the-start') {
                    wp_enqueue_script('ddp-tina-accordion-the-start-js', plugins_url('include/tina/js/accordions/tinaAccordionTheStart.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-my-heart') {
                    wp_enqueue_script('ddp-tina-accordion-my-heart-js', plugins_url('include/tina/js/accordions/tinaAccordionMyHeart.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-my-home') {
                    wp_enqueue_script('ddp-tina-accordion-my-home-js', plugins_url('include/tina/js/accordions/tinaAccordionMyHome.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-key-to') {
                    wp_enqueue_script('ddp-tina-accordion-key-to-js', plugins_url('include/tina/js/accordions/tinaAccordionKeyTo.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-common-sense') {
                    wp_enqueue_script('ddp-tina-accordion-common-sense-js', plugins_url('include/tina/js/accordions/tinaAccordionCommonSense.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-accordion-i-grew') {
                    wp_enqueue_script('ddp-tina-accordion-i-grew-js', plugins_url('include/tina/js/accordions/tinaAccordionIgrew.js', __FILE__));
                }

                // accordions end

                if ($ddp_css_tina == 'tina-footer-time-to') {
                    wp_enqueue_script('ddp-tina-footer-time-to-js', plugins_url('include/tina/js/home4/tinaFooterTimeTo.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-thinking-about-header') {
                    wp_enqueue_script('ddp-tina-thinking-about-header-js', plugins_url('include/tina/js/home6/tinaHeaderThinkingAbout.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-the-past-content') {
                    wp_enqueue_script('ddp-tina-the-past-content-js', plugins_url('include/tina/js/home6/tinaContentThePast.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-my-shoulder-blurbs') {
                    wp_enqueue_script('ddp-tina-my-shoulder-blurbs-js', plugins_url('include/tina/js/home6/tinaBlurbsMyShoulder.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-all-behind-blurbs') {
                    wp_enqueue_script('ddp-tina-all-behind-blurbs-js', plugins_url('include/tina/js/home6/tinaBlurbsAllBehind.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-all-behind-button') {
                    wp_enqueue_script('ddp-tina-all-behind-button-js', plugins_url('include/tina/js/tinaAllBehindButton.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-my-lover-blog') {
                    wp_enqueue_script('ddp-tina-my-lover-blog-js', plugins_url('include/tina/js/home6/tinaBlogMyLover.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-I-breathe-footer') {
                    wp_enqueue_script('ddp-tina-I-breathe-footer-js', plugins_url('include/tina/js/home6/tinaFooterBreathe.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-second-try') {
                    wp_enqueue_script('ddp-tina-content-second-try-js', plugins_url('include/tina/js/contact-page3/tinaContentSecondTry.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-contact-form-talk-now') {
                    wp_enqueue_script('ddp-tina-contact-form-talk-now-js', plugins_url('include/tina/js/contact-page2/tinaContactFormTalkNow.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-content-eight-wheeler') {
                    wp_enqueue_script('ddp-tina-content-eight-wheeler-js', plugins_url('include/tina/js/services-page3/tinaContentEightWheeler.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-cta-im-moving') {
                    wp_enqueue_script('ddp-tina-cta-im-moving-js', plugins_url('include/tina/js/services-page3/tinaCtaImMoving.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-testimonial-i-got') {
                    wp_enqueue_script('ddp-tina-testimonial-i-got-js', plugins_url('include/tina/js/services-page3/tinaTestimonialIgot.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-throttle') {
                    wp_enqueue_script('ddp-tina-content-throttle-js', plugins_url('include/tina/js/process-page1/tinaContentThrottle.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-ease') {
                    wp_enqueue_script('ddp-tina-content-ease-js', plugins_url('include/tina/js/process-page1/tinaContentEase.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-testimonial-you-got') {
                    wp_enqueue_script('ddp-tina-testimonial-you-got-js', plugins_url('include/tina/js/process-page1/tinaTestimonialYouGot.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-listen') {
                    wp_enqueue_script('ddp-tina-content-listen-js', plugins_url('include/tina/js/process-page2/tinaContentLlisten.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-mister') {
                    wp_enqueue_script('ddp-tina-content-mister-js', plugins_url('include/tina/js/process-page2/tinaContentMister.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-testimonial-told-you') {
                    wp_enqueue_script('ddp-tina-testimonial-told-you-js', plugins_url('include/tina/js/process-page2/tinaTestimonialToldYou.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-come-on-projects') {
                    wp_enqueue_script('ddp-tina-come-on-projects-js', plugins_url('include/tina/js/careers/comeOnProjects.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-wanna-hear') {
                    wp_enqueue_script('ddp-tina-content-wanna-hear-js', plugins_url('include/tina/js/about2/tinaContentWannaHear.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-person-talk-now') {
                    wp_enqueue_script('ddp-tina-person-module-talk-now-js', plugins_url('include/tina/js/about2/tinaPersonTalkNow.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-slider-sail-away') {
                    wp_enqueue_script('ddp-tina-slider-sail-away-js', plugins_url('include/tina/js/tinaSliderSailAway.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-slider-you-take') {
                    wp_enqueue_script('ddp-tina-slider-you-take-js', plugins_url('include/tina/js/home7/tinaSliderYouTake.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-slider-you-take-v2') {
                    wp_enqueue_script('ddp-tina-slider-you-take-v2-js', plugins_url('include/tina/js/home7/tinaSliderYouTakeV2.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-portfolio-bayou') {
                    wp_enqueue_script('ddp-tina-portfolio-bayou-js', plugins_url('include/tina/js/portfolio-1/tinaPortfolioBayou.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-portfolio-ribbon') {
                    wp_enqueue_script('ddp-tina-portfolio-ribbon-js', plugins_url('include/tina/js/portfolio-2/tinaPortfolioRibbon.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-header-have-ridden') {
                    wp_enqueue_script('ddp-tina-header-have-ridden-js', plugins_url('include/tina/js/home8/tinaHeaderHaveRidden.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-numbers-orignal') {
                    wp_enqueue_script('ddp-tina-numbers-orignal-js', plugins_url('include/tina/js/home8/tinaNumbersOrignal.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-video-sage') {
                    wp_enqueue_script('ddp-tina-video-sage-js', plugins_url('include/tina/js/home8/tinaVideoSage.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-case-studies-takes-two') {
                    wp_enqueue_script('ddp-tina-case-studies-takes-two-js', plugins_url('include/tina/js/home8/tinaCaseStudiesTakesTwo.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-footer-proud') {
                    wp_enqueue_script('ddp-tina-footer-proud-js', plugins_url('include/tina/js/home8/tinaFooterProud.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-person-call-it') {
                    wp_enqueue_script('ddp-tina-person-module-call-it-js', plugins_url('include/tina/js/about3/tinaPersonModuleCallIt.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-church-house') {
                    wp_enqueue_script('ddp-tina-content-church-house-js', plugins_url('include/tina/js/home9/tinaContentChurchHouse.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-blurbs-speed-limit') {
                    wp_enqueue_script('ddp-tina-blurbs-speed-limit', plugins_url('include/tina/js/home9/tinaBlurbsSpeedLimit.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-tabs-highway') {
                    wp_enqueue_script('ddp-tina-tabs-highway-js', plugins_url('include/tina/js/home9/tinaTabsHighway.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-testimonial-city-limites') {
                    wp_enqueue_script('ddp-tina-testimonial-city-limites-js', plugins_url('include/tina/js/home9/tinaTestimonialCityLimites.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-archive-1') {
                    wp_enqueue_script('ddp-tina-archive-1-js', plugins_url('include/tina/js/archive1/tinaArchive1.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-blog-rain-falling') {
                    wp_enqueue_script('ddp-tina-blog-rain-falling-js', plugins_url('include/tina/js/magazine/tinaBlogRainFalling.js', __FILE__), array( 'wp-i18n' ));
                }

                if ($ddp_css_tina == 'tina-blog-bad-enough') {
                    wp_enqueue_script('ddp-tina-blog-bad-enough-js', plugins_url('include/tina/js/magazine/tinaBlogBadEnough.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-products-working-for') {
                    wp_enqueue_script('ddp-tina-products-working-for-js', plugins_url('include/tina/js/magazine/tinaProductsWorkingFor.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-video-talk-much') {
                    wp_enqueue_script('ddp-tina-video-talk-much-js', plugins_url('include/tina/js/magazine/tinaVideoTalkMuch.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-blog-this-town') {
                    wp_enqueue_script('ddp-tina-blog-this-town-js', plugins_url('include/tina/js/magazine/tinaBlogThisTown.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-pricing-tables-pinch-of') {
                    wp_enqueue_script('ddp-tina-pricing-tables-pinch-of-js', plugins_url('include/tina/js/pricing-1/tinaPricingTablesPinchOf.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-testimonial-one-can') {
                    wp_enqueue_script('ddp-tina-testimonial-one-can-js', plugins_url('include/tina/js/pricing-1/tinaTestimonialOneCan.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-pricing-table-pretending') {
                    wp_enqueue_script('ddp-tina-pricing-table-pretending-js', plugins_url('include/tina/js/pricing-2/tinaPricingTablePretending.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-blog-1') {
                    wp_enqueue_script('ddp-tina-blog-1-js', plugins_url('include/tina/js/blogs/blog1/tinaBlog1.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-blog-2') {
                    wp_enqueue_script('ddp-tina-blog-2-js', plugins_url('include/tina/js/blogs/blog2/tinaBlog2.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-blog-3') {
                    wp_enqueue_script('ddp-tina-blog-3-js', plugins_url('include/tina/js/blogs/blog3/tinaBlog3.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-blog-4') {
                    wp_enqueue_script('ddp-tina-blog-4-js', plugins_url('include/tina/js/blogs/blog4/tinaBlog4.js', __FILE__));
                }

                 if ($ddp_css_tina == 'tina-blog-6') {
                    wp_enqueue_script('ddp-tina-blog-6-js', plugins_url('include/tina/js/blogs/blog6/tinaBlog6.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-blog-7') {
                    wp_enqueue_script('ddp-tina-blog-7-js', plugins_url('include/tina/js/blogs/blog7/tinaBlog7.js', __FILE__));
                }

                // Landing Page 1

                if ($ddp_css_tina == 'tina-testimonials-idolize-you') {
                    wp_enqueue_script('ddp-tina-testimonials-idolize-you-js', plugins_url('include/tina/js/tina-lead-1/tinaTestimonialsIdolizeYou.js', __FILE__));
                }

                // Landing Page 2

                if ($ddp_css_tina == 'tina-header-crazy') {
                    wp_enqueue_script('ddp-tina-header-crazy-js', plugins_url('include/tina/js/tina-lead-2/tinaHeaderCrazy.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-content-way') {
                    wp_enqueue_script('ddp-tina-content-way-js', plugins_url('include/tina/js/tina-lead-2/tinaContentWay.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-testimonial-finest-girl') {
                    wp_enqueue_script('ddp-tina-testimonial-finest-girl-js', plugins_url('include/tina/js/tina-lead-2/tinaTestimonialFinestGirl.js', __FILE__));
                }

                if ($ddp_css_tina == 'tina-pricing-table-it-on') {
                    wp_enqueue_script('ddp-tina-pricing-table-it-on-js', plugins_url('include/tina/js/tina-lead-2/tinaPricingTableItOn.js', __FILE__));
                }

                // Landing Page 3

                if ($ddp_css_tina == 'tina-header-steam') {
                    wp_enqueue_script('ddp-tina-header-steam-js', plugins_url('include/tina/js/tina-lead-3/tinaHeaderSteam.js', __FILE__), array( 'wp-i18n' ));
                }

            }
        }


        // Tina ends

    // Ragnar

         if (!empty(get_post_meta($post->ID, 'ddp-css-ragnar'))) {
            foreach ((array) get_post_meta($post->ID, 'ddp-css-ragnar') as $ddp_css_ragnar) {
                //gsap

                if ($ddp_css_ragnar == 'ragnar-content-curly' || $ddp_css_ragnar == 'ragnar-person-module-roar' || $ddp_css_ragnar == 'ragnar-menu-farmer'  || $ddp_css_ragnar == 'ragnar-menu-hulks'  || $ddp_css_ragnar == 'ragnar-menu-idun'  || $ddp_css_ragnar == 'ragnar-menu-longhouse'  || $ddp_css_ragnar == 'ragnar-menu-pursuit'  || $ddp_css_ragnar == 'ragnar-menu-skalds'  || $ddp_css_ragnar == 'ragnar-menu-valhalla') {
                    wp_enqueue_script('ddpdm-freddie-gsap-jquery-js', plugins_url('include/freddie/js/gsap/jquery.gsap.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-attr-plugin-js', plugins_url('include/freddie/js/gsap/AttrPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-custom-ease-js', plugins_url('include/freddie/js/gsap/CustomEase.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-draw-svg-js', plugins_url('include/freddie/js/gsap/DrawSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-split-text-js', plugins_url('include/freddie/js/gsap/SplitText.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-tween-max-js', plugins_url('include/freddie/js/gsap/TweenMax.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-scroll-js', plugins_url('include/freddie/js/gsap/ScrollToPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-MorphSVGP-js', plugins_url('include/freddie/js/gsap/MorphSVGPlugin.min.js', __FILE__));
                    wp_enqueue_script('ddpdm-freddie-gsap-text-plugin-js', plugins_url('include/freddie/js/gsap/TextPlugin.min.js', __FILE__));
                }


                // for 25 Nov
                if ($ddp_css_ragnar == 'ragnar-header-arne') {
                   wp_enqueue_script('ddpdm-ragnar-header-arne-js', plugins_url('include/ragnar/js/ragnar-home-1/ragnarHeaderArne.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blurbs-keeper') {
                   wp_enqueue_script('ddpdm-ragnar-blurbs-keeper-js', plugins_url('include/ragnar/js/ragnar-home-1/ragnarBlurbsKeeper.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blog-bjorn') {
                   wp_enqueue_script('ddpdm-ragnar-blog-bjorn-js', plugins_url('include/ragnar/js/ragnar-home-1/ragnarBlogBjorn.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-content-bear') {
                   wp_enqueue_script('ddpdm-ragnar-content-bear-js', plugins_url('include/ragnar/js/ragnar-home-1/ragnarContentBear.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-footer-bo') {
                   wp_enqueue_script('ddpdm-ragnar-footer-bo-js', plugins_url('include/ragnar/js/ragnar-home-1/ragnarFooterBo.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-blurbs-ruler') {
                   wp_enqueue_script('ddpdm-ragnar-blurbs-ruler-js', plugins_url('include/ragnar/js/ragnar-home-2/ragnarBlurbsRuler.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-testimonails-gorm') {
                   wp_enqueue_script('ddpdm-ragnar-testimonails-gorm-js', plugins_url('include/ragnar/js/ragnar-home-2/ragnarTesimonailsGorm.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blog-halfdan') {
                   wp_enqueue_script('ddpdm-ragnar-blog-halfdan-js', plugins_url('include/ragnar/js/ragnar-home-2/ragnarBlogHalfdan.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-footer-danish') {
                   wp_enqueue_script('ddpdm-ragnar-footer-danish-js', plugins_url('include/ragnar/js/ragnar-home-2/ragnarFooterDanish.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-header-left') {
                   wp_enqueue_script('ddpdm-ragnar-header-left-js', plugins_url('include/ragnar/js/ragnar-home-3/ragnarHeaderLeft.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-content-curly') {
                   wp_enqueue_script('ddpdm-ragnar-content-curly-js', plugins_url('include/ragnar/js/ragnar-home-3/ragnarContentCurly.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-content-kare') {
                   wp_enqueue_script('ddpdm-ragnar-content-kare-js', plugins_url('include/ragnar/js/ragnar-home-3/ragnarContentKare.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blog-knud') {
                   wp_enqueue_script('ddpdm-ragnar-blog-knud-js', plugins_url('include/ragnar/js/ragnar-home-3/ragnarBlogKnud.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-header-descendant') {
                   wp_enqueue_script('ddpdm-ragnar-header-descendant-js', plugins_url('include/ragnar/js/ragnar-home-4/ragnarHeaderDescendant.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-content-njal') {
                   wp_enqueue_script('ddpdm-ragnar-content-njal-js', plugins_url('include/ragnar/js/ragnar-home-4/ragnarContentNjal.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blog-rune') {
                   wp_enqueue_script('ddpdm-ragnar-blog-rune-js', plugins_url('include/ragnar/js/ragnar-home-4/ragnarBlogRune.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-content-wheeler') {
                   wp_enqueue_script('ddpdm-ragnar-content-wheeler-js', plugins_url('include/ragnar/js/ragnar-home-5/ragnarContentWheeler.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-testimonial-daddy') {
                   wp_enqueue_script('ddpdm-ragnar-testimonial-daddy-js', plugins_url('include/ragnar/js/ragnar-home-5/ragnarTestimonialDaddy.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-blog-loud-whistle') {
                   wp_enqueue_script('ddpdm-ragnar-blog-loud-whistle-js', plugins_url('include/ragnar/js/ragnar-home-5/ragnarBlogLoudWhistle.js', __FILE__));
                }

                // for 26 Nov
                if ($ddp_css_ragnar == 'ragnar-contact-trygve') {
                   wp_enqueue_script('ddpdm-ragnar-blog-loud-whistle-js', plugins_url('include/ragnar/js/ragnar-contact-1/ragnarContactTrygve.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-content-astrid') {
                   wp_enqueue_script('ddpdm-ragnar-content-astrid-js', plugins_url('include/ragnar/js/ragnar-contact-4/ragnarContactAstrid.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-content-tove') {
                   wp_enqueue_script('ddpdm-ragnar-content-tove-js', plugins_url('include/ragnar/js/ragnar-contact-6/ragnarContentTove.js', __FILE__));
                }



                if ($ddp_css_ragnar == 'ragnar-slider-thor') {
                   wp_enqueue_script('ddpdm-ragnar-slider-thor-js', plugins_url('include/ragnar/js/ragnar-case-study-1/ragnarSliderThor.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-content-i-steer') {
                   wp_enqueue_script('ddpdm-ragnar-content-i-steer-js', plugins_url('include/ragnar/js/ragnar-case-study-2/ragnarContentIsteer.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-projects-good-oars') {
                   wp_enqueue_script('ddpdm-ragnar-projects-good-oars-js', plugins_url('include/ragnar/js/ragnar-case-study-2/ragnarProjectsGoodOars.js', __FILE__));
                }


                if ($ddp_css_ragnar == 'ragnar-person-module-roar') {
                   wp_enqueue_script('ddpdm-ragnar-person-module-roar-js', plugins_url('include/ragnar/js/ragnar-team-1/ragnarPersonRoar.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-content-spear') {
                   wp_enqueue_script('ddpdm-ragnar-content-spear-js', plugins_url('include/ragnar/js/ragnar-team-1/ragnarContentSpear.js', __FILE__));
                }
                if ($ddp_css_ragnar == 'ragnar-portfolio-good-oars') {
                   wp_enqueue_script('ddpdm-ragnar-portfolio-good-oars-js', plugins_url('include/ragnar/js/ragnar-our-work/ragnarPortfolioGoodOars.js', __FILE__));
                }

                // for 27 Nov

                if ($ddp_css_ragnar == 'ragnar-menu-farmer') {
                   wp_enqueue_script('ddpdm-ragnar-menu-farmer-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuFarmer.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-hulks') {
                   wp_enqueue_script('ddpdm-ragnar-menu-hulks-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuHulks.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-idun') {
                   wp_enqueue_script('ddpdm-ragnar-menu-idun-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuIdun.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-longhouse') {
                   wp_enqueue_script('ddpdm-ragnar-menu-longhouse-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuLonghouse.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-pursuit') {
                   wp_enqueue_script('ddpdm-ragnar-menu-pursuit-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuPursuit.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-skalds') {
                   wp_enqueue_script('ddpdm-ragnar-menu-skalds-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuSkalds.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-menu-valhalla') {
                   wp_enqueue_script('ddpdm-ragnar-menu-valhalla-js', plugins_url('include/ragnar/js/ragnar-menus/ragnarMenuValhalla.js', __FILE__));
                }


                // for 30 Nov

                if ($ddp_css_ragnar == 'ragnar-not-found-5') {
                   wp_enqueue_script('ddpdm-ragnar-not-found-5-js', plugins_url('include/ragnar/js/ragnar-not-found/ragnarNotFound5.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-not-found-6') {
                   wp_enqueue_script('ddpdm-ragnar-not-found-6-js', plugins_url('include/ragnar/js/ragnar-not-found/ragnarNotFound6.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-not-found-16') {
                   wp_enqueue_script('ddpdm-ragnar-not-found-16-js', plugins_url('include/ragnar/js/ragnar-not-found/ragnarNotFound16.js', __FILE__));
                }

                if ($ddp_css_ragnar == 'ragnar-not-found-17') {
                   wp_enqueue_script('ddpdm-ragnar-not-found-17-js', plugins_url('include/ragnar/js/ragnar-not-found/ragnarNotFound17.js', __FILE__));
                }

                // for 2 Dec

                for ($i = 1; $i < 18; $i++) {
                    if ($ddp_css_ragnar == 'ragnar-popups-'.$i) {
                        wp_enqueue_script('ddpdm-diana-cookies-js', plugins_url('include/diana/js/diana-jquery.cookie.js', __FILE__));
                        wp_enqueue_script('ddpdm-diana-pop-up-js', plugins_url('include/diana/js/dianaPopups.js', __FILE__));
                            $ddp_dataToBePassed = array(
                                'ddp_pop_template'  => get_option('ddp_pop_up_template'),
                                'ddp_pop_show_load' => get_theme_mod('ddp_pop_up_show_load', false),
                                'ddp_pop_delay'  => get_option('ddp_pop_up_delay'),
                                'ddp_pop_show_leave'  => get_theme_mod('ddp_pop_up_show_leave', false),
                                'ddp_pop_show_scroll'  => get_theme_mod('ddp_pop_up_show_scroll', false),
                                'ddp_pop_scroll_per' => get_option('ddp_pop_up_scroll_per'),
                                'ddp_sticky_delay'  => get_option('ddp_sticky_bar_delay'),
                                'ddp_sticky_cookie_days'  => get_option('ddp_sticky_bar_cookie_days'),
                                'ddp_sticky_show_leave'  => get_theme_mod('ddp_sticky_show_leave', false),
                                'ddp_sticky_bar_position' => get_option('ddp_sticky_bar_sticky'),
                                'ddp_sticky_show_scroll'  => get_theme_mod('ddp_sticky_show_scroll', false),
                                'ddp_sticky_bar_scroll_per' => get_option('ddp_sticky_bar_scroll_per'),
                            );
                        wp_localize_script( 'ddpdm-diana-pop-up-js', 'ddp_php_vars', $ddp_dataToBePassed);
                        wp_enqueue_script('ddpdm-ragnar-pop-up'.$i.'-js', plugins_url('include/ragnar/js/ragnar-popups/ragnarPopupsV'.$i.'.js', __FILE__));
                    }
                } // for ($i = 1; $i < 18; $i++) {

            }
        }

        // Ragnar ends
    } //end if($post)

    }

add_action('wp_footer', 'ddp_register_js');
add_action('et_fb_enqueue_assets', 'ddp_register_js');

//======================================================================
// LOAD AVATART FOR BLOG MODULES
//======================================================================

function load_ddp_avatars($title)
{

    global $post;
    if (is_object($post) && $post->post_type == 'post') {
        if ($post->post_author) {
            $authorId = $post->post_author;

            $dataAvatar = '<dataavatar hidden data-avatar-url=';

            if (function_exists('get_wp_user_avatar_src')) {
                $dataAvatarUrl = get_wp_user_avatar_src($authorId, 'original');
            } else {
                $dataAvatarUrl = get_avatar_url($authorId);
            }

            $dataAvatar = $dataAvatar . $dataAvatarUrl;
            $dataAvatar = $dataAvatar . '></dataavatar>';
            return $title . $dataAvatar;
        } else return $title;
    } else return $title;
}

if (!is_admin()) {
   add_action('wp', 'for_ddp_avatars');
}

function for_ddp_avatars() {
    global $post;
    if( !is_object( $post ) ) return;
    if (get_post_meta($post->ID, 'ddp-css-tina') === 'tina-blog-all-day' || ( is_array( get_post_meta($post->ID, 'ddp-css-tina') ) && in_array("tina-blog-all-day", get_post_meta($post->ID, 'ddp-css-tina'))) ||
        get_post_meta($post->ID, 'ddp-css-tina') === 'tina-blog-the-flame' || (is_array( get_post_meta($post->ID, 'ddp-css-tina') ) && in_array("tina-blog-the-flame", get_post_meta($post->ID, 'ddp-css-tina'))) ||
        get_post_meta($post->ID, 'ddp-css-tina') === 'tina-my-lover-blog' || (is_array( get_post_meta($post->ID, 'ddp-css-tina') ) && in_array("tina-my-lover-blog", get_post_meta($post->ID, 'ddp-css-tina')))) {
        add_filter('the_title', 'load_ddp_avatars', 10, 2);
    }
}


function alpha_customize_register( $wp_customize ) {

    // Inlcude the Alpha Color Picker control file.
    require_once plugin_dir_path( __FILE__).'/include/alpha-color-picker.php';

}

//======================================================================
// CUSTOM ICONS FRONTEND
//======================================================================
function ddp_custom_icons_js() {
    if(get_theme_mod('ddp_icons_fa', false) == 1 || get_theme_mod('ddp_icons_md', false) == 1)
        wp_enqueue_script('ddp-custom-icons-js', plugins_url('js/ddp-frontend-custom-icons.js', __FILE__));
}
add_action('wp_footer', 'ddp_custom_icons_js');

function ddp_custom_icons_css() {
    if (get_theme_mod('ddp_icons_fa', false) == 1) {
        wp_register_style('ddp-icons-font-awesome', plugins_url('fonts/font-awesome/all.min.css', __FILE__));
        wp_enqueue_style('ddp-icons-font-awesome');
    }

    if (get_theme_mod('ddp_icons_md', false) == 1) {
        wp_register_style('ddp-icons-material-design', plugins_url('fonts/material-design/iconfont/material-icons.css', __FILE__));
        wp_enqueue_style('ddp-icons-material-design');
    }

    if(get_theme_mod('ddp_icons_fa', false) == 1 || get_theme_mod('ddp_icons_md', false) == 1) {
        wp_register_style('ddp-icons-frontend', plugins_url('fonts/ddp-icons-frontend.css', __FILE__));
        wp_enqueue_style('ddp-icons-frontend');
    }
}
add_action('wp_head', 'ddp_custom_icons_css');

//======================================================================
// CUSTOM ICONS FRONTEND BUILDER
//======================================================================

function ddp_vb_custom_icons_js() {
    if(get_theme_mod('ddp_icons_fa', false) == 1 || get_theme_mod('ddp_icons_md', false) == 1)
        wp_enqueue_script('ddp-vb-custom-icons-js', plugins_url('js/ddp-vb-admin-custom-icons.js', __FILE__), array( 'wp-i18n' ));
}

add_action('et_fb_enqueue_assets', 'ddp_vb_custom_icons_js');
add_action('admin_footer', 'ddp_vb_custom_icons_js');


//======================================================================
// CALL UP THE CUSTOM FILTERABLE PORTFOLIO WITH EXCERPT FILE
//======================================================================

function ddpro_change_divi_portfolio()
{
    if (!class_exists('ET_Builder_Module')) {
        return;
    }

    $post = get_post();

    if ($post && !empty(get_post_meta($post->ID, 'ddp-css-coco'))) {
        foreach ((array) get_post_meta($post->ID, 'ddp-css-coco') as $ddp_css_coco) {
            if ($ddp_css_coco == 'portfolio') {
                require_once('include/coco/php/ddpro-custom-portfolio.php');
                $ddpro_custom_portfolio = new Custom_ET_Builder_Module_Filterable_Portfolio();
                remove_shortcode('et_pb_filterable_portfolio');
                add_shortcode('et_pb_filterable_portfolio', array($ddpro_custom_portfolio, '_render'));
            }
        }
    }
    if ($post && !empty(get_post_meta($post->ID, 'ddp-css-pegasus'))) {
        foreach ((array) get_post_meta($post->ID, 'ddp-css-pegasus') as $ddp_css_pegasus) {
            if ($ddp_css_pegasus == 'pegasus-portfolio') {
                require_once('include/coco/php/ddpro-custom-portfolio.php');
                $ddpro_custom_portfolio = new Custom_ET_Builder_Module_Filterable_Portfolio();
                remove_shortcode('et_pb_filterable_portfolio');
                add_shortcode('et_pb_filterable_portfolio', array($ddpro_custom_portfolio, '_render'));
            }
        }
    }
    if ($post && !empty(get_post_meta($post->ID, 'ddp-css-impi'))) {
        foreach ((array) get_post_meta($post->ID, 'ddp-css-impi') as $ddp_css_impi) {
            if ($ddp_css_impi == 'portfolio') {
                require_once('include/coco/php/ddpro-custom-portfolio.php');
                $ddpro_custom_portfolio = new Custom_ET_Builder_Module_Filterable_Portfolio();
                remove_shortcode('et_pb_filterable_portfolio');
                add_shortcode('et_pb_filterable_portfolio', array($ddpro_custom_portfolio, '_render'));
            }
        }
    }
    if ($post && !empty(get_post_meta($post->ID, 'ddp-css-freddie'))) {
        foreach ((array) get_post_meta($post->ID, 'ddp-css-freddie') as $ddp_css_freddie) {
            if ($ddp_css_freddie == 'freddie-portfolio') {
                require_once('include/freddie/templates/freddie-custom-portfolio.php');
                $ddpro_custom_portfolio = new Custom_ET_Builder_Module_Filterable_Portfolio();
                remove_shortcode('et_pb_filterable_portfolio');
                add_shortcode('et_pb_filterable_portfolio', array($ddpro_custom_portfolio, '_render'));
            }
        }
    }

} // function ddpro_change_divi_portfolio() end

add_action('wp', 'ddpro_change_divi_portfolio', 9999);

// remove style-cpt.dev.css

function ddp_disable_cptdivi()
{
    remove_action( 'wp_enqueue_scripts', 'et_divi_replace_stylesheet', 99999998 );
}
add_action('init', 'ddp_disable_cptdivi');

function ddp_create_nonce() {
    wp_create_nonce('ddp-backend-nonce');
}

add_action('init', 'ddp_create_nonce');


//======================================================================
// Antispam email shortcode [email]name@website.com[/email]- https://codex.wordpress.org/Function_Reference/antispambot
//======================================================================

    if (!shortcode_exists('email')) {

        function wpcodex_hide_email_pegasus_shortcode($atts, $content = null)
        {
            if (!is_email($content)) {
                return;
            }

            return '<a href="mailto:' . antispambot($content) . '">' . antispambot($content) . '</a>';
        }

        add_shortcode('email', 'wpcodex_hide_email_pegasus_shortcode');
    }

//======================================================================
// Antispam email shortcode [email]name@website.com[/email]- https://codex.wordpress.org/Function_Reference/antispambot
//======================================================================

    if (!shortcode_exists('phone')) {

        function ddp_phone_shortcode($atts, $content = null)
        {

            return '<a href="tel:' . $content . '">' . $content . '</a>';
        }

        add_shortcode('phone', 'ddp_phone_shortcode');
    }


//======================================================================
// ADD FOOTER DATE SHORTCODE
//======================================================================
    function ddpro_footer_date( $atts ){
        return gmdate('Y');
    }
    if ( !shortcode_exists( 'footer_date_' ) ) add_shortcode( 'footer_date_', 'ddpro_footer_date' );



//======================================================================
// Create an option with ids and original titles for renaming
//======================================================================

function ddp_original_layouts_names() {
    $ddp_original_layouts_names = array();
    // works one time after update / installing the plugin
    if (!get_option( 'ddp_original_layouts_names')) {

    $divi_layouts = get_posts(array(
        'post_type'   => 'et_pb_layout',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    //    'category' => 'PHP Template',
       // 'fields' => 'ids'
        )
    );

    foreach ($divi_layouts as $divi_layout) {
       $divi_id = $divi_layout -> ID;
       $divi_title = $divi_layout -> post_title;
       // print_r($divi_layout);
       if(has_term("php-template", 'layout_category', $divi_id ) && has_term("divi-den", 'layout_category', $divi_id )) $ddp_original_layouts_names[$divi_id] = $divi_title;


       if(strpos(get_the_title( $divi_id ), 'Footer') !== false && has_term("divi-den", 'layout_category', $divi_id )) $ddp_original_layouts_names[$divi_id] = $divi_title;

       if(strpos(get_the_title( $divi_id ), 'footer') !== false && has_term("divi-den", 'layout_category', $divi_id )) $ddp_original_layouts_names[$divi_id] = $divi_title;
    }

    if(!empty($ddp_original_layouts_names)) add_option( 'ddp_original_layouts_names', $ddp_original_layouts_names);
 }
 else { // option ddp_original_layouts_names already exists

 }

}


add_filter( 'wp_head', 'ddp_original_layouts_names' ) ;

//======================================================================
// Check if item is in category
//======================================================================

function ddp_get_all_category_items($category) {
    $return_array = array();
     wp_reset_query();  // Restore global post data stomped by the_post()

    $args = array(
    'post_type' => 'et_pb_layout',
    'post_status' => 'publish',
    'posts_per_page'         => '-1',
    'tax_query' => array(
        array(
            'taxonomy' => 'layout_category',
            'field'    => 'slug',
            'terms'    => 'php-template',
        ),
    ),
    'orderby' => 'date',
    'order'   => 'ASC',
    );

    $ddp_query = null;
    $ddp_query = new WP_Query($args);

    $i=0;

     if ($ddp_query->have_posts()) {
        while ($ddp_query->have_posts()) : $ddp_query->the_post();
            if(has_term( $category, 'layout_category', get_the_ID()) && !has_term( 'Divi Den', 'layout_category', get_the_ID())) {
                $return_array['custom_'.$i] = get_the_title();
              //  echo str_replace('–', '-',get_the_title());
                $i++;
            }
        endwhile;
    }
    return $return_array;
}


// check if item in divi library

function ddp_is_divi_item_exists($item_title) {
     wp_reset_query();  // Restore global post data stomped by the_post()

    $args = array(
    'post_type' => 'et_pb_layout',
    'title' => $item_title,
    'post_status' => 'publish');

    $ddp_query = null;
    $ddp_query = new WP_Query($args);

    if ($ddp_query ->have_posts()) return true;
    else {
        wp_reset_query();  // Restore global post data stomped by the_post()
        $ddp_original_layouts_names = get_option( 'ddp_original_layouts_names');
        if (is_array($ddp_original_layouts_names) && in_array($item_title, $ddp_original_layouts_names)) {
           $args = array(
            'post_type' => 'et_pb_layout',
            'p' => array_search($item_title, $ddp_original_layouts_names),
            'post_status' => 'publish');

            $ddp_query = null;
            $ddp_query = new WP_Query($args);

            if ($ddp_query ->have_posts()) { return true;}
        }
    }
    return false;
}


//======================================================================
// ON POST SAVE
//======================================================================

add_action('save_post', 'ddp_save_divi_library_item', 10, 3);

function ddp_save_divi_library_item($post_id, $post, $update){

    if($update === false) {

    if (get_post_type($post_id) === 'et_pb_layout' && has_term("php-template", 'layout_category', $post_id )) {
        $ddp_original_layouts_names = get_option( 'ddp_original_layouts_names');
        $ddp_original_layouts_names[$post_id] = get_the_title($post_id);
        update_option( 'ddp_original_layouts_names', $ddp_original_layouts_names );
       // echo 'et_pb_layout';
    }
}
   // echo 'NOPE, SORRY';

}

// return new item name

function ddp_return_new_name($item_title) {
    $ddp_original_layouts_names = get_option( 'ddp_original_layouts_names');
    if (in_array($item_title, $ddp_original_layouts_names)) {
        $item_id = array_search($item_title, $ddp_original_layouts_names);
        //echo '$item_id '.$item_id;
        $post = get_post($item_id);
        // echo '<pre>';
        // print_r($post);
        // echo '</pre>';
        // echo '$post -> post_title ';
        // echo $post -> post_title;
        if ($post)return $post -> post_title;
        else return $item_title;

    }
    else return $item_title;
}

// check if item in divi library

function ddp_is_divi_category_exists($category) {
    wp_reset_query();  // Restore global post data stomped by the_post()

    $args = array(
    'post_type' => 'et_pb_layout',
    'category' => $category,
    'post_status' => 'publish');

    $ddp_query = null;
    $ddp_query = new WP_Query($args);

    $term = get_term_by('name', $category, 'category');
if($term != false ){
    if($term->count > 0 ){
        echo 'posts';
    }
}


    if ($ddp_query ->have_posts()) return true;
    else return false;
}

$ddp_custom_templates_dir = plugin_dir_path( __FILE__).'main/custom-templates/*.php';
foreach (glob($ddp_custom_templates_dir) as $filename)
{

    include_once($filename);
}



// fonts

function ddp_font_scripts() {
    // search
    if(get_option('ddp_search_results_page_template') !== 'disabled') {
        $ddp_search_header_font = esc_html(get_theme_mod('ddp_search_results_header_font'));

        if( $ddp_search_header_font ) {
            wp_enqueue_style( 'ddp-google-font-search-header', '//fonts.googleapis.com/css?family='. $ddp_search_header_font );
        }

        $ddp_search_body_font = esc_html(get_theme_mod('ddp_search_results_body_font'));

        if( $ddp_search_body_font ) {
            wp_enqueue_style( 'ddp-google-font-search-body', '//fonts.googleapis.com/css?family='. $ddp_search_body_font );
        }
    }

    // global archive
    if(get_option('ddp_global_page_template') !== 'disabled') {

        $ddp_global_archive_header_font = esc_html(get_theme_mod('ddp_global_archive_header_font'));

        if( $ddp_global_archive_header_font ) {
            wp_enqueue_style( 'ddp-google-font-global-archive-header', '//fonts.googleapis.com/css?family='. $ddp_global_archive_header_font );
        }

        $ddp_global_archive_body_font = esc_html(get_theme_mod('ddp_global_archive_body_font'));

        if( $ddp_global_archive_body_font ) {
            wp_enqueue_style( 'ddp-google-font-global-archive-body', '//fonts.googleapis.com/css?family='. $ddp_global_archive_body_font );
        }

        $ddp_global_archive_header_font_col = esc_html(get_theme_mod('ddp_global_archive_header_font_col'));

        if( $ddp_global_archive_header_font_col) {
            wp_enqueue_style( 'ddp-google-font-global-archive-header-col', '//fonts.googleapis.com/css?family='. $ddp_global_archive_header_font_col );
        }

        $ddp_global_archive_mdcr_font_col = esc_html(get_theme_mod('ddp_global_archive_mdcr_font_col'));

        if( $ddp_global_archive_mdcr_font_col) {
            wp_enqueue_style( 'ddp-google-font-global-archive-mdcr-col', '//fonts.googleapis.com/css?family='. $ddp_global_archive_mdcr_font_col );
        }
    }

    // category
    if(get_option( 'ddp_category_page_template') !== 'disabled') {
         $ddp_category_header_font = esc_html(get_theme_mod('ddp_category_header_font'));

        if( $ddp_category_header_font ) {
            wp_enqueue_style( 'ddp-google-font-category-header', '//fonts.googleapis.com/css?family='. $ddp_category_header_font );
        }

        $ddp_category_body_font = esc_html(get_theme_mod('ddp_category_body_font'));

        if( $ddp_category_body_font ) {
            wp_enqueue_style( 'ddp-google-font-category-body', '//fonts.googleapis.com/css?family='. $ddp_category_body_font );
        }

        $ddp_category_header_font_col = esc_html(get_theme_mod('ddp_category_header_font_col'));

        if( $ddp_category_header_font_col) {
            wp_enqueue_style( 'ddp-google-font-category-header-col', '//fonts.googleapis.com/css?family='. $ddp_category_header_font_col );
        }

        $ddp_category_mdcr_font_col = esc_html(get_theme_mod('ddp_category_mdcr_font_col'));

        if( $ddp_category_mdcr_font_col) {
            wp_enqueue_style( 'ddp-google-font-global-category-mdcr-col', '//fonts.googleapis.com/css?family='. $ddp_category_mdcr_font_col );
        }
    }

     // tag
    if(get_option( 'ddp_tag_page_template') !== 'disabled') {
         $ddp_tag_header_font = esc_html(get_theme_mod('ddp_tag_header_font'));

        if( $ddp_tag_header_font ) {
            wp_enqueue_style( 'ddp-google-font-tag-header', '//fonts.googleapis.com/css?family='. $ddp_tag_header_font );
        }

        $ddp_tag_body_font = esc_html(get_theme_mod('ddp_tag_body_font'));

        if( $ddp_tag_body_font ) {
            wp_enqueue_style( 'ddp-google-font-tag-body', '//fonts.googleapis.com/css?family='. $ddp_tag_body_font );
        }

        $ddp_tag_header_font_col = esc_html(get_theme_mod('ddp_tag_header_font_col'));

        if( $ddp_tag_header_font_col) {
            wp_enqueue_style( 'ddp-google-font-tag-header-col', '//fonts.googleapis.com/css?family='. $ddp_tag_header_font_col );
        }

        $ddp_tag_mdcr_font_col = esc_html(get_theme_mod('ddp_tag_mdcr_font_col'));

        if( $ddp_tag_mdcr_font_col) {
            wp_enqueue_style( 'ddp-google-font-tag-mdcr-col', '//fonts.googleapis.com/css?family='. $ddp_tag_mdcr_font_col );
        }
    }

     // author
    if(get_option( 'ddp_author_page_template') !== 'disabled') {
         $ddp_author_header_font = esc_html(get_theme_mod('ddp_author_header_font'));

        if( $ddp_author_header_font ) {
            wp_enqueue_style( 'ddp-google-font-author-header', '//fonts.googleapis.com/css?family='. $ddp_author_header_font );
        }

        $ddp_author_body_font = esc_html(get_theme_mod('ddp_author_body_font'));

        if( $ddp_author_body_font ) {
            wp_enqueue_style( 'ddp-google-font-author-body', '//fonts.googleapis.com/css?family='. $ddp_author_body_font );
        }

        $ddp_author_header_font_col = esc_html(get_theme_mod('ddp_author_header_font_col'));

        if( $ddp_author_header_font_col) {
            wp_enqueue_style( 'ddp-google-font-author-header-col', '//fonts.googleapis.com/css?family='. $ddp_author_header_font_col );
        }

        $ddp_author_mdcr_font_col = esc_html(get_theme_mod('ddp_author_mdcr_font_col'));

        if( $ddp_author_mdcr_font_col) {
            wp_enqueue_style( 'ddp-google-font-author-mdcr-col', '//fonts.googleapis.com/css?family='. $ddp_author_mdcr_font_col );
        }
    }

    // single post

    if(get_option( 'ddp_single_post_template') !== 'disabled') {

        $ddp_single_header_font = esc_html(get_theme_mod('ddp_single_header_font'));

        if( $ddp_single_header_font) {
            wp_enqueue_style( 'ddp-google-font-single-header', '//fonts.googleapis.com/css?family='. $ddp_single_header_font );
        }

        $ddp_single_body_font = esc_html(get_theme_mod('ddp_single_body_font'));

        if( $ddp_single_body_font) {
            wp_enqueue_style( 'ddp-google-font-single-body', '//fonts.googleapis.com/css?family='. $ddp_single_body_font );
        }

        $ddp_single_h1_h6_font = esc_html(get_theme_mod('ddp_single_h1_h6_font'));

        if( $ddp_single_h1_h6_font) {
            wp_enqueue_style( 'ddp-google-font-single-h1_h6', '//fonts.googleapis.com/css?family='. $ddp_single_h1_h6_font);
        }
    }

    // global h1 h6

    if(get_option('ddp_global_h1_h6') !== 'disabled') {

        if(get_option('ddp_global_h1_h6') === 'global') {

            $ddp_global_h1_h6_font = esc_html(get_theme_mod('ddp_global_h1_h6_font'));

            if($ddp_global_h1_h6_font) {
                wp_enqueue_style( 'ddp-google-font-global-h1_h6', '//fonts.googleapis.com/css?family='. $ddp_global_h1_h6_font);
            }

        }

        if(get_option('ddp_global_h1_h6') === 'individually') {

            $ddp_global_h1_font = esc_html(get_theme_mod('ddp_global_h1_font'));

            if( $ddp_global_h1_font) {
                wp_enqueue_style( 'ddp-google-font-global-h1', '//fonts.googleapis.com/css?family='. $ddp_global_h1_font);
            }

            $ddp_global_h2_font = esc_html(get_theme_mod('ddp_global_h2_font'));

            if( $ddp_global_h2_font) {
                wp_enqueue_style( 'ddp-google-font-global-h2', '//fonts.googleapis.com/css?family='. $ddp_global_h2_font);
            }

            $ddp_global_h3_font = esc_html(get_theme_mod('ddp_global_h3_font'));

            if( $ddp_global_h3_font) {
                wp_enqueue_style( 'ddp-google-font-global-h3', '//fonts.googleapis.com/css?family='. $ddp_global_h3_font);
            }

            $ddp_global_h4_font = esc_html(get_theme_mod('ddp_global_h4_font'));

            if( $ddp_global_h4_font) {
                wp_enqueue_style( 'ddp-google-font-global-h4', '//fonts.googleapis.com/css?family='. $ddp_global_h4_font);
            }

            $ddp_global_h5_font = esc_html(get_theme_mod('ddp_global_h5_font'));

            if( $ddp_global_h5_font) {
                wp_enqueue_style( 'ddp-google-font-global-h5', '//fonts.googleapis.com/css?family='. $ddp_global_h5_font);
            }

            $ddp_global_h6_font = esc_html(get_theme_mod('ddp_global_h6_font'));

            if( $ddp_global_h6_font) {
                wp_enqueue_style( 'ddp-google-font-global-h6', '//fonts.googleapis.com/css?family='. $ddp_global_h6_font);
            }
        }
    }

    // mobile menu

    if (get_option('ddp_mobile_menu_template') !== 'disabled' && get_option('ddp_menu_template') === 'disabled'  ) {
        if (get_option('ddp_mobile_menu_template') === 'mobile_menu_1')  {
            $ddp_mobile_menu_1_font = esc_html(get_theme_mod('ddp_mobile_menu_1_font'));

            if( $ddp_mobile_menu_1_font) {
                wp_enqueue_style( 'ddp-google-font-menu-1', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_1_font);
            }

             $ddp_mobile_menu_1_sub_font = esc_html(get_theme_mod('ddp_mobile_menu_1_sub_font'));

            if( $ddp_mobile_menu_1_sub_font) {
                wp_enqueue_style( 'ddp-google-sub-font-menu-1', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_1_sub_font);
            }
        }
        if (get_option('ddp_mobile_menu_template') === 'mobile_menu_2')  {
            $ddp_mobile_menu_2_font = esc_html(get_theme_mod('ddp_mobile_menu_2_font'));

            if( $ddp_mobile_menu_2_font) {
                wp_enqueue_style( 'ddp-google-font-menu-2', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_2_font);
            }

             $ddp_mobile_menu_2_sub_font = esc_html(get_theme_mod('ddp_mobile_menu_2_sub_font'));

            if( $ddp_mobile_menu_2_sub_font) {
                wp_enqueue_style( 'ddp-google-sub-font-menu-2', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_2_sub_font);
            }
        }
        if (get_option('ddp_mobile_menu_template') === 'mobile_menu_3')  {
            $ddp_mobile_menu_3_font = esc_html(get_theme_mod('ddp_mobile_menu_3_font'));

            if( $ddp_mobile_menu_3_font) {
                wp_enqueue_style( 'ddp-google-font-menu-3', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_3_font);
            }

            $ddp_mobile_menu_3_sub_font = esc_html(get_theme_mod('ddp_mobile_menu_3_sub_font'));

            if( $ddp_mobile_menu_3_sub_font) {
                wp_enqueue_style( 'ddp-google-sub-font-menu-3', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_3_sub_font);
            }

            $ddp_mobile_menu_3_address_font = esc_html(get_theme_mod('ddp_mobile_menu_3_address_font'));

            if( $ddp_mobile_menu_3_address_font) {
                wp_enqueue_style( 'ddp-google-address-font-menu-3', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_3_address_font);
            }
        }
        if (get_option('ddp_mobile_menu_template') === 'mobile_menu_custom')  {
            $ddp_mobile_menu_custom_font = esc_html(get_theme_mod('ddp_mobile_menu_custom_font'));

            if( $ddp_mobile_menu_custom_font) {
                wp_enqueue_style( 'ddp-google-font-menu-custom', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_custom_font);
            }

             $ddp_mobile_menu_custom_sub_font = esc_html(get_theme_mod('ddp_mobile_menu_custom_sub_font'));

            if( $ddp_mobile_menu_custom_sub_font) {
                wp_enqueue_style( 'ddp-google-sub-font-menu-custom', '//fonts.googleapis.com/css?family='. $ddp_mobile_menu_custom_sub_font);
            }
        }
    }

    // back to top button
    if(get_theme_mod('ddp_back_to_top', false) == 1 ) {

        $ddp_back_to_top_font_value = esc_html(get_theme_mod('ddp_back_to_top_font_value'));

        if( $ddp_back_to_top_font_value) {
             wp_enqueue_style( 'ddp-google-font-back-to-top-text', '//fonts.googleapis.com/css?family='. $ddp_back_to_top_font_value);
        }

    }



}
add_action( 'wp_enqueue_scripts', 'ddp_font_scripts' );

function ddp_login_font_scripts() {

// login

    if(get_option('ddp_login_template') === 'diana_1') {

        $ddp_login_diana_1_font_value = esc_html(get_theme_mod('ddp_login_diana_1_font_value'));

        if( $ddp_login_diana_1_font_value) {
            wp_enqueue_style( 'ddp-google-font-login-diana_1', '//fonts.googleapis.com/css?family='. $ddp_login_diana_1_font_value );
        }
    }

     if(get_option('ddp_login_template') === 'diana_2') {

        $ddp_login_diana_2_font_value = esc_html(get_theme_mod('ddp_login_diana_2_font_value'));

        if( $ddp_login_diana_2_font_value) {
            wp_enqueue_style( 'ddp-google-font-login-diana_2', '//fonts.googleapis.com/css?family='. $ddp_login_diana_2_font_value );
        }
    }

     if(get_option('ddp_login_template') === 'diana_3') {

        $ddp_login_diana_3_font_value = esc_html(get_theme_mod('ddp_login_diana_3_font_value'));

        if( $ddp_login_diana_3_font_value) {
            wp_enqueue_style( 'ddp-google-font-login-diana_3', '//fonts.googleapis.com/css?family='. $ddp_login_diana_3_font_value );
        }
    }
}


add_action( 'login_enqueue_scripts', 'ddp_login_font_scripts' );




//Sanitizes Fonts
function ddp_sanitize_fonts( $input ) {
    $valid = array(
        'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
        'Open Sans:400italic,700italic,400,700' => 'Open Sans',
        'Oswald:400,700' => 'Oswald',
        'Playfair Display:400,700,400italic' => 'Playfair Display',
        'Montserrat:400,700' => 'Montserrat',
        'Raleway:400,700' => 'Raleway',
        'Droid Sans:400,700' => 'Droid Sans',
        'Lato:400,700,400italic,700italic' => 'Lato',
        'Arvo:400,700,400italic,700italic' => 'Arvo',
        'Lora:400,700,400italic,700italic' => 'Lora',
        'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
        'Oxygen:400,300,700' => 'Oxygen',
        'PT Serif:400,700' => 'PT Serif',
        'PT Sans:400,700,400italic,700italic' => 'PT Sans',
        'PT Sans Narrow:400,700' => 'PT Sans Narrow',
        'Cabin:400,700,400italic' => 'Cabin',
        'Fjalla One:400' => 'Fjalla One',
        'Francois One:400' => 'Francois One',
        'Josefin Sans:400,300,600,700' => 'Josefin Sans',
        'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
        'Arimo:400,700,400italic,700italic' => 'Arimo',
        'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
        'Bitter:400,700,400italic' => 'Bitter',
        'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
        'Roboto:400,400italic,700,700italic' => 'Roboto',
        'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
        'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
        'Roboto Slab:400,700' => 'Roboto Slab',
        'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
        'Rokkitt:400' => 'Rokkitt',
        'Poppins:400' => 'Poppins',
        'Poiret One:400' => 'Poiret One',
    );


    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/*
 * Add Customizer content
 */

add_action( 'customize_register', 'alpha_customize_register' );


$ddp_customizer_dir = plugin_dir_path( __FILE__).'main/wp-customizer/*.php';
foreach (glob($ddp_customizer_dir) as $filename)
{

    include_once($filename);
}


function ddp_customizer_css_and_js() {
    wp_enqueue_script( 'ddp_customizer_js', plugin_dir_url( __FILE__ ) . 'js/ddp-wp-customizer.js', array('jquery'));
}

add_action('customize_controls_enqueue_scripts', 'ddp_customizer_css_and_js', 100);

   // process font styles

    function ddp_process_font_styles($styles) {
        $return_text = '';
        $font_styles = explode ("|", $styles);
        foreach($font_styles as $font_style ) {
            switch ($font_style) {
                case 'bold':
                    $return_text = $return_text.'font-weight: 700 !important; ';
                    break;

                case 'italic':
                    $return_text = $return_text.'font-style: italic !important; ';
                    break;

                case 'uppercase':
                    $return_text = $return_text.'text-transform: uppercase !important; ';
                    break;

                case 'underline':
                    $return_text = $return_text.'text-decoration: underline !important; ';
                    break;

                default:
                    $return_text = $return_text;
                    break;
            }
         }
         return $return_text;
    }


} // activated check ends

//======================================================================
// AUTOUPDATE
//======================================================================

// &&  get_option('ddp_subscription_cancelled') != 'yes'
if (get_option('ddp_allow_upd') !== 'disabled') {
    require 'ddp-plugin-update-checker/plugin-update-checker.php';
    $ddpUpdateChecker = Puc_v4_Factory::buildUpdateChecker('https://seku.re/ddproupd', __FILE__, 'ddpro');
}