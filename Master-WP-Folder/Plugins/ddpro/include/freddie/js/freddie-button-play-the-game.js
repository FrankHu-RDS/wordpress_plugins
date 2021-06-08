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
        // Freddie Button Play The Game


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_play_the_game  ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="button_arrow"><div class="line"></div><div class="arrow"></div></div>').appendTo($(this));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_play_the_game ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle
                .to($(this).find(".line"), 0.3, {
                    width: 0,
                    ease: Power1.easeInOut
                }, 0)
                .to($(this).find(".button_arrow"), 0.3, {
                    x: "-5px",
                    borderRadius: 0,
                    ease: Power1.easeInOut
                }, 0)
                .to($(this).find("span"), 0.3, {
                    x: "5px",
                    ease: Power1.easeInOut
                }, 0)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })
    }, freddieButtonsTimeOut)

})(jQuery);