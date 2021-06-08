(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderSteam = 1500;

    if (isIE()) {
        tinaHeaderSteam = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderSteam = 10000;
    }

    setTimeout(function () {
        if($('.tina_header_steam').length !== 0){

            $('.tina_header_steam .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })

        }

    }, tinaHeaderSteam);

})(jQuery);