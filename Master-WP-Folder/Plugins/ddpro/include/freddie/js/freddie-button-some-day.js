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
        // Freddie Button Some Day
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_some_day ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="bg_color"></div>'));
            $('<div class="arrow"></div>').appendTo($(this))
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_some_day ').on('mouseenter', function () {
            var selfSomeDay = this;
            var $someDayBtn = $(this);


            var onReverseSomeDay = function () {
                var selfSomeDay = this;
            };

            selfSomeDay.hoverSomeDayTl = new TimelineMax({
                paused: true,
                onReverseComplete: onReverseSomeDay,
                onReverseCompleteScope: selfSomeDay
            });

            selfSomeDay.hoverSomeDayTl.to($someDayBtn.find('.bg_color'), .30, {
                width: "100%",
                height: "100%",
                right: 0,
                ease: Circ.easeIn
            }, "start")
                .to($someDayBtn.find('.arrow'), .30, {x: "-8px", opacity: 0, ease: Circ.easeIn}, "start")

                .to($someDayBtn.find('span'), .30, {x: 0, ease: Circ.easeIn}, "start");
            selfSomeDay.hoverSomeDayTl.timeScale(1.1);


            $el = $(this);

            selfSomeDay.hoverSomeDayTl.play();
        })
            .on('mouseleave', function () {
                var selfSomeDay = this;
                $el = $(this);

                selfSomeDay.hoverSomeDayTl.reverse();
            });
    }, freddieButtonsTimeOut)

})(jQuery);