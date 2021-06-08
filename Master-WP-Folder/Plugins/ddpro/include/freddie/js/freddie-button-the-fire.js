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
        // Freddie Button the Fire

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_the_fire ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span class="no_hover">' + buttonText + '</span><span class="hover">' + buttonText + '</span>');
        })
        var tlFire = new TimelineLite();

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_the_fire ').hover(
            function () {
                var spanNoHover = $(this).find('span.no_hover');
                var spanHover = $(this).find('span.hover');

                tlFire.to(spanNoHover, 0.2, {
                    y: "-130%"
                }, 0)
                    .to(spanHover, 0.2, {
                        y: "0%"
                    }, 0)
            }, function () {
                tlFire.clear();
                var spanNoHover = $(this).find('span.no_hover');
                var spanHover = $(this).find('span.hover');
                var tl2Fire = new TimelineLite();
                tl2Fire.to(spanNoHover, 0.2, {
                    y: "0%"
                }, 0)
                    .to(spanHover, 0.2, {
                        y: "130%"
                    }, 0)
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);