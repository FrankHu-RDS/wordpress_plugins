(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var demoEatYourSlider = 1500;

    if (isIE()) {
        demoEatYourSlider = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        demoEatYourSlider = 10000;
    }

    setTimeout(function () {
        if($('.demo_eat_your_slider ').length !== 0){
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.demo_eat_your_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.demo_eat_your_slider .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-next'));
            var lineWidth = $('.demo_eat_your_slider .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.demo_eat_your_slider .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.demo_eat_your_slider .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCountLine = $('.demo_eat_your_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.demo_eat_your_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.demo_eat_your_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.demo_eat_your_slider .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 200);

            });


            $('.demo_eat_your_slider .et_pb_column .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace('Follow on','');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            });

            $("#et-fb-app-frame").contents().find('.demo_eat_your_slider .et_pb_column .et_pb_social_media_follow').each(function () {
                $("#et-fb-app-frame").contents().find($(this)).find('li').each(function () {
                    var socialIconName = $("#et-fb-app-frame").contents().find($(this)).find('a').attr('title').replace('Follow on','');
                    $("#et-fb-app-frame").contents().find($(this)).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })

            setInterval(function () {
                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.demo_eat_your_slider .et_pb_slide').length;
                var lineWidth = $('.demo_eat_your_slider .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.demo_eat_your_slider .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                var showSlideItemsCountLine = $('.demo_eat_your_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.demo_eat_your_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.demo_eat_your_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.demo_eat_your_slider .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

            }, 50);
        }

    }, demoEatYourSlider);

})(jQuery);