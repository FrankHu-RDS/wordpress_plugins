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
        // Freddie Button Good Old


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_good_old ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="button_bg"></div>'));
            $(this).prepend($('<div class="button_arrow"></div>'));
        })
        // var tlFatBottomedCircle = new TimelineLite();
        // var tl2FatBottomedCircle = new TimelineLite();
        var tlFatBottomedCircle
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_good_old ').hover(
            function () {
                // var thisTimeLine = this;
                // var tlFatBottomedCircle = new TimelineLite();
                // tlFatBottomedCircle = new TimelineLite();
                tlFatBottomedCircle = new TimelineLite();

                tlFatBottomedCircle.to($(this).find("span"), 0.2, {
                    x: 50,
                    opacity: 0,
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find("span"), 0, {
                        x: -50,
                        opacity: 0,
                        ease: Linear.easeNone
                    }, 0.3)
                    .to($(this).find(".button_bg"), 0.3, {
                        x: "0%",
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".button_arrow"), 0.8, {
                        x: "-50%",
                        left: "50%",
                        opacity: 1,
                        ease: CustomEase.create("custom", "M0,0 C0,0 0.026,0.422 0.062,0.862 0.099,1.245 0.2,1.056 0.22,1 0.232,0.976 0.22,1.016 0.242,0.966 0.282,0.808 0.348,0.948 0.352,0.954 0.38,0.997 0.349,0.965 0.38,1.006 0.43,1.088 0.484,1.022 0.53,0.997 0.58,0.964 0.667,1.002 0.725,1.004 0.829,1.008 1,1 1,1")
                    }, 0.2);

                // tl2FatBottomedCircle.clear();
                // thisTimeLine.tlFatBottomedCircle.play();

            }, function () {
                var thisTimeLine = this;
                tlFatBottomedCircle.clear();
                var tl2FatBottomedCircle = new TimelineLite();

                tl2FatBottomedCircle.to($(this).find("span"), 0.2, {
                    x: 0,
                    opacity: 1,
                    ease: Linear.easeNone
                }, 0.2)
                    .to($(this).find(".button_bg"), 0.2, {
                        x: "101%",
                        ease: Linear.easeNone
                    }, 0.1)
                    .to($(this).find(".button_bg"), 0, {
                        x: "-101%",
                        ease: Linear.easeNone
                    }, 0.4)
                    .to($(this).find(".button_arrow"), 0.3, {
                        x: "130%",
                        left: "100%",
                        opacity: 0,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".button_arrow"), 0, {
                        x: "-130%",
                        left: "0",
                        opacity: 0,
                        ease: Linear.easeNone
                    }, 0.4);
                tl2FatBottomedCircle.play();
            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);