//Hungry Menu
jQuery(function($){
	$('.freddie_hungry_header_main_menu').click(function(){
		$('.freddie_hungry_menu_menu').toggleClass('opened');
	});


	$('.freddie_hungry_header_main_menu .et_pb_blurb .et_pb_main_blurb_image').insertAfter('.freddie_hungry_header_main_menu .et_pb_blurb .et_pb_blurb_container')


    $('.freddie_hungry_header .freddie_hungry_header_sec_menu .et_pb_menu .et_pb_menu__wrap ul.et-menu > li > a').each(function () {
        var buttonText = $(this).text();
        $(this).html('<span>' + buttonText + '</span>');


        $('<div class="line_container"><div class="line">.................</div></div>').appendTo($(this));

        var freddieHungryHeaderItemText = new SplitText($(this).find(".line"), {
            type: "chars",
            charsClass: "char char++",
            position: "reletive"
        });

    })




    $('.freddie_hungry_header .freddie_hungry_header_sec_menu .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').hover(
        function () {
            var thistl = this;
            var charArray = $(this).children('a').find(".char").toArray();
            thistl.tlAllGirls = new TimelineLite();
            thistl.tlAllGirls.staggerFromTo(charArray, 0.5, {
                x: 10,
                opacity: 0
            }, {
                x: 0,
                opacity: 1,
                ease: Power1.easeInOut
            }, 0.05);

            thistl.tlAllGirls.play();

        }, function () {
            var thistl = this;
            thistl.tlAllGirls.reverse();


        }
    )
});