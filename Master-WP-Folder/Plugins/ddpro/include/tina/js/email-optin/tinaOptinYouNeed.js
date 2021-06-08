(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinYouNeed = 0;

    if (isIE()) {
        tinaOptinYouNeed = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinYouNeed = 10000;
    }

    setTimeout(function () {
        if($('.tina_you_need_optin').length !== 0){
            $('<div class="hover_lines"><div class="hover_lines_inner"></div></div>').insertBefore($('.tina_you_need_optin .et_pb_newsletter_form p.et_pb_newsletter_button_wrap .et_pb_newsletter_button'));
            $('.tina_you_need_optin .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"><div class="hover_lines_inner"></div></div>').insertBefore($(this).find('input'))
            })


            var fieldsCount = $('.tina_you_need_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_you_need_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
        }

    }, tinaOptinYouNeed);

})(jQuery);