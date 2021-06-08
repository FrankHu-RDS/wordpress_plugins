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
        // Freddie Button Mother Love

        $('<div class="line"></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_mother_love'));


        var tlLiar = new TimelineLite;
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_mother_love').hover(
            function () {
                var motherLoveLine = $(this).find('.line');
                tlLiar.to(motherLoveLine, 0.4, {
                    width: "40px",
                    ease: Power3.easeInOut
                }, 0)
            }, function () {
                var motherLoveLine = $(this).find('.line');
                tlLiar.clear();
                var tl2Liar = new TimelineLite;
                tl2Liar.to(motherLoveLine, 0.4, {
                    width: "100%",
                    ease: Power3.easeInOut
                }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);