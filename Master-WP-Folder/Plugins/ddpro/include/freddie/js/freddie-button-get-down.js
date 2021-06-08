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
        // Freddie Button Get Down

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_get_down ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="line">...............</div>').appendTo($(this));

            var splitButtonGetDown = new SplitText($(this).find(".line"), {
                type: "chars",
                charsClass: "char char++",
                position: "reletive"
            });
        })


        function getDist(point1, point2) {
            var b = point2.offset().left - point1.pageX;

            return Math.ceil(Math.sqrt(b * b));
        }

        var maxScale = 1.9;
        var dots = $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_get_down .char').toArray();

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_get_down ').on("mousemove",
            function (event) {
                var thisTimeLine = this;
                var dot,
                    dist,
                    scale;
                var mouse = event;

                thisTimeLine.tlGetDownCircle = new TimelineLite();
                for (var i = 1; i <= dots.length; i++) {
                    dot = $(this).find('.char' + i + '');
                    dist = getDist(mouse, dot);

                    scale = (20 / dist) * maxScale;
                    scale = scale < 1 ? 1 : scale;
                    scale = scale > maxScale ? maxScale : scale;

                    thisTimeLine.tlGetDownCircle.to(dot, 0.2, {
                        scale: scale,
                        transformOrigin: "center center",
                        ease: Linear.easeNone
                    }, 0);
                }

            }
        )
            .on("mouseleave", function (event) {
                var thisTimeLine = this;
                for (var i = 1; i <= dots.length; i++) {
                    dot = $(this).find('.char' + i + '');
                    thisTimeLine.tlGetDownCircle.to(dot, 0.2, {
                        scale: 1,
                        transformOrigin: "center center",
                        ease: Linear.easeNone
                    }, 0);
                }

            });

    }, freddieButtonsTimeOut)

})(jQuery);