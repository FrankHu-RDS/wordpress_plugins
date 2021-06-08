(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var dianaWoodWorkHeader = 2000;

    if (isIE()) {
        dianaWoodWorkHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaWoodWorkHeader = 10000;
    }

    setTimeout(function () {
        if($('.diana_woodwork_header').length !== 0){
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.diana_woodwork_header .et_pb_slide').length;
            $('.diana_woodwork_header .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-next').insertBefore($('.diana_woodwork_header .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-prev'))
            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_woodwork_header .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-next'));
            var lineWidth = $('.diana_woodwork_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.diana_woodwork_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.diana_woodwork_header .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCountLine = $('.diana_woodwork_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.diana_woodwork_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.diana_woodwork_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.diana_woodwork_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 200);

            });

            setInterval(function () {
                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_woodwork_header .et_pb_slide').length;
                var lineWidth = $('.diana_woodwork_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_woodwork_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                var showSlideItemsCountLine = $('.diana_woodwork_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.diana_woodwork_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.diana_woodwork_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.diana_woodwork_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

            }, 50);
        }

    }, dianaWoodWorkHeader);

})(jQuery);