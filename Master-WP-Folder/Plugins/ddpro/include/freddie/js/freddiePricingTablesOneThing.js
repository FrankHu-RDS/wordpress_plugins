(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePricingOneThing  = 1000;

    if (isIE()) {
        freddiePricingOneThing = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePricingOneThing = 10000;
    }

    setTimeout(function () {
        if($('.freddie_one_thing_pricing_tables').length !== 0){

            $('.freddie_one_thing_pricing_tables .et_pb_pricing_table').each(function () {
                var imageSrc = $(this).css('background-image');
                $(this).css('background-image', 'none');
                imageSrc = imageSrc.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

                if(imageSrc !== "none"){
                    $('<div class="pricing_image"><img src="'+ imageSrc +'"></div>').insertAfter($(this).find('.et_pb_pricing_heading'));
                }


                $(this).find('.et_pb_pricing_content_top').insertBefore($(this).find('.et_pb_button_wrapper'))

            })

        }

    }, freddiePricingOneThing)

})(jQuery);