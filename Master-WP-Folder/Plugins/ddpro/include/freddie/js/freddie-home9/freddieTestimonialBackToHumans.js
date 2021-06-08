(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarContentPage10 = 1500;

    if (isIE()) {
        tinaSidebarContentPage10 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarContentPage10 = 10000;
    }

    setTimeout(function () {
        if($('.freddie_testimonial_back_to_humans').length !== 0){
            var classCountC = "1";
            $('.freddie_testimonial_back_to_humans  .et_pb_slide').each(function () {
                var attrText = $(this).find('.et_pb_slide_image img').attr('src');
                $('.freddie_testimonial_back_to_humans .et-pb-controllers a:nth-child(' + classCountC + ')').text('');
                $('<img src="'+ attrText +'">').appendTo($('.freddie_testimonial_back_to_humans .et-pb-controllers a:nth-child(' + classCountC + ')'))
                classCountC++;


                $(this).find('.et_pb_slide_image').css('background-image', 'url('+ $(this).find('.et_pb_slide_image img').attr('src') +')')
                $(this).find('.et_pb_slide_image img').remove();
            });




            var controllsSize = 80;

            if($(window).width() <= 980){
                controllsSize = 40;
            }


            $('<div class="inner_controller"></div>').appendTo($('.freddie_testimonial_back_to_humans .et_pb_slider .et-pb-controllers'))

            var wrapWidth = $('.freddie_testimonial_back_to_humans .et_pb_slider .et_pb_slide_description').css('padding-bottom');
            var wrapWidth = parseInt(wrapWidth, 10) - controllsSize;
            var imagesCount = $('.freddie_testimonial_back_to_humans .et_pb_slider .et-pb-controllers a').length;


            $('.freddie_testimonial_back_to_humans .et_pb_slider .et-pb-controllers').width(wrapWidth);

            wrapWidth =  $('.freddie_testimonial_back_to_humans .et_pb_slider .et-pb-controllers').width();
            $('.freddie_testimonial_back_to_humans .et_pb_slider .et-pb-controllers .inner_controller').width(imagesCount*(wrapWidth/3));


            $('.freddie_testimonial_back_to_humans .et-pb-controllers a').each(function () {
                $(this).appendTo($(this).closest('.et-pb-controllers').find('.inner_controller'))
                $(this).outerWidth((wrapWidth/3)-14)
                $(this).outerHeight((wrapWidth/3)-14)
            })


            var descriptionHeight = 0;
            $('.freddie_testimonial_back_to_humans  .et_pb_slide').each(function () {
                if($(this).find('.et_pb_slide_description').outerHeight() > descriptionHeight){
                    descriptionHeight = $(this).find('.et_pb_slide_description').outerHeight()
                }
            })

            $('.freddie_testimonial_back_to_humans  .et_pb_slide .et_pb_slide_description').outerHeight(descriptionHeight);

            $('.freddie_testimonial_back_to_humans .et-pb-controllers a').on('click', function () {
                var thisControl = $(this);
                setTimeout(function () {
                    var prevSlidesCount = thisControl.prevAll('a').length;

                    if(prevSlidesCount === 1 || prevSlidesCount === 0){
                        $('.freddie_testimonial_back_to_humans .et_pb_slider .inner_controller').css('transform', 'translate(0px, 0px)')
                    }else if(thisControl.nextAll('a').length !== 0){
                        $('.freddie_testimonial_back_to_humans .et_pb_slider .inner_controller').css('transform', 'translate(-'+ (prevSlidesCount-1)*(wrapWidth/3) +'px, 0px)')
                    }


                },50)
            })
        }

    }, tinaSidebarContentPage10);

})(jQuery);