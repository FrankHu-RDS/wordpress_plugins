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
        // Freddie Button One Day

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_one_day ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

        })

        var tlOneDay = new TimelineLite();
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_one_day ').hover(
            function () {

                tlOneDay.to($(this).find('span'), 0.3, {
                    top: 0,
                    opacity: 1,
                    ease: Power0.easeNone
                }, 0.3)
                    .to($(this).find('span'), 0.3, {
                        maxWidth: "500",
                        paddingRight: 21,
                        ease: Power0.easeNone
                    }, 0);
            }, function () {
                tlOneDay.clear();
                var tl2OneDay = new TimelineLite();
                tl2OneDay.to($(this).find('span'), 0, {
                    top: 7,
                    opacity: 0,
                    ease: Power0.easeNone

                }, 0)
                    .to($(this).find('span'), 0.3, {
                        maxWidth: "0px",
                        paddingRight: 0,
                        ease: Power0.easeNone
                    }, 0.1);
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);