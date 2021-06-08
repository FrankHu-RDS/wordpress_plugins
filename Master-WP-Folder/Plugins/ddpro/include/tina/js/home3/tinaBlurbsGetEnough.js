(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaGetEnoughBlurbs = 1500;

    if (isIE()) {
        tinaGetEnoughBlurbs = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaGetEnoughBlurbs  = 10000;
    }

    setTimeout(function () {
        if ($('.tina_get_enough_blurbs').length !== 0) {
            $('.tina_get_enough_blurbs .et_pb_blurb').each(function () {
                $('<div class="blurb_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })

        }

    }, tinaGetEnoughBlurbs);

})(jQuery);