


(function ($) {

    var timeOutDianaRullingSlider = 1500;

    function isIE() {
        ua = navigator.userAgent;
        /* MSIE used to detect old browsers and Trident used to newer ones*/
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }
    /* Create an alert to show if the browser is IE or not */
    if (isIE()){
        timeOutDianaRullingSlider = 2500;
    }

    if($('body').hasClass('et-fb')){
        timeOutDianaRullingSlider = 10000;
    }

    setTimeout(function () {



        if($('.diana_ruling_header').length !== 0 || $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header').length !== 0){

            $('.diana_ruling_header .et_pb_slide').each(function(){
                var buttonImage = $(this).find('.et_pb_slide_image img').attr('src');
                $(this).find('.et_pb_button').css('background-image', 'url('+ buttonImage +')');


            });
            $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slide').each(function(){
                var buttonImage = $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_image img').attr('src');
                $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_button').css('background-image', 'url('+ buttonImage +')');


            });


            var buttonText = $('.diana_ruling_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
            $('.diana_ruling_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');


            $('.diana_ruling_header .et_pb_slide').each(function () {
                $(this).find('.et_pb_button_wrapper').insertBefore($(this).find('.et_pb_slide_description'));
            })

            $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slide').each(function () {
                $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_button_wrapper').insertBefore($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description'));
            })
        }

        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.diana_ruling_header .et_pb_slide').length;

        if($('body').hasClass('et-fb')){
            homeSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slider .et-pb-slider-arrows'));
            var lineWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCountLine = $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $("body.et-fb #et-fb-app-frame").contents().find('.diana_ruling_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 200);

            });
        }

        $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_ruling_header .et_pb_slider .et-pb-slider-arrows'));
        var lineWidth = $('.diana_ruling_header .slider_number .numers_line').width();
        var lineInnerWidth = lineWidth/homeSlideItemsCount;
        $('.diana_ruling_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

        $('.diana_ruling_header .et-pb-slider-arrows a').on('click', function (event) {
            event.preventDefault();

            setTimeout(function () {
                var showSlideItemsCountLine = $('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.diana_ruling_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.diana_ruling_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

            }, 200);

        });

    }, timeOutDianaRullingSlider);
    setInterval(function () {
        var showHomeSlideritems = 1;
        var homeSlideItemsCount = $('.diana_ruling_header .et_pb_slide').length;
        var lineWidth = $('.diana_ruling_header .slider_number .numers_line').width();
        var lineInnerWidth = lineWidth/homeSlideItemsCount;
        $('.diana_ruling_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
        var showSlideItemsCountLine = $('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length;
        var showSlideItemsCount = $('.diana_ruling_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

        $('.diana_ruling_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

        $('.diana_ruling_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

    }, 50);

})(jQuery);