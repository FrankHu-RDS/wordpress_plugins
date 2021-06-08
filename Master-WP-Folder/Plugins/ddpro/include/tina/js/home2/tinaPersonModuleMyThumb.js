(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPersonMyThumb = 1500;

    if (isIE()) {
        tinaPersonMyThumb = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPersonMyThumb = 10000;
    }

    setTimeout(function () {
        if ($('.tina_my_thumb_person_module ').length !== 0) {

            $('.tina_my_thumb_person_module .et_pb_team_member').each(function () {
                $('<div class="person_image_hover_icon"><div></div></div>').appendTo($(this).find('.et_pb_team_member_image '))
            })



        }

    }, tinaPersonMyThumb);

})(jQuery);