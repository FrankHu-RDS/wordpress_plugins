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
        // Freddie Button The Queen


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_the_queen ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
            var bgImage = $(this).css('background-image').replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $(this).css('cssText', 'background-image: none !important');


            $(this).prepend($('<div class="button_bg"></div>'));
            $(this).prepend($('<div class="button_image"><img src="' + bgImage + '"></div>'));
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_the_queen ').hover(
            function () {
                var thisTimeLine = this;

                thisTimeLine.tlFatBottomedCircle = new TimelineLite();
                thisTimeLine.tlFatBottomedCircle.to($(this).find("span"), 0.2, {
                    y: 0,
                    ease: Linear.easeNone
                }, 0.2)
                    .to($(this).find(".button_bg"), 0.2, {
                        scale: 1,
                        borderRadius: 0,
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".button_image"), 0.2, {
                        y: 1,
                        top: 31,
                        ease: Linear.easeNone
                    }, 0.2);


                thisTimeLine.tlFatBottomedCircle.play();

            }, function () {
                var thisTimeLine = this;
                thisTimeLine.tlFatBottomedCircle.reverse();


            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);