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
        // Freddie Button Made In Heaven

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_made_in_heaven').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 154.3 74.82"> <g id="Layer1_10_FILL"> <path class="st0" d="M0.32, 18.43 l0 ,19 l0, 19 h150  v18.15 l0 -37.15 l0 -37.2 v18.2 H0.32z"/> </g> </svg>').appendTo($(this))
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_made_in_heaven ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle
                .to($(this).find("path"), 1, {
                    attr: {
                        // d:"M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z"
                        d: "M0.32, 18.43 l11.45 ,19 l-11.45, 19 h109.85 v18.15 l43.8-37.15 l-43.8 -37.2 v18.2 H0.32z"
                    },
                    ease: Elastic.easeOut
                }, 0.3)
                .to($(this).find("path"), 0.5, {
                    opacity: 1,
                    ease: Power1.easeInOut,
                }, 0)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })
    }, freddieButtonsTimeOut)

})(jQuery);