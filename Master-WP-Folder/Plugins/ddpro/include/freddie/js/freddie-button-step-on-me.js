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
        //    Freddie Button Step On Me
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_step_on_me ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<div class="arrow"><div class="middle_line"></div></div>').appendTo($(this))
            $('<div class="line"></div>').appendTo($(this))
        })


        var tlStepMe = new TimelineLite();
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_step_on_me ').hover(
            function () {

                tlStepMe.to($(this).find('.line'), 0.1, {
                    bottom: -1,
                    ease: Power0.easeNone
                }, 0)
                    .to($(this).find('.arrow'), 1, {
                        y: 5,
                        ease: Bounce.easeOut

                    }, 0);
            }, function () {
                tlStepMe.clear();
                var tl2StepMe = new TimelineLite();
                tl2StepMe.to($(this).find('.line'), 0.2, {
                    bottom: -8,
                    ease: Power0.easeNone
                }, 0)
                    .to($(this).find('.arrow'), 0.3, {
                        y: 0,
                        ease: Power0.easeNone

                    }, 0);
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);