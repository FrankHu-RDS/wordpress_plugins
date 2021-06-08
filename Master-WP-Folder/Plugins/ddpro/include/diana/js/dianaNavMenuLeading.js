(function ($) {

    var dianaMenueLandingTimeOut = 1000;

    if($('body').hasClass('et-fb')){
        dianaMenueLandingTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()){
        dianaMenueLandingTimeOut = 5000;
    }


    setTimeout(function () {
        if($('.diana_leading_menu').length !== 0){
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
            $('.diana_leading_menu .search_and_social_icons .et_pb_blurb ').on('click', function () {
                if ($('.diana_leading_menu .et_pb_search').css('display') === "none") {
                    $('.diana_leading_menu .et_pb_search').show('slow');
                } else {
                    $('.diana_leading_menu .et_pb_search').hide('slow');
                }
            })

            $('.diana_leading_menu .et_pb_column_1_6 .et_pb_blurb .et_pb_blurb_description a').each(function () {
                if($(this).parent('p').length !== 0){
                    $(this).unwrap();
                }

                $(this).wrap("<p></p>");
            });


            $('.full_width_menu_landing .et_pb_fullwidth_menu ').appendTo('.diana_leading_menu .menu_col ');
            $('.full_width_menu_landing ').remove();


            if($('body:not(.et-fb) #custom-ddp-menu .diana_leading_menu').hasClass('fixed')){
                $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
                var menuHeight = $('#custom-ddp-menu').height();
                $('#et-main-area').css('padding-top', menuHeight + 'px');
            }
        }

        if($("#et-fb-app-frame").contents().find('.diana_leading_menu').length !== 0){
            $("#et-fb-app-frame").contents().find('.full_width_menu_landing .et_pb_fullwidth_menu ').appendTo($("#et-fb-app-frame").contents().find('.diana_leading_menu .menu_col '));
            $("#et-fb-app-frame").contents().find('.full_width_menu_landing ').remove();
        }



    },dianaMenueLandingTimeOut)

})(jQuery);