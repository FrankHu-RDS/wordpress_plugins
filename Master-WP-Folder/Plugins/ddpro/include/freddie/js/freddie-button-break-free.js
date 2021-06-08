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
        // Freddie Button Break Free


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_break_free ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_break_free ').prepend($('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 119.08 52.1"  xml:space="preserve"> <g> <path id="Layer1_0_3_STROKES" class="st0" d="M116.99,2.15v36.6h-5.4v0.2l-7.7-0.2H2.09V2.15H116.99z"/> </g> </svg>'))


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_break_free ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle.to($(this).find("path"), 0.3, {
                strokeWidth: 2.6,
                ease: Power1.easeInOut,
            }, 0)
                .to($(this).find("path"), 0.3, {
                    attr: {
                        d: "M116.99,2.15v36.6h-5.4v9.2l-7.7-9.2H2.09V2.15H116.99z"
                    },
                    ease: Power1.easeInOut,
                }, 0.2)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })
    }, freddieButtonsTimeOut)

})(jQuery);