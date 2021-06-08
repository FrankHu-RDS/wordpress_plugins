(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var flooringTimeOut = 1500;

    if (isIE()) {
        flooringTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        flooringTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.flooring_header_5 ').length !== 0){

            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.header_5_f.flooring_header_5 .et_pb_slider .et-pb-slider-arrows a'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.header_5_f.flooring_header_5 .et_pb_slider .et_pb_slide .et_pb_slide_description h2'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.flooring_pegasus_blurb7 .et_pb_button_module_wrapper .et_pb_button'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.pegasus_portfolio_2.flooring_portfolio_2 .portfolio-slider-arrows a'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.pegasus_person_1.flooring_person_1 .persons-slider-arrows a'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.pegasus-footer3 .et_pb_button_module_wrapper .et_pb_button'))

        }

    }, flooringTimeOut);

})(jQuery);