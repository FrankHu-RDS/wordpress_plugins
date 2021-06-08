(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaFooterBreathe = 0;

    if (isIE()) {
        tinaFooterBreathe = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaFooterBreathe = 10000;
    }

    setTimeout(function () {
        if($('.tina_I_breathe_footer').length !== 0){

            $('.tina_I_breathe_footer .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $(this).find('.et_pb_newsletter_button_text').html('<div class="button_arrow_icon"><div class="arrow"></div></div>')
                // $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })



            $('.tina_I_breathe_footer .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"></div>').insertBefore($(this).find('input'))
            })






            var fieldsCount = $('.tina_I_breathe_footer p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_I_breathe_footer p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_I_breathe_footer .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_I_breathe_footer p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }

    }, tinaFooterBreathe);

})(jQuery);