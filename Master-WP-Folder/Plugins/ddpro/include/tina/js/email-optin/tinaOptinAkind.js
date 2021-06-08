(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinAkind = 0;

    if (isIE()) {
        tinaOptinAkind = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinAkind = 10000;
    }

    setTimeout(function () {
        if($('.tina_a_kind_optin').length !== 0){

            $('.tina_a_kind_optin .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $(this).find('.et_pb_newsletter_button_text').html('<div class="button_arrow_icon"><div class="arrow"></div></div>')
                // $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })



            $('.tina_a_kind_optin .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"></div>').insertBefore($(this).find('input'))
            })






            var fieldsCount = $('.tina_a_kind_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_a_kind_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_a_kind_optin .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_a_kind_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }

    }, tinaOptinAkind);

})(jQuery);