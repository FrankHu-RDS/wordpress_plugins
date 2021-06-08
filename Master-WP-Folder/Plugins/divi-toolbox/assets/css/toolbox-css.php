<?php

//prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	die();
}
require_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/static-css-generator.php');
function dtb_get_toolbox_style(){
?>
<style id="divi-toolbox-inline-style">	
<?php echo et_core_esc_previously(dtb_get_static_css()); ?>
</style>
<?php
}
add_action( 'wp_head', 'dtb_get_toolbox_style', 104);
?>