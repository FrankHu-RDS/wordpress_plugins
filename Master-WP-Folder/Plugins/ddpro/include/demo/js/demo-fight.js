(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var demoFlightTimeOut = 1500;

    if (isIE()) {
        demoFlightTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        demoFlightTimeOut = 10000;
    }

    setTimeout(function () {


            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.demo_fight_all_dead_header .et_pb_slider .et_pb_button'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.demo_fight_bold_pricing_tables .et_pb_promo .et_pb_button'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.demo_fight_event.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item'))
            $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.coco_image_footer.demo_fight_image_footer .et_pb_button_module_wrapper .et_pb_button'))


            setTimeout(function () {
                $('<div class="flooring_dots_container"><div class="flooring_inner_dots_container"></div></div>').appendTo($('.demo_fight_bold_pricing_tables.coco_bold_pricing_tables .coco-pt-slider-arrows a'))
            },3500)




    }, demoFlightTimeOut);

})(jQuery);