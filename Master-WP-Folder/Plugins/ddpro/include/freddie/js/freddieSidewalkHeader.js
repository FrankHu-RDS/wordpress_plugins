(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieSidewalkTimeOut = 1000;

    if (isIE()) {
        freddieSidewalkTimeOut = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieSidewalkTimeOut = 10000;
    }

    setTimeout(function () {

        if($('.freddie_sidewalk_header').length !== 0){
            for (var i = 1; i <= 20; i++) {
                $('<div class="image_box image_box_' + i + '"></div>').appendTo($('.freddie_sidewalk_header .et_pb_slide_image'))
            }

            var descHeight = 0
            $('.freddie_sidewalk_header .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                var slideImage = $(this).find('.et_pb_slide_image img').attr('src');
                $('<img src="' + slideImage + '">').appendTo($(this).find('.image_box'));


                // var descHeight = $(this).find('.et_pb_slide_description').outerHeight();

                if(descHeight <= $(this).find('.et_pb_slide_description').outerHeight()){
                    descHeight = $(this).find('.et_pb_slide_description').outerHeight();
                }

            })

            descHeight = descHeight -1;

            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows').css('cssText', 'bottom: '+ descHeight +'px !important')

            var imageHeight = $('.freddie_sidewalk_header .et_pb_slider .et_pb_slides .et_pb_slide .et_pb_slide_image img').height()
            $('.freddie_sidewalk_header .et_pb_slider .et_pb_slides .et_pb_slide .image_box img').height(imageHeight)



            $('.freddie_sidewalk_header .et_pb_slider .et-pb-controllers a').each(function () {
                var dotText = $(this).text();
                var imageSrc = $('.freddie_sidewalk_header .et_pb_slider .et_pb_slides .et_pb_slide:nth-child('+ dotText +') .et_pb_slide_image img').attr('src');


                if(dotText <= 9){
                    dotText = '0' + dotText;
                    $(this).text(dotText);
                }
                $(this).prepend($('<img src="' + imageSrc + '">'))
            })


            var splitText1 = new SplitText(".freddie_sidewalk_header .et_pb_slide_content", {
                type: "words,chars",
                charsClass: "char char++",
                position: "static"
            });


            var tlSideWalkContentFirst = new TimelineLite;
            tlSideWalkContentFirst.to($('.freddie_sidewalk_header .et_pb_slider .et_pb_slide.et-pb-active-slide .char'), 0, {
                opacity: 1,
                scaleX: 1,
                transformOrigin:"50% bottom",
                scaleY: 1
            })



            var tlSidewalkFirst = new TimelineLite;
            tlSidewalkFirst.staggerFromTo( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0, {
                scaleY: 0
            }, {
                scaleY: 1
            }, 0);



            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next, .freddie_sidewalk_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                setTimeout(function () {
                    var tlSidewalkMoved = new TimelineLite;
                    tlSidewalkMoved.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-moved-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% top"
                    });

                    var tlSidewalkActive = new TimelineLite;
                    tlSidewalkActive.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% bottom"
                    });
                },50)

            })

            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                setTimeout(function () {
                    var tlSidewalkMoved = new TimelineLite;
                    tlSidewalkMoved.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-moved-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% bottom"
                    });

                    var tlSidewalkActive = new TimelineLite;
                    tlSidewalkActive.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% top"
                    });
                },50)

            })

            if($('.freddie_sidewalk_header .et_pb_slider').hasClass('et_slider_auto')) {
                $('.freddie_sidewalk_header .et_pb_slider').removeClass('et_slider_auto').removeClass('et_slider_auto_ignore_hover');
              //  console.log('AUTO');
                var classes = $('.freddie_sidewalk_header .et_pb_slider').attr('class');
               // var this_class = $('.freddie_sidewalk_header .et_pb_slider [class^="et_slider_speed_"]').get();

               var n = classes.search("et_slider_speed_");

             //   console.log('class '+n);

               var speed = classes.substring(n).split(" ")[0];

               speed = speed.split("_")[3]-500;

             //   console.log('speed '+speed);


                 setInterval(function () {
                    $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').click();
               //      console.log('Click end');

                }, speed)


            }



            $('<div class="slide_dots_container"><div class="slide_dots"></div></div>').appendTo($('.freddie_sidewalk_header .et-pb-controllers'));

            $('.freddie_sidewalk_header .et-pb-controllers a').each(function() {
                $(this).appendTo($('.freddie_sidewalk_header .et-pb-controllers .slide_dots'))
            });


            var slideDotesCount = $('.freddie_sidewalk_header .et-pb-controllers a').length;
            var slideOuterContWidth = parseFloat($('.freddie_sidewalk_header .et-pb-controllers .slide_dots_container').width(), 10);
            var slideItemWidth = parseInt(slideOuterContWidth / 3);


            setInterval(function () { $('.freddie_sidewalk_header .et-pb-controllers a').outerWidth(slideItemWidth);}, 5);
            $('.freddie_sidewalk_header .et-pb-controllers .slide_dots').width(slideItemWidth * slideDotesCount);

            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next, .freddie_sidewalk_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                setTimeout(function () {
                    var tlSidewalkMoved = new TimelineLite;
                    tlSidewalkMoved.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-moved-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% top"
                    });

                    var tlSidewalkActive = new TimelineLite;
                    tlSidewalkActive.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% bottom"
                    });
                },50)

            })

            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                setTimeout(function () {
                    var tlSidewalkMoved = new TimelineLite;
                    tlSidewalkMoved.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-moved-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% bottom"
                    });

                    var tlSidewalkActive = new TimelineLite;
                    tlSidewalkActive.to( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0, {
                        transformOrigin:"50% top"
                    });
                },50)

            })

            $('.freddie_sidewalk_header .et_pb_slider .et-pb-slider-arrows a, .freddie_sidewalk_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                $('.freddie_sidewalk_header .et-pb-controllers a').outerWidth(slideItemWidth);
                setTimeout(function () {
                    var tlSidewalkMoved = new TimelineLite;
                    tlSidewalkMoved.staggerFromTo( $('.freddie_sidewalk_header .et_pb_slide.et-pb-moved-slide .et_pb_slide_image .image_box'), 0.3, {
                        scaleY: 1
                    }, {
                        scaleY: 0
                    }, 0.05);

                    var tlSidewalkActive = new TimelineLite;
                    tlSidewalkActive.staggerFromTo( $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_image .image_box'), 0.3, {
                        scaleY: 0
                    }, {
                        scaleY: 1
                    }, 0.05);



                    var tlSideWalkContentMoved = new TimelineLite;
                    tlSideWalkContentMoved.to($('.freddie_sidewalk_header .et_pb_slider .et_pb_slide.et-pb-moved-slide .char'), 0.3, {
                        opacity: 0
                    },0)



                    var tlSideWalkContentActive = new TimelineLite;


                    var charsTitle = $('.freddie_sidewalk_header .et_pb_slide.et-pb-active-slide .et_pb_slide_content .char ').toArray();

                    setTimeout(function () {
                        tlSideWalkContentActive.staggerFromTo(charsTitle, 0.4, {
                            opacity: 0,
                            scaleX: 1,
                            transformOrigin:"50% bottom",
                            scaleY: 0
                        }, {
                            opacity: 1,
                            scaleX: 1,
                            scaleY: 1,
                            transformOrigin:"50% bottom",
                            ease: Back.easeOut
                        }, 0.015);

                    },500)



                    if ($('.freddie_sidewalk_header .et-pb-controllers .slide_dots a.et-pb-active-control').nextAll().length <= 1) {
                        var transformSize = slideDotesCount - 3;
                        $('.freddie_sidewalk_header .et-pb-controllers .slide_dots').css('transform', 'translate(-' + transformSize * slideItemWidth + 'px,0)');
                    } else {
                        var prevElements = $('.freddie_sidewalk_header .et-pb-controllers .slide_dots a.et-pb-active-control').prevAll().length;
                        $('.freddie_sidewalk_header .et-pb-controllers .slide_dots').css('transform', 'translate(-' + prevElements * slideItemWidth + 'px,0)');
                    }
                },50)


            })






        }

    }, freddieSidewalkTimeOut)

})(jQuery);