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
        // Freddie Button Wild Wind

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_wild_wind ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
            var bgImage = $(this).css('background-image').replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $(this).css('cssText', 'background-image: none !important');

            $('<div class="ovarlay"></div>').appendTo($(this));
            $('<div class="button_icon"><img src="' + bgImage + '"></div>').appendTo($(this));
        })


        var tlWildWind = new TimelineLite();

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_wild_wind ').hover(
            function () {
                var buttonIcon = $(this).find('.button_icon');
                var buttonText = $(this).find('span');

                tlWildWind.to(buttonIcon, 0.8, {
                    scaleX: 1,
                    scaleY: 1,
                    ease: Back.easeOut
                }, 0)
                    .to(buttonText, 0.3, {
                        y: "-3px"
                    }, 0)
            }, function () {
                tlWildWind.clear();
                var buttonIcon = $(this).find('.button_icon');
                var buttonText = $(this).find('span');
                var tl2WildWind = new TimelineLite();
                tl2WildWind.to(buttonIcon, 0.4, {
                    scaleX: 0,
                    scaleY: 0
                }, 0)
                    .to(buttonText, 0.3, {
                        y: "0px"
                    }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);