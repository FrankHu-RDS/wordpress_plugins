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
        if($('.freddie_satisfied_blurb ').length !== 0){
            $('.freddie_satisfied_blurb .et_pb_blurb ').each(function () {
                $('<div class="top_line line"></div>').appendTo($(this))
                $('<div class="bottom_line line"></div>').appendTo($(this));


                // var split = new SplitText($(this).find(".et_pb_blurb_description p"), {
                //     type: "words chars",
                //     charsClass: "char char++",
                //     position: "relative"
                // });
            })




            var tlSatisfiedBlurbText;
            var tlSatisfiedBlurbText2;
            var tlSatisfiedBlurb;
            var tlSatisfiedBlurb2;




            $('.freddie_satisfied_blurb .et_pb_blurb ').hover(function () {

                tlSatisfiedBlurbText = new TimelineLite();
                tlSatisfiedBlurbText2 = new TimelineLite();
                tlSatisfiedBlurb = new TimelineLite();
                tlSatisfiedBlurb2 = new TimelineLite();

                tlSatisfiedBlurb.to($(this).find('.top_line'), 0.2, {
                    height: '3px',
                    left: 0,
                    top: 0,
                    ease: Power2.easeOut
                },0)
                    .to($(this).find('.top_line'), 0.2, {
                        width: '100%',
                        ease: Power2.easeOut
                    },0.3)


                tlSatisfiedBlurb2.to($(this).find('.bottom_line'), 0.2, {
                    bottom: 0,
                    height: '4px',
                    ease: Power2.easeOut
                },0)
                    .to($(this).find('.bottom_line'), 0.2, {
                        width: '100%',
                        ease: Power2.easeOut
                    },0.3)
                    .to($(this).find('.bottom_line'), 0.4, {
                        height: '100%',
                        ease: Power2.easeOut
                    },0.5);


                // var chars = $(this).find('.char').toArray();
                // tlSatisfiedBlurbText.staggerFromTo(chars, 0.5, {
                //     rotationX: 0,
                //     y: '0',
                //     opacity: 1,
                //     ease: Power3.easeOut
                // }, {
                //     rotationX: "180deg",
                //     y: '-10px',
                //     opacity: 0,
                //     ease: Power3.easeOut
                // }, 0.01)
                //
                // setTimeout(function () {
                //     tlSatisfiedBlurbText2.staggerFromTo(chars, 0.5, {
                //         rotationX: "180deg",
                //         y: '10px',
                //         opacity: 0,
                //         ease: Power3.easeOut
                //     }, {
                //         rotationX: "0",
                //         y: '0',
                //         opacity: 1,
                //         ease: Power3.easeOut
                //     }, 0.01)
                // },800)

            }, function () {
                tlSatisfiedBlurb.reverse();
                tlSatisfiedBlurb2.reverse();

            })

        }

    }, lineBlurbTimeOut);

})(jQuery);