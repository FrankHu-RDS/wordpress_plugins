(function ($) {


    var timeOutCocoPerson = 1000;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoPerson = 10000;
    }
    setTimeout(function () {

        $('body.et-fb .coco_tall_person_module .et_pb_team_member.et-first-child').addClass('active_member');
        $('.coco_tall_person_module .et_pb_team_member:first-child').addClass('active_member');

        $('<div class="coco-person-slider-arrows"><a class="coco-arrow-prev" href="#"><span class="icon">4</span></a><a class="coco-arrow-next" href="#"><span class="icon">5</span></a></div>').appendTo($('.coco_tall_person_module .et_pb_column_4_4'));


        $('.coco_tall_person_module .et_pb_team_member').on('click', function () {
            $('.coco_tall_person_module .et_pb_team_member').removeClass('active_member');
            $(this).addClass('active_member');
        });


        $('.coco_tall_person_module .coco-person-slider-arrows a.coco-arrow-next').on('click', function (event) {
            event.preventDefault();
            var activeSlideNext = $('.coco_tall_person_module .et_pb_team_member.active_member').next('.et_pb_team_member').length;
            if (activeSlideNext >= 1) {
                $('.coco_tall_person_module .et_pb_team_member.active_member').removeClass('active_member').next('.et_pb_team_member').addClass('active_member');
            } else {
                $('.coco_tall_person_module .et_pb_team_member.active_member').removeClass('active_member');
                $('.coco_tall_person_module .et_pb_team_member:first-child').addClass('active_member');
                $('body.et-fb .coco_tall_person_module .et_pb_team_member.et-first-child').addClass('active_member');
            }

        });
        var personsLength = $('.coco_tall_person_module .et_pb_team_member').length;
        $('.coco_tall_person_module .coco-person-slider-arrows a.coco-arrow-prev').on('click', function (event) {
            event.preventDefault();
            var activeSlidePrev = $('.coco_tall_person_module .et_pb_team_member.active_member').prev('.et_pb_team_member').length;

            if (activeSlidePrev >= 1) {
                $('.coco_tall_person_module .et_pb_team_member.active_member').removeClass('active_member').prev('.et_pb_team_member').addClass('active_member');
            } else {
                $('.coco_tall_person_module .et_pb_team_member.active_member').removeClass('active_member');
                $('.coco_tall_person_module .et_pb_team_member:nth-child(' + personsLength + ')').addClass('active_member');
            }

        });

        if ($(window).width() >= 480) {
            $('.coco_catwalk_person_module .coco_tall_person_module .et_pb_team_member').each(function () {
                $(this).find('.et_pb_team_member_image').insertAfter($(this).find('.et_pb_team_member_description'));
            });
        }
    }, timeOutCocoPerson);

    setTimeout(function () {
        var activeSlideHeight = $('.coco_catwalk_person_module .coco_tall_person_module .et_pb_team_member.active_member').height();
        var notActiveSlideHeight = $('.coco_catwalk_person_module .coco_tall_person_module .et_pb_team_member:not(.active_member)').height();
        var speceRow = activeSlideHeight - notActiveSlideHeight;
        $('.coco_catwalk_person_module .et_pb_row:first-child').css('padding-bottom', speceRow);
        var showTestimonialsCount = 1;
        var showTestimonialsCount2 = $('.coco_tall_person_module .et_pb_team_member').length;

        $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').appendTo($('.coco_tall_person_module .et_pb_column_4_4'));

        $('.coco_tall_person_module .et_pb_team_member, .coco_tall_person_module .coco-person-slider-arrows a').on('click', function (event) {
            event.preventDefault();

            setTimeout(function () {
                var showSlideItemsCount = $('.coco_tall_person_module .et_pb_team_member.active_member').prevAll().length + showTestimonialsCount;

                $('.coco_tall_person_module .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });


    }, timeOutCocoPerson);





    //Coco Empowered header
    setTimeout(function () {
        if ($('.coco_sleek_person_module').length !== 0) {

            var showTestimonialsCount = 1;
            var showTestimonialsCount2 = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showTestimonialsCount + '</span>/<span>0' + showTestimonialsCount2 + '</span></div>').insertBefore($('.coco_sleek_person_module .et_pb_slider .et-pb-slider-arrows'));

            var nextSlideImage = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
            var nextSlideTitle = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();

            var prevSlideImage = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');
            var prevSlideTitle = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();

            $('.coco_sleek_person_module .et-pb-slider-arrows a.et-pb-arrow-next').html('<div class="next_post_image"><h2 class="next_post_title">' + nextSlideTitle + '</h2></div>');
            $('.coco_sleek_person_module .et-pb-slider-arrows a.et-pb-arrow-prev').html('<div class="prev_post_image"><h2 class="prev_post_title">' + prevSlideTitle + '</h2></div>');

            $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImage +')');
            $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImage +')');



            $('.coco_sleek_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
                setTimeout(function () {
                    if ($('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                        var nextSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                        var nextSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
                        $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                        $('.coco_sleek_person_module .next_post_title').text(nextSlideTitleClick);

                    }else{
                        var nextSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
                        var nextSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
                        $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                        $('.coco_sleek_person_module .next_post_title').text(nextSlideTitleClick);

                    }
                    var prevSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_image img').attr('src');
                    var prevSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-moved-slide').find('h2.et_pb_slide_title').text();
                    $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                    $('.coco_sleek_person_module .prev_post_title').text(prevSlideTitleClick);

                }, 0)

            });

            $('.coco_sleek_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                setTimeout(function () {

                    if ($('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
                        var prevSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_image img').attr('src');
                        var prevSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prev().find('h2.et_pb_slide_title').text();
                        $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                        $('.coco_sleek_person_module .prev_post_title').text(prevSlideTitleClick);

                    }else{
                        var prevSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');
                        var prevSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();
                        $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                        $('.coco_sleek_person_module .prev_post_title').text(prevSlideTitleClick);

                    }
                    var nextSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_image img').attr('src');
                    var nextSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-moved-slide').find('h2.et_pb_slide_title').text();
                    $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                    $('.coco_sleek_person_module .next_post_title').text(nextSlideTitleClick);

                }, 0)

            });


            $('.coco_sleek_person_module .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCount = $('.coco_sleek_person_module .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

                    $('.coco_sleek_person_module .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 200);

            });


        }
    }, timeOutCocoPerson);

    setInterval(function () {

        if ($('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
            var nextSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
            var nextSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text();
            $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
            $('.coco_sleek_person_module .next_post_title').text(nextSlideTitleClick);

        }else{
            var nextSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
            var nextSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();
            $('.coco_sleek_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
            $('.coco_sleek_person_module .next_post_title').text(nextSlideTitleClick);

        }






        if ($('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
            var prevSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_image img').attr('src');
            var prevSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et-pb-active-slide').prev().find('h2.et_pb_slide_title').text();
            $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url(' + prevSlideImageClick + ')');
            $('.coco_sleek_person_module .prev_post_title').text(prevSlideTitleClick);

        } else {
            var prevSlideImageClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');
            var prevSlideTitleClick = $('.coco_sleek_person_module .et_pb_slider .et_pb_slide:last-child').find('h2.et_pb_slide_title').text();
            $('.coco_sleek_person_module .prev_post_image').css('background-image', 'url(' + prevSlideImageClick + ')');
            $('.coco_sleek_person_module .prev_post_title').text(prevSlideTitleClick);

        }


        var showTestimonialsCount = 1;
        var showSlideItemsCount = $('.coco_sleek_person_module .et_pb_slide.et-pb-active-slide').prevAll().length + showTestimonialsCount;

        $('.coco_sleek_person_module .slider_number .slider_active_number').text('0' + showSlideItemsCount);
    },50)



})(jQuery);