(function ($) {

    var freedieMenuEarthTimeOut = 1500;

    if ($('body').hasClass('et-fb')) {
        freedieMenuEarthTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieMenuEarthTimeOut = 8000;
    }

    setTimeout(function () {

        if ($('.freddie_funny_love_menu').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.freddie_funny_love_menu_content ').each(function () {
                $(this).insertBefore($('.freddie_funny_love_menu .et_pb_fullwidth_menu '))
            })


            $('.freddie_funny_love_menu_content .et_pb_blurb ').hover(
                function () {
                    $('.freddie_funny_love_menu').addClass('hovered');
                }, function () {
                    $('.freddie_funny_love_menu').removeClass('hovered');
                })


            // $('.freddie_funny_love_menu_content ').remove()

            if ($('body:not(.et-fb) .freddie_funny_love_menu_container').hasClass('fixed')) {
                $('body:not(.et-fb) .freddie_funny_love_menu').addClass('fixed');
                var menuHeight = $('.freddie_funny_love_menu_container').outerHeight();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

            var $freddie_menu_icon = $(".freddie_funny_love_menu_container .freddie_menu_icon");
            var $linea_01 = $(".freddie_funny_love_menu_container .line.line_01_btn_menu");
            var $linea_02 = $(".freddie_funny_love_menu_container .line.line_02_btn_menu");
            var $linea_03 = $(".freddie_funny_love_menu_container .line.line_03_btn_menu");

            function close_despliega_menu() {
                TweenMax.to
                ($linea_02, 0.2, {delay: 1, scale: 1});

                TweenMax.to
                ($linea_01, 0.2, {y: 0, rotation: 0, ease: Back.easeOut, delay: 0.5});

                TweenMax.to
                ($linea_03, 0.3, {top: 17, y: 0, rotation: 0, ease: Back.easeOut, delay: 0.7});
            };

            close_despliega_menu();

            function despliega_menu() {
                TweenMax.to
                ($linea_02, 0.2, {delay: 1, scale: 0});

                TweenMax.to
                ($linea_01, 0.2, {y: 8.5, rotation: 45, ease: Back.easeOut, delay: 1.3});

                TweenMax.to
                ($linea_03, 0.3, {top: 0, y: 8.5, rotation: -45, ease: Back.easeOut, delay: 1.5});
            };

            var items = $('.freddie_funny_love_menu .et_pb_fullwidth_menu .fullwidth-menu > li.menu-item').toArray();
            var blurbs = $('.freddie_funny_love_menu .et_pb_blurb').toArray();

            function openMenuAttack() {
                $('.freddie_funny_love_menu_container').addClass('opened');
                var item = $('.freddie_funny_love_menu');
                TweenMax.to(item, 0.4, {
                    top: 0,
                    opacity: 1
                })

                TweenMax.to('.freddie_funny_love_menu .et_pb_promo', 0.8, {
                    opacity: 1,
                    delay: 1
                })

                TweenMax.staggerTo(items, 0.3, {
                    y: "0",
                    opacity: 1
                }, 0.2);

                TweenMax.staggerTo(blurbs, 0.4, {
                    y: "0",
                    opacity: 1
                }, 0.2);

                $('body').addClass('menu_opened');
            }

            function closeMenuAttack() {
                $('.freddie_funny_love_menu_container').removeClass('opened');
                var item = $('.freddie_funny_love_menu');


                TweenMax.staggerTo(items, 0.2, {
                    y: "100px",
                    opacity: 0
                }, 0.05);

                TweenMax.staggerTo(blurbs, 0.2, {
                    y: "100px",
                    opacity: 0
                }, 0.05);

                TweenMax.to(item, 0.2, {
                    top: "101%",
                    opacity: 0,
                    delay: 0,
                }, 0);

                TweenMax.to('.freddie_funny_love_menu .et_pb_promo', 0.3, {
                    opacity: 0,
                })

                setTimeout(function () {
                    $('body').removeClass('menu_opened');
                }, 500)
            }

            $('.freddie_funny_love_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li').on("click", function () {
                var pageLink = $(this).find('a').attr('href');
                window.location.href = pageLink;
            })


            $('.freddie_funny_love_menu_container .freddie_menu_icon').on('click', function () {
                if (!$('.freddie_funny_love_menu_container').hasClass('opened')) {
                    openMenuAttack();
                    despliega_menu();
                } else if ($('.freddie_funny_love_menu_container').hasClass('opened')) {
                    closeMenuAttack();
                    close_despliega_menu();
                }
            });


            $(".freddie_funny_love_menu .et_pb_promo_description").each(function () {
                if ($(this).find('p').length !== 0) {
                    $(this).find('p').addClass('circle_text');
                } else {
                    $(this).contents().filter(function () {
                        return this.nodeType === 3;
                    }).wrap("<div class='circle_text'></div>");
                    $(this).find('.circle_text:nth-child(1)').remove();
                }


                // var paragraphText = $(this).find('.circle_text').text();
                //
                // paragraphText = paragraphText.replace(/ /g, '&nbsp;');
                // console.log(paragraphText);
                // $(this).find('.circle_text').text(paragraphText);
            })

            var split = new SplitText(".freddie_funny_love_menu .et_pb_promo_description .circle_text", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childs = $(".freddie_funny_love_menu .char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline";
                childs[i].style.width = "100%";
                childs[i].style.top = 0;
                childs[i].style.left = 0;
            }

            var t2 = new TimelineLite;
            var chars = split.chars;
            var inner = $(".freddie_funny_love_menu .et_pb_promo_description .circle_text");

            TweenLite.set(".freddie_funny_love_menu .et_pb_promo_description .circle_text", {perspective: 400});

            var itemsLength = childs.length;
            var rotateSize = 350 / itemsLength;

            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_funny_love_menu .et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2.to(inner, 30, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            }, 0);
        }


    }, freedieMenuEarthTimeOut)

})(jQuery);