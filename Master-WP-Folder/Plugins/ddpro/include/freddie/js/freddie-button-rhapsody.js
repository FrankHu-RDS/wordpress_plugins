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
        // Freddie Button Rhapsody


        $('<div class="svg_container"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 108.25 6.72" > <g><path class="st0" d="M107.6,1.3c-1.4,0-1.8,0-3.5,0c-1.1,0-2,0-3,0s-1.4,0-3,0c-1.5,0-2.5,0-3.9,0c-1.4,0-1.8,0.1-3.5,0   c-1.3,0-2,0-2.9,0c-1,0-1.4,0-3.1,0c-1.5,0-2.5,0-3.9,0s-1.8,0-3.5,0c-1.2,0-2.1,0-3,0c-1,0-1.4,0-3.1,0c-1.5,0-2.5,0-3.9,0   s-1.7,0.1-3.4,0c-1.2,0-1.9,0-2.9,0c-1,0-1.6,0-3.2,0c-1.5,0-2.4,0-3.8,0h-0.2c-1.4,0-1.7,0-3.3,0c-1.4,0-2,0-3,0c-1,0-1.6,0-3,0   c-1.7,0-2.5,0-3.9,0c-1.4,0-2,0-3.4,0c-1.4,0-2.1,0-3.1,0s-1.3,0-3,0c-1.6,0-2.4,0-3.8,0c-1.4,0-1.9,0-3.6,0c-1.3,0-2,0-3,0   c-1,0-1.4,0-3,0c-1.4,0-2.4,0-3.8,0c-1.4,0-1.8,0.1-3.5,0c-1.2,0-1.9,0-2.9,0c-1,0-1.4,0-3.1,0c-1.5,0-2.2,0-3.7,0"/> </g></svg></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_rhapsody '));


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_rhapsody ').hover(
            function () {
                var thistlCircle = this;

                thistlCircle.tlCircle = new TimelineLite();
                thistlCircle.tlCircle.to($(this).find("svg"), 0.5, {
                    opacity: 1,
                    // scale: 1,
                    // transformOrigin: "left center",
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find("path"), 0.2, {
                        attr: {
                            d: "M107.7,1.33c-1.43,0-2.67,0.68-3.7,2.05c-1,1.33-2,2-3,2s-2-0.67-3-2c-1.07-1.37-2.3-2.05-3.7-2.05  c-1.43,0-2.67,0.68-3.7,2.05c-1.03,1.33-2.03,2-3,2c-1,0-2-0.67-3-2c-1.07-1.37-2.32-2.05-3.75-2.05c-1.43,0-2.65,0.68-3.65,2.05  c-1.07,1.33-2.07,2-3,2c-1.03,0-2.05-0.67-3.05-2c-1.03-1.37-2.27-2.05-3.7-2.05S64.8,2.01,63.8,3.38c-1.07,1.33-2.08,2-3.05,2  c-1,0-2.02-0.67-3.05-2c-1-1.33-2.18-2.02-3.55-2.05H54c-1.37,0.03-2.55,0.72-3.55,2.05c-1.03,1.33-2.05,2-3.05,2  c-0.97,0-1.97-0.67-3-2c-1.03-1.37-2.25-2.05-3.65-2.05c-1.43,0-2.67,0.68-3.7,2.05c-1.03,1.33-2.05,2-3.05,2s-2-0.67-3-2  c-1.07-1.37-2.3-2.05-3.7-2.05c-1.43,0-2.67,0.68-3.7,2.05c-1.03,1.33-2.03,2-3,2c-1,0-2.02-0.67-3.05-2  c-1.03-1.37-2.27-2.05-3.7-2.05c-1.4,0-2.62,0.68-3.65,2.05c-1.03,1.33-2.05,2-3.05,2c-0.97,0-1.97-0.67-3-2  c-1.03-1.37-2.27-2.05-3.7-2.05"
                        },
                        ease: Power1.easeInOut,
                    }, 0);

                thistlCircle.tlCircle.play();

            }, function () {
                var thistlCircle = this;
                thistlCircle.tlCircle.reverse();


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);