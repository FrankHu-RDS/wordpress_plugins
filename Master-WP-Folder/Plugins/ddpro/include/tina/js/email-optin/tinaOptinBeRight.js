(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinBeRight = 0;

    if (isIE()) {
        tinaOptinBeRight = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinBeRight = 10000;
    }

    setTimeout(function () {
        if($('.tina_be_right_optin ').length !== 0){

            $('.tina_be_right_optin  .et_pb_newsletter_form p input#et_pb_signup_lastname').parent('p').addClass('first_name')
            $('.tina_be_right_optin  .et_pb_newsletter_form p input#et_pb_signup_firstname').parent('p').addClass('first_name')
            $('.tina_be_right_optin  .et_pb_newsletter_form p input#et_pb_signup_email').parent('p').addClass('email')

        }

    }, tinaOptinBeRight);

})(jQuery);