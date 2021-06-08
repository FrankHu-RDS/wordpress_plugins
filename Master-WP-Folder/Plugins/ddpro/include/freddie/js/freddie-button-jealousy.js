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


        var tl = new TimelineLite;
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_jealousy').hover(
            function () {
                var jealousyLeft = $(this).find('.left');
                var jealousyCenter = $(this).find('.center');
                var jealousyRight = $(this).find('.right');


                tl.to(jealousyRight, 0.4, {
                    width: "100%",
                    x: "18px"
                }, 0)
                    .to(jealousyCenter, 0.4, {
                        width: "100%"
                    }, 0)
                    .to(jealousyCenter, 0.1, {
                        scaleX: 0
                    }, 0.5)
                    .to(jealousyLeft, 0.1, {
                        width: "100%",
                        x: "18px"
                    }, 0.5)

            }, function () {
                tl.clear();
                var jealousyLeft = $(this).find('.left');
                var jealousyCenter = $(this).find('.center');
                var jealousyRight = $(this).find('.right');

                var tl2 = new TimelineLite;
                tl2.to(jealousyRight, 0.1, {
                    width: "50px",
                    x: "-18px"
                }, 0.3)
                    .to(jealousyCenter, 0.3, {
                        scaleX: 1
                    }, 0)
                    .to(jealousyCenter, 0.1, {
                        width: "0%"
                    }, 0.3)
                    .to(jealousyLeft, 0.3, {
                        width: "50px",
                        x: "-18px"
                    }, 0)

            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);