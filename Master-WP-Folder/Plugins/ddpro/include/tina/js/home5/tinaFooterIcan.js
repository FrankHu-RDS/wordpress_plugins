(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaFooterIcan = 2000;

    if (isIE()) {
        tinaFooterIcan = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaFooterIcan = 10000;
    }

    setTimeout(function () {
        if($('.tina_I_can_footer').length !== 0){
            $('.tina_I_can_footer .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })
        }

    }, tinaFooterIcan);

})(jQuery);