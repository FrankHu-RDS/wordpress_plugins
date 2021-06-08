(function ($) {

    var timeOutSigmundPt = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutSigmundPt = 10000;
    }

    setTimeout(function () {
        $('.sigmund_landscape_pricing_tables .et_pb_pricing .et_pb_pricing_table').each(function () {
            $(this).find('.et_pb_frequency').text($(this).find('.et_pb_frequency').text().replace('/', ''));
            $('<div class="price_info"></div>').appendTo($(this));
            $(this).find('.et_pb_pricing_content_top').appendTo($(this).find('.price_info'));
            $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.price_info'));
        });


        $('.sigmund_tall_pricing_tables .et_pb_pricing_table').each(function () {
            var pricingTableImage = $(this).css('background-image');
            pricingTableImage = pricingTableImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $('<div class="table_image"><img src="' + pricingTableImage + '"></div>').insertBefore($(this).find('.et_pb_pricing_heading'));
            $(this).css('background-image', 'none');
            $(this).closest('.sigmund_tall_pricing_tables').css('opacity', 1);
        })

    }, timeOutSigmundPt)

})(jQuery);