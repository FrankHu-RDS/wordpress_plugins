(function ($) {

    var dianaMenuePrimeTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenuePrimeTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenuePrimeTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_prime_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_prime_menu .et_pb_blurb ').on('click', function () {
                if ($('.diana_prime_menu .et_pb_search').css('display') === "none") {
                    $('.diana_prime_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_prime_menu .et_pb_search').hide('slow');
                }
            })


            $('.full_width_menu_prime .et_pb_fullwidth_menu ').appendTo('.diana_prime_menu .menu_col ');
            $('.full_width_menu_prime ').remove();

            $('.full_width_menu_res_prime .et_pb_fullwidth_menu').insertAfter($('.diana_prime_menu .menu_col .et_pb_image'));
            $('.full_width_menu_res_prime ').remove();

            if($('body:not(.et-fb) #custom-ddp-menu .diana_prime_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

        }



    },dianaMenuePrimeTimeOut)

})(jQuery);