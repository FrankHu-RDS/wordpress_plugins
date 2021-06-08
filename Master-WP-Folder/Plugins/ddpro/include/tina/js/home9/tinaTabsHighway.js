(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTabsHighway = 1500;

    if (isIE()) {
        tinaTabsHighway = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTabsHighway = 10000;
    }

    setTimeout(function () {
        if ($('.tina_tabs_highway').length !== 0) {
            $('.tina_tabs_highway .tab_list_row .et_pb_text li:first-child').addClass('active_item')

                $('.tina_tabs_highway .tab_list_row .et_pb_text li').on('click', function () {
                    $('.tina_tabs_highway .tab_list_row .et_pb_text li').removeClass('active_item')
                    $(this).addClass('active_item')
                    var prevElCount = $(this).prevAll('li').length + 2;
                    $('.tina_tabs_highway .tab_content_row ').hide('slow');
                    $('.tina_tabs_highway .tab_content_row:nth-child('+ prevElCount +')').show('slow');
                })


            if($(window).width() <= 767){
                $('.tina_tabs_highway .tab_content_row').each(function () {
                    $(this).find('.et_pb_image').insertAfter($(this).find('.last_blurb'))
                })
            }

            $(window).resize(function () {
                if($(window).width() <= 980){
                    $('.tina_tabs_highway .tab_content_row').each(function () {
                        $(this).find('.et_pb_image').insertAfter($(this).find('.last_blurb'))
                    })
                }else{
                    $('.tina_tabs_highway .tab_content_row').each(function () {
                        $(this).find('.et_pb_image').insertBefore($(this).find('.last_blurb'))
                    })
                }
            })
        }

    }, tinaTabsHighway);

})(jQuery);