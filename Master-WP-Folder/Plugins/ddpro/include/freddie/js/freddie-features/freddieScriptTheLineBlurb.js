(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var lineBlurbTimeOut = 1500;

    if (isIE()) {
        lineBlurbTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        lineBlurbTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_the_line_blurb').length !== 0){
            $('.freddie_the_line_blurb .et_pb_blurb ').each(function () {
                $('<div class="top_line line"></div>').appendTo($(this).find('.et_pb_main_blurb_image'))
                $('<div class="bottom_line line"></div>').appendTo($(this).find('.et_pb_main_blurb_image'))



                var split = new SplitText($(this).find(".et_pb_blurb_description p"), {
                    type: "words chars",
                    charsClass: "char char++",
                    position: "relative"
                });
            })



            var tlTheLineBlurb;
            var tlTheLineBlurb2;
            var lineWidth = $('.freddie_the_line_blurb .et_pb_blurb .top_line').width();
            var lineLeft = $('.freddie_the_line_blurb .et_pb_blurb .top_line').css('left');



            $('.freddie_the_line_blurb .et_pb_blurb ').hover(function () {
                var textColor = $(this).css('color');

                tlTheLineBlurb = new TimelineLite;

                var chars = $(this).find('.char').toArray();

                tlTheLineBlurb.staggerFromTo(chars, 0.7, {
                    // rotationY: 0,
                    opacity: 0,
                    ease: Power3.easeOut
                }, {
                    // rotationY: "360deg",
                    opacity: 1,
                    ease: Power3.easeOut
                }, 0.01)

                // tlTheLineBlurb2.clear();
                //
                // tlTheLineBlurb = new TimelineLite();
                // tlTheLineBlurb2 = new TimelineLite();
                // tlTheLineBlurb.to($(this).find('.top_line'), 0.5, {
                //
                //     left: 0,
                //     ease: Power2.easeOut
                // },0)
                //     .to($(this).find('.top_line'), 0.5, {
                //         width: '100%',
                //         ease: Power2.easeOut
                //     },0.5)
                //
                //
                // tlTheLineBlurb2.to($(this).find('.bottom_line'), 0.5, {
                //     bottom: '0',
                //     right: 0,
                //     ease: Power2.easeOut
                // },0)
                //     .to($(this).find('.bottom_line'), 0.5, {
                //         width: '100%',
                //         ease: Power2.easeOut
                //     },0.5)
                // .to($(this).find('.top_line'), 0.5, {
                //     height: '100%',
                //     opacity: 0.8,
                //     ease: Power2.easeOut
                // });

            }, function () {
                // tlTheLineBlurb.reverse();
                // tlTheLineBlurb2.reverse();
                // tlTheLineBlurb.stop();
                //
                // tlTheLineBlurb2 = new TimelineLite();
                // tlTheLineBlurb2.to($(this).find('.top_line'), 0.5, {
                //     height: '2px',
                //     opacity: 1,
                //     ease: Power2.easeOut
                // }, 0)
                // .to($(this).find('.top_line'), 0.5, {
                //     width: lineWidth,
                //     left: lineLeft,
                //     ease: Power2.easeOut
                // }, 0.5);

            })


        }

    }, lineBlurbTimeOut);

})(jQuery);