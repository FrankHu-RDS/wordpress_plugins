<?php
 /*
 Plugin Name: Divi Toolbox
 Version: 1.6.5
 Plugin URI: https://toolbox.divilover.com
 Description: Powerful Tools to Customize the Divi Theme
 Author: Divi Lover
 Author URI: https://divilover.com
 Text Domain: divi-toolbox
 Domain Path: /languages
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
require_once( ABSPATH . '/wp-admin/includes/plugin.php' ) ;

if ( ! class_exists( 'DiviToolbox_License' ) ) {
	require_once( dirname(__FILE__) . '/updater/divi-toolbox-license.php' );
}

include_once ABSPATH . 'wp-admin/includes/file.php'; 

if ( class_exists( 'DiviToolbox_License' ) ) {
	$divitoolbox_license = new DiviToolbox_License( __FILE__, 6866, '1.6.5', 'plugin', 'https://divilover.com/', 'Divi Toolbox');
}


 
define( 'url_support', 'https://divilover.com/my-account/dl-support' );
define( 'url_docs', 'https://toolbox.divilover.com/docs/general-settings/' );
define( 'DTB_TOOLBOX_PLUGIN_URI', plugins_url('', __FILE__) );
define( 'DTB_TOOLBOX_PLUGIN_CACHE_URI', trailingslashit(plugins_url('', __FILE__)).'cache/' );
define( 'DTB_TOOLBOX_PLUGIN_CACHE_DIR', trailingslashit( dirname(__FILE__) ).'cache/' );
define( 'DTB_TOOLBOX_PLUGIN_DIR', trailingslashit( dirname(__FILE__) ) );

$template = get_template();
$theme = wp_get_theme($template);
$theme_name = empty($theme->Name)?'':$theme->Name;

if(wp_get_theme() == 'Divi' || wp_get_theme()->parent() == 'Divi' || strpos($theme->Name, 'Divi')!==false || strpos($template, 'Divi')!==false ) {
    if ( isset($_POST['wp_customize']) && isset($_GET['customize_theme']) && $_GET['customize_theme'] != 'Divi' && $_GET['customize_theme'] != get_stylesheet() && wp_verify_nonce( sanitize_key( $_GET['customize_theme'] ),'customize_theme' ) ) {
		return;
	}
	else{
		require_once DTB_TOOLBOX_PLUGIN_DIR. 'functions/settings/static-css.php';
	}
}
require_once(DTB_TOOLBOX_PLUGIN_DIR. 'functions/settings/port.php');


function dtb_generate_css_after_update_v1_2() {
	dtb_create_static_css();
}

// Load Toolbox Assets
function dtb_toolbox_init() {



		if(is_admin()){
			if(!get_option('dtbchange_v1_2')){
				dtb_change_options(wp_load_alloptions());
				dtb_change_theme_mod(get_theme_mods());
				add_action('init', 'dtb_generate_css_after_update_v1_2');
				update_option('dtbchange_v1_2', 1);
		}
	}
	include DTB_TOOLBOX_PLUGIN_DIR.'/toolbox-customizer.php';
	dtb_import_notifications();
	add_action( 'wp_enqueue_scripts', 'dtb_scripts_styles_enqueue', 21 );
	
	if ( (is_admin()) || (!empty ($GLOBALS['wp_customize'])) ) {
		require_once DTB_TOOLBOX_PLUGIN_DIR.'/assets/css/admin/toolbox-style.php';
		add_action('admin_enqueue_scripts', 'dtb_toolbox_enqueue_scripts_admin');
	}
	$static_css_path = dtb_get_static_css_path();
	if($static_css_path) {
		add_action('wp_enqueue_scripts', 'dtb_enqueue_static_css', 20);
	}
	else {
		if ( empty ( $GLOBALS['wp_customize'] ) ) {
			require_once DTB_TOOLBOX_PLUGIN_DIR. '/assets/css/toolbox-css.php';
		}
		
	}
}
function dtb_load_plugin_textdomain() {
    load_plugin_textdomain( 'divi-toolbox');
}
add_action( 'init', 'dtb_load_plugin_textdomain' );


function dtb_register_clear_cache_route() {
    register_rest_route( 'dtb/v1', '/clear-cache', array(
      'methods' => 'GET',
		'callback' => 'dtb_clear_cache',
		'permission_callback' => '__return_true'
    	)
    );	
}

// Enqueue Admin Scripts
function dtb_toolbox_enqueue_scripts_admin() {
    $nonce   = "divi_toolbox_setting_nonce";
    if ( isset( $_GET['page'] ) && empty( $_GET[$nonce]) && ( ( 'divi_toolbox' === $_GET['page'] ) || ( 'dtb_toolbox_settings' === $_GET['page'] ) && wp_verify_nonce( sanitize_key( $_GET[$nonce] ), 'divi_toolbox_setting_nonce' ) ) ) {
	   wp_enqueue_style( 'wp-color-picker' );
	   wp_enqueue_script( 'wp-color-picker');
      wp_enqueue_script( 'dtb_on-off-switch', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/admin/on-off-switch.js', array( 'jquery' ));
      wp_enqueue_media();
      wp_enqueue_script( 'dtb_toolbox_settings-admin_js', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/admin/toolbox-admin-scripts.js', array('wp-color-picker'), '0.0.1',true);
      wp_enqueue_style('dtb-admin-css', DTB_TOOLBOX_PLUGIN_URI.'/assets/css/admin/admin-toolbox-styles.css');
	   wp_localize_script( 'dtb_toolbox_settings-admin_js', 'toolbox_values', array(
	   	'template_url' => get_option('siteurl'),
	   	'dtb_rest_api_root' => esc_url_raw( rest_url() ),
	   	'dtb_rest_api_nonce' => wp_create_nonce( 'wp_rest' )
	   ));
	}
}
// Enqueue Scripts
function dtb_scripts_styles_enqueue() {
	wp_enqueue_script('divi-toolbox-scripts', DTB_TOOLBOX_PLUGIN_URI. '/assets/js/toolbox-scripts.js', array( 'jquery' ), '1.6.5', true);
   $nonce   = "divi_toolbox_enqueue_nonce";
	
	wp_localize_script( 'divi-toolbox-scripts', 'toolbox_values', array(
		'dtb_enable_popup' => dtb_get_option('dtb_enable_popup'),
		'dtb_enable_typing' => dtb_get_option('dtb_enable_typing'),
		'dtb_mobile_parallax' => dtb_get_option('dtb_mobile_parallax'),
		'dtb_popup_number' => dtb_get_option('dtb_popup_number'),
		'dtb_readmore_text_enable' => dtb_get_option('dtb_readmore_text_enable'),
		'dtb_readmore_text' => empty(dtb_get_option('dtb_readmore_text')) ? __('Read More','divi-toolbox') : __(dtb_get_option('dtb_readmore_text'),'divi-toolbox'),
		'dtb_comments_text' => !empty(dtb_get_option('dtb_comments_text')) ? __(dtb_get_option('dtb_comments_text'), 'divi-toolbox') : 'Submit a Comment',
		'dtb_sec_btn_class' => !empty(dtb_get_option('dtb_sec_btn_class')) ? dtb_get_option('dtb_sec_btn_class') : 'dtb-button',
		'dtb_sticky_footer' => dtb_get_option('dtb_sticky_footer'),
		'dtb_social_enable' => dtb_get_option('dtb_social_enable'),
		'dtb_social_links' => dtb_get_option('dtb_social_links'),
		'dtb_instagram_url' => dtb_get_option('dtb_instagram_url'),
		'dtb_youtube_url' => dtb_get_option('dtb_youtube_url'),
		'dtb_linkedin_url' => dtb_get_option('dtb_linkedin_url'),
		'dtb_pinterest_url' => dtb_get_option('dtb_pinterest_url'),
		'dtb_tumblr_url' => dtb_get_option('dtb_tumblr_url'),
		'dtb_flickr_url' => dtb_get_option('dtb_flickr_url'),
		'dtb_dribble_url' => dtb_get_option('dtb_dribble_url'),
		'dtb_vimeo_url' => dtb_get_option('dtb_vimeo_url'),
		'dtb_skype_url' => dtb_get_option('dtb_skype_url'),
		'dtb_social_target' => dtb_get_option('dtb_social_target'),
		'dtb_social_move' => get_theme_mod('dtb_modcustomize_social_move'),
		'dtb_social_mobile_add' => get_theme_mod('dtb_modcustomize_social_mobile_add'),
		'dtb_btt' => dtb_get_option('dtb_btt'),
		'dtb_btt_link' => dtb_get_option('dtb_btt_link'),
		'dtb_btt_url' => dtb_get_option('dtb_btt_url'),
		'social_head_hover' => get_option('dtb_customize_social_head_hover'),
		'social_foot_hover' => get_option('dtb_customize_social_foot_hover'),
		'dtb_fixed_logo' => dtb_get_option('dtb_fixed_logo'),
		'dtb_fixed_logo_url' => dtb_get_option('dtb_fixed_logo_url'),
		'dtb_mobile_logo' => dtb_get_option('dtb_mobile_logo'),
		'dtb_mobile_logo_url' => dtb_get_option('dtb_mobile_logo_url'),
		'dtb_mobile_breakpoint' => dtb_get_option('dtb_mobile_breakpoint'),
		'cta_hover_style' => get_option('dtb_customize_cta_hover_style'),
		'dtb_cta_link' => dtb_get_option('dtb_cta_link'),
		'dtb_cta_link_type' => dtb_get_option('dtb_cta_link_type'),
		'dtb_mobile_nested' => dtb_get_option('dtb_mobile_nested'),
		'dtb_mobile_enable' => dtb_get_option('dtb_mobile_enable'),
		'dtb_enable_custom_m_menu' => dtb_get_option('dtb_enable_custom_m_menu'),
		'dtb_custom_m_menu' => dtb_get_option('dtb_custom_m_menu'),
		
		'dtb_m_m_animation_page' => get_theme_mod('dtb_modcustomize_m_m_animation_page'),
		'dtb_m_m_animation_type' => get_option('dtb_customize_m_m_container_animation_type'),
		'dtb_m_m_width' => get_theme_mod('dtb_modcustomize_m_m_width'),
		'dtb_m_m_width_max' => get_option('dtb_customize_m_m_width_max', '240'),
		'dtb_m_m_hamburger_show' => get_theme_mod('dtb_m_m_hamburger_show', '1'),
		'dtb_m_mobile_trigger' => dtb_get_option('dtb_m_mobile_trigger', ''),
		'dtb_sidebar_search' => get_theme_mod('dtb_modcustomize_sidebar_search'),
		'dtb_post_meta' => dtb_get_option('dtb_post_meta'),
		'dtb_post_author' => dtb_get_option('dtb_post_author'),
		'dtb_single_after_content_layout' => dtb_get_option('dtb_single_after_content_layout'),
		'dtb_post_related' => dtb_get_option('dtb_post_related'),
		'dtb_post_prev_next' => dtb_get_option('dtb_post_prev_next'),
		'dtb_archive_button' => get_theme_mod('dtb_modcustomize_archive_button', '1'),
		'dtb_archive_btn_hover' => get_option('dtb_customize_archive_btn_hover'),
		'dtb_archive_styles' => dtb_get_option('dtb_archive_styles'),
		'dtb_blog_layout' => dtb_get_option('dtb_blog_layout', 'blog_default'),
		'dtb_comments_styles' => dtb_get_option('dtb_comments_styles'),
		'dtb_comments_btn_hover' => get_option('dtb_customize_comments_btn_hover'),
		'dtb_hide_post_title' => dtb_get_option('dtb_hide_post_title'),
		'dtb_footer_reveal' => dtb_get_option('dtb_footer_reveal'),
		'dtb_footer_reveal_mobile_off' => dtb_get_option('dtb_footer_reveal_mobile_off'),
		'dtb_testimonial_photo' => dtb_get_option('dtb_testimonial_photo'),
		'dtb_enable_equal_height' => dtb_get_option('dtb_enable_equal_height'),
		'dtb_equal_height_blurb' => dtb_get_option('dtb_equal_height_blurb'),
		'dtb_equal_height_pricing' => dtb_get_option('dtb_equal_height_pricing'),
		'dtb_equal_height_quote' => dtb_get_option('dtb_equal_height_quote'),
		'dtb_equal_height_breakpoint' => dtb_get_option('dtb_equal_height_breakpoint'),
		'dtb_enable_sticky' => dtb_get_option('dtb_enable_sticky'),
		'dtb_buttons_hover' => get_option('dtb_customize_buttons_hover'),
		'dtb_sec_btn_hover' => get_option('dtb_customize_sec_btn_hover'),
		'dtb_follow_the_mouse' => dtb_get_option('dtb_follow_the_mouse'),
		'dtb_fixed_scroll' => dtb_get_option('dtb_fixed_scroll'),
		'dtb_fixed_scroll_offset' => dtb_get_option('dtb_fixed_scroll_offset'),
		'dtb_move_page_below_header' => dtb_get_option('dtb_move_page_below_header'),
		'dtb_equal_archive_img' => get_theme_mod('dtb_modcustomize_equal_archive_img'),
		'dtb_equal_archive_boxed' => get_theme_mod('dtb_modcustomize_equal_archive_boxed'),
      'dtb_vb_enabled'  => isset( $_GET[$nonce], $_POST[$nonce] ) && wp_verify_nonce( sanitize_key( $_POST[$nonce] ), $nonce ) ? isset( $_GET['et_fb'] ) : 'Disable'
	));
}

// Enqueue scripts for Theme Customizer
function dtb_customize_enqueue() {
	wp_enqueue_script( 'dtb_toolbox_settings-admin_js', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/admin/toolbox-admin-scripts.js', array(), '0.0.1',true);
	wp_enqueue_style('dtb-admin-css', DTB_TOOLBOX_PLUGIN_URI.'/assets/css/admin/admin-toolbox-styles.css');
		wp_localize_script( 'dtb_toolbox_settings-admin_js', 'toolbox_values', array(
			'template_url' => get_option('siteurl')
		));
}
add_action( 'customize_controls_enqueue_scripts', 'dtb_customize_enqueue' );

add_filter('customize_save_after', 'dtb_create_static_css');

// Setup Admin menu item
function dtb_toolbox_menu(){
   global $page_options;
   add_submenu_page('et_divi_options', __( 'Divi Toolbox', 'divi-toolbox' ), __( 'Divi Toolbox', 'divi-toolbox' ), 'manage_options', 'divi_toolbox', 'divi_toolbox' );	   
}
require_once(DTB_TOOLBOX_PLUGIN_DIR. 'functions/settings/port.php');

if ( ! function_exists( 'dtb_get_option' ) ) {
	function dtb_get_option( $dtb_option_name, $dtb_default_value = ''){
		$dtb_option_value = '';
		$dtb_toolbox_setting = maybe_unserialize( get_option( 'dtb_toolbox' ) );
		if ( $dtb_option_name != '' && is_array( $dtb_toolbox_setting ) && array_key_exists( $dtb_option_name,$dtb_toolbox_setting ) ){
			$dtb_option_value = $dtb_toolbox_setting[ $dtb_option_name ];
			if ( $dtb_option_value == '' && $dtb_default_value!= ''  ){
				$dtb_option_value = $dtb_default_value;
			}
		}
		return $dtb_option_value;
	}
}

// Plugin Settings Page
function divi_toolbox(){
		
	if( isset( $_GET['tab']) && !wp_verify_nonce( sanitize_key( $_GET['tab']) , 'tab' ) )  {
        $active_tab = sanitize_text_field( wp_unslash($_GET['tab']) );
    } else {
        $active_tab = 'admin';
    }
	
	$is_settings_updated = false;
	$nonce   = "divi_toolbox_slug_nonce"; 
	if ( isset( $_POST[ $nonce ] ) ) {
		$is_settings_updated         = true;
		$is_settings_updated_success = false;
		// Verify nonce and user permission
		if ( wp_verify_nonce( sanitize_text_field( wp_unslash($_POST[$nonce]) ), $nonce ) && current_user_can( 'switch_themes' ) ) {
         $dtb_toolbox_array = $_POST;
         if( !array_key_exists('dtb_enable_menu_hover', $dtb_toolbox_array ) || $dtb_toolbox_array['dtb_enable_menu_hover'] == 0 ) {
	         $dtb_toolbox_array['dtb_menu_type'] = '';
	      }

         if(isset($dtb_toolbox_array['dtb_custom_map_marker']) && isset($dtb_toolbox_array['dtb_custom_map_marker_image_url'])){
             if(!dtb_get_option('dtb_custom_map_marker') || $dtb_toolbox_array['dtb_custom_map_marker_image_url'] != dtb_get_option('dtb_custom_map_marker_image_url') ){
                 include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/modules/maps.php');
                 dtb_set_marker_icon( sanitize_text_field( wp_unslash($dtb_toolbox_array['dtb_custom_map_marker_image_url']) ) );
             }
         }
         if(!isset($dtb_toolbox_array['dtb_custom_map_marker']) && dtb_get_option('dtb_custom_map_marker')){
             include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/modules/maps.php');
             dtb_set_default_marker_icon();
         }
         $dtb_toolbox = maybe_serialize($dtb_toolbox_array);
         update_option( 'dtb_toolbox', $dtb_toolbox );
         $is_settings_updated_message = __( 'Divi Toolbox settings has been updated.','divi-toolbox' );
         $is_settings_updated_success = true;
         dtb_create_static_css();
		} else {
			$is_settings_updated_message = __( 'Error authenticating request. Please try again.','divi-toolbox' );
		}
	
	}
	?>
	<?php if ( $is_settings_updated ) { ?>
			<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible <?php echo $is_settings_updated_success ? '' : 'error' ?>">
				<p>
					<strong><?php echo esc_html( $is_settings_updated_message ); ?></strong>
				</p>
				<button type="button" class="notice-dismiss">
					<span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.' ,'divi-toolbox'); ?></span>
				</button>
			</div>
		<?php } ?>
	<div id="dtb">
		<div class="toolbox-head">
         <img src="<?php echo ( esc_attr(DTB_TOOLBOX_PLUGIN_URI). '/assets/img/toolbox-logo-white.svg' );?>" alt="Divi Toolbox"/>
         <div>
         	<a class="t-sett" href="?page=divi_toolbox&tab=settings">Settings</a>
				<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=divi_toolbox_settings' )); ?>" target="_blank">Customizer</a>
         </div>
		</div>
		<h2 class="nav-tab-wrapper">
	      <a href="?page=divi_toolbox&tab=admin" class="nav-tab <?php echo $active_tab == 'admin' ? 'nav-tab-active' : ''; ?>">Admin</a>
			<a href="?page=divi_toolbox&tab=global" class="nav-tab <?php echo $active_tab == 'global' ? 'nav-tab-active' : ''; ?>">Global</a>
	      <a href="?page=divi_toolbox&tab=header" class="nav-tab <?php echo $active_tab == 'header' ? 'nav-tab-active' : ''; ?>">Header</a>
	      <a href="?page=divi_toolbox&tab=footer" class="nav-tab <?php echo $active_tab == 'footer' ? 'nav-tab-active' : ''; ?>">Footer</a>
	      <a href="?page=divi_toolbox&tab=mobile" class="nav-tab <?php echo $active_tab == 'mobile' ? 'nav-tab-active' : ''; ?>">Mobile</a>
			<a href="?page=divi_toolbox&tab=blog" class="nav-tab <?php echo $active_tab == 'blog' ? 'nav-tab-active' : ''; ?>">Blog</a>
			<a href="?page=divi_toolbox&tab=modules" class="nav-tab <?php echo $active_tab == 'modules' ? 'nav-tab-active' : ''; ?>">Modules</a>
	   </h2>
		
	   <form action="" method="POST" class="et-divi-toolbox-form" id='dtb_settings_form' enctype="multipart/form-data" >
			<div class="page-container">
				<div class="dtb-loader">
					<div class="status">
					<img src="<?php echo ( esc_attr(DTB_TOOLBOX_PLUGIN_URI). '/assets/img/toolbox-icon.svg' );?>"/>
					</div>
				</div>
															
			<?php
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/admin.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/global.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/header.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/footer.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/mobile.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/blog.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/modules.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/settings.php' );
				include_once( DTB_TOOLBOX_PLUGIN_DIR. '/tools/deprecated.php' );
			?>									
			</div><!-- /.page-container -->
			<div id="et-epanel-bottom">
				<?php
					// Print nonce
					wp_nonce_field( $nonce, $nonce );
					// Print submit button
					printf(
						'<button class="et-save-button" name="save" id="epanel-save">%s</button>',
						esc_attr( 'Save Settings' )
					);
				?>
			</div>
		</form>
		<div id="dtb-epanel-ajax-saving">
         <img src="<?php echo esc_attr(content_url( 'themes/Divi/core/admin/images/ajax-loader.gif' ));  ?>" alt="loading">
		</div>
	</div> 
	<div class="foot-links">
	   <a href="?page=divi_toolbox&tab=settings">Plugin Settings</a>
	   <a href="?page=divi_toolbox&tab=deprecated">Deprecated</a>
      <a href="<?php echo esc_attr(url_docs); ?>" target="_blank">Documentation</a>
		<a href="<?php echo esc_attr(url_support); ?>" target="_blank">Support</a>
	</div>
<?php
}


// Allow SVG Files Uploads 
$dtb_svg_uploads_val = dtb_get_option('dtb_svg_uploads');
if ($dtb_svg_uploads_val == '1' ){
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/svg-support.php');
}



// Allow TTF Files Uploads 
$dtb_ttf_uploads_val = dtb_get_option('dtb_ttf_uploads');
if ($dtb_ttf_uploads_val == '1' ){
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/ttf-support.php');
}



// Toolbox Custom Layouts
	
function dtb_custom_layouts() {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/header/custom-layouts.php');
}	
function dtb_blog_content_layouts() {
		$dtb_blog_content_layout_val = dtb_get_option('dtb_blog_content_layout');
		if ( $dtb_blog_content_layout_val != ''){
			echo '<div id="dtb-after-blog-content">';
			dtb_display_divi_section($dtb_blog_content_layout_val);
			echo '</div>';
		}
}
function dtb_single_post_before_content_layout() {
	$dtb_single_before_content_layout_val = dtb_get_option('dtb_single_before_content_layout');
	if ( $dtb_single_before_content_layout_val != ''){	
		echo '<div class="dtb-before-single-post">';
		dtb_display_divi_section($dtb_single_before_content_layout_val);
		echo '</div>';
	}
}
function dtb_single_post_after_content_layout() {
	$dtb_single_after_content_layout_val = dtb_get_option('dtb_single_after_content_layout');
	if ( $dtb_single_after_content_layout_val != ''){	
		echo '<div class="dtb-after-single-post">';
		dtb_display_divi_section($dtb_single_after_content_layout_val);
		echo '</div>';
	}
}


// Custom Mobile Menu
function dtb_enable_custom_m_menu(){
	$dtb_enable_custom_m_menu_val = dtb_get_option('dtb_enable_custom_m_menu');
	$dtb_mobile_enable_val = dtb_get_option('dtb_mobile_enable');
	if ( ( $dtb_enable_custom_m_menu_val != '') && ( $dtb_mobile_enable_val != '') ){
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/mobile/mobile-menu.php');
	}
}


// 404 page 
function dtb_404_override() {	
	$dtb_404_layout_val = dtb_get_option('dtb_404_layout');
		if (( $dtb_404_layout_val != '') && ( $dtb_404_layout_val != 'none') && is_404()) { 
		get_header();
		dtb_display_divi_section($dtb_404_layout_val);
		get_footer();
		exit;
		}
}

// Move Social Icons
function dtb_move_social_icons() {
		$dtb_social_move_val = get_theme_mod('dtb_modcustomize_social_move');
		$dtb_social_enable = dtb_get_option('dtb_social_enable');
		if ( ($dtb_social_move_val == '1') && ( $dtb_social_enable == '1')){
			get_template_part( 'includes/social_icons', 'header' );
		}
}

// Add Social Icons Mobile
function dtb_add_social_icons_mobile() {
		$dtb_social_mobile_add_val = get_theme_mod('dtb_modcustomize_social_mobile_add');
		$dtb_social_enable = dtb_get_option('dtb_social_enable');
		if ( ($dtb_social_mobile_add_val == '1') && ( $dtb_social_enable == '1')){
			get_template_part( 'includes/social_icons', 'header' );
		}
}

// Preloader
function dtb_preloader() {
	$dtb_preloader_val = dtb_get_option('dtb_preloader', '1');
	$dtb_preloader_home_val = dtb_get_option('dtb_preloader_home', '0');
	$dtb_preloader_type_val = dtb_get_option('dtb_preloader_type', 'preloader1');
	$dtb_preloader_type_val = !empty($dtb_preloader_type_val) ? $dtb_preloader_type_val : 'preloader1'; 
	
    if ( ! isset( $_GET['et_fb'] ) && ( ( $dtb_preloader_val == '1' && $dtb_preloader_home_val == '1' && is_front_page() ) && ! wp_verify_nonce( sanitize_key( $_GET['et_fb'], 'et_fb' ) ) || ( $dtb_preloader_val == '1' && $dtb_preloader_home_val != '1' ) ) ){
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/global/preloaders.php');
		add_action('et_before_main_content', 'dtb_preloader_enable');
		if (is_page_template( 'page-template-blank.php' )) {
			add_action('wp_head','dtb_preloader_enable');
		}
	}
}

// Preloader Scripts
function dtb_preloader_enable_js(){ 
	$dtb_preloader_val = dtb_get_option('dtb_preloader', '1');
	$dtb_preloader_home_val = dtb_get_option('dtb_preloader_home');
	$dtb_preloader_effect_val = dtb_get_option('dtb_preloader_effect');
	$dtb_preloader_speed_val = dtb_get_option('dtb_preloader_speed');
	
	if (( ($dtb_preloader_val == '1') && ($dtb_preloader_home_val == '1') && (is_front_page()) ) || ( ($dtb_preloader_val == '1') && ($dtb_preloader_home_val != '1') ))  {  ?>
		<script type="text/javascript" name="preloader">
			jQuery(window).load(function(){	
                jQuery('.status').fadeOut('<?php echo esc_attr($dtb_preloader_speed_val); ?>');
                jQuery('.preloader').<?php echo esc_attr($dtb_preloader_effect_val); ?>('<?php echo esc_attr($dtb_preloader_speed_val); ?>');
			})
		</script>
	<?php }	

}

// New Body Classes
function dtb_body_classes() {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/body-classes.php');
}	

// Add Single post elements
function dtb_add_single_post_elements() {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/blog/single-post.php');
}


// Layouts Shortcode
function dtb_layout_shortcode(){
	$dtb_layout_shortcode = dtb_get_option('dtb_layout_shortcode');
	if ($dtb_layout_shortcode == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/shortcodes.php');
	}
}

// Hide Projects Post Type
function dtb_hide_projects(){
	$dtb_hide_projects = dtb_get_option('dtb_hide_projects');
	if ($dtb_hide_projects == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/projects-hide.php');
	}
}

// Rename Projects Post Type
function dtb_rename_projects(){
	$dtb_rename_projects = dtb_get_option('dtb_rename_projects');
	if ($dtb_rename_projects == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/projects-rename.php');
	}
}

// Login Page Edits 
function dtb_custom_login_link(){
	$dtb_custom_login = dtb_get_option('dtb_custom_login');
	if ($dtb_custom_login == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/login.php');
	}
}



// Custom Password Protected Page
function dtb_custom_password_form(){
	$dtb_enable_password_val = dtb_get_option('dtb_enable_password');
	if ($dtb_enable_password_val == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/general/password-form.php');
	}
}

	
// 3D Tilt 
function dtb_enable_tilt(){
	$dtb_enable_tilt = dtb_get_option('dtb_enable_tilt');
	if ($dtb_enable_tilt == '1') {
		function dtb_tilt_scripts() {
			if ( function_exists('et_core_is_fb_enabled') && ( ! et_core_is_fb_enabled() )) {
			   wp_enqueue_script( 'dtb-tilt', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/tilt.js', array( 'jquery' ), '', true );
		   }	
		   wp_localize_script( 'dtb-tilt', 'tilt_values', array(
				'max_tilt' => get_option('dtb_customize_tilt_max_tilt', '20'),
				'perspective' => get_option('dtb_customize_tilt_perspective', '1000'),
				'scale' => get_option('dtb_customize_tilt_scale', '1'),
				'speed' => get_option('dtb_customize_tilt_speed', '300'),
				'glare' => get_theme_mod('dtb_modcustomize_tilt_glare', '1'),		
				'max_glare' => get_option('dtb_customize_tilt_max_glare', '.5')
			));
		}
		add_action( 'wp_enqueue_scripts', 'dtb_tilt_scripts' );
	}
}

// Sticky Elements
function dtb_enable_sticky(){
	$dtb_enable_sticky = dtb_get_option('dtb_enable_sticky');
	$dtb_enable_sticky_js = dtb_get_option('dtb_enable_sticky_js');
	if (($dtb_enable_sticky == '1') && ($dtb_enable_sticky_js == '1')) {
		function dtb_sticky_scripts() {
			if ( function_exists('et_core_is_fb_enabled') && ( ! et_core_is_fb_enabled() )) {
			   wp_enqueue_script( 'dtb-sticky', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/sticky.js', array( 'jquery' ), '', true );
		   }	
		   wp_localize_script( 'dtb-sticky', 'sticky_values', array(
				'dtb_sticky_class' => dtb_get_option('dtb_sticky_class', '#stick-this'),
				'dtb_sticky_pushup_class' => dtb_get_option('dtb_sticky_pushup_class', '.un-stick'),
				'dtb_sticky_offset' => dtb_get_option('dtb_sticky_offset', '0'),
				'dtb_sticky_breakpoint' => dtb_get_option('dtb_sticky_breakpoint', '980')
			));
		}
		add_action( 'wp_enqueue_scripts', 'dtb_sticky_scripts' );
	}
}


// Typing Effect 
function dtb_enable_typing(){
	$dtb_enable_typing = dtb_get_option('dtb_enable_typing');
	if ($dtb_enable_typing == '1') {
		function dtb_typing_scripts() {
			if ( function_exists('et_core_is_fb_enabled') && ( ! et_core_is_fb_enabled() )) {
			   wp_enqueue_script( 'dtb-typing', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/typed.js', array( 'jquery' ), '', true );
		   }	
		   wp_localize_script( 'dtb-typing', 'typing_values', array(
				'speed' => get_option('dtb_customize_typing_speed', '100'),
				'start_delay' => get_option('dtb_customize_typing_start_delay', '0'),
				'back_speed' => get_option('dtb_customize_typing_back_speed', '0'),
				'back_delay' => get_option('dtb_customize_typing_back_delay', '1000'),
				'smart_backspace' => get_theme_mod('dtb_modcustomize_typing_smart_backspace', '1'),		
				'loop' => get_theme_mod('dtb_modcustomize_typing_loop', '1'),		
				'cursor' => get_theme_mod('dtb_modcustomize_typing_cursor', '1')
			));
		}
		add_action( 'wp_enqueue_scripts', 'dtb_typing_scripts', 22 );
	}
}
// Particles BG
function dtb_enable_particles(){
    $dtb_enable_particles = dtb_get_option('dtb_enable_particles');
    $dtb_particles_mobile_off = dtb_get_option('dtb_particles_mobile_off');
    
    if ($dtb_enable_particles == '1') {
	   if ( (($dtb_particles_mobile_off == '1') && (! wp_is_mobile()) ) || ($dtb_particles_mobile_off != '1')  ) {
	      function dtb_particles_scripts() {
	         if ( function_exists('et_core_is_fb_enabled') && ( ! et_core_is_fb_enabled() )) {
	            wp_enqueue_script( 'dtb-particles-bg', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/particles.js', array( 'jquery' ), '', true );
	         }
	         wp_localize_script( 'dtb-particles-bg', 'dtb', array(
             'particles1_number' => get_option('dtb_customize_particles1_number', '80'),
             'particles1_color' => get_option('dtb_customize_particles1_color', '#BDC8D5'),
             'particles1_opacity' => get_option('dtb_customize_particles1_opacity', '0.5'),
             'particles1_shape' => get_option('dtb_customize_particles1_shape', 'circle'),
             'particles1_size' => get_option('dtb_customize_particles1_size', '3'),
             'particles1_speed' => get_option('dtb_customize_particles1_speed', '6'),
             'particles1_lines' => get_option('dtb_customize_particles1_lines', '1'),
             'particles1_lines_color' => get_option('dtb_customize_particles1_lines_color', '#BDC8D5'),
             'particles1_lines_opacity' => get_option('dtb_customize_particles1_lines_opacity', '0.4'),
             'particles1_activity' => get_option('dtb_customize_particles1_activity', 'none'),
             'particles2_number' => get_option('dtb_customize_particles2_number', '80'),
             'particles2_color' => get_option('dtb_customize_particles2_color', '#BDC8D5'),
             'particles2_opacity' => get_option('dtb_customize_particles2_opacity', '0.5'),
             'particles2_shape' => get_option('dtb_customize_particles2_shape', 'circle'),
             'particles2_size' => get_option('dtb_customize_particles2_size', '3'),
             'particles2_speed' => get_option('dtb_customize_particles2_speed', '6'),
             'particles2_lines' => get_option('dtb_customize_particles2_lines', '1'),
             'particles2_lines_color' => get_option('dtb_customize_particles2_lines_color', '#BDC8D5'),
             'particles2_lines_opacity' => get_option('dtb_customize_particles2_lines_opacity', '0.4'),
             'particles2_activity' => get_option('dtb_customize_particles2_activity', 'none')
				));
			}
	      add_action( 'wp_enqueue_scripts', 'dtb_particles_scripts' );
	   }
    }
}

// Rellax - Modules Scroll
function dtb_enable_rellax(){
	$dtb_enable_rellax = dtb_get_option('dtb_enable_rellax');
	if ($dtb_enable_rellax == '1') {
		function dtb_rellax_scripts() {
			if ( function_exists('et_core_is_fb_enabled') && ( ! et_core_is_fb_enabled() )) {
			   wp_enqueue_script( 'dtb-rellax', DTB_TOOLBOX_PLUGIN_URI . '/assets/js/rellax.js', array( 'jquery' ), '', true );	
		   }
			wp_localize_script( 'dtb-rellax', 'dtb2', array(
				'rellax_center' => dtb_get_option('dtb_rellax_center', '')
			));
		}
		add_action( 'wp_enqueue_scripts', 'dtb_rellax_scripts' );
	}
}

	
// Mobile Theme Color
function dtb_enable_theme_color(){
	$dtb_mobile_theme_color_enable_val = dtb_get_option('dtb_mobile_theme_color_enable');
	if ($dtb_mobile_theme_color_enable_val != '') {
		$dtb_mobile_theme_color_val = dtb_get_option('dtb_mobile_theme_color');
        echo '<meta name="theme-color" content="'.esc_attr($dtb_mobile_theme_color_val).'">';
        echo '<meta name="msapplication-navbutton-color" content="'.esc_attr($dtb_mobile_theme_color_val).'">';
		echo '<meta name="apple-mobile-web-app-capable" content="yes">';
		echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
	}
}


// Update map marker
function dtb_theme_upgrade_function( $upgrader_object, $options ) {
     if ($options['action'] == 'update' && $options['type'] == 'theme' && dtb_get_option('dtb_custom_map_marker') && dtb_get_option('dtb_custom_map_marker_image_url') ){
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/modules/maps.php');
		dtb_set_marker_icon(dtb_get_option('dtb_custom_map_marker_image_url'));
    }
}

function dtb_upgrade($upgrader_object, $options){
	$dtb_plugin_path_name = plugin_basename( __FILE__ );

    if ($options['action'] == 'update' && $options['type'] == 'plugin' ){
       foreach($options['plugins'] as $each_plugin){
          if ($each_plugin==$dtb_plugin_path_name){
			 dtb_change_options(wp_load_alloptions());
			 dtb_change_theme_mod(get_theme_mods());
          }
       }
    }
}


global $wp_customize;

if(wp_get_theme() == 'Divi' || wp_get_theme()->parent() == 'Divi' || strpos($theme->Name, 'Divi')!==false || strpos($template, 'Divi')!==false){
   if ( isset($_POST['wp_customize']) && isset($_GET['customize_theme']) && $_GET['customize_theme'] != 'Divi' && $_GET['customize_theme'] != get_stylesheet() && wp_verify_nonce( sanitize_key( $_GET['customize_theme'] ),'customize_theme' ) ) {
	   return;
	}

	else{
		add_action('et_before_content', 'dtb_add_single_post_elements');
		if (empty($_GET['et_tb'])) {
			add_action('et_theme_builder_template_after_body', 'dtb_add_single_post_elements');
		}

		add_action('wp_head', 'dtb_preloader_enable_js');
		add_action('wp_head', 'dtb_enable_theme_color');
		add_action('rest_api_init', 'dtb_register_clear_cache_route' );
		add_action('et_before_content', 'dtb_blog_content_layouts');
		
		add_action('wp_footer', 'dtb_add_social_icons_mobile');
		add_action('et_before_post', 'dtb_single_post_before_content_layout');
		add_action('et_after_post', 'dtb_single_post_after_content_layout');

		add_action('admin_menu', 'dtb_export_settings');
		add_action('admin_menu', 'dtb_import_settings');
		add_action('admin_menu','dtb_toolbox_menu', 30);
		add_action('et_header_top', 'dtb_move_social_icons');
		add_filter('template_redirect', 'dtb_404_override' );
		add_action('parse_query','dtb_preloader');
		dtb_body_classes();
		dtb_custom_layouts();
		dtb_enable_particles();
		dtb_enable_rellax();
		dtb_enable_tilt();
		dtb_enable_sticky();
		dtb_enable_typing();
		dtb_enable_custom_m_menu();
		dtb_hide_projects();
		dtb_hide_projects();
		dtb_rename_projects();
		dtb_layout_shortcode();
		dtb_custom_login_link();
		dtb_custom_password_form();
		add_action('plugins_loaded', 'dtb_toolbox_init');
		add_action('upgrader_process_complete', 'dtb_theme_upgrade_function', 10, 2 );
		
	}
}

include_once(DTB_TOOLBOX_PLUGIN_DIR . 'util/pre-1_2-options.php');


?>