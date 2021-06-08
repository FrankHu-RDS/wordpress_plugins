(function ($) {

    var timeOutSigmundAccordion = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutSigmundAccordion = 10000;
    }

    setTimeout(function () {
        $('.et_pb_toggle_title').click(function () {
            $('.et_pb_toggle_title').removeClass('opened');
            $(this).addClass('opened');
            var $toggle = $(this).closest('.et_pb_toggle');
            if (!$toggle.hasClass('et_pb_accordion_toggling')) {
                var $accordion = $toggle.closest('.et_pb_accordion');
                if ($toggle.hasClass('et_pb_toggle_open')) {
                    $accordion.addClass('et_pb_accordion_toggling');
                    $toggle.find('.et_pb_toggle_content').slideToggle(700, function () {
                        $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
                    });
                }
                setTimeout(function () {
                    $accordion.removeClass('et_pb_accordion_toggling');
                }, 750);
            }
        });

        $('.blue_accordion .et_pb_accordion  .et_pb_toggle.et_pb_toggle_open').addClass('toggle_opening');
        $('.blue_accordion .et_pb_accordion  .et_pb_toggle .et_pb_toggle_title').click(function () {
            $(this).closest('.et_pb_accordion').find('.et_pb_toggle').removeClass('toggle_closing').removeClass('toggle_opening');
            if ($(this).parent('.et_pb_toggle').hasClass('et_pb_toggle_open')) {
                $(this).parent('.et_pb_toggle').addClass('toggle_closing');
            } else {
                $(this).parent('.et_pb_toggle').addClass('toggle_opening');
            }
        });
    },timeOutSigmundAccordion)

})(jQuery);