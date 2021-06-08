(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuIdun = 200;

    if (isIE()) {
        ragnarMenuIdun = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuIdun = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_idun ').length != 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_idun_container').append('<div id="ragnar_menu_idun_overlay"></div>');

        //create spans for menu items
        $('.ragnar_menu_idun .fullwidth-menu > li > a').wrapInner('<span></span>');



        $('.ragnar-idun-menu-social-media').appendTo($('.ragnar_menu_idun'));

        $('.ragnar-idun-menu-social-media .et_pb_social_media_follow li').each(function () {
            var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
            $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
        })

        var topDiviMenu = 0;
        if($('body').hasClass('logged-in')){
            topDiviMenu = 32;
        }

        //open menu
        function openMenuHijack() {

            $('.ragnar_menu_idun_container').addClass('opened');
            $('.ragnar_menu_idun ').addClass('opened_menu');


            var itemsLength =  $('.ragnar_menu_idun.opened_menu .fullwidth-menu li').length;
            var transitionDelay = 0.3;



            for(var i = itemsLength; i > 0; i--){
                $('.ragnar_menu_idun.opened_menu .fullwidth-menu li:nth-last-child('+ i +')').css('transition-delay', transitionDelay + 's');
                transitionDelay = transitionDelay + 0.13
            }

            var socialsHeight = $('.ragnar-idun-menu-social-media').outerHeight();
            var desktopHeight = $(window).height();
            var topMenuHeight = $('.ragnar_menu_idun_container ').height();


            $('.ragnar_menu_idun .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('height', desktopHeight - topMenuHeight - socialsHeight - topDiviMenu)

            var hijackMenuBg = $('.ragnar_menu_idun');
            var hijackMenu = $('.ragnar_menu_idun .fullwidth-menu');
            var hijackSocMed = $('.ragnar-idun-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_idun_overlay');


            TweenMax.to(hijackMenuBg, 0.4, {
                y: "0%"
                // top: "50%"
            })
            TweenMax.to(hijackMenu, 0.3, {
                display: "block"
            });
            TweenMax.to(hijackSocMed, 0.3, {
                opacity: 1,
                delay: 0.5
            });
            TweenMax.to(hijackOverlay, 0.3, {
                top: "0%"
            });


            $('.ragnar_menu_idun .fullwidth-menu li').each(function (){
                if(($(this).position().top - 110) + $(this).height() > $('.ragnar_menu_idun .fullwidth-menu ').height() + 40){

                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }

            })



        }

        //close menu
        function closeMenuHijack() {

            var hijackMenuBg = $('.ragnar_menu_idun');
            var hijackMenu = $('.ragnar_menu_idun .fullwidth-menu');
            var hijackSocMed = $('.ragnar-idun-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_idun_overlay');



            $('.ragnar_menu_idun_container').removeClass('opened');
            $('.ragnar_menu_idun ').removeClass('opened_menu');

            $('.ragnar_menu_idun .fullwidth-menu li').css('transition-delay', '0s');

            TweenMax.to(hijackMenuBg, 0, {
                y: "-150%"
                // top: "0%"
            });
            TweenMax.to(hijackMenu, 0, {
                display: "none"
            });
            TweenMax.to(hijackSocMed, 0, {
                opacity: 0
            });

            TweenMax.to(hijackOverlay, 0.3, {
                top: "101%"
            })
            TweenMax.to(hijackOverlay, 0, {
                top: "-101%",
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
                y: 9
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
        $('.ragnar_menu_idun_container .ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_idun_container').hasClass('opened')) {
                openMenuHijack();
                menu_transform();



            } else if ( $('.ragnar_menu_idun_container').hasClass('opened') ) {
                closeMenuHijack();
                menu_revert();
            }
        });


        setTimeout(function (){

            var socialsHeight = $('.ragnar-idun-menu-social-media').outerHeight();
            var desktopHeight = $(window).height();
            var topMenuHeight = $('.ragnar_menu_idun_container ').height();


            $('.ragnar_menu_idun .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('height', desktopHeight - topMenuHeight - socialsHeight - topDiviMenu)
        },1000)

        $('#page-container .ragnar_menu_idun .fullwidth-menu li a').hover(function() {
            $(this).css('transition-delay', '0s');
        });

        $('.ragnar_menu_idun .fullwidth-menu').on('scroll', function (){
            $(this).find('li').css('transition-delay', '0s');
            $(this).find('li').each(function (){
                if($(this).position().top + $(this).height() > $('.ragnar_menu_idun .fullwidth-menu ').height() + 40){
                    $('.ragnar_menu_idun .fullwidth-menu li:last-child').attr('top', $('.ragnar_menu_idun .fullwidth-menu li:last-child').position().top)
                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }
            })
        })

    }, ragnarMenuIdun);

})(jQuery);