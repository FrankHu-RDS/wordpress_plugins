(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieButtonsTimeOut = 1000;

    if (isIE()) {
        freddieButtonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieButtonsTimeOut = 10000;
    }

    setTimeout(function () {
        // Freddie Button Beat Them

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_beat_them ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="line_and_arrow"><div class="button_line"></div><div class="button_arrow"></div></div>').appendTo($(this))
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_beat_them ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle.to($(this).find(".button_arrow"), 0.4, {
                right: "-9px",
                opacity: 1,
                ease: Power1.easeInOut
            }, 0)
                .to($(this).find(".button_line"), 1, {
                    width: "95%",
                    opacity: 1,
                    ease: Bounce.easeOut
                }, 0)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })

    }, freddieButtonsTimeOut)

})(jQuery);