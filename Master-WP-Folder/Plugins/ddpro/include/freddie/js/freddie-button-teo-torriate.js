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
        // Freddie Button Teo Torriate
        $(".freddie_button_teo_torriate").each(function () {
            var text = $(this).text();
            $(this).html('<span>' + text + '</span>');
            $('<div class="line"></div>').appendTo($(this))
        })


        var splitButtonTorriate = new SplitText(".freddie_button_teo_torriate span", {
            type: "chars",
            charsClass: "char char++",
            position: "reletive"
        });


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_teo_torriate ').hover(
            function () {
                var thisTl = this;

                thisTl.t1Torriate = new TimelineLite;
                var charsButtonTorriate = $(this).find('.char').toArray();
                thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0.1, {
                    y: "-5px",
                    ease: Power0.easeNone
                }, 0.02)
                    .staggerTo(charsButtonTorriate, 0.1, {
                        y: "0",
                        ease: Power0.easeNone
                    }, 0.02, "-=0");

                thisTl.t1Torriate.play();
            }, function () {
                var thisTl = this;
                var charsButtonTorriate = $(this).find('.char').toArray();
                thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0, {
                    y: "0",
                    ease: Power0.easeNone
                }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);