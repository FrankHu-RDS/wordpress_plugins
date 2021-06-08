(function($) {

    //            Empowered Slider Header

    var timeOutCocoSlider1 = 1000;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoSlider1 = 10000;
    }
    setTimeout(function() {
        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.coco_empowered_slider_header .et_pb_slide').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertAfter($('.coco_empowered_slider_header .et_pb_slider .et-pb-slider-arrows'));


        $('.coco_empowered_slider_header .et-pb-slider-arrows a').on('click', function(event) {
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCount = $('.coco_empowered_slider_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.coco_empowered_slider_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });

    }, timeOutCocoSlider1);
    setInterval(function() {
        var showHomeSlideritems = 1;
        var showSlideItemsCount = $('.coco_empowered_slider_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

        $('.coco_empowered_slider_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);
    }, 50);

    //            End Empowered Slider Header


    //            Lifestyle Slider

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var timeOutCocoSlider2 = 1000;

    if (isIE()) {
        timeOutCocoSlider2 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        timeOutCocoSlider2 = 10000;
    }



    setTimeout(function() {
        if ($('.coco_lifestyle_slider').length > 0) {
            var showHomeSlider2items = 1;
            var spaceSlide = 170;

            if ($(window).width() <= 1650) {
                spaceSlide = 50;
            }


            $('.coco_lifestyle_slider').each(function () {
                var thisSlider = $(this)
                var homeSlide2ItemsCount = $(this).find('.et_pb_slide').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlider2items + '</span>/<span>0' + homeSlide2ItemsCount + '</span></div>').insertAfter($(this).find('.et_pb_slider .et-pb-slider-arrows'));


                setTimeout(function() {
                    $('<div class="slide_images"></div>').insertBefore(thisSlider.find('.et_pb_slides'));


                    var classCount = 1;
                    thisSlider.find('.et_pb_slide').each(function() {
                        $(this).attr('value', 'slide-' + classCount);
                        $(this).find('.et_pb_slide_image').attr('value', 'slide-' + classCount).appendTo(thisSlider.find('.slide_images'));
                        classCount++;
                    });

                    thisSlider.find('.slide_images .et_pb_slide_image:last-child').clone().removeAttr('value').insertBefore(thisSlider.find('.slide_images .et_pb_slide_image:first-child'));
                    thisSlider.find('.slide_images .et_pb_slide_image[value="slide-1"]').clone().removeAttr('value').insertAfter(thisSlider.find('.slide_images .et_pb_slide_image:last-child'));

                    thisSlider.find('.slide_images .et_pb_slide_image[value="slide-1"]').addClass('active_image');
                    var slideItemsCount = thisSlider.find('.slide_images .et_pb_slide_image').length;
                    var slideInnerWidth = thisSlider.find('.et_pb_column_4_4 ').width();
                    var slidesSpace = slideItemsCount * spaceSlide;


                    thisSlider.find('.slide_images .et_pb_slide_image').css("cssText", "width: " + Math.floor(slideInnerWidth) + "px !important;");
                    var slideItemswidth = thisSlider.find('.slide_images .et_pb_slide_image').outerWidth();
                    var slideWidth = slideItemsCount * slideItemswidth;

                    thisSlider.find('.slide_images').css('transform', 'translate(-' + (slideInnerWidth + spaceSlide) + 'px, 0)');

                    slideWidth = slideWidth + slidesSpace;

                    thisSlider.find('.slide_images').css({
                        "width": slideWidth + "px"
                    });


                    $('.coco_lifestyle_slider').css('opacity', 1);

                }, 0);
            })



        }


        //            Slide Arrows  ***************************************************************************


        $('.coco_lifestyle_slider .et-pb-slider-arrows a').on('click', function(event) {
            var thisArrow = $(this);
            event.preventDefault();

            setTimeout(function() {
                var showSlideItemsCount = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlider2items;

                thisArrow.closest('.et_pb_slider').find('.slider_number .slider_active_number').text('0' + showSlideItemsCount);


                var imageActive = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.et-pb-active-slide').attr('value');
                thisArrow.closest('.et_pb_slider').find('.slide_images .et_pb_slide_image').removeClass('active_image');

                thisArrow.closest('.et_pb_slider').find('.slide_images .et_pb_slide_image[value="' + imageActive + '"]').addClass('active_image');

                var slideItemswidth = thisArrow.closest('.et_pb_slider').find('.slide_images .et_pb_slide_image').outerWidth() + spaceSlide;
                var slider5SlideSize1 = thisArrow.closest('.et_pb_slider').find('.slide_images .et_pb_slide_image.active_image').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                thisArrow.closest('.et_pb_slider').find('.slide_images').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            }, 200);

        });
        setInterval(function() {
            $('.coco_lifestyle_slider').each(function () {
                var showSlideItemsCount = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlider2items;

                $(this).find('.slider_number .slider_active_number').text('0' + showSlideItemsCount);


                var imageActive = $(this).find('.et_pb_slide.et-pb-active-slide').attr('value');
                $(this).find('.slide_images .et_pb_slide_image').removeClass('active_image');

                $(this).find('.slide_images .et_pb_slide_image[value="' + imageActive + '"]').addClass('active_image');

                var slideItemswidth = $(this).find('.slide_images .et_pb_slide_image').outerWidth() + spaceSlide;
                var slider5SlideSize1 = $(this).find('.slide_images .et_pb_slide_image.active_image').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                $(this).find('.slide_images').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
            })


        }, 50);

        setTimeout(function() {
            if ($('.coco_style_header').length !== 0) {
                var styleHeaderHeight = 0;
                $('.coco_style_header .et_pb_slider .et_pb_slide').each(function() {
                    if(styleHeaderHeight < $(this).find('.et_pb_slide_description').height()){
                        styleHeaderHeight = $(this).find('.et_pb_slide_description').height()
                    }
                })

                $('.coco_style_header .et_pb_slider .et_pb_slide .et_pb_slide_description').height(styleHeaderHeight)

                $('.coco_style_header .et_pb_slider .et-pb-controllers a').each(function() {
                    var thisText = $(this).text();
                    if (thisText <= 9) {
                        thisText = '0' + thisText;
                    }
                    $(this).text(thisText);
                });

                var nextSlideImage = $('.coco_style_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                var nextSlideTitle = $('.coco_style_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                //                    nextSlideImage = nextSlideImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");


                $('<div class="next_post_image_title"><div class="next_post_image"></div><h2 class="next_post_title">' + nextSlideTitle + '</h2></div>').insertBefore($('.coco_style_header .et-pb-slider-arrows a.et-pb-arrow-prev'));
                $('.coco_style_header .next_post_image').css('background-image', nextSlideImage);

                $('.coco_style_header .et_pb_slider .et-pb-slider-arrows a, .coco_style_header .et_pb_slider .et-pb-controllers a').on('click', function() {
                    setTimeout(function() {
                        console.log($('.coco_style_header .et_pb_slider .et-pb-active-slide').next().length);

                        if ($('.coco_style_header .et_pb_slider .et-pb-active-slide').next().length !== 0) {
                            var nextSlideImageClick = $('.coco_style_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                            var nextSlideTitleClick = $('.coco_style_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                            $('.coco_style_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_style_header .next_post_title').text(nextSlideTitleClick);
                        } else {
                            var nextSlideImageClick = $('.coco_style_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                            var nextSlideTitleClick = $('.coco_style_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                            $('.coco_style_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_style_header .next_post_title').text(nextSlideTitleClick);
                        }

                    }, 100)

                })
            }
        }, 1000);

        setInterval(function() {
            $('.coco_style_header .et_pb_slider').each(function() {
                if ($(this).parent().find(' .et-pb-active-slide').next().length !== 0) {
                    var nextSlideImageClick = $(this).parent().find('.et-pb-active-slide').next().css('background-image');
                    var nextSlideTitleClick = $(this).parent().find('.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                    $(this).parent().find('.next_post_image').css('background-image', nextSlideImageClick);
                    $(this).parent().find('.next_post_title').text(nextSlideTitleClick);
                } else {
                    var nextSlideImageClick = $(this).parent().find('.et_pb_slide:first-child').css('background-image');
                    var nextSlideTitleClick = $(this).parent().find('.et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                    $(this).parent().find('.next_post_image').css('background-image', nextSlideImageClick);
                    $(this).parent().find('.next_post_title').text(nextSlideTitleClick);
                }
            });
        }, 50);

        //            Go Slider Header

        var timeOutCocoSlider1 = 1000;

        if ($('body').hasClass('et-fb')) {
            timeOutCocoSlider1 = 10000;
        }
        setTimeout(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_go_header .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertAfter($('.coco_go_header .et_pb_slider .et-pb-slider-arrows'));
            var lineWidth = $('.coco_go_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth / homeSlideItemsCount;
            $('.coco_go_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.coco_go_header .et-pb-slider-arrows a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCountLine = $('.coco_go_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.coco_go_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.coco_go_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.coco_go_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')

                }, 200);

            });

        }, timeOutCocoSlider1);

        setInterval(function() {



            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_go_header .et_pb_slide').length;
            var lineWidth = $('.coco_go_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth / homeSlideItemsCount;
            var showSlideItemsCountLine = $('.coco_go_header .et_pb_slide.et-pb-active-slide').prevAll().length;
            var showSlideItemsCount = $('.coco_go_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.coco_go_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            $('.coco_go_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)');



        }, 50);

        //            End Go Slider Header




        //            Coco Case Study Slider 2


        setTimeout(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_case_study_slider_2 .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.coco_case_study_slider_2 .et_pb_slider .et-pb-slider-arrows'));
            var lineWidth = $('.coco_case_study_slider_2 .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth / homeSlideItemsCount;
            $('.coco_case_study_slider_2 .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.coco_case_study_slider_2 .et-pb-slider-arrows a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCountLine = $('.coco_case_study_slider_2 .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.coco_case_study_slider_2 .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.coco_case_study_slider_2 .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.coco_case_study_slider_2 .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')

                }, 200);

            });

        }, 1500);
        setInterval(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_case_study_slider_2 .et_pb_slide').length;
            var lineWidth = $('.coco_case_study_slider_2 .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth / homeSlideItemsCount;
            $('.coco_case_study_slider_2 .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
            var showSlideItemsCountLine = $('.coco_case_study_slider_2 .et_pb_slide.et-pb-active-slide').prevAll().length;
            var showSlideItemsCount = $('.coco_case_study_slider_2 .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.coco_case_study_slider_2 .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            $('.coco_case_study_slider_2 .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')

        }, 50);

        //            End   Coco Case Study Slider 2


        //    Coco Idea Person Module

        var timeOutCocoPersonSlider = 0;

        if ($('body').hasClass('et-fb')) {
            timeOutCocoPersonSlider = 7000;
        }
        setTimeout(function() {
            var dotCount = 1;
            $('.coco_idea_person_module .et_pb_slide').each(function() {
                var slideImage = $(this).find('.et_pb_slide_image img').attr('src');
                $('<div class="dots_image dots_image_"' + dotCount + '></div>').appendTo($('.coco_idea_person_module .et-pb-controllers a:nth-child(' + dotCount + ')')).css('background-image', 'url(' + slideImage + ')');
                dotCount++;
            });


            var showPersonSlideritems = 1;
            var personSlideItemsCount = $('.coco_idea_person_module .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showPersonSlideritems + '</span>/<span>0' + personSlideItemsCount + '</span></div>').insertAfter($('.coco_idea_person_module .et_pb_slider .et-pb-controllers'));


            $('<div class="slide_bottom_box"></div>').insertAfter($('.coco_idea_person_module .et_pb_slides'));
            $('.coco_idea_person_module .et-pb-slider-arrows').appendTo($('.coco_idea_person_module .slide_bottom_box'));
            $('.coco_idea_person_module .et-pb-controllers').appendTo($('.coco_idea_person_module .slide_bottom_box'));
            $('.coco_idea_person_module .slider_number').appendTo($('.coco_idea_person_module .slide_bottom_box'));
            $('<div class="slide_dots"></div>').appendTo($('.coco_idea_person_module .slide_bottom_box .et-pb-controllers'));

            $('.coco_idea_person_module .slide_bottom_box .et-pb-controllers a').each(function() {
                $(this).appendTo($('.coco_idea_person_module .slide_bottom_box .et-pb-controllers .slide_dots'))
            });


            var slideDotesCount = $('.coco_idea_person_module .et-pb-controllers a').length;
            var slideOuterContWidth = $('.coco_idea_person_module .et-pb-controllers').width();
            var slideItemWidth = slideOuterContWidth / 4;
            $('.coco_idea_person_module .et-pb-controllers a').width(slideItemWidth);
            $('.coco_idea_person_module .et-pb-controllers .slide_dots').width(slideItemWidth * slideDotesCount);


            $('.coco_idea_person_module .et-pb-slider-arrows a, .coco_idea_person_module .et-pb-controllers a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCount = $('.coco_idea_person_module .et_pb_slide.et-pb-active-slide').prevAll().length + showPersonSlideritems;

                    $('.coco_idea_person_module .slider_number .slider_active_number').text('0' + showSlideItemsCount);


                    var dotCount3 = 1;
                    $('.coco_idea_person_module .et_pb_slide').each(function() {
                        console.log(('.coco_idea_person_module .et-pb-controllers a:nth-child(' + dotCount3 + ')'));
                        var slideImage = $(this).find('.et_pb_slide_image img').attr('src');

                        $('.coco_idea_person_module .et-pb-controllers a:nth-child(' + dotCount3 + ') .dots_image').css('background-image', 'url(' + slideImage + ')');
                        dotCount3++;
                    });

                    $('.coco_idea_person_module .et-pb-controllers a').width(slideItemWidth);
                    $('.coco_idea_person_module .et-pb-controllers .slide_dots').width(slideItemWidth * slideDotesCount);




                    if ($('.coco_idea_person_module .et-pb-controllers .slide_dots a.et-pb-active-control').nextAll().length <= 3) {
                        var transformSize = slideDotesCount - 4;
                        $('.coco_idea_person_module .et-pb-controllers .slide_dots').css('transform', 'translate(-' + transformSize * slideItemWidth + 'px,0)');
                    } else {
                        var prevElements = $('.coco_idea_person_module .et-pb-controllers .slide_dots a.et-pb-active-control').prevAll().length;
                        $('.coco_idea_person_module .et-pb-controllers .slide_dots').css('transform', 'translate(-' + prevElements * slideItemWidth + 'px,0)');
                    }
                }, 0);


            });
            $('.coco_idea_person_module').css('opacity', 1);

        }, timeOutCocoPersonSlider);
        setInterval(function() {
            var showPersonSlideritems = 1;
            var slideDotesCount = $('.coco_idea_person_module .et-pb-controllers a').length;
            var slideOuterContWidth = $('.coco_idea_person_module .et-pb-controllers').width();
            var slideItemWidth = slideOuterContWidth / 4;
            var showSlideItemsCount = $('.coco_idea_person_module .et_pb_slide.et-pb-active-slide').prevAll().length + showPersonSlideritems;

            $('.coco_idea_person_module .slider_number .slider_active_number').text('0' + showSlideItemsCount);


            var dotCount3 = 1;
            $('.coco_idea_person_module .et_pb_slide').each(function() {

                var slideImage = $(this).find('.et_pb_slide_image img').attr('src');

                $('.coco_idea_person_module .et-pb-controllers a:nth-child(' + dotCount3 + ') .dots_image').css('background-image', 'url(' + slideImage + ')');
                dotCount3++;
            });

            $('.coco_idea_person_module .et-pb-controllers a').width(slideItemWidth);
            $('.coco_idea_person_module .et-pb-controllers .slide_dots').width(slideItemWidth * slideDotesCount);




            if ($('.coco_idea_person_module .et-pb-controllers .slide_dots a.et-pb-active-control').nextAll().length <= 3) {
                var transformSize = slideDotesCount - 4;
                $('.coco_idea_person_module .et-pb-controllers .slide_dots').css('transform', 'translate(-' + transformSize * slideItemWidth + 'px,0)');
            } else {
                var prevElements = $('.coco_idea_person_module .et-pb-controllers .slide_dots a.et-pb-active-control').prevAll().length;
                $('.coco_idea_person_module .et-pb-controllers .slide_dots').css('transform', 'translate(-' + prevElements * slideItemWidth + 'px,0)');
            }


        }, 50);

        //    End Coco Idea Person Module



        //Coco Fresh Header
        setTimeout(function() {
            if ($('.coco_fresh_header').length !== 0) {


                var nextSlideImage = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                var nextSlideTitle = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();

                var next2SlideImage = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().css('background-image');
                var next2SlideTitle = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().find('h2.et_pb_slide_title').text();



                $('<div class="next_post_image_title"><div class="next_post_image"><h2 class="next_post_title">' + nextSlideTitle + '</h2></div><div class="next2_post_image"><h2 class="next2_post_title">' + next2SlideTitle + '</h2></div></div>').insertAfter($('.coco_fresh_header .et_pb_row '));
                $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImage);
                $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImage);

                $('.coco_fresh_header .et_pb_slider .et-pb-slider-arrows a, .coco_fresh_header .et_pb_slider .et-pb-controllers a').on('click', function() {
                    setTimeout(function() {

                        if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length > 1) {
                            var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                            var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                            $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                            var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().css('background-image');
                            var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().find('h2.et_pb_slide_title').text();

                            $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                            $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);

                        } else if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length === 1) {
                            var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                            var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                            $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                            var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                            var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                            $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                            $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);

                        } else if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length === 0) {
                            var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                            var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                            $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                            var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:nth-child(2)').css('background-image');
                            var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:nth-child(2)').find('h2.et_pb_slide_title').text();
                            $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                            $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);
                        }

                    }, 0)

                })
            }
        }, 1000);

        setInterval(function() {

            if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length > 1) {
                var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().css('background-image');
                var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().next().find('h2.et_pb_slide_title').text();

                $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);

            } else if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length === 1) {
                var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);

            } else if ($('.coco_fresh_header .et_pb_slider .et-pb-active-slide').nextAll().length === 0) {
                var nextSlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                var nextSlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                $('.coco_fresh_header .next_post_image').css('background-image', nextSlideImageClick);
                $('.coco_fresh_header .next_post_title').text(nextSlideTitleClick);

                var next2SlideImageClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:nth-child(2)').css('background-image');
                var next2SlideTitleClick = $('.coco_fresh_header .et_pb_slider .et_pb_slide:nth-child(2)').find('h2.et_pb_slide_title').text();
                $('.coco_fresh_header .next2_post_image').css('background-image', next2SlideImageClick);
                $('.coco_fresh_header .next2_post_title').text(next2SlideTitleClick);
            }

        }, 50);



        setTimeout(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_case_study_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.coco_case_study_slider .et_pb_slider .et-pb-slider-arrows'));


            $('.coco_case_study_slider .et-pb-slider-arrows a, .coco_case_study_slider .et-pb-controllers a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCount = $('.coco_case_study_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.coco_case_study_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 200);

            });






        }, timeOutCocoSlider1);


        setInterval(function() {
            var showHomeSlideritems = 1;
            var showSlideItemsCount = $('.coco_case_study_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.coco_case_study_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

        }, 50);


        //                Coco Want Header


        setTimeout(function() {


            $('.coco_want_header .et_pb_slider .et-pb-controllers a').each(function() {
                var thisNumber = $(this).text();
                $(this).html('<span class="slide_title"></span><span class="slide_number"></span>');
            });

            var classCountC = "1";
            $('.coco_want_header  .et_pb_slide').each(function() {
                var attrText = $(this).find('.et_pb_slide_description h2').text();
                $('.coco_want_header .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                classCountC++;
            });


        }, timeOutCocoSlider1);







        //                Coco Want Header


        setTimeout(function() {


            $('.coco_property_header .et_pb_slider .et-pb-controllers a').each(function() {
                var thisNumber = $(this).text();
                $(this).html('<span class="slide_number">0' + thisNumber + '</span><span class="slide_title"></span>');
            });

            var classCountC = "1";
            $('.coco_property_header  .et_pb_slide').each(function() {
                var attrText = $(this).find('.et_pb_slide_description h2').text();
                $('.coco_property_header .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                classCountC++;
            });


        }, timeOutCocoSlider1);




        //Coco Empowered header
        setTimeout(function() {
            if ($('.coco_empowered_header').length !== 0) {

                var showTestimonialsCount = 1;
                var showTestimonialsCount2 = $('.coco_empowered_header .et_pb_slider .et_pb_slide').length;

                $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').insertBefore($('.coco_empowered_header .et_pb_slider .et-pb-slider-arrows'));


                var nextSlideImage = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').next().css('background-image');
                var nextSlideTitle = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                var nextSlideContent = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').next().find('.et_pb_slide_content').text();

                var prevSlideImage = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').css('background-image');
                var prevSlideTitle = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();
                var prevSlideContent = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_content').text();



                $('.coco_empowered_header .et-pb-slider-arrows a.et-pb-arrow-next').html('<div class="next_post_image"><h2 class="next_post_title">' + nextSlideTitle + '</h2><p class="next_post_content">' + nextSlideContent + '</p></div>');
                $('.coco_empowered_header .et-pb-slider-arrows a.et-pb-arrow-prev').html('<div class="prev_post_image"><h2 class="prev_post_title">' + prevSlideTitle + '</h2><p class="prev_post_content">' + prevSlideContent + '</p></div>');


                $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImage);
                $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImage);



                var slideHeight = 0;

                $('.coco_empowered_header .et_pb_slider .et_pb_slide').each(function () {
                    if(slideHeight < $(this).outerHeight()){
                        slideHeight = $(this).outerHeight()
                    }
                })

                $('.coco_empowered_header .et_pb_slider .et_pb_slide').outerHeight(slideHeight)


                $('.coco_empowered_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function() {
                    setTimeout(function() {
                        if ($('.coco_empowered_header .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                            var nextSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().css('background-image');
                            var nextSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                            var nextSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_content').text();
                            $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_empowered_header .next_post_title').text(nextSlideTitleClick);
                            $('.coco_empowered_header .next_post_content').text(nextSlideContentClick);
                        } else {
                            var nextSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                            var nextSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                            var nextSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_content').text();
                            $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImageClick);
                            $('.coco_empowered_header .next_post_title').text(nextSlideTitleClick);
                            $('.coco_empowered_header .next_post_content').text(nextSlideContentClick);
                        }

                        var prevSlideImageClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').css('background-image');
                        var prevSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').find('h2.et_pb_slide_title').text();
                        var prevSlideContentClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_content').text();

                        $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImageClick);
                        $('.coco_empowered_header .prev_post_title').text(prevSlideTitleClick);
                        $('.coco_empowered_header .prev_post_content').text(prevSlideContentClick);
                    }, 0)

                });

                $('.coco_empowered_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function() {
                    setTimeout(function() {

                        if ($('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
                            var prevSlideImageClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().css('background-image');
                            var prevSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().find('h2.et_pb_slide_title').text();
                            var prevSlideContentClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_content').text();

                            $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImageClick);
                            $('.coco_empowered_header .prev_post_title').text(prevSlideTitleClick);
                            $('.coco_empowered_header .prev_post_content').text(prevSlideContentClick);
                        } else {
                            var prevSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').css('background-image');
                            var prevSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();
                            var prevSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_content').text();

                            $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImageClick);
                            $('.coco_empowered_header .prev_post_title').text(prevSlideTitleClick);
                            $('.coco_empowered_header .prev_post_content').text(prevSlideContentClick);
                        }

                        var nextSlideImageClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').css('background-image');
                        var nextSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').find('h2.et_pb_slide_title').text();
                        var nextSlideContentClick = $('.coco_empowered_header .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_content').text();
                        $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImageClick);
                        $('.coco_empowered_header .next_post_title').text(nextSlideTitleClick);
                        $('.coco_empowered_header .next_post_content').text(nextSlideContentClick);
                    }, 0)

                });


                $('.coco_empowered_header .et-pb-slider-arrows a').on('click', function(event) {
                    event.preventDefault();

                    setTimeout(function() {
                        var showSlideItemsCount = $('.coco_empowered_header .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                        $('.coco_empowered_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    }, 200);

                });


            }
        }, timeOutCocoSlider1);


        setInterval(function() {

            if ($('.coco_empowered_header .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                var nextSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().css('background-image');
                var nextSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                var nextSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_content').text();
                $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImageClick);
                $('.coco_empowered_header .next_post_title').text(nextSlideTitleClick);
                $('.coco_empowered_header .next_post_content').text(nextSlideContentClick);
            } else {
                var nextSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').css('background-image');
                var nextSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                var nextSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_content').text();
                $('.coco_empowered_header .next_post_image').css('background-image', nextSlideImageClick);
                $('.coco_empowered_header .next_post_title').text(nextSlideTitleClick);
                $('.coco_empowered_header .next_post_content').text(nextSlideContentClick);
            }


            if ($('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
                var prevSlideImageClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().css('background-image');
                var prevSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().find('h2.et_pb_slide_title').text();
                var prevSlideContentClick = $('.coco_empowered_header .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_content').text();

                $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImageClick);
                $('.coco_empowered_header .prev_post_title').text(prevSlideTitleClick);
                $('.coco_empowered_header .prev_post_content').text(prevSlideContentClick);
            } else {
                var prevSlideImageClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').css('background-image');
                var prevSlideTitleClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();
                var prevSlideContentClick = $('.coco_empowered_header .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_content').text();

                $('.coco_empowered_header .prev_post_image').css('background-image', prevSlideImageClick);
                $('.coco_empowered_header .prev_post_title').text(prevSlideTitleClick);
                $('.coco_empowered_header .prev_post_content').text(prevSlideContentClick);
            }




            var showTestimonialsCount = 1;
            var showSlideItemsCount = $('.coco_empowered_header .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

            $('.coco_empowered_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);


        }, 50);


        setTimeout(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_cult_header .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.coco_cult_header .et_pb_slider .et-pb-slider-arrows'));


            $('.coco_cult_header .et-pb-slider-arrows a, .coco_cult_header .et-pb-controllers a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCount = $('.coco_cult_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.coco_cult_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 200);

            });

        }, timeOutCocoSlider1);

        setInterval(function() {
            var showHomeSlideritems = 1;
            var showSlideItemsCount = $('.coco_cult_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.coco_cult_header  .slider_number .slider_active_number').text('0' + showSlideItemsCount);
        }, 50)



        //                Coco Groove Header


        setTimeout(function() {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.coco_groove_header .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertAfter($('.coco_groove_header .et_pb_slider .et-pb-controllers'));


            $('.coco_groove_header .et-pb-slider-arrows a, .coco_groove_header .et-pb-controllers a').on('click', function(event) {
                event.preventDefault();

                setTimeout(function() {
                    var showSlideItemsCount = $('.coco_groove_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.coco_groove_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 200);

            });


            $('.coco_groove_header .et_pb_slider .et-pb-controllers a').each(function() {
                var thisNumber = $(this).text();
                $(this).html('<span class="slide_number">0' + thisNumber + '</span><span class="slide_title"></span>');
            });

            var classCountC = "1";
            $('.coco_groove_header .et_pb_slide').each(function() {
                var attrText = $(this).find('.et_pb_slide_description h2').text();
                $('.coco_groove_header .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                classCountC++;
            });



            var titleHeight = 0;
            $('.coco_groove_header .et_pb_slider .et_pb_slide_description h2').each(function() {
                var thisTitleHeight = $(this).height();
                if (thisTitleHeight > titleHeight) {
                    titleHeight = thisTitleHeight;
                }
            });
            $('.coco_groove_header .et_pb_slider .et_pb_slide_description h2').height(titleHeight);


        }, timeOutCocoSlider1);
        setInterval(function() {
            var showHomeSlideritems = 1;
            var showSlideItemsCount = $('.coco_groove_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.coco_groove_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

        }, 50);

    }, timeOutCocoSlider2);




    setTimeout(function() {

        var classCountC = "1";
        $('.coco_tailor_header .et_pb_slide').each(function() {
            var attrText = $(this).find('.et_pb_slide_description h2').text();

            $('.coco_tailor_header .et-pb-controllers a:nth-child(' + classCountC + ')').text(attrText);
            classCountC++;
        });
    }, timeOutCocoSlider2);



    //            Coco Image Swop Header

    setTimeout(function() {
        var slideContBgImage = $('.coco_image_swop_header').css('background-image');
        $('.coco_image_swop_header .ecommerce_header_menu .et_pb_blurb').hover(

            function() {
                var slideBgImage = $(this).css('background-image');
                if (slideBgImage !== 'none') {
                    $('.coco_image_swop_header').css('cssText', 'background-image: ' + slideBgImage + ' !important;');
                }

            },
            function() {
                //                        $('.coco_image_swop_header').css('cssText', 'background-image: ' + slideContBgImage + ' !important;');
            }
        );
    }, timeOutCocoSlider2);




    //            coco sassy slider

    setTimeout(function() {
        var showHomeSlideritems = 1;
        $('.coco_sassy_slider').each(function () {
            var homeSlideItemsCount = $(this).find('.et_pb_slide').length;
            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span>/<span>0' + homeSlideItemsCount + '</span></div>').insertAfter($(this).find('.et_pb_slider .et-pb-slider-arrows'));
        })

        // $('.coco_sassy_slider .et-pb-slider-arrows a, .coco_sassy_slider .et-pb-controllers a').on('click', function(event) {
        //     event.preventDefault();
        //
        //     setTimeout(function() {
        //         var showSlideItemsCount = $('.coco_sassy_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;
        //
        //         $('.coco_sassy_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);
        //
        //     }, 200);
        //
        // });


        $('.coco_sassy_slider .et_pb_slider .et-pb-controllers a').each(function() {

            $(this).html('<span class="slide_number"></span><span class="slide_title"></span><span class="slide_content"></span>');
        });

        $('.coco_sassy_slider ').each(function() {
            var slideSection = $(this);
            var classCountC = "1";
            $(this).find('.et_pb_slide').each(function() {
                var attrText = $(this).find('.et_pb_slide_description h2').text();
                var attrContentText = $(this).find('.et_pb_slide_description .et_pb_slide_content').text();
                $(slideSection).find('.et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                $(slideSection).find('.et-pb-controllers a:nth-child(' + classCountC + ') .slide_content').text(attrContentText);
                classCountC++;
            });
        })

    }, timeOutCocoSlider2);

    setInterval(function() {
        var showHomeSlideritems = 1;
        $('.coco_sassy_slider').each(function () {
            var showSlideItemsCount = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;
            $(this).find('.slider_number .slider_active_number').text('0' + showSlideItemsCount);
        })

    }, 50);




    //        Coco History TimeLine

    //            Slide Sizes  ***************************************************************************

    var timeOutCocoTimeLineInner = 2500;
    var timeOutCocoTimeLine = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoTimeLine = 10000;
        var timeOutCocoTimeLineInner = 0;
    }

    setTimeout(function() {
        if ($('.coco_our_history_timeline').length > 0) {
            setTimeout(function() {

                var showCocoTimeLineSlideritems = 3;

                if ($(window).width() <= "767") {
                    showCocoTimeLineSlideritems = 2;
                }

                if ($(window).width() <= "480") {
                    showCocoTimeLineSlideritems = 1;

                }


                $('.coco_our_history_timeline .et_pb_slider .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($('.coco_our_history_timeline .et_pb_slider .et_pb_slide:last-child'));
                $('.coco_our_history_timeline .et_pb_slider .et_pb_slide:nth-child(2)').clone().insertAfter($('.coco_our_history_timeline .et_pb_slider .et_pb_slide:last-child'));


                var slideInnerWidth = $('.coco_our_history_timeline .et_pb_slider').outerWidth();
                var slideItemsCount = $('.coco_our_history_timeline .et_pb_slider .et_pb_slide').length;

                $('.coco_our_history_timeline .et_pb_slide ').css("cssText", "width: " + Math.floor(slideInnerWidth / showCocoTimeLineSlideritems) + "px !important;");
                var slideItemswidth = $('.coco_our_history_timeline .et_pb_slide').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('.coco_our_history_timeline .et_pb_slides').css("cssText", "width: " + slideWidth + "px !important;");
            }, 2000);
        }


        //            Slide Arrows  ***************************************************************************


        setTimeout(function() {

            $('.coco_our_history_timeline .et_pb_slider .et-pb-slider-arrows a').on('click', function(event) {
                event.preventDefault();


                setTimeout(function() {
                    var slideItemswidth = $('.coco_our_history_timeline .et_pb_slider .et_pb_slide').outerWidth();
                    var slider5SlideSize1 = $('.coco_our_history_timeline .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                    $('.coco_our_history_timeline .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                }, 100)



            });

            if($('.coco_our_history_timeline .et_pb_slider').hasClass('et_slider_auto')){
                setInterval(function () {
                    var slideItemswidth = $('.coco_our_history_timeline .et_pb_slider .et_pb_slide').outerWidth();
                    var slider5SlideSize1 = $('.coco_our_history_timeline .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                    $('.coco_our_history_timeline .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                },100)
            }
        }, timeOutCocoTimeLineInner);
    }, timeOutCocoTimeLine);

    //        End Person 4 Slider




})(jQuery);