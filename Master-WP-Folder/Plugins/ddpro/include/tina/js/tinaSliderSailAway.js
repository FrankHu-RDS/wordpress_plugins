(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSliderSailAway = 1500;

    if (isIE()) {
        tinaSliderSailAway = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSliderSailAway = 10000;
    }

    setTimeout(function () {

        if($('body:not(.et-fb) .tina_slider_sail_away').length !== 0){
            $('<div class="arrow-cursor"><svg class="arrow-cursor__icon" viewBox="0 0 117.25 86.75"> <path class="arrow-cursor__path" d="M111.45,42.5,74.65,5.7l-9.9,9.9,20.6,20.6H6.45v14h78.9L64.75,70.8l9.9,9.9,36.8-36.8A1,1,0,0,0,111.45,42.5Z"></path> </svg></div>').insertBefore('.tina_slider_sail_away .et_pb_slider')


            var showItemsCount = 3;

            if ($(window).width() <= 980) {
                showItemsCount = 2;
            }

            if ($(window).width() <= 480) {
                showItemsCount = 1;
            }




           $('.tina_slider_sail_away .et_pb_slider .et_pb_slide').each(function () {
               var thisBgImage = $(this).css('background-image');
               $(this).find('.et_pb_slider_container_inner').css('background-image', thisBgImage);
               $(this).css('background-image', 'none');
           })


            var sliderWidth = $('.tina_slider_sail_away .et_pb_slider').width();
            var slidesCount = $('.tina_slider_sail_away .et_pb_slider .et_pb_slide').length;
            var slidesWidth = sliderWidth / showItemsCount;
            var sliderContainerWidth = slidesCount * slidesWidth;


            console.log(sliderWidth)

            $('.tina_slider_sail_away .et_pb_slider .et_pb_slide').outerWidth(slidesWidth);
            $('.tina_slider_sail_away .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
            $('.tina_slider_sail_away .et_pb_slider .et_pb_slides .et_pb_slide:first-child').addClass('active_slide');


            $('.tina_slider_sail_away .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length >= showItemsCount) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide');
                    }
                }, 50)
            })

            $('.tina_slider_sail_away .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length !== 0) {
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    }else{
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-last-child('+ showItemsCount +')').addClass('active_slide');
                    }
                }, 50)
            })



            $('.tina_slider_sail_away .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();

                var thisA = $(this).closest('.et_pb_slider');

                var thisArrow = $(this);

                setTimeout(function () {
                    var prevElementsCount = thisA.find('.et_pb_slide.active_slide').prevAll().length + 1;

                    var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;
                    thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                }, 50)


            })
            this.cursorOutLeftRightSide = null;
            $('.tina_slider_sail_away .et_pb_slider').hover(function() {

                this.cursorOutLeftRightSide = $(this).width() - (event.pageX - $(this).offset().left) > $(this).width()/2 ? "left" : "right";

                let startRotation;
                if ($(this).height() - (event.pageY - $(this).offset().top) > $(this).height()/2) {
                    startRotation = -135;
                } else {
                    startRotation = this.cursorOutLeftRightSide === "right" ? 135 : -315;
                }
                TweenMax.set($(this).closest('.et_pb_column').find('.arrow-cursor svg'), {
                    rotation: startRotation
                });

                this.cursorOutTopBottomSide = null;

                this.cursorOutTopBottomSide = $(this).height() - (event.pageY - $(this).offset().top) > $(this).width()/2 ? "top" : "bottom";



                TweenMax.to($(this).closest('.et_pb_column').find('.arrow-cursor svg'), 0.3, {
                    rotation: this.cursorOutLeftRightSide === "left" ? -180 : 0,
                    scale: 1,
                    opacity: 1,
                    ease: Back.easeOut.config(1.7)
                });

            },function () {

                let outRotation = 0;
                if ($(this).height() - (event.pageY - $(this).offset().top) > $(this).height()/2) {

                    outRotation = this.cursorSide === "right" ? -135 : -45;
                } else {
                    outRotation = this.cursorSide === "right" ? 135 : -315;
                }

                TweenMax.to($(this).closest('.et_pb_column').find('.arrow-cursor svg'), 0.3, {
                    rotation: outRotation,
                    opacity: 0,
                    scale: 0.3
                });

            });

            $('.tina_slider_sail_away .et_pb_slider').mousemove(function( event ) {
                this.cursorSide = null;

                    this.cursorSide = $(this).width() - (event.pageX - $(this).offset().left) > $(this).width()/2 ? "left" : "right";



                    TweenMax.to($(this).closest('.et_pb_column').find('.arrow-cursor svg'), 0.3, {
                        rotation: this.cursorSide === "left" ? -180 : 0,
                        ease: Back.easeOut.config(1.7)
                    });


                $(this).closest('.et_pb_column').find('.arrow-cursor').css('transform', 'translate('+ (event.pageX - $(this).offset().left) +'px, '+ (event.pageY - $(this).offset().top) +'px)')
            });

        }

    }, tinaSliderSailAway);

})(jQuery);