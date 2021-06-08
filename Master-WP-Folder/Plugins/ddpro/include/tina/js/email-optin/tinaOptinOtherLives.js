(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinOtherLives = 0;

    if (isIE()) {
        tinaOptinOtherLives = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinOtherLives = 10000;
    }

    setTimeout(function () {
        if($('.tina_other_lives_optin').length !== 0){

            var imageSrc = $('.tina_other_lives_optin  .et_pb_image img').attr('src');
            $('.tina_other_lives_optin  .et_pb_newsletter_form p .et_pb_newsletter_button_text').html('<img src="'+ imageSrc +'">')

            $('body:not(.et-fb) .tina_other_lives_optin .et_pb_image').remove()




            var fieldsCount = $('.tina_other_lives_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_other_lives_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_other_lives_optin .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_other_lives_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }

    }, tinaOptinOtherLives);

})(jQuery);