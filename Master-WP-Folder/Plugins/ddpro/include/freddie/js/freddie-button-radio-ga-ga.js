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

        // Freddie Button Radio Ga Ga

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_radio_ga_ga ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="arrows"><div class="arrow arrow_first"></div><div class="arrow arrow_middle"></div><div class="arrow arrow_last"></div></div>').appendTo($(this))
        })


        var tlRadioGa = new TimelineLite();
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_radio_ga_ga ').hover(
            function () {

                tlRadioGa.to($(this).find('.arrow_first'), 0.4, {
                    x: 0,
                    opacity: 1,
                    ease: Circ.easeOut
                }, 0.2)
                    .to($(this).find('.arrow_middle'), 0.3, {
                        x: 0,
                        opacity: 1,
                        ease: Circ.easeOut

                    }, 0.1)
                    .to($(this).find('span'), 0.4, {
                        x: -22,
                        ease: Circ.easeOut

                    }, 0)
                    .to($(this).find('.arrows'), 0.4, {
                        x: -23,
                        ease: Circ.easeOut

                    }, 0);
            }, function () {
                tlRadioGa.clear();
                var tl2RadioGa = new TimelineLite();
                tl2RadioGa.to($(this).find('.arrow_first'), 0.3, {
                    x: -6,
                    opacity: 0,
                    ease: Circ.easeOut
                }, 0)
                    .to($(this).find('.arrow_middle'), 0.4, {
                        x: -6,
                        opacity: 0,
                        ease: Circ.easeOut

                    }, 0.1)
                    .to($(this).find('span'), 0.4, {
                        x: -11,
                        ease: Circ.easeOut

                    }, 0.3)
                    .to($(this).find('.arrows'), 0.4, {
                        x: -34,
                        ease: Circ.easeOut

                    }, 0.3);
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);