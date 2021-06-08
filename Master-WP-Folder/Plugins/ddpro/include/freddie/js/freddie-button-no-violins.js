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
// Freddie Button  No Violins


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_no_violins').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="arrows"><div class="arrow arrow_first"></div><div class="arrow arrow_last"></div></div>').appendTo($(this))
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_no_violins  ').hover(
            function () {
                var thistlCircle = this;
                thistlCircle.tlCircle = new TimelineLite();
                thistlCircle.tlCircle
                    .to($(this).find("span"), 0.2, {
                        y: -30,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".arrows"), 0.2, {
                        y: "-50%",
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".arrow"), 0.2, {
                        opacity: 1,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".arrow_last"), 0.3, {
                        y: 0,
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