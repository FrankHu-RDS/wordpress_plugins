(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPopupsV7  = 1000;

    if (isIE()) {
        ragnarPopupsV7 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPopupsV7 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_popups_8').length !== 0){
            $('body:not(.et-fb) .ragnar_popups_8 .et_pb_text.bg_image_text .et_pb_text_inner').clone().addClass('second_text').appendTo($('body:not(.et-fb) .ragnar_popups_8 .et_pb_text.bg_image_text'))
            $('body:not(.et-fb) .ragnar_popups_8 .et_pb_text.bg_image_text .et_pb_text_inner').css('background-image', $('body:not(.et-fb) .ragnar_popups_8 .et_pb_text.bg_image_text').css('background-image'))
            $('body:not(.et-fb) .ragnar_popups_8 .et_pb_text.bg_image_text').css('background-image', 'none')

            $('body:not(.et-fb) .ragnar_popups_8').prepend($('<div class="pop_up_wrapper"></div>'))
            $('body:not(.et-fb) .ragnar_popups_8 .et_pb_row').each(function (){
                $(this).appendTo('body:not(.et-fb) .ragnar_popups_8 .pop_up_wrapper')
            })

            $('body:not(.et-fb) .ragnar_pop_up_8').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_8').css("display", "flex").hide().fadeIn();
                $('body:not(.et-fb) .ragnar_popups_8').addClass('opened_popup')
            })


            $('.ragnar_popups_8 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_8').hide('slow');
                $('body:not(.et-fb) .ragnar_popups_8').removeClass('opened_popup')
            })



            var fieldsCount = $('.ragnar_popups_8 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.ragnar_popups_8 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            if(fieldsCount > 1){
                $('.ragnar_popups_8 p.et_pb_newsletter_button_wrap').addClass('full_width_button')
                $('.ragnar_popups_8 .et_pb_newsletter_fields').addClass('more_fields')
            }

        }

    }, ragnarPopupsV7);

})(jQuery);