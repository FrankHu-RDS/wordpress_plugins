(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPopupsV5  = 1000;

    if (isIE()) {
        ragnarPopupsV5 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPopupsV5 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_popups_5').length !== 0){
            $('body:not(.et-fb) .ragnar_pop_up_5').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_5').css("display", "flex").hide().fadeIn();
                $('body:not(.et-fb) .ragnar_popups_5').addClass('opened_popup')
            })


            $('.ragnar_popups_5 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_5').hide('slow');
                $('body:not(.et-fb) .ragnar_popups_5').removeClass('opened_popup')
            })



            var fieldsCount = $('.ragnar_popups_5 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.ragnar_popups_5 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            if(fieldsCount > 1){
                $('.ragnar_popups_5 p.et_pb_newsletter_button_wrap').addClass('full_width_button')
                $('.ragnar_popups_5 .et_pb_newsletter_fields').addClass('more_fields')
            }

        }

    }, ragnarPopupsV5);

})(jQuery);