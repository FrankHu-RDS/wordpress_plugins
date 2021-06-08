(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    // fix for social networks


    var socialTimeOut = 1000;

    if ($('body').hasClass('et-fb')) {
        socialTimeOut = 10000;
    }



    setTimeout(function() {
        $('.et_pb_column .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })

        })
    },socialTimeOut)
})(jQuery);