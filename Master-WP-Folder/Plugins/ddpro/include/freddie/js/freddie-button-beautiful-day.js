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
        // Freddie Button Beautiful Day


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_beautiful_day ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $(this).prepend($('<svg class="svg_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 28 28" ><g> <path class="st0" d="M0,0-7,6.9l7.3,7.3l-7.3,7.3l7,7l7.3-7.3l7.3,7.3l7-7l-7.3-7.3l7.3-7.3l-7-6.9l-7.3,7.3     L0,0z"/> </g></svg>'))

        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_beautiful_day ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle

                .to($(this).find("svg"), 1, {
                    scaleY: 1,
                    opacity: 1,
                    ease: Elastic.easeOut
                }, 0)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })

    }, freddieButtonsTimeOut)

})(jQuery);