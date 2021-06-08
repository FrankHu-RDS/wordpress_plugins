(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuLonghouse = 200;

    if (isIE()) {
        ragnarMenuLonghouse = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuLonghouse = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_longhouse ').length != 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_longhouse_container').append('<div id="ragnar_menu_longhouse_overlay"></div>');

        //create spans for menu items
        $('.ragnar_menu_longhouse .fullwidth-menu > li > a').wrapInner('<span></span>');



        $('.ragnar-longhouse-menu-social-media').appendTo($('.ragnar_menu_longhouse'));



        //open menu
        function openMenuHijack() {
            $('.ragnar_menu_longhouse_container').addClass('opened');
            $('.ragnar_menu_longhouse').addClass('opened_menu');

            // var transitionDelay = 0;
            // $('.ragnar_menu_longhouse.opened_menu .fullwidth-menu li').each(function (){
            //     $(this).css('transition-delay', transitionDelay + 's');
            //     transitionDelay = transitionDelay + 0.2
            // })

            var hijackSocMed = $('.ragnar-longhouse-menu-social-media');
            var hijackMenuBg = $('.ragnar_menu_longhouse');
            var hijackMenu = $('.ragnar_menu_longhouse .fullwidth-menu');
            var hijackOverlay = $('#ragnar_menu_longhouse_overlay');

            $('.ragnar_menu_longhouse_logo.white').show();
            $('.ragnar_menu_longhouse_logo.black').hide();

            TweenMax.to(hijackMenuBg, 0.4, {
                // left: "0"
                scaleX: 1
            })
            TweenMax.to(hijackMenu, 0.3, {
                display: "block"
            });
            TweenMax.to(hijackSocMed, 0.3, {
                opacity: 1,
                delay: 0.5
            });

            TweenMax.to(hijackOverlay, 0.3, {
                // left: "0",
                // opacity: 1
                scaleX: 1
            });
        }

        //close menu
        function closeMenuHijack() {

            var hijackMenuBg = $('.ragnar_menu_longhouse');
            var hijackMenu = $('.ragnar_menu_longhouse .fullwidth-menu');
            var hijackSocMed = $('.ragnar-longhouse-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_longhouse_overlay');

            $('.ragnar_menu_longhouse_logo.white').hide();
            $('.ragnar_menu_longhouse_logo.black').show();

            $('.ragnar_menu_longhouse_container').removeClass('opened');
            $('.ragnar_menu_longhouse ').removeClass('opened_menu');


            TweenMax.to(hijackMenuBg, 0.3, {
                // left: "-100%",
                scaleX: 0

            });
            TweenMax.to(hijackMenu, 0, {
                display: "none"
            });
            TweenMax.to(hijackSocMed, 0, {
                opacity: 0
            });

            TweenMax.to(hijackOverlay, 0.3, {
                // left: "101%",
                // opacity: 0
                scaleX: 0
            })
            // TweenMax.to(hijackOverlay, 0, {
            //     left: "-101%",
            //     delay: 0.5
            // });


        }

        //form close icon
        function menu_transform(){
            var line1 = $('.line_01');
            var line2 = $('.line_02');
            var line3 = $('.line_03');

            TweenMax.to(line1, 0.3, {
                rotation: '-45',
                y: 9
            });
            TweenMax.to(line2, 0.3, {
                rotation: '45',
                y: 2.5
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
        $('.ragnar_menu_longhouse_container .ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_longhouse_container').hasClass('opened')) {
                openMenuHijack();
                menu_transform();
            } else if ( $('.ragnar_menu_longhouse_container').hasClass('opened') ) {
                closeMenuHijack();
                menu_revert();
            }
        });


        setTimeout(function (){
            var desktopWidth = $(window).width();
            var socialsHeight = $('.ragnar-longhouse-menu-social-media').outerHeight();
            var desktopHeight = $(window).height();


            var itemsLength = $('.ragnar_menu_longhouse .fullwidth-menu li').length;

            $('.ragnar_menu_longhouse .fullwidth-menu li').width(desktopWidth/itemsLength)

            var topMenuHeight = $('.ragnar_menu_longhouse_container ').height();
            $('.ragnar_menu_longhouse .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('height', desktopHeight - topMenuHeight - socialsHeight)
        },1000)



        var menuItemSpaces =  470;

        if($(window).width() <= 980){
            menuItemSpaces =  100;
        }

        if($(window).width() <= 767){
            menuItemSpaces =  80;
        }

        $('.ragnar_menu_longhouse .fullwidth-menu li').hover(function (){
            var linkWidth = $(this).find('a').width() + menuItemSpaces;

            var desktopWidth = $(window).width();
            var itemsLength = $('.ragnar_menu_longhouse .fullwidth-menu li').length - 1;


            $('.ragnar_menu_longhouse .fullwidth-menu li').width((desktopWidth - linkWidth)/itemsLength);
            $('body.gecko .ragnar_menu_longhouse .fullwidth-menu li').width((desktopWidth - linkWidth - 1)/itemsLength);
            $(this).width(linkWidth);
        },function (){
            var desktopWidth = $(window).width();


            var itemsLength = $('.ragnar_menu_longhouse .fullwidth-menu li').length;

            $('.ragnar_menu_longhouse .fullwidth-menu li').width(desktopWidth/itemsLength)
        })


        $('.ragnar_menu_longhouse .fullwidth-menu li').on('click', function (){
            var itemLink = $(this).find('a').attr('href');
            if(itemLink){
                window.location.href = itemLink
            }
        })



    }, ragnarMenuLonghouse);

})(jQuery);