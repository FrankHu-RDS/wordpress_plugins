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
        // Freddie Button Fairy Feller


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_fairy_feller ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_fairy_feller ').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))


        TweenMax.set('.freddie_button_fairy_feller .circle__progress', {drawSVG: 0});
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_fairy_feller ').hover(
            function () {

                var percentageComplete = 1;
                var tlCircle = new TimelineLite();
                tlCircle.fromTo($(this).find(".circle__progress"), 1.3, {
                    drawSVG: "0%",
                    rotation: 0,
                }, {
                    drawSVG: "0 100%",
                    rotation: "360deg",
                    transformOrigin: "center",
                    ease: Power3.easeOut
                }, 0)
                    .to($(this).find("span"), 0.5, {
                        x: 6,
                        ease: Power3.easeOut
                    }, 0);

            }, function () {
                var percentageComplete = 0;
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".circle__progress"), 1.3, {
                    drawSVG: "0",
                    rotation: "0",
                    transformOrigin: "center",
                    ease: Power3.easeOut
                }, 0)
                    .to($(this).find("span"), 0.4, {
                        x: 0,
                        ease: Power3.easeOut
                    }, 0);

            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);