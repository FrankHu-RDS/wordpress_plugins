<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2019 Elicus Technologies Private Limited
 * @version     1.0.0
 */

defined('ABSPATH') or die('No script kiddies please!');

if ( ! class_exists( 'El_Divi_Plus_Update' ) ) {
	class El_Divi_Plus_Update {

		private $plugin_options;
		private $slug;
		private $name;
		private $metadata_url;
		private $plugin_path;
		private $installed_version;
		private $site_url;
		private $schedule_hook;
		private $update_metadata;
		private $should_set_update;
		private $current_version;

		private $update_check_period = 12;
		private $throttle_update_check_period = 72;

		/**
		* Class Constructor 
		*
		* @param string $plugin_option Option name by which value stored in database. 
		*/
		public function __construct( $plugin_option = '' ) {
			$this->plugin_options 		= get_option($plugin_option);
			$this->slug 		    	= $this->plugin_options['slug'];
			$this->name 				= $this->plugin_options['name'];
			$this->metadata_url			= $this->plugin_options['metadata_url'];
			$this->plugin_path 	    	= $this->plugin_options['path'];
			$this->installed_version	= $this->plugin_options['installed_version'];
			$this->current_version		= $this->plugin_options['current_version'];
			$this->should_set_update	= $this->plugin_options['should_set_update'];
			$this->site_url				= home_url();
			$this->schedule_hook        = 'el-check-plugin-updates-' . $this->slug;

			$this->initialize();
			
		}

		/**
		* Set hook for checking regular updates
		* and setting up Update info
		*
		* @return void
		*/
		public function initialize() {
			add_action( 'admin_init', array( $this, 'handle_update_check' ) );

			if( $this->should_set_update == 'true' ) {
				add_filter( 'pre_set_site_transient_update_plugins', array( &$this, 'set_update_transient' ) );
                add_filter( 'plugins_api', array( &$this, 'display_update_metadata' ), 10, 3 );
			}
		}

		/**
		* Check plugin update when from dashboard update page.
		*
		* @return void
		*/
		public function handle_update_check() {
		
			$last_checked   = $this->plugin_options['last_checked'];
			$last_checked   = isset( $last_checked ) ? $last_checked : 0;
	
	        if ( isset( $_GET['force-check'] ) && $_GET['force-check'] == '1' && current_user_can( 'update_plugins' ) ) {
				$should_update = true;
            } elseif ( version_compare( $this->installed_version, $this->current_version, '=' ) && current_user_can( 'update_plugins' ) ) {
				$should_update = ( ( time() - $last_checked ) > ( $this->update_check_period * 3600 ) ) ? true : false;
			} elseif ( version_compare( $this->installed_version, $this->current_version, '<' )  && current_user_can( 'update_plugins' ) ) {
				$should_update = ( ( time() - $last_checked ) > ( $this->throttle_update_check_period * 3600 ) )  ? true : false;	
			} else {
				$should_update = false;
			}
			
			if ( $should_update ) {
				$this->check_for_update();
			}
		}

		/**
		* Get plugin update from remote server.
		*
		* @return void
		*/
		public function check_for_update() {
			global $wp_version;
			$action = 'update';
     		$param	= array(
                		'user-agent' => 'WordPress/' . $wp_version . ';' . get_bloginfo('url'),
                       	'body'       => array(
                                                'action'	=> $action,
                                                'slug'		=> $this->slug, 
                                            )
            			);
            $request    = wp_safe_remote_post( $this->metadata_url, $param );
            $response	= wp_remote_retrieve_body( $request );
       
            if ( ! empty( $response ) ) {          
                $data   = json_decode( $response );
                if ( version_compare( $this->installed_version, $data->current_version , '<' ) ) {
	                $this->current_version      = $data->current_version;
	                $this->should_set_update    = 'true';
    	            el_divi_plus_update_options( array(
    	            							'current_version'	=> $this->current_version,
    	            							'last_checked'		=> time(),
    	            							'should_set_update'	=> 'true',
    	            							'update_metadata'	=> $data->update_metadata,
    	            							) 
    	            						);
    	        } else {
    	            	$this->should_set_update    = 'false';
    	            	el_divi_plus_update_options( array(
    	            							'last_checked'		=> time(),
    	            							'should_set_update'	=> 'false',
    	            							) 
    	            						);
    	        }
            }
		}

		/**
		* Set Plugin Update tansient
		*
		* @return Array
		*/
		public function set_update_transient( $transient ) {
			global $wp_version;

			$obj 				= new stdClass();
            if ( version_compare( $this->installed_version, $this->current_version, '<' ) && isset( $transient ) ) {
                $obj->name 			= $this->name;
                $obj->slug 			= $this->slug;
                $obj->plugin 		= $this->plugin_path;
                $obj->new_version   = $this->current_version;
                $obj->tested        = $wp_version;
                $obj->icons         = array( 
                    '1x' => 'https://diviextended.com/wp-content/uploads/2018/04/elicus-128x128.png',
                    '2x' => 'https://diviextended.com/wp-content/uploads/2018/04/elicus-256x256.png',
                );
              
                $path               = $this->metadata_url . '/' . $this->slug . '/downloads.php/?slug=' . $this->slug . '&blog_url=' . $this->site_url;
                $update_metadata    = unserialize( $this->plugin_options['update_metadata'] );
                $update_metadata->download_link = $path;
                el_divi_plus_update_options( array( 'download_path'	=> $path, 'update_metadata' => serialize( $update_metadata ) ) );
                $obj->package = $path;
            } 
                $transient->response[$this->plugin_path] = $obj;
	            return $transient;
		}

		/**
		* Display plugin changelog and update history.
		*
		* @return Array
		*/
		public function display_update_metadata( $res, $action, $args ) {
		    $action = 'plugin_information';
		    
		    if ( $action !== 'plugin_information' ) {
    		    return $res;
		    }

    	    if ( 'divi-plus' !== $args->slug ) {
    	        return $res;
    	    }
    	    
			$update_metadata = unserialize( $this->plugin_options['update_metadata'] );
			if ( isset( $update_metadata ) && current_user_can( 'update_plugins' ) ) {
				return $update_metadata;
			}
		}

		/** 
		* Remove the schduled cron event
		*
		* @return void
		*/
		public function remove_cron() {
			wp_clear_scheduled_hook( $this->schedule_hook );
		}

	} 
	new El_Divi_Plus_Update( ELICUS_DIVI_PLUS_OPTION );
}
?>