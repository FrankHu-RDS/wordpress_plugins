(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaFooterProud = 1500;

    if (isIE()) {
        tinaFooterProud = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaFooterProud = 10000;
    }

    setTimeout(function () {
        if($('.tina_footer_proud').length !== 0){

            $('.tina_footer_proud .et_pb_newsletter_form p input#et_pb_signup_lastname').parent('p').addClass('first_name')
            $('.tina_footer_proud .et_pb_newsletter_form p input#et_pb_signup_firstname').parent('p').addClass('first_name')
            $('.tina_footer_proud .et_pb_newsletter_form p input#et_pb_signup_email').parent('p').addClass('email')



            $('.tina_footer_proud .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })






            var fieldsCount = $('.tina_footer_proud p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            if(fieldsCount > 1){
                $('.tina_footer_proud .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_footer_proud p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }


        }

    }, tinaFooterProud);

})(jQuery);