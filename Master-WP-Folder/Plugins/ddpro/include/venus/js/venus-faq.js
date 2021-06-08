(function($) {
     var ctaTimeOut = 0;

     if ($('body').hasClass('et-fb')) {
         ctaTimeOut = 7000;
     }

     setTimeout(function() {
     	// Start FAQ
         $('.faq2_venus .cta2_choose_topic .et_pb_promo_description ul li').each(function () {
             var topicName = $(this).text().toLowerCase().replace(/\s/g,"_");
             $(this).attr('topic', topicName);
         });


         $('.faq2_venus').each(function() {
             $(this).find('.cta2_choose_topic .et_pb_promo_description ul li:first-child').addClass('active_menu_item');
             var attrPromo = $(this).find('.cta2_choose_topic .et_pb_promo_description ul li:first-child').attr('topic');
             $(this).find('.et_pb_column_2_3 .et_pb_promo').each(function() {
                 if ($(this).hasClass(attrPromo)) {
                     $(this).addClass('active_item');
                 } else {
                     $(this).addClass('deactive_item');
                 }
             });



         });

         $('.faq2_venus .cta2_choose_topic .et_pb_promo_description ul li').click(function() {
             $(this).parent('ul').find('li').removeClass('active_menu_item');
             $(this).addClass('active_menu_item');
             attrPromo = $(this).attr('topic');
             $(this).closest('.faq2_venus').find('.et_pb_column_2_3 .et_pb_promo').each(function() {
                 if ($(this).hasClass(attrPromo)) {
                     $(this).show('slow');
                 } else {
                     $(this).hide('slow');
                 }
             });
         });

//    Accordion


        $('.faq1_venus .et_pb_accordion  .et_pb_toggle .et_pb_toggle_title').click(function() {
            var $toggle = $(this).closest('.et_pb_toggle');
            if (!$toggle.hasClass('et_pb_accordion_toggling')) {
                var $accordion = $toggle.closest('.et_pb_accordion');
                if ($toggle.hasClass('et_pb_toggle_open')) {
                    $accordion.addClass('et_pb_accordion_toggling');
                    $toggle.find('.et_pb_toggle_content').slideToggle(300, function() {
                        $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
                    });
                }
                setTimeout(function() {
                    $accordion.removeClass('et_pb_accordion_toggling');
                }, 300);
            }
        });

        $('.faq1_venus .et_pb_accordion.closed_by_default .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

        $('.faq1_venus .et_pb_accordion  .et_pb_toggle.et_pb_toggle_open').addClass('toggle_opening');
        $('.faq1_venus .et_pb_accordion  .et_pb_toggle .et_pb_toggle_title').click(function() {
            $(this).closest('.et_pb_accordion').find('.et_pb_toggle').removeClass('toggle_closing').removeClass('toggle_opening');
            if ($(this).parent('.et_pb_toggle').hasClass('et_pb_toggle_open')) {
                $(this).parent('.et_pb_toggle').addClass('toggle_closing');
            } else {
                $(this).parent('.et_pb_toggle').addClass('toggle_opening');
            }
        });


        //    End Accordion


         // End FAQ **********************
    }, ctaTimeOut);

})(jQuery);