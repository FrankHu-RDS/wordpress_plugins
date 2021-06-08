(function ($) {
    var timeOutSigmundTestimonials = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutSigmundTestimonials = 10000;
    }

    setTimeout(function () {
        $('.Rated_testimonials .et_pb_testimonial ').each(function () {
            $(this).find('.et_pb_testimonial_description_inner').prepend($(this).find('.et_pb_testimonial_meta'));
            $(this).find('.et_pb_testimonial_description_inner').prepend($(this).find('.et_pb_testimonial_author'));

        });


        $('.sigmund_tailored_testimonails .et_pb_testimonial ').each(function () {
            $(this).find('.et_pb_testimonial_portrait').insertBefore($(this).find('.et_pb_testimonial_author'));

        });

        $('.sigmund_pricing1_testimnoials .et_pb_testimonial ').each(function () {
            $(this).find('.et_pb_testimonial_portrait').insertBefore($(this).find('.et_pb_testimonial_author'));

        });



        if ($('.sigmund_home2_testimonial').length !== 0) {
            var tabImage = $('.sigmund_home2_testimonial .et_pb_testimonial .et_pb_testimonial_portrait').css('background-image');
            var tabtriangelImage = $('.sigmund_home2_testimonial .et_pb_testimonial').css('background-image');
            tabImage = tabImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            tabtriangelImage = tabtriangelImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");

            $('<div class="right_content"><img class="bg_image" src="' + tabtriangelImage + '"><div class="tab_image"><img src="' + tabImage + '"></div></div>').appendTo($('.sigmund_home2_testimonial .et_pb_testimonial .et_pb_testimonial_portrait'));
            $('.sigmund_home2_testimonial .et_pb_testimonial .et_pb_testimonial_portrait').css('background-image', 'none');
            $('.sigmund_home2_testimonial .et_pb_testimonial').css('background-image', 'none');
        }



    }, timeOutSigmundTestimonials)


})(jQuery);