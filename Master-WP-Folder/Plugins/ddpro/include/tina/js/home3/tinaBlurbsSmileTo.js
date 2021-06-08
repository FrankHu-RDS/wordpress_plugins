(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsSmileTo = 1500;

    if (isIE()) {
        tinaBlurbsSmileTo = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsSmileTo = 10000;
    }

    setTimeout(function () {
        if ($('.tina_smile_to_blurbs').length !== 0) {
            $('.tina_smile_to_blurbs .et_pb_blurb').each(function () {
                $('<div class="blurb_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })

        }

    }, tinaBlurbsSmileTo);

})(jQuery);