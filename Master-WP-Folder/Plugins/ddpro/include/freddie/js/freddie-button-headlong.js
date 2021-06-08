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
        // Freddie Button Headlong
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong ').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress circle_progress_bottom"/> </svg><svg class="top_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress circle_progress_top"/> </svg>'))
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong').prepend($('<div class="circle"></div><div class="line"></div>'));

        var tlYouAndCircle = new TimelineLite();
        tlYouAndCircle.to($(".et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong .circle_progress_top"), 0, {
            rotationX: -180,
            transformOrigin: "center"
        }, 0)
            .to($(".et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong .circle__background"), 0, {
                rotation: -150,
                transformOrigin: "center"
            }, 0)

        TweenMax.set('.freddie_button_headlong .circle__progress', {drawSVG: 0});
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_headlong ').hover(
            function () {
                var thisTimeLine = this;
                var buttonSpan = $(this).find('span');
                var percentageComplete = 1;
                thisTimeLine.tlCircle = new TimelineLite();
                thisTimeLine.tlCircle.to($(this).find(".circle__progress"), 0.7, {
                    drawSVG: "0 50%",
                    transformOrigin: "center",
                    ease: Power3.easeOut
                }, 0)
                    .to(buttonSpan, 0.3, {
                        x: "-5px"
                    }, 0)
                    .to($(this).find(".circle__background"), 0.3, {
                        drawSVG: "0 100%",
                        transformOrigin: "center",
                        rotation: -180
                    }, 0)
                    .to($(this).find(".line"), 0.3, {
                        width: 0,
                    }, 0);

                thisTimeLine.tlCircle.play();

            }, function () {
                var thisTimeLine = this;
                thisTimeLine.tlCircle.reverse();
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);