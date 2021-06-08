(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentIsteer  = 1000;

    if (isIE()) {
        ragnarContentIsteer = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentIsteer = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_i_steer').length !== 0){
            $('.ragnar_content_i_steer .et_pb_column .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })
        }

    }, ragnarContentIsteer);

})(jQuery);