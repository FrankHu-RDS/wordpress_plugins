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
        //Freddie Button Life Is Real


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_life_is_real  ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="arrow"><div class="line line_1"></div><div class="middel_line"></div><div class="line line_2"></div></div>').appendTo($(this));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_life_is_real ').hover(
            function () {
                var thistl = this;
                thistl.tlAllGirls = new TimelineLite();
                thistl.tlAllGirls.to($(this).find('.middel_line'), 0.3, {
                    width: "100%",
                    ease: Power1.easeInOut
                }, 0)
                    .to($(this).find('.line'), 0, {
                        opacity: 1
                    }, 0.3)
                    .to($(this).find('.line_1'), 0.3, {
                        rotation: 45,
                        ease: Power1.easeInOut
                    }, 0.3)
                    .to($(this).find('.line_2'), 0.3, {
                        rotation: -45,
                        ease: Power1.easeInOut
                    }, 0.3);

                thistl.tlAllGirls.play();

            }, function () {
                var thistl = this;
                thistl.tlAllGirls.reverse();


            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);