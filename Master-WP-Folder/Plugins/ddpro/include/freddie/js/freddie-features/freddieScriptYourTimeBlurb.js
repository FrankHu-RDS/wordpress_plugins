(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var yourTimeBlurbTimeOut = 1000;

    if (isIE()) {
        yourTimeBlurbTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        yourTimeBlurbTimeOut = 10000;
    }

    setTimeout(function () {


        $('.freddie_your_time_blurb .et_pb_blurb').each(function () {

            $(this).find('.et_pb_blurb_content').prepend($('<div class="arrow"><div class="middle_line"></div></div>'));

            var split = new SplitText($(this).find("h4.et_pb_module_header"), {
                type: "words chars",
                charsClass: "char char++",
                position: "relative"
            });
        })
        var t1YourTimeBlurb;
        $('.freddie_your_time_blurb .et_pb_blurb ').hover(function () {
            var textColor = $(this).find('h4').css('color');
            var textHoverColor = $(this).find('.middle_line').css('background-color');

            t1YourTimeBlurb = new TimelineLite;

            var chars = $(this).find('.char').toArray();

            t1YourTimeBlurb.staggerFromTo(chars, 0.6, {
                rotationY: 0,
                color: textColor,
                ease: Power3.easeOut
            }, {
                rotationY: "360deg",
                color: textHoverColor,
                ease: Power3.easeOut
            }, 0.01)


        }, function () {
            t1YourTimeBlurb.reverse();

        })
    }, yourTimeBlurbTimeOut)

})(jQuery);