(function ($) {

    var freedieMenuTimeOut = 1500;

    if ($('body').hasClass('et-fb')) {
        freedieMenuTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieMenuTimeOut = 8000;
    }


    setTimeout(function () {

        if ($('body:not(.et-fb) .freddie_gimme_the_prize_menu_container').hasClass('fixed')) {
            $('body:not(.et-fb) .freddie_gimme_the_prize_menu').addClass('fixed');
            var menuHeight = $('.freddie_gimme_the_prize_menu_container').outerHeight();
            $('#et-main-area').css('padding-top', menuHeight + 'px');
        }


        if ($('.freddie_gimme_the_prize_menu_container').length !== 0) {
            $('.freddie_gimme_the_prize_menu_container .menu_col').prepend($('.freddie_gimme_the_prize_menu .et_pb_fullwidth_menu span.mobile_menu_bar'));
            $('.freddie_gimme_the_prize_menu_container #circle_text').appendTo('.freddie_gimme_the_prize_menu');
            $('.freddie_gimme_the_prize_menu_container .innere_circle_text').appendTo('.freddie_gimme_the_prize_menu');


            var adminBar = 0;
            if ($('#wpadminbar').length !== 0) {
                adminBar = $('#wpadminbar').outerHeight();
            }

            var menuHeight = $('.freddie_gimme_the_prize_menu_container').outerHeight();
            $('.freddie_gimme_the_prize_menu').css('padding-top', adminBar + menuHeight + 'px')


            //    **************************************************************************

            if ($(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner p").length !== 0) {
                var text = $(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner p").text();
                text = text.replace(/ /g, '&nbsp;');
                $(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner").html(text);
            }


            if ($(".freddie_gimme_the_prize_menu #circle_text").length !== 0) {
                var split = new SplitText(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });
                var childs = $(".freddie_gimme_the_prize_menu .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }


                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $(".freddie_gimme_the_prize_menu #circle_text");

                TweenLite.set(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner", {perspective: 400});


                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;


                for (var i = 1; i <= itemsLength; i++) {
                    $(".freddie_gimme_the_prize_menu #circle_text .et_pb_text_inner .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }


                t2.to(inner, 40, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                });



                var menuContHeight = $('.freddie_gimme_the_prize_menu_container').height();
                $('.freddie_gimme_the_prize_menu_container').height(menuContHeight);
            }
            //*************************************************************

            var items = $('.freddie_gimme_the_prize_menu .et_pb_fullwidth_menu .et_mobile_menu li.menu-item').toArray();

            function openMenu() {
                $('.freddie_gimme_the_prize_menu_container').addClass('opened');
                var item = $('.freddie_gimme_the_prize_menu');
                TweenMax.to(item, 0.4, {
                    left: 0,
                    opacity: 1
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

                // $('body').addClass('menuOpened');
            }

            function closeMenu() {
                $('.freddie_gimme_the_prize_menu_container').removeClass('opened');
                var item = $('.freddie_gimme_the_prize_menu');
                TweenMax.to(item, 0.4, {
                    left: -305,
                    opacity: 1
                })

                TweenMax.staggerTo(items, 0.3, {
                    marginLeft: "-50px",
                    opacity: 0
                }, 0.1)

                var t1 = new TimelineLite;
                t1.staggerTo(chars, 1.5, {
                    opacity: 0,
                    scale: 0.8,
                    ease: Back.easeOut
                }, .02);

                // $('body').removeClass('menuOpened');
            }


            if ($(window).width() > 980) {
                $('.freddie_gimme_the_prize_menu_container .mobile_menu_bar').hover(
                    function () {
                        openMenu();
                    }
                )

                $('.freddie_gimme_the_prize_menu').hover(
                    function () {

                    }, function () {
                        closeMenu();
                    }
                )
            }


            if ($(window).width() <= 980) {
                $('.freddie_gimme_the_prize_menu_container .mobile_menu_bar').on('click', function () {
                    if (!$('.freddie_gimme_the_prize_menu_container').hasClass('opened')) {
                        openMenu();
                    } else if ($('.freddie_gimme_the_prize_menu_container').hasClass('opened')) {
                        closeMenu();
                    }
                });
            }
        }

    }, freedieMenuTimeOut)

})(jQuery);