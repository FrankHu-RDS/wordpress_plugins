(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePricingSaharaDesert  = 1000;

    if (isIE()) {
        freddiePricingSaharaDesert = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePricingSaharaDesert = 10000;
    }

    setTimeout(function () {
        if($('.tina_pricing_table_it_on').length !== 0){
            // var rowHeight = $('.tina_pricing_table_it_on .et_pb_row .et_pb_pricing_table:first-child').outerHeight();
            // $('.tina_pricing_table_it_on').height(rowHeight)
            $('.tina_pricing_table_it_on .et_pb_pricing_table').each(function () {
                $(this).find('.et_pb_best_value').prepend($('<div class="subtitle_bg"></div>'))
                var imageSrc = $(this).css('background-image');
                $(this).css('background-image', 'none');
                imageSrc = imageSrc.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

                if(imageSrc !== "none"){
                    $(this).prepend($('<div class="pricing_image"><img src="'+ imageSrc +'"></div>'));
                }


                $(this).find('.et_pb_pricing_content_top').insertBefore($(this).find('.et_pb_button_wrapper'))

            })

        }

    }, freddiePricingSaharaDesert)

})(jQuery);