

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var breakingHeader = 500;

    if (isIE()) {
        breakingHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        breakingHeader = 10000;
    }

    setTimeout(function () {
        if($('body:not(.et-fb) .freddie_breaking_header').length !== 0){
            if($(window).width() > 980){
                $('.freddie_breaking_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').each(function () {
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_breaking_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).prepend($('.freddie_breaking_header .menu_images .image_item_' + itemCount))
                    }
                })
            }else{
                $('.freddie_breaking_header .et_pb_menu .et_mobile_nav_menu ul.et_mobile_menu > li').each(function () {
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_breaking_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).children('a').prepend($('.freddie_breaking_header .menu_images .image_item_' + itemCount))
                    }
                })
            }


            $('.freddie_breaking_header .menu_images').remove()
        }


    }, breakingHeader);

})(jQuery);