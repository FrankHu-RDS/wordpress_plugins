(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialGirl = 1500;

    if (isIE()) {
        tinaTestimonialGirl = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialGirl = 10000;
    }

    setTimeout(function () {
        if($('.tina_girl_testimonial ').length !== 0){


            $('.tina_girl_testimonial .girl_testimonial_arr').each(function () {
                $(this).html('<span></span>')
            })

            var showItemsCount = 2;

            if($(window).width() <= 767){
                showItemsCount = 1;
            }

            var rowWidth = $('.tina_girl_testimonial .girl_testimonial_slider_row').width();
            var slidesCount = $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial').length;
            var slidesMarginRight = $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial').css('margin-right');
            slidesMarginRight = parseInt(slidesMarginRight, 10);

            var slideWidth = (rowWidth - slidesMarginRight)/showItemsCount;

            $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial ').outerWidth(slideWidth);
            $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_column ').css('cssText', 'width: '+ (((slideWidth+slidesMarginRight)*slidesCount) + 10) +'px !important;');

            $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial:first-child').addClass('active_item');

            //Right arrow click
            $('.tina_girl_testimonial .girl_testimonial_arr_right').on('click',function(e) {
                e.preventDefault();
                if($('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').nextAll().length >= showItemsCount){
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').removeClass('active_item').next().addClass('active_item');
                }else{
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').removeClass('active_item');
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial:first-child').addClass('active_item');
                }

            });

            //Left arrow click
            $('.tina_girl_testimonial .girl_testimonial_arr_left').on('click',function(e) {
                e.preventDefault();
                if($('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').prev().length !== 0){
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').removeClass('active_item').prev().addClass('active_item');
                }else{
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').removeClass('active_item');
                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial:nth-last-child('+ showItemsCount +')').addClass('active_item');
                }

            });


            $('.tina_girl_testimonial .girl_testimonial_arr').on('click',function(e) {

                setTimeout(function () {
                    var activeItemPrevElCounts =  $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial.active_item').prevAll().length;

                    $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_column').css('transform', 'translateX(-' + activeItemPrevElCounts*(slidesMarginRight+slideWidth) + 'px)');
                },50)

            });





            var testimonialHeight = 0;
            $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial').each(function () {
                if(testimonialHeight < $(this).outerHeight()){
                    testimonialHeight = $(this).outerHeight()
                }
            })

            $('.tina_girl_testimonial .girl_testimonial_slider_row .et_pb_testimonial').outerHeight(testimonialHeight)
        }

    }, tinaTestimonialGirl);

})(jQuery);