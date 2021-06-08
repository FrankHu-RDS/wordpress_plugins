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
        // Freddie Button Bicycle Race


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_bicycle_race ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="arrow"><div class="middle_line"></div></div><div class="line"></div>'));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_bicycle_race ').hover(
            function () {
                var thist1AprilLady = this;
                thist1AprilLady.t1AprilLady = new TimelineLite;


                thist1AprilLady.t1AprilLady.to($(this).find('.arrow'), 0.2, {
                    x: 7,
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find('span'), 0.2, {
                        x: -3,
                        ease: Linear.easeNone
                    }, 0)

                thist1AprilLady.t1AprilLady.play();

            }, function () {
                var thist1AprilLady = this;
                thist1AprilLady.t1AprilLady.reverse();
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);