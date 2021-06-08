(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTestimonialIgot = 1500;

    if (isIE()) {
        tinaTestimonialIgot = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTestimonialIgot = 10000;
    }

    setTimeout(function () {
        if ($('.tina_testimonial_i_got ').length !== 0) {
            var descHeight = 0;
            $('.tina_testimonial_i_got .et_pb_testimonial').each(function () {
                if($(this).find('.et_pb_testimonial_description_inner').height() > descHeight){
                    descHeight = $(this).find('.et_pb_testimonial_description_inner').height()
                }
            })

            $('.tina_testimonial_i_got .et_pb_testimonial .et_pb_testimonial_description_inner').height(descHeight)

            $('.tina_testimonial_i_got .et_pb_button_module_wrapper .et_pb_button').each(function () {
                $('<div class="arrow"></div>').appendTo($(this))
            });
        }

    }, tinaTestimonialIgot);

})(jQuery);