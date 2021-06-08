<?php
require_once(DTB_TOOLBOX_PLUGIN_DIR . 'functions/settings/static-css-generator.php');
function dtb_toolbox_customizer_css(){
?>
<style id="divi-toolbox-style">	
<?php echo et_core_esc_previously(dtb_get_static_css()); ?>
</style>
<?php
}
add_action( 'wp_footer', 'dtb_toolbox_customizer_css');
?>