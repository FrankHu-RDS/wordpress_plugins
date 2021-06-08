 (function($) {

     var ctaTimeOut = 0;

     if ($('body').hasClass('et-fb')) {
         ctaTimeOut = 7000;
     }
     setTimeout(function() {
         //    Pricing table

         $('.pricing-tables1-venus .et_pb_pricing .et_pb_pricing_table').each(function() {
             $(this).find('.et_pb_pricing_content').insertBefore($(this).find('.et_pb_pricing_content_top'));
         });

         var priceContentHeight = 0;
         $('.pricing-tables2-venus .et_pb_pricing .et_pb_pricing_table ul.et_pb_pricing').each(function() {
             var priceContentactualHeight = $(this).height();
             if (priceContentactualHeight > priceContentHeight) {
                 priceContentHeight = priceContentactualHeight;
             }
         });

         $('.pricing-tables2-venus .et_pb_pricing .et_pb_pricing_table ul.et_pb_pricing').height(priceContentHeight);

         $('.pricing-tables3-venus .et_pb_pricing .et_pb_pricing_table').each(function() {
             $(this).find('.et_pb_frequency').text($(this).find('.et_pb_frequency').text().replace('/', ''));
             $('<div class="price_info"></div>').appendTo($(this));
             $(this).find('.et_pb_pricing_content_top').appendTo($(this).find('.price_info'));
             $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.price_info'));
         });



         $('.pricing-tables1-venus .pricing_table_filter .et_pb_button_module_wrapper .et_pb_button').on('click', function(e) {
             e.preventDefault();
             $('.pricing-tables1-venus .pricing_table_filter .et_pb_button_module_wrapper .et_pb_button').removeClass('active_button');
             $(this).addClass('active_button');
             if ($(this).hasClass('monthly')) {
                 $('.pricing-tables1-venus .pricing_table_filter .button_circle_box .et_pb_blurb_content').addClass('monthly_active');
                 $('#page-container .pricing-tables1-venus .et_pb_pricing.yearly').hide('slow');
                 $('#page-container .pricing-tables1-venus .et_pb_pricing.monthly').show('slow');
             } else {
                 $('.pricing-tables1-venus .pricing_table_filter .button_circle_box .et_pb_blurb_content').removeClass('monthly_active');
                 $('#page-container .pricing-tables1-venus .et_pb_pricing.yearly').show('slow');
                 $('#page-container .pricing-tables1-venus .et_pb_pricing.monthly').hide('slow');
             }
         });


     }, ctaTimeOut);

 })(jQuery);