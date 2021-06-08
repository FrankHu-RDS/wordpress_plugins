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
        // Freddie Button Fat Bottomed


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_fat_bottomed ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
            var bgImage = $(this).css('background-image').replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $(this).css('cssText', 'background-image: none !important');


            $(this).prepend($('<div class="hover_icons hover_icons_1"><div class="hover_icon hover_icon_1"><img src="' + bgImage + '"></div><div class="hover_icon hover_icon_2"><img src="' + bgImage + '"></div><div class="hover_icon hover_icon_3"><img src="' + bgImage + '"></div></div>'));
            $('<div class="hover_icons hover_icons_2"><div class="hover_icon hover_icon_1"><img src="' + bgImage + '"></div><div class="hover_icon hover_icon_2"><img src="' + bgImage + '"></div><div class="hover_icon hover_icon_3"><img src="' + bgImage + '"></div></div>').appendTo($(this));
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_fat_bottomed ').hover(
            function () {
                var thisTimeLine = this;

                thisTimeLine.tlFatBottomedCircle = new TimelineLite();
                thisTimeLine.tlFatBottomedCircle.to($(this).find(".hover_icons_1 .hover_icon_1"), 1.2, {
                    y: -3,
                    x: 0,
                    opacity: 1,
                    ease: Elastic.easeOut
                }, 0.1)
                    .to($(this).find(".hover_icons_1 .hover_icon_2"), 1, {
                        y: -15,
                        opacity: 1,
                        ease: Elastic.easeOut
                    }, 0)
                    .to($(this).find(".hover_icons_1 .hover_icon_3"), 1.3, {
                        y: -3,
                        x: 0,
                        opacity: 1,
                        ease: Elastic.easeOut
                    }, 0)
                    .to($(this).find(".hover_icons_2 .hover_icon_1"), 1, {
                        y: -3,
                        x: 0,
                        opacity: 1,
                        ease: Elastic.easeOut
                    }, 0)
                    .to($(this).find(".hover_icons_2 .hover_icon_2"), 0.9, {
                        y: 16,
                        opacity: 1,
                        ease: Elastic.easeOut
                    }, 0.2)
                    .to($(this).find(".hover_icons_2 .hover_icon_3"), 1.2, {
                        y: 4,
                        x: 0,
                        opacity: 1,
                        ease: Elastic.easeOut
                    }, 0);


                thisTimeLine.tlFatBottomedCircle.play();

            }, function () {
                var thisTimeLine = this;
                thisTimeLine.tlFatBottomedCircle.reverse();


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);