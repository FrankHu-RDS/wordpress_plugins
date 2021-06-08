(function ($) {

    var dianaMenuePremierTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenuePremierTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenuePremierTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_premier_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_premier_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_premier_menu .et_pb_search').css('display') === "none") {
                    $('.diana_premier_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_premier_menu .et_pb_search').hide('slow');
                }
            })

            $('.full_width_menu_premier .et_pb_fullwidth_menu ').appendTo('.diana_premier_menu .menu_col ');
            $('.full_width_menu_premier ').remove();

            $('.diana_premier_menu .menu_col').prepend($('.full_width_menu_res_premier .et_pb_fullwidth_menu'));
            $('.full_width_menu_res_premier ').remove();

            $('.diana_premier_menu .fullwidth-menu-nav .fullwidth-menu > li.menu-item').each(function () {
                var itemText = $(this).children("a").text();
                $(this).children("a").attr('date-hover', itemText);
            });


            if($('body:not(.et-fb) #custom-ddp-menu .diana_premier_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }

        }



    },dianaMenuePremierTimeOut)

})(jQuery);