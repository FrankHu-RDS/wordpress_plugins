(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieStealinVideoTimeOut = 1000;

    if (isIE()) {
        freddieStealinVideoTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieStealinVideoTimeOut = 10000;
    }

    setTimeout(function () {

        if($('.freddie_stealin_video_content ').length !== 0){
            $(".freddie_stealin_video_content .circle_text_blurb .et_pb_blurb_description").each(function () {
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

            if($(".freddie_stealin_video_content .circle_text_blurb").length !== 0){
                var split = new SplitText(".freddie_stealin_video_content .circle_text_blurb .et_pb_blurb_description .circle_text", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });

                var childs = $(".freddie_stealin_video_content .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }

                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $(".freddie_stealin_video_content .circle_text_blurb .et_pb_blurb_description .circle_text");

                TweenLite.set(".freddie_stealin_video_content .circle_text_blurb .et_pb_blurb_description .circle_text", {perspective: 400});

                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;

                for (var i = 1; i <= itemsLength; i++) {
                    $(".freddie_stealin_video_content .circle_text_blurb .et_pb_blurb_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }

                t2.to(inner, 30, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                }, 0);
            }



        }

    }, freddieStealinVideoTimeOut)

})(jQuery);