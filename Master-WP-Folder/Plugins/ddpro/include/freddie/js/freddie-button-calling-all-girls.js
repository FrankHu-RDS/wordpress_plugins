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
        // Freddie Button Calling All Girls

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_calling_All_girls ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $('<div class="line">.................</div>').appendTo($(this));

            var splitButtonGetDown = new SplitText($(this).find(".line"), {
                type: "chars",
                charsClass: "char char++",
                position: "reletive"
            });
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_calling_All_girls ').hover(
            function () {
                var thistl = this;
                var charArray = $(this).find(".char").toArray();
                thistl.tlAllGirls = new TimelineLite();
                thistl.tlAllGirls.staggerFromTo(charArray, 1.7, {
                    scale: 0
                }, {
                    scale: 1,
                    ease: Elastic.easeOut
                }, 0.03);

                thistl.tlAllGirls.play();

            }, function () {
                var thistl = this;
                thistl.tlAllGirls.reverse();


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);