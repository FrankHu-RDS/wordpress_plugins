(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var someActionContent = 1500;

    if (isIE()) {
        someActionContent = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        someActionContent = 10000;
    }

    setTimeout(function () {
        if($('.freddie_some_action_content').length !== 0){
            $('.freddie_some_action_content .et_pb_testimonial').each(function () {
                $('<div class="testimonials_info"></div>').insertAfter($(this).find('.et_pb_testimonial_description_inner'))
                $($(this).find('span.et_pb_testimonial_author')).appendTo($(this).find('.testimonials_info'))
                $($(this).find('.et_pb_testimonial_meta')).appendTo($(this).find('.testimonials_info'))
            })
        }

    }, someActionContent);

})(jQuery);