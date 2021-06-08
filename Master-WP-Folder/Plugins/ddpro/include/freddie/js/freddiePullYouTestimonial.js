(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var  pullYouTestimonial  = 1500;

    if (isIE()) {
        pullYouTestimonial = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        pullYouTestimonial = 10000;
    }

    setTimeout(function () {
        if($('.freddie_pull_you_testimonial').length !== 0){
            $('.freddie_pull_you_testimonial .et_pb_testimonial').each(function () {
                $(this).find('.et_pb_testimonial_portrait').insertBefore($(this).find('.et_pb_testimonial_author'))
            })
        }

    }, pullYouTestimonial);

})(jQuery);