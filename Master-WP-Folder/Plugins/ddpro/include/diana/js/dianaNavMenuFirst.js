(function ($) {

    var dianaMenueFirstTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueFirstTimeOut = 10000;
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
        dianaMenueFirstTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_first_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_first_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_first_menu .et_pb_search').css('display') === "none") {
                    $('.diana_first_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_first_menu .et_pb_search').hide('slow');
                }
            });



            $('.full_width_menu_first .et_pb_fullwidth_menu ').appendTo('.diana_first_menu .menu_col ');
            $('.full_width_menu_first ').remove();

            if($('body:not(.et-fb) #custom-ddp-menu .diana_first_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

        }
    },dianaMenueFirstTimeOut)

})(jQuery);