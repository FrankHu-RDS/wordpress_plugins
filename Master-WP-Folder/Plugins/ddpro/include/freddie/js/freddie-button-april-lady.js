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
        // Freddie Button April Lady


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_april_lady ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<div class="arrow"><div class="middle_line"></div></div>').appendTo($(this));


            var split = new SplitText($(this).find(" span"), {
                type: "chars",
                charsClass: "char char++",
                position: "relative"
            });
            var childs = $(this).find(".char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline-block";
            }

            TweenLite.set($(this).find(" span"), {perspective: 800});

        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_april_lady ').hover(
            function () {
                var t1AprilLady = new TimelineLite;

                var chars = $(this).find('.char').toArray();

                t1AprilLady.staggerFromTo(chars, 1, {
                    rotationY: 0,

                }, {
                    rotationY: "-180deg",
                    ease: Power3.easeOut
                }, 0)
                    .to($(this).find('span'), 1.1, {
                        x: 0,
                        ease: Power3.easeOut
                    }, 0)
                    .to($(this).find('.arrow'), 1.1, {
                        x: 0,
                        opacity: 1,
                        ease: Power3.easeOut
                    }, 0);


            }, function () {
                var t1AprilLady = new TimelineLite;

                var chars = $(this).find('.char').toArray();

                t1AprilLady.staggerFromTo(chars, 0.5, {
                    rotationY: "-180deg",

                }, {
                    rotationY: "0",
                    ease: Power3.easeOut
                }, 0)
                    .to($(this).find('span'), 1.1, {
                        x: 15,
                        ease: Power3.easeOut
                    }, 0)
                    .to($(this).find('.arrow'), 1.1, {
                        x: 15,
                        opacity: 0,
                        ease: Power3.easeOut
                    }, 0);


            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);