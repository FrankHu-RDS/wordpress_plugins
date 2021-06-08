(function ($) {
    if($('.ragnar_menu_aesir ').length != 0) {
        $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
    }

    //create overlay
    $('<div id="ragnar_menu_aesir_overlay"></div>').insertBefore($('.ragnar_menu_aesir'));

    //create spans for menu items
    $('.ragnar_menu_aesir .fullwidth-menu > li > a').wrapInner('<span></span>');



    $('.ragnar_menu_aesir_logo.white').hide();



    //open menu
    function openMenuHijack() {
        $('.ragnar_menu_aesir_container').addClass('opened');
        $('.ragnar_menu_aesir ').addClass('opened_menu');

        var transitionDelay = 0;
        $('.ragnar_menu_aesir.opened_menu .fullwidth-menu li').each(function (){
            $(this).css('transition-delay', transitionDelay + 's');
            transitionDelay = transitionDelay + 0.2
        })

        var hijackMenuBg = $('.ragnar_menu_aesir');
        var hijackMenu = $('.ragnar_menu_aesir .fullwidth-menu');
        var hijackOverlay = $('#ragnar_menu_aesir_overlay');

        $('.ragnar_menu_aesir_logo.white').show();
        $('.ragnar_menu_aesir_logo.black').hide();

        TweenMax.to(hijackMenuBg, 0.4, {
            left: "0"
        })
        TweenMax.to(hijackMenu, 0.3, {
            display: "block"
        });

        TweenMax.to(hijackOverlay, 0.3, {
            top: "0%"
        });
    }

    //close menu
    function closeMenuHijack() {

        var hijackMenuBg = $('.ragnar_menu_aesir');
        var hijackMenu = $('.ragnar_menu_aesir .fullwidth-menu');

        var hijackOverlay = $('#ragnar_menu_aesir_overlay');

        $('.ragnar_menu_aesir_logo.white').hide();
        $('.ragnar_menu_aesir_logo.black').show();

        $('.ragnar_menu_aesir_container').removeClass('opened');
        $('.ragnar_menu_aesir ').removeClass('opened_menu');

        $('.ragnar_menu_aesir .fullwidth-menu li').css('transition-delay', '0s');

        TweenMax.to(hijackMenuBg, 0, {
            left: "-100%",

        });
        TweenMax.to(hijackMenu, 0, {
            display: "none"
        });


        TweenMax.to(hijackOverlay, 0.3, {
            top: "-101%"
        })


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
    $('.ragnar_menu_aesir_container .ragnar_menu_icon').on('click', function() {
        if (!$('.ragnar_menu_aesir_container').hasClass('opened')) {
            openMenuHijack();
            menu_transform();
        } else if ( $('.ragnar_menu_aesir_container').hasClass('opened') ) {
            closeMenuHijack();
            menu_revert();
        }
    });


    setTimeout(function (){
        var desktopHeight = $(window).height();
        // var topMenuHeight = $('.ragnar_menu_aesir_container ').height();
        $('.ragnar_menu_aesir .et_pb_fullwidth_menu .fullwidth-menu-nav .fullwidth-menu').css('max-height', desktopHeight)
    },1000)



    var lastScrollTop = 0, delta = 5;
    $('#page-container .ragnar_menu_aesir .et_pb_fullwidth_menu .fullwidth-menu-nav ul.fullwidth-menu').scroll(function (){
        var nowScrollTop = $(this).scrollTop();

        if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
            if (nowScrollTop > lastScrollTop){
                var transitionDelayScroll = 0;
                var itemsCount = $('.ragnar_menu_aesir.opened_menu .fullwidth-menu li').length;

                $('.ragnar_menu_aesir.opened_menu .fullwidth-menu li').each(function (){
                    $(this).css('transition-delay', transitionDelayScroll + 's');
                    transitionDelayScroll = transitionDelayScroll + 0.01
                })


                TweenMax.to($('.ragnar_menu_aesir.opened_menu .fullwidth-menu li'), 0.3, {
                    y: "-30px",
                    skewY: 4,
                    transformOrigin:"right"
                })
                TweenMax.to($('.ragnar_menu_aesir.opened_menu .fullwidth-menu li'), 0.3, {
                    y: "0px",
                    skewY: 0,
                    transformOrigin:"right",
                    delay: itemsCount*0.1
                });
            } else {
                var transitionDelayScroll = 0;
                var itemsCount = $('.ragnar_menu_aesir.opened_menu .fullwidth-menu li').length;


                for(var i = itemsCount; i >=1; i--) {
                    $('.ragnar_menu_aesir.opened_menu .fullwidth-menu li:nth-child('+ i +')').css('transition-delay', transitionDelayScroll + 's');
                    transitionDelayScroll = transitionDelayScroll + 0.2;
                    itemsCount = itemsCount - 1
                }

                // TweenMax.to($('.ragnar_menu_aesir.opened_menu .fullwidth-menu li'), 0.3, {
                //     y: "30px"
                // })
                // TweenMax.to($('.ragnar_menu_aesir.opened_menu .fullwidth-menu li'), 0.3, {
                //     y: "0px",
                //     delay: 0.5
                // });


            }
            lastScrollTop = nowScrollTop;
        }


    })





})(jQuery);