(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieLetMeHeaderTimeOut = 1000;

    if (isIE()) {
        freddieLetMeHeaderTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieLetMeHeaderTimeOut = 10000;
    }

    setTimeout(function () {


        if($('.freddie_let_me_header').length !== 0){
            var slidesCount = $('.freddie_let_me_header .et_pb_slide').length;
            if(slidesCount <= 9){
                slidesCount = '0' + slidesCount;
            }

           $('<div class="slider_numbers"><span class="slides_number">'+ slidesCount +'</span><span class="avtive_slide_number">01</span></div>').insertAfter($('.freddie_let_me_header .et-pb-slider-arrows'))




            for (var i = 1; i <= 10; i++) {
                $('<div class="image_box image_box_' + i + '"></div>').appendTo($('.freddie_let_me_header .et_pb_slide_image'))
            }

            $('.freddie_let_me_header .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                var slideImage = $(this).find('.et_pb_slide_image img').attr('src');
                $('<img src="' + slideImage + '">').appendTo($(this).find('.image_box'))

            })

            $('.freddie_let_me_header .et_pb_slider .et-pb-slider-arrows a').on('click', function () {

                // var thisItem = $(this);

                setTimeout(function () {
                    var prevElemetsCount = $('.freddie_let_me_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                    if(prevElemetsCount <= 9){
                        prevElemetsCount = '0' + prevElemetsCount;
                    }
                    $('.freddie_let_me_header .et_pb_slider .slider_numbers .avtive_slide_number').text(prevElemetsCount)
                },50)


            })
        }





    }, freddieLetMeHeaderTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);