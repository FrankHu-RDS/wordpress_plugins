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
        if($('.freddie_sahara_desert_pricing_tables').length !== 0){
            var rowHeight = $('.freddie_sahara_desert_pricing_tables .et_pb_row .et_pb_pricing_table:first-child').outerHeight();
            $('.freddie_sahara_desert_pricing_tables').height(rowHeight)
            $('.freddie_sahara_desert_pricing_tables .et_pb_pricing_table').each(function () {
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