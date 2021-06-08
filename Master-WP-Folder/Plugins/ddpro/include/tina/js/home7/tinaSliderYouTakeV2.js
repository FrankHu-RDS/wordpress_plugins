jQuery(function($) {
    'use strict';
    (function() {
        $('<div class="scrollbar"> <div class="handle"> <div class="mousearea"></div> </div> </div>').insertAfter($('.tina_slider_you_take_V2 .et_pb_portfolio '))
        var $frame = $('.tina_slider_you_take_V2 .et_pb_portfolio');
        var $slidee = $frame.find('.type-project');
        var $wrap = $frame.parent();

        $frame.sly({
            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 0,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 1,
            activatePageOn: 'click',
            speed: 5000,
            elasticBounds: 1,
            easing: 'easeOutExpo',
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1,
        });

    }());
});


(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSliderYouTake = 1500;

    if (isIE()) {
        tinaSliderYouTake = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSliderYouTake = 10000;
    }

    setTimeout(function () {

        if($('body .tina_slider_you_take_V2').length !== 0){


            $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').on('click', function () {
                window.location.href = $(this).find('.et_pb_module_header a').attr('href')
            })
            var sliderWidth = $('.tina_slider_you_take_V2 .et_pb_portfolio').width();
            var slideWidth = $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').width();
            var slideMarginRight = $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').css('margin-right');
            slideMarginRight = parseInt(slideMarginRight, 10)
            var slidesCount = $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').length;
            var sliderContainerWidth = slidesCount * (slideWidth+slideMarginRight);





            $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').outerWidth(slideWidth);
            $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project').css('margin-right', slideMarginRight);
            $('.tina_slider_you_take_V2 .et_pb_portfolio .et_pb_ajax_pagination_container').width(sliderContainerWidth + 30);
            $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project:first-child').addClass('active_slide');


            $('.tina_slider_you_take_V2 .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            });



            $('.tina_slider_you_take_V2 .et_pb_portfolio .type-project.has-post-thumbnail > a:first-child').tilt({
                glare: true,
                maxGlare: .5,
                maxTilt: 8
            });



        }

    }, tinaSliderYouTake);

})(jQuery);



// https://codepen.io/ritz078/pen/bEYOov