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
        // Freddie Button Dont Stop Me


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_dont_stop_me ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
            var bgImage = $(this).css('background-image').replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $(this).css('cssText', 'background-image: none !important');

            $(this).prepend($('<div class="circle_and_icon"><div class="button_circle"></div><div class="button_icon"><img src="' + bgImage + '"></div></div>'));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_dont_stop_me ').hover(
            function () {

                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".button_circle"), 1, {
                    scale: 1.9,
                    ease: Elastic.easeOut
                }, 0)
                    .to($(this).find(".button_icon"), 0.3, {
                        scale: 1,
                        ease: Linear.easeNone
                    }, 0.2)
                    .to($(this).find("span"), 1, {
                        x: 10,
                        ease: Elastic.easeOut
                    }, 0);

            }, function () {
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".button_circle"), 1, {
                    scale: 0.5,
                    ease: Elastic.easeOut
                }, 0.2)
                    .to($(this).find(".button_icon"), 0.3, {
                        scale: 0,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find("span"), 1, {
                        x: 0,
                        ease: Elastic.easeOut
                    }, 0.2);


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);