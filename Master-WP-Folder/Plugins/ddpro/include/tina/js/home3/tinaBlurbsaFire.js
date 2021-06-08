(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaFireBlurbs = 1500;

    if (isIE()) {
        tinaFireBlurbs = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaFireBlurbs = 10000;
    }

    setTimeout(function () {
        if ($('.tina_a_fire_blurbs').length !== 0) {
            $('.tina_a_fire_blurbs .et_pb_blurb').each(function () {
                $('<div class="blurb_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })

        }

    }, tinaFireBlurbs);

})(jQuery);