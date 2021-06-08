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
        // Freddie Button Blog


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_blag ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="arrow"><div class="middle_line"></div></div><div class="line"></div>').appendTo($(this));
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_blag ').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))


        TweenMax.set('.freddie_button_blag .circle__progress', {drawSVG: "50%"});
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_blag ').hover(
            function () {
                var thistlCircle = this;
                var percentageComplete = 1;
                thistlCircle.tlCircle = new TimelineLite();
                thistlCircle.tlCircle.fromTo($(this).find(".circle__progress"), 0.5, {
                    drawSVG: "50%",
                    rotation: 0,
                }, {
                    drawSVG: "0 50%",
                    rotation: "360deg",
                    transformOrigin: "center",
                    ease: Linear.easeNone
                }, 0.2)
                    .to($(this).find("span"), 0.3, {
                        x: -10,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find("svg"), 0.3, {
                        x: 11,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".arrow"), 0.3, {
                        x: 10,
                        ease: Linear.easeNone
                    }, 0);

                thistlCircle.tlCircle.play();

            }, function () {
                var thistlCircle = this;
                thistlCircle.tlCircle.reverse();

            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);