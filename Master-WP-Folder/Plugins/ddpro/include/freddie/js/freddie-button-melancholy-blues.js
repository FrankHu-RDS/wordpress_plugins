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
        // Freddie Button Melancholy Blues

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_melancholy_blues').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72.8 72.8"><path class="circle" stroke-miterlimit="10" d="M 44 0.7 L 44 0.7 c -9.9 -1.9 -20 0.1 -28.4 5.7 l 0 0 C 7.9 11.6 2.5 19.7 0.7 28.8 l 0 0 c -1.9 9.8 0.1 20 5.7 28.3 l 0 0 c 5.2 7.7 13.3 13.1 22.4 14.9 l 0 0 c 9.8 1.9 20 -0.1 28.4 -5.7 l 0 0 c 7.7 -5.2 13.1 -13.2 14.9 -22.4 l 0 0 c 1.9 -9.8 -0.1 -20.1 -5.7 -28.4 l 0 0 C 61.2 7.9 53.1 2.5 44 0.7 Z" /><path class="shape" stroke-miterlimit="10" d="M56.97 5.49 29.09 0 5.49 15.83 0 43.72 15.83 67.31 43.72 72.8 67.31 56.97 72.8 29.09 56.97 5.49z" /></g></svg>').appendTo($(this))
        })

        var tlMmelancholyBlues = new TimelineLite();
        tlMmelancholyBlues
            .to($(".et_pb_button.freddie_button_melancholy_blues path.shape"), 0, {
                transformOrigin: "center",
                scale: 0.9,
                ease: Power1.easeInOut
            }, 0)
        tlMmelancholyBlues.to($('.freddie_button_melancholy_blues svg path'), 30, {
            rotation: "360",
            repeat: -1,
            transformOrigin: "center",
            ease: Linear.easeNone
        }, 0);

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_melancholy_blues ').hover(function () {

            var thisTimeLine = this;
            thisTimeLine.tlCircle = new TimelineLite();
            thisTimeLine.tlCircle
                .to($(this).find("path.shape"), 1, {
                    scale: 1,
                    transformOrigin: "center",
                    ease: Power1.easeInOut
                }, 0)
                .to($(this).find("path.circle"), 1, {
                    scale: 0.8,
                    transformOrigin: "center",
                    ease: Power1.easeInOut
                }, 0)
            thisTimeLine.tlCircle.play();

        }, function () {
            var thisTimeLine = this;
            thisTimeLine.tlCircle.reverse();
        })
    }, freddieButtonsTimeOut)

})(jQuery);