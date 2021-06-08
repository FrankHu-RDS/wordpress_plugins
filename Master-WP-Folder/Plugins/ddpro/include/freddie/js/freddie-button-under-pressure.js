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
        // Freddie Button Under Pressure


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_under_pressure ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_under_pressure ').prepend($('  <div class="svg_container"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg><div class="lines"><line class="line line_1"></line><line class="line line_2"></line></div></div>'))


        TweenMax.set('.freddie_button_under_pressure .circle__progress', {drawSVG: '0%'});

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_under_pressure ').hover(
            function () {
                var percentageComplete = 1;
                var thistlPressure = this;

                thistlPressure.tlPressure = new TimelineLite();

                thistlPressure.tlPressure.fromTo($(this).find(".circle__progress"), 0.3, {
                    drawSVG: "0%"
                }, {
                    drawSVG: "0 63%",
                    ease: Power3.easeInOut
                }, 0)
                    .to($(this).find('.line_1'), 0.2, {
                        width: 17,
                        ease: Power3.easeInOut
                    }, 0.3)
                    .to($(this).find('.line_2'), 0.2, {
                        width: 17,
                        ease: Power3.easeInOut
                    }, 0.5)
                    .to($(this).find('span'), 0.4, {
                        x: 5,
                        ease: Power3.easeInOut
                    }, 0);

                thistlPressure.tlPressure.play();

            }, function () {
                var thistlPressure = this;
                thistlPressure.tlPressure.reverse();

            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);