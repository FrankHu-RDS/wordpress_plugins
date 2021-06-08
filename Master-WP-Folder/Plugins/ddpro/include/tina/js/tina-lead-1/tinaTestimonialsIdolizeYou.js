(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialsIdolizeYou = 1500;

    if (isIE()) {
        tinaTestimonialsIdolizeYou = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialsIdolizeYou = 10000;
    }

    setTimeout(function () {
        if ($('.tina_testimonials_idolize_you').length !== 0) {
            $('.tina_testimonials_idolize_you .et_pb_testimonial').each(function () {
                $(this).find('.et_pb_testimonial_portrait').insertBefore($(this).find('.et_pb_testimonial_author'))
            })
        }

    }, tinaTestimonialsIdolizeYou);

})(jQuery);