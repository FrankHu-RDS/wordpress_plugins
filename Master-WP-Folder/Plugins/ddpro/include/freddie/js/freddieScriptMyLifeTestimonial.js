(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieScriptMyLifeTestimonial = 2000;

    if (isIE()) {
        freddieScriptMyLifeTestimonial = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieScriptMyLifeTestimonial = 10000;
    }

    setTimeout(function () {
        if($('.freddie_my_life_testimonial ').length !== 0){
               $('.freddie_my_life_testimonial_popup .et_pb_blurb ').each(function () {
                   $('<span class="freddie_popup_close_icon">Q</span>').appendTo($(this))
               })


            $('.freddie_my_life_testimonial .et_pb_image, .freddie_my_life_testimonial .et_pb_button ').on('click', function (e) {
                e.preventDefault();
                var rowId = $(this).closest('.et_pb_row').attr('id');
                $('.freddie_my_life_testimonial_popup').each(function () {
                    if($(this).attr('id') === rowId){
                        $('.freddie_my_life_testimonial_popup').removeClass('show');
                        $(this).addClass('show');
                    }
                })
            });

            $('.freddie_my_life_testimonial_popup .et_pb_blurb .freddie_popup_close_icon').on('click', function () {
                $('.freddie_my_life_testimonial_popup').removeClass('show');
            })



            if($(window).width() <= 767){
                $('.freddie_my_life_testimonial .testimonials_image_left').each(function () {
                    $(this).find('.image').insertAfter( $(this).find('.text'))
                })
            }
        }


    }, freddieScriptMyLifeTestimonial);

})(jQuery);