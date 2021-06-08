jQuery(document).ready(function ($) {
	const { __, _x, _n, _nx } = wp.i18n;
	function ddp_vb_admin_custom_icons_show() {
		$('span.et-pb-icon').each(function () {
			var this_content = $(this).text();

			if (this_content.indexOf('ddp') > -1) {
				//console.log(this_content);
				symbol_data = this_content.split("|");
				if (symbol_data.length >= 1) {
					// FA
					if (this_content.indexOf('ddp-fa-icon') > -1) $(this).addClass('ddp-divi-icon ddp-fa-icon');
					// MD
					if (this_content.indexOf('ddp-md-icon') > -1) $(this).addClass('ddp-divi-icon ddp-md-icon');
					$(this).html(symbol_data[2]);
					// | symbol
					//console.log('symbol_data[1] '+symbol_data[1]);
					if (this_content.indexOf('et-icon-quotations-circle') > -1) $(this).html("|");
				}
			}
		});

		$('span.et_pb_inline_icon, a.et_pb_custom_button_icon, button.et_pb_custom_button_icon').each(function () {
			var this_content = $(this).data('icon');


			if (this_content.indexOf('ddp') > -1) {
				//console.log(this_content);
				symbol_data = this_content.split("|");
				if (symbol_data.length >= 1) {
					// FA
					if (this_content.indexOf('ddp-fa-icon') > -1) $(this).addClass('ddp-divi-icon ddp-fa-icon');
					// MD
					if (this_content.indexOf('ddp-md-icon') > -1) $(this).addClass('ddp-divi-icon ddp-md-icon');
					$(this).attr('data-icon', symbol_data[2]);
					// | symbol
					if (this_content.indexOf('et-icon-quotations-circle') > -1) $(this).attr('data-icon', "|");

				}

			}
		});
	} //ddp_vb_admin_custom_icons_show

	setInterval(function () {
		ddp_vb_admin_custom_icons_show()
	}, 100);

	function ddp_admin_custom_icons_show() {
		var ddp_icon_modules = [];
		$('.et-fb-font-icon-list li').each(function () {
			var symbol_data = $(this).attr('data-icon');
			if (symbol_data.indexOf('ddp') > -1) {
				ddp_icon_modules.push($(this));
			}
		});

		if (!$(ddp_icon_modules).length) {
			return false;
		}
		for (i = 0; i < ddp_icon_modules.length; i++) {
			var module = ddp_icon_modules[i];
			var symbol_data = $(module).attr('data-icon');
			console.log(symbol_data);
			var icon_parts = '';
			symbol_data = symbol_data.split("|");
			if (symbol_data.length >= 1) {
				$(module).attr('data-icon', symbol_data[2]);
				$(module).attr('data-search', symbol_data[1]);
				if (symbol_data[0].indexOf('ddp-fa-icon') > -1) $(module).addClass('ddp_divi_icon fas ' + symbol_data[0]);
				if (symbol_data[0].indexOf('ddp-md-icon') > -1) $(module).addClass('ddp_divi_icon ' + symbol_data[0]);
				if (symbol_data[0].indexOf('ddp-et-icon') > -1) $(module).addClass('ddp_divi_icon ' + symbol_data[0]);
				if (symbol_data[1].indexOf('et-icon-quotations-circle') > -1) $(module).attr('data-icon', "|");
				//$(module).append('<i class="'+  symbol_data[0] +'"></i>');
				if ($(module).hasClass('et_pb_shop') && !$(module).hasClass('et_overlay')) {
					var symbol_data_icon = symbol_data[2];
					var symbol_selector = $(module).find('.et_overlay');
					setTimeout(function () {
						symbol_selector.attr('data-icon', symbol_data_icon);
					}, 50);
				}
			}
		}
	}

	setInterval(function () {
		ddp_admin_custom_icons_show()
	}, 100);

	function ddp_vb_icon_search() {
		if ($('div.et-fb-option--select-icon:not(.ddp-search-added)').length >= 1) {
			//console.log('Icon box!');
			$('div.et-fb-option--select-icon:not(.ddp-search-added)').prepend('<div class="ddp-icon-tabs"><span class="ddp-icon-tab-all active">'+__('All', 'ddpro')+' (2662)</span><span class="ddp-icon-tab-et">'+__('Divi Icons', 'ddpro')+' (380)</span><span class="ddp-icon-tab-fa">'+__('Font Awesome Icons', 'ddpro')+' (1350)</span><span class="ddp-icon-tab-md">'+__('Material Icons', 'ddpro')+' (932)</span></div><p><input class="et-fb-settings-option-input ddp-search-field" type="text" placeholder="'+__('Search icons', 'ddpro')+'"></p>');
			$('div.et-fb-option--select-icon:not(.ddp-search-added)').addClass('ddp-search-added');

			if ($('body div.ddp-search-added .et-fb-font-icon-list li.active').length >= 1) {
				ddp_active_icon = $('body div.ddp-search-added .et-fb-font-icon-list li.active').attr('data-icon');
				ddp_active_icon_classes = $('body div.ddp-search-added .et-fb-font-icon-list li.active').attr('class');
				$('<div class="ddp_icon_in_use"><span>Icon selected: </span><span class="ddp-active-icon"></span></div>').insertAfter('input.ddp-search-field');
				$('span.ddp-active-icon').html(ddp_active_icon);
				$('span.ddp-active-icon').attr('class', ddp_active_icon_classes);
				$('body div.ddp-search-added .et-fb-font-icon-list li').on('click', function () {

				});

			}

			// VB fix for missing classes on click
			$('body div.ddp-search-added .et-fb-font-icon-list li').on('click', function () {
				//if(!$(this).hasClass('active')) {
				old_classes = $(this).attr('class');
				this_data_search = $(this).data('search');
				$('li[data-search=' + this_data_search + ']').data('old-classes', old_classes)
				//console.log('Clicl class '+ old_classes);
				setTimeout(function () {
					$('li[data-search=' + this_data_search + ']').attr('class', old_classes + ' active');

					if ($('body div.ddp-search-added .et-fb-font-icon-list li.active').length >= 1) {
						//console.log('Active click');
						ddp_active_icon = $('body div.ddp-search-added .et-fb-font-icon-list li.active').attr('data-icon');
						ddp_active_icon_classes = $('body div.ddp-search-added .et-fb-font-icon-list li.active').attr('class');
						//console.log('ddp_active_ico ' + ddp_active_icon_classes);
						$('.ddp_icon_in_use span:last-child').html(ddp_active_icon);
						$('.ddp_icon_in_use span:last-child').attr('class', ddp_active_icon_classes);
						$("#et-fb-app-frame").contents().find('.et_fb_editing_enabled span.et-pb-icon.et-waypoint').removeClass('ddp-et-icon ddp-fa-icon ddp-md-icon');
						$("#et-fb-app-frame").contents().find('.et_fb_editing_enabled span.et-pb-icon.et-waypoint').addClass(ddp_active_icon_classes);
					}
				}, 200);
				//}
			});

			$('.ddp-search-field').on('keyup', function () {

				var searchTerm = $(this).val().toLowerCase();

				$('.et-fb-font-icon-list li').each(function () {

					if ($(this).filter('[data-search *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
						$(this).show();
					} else {
						$(this).hide();
					}

				});

			});

			// filter tabs
			$('body div.ddp-search-added .ddp-icon-tabs span').on('click', function () {
				//console.log('VB CLICK!');
				$('body div.ddp-search-added .ddp-icon-tabs span').removeClass('active');
				$(this).addClass('active');

				$('body div.ddp-search-added .ddp-icon-tabs span').each(function () {
					if ($(this).hasClass('active')) {
						if ($(this).hasClass('ddp-icon-tab-et')) {
							$('li.ddp_divi_icon').removeClass('hidden');
							$('li.ddp_divi_icon:not(.ddp-et-icon)').addClass('hidden');
						}
						if ($(this).hasClass('ddp-icon-tab-fa')) {
							$('li.ddp_divi_icon').removeClass('hidden');
							$('li.ddp_divi_icon:not(.ddp-fa-icon)').addClass('hidden');
						}
						if ($(this).hasClass('ddp-icon-tab-md')) {
							$('li.ddp_divi_icon').removeClass('hidden');
							$('li.ddp_divi_icon:not(.ddp-md-icon)').addClass('hidden');
						}
						if ($(this).hasClass('ddp-icon-tab-all')) {
							$('li.ddp_divi_icon').removeClass('hidden');
						}
					}
				});
			});
		}
	}

	setInterval(function () {
		ddp_vb_icon_search()
	}, 100);

}); //jQuery(document).ready(function($)