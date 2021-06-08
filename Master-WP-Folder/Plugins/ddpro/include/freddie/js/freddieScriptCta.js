(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieCtaTimeOut = 100;

    if (isIE()) {
        freddieCtaTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieCtaTimeOut = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_music_speak_cta').length !== 0) {
            $('<div class="hover_container"></div>').appendTo($('.freddie_music_speak_cta .et_pb_button'))
        }



        if($('.freddie_make_things_cta').length !== 0){

            $(".freddie_make_things_cta .circle_text_promo .et_pb_promo_description").each(function () {
                if ($(this).find('p').length !== 0) {
                    $(this).find('p').addClass('circle_text');
                } else {
                    $(this).contents().filter(function () {
                        return this.nodeType === 3;
                    }).wrap("<div class='circle_text'></div>");
                    $(this).find('.circle_text:nth-child(1)').remove();
                }


                var paragraphText = $(this).find('.circle_text').text();

                paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                $(this).find('.circle_text').html(paragraphText);
            })

            var split = new SplitText(".freddie_make_things_cta .circle_text_promo .et_pb_promo_description .circle_text", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childs = $(".freddie_make_things_cta .char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline";
                childs[i].style.width = "100%";
                childs[i].style.top = 0;
                childs[i].style.left = 0;
            }

            var t2 = new TimelineLite;
            var chars = split.chars;
            var inner = $(".freddie_make_things_cta .circle_text_promo .et_pb_promo_description .circle_text");

            TweenLite.set(".freddie_make_things_cta .circle_text_promo .et_pb_promo_description .circle_text", {perspective: 400});

            var itemsLength = childs.length;
            var rotateSize = 350 / itemsLength;

            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_make_things_cta .circle_text_promo .et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2.to(inner, 30, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            }, 0);
        }


    }, freddieCtaTimeOut);

})(jQuery);