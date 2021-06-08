(function($) {
    var timeOutCocoTestimonials = 2000;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoTestimonials = 10000;
    }
    setTimeout(function() {
        var showTestimonialsCount = 1;
        var showTestimonialsCount2 = $('.coco_intend_testimonial .et_pb_slider .et_pb_slide').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').insertBefore($('.coco_intend_testimonial .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-prev'));

        $('.coco_intend_testimonial .et-pb-slider-arrows a, .coco_intend_testimonial .et-pb-controllers a').on('click', function(event) {
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCount = $('.coco_intend_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                $('.coco_intend_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });


    }, timeOutCocoTestimonials);

    setInterval(function() {
        var showTestimonialsCount = 1;
        var showSlideItemsCount = $('.coco_intend_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

        $('.coco_intend_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

    }, 50);

    setTimeout(function() {
        var showTestimonialsCount = 1;
        var showTestimonialsCount2 = $('.coco_home5_attitude_testimonial .et_pb_slider .et_pb_slide').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').insertBefore($('.coco_home5_attitude_testimonial .et_pb_slider .et-pb-slider-arrows'));

        $('.coco_home5_attitude_testimonial .et-pb-slider-arrows a, .coco_home5_attitude_testimonial .et-pb-controllers a').on('click', function(event) {
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCount = $('.coco_home5_attitude_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                $('.coco_home5_attitude_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });


    }, timeOutCocoTestimonials);




    //                Coco Tab testimonials

    setTimeout(function() {

        var classCountC = "1";
        $('.coco_tab_testimonials .et_pb_slide').each(function() {
            $(this).find('.et_pb_slide_description .et_pb_slide_content img').insertBefore($(this).find('.et_pb_slide_description h2'));
            $(this).find('.et_pb_slide_description .et_pb_button_wrapper').insertBefore($(this).find('.et_pb_slide_description .et_pb_slide_content'));


            var attrText = $(this).find('.et_pb_button_wrapper a.et_pb_button').text();
            console.log(attrText);
            $('.coco_tab_testimonials .et-pb-controllers a:nth-child(' + classCountC + ')').text(attrText);
            classCountC++;
        });
    }, timeOutCocoTestimonials);

    //                Coco Diva testimonials

    setTimeout(function() {

        $('.coco_diva_testimonials .et_pb_slider .et-pb-controllers a').each(function() {
            var thisNumber = $(this).text();
            $(this).html('<span class="slide_number"></span><span class="slide_title"></span>');
        });

        var classCountC = "1";
        $('.coco_diva_testimonials .et_pb_slide').each(function() {
            $(this).find('.et_pb_slide_description .et_pb_slide_content img').insertBefore($(this).find('.et_pb_slide_description h2'));
            $(this).find('.et_pb_slide_description .et_pb_button_wrapper').insertBefore($(this).find('.et_pb_slide_description .et_pb_slide_content'));

            var attrText = $(this).find('.et_pb_button_wrapper a.et_pb_button').text();
            $('.coco_diva_testimonials .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
            classCountC++;
        });



    }, timeOutCocoTestimonials);



    setTimeout(function() {
        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.coco_love_testimonial .et_pb_slide').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertAfter($('.coco_love_testimonial .et_pb_slider .et-pb-slider-arrows'));


        $('.coco_love_testimonial .et-pb-slider-arrows a, .coco_love_testimonial .et-pb-active-control a').on('click', function(event) {
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCount = $('.coco_love_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.coco_love_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });

    }, timeOutCocoTestimonials);
    setInterval(function() {
        var showHomeSlideritems = 1;
        var showSlideItemsCount = $('.coco_love_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

        $('.coco_love_testimonial .slider_number .slider_active_number').text('0' + showSlideItemsCount);

    }, 50);


    //               Coco Popular Testimonials

    setTimeout(function() {

        var classCountC = "1";
        $('.coco_popular_testimonials .et_pb_slide').each(function() {


            var attrText = $(this).find('h2.et_pb_slide_title').text();
            console.log(attrText);
            $('.coco_popular_testimonials .et-pb-controllers a:nth-child(' + classCountC + ')').text(attrText);
            classCountC++;
        });
    }, timeOutCocoTestimonials);


    //               Coco Popular Testimonials

    setTimeout(function() {

        var classCountC = "1";
        $('.coco_gaiter_testimonials .et_pb_slide').each(function() {


            var attrText = $(this).find('h2.et_pb_slide_title').text();
            console.log(attrText);
            $('.coco_gaiter_testimonials .et-pb-controllers a:nth-child(' + classCountC + ')').text(attrText);
            classCountC++;
        });
    }, timeOutCocoTestimonials);


    //            Coco Grow Testimonials


    setTimeout(function() {
        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.coco_grow_testimonials .et_pb_slide').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.coco_grow_testimonials .et_pb_slider .et-pb-slider-arrows'));
        var lineWidth = $('.coco_grow_testimonials .slider_number .numers_line').width();
        var lineInnerWidth = lineWidth / homeSlideItemsCount;
        $('.coco_grow_testimonials .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

        $('.coco_grow_testimonials .et-pb-slider-arrows a').on('click', function(event) {
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCountLine = $('.coco_grow_testimonials .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.coco_grow_testimonials .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.coco_grow_testimonials .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.coco_grow_testimonials .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')

            }, 200);

        });

    }, timeOutCocoTestimonials);

    setInterval(function() {
        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.coco_grow_testimonials .et_pb_slide').length;
        var lineWidth = $('.coco_grow_testimonials .slider_number .numers_line').width();
        var lineInnerWidth = lineWidth / homeSlideItemsCount;
        var showSlideItemsCountLine = $('.coco_grow_testimonials .et_pb_slide.et-pb-active-slide').prevAll().length;
        var showSlideItemsCount = $('.coco_grow_testimonials .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

        $('.coco_grow_testimonials .slider_number .slider_active_number').text('0' + showSlideItemsCount);

        $('.coco_grow_testimonials .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')

    }, 50);
})(jQuery);