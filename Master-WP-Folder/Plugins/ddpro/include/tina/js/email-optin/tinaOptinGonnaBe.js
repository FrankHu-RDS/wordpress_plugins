(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinGonnaBe = 0;

    if (isIE()) {
        tinaOptinGonnaBe = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinGonnaBe = 10000;
    }

    setTimeout(function () {
        if($('.tina_gonna_be_optin').length !== 0){
            var fieldsCount = $('.tina_gonna_be_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_gonna_be_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)

        }

    }, tinaOptinGonnaBe);

})(jQuery);