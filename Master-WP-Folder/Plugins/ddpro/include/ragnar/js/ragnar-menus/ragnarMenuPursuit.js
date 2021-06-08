(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuPursuit = 200;

    if (isIE()) {
        ragnarMenuPursuit = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuPursuit = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_pursuit ').length != 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_pursuit_container').append('<div id="ragnar_menu_pursuit_overlay"></div>');

        //create spans for menu items
        $('.ragnar_menu_pursuit .fullwidth-menu > li > a').wrapInner('<span></span>');

        //social media bar, auto position
        // var menuHeight = $('.ragnar_menu_pursuit .fullwidth-menu').height();


        $('.ragnar-pursuit-menu-social-media').appendTo($('.ragnar_menu_pursuit'));

        $('.ragnar_menu_pursuit_logo.white').insertBefore($('.ragnar_menu_pursuit'))

        //open menu
        function openMenuHijack() {
            $('.ragnar_menu_pursuit_container').addClass('opened');
            $('.ragnar_menu_pursuit').addClass('opened_menu');

            var transitionDelay = 0;
            $('.ragnar_menu_pursuit.opened_menu .fullwidth-menu li').each(function (){
                $(this).css('transition-delay', transitionDelay + 's');
                transitionDelay = transitionDelay + 0.2
            })

            var transitionDelaySocials = 0.4;
            $('.ragnar_menu_pursuit.opened_menu .ragnar-pursuit-menu-social-media li').each(function (){
                $(this).css('transition-delay', transitionDelaySocials + 's');
                transitionDelaySocials = transitionDelaySocials + 0.2
            })

            var bigLogo = $('.ragnar_menu_pursuit_logo.white');
            var hijackMenuBg = $('.ragnar_menu_pursuit');
            var hijackMenu = $('.ragnar_menu_pursuit .fullwidth-menu');
            // var hijackSocMed = $('.ragnar-pursuit-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_pursuit_overlay');

            // $('.ragnar_menu_pursuit_logo.white').show();
            $('.ragnar_menu_pursuit_logo.black').hide();


            TweenMax.to(hijackMenuBg, 0.4, {
                left: "0"
            })
            TweenMax.to(bigLogo, 0.4, {
                x: "0%",
                delay: 0.3
            })
            TweenMax.to(hijackMenu, 0.3, {
                display: "block"
            });
            // TweenMax.to(hijackSocMed, 0.3, {
            //     opacity: 1,
            //     delay: 0.5
            // });
            TweenMax.to(hijackOverlay, 0.3, {
                left: "0",
                opacity: 1
            });
        }

        //close menu
        function closeMenuHijack() {
            var bigLogo = $('.ragnar_menu_pursuit_logo.white');
            var hijackMenuBg = $('.ragnar_menu_pursuit');
            var hijackMenu = $('.ragnar_menu_pursuit .fullwidth-menu');
            // var hijackSocMed = $('.ragnar-pursuit-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_pursuit_overlay');

            // $('.ragnar_menu_pursuit_logo.white').hide();
            $('.ragnar_menu_pursuit_logo.black').show();

            $('.ragnar_menu_pursuit_container').removeClass('opened');
            $('.ragnar_menu_pursuit ').removeClass('opened_menu');

            $('.ragnar_menu_pursuit .fullwidth-menu li').css('transition-delay', '0s');
            $('.ragnar_menu_pursuit .ragnar-pursuit-menu-social-media li').css('transition-delay', '0s');

            TweenMax.to(hijackMenuBg, 0, {
                left: "-100%",

            });
            TweenMax.to(bigLogo, 0.4, {
                x: "-101%"
            })
            TweenMax.to(hijackMenu, 0, {
                display: "none"
            });
            // TweenMax.to(hijackSocMed, 0, {
            //     opacity: 0
            // });

            TweenMax.to(hijackOverlay, 0.3, {
                left: "101%",
                opacity: 0
            })
            TweenMax.to(hijackOverlay, 0, {
                left: "-101%",
                delay: 0.5
            });


        }

        //form close icon
        function menu_transform(){
            var line1 = $('.line_01');
            var line2 = $('.line_02');
            var line3 = $('.line_03');

            TweenMax.to(line1, 0.3, {
                rotation: '-45',
                y: 7
            });
            TweenMax.to(line2, 0.3, {
                rotation: '45',
                y: 1
            });
            TweenMax.to(line3, 0.3, {
                opacity: 0
            });
        }

        //revert menu icon to default
        function menu_revert() {
            var line1 = $('.line_01');
            var line2 = $('.line_02');
            var line3 = $('.line_03');

            TweenMax.to(line1, 0.3, {
                rotation: '0',
                y: 0
            });
            TweenMax.to(line2, 0.3, {
                rotation: '0',
                y: 0
            });
            TweenMax.to(line3, 0.3, {
                opacity: 1
            });
        }

        //menu click
        $('.ragnar_menu_pursuit_container .ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_pursuit_container').hasClass('opened')) {
                openMenuHijack();
                menu_transform();
            } else if ( $('.ragnar_menu_pursuit_container').hasClass('opened') ) {
                closeMenuHijack();
                menu_revert();
            }
        });


        setTimeout(function (){
            var bigLogoWidth = $('.ragnar_menu_pursuit_logo.white').outerWidth();
            var desktopHeight = $(window.top).height();
            var topMenuHeight = $('.ragnar_menu_pursuit_container ').height();


            $('.ragnar_menu_pursuit .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('max-height', desktopHeight - topMenuHeight)
            $('#page-container .ragnar_menu_pursuit .et_pb_fullwidth_menu .fullwidth-menu-nav').css('cssText', 'padding-left: '+ bigLogoWidth +'px !important')
        },1000)




    }, ragnarMenuPursuit);

})(jQuery);