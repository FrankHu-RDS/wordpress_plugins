jQuery(document).ready(function($) {

	setInterval(function(){
		if($('ul[id^=sub-accordion-section-ddp]').hasClass('open')) {
		//console.log('Huray before click!');
		var parent_id = $('.control-section.open').attr('id');
		$('#'+parent_id+' .ddp-click-on-load:not(.ddp-clicked)').trigger('click');
		$('#'+parent_id+' .ddp-click-on-load:not(.ddp-clicked)').addClass('ddp-clicked')
	}
	else {
		var parent_id = $('.control-section.open').attr('id');
		$('#'+parent_id+' .ddp-click-on-load:not(.ddp-clicked)').removeClass('ddp-clicked')
	}

		if($('ul[id^=sub-accordion-section-ddp_mobile_menu_section]').hasClass('open') && !$('button.preview-tablet').hasClass('active') && !$('button.preview-tablet').hasClass('clicked')) {
			$('button.preview-tablet').click();
			$('button.preview-tablet').addClass('clicked');
		}


		if($('ul[id^=sub-accordion-section-ddp_mobile_menu_section]').hasClass('open')) {
			$('#customize-preview iframe').attr('id', 'ddp-tablet-iframe');
			var iframe = document.getElementById('ddp-tablet-iframe'),
    		iframeWin = iframe.contentWindow || iframe,
    		iframeDoc = iframe.contentDocument || iframeWin.document;
    		iframeHtml = iframe.innerHTML;

    		$('#customize-preview iframe').contents().find(".mobile_menu_bar_toggle:not(\".changed\")").click();
    		$('#customize-preview iframe').contents().find(".mobile_menu_bar_toggle:not(\".changed\")").addClass('changed');


    		function ddp_setting_disabled(){
    			if($("#_customize-input-ddp_mobile_menu_show_checkbox").prop('checked') === true){
    				$('li#customize-control-ddp_mobile_menu_screen_size_range').addClass('ddp-setting-disabled');
				}
				else {$('li#customize-control-ddp_mobile_menu_screen_size_range').removeClass('ddp-setting-disabled');}
			}

			ddp_setting_disabled();

			$('#_customize-input-ddp_mobile_menu_show_checkbox').on('change', function(){
				ddp_setting_disabled();
			});


		}

		if($('ul[id^=sub-accordion-section-ddp_back_to_top_section]').hasClass('open')) {

			$('#customize-control-ddp_back_to_top_icon_change_option li:not(.ddp-et-icon)').hide();

    		$('#customize-preview iframe').contents().find('html:not(.scrolled):not(.os-html), body:not(.scrolled):not(.os-host)').animate({scrollTop:$('#customize-preview iframe').contents().height()/2}, 'fast');
    		$('#customize-preview iframe').contents().find('html:not(.os-html), body:not(.os-host)').addClass('scrolled');

		}




	}, 300);


	;(function () {
	/**
	 * Run function when customizer is ready.
	 */
	wp.customize.bind('ready', function () {
		wp.customize.control('ddp_search_results_select_box', function (control) {
			/**
			 * Run function on setting change of control.
			 */
			control.setting.bind(function (value) {
				switch (value) {
					case 'disabled':
						console.log('disabled');
						wp.customize.control('ddp_search_results_header_color').deactivate();
						wp.customize.control('ddp_search_results_header_size').deactivate();
						wp.customize.control('ddp_search_results_header_font').deactivate();
						wp.customize.control('ddp_search_results_header_font_select').deactivate();
						wp.customize.control('ddp_search_results_meta_color').deactivate();
						wp.customize.control('ddp_search_results_meta_size').deactivate();
						wp.customize.control('ddp_search_results_content_color').deactivate();
						wp.customize.control('ddp_search_results_content_size').deactivate();
						wp.customize.control('ddp_search_results_body_font').deactivate();
						wp.customize.control('ddp_search_results_body_font_select').deactivate();
						wp.customize.control('ddp_search_results_rm_color').deactivate();
						wp.customize.control('ddp_search_results_rm_size').deactivate();
						wp.customize.control('ddp_search_results_line_color').deactivate();
						wp.customize.control('ddp_search_results_line_size').deactivate();
						break;

					case 'diana_1':
						console.log('diana_1');
						wp.customize.control('ddp_search_results_header_color').activate();
                        wp.customize.control('ddp_search_results_header_size').activate();
                        wp.customize.control('ddp_search_results_header_font').activate();
						wp.customize.control('ddp_search_results_header_font_select').activate();
                        wp.customize.control('ddp_search_results_meta_color').activate();
                        wp.customize.control('ddp_search_results_meta_size').activate();
                        wp.customize.control('ddp_search_results_content_color').activate();
                        wp.customize.control('ddp_search_results_content_size').activate();
                        wp.customize.control('ddp_search_results_body_font').activate();
						wp.customize.control('ddp_search_results_body_font_select').activate();
                        wp.customize.control('ddp_search_results_rm_color').activate();
                        wp.customize.control('ddp_search_results_rm_size').activate();
                        wp.customize.control('ddp_search_results_line_color').activate();
                        wp.customize.control('ddp_search_results_line_size').activate();
						break;
				}
			});
		});

		wp.customize.control( 'ddp_pop_up_clear_cookie_button', function( control ) {
    		control.container.find( '.button' ).on( 'click', function() {
        	//console.info( 'Button was clicked.' );
        	$.cookie("ddp_pop_up_cookie", null, { path: '/' });
        	location.reload();
    	} );
} );
	});
})();


}); //jQuery(document).ready(function($)


