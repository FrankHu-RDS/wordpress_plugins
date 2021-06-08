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
        // Freddie Button Misfire
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_misfire ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_misfire ').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))


        TweenMax.set('.freddie_button_misfire .circle__progress', {drawSVG: 0});
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_misfire ').hover(
            function () {
                var buttonSpan = $(this).find('span');
                var percentageComplete = 1;
                var tlCircle = new TimelineLite();
                tlCircle.fromTo($(this).find(".circle__progress"), 0.5, {
                    drawSVG: "0%"
                }, {
                    drawSVG: "0 82%",
                    ease: Linear.easeNone
                })
                    .to(buttonSpan, 0.5, {
                        x: "3px"
                    }, 0)
                ;

            }, function () {
                var buttonSpan = $(this).find('span');
                var percentageComplete = 0;
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".circle__progress"), 0.5, {
                    drawSVG: "0",
                    ease: Linear.easeNone
                })
                    .to(buttonSpan, 0.5, {
                        x: "-11px"
                    }, 0);

            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);