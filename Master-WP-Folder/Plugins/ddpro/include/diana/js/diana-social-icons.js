(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    var timeOutSocials = 0;
            if ($('body').hasClass('et-fb')) {
                timeOutSocials = 10000;
            }

            setTimeout(function () {
                $('.et_pb_column .et_pb_social_media_follow').each(function () {
                    $(this).find('li').each(function () {
                        var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'),'');
                        $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                    })

                });

                $("#et-fb-app-frame").contents().find('.et_pb_column .et_pb_social_media_follow').each(function () {
                    $("#et-fb-app-frame").contents().find($(this)).find('li').each(function () {
                        var socialIconName = $("#et-fb-app-frame").contents().find($(this)).find('a').attr('title').replace('Follow on','');
                        $("#et-fb-app-frame").contents().find($(this)).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                    })

                })


            },timeOutSocials)

        })(jQuery);