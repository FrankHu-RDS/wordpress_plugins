(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    var tinaFooterTimeTo = 1000;

    if ($('body').hasClass('et-fb')) {
        tinaFooterTimeTo = 10000;
    }


    if ($('body').hasClass('et-fb')) {
        tinaFooterTimeTo = 10000;
    }


    setTimeout(function() {
        $('.tina_time_to_footer .et_pb_column .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })

        })
    },tinaFooterTimeTo)
})(jQuery);