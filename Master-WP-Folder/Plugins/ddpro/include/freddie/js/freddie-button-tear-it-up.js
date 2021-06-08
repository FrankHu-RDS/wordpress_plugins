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
        // Freddie Button Tear It Up
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_tear_it_up ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $(this).prepend($('<div class="arrow arrow_first"><div class="middle_line"></div></div>'));
            $('<div class="arrow arrow_last"><div class="middle_line"></div></div>').appendTo($(this))
        })

        var tlTearItUp = new TimelineLite();
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_tear_it_up ').hover(
            function () {

                tlTearItUp.to($(this).find('.arrow_first'), 0.3, {
                    x: 0,
                    ease: Circ.easeOut
                }, 0.1)
                    .to($(this).find('.arrow_last'), 0.3, {
                        x: 60,
                        ease: Circ.easeOut

                    }, 0)
                    .to($(this).find('span'), 0.4, {
                        x: 18,
                        ease: Circ.easeOut

                    }, 0);
            }, function () {
                tlTearItUp.clear();
                var tl2TearItUp = new TimelineLite();
                tl2TearItUp.to($(this).find('.arrow_first'), 0.3, {
                    x: -60,
                    ease: Circ.easeOut
                }, 0)
                    .to($(this).find('.arrow_last'), 0.3, {
                        x: 0,
                        ease: Circ.easeOut

                    }, 0.1)
                    .to($(this).find('span'), 0.4, {
                        x: -18,
                        ease: Circ.easeOut

                    }, 0);
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);