(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderCrazy = 1500;

    if (isIE()) {
        tinaHeaderCrazy = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderCrazy = 10000;
    }

    setTimeout(function () {
        if($('.tina_header_crazy').length !== 0){

            $('.tina_header_crazy .et_pb_newsletter_form p input#et_pb_signup_lastname').parent('p').addClass('first_name')
            $('.tina_header_crazy .et_pb_newsletter_form p input#et_pb_signup_firstname').parent('p').addClass('first_name')
            $('.tina_header_crazy .et_pb_newsletter_form p input#et_pb_signup_email').parent('p').addClass('email')

        }

    }, tinaHeaderCrazy);

})(jQuery);