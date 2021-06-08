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
        // Freddie Button Delilah


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_delilah ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="button_circle"></div>'));
            $('<div class="line"></div>').appendTo($(this).find('span'));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_delilah ').hover(
            function () {

                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".button_circle"), 0.3, {
                    scale: 2.6,
                    transformOrigin: "left center",
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find(".line"), 0.3, {
                        width: "100%",
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find("span"), 0.3, {
                        x: -5,
                        ease: Linear.easeNone
                    }, 0);

            }, function () {
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".button_circle"), 0.3, {
                    scale: 1,
                    transformOrigin: "left center",
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find(".line"), 0.3, {
                        width: "0",
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find("span"), 0.3, {
                        x: 0,
                        ease: Linear.easeNone
                    }, 0);


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);