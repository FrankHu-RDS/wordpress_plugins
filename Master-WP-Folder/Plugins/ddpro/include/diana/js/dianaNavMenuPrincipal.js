(function ($) {

    var dianaMenuePrincipalTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenuePrincipalTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenuePrincipalTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_principal_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_principal_menu .et_pb_blurb ').on('click', function () {
                if ($('.diana_principal_menu .et_pb_search').css('display') === "none") {
                    $('.diana_principal_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_principal_menu .et_pb_search').hide('slow');
                }
            })

            $('.full_width_menu_principal .et_pb_fullwidth_menu ').appendTo('.diana_principal_menu .menu_col ');
            $('.full_width_menu_principal ').remove();

            $('.diana_principal_menu .search_and_social_icons ').prepend($('.full_width_menu_res_principal .et_pb_fullwidth_menu'));
            $('.full_width_menu_res_principal ').remove();

            $('.diana_principal_menu .fullwidth-menu-nav .fullwidth-menu li.menu-item').each(function () {
                var itemText = $(this).children("a").text();
                $(this).children("a").attr('date-hover', itemText);
            });

            if($(window).width() <= 480){
                $('.diana_principal_menu .et_pb_fullwidth_menu:not(.menu_res )').appendTo('.diana_principal_menu .first_row .et_pb_column_1_4:first-child')
            }

            if($('body:not(.et-fb) #custom-ddp-menu .diana_principal_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }
        }

    },dianaMenuePrincipalTimeOut)

})(jQuery);