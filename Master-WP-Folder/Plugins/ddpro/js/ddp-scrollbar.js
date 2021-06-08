jQuery(document).ready(function ($) {

	if ($('.freddie_for_everyone_header').length !== 0) {
		$('body').addClass('no-custom-scrollbar');
	}
	if ($('.freddie_tutti_frutti_content').length !== 0 || $('.freddie_i_want_it_all_header').length !== 0 || $('.freddie_lap_of_gods_person_module').length !== 0) {
		$('body').addClass('no-custom-scrollbar');
	}

	if ($('.freddie_more_info').length !== 0 && $('.freddie_fun_it_content').length !== 0) {
		$('body').addClass('no-custom-scrollbar');
	}

	$(function () {

		//$("#page-container > *").wrapAll('<div id="custom-ddp-scrollbar"></div>');

		//The passed argument has to be at least a empty object or a object with your desired options
		$('body:not(.et-fb):not(.no-custom-scrollbar)').overlayScrollbars({});
	});

	//console.log('menu' + $('#custom-ddp-menu').hasClass('fixed'));

	if ($('body:not(.et-fb):not(.no-custom-scrollbar) #wpadminbar').height() > 0) {
		var top_for_html = $('#wpadminbar').height() + 9;
		//$('html').css('top', top_for_html + 'px');
		$('html body.chrome:not(.et-fb):not(.no-custom-scrollbar), html body:not(.et-fb):not(.no-custom-scrollbar).safari').css('padding-top', $('#wpadminbar').height() + 'px');
	}


	setTimeout(function () {
		if ($('body:not(.et-fb):not(.no-custom-scrollbar) #custom-ddp-menu').hasClass('fixed')) {
			$('html body.chrome, html body.safari').css('padding-top', '0');
		}
	}, 1500);

	function ddp_back_to_top() {
		//console.log("$(os-viewport).scrollTop() " + $('.os-viewport').scrollTop());
		if ($('.et_pb_scroll_top').length) {
			if ($('.os-viewport').scrollTop() > 800) {
				$('.et_pb_scroll_top').show().removeClass('et-hidden').addClass('et-visible');
			} else {
				$('.et_pb_scroll_top').removeClass('et-visible').addClass('et-hidden');
			}



		}
	}

	setTimeout(function () {
		if ($('body').hasClass('os-host')) {
			var instance = OverlayScrollbars($("body"), {
				callbacks: {
					onScroll: function () {
						ddp_back_to_top();
					}
				}
			});

			//Click event to scroll to top
			$('.et_pb_scroll_top').click(function () {
				instance.scroll({
					y: "0"
				}, 800);
			});
		}

	}, 1500);

});