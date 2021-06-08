(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarWaitingBaby = 500;

    if (isIE()) {
        tinaSidebarWaitingBaby = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarWaitingBaby = 10000;
    }

    setTimeout(function () {
        if($('.tina_waiting_baby_sidebar').length !== 0){

            $('.tina_waiting_baby_sidebar .et_pb_newsletter .et_pb_newsletter_footer').insertBefore($('.tina_waiting_baby_sidebar .et_pb_newsletter .et_pb_newsletter_description'))
            $('.tina_waiting_baby_sidebar .et_pb_blurb .et_pb_main_blurb_image').insertBefore($('.tina_waiting_baby_sidebar .et_pb_blurb .et_pb_blurb_description a'))
            var imageSrc = $('.tina_waiting_baby_sidebar .et_pb_image.button_image img').attr('src');
            $('.tina_waiting_baby_sidebar .et_pb_newsletter_form p .et_pb_newsletter_button_text').html('<img src="'+ imageSrc +'">')

            $('body:not(.et-fb) .tina_waiting_baby_sidebar .et_pb_image.button_image').remove()




            var fieldsCount = $('.tina_waiting_baby_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_waiting_baby_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_waiting_baby_sidebar .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_waiting_baby_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }

    }, tinaSidebarWaitingBaby);

})(jQuery);