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
        // Freddie Button Dancer

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_dancer ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="bg_color"></div>').appendTo($(this))
        })


        function getDistDancer(point1, point2) {
            var b = point2.offset().left - point1.pageX;

            return Math.ceil(Math.sqrt(b * b));
        }


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_dancer ').on("mousemove",
            function (event) {
                var thisTimeLine = this;
                var dist;
                var mouse = event;
                var button = $(this);


                dist = getDistDancer(mouse, button);

                thisTimeLine.tlGetDownCircle = new TimelineLite();

                thisTimeLine.tlGetDownCircle.to($(this).find(".bg_color"), 0.8, {
                    width: dist,
                    ease: Elastic.easeOut
                }, 0);

            }
        )
            .on("mouseleave", function (event) {
                var thisTimeLine = this;

                    thisTimeLine.tlGetDownCircle.to($(this).find(".bg_color"), 0.8, {
                        width: 14,
                        ease: Elastic.easeOut
                    }, 0);

            });
    }, freddieButtonsTimeOut)

})(jQuery);