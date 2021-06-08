(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieSlidersTimeOut = 2000;

    if (isIE()) {
        freddieSlidersTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieSlidersTimeOut = 10000;
    }

    setTimeout(function () {
        if ($('.freddie_gimme_some_lovin_slider ').length !== 0) {

            $('<div class="slide_line_arrows"><span class="number number_first">01</span><div class="slide_line"><div class="slide_inline_line"></div></div><span class="number number_last"></span></div>').insertAfter($('.freddie_gimme_some_lovin_slider .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-prev'));
            $('.freddie_gimme_some_lovin_slider .et-pb-slider-arrows a').prepend($(' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))


            $('.freddie_gimme_some_lovin_slider ').each(function () {
                var thisItem = $(this);

                var slidesCount = thisItem.find('.et_pb_slide').length;
                if (slidesCount <= 9) {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text("0" + slidesCount);
                } else {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text(slidesCount);
                }


                var textHeigth = thisItem.find('.et_pb_text').outerHeight();
                var promoHeigth = thisItem.find('.et_pb_promo').outerHeight();
                var leftSize = thisItem.find('.et_pb_column_2_5').css('padding-left');
                var topSize = thisItem.find('.et_pb_column_2_5').css('padding-top');
                var leftSize = parseInt(leftSize, 10);
                var topSize = parseInt(topSize, 10);
                thisItem.find('.et-pb-slider-arrows ').css('left', leftSize);
                thisItem.find('.et-pb-slider-arrows ').css('top', textHeigth + promoHeigth + topSize + 38);


                $('<div class="slide_next_image"></div>').insertAfter($(this).find(".et_pb_slider"));

                var slidesCount = 1;
                $(this).find('.et_pb_slide ').each(function () {
                    $('<div class="slide_number"></div>').insertBefore($(this).find('.et_pb_slide_image'));

                    if (slidesCount <= 9) {
                        $(this).find('.slide_number').text("0" + slidesCount);
                    } else {
                        $(this).find('.slide_number').text(slidesCount);
                    }

                    slidesCount = slidesCount + 1;

                    var nextImage = $(this).find('.et_pb_slide_image img').attr('src');
                    $('<img class="next_image" src="' + nextImage + '">').appendTo($(this).closest('.et_pb_slider').next('.slide_next_image'));
                })


                var prevElements = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                $(this).find('.slide_next_image img:nth-child(' + (prevElements + 2) + ')').addClass('active');


                if ($(this).find('.et_pb_slider').hasClass('et_slider_auto')) {
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
                    var thistl = this;
                    thistl.tl = new TimelineLite();
                    thistl.tl.fromTo(thisS.find(".slide_inline_line"), slideTransition2, {
                        width: 0
                    }, {
                        width: "100%",
                        ease: Power3.easeInOut
                    }, 0)

                    thistl.tl.play();

                    setInterval(function () {

                        thistl.tl2 = new TimelineLite();
                        thistl.tl2.fromTo(thisS.find(".slide_inline_line"), slideTransition2, {
                            width: 0
                        }, {
                            width: "100%",
                            ease: Power3.easeInOut
                        }, 0)

                        thistl.tl2.play();
                    }, slideTransition)

                    setInterval(function () {
                        var prevElementsCount = thisS.find('.et_pb_slide.et-pb-active-slide').prevAll().length + 1;
                        if (thisS.find('.et_pb_slide.et-pb-active-slide').nextAll().length !== 0) {
                            prevElementsLength = thisS.find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        } else {
                            prevElementsLength = -1;
                        }

                        if (prevElementsCount <= 9) {
                            prevElementsCount = "0" + prevElementsCount
                        }

                        thisS.find('.et-pb-slider-arrows .number.number_first').text(prevElementsCount);
                        thisS.find('.slide_next_image img').removeClass('active');
                        thisS.find('.slide_next_image img:nth-child(' + (prevElementsLength + 2) + ')').addClass('active');
                    }, 50)
                }


            })


            $('.freddie_gimme_some_lovin_slider .et_pb_slider .et-pb-slider-arrows a').on("click", function () {
                var thisA = $(this).closest('.et_pb_slider');
                setTimeout(function () {
                    var prevElementsCount = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length + 1;
                    if (thisA.find('.et-pb-active-slide').nextAll().length !== 0) {
                        var prevElementsLength = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                    } else {
                        var prevElementsLength = -1;
                    }

                    if (prevElementsCount <= 9) {
                        prevElementsCount = "0" + prevElementsCount
                    }

                    thisA.find('.et-pb-slider-arrows .number.number_first').text(prevElementsCount);
                    thisA.next('.slide_next_image').find('img').removeClass('active');
                    thisA.next('.slide_next_image').find(' img:nth-child(' + (prevElementsLength + 2) + ')').addClass('active');


                    var tl = new TimelineLite();
                    tl.fromTo(thisA.find(".slide_inline_line"), 0.8, {
                        width: 0
                    }, {
                        width: "100%",
                        ease: Power3.easeInOut
                    }, 0)


                }, 50)
            })


            TweenMax.set('.freddie_gimme_some_lovin_slider .et_pb_slider .et-pb-slider-arrows a .circle__progress', {drawSVG: '82%'});
            $('.freddie_gimme_some_lovin_slider .et_pb_slider .et-pb-slider-arrows a').hover(
                function () {
                    var thisTl = this;
                    thisTl.tl = new TimelineLite();
                    thisTl.tl
                        .to($(this).find(".circle__progress"), 0.5, {
                            drawSVG: "100%",
                            ease: Power3.easeInOut
                        }, 0)


                    thisTl.tl.play();
                }, function () {
                    var thisTl = this;
                    thisTl.tl.reverse();
                }
            )


        }

        // Freddie Back Chat Slider

        if ($('.freddie_back_chat_slider').length !== 0) {
            var slideItemsCount = $('.freddie_back_chat_slider .et_pb_slide').length;

            if (slideItemsCount <= 9) {
                slideItemsCount = "0" + slideItemsCount;
            }

            $('.freddie_back_chat_slider .et-pb-slider-arrows').prepend($('<div class="slider_number"><span class="slider_items_count">01</span>/<span>' + slideItemsCount + '</span></div>'));


            $('.freddie_back_chat_slider .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();


                setTimeout(function () {
                    var showSlideItemsCount = $('.freddie_back_chat_slider .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                    if (showSlideItemsCount <= 9) {
                        $('.freddie_back_chat_slider .slider_number .slider_items_count').text("0" + showSlideItemsCount);
                    } else {
                        $('.freddie_back_chat_slider .slider_number .slider_items_count').text(showSlideItemsCount);
                    }
                }, 50)


            });


            if ($(window).width() <= 1391) {
                var imageHeight = $('.freddie_back_chat_slider .et_pb_slide_image').height();
                $('.freddie_back_chat_slider .et_pb_slider .et-pb-slider-arrows').css('top', imageHeight + 30 + 'px')
            }

            if($('.freddie_back_chat_slider .et_pb_slider').hasClass('et_slider_auto')){
                setInterval(function () {
                    var showSlideItemsCount = $('.freddie_back_chat_slider .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                    if (showSlideItemsCount <= 9) {
                        $('.freddie_back_chat_slider .slider_number .slider_items_count').text("0" + showSlideItemsCount);
                    } else {
                        $('.freddie_back_chat_slider .slider_number .slider_items_count').text(showSlideItemsCount);
                    }
                },100)
            }

        }


        //    Freddie Love You slider


        if ($('.freddie_love_you_slider').length !== 0) {


            var showItemsCount = 8;

            if ($(window).width() <= 980) {
                showItemsCount = 6;
            }

            if ($(window).width() <= 767) {
                showItemsCount = 4;
            }

            if ($(window).width() <= 480) {
                showItemsCount = 2;
            }


            var sliderWidth = $('.freddie_love_you_slider .et_pb_slider').width();
            var slidesCount = $('.freddie_love_you_slider .et_pb_slider .et_pb_slide').length;
            var slidesWidth = sliderWidth / showItemsCount;
            var sliderContainerWidth = slidesCount * slidesWidth;


            $('.freddie_love_you_slider .et_pb_slider .et_pb_slide').width(slidesWidth);
            $('.freddie_love_you_slider .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
            $('.freddie_love_you_slider .et_pb_slider .et_pb_slides .et_pb_slide:first-child').addClass('active_slide');


            $('.freddie_love_you_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length >= showItemsCount) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide');
                    }
                }, 50)
            })

            $('.freddie_love_you_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length !== 0) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-last-child('+ showItemsCount +')').addClass('active_slide');
                    }
                }, 50)
            })


            $('.freddie_love_you_slider .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {

                    var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                }, 50)


            })


        }

        if($('.freddie_love_you_slider .et_pb_slider').hasClass('et_slider_auto')){
            // sd=parseInt(sd);
            var arrClasses = [];
            $(".freddie_love_you_slider .et_pb_slider[class*='et_slider_speed_']").removeClass(function () {
                var className = this.className.match(/et_slider_speed_\d+/);
                if (className) {
                    arrClasses.push(className[0]); //if it is the one then push it to array
                    return className[0]; //return it for removal
                }
            });
            var className = arrClasses[0];
            className = className.replace(/[^\d]+/, '');

            setInterval(function () {
                if ($('.freddie_love_you_slider .et_pb_slider .et_pb_slide.active_slide').nextAll().length >= showItemsCount) {
                    $('.freddie_love_you_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                }else{
                    $('.freddie_love_you_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide');
                    $('.freddie_love_you_slider .et_pb_slider .et_pb_slide:first-child').addClass('active_slide');
                }

                var slideBeforeItems = $('.freddie_love_you_slider .et_pb_slider .et_pb_slide.active_slide').prevAll().length;
                $('.freddie_love_you_slider .et_pb_slider .et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
            },className)
        }


    }, freddieSlidersTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);