(function ($) {

            // clear the placeholder on click

            $('input,textarea').focus(function () {
                if ($(this).attr('placeholder') !== '') {
                    $(this).attr('data-placeholder', $(this).attr('placeholder'));

                    $(this).attr('placeholder', '');
                }
            });
            $('input,textarea').blur(function () {
                if ($(this).attr('placeholder') === '') {
                    $(this).attr('placeholder', $(this).attr('data-placeholder'));
                }
            });

            $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function () {
                $(this).parent("p").addClass("focus");
            });

            $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function () {
                if ($(this).val()) {
                    $(this).parent().addClass("filled");
                } else {
                    $(this).parent().removeClass("filled");
                }
                $(this).parent("p").removeClass("focus");
            });


        })(jQuery);


(function ($) {
            $('.impi_get_in_touch_form.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function() {
                $(this).find('textarea').insertBefore($(this).find('label'));
                $(this).find('input').insertBefore($(this).find('label'));
            });
        })(jQuery);

        (function ($) {

            $(' .et_pb_newsletter .et_pb_newsletter_form p').each(function () {
                $(this).find('input').insertBefore($(this).find('label'));

                $(this).find('input.et_pb_signup_firstname').required = false;
            });

            $(' .et_pb_newsletter .et_pb_newsletter_form input').focus(function () {
                $(this).parent("p").addClass("focus");
            });

            $(' .et_pb_newsletter .et_pb_newsletter_form input').blur(function () {
                if ($(this).val()) {
                    $(this).parent().addClass("filled");
                } else {
                    $(this).parent().removeClass("filled");
                }
                $(this).parent("p").removeClass("focus");
            });


        })(jQuery);