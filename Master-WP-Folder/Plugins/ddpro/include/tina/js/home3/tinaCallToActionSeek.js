(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaCallToActionSeek = 1500;

    if (isIE()) {
        tinaCallToActionSeek = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaCallToActionSeek  = 10000;
    }

    setTimeout(function () {
        if ($('.tina_seek_call_to_action').length !== 0) {
            $('.tina_seek_call_to_action .et_pb_button').each(function () {
                $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })

        }

    }, tinaCallToActionSeek);

})(jQuery);