(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPrivateDancerHeader = 500;

    if (isIE()) {
        tinaPrivateDancerHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPrivateDancerHeader = 10000;
    }

    setTimeout(function () {
        if ($('.tina_private_dancer_header').length !== 0) {
            var slideHeight = 0;
            $('.tina_private_dancer_header .et_pb_slider .et_pb_slide').each(function () {

                $(this).find('.et_pb_slide_content h3').insertBefore($(this).find('h2.et_pb_slide_title'))

                if ($(this).height() > slideHeight) {
                    slideHeight = $(this).height()
                }
            })
            $('.tina_private_dancer_header .et_pb_slider .et_pb_slide').height(slideHeight)


            var showTestimonialsCount = 1;
            var showTestimonialsCount2 = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide').length;


            var nextSlideImage = $('.tina_private_dancer_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
            var nextSlideTitle = $('.tina_private_dancer_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();


            $('.tina_private_dancer_header .et-pb-slider-arrows a.et-pb-arrow-next').html('<div class="slide_image_and_title"><div class="next_post_image"></div><h2 class="next_post_title">' + nextSlideTitle + '</h2></div>');


            $('.tina_private_dancer_header .next_post_image').css('background-image', nextSlideImage);


            $('.tina_private_dancer_header .et_pb_slider .et-pb-slider-arrows a, .tina_private_dancer_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                setTimeout(function () {
                    if ($('.tina_private_dancer_header .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                        var nextSlideImageClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().css('background-image');
                        var nextSlideTitleClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                        var nextSlideContentClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_content').text();
                        $('.tina_private_dancer_header .next_post_image').css('background-image', nextSlideImageClick);
                        $('.tina_private_dancer_header .next_post_title').text(nextSlideTitleClick);
                        $('.tina_private_dancer_header .next_post_content').text(nextSlideContentClick);
                    } else {
                        var nextSlideImageClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                        var nextSlideTitleClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                        var nextSlideContentClick = $('.tina_private_dancer_header .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_content').text();
                        $('.tina_private_dancer_header .next_post_image').css('background-image', nextSlideImageClick);
                        $('.tina_private_dancer_header .next_post_title').text(nextSlideTitleClick);
                        $('.tina_private_dancer_header .next_post_content').text(nextSlideContentClick);
                    }


                    $('.tina_private_dancer_header .et_pb_slider .et-pb-slider-arrows a h2').each(function () {
                        $(this).succinct({
                            size: 45
                        });

                    });
                }, 20)


            });


            $('.tina_private_dancer_header .et_pb_slider .et-pb-slider-arrows a h2').each(function () {
                $(this).succinct({
                    size: 45
                });

            });



            setTimeout(function () {
                $('.tina_private_dancer_header').css('opacity', 1)
            }, 100)


        }

    }, tinaPrivateDancerHeader);

})(jQuery);