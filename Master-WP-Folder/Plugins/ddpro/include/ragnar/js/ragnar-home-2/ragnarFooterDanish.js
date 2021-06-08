(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarFooterDanish  = 500;

    if (isIE()) {
        ragnarFooterDanish = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarFooterDanish = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_footer_danish').length !== 0){

            $('.ragnar_footer_danish .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $(this).find('.et_pb_newsletter_button_text').html( $(this).find('.et_pb_newsletter_button_text').text() + '<div class="button_arrow_icon"><div class="arrow"></div></div>')
            })
            
            var fieldsCount = $('.ragnar_footer_danish p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.ragnar_footer_danish p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.ragnar_footer_danish .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.ragnar_footer_danish p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }


    }, ragnarFooterDanish)

})(jQuery);