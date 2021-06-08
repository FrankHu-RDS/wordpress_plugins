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
        // Freddie Button Lazing On


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_lazing_on').prepend($('<div class="circle"></div><div class="line"></div>'));


        var tlLazing = new TimelineLite;
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_lazing_on').hover(
            function () {
                var lazingLine = $(this).find('.line');
                var lazingCircle = $(this).find('.circle');

                tlLazing.to(lazingLine, 0.4, {
                    width: "19px"
                }, 0)
                    .to(lazingCircle, 0.4, {
                        scale: 1.1,
                        rotation: 25,
                        opacity: 1
                    }, 0)
            }, function () {
                tlLazing.clear();
                var lazingLine = $(this).find('.line');
                var lazingCircle = $(this).find('.circle');

                var tl2Lazing = new TimelineLite;
                tl2Lazing.to(lazingLine, 0.4, {
                    width: "77px"
                }, 0)
                    .to(lazingCircle, 0.4, {
                        scale: 1,
                        rotation: 0,
                        opacity: 0.2
                    }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);