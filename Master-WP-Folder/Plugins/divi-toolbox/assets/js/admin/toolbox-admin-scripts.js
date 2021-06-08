

jQuery(document).ready(function ($) {
	var dtb_ajax_saving = $('#dtb-epanel-ajax-saving');
	var dtb_ajax_loader = $('#dtb-epanel-ajax-saving').find('img');
	$('#dtb-clear-cache').click(function(){
		dtb_ajax_saving.css('display','block');
		dtb_ajax_loader.css('display','block');
		$.ajax( {
			url: toolbox_values.dtb_rest_api_root + 'dtb/v1/clear-cache',
			method: 'GET',
			beforeSend: function ( xhr ) {
				xhr.setRequestHeader( 'X-WP-Nonce', toolbox_values.dtb_rest_api_nonce );
			},
			error:function(request) {
            dtb_ajax_loader.css('display','none');
				dtb_ajax_saving.addClass('success-animation');
				setTimeout(function(){
					dtb_ajax_saving.removeClass('success-animation').css('display','none')
				}, 1200);
				
			}
		} ).done( function ( response ) {
			dtb_ajax_loader.css('display','none');
			dtb_ajax_saving.addClass('success-animation');
			setTimeout(function(){
				dtb_ajax_saving.removeClass('success-animation').css('display','none')
			}, 1200);
			
		} );
	})
	$('.dtb-color-field').wpColorPicker();
	
	$('#dtb_export_box > input[type="checkbox"]').on('change',function(){
		if(!$('#dtb_export_box > input[type="checkbox"]')[0].checked && !$('#dtb_export_box > input[type="checkbox"]')[1].checked){
			$('#dtb_export_submit').attr('disabled','disabled');;
		}
		else{
			$('#dtb_export_submit').removeAttr('disabled');
		}
	});

	var $form  = $('.et-divi-toolbox-form');

	var mediaUploader;
	  $('.upload_image_button').click(function(e) {
	    e.preventDefault();
	      if (mediaUploader) {
	      mediaUploader.open();
	      return;
	    }
	    mediaUploader = wp.media.frames.file_frame = wp.media({
	      title: 'Choose Image',
	      button: {
	      text: 'Choose Image'
	    }, multiple: false });
	    var imgInput = $(this).prev('.background_image');
	    mediaUploader.on('select', function() {
	      var attachment = mediaUploader.state().get('selection').first().toJSON();
	      $(imgInput).val(attachment.url);
	    });
	    mediaUploader.open();
	  });
	
	$iframe_preview =  $( '.wp-full-overlay' ),
	all_device_classes = 'preview-tablet preview-mobile preview-desktop',
	tablet_class = 'preview-tablet';
	phone_class = 'preview-mobile';
	desktop_class = 'preview-desktop';
	url = location.pathname;

	// change to mobile view on mobile tab
	$( '#accordion-section-dtb_mobile h3' ).click( function () {
		$iframe_preview.removeClass( all_device_classes ).addClass( phone_class );
		$('button.preview-desktop').removeClass('active');
		$('button.preview-mobile').addClass('active');
		
	});
	$( '.customize-section-back' ).click( function () {
		$iframe_preview.removeClass( all_device_classes ).addClass( desktop_class );
		$('button.preview-desktop').addClass('active');
		$('button.preview-mobile').removeClass('active');
	});	
	
	// Fold Controls 
	$('li.customize-control-toggle').each(function() {
	    $(this).nextUntil('customize-control-toggle', '.customize-control:not(.customize-control-toggle)').slideUp();
	    $(this).next('.customize-control').addClass('first');
	    $(this).prev('.customize-control').addClass('last');
	});
	$('li.customize-control-toggle').click(function() {
		
		$(this).nextUntil('.customize-control-toggle', 'li.customize-control:not(.hidden)').slideToggle();
	    $(this).toggleClass('opened');
	});
	
	// Show & Hide Customizer Options
	$btt_icon_opt = $('#customize-control-dtb_customize_back_to_top_icon, #customize-control-dtb_customize_back_to_top_icon_size');
	$btt_font_opt = $('#customize-control-dtb_modcustomize_back_to_top_txt, #customize-control-et_divi-btt_btn_font, #customize-control-dtb_customize_btt_btn_font_weight, #customize-control-dtb_customize_back_to_top_txt_size, #customize-control-dtb_customize_btt_font_lettersp, #customize-control-dtb_modcustomize_btt_tt');
	$btt_icon_opt.addClass('hidden').hide();
	$btt_font_opt.addClass('hidden').hide();
	if($('#_customize-input-dtb_customize_back_to_top_style').val() === 'text'){
	    $btt_font_opt.removeClass('hidden').show();
	    $btt_icon_opt.addClass('hidden').hide();
	}
	if($('#_customize-input-dtb_customize_back_to_top_style').val() !== 'text'){
	    $btt_icon_opt.removeClass('hidden').show();
	    $btt_font_opt.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_customize_back_to_top_style').change(function(){
	  if($(this).val() === 'text'){
	    $btt_font_opt.removeClass('hidden').show();
	    $btt_icon_opt.addClass('hidden').hide();
	    
	  }
	  else{
	    $btt_font_opt.addClass('hidden').hide();
	    $btt_icon_opt.removeClass('hidden').show();
	  }
	 });
	
	$widget_headers_1 = $('#customize-control-dtb_customize_widget_boxed_padding, #customize-control-dtb_customize_widget_boxed_border_radius, #customize-control-dtb_customize_widget_boxed_bg, #customize-control-dtb_customize_t_widgets_headers_boxed');
	$widget_headers_2 = $('#customize-control-dtb_customize_widget_divider_lenght, #customize-control-dtb_customize_widget_divider_height, #customize-control-dtb_customize_widget_divider_border, #customize-control-dtb_customize_widget_divider_color, #customize-control-dtb_customize_t_widgets_headers_divider');
	$widget_headers_1.addClass('hidden').hide();
	$widget_headers_2.addClass('hidden').hide();
	if($('#_customize-input-dtb_customize_widget_header_style').val() === 'boxed'){
	    $widget_headers_1.removeClass('hidden').show();
	    $widget_headers_2.addClass('hidden').hide();
	}
	if($('#_customize-input-dtb_customize_widget_header_style').val() === 'divider'){
	    $widget_headers_2.removeClass('hidden').show();
	    $widget_headers_1.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_customize_widget_header_style').change(function(){
	  if($(this).val() === 'boxed'){
	    $widget_headers_1.removeClass('hidden').show();
	    $widget_headers_2.addClass('hidden').hide();
	  }
	  else if($(this).val() === 'divider'){
	    $widget_headers_2.removeClass('hidden').show();
	    $widget_headers_1.addClass('hidden').hide();
	  }
	  else{
		  $widget_headers_1.addClass('hidden').hide();
		  $widget_headers_2.addClass('hidden').hide();
	  }
	 });
	 
	$sidebar_headers_1 = $('#customize-control-dtb_customize_sidebar_header_boxed_padding, #customize-control-dtb_customize_sidebar_header_boxed_border_radius, #customize-control-dtb_customize_sidebar_header_boxed_bg');
	$sidebar_headers_2 = $('#customize-control-dtb_customize_sidebar_divider_lenght, #customize-control-dtb_customize_sidebar_divider_height, #customize-control-dtb_customize_sidebar_divider_border, #customize-control-dtb_customize_sidebar_divider_color');
	$sidebar_headers_1.addClass('hidden').hide();
	$sidebar_headers_2.addClass('hidden').hide();
	if($('#_customize-input-dtb_customize_sidebar_header_style').val() === 'boxed'){
	    $sidebar_headers_1.removeClass('hidden').show();
	    $sidebar_headers_2.addClass('hidden').hide();
	}
	if($('#_customize-input-dtb_customize_sidebar_header_style').val() === 'divider'){
	    $sidebar_headers_2.removeClass('hidden').show();
	    $sidebar_headers_1.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_customize_sidebar_header_style').change(function(){
	  if($(this).val() === 'boxed'){
	    $sidebar_headers_1.removeClass('hidden').show();
	    $sidebar_headers_2.addClass('hidden').hide();
	  }
	  else if($(this).val() === 'divider'){
	    $sidebar_headers_2.removeClass('hidden').show();
	    $sidebar_headers_1.addClass('hidden').hide();
	  }
	  else{
		  $sidebar_headers_1.addClass('hidden').hide();
		  $sidebar_headers_2.addClass('hidden').hide();
	  }
	 });
	 
	$widget_boxed_values = $('#customize-control-dtb_customize_sidebar_widget_bg, #customize-control-dtb_customize_sidebar_widget_shadow, #customize-control-dtb_customize_sidebar_widget_shadow_color, #customize-control-dtb_customize_sidebar_widget_shadow_offset_x, #customize-control-dtb_customize_sidebar_widget_shadow_offset_y, #customize-control-dtb_customize_sidebar_widget_shadow_blur, #customize-control-dtb_customize_sidebar_widget_link_bg');
	$widget_boxed_values.addClass('hidden').hide();
	if($('#_customize-input-dtb_customize_sidebar_widgets_style').val() === 'boxed'){
	    $widget_boxed_values.removeClass('hidden').show();
	}
	$('#_customize-input-dtb_customize_sidebar_widgets_style').change(function(){
	  if($(this).val() === 'boxed'){
	    $widget_boxed_values.removeClass('hidden').show();
	  }
	  else{
		  $widget_boxed_values.addClass('hidden').hide();
	  }
	 });
	 
	 $button_icon_values = $('#customize-control-dtb_customize_sec_btn_icon, #customize-control-dtb_customize_sec_btn_icon_color, #customize-control-dtb_customize_sec_btn_icon_place, #customize-control-dtb_modcustomize_sec_btn_icon_show');
	$button_icon_values.addClass('hidden').hide();
	if($('#_customize-input-dtb_customize_sec_btn_icon_enable').val() === 'yes'){
	    $button_icon_values.removeClass('hidden').show();
	}
	$('#_customize-input-dtb_customize_sec_btn_icon_enable').change(function(){
	  if($(this).val() === 'yes'){
	    $button_icon_values.removeClass('hidden').show();
	  }
	  else{
		  $button_icon_values.addClass('hidden').hide();
	  }
	 });

	if ($("#_customize-input-dtb_modcustomize_mobile_fixed").prop('checked') === false){
	    $("#customize-control-dtb_modcustomize_mobile_fixed_top").addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_mobile_fixed").click(function(){
	    $("#customize-control-dtb_modcustomize_mobile_fixed_top").fadeToggle().toggleClass('hidden');
	});

	if ($("#_customize-input-dtb_modcustomize_mobile_top").prop('checked') !== false){
	    $("#customize-control-dtb_modcustomize_mobile_fixed_top").addClass('hidden hidden_forever').hide();
	}
	$("#_customize-input-dtb_modcustomize_mobile_top").click(function(){
	    $("#customize-control-dtb_modcustomize_mobile_fixed_top").fadeToggle().toggleClass('hidden hidden_forever');
	});
	
	if ($("#_customize-input-dtb_modcustomize_mobile_dim_background").prop('checked') === false){
	    $("#customize-control-dtb_customize_mobile_dim_color").addClass('hidden hidden_forever').hide();
	}
	$("#_customize-input-dtb_modcustomize_mobile_dim_background").click(function(){
	    $("#customize-control-dtb_customize_mobile_dim_color").fadeToggle().toggleClass('hidden hidden_forever');
	});
	
	$border_values_1 = $('#customize-control-dtb_customize_back_to_top_border_radius, #customize-control-dtb_customize_back_to_top_border_width, #customize-control-dtb_customize_back_to_top_border_col, #customize-control-dtb_customize_back_to_top_border_col_hover');
	if ($('#_customize-input-dtb_modcustomize_back_to_top_border').prop('checked') === false){
	    $border_values_1.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_back_to_top_border').click(function(){
	    $border_values_1.fadeToggle().toggleClass('hidden');
	});
	
	$border_values_2 = $('#customize-control-dtb_customize_author_box_border_width, #customize-control-dtb_customize_author_box_border_color');
	if ($('#_customize-input-dtb_modcustomize_author_box_border').prop('checked') === false){
	    $border_values_2.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_author_box_border').click(function(){
	    $border_values_2.fadeToggle().toggleClass('hidden');
	});
	
	$border_values_3 = $('#customize-control-dtb_customize_archive_boxed_border_width, #customize-control-dtb_customize_archive_boxed_border_color');
	if ($('#_customize-input-dtb_modcustomize_archive_boxed_border').prop('checked') === false){
	    $border_values_3.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_archive_boxed_border').addClass('bottom-space');
	}
	$('#_customize-input-dtb_modcustomize_archive_boxed_border').click(function(){
	    $border_values_3.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_archive_boxed_border').toggleClass('bottom-space');
	});
	
	$border_values_4 = $('#customize-control-dtb_customize_related_border_width, #customize-control-dtb_customize_related_border_color');
	if ($('#_customize-input-dtb_modcustomize_related_border').prop('checked') === false){
	    $border_values_4.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_related_border').addClass('bottom-space');
	}
	$('#_customize-input-dtb_modcustomize_related_border').click(function(){
	    $border_values_4.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_related_border').toggleClass('bottom-space');
	});
	
	$shadow_values_1 = $('#customize-control-dtb_customize_mobile_bar_shadow_offset, #customize-control-dtb_customize_mobile_bar_shadow_blur, #customize-control-dtb_customize_mobile_bar_shadow_color');
	if ($("#_customize-input-dtb_modcustomize_mobile_bar_shadow").prop('checked') === false){
	    $shadow_values_1.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_mobile_bar_shadow').click(function(){
	    $shadow_values_1.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_2 = $('#customize-control-dtb_customize_mobile_menu_shadow_offset_x, #customize-control-dtb_customize_mobile_menu_shadow_offset_y, #customize-control-dtb_customize_mobile_menu_shadow_blur, #customize-control-dtb_customize_mobile_menu_shadow_color');
	if ($('#_customize-input-dtb_modcustomize_mobile_menu_shadow').prop('checked') === false){
	    $shadow_values_2.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_mobile_menu_shadow').click(function(){
	    $shadow_values_2.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_3 = $('#customize-control-dtb_customize_main_header_shadow_color, #customize-control-dtb_customize_main_header_shadow_offset_x, #customize-control-dtb_customize_main_header_shadow_offset_y, #customize-control-dtb_customize_main_header_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_main_header_shadow').prop('checked') === false){
	    $shadow_values_3.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_main_header_shadow').click(function(){
	    $shadow_values_3.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_4 = $('#customize-control-dtb_customize_fixed_header_shadow_color, #customize-control-dtb_customize_fixed_header_shadow_offset_x, #customize-control-dtb_customize_fixed_header_shadow_offset_y, #customize-control-dtb_customize_fixed_header_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_fixed_header_shadow').prop('checked') === false){
	    $shadow_values_4.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_fixed_header_shadow').addClass('bottom-space');
	}
	$('#_customize-input-dtb_modcustomize_fixed_header_shadow').click(function(){
	    $shadow_values_4.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_fixed_header_shadow').toggleClass('bottom-space');
	});
	
	$shadow_values_5 = $('#customize-control-dtb_customize_submenu_shadow_color, #customize-control-dtb_customize_submenu_shadow_offset_x, #customize-control-dtb_customize_submenu_shadow_offset_y, #customize-control-dtb_customize_submenu_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_submenu_shad').prop('checked') === false){
	    $shadow_values_5.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_submenu_shad').click(function(){
	    $shadow_values_5.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_6 = $('#customize-control-dtb_customize_top_bar_shadow_color, #customize-control-dtb_customize_top_bar_shadow_offset_y, #customize-control-dtb_customize_top_bar_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_top_bar_shadow').prop('checked') === false){
	    $shadow_values_6.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_top_bar_shadow').click(function(){
	    $shadow_values_6.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_7 = $('#customize-control-dtb_customize_footer_menu_shadow_color, #customize-control-dtb_customize_footer_menu_shadow_offset_x, #customize-control-dtb_customize_footer_menu_shadow_offset_y, #customize-control-dtb_customize_footer_menu_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_footer_menu_shadow').prop('checked') === false){
	    $shadow_values_7.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_footer_menu_shadow').click(function(){
	    $shadow_values_7.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_8 = $('#customize-control-dtb_customize_sidebar_shadow_color, #customize-control-dtb_customize_sidebar_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_sidebar_shadow').prop('checked') === false){
	    $shadow_values_8.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_sidebar_shadow').click(function(){
	    $shadow_values_8.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_9 = $("#customize-control-dtb_customize_back_to_top_shadow_col, #customize-control-dtb_customize_back_to_top_shadow_offset_x, #customize-control-dtb_customize_back_to_top_shadow_offset_y, #customize-control-dtb_customize_back_to_top_shadow_blur");
	if ($("#_customize-input-dtb_modcustomize_back_to_top_shadow").prop('checked') === false){
	    $shadow_values_9.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_back_to_top_shadow").click(function(){
	    $shadow_values_9.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_10 = $("#customize-control-dtb_customize_author_box_shadow_color, #customize-control-dtb_customize_author_box_shadow_offset_x, #customize-control-dtb_customize_author_box_shadow_offset_y, #customize-control-dtb_customize_author_box_shadow_blur");
	if ($("#_customize-input-dtb_modcustomize_author_box_shadow").prop('checked') === false){
	    $shadow_values_10.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_author_box_shadow").click(function(){
	    $shadow_values_10.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_11 = $("#customize-control-dtb_customize_archive_boxed_shadow_offset_x, #customize-control-dtb_customize_archive_boxed_shadow_offset_y, #customize-control-dtb_customize_archive_boxed_shadow_blur, #customize-control-dtb_customize_archive_boxed_shadow_color");
	if ($("#_customize-input-dtb_modcustomize_archive_boxed_shadow").prop('checked') === false){
	    $shadow_values_11.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_archive_boxed_shadow").click(function(){
	    $shadow_values_11.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_12 = $("#customize-control-dtb_customize_related_shadow_offset_x, #customize-control-dtb_customize_related_shadow_offset_y, #customize-control-dtb_customize_related_shadow_blur, #customize-control-dtb_customize_related_shadow_color");
	if ($("#_customize-input-dtb_modcustomize_related_shadow").prop('checked') === false){
	    $shadow_values_12.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_related_shadow").click(function(){
	    $shadow_values_12.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_13 = $("#customize-control-dtb_customize_login_form_shadow_offset_x, #customize-control-dtb_customize_login_form_shadow_offset_y, #customize-control-dtb_customize_login_form_shadow_blur, #customize-control-dtb_customize_login_form_shadow_color");
	if ($("#_customize-input-dtb_modcustomize_login_form_shadow").prop('checked') === false){
	    $shadow_values_13.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_login_form_shadow").click(function(){
	    $shadow_values_13.fadeToggle().toggleClass('hidden');
	});
	
	$shadow_values_14 = $('#customize-control-dtb_customize_logo_shadow_color, #customize-control-dtb_customize_logo_shadow_offset_x, #customize-control-dtb_customize_logo_shadow_offset_y, #customize-control-dtb_customize_logo_shadow_blur');
	if ($('#_customize-input-dtb_modcustomize_logo_box_shadow').prop('checked') === false){
	    $shadow_values_14.addClass('hidden').hide();
	}
	$('#_customize-input-dtb_modcustomize_logo_box_shadow').click(function(){
	    $shadow_values_14.fadeToggle().toggleClass('hidden');
	});
	
	$excerpt_values = $("#customize-control-et_divi-excerpt_font, #customize-control-dtb_customize_excerpt_font_weight, #customize-control-dtb_customize_excerpt_font_size, #customize-control-dtb_customize_excerpt_font_lettersp, #customize-control-dtb_modcustomize_excerpt_tt, #customize-control-dtb_customize_excerpt_font_color");
	if ($("#_customize-input-dtb_modcustomize_hide_excerpt").prop('checked') !== false){
	    $excerpt_values.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_hide_excerpt").click(function(){
	    $excerpt_values.fadeToggle().toggleClass('hidden');
	});
	
	$archive_button = $("#customize-control-et_divi-archive_btn_font, #customize-control-dtb_customize_archive_btn_font_weight, #customize-control-dtb_customize_archive_btn_font_size, #customize-control-dtb_customize_archive_btn_font_lettersp, #customize-control-dtb_modcustomize_archive_btn_tt, #customize-control-dtb_customize_archive_btn_font_color, #customize-control-dtb_customize_archive_btn_padding, #customize-control-dtb_customize_archive_btn_border_radius, #customize-control-dtb_customize_archive_btn_border_width, #customize-control-dtb_customize_archive_btn_border_color, #customize-control-dtb_customize_archive_btn_bg_color, #customize-control-dtb_customize_archive_btn_font_color_hover, #customize-control-dtb_customize_archive_btn_border_color_hover, #customize-control-dtb_customize_archive_btn_bg_color_hover, #customize-control-dtb_customize_archive_btn_hover");
	if ($("#_customize-input-dtb_modcustomize_archive_button").prop('checked') === false){
	    $archive_button.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_archive_button").click(function(){
	    $archive_button.fadeToggle().toggleClass('hidden');
	});
	
	$archive_overlay_inner = $("#customize-control-dtb_customize_archive_overlay_gradient_direction, #customize-control-dtb_customize_archive_overlay_gradient_color1, #customize-control-dtb_customize_archive_overlay_gradient_color2, #customize-control-dtb_customize_archive_overlay_gradient_blend");
	if ($("#_customize-input-dtb_modcustomize_archive_overlay_gradient").prop('checked') === false){
	    $archive_overlay_inner.addClass('hidden hidden_forever').hide();
	}
	$("#_customize-input-dtb_modcustomize_archive_overlay_gradient").click(function(){
	    $archive_overlay_inner.fadeToggle().toggleClass('hidden hidden_forever');
	});
	
	$archive_overlay = $("#customize-control-dtb_customize_archive_overlay_show, #customize-control-dtb_customize_archive_overlay_color, #customize-control-dtb_customize_archive_img_hover, #customize-control-dtb_modcustomize_archive_overlay_gradient, #customize-control-dtb_customize_archive_overlay_gradient_direction, #customize-control-dtb_customize_archive_overlay_gradient_color1, #customize-control-dtb_customize_archive_overlay_gradient_color2, #customize-control-dtb_customize_archive_overlay_gradient_blend");
	if ($("#_customize-input-dtb_modcustomize_archive_overlay").prop('checked') === false){
	    $archive_overlay.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_archive_overlay").click(function(){
	    $archive_overlay.fadeToggle().toggleClass('hidden');
	});
		
	$icon_values_1 = $("#customize-control-dtb_customize_widget_icon, #customize-control-dtb_customize_widget_icon_color, #customize-control-dtb_customize_widget_icon_size");
	if ($("#_customize-input-dtb_modcustomize_widget_add_icons").prop('checked') === false){
	    $icon_values_1.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_widget_add_icons').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_widget_add_icons").click(function(){
	    $icon_values_1.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_widget_add_icons').toggleClass('bottom-space');
	});
	
	$icon_values_2 = $("#customize-control-dtb_customize_sidebar_icon, #customize-control-dtb_customize_sidebar_icon_color, #customize-control-dtb_customize_sidebar_icon_size");
	if ($("#_customize-input-dtb_modcustomize_sidebar_add_icons").prop('checked') === false){
	    $icon_values_2.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_sidebar_add_icons').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_sidebar_add_icons").click(function(){
	    $icon_values_2.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_sidebar_add_icons').toggleClass('bottom-space');
	});
	
	$sidebar_search = $("#customize-control-dtb_customize_sidebar_search_bg, #customize-control-dtb_customize_sidebar_search_txt, #customize-control-dtb_customize_sidebar_search_height, #customize-control-dtb_customize_sidebar_search_border_radius, #customize-control-dtb_customize_sidebar_search_border, #customize-control-dtb_customize_sidebar_search_border_color, #customize-control-dtb_customize_sidebar_search_btn_bg, #customize-control-dtb_customize_sidebar_search_icon, #customize-control-dtb_customize_sidebar_search_btn_bg_hover, #customize-control-dtb_customize_sidebar_search_icon_hover ");
	if ($("#_customize-input-dtb_modcustomize_sidebar_search").prop('checked') === false){
	    $sidebar_search.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_sidebar_search').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_sidebar_search").click(function(){
	    $sidebar_search.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_sidebar_search').toggleClass('bottom-space');
	});
	
	$search_icon = $('#customize-control-dtb_customize_search_icon_color, #customize-control-dtb_customize_search_icon_color_hover, #customize-control-dtb_customize_search_close_icon_color, #customize-control-dtb_customize_search_close_icon_color_hover, #customize-control-dtb_customize_search_icon_size, #customize-control-dtb_customize_search_font_color');
	if ($('#_customize-input-dtb_modcustomize_search_icon_hide').prop('checked') !== false){
	    $search_icon.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_search_icon_hide').addClass('bottom-space');
	}
	$('#_customize-input-dtb_modcustomize_search_icon_hide').click(function(){
	    $search_icon.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_search_icon_hide').toggleClass('bottom-space');
	});
	

	$mm_values_1 = $("#customize-control-dtb_customize_m_m_width_max, #customize-control-dtb_customize_m_m_position");
	if ($("#_customize-input-dtb_modcustomize_m_m_width").prop('checked') !== false){
	    $mm_values_1.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_m_m_width").click(function(){
	    $mm_values_1.fadeToggle().toggleClass('hidden');
	});
	 
	 
	$mm_values_2 = $("#customize-control-dtb_customize_m_m_container_bg_img, #customize-control-dtb_customize_m_m_container_bg_size, #customize-control-dtb_customize_m_m_container_bg_position, #customize-control-dtb_customize_m_m_container_bg_blend");
	if ($("#_customize-input-dtb_modcustomize_m_m_container_bg_img_enable").prop('checked') === false){
	    $mm_values_2.addClass('hidden').hide();
	    $('#customize-control-dtb_customize_m_m_container_bg_blend').removeClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_container_bg_img_enable").click(function(){
	    $mm_values_2.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_customize_m_m_container_bg_blend').toggleClass('bottom-space');
	});
	
	$mm_values_3 = $("#customize-control-dtb_customize_m_m_container_bg_gradient1, #customize-control-dtb_customize_m_m_container_bg_gradient2, #customize-control-dtb_customize_m_m_container_bg_gradient_dir, #customize-control-dtb_modcustomize_m_m_container_bg_gradient_above");
	if ($("#_customize-input-dtb_modcustomize_m_m_container_bg_gradient_enable").prop('checked') === false){
	    $mm_values_3.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_m_m_container_bg_gradient_enable').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_container_bg_gradient_enable").click(function(){
	    $mm_values_3.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_m_m_container_bg_gradient_enable').toggleClass('bottom-space');
	});
	
	$mm_values_4 = $("#customize-control-dtb_customize_m_m_container_animation_in, #customize-control-dtb_customize_m_m_container_animation_out");
	$mm_values_5 = $("#customize-control-dtb_customize_m_m_container_animation_type");
	if ($("#_customize-input-dtb_modcustomize_m_m_animation_page").prop('checked') !== false){
	    	$mm_values_4.addClass('hidden').hide();
	}
	else {
	    	$mm_values_5.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_m_m_animation_page").click(function(){
		    $mm_values_4.fadeToggle().toggleClass('hidden');
		    $mm_values_5.fadeToggle().toggleClass('hidden');
		});
	
	$mm_values_6 = $("#customize-control-dtb_customize_m_m_dim_color");
	if ($("#_customize-input-dtb_modcustomize_m_m_dim_background").prop('checked') === false){
	    $mm_values_6.addClass('hidden').hide();
	    	 $('#customize-control-dtb_modcustomize_m_m_dim_background').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_dim_background").click(function(){
	    $mm_values_6.fadeToggle().toggleClass('hidden');
	    	 $('#customize-control-dtb_modcustomize_m_m_dim_background').addClass('bottom-space');
	});
	
	
	$mm_values_7a = $("#customize-control-dtb_modcustomize_m_m_cta_align");
	$mm_values_7b = $("#customize-control-dtb_modcustomize_m_m_cta_text_align");
	if ($("#_customize-input-dtb_modcustomize_m_m_cta_fullwidth").prop('checked') === false){
	    $mm_values_7b.addClass('hidden').hide();
	    //$('#customize-control-dtb_modcustomize_m_m_dim_background').addClass('bottom-space');
	}
	else {
		$mm_values_7a.addClass('hidden').hide();
	}
	$("#_customize-input-dtb_modcustomize_m_m_cta_fullwidth").click(function(){
	    $mm_values_7a.fadeToggle().toggleClass('hidden');
	    $mm_values_7b.fadeToggle().toggleClass('hidden');
	    //$('#customize-control-dtb_modcustomize_m_m_dim_background').addClass('bottom-space');
	});
	
	
	$mm_values_8 = $("#customize-control-dtb_customize_m_m_cta_shadow_color, #customize-control-dtb_customize_m_m_cta_shadow_offset_x, #customize-control-dtb_customize_m_m_cta_shadow_offset_y, #customize-control-dtb_customize_m_m_cta_shadow_blur");
	if ($("#_customize-input-dtb_modcustomize_m_m_cta_shadow").prop('checked') === false){
	    $mm_values_8.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_m_m_cta_shadow').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_cta_shadow").click(function(){
	    $mm_values_8.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_m_m_cta_shadow').toggleClass('bottom-space');
	});	
	
	$mm_values_9 = $("#customize-control-dtb_modcustomize_m_m_hamburger_align, #customize-control-dtb_modcustomize_m_m_hamburger_margin, #customize-control-dtb_modcustomize_m_m_hamburger_margin_top, #customize-control-dtb_modcustomize_m_m_hamburger_margin_bottom, #customize-control-dtb_modcustomize_m_m_hamburger_margin_left, #customize-control-dtb_modcustomize_m_m_hamburger_margin_right");
	if ($("#_customize-input-dtb_modcustomize_m_m_hamburger_show").prop('checked') === false){
	    $mm_values_9.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_m_m_hamburger_show').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_hamburger_show").click(function(){
	    $mm_values_9.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_m_m_hamburger_show').toggleClass('bottom-space');
	});	
	
	
	$mm_values_10 = $("#customize-control-dtb_customize_m_m_container_shadow_color, #customize-control-dtb_customize_m_m_container_shadow_offset_x, #customize-control-dtb_customize_m_m_container_shadow_offset_y, #customize-control-dtb_customize_m_m_container_shadow_blur");
	if ($("#_customize-input-dtb_modcustomize_m_m_container_shadow").prop('checked') === false){
	    $mm_values_10.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_m_m_container_shadow').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_container_shadow").click(function(){
	    $mm_values_10.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_m_m_container_shadow').toggleClass('bottom-space');
	});
	
	$mm_values_11 = $("#customize-control-dtb_customize_m_m_trigger_shadow_offset_x, #customize-control-dtb_customize_m_m_trigger_shadow_offset_y, #customize-control-dtb_customize_m_m_trigger_shadow_color, #customize-control-dtb_customize_m_m_trigger_shadow_color_open, #customize-control-dtb_customize_m_m_trigger_shadow_blur");
	if ($("#_customize-input-dtb_modcustomize_m_m_trigger_shadow").prop('checked') === false){
	    $mm_values_11.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_m_m_trigger_shadow').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_trigger_shadow").click(function(){
	    $mm_values_11.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_m_m_trigger_shadow').toggleClass('bottom-space');
	});
	
	$mm_values_12 = $("#customize-control-dtb_modcustomize_m_m_trigger_text, #customize-control-dtb_customize_m_m_trigger_text_position, #customize-control-et_divi-m_m_trigger_font, #customize-control-dtb_customize_m_m_trigger_font_weight, #customize-control-dtb_customize_m_m_trigger_font_size, #customize-control-dtb_customize_m_m_trigger_font_lettersp, #customize-control-dtb_customize_m_m_trigger_txt_color, #customize-control-dtb_customize_m_m_trigger_txt_color_hover, #customize-control-dtb_customize_m_m_trigger_txt_color_open, #customize-control-dtb_customize_m_m_trigger_txt_color_hover_open");
	if ($("#_customize-input-dtb_modcustomize_m_m_trigger_add_text").prop('checked') === false){
	    $mm_values_12.addClass('hidden').hide();
	    //$('#customize-control-dtb_modcustomize_m_m_trigger_add_text').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_m_m_trigger_add_text").click(function(){
	    $mm_values_12.fadeToggle().toggleClass('hidden');
	    //$('#customize-control-dtb_modcustomize_m_m_trigger_add_text').toggleClass('bottom-space');
	});
	
	
	$cta_values_1 = $("#customize-control-dtb_customize_cta_fixed_text_color, #customize-control-dtb_customize_cta_fixed_bg_color, #customize-control-dtb_customize_cta_fixed_border_color, #customize-control-dtb_customize_cta_fixed_text_color_hover, #customize-control-dtb_customize_cta_fixed_bg_color_hover, #customize-control-dtb_customize_cta_fixed_border_color_hover");
	if ($("#_customize-input-dtb_modcustomize_cta_fixed_style").prop('checked') === false){
	    $cta_values_1.addClass('hidden').hide();
	    $('#customize-control-dtb_modcustomize_cta_fixed_style').addClass('bottom-space');
	}
	$("#_customize-input-dtb_modcustomize_cta_fixed_style").click(function(){
	    $cta_values_1.fadeToggle().toggleClass('hidden');
	    $('#customize-control-dtb_modcustomize_cta_fixed_style').toggleClass('bottom-space');
	});
	
	
	
	
	// Show Hide Popups
	
	if ($('select[name=dtb_popup_number]').val() === '1') {
		$('.pop2, .pop3, .pop4, .pop5').hide();
	}
	if ($('select[name=dtb_popup_number]').val() === '5') {
		$('.pop2, .pop3, .pop4, .pop5').show();
	}
	if ($('select[name=dtb_popup_number]').val() === '4') {
		$('.pop2, .pop3, .pop4').show();
		$('.pop5').hide();
	}
	if ($('select[name=dtb_popup_number]').val() === '3') {
		$('.pop2, .pop3').show();
		$('.pop4, .pop5').hide();
	}
	if ($('select[name=dtb_popup_number]').val() === '2') {
		$('.pop2').show();
		$('.pop3, .pop4, .pop5').hide();
	}
	$('select[name=dtb_popup_number]').change(function(){
		$('.pop2, .pop3, .pop4, .pop5').hide();
		if($(this).val() === '2'){
			$('.pop2').show();
		}
		if($(this).val() === '3'){
			$('.pop2, .pop3').show();
		}
		if($(this).val() === '4'){
			$('.pop2, .pop3, .pop4').show();
		}
		if($(this).val() === '5'){
			$('.pop2, .pop3, .pop4, .pop5').show();
		}
	});
	
	$(".post-meta, .archive #left-area .et_pb_post, .et_pb_title_meta_container").html(function () {
		return $(this).html().replace(/\|/g, '').replace('by', '').replace('...', '').replace(/,/g, '');
	});
	
	 if ($.fn.hurkanSwitch) {
	 
	 $('.checkbox').hurkanSwitch({
		'onTitle':'Enabled',
		'offTitle':'Disabled',
		'responsive':true

	});
	 
	 $('.on-off').hurkanSwitch({
		'onTitle':'ON',
		'offTitle':'OFF',
		'responsive':true

	});
	
	}
	
	// Show & Hide Toolbox Options
	$('.hide, .dtb-cust-link').not('.dtb-visible').hide();
	$('.trigger .hurkanSwitch-switch-item-status-on.active').closest('.trigger').next('.hide').show();
	$('.hurkanSwitch-switch-item-status-on.active').closest('.box-content').next('.dtb-cust-link').show();
	
	$('.trigger .minibox, .ico-trigger .minibox').click(function(){
	  if($('.hurkanSwitch-switch-item-status-on', this).hasClass('active')) {
		  $(this).parent('.trigger').next('.hide').show();
		  $(this).next('.dtb-cust-link').show();
		}
	  else{
	    $(this).parent('.trigger').next('.hide').hide();
		  $(this).next('.dtb-cust-link').hide();
	  }
	 });
	 
	$('.tool-section').next('.toolbox').addClass('first');
	$('.tool-section:not(.first)').prev().addClass('last');
	
	// Mobile menu show/hide
	
	// show hide "hide top bar"
	$('.hidetopbar .hurkanSwitch-switch-item-status-on.active').parents('.hidetopbar').next().next('.hide').addClass('hidden');
	$('.hidetopbar .minibox').click(function(){
	  if($('.hurkanSwitch-switch-item-status-on', this).hasClass('active')) {
		  $(this).parent('.hidetopbar').next().next('.hide').addClass('hidden');
		}
	  else{
	    $(this).parent('.hidetopbar').next().next('.hide').removeClass('hidden');
	  }
	 });
	
	// Info 
	$('#sub-accordion-panel-divi_toolbox_settings li.panel-meta').after('<div class="info"><p>You can add/remove additional customization panels by managing your <a href="' +toolbox_values.template_url+'/wp-admin/admin.php?page=divi_toolbox">Toolbox Settings</a>. Only enabled options are listed below.</p></div>');
	
	// change to mobile view on mobile tab
	$( '#customize-control-title_headings' ).click( function () {
		previewUrlValue.set( toolbox_values.login_url );
		
	});
	
	$('#dtb_export_submit').click(function(){
		$('<input>').attr({
			type: 'hidden',
			name: 'dtb_subform_type',
			value: 'settings_export',
			id: 'dtb_export_submit_hidden_input'
		}).appendTo('#dtb_settings_form');
	});
	$('#dtb_import_submit').click(function(){
		$('<input>').attr({
			type: 'hidden',
			name: 'dtb_subform_type',
			value: 'settings_import',
			id: 'dtb_import_submit_hidden_input'
		}).appendTo('#dtb_settings_form');
	});	
	$('#epanel-save').click(function(){
		$('#dtb_export_submit_hidden_input').remove();
		$('#dtb_import_submit_hidden_input').remove();
	});
	$('#dtb_settings_form input').on('keypress', function(event) {
		if(event.keyCode === 13){
			event.preventDefault()
		}
   });
   var dtb_custom_preloader_image = $('#dtb_custom_preloader_image');
   var dtb_custom_preloader_image_val = $('#dtb_custom_preloader_image').prop('checked');
   var dtb_preloaders_list = $('#dtb_preloaders_list');
   if(dtb_custom_preloader_image_val){
		dtb_preloaders_list.hide();
   }
   dtb_custom_preloader_image.on('change', function(){
		if($(this).prop('checked')){
			dtb_preloaders_list.hide();
		}
		else{
			dtb_preloaders_list.show();			
		}
   });


});

jQuery(document).ready(function(){	
	jQuery('.dtb-loader .status').delay(300).fadeOut('slow');
	jQuery('.dtb-loader').delay(300).fadeOut('slow');
	jQuery('#dtb .page-container').css('min-height','0');
})