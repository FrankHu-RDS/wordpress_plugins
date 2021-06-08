<?php
function dtb_customize_register( $wp_customize ) {
 
class Toolbox_Descriptions extends WP_Customize_Control {
	public $type = 'simple_notice';
	public function render_content() { ?>
		<div class="simple-notice-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
				<div class="dtb-control-title"><?php echo esc_html( $this->label ); ?></div>
			<?php } if( !empty( $this->description ) ) { ?>
			<div class="dtb-control-description"><?php echo wp_kses_post( $this->description ); ?></div>
			<?php } ?>
		</div>
	<?php }
}
class Toolbox_Toggle extends WP_Customize_Control {
	public $type = 'toggle';
	public function render_content() { ?>
		<div class="toggle-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
			<h3><?php echo esc_html( $this->label ); ?></h3>
			<i></i>
			<?php } ?>
		</div>
	<?php }
}
class Toolbox_Label extends WP_Customize_Control {
	public $type = 'simple_label';
	public function render_content() { ?>
		<div class="simple-label-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
				<div class="customize-control-title"><?php echo esc_html( $this->label ); ?></div>
			<?php } if( !empty( $this->description ) ) { ?>
				<div class="dtb-label-description"><?php echo wp_kses_post( $this->description ); ?></div>
			<?php } ?>
		</div>
	<?php }
}
class Toolbox_Mini_Text extends WP_Customize_Control {
	public $type = 'mini_text';
	public function render_content() { ?>
		<div class="mini-text-custom-control">
			<?php if ( ! empty( $this->label ) ) : ?>
				<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span id="<?php echo esc_attr( $description_id ); ?>" class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			<input
				id="<?php echo esc_attr( $this->id ); ?>"
				class="mini-text"
				type="text" value="<?php echo esc_attr( $this->value() ); ?>"
					
					<?php $this->link(); ?>
					/>
		</div>
	<?php }
}

class Toolbox_Image_Radio extends WP_Customize_Control {
	public $type = 'image_radio';
	public function render_content() { ?>
		<div class="image-radio-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
				<div class="radio-labels">
			<?php foreach ( $this->choices as $key => $value ) { ?>
				<label class="radio-button-label">
					<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
					<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
				</label>
			<?php	} ?>
				</div>
		</div>
	<?php }
}

// Font Settings
$site_domain = get_locale();
$google_fonts = et_builder_get_fonts( array(
	'prepend_standard_fonts' => false,
) );
$user_fonts = et_builder_get_custom_fonts();
$google_fonts = array_merge( $user_fonts, $google_fonts );

$et_domain_fonts = array(
	'ru_RU' => 'cyrillic',
	'uk'    => 'cyrillic',
	'bg_BG' => 'cyrillic',
	'vi'    => 'vietnamese',
	'el'    => 'greek',
	'ar'    => 'arabic',
	'he_IL' => 'hebrew',
	'th'    => 'thai',
	'si_lk' => 'sinhala',
	'bn_bd' => 'bengali',
	'ta_lk' => 'tamil',
	'te'    => 'telegu',
	'km'    => 'khmer',
	'kn'    => 'kannada',
	'ml_in' => 'malayalam',
);

$et_one_font_languages = et_get_one_font_languages();

$font_choices = array();
$font_choices['none'] = array(
	'label' => 'Default Theme Font'
);

$removed_fonts_mapping = et_builder_old_fonts_mapping();

foreach ( $google_fonts as $google_font_name => $google_font_properties ) {
	$use_parent_font = false;

	if ( isset( $removed_fonts_mapping[ $google_font_name ] ) ) {
		$parent_font = $removed_fonts_mapping[ $google_font_name ]['parent_font'];
		$google_font_properties['character_set'] = $google_fonts[ $parent_font ]['character_set'];
		$use_parent_font = true;
	}

	if ( '' !== $site_domain && isset( $et_domain_fonts[$site_domain] ) && isset( $google_font_properties['character_set'] ) && false === strpos( $google_font_properties['character_set'], $et_domain_fonts[$site_domain] ) ) {
		continue;
	}

	$font_choices[ $google_font_name ] = array(
		'label' => $google_font_name,
		'data'  => array(
			'parent_font'    => $use_parent_font ? $google_font_properties['parent_font'] : '',
			'parent_styles'  => $use_parent_font ? $google_fonts[$parent_font]['styles'] : $google_font_properties['styles'],
			'current_styles' => $use_parent_font && isset( $google_fonts[$parent_font]['styles'] ) && isset( $google_font_properties['styles'] ) ? $google_font_properties['styles'] : '',
			'parent_subset'  => $use_parent_font && isset( $google_fonts[$parent_font]['character_set'] ) ? $google_fonts[$parent_font]['character_set'] : '',
			'standard'       => isset( $google_font_properties['standard'] ) && $google_font_properties['standard'] ? 'on' : 'off',
		)
	);
}

$dtb_submenu = dtb_get_option('dtb_submenu');
$dtb_cta_link = dtb_get_option('dtb_cta_link');
$dtb_logo_box = dtb_get_option('dtb_logo_box');
$dtb_btt = dtb_get_option('dtb_btt');
$dtb_preloader = dtb_get_option('dtb_preloader');
$dtb_enable_popup = dtb_get_option('dtb_enable_popup');
$dtb_social_enable = dtb_get_option('dtb_social_enable');
$dtb_mobile_enable = dtb_get_option('dtb_mobile_enable');
$dtb_enable_hamburger_icon = dtb_get_option('dtb_enable_hamburger_icon');
$dtb_enable_custom_m_menu = dtb_get_option('dtb_enable_custom_m_menu');
$dtb_m_mobile_elements_social = dtb_get_option('dtb_m_mobile_elements_social');
$dtb_m_mobile_trigger = dtb_get_option('dtb_m_mobile_trigger');
$dtb_mobile_nested = dtb_get_option('dtb_mobile_nested');
$show_search_icon = get_theme_mod('show_search_icon', '1');
$dtb_enable_menu_hover = dtb_get_option('dtb_enable_menu_hover');
$dtb_menu_type = dtb_get_option('dtb_menu_type');
$dtb_custom_footer_enable = dtb_get_option('dtb_custom_footer_enable');
$dtb_sidebar_styles = dtb_get_option('dtb_sidebar_styles');
$dtb_archive_styles = dtb_get_option('dtb_archive_styles');
$dtb_post_meta = dtb_get_option('dtb_post_meta');
$dtb_post_author = dtb_get_option('dtb_post_author');
$dtb_post_prev_next = dtb_get_option('dtb_post_prev_next');
$dtb_post_related = dtb_get_option('dtb_post_related');
$dtb_comments_styles = dtb_get_option('dtb_comments_styles');
$dtb_global_headings = dtb_get_option('dtb_global_headings');
$dtb_scrollbar = dtb_get_option('dtb_scrollbar');
$dtb_enable_particles = dtb_get_option('dtb_enable_particles');
$dtb_enable_tilt = dtb_get_option('dtb_enable_tilt');
$dtb_enable_typing = dtb_get_option('dtb_enable_typing');
$dtb_follow_the_mouse = dtb_get_option('dtb_follow_the_mouse');
$dtb_sec_btn = dtb_get_option('dtb_sec_btn');
$dtb_enable_password = dtb_get_option('dtb_enable_password');


// New Toolbox Settings Panel
$wp_customize->add_panel( 'divi_toolbox_settings', array(
    'priority' => 1,
    'capability' => 'edit_theme_options',
    'title' => __('Divi Toolbox', ''),
    'description' => __('Customize your website with Divi Toolbox Plugin.', 'divi-toolbox'),
));


$wp_customize->add_section( 'dtb_general' , array(
	'title' => __( 'Global', 'divi-toolbox'),
	'priority' => 0,
	'panel' => 'divi_toolbox_settings',
));
$wp_customize->add_section( 'dtb_header' , array(
	'title' => __( 'Header', 'divi-toolbox'),
	'priority' => 0,
	'panel' => 'divi_toolbox_settings',
));
$wp_customize->add_section( 'dtb_footer' , array(
	'title' => __( 'Footer', 'divi-toolbox'),
	'priority' => 0,
	'panel' => 'divi_toolbox_settings',
)); 
$wp_customize->add_section( 'dtb_blog' , array(
	'title' => __( 'Blog', 'divi-toolbox'),
	'priority' => 0,
	'panel' => 'divi_toolbox_settings',
)); 

if (($dtb_mobile_enable == '1') || ($dtb_enable_hamburger_icon == '1') || ($dtb_social_enable == '1') || ($dtb_mobile_nested == '1')) { 
	$wp_customize->add_section( 'dtb_mobile' , array(
		'title' => __( 'Mobile', 'divi-toolbox'),
		'priority' => 0,
		'panel' => 'divi_toolbox_settings',
	));
}
$wp_customize->add_section( 'dtb_modules' , array(
	'title' => __( 'Modules', 'divi-toolbox'),
	'priority' => 0,
	'panel' => 'divi_toolbox_settings',
));

// Font Weights
$font_weights = array(
	'100'   => __( 'Thin', 'divi-toolbox' ),
   '200'  => __( 'Ultra Light', 'divi-toolbox' ),
   '300'  => __( 'Light', 'divi-toolbox' ),
   '400'  => __( 'Regular', 'divi-toolbox' ),
	'500'   => __( 'Medium','divi-toolbox' ),
   '600'  => __( 'Semi Bold', 'divi-toolbox' ),
   '700'  => __( 'Bold', 'divi-toolbox' ),
   '800'  => __( 'Ultra Bold', 'divi-toolbox' ),
   '900'  => __( 'Heavy', 'divi-toolbox' )
);

// Text Transform
$text_transform = array(
	'none' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/tt-none.svg',
		'name' => __( 'None', 'divi-toolbox' )
	),
	'uppercase' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/tt-uppercase.svg',
		'name' => __( 'Uppercase', 'divi-toolbox' )
	),
	'capitalize' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/tt-capitalize.svg',
		'name' => __( 'Capitalize', 'divi-toolbox' )
	),
	'lowercase' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/tt-lowercase.svg',
		'name' => __( 'Lowercase', 'divi-toolbox' )
	),
	'small-caps' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/tt-smallcaps.svg',
		'name' => __( 'Small Caps', 'divi-toolbox' )
	)
);

// Text Align
$text_align = array(
	'left' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/align-left.svg',
		'name' => __( 'Left', 'divi-toolbox' )
	),
	'center' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/align-center.svg',
		'name' => __( 'Center', 'divi-toolbox' )
	),
	'right' => array(
		'image' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/img/align-right.svg',
		'name' => __( 'Right', 'divi-toolbox' )
	)
);

// Gradient Direction
$gradient = array(
	'to bottom'   => __( '↓ Bottom', 'divi-toolbox' ),
   'to bottom left'  => __( '↙ Bottom Left', 'divi-toolbox' ),
   'to left'  => __( '← Left', 'divi-toolbox' ),
   'to top left'  => __( '↖ Top Left', 'divi-toolbox' ),
	'to top'   => __( '↑ Top', 'divi-toolbox' ),
   'to top right'  => __( '↗ Top Right', 'divi-toolbox' ),
   'to right'  => __( '→ Right', 'divi-toolbox' ),
   'to bottom right'  => __( '↘ Bottom Right', 'divi-toolbox' )
);

// Background Size
$bgsize = array(
	'cover'   => __( 'Cover', 'divi-toolbox' ),
   'contain'  => __( 'Fit', 'divi-toolbox' ),
   'auto'  => __( 'Actual Size', 'divi-toolbox' )
);

$bgposition = array(
	'top left'   => __( 'Top Left', 'divi-toolbox' ),
	'top center'   => __( 'Top Center', 'divi-toolbox' ),
	'top right'   => __( 'Top Right', 'divi-toolbox' ),
	'center left'   => __( 'Center Left', 'divi-toolbox' ),
	'center'   => __( 'Center', 'divi-toolbox' ),
	'center right'   => __( 'Center Right', 'divi-toolbox' ),
	'bottom left'   => __( 'Bottom Left', 'divi-toolbox' ),
	'bottom center'   => __( 'Bottom Center', 'divi-toolbox' ),
	'bottom right'   => __( 'Bottom Right', 'divi-toolbox' )
);

// Blend Modes
$blend_modes = array(
	'normal'   => __( 'Normal', 'divi-toolbox' ),
   'color'  => __( 'Color', 'divi-toolbox' ),
   'color-burn'  => __( 'Color Burn', 'divi-toolbox' ),
   'color-dodge'  => __( 'Color Dodge', 'divi-toolbox' ),
	'darken'   => __( 'Darken', 'divi-toolbox' ),
   'difference'  => __( 'Difference', 'divi-toolbox' ),
   'exclusion'  => __( 'Exclusion', 'divi-toolbox' ),
   'hard-light'  => __( 'Hard Light', 'divi-toolbox' ),
   'hue'  => __( 'Hue', 'divi-toolbox' ),
   'lighten'  => __( 'Lighten', 'divi-toolbox' ),
   'luminosity'  => __( 'Luminosity', 'divi-toolbox' ),
   'multiply'  => __( 'Multiply', 'divi-toolbox' ),
   'overlay'  => __( 'Overlay', 'divi-toolbox' ),
   'saturation'  => __( 'Saturation', 'divi-toolbox' ),
   'screen'  => __( 'Screen', 'divi-toolbox' ),
   'soft-light'  => __( 'Soft Light', 'divi-toolbox' )
);

// Global Fonts & Headings
$wp_customize->add_setting( 'dtb_customize_title_headings', array(
	'default' => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
));
$wp_customize->add_control( new Toolbox_Toggle( $wp_customize, 'dtb_customize_title_headings', array(
	'label' => __( 'Global Font Settings', 'divi-toolbox' ),
	'section' => 'dtb_general'
)));
$wp_customize->add_setting( 'dtb_customize_body_font_weight', array(
	'default'       => 400,
	'type'			  => 'option',
	'capability'    => 'edit_theme_options'
));
$wp_customize->add_control( 'dtb_customize_body_font_weight', array(
	'label'	      => __('Body Font Weight', 'divi-toolbox'),
	'section'     => 'dtb_general',
	'type'			=> 'select',
	'choices' => $font_weights
));
if ($dtb_global_headings == '1' ) {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/global-headings.php');
} // end global headings

// Preloader
if ($dtb_preloader == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/preloader.php');
}
// Popups
if ($dtb_enable_popup == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/popups.php');
}

// Password Protected Page
if ($dtb_enable_password == '1' ) {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/password-form.php');
}

// Particles
if ($dtb_enable_particles == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/particles.php');
}

// Scrollbar
if ($dtb_scrollbar == '1' ) {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/scrollbar.php');
}



// Main Header
include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/main-header.php');

// Primary Navigation
include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/primary-nav.php');

//Top Bar
include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/top-bar.php');

// Submenu
if ($dtb_submenu == '1') {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/submenu.php');
}

// Overlapping Logo
if ($dtb_logo_box == '1') {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/logo-box.php');
}

// CTA Menu Item
if ($dtb_cta_link == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/cta-link.php');
}




// Blog

// Categories & Archives
if ($dtb_archive_styles != '' ) {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/blog-styles.php');	
}

// Sidebar & Widgets
if ($dtb_sidebar_styles == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/sidebar-widgets.php');	
}

//Post Meta
if ($dtb_post_meta == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/post-meta.php');
}

// Author Box
if ($dtb_post_author == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/author-box.php');	
}

// Prev Next 
if ($dtb_post_prev_next == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/prev-next.php');	
}

// Related Posts
if ($dtb_post_related == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/related-posts.php');
}

// Comments
if ($dtb_comments_styles == '1') {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/comments.php');
}




if (($dtb_mobile_enable != '1') && ($dtb_enable_hamburger_icon == '1')) { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-icons.php');
}
	
if (($dtb_mobile_enable == '1') && ($dtb_enable_custom_m_menu != '1')) { 
	// Mobile Menu Bar
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-bar.php');
	// Hamburger & Search Icon
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-icons.php');
	// Mobile Menu
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu.php');
	// Mobile Menu Links
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-links.php');
}

if (($dtb_mobile_enable == '1') && ($dtb_enable_custom_m_menu == '1')) { 
	// Mobile Menu Bar
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-bar.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-menu-icons.php');
	if ($dtb_m_mobile_trigger == '1') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-trigger.php');
	}
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-container.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-animation.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-logo.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-links-custom.php');
	
}

// Nested Menus
if ($dtb_mobile_nested == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-submenu.php');	
}

if (($dtb_mobile_enable == '1') && ($dtb_enable_custom_m_menu == '1')) { 
	// Mobile Menu Bar cd.
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-links-cta.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-searchbar.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-widgets.php');
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-m-shop-link.php');
}

// Footer Menu & Widgets
if ($dtb_custom_footer_enable == '1') {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/footer-menu-widgets.php');	
}

// Footer Bottom Bar
include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/footer-bottom-bar.php');

// Back to top Button		
if ($dtb_btt == '1') {
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/btt-button.php');	
}

// Social Icons
if (($dtb_social_enable == '1') || (($dtb_m_mobile_elements_social == '1') && ($dtb_enable_custom_m_menu == '1')) ) { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/header-social-icons.php');	
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/footer-social-icons.php');	
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/mobile-social-icons.php');	
}

// Typing Effect
if ($dtb_enable_typing == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/typing.php');
}

// Follow the mouse
if ($dtb_follow_the_mouse == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/follow-mouse.php');	
}

// Buttons
include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/buttons.php');



// Tilt
if ($dtb_enable_tilt == '1') { 
	include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/tilt.php');
}




}




function dtb_load_scripts_styles(){
	$et_gf_enqueue_fonts = array();
	$site_domain = get_locale();
	$et_one_font_languages = et_get_one_font_languages();
	
	$et_gf_post_meta_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'post_meta_font', 'none' ) ) );
	$et_gf_author_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'author_font', 'none' ) ) );
	$et_gf_archive_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'archive_header_font', 'none')));
	$et_gf_excerpt_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'excerpt_font', 'none')));
	$et_gf_archive_btn_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'archive_btn_font', 'none')));
	$et_gf_prev_next_btn_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'prev_next_btn_font', 'none')));
	$et_gf_prev_next_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'prev_next_font', 'none')));
	$et_gf_related_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'related_header_font', 'none')));
	$et_gf_related_link_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'related_link_font', 'none')));
	$et_gf_submenu_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'submenu_font', 'none')));
	$et_gf_cta_font 				= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'cta_font', 'none')));
	$et_gf_footer_header_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_header_font', 'none')));
	$et_gf_footer_menu_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_menu_font', 'none')));
	$et_gf_footer_bottom_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'footer_bottom_font', 'none')));
	$et_gf_btt_btn_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'btt_btn_font', 'none')));
	$et_gf_sidebar_header_font = sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'sidebar_header_font', 'none')));
	$et_gf_mobile_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'mobile_font', 'none')));
	$et_gf_mobile_cta_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'mobile_cta_font', 'none')));
	$et_gf_top_bar_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'top_bar_font', 'none')));
	$et_gf_comments_font			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'comments_font', 'none')));
	$et_gf_comments_btn_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'comments_btn_font', 'none')));
	$et_gf_heading_h1_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h1_font', 'none')));
	$et_gf_heading_h2_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h2_font', 'none')));
	$et_gf_heading_h3_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h3_font', 'none')));
	$et_gf_heading_h4_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h4_font', 'none')));
	$et_gf_heading_h5_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h5_font', 'none')));
	$et_gf_heading_h6_font 		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'heading_h6_font', 'none')));
	$et_gf_sec_btn_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'sec_btn_font', 'none')));
	$et_gf_m_m_search_font 				= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_search_font')));
	$et_gf_m_m_widgets_title_font 	= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_widgets_title_font')));
	$et_gf_m_m_shop_link_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_shop_link_font')));
	$et_gf_m_m_trigger_font 			= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'm_m_trigger_font')));
	$et_gf_pass_title_font		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_title_font')));
	$et_gf_pass_message_font		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_message_font')));
	$et_gf_pass_input_font		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_input_font')));
	$et_gf_pass_button_font		= sanitize_text_field( et_pb_get_specific_default_font( et_get_option( 'pass_button_font')));
	
	if ( 'none' != $et_gf_post_meta_font ) $et_gf_enqueue_fonts[] = $et_gf_post_meta_font;
	if ( 'none' != $et_gf_author_font ) $et_gf_enqueue_fonts[] = $et_gf_author_font;
	if ( 'none' != $et_gf_archive_header_font ) $et_gf_enqueue_fonts[] = $et_gf_archive_header_font;
	if ( 'none' != $et_gf_excerpt_font ) $et_gf_enqueue_fonts[] = $et_gf_excerpt_font;
	if ( 'none' != $et_gf_archive_btn_font ) $et_gf_enqueue_fonts[] = $et_gf_archive_btn_font;
	if ( 'none' != $et_gf_prev_next_btn_font ) $et_gf_enqueue_fonts[] = $et_gf_prev_next_btn_font;
	if ( 'none' != $et_gf_prev_next_font ) $et_gf_enqueue_fonts[] = $et_gf_prev_next_font;
	if ( 'none' != $et_gf_related_header_font ) $et_gf_enqueue_fonts[] = $et_gf_related_header_font;
	if ( 'none' != $et_gf_related_link_font ) $et_gf_enqueue_fonts[] = $et_gf_related_link_font;
	if ( 'none' != $et_gf_submenu_font ) $et_gf_enqueue_fonts[] = $et_gf_submenu_font;
	if ( 'none' != $et_gf_cta_font ) $et_gf_enqueue_fonts[] = $et_gf_cta_font;
	if ( 'none' != $et_gf_footer_header_font ) $et_gf_enqueue_fonts[] = $et_gf_footer_header_font;
	if ( 'none' != $et_gf_footer_menu_font ) $et_gf_enqueue_fonts[] = $et_gf_footer_menu_font;
	if ( 'none' != $et_gf_footer_bottom_font ) $et_gf_enqueue_fonts[] = $et_gf_footer_bottom_font;
	if ( 'none' != $et_gf_btt_btn_font ) $et_gf_enqueue_fonts[] = $et_gf_btt_btn_font;
	if ( 'none' != $et_gf_sidebar_header_font ) $et_gf_enqueue_fonts[] = $et_gf_sidebar_header_font;
	if ( 'none' != $et_gf_mobile_font ) $et_gf_enqueue_fonts[] = $et_gf_mobile_font;
	if ( 'none' != $et_gf_mobile_cta_font ) $et_gf_enqueue_fonts[] = $et_gf_mobile_cta_font;
	if ( 'none' != $et_gf_top_bar_font ) $et_gf_enqueue_fonts[] = $et_gf_top_bar_font;
	if ( 'none' != $et_gf_comments_font ) $et_gf_enqueue_fonts[] = $et_gf_comments_font;
	if ( 'none' != $et_gf_comments_btn_font ) $et_gf_enqueue_fonts[] = $et_gf_comments_btn_font;
	if ( 'none' != $et_gf_heading_h1_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h1_font;
	if ( 'none' != $et_gf_heading_h2_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h2_font;
	if ( 'none' != $et_gf_heading_h3_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h3_font;
	if ( 'none' != $et_gf_heading_h4_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h4_font;
	if ( 'none' != $et_gf_heading_h5_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h5_font;
	if ( 'none' != $et_gf_heading_h6_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_h6_font;
	if ( 'none' != $et_gf_sec_btn_font ) $et_gf_enqueue_fonts[] = $et_gf_sec_btn_font;
	if ( 'none' != $et_gf_m_m_search_font ) $et_gf_enqueue_fonts[] = $et_gf_m_m_search_font;
	if ( 'none' != $et_gf_m_m_widgets_title_font ) $et_gf_enqueue_fonts[] = $et_gf_m_m_widgets_title_font;
	if ( 'none' != $et_gf_m_m_shop_link_font ) $et_gf_enqueue_fonts[] = $et_gf_m_m_shop_link_font;
	if ( 'none' != $et_gf_m_m_trigger_font ) $et_gf_enqueue_fonts[] = $et_gf_m_m_trigger_font;
	if ( 'none' != $et_gf_pass_title_font ) $et_gf_enqueue_fonts[] = $et_gf_pass_title_font;
	if ( 'none' != $et_gf_pass_message_font ) $et_gf_enqueue_fonts[] = $et_gf_pass_message_font;
	if ( 'none' != $et_gf_pass_input_font ) $et_gf_enqueue_fonts[] = $et_gf_pass_input_font;
	if ( 'none' != $et_gf_pass_button_font ) $et_gf_enqueue_fonts[] = $et_gf_pass_button_font;
	
	
	
	if ( isset( $et_one_font_languages[$site_domain] ) ) {
		$et_gf_font_name_slug = strtolower( str_replace( ' ', '-', $et_one_font_languages[$site_domain]['language_name'] ) );
		wp_enqueue_style( 'et-gf-' . $et_gf_font_name_slug, $et_one_font_languages[$site_domain]['google_font_url'], array(), null );
	} else if ( ! empty( $et_gf_enqueue_fonts ) && function_exists( 'et_builder_enqueue_font' ) ) {
		$et_old_one_font_languages = et_get_old_one_font_languages();

		foreach ( $et_gf_enqueue_fonts as $single_font ) {
			if ( isset( $et_old_one_font_languages[$site_domain] ) ) {
				$font_custom_default_data = $et_old_one_font_languages[$site_domain];

				// enqueue custom default font if needed
				if ( $single_font === $font_custom_default_data['font_family'] ) {
					$et_gf_font_name_slug = strtolower( str_replace( ' ', '-', $font_custom_default_data['language_name'] ) );
					wp_enqueue_style( 'et-gf-' . $et_gf_font_name_slug, $font_custom_default_data['google_font_url'], array(), null );
					continue;
				}
			}

			et_builder_enqueue_font( $single_font );
		}
	}

}
// add_action( 'wp_enqueue_scripts', 'dtb_load_scripts_styles' );

function dtb_body_menu_classes( $classes ) {
	$dtb_menu_type_val = dtb_get_option('dtb_menu_type');
	if ($dtb_menu_type_val != '') {
		$classes[] = "toolbox_{$dtb_menu_type_val}";
	}
   return $classes;   
}
// add_filter( 'body_class','dtb_body_classes' );

// Custom Login page
function dtb_custom_login(){
	$dtb_custom_login = dtb_get_option('dtb_custom_login');
	if ($dtb_custom_login != '') {
		include_once(DTB_TOOLBOX_PLUGIN_DIR . 'customizer/login-page.php');

	}
}

$template = get_template();
$theme = wp_get_theme($template);
$theme_name = empty($theme->Name)?'':$theme->Name;

if(wp_get_theme() == 'Divi' || wp_get_theme()->parent() == 'Divi' || strpos($theme->Name, 'Divi')!==false || strpos($template, 'Divi')!==false ){
	global $wp_customize;
	
	add_action( 'customize_register', 'dtb_customize_register' );
	add_filter( 'body_class','dtb_body_menu_classes' );
	add_action( 'wp_enqueue_scripts', 'dtb_load_scripts_styles' );
	dtb_custom_login();
}
?>