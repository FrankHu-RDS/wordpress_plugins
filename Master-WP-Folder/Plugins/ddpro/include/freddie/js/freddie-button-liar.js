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
        $('<div class="line"></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_liar'));


        var tlLiar = new TimelineLite;
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_liar').hover(
            function () {
                var liarLine = $(this).find('.line');

                tlLiar.to($(this), 0.4, {
                    x: "10px",
                    ease: Power3.easeInOut
                }, 0)
                    .to(liarLine, 0.4, {
                        width: "27px",
                        opacity: 1,
                        ease: Power3.easeInOut
                    }, 0)
            }, function () {
                tlLiar.clear();
                var liarLine = $(this).find('.line');
                var tl2Liar = new TimelineLite;
                tl2Liar.to($(this), 0.4, {
                    x: "0",
                    ease: Power3.easeInOut
                }, 0)
                    .to(liarLine, 0.4, {
                        width: "100%",
                        opacity: 0.2,
                        ease: Power3.easeInOut
                    }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);