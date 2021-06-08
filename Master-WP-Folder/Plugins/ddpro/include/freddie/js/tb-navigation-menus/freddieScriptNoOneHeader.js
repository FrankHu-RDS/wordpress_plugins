

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var noOneHeader = 500;

    if (isIE()) {
        noOneHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        noOneHeader = 10000;
    }

    setTimeout(function () {
        if($('body:not(.et-fb) .freddie_no_one_header').length !== 0){
            if($(window).width() > 980){
                $('.freddie_no_one_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').each(function () {
                    var itemText = $(this).children('a').text();
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_no_one_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).children('a').html($('<span class="item_text">'+ itemText +'</span>'))
                        $(this).children('a').prepend($('.freddie_no_one_header .menu_images .image_item_' + itemCount))
                    }
                })
            }else{
                $('.freddie_no_one_header .et_pb_menu .et_mobile_nav_menu ul.et_mobile_menu > li').each(function () {
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_no_one_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).children('a').prepend($('.freddie_no_one_header .menu_images .image_item_' + itemCount))
                    }
                })
            }


            $('.freddie_no_one_header .menu_images').remove()
        }


    }, noOneHeader);

})(jQuery);