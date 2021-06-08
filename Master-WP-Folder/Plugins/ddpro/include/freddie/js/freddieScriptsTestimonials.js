(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieTestimonialsTimeOut = 0;

    if (isIE()) {
        freddieTestimonialsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieTestimonialsTimeOut = 10000;
    }

    setTimeout(function () {



        $('.freddie_hammer_to_fall_testimonals .et_pb_blurb').each(function () {
            $(this).find('.et_pb_main_blurb_image').prepend('<div class="image_overlay"></div>');
        })





        if ($('.freddie_hammer_to_fall_testimonals').length !== 0) {
            var splitFunContentH = new SplitText(".freddie_hammer_to_fall_testimonals .et_pb_blurb_container h4", {
                type: "words,chars",
                charsClass: "char char++",
                position: "reletive"
            });



            function PageTransitionContents() {
                var scrollTopSize = $(window).scrollTop();
                var documentHeight = $(window).height();


                $('.freddie_hammer_to_fall_testimonals .et_pb_blurb').each(function () {
                    var funContentTop = $(this).offset().top;
                    var funContentPadding = $(this).css('padding-top').replace('px', '');
                    var funContentHeight = $(this).outerHeight();

                    var elementTopSize = parseInt(funContentTop) + parseInt(funContentPadding);
                    var elementEndTopSize = funContentTop + (funContentHeight / 2);


                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= elementTopSize + 210 && scrollTopSize <= elementEndTopSize) {
                        $(this).addClass('visible');


                        var charsContentH = $(this).find('h4.et_pb_module_header .char').toArray();
                        var t1 = new TimelineLite;
                        var t12 = new TimelineLite;
                        var t13 = new TimelineLite;
                        var t14 = new TimelineLite;
                        t1.to($(this).find('.image_overlay'), 1.5, {
                            height: 0,
                            ease: Circ.easeOut
                        }, 0)
                        t12.to($(this), 2, {
                            opacity: 1,
                            x: 0,
                            y: 0,
                            ease: Circ.easeOut
                        }, 0)
                        t13.staggerTo(charsContentH, 1, {
                            x: 0,
                            y: 0,
                            opacity: 1,
                            ease: Circ.easeOut
                        }, .03);


                    }
                })

                $('.freddie_hammer_to_fall_testimonals .et_pb_testimonial').each(function () {
                    var funContentTop = $(this).offset().top;
                    var funContentPadding = $(this).css('padding-top').replace('px', '');
                    var funContentHeight = $(this).outerHeight();

                    var elementTopSize = parseInt(funContentTop) + parseInt(funContentPadding);
                    var elementEndTopSize = funContentTop + (funContentHeight / 2);

                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= elementTopSize + 210 && scrollTopSize <= elementEndTopSize) {
                        $(this).addClass('visible');


                        var t1Testimonials = new TimelineLite;
                        t1Testimonials.to($(this).find('.et_pb_testimonial_portrait'), 1, {
                            opacity: 1,
                            x: 0,
                            y: 0,
                            ease: Circ.easeOut
                        }, 0)
                        .to($(this), 1.5, {
                            opacity: 1,
                            x: 0,
                            y: 0,
                            ease: Circ.easeOut
                        }, 0)


                    }
                })


            }

            $(window).scroll(function () {

                PageTransitionContents();

            })


            if($('body').hasClass('os-host')){
                var instance = OverlayScrollbars($("body"), {
                    callbacks : {
                        onScroll : function() { PageTransitionContents(); }
                    }
                });
            }
        }



    //    Freddie Close To Pleasure Testimonials


        if($('.freddie_close_to_pleasure_testimonials').length !== 0){
            $('.freddie_close_to_pleasure_testimonials .et_pb_promo ').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            })


            setTimeout(function () {
                var firstTestimonialsHeight = 0;
                var promoHeight = $('.freddie_close_to_pleasure_testimonials .et_pb_promo').outerHeight();
                $('.freddie_close_to_pleasure_testimonials .first_col .et_pb_testimonial').each(function () {
                    firstTestimonialsHeight += $(this).outerHeight();
                })

                if(promoHeight > firstTestimonialsHeight){
                    $('.freddie_close_to_pleasure_testimonials .first_col .et_pb_testimonial:first-child').css('margin-bottom', promoHeight - firstTestimonialsHeight);
                }


                var lastTestimonialsHeight = 0;
                $('.freddie_close_to_pleasure_testimonials .last_col .et_pb_testimonial').each(function () {
                    lastTestimonialsHeight += $(this).outerHeight();
                })

                if(promoHeight > lastTestimonialsHeight){
                    $('.freddie_close_to_pleasure_testimonials .last_col .et_pb_testimonial:first-child').css('margin-bottom', promoHeight - lastTestimonialsHeight);
                }
            },1500)

        }

        // Freddie Frutti testimonial


        if($('.freddie_frutti_testimonial').length !== 0){
            setTimeout(function () {
                var promoHeight = $('.freddie_frutti_testimonial .et_pb_promo ').outerHeight() - 4;
                $('#page-container .freddie_frutti_testimonial .et_pb_slider .et_pb_slide .et_pb_slide_description').css('margin-top', promoHeight + 'px')

            $('#page-container .freddie_frutti_testimonial .et_pb_slider .et_pb_slide ').each(function () {
                $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            });

            $('#page-container .freddie_frutti_testimonial .et_pb_slider .et-pb-slider-arrows').prepend($('<span class="number">01</span>'));

            var prevText = $('#page-container .freddie_frutti_testimonial .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text();
            $('#page-container .freddie_frutti_testimonial .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text(prevText.replace('ious', ''))
            $('.freddie_frutti_testimonial .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();
                setTimeout(function () {
                    var prevElemLengts = $('.freddie_frutti_testimonial .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    if (prevElemLengts < 10) {
                        prevElemLengts = "0" + prevElemLengts;
                    }
                    $('.freddie_frutti_testimonial .et-pb-slider-arrows span.number').text(prevElemLengts);

                }, 50)
            })


                if($('.freddie_frutti_testimonial .et_pb_slider').hasClass('et_slider_auto')){
                    setInterval(function () {
                        var showSlideItemsCount = $('.freddie_frutti_testimonial .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                        if (showSlideItemsCount <= 9) {
                            $('.freddie_frutti_testimonial .et-pb-slider-arrows span.number').text("0" + showSlideItemsCount);
                        } else {
                            $('.freddie_frutti_testimonial .et-pb-slider-arrows span.number').text(showSlideItemsCount);
                        }
                    },100)
                }
            },2000)
        }



    }, freddieTestimonialsTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);