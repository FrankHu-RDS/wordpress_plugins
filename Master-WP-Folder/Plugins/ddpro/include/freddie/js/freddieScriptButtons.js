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
            $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy').prepend($('<div class="left"></div><div class="center"></div><div class="right"></div>'));

            var jealousyLeft = $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy .left');
            var jealousyCenter = $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy .center');
            var jealousyRight = $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy .right');


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy').hover(
            function () {
                var tl = new TimelineLite;

                tl.to(jealousyRight, 0.3, {
                    width: "100%",
                    x: "25px"
                })
                tl.to(jealousyCenter, 0.3, {
                    width: "100%"
                })
            },function () {
                var tl = new TimelineLite;

                tl.to(jealousyRight, 0.3, {
                    width: "50px",
                    x: "-25px"
                })
                tl.to(jealousyCenter, 0.3, {
                    width: "0"
                })
            }
        )

    },freddieButtonsTimeOut)

})(jQuery);