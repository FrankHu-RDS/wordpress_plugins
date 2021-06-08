(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinSoFamiliar = 0;

    if (isIE()) {
        tinaOptinSoFamiliar = 3000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinSoFamiliar = 10000;
    }

    setTimeout(function () {
        if($('.tina_so_familiar_optin').length !== 0){
            $('.tina_so_familiar_optin').each(function () {
                var fieldsCount = $(this).find('p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
                $(this).find('p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            })
        }

    }, tinaOptinSoFamiliar);

})(jQuery);