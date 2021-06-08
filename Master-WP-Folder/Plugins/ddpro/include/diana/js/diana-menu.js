(function ($) {

    var menu1TimeOut = 1000;

    if($('body').hasClass('et-fb')){
        menu1TimeOut = 10000
    }


    setTimeout(function () {
        if($('.menu1_navigate').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }

        if(!$('body').hasClass('et-tb')){
            $('.menu_item').each(function () {
                var itemId = $(this).attr('id');
                $('.menu1_navigate .fullwidth-menu li').each(function () {
                    if($(this).hasClass(itemId)){
                        $('<ul class="sub-menu mega"></ul>').appendTo($(this));
                        $('#'+ itemId +'.menu_item').addClass('moved').appendTo($(this).find('ul.sub-menu'));
                    }
                })
            })

            $('.menu_item:not(".moved")').remove();
        }



        if($(window).width() <= 980){
            var mobileMenu = $('.menu1_navigate .et_mobile_nav_menu a span.mobile_menu_bar').html();
            $('.menu1_navigate .et_mobile_nav_menu a').html('');
            $('<span class="mobile_menu_bar"></span>').appendTo($('.menu1_navigate .et_mobile_nav_menu a'));
            $('.menu1_navigate .et_mobile_nav_menu a span.mobile_menu_bar').html(mobileMenu);
        }


        if($(window).width() <= 767){
            $('<span class="sub_menu_close_icon">Q</span>').appendTo('.menu1_navigate .fullwidth-menu-nav .sub-menu.mega');
            $('.menu1_navigate .et_mobile_nav_menu a span.mobile_menu_bar').on('click', function (e) {
                e.preventDefault();

                if($('.menu1_navigate .fullwidth-menu-nav').css('display') === 'block'){
                    $('.menu1_navigate .fullwidth-menu-nav').hide('slow');
                    $('.menu1_navigate .et_mobile_nav_menu a span.mobile_menu_bar').removeClass('opened');
                }else  if($('.menu1_navigate .fullwidth-menu-nav').css('display') === 'none'){
                    $('.menu1_navigate .fullwidth-menu-nav').show('slow');
                    $('.menu1_navigate .et_mobile_nav_menu a span.mobile_menu_bar').addClass('opened');
                }
            })

            var windowHeight = $(window).height();
            var menuHeight = $('.menu1_logo_section').height();
            var menuMinHeight = windowHeight - menuHeight;
            $('.menu1_navigate .et_pb_fullwidth_menu > .et_pb_row .fullwidth-menu-nav .fullwidth-menu .sub-menu.mega').css('min-height', menuMinHeight + 'px')
            $('.menu1_navigate .fullwidth-menu-nav').css('min-height', menuMinHeight + 'px')
            $('.menu1_navigate .fullwidth-menu > li > a').on('click', function () {
                $('.menu1_navigate .fullwidth-menu-nav .sub-menu.mega').removeClass('closed');
            })

            $('.menu1_navigate .fullwidth-menu-nav .sub_menu_close_icon').on('click', function () {
                    $(this).parent('.sub-menu.mega').addClass('closed');
            })
        }


        if($('body:not(.et-fb) #custom-ddp-menu .menu1_logo_section').hasClass('fixed')){
            $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
            var menuHeight = $('#custom-ddp-menu').height();
            $('#et-main-area').css('padding-top', menuHeight + 'px');
        }

        $('.menu1_navigate #Services .et_pb_blurb:first-child').addClass('active');
        $('.menu1_navigate #Services .et_pb_blurb').hover(
            function() {
                $('.menu1_navigate #Services .et_pb_blurb').removeClass('active');
                $(this).addClass('active');
                var itemBg = $(this).find('.et_pb_main_blurb_image img').attr('src');

                $('.menu1_navigate #Services .et_pb_image img').attr('src', itemBg);
				$('.menu1_navigate #Services .et_pb_image img').attr('srcset', '');
            }
        )





    //    Contact Form



        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function () {
            $(this).parent("p").addClass("focus");
        });

        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function () {
            if ($(this).val()) {
                $(this).parent().addClass("filled");
            } else {
                $(this).parent().removeClass("filled");
            }
            $(this).parent("p").removeClass("focus");
        });


        $(".menu1_navigate #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_filters ul a").html(function () {
            return $(this).html().replace(/[0-9]+/, '');
        });


    },menu1TimeOut);

    var timeOutMenu = 2500;


    function isIE() {
        ua = navigator.userAgent;
        /* MSIE used to detect old browsers and Trident used to newer ones*/
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    /* Create an alert to show if the browser is IE or not */
    if (isIE()){
        timeOutMenu = 10000;
    }

    if($('body').hasClass('et-fb')){
        timeOutMenu = 10000;
    }

    setTimeout(function () {
        $(' #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_filters ul').children().eq(1).find('a').trigger('click');
        var lengthFilters = $(' #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_filters ul li').length;
        for( var i = 6; i <= lengthFilters; i++){
            $(' #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_filters ul li:nth-child('+ i +')').addClass('delete');

        }
        $(' #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_filters ul li.delete').remove();
    },timeOutMenu)


})(jQuery);