jQuery(function($) {
    'use strict';
    (function() {
        $('<div class="scrollbar"> <div class="handle"> <div class="mousearea"></div> </div> </div>').insertAfter($('.tina_slider_you_take_shadow .et_pb_slider '))
        var $frame = $('.tina_slider_you_take_shadow .et_pb_slider');
        var $slidee = $frame.find('.et_pb_slide');
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

        if($('body:not(.et-fb) .tina_slider_you_take_shadow').length !== 0){


            var sliderWidth = $('.tina_slider_you_take_shadow .et_pb_slider').width();
            var slideWidth = $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').width();
            var slideMarginRight = $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').css('margin-right');
            slideMarginRight = parseInt(slideMarginRight, 10)
            var slidesCount = $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').length;

            var sliderContainerWidth = slidesCount * (slideWidth+slideMarginRight);





            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').outerWidth(slideWidth);
            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').css('margin-right', slideMarginRight);
            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slides .et_pb_slide:first-child').addClass('active_slide');


            $('.tina_slider_you_take_shadow .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })


            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').each(function () {
                $('<div class="image_cont"></div>').appendTo($(this).find('.et_pb_slide_image'))
                $('<div class="shadow shadow_1"></div><div class="shadow shadow_2"></div><div class="shadow shadow_3"></div><div class="shadow shadow_4"></div>').appendTo($(this).find('.et_pb_slide_image .image_cont'))
                $(this).find('.et_pb_slide_image img').appendTo($(this).find('.image_cont'))
            })




            var windowWidhtHalf = $(window).width()/2;

            $('.tina_slider_you_take_shadow .et_pb_slider .et_pb_slide').hover(function () {
                var itemWidht = $(this).width()/2;
                var itemOffsetLeft = $(this).offset().left;
                var itemLeft = itemWidht + itemOffsetLeft;

                var transformSize1 = 0;
                var transformSize2 = 0;


                var self = this;
                self.hoverTl = new TimelineMax();
                self.hoverTlShadow = new TimelineMax();
                self.hoverTl.set($(this).find('.et_pb_slide_image'), {perspective:800, transformStyle: "preserve-3d"});

                if(itemLeft < windowWidhtHalf){
                    $(this).find('.shadow').each(function () {
                        transformSize1 = (windowWidhtHalf-itemLeft)/70
                        transformSize2 = transformSize2 + transformSize1;
                        $(this).css('transform', 'translate(' + transformSize2 +'px, 0)');

                    })
                    $(this).find('.et_pb_slide_image').css('cssText', ' transform-origin: right bottom; transform: scale(1.05) translate(-'+ (transformSize1*4) +'px, 6px);')
                    $(this).find('.et_pb_slide_description').css('cssText', 'transform: translate(-'+ (transformSize1*4) +'px, 0);')

                    self.hoverTl.to($(this).find('.image_cont img'), 0.2, {rotationX: -5, skewX: 2}, "start")
                        .to($(this).find('.image_cont img'), 0.2, {rotationX: 0, skewX: 0}, "end");
                }else{
                    transformSize1 = (itemLeft-windowWidhtHalf)/70
                    $(this).find('.shadow').each(function () {
                        transformSize2 = transformSize2 + transformSize1;
                        $(this).css('transform', 'translate(-' + transformSize2 +'px, 0)');
                    })
                    $(this).find('.et_pb_slide_image').css('cssText', ' transform-origin: left bottom; transform: scale(1.05) translate('+ (transformSize1*4) +'px, 6px);')
                    $(this).find('.et_pb_slide_description').css('cssText', 'transform: translate('+ (transformSize1*4) +'px, 0);')

                    self.hoverTl.to($(this).find('.image_cont img'), 0.2, {rotationX: -5, skewX: -2}, "start")
                        .to($(this).find('.image_cont img'), 0.2, {rotationX: 0, skewX: 0}, "end");
                }




            },function () {
                $(this).find('.shadow').css('transform', 'translate( 0px, 0)')
                $(this).find('.et_pb_slide_image').css('transform', 'scale(1) translate(0px, 0)')
                $(this).find('.et_pb_slide_description').css('cssText', 'transform: translate(0px, 0);')
            })


        }

    }, tinaSliderYouTake);

})(jQuery);



// https://codepen.io/ritz078/pen/bEYOov