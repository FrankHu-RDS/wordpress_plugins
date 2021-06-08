(function ($) {

    var dianaMenueMainTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueMainTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueMainTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_main_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_main_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_main_menu .et_pb_search').css('display') === "none") {
                    $('.diana_main_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_main_menu .et_pb_search').hide('slow');
                }
            })

            $('.full_width_menu_main .et_pb_fullwidth_menu ').appendTo('.diana_main_menu .menu_col ');
            $('.full_width_menu_main').remove();

            if($(window).width() <= 980){
                // $('.diana_main_menu .et_pb_column_1_4.search_and_social_icons').insertBefore($('.diana_main_menu .et_pb_column_1_2.menu_col'));
            }

            if($('body:not(.et-fb) #custom-ddp-menu .diana_main_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }
        }



    },dianaMenueMainTimeOut)

})(jQuery);