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
        // Freddie Button Bohemian


        $('<div class="svg_container"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 96.32 6.92"><defs></defs><g><polyline class="cls-1" points="0.58 1.23 6.23 5.28 11.88 1.23 17.53 5.28 23.18 1.23 28.58 5.08 33.98 1.23 39.63 5.28 45.28 1.23 50.93 5.28 56.58 1.23 62.68 5.68 68.33 1.63 74.03 5.68 79.63 1.63 85.08 5.48 90.48 1.63 95.73 5.48"/><polyline class="cls-2" points="0.58 1.23 6.23 5.28 11.88 1.23 17.53 5.28 23.18 1.23 28.58 5.08 33.98 1.23 39.63 5.28 45.28 1.23 50.93 5.28 56.58 1.23 62.68 5.68 68.33 1.63 74.03 5.68 79.63 1.63 85.08 5.48 90.48 1.63 95.73 5.48"/></g></svg></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_bohemian '));


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_bohemian ').hover(
            function () {

                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find("svg"), 0.5, {
                    opacity: 1,
                    scaleX: 1,
                    transformOrigin: "right center",
                    ease: Linear.easeNone
                });

            }, function () {
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find("svg"), 0.3, {
                    opacity: 0,
                    scaleX: 5,
                    transformOrigin: "right center",
                    ease: Linear.easeNone
                });


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);