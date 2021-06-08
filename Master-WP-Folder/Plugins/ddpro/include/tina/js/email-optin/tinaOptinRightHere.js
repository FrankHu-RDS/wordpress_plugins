(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinRightHere = 0;

    if (isIE()) {
        tinaOptinRightHere = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinRightHere = 10000;
    }

    setTimeout(function () {
        if($('.tina_right_here_optin').length !== 0){
            var fieldsCount = $('.tina_right_here_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_right_here_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)

        }

    }, tinaOptinRightHere);

})(jQuery);