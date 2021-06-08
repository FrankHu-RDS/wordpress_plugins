(function ($) {

    var dianaMenueFrontTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueFrontTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueFrontTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_front_menu ').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.full_width_menu_front .et_pb_fullwidth_menu ').appendTo('.diana_front_menu .menu_col ');
            $('.full_width_menu_front ').remove();

            $('.full_width_menu_top_front .et_pb_fullwidth_menu ').appendTo('.diana_front_menu .menu_top_col ');

            $('.full_width_menu_top_front ').remove();

            if($('body:not(.et-fb) #custom-ddp-menu .diana_front_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

        }



    },dianaMenueFrontTimeOut)

})(jQuery);