(function ($) {
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


            $('.impi_faq2_accordion .et_pb_column:first-child .et_pb_accordion').each(function() {
                $(this).find('.et_pb_toggle.et_pb_toggle_open').removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close')
            });


    $('.impi_pink_faq_accordion .cta2_choose_topic.et_pb_text ul li').each(function () {
        var topicName = $(this).text().toLowerCase().replace(/\s/g,"_");
        $(this).attr('topic', topicName);
    });


    $('.impi_pink_faq_accordion .cta2_choose_topic.et_pb_text ul li:first-child').addClass('active_menu_item');
    var attrPromo = $('.impi_pink_faq_accordion .cta2_choose_topic.et_pb_text ul li:first-child').attr('topic');
    $('.impi_pink_faq_accordion .et_pb_column .et_pb_accordion').each(function() {
        if ($(this).hasClass(attrPromo)) {
            $(this).addClass('active_item');
        } else {
            $(this).addClass('deactive_item');
        }
    });

    $('.impi_pink_faq_accordion .et_pb_column .et_pb_accordion:not(:first-child)').each(function() {
        $(this).find('.et_pb_toggle.et_pb_toggle_open').removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close')
    });


    $('.impi_pink_faq_accordion .cta2_choose_topic.et_pb_text ul li').click(function() {
        $('.impi_pink_faq_accordion .cta2_choose_topic.et_pb_text ul li').removeClass('active_menu_item');
        $(this).addClass('active_menu_item');
        $(this).addClass('active_menu_item');
        attrPromo = $(this).attr('topic');
        $('.impi_pink_faq_accordion .et_pb_column .et_pb_accordion').each(function() {
            if ($(this).hasClass(attrPromo)) {
                $(this).show('slow');
            } else {
                $(this).hide('slow');
            }
        });





    });

})(jQuery);