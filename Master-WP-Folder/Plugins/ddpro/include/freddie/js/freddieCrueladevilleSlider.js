(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var crueladevilleSlider = 1500;

    if (isIE()) {
        crueladevilleSlider = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        crueladevilleSlider = 10000;
    }

    setTimeout(function () {
        if($('.freddie_crueladeville_slider').length !== 0){
            $('<div class="slide_line_arrows"><span class="number number_first">01</span><div class="slide_line"><div class="slide_inline_line"></div></div><span class="number number_last"></span></div>').insertAfter($('.freddie_crueladeville_slider .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-prev'));
            $('.freddie_crueladeville_slider .et-pb-slider-arrows a').prepend($(' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))




            var showItemsCount = 3;

            if ($(window).width() <= 980) {
                showItemsCount = 2;
            }

            if ($(window).width() <= 767) {
                showItemsCount = 1;
            }

            $('.freddie_crueladeville_slider ').each(function () {
                var thisItem = $(this);

                var slidesCount = thisItem.find('.et_pb_slide').length - (showItemsCount - 1);
                if (slidesCount <= 9) {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text("0" + slidesCount);
                } else {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text(slidesCount);
                }
            })


            var sliderWidth = $('.freddie_crueladeville_slider .et_pb_slider').width();
            var slidesCount = $('.freddie_crueladeville_slider .et_pb_slider .et_pb_slide').length;
            var slidesWidth = sliderWidth / showItemsCount;
            var sliderContainerWidth = slidesCount * slidesWidth;


            $('.freddie_crueladeville_slider .et_pb_slider .et_pb_slide').width(slidesWidth);
            $('.freddie_crueladeville_slider .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
            $('.freddie_crueladeville_slider .et_pb_slider .et_pb_slides .et_pb_slide:first-child').addClass('active_slide');


            $('.freddie_crueladeville_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
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

            $('.freddie_crueladeville_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
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



            $('.freddie_crueladeville_slider .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();

                var thisA = $(this).closest('.et_pb_slider');

                var thisArrow = $(this);

                setTimeout(function () {
                    var prevElementsCount = thisA.find('.et_pb_slide.active_slide').prevAll().length + 1;

                    if (prevElementsCount <= 9) {
                        prevElementsCount = "0" + prevElementsCount
                    }

                    thisA.find('.et-pb-slider-arrows .number.number_first').text(prevElementsCount);



                    var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                }, 50)


            })

            TweenMax.set('.freddie_crueladeville_slider .et_pb_slider .et-pb-slider-arrows a .circle__progress', {drawSVG: '82%'});
            $('.freddie_crueladeville_slider .et_pb_slider .et-pb-slider-arrows a').hover(
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

    }, crueladevilleSlider);

})(jQuery);