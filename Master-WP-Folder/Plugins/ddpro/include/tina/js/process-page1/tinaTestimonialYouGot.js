(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var  tinaTestimonialYouGot  = 1500;

    if (isIE()) {
        tinaTestimonialYouGot = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialYouGot = 10000;
    }

    setTimeout(function () {
        if($('.tina_testimonial_you_got').length !== 0){
            $('.tina_testimonial_you_got .et_pb_testimonial').each(function () {
                $(this).find('.et_pb_testimonial_portrait').insertBefore($(this).find('.et_pb_testimonial_author'))
            })
        }

    }, tinaTestimonialYouGot);

})(jQuery);