(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPersonsFlowing = 1500;

    if (isIE()) {
        tinaPersonsFlowing = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPersonsFlowing  = 10000;
    }

    setTimeout(function () {
        if ($('.tina_flowing_persons').length !== 0) {
            $('.tina_flowing_persons .et_pb_team_member ').each(function () {
                $('<div class="person_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })

        }

    }, tinaPersonsFlowing);

})(jQuery);