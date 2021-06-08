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
        // Freddie Button Soul Brother

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_soul_brother ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="bg_color"></div>'));
        })


        var tlSoulBrother = new TimelineLite();
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_soul_brother ').hover(
            function () {

                tlSoulBrother.to($(this).find('span'), 0.3, {
                    x: -35,
                    ease: Power0.easeNone
                }, 0)
                    .to($(this).find('.bg_color'), 0, {
                        opacity: 1,
                        ease: Power0.easeNone

                    }, 0);
            }, function () {
                tlSoulBrother.clear();
                var tl2SoulBrother = new TimelineLite();
                tl2SoulBrother.to($(this).find('span'), 0.3, {
                    x: 0,
                    ease: Power0.easeNone
                }, 0)
                    .to($(this).find('.bg_color'), 0, {
                        opacity: 0,
                        ease: Power0.easeNone

                    }, 0);
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);