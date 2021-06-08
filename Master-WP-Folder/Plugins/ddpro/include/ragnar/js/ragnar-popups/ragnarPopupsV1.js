(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPopupsV1  = 1000;

    if (isIE()) {
        ragnarPopupsV1 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPopupsV1 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_popups_1').length !== 0){
            $('body:not(.et-fb) .ragnar_pop_up_1').on('click', function (e) {
                e.preventDefault();
                // $('body:not(.et-fb) .ragnar_popups_1').show('slow');
                $('body:not(.et-fb) .ragnar_popups_1').css("display", "flex").hide().fadeIn();
                $('body:not(.et-fb) .ragnar_popups_1').addClass('opened_popup')
            })


            $('.ragnar_popups_1 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_1').hide('slow');
                $('body:not(.et-fb) .ragnar_popups_1').removeClass('opened_popup')
            })



            var fieldsCount = $('.ragnar_popups_1 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.ragnar_popups_1 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            if(fieldsCount > 1){
                $('.ragnar_popups_1 p.et_pb_newsletter_button_wrap').addClass('full_width_button')
            }

        }

    }, ragnarPopupsV1);

})(jQuery);