(function ($) {

	setTimeout(function(){

		$('.et_mobile_menu:not(.changed)').prepend('<span class="close"></span>');
		$('.et_mobile_menu li:not(.changed)').prepend('<span class="close"></span>');
		$('.et_mobile_menu, .et_mobile_menu li:not(.changed)').addClass('changed');
		$('.et_mobile_menu li.menu-item-has-children').addClass('menu-closed');
		$(this).addClass('changed');

	$('.et_mobile_menu > span.close').on('click', function(){
		//console.log('close click');
		$('.mobile_menu_bar_toggle').click();
	});

	// $('.et_mobile_menu li.menu-item-has-children').on('click', function(e){
	// 	e.preventDefault();
		
	// });


	$('.et_mobile_menu li span.close').on('click', function(e){
		e.preventDefault();
		//console.log('li close click');
		$(this).parent('li.menu-item-has-children').toggleClass('menu-closed').toggleClass('menu-opened');
		
	});

	$('.et_mobile_menu li.menu-item-has-children a').on('click', function(e){
	//	console.log('a click');
		if ($(this).attr('href') === undefined) {
			e.preventDefault();
			//console.log('li close click');
		$(this).parent('li.menu-item-has-children').toggleClass('menu-closed').toggleClass('menu-opened');

		}
	});

 }, 1000);

})(jQuery);