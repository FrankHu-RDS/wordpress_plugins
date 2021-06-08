(function ($) {

    var dianaMenueChampionTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueChampionTimeOut = 10000;
    }

    if($('body').hasClass('et-tb')){
        dianaMenueFirstTimeOut = 10000;
    }


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueChampionTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_champion_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_champion_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_champion_menu .et_pb_search').css('display') === "none") {
                    $('.diana_champion_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_champion_menu .et_pb_search').hide('slow');
                }
            });

            $('.diana_champion_menu .et_pb_column_1_6 .et_pb_blurb .et_pb_blurb_description a').each(function () {
                if($(this).parent('p').length !== 0){
                    $(this).unwrap();
                }

                $(this).wrap("<p></p>");
            });

            $('.full_width_menu_champion .et_pb_fullwidth_menu ').appendTo('.diana_champion_menu .menu_col ');

            $('.full_width_menu_champion ').remove();

            if($(window).width() <= 767){
                $('.diana_champion_menu .logo_row .et_pb_column_1_2 .et_pb_image').appendTo($('.diana_champion_menu .menu_row .et_pb_column_3_4 '))
                $('.diana_champion_menu .menu_row .et_pb_column_3_4 .et_pb_fullwidth_menu').insertBefore($('.diana_champion_menu .menu_row .et_pb_column_1_4 .et_pb_button_module_wrapper '))
            }


            if($('body:not(.et-fb) #custom-ddp-menu .diana_champion_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }


        }
    },dianaMenueChampionTimeOut)

})(jQuery);