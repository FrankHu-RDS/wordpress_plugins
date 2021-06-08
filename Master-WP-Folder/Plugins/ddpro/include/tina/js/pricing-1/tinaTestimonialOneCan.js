(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialOneCan = 2000;

    if (isIE()) {
        tinaTestimonialOneCan = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialOneCan = 10000;
    }

    setTimeout(function () {
        if ($('.tina_testimonial_one_can').length !== 0) {
            $('.tina_testimonial_one_can  .et_pb_slider').each(function () {
                $(this).find('.et-pb-controllers').insertBefore($(this).find('.et-pb-arrow-next'))
            })


            var dotCount = 1;
            $('.tina_testimonial_one_can .et_pb_slider .et_pb_slide').each(function () {
                    var imageSrc = $(this).find('.et_pb_slide_image img').attr('src')


                $('.tina_testimonial_one_can .et-pb-controllers a:nth-child('+ dotCount +')').css('background-image', 'url('+ imageSrc +')')
                dotCount++;
            })
        }

    }, tinaTestimonialOneCan);

})(jQuery);