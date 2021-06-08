jQuery(document).ready(function($) {
const { __, _x, _n, _nx } = wp.i18n;
function ddp_admin_custom_icons_show(){
	var ddp_icon_modules = [];
	 $('.et_font_icon li').each(function(){
	 	var symbol_data = $(this).attr( 'data-icon');
			if (symbol_data.indexOf('ddp') > -1){
			ddp_icon_modules.push($(this));
		}
    });

	if( ! $(ddp_icon_modules).length ) { return false; }
	for( i = 0; i < ddp_icon_modules.length; i++ ) {
		var module = ddp_icon_modules[i];
		var symbol_data = $(module).attr( 'data-icon');
		var icon_parts = '';
		symbol_data = symbol_data.split("|");
		if( symbol_data.length >= 1 ) {
			$(module).attr( 'data-icon', symbol_data[2] );
			$(module).attr( 'data-search', symbol_data[1] );
			if(symbol_data[0].indexOf('ddp-fa-icon') > -1) $(module).addClass( 'ddp_divi_icon fas ' + symbol_data[0]);
			if(symbol_data[0].indexOf('ddp-md-icon') > -1) $(module).addClass( 'ddp_divi_icon ' + symbol_data[0]);
			if(symbol_data[0].indexOf('ddp-et-icon') > -1) $(module).addClass( 'ddp_divi_icon ' + symbol_data[0]);
			if(symbol_data[1].indexOf('et-icon-quotations-circle') > -1) $(module).attr( 'data-icon', "|");
			//$(module).append('<i class="'+  symbol_data[0] +'"></i>');
			if ( $(module).hasClass('et_pb_shop') && !$(module).hasClass('et_overlay') ){
				var symbol_data_icon = symbol_data[2];
				var symbol_selector = $(module).find('.et_overlay');
				setTimeout(function(){
					symbol_selector.attr( 'data-icon', symbol_data_icon );
				}, 50);
			}
		}
	}
}

function ddp_icon_search() {
	if($('div.et-pb-option-container--select_icon:not(.ddp-search-added)').length >= 1) {
		//console.log('Icon box!');
		$('div.et-pb-option-container--select_icon:not(.ddp-search-added)').prepend('<div class="ddp-icon-tabs"><span class="ddp-icon-tab-all active">'+__('All', 'ddpro')+ ' (2662)</span><span class="ddp-icon-tab-et">'+__('Divi Icons', 'ddpro')+' (380)</span><span class="ddp-icon-tab-fa">"'+__('Font Awesome 5 Free" Icons', 'ddpro')+' (1350)</span><span class="ddp-icon-tab-md">"'+__('Material Design" Icons', 'ddpro')+' (932)</span></div><p><input class="ddp-search-field" type="text" placeholder="'+__('Search icons (keyword)', 'ddpro')+'"></p>');
		$('div.et-pb-option-container--select_icon:not(.ddp-search-added)').addClass('ddp-search-added');
		$('body div.ddp-search-added p.description').insertAfter('.et-pb-option--select_icon label[for=et_pb_font_icon]');
		if($('body div.ddp-search-added .et_font_icon li.et_active').length >= 1){
			ddp_active_icon = $('body div.ddp-search-added .et_font_icon li.et_active').attr('data-icon');
			ddp_active_icon_classes = $('body div.ddp-search-added .et_font_icon li.et_active').attr('class');
			$('<div class="ddp_icon_in_use"><span>Icon selected: </span><span class="ddp-active-icon"></span></div>').insertAfter('input.ddp-search-field');
			$('span.ddp-active-icon').html(ddp_active_icon);
			$('span.ddp-active-icon').attr('class', ddp_active_icon_classes);
			$('span.ddp-active-icon').attr('data-icon', ddp_active_icon);
			$('body div.ddp-search-added .et_font_icon li').on('click', function() {
				//console.log('Active click');
				ddp_active_icon = $('body div.ddp-search-added .et_font_icon li.et_active').attr('data-icon');
				ddp_active_icon_classes = $('body div.ddp-search-added .et_font_icon li.et_active').attr('class');
				//console.log('ddp_active_ico ' + ddp_active_icon_classes);
				$('.ddp_icon_in_use span:last-child').html(ddp_active_icon);
				$('.ddp_icon_in_use span:last-child').attr('class', ddp_active_icon_classes);
				$('.ddp_icon_in_use span:last-child').attr('data-icon', ddp_active_icon);
		});

		}

		$('.ddp-search-field').on('keyup', function(){

		var searchTerm = $(this).val().toLowerCase();

		    $('.et_font_icon li').each(function(){

		        if ($(this).filter('[data-search *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
		            $(this).show();
		        } else {
		            $(this).hide();
		        }

		    });

		});

		// filter tabs
		$('body div.ddp-search-added .ddp-icon-tabs span').on('click', function(){
			$('body div.ddp-search-added .ddp-icon-tabs span').removeClass('active');
			$(this).addClass('active');

			$('body div.ddp-search-added .ddp-icon-tabs span').each(function(){
			if($(this).hasClass('active')) {
				if($(this).hasClass('ddp-icon-tab-et')) {
					$('li.ddp_divi_icon').removeClass('hidden');
					$('li.ddp_divi_icon:not(.ddp-et-icon)').addClass('hidden');
				}
				if($(this).hasClass('ddp-icon-tab-fa')) {
					$('li.ddp_divi_icon').removeClass('hidden');
					$('li.ddp_divi_icon:not(.ddp-fa-icon)').addClass('hidden');
				}
				if($(this).hasClass('ddp-icon-tab-md')) {
					$('li.ddp_divi_icon').removeClass('hidden');
					$('li.ddp_divi_icon:not(.ddp-md-icon)').addClass('hidden');
				}
				if($(this).hasClass('ddp-icon-tab-all')) {
					$('li.ddp_divi_icon').removeClass('hidden');
				}
			}
		});
		});

	}
}

setInterval(function(){ ddp_admin_custom_icons_show();  ddp_icon_search(); }, 100);

}); //jQuery(document).ready(function($)