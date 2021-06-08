<?php

/**
 * Intellectual Property rights, and copyright, reserved by Todd Lahman, LLC as allowed by law include,
 * but are not limited to, the working concept, function, and behavior of this software,
 * the logical code structure and expression as written.
 *
 * @package     WooCommerce API Manager plugin and theme library
 * @author      Todd Lahman LLC https://www.toddlahman.com/
 * @copyright   Copyright (c) Todd Lahman LLC (support@toddlahman.com)
 * @since       2.0
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

if (!defined('ABSPATH')) {
    exit;
}


if (!class_exists('ddp_AM_License_Menu')) {
    class ddp_AM_License_Menu{

        /**
         * Class args.
         *
         * @var string
         */
        public $file = '';
        public $software_title = '';
        public $software_version = '';
        public $plugin_or_theme = '';
        public $api_url = '';
        public $data_prefix = '';
        public $slug = '';
        public $plugin_name = '';
        public $text_domain = '';
        public $extra = '';

        /**
         * Class properties.
         *
         * @var string
         */
        public $ame_software_product_id;
        public $ame_data_key;
        public $ame_api_key;
        public $ame_activation_email;
        public $ame_product_id_key;
        public $ame_instance_key;
        public $ame_deactivate_checkbox_key;
        public $ame_activated_key;
        public $ame_activation_tab_key;
        public $ame_settings_menu_title;
        public $ame_settings_title;
        public $ame_menu_tab_activation_title;
        public $ame_menu_tab_deactivation_title;
        public $ame_options;
        public $ame_plugin_name;
        public $ame_product_id;
        public $ame_renew_license_url;
        public $ame_instance_id;
        public $ame_domain;
        public $ame_software_version;

        /**
         * @var null
         */
        protected static $_instance = null;

        /**
         * @param string $file             Must be $this->file from the root plugin file, or theme functions file.
         * @param string $software_title   Must be exactly the same as the Software Title in the product.
         * @param string $software_version This products current software version.
         * @param string $plugin_or_theme  'plugin' or 'theme'
         * @param string $api_url          The URL to the site that is running the API Manager. Example: https://www.toddlahman.com/ Must have a trailing slash.
         * @param string $text_domain      The text domain for translation. Hardcoding this string is preferred rather than using this argument.
         * @param string $extra            Extra data. Whatever you want.
         *
         * @return \AM_License_Menu|null
         */
        public static function instance($file, $software_title, $software_version, $plugin_or_theme, $api_url, $text_domain = '', $extra = '')
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self($file, $software_title, $software_version, $plugin_or_theme, $api_url, $text_domain, $extra);
            }



            return self::$_instance;
        }


        public function ddp_allowed_html() {

            if (!function_exists('ddp_allowed_html')) {
                require_once(plugin_dir_path(__FILE__) . 'include/ddp-allowed-html-tags.php');
            }

            $allowed_tags = ddp_allowed_html();

            return $allowed_tags;
        }

        //======================================================================
        // CONSTANTS FOR WL
        //======================================================================

        public function ddp_set_wl()
        {
            $ddp_plugin_name       = 'Divi Den Pro';
            $ddp_plugin_url        = 'https://seku.re/GoPro';
            $ddp_plugin_author     = 'WP Den';
            $ddp_plugin_author_url = 'https://seku.re/wp-den-team';
            $ddp_plugin_desc       = __('Companion plugin for the Divi Den Pro cloud library. Use the layout finder to save new layouts, sections and modules. View tutorials, get support and manage API key activation. Get the latest CSS/JavaScript code updates and fixes. Keeps everything running smooth and secure.', 'ddpro');
            $ddp_plugin_icon       = plugins_url('ddpro/include/ddp-icon.png');
            $ddp_wp_content        = '<img class="alignnone size-full" src="';
            $ddp_wp_content       .= plugins_url('ddpro/include/ddp-your-logo.png');
            $ddp_wp_content       .= '" alt="Your Logo" width="437" height="97" />

                                        <hr />

                                        <h1>ABC Studio</h1>

                                        <hr />

                                        <strong>Theme Name:</strong> Your Clients Name

                                        <strong>Theme URI:</strong> <a href="https://clientsname.com/">https://clientsname.com/</a>

                                        <strong>Description:</strong> Smart. Flexible. Beautiful. ABC Studio - Design at its best.

                                        <strong>Author:</strong> Your Name

                                        <strong>Author URI</strong>: <a href="http://www.yourname.com">http://www.yourname.com</a>

                                        <hr />

                                        <h2>Contact us</h2>

                                        <hr />

                                        <h3>Call us<strong>
                                        </strong></h3>
                                        <a href="tel:1123456789">1 (123) 456 789</a>
                                        <a href="tel:1123456788">1 (123) 456 788</a>

                                        <hr />

                                        <h3>Email us</h3>

                                        <hr />

                                        <a href="mailto:name@website.com">name@website.com</a>
                                        <a href="mailto:sales@website.com">sales@website.com</a>

                                        <hr />

                                        <h3>Visit us</h3>

                                        <hr />

                                        105 Street Name
                                        City Name, CD 12345

                                        <hr />

                                        <h3>When we work</h3>
                                        8.00-18.00 Mon-Fri
                                        8.00-12.00 Sat';

            if (!get_option('ddp_wl'))
                add_option('ddp_wl', 'disabled');
            if (!get_option('ddp_plugin_name'))
                add_option('ddp_plugin_name', $ddp_plugin_name);
            if (!get_option('ddp_wp_content'))
                add_option('ddp_wp_content', $ddp_wp_content);

            if (get_option('ddp_wl') == 'enabled') {
                if (get_option('ddp_plugin_name')) {
                    if(!defined('DDP_NAME')) define('DDP_NAME', get_option('ddp_plugin_name'));
                    if(!defined('DDP_LINK')) define('DDP_LINK', str_replace(" ", "_", strtolower(get_option('ddp_plugin_name'))));
                } else {
                    if(!defined('DDP_NAME')) define('DDP_NAME', $ddp_plugin_name);
                    if(!defined('DDP_LINK')) define('DDP_LINK', str_replace(' ', '_', strtolower(DDP_NAME)));
                }

                if (get_option('ddp_plugin_icon') != '') {
                    if(!defined('DDP_ICON')) define('DDP_ICON', get_option('ddp_plugin_icon'));
                } else {
                    if(!defined('DDP_ICON')) define('DDP_ICON',plugin_dir_url(__FILE__) . '/include/ddp-wl-default-icon.png');
                }

                if (get_option('ddp_plugin_url')) {
                    if(!defined('DDP_URL')) define('DDP_URL', get_option('ddp_plugin_url'));
                } else {
                    if(!defined('DDP_URL')) define('DDP_URL', $ddp_plugin_url);
                }

                if (get_option('ddp_plugin_desc')) {
                    if(!defined('DDP_DESC')) define('DDP_DESC', get_option('ddp_plugin_desc'));
                } else {
                    if(!defined('DDP_DESC')) define('DDP_DESC', $ddp_plugin_desc);
                }

                if (get_option('ddp_plugin_author')) {
                    if(!defined('DDP_AUTHOR')) define('DDP_AUTHOR', get_option('ddp_plugin_author'));
                } else {
                    if(!defined('DDP_AUTHOR')) define('DDP_AUTHOR', $ddp_plugin_author);
                }

                if (get_option('ddp_plugin_author_url')) {
                    if(!defined('DDP_AUTHOR_URL')) define('DDP_AUTHOR_URL', get_option('ddp_plugin_author_url'));
                } else {
                    if(!defined('DDP_AUTHOR_URL')) define('DDP_AUTHOR_URL', $ddp_plugin_author_url);
                }

            } //if (get_option('ddp_wl') == 'enabled')
            else {
                if(!defined('DDP_NAME')) define('DDP_NAME', $ddp_plugin_name);
                if(!defined('DDP_LINK')) define('DDP_LINK', str_replace(' ', '_', strtolower(DDP_NAME)));
                if(!defined('DDP_ICON')) define('DDP_ICON', $ddp_plugin_icon);
                if(!defined('DDP_URL')) define('DDP_URL', $ddp_plugin_url);
                if(!defined('DDP_DESC')) define('DDP_DESC', $ddp_plugin_desc);
                if(!defined('DDP_AUTHOR')) define('DDP_AUTHOR', $ddp_plugin_author);
                if(!defined('DDP_AUTHOR_URL')) define('DDP_AUTHOR_URL', $ddp_plugin_author_url);
            }
            //echo 'DDP_LINK ' . DDP_LINK;

        }


        //======================================================================
        // RENAME WHITE LABEL PLUGIN
        //======================================================================

        public function ddp_all_plugins($plugins)
        {

            $plugins['ddpro/ddpro.php']['Name']      = DDP_NAME;
            $plugins['ddpro/ddpro.php']['Title']     = DDP_NAME;
            $plugins['ddpro/ddpro.php']['Author']    = DDP_AUTHOR;
            $plugins['ddpro/ddpro.php']['AuthorURI'] = DDP_AUTHOR_URL;
            $plugins['ddpro/ddpro.php']['PluginURI'] = DDP_URL;

            if (DDP_DESC) {
                $plugins['ddpro/ddpro.php']['Description'] = DDP_DESC;
            }

            return $plugins;
        }

        public function ddp_translate_all( $translated, $original, $domain ) {

            switch ( $translated ) {
                case 'Divi Den Pro' :
                    $translated_text =  DDP_NAME;
                    break;
                default: $translated_text = $translated;
            }
            return $translated_text;

        }


        //======================================================================
        // CUSTOM ADMIN MENU ICON
        //======================================================================

        public function ddp_custom_wl_scripts_and_styles()
        {
            echo '<style>
			.toplevel_page_' . esc_url(DDP_LINK) . '_dashboard .wp-menu-image img {
				max-width: 24px;
				padding: 5px 0 0 !important;
			}
			a.open-plugin-details-modal[aria-label*="View '. esc_html(DDP_NAME).'"], tr#ddpro-update a.open-plugin-details-modal {display: none !important;}
			tr#ddpro-update a.update-link {text-transform: capitalize; margin-left: -15px; background: #fff8e5;}
			  </style>';
            echo '<script>jQuery(document).ready(function($) {
                $("tr[data-slug=ddpro] .plugin-version-author-uri a.open-plugin-details-modal").attr("href", "'.esc_url(DDP_URL).'").removeClass("thickbox").attr("target", "_blank");
                }); //jQuery(document).ready(function($)</script>';
        }

        public function __construct($file, $software_title, $software_version, $plugin_or_theme, $api_url, $text_domain, $extra)
        {
            $this->file            = $file;
            $this->software_title  = $software_title;
            $this->version         = $software_version;
            $this->plugin_or_theme = $plugin_or_theme;
            $this->api_url         = $api_url;
            $this->extra           = $extra;
            $this->data_prefix     = str_ireplace(array(
                ' ',
                '_',
                '&',
                '?'
            ), '_', strtolower($this->software_title));

            if (is_admin()) {

            add_action('plugins_loaded', array(
                $this,
                'ddp_set_wl'
            ));

				 if (get_option('ddp_wl') === 'enabled') {

                    add_action('admin_head', array(
                        $this,
                        'ddp_custom_wl_scripts_and_styles'
                    ));

                    add_filter('gettext', array(
                        $this,
                        'ddp_translate_all'
                    ), 13, 3);
                }

                add_filter('all_plugins', array(
                    $this,
                    'ddp_all_plugins'
                ), 10, 4);




                if (!empty($this->plugin_or_theme) && $this->plugin_or_theme == 'theme') {
                    add_action('admin_init', array(
                        $this,
                        'activation'
                    ));
                }

                if (!empty($this->plugin_or_theme) && $this->plugin_or_theme == 'plugin') {
                    register_activation_hook($this->file, array(
                        $this,
                        'activation'
                    ));
                }

                add_action('admin_menu', array(
                    $this,
                    'ddp_register_menu'
                ));
                add_action('admin_init', array(
                    $this,
                    'load_settings'
                ));

                // Check for external connection blocking
                add_action('admin_notices', array(
                    $this,
                    'ddp_check_external_blocking'
                ));


                /**
                 * Software Product ID is the product title string
                 * This value must be unique, and it must match the API tab for the product in WooCommerce
                 */
                $this->ame_software_product_id = $this->software_title;

                /**
                 * Set all data defaults here
                 */
                $this->ame_data_key                = $this->data_prefix . '_data';
                $this->ame_api_key                 = 'api_key';
                $this->ame_product_id_key          = $this->data_prefix . '_product_id';
                $this->ame_instance_key            = $this->data_prefix . '_instance';
                $this->ame_deactivate_checkbox_key = $this->data_prefix . '_deactivate_checkbox';
                $this->ame_activated_key           = $this->data_prefix . '_activated';

                /**
                 * Set all admin menu data
                 */

                $this->ddp_set_wl();
                $this->ame_settings_menu_title = DDP_NAME;
                $this->ame_settings_title      = DDP_NAME . __('API Key', 'ddpro');
                $this->ame_deactivate_checkbox = DDP_LINK . '_deactivate_checkbox';

                $this->ame_activation_tab_key          = DDP_LINK . '_dashboard';
                $this->ame_activation_tab_key_wl       = DDP_LINK . '_dashboard_wl';
                $this->ame_deactivation_tab_key        = DDP_LINK . '_deactivation';
                $this->ame_menu_tab_activation_title   = __('API Key', 'ddpro');
                $this->ame_menu_tab_deactivation_title = __('API Key Deactivation', 'ddpro');

                /**
                 * Set all software update data here
                 */
                $this->ame_options           = get_option($this->ame_data_key);
                $this->ame_plugin_name       = $this->plugin_or_theme == 'plugin' ? untrailingslashit(plugin_basename($this->file)) : get_stylesheet(); // same as plugin slug. if a theme use a theme name like 'twentyeleven'
                $this->ame_product_id        = get_option($this->ame_product_id_key); // Software Title
                $this->ame_renew_license_url = 'https://seku.re/GoPro/'; // URL to renew an API Key. Trailing slash in the upgrade_url is required.
                $this->ame_instance_id       = get_option($this->ame_instance_key); // Instance ID (unique to each blog activation)
                /**
                 * Some web hosts have security policies that block the : (colon) and // (slashes) in http://,
                 * so only the host portion of the URL can be sent. For example the host portion might be
                 * www.example.com or example.com. http://www.example.com includes the scheme http,
                 * and the host www.example.com.
                 * Sending only the host also eliminates issues when a client site changes from http to https,
                 * but their activation still uses the original scheme.
                 * To send only the host, use a line like the one below:
                 *
                 * $this->ame_domain = str_ireplace( array( 'http://', 'https://' ), '', home_url() ); // blog domain name
                 */
                $this->ame_domain            = str_ireplace(array(
                    'http://',
                    'https://'
                ), '', home_url()); // blog domain name
                $this->ame_software_version  = $this->version; // The software version
                $options                     = get_option($this->ame_data_key);

                /**
                 * Check for software updates
                 */
                if (!empty($options) && $options !== false) {
                    $this->check_for_update();
                }

                if (!empty($this->ame_activated_key) && get_option($this->ame_activated_key) != 'Activated') { //
                    add_action('admin_notices', array(
                        $this,
                        'inactive_notice'
                    ));
                }
            }

            /**
             * Deletes all data if plugin deactivated
             */
            if ($this->plugin_or_theme == 'plugin') {
                register_deactivation_hook($this->file, array(
                    $this,
                    'uninstall'
                ));
            }

            if ($this->plugin_or_theme == 'theme') {
                add_action('switch_theme', array(
                    $this,
                    'uninstall'
                ));
            }
        }

        /**
         * Register submenu specific to this product.
         */
        public function ddp_register_menu()
        {
            if (get_option('ddp_wl') == 'enabled') {
                // for agency, hidden
                add_submenu_page(null, __(DDP_NAME, 'ddpro'), 'submenu', 'manage_options', $this->ame_activation_tab_key . '_wl', array(
                    $this,
                    'ddp_config_page'
                ), DDP_ICON);
                if(get_option('ddp_hide_menu') != 'enabled') {
                    // for clients, visible
                    add_menu_page(__(DDP_NAME, 'ddpro'), __(DDP_NAME, 'ddpro'), 'manage_options', $this->ame_activation_tab_key, array(
                        $this,
                        'ddp_wl_config_page'
                    ), DDP_ICON);
                }
            } //if(get_option('ddp_wl') == 'enabled')
            else {
                add_menu_page(__(DDP_NAME, 'ddpro'), __(DDP_NAME, 'ddpro'), 'manage_options', $this->ame_activation_tab_key, array(
                    $this,
                    'ddp_config_page'
                ), DDP_ICON, null);
                add_submenu_page( $this->ame_activation_tab_key, __(DDP_NAME, 'ddpro'), __('Layout Finder', 'ddpro'), 'manage_options',  $this->ame_activation_tab_key, '', null);
                add_submenu_page( $this->ame_activation_tab_key, __('Latest', 'ddpro'), __('Latest', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_latest_feed', '', null);
                add_submenu_page( $this->ame_activation_tab_key, __('Tutorials', 'ddpro'), __('Tutorials', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_start_here', '', null);
                if (get_option('divi_den_pro_membership_activated') == 'Activated') {
                    add_submenu_page( $this->ame_activation_tab_key, __('Divi Theme Builder', 'ddpro'), __('Divi Theme Builder', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_divi_theme_builder', '', null);
                    add_submenu_page( $this->ame_activation_tab_key, __('Plugin Theme Builder', 'ddpro'), __('Plugin Theme Builder', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_settings', '', null);
                    add_submenu_page( $this->ame_activation_tab_key, __('Custom CSS Files', 'ddpro'), __('Custom CSS Files', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_css', '', null);
                }
                add_submenu_page( $this->ame_activation_tab_key, __('Support', 'ddpro'), __('Support', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_assistant_help_faq', '', null);
                add_submenu_page( $this->ame_activation_tab_key, __('System Status', 'ddpro'), __('System Status', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_assistant_system_status', '', null);
                add_submenu_page( $this->ame_activation_tab_key, __('API Key', 'ddpro'), __('API Key', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=divi_den_pro_dashboard', '', null);
                if (get_option('divi_den_pro_membership_activated') == 'Activated') {

                    add_submenu_page( $this->ame_activation_tab_key, __('White Label', 'ddpro'), __('White Label', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_wl', '', null);
                    add_submenu_page( $this->ame_activation_tab_key, __('More Options', 'ddpro'), __('More Options', 'ddpro'), 'manage_options', 'admin.php?page='.$this->ame_activation_tab_key.'&tab=ddp_options', '', null);
                }
            }
        }

        /**
         * Generate the default data arrays
         */
        public function activation()
        {
            if (get_option($this->ame_data_key) === false || get_option($this->ame_instance_key) === false) {
                $global_options = array(
                    $this->ame_api_key => ''
                );

                update_option($this->ame_data_key, $global_options);

                $single_options = array(
                    $this->ame_product_id_key => $this->ame_software_product_id,
                    $this->ame_instance_key => wp_generate_password(12, false),
                    $this->ame_deactivate_checkbox_key => 'on',
                    $this->ame_activated_key => 'Deactivated'
                );

                foreach ($single_options as $key => $value) {
                    update_option($key, $value);
                }
            }
        }

        /**
         * Deletes all data if plugin deactivated
         *
         * @return void
         */
        public function uninstall()
        {
            global $blog_id;

            $this->license_key_deactivation();

            // Remove options
            if (is_multisite()) {
                switch_to_blog($blog_id);

                foreach (array(
                    $this->ame_data_key,
                    $this->ame_product_id_key,
                    $this->ame_instance_key,
                    $this->ame_deactivate_checkbox_key,
                    $this->ame_activated_key
                ) as $option) {

                    delete_option($option);
                }

                restore_current_blog();
            } else {
                foreach (array(
                    $this->ame_data_key,
                    $this->ame_product_id_key,
                    $this->ame_instance_key,
                    $this->ame_deactivate_checkbox_key,
                    $this->ame_activated_key
                ) as $option) {

                    delete_option($option);
                }
            }
        }

        /**
         * Deactivates the license on the API server
         *
         * @return void
         */
        public function license_key_deactivation()
        {
            $activation_status = get_option( $this->ame_activated_key );
            $api_key           = $this->ame_options[ $this->ame_api_key ];
            $args = array(
                'api_key' => $api_key,
            );
            if ( $activation_status == 'Activated' && $api_key != '' ) {
                $this->deactivate( $args ); // reset API Key activation
            }
        }

        /**
         * Displays an inactive notice when the software is inactive.
         */
        public function inactive_notice()
        {
?>
            <?php
            if (!current_user_can('manage_options')) {
                return;
            }
?>
            <?php

            if (isset($_GET['page']) && $this->ame_activation_tab_key == $_GET['page']) { // phpcs:ignore
                return;
            }
?>
            <div class="notice notice-info">
                <p><?php
                echo esc_html__('Please activate your ', 'ddpro').esc_html(DDP_NAME).esc_html__(' API key', 'ddpro').'. <a href="' . esc_url(admin_url('options-general.php?page=' . $this->ame_activation_tab_key)) . '">'.esc_html__('Click here to add API Key', 'ddpro'). '</a>'  ;
?></p>
            </div>
            <?php
        }

        /**
         * Check for external blocking contstant.
         */
        public function ddp_check_external_blocking()
        {
            // show notice if external requests are blocked through the WP_HTTP_BLOCK_EXTERNAL constant
            if (defined('WP_HTTP_BLOCK_EXTERNAL') && WP_HTTP_BLOCK_EXTERNAL === true) {
                // check if our API endpoint is in the allowed hosts
                $host = parse_url($this->api_url, PHP_URL_HOST);

                if (!defined('WP_ACCESSIBLE_HOSTS') || stristr(WP_ACCESSIBLE_HOSTS, $host) === false) {
?>
                    <div class="notice notice-error">
                        <p><?php
                    printf('<strong>'.esc_html__('Warning!', 'ddpro').'</strong> '.esc_html__('You\'re blocking external requests which means you won\'t be able to get %s updates. Please add %s to %s.', 'ddpro'), esc_html($this->ame_software_product_id), '<strong>' . esc_url($host) . '</strong>', '<code>WP_ACCESSIBLE_HOSTS</code>');
?></p>
                    </div>
                    <?php
                }
            }
        }

        /**
         * Generate report
         */

        /**
         * helper function for number conversions
         *
         * @access public
         * @param mixed $v
         * @return void
         */
        public function num_convt($v)
        {
            $l   = substr($v, -1);
            $ret = substr($v, 0, -1);

            switch (strtoupper($l)) {
                case 'P': // fall-through
                case 'T': // fall-through
                case 'G': // fall-through
                case 'M': // fall-through
                case 'K': // fall-through
                    $ret *= 1024;
                    break;
                default:
                    break;
            }

            return $ret;
        }

        public function report_data($warning_flag)
        {

            // call WP database
            global $wpdb;

            // data checks for later

            $mu_plugins = get_mu_plugins();
            $plugins    = get_plugins();
            $active     = get_option('active_plugins', array());

            $theme_data         = wp_get_theme();
            $theme              = $theme_data->Name . ' ' . $theme_data->Version;
            $style_parent_theme = wp_get_theme(get_template());
            $parent_theme       = $style_parent_theme->get('Name') . " " . $style_parent_theme->get('Version');
            //print_r($theme_data);

            // multisite details
            $nt_plugins = is_multisite() ? wp_get_active_network_plugins() : array();
            $nt_active  = is_multisite() ? get_site_option('active_sitewide_plugins', array()) : array();
            $ms_sites   = is_multisite() ? wp_get_sites() : null;

            // yes / no specifics
            $ismulti  = is_multisite() ? __('Yes', 'ddp-report') : __('No', 'ddp-report');
            $safemode = ini_get('safe_mode') ? __('Yes', 'ddp-report') : __('No', 'ddp-report');
            $wpdebug  = defined('WP_DEBUG') ? WP_DEBUG ? __('Enabled', 'ddp-report') : __('Disabled', 'ddp-report') : __('Not Set', 'ddp-report');
            $errdisp  = ini_get('display_errors') != false ? __('On', 'ddp-report') : __('Off', 'ddp-report');

            $jquchk = wp_script_is('jquery', 'registered') ? $GLOBALS['wp_scripts']->registered['jquery']->ver : __('n/a', 'ddp-report');

            $sessenb = isset($_SESSION) ? __('Enabled', 'ddp-report') : __('Disabled', 'ddp-report');
            $usecck  = ini_get('session.use_cookies') ? __('On', 'ddp-report') : __('Off', 'ddp-report');
            $hascurl = function_exists('curl_init') ? __('Supports cURL.', 'ddp-report') : __('Does not support cURL.', 'ddp-report');
            $openssl = extension_loaded('openssl') ? __('OpenSSL installed.', 'ddp-report') : __('OpenSSL not installed.', 'ddp-report');

            // language

            $site_lang = get_bloginfo('language');
            $site_char = get_bloginfo('charset');
            if (is_rtl())
                $site_text_dir = 'rtl';
            else
                $site_text_dir = 'ltr';

            // start generating report

            global $wpdb;
            $table_name = $wpdb->prefix . 'options';

            $ddp_report = '<div class="ddp-system-report-dash">';
            $ddp_report .= '<div class="ddp-columns">';
            $ddp_report .= '<div class="ddp-first-column">';
            $ddp_report .= '<div id="ddp-report">';
            $ddp_report .= '<h2>'.__('System Status', 'ddpro').'</h2><p>'.__('Recommended values ensure compatibility with Divi Theme.', 'ddpro').'</p>';
            $ddp_report .= '<ul><li>'.__('For best results, an amber "warning" notice requires attention.', 'ddpro').'</li>';
            $ddp_report .= '<li>'.__('Ask your hosting company to update the settings for you.', 'ddpro').'</li></ul>';
            $ddp_report .= '<input data-clipboard-action="copy" data-clipboard-target="#ddp-report-textarea" id="ddp-copy-report" type="button" value="'.__('Copy Report to Clipboard', 'ddpro').'" class="button button-primary">';
            $ddp_report .= '<p id="ddp-success-report" class="notice notice-success" style="max-width: 235px; margin-top: 10px; margin-bottom: 0;">'.__('Done: Copied to clipboard', 'ddpro').'</p>';

            $ddp_report .= '<textarea readonly="readonly" id="ddp-report-textarea" name="ddp-report-textarea" style="width:0; height: 0; margin 0; padding: 0 !important; margin-top: -15px; position: absolute; z-index: -1; ">';
            $ddp_report .= '====== BEGIN REPORT ======' . "|";

            $ddp_report .= "|" . '--- PLUGIN: WPD VERSION ---' . "|";
            $ddp_report .= "|" . '--- WORDPRESS DATA ---' . "|";
            $ddp_report .= 'Multisite:' . " " . $ismulti . "|";
            $ddp_report .= 'SITE_URL:' . " " . site_url() . "|";
            $ddp_report .= 'HOME_URL:' . " " . home_url() . "|";
            $ddp_report .= 'WP Version:' . " " . get_bloginfo('version') . "|";
            $ddp_report .= 'Permalink:' . " " . get_option('permalink_structure') . "|";
            $ddp_report .= 'Current Theme:' . " " . $theme . "|";
            $ddp_report .= 'Parent Theme:' . " " . $parent_theme . "|";

            $ddp_report .= "|" . '--- WORDPRESS CONFIG ---' . "|";
            $ddp_report .= 'WP_DEBUG:' . " " . $wpdebug . "|";
            $ddp_report .= 'WP Memory Limit:' . " " . $this->num_convt(WP_MEMORY_LIMIT) / (1024) . 'MB' . "|";
            $ddp_report .= 'jQuery Version:' . " " . $jquchk . "|";
            $ddp_report .= 'Site Language:' . " " . $site_lang . "|";
            $ddp_report .= 'Site Charset:' . " " . $site_char . "|";
            $ddp_report .= 'Site Text Direction:' . " " . $site_text_dir . "|";

            if (is_multisite()):
                $ddp_report .= "|" . '--- MULTISITE INFORMATION ---' . "|";
                $ddp_report .= 'Total Sites:' . " " . get_blog_count() . "|";
                $ddp_report .= 'Base Site:' . " " . $ms_sites[0]['domain'] . "|";
                $ddp_report .= 'All Sites:' . "|";
                foreach ($ms_sites as $site):
                    if ($site['path'] != '/')
                        $ddp_report .= " " . '- ' . $site['domain'] . $site['path'] . "|";
                endforeach;
                $ddp_report .= "|";
            endif;

            $ddp_report .= "|" . '--- SERVER DATA ---' . "|";
            $ddp_report .= 'PHP Version:' . " " . PHP_VERSION . "|";
            if(isset($_SERVER['SERVER_SOFTWARE'])) $ddp_report .= 'Server Software:' . " " . sanitize_text_field($_SERVER['SERVER_SOFTWARE']) . "|";

            $ddp_report .= "|" . '--- PHP CONFIGURATION ---' . "|";
            $ddp_report .= 'Safe Mode:' . " " . $safemode . "|";
            $ddp_report .= 'memory_limit:' . " " . ini_get('memory_limit') . "|";
            $ddp_report .= 'upload_max_filesize:' . " " . ini_get('upload_max_filesize') . "|";
            $ddp_report .= 'post_max_size:' . " " . ini_get('post_max_size') . "|";
            $ddp_report .= 'max_execution_time:' . " " . ini_get('max_execution_time') . "|";
            $ddp_report .= 'max_input_vars:' . " " . ini_get('max_input_vars') . "|";
            $ddp_report .= 'max_input_time:' . " " . ini_get('max_input_time') . "|";
            $ddp_report .= 'Display Errors:' . " " . $errdisp . "|";
            $ddp_report .= 'Cookie Path:' . " " . esc_html(ini_get('session.cookie_path')) . "|";
            $ddp_report .= 'Save Path:' . " " . esc_html(ini_get('session.save_path')) . "|";
            $ddp_report .= 'Use Cookies:' . " " . $usecck . "|";
            $ddp_report .= 'cURL:' . " " . $hascurl . "|";
            $ddp_report .= 'OpenSSL:' . " " . $openssl . "|";

            $ddp_report .= "|" . '--- PLUGIN INFORMATION ---' . "|";
            if ($plugins && $mu_plugins):
                $ddp_report .= 'Total Plugins:' . " " . (count($plugins) + count($mu_plugins) + count($nt_plugins)) . "|";
            endif;

            // output must-use plugins
            if ($mu_plugins):
                $ddp_report .= 'Must-Use Plugins: (' . count($mu_plugins) . ')' . "|";
                foreach ($mu_plugins as $mu_path => $mu_plugin):
                    $ddp_report .= "\t" . '- ' . $mu_plugin['Name'] . ' ' . $mu_plugin['Version'] . "|";
                endforeach;
                $ddp_report .= "|";
            endif;

            // output active plugins
            if ($plugins):
                $ddp_report .= 'Active Plugins: (' . count($active) . ')' . "|";
                foreach ($plugins as $plugin_path => $plugin):
                    if (!in_array($plugin_path, $active))
                        continue;
                    $ddp_report .= "\t" . '- ' . $plugin['Name'] . ' ' . $plugin['Version'] . "|";
                endforeach;
                $ddp_report .= "|";
            endif;

            // output inactive plugins
            if ($plugins):
                $ddp_report .= 'Inactive Plugins: (' . (count($plugins) - count($active)) . ')' . "|";
                foreach ($plugins as $plugin_path => $plugin):
                    if (in_array($plugin_path, $active))
                        continue;
                    $ddp_report .= "\t" . '- ' . $plugin['Name'] . ' ' . $plugin['Version'] . "|";
                endforeach;
                $ddp_report .= "|";
            endif;

            // end it all
            $ddp_report .= "|" . '====== END REPORT ======';


            $ddp_report_for_email = strstr($ddp_report, '====== BEGIN REPORT ======');
            //echo  $ddp_report_for_email;
            $GLOBALS[ 'ddp_report_for_email'] = $ddp_report_for_email;
            $ddp_report .= '</textarea>';

            $ddp_warning_status = '<td class="ddp_warning"><span>'.__('Warning', 'ddpro').'</span></td>';
            $ddp_ok_status      = '<td class="ddp_ok"><span>'.__('OK', 'ddpro').'</span></td>';

            $ddp_report_table = '';

            $ddp_report_table .= '<table class="ddp-report-table"><tr><th colspan="4">'.__('Server Environment', 'ddpro').'</th><tr class="ddp-header-row"><td>'.__('Config Option', 'ddpro').'</td><td>'.__('Recommended Value', 'ddpro').'</td><td>'.__('Actual Value', 'ddpro').'</td><td>'.__('Status', 'ddpro').'</td></tr>';

            $ddp_report_table .= '<tr><td>'.__('PHP Version', 'ddpro').'</td><td>7.2+</td><td>' . PHP_VERSION . '</td>';
            if ((int) substr(str_replace(".", "", PHP_VERSION), 0, 2) >= 72)
                $ddp_php_status = $ddp_ok_status;
            else
                $ddp_php_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_php_status . '</tr>';

            if(isset($_SERVER['SERVER_SOFTWARE'])) $ddp_report_table .= '<tr><td>'.__('Server Software', 'ddpro').'</td><td>-</td><td>' . sanitize_text_field($_SERVER['SERVER_SOFTWARE']) . '</td>' . $ddp_ok_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('Safe Mode', 'ddpro').'</td><td>'.__('No', 'ddpro').'</td><td>' . $safemode . '</td>';
            if ($safemode == 'No')
                $ddp_safe_mode_status = $ddp_ok_status;
            else
                $ddp_safe_mode_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_safe_mode_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('memory_limit', 'ddpro').'</td><td>256+ MB</td><td>' . ini_get('memory_limit') . 'B</td>';
            if ((int) str_replace("M", "", ini_get('memory_limit')) >= 256)
                $ddp_memory_limit_status = $ddp_ok_status;
            else
                $ddp_memory_limit_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_memory_limit_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('post_max_size', 'ddpro').'</td><td>128+ MB</td><td>' . ini_get('post_max_size') . 'B</td>';
            if ((int) str_replace("M", "", ini_get('post_max_size')) >= 128)
                $ddp_post_max_size_status = $ddp_ok_status;
            else
                $ddp_post_max_size_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_post_max_size_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('max_execution_time', 'ddpro').'</td><td>180+</td><td>' . ini_get('max_execution_time') . '</td>';
            if ((int) ini_get('max_execution_time') >= 180)
                $ddp_max_execution_time_status = $ddp_ok_status;
            else
                $ddp_max_execution_time_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_max_execution_time_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('upload_max_filesize', 'ddpro').'</td><td>64+ MB</td><td>' . ini_get('upload_max_filesize') . 'B</td>';
            if ((int) str_replace("M", "", ini_get('upload_max_filesize')) >= 64)
                $ddp_upload_max_status = $ddp_ok_status;
            else
                $ddp_upload_max_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_upload_max_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('max_input_time', 'ddpro').'</td><td>180+</td><td>' . ini_get('max_input_time') . '</td>';
            if ((int) ini_get('max_input_time') >= 180)
                $ddp_max_input_time_status = $ddp_ok_status;
            else
                $ddp_max_input_time_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_max_input_time_status . '</tr>';

            $ddp_report_table .= '<tr><td>max_input_vars</td><td>3000+</td><td>' . ini_get('max_input_vars') . '</td>';
            if ((int) ini_get('max_input_vars') >= 3000)
                $ddp_max_input_vars_status = $ddp_ok_status;
            else
                $ddp_max_input_vars_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_max_input_vars_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('Display Errors', 'ddpro').'</td><td>'.__('Off', 'ddpro').'</td><td>' . $errdisp . '</td>';
            if ($errdisp == 'Off')
                $ddp_display_errors_status = $ddp_ok_status;
            else
                $ddp_display_errors_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_display_errors_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('Cookie Path', 'ddpro').'</td><td>-</td>' . '<td>' . esc_html(ini_get('session.cookie_path')) . '</td>' . $ddp_ok_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('Save Path', 'ddpro').'</td><td>-</td>' . '<td>' . esc_html(ini_get('session.save_path')) . '</td>' . $ddp_ok_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('Use Cookies', 'ddpro').'</td><td>On</td><td>' . $usecck . '</td>';
            if ($usecck == 'On')
                $ddp_use_cookies_status = $ddp_ok_status;
            else
                $ddp_use_cookies_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_use_cookies_status . '</tr>';

            $ddp_report_table .= '<tr><td>cURL</td><td>'.__('Supports cURL', 'ddpro').'</td><td>' . $hascurl . '</td>';
            if ($hascurl == 'Supports cURL.')
                $ddp_curl_status = $ddp_ok_status;
            else
                $ddp_curl_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_curl_status . '</tr>';

            $ddp_report_table .= '<th colspan="4">'.__('WordPress Environment', 'ddpro').'</th></tr><tr class="ddp-header-row"><td>'.__('Config Option', 'ddpro').'</td><td>'.__('Recommended Value', 'ddpro').'</td><td>'.__('Actual Value', 'ddpro').'</td><td>'.__('Status', 'ddpro').'</td></tr>';
            $ddp_report_table .= '<tr><td>'.__('Multisite', 'ddpro').'</td><td>-</td>';
            $ddp_report_table .= '<td>' . $ismulti . '</td>' . $ddp_ok_status . '</tr>';
            $ddp_report_table .= '<td>'.__('Site url', 'ddpro').'</td><td>-</td>' . '<td>' . site_url() . '</td>' . $ddp_ok_status . '</tr>';
            $ddp_report_table .= '<td>'.__('Home url', 'ddpro').'</td><td>-</td>' . '<td>' . home_url() . '</td>' . $ddp_ok_status . '</tr>';
            $ddp_report_table .= '<td>'.__('WP Version', 'ddpro').'</td><td>4.2+</td><td>' . get_bloginfo('version') . '</td>';
            if ((int) str_replace(".", "", get_bloginfo('version')) < 42) {
                $wp_version_status = $ddp_warning_status;
            } else {
                $wp_version_status = $ddp_ok_status;
            }
            $ddp_report_table .= $wp_version_status . '</tr>';

            $ddp_report_table .= '<td>'.__('Permalink', 'ddpro').'</td><td>-</td>' . '<td>' . get_option('permalink_structure') . '</td>' . $ddp_ok_status . '</tr><tr>';
            $ddp_report_table .= '<td>'.__('Current Theme', 'ddpro').'</td><td>-</td>' . '<td>' . $theme . '</td>' . $ddp_ok_status . '</tr><tr>';

            $ddp_report_table .= '<td>'.__('Parent Theme', 'ddpro').'</td><td>Divi 3.7+</td>' . '<td>' . $parent_theme . '</td>';
            if ($style_parent_theme->get('Name') != 'Divi' || (int) str_replace(".", "", $style_parent_theme->get('Version')) < 37) {
                $wp_parent_theme_status = $ddp_warning_status;
            } else {
                $wp_parent_theme_status = $ddp_ok_status;
            }
            $ddp_report_table .= $wp_parent_theme_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('WP debug', 'ddpro').'</td><td>'.__('Disabled', 'ddpro').'</td><td>' . $wpdebug . '</td>';
            if ($wpdebug == 'Disabled')
                $ddp_wpdebug_status = $ddp_ok_status;
            else
                $ddp_wpdebug_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_wpdebug_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.__('WP Memory Limit', 'ddpro').'</td><td>30+ MB</td><td>' . $this->num_convt(WP_MEMORY_LIMIT) / (1024) . ' MB</td>';
            if ($this->num_convt(WP_MEMORY_LIMIT) / (1024) > 30)
                $ddp_wp_memory_status = $ddp_ok_status;
            else
                $ddp_wp_memory_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_wp_memory_status . '</tr>';

            $ddp_report_table .= '<tr><td>'.'jQuery Version'.'</td><td>1.1.0+</td><td>' . $jquchk . '</td>';
            if ((int) str_replace(".", "", $jquchk) >= 110)
                $ddp_jquery_status = $ddp_ok_status;
            else
                $ddp_jquery_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_jquery_status . '</tr>';

            $ddp_report_table .= '<td>'.__('Site Language', 'ddpro').'</td><td>-</td>' . '<td>' . $site_lang . '</td>' . $ddp_ok_status . '</tr><tr>';

            $ddp_report_table .= '<td>'.__('Site Charset', 'ddpro').'</td><td>-</td>' . '<td>' . $site_char . '</td>' . $ddp_ok_status . '</tr><tr>';

            $ddp_report_table .= '<td>'.__('Site Text Direction', 'ddpro').'</td><td>ltr (left-to-right)</td>' . '<td>' . $site_text_dir . '</td>';

            if ($site_text_dir == 'ltr')
                $ddp_mtd_status = $ddp_ok_status;
            else
                $ddp_mtd_status = $ddp_warning_status;
            $ddp_report_table .= $ddp_mtd_status . '</tr>';


            // multisite info
            if (is_multisite()):
                $ddp_report_table .= '<th colspan="4">'.__('Multisite', 'ddpro').'</th></tr><tr class="ddp-header-row"><td>'.__('Config Option', 'ddpro').'</td><td>'.__('Recommended Value', 'ddpro').'</td><td>'.__('Actual Value', 'ddpro').'</td><td>'.__('Status', 'ddpro').'</td></tr>';
                $ddp_report_table .= '<tr><td>'.__('Total Sites', 'ddpro').'</td><td>-</td>';
                $ddp_report_table .= '<td>' . get_blog_count() . '</td>' . $ddp_ok_status . '</tr>';
                $ddp_report_table .= '<td>'.__('Base Site', 'ddpro').'</td><td>-</td>' . '<td>' . $ms_sites[0]['domain'] . '</td>' . $ddp_ok_status . '</tr>';
                $ddp_report_table .= '<td colspan="2">'.__('All Sites', 'ddpro').'</td>' . '<td colspan="2">';
                foreach ($ms_sites as $site):
                    if ($site['path'] != '/') {
                        $ddp_report_table .= $site['domain'];
                        $ddp_report_table .= $site['path'];
                        $ddp_report_table .= "<br/>";
                    }
                endforeach;
                $ddp_report_table .= '</td></tr>';
            endif; // is_multisite()

            // output active plugins
            if ($plugins):
                $ddp_report_table .= '<th colspan="4">'.__('Active plugins', 'ddpro').'</th>';

                $ddp_report_table .= '<tr><td colspan="2">';
                $ddp_report_table .= count($active);
                $ddp_report_table .= __(' active plugins', 'ddpro').'</td><td colspan="2">';
                foreach ($plugins as $plugin_path => $plugin):
                    if (!in_array($plugin_path, $active))
                        continue;
                    $ddp_report_table .= $plugin['Name'];
                    $ddp_report_table .= ' ';
                    $ddp_report_table .= $plugin['Version'];
                    $ddp_report_table .= "<br>";
                endforeach;
                $ddp_report_table .= '</td></tr>';
            endif;

            // output inctive plugins
            if ($plugins):
                $ddp_report_table .= '<th colspan="4">'.__('Inactive Plugins', 'ddpro').'</th>';

                $ddp_report_table .= '<tr><td colspan="2">';
                $ddp_report_table .= count($plugins) - count($active);
                $ddp_report_table .= __(' inactive plugins', 'ddpro').'</td><td colspan="2">';
                foreach ($plugins as $plugin_path => $plugin):
                    if (in_array($plugin_path, $active))
                        continue;
                    $ddp_report_table .= $plugin['Name'];
                    $ddp_report_table .= ' ';
                    $ddp_report_table .= $plugin['Version'];
                    $ddp_report_table .= "<br>";
                endforeach;
                $ddp_report_table .= '</td></tr></table>';
            endif;

            if (strpos($ddp_report_table, $ddp_warning_status) !== false) {
                $class   = 'notice notice-warning is-dismissible';
                $message = '<strong>'.__('Action Required:', 'ddpro').'</strong> '.__('Please review', 'ddpro').' ';
                $message .= DDP_NAME;
                $message .= ' '.__('Plugin system status report. A settings update may be required for best results.', 'ddpro').' <a href=?page=' . $this->ame_activation_tab_key . '&tab=ddp_assistant_system_status>'.__('Go to system status tab', 'ddpro').'</a>.';

                if ($warning_flag == 1 && PAnD::is_admin_notice_active('disable-ddp-status-report-notice-forever') &&  get_option('ddp_wl') !== 'enabled')
                    printf('<div data-dismissible="disable-ddp-status-report-notice-forever" class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses($message, ddp_allowed_html()));
            }
            $ddp_report_end = '</div>'; // ddp-column-first
            $ddp_report_end = '</div>'; // ddp-columns
            $ddp_report_end .= '</div>'; // ddp-system-status-dash

            return $ddp_report . $ddp_report_table . $ddp_report_end;
        }

        public function ddp_getting_started()
        {
            if ($this->ddp_return_subscription_status() == 1) { // CHANGE TO 1
                update_option('ddp_subscription_on_hold', 'no');
                update_option('ddp_enable', 'enabled');
            }
            else {
                update_option('ddp_subscription_on_hold', 'yes');
                update_option('ddp_enable', 'disabled');
            }
            $ddp_starting = '';
            $ddp_status = get_option('ddp_enable');
            if ($ddp_status === 'enabled') {
                    $ddp_starting .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/search-everything-api-yjdwe3/"></iframe><div class="saving_message"><h3 class="sectionSaved"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div><span style="display: block !important;">'.__('Taking too long? Try downloading the layout instead, and upload it using Divi Library.', 'ddpro').'</span></h3><span class="close">&#x2715;</span></div><div class="loaded_message"><h3 class="sectionSaved">'.__('Success! Saved to Divi Library', 'ddpro').'<br>'.__('The layout or section has been saved to your Divi Library.', 'ddpro').'<br>'.__('Use the "Add From Library" tab in Divi Builder to load it onto a new page.', 'ddpro').'</h3><span class="close">&#x2715;</span></div>';
            }
            else {
                $ddp_starting .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/search-everything-no-api-ewqr5423/"></iframe><div class="saving_message"><h3 class="sectionSaved"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></h3><span class="close">&#x2715;</span></div><div class="loaded_message"><h3 class="sectionSaved">'.__('Success! Saved to Divi Library<br>The layout or section has been saved to your Divi Library.<br>Use the "Add From Library" tab in Divi Builder to load it onto a new page.', 'ddpro').'</h3><span class="close">&#x2715;</span></div>';
            }
            return $ddp_starting;
        }

        public function ddp_css_changer_files() {
            echo '<div class="ddp-custom-css-dash">';
            echo '<div class="ddp-columns">';
            echo '<div class="ddp-first-column">';
            echo '<h2>'.esc_html__('What Are Custom CSS Files?', 'ddpro').'</h2>';
            echo '<p>'.esc_html__('Some Divi Den Pro modules use custom CSS coding for advanced animations and hover effects. With Divi, it’s the only way to make our unique designs. Watch the video for full details.', 'ddpro').'<p>';
            echo '<iframe width="560" height="315" src="https://seku.re/ddp-advanced-updates" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe>';
            echo '<p>'.esc_html__('To find specific CSS rules, search for the module name like “Square Reveal Blog”. Next copy the CSS rule > change the rule/code as required > paste the code into the Custom CSS box on the “page” or under Divi theme settings Custom CSS box.', 'ddpro').'</p>';
            echo '</div>';
            echo '<div class="ddp-second-column">';
            echo '<h2>'.esc_html__('Open File In Browser Window', 'ddpro').'</h2>';
            echo '<div class="ddp-custom-css-files">';
            echo '<div class="ddp-custom-css-files-col-1">';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/tina-master-css">Tina</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/freddie-master-css">Freddie</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/diana-master-css">Diana</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/coco-master-css">Coco</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/pegasus-master-css">Pegasus</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/pixie-master-css">Pixie</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/jamie-master-css">Jamie</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/impi-master-css">Impi</a><br>';
            echo '<div class="clearfix"></div>';
            echo '</div>';
            echo '<div class="ddp-custom-css-files-col-2">';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/ragnar-master-css">Ragnar</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/falkor-master-css">Falkor</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/sigmund-master-css">Sigmund</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/mermaid-master-css">Mermaid</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/unicorn-master-css">Unicorn</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/mozart-master-css">Mozart</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/jackson-master-css">Jackson</a><br>';
            echo '<div class="clearfix"></div>';
            echo '<img class="ddp-open-css-img" src="'.esc_url(plugin_dir_url(__FILE__)).'/include/ddp-open.png" alt="'.esc_html__('Open CSS File', 'ddpro').'"/>';
            echo '<a class="ddp-css-link" target="_blank"  href="https://seku.re/venus-master-css">Venus</a><br>';
            echo '<div class="clearfix"></div>';
            echo '</div>'; //ddp-custom-css-files-col-2
            echo '</div>'; //ddp-custom-css-files
            echo '</div>'; //ddp-second-column
            echo '</div>'; //ddp-columns
            echo '</div>'; //ddp-custom-css-dash

        }

    public function ddp_settings_function() {

        // determinate the state of each option
        function ddp_get_option_state($option) {
            $ddp_option_template = get_option($option);
            $return_value = '<script>(function ($) {
                $(".ddp-archive-settings .et-epanel-box select#';
            $return_value .= $option;
            $return_value .= ' option[value=';
             $return_value .= $ddp_option_template;
            $return_value .= ']").prop("selected", true);';
            $return_value .=  '})(jQuery);</script>';
            return $return_value;
        }

        $ddp_settings_content = '<div class="divi-button ddp-php-templates ddp-sub-tab-dash">';
        $ddp_settings_content .=  '<div class="ddp-columns">';
        $ddp_settings_content .=  '<div class="ddp-first-column">';
        $ddp_settings_content .= '<p>'.__('Divi Den Pro comes with built-in theme builder functionality. It uses the native WordPress customizer to add premade templates like blog archive pages (category, tag, author), navigation menus, sticky bars, pop-ups and more. Get started by first saving the templates you want. Then launch the WordPress customizer to edit and publish.', 'ddpro').' <a href="';
        if (get_option('ddp_wl') == 'enabled') {
                $ddp_settings_content .= admin_url( 'admin.php?page='.DDP_LINK.'_dashboard_wl&tab=ddp_start_here#ddp-theme-builder' );
            }
            else $ddp_settings_content .= admin_url( 'admin.php?page=divi_den_pro_dashboard&tab=ddp_start_here#ddp-theme-builder' );
        $ddp_settings_content .=  '">'.__('View tutorial', 'ddpro').'</a></p>';

        $ddp_settings_content .= '<div class="clearfix"></div><a class="button button-primary" href="';

        $ddp_settings_content .= get_admin_url();
        $ddp_settings_content .='customize.php">'.__('Launch WordPress Customizer', 'ddpro').'</a><div class="clearfix"></div>';

        $ddp_status = get_option('ddp_enable');


        if($ddp_status === 'enabled') {
            $ddp_settings_content .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/new-api-search-php-templates-ewr2343/" style="margin-top: 20px; border: 1px solid #bbb;"></iframe><div class="saving_message"><h3 class="sectionSaved"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></h3><span class="close">&#x2715;</span></div><div class="loaded_message"><h3 class="sectionSaved">'.__('Success! Saved to Divi Library<br>The layout or section has been saved to your Divi Library.<br>Use the "Add From Library" tab in Divi Builder to load it onto a new page.', 'ddpro').'</h3><span class="close">&#x2715;</span></div><div class="clearfix"></div></div></div>';
        }

        else {
            $ddp_settings_content .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/new-no-api-search-php-templates-perb904/" style="margin-top: 20px; border: 1px solid #bbb;"></iframe><div class="clearfix"></div>';
        }

        $ddp_settings_content .= '</div></div>';
        return $ddp_settings_content;
        } // ddp_settings_function

    public function ddp_divi_theme_builder_function() {
        // determinate the state of each option
        function ddp_get_option_state($option) {
            $ddp_option_template = get_option($option);
            $return_value = '<script>(function ($) {
                $(".ddp-archive-settings .et-epanel-box select#';
            $return_value .= $option;
            $return_value .= ' option[value=';
             $return_value .= $ddp_option_template;
            $return_value .= ']").prop("selected", true);';
            $return_value .=  '})(jQuery);</script>';
            return $return_value;
        }

       $ddp_divi_theme_builder_content = '<div class="divi-button ddp_divi_theme_builder ddp-php-templates ddp-sub-tab-dash">';
        $ddp_divi_theme_builder_content .=  '<div class="ddp-columns">';
        $ddp_divi_theme_builder_content .=  '<div class="ddp-first-column">';
        $ddp_divi_theme_builder_content .= '<p>'.__('Divi Theme Builder takes the power of the Divi builder and extends it to all areas of the Divi Theme. Build custom headers, footers, category pages, product templates, blog post templates, 404 pages and more. The Divi Den Pro library contains many premade templates for Divi Theme Builder. Get started by first downloading the templates you want. Then launch the Divi > Theme Builder to import, edit and assign.', 'ddpro').' <a target="_blank" href="';
        if (get_option('ddp_wl') == 'enabled') {
                 $ddp_divi_theme_builder_content .= admin_url( 'admin.php?page='.DDP_LINK.'_dashboard_wl&tab=ddp_start_here#ddp-divi-theme-builder' );
            }
            else  $ddp_divi_theme_builder_content .= admin_url( 'admin.php?page=divi_den_pro_dashboard&tab=ddp_start_here#ddp-divi-theme-builder' );
         $ddp_divi_theme_builder_content .=  '">'.__('View tutorial', 'ddpro').'</a></p>';

        $ddp_divi_theme_builder_content .= '<div class="clearfix"></div><a class="button button-primary" href="';

        $ddp_divi_theme_builder_content .= get_admin_url();
        $ddp_divi_theme_builder_content .='admin.php?page=et_theme_builder">'.__('Launch Divi Theme Builder', 'ddpro').'</a><div class="clearfix"></div>';

        $ddp_status = get_option('ddp_enable');


        if($ddp_status === 'enabled') {
            $ddp_divi_theme_builder_content .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/new-download-divi-theme-builder-templates-search-44rdfhfghw/" style="margin-top: 20px; border: 1px solid #bbb;"></iframe><div class="saving_message"><h3 class="sectionSaved"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></h3><span class="close">&#x2715;</span></div><div class="loaded_message"><h3 class="sectionSaved">'.__('Success! Saved to Divi Library<br>The layout or section has been saved to your Divi Library.', 'ddpro').'<br>'.__('Use the "Add From Library" tab in Divi Builder to load it onto a new page.', 'ddpro').'</h3><span class="close">&#x2715;</span></div><div class="clearfix"></div></div></div>';
        }

        else {
            $ddp_divi_theme_builder_content .= '<iframe id="ondemanIframe" name="ondemandIframe" class="settingsIframe" src="https://ondemand.divi-den.com/new-try-for-free-divi-theme-builder-templates-search-454qwgj/" style="margin-top: 20px; border: 1px solid #bbb;"></iframe><div class="clearfix"></div>';
        }

        $ddp_divi_theme_builder_content .= '</div></div>';

        return $ddp_divi_theme_builder_content;
     }

     public function ddp_latest_feed_function() {
        include_once(ABSPATH . WPINC . '/feed.php');
        if(function_exists('fetch_feed')) {
            $rss_feed = fetch_feed('https://wp-den.com/category/blog/feed/'); // this is the external website's RSS feed URL
            if (!is_wp_error($rss_feed)) : $rss_feed->init();
            $rss_feed->set_output_encoding('UTF-8'); // this is the encoding parameter, and can be left unchanged in almost every case
            $rss_feed->handle_content_type(); // this double-checks the encoding type
           // $rss_feed->enable_cache(false);
            $rss_feed->set_cache_duration(21600); // 21,600 seconds is six hours
            $limit = $rss_feed->get_item_quantity(12); // fetches the 18 most recent RSS feed stories
            $items = $rss_feed->get_items(0, $limit); // this sets the limit and array for parsing the feed
            endif;
        }
        $ddp_latest_feed_content = '<div class="divi-button ddp_divi_latest_feed">';
        $ddp_latest_feed_content .=  '<div class="ddp-columns">';
        $ddp_latest_feed_content .=  '<div class="ddp-first-column">';
        $blocks = $items;
        foreach ($blocks as $block) {
            $ddp_feed_link = $block->get_link();
            $ddp_latest_feed_content .= '<div class="ddp-latest-feed-item"><a href="';
            $ddp_latest_feed_content .= $ddp_feed_link;
            $ddp_latest_feed_content .= '" target="_blank" title="'.__('Open in a new tab', 'ddpro').'">';
            $ddp_latest_feed_content .= '<h3>';
            $ddp_latest_feed_content .=  $block->get_title();
            $ddp_latest_feed_content .= '</h3>';
            $ddp_latest_feed_content .= '<div class="feed-description">';
            $ddp_latest_feed_content .=  $block->get_description();
            $ddp_latest_feed_content .= '</div></a></div>';
        }

        $ddp_latest_feed_content .= '</div></div></div>';
        return $ddp_latest_feed_content;
     }

    public function ddp_options_function() {

        $ddp_options_content  =  '<div class="ddp-options-dash ddp-sub-tab-dash">';
        $ddp_options_content .=  '<div class="ddp-columns">';
        $ddp_options_content .=  '<div class="ddp-first-column">';
        $ddp_options_content .= '<div class="divi-button ddp-php-templates">';
        $ddp_options_content .= '<div class="ddp-plugin-setting"><p>'.__('Change the order in which the Divi Den Pro Library tab is displayed in the Divi Builder interface.', 'ddpro').'</p><p class="ddp_setting_description">'.__('This option gives priority to saved library items. This display order may be more convenient for some users.', 'ddpro').'</p>';
        $ddp_options_content .= '<input type="checkbox" id="ddp_plugin_setting_tab_position" name="ddp_plugin_setting_tab_position" value="';
        $ddp_options_content .=  get_option( 'ddp_plugin_setting_tab_position');
        $ddp_options_content .= '"/><label for="ddp_plugin_setting_tab_position" id="ddp_plugin_setting_tab_position_label">'.__('Move the Divi Den Pro tab into the last position.', 'ddpro').' <em>'.__('Default: Yes', 'ddpro').'</em></label><br/>';
        $ddp_options_content = $ddp_options_content.'<img class="ddp_setting_image" src="'.plugin_dir_url(__FILE__) . '/img/move-divi-den-pro-tab-into-last-position.jpg'.'" alt="move-divi-den-pro-tab-into-last-position">';
        $ddp_options_content .= '</div>';
        $ddp_options_content .= '</div>';  //ddp-first-column
        $ddp_options_content .= '</div>'; //ddp-columns
        $ddp_options_content .= '</div>'; //ddp-options-dash

        return $ddp_options_content;

     }

    public function ddp_assistant_help_faq() {
            $ddp_help_faq  =  '<div class="ddp-support-dash">';
            $ddp_help_faq .=  '<div class="ddp-columns">';
            $ddp_help_faq .=  '<div class="ddp-first-column">';
            $ddp_help_faq .=  '<h2>'.__('Product Support', 'ddpro').'</h2>';
            $ddp_help_faq .= '<a class="ddp-support-link" target="_blank" href="https://seku.re/ddpro-plugin-kb">';
            $ddp_help_faq .= '<span class="ddp-support-icon"><img src="';
            $ddp_help_faq .= plugin_dir_url(__FILE__);
            $ddp_help_faq .= '/img/support-icons/ddp-online-doc.png" alt="'.__('Online Documentation Icon', 'ddpro').'"/></span>';
            $ddp_help_faq .= '<h3>'.__('Online Documentation', 'ddpro').'</h3><p>'.__('Knowledge Base Articles', 'ddpro').'</p></a>';
            $ddp_help_faq .= '<div class="clearfix"></div>';

            $ddp_help_faq .= '<a class="ddp-support-link" target="_blank" href="https://seku.re/yt-tuts-divi-den-pro ">';
            $ddp_help_faq .= '<span class="ddp-support-icon"><img src="';
            $ddp_help_faq .= plugin_dir_url(__FILE__);
            $ddp_help_faq .= '/img/support-icons/ddp-video.png" alt="'.__('Video Icon', 'ddpro').'"/></span>';
            $ddp_help_faq .= '<h3>'.__('Support Videos', 'ddpro').'</h3><p>'.__('Browse Our Youtube Channel', 'ddpro').'</p></a>';
            $ddp_help_faq .= '<div class="clearfix"></div>';

            $ddp_help_faq .= '<a class="ddp-support-link" target="_blank" href="https://seku.re/never-miss-freebie">';
            $ddp_help_faq .= '<span class="ddp-support-icon"><img src="';
            $ddp_help_faq .= plugin_dir_url(__FILE__);
            $ddp_help_faq .= '/img/support-icons/ddp-newsletter.png" alt="'.__('Newsletter Icon', 'ddpro').'"/></span>';
            $ddp_help_faq .= '<h3>'.__('Never Miss a Freebie or Update', 'ddpro').'</h3><p>'.__('Newsletter Signup', 'ddpro').'</p></a>';
            $ddp_help_faq .= '<div class="clearfix"></div>';

            $ddp_help_faq .= '<a class="ddp-support-link" target="_blank" href="https://seku.re/fb-divi-den-pro">';
            $ddp_help_faq .= '<span class="ddp-support-icon"><img src="';
            $ddp_help_faq .= plugin_dir_url(__FILE__);
            $ddp_help_faq .= '/img/support-icons/ddp-social.png" alt="'.__('Like Icon', 'ddpro').'"/></span>';
            $ddp_help_faq .= '<h3>'.__('Let’s Get Social', 'ddpro').'</h3><p>'.__('Like our Facebook Page', 'ddpro').'</p></a>';
            $ddp_help_faq .= '<div class="clearfix"></div>';

            $ddp_help_faq .= '<a class="ddp-support-link" target="_blank" href="https://seku.re/wp-org-divi-den-free">';
            $ddp_help_faq .= '<span class="ddp-support-icon"><img src="';
            $ddp_help_faq .= plugin_dir_url(__FILE__);
            $ddp_help_faq .= '/img/support-icons/dd-free.svg" alt="'.__('Like Icon', 'ddpro').'"/></span>';
            $ddp_help_faq .= '<h3>'.__('Free Divi Layouts'.'</h3><p>', 'ddpro').__('Download the Divi Den Free Plugin from WordPress.org', 'ddpro').'</p></a>';
            $ddp_help_faq .= '<div class="clearfix"></div>';

            $ddp_help_faq .= '</div>'; //ddp-first-column
            $ddp_help_faq .=  '<div class="ddp-second-column">';
            $ddp_help_faq .= '<h2>'.__('Get Pro Support', 'ddpro').'</h2><h6 class="ddp-note">'.__('Tip: For CSS style issues like changing colors, font size, padding & margins etc. See ', 'ddpro').'<a href="/wp-admin/admin.php?page=divi_den_pro_dashboard&tab=ddp_css">'.__('Custom CSS', 'ddpro').'</a></h6><iframe id="supportIframe" class="ddp-support-frame" src="https://wp-den.com/plugin-dash-support-form-divi-den-pro/?systemreport=' . $GLOBALS['ddp_report_for_email'] . '"/></iframe>';
            $ddp_help_faq .= '</div>'; //ddp-second-column
            $ddp_help_faq .= '</div>'; //ddp-columns
            $ddp_help_faq .= '</div>'; //ddp-support-dash
            return $ddp_help_faq;
        }

         public function ddp_advanced()
        {
            return true;
        }

         public function ddp_theme_builder_function()
        {
            return true;
        }

        public function ddp_wl()
        {
            $ddp_wl =  '<div class="ddp-wl-dash ddp-sub-tab-dash">';
            $ddp_wl .=  '<div class="ddp-columns">';
            $ddp_wl .=  '<div class="ddp-first-column">';
            $ddp_wl .= '<h2>'.__('Advanced White Label Settings', 'ddpro').'</h2>';
            $ddp_wl .= '<iframe width="560" height="315" src="https://seku.re/ddp-white-label" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe>';
            $ddp_wl .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_wl .= '<div class="ddp-accordion-header">';
            $ddp_wl .= '<div class="et-epanel-box divi-button"><div class="et-box-title"><h3>'.__('Allow Plugin Update Notifications', 'ddpro').' <span>+</span></h3></div><div class="et-epanel-box divi-button"><div class="et-box-content"><input type="checkbox" class="et-checkbox yes_no_button" name="ddp_allow_upd" id="ddp_allow_upd" style="display: none;"';
            $ddp_option_wl = get_option('ddp_allow_upd');
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'checked="checked"';
            $ddp_wl .= '><div class="et_pb_yes_no_button ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'et_pb_on_state';
            else
                $ddp_wl .= 'et_pb_off_state';
            $ddp_wl .= '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.__('No', 'ddpro').'</span>
            </div></div><span class="ddp_default">'.__('Default: Yes', 'ddpro').'</span>';
            $ddp_wl .= '</div><div class="ddp-accordion-content"><p class="et-box-subtitle">'.__('Allow customers to run updates or not (consider this carefully). Activate this setting to show “update available” notifications if updates are available. Disable this setting to show nothing (even if updates are available). <i>Important:</i> An active Divi Den Pro subscription is required to get updates. If no active subscription is detected, no update notifications will be shown (even if this setting is active).', 'ddpro').'<br><a href="https://seku.re/GoPro" target="_blank">'.__('Activate your Pro Subscription to get updates again', 'ddpro').'</a></p></div></div>';
            $ddp_wl .= '</div></div>';

            $ddp_wl .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_wl .= '<div class="ddp-accordion-header">';
            $ddp_wl .= '<div class="et-epanel-box divi-button"><div class="et-box-title"><h3>'.__('Hide Plugin Name From Left-side Menu', 'ddpro').' <span>+</span></h3></div><div class="et-epanel-box divi-button"><div class="et-box-content"><input type="checkbox" class="et-checkbox yes_no_button" name="ddp_hide_menu" id="ddp_hide_menu" style="display: none;" ';
            $ddp_option_wl = get_option('ddp_hide_menu');
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'checked="checked"';
            $ddp_wl .= '><div class="et_pb_yes_no_button ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'et_pb_on_state';
            else
                $ddp_wl .= 'et_pb_off_state';
            $ddp_wl .= '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.__('No', 'ddpro').'</span>
            </div></div><span class="ddp_default">'.__('Default: No', 'ddpro').'</span>';
            $ddp_wl .= '</div><div class="ddp-accordion-content"><p class="et-box-subtitle">'.__('Use this option to make your plugin discoverable only from the plugins list.', 'ddpro').' </p><img src="';
            $ddp_wl .= plugin_dir_url(__FILE__);
            $ddp_wl .= '/img/hide-plugin-name-left-menu-thumbnail-ddpro.jpg" alt="'.__('Hide Plugin Name From Left-side Menu', 'ddpro').'"></div></div></div>';

            $ddp_wl .= '</div><div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_wl .= '<div class="ddp-accordion-header">';
            $ddp_wl .= '<div class="et-epanel-box divi-button"><div class="et-box-title"><h3>'.__('Hide Plugin Panels from Customizer', 'ddpro').' <span>+</span></h3></div><div class="et-box-content"><input type="checkbox" class="et-checkbox yes_no_button" name="ddp_hide_customizer" id="ddp_hide_customizer" style="display: none;" ';
            $ddp_option_wl = get_option('ddp_hide_customizer');
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'checked="checked"';
            $ddp_wl .= '><div class="et_pb_yes_no_button ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'et_pb_on_state';
            else
                $ddp_wl .= 'et_pb_off_state';
            $ddp_wl .= '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.__('No', 'ddpro').'</span>
            </div></div><span class="ddp_default">'.__('Default: No', 'ddpro').'</span></div><div class="ddp-accordion-content"><p class="et-box-subtitle">'.__('Use this option to hide plugin\'s panel from WordPress Customizer', 'ddpro').'</p><img src="';
            $ddp_wl .= plugin_dir_url(__FILE__);
            $ddp_wl .= '/img/hide-plugin-name-customizer-thumbnail-ddpro.jpg" alt="'.__('Hide Plugin Name From Left-side Menu', 'ddpro').'"></div>';

            $ddp_wl .= '</div></div><div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_wl .= '<div class="ddp-accordion-header">';
            $ddp_wl .= '<div class="et-epanel-box divi-button"><div class="et-box-title"><h3>'.__('Hide Elegant Themes Divi Premade Layouts Tab', 'ddpro').' <span>+</span></h3></div><div class="et-box-content"><input type="checkbox" class="et-checkbox yes_no_button" name="ddp_hide_premade" id="ddp_hide_premade" style="display: none;" ';
            $ddp_option_wl = get_option('ddp_hide_premade');
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'checked="checked"';
            $ddp_wl .= '><div class="et_pb_yes_no_button ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'et_pb_on_state';
            else
                $ddp_wl .= 'et_pb_off_state';
            $ddp_wl .= '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.__('No', 'ddpro').'</span>
            </div></div><span class="ddp_default">'.__('Default: No', 'ddpro').'</span></div><div class="ddp-accordion-content"><p class="et-box-subtitle">'.__('Don\'t show Elegant Themes free Premade layouts to WordPress admin users.', 'ddpro').'</p><img src="';
            $ddp_wl .= plugin_dir_url(__FILE__);
            $ddp_wl .= '/img/hide-divi-premade-layouts-tab-thumb-ddpro.jpg" alt="'.__('Hide Elegant Themes Divi Premade Layouts Tab', 'ddpro').'"></div><div class="clear"></div></div></div>';
            $ddp_wl .= '<p class="submit ddp_wl save_settings"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__('Save Settings Only', 'ddpro').'"><span class="fields_empty">'.__('One or more required fields are empty', 'ddpro').'</span></p>';
            $ddp_wl .= '<div class="clear"></div></div>'; // ddp-first-column

            $ddp_wl .= '<div class="ddp-second-column">';
            $ddp_wl .= '<div class="ddp_wl_settings"><h2>'.__('Branding and Naming', 'ddpro').'</h2>';
            $ddp_wl .= '<p>'.__('Use the white label options here to customise the Divi Den Pro plugin to match your brand. Create a good first impression with your customers.', 'ddpro').'</p>';
            $ddp_wl .= '<table class="form-table ddp_wl"><colgroup><col width="25%" /></colgroup><tr>
                            <th>'.__('Plugin Name (required)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('Choose a plugin name that matches your company or brand. Short names look better when displayed in the left-side WordPress menu.', 'ddpro').'</span><span style="font-weight: 500 !important;">'.__('Special characters (@#$%"&*\') are not allowed.', 'ddpro').'</span></th>
                            <td><label>
                    <input style="padding: 6px;" placeholder="';
            $ddp_wl .= DDP_NAME;
            $ddp_wl .= '" type="text" name="ddp_plugin_name" value="';
            $ddp_wl .= get_option('ddp_plugin_name');
            $ddp_wl .= '" />
                    </label></td>
                        </tr>
                        <tr>
                            <th>'.__('Plugin URL (required)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('WordPress requires all plugins to list an active link. You can link to your contact page for example or another page on your website.', 'ddpro').' <strong>'.__('This link must be different from the author url listed below.', 'ddpro').'</strong></span></th>
                            <td><label>
                    <input style="padding: 6px;" placeholder="https://plugin-url.com/" type="text" name="ddp_plugin_url" value="';
            $ddp_wl .= get_option('ddp_plugin_url');
            $ddp_wl .= '" />
                    </label></td>
                        </tr>
                        <tr>
                            <th>'.__('Plugin Icon (optional)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('This icon is displayed in the left-side menu.', 'ddpro').' <strong>'.'It must be 36px by 36px and a .png file with a transparent background.'.'</strong> '.__('You can use the default icon we made for you. Or upload your own.', 'ddpro').' </span></th>
                            <td><label>
                    <input style="padding: 6px;" placeholder="/wp-content/plugins/ddpro/include/ddp-icon.png" type="text" name="ddp_plugin_icon" value="';
            $ddp_wl .= get_option('ddp_plugin_icon');
            $ddp_wl .= '" />
                    </label></td>
                        </tr>
                        <tr>
                            <th>'.__('Plugin Author Name(required)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('Choose an author name that matches your company or brand. Short names generally look better. This name is displayed in the plugins list.', 'ddpro').'</span></th>
                            <td><label>
                    <input style="padding: 6px;" placeholder="Wp Den" type="text" name="ddp_plugin_author" value="';
            $ddp_wl .= get_option('ddp_plugin_author');
            $ddp_wl .= '" />
                    </label></td>
                        </tr>
                        <tr>
                            <th>'.__('Author URL (required)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('WordPress requires all plugins to list an active author link. Here you can link to your website homepage another page on your website.', 'ddpro').' <strong>'.__('This link must be different from the plugin url listed above.', 'ddpro').'</strong></span></th>
                            <td><label>
                    <input style="padding: 6px;" placeholder="https://author-url.com/" type="text" name="ddp_plugin_author_url" value="';
            $ddp_wl .= get_option('ddp_plugin_author_url');
            $ddp_wl .= '" />
                    </label></td>
                        </tr>
                        <tr>
                            <th>'.__('Write a Helpful Plugin Description (required)', 'ddpro').'<div class="ddp-info-icon"><span class="dashicons dashicons-info"></span></div><span>'.__('Here you can justify the purpose of this plugin. The description is displayed in the plugins list. Write the description in such a way that people understand what the plugin is for. And why they should not deactivate or delete the plugin. You can use the default description if you like. <strong>Maximum characters recommended: 400. Please do not use special characters like @#$%^&*', 'ddpro').'</strong></span></th>
                            <td><label>
                    <textarea style="padding: 6px; height: 130px;" placeholder="'.__('Companion plugin for Divi Theme layouts. Get the latest CSS/JavaScript code updates and fixes. Keeps everything running smooth and secure.', 'ddpro').'" name="ddp_plugin_desc">';
            $ddp_wl .= (stripslashes(html_entity_decode(get_option('ddp_plugin_desc'))));


            $ddp_wl .= '</textarea></label></td></tr><tr><td>';
            $ddp_wl .= '<p class="submit ddp_wl save_settings"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Settings Only"><span class="fields_empty">'.__('One or more required fields are empty', 'ddpro').'</span></p></td></tr>';
            $ddp_wl .= '</table>';
            $ddp_wl .= '<table class="form-table ddp_wl ddp_wl_home_screen"><colgroup><col width="25%" /></colgroup><tr><th><h2 style="margin-bottom: 0;">'.__('Customer Contact Page', 'ddpro').' </h2></th><td></td></tr>
            <tr id="wp-ddp-column"><th>'.__('Design Your White Label Plugin Homescreen', 'ddpro').' <span class="ddp-span-always-show">'.__('This is the home screen your customers will see when white label mode is activated. Only this page will be visible to them and nothing else. Use this page to add your logo, name, instructions or whatever you want to say.', 'ddpro').'</span></th><td>';
            $settings = array(
                'textarea_rows' => 10,
                'quicktags' => true
            );
            $ddp_wl .= wp_editor(stripslashes(html_entity_decode(get_option('ddp_wp_content'))), 'ddp_wp_content', $settings);
            $ddp_wl .= '</td><td class="ddp-save-buttons">';
            $ddp_wl .= '<p class="submit ddp_wl save_settings"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__('Save Settings Only', 'ddpro').'"><span class="fields_empty">'.__('One or more required fields are empty', 'ddpro').'</span></p>';
            $ddp_wl .='<input type="button" name="ddp-preview" id="ddp-preview" class="button button-primary" value="'.__('Preview the Homescreen', 'ddpro').'"/></td></tr></table>';
            $ddp_wl .= '</div>'; // ddp_wl_settings
            $ddp_wl .= '</div>'; // ddp-second-column


            $ddp_wl .= '<div class="ddp-third-column">';
            $ddp_option_wl = get_option('ddp_wl');
            $ddp_wl .= '<hr style="clear: both;"><div class="ddp_wl_text_2"><h2>'.__('Control White Label Mode', 'ddpro').'</h2><p><strong><i>'.__('What happens when I activate white label mode?', 'ddpro').'</i></strong></p><ul><li>'.__('All features, functions & layouts become hidden.', 'ddpro').'</li><li>'.__('Only the white label plugin homescreen is visible to website admins.', 'ddpro').'</li></ul><p><strong><i>'.__('How do I deactivate white label mode?', 'ddpro').'</i></strong></p><ul><li>'.__('Note that deactivating the Divi Den Pro plugin, does not deactivate white label mode. You must first use the secret admin url.', 'ddpro').'</li><li>'.__('The secret admin url is automatically generated by combining your chosen plugin name and a suffix "_wl".', 'ddpro').'</li><li>'.__('It looks like this (note the <strong>“_wl”</strong> at the end):', 'ddpro').'</li></ul></strong><p class="secret_url"><i><span class="new_admin_url"></span></i></p></div><br>';
            $ddp_wl .= '<p class="submit ddp_wl"><input id="submit_wl_pop_up" name="submit_wl" type="submit" class="button button-primary submit_wl ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'submit_wl_enabled" value="'.__('(ON) Deactivate White Label Mode', 'ddpro').'">';
            else $ddp_wl .= 'submit_wl_disabled" value="'.__('(OFF) Activate White Label Mode', 'ddpro').'">';
            $ddp_wl .= '<span class="fields_empty">'.__('One or more required fields are empty', 'ddpro').'</span></p>';
            $ddp_wl .= '<div class="ddp_wl_hidden"><div class="et-box-title"><h3>'.__('Activate White Label Mode', 'ddpro').'</h3></div><div class="et-epanel-box divi-button"><div class="et-box-content"><input type="checkbox" class="et-checkbox yes_no_button" name="ddp_wl" id="ddp_wl" style="display: none;"';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'checked="checked"';
            $ddp_wl .= '><div class="et_pb_yes_no_button ';

            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'et_pb_on_state';
            else
                $ddp_wl .= 'et_pb_off_state';
            $ddp_wl .= '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.__('No', 'ddpro').'</span>
            </div></div><span class="ddp_default">'.__('Default: No', 'ddpro').'</span></div></div>';

            // Submit pop-up
            $ddp_wl .= '<div id="ddp-wl-pop-up" class="ddp-preview-window"><div class="ddp_wl_contact_page">';
            $ddp_wl .= '<div id="ddp-wl-pop-up-close">&times;</div>';

            if ($ddp_option_wl !== 'enabled') {
                $ddp_wl .= '<h2>'.__('Confirm White Label Activation', 'ddpro').'</h2>';
                $ddp_wl .= '<h3>'.__('Step 1', 'ddpro').'</h3><p>'.__('Copy and save your secret admin url. You will need it later.', 'ddpro').'</p>';
                $ddp_wl .= '<p class="secret_url"><strong><span class="new_admin_url" id="new_admin_url"></span></strong></p>';
                $ddp_wl .= '<input data-clipboard-action="copy" data-clipboard-target="#new_admin_url" id="ddp-copy-url" type="button" value="'.__('Copy Url to Clipboard', 'ddpro').'" class="button button-primary">';
                $ddp_wl .= '<p id="ddp-success-url" class="notice notice-success" style="max-width: 235px; margin-top: 10px; margin-bottom: 0;">'.__('Done: Copied to clipboard', 'ddpro').'</p>';
                $ddp_wl .= '<br/><br/><br/><br/><h3>'.__('Step 2', 'ddpro').'</h3>';
            }
            else {
                $ddp_wl .= '<h2>'.__('Deactivate White Label Mode', 'ddpro').'</h2>';
                $ddp_wl .= '<p>'.__('Return the Divi Den Pro interface to its non-white-labelled state. All menus, features and layouts will become visible again to admin users.', 'ddpro').' </p>';
            }

            $ddp_wl .= '<p class="submit ddp_wl"><input type="submit" name="submit_wl" id="submit_wl" class="button button-primary submit_wl ';
            if ($ddp_option_wl == 'enabled')
                $ddp_wl .= 'submit_wl_enabled" value="'.__('Deactivate now', 'ddpro').'">';
            else $ddp_wl .= 'submit_wl_disabled" value="'.__('Activate now', 'ddpro').'">';
             $ddp_wl .= '<input type="button" id="ddp-wl-pop-up-close-cancel" class="button button-primary" value="'.__('Cancel', 'ddpro').'"/>';
            // Home Page Preview
            $ddp_wl .= '<div id="ddp-preview-window" class="ddp-preview-window"><div class="ddp_wl_contact_page"><div id="ddp-preview-close">&times;</div>';

            $ddp_wl .=  stripslashes(html_entity_decode(get_option('ddp_wp_content')));

            $ddp_wl .= '</div>'; //ddp-third-column
            $ddp_wl .= '</div>'; //ddp-columns
            $ddp_wl .= '</div>'; //ddp-support-dash
            $ddp_wl .=  '</div></div>';
            return $ddp_wl;
        } // public function ddp_wl()


        // Draw wl feedback/contact page
        public function ddp_wl_config_page()
        {  // echo 'ICON : <pre>'.get_option('ddp_plugin_icon').'</pre>';
            echo '<div class="ddp_wl_contact_page">';
            echo wp_kses(stripslashes(html_entity_decode(get_option('ddp_wp_content'))), $this->ddp_allowed_html());
            echo '</div>';
        }

       /**
 * Display activation on hold error notice
  */
public function ddp_subscription_on_hold_notice() {
        echo '<div class="notice notice-warning ddp-notice-on-hold"><p>' . esc_html__('Your Divi Den Pro Membership subscription is on hold. To restore access,  ', 'ddpro').'<a href="https://seku.re/wp-den-subscriptions" target="_blank">'.esc_html__('please reactivate your subscription', 'ddpro').'</a>' . '</p></div>';
    }

public function ddp_subscription_stopped_notice() {
        echo '<div class="notice notice-error"><p>' . esc_html__('Your License and API Key has been cancelled permanently. To get access to Divi Den Pro Layouts and Membership again, please', 'ddpro').' <a href="https://seku.re/divi-den-pro" target="_blank">'.esc_html__('buy a new subscription', 'ddpro').'</a>. '.esc_html__('You can still use Free Divi Layouts if you install the ', 'ddpro').'<a href="https://seku.re/divi-den-on-demand" target="_blank">'.esc_html__('Divi Den On Demand plugin', 'ddpro').'</a>.' . '</p></div>';
    }


        // Draw option page
        public function ddp_config_page()
        {
            $this->report_data($warning_flag = 1);

          if (get_option('ddp_wl') == 'enabled') $ddp_wl_tab_title = __('White Label Mode <span style="color: #76F546">(ON)</span>', 'ddpro');
            else $ddp_wl_tab_title = __('White Label Mode <span style="color: #FF2E72">(OFF)</span>', 'ddpro');

            $settings_tabs = array(
                'ddp_assistant_getting_started' => __('Layout Finder', 'ddpro'),
                'ddp_latest_feed' => __('Latest', 'ddpro'),
                'ddp_start_here' => __('Tutorials', 'ddpro'),
                'ddp_theme_builder' => __('Theme Builder', 'ddpro'),
                'ddp_css' => __('Custom CSS Files', 'ddpro'),
                'ddp_assistant_help_faq' => 'Support',
                'ddp_assistant_system_status' => __('System Status', 'ddpro'),
                $this->ame_activation_tab_key => __($this->ame_menu_tab_activation_title, 'ddpro'),
                'ddp_advanced' => __('Advanced', 'ddpro'),
                'ddp_divi_theme_builder' => __('Divi Theme Builder', 'ddpro'),
                'ddp_settings' => __('Plugin Theme Builder', 'ddpro'),
                'ddp_wl' => $ddp_wl_tab_title,
                'ddp_options' => __('More Options', 'ddpro'),
            );

            if($this->ddp_return_subscription_status() == 0){ // CHANGE TO 0
                 if(get_option('divi_den_pro_membership_activated') == 'Activated' && get_option('ddp_subscription_on_hold') == 'yes') {
                    update_option('ddp_enable', 'disabled');
                    add_action('admin_notices', $this->ddp_subscription_on_hold_notice());

                 }

                $settings_tabs_first = array('ddp_subscription_on_hold' => __('Subscription On Hold', 'ddpro'));
                $settings_tabs = $settings_tabs_first  + $settings_tabs;

            } // if($this->ddp_return_subscription_status() == 0)
            else {
                update_option('ddp_enable', 'enabled');
                update_option('ddp_subscription_on_hold', 'no');
            }

        $license_status       = $this->license_key_status();
            if (get_option('divi_den_pro_membership_activated') == 'Activated' && get_option('ddp_subscription_on_hold') == 'no') {
                if (isset($_GET['tab'])) // phpcs:ignore
                    $current_tab = $tab = sanitize_text_field($_GET['tab']); // phpcs:ignore
                else
                    $current_tab = $tab = 'ddp_assistant_getting_started';
            } else if (get_option('divi_den_pro_membership_activated') == 'Deactivated'){
                if (isset($_GET['tab'])) // phpcs:ignore
                    $current_tab = $tab = sanitize_text_field($_GET['tab']); // phpcs:ignore
                else
                    $current_tab = $tab = $this->ame_activation_tab_key;
            }
            else  if(get_option('ddp_subscription_on_hold') == 'yes' && empty($license_status['status_check'])) {
                if (isset($_GET['tab'])) // phpcs:ignore
                    $current_tab = $tab = sanitize_text_field($_GET['tab']); // phpcs:ignore
                else
                     $current_tab = $tab = 'ddp_subscription_on_hold';
                }
            else  if(get_option('ddp_subscription_on_hold') == 'yes' && isset($license_status['status_check']) && $license_status['status_check'] === 'inactive' &&  $license_status['data']['activations_remaining'] > 0) {
                if (isset($_GET['tab'])) // phpcs:ignore
                    $current_tab = $tab = sanitize_text_field($_GET['tab']); // phpcs:ignore
                else
                    $current_tab = $tab = 'divi_den_pro_dashboard';
            }
?>
            <div class='wrap ddp-assistant <?php
            echo esc_html(strtolower(get_option("divi_den_pro_membership_activated")));
            if( get_option('ddp_subscription_on_hold') === 'yes') echo ' on_hold';

            if(!empty($license_status['status_check']) && $license_status['status_check'] === 'inactive') echo ' inactive_on_hold';
?>'>
                <h1><img class="ddp-logo" src="<?php echo esc_url(plugin_dir_url(__FILE__)) . '/include/ddp-logo.svg'?>" alt="Divi Den Pro Logo"><span>Divi Den Pro</span>
                    <?php  if (get_option('ddp_wl') == 'enabled') { echo '<span class="notice notice-success ddp-wl-mode-active">'.esc_html__('STATUS: White label mode is active.', 'ddpro').' <a class="ddp-wl-mode-active-url" href=?page=' . esc_attr($this->ame_activation_tab_key_wl) . '&tab=ddp_wl>'.esc_html__('Change', 'ddpro').'</a></span>'; }?><a class="ddp-help-button" href="javascript:Userback.open();"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M364.3 267.3L259.5 252l-46.9-95.2c-4.2-8.5-12.4-12.8-20.7-12.8-8.2 0-16.3 4.2-20.5 12.8L124.5 252 19.7 267.3C.9 270-6.7 293.2 7 306.5l75.9 74-18 104.6C62.3 500 74.2 512 87.5 512c3.5 0 7.2-.8 10.7-2.7l93.8-49.4 93.8 49.4c3.5 1.8 7.1 2.7 10.6 2.7 13.3 0 25.2-11.9 22.7-26.9l-17.9-104.6 75.9-74c13.6-13.3 6-36.5-12.8-39.2zm-96.7 78.9l-18.1 17.6 4.3 24.9 9.4 54.5-48.9-25.7-22.3-11.8-22.4 11.8-48.9 25.7 9.4-54.5 4.3-24.9-18.1-17.6-39.7-38.7 54.8-8 25-3.6 11.2-22.6 24.4-49.6 24.4 49.6 11.2 22.6 25 3.6 54.8 8-39.8 38.7zM336 160l26.7-53.3L416 80l-53.3-26.7L336 0l-26.7 53.3L256 80l53.3 26.7L336 160zm144 32l-16-32-16 32-32 16 32 16 16 32 16-32 32-16-32-16z" style="fill: rgb(255, 255, 255);"></path></svg><span><?php echo esc_html__('Send Feedback', 'ddpro');?></span></a></h1>
            <h2 class="nav-tab-wrapper">
                    <?php
            foreach ($settings_tabs as $tab_page => $tab_name) {
                $active_tab = $current_tab == $tab_page ? 'nav-tab-active' : '';
                if (get_option('ddp_wl') == 'enabled')
                    echo '<a class="nav-tab ' . esc_attr($tab_page) . ' ' . esc_attr($active_tab) . '" href="?page=' . esc_attr($this->ame_activation_tab_key_wl) . '&tab=' . esc_attr($tab_page) . '">' . wp_kses($tab_name, $this->ddp_allowed_html()) . '</a>';
                else
                    echo '<a class="nav-tab ' . esc_attr($tab_page) . ' ' . esc_attr($active_tab) . '" href="?page=' . esc_attr($this->ame_activation_tab_key) . '&tab=' . esc_attr($tab_page) . '">' . wp_kses($tab_name, $this->ddp_allowed_html()) . '</a>';
            }
?>
                </h2>
                <form action='options.php' method='post'>
                    <div class="main">
        <?php
        if(isset($tab)) {
            if ($tab == $this->ame_activation_tab_key) {
               // echo 'divi_den_pro_membership_activated: '.get_option('divi_den_pro_membership_activated');
                if(get_option('divi_den_pro_membership_activated') == 'Deactivated'  && get_option('ddp_subscription_stopped') == 'yes') {
                    update_option('ddp_enable', 'disabled');
                    add_action('admin_notices', $this->ddp_subscription_stopped_notice());
                }

                settings_fields($this->ame_data_key);
                do_settings_sections($this->ame_activation_tab_key);
                submit_button(__('Register', 'ddpro'));
                if (get_option('divi_den_pro_membership_activated') == 'Activated') {
                    settings_fields($this->ame_deactivate_checkbox);
                    do_settings_sections($this->ame_deactivation_tab_key);
                    submit_button(__('Save Setttings', 'ddpro'));
                }
            } else if ($tab == 'ddp_assistant_system_status') {
                echo $this->report_data($warning_flag = 0); // phpcs:ignore
            } else if ($tab == 'ddp_assistant_getting_started' && get_option('divi_den_pro_membership_activated') == 'Activated') {
                echo wp_kses($this->ddp_getting_started(), ddp_allowed_html());
            } else if ($tab == 'ddp_assistant_help_faq') {
                echo wp_kses($this->ddp_assistant_help_faq(), ddp_allowed_html());
            } else if ($tab == 'ddp_wl' && get_option('divi_den_pro_membership_activated') == 'Activated') {
                echo $this->ddp_wl(); // phpcs:ignore
            }  else if ($tab == 'ddp_css' && get_option('divi_den_pro_membership_activated') == 'Activated') {
                $this->ddp_css_changer_files();
            } else if ($tab == 'ddp_subscription_on_hold') {
                echo wp_kses($this->ddp_subscription_on_hold(), ddp_allowed_html());
            } else if ($tab == 'ddp_start_here') {
                echo wp_kses($this->ddp_start_here_function(), ddp_allowed_html());
            } else if ($tab == 'ddp_divi_theme_builder') {
                echo wp_kses($this->ddp_divi_theme_builder_function(),ddp_allowed_html());
            } else if ($tab == 'ddp_settings') {
                echo wp_kses($this->ddp_settings_function(), ddp_allowed_html());
            } else if ($tab == 'ddp_options') {
                echo $this->ddp_options_function(); // phpcs:ignore
                //wp_kses($this->ddp_options_function(), ddp_allowed_html());
            }  else if ($tab == 'ddp_advanced') {

            } else if ($tab == 'ddp_theme_builder') {

            }  else if ($tab == 'ddp_latest_feed') {
                echo wp_kses($this->ddp_latest_feed_function(), ddp_allowed_html());
            }
        }

?>
                    </div>
                </form>
            </div>
            <?php
        }




        public function ddp_subscription_on_hold() {

            $ddp_sp = '';
            $ddp_sp .= '<div class="ddp_subscription_on_hold_page"><div class="ddp-columns"><div class="ddp-first-column"><h2>'.__('Your Divi Den Pro Subscription is on hold', 'ddpro').'</h2>';
            $ddp_sp .= '<p>'.__('To get access to new layouts, please reactivate your subscription', 'ddpro').'</p>';

            $ddp_sp = $ddp_sp.'<img src="'.plugin_dir_url(__FILE__) . '/include/ddp-paused.png'.'" alt="">';
            $ddp_sp .= '<h3>'.__('We Miss You Like Crazy', 'ddpro').'</h3>';
            $ddp_sp .= '<ul><li>'.__('While on hold - plugin security updates continue like normal, except if disabled by white label mode settings.', 'ddpro').'</li>';
            $ddp_sp .= '<li>'.__('New layouts & modules have been added - ', 'ddpro').'<a href="';
            if (get_option('ddp_wl') == 'enabled') {
                $ddp_sp .= admin_url( 'admin.php?page='.DDP_LINK.'_dashboard_wl&tab=ddp_assistant_getting_started' );
            }
            else $ddp_sp .= admin_url( 'admin.php?page=divi_den_pro_dashboard&tab=ddp_assistant_getting_started' );
            $ddp_sp .= '">'.__('browse layouts', 'ddpro').'</a></li></ul>';
            $ddp_sp .= '<a href="https://seku.re/wp-den-subscriptions" target="_blank" class="button button-primary">'.__('Reactivate For Full Access', 'ddpro').'</a></div></div></div>';

            return $ddp_sp;
        }



        // Register settings
        public function load_settings()
        {
            register_setting($this->ame_data_key, $this->ame_data_key, array(
                $this,
                'validate_options'
            ));
            // API Key

            add_settings_section($this->ame_api_key, __('API Key', 'ddpro'), array(
                $this,
                'wc_am_api_key_text'
            ), $this->ame_activation_tab_key);
            add_settings_field($this->ame_api_key, __('API Key', 'ddpro'), array(
                $this,
                'wc_am_api_key_field'
            ), $this->ame_activation_tab_key, $this->ame_api_key);
             add_settings_field('status', __('API Key Status', 'ddpro'), array(
                $this,
                'wc_am_api_key_status'
            ), $this->ame_activation_tab_key, $this->ame_api_key);

            register_setting($this->ame_deactivate_checkbox, $this->ame_deactivate_checkbox, array(
                $this,
                'wc_am_license_key_deactivation'
            ));
            add_settings_section('deactivate_button', __('API Key Deactivation', 'ddpro'), array(
                $this,
                'wc_am_deactivate_text'
            ), $this->ame_deactivation_tab_key);
            add_settings_field($this->ame_deactivation_tab_key, __('Remove this domain', 'ddpro'), array(
                $this,
                'wc_am_deactivate_textarea'
            ), $this->ame_deactivation_tab_key, 'deactivate_button');
        }

        // Provides text for api key section
        public function wc_am_api_key_text()
        {
            echo '<p>'.esc_html__('Register this domain for full access.', 'ddpro').' <a target="_blank" href="https://seku.re/wp-den-login">'.esc_html__('Find your API keys', 'ddpro').'</a></p>';
        }

        // Returns the API Key status from the WooCommerce API Manager on the server
        public function wc_am_api_key_status()
        {
            $license_status       = $this->license_key_status();
            $license_status_check = '';

            if(isset($_SERVER['SERVER_NAME'])) $api_domain = esc_url_raw($_SERVER['SERVER_NAME']);
            else $api_domain = '';

            if(empty($license_status['status_check']) && get_option('ddp_subscription_on_hold') === 'yes') { // ON HOLD
                 $license_status_check = '<span id="ddp-on-hold">'.__('Registered, On Hold', 'ddpro').'.<span class="dashicons dashicons-warning"></span></span><p>'.__('The domain ', 'ddpro').'<strong>'.$api_domain.'</strong>'.__(' is registered.', 'ddpro').' <a href="https://seku.re/ddp-api-onhold-kb" target="_blank">'.__('What does <strong>On Hold</strong> mean?', 'ddpro').'</a></p>';
            }
            else if (isset($license_status['status_check']) && $license_status['status_check'] === 'inactive' &&  $license_status['data']['activations_remaining'] > 0) { // JUST REACTIVATED
                 $license_status_check = '<span id="ddp-on-hold">'.__('Not Registered, On Hold', 'ddpro').' <span class="dashicons dashicons-warning"></span></span><p>'.__('The domain', 'ddpro').' <strong>'.$api_domain.'</strong>'.__(' is not registered. Please re-enter your key.', 'ddpro').' <a href="https://seku.re/ddp-api-onhold-kb" target="_blank">'.__('What does <strong>On Hold</strong> mean?', 'ddpro').'</a></p>';
                 if(!empty($license_status['data']['activations_remaining']) && $license_status['data']['total_activations_purchased'] < 6) $license_status_check = $license_status_check.'<p>'.__('You have', 'ddpro').' ('. $license_status['data']['activations_remaining'] .') '.__('domain/s remaining.', 'ddpro').'</p>';
            }
            else if(isset($license_status['status_check']) && !empty($license_status['status_check']) && $license_status['status_check'] === 'active') { // REGISTERED
                $license_status_check = '<span id="ddp-active">'.__('Registered', 'ddpro').' <span class="dashicons dashicons-yes"></span></span><p>'.__('The domain', 'ddpro').' <strong>'. $api_domain.'</strong> '.__('is registered.', 'ddpro').'</p>';
                if(!empty($license_status['data']['activations_remaining']) && $license_status['data']['total_activations_purchased'] < 6) $license_status_check = $license_status_check.'<p>'.__('You have', 'ddpro').' ('. $license_status['data']['activations_remaining'] .') '.__('domain/s remaining.', 'ddpro').'</p>';
            }
            else  if(isset($license_status['status_check']) && !empty($license_status['status_check']) && $license_status['status_check'] !== 'active') { // NOT REGISTERED
                $license_status_check = '<span id="ddp-not-active">'.__('Not Registered', 'ddpro').' <span class="dashicons dashicons-no"></span></span><p>'.__('The domain', 'ddpro').' <strong>'.$api_domain.'</strong> '.__('is not registered.', 'ddpro').'</p>';
            }
            else if((!isset($license_status['status_check']) || empty($license_status['status_check']))&& get_option('ddp_subscription_on_hold') === 'no') { // NOT REGISTERED - empty or wrong key
                $license_status_check = '<span id="ddp-not-active">'.__('Not Registered', 'ddpro').' <span class="dashicons dashicons-no"></span></span><p>'.__('The domain', 'ddpro').' <strong>'.$api_domain.'</strong> '.__('is not registered.', 'ddpro').'</p>';

            }

            if (!empty($license_status_check)) {
                echo wp_kses($license_status_check, $this->ddp_allowed_html());
            }

        }

        // Returns API Key text field
        public function wc_am_api_key_field()
        {
            $license_status       = esc_html($this->license_key_status());
            $cancelled            = esc_attr(get_option('ddp_subscription_on_hold'));
            if($cancelled === 'yes' && !empty($license_status['status_check'])) echo "<input id='api_key' name='divi_den_pro_membership_data[api_key]' size='25' type='text' value='' />";
            else echo "<input id='api_key' name='" . esc_attr($this->ame_data_key) . "[" . esc_attr($this->ame_api_key) . "]' size='25' type='text' value='" . esc_attr($this->ame_options[$this->ame_api_key]) . "' />";
        }


        // Sanitizes and validates all input and output for Dashboard
        public function validate_options($input)
        {
            // Load existing options, validate, and update with changes from input before returning
            $options                              = $this->ame_options;
            $options[$this->ame_api_key]          = trim($input[$this->ame_api_key]);
            $api_key                              = trim($input[$this->ame_api_key]);
            $activation_status                    = get_option($this->ame_activated_key);
            $checkbox_status                      = get_option($this->ame_deactivate_checkbox);
            $current_api_key                      = $this->ame_options[$this->ame_api_key];
            $cancelled                            = get_option('ddp_subscription_on_hold');
            $ddp_enabled                          = get_option('ddp_enable');

            // Should match the settings_fields() value
            if (isset($_REQUEST['option_page']) && $_REQUEST['option_page'] != $this->ame_deactivate_checkbox) { // phpcs:ignore
                if ($activation_status == 'Deactivated' || $activation_status == '' || $api_key == '' || $checkbox_status == 'on' || $cancelled === 'yes') {
                    /**
                     * If this is a new key, and an existing key already exists in the database,
                     * deactivate the existing key before activating the new key.
                     */
                    if ($current_api_key !== '' && $api_key !== '') {
                        $this->replace_license_key($current_api_key);
                    }

                    $args             = array(
                        'licence_key' => $api_key
                    );
                    $activate_results = json_decode($this->activate($args), true);

                    if (isset($activate_results['activated']) && $activate_results['activated'] === true && !empty($this->ame_activated_key)) {
                        add_settings_error('activate_text', 'activate_msg', sprintf(__('%s activated. ', 'ddpro'), esc_attr($this->software_title)), 'updated');
                        update_option($this->ame_activated_key, 'Activated');
                        update_option($this->ame_deactivate_checkbox, 'off');
                        if ($this->ddp_return_subscription_status() == 1) update_option('ddp_subscription_on_hold', 'no');
                    }

                    if ($activate_results == false && !empty($this->ame_options) && !empty($this->ame_activated_key)) {
                        //add_settings_error( 'api_key_check_text', 'api_key_check_error', __( 'Connection failed to the API Key server. Try again later. There may be a problem on your server preventing outgoing requests, or the store is blocking your request to activate the plugin/theme.', 'ddpro' ), 'error' );
                        //$options[ $this->ame_api_key ]          = '';
                        update_option($this->ame_activated_key, 'Activated');
                        update_option($this->ame_deactivate_checkbox, 'off');
                    }

                    if (isset($activate_results['code']) && !empty($this->ame_options) && !empty($this->ame_activated_key)) {
                        switch ($activate_results['code']) {
                            case '100':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('api_email_text', 'api_email_error', "{$activate_results['error']}. {$additional_info}", 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                            case '101':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('api_key_text', 'api_key_error', "{$activate_results['error']}. {$additional_info}", 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                            case '102':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('api_key_purchase_incomplete_text', 'api_key_purchase_incomplete_error', "{$activate_results['error']}. {$additional_info}", 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                            case '103':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('api_key_exceeded_text', 'api_key_exceeded_error', __("Action Required: You have reached your activation limit, please upgrade your subscription for more sites. You can also remove unused sites. If you have an 'unlimited subscription', simply request more activation's - its fast and easy. For security reasons activation's are issued 50 at a time. Please <a target='_blank' href='https://seku.re/wp-den-suppor'>contact support</a> and we will take care if it immediately.", 'ddpro'), 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                            case '104':
                                //$additional_info = ! empty( $activate_results[ 'additional info' ] ) ? esc_attr( $activate_results[ 'additional info' ] ) : '';
                                //add_settings_error( 'api_key_not_activated_text', 'api_key_not_activated_error', "{$activate_results['error']}. {$additional_info}", 'error' );
                                //$options[ $this->ame_api_key ]          = '';
                                update_option($this->ame_activated_key, 'Activated');
                                update_option($this->ame_deactivate_checkbox, 'off');
                                break;
                            case '105':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('api_key_invalid_text', 'api_key_invalid_error', "{$activate_results['error']}. {$additional_info}", 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                            case '106':
                                $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                                add_settings_error('sub_not_active_text', 'sub_not_active_error', "{$activate_results['error']}. {$additional_info}", 'error');
                                $options[$this->ame_api_key]          = '';
                                update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                                break;
                        }
                    }
                } // End Plugin Activation
            }

            return $options;
        }

        /**
         * Returns the API Key status from the WooCommerce API Manager on the server.
         *
         * @return array|mixed|object
         */
        public function license_key_status()
        {
            $args = array(
                'licence_key' => $this->ame_options[$this->ame_api_key]
            );

           //print_r(json_decode($this->status($args), true));

            return json_decode($this->status($args), true);
        }

        /**
         * Deactivate the current API Key before activating the new API Key
         *
         * @param string $current_api_key
         *
         * @return bool
         */
        public function replace_license_key($current_api_key)
        {
            $args = array(
                'licence_key' => $current_api_key
            );

            $reset = $this->deactivate($args); // reset API Key activation

            if ($reset == true) {
                return true;
            }

            add_settings_error('not_deactivated_text', 'not_deactivated_error', __('The API Key could not be deactivated. Use the API Key Deactivation to manually deactivate the API Key before activating a new API Key. If all else fails, go to Plugins, then deactivate and reactivate this plugin, or if a theme change themes, then change back to this theme, then go to the Settings for this plugin/theme and enter the API Key information again to activate it. Also check the My Account dashboard to see if the API Key for this site was still active before the error message was displayed.', 'ddpro'), 'updated');

            return false;
        }

        // Deactivates the API Key to allow key to be used on another blog
        public function wc_am_license_key_deactivation($input)
        {
            $activation_status = get_option($this->ame_activated_key);
            $args              = array(
                'licence_key' => $this->ame_options[$this->ame_api_key]
            );
            $cancelled = get_option('ddp_subscription_on_hold');

            //For testing activation status_extra data
            // $activate_results = json_decode( $this->status( $args ), true );
            // print_r($activate_results); exit();

            $options = ($input == 'on' ? 'on' : 'off');
            if ($options == 'on' && $activation_status == 'Activated' && $this->ame_options[$this->ame_api_key] != '' ) {
                // deactivates API Key key activation
                $activate_results = json_decode($this->deactivate($args), true);



              if($cancelled === 'yes' && $activate_results['code'] === '100' && $activate_results['error'] === 'The API Key could not be deactivated.') {
                //Used to display results for development
                  // print_r($activate_results);
                  // echo 'YES';
                  $new_api_key = $this->ame_options[$this->ame_api_key];
                  $new_args              = array(
                    'licence_key' => $new_api_key
                    );

                  $this->activate( $new_args );

              }

              //Used to display results for development
              // print_r($activate_results);
              // echo $activate_results['code'];

              // echo 'NO';

              //exit();

                if ((isset($activate_results['deactivated']) && $activate_results['deactivated'] === true) || $activate_results['code'] === '100') {
                    $update        = array(
                        $this->ame_api_key => '',
                    );
                    $merge_options = array_merge($this->ame_options, $update);

                    if (!empty($this->ame_activated_key)) {
                        update_option($this->ame_data_key, $merge_options);
                        update_option($this->ame_activated_key, 'Deactivated');
                        add_settings_error('wc_am_deactivate_text', 'deactivate_msg', __('API Key deactivated. ', 'ddpro'), 'update');
                    }

                    return $options;
                }

                if (isset($activate_results['code']) && !empty($this->ame_options) && !empty($this->ame_activated_key)) {
                    //echo '$activate_results'.$activate_results['code'];
                    switch ($activate_results['code']) {
                        case '100':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('api_email_text', 'api_email_error', "{$activate_results['error']}. {$additional_info}", 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                        case '101':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('api_key_text', 'api_key_error', "{$activate_results['error']}. {$additional_info}", 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                        case '102':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('api_key_purchase_incomplete_text', 'api_key_purchase_incomplete_error', "{$activate_results['error']}. {$additional_info}", 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                        case '103':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('api_key_exceeded_text', 'api_key_exceeded_error', __('Action required: for security reasons, Divi Den Pro Membership activation’s are issued 50 sites/domains at a time. Don’t worry, your activation’s are unlimited. Please <a target="_blank" href="https://seku.re/wp-den-support">submit a quick support request</a> with the message "increase Divi Den Pro Membership activation limit". We will increase it for you immediately. Thank you and sorry for the delay.', 'ddpro'), 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                        case '104':
                            //$additional_info = ! empty( $activate_results[ 'additional info' ] ) ? esc_attr( $activate_results[ 'additional info' ] ) : '';
                            //add_settings_error( 'api_key_not_activated_text', 'api_key_not_activated_error', "{$activate_results['error']}. {$additional_info}", 'error' );
                            // $options[ $this->ame_api_key ]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Activated');
                            break;
                        case '105':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('api_key_invalid_text', 'api_key_invalid_error', "{$activate_results['error']}. {$additional_info}", 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                        case '106':
                            $additional_info = !empty($activate_results['additional info']) ? esc_attr($activate_results['additional info']) : '';
                            add_settings_error('sub_not_active_text', 'sub_not_active_error', "{$activate_results['error']}. {$additional_info}", 'error');
                            $options[$this->ame_api_key]          = '';
                            update_option($this->ame_options[$this->ame_activated_key], 'Deactivated');
                            break;
                    }
                }
            } else {

                return $options;
            }

            return false;
        }

        public function ddp_start_here_function()
        {

            $ddp_start_here_content = '<div class="ddp-tutorials-dash">';
            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-columns"><div class="ddp-first-column"><h2>'.__('First steps…', 'ddpro').'</h2>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/gear.png" alt="'.__('Gear Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Watch this before you begin', 'ddpro').' <span>+</span></h3><p>'.__('Important things to do before you start building pages', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Learn how to deactivate Divi local caching and JS minification, plugin caching and server caching.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-before-you-begin" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/save.png" alt="'.__('Save Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('The "Save" button does not show.', 'ddpro').' <span>+</span></h3><p>'.__('I only see "Try For Free"', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Just activated the API Key but unable to load/save layouts? Try this', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-button-does-not-work" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/find.png" alt="'.__('Find Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Finding & loading layouts', 'ddpro').' <span>+</span></h3><p>'.__('Tips for finding relevant layouts fast', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('How to search by keyword. Using filter options, collections, bundles, page types and topics. Saving to the library or loading direct to a page.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-finding-layouts" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/find2.png" alt="'.__('Find Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Finding & loading modules', 'ddpro').' <span>+</span></h3><p>'.__('Load the right module from the right place', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('How to filter by modules and save to library. Adding modules to a page.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-finding-loading-modules" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/updates.png" alt="'.__('Updates Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Making content & style updates', 'ddpro').' <span>+</span></h3><p>'.__('Modify content and design to suit your needs', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('How to make updates using Divi module settings. Content, design and custom tab options.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-style-updates" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .='</div><div class="ddp-second-column"><h2>Next steps…</h2>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/devtools.png" alt="'.__('DevTools Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Using developer tools', 'ddpro').' <span>+</span></h3><p>'.__('How to customize ANYTHING easily using developer tools', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-developer-tools" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/problems.png" alt="'.__('Problems Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Common problems and troubleshooting tips', 'ddpro').' <span>+</span></h3><p>'.__('Missing options or not able to save/load layouts?', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Some tips for troubleshooting...', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-troubleshooting-tips" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/advanced.png" alt="'.__('Advanced Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Advanced updates - custom CSS', 'ddpro').' <span>+</span></h3><p>'.__('Where to find additional CSS or write your own', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Finding and using custom CSS files.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-advanced-updates" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/blog.png" alt="'.__('Blog Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Setting up blog layouts & blog modules', 'ddpro').' <span>+</span></h3><p>'.__('Assign posts, categories, featured images and more', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Tips for setting up posts, image sizes, image optimization, tick which categories to display on page & dummy posts if needed.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-setting-up-blog" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/wl.png" alt="'.__('White Label Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('White label mode - setup, test, activate', 'ddpro').' <span>+</span></h3><p>'.__('How to brand the Pro plugin as your own', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('Options & settings to get the most out of white labelling', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-white-label" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/lock.png" alt="'.__('Lock Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Can\'t get back to the pro plugin dashboard?', 'ddpro').' <span>+</span></h3><p>'.__('Here\'s how to do it', 'ddpro').'</p></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><p>'.__('White label mode - using the secret link to access the Pro dashboard.', 'ddpro').'</p><iframe width="560" height="315" src="https://seku.re/ddp-cant-get-back" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div></div></div><div class="clear"></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-columns"><div class="ddp-first-column"><h2 id="ddp-divi-theme-builder">'.__('Divi Theme Builder', 'ddpro').'</h2>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/divi-builder-layouts.png" alt="'.__('Builder Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to use premade Divi theme builder layouts ', 'ddpro').'<span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-premade-layouts" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/header-footer.png" alt="'.__('Headers and Footers Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to add headers and footers', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-headers-footers" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/custom-navigation-menus.png" alt="'.__('Menus Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to add custom navigation menus ', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-navigation-menus" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/404.png" alt="'.__('404 Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to add a 404 page template', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-404" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .='</div><div class="ddp-second-column"><h2 id="ddp-theme-builder">Plugin Theme Builder</h2>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/theme-builder.png" alt="'.__('DevTools Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Quick overview of the Divi Den Pro theme builder', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-quick-preview" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/login-page.png" alt="'.__('Login Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to set up a custom Divi login page', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-custom-login" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/coming-soon.png" alt="'.__('Coming Soon Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('Create a custom coming soon page template', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-custom-coming-soon" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div>';

            $ddp_start_here_content .= '<div class="clear"></div><div class="ddp-accordion ddp-accordion-no-text closed">';
            $ddp_start_here_content .= '<div class="ddp-accordion-header"><div class="ddp-accordion-img"><img src="';
            $ddp_start_here_content .= plugin_dir_url(__FILE__);
            $ddp_start_here_content .= '/img/tutorials-icons/pop-up.png" alt="'.__('Pop Up Icon', 'ddpro').'"/></div>';
            $ddp_start_here_content .= '<h3>'.__('How to trigger a Divi pop-up by adding a CSS class', 'ddpro').' <span>+</span></h3></div>';
            $ddp_start_here_content .= '<div class="ddp-accordion-content"><iframe width="560" height="315" src="https://seku.re/ddp-trigger-pop-up" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ddp-youtube"></iframe></div></div></div></div><div class="clear"></div></div>';

            return $ddp_start_here_content;
        }

        public function ddp_count_updates() {
            $ddp_json = file_get_contents('https://seku.re/ddproupd');
            $ddp_obj = json_decode($ddp_json);
            $ddp_last_version = str_replace(".", "", $ddp_obj->version);

            $ddp_plugin_data = get_plugin_data( plugin_dir_path(__FILE__) .'/ddpro.php' );

            $ddp_current_version = str_replace(".", "", $ddp_plugin_data['Version']);

            $ddp_count =  $ddp_last_version - $ddp_current_version;
            return $ddp_count;
        }

        public function ddp_return_subscription_status(){
            $args = array(
                'licence_key' => $this->ame_options[$this->ame_api_key]
            );

            $license_status       = $this->status($args);

            $counter = 0;

            $license_status_array = json_decode($license_status, true);

            if(strpos($license_status, 'No API resources exist') !== false || (isset($license_status_array['status_check']) && $license_status_array['status_check'] === 'inactive' &&  $license_status_array['data']['activations_remaining'] > 0)) {
               // echo 'ON HOLD';
                $subscription_status = 0;
                update_option('ddp_subscription_on_hold', 'yes');
                update_option('ddp_subscription_stopped', 'no');
                update_option('ddp_enable', 'disabled');

                //echo  $license_status.': ';
              // echo 'NO FOR SP';
            }
            else if (strpos($license_status, 'Invalid API License Key') !== false || strpos($license_status, 'A customer account does not exist') !== false ) {
               // echo 'NOT ACTIVE';
                update_option('ddp_enable', 'disabled');
                update_option($this->ame_activated_key, 'Deactivated');
                update_option('ddp_subscription_stopped', 'yes');
            }
            else {
                //echo 'Active';
                $subscription_status = 1;
                update_option('ddp_subscription_on_hold', 'no');
                update_option('ddp_subscription_stopped', 'no');
                update_option('ddp_enable', 'enabled');
            }

            return $subscription_status;
        }


        public function ddp_return_subscription_cancelled_date(){
            $args = array(
                'licence_key' => $this->ame_options[$this->ame_api_key]
            );

            $license_status       = $this->status($args);
            if(json_decode($license_status, true)['code'] == 106) {
                   // echo json_decode($license_status, true)['timestamp'];
                $license_pause_data = gmdate('j M Y G:i', json_decode($license_status, true)['timestamp']);
            }
            else {return false;}

            return $license_pause_data;
        }

        public function wc_am_deactivate_text() {
            echo '<h4>'.esc_html__('Each API Key activation saves the current domain name to your account. The domain is saved forever until it is "released" manually.', 'ddpro').' <br><br>'.esc_html__('Need more domains? If you use staging sites, remember to release unused domain license keys after the project is live.', 'ddpro').' <a target="_blank" href="https://seku.re/wp-den-support">'.esc_html__('Contact support', 'ddpro').'</a> '.esc_html__('if you need assistance', 'ddpro').'.</h4>';
        }

        public function wc_am_deactivate_textarea() {
            echo '<div class="et-epanel-box divi-button"><div class="et-box-content">';
            echo '<input style="display: none;" type="checkbox" id="' . esc_attr($this->ame_deactivate_checkbox) . '" name="' . esc_attr($this->ame_deactivate_checkbox) . '" value="on"';
            echo checked(get_option($this->ame_deactivate_checkbox), 'on');
            echo '/>';
            echo '<div class="et_pb_yes_no_button et_pb_off_state';
            echo '"><!-- .et_pb_on_state || .et_pb_off_state -->
                <span class="et_pb_value_text et_pb_on_value">'.esc_html__('Yes', 'ddpro').'</span>
                <span class="et_pb_button_slider"></span>
                <span class="et_pb_value_text et_pb_off_value">'.esc_html__('No', 'ddpro').'</span>
            </div></div></div></div>';
        }

        /**
         * Builds the URL containing the API query string for activation, deactivation, and status requests.
         *
         * @param array $args
         *
         * @return string
         */
        public function create_software_api_url($args)
        {
            return add_query_arg('wc-api', 'am-software-api', $this->api_url) . '&' . http_build_query($args);
        }

        public function activate( $args ) {
            $defaults = array(
                'request'          => 'activate',
                'product_id'       => $this->ame_product_id,
                'instance'         => $this->ame_instance_id,
                'object'           => $this->ame_domain,
                'software_version' => $this->ame_software_version
            );

            $args       = wp_parse_args( $defaults, $args );
            $target_url = esc_url_raw( $this->create_software_api_url( $args ) );
            $request    = wp_safe_remote_post( $target_url, array( 'timeout' => 15 ) );

          // echo 'START ACTIVATION';

            if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
                // Request failed
                return false;
            }

            $response = wp_remote_retrieve_body( $request );

         //   echo $response; exit();

            return $response;
        }

        /**
         * Sends the request to deactivate to the API Manager.
         *
         * @param array $args
         *
         * @return bool|string
         */
        public function deactivate( $args ) {
           // echo 'deactivate start';
            $defaults = array(
                'request'    => 'deactivate',
                'product_id' => $this->ame_product_id,
                'instance'   => $this->ame_instance_id,
                'object'     => $this->ame_domain
            );

            $args       = wp_parse_args( $defaults, $args );
            $target_url = esc_url_raw( $this->create_software_api_url( $args ) );
            $request    = wp_safe_remote_post( $target_url, array( 'timeout' => 15 ) );

            if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
                // Request failed
                //echo 'request fail';
                return false;
            }

            $response = wp_remote_retrieve_body( $request );

           // echo 'RESPONSE: '.$response;

            return $response;
        }

        /**
         * Sends the status check request to the API Manager.
         *
         * @param array $args
         *
         * @return bool|string
         */
        public function status($args)
        {
            $defaults = array(
                'request' => 'status',
                'product_id' => $this->ame_product_id,
                'instance' => $this->ame_instance_id,
                'platform' => $this->ame_domain
            );

            $args       = wp_parse_args($defaults, $args);
            $target_url = esc_url_raw($this->create_software_api_url($args));
            $request    = wp_safe_remote_get($target_url);

            // $request = wp_remote_post( $this->api_url . 'wc-api/am-software-api/', array( 'body' => $args ) );

            if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
                // Request failed
                return false;
            }

            $response = wp_remote_retrieve_body($request);


           //  echo 'STATUS CHECK';
           // echo $response;

            return $response;
        }

        /**
         * Check for software updates.
         */
        public function check_for_update()
        {
            $this->plugin_name = $this->ame_plugin_name;

            // Slug should be the same as the plugin/theme directory name
            if (strpos($this->plugin_name, '.php') !== 0) {
                $this->slug = dirname($this->plugin_name);
            } else {
                $this->slug = $this->plugin_name;
            }

            /*********************************************************************
             * The plugin and theme filters should not be active at the same time
             *********************************************************************/
            /**
             * More info:
             * function set_site_transient moved from wp-includes/functions.php
             * to wp-includes/option.php in WordPress 3.4
             *
             * set_site_transient() contains the pre_set_site_transient_{$transient} filter
             * {$transient} is either update_plugins or update_themes
             *
             * Transient data for plugins and themes exist in the Options table:
             * _site_transient_update_themes
             * _site_transient_update_plugins
             */

            // uses the flag above to determine if this is a plugin or a theme update request
            if ($this->plugin_or_theme == 'plugin') {
                /**
                 * Plugin Updates
                 */
                // Check For Plugin Updates
                //add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'update_check' ) );
                // Check For Plugin Information to display on the update details page
                add_filter('plugins_api', array(
                    $this,
                    'request'
                ), 10, 3);
            } else if ($this->plugin_or_theme == 'theme') {
                /**
                 * Theme Updates
                 */
                // Check For Theme Updates
                add_filter('pre_set_site_transient_update_themes', array(
                    $this,
                    'update_check'
                ));

                // Check For Theme Information to display on the update details page
                //add_filter( 'themes_api', array( $this, 'request' ), 10, 3 );

            }
        }

        /**
         * Builds the URL containing the API query string for software update requests.
         *
         * @param array $args
         *
         * @return string
         */
        private function create_upgrade_api_url($args)
        {
            return add_query_arg('wc-api', 'upgrade-api', $this->api_url) . '&' . http_build_query($args);
        }

        /**
         * Check for updates against the remote server.
         *
         * @since  1.0.0
         *
         * @param  object $transient
         *
         * @return object $transient
         */
        public function update_check($transient)
        {
            if (empty($transient->checked)) {
                return $transient;
            }

            $args = array(
                'request' => 'pluginupdatecheck',
                'slug' => $this->slug,
                'plugin_name' => $this->plugin_name,
                //'version'         =>  $transient->checked[$this->plugin_name],
                'version' => $this->ame_software_version,
                'product_id' => $this->ame_product_id,
                'api_key' => $this->ame_options[$this->ame_api_key],
                'instance' => $this->ame_instance_id,
                'domain' => $this->ame_domain,
                'software_version' => $this->ame_software_version,
                'extra' => $this->extra
            );

            // Check for a plugin update
            $response = $this->plugin_information($args);
            // Displays an admin error message in the WordPress dashboard
            $this->check_response_for_errors($response);

            // Set version variables
            if (isset($response) && is_object($response) && $response !== false) {
                // New plugin version from the API
                $new_ver  = (string) $response->new_version;
                // Current installed plugin version
                $curr_ver = (string) $this->ame_software_version;
                //$curr_ver = (string)$transient->checked[$this->plugin_name];
            }

            // If there is a new version, modify the transient to reflect an update is available
            if (isset($new_ver) && isset($curr_ver)) {
                if ($response !== false && version_compare($new_ver, $curr_ver, '>')) {
                    if ($this->plugin_or_theme == 'plugin') {
                        $transient->response[$this->plugin_name] = $response;
                    } else if ($this->plugin_or_theme == 'theme') {
                        $transient->response[$this->plugin_name]['new_version'] = $response->new_version;
                        $transient->response[$this->plugin_name]['url']         = $response->url;
                        $transient->response[$this->plugin_name]['package']     = $response->package;
                    }
                }
            }

            return $transient;
        }

        /**
         * Sends and receives data to and from the server API
         *
         * @since  1.0.0
         *
         * @param array $args
         *
         * @return object $response
         */
        public function plugin_information($args)
        {
            $target_url = esc_url_raw($this->create_upgrade_api_url($args));
            $request    = wp_safe_remote_get($target_url);

            $request = wp_remote_post( $this->api_url . 'wc-api/upgrade-api/', array( 'body' => $args ) );

            if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
                return false;
            }

            $response = unserialize(wp_remote_retrieve_body($request));

            /**
             * For debugging errors from the API
             * For errors like: unserialize(): Error at offset 0 of 170 bytes
             * Comment out $response above first
             */
            // $response = wp_remote_retrieve_body( $request );
            // print_r($response); exit;

            if (is_object($response)) {
                return $response;
            } else {
                return false;
            }
        }

        /**
         * API request for informatin.
         *
         * If `$action` is 'query_plugins' or 'plugin_information', an object MUST be passed.
         * If `$action` is 'hot_tags` or 'hot_categories', an array should be passed.
         *
         * @param false|object|array $result The result object or array. Default false.
         * @param string             $action The type of information being requested from the Plugin Install API.
         * @param object             $args
         *
         * @return object
         */
        public function request($result, $action, $args)
        {
            // Is this a plugin or a theme?
            if ( $this->plugin_or_theme == 'plugin' ) {
                $version = get_site_transient( 'update_plugins' );
            } else if ( $this->plugin_or_theme == 'theme' ) {

                $version = get_site_transient( 'update_themes' );
            }

            // Check if this plugins API is about this plugin
            if (isset($args->slug)) {
                if ($args->slug != $this->slug) {
                    return $result;
                }
            } else {
                return $result;
            }

            $args = array(
                'request' => 'plugininformation',
                'plugin_name' => $this->plugin_name,
                //'version'         =>  $version->checked[$this->plugin_name],
                'version' => $this->ame_software_version,
                'product_id' => $this->ame_product_id,
                'api_key' => $this->ame_options[$this->ame_api_key],
                'instance' => $this->ame_instance_id,
                'domain' => $this->ame_domain,
                'software_version' => $this->ame_software_version,
                'extra' => $this->extra
            );

            $response = $this->plugin_information($args);

            // If everything is okay return the $response
            if (isset($response) && is_object($response) && $response !== false) {
                return $response;
            }

            return $result;
        }

        /**
         * Displays an admin error message in the WordPress dashboard
         *
         * @param  object $response
         *
         * @return string
         */
        public function check_response_for_errors($response)
        {
            if (!empty($response) && is_object($response)) {
                //print_r($response);
                if (isset($response->errors['no_key']) && $response->errors['no_key'] == 'no_key' && isset($response->errors['no_subscription']) && $response->errors['no_subscription'] == 'no_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'no_key_error_notice'
                    ));
                    add_action('admin_notices', array(
                        $this,
                        'no_subscription_error_notice'
                    ));
                } else if (isset($response->errors['exp_license']) && $response->errors['exp_license'] == 'exp_license') {
                    add_action('admin_notices', array(
                        $this,
                        'expired_license_error_notice'
                    ));
                } else if (isset($response->errors['hold_subscription']) && $response->errors['hold_subscription'] == 'hold_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'on_hold_subscription_error_notice'
                    ));
                } else if (isset($response->errors['cancelled_subscription']) && $response->errors['cancelled_subscription'] == 'cancelled_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'cancelled_subscription_error_notice'
                    ));
                } else if (isset($response->errors['exp_subscription']) && $response->errors['exp_subscription'] == 'exp_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'expired_subscription_error_notice'
                    ));
                } else if (isset($response->errors['suspended_subscription']) && $response->errors['suspended_subscription'] == 'suspended_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'suspended_subscription_error_notice'
                    ));
                } else if (isset($response->errors['pending_subscription']) && $response->errors['pending_subscription'] == 'pending_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'pending_subscription_error_notice'
                    ));
                } else if (isset($response->errors['trash_subscription']) && $response->errors['trash_subscription'] == 'trash_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'trash_subscription_error_notice'
                    ));
                } else if (isset($response->errors['no_subscription']) && $response->errors['no_subscription'] == 'no_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'no_subscription_error_notice'
                    ));
                } else if (isset($response->errors['no_activation']) && $response->errors['no_activation'] == 'no_activation') {
                    add_action('admin_notices', array(
                        $this,
                        'no_activation_error_notice'
                    ));
                } else if (isset($response->errors['no_key']) && $response->errors['no_key'] == 'no_key') {
                    add_action('admin_notices', array(
                        $this,
                        'no_key_error_notice'
                    ));
                } else if (isset($response->errors['download_revoked']) && $response->errors['download_revoked'] == 'download_revoked') {
                    add_action('admin_notices', array(
                        $this,
                        'download_revoked_error_notice'
                    ));
                } else if (isset($response->errors['switched_subscription']) && $response->errors['switched_subscription'] == 'switched_subscription') {
                    add_action('admin_notices', array(
                        $this,
                        'switched_subscription_error_notice'
                    ));
                }
            }
        }

        /**
         * Display license expired error notice
         */
        public function expired_license_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The API key for %s has expired. You can reactivate or purchase an API key from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription on-hold error notice
         */
        public function on_hold_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s is on-hold. You can reactivate the subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription cancelled error notice
         */
        public function cancelled_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s has been cancelled. You can renew the subscription from your account <a href="%s" target="_blank">dashboard</a>. A new API key will be emailed to you after your order has been completed.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription expired error notice
         */
        public function expired_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s has expired. You can reactivate the subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription expired error notice
         */
        public function suspended_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s has been suspended. You can reactivate the subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription expired error notice
         */
        public function pending_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s is still pending. You can check on the status of the subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription expired error notice
         */
        public function trash_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('The subscription for %s has been placed in the trash and will be deleted soon. You can purchase a new subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display subscription expired error notice
         */
        public function no_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('A subscription for %s could not be found. You can purchase a subscription from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display missing key error notice
         */
        public function no_key_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('A API key for %s could not be found. Maybe you forgot to enter an API key when setting up %s, or the key was deactivated in your account. You can reactivate or purchase an API key from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display missing download permission revoked error notice
         */
        public function download_revoked_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('Download permission for %s has been revoked possibly due to an API key or subscription expiring. You can reactivate or purchase an API key from your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

        /**
         * Display no activation error notice
         */
        public function no_activation_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('%s has not been activated. Go to the settings page and enter the API key and API email to activate %s.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_attr($this->ame_software_product_id));
        }

        /**
         * Display switched activation error notice
         */
        public function switched_subscription_error_notice() {
            echo sprintf('<div class="notice notice-info"><p>' . esc_html(__('You changed the subscription for %s, so you will need to enter your new API Key in the settings page. The API Key should have arrived in your email inbox, if not you can get it by logging into your account <a href="%s" target="_blank">dashboard</a>.', 'ddpro')) . '</p></div>', esc_attr($this->ame_software_product_id), esc_url($this->ame_renew_license_url));
        }

    }
}