(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialFinestGirl = 1500;

    if (isIE()) {
        tinaTestimonialFinestGirl = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialFinestGirl = 10000;
    }

    setTimeout(function () {
        if($('.tina_testimonial_finest_girl').length !== 0){



            var showItemsCount = 3;

            // if ($(window).width() <= 980) {
            //     showItemsCount = 2;
            // }
            //
            // if ($(window).width() <= 767) {
            //     showItemsCount = 1;
            // }


            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide').each(function (){
                $(this).find('.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            })
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:last-child').clone().insertBefore( $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:first-child'));
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:nth-child(2)').clone().insertAfter( $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:last-child'));


            var sliderWidth = $('.tina_testimonial_finest_girl .et_pb_slider').width();
            var slidesCount = $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slide').length;
            var slidesWidth = sliderWidth / showItemsCount;
            var sliderContainerWidth = slidesCount * slidesWidth;




            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slide').width(slidesWidth);
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:nth-child(1)').addClass('arround_slide');
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:nth-child(3)').addClass('arround_slide');
            $('.tina_testimonial_finest_girl .et_pb_slider .et_pb_slides .et_pb_slide:nth-child(2)').addClass('active_slide');


            $('.tina_testimonial_finest_girl .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length >= 2) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-child(2)').addClass('active_slide');
                    }
                }, 50)
            })

            $('.tina_testimonial_finest_girl .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length >= 2) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-last-child('+ (showItemsCount-1) +')').addClass('active_slide');
                    }
                }, 50)
            })



            $('.tina_testimonial_finest_girl .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();

                var thisA = $(this).closest('.et_pb_slider');

                var thisArrow = $(this);

                setTimeout(function () {
                    var prevElementsCount = thisA.find('.et_pb_slide.active_slide').prevAll().length + 1;


                    thisArrow.closest('.et_pb_slider').find('.et_pb_slide').removeClass('arround_slide');
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prev().addClass('arround_slide');
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').next().addClass('arround_slide');


                    var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length - 1;
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                }, 50)


            })


        }

    }, tinaTestimonialFinestGirl);

})(jQuery);