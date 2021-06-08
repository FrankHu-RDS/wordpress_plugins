(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieOtherDayTest = 1000;

    if (isIE()) {
        freddieOtherDayTest = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieOtherDayTest = 10000;
    }

    setTimeout(function () {

        if($('.freddie_other_day_testimonial').length !== 0){
            $('#page-container .freddie_other_day_testimonial .et_pb_slider .et_pb_slide').each(function () {
                $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            })
        }

    }, freddieOtherDayTest)

})(jQuery);