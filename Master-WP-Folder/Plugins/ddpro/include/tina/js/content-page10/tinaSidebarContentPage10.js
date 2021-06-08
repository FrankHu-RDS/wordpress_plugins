(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarContentPage10 = 1500;

    if (isIE()) {
        tinaSidebarContentPage10 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarContentPage10 = 10000;
    }

    setTimeout(function () {
        if($('.tina_contentpage10_sidebar').length !== 0){




            $('.tina_contentpage10_sidebar .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"></div>').appendTo($(this))
            })






            var fieldsCount = $('.tina_contentpage10_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_contentpage10_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_contentpage10_sidebar .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_contentpage10_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }

    }, tinaSidebarContentPage10);

})(jQuery);