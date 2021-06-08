        (function ($) {

            var timeOutDianaTestimonials = 1500;

            if($('body').hasClass('et-fb')){
                timeOutDianaTestimonials = 10000;
            }

            function isIE() {
                ua = navigator.userAgent;
                var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

                return is_ie;
            }

            if (isIE()){
                timeOutDianaTestimonials = 5000;
            }

//        Diana Royal Testimonial

            setTimeout(function () {
                if ($('.diana_royal_testimonial ').length !== 0) {

                    $('.diana_royal_testimonial .et_pb_slider .et_pb_slide').each(function () {
                        $(this).find('.et_pb_slide_content').insertBefore($(this).find('h2.et_pb_slide_title'));
                    });


                    var dianaImageHeight = $('.diana_royal_testimonial .et_pb_slider .et_pb_slide .et_pb_slide_image img').height();
                    var dianaArrowsHeight = $('.diana_royal_testimonial .et_pb_button_wrapper .et_pb_button').outerHeight();
                    var arrowsTopSize = dianaImageHeight - dianaArrowsHeight;

                    $('.diana_royal_testimonial .et_pb_button_wrapper .et_pb_button').css('top', arrowsTopSize + 'px');

                    var nextSlideImage = $('.diana_royal_testimonial .et_pb_slider .et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');


                    $('<div class="next_post_image"></div>').appendTo('.diana_royal_testimonial .et_pb_column_2_5:last-child');

                    $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImage +')');



                    $('.diana_royal_testimonial .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
                        setTimeout(function () {
                            if ($('.diana_royal_testimonial .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                                var nextSlideImageClick = $('.diana_royal_testimonial .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                                $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                            }else{
                                var nextSlideImageClick = $('.diana_royal_testimonial .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
                                $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                            }
                        }, 0)

                    });

                    $('.diana_royal_testimonial .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                        setTimeout(function () {
                            var nextSlideImageClick = $('.diana_royal_testimonial .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_image img').attr('src');
                            $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                        }, 0)

                    });




                }
            }, timeOutDianaTestimonials);


            setInterval(function () {

                if ($('.diana_royal_testimonial .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                    var nextSlideImageClick = $('.diana_royal_testimonial .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                    $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                }else{
                    var nextSlideImageClick = $('.diana_royal_testimonial .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
                    $('.diana_royal_testimonial .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                }



            },50);


//            Diana No Sweat Testimonials


            setTimeout(function () {
                var promoHeight =  $('.diana_no_sweat_testimonials .et_pb_promo ').outerHeight();
                var descriptionHeight = 0;
                $('.diana_no_sweat_testimonials .et_pb_slider .et_pb_slide ').each(function () {
                    $(this).find("h2.et_pb_slide_title").insertAfter($(this).find(".et_pb_slide_content"));
                    $(this).find(".et_pb_button_wrapper").insertAfter($(this).find(".et_pb_slide_image img "));
                    $(this).find(".et_pb_slide_description").css('margin-top', promoHeight + 8);

                    if( $(this).find(".et_pb_slide_description").outerHeight() > descriptionHeight){
                        descriptionHeight = $(this).find(".et_pb_slide_description").outerHeight();
                    }

                });

                $('.diana_no_sweat_testimonials .et-pb-slider-arrows').css('top', descriptionHeight + promoHeight + 38);


//                VB

                var promoHeightVB =  $("body.et-fb #et-fb-app-frame").contents().find('.diana_no_sweat_testimonials .et_pb_promo ').outerHeight();
                var descriptionHeightVB = 0;
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_no_sweat_testimonials .et_pb_slider .et_pb_slide ').each(function () {
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find("h2.et_pb_slide_title").insertAfter($("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_slide_content"));
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_button_wrapper").insertAfter($("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_slide_image img "));
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_slide_description").css('margin-top', promoHeightVB + 8);

                    if( $("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_slide_description").outerHeight() > descriptionHeightVB){
                        descriptionHeightVB = $("body.et-fb #et-fb-app-frame").contents().find($(this)).find(".et_pb_slide_description").outerHeight();
                    }

                });

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_no_sweat_testimonials .et-pb-slider-arrows').css('top', descriptionHeightVB + promoHeightVB + 38);

            }, timeOutDianaTestimonials)

        })(jQuery);