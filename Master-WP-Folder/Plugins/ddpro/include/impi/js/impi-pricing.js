(function ($) {

    $('.impi_box_pricing_tables .et_pb_pricing .et_pb_pricing_table').each(function() {
        $(this).find('.et_pb_frequency').text($(this).find('.et_pb_frequency').text().replace('/', ''));
        $('<div class="price_info"></div>').appendTo($(this));
        $(this).find('.et_pb_pricing_content_top').appendTo($(this).find('.price_info'));
        $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.price_info'));
    });


//            Impi Victor Pricing Tables

    setTimeout(function () {
        $('.impi_victor_pricing_tables .et_pb_text ul li').each(function () {
            var attrText = $(this).text().toLowerCase().replace(/\s/g,"_");
            $(this).attr('price_topic', attrText);
        });

        $('.impi_victor_pricing_tables').each(function () {


            $(this).find('.et_pb_text ul li:first-child').addClass('active_menu_item');
            var attrPromo = $(this).find('.et_pb_text ul li:first-child').attr('price_topic');
            $(this).find('.et_pb_column .et_pb_module.et_pb_pricing ').each(function() {
                if ($(this).hasClass(attrPromo)) {
                    $(this).show('slow');
                } else {
                    $(this).hide('slow');
                }
            });

        })





        $('.impi_victor_pricing_tables .et_pb_text ul li').click(function() {
            $(this).closest('.impi_victor_pricing_tables').find('.et_pb_text ul li').removeClass('active_menu_item');
            $(this).addClass('active_menu_item');

            attrPromo = $(this).attr('price_topic');
            $(this).closest('.impi_victor_pricing_tables').find('.et_pb_column .et_pb_module.et_pb_pricing ').each(function() {
                if ($(this).hasClass(attrPromo)) {
                    $(this).show('slow');
                } else {
                    $(this).hide('slow');
                }
            });
        });




        $('.impi_victor_pricing_tables .et_pb_pricing .et_pb_pricing_table').each(function () {
            var priceImage = $(this).css('background-image');
            priceImage = priceImage.replace('url(','').replace(')','').replace(/\"/gi, "");

            $('<div class="pricing_image"><img src="'+ priceImage +'"></div>').insertBefore($(this).find('.et_pb_pricing_heading'));
            $(this).css('background-image', 'none')
        })
    },1000)




})(jQuery);