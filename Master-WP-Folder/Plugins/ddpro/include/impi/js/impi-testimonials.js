        (function ($) {

            setTimeout(function () {




                var classCountC = "1";
                $('.impi_circle_click_testimonials  .et_pb_slide').each(function () {
                    var attrText = $(this).find('.et_pb_slide_image img').attr('src');
                    $('.impi_circle_click_testimonials .et-pb-controllers a:nth-child(' + classCountC + ')').text('');
                    $('<img src="'+ attrText +'">').appendTo($('.impi_circle_click_testimonials .et-pb-controllers a:nth-child(' + classCountC + ')'))
                    classCountC++;
                });



            }, 1000);

            setTimeout(function () {
                $('.impi_3_col_testimonails .et_pb_testimonial').each(function () {
                    $(this).find('.et_pb_testimonial_description .et_pb_testimonial_description_inner strong:not(.et_pb_testimonial_author)').insertBefore( $(this).find('.et_pb_testimonial_portrait'))
                });
            },200);






            var timeOutPerson1 = 0;

            if ($('body').hasClass('et-fb')) {
                timeOutPerson1 = 3000;
            }
            setTimeout(function () {
                if ($('.impi_victor_testimonials').length > 0) {
                    $('<div class="persons-slider-arrows"><a class="portfolio-arrow-prev" href="#">4</a><a class="portfolio-arrow-next" href="#">5</a></div>').appendTo($('.impi_victor_testimonials .et_pb_column_4_4'));
                    $('.impi_victor_testimonials .et_pb_testimonial:first-child').addClass('active_slide');
                    var showBlogSlideritems = 2;
                    var person_1_afterActiveElement = 1;
                    var person_1_nthElement = 3;

                    if ($(window).width() <= "980") {
                        person_1_afterActiveElement = 1;
                        person_1_nthElement = 2;
                    }
                    if ($(window).width() <= "767") {
                        showBlogSlideritems = 1;
                    }
                    if ($(window).width() <= "480") {
                        showBlogSlideritems = 1;
                        person_1_afterActiveElement = 0;
                        person_1_nthElement = 1;
                    }

                    var timeOutPerson1Inner = 2000;

                    if ($('body').hasClass('et-fb')) {
                        timeOutPerson1Inner = 0;
                    }


                    setTimeout(function () {
                        $('<div class="person_slide_outer_container"><div class="person_slide_container"></div></div>').appendTo($('.impi_victor_testimonials .et_pb_column_4_4'));
                        var slideItemsCount;
                        var slideItemswidth;
                        var slideMarginRight = 30;
                        $('.impi_victor_testimonials').each(function () {

                            $(this).find('.et_pb_testimonial').appendTo($(this).find('.person_slide_container'));

                            slideItemsCount = $(this).find('.et_pb_testimonial').length;
                            var slideInnerWidth = $(this).find('.et_pb_column_4_4').width();

                            var slideMarginRightSize = slideMarginRight*(slideItemsCount-1);

                            $(this).find('.et_pb_testimonial').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlogSlideritems - 15) + "px !important;");

                            slideItemswidth = $(this).find('.et_pb_testimonial').outerWidth();
                            var slideWidth = slideItemsCount * slideItemswidth;

                            var slideWidth2 = slideWidth + slideMarginRightSize;

                            $(this).find('.person_slide_container').css("cssText", "width: " + slideWidth2 + "px !important;");
                            $('body.et-fb .impi_victor_testimonials .person_slide_container').css("display", "flex");


                        });

                        $('.impi_victor_testimonials .persons-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                            if ($(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').prev().length === 1) {
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                            } else {
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').removeClass('active_slide');
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial:nth-last-child(' + person_1_nthElement + ')').addClass('active_slide');
                            }
                        });

                        $('.impi_victor_testimonials .persons-slider-arrows a.portfolio-arrow-next').on('click', function () {
                            if ($(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').nextAll().length !== person_1_afterActiveElement) {
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').removeClass('active_slide').next().addClass('active_slide');
                            } else {
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').removeClass('active_slide');
                                $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial:first-child').addClass('active_slide');
                            }
                        });

                        slideItemswidth = slideItemswidth + 30;



                        $('.impi_victor_testimonials .persons-slider-arrows a').on('click', function (event) {
                            event.preventDefault();
                            var sliderSlideSize1 = $(this).closest('.impi_victor_testimonials').find('.et_pb_testimonial.active_slide').prevAll().length;

                            var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;



                            $(this).closest('.impi_victor_testimonials').find('.person_slide_container').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');


                        });




                    }, timeOutPerson1Inner);
                }

            }, timeOutPerson1);

        })(jQuery);