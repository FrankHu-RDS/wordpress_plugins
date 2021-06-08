(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialEveryInch = 1500;

    if (isIE()) {
        tinaTestimonialEveryInch = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialEveryInch = 10000;
    }

    setTimeout(function () {
        if ($('.tina_every_inch_testimonial').length !== 0) {
            $('.tina_every_inch_testimonial .et_pb_slider .et_pb_slide').each(function () {
                $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            })
        }

    }, tinaTestimonialEveryInch);

})(jQuery);