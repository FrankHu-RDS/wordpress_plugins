(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var myWayBlurbTimeOut = 1500;

    if (isIE()) {
        myWayBlurbTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        myWayBlurbTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_on_my_way_blurb ').length !== 0){
            $('.freddie_on_my_way_blurb .et_pb_column  ').each(function () {
                $('<div class="hover_box"></div>').appendTo($(this))
            })
            $('.freddie_on_my_way_blurb .et_pb_blurb ').each(function () {

                $('<div class="title_line line"></div>').appendTo($(this).find('h4'))


                var split = new SplitText($(this).find(".et_pb_blurb_container h4"), {
                    type: "words chars",
                    charsClass: "char char++",
                    position: "relative"
                });
            })


            var tlMyWayBlurb;


            // var buttonFirstRightSize = $('.freddie_on_my_way_blurb .et_pb_column .et_pb_button').css('left')
            // var tlMyWayBlurbFirst = new TimelineLite();
            // tlMyWayBlurbFirst.to($('.freddie_on_my_way_blurb .et_pb_column .et_pb_button '), 0, {
            //     right: 'auto',
            //     left: buttonFirstRightSize,
            //     ease: Power2.easeOut
            // },0)


            $('.freddie_on_my_way_blurb .et_pb_column ').hover(function () {

                var buttonRightSize = $(this).find('.et_pb_button').css('left')
                tlMyWayBlurb = new TimelineLite();


                var chars = $(this).find('.char').toArray();
                tlMyWayBlurb.staggerFromTo(chars, 0.5, {
                    y: '0',
                    opacity: 1,
                    ease: Power3.easeOut
                }, {
                    y: '-100px',
                    opacity: 0,
                    ease: Power3.easeOut
                }, 0.01)

                .to($(this).find('.title_line'), 0.5, {
                    height: '0',
                    ease: Power2.easeOut
                },0)
                    .to($(this).find('.et_pb_blurb_description'), 0.5, {
                        x: '-101%',
                        opacity: 0,
                        ease: Power2.easeOut
                    },0)
                    .to($(this).find('.hover_box'), 0.4, {
                        width: '100%',
                        maxWidth: '100%',
                        ease: Power2.easeOut
                    },0.4)
                    .to($(this).find('.hover_box'), 0.4, {
                        scaleX: '0',
                        transformOrigin:"right",
                        ease: Power2.easeOut
                    },0.9)
                    .to($(this).find('.et_pb_button'), 0.4, {
                        right: buttonRightSize,
                        left: 'auto',
                        ease: Power2.easeOut
                    },0.5)






            }, function () {
                tlMyWayBlurb.reverse();
            })

        }

    }, myWayBlurbTimeOut);

})(jQuery);