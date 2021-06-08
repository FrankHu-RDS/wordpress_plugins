<?php

function lmp_add_media_templates() {
?>
	<script type="text/html" id="tmpl-jumpstory-verify-key">
		<#
		let jisStrings	= wp.media.view.l10n;
		let verifyMsg	= ( data.key_verified ) ? jisStrings.jisKeyIsValid : jisStrings.jisKeyIsInvalid;
		#>
		<div class="jis_modal__dialogbox">
			<div class="jis_close_btn">X</div>

			<div class="jis_key_modal__header">
				<h1 class="jis_key_modal__title">{{jisStrings.jisVerifyKeyTitle}}</h1>
			</div>

			<div class="jis_key_modal__content">
				<p class="jis_key_modal__paragraph">{{{jisStrings.jisDescription}}}</p>
				<p class="jis_key_modal__paragraph">{{{jisStrings.jisCreateKeyText}}}</p>
				<p class="jis_key_modal__paragraph">{{{jisStrings.jisCreateAccountText}}}</p>

				<div class="jis_key_modal__input_section">
					<input type="text" id="jis_key_modal__api-key" class="jis_key_modal__input regular-text" value="{{data.key_value}}" placeholder="{{jisStrings.jisVerifyKeyPlaceholder}}">
					<button class="jis_key_modal__btn button button-primary" type="submit">{{jisStrings.jisSubmitBtn}}</button>
				</div>

				<p class="jis_key_modal__paragraph jis_key_modal__paragraph--notice">{{{data.msg_user}}}</p>
			</div>
		</div>
	</script>




	<script id="tmpl-jis-account-info" type="text/html">
		<# let jisStrings	= wp.media.view.l10n; #>
		<div class="jis_account__user">
			{{{ data.name }}}
		</div>
		<a href="#" class="jis_account__logout_btn">
			{{{ jisStrings.jisLogout }}}
		</a>
	</script>




	<script id="tmpl-jis-connect-btn" type="text/html">
		<# let jisStrings	= wp.media.view.l10n; #>
		<div class="jis_account__connect_btn">
			{{{ jisStrings.jisConnectBtn }}}
		</div>
	</script>

	<script id="tmpl-jis-admin-notice" type="text/html">
		<div class="notice is-dismissible {{{data.div_class}}}">
			<p class="jis_notice__paragraph {{{data.p_class}}}">{{{data.msg_user}}}</p>
		</div>
	</script>
<?php
} // END lmp_add_media_templates()
add_action( 'print_media_templates', 'lmp_add_media_templates' );
?>