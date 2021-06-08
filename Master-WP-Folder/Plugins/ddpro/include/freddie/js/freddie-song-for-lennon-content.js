(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieSongLennonTimeOut = 1000;

    if (isIE()) {
        freddieSongLennonTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieSongLennonTimeOut = 10000;
    }

    setTimeout(function () {

        if($('.freddie_song_for_lennon_content').length !== 0){

            $('.freddie_song_for_lennon_content .et_pb_promo.cta_vertical_title ').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            })

        }

    }, freddieSongLennonTimeOut)

})(jQuery);