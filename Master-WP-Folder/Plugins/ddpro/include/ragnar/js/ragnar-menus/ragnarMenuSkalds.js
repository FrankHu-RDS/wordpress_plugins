(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuSkalds = 200;

    if (isIE()) {
        ragnarMenuSkalds = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuSkalds = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_skalds ').length != 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_skalds_container').append('<div id="ragnar_menu_skalds_overlay"></div>');

        //create spans for menu items
        $('.ragnar_menu_skalds .fullwidth-menu > li > a').wrapInner('<span></span>');

        //social media bar, auto position
        // var menuHeight = $('.ragnar_menu_skalds .fullwidth-menu').height();


        $('.ragnar-skalds-menu-social-media').appendTo($('.ragnar_menu_skalds'));

        $('.ragnar_menu_skalds_logo.white').hide();

        //open menu
        function openMenuHijack() {
            $('.ragnar_menu_skalds_container').addClass('opened');
            $('.ragnar_menu_skalds ').addClass('opened_menu');

            var itemsLength =  $('.ragnar_menu_skalds.opened_menu .fullwidth-menu li').length;
            var transitionDelay = 0.3;

            for(var i = itemsLength; i > 0; i--){
                $('.ragnar_menu_skalds.opened_menu .fullwidth-menu li:nth-last-child('+ i +')').css('transition-delay', transitionDelay + 's');
                transitionDelay = transitionDelay + 0.13
            }



            var hijackMenuBg = $('.ragnar_menu_skalds');
            var hijackMenu = $('.ragnar_menu_skalds .fullwidth-menu');
            var hijackSocMed = $('.ragnar-skalds-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_skalds_overlay');

            $('.ragnar_menu_skalds_logo.white').show();
            $('.ragnar_menu_skalds_logo.black').hide();

            TweenMax.to(hijackMenuBg, 0.4, {
                y: "0%"
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


            $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu li').each(function (){
                if($(this).position().top < 1){

                    $(this).addClass('hidden')
                }else if(($(this).position().top - $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').position().top) + $(this).height() > $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').height() + 3){

                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }
            })
        }

        //close menu
        function closeMenuHijack() {

            var hijackMenuBg = $('.ragnar_menu_skalds');
            var hijackMenu = $('.ragnar_menu_skalds .fullwidth-menu');
            var hijackSocMed = $('.ragnar-skalds-menu-social-media');
            var hijackOverlay = $('#ragnar_menu_skalds_overlay');

            $('.ragnar_menu_skalds_logo.white').hide();
            $('.ragnar_menu_skalds_logo.black').show();

            $('.ragnar_menu_skalds_container').removeClass('opened');
            $('.ragnar_menu_skalds ').removeClass('opened_menu');

            $('.ragnar_menu_skalds .fullwidth-menu li').css('transition-delay', '0s');

            TweenMax.to(hijackMenuBg, 0, {
                y: "-110%"
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
        $('.ragnar_menu_skalds_container .ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_skalds_container').hasClass('opened')) {
                openMenuHijack();
                menu_transform();
            } else if ( $('.ragnar_menu_skalds_container').hasClass('opened') ) {
                closeMenuHijack();
                menu_revert();
            }
        });



        if( $('.ragnar_menu_skalds .et-menu-nav').width() > $('.ragnar_menu_skalds .et-menu-nav').height()){
            $('.ragnar_menu_skalds .et-menu-nav').width($('.ragnar_menu_skalds .et-menu-nav').height())
        }else{
            $('.ragnar_menu_skalds .et-menu-nav').height($('.ragnar_menu_skalds .et-menu-nav').width())
        }



        $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').hover(function (){
            $(this).find('li').css('transition-delay', '0s');
        })
        $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').on('scroll', function (){
            $(this).find('li').css('transition-delay', '0s');
            $(this).find('li').each(function (){
                if($(this).position().top < -10){
                    $(this).addClass('hidden')
                }else if($(this).position().top + $(this).height() > $('#page-container .ragnar_menu_skalds .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').height() + 10){
                    $(this).addClass('hidden')
                }else{
                    $(this).removeClass('hidden')
                }
            })
        })


    }, ragnarMenuSkalds);

})(jQuery);