(function ($) {


    //  FREDDIE HEADERS *******************************************************

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieHeadersTimeOut = 0;

    if (isIE()) {
        freddieHeadersTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieHeadersTimeOut = 10000;
    }




    setTimeout(function () {

        $('.freddie_kind_of_magic_header .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        })


        var aboutBgImage = $('.freddie_kind_of_magic_header .about_cta').css('background-image');
        $('.freddie_kind_of_magic_header .about_cta').css('background-image', 'none');

        var exploreBgImage = $('.freddie_kind_of_magic_header .explore_cta').css('background-image');
        $('.freddie_kind_of_magic_header .explore_cta').css('background-image', 'none');

        $('.freddie_kind_of_magic_header .about_cta').hover(function () {
            $('.freddie_kind_of_magic_header').css('background-image', aboutBgImage);
            $('.freddie_kind_of_magic_header').addClass("hovered");
            $('.freddie_kind_of_magic_header .about_hover_text').addClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').addClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').addClass("hovered");
        }, function () {
            $('.freddie_kind_of_magic_header .about_hover_text').removeClass("hovered");
            $('.freddie_kind_of_magic_header').css('background-image', 'none');
            $('.freddie_kind_of_magic_header').removeClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
        });

        $('.freddie_kind_of_magic_header .explore_cta').hover(function () {
            $('.freddie_kind_of_magic_header').css('background-image', exploreBgImage);
            $('.freddie_kind_of_magic_header').addClass("hovered");
            $('.freddie_kind_of_magic_header .explore_hover_text').addClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').addClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').addClass("hovered");
        }, function () {
            $('.freddie_kind_of_magic_header .explore_hover_text').removeClass("hovered");
            $('.freddie_kind_of_magic_header').css('background-image', 'none');
            $('.freddie_kind_of_magic_header').removeClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
        });





    }, freddieHeadersTimeOut);

    //  END FREDDIE HEADERS *******************************************************
})(jQuery);