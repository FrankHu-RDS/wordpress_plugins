(function ($) {

    var demoFloristTimeOut = 100;

    if ($('body').hasClass('et-fb')) {
        demoFloristTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        demoFloristTimeOut = 5000;
    }

    setTimeout(function () {
        if($('body .demo_florist_middle_blurbs ').length !== 0){
            $('.demo_florist_middle_blurbs .middle_blurb_row_first .blurb_image_after_text .et_pb_main_blurb_image').insertAfter('.demo_florist_middle_blurbs .middle_blurb_row_first .blurb_image_after_text .et_pb_blurb_container')
            $('.demo_florist_middle_blurbs .middle_blurb_row_middle .blurb_image_after_text .et_pb_main_blurb_image').insertAfter('.demo_florist_middle_blurbs .middle_blurb_row_middle .blurb_image_after_text .et_pb_blurb_container')
        }
    }, demoFloristTimeOut)

})(jQuery);