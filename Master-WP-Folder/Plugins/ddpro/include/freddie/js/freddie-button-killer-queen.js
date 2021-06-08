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

    setTimeout  (function () {
        // Freddie Button Local Seo

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_killer_queen ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<div class="line_container"><div class="line">.................</div></div>').appendTo($(this));

            var splitButtonGetDown = new SplitText($(this).find(".line"), {
                type: "chars",
                charsClass: "char char++",
                position: "reletive"
            });

        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_killer_queen ').hover(
            function () {
                var thistl = this;
                var charArray = $(this).find(".char").toArray();
                thistl.tlAllGirls = new TimelineLite();
                thistl.tlAllGirls.staggerFromTo(charArray, 0.5, {
                    x: 10,
                    opacity: 0
                }, {
                    x: 0,
                    opacity: 1,
                    ease: Power1.easeInOut
                }, 0.05);

                thistl.tlAllGirls.play();

            }, function () {
                var thistl = this;
                thistl.tlAllGirls.reverse();


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);