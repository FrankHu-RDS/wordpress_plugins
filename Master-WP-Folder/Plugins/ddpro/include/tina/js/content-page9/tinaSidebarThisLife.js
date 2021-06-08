(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarThisLife = 1500;

    if (isIE()) {
        tinaSidebarThisLife = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarThisLife = 10000;
    }

    setTimeout(function () {
        if ($('.tina_this_life_sidebar').length !== 0) {
            $('.tina_this_life_sidebar .et_pb_text ul li a').each(function () {
                $(this).prepend($('<div class="li_arrow_icon"><div class="arrow"></div></div>'))
            })

        }

    }, tinaSidebarThisLife);

})(jQuery);