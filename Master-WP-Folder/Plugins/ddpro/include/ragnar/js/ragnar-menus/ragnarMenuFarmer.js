(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarMenuFarmer = 200;

    if (isIE()) {
        ragnarMenuFarmer = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarMenuFarmer = 5000;
    }

    setTimeout(function () {
        if($('.ragnar_menu_farmer ').length != 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        //create overlay
        $('.ragnar_menu_farmer_container').append('<div id="ragnar_menu_farmer_overlay"></div>');

        //create spans for menu items
        $('.ragnar_menu_farmer .fullwidth-menu > li > a').wrapInner('<span></span>');

        //social media bar, auto position
        // var menuHeight = $('.ragnar_menu_farmer .fullwidth-menu').height();






        //open menu
        function openMenuHijack() {
            $('.ragnar_menu_farmer_container').addClass('opened');
            $('.ragnar_menu_farmer ').addClass('opened_menu');

            var transitionDelay = 0;
            $('.ragnar_menu_farmer.opened_menu .fullwidth-menu li').each(function (){
                $(this).css('transition-delay', transitionDelay + 's');
                transitionDelay = transitionDelay + 0.2
            })

            var hijackMenuBg = $('.ragnar_menu_farmer');
            var hijackMenu = $('.ragnar_menu_farmer .fullwidth-menu');
            var hijackOverlay = $('#ragnar_menu_farmer_overlay');

            $('.ragnar_menu_farmer_logo.white').show();
            $('.ragnar_menu_farmer_logo.black').hide();

            TweenMax.to(hijackMenuBg, 0.4, {
                left: "0"
            })
            TweenMax.to(hijackMenu, 0.3, {
                display: "block"
            });

            TweenMax.to(hijackOverlay, 0.3, {
                left: "0",
                opacity: 1
            });
        }

        //close menu
        function closeMenuHijack() {

            var hijackMenuBg = $('.ragnar_menu_farmer');
            var hijackMenu = $('.ragnar_menu_farmer .fullwidth-menu');

            var hijackOverlay = $('#ragnar_menu_farmer_overlay');

            $('.ragnar_menu_farmer_logo.white').hide();
            $('.ragnar_menu_farmer_logo.black').show();

            $('.ragnar_menu_farmer_container').removeClass('opened');
            $('.ragnar_menu_farmer ').removeClass('opened_menu');

            $('.ragnar_menu_farmer .fullwidth-menu li').css('transition-delay', '0s');

            TweenMax.to(hijackMenuBg, 0, {
                left: "-100%",

            });
            TweenMax.to(hijackMenu, 0, {
                display: "none"
            });


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
        $('.ragnar_menu_farmer_container .ragnar_menu_icon').on('click', function() {
            if (!$('.ragnar_menu_farmer_container').hasClass('opened')) {
                openMenuHijack();
                menu_transform();
            } else if ( $('.ragnar_menu_farmer_container').hasClass('opened') ) {
                closeMenuHijack();
                menu_revert();
            }
        });


        setTimeout(function (){
            var desktopHeight = $(window).height();
            var topMenuHeight = $('.ragnar_menu_farmer_container ').height();
            $('.ragnar_menu_farmer .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('max-height', desktopHeight - topMenuHeight)
        },1000)




    }, ragnarMenuFarmer);

})(jQuery);