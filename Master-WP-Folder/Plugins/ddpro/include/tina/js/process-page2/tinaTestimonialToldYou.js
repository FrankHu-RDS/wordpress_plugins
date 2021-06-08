(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialToldYou = 1500;

    if (isIE()) {
        tinaTestimonialToldYou = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialToldYou = 10000;
    }

    setTimeout(function () {
        if ($('.tina_testimonial_told_you').length !== 0) {
            $('.tina_testimonial_told_you .et_pb_slider .et_pb_slide').each(function () {
                $('<div class="left_box"></div>').insertBefore($(this).find('.et_pb_slide_description'))
                $(this).find('.et_pb_slide_image').appendTo($(this).find('.left_box'))
                $(this).find('.et_pb_slide_title').appendTo($(this).find('.left_box'))
                $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.left_box'))
            })
        }

    }, tinaTestimonialToldYou);

})(jQuery);