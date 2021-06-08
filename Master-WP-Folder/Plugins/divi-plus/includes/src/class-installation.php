<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.0.0
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( ! class_exists( 'El_Divi_Plus_Installation' ) ){
    
    class El_Divi_Plus_Installation {
        
        public static $metadata_url    = 'http://cdn.elicus.com';
        public static $plugin_name     = 'Divi Plus';
        public static $plugin_slug     = 'divi-plus';
        public static $version         = ELICUS_DIVI_PLUS_VERSION;
        public static $plugin_options  = ELICUS_DIVI_PLUS_OPTION;

        /**
         * Add active installs in database.
         *
         * @access public
         * @return void
         */
        public static function el_plugin_add_installs() {
            global $wp_version;
            self::el_plugin_update_option();
            
            $args = array(
                            'user-agent'    => 'WordPress/'.$wp_version.';'.get_bloginfo( 'url' ),
                            'body'          => array(
                                'action'    => esc_attr( 'install' ),
                                'slug'      => esc_attr( self::$plugin_slug ),
                                'status'    => esc_attr( 'active' ),
                                'url'       => urlencode( home_url() ),
                            ),
                        );
            $request    = wp_safe_remote_post( self::$metadata_url, $args );
            $response   = wp_remote_retrieve_body( $request );                
        }
        
        /**
         * Runs after plugin activation.
         * Update the plugin option.
         * 
         * @access public
         * @return void
         */
        public static function el_plugin_update_option() {
            
            $plugin_data = get_option( self::$plugin_options );
            
            if ( ! isset($plugin_data) || empty($plugin_data ) ) {
                $plugin_data = array(
                    'name'              => self::$plugin_name,
                    'slug'              => self::$plugin_slug,
                    'path'              => self::$plugin_slug . '/' . self::$plugin_slug . '.php',
                    'installed_version' => self::$version,
                    'current_version'   => self::$version,
                    'metadata_url'      => self::$metadata_url,
					'last_checked'		=> time(),
					'should_set_update'	=> 'false',
					'update_metadata'	=> '',
                    );
                update_option( self::$plugin_options, $plugin_data );
            } else {
                $options = array(
        							'installed_version' => self::$version,
        							'should_set_update'	=> 'false',
        						); 
                foreach ( $options as $index => $value ) {
                    $plugin_data[$index] = $value;
                }
                update_option( self::$plugin_options, $plugin_data );
            } 
        }
        
        /**
         * Remove active installs from database.
         *
         * @access public
         * @return void
         */
        public static function el_plugin_remove_installs() {
            global $wp_version;
            $args = array(
                            'user-agent'    => 'WordPress/'.$wp_version.';'.get_bloginfo( 'url' ),
                            'body'          => array(
                                'action'    => esc_attr( 'install' ),
                                'slug'      => esc_attr( self::$plugin_slug ),
                                'status'    => esc_attr( 'inactive' ),
                                'url'       => urlencode( home_url() ),
                                ),
                        );
            $request    = wp_safe_remote_post( self::$metadata_url, $args );
            $response   = wp_remote_retrieve_body( $request );
        }
    }
}

