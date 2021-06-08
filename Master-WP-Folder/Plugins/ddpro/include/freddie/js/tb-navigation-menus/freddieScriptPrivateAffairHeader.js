

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var getStartedHeader = 500;

    if (isIE()) {
        getStartedHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        getStartedHeader = 10000;
    }

    setTimeout(function () {
        if($('.freddie_private_affair_header').length !== 0){
            $('.freddie_private_affair_header .et_pb_menu__menu > .et-menu-nav > .et-menu.nav > li.et_pb_menu__logo-slot').prev('li').addClass('prev_item')
            $('.freddie_private_affair_header .et_pb_menu__menu > .et-menu-nav > .et-menu.nav > li.et_pb_menu__logo-slot').next('li').addClass('next_item')
        }


    }, getStartedHeader);

})(jQuery);