(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderSeeThis = 1500;

    if (isIE()) {
        tinaHeaderSeeThis = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderSeeThis = 10000;
    }

    setTimeout(function () {
        if ($('.tina_see_this_header').length !== 0) {

            $('.tina_see_this_header .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })

            var slideHeight = 0;
            $('.tina_see_this_header .et_pb_slider .et_pb_slide').each(function () {
                $(this).find('.et_pb_button_wrapper').prepend($(this).find('.et_pb_slide_content h5').prepend())
                $(this).find('.et_pb_button_wrapper').prepend($(this).find('.et_pb_slide_content h4').prepend())
                $(this).find('.et_pb_button_wrapper').prepend($(this).find('.et_pb_slide_content h3').prepend())

                if ($(this).height() > slideHeight) {
                    slideHeight = $(this).height()
                }
            })

            $('.tina_see_this_header .et_pb_slider .et_pb_slide').height(slideHeight);


            $('.tina_see_this_header .et_pb_slider').each(function () {
                $(this).find('.et-pb-controllers').insertAfter($(this).find('.et-pb-slider-arrows a.et-pb-arrow-prev'))
                $(this).closest('.et_pb_column ').find('.et_pb_button_module_wrapper .et_pb_button').prepend('<span></span>')
            })

            setTimeout(function () {
                $('.tina_see_this_header').css('opacity', 1)
            },1500)

        }

    }, tinaHeaderSeeThis);

})(jQuery);