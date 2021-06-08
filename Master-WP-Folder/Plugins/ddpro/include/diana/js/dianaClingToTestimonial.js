(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var dianaClingToTestimonial = 2000;

    if (isIE()) {
        dianaClingToTestimonial = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaClingToTestimonial = 10000;
    }

    setTimeout(function () {
        if($('.diana_cling_to_testimonial').length !== 0){
            var showTestimonialsCount = 1;
            var showTestimonialsCount2 = $('.diana_cling_to_testimonial .et_pb_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').insertBefore($('.diana_cling_to_testimonial .et_pb_slider .et-pb-slider-arrows'));

            $('.diana_cling_to_testimonial .et-pb-slider-arrows a, .diana_cling_to_testimonial .et-pb-controllers a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCount = $('.diana_cling_to_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                    $('.diana_cling_to_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 200);

            });


            setInterval(function() {
                var showTestimonialsCount = 1;
                var showSlideItemsCount = $('.diana_cling_to_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                $('.diana_cling_to_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 50);
        }

    }, dianaClingToTestimonial);

})(jQuery);