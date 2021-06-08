(function ($) {

    var dianaMenuePioneerTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenuePioneerTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenuePioneerTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_pioneer_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_pioneer_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_pioneer_menu .et_pb_search').css('display') === "none") {
                    $('.diana_pioneer_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_pioneer_menu .et_pb_search').hide('slow');
                }
            })

            $('.full_width_menu_pioneer .et_pb_fullwidth_menu ').appendTo('.diana_pioneer_menu .menu_col ');
            $('.full_width_menu_pioneer ').remove();


            if($('body:not(.et-fb) #custom-ddp-menu .diana_pioneer_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }
        }



    },dianaMenuePioneerTimeOut)

})(jQuery);