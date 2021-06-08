       (function ($) {

            $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"])').each(function () {
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