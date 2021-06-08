(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPricing2 = 1500;

    if (isIE()) {
        tinaPricing2 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPricing2 = 10000;
    }

    setTimeout(function () {


        if ($('.tina_pricing_table_pretending').length !== 0) {

            var pricingHeading = 0;


            $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table').each(function () {
                $(this).find('.et_pb_pricing_content_top').insertBefore($(this).find('.et_pb_best_value'))
                $(this).find('.et_pb_button_wrapper').insertBefore($(this).find('.et_pb_pricing_content'))

                $(this).prepend($('<div class="pricing_top_box"></div>'))

                $(this).find('.et_pb_pricing_heading').appendTo($(this).find('.pricing_top_box'))
                $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.pricing_top_box'))


                if($(this).find('.pricing_top_box').outerHeight() > pricingHeading){
                    pricingHeading = $(this).find('.pricing_top_box').outerHeight();
                }

            })

            $('.tina_pricing_table_pretending .pricing_top_box').outerHeight(pricingHeading);




            $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table:not(:first-child)').each(function () {
                $(this).find('.et_pb_button_wrapper').clone().insertAfter($(this).find('.et_pb_pricing_content'))
            })

            $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table:first-child ul.et_pb_pricing li').each(function () {
                var liCount = $(this).prevAll('li').length + 1;

                $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table ul.et_pb_pricing li:nth-child('+ liCount +')').outerHeight($(this).outerHeight())
            })



            $('body.et-fb .tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table .et_pb_pricing_content').hover(function () {
                $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table:first-child ul.et_pb_pricing li').each(function () {
                    var liCount = $(this).prevAll('li').length + 1;

                    $('.tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table ul.et_pb_pricing li:nth-child('+ liCount +')').outerHeight($(this).outerHeight())
                })
            })


            $('#page-container #main-content .tina_pricing_table_pretending .et_pb_pricing .et_pb_pricing_table_wrap').css('opacity', 1)
        }





    }, tinaPricing2);


})(jQuery);