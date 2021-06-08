(function ($) {

    var dianaMenueStellarTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueStellarTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueStellarTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_stellar_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_stellar_menu .et_pb_blurb ').on('click', function () {
                if ($('.diana_stellar_menu .et_pb_search').css('display') === "none") {
                    $('.diana_stellar_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_stellar_menu .et_pb_search').hide('slow');
                }
            })

            $('.full_width_menu_stellar .et_pb_fullwidth_menu ').appendTo('.diana_stellar_menu .menu_col ');
            $('.full_width_menu_stellar ').remove();

            $('.diana_stellar_menu .menu_col').prepend($('.full_width_menu_res_stellar .et_pb_fullwidth_menu'));
            $('.full_width_menu_res_stellar ').remove();

            $('.diana_stellar_menu .fullwidth-menu-nav .fullwidth-menu li.menu-item').each(function () {
                var itemText = $(this).children("a").text();
                $(this).children("a").attr('date-hover', itemText);
            });

            if($(window).width() <= 480){
                $('.diana_stellar_menu .et_pb_fullwidth_menu:not(.menu_res )').appendTo('.diana_stellar_menu .first_row .et_pb_column_1_4:first-child')
            }

            if($('body:not(.et-fb) #custom-ddp-menu .diana_stellar_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

        }

    },dianaMenueStellarTimeOut)

})(jQuery);