<div id="settings" class="tool <?php echo $active_tab == 'settings' ? 'tool-active' : ''; ?>">
	
	
	<?php
		// require_once(DTB_TOOLBOX_PLUGIN_DIR. 'functions/settings/port.php');
		// dtb_import_notifications();
	?>
<div class="sett-wrap">
	
		<div class="tool-wrap">
			<div class="toolbox">
				<div class="box-title">
					<h3><?php esc_html_e('Export', 'divi-toolbox'); ?></h3>
					<div class="box-descr"><p><?php esc_html_e('Choose which setting you’d like to include in the export file', 'divi-toolbox') ?></p></div>
				</div>
				<div class="box-content minibox" id='dtb_export_box'>
					<div><input type="checkbox" class="minicheckbox" name="dtb_import_type_settings" id="dtb_import_type_settings" checked><label class="minicheckbox" for="dtb_import_type_settings"><?php echo esc_html_e('Toolbox Settings'); ?></label></div>
					<div><input type="checkbox" class="minicheckbox" name="dtb_import_type_customizer" id="dtb_import_type_customizer" checked><label class="minicheckbox" for="dtb_import_type_customizer"><?php echo esc_html_e('Toolbox Customizer Options'); ?></label>
				   	<input type="hidden" name="dtb_export_settings_action" value="dtb_export_settings" /></div>
				    <div>	<?php wp_nonce_field( 'dtb_export_settings_nonce', 'dtb_export_settings_nonce' ); ?>
					    <?php submit_button( __( 'Export', 'divi-toolbox' ), 'dtb-settings-button', 'dtb_export_submit', false ); ?></div>
				</div>
			</div>
		</div>
	
		<div class="tool-wrap">
			<div class="toolbox">
				<div class="box-title">
					<h3><?php esc_html_e('Import', 'divi-toolbox'); ?></h3>
					<div class="box-descr"><p><?php esc_html_e('Choose the file to import Toolbox settings. Make sure to export your current settings as a backup first, if needed.', 'divi-toolbox') ?></p></div>			
				</div>
				<div class="box-content minibox" id='dtb_import_box'>
					<input type="file" name="import_file" />
				   	<input type="hidden" name="dtb_import_settings_action" value="dtb_import_settings" />
				    	<?php wp_nonce_field( 'dtb_import_settings_nonce', 'dtb_import_settings_nonce' ); ?>
					<?php submit_button( __( 'Import', 'divi-toolbox' ), 'dtb-settings-button', 'dtb_import_submit', false ); ?>
				</div>
			</div>
		</div>
		<div class="tool-wrap">
			<div class="toolbox">
				<div class="box-title">
					<h3><?php esc_html_e('CSS Cache', 'divi-toolbox'); ?></h3>
					<div class="box-descr"><p> <?php esc_html_e('You can use this option to remove the cached CSS file created by the Toolbox plugin.', 'divi-toolbox') ?></p></div>
				</div>
				<div class="box-content minibox">
					<div class="dtb-settings-button" id="dtb-clear-cache">
		            <?php esc_html_e( 'Clear Toolbox Cache' , 'divi-toolbox') ?>
		         </div>
				</div>
			</div>
		</div>	
</div>

</div>
<?php

?>