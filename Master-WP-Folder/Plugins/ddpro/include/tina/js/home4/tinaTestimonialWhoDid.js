(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialWhoDid = 3000;

    if (isIE()) {
        tinaTestimonialWhoDid = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialWhoDid = 10000;
    }

    setTimeout(function () {
        if ($('.tina_who_did_testimonial').length !== 0) {
            $('.tina_who_did_testimonial .et_pb_slider .et_pb_slide').each(function () {
                $(this).find('h2.et_pb_slide_title').insertBefore($(this).find('.et_pb_button_wrapper'))
            })

            var showTestimonialsCount = 1;
            var showTestimonialsCount2 = $('.tina_who_did_testimonial .et_pb_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">' + showTestimonialsCount + '</span><span>/</span><span>' + showTestimonialsCount2 + '</span></div>').insertBefore($('.tina_who_did_testimonial .et_pb_slider .et-pb-slider-arrows'));


            $('.tina_who_did_testimonial .et_pb_slider .et_pb_slide:first-child').addClass('active_slide')


            $('.tina_who_did_testimonial .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (event) {
                var thisItem = $(this);
                setTimeout(function () {
                    if (thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').next().length !== 0) {
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide')
                    } else {
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide')
                    }
                }, 200)
            })

            $('.tina_who_did_testimonial .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (event) {
                var thisItem = $(this);
                setTimeout(function () {
                    if (thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prev().length !== 0) {
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev('.et_pb_slide').addClass('active_slide')
                    } else {
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                        thisItem.closest('.et_pb_slider').find('.et_pb_slide:last-child').addClass('active_slide')
                    }
                }, 200)
            })

            $('.tina_who_did_testimonial .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCount = $('.tina_who_did_testimonial .et_pb_slide.active_slide').prevAll().length + showTestimonialsCount;

                    $('.tina_who_did_testimonial .slider_number .slider_active_number').text(showSlideItemsCount);

                }, 200);

            });


            $('.tina_who_did_testimonial .et_pb_slider .slider_number').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))


            if ($('.tina_who_did_testimonial .et_pb_slider').hasClass('et_slider_auto')) {
                var thisS = $(this);
                var prevElementsLength;
                var check = "et_slider_speed_";
                var slideTransition;
                $('[class^="et_slider_speed_"], [class*=" et_slider_speed_"]').each(function () {
                    // Get array of class names
                    var cls = $(this).attr('class').split(' ');
                    for (var i = 0; i < cls.length; i++) {

                        if (cls[i].indexOf(check) > -1) {
                            slideTransition = cls[i].slice(check.length, cls[i].length);

                        }
                    }
                });
                slideTransition2 = slideTransition / 1000;


                TweenMax.set('.tina_who_did_testimonial .et_pb_slider .circle__progress', {drawSVG: '0%'});
                var tlCircleFirst = new TimelineLite();
                tlCircleFirst.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), (slideTransition2 * 70) / 100, {
                    drawSVG: "0%"
                }, {
                    drawSVG: "0 100%",
                    ease: Linear.easeNone
                });

                setTimeout(function () {

                    if ($('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').next().length !== 0) {
                        $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide')
                    } else {
                        $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                        $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide')
                    }

                    var showSlideItemsCount = $('.tina_who_did_testimonial .et_pb_slide.active_slide').prevAll().length + showTestimonialsCount;
                    $('.tina_who_did_testimonial .slider_number .slider_active_number').text(showSlideItemsCount);

                    var percentageComplete = 1;
                    var tlCircle = new TimelineLite();
                    tlCircle.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), (slideTransition2 * 30) / 100, {
                        drawSVG: "100%"
                    }, {
                        drawSVG: "0 0%",
                        ease: Linear.easeNone
                    });
                }, (slideTransition * 70) / 100)

                function sliderInterval() {

                    var tlCircle = new TimelineLite();
                    tlCircle.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), (slideTransition2 * 70) / 100, {
                        drawSVG: "0%"
                    }, {
                        drawSVG: "0 100%",
                        ease: Linear.easeNone
                    });


                    setTimeout(function () {


                        if ($('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').next().length !== 0) {
                            $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide')
                        } else {
                            $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                            $('.tina_who_did_testimonial .et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide')
                        }

                        var showSlideItemsCount = $('.tina_who_did_testimonial .et_pb_slide.active_slide').prevAll().length + showTestimonialsCount;
                        $('.tina_who_did_testimonial .slider_number .slider_active_number').text(showSlideItemsCount);

                        var percentageComplete = 1;
                        var tlCircle = new TimelineLite();
                        tlCircle.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), (slideTransition2 * 30) / 100, {
                            drawSVG: "100%"
                        }, {
                            drawSVG: "0 0%",
                            ease: Linear.easeNone
                        });

                    }, (slideTransition * 70) / 100)


                }


                var myTimer = setInterval(sliderInterval, slideTransition);




                $('.tina_who_did_testimonial .et-pb-slider-arrows a').on('click', function (event) {
                    clearInterval(myTimer);
                        myTimer = setInterval(sliderInterval, slideTransition);

                })

            }else{
                $('.tina_who_did_testimonial .et-pb-slider-arrows a').on('click', function (event) {
                    var tlCircle = new TimelineLite();
                    tlCircle.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), 0.4, {
                        drawSVG: "100%"
                    }, {
                        drawSVG: "0 0%",
                        ease: Linear.easeNone
                    });


                    setTimeout(function () {
                        var tlCircleFirst = new TimelineLite();
                        tlCircleFirst.fromTo($(".tina_who_did_testimonial .et_pb_slider .circle__progress"), 0.4, {
                            drawSVG: "0%"
                        }, {
                            drawSVG: "0 100%",
                            ease: Linear.easeNone
                        });
                    }, 400)
                })
            }



        }

    }, tinaTestimonialWhoDid);

})(jQuery);