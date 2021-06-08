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
        if ($('body .freddie_lover_boy_menu_container').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')

            $('.freddie_earth_menu_content ').each(function () {
                $(this).insertAfter($('.freddie_lover_boy_menu .et_pb_fullwidth_menu'))
            })

            // $('.freddie_earth_menu_content ').remove()

            if ($('body:not(.et-fb) .freddie_lover_boy_menu_container').hasClass('fixed')) {
                $('body:not(.et-fb) .freddie_earth_menu').addClass('fixed');
                var menuHeight = $('.freddie_lover_boy_menu_container').outerHeight();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

            var $freddie_menu_icon = $(".freddie_lover_boy_menu_container .freddie_menu_icon");
            var $linea_01 = $(".freddie_lover_boy_menu_container .line.line_01_btn_menu");
            var $linea_02 = $(".freddie_lover_boy_menu_container .line.line_02_btn_menu");
            var $linea_03 = $(".freddie_lover_boy_menu_container .line.line_03_btn_menu");

            function close_despliega_menu() {
                TweenMax.to
                ($linea_02, 0.2, {delay: 0.6, scale: 1});

                TweenMax.to
                ($linea_01, 0.2, {y: 0, rotation: 0, ease: Back.easeOut, delay: 0.2});

                TweenMax.to
                ($linea_03, 0.3, {top: 14, y: 0, rotation: 0, ease: Back.easeOut, delay: 0.4});
            };

            close_despliega_menu();

            function despliega_menu() {
                TweenMax.to
                ($linea_02, 0.2, {delay: 0.2, scale: 0});

                TweenMax.to
                ($linea_01, 0.2, {y: 7, rotation: 45, ease: Back.easeOut, delay: 0.5});

                TweenMax.to
                ($linea_03, 0.3, {top: 0, y: 7, rotation: -45, ease: Back.easeOut, delay: 0.7});
            };


            var items = $('.freddie_lover_boy_menu .et_pb_fullwidth_menu .fullwidth-menu > li.menu-item').toArray();


            if ($('.freddie_lover_boy_menu .et_pb_promo_description p').length !== 0) {
                $('.freddie_lover_boy_menu .et_pb_promo_description p').addClass('circle_text');
            } else {
                $('.freddie_lover_boy_menu .et_pb_promo_description').contents().filter(function () {
                    return this.nodeType === 3;
                }).wrap("<div class='circle_text'></div>");
                $('.freddie_lover_boy_menu .et_pb_promo_description').find('.circle_text:nth-child(1)').remove();
            }


            var paragraphText = $('.freddie_lover_boy_menu .et_pb_promo_description .circle_text').text();

            paragraphText = paragraphText.replace(/ /g, '&nbsp;');

            $('.freddie_lover_boy_menu .et_pb_promo_description .circle_text').html(paragraphText);


            var split = new SplitText(".freddie_lover_boy_menu .et_pb_promo_description .circle_text", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });
            var childs = $(".freddie_lover_boy_menu .char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline";
                childs[i].style.width = "100%";
                childs[i].style.top = 0;
                childs[i].style.left = 0;
            }


            var t2 = new TimelineLite;
            var chars = split.chars;
            var inner = $(".freddie_lover_boy_menu .et_pb_promo_description .circle_text");

            TweenLite.set(".freddie_lover_boy_menu .et_pb_promo_description .circle_text", {perspective: 400});


            var itemsLength = childs.length;
            var rotateSize = 350 / itemsLength;


            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_lover_boy_menu .et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2.to(inner, 30, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            }, 0);


            function openMenuAttack() {
                $('.freddie_lover_boy_menu_container').addClass('opened');
                var item = $('.freddie_lover_boy_menu');
                TweenMax.to(item, 0.4, {
                    x: 0
                })

                TweenMax.staggerTo(items, 0.3, {
                    marginLeft: "0",
                    opacity: 1
                }, 0.1);

                var t1 = new TimelineLite;
                t1.staggerTo(chars, 1.5, {
                    opacity: 1,
                    scale: 1,
                    ease: Back.easeOut
                }, .02);

                $('body').addClass('menu_opened');
            }

            function closeMenuAttack() {
                $('.freddie_lover_boy_menu_container').removeClass('opened');
                var item = $('.freddie_lover_boy_menu');

                TweenMax.to(item, 0.2, {
                    x: '310px',
                    delay: 0,
                }, 0);

                TweenMax.staggerTo(items, 0.3, {
                    marginLeft: "100px",
                    opacity: 0
                }, 0.1)

                var t1 = new TimelineLite;
                t1.staggerTo(chars, 1.5, {
                    opacity: 0,
                    scale: 0.8,
                    ease: Back.easeOut
                }, .02);

                setTimeout(function () {
                    $('body').removeClass('menu_opened');
                }, 500)
            }



            $('.freddie_lover_boy_menu_container .freddie_menu_icon').on('click', function () {
                if (!$('.freddie_lover_boy_menu_container').hasClass('opened')) {
                    openMenuAttack();
                    despliega_menu();
                } else if ($('.freddie_lover_boy_menu_container').hasClass('opened')) {
                    closeMenuAttack();
                    close_despliega_menu();
                }
            });

            setTimeout(function () {
                var menuHeight = $('.freddie_lover_boy_menu_container ').outerHeight();
                $('.freddie_lover_boy_menu').css('padding-top', menuHeight + 'px');
            },1000)


        }


    }, freedieMenuEarthTimeOut)

})(jQuery);