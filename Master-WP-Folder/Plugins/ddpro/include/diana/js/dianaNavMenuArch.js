(function ($) {

    var dianaMenueArchTimeOut = 0;

    if($('body').hasClass('et-fb')){
        dianaMenueArchTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueArchTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_arch_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')


            if($(window).width() <= 767){
                $('.diana_arch_menu .et_pb_column_1_3.menu_col ').insertAfter($('.diana_arch_menu .et_pb_column_1_3.logo_col'))
                $('.diana_arch_menu .et_pb_column_1_3.social_col ').insertBefore($('.diana_arch_menu .et_pb_column_1_3.logo_col'))
            }

            $('.full_width_menu_arch .et_pb_fullwidth_menu ').insertBefore('.diana_arch_menu .menu_col .et_pb_text ');
            $('.full_width_menu_arch ').remove();

            $('.diana_arch_menu .fullwidth-menu-nav .fullwidth-menu > li.menu-item').each(function () {
                var itemText = $(this).children("a").text();
                $(this).children("a").attr('date-hover', itemText);
            });
            $('.diana_arch_menu .et_pb_promo a').each(function () {
                var itemText = $(this).text();
                $(this).attr('date-hover', itemText);
            });

            if($('body:not(.et-fb) #custom-ddp-menu .diana_arch_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }
        }
    },dianaMenueArchTimeOut)

})(jQuery);