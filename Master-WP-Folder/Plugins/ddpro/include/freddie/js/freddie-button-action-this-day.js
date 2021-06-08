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
        // Freddie Button Action This Day


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_action_this_day ').each(function () {
            var buttonText = $(this).text();
            buttonText = buttonText.replace(/ /g, '&nbsp;');
            $(this).html('<span>' + buttonText + '</span>');


            var split = new SplitText($(this).find(" span"), {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });
            var childs = $(this).find(".char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline";
                childs[i].style.width = "100%";
                childs[i].style.top = 0;
                childs[i].style.left = 0;
            }

            TweenLite.set($(this).find(" span"), {perspective: 400});


            var itemsLength = childs.length;
            var rotateSize = 180 / itemsLength;


            for (var i = 0; i < itemsLength; i++) {
                $(this).find("span .char:nth-child(" + (i + 1) + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_action_this_day ').hover(
            function () {
                var t1ActionDay = new TimelineLite;

                var t2ActionDay = new TimelineLite;


                var chars = $(this).find('.char').toArray();
                var inner = $(this).find("span");

                t1ActionDay.staggerFromTo(chars, 0.5, {
                    opacity: 0,
                    scale: 0.5
                }, {
                    opacity: 1,
                    scale: 1,
                    ease: Power3.easeOut
                }, 0.02);

                t2ActionDay.to(inner, 30, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                }, 0);


            }, function () {
                var t1ActionDay = new TimelineLite;

                var t2ActionDay = new TimelineLite;

                var chars = $(this).find('.char').toArray();
                var inner = $(this).find("span");

                t1ActionDay.staggerFromTo(chars, 0.5, {
                    opacity: 1,
                    scale: 1
                }, {
                    opacity: 0,
                    scale: 0.5,
                    ease: Power3.easeOut
                }, 0.02);


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);