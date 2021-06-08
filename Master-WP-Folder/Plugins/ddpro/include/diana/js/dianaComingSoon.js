(function ($) {

    var timeOutComingSoon = 0;

    if ($('body').hasClass('et-fb')) {

        var timeOutComingSoon = 8000;
    }
    setTimeout(function () {

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




        var olddays = $('.et_pb_countdown_timer .days .value');

        olddays.each(function () {
            var oldday = $(this);
            oldday.after(oldday.clone());
            oldday.next().wrap('<span></span>');
        }).hide();


        (function update_days() {
            olddays.each(function () {
                var oldday = $(this);
                var days = oldday.html();
                if (days.substr(0, 1) === '0') {
                    days = days.slice(1);
                }
                oldday.next().find('.value').html(days);
            });
            setTimeout(function () {
                update_days();
            }, 1000);
        })()

    }, timeOutComingSoon);



})(jQuery);
