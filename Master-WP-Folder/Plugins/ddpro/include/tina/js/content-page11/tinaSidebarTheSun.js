(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarTheSun = 1500;

    if (isIE()) {
        tinaSidebarTheSun = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarTheSun = 10000;
    }

    setTimeout(function () {
        if($('.tina_the_sun_sidebar').length !== 0){


            $('.tina_the_sun_sidebar .et_pb_blurb').each(function () {
                $(this).find('.et_pb_main_blurb_image').insertAfter($(this).find('.et_pb_blurb_container'))
            })

            $('.tina_the_sun_sidebar .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"></div>').appendTo($(this))
            })

            $('.tina_the_sun_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')

        }

    }, tinaSidebarTheSun);

})(jQuery);