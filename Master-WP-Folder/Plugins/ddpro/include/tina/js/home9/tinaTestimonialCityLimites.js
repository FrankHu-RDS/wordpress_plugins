(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialCityLimites = 1500;

    if (isIE()) {
        tinaTestimonialCityLimites = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialCityLimites = 10000;
    }

    setTimeout(function () {
        if ($('.tina_testimonial_city_limites').length !== 0) {
            $('<div class="images_slider"><div class="images_slider_inner"></div></div>').insertBefore($('.tina_testimonial_city_limites .et_pb_slider .et_pb_slides'))


            $('.tina_testimonial_city_limites .et_pb_slider .et_pb_slide').each(function () {
                $('<div class="left_box"></div>').insertBefore($(this).find('.et_pb_slide_description'))
                $(this).find('.et_pb_slide_image').appendTo($(this).closest('.et_pb_slider ').find('.images_slider_inner'))
                $(this).find('.et_pb_slide_title').appendTo($(this).find('.left_box'))
                $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.left_box'))
            })


            var wrapWidth = $('.tina_testimonial_city_limites .et_pb_slider .images_slider').outerWidth();
            var imagesCount = $('.tina_testimonial_city_limites .et_pb_slider .images_slider_inner .et_pb_slide_image').length + 1;

            $('.tina_testimonial_city_limites .et_pb_slider .images_slider .images_slider_inner').width(imagesCount*(wrapWidth/2));

            $('.tina_testimonial_city_limites .et_pb_slider .images_slider_inner .et_pb_slide_image').each(function () {
                    $(this).outerWidth(wrapWidth/2)
            })

            $('.tina_testimonial_city_limites .et_pb_slider .images_slider .images_slider_inner .et_pb_slide_image:first-child').addClass('active_image')
            $('.tina_testimonial_city_limites .et_pb_slider .images_slider .images_slider_inner .et_pb_slide_image:last-child').clone().insertBefore($('.tina_testimonial_city_limites .et_pb_slider .images_slider .images_slider_inner .et_pb_slide_image:first-child'))

            $('.tina_testimonial_city_limites .et_pb_slider .et_pb_slide .left_box').css('padding-top',   $('.tina_testimonial_city_limites .et_pb_slider .images_slider').outerHeight())



            $('.tina_testimonial_city_limites .et-pb-slider-arrows a').on('click', function () {
                setTimeout(function () {
                    var prevSlidesCount = $('.tina_testimonial_city_limites .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length+2;
                    $('.tina_testimonial_city_limites .et_pb_slider .images_slider_inner .et_pb_slide_image').removeClass('active_image')
                    $('.tina_testimonial_city_limites .et_pb_slider .images_slider_inner .et_pb_slide_image:nth-child('+ prevSlidesCount +')').addClass('active_image')

                    $('.tina_testimonial_city_limites .et_pb_slider .images_slider .images_slider_inner').css('transform', 'translate(-'+ (prevSlidesCount-2)*(wrapWidth/2) +'px, 0px)')
                },50)
            })
        }

    }, tinaTestimonialCityLimites);

})(jQuery);