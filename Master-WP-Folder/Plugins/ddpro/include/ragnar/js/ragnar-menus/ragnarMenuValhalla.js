(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuValhalla = 200;

    if (isIE()) {
        ragnarMenuValhalla = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuValhalla = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_valhalla ').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_valhalla_container').append('<div class="ragnar_menu_valhalla_overlay ragnar_menu_valhalla_overlay_left"></div><div class="ragnar_menu_valhalla_overlay ragnar_menu_valhalla_overlay_right"></div>');

        //create spans for menu items
        $('.ragnar_menu_valhalla .et-menu > li > a').wrapInner('<span></span>');



        var topDiviMenu = 0;
        if($('body').hasClass('logged-in')){
            topDiviMenu = 32;
        }

        //open menu
        function openMenuHijack() {

            $('.ragnar_menu_valhalla_container').addClass('opened');
            $('.ragnar_menu_valhalla ').addClass('opened_menu');

            // setTimeout(function (){





            var hijackMenuBg = $('.ragnar_menu_valhalla');
            var hijackMenu = $('.ragnar_menu_valhalla .et-menu');
            var hijackOverlay = $('.ragnar_menu_valhalla_overlay');



            TweenMax.to(hijackMenuBg, 0, {
                x: '0%',
                delay: 0.5
            })

            TweenMax.to(hijackMenu, 0.3, {
                display: "block"
            });

            TweenMax.to(hijackOverlay, 0.5, {
                width: "51%",
                ease: "expo.out",
                delay: 0.2
            });


            var itemsLength =  $('.ragnar_menu_valhalla.opened_menu .et-menu li').length;
            var transitionDelay = 0.5;

            for(var i = itemsLength; i > 0; i--){
                $('.ragnar_menu_valhalla.opened_menu .et-menu li:nth-last-child('+ i +') a').css('transition-delay', transitionDelay + 's');
                transitionDelay = transitionDelay + 0.05
            }



            $('#page-container .ragnar_menu_valhalla .et_pb_menu .et-menu-nav ul.et-menu li').each(function (){

                if($(this).position().top < -3){
                    $(this).addClass('hidden')
                }else if($(this).position().top + $(this).height() > $('#page-container .ragnar_menu_valhalla .et_pb_menu .et-menu-nav ul.et-menu').height() + 3){
                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }
            })

        }

        //close menu
        function closeMenuHijack() {

            var hijackMenuBg = $('.ragnar_menu_valhalla');
            var hijackMenu = $('.ragnar_menu_valhalla .et-menu');
            var hijackOverlay = $('.ragnar_menu_valhalla_overlay');





            $('.ragnar_menu_valhalla_container').removeClass('opened');
            $('.ragnar_menu_valhalla ').removeClass('opened_menu');

            $('.ragnar_menu_valhalla .et-menu li a').css('transition-delay', '0s');

            TweenMax.to(hijackMenuBg, 0, {
                x: '-100%',
                delay: 0.5
            });

            TweenMax.to(hijackMenu, 0, {
                display: "none"
            });

            TweenMax.to(hijackOverlay, 0.5, {
                width: "0%",
                ease: "expo.out",
                delay: 0.3
            })


        }



        $('#page-container .ragnar_menu_valhalla .et-menu li a').hover(function() {
            $(this).css('transition-delay', '0s');
        });

        $('.ragnar_menu_valhalla_hamburger.ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_valhalla_container').hasClass('opened')) {
                openMenuHijack();
            } else if ( $('.ragnar_menu_valhalla_container').hasClass('opened') ) {
                closeMenuHijack();
            }
        });





        $('#page-container .ragnar_menu_valhalla .et_pb_menu .et-menu-nav ul.et-menu').on('scroll', function (){
            $(this).find('li').each(function (){
                if($(this).position().top < -3){
                    $(this).addClass('hidden')
                }else if($(this).position().top + $(this).height() > $('#page-container .ragnar_menu_valhalla .et_pb_menu .et-menu-nav ul.et-menu').height() + 3){
                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }
            })
        })





    }, ragnarMenuValhalla);

})(jQuery);