(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieAuthorWorthwhile = 2000;

    if (isIE()) {
        freddieAuthorWorthwhile = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieAuthorWorthwhile = 10000;
    }

    setTimeout(function () {
        if ($('body .freddie_author_worthwhile').length !== 0) {

            $.fn.isInViewport = function () {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                return elementBottom > viewportTop && elementTop < viewportBottom;
            };




            if($(".freddie_author_worthwhile_top .circle_text_promo").length !== 0){

                $(".freddie_author_worthwhile_top .circle_text_promo .et_pb_promo_description").each(function () {
                    if ($(this).find('p').length !== 0) {
                        $(this).find('p').addClass('circle_text');
                    } else {
                        $(this).contents().filter(function () {
                            return this.nodeType === 3;
                        }).wrap("<div class='circle_text'></div>");
                        $(this).find('.circle_text:nth-child(1)').remove();
                    }


                    var paragraphText = $(this).find('.circle_text').html();

                    paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                    $(this).find('.circle_text').html(paragraphText);
                })

                var split = new SplitText(".freddie_author_worthwhile_top .circle_text_promo .et_pb_promo_description .circle_text", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });

                var childs = $(".freddie_author_worthwhile_top .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }

                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $(".freddie_author_worthwhile_top .circle_text_promo .et_pb_promo_description .circle_text");

                TweenLite.set(".freddie_author_worthwhile_top .circle_text_promo .et_pb_promo_description .circle_text", {perspective: 400});

                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;

                for (var i = 1; i <= itemsLength; i++) {
                    $(".freddie_author_worthwhile_top .circle_text_promo .et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }

                t2.to(inner, 30, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                }, 0);




                setInterval(function () {
                    $("body.et-tb .freddie_author_worthwhile_top .circle_text_promo").each(function () {

                        var thisPromo = $(this)
                        if (thisPromo.find('p').length !== 0) {
                            thisPromo.find('p').addClass('circle_text');
                        } else {
                            thisPromo.contents().filter(function () {
                                return this.nodeType === 3;
                            }).wrap("<div class='circle_text'></div>");
                            thisPromo.find('.circle_text:nth-child(1)').remove();
                        }


                        var paragraphText = thisPromo.find('.circle_text').text();

                        paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                        thisPromo.find('.circle_text').html(paragraphText);

                        var split = new SplitText(thisPromo.find(".circle_text"), {
                            type: "chars",
                            charsClass: "char char++",
                            position: "absolute"
                        });

                        var childs = thisPromo.find(".char");

                        for (var i = 0; i < childs.length; i++) {
                            childs[i].style.display = "inline";
                            childs[i].style.width = "100%";
                            childs[i].style.top = 0;
                            childs[i].style.left = 0;
                        }

                        var t2 = new TimelineLite;
                        var chars = split.chars;
                        var inner = thisPromo.find(".et_pb_promo_description .circle_text");

                        TweenLite.set(thisPromo.find(".et_pb_promo_description .circle_text"), {perspective: 400});

                        var itemsLength = childs.length;
                        var rotateSize = 350 / itemsLength;

                        for (var i = 1; i <= itemsLength; i++) {
                            thisPromo.find(".et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                        }
                    })
                },20)



                $('body .freddie_author_worthwhile article.et_pb_post').on('click', function () {
                    window.location.href = $(this).find('.entry-title a').attr('href')
                })
            }
        }

    }, freddieAuthorWorthwhile);

})(jQuery);