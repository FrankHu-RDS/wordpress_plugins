(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieSweetLadyTimeOut = 1000;

    if (isIE()) {
        freddieSweetLadyTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieSweetLadyTimeOut = 10000;
    }

    setTimeout(function () {

        if($('.freddie_sweet_lady_slider').length !== 0){
            $('.freddie_sweet_lady_slider .et_pb_slide ').each(function () {
                $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            })


            $('.freddie_sweet_lady_slider .et_pb_slider .et-pb-controllers a').each(function () {
                var dotText = $(this).text();

                if(dotText <= 9){
                    dotText = '0' + dotText;
                    $(this).text(dotText);
                }
            })


            var splitText1 = new SplitText(".freddie_sweet_lady_slider .et_pb_slide_content", {
                type: "words,chars",
                charsClass: "char char++",
                position: "static"
            });


            var splitText2 = new SplitText(".freddie_sweet_lady_slider h2.et_pb_slide_title", {
                type: "words,chars",
                charsClass: "char char++",
                position: "static"
            });


            var tlSideSweetLadyFirst = new TimelineLite;
            tlSideSweetLadyFirst.to($('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide.et-pb-active-slide .char'), 0, {
                opacity: 1
            })

            // var tlSideSweetLadyTitleFirst = new TimelineLite;
            // tlSideSweetLadyTitleFirst.to($('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide.et-pb-active-slide .char'), 0, {
            //     opacity: 1
            // })


            var tlSweetLadyImageFirst = new TimelineLite;
            tlSweetLadyImageFirst.staggerFromTo( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_image'), 0, {
                scaleX: 0
            }, {
                scaleX: 1
            }, 0);

            $('.freddie_sweet_lady_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next, .freddie_sweet_lady_slider .et_pb_slider .et-pb-controllers a').on('click', function () {
                setTimeout(function () {
                    var tlSweetLadyImageMoved = new TimelineLite;
                    tlSweetLadyImageMoved.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-moved-slide .et_pb_slide_image'), 0, {
                        transformOrigin:"left 50%"
                    });

                    var tlSweetLadyImageActive = new TimelineLite;
                    tlSweetLadyImageActive.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_image'), 0, {
                        transformOrigin:"right 50%"
                    });
                },50)

            })

            $('.freddie_sweet_lady_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                setTimeout(function () {
                    var tlSweetLadyImageMoved = new TimelineLite;
                    tlSweetLadyImageMoved.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-moved-slide .et_pb_slide_image'), 0, {
                        transformOrigin:"right 50%"
                    });

                    var tlSweetLadyImageActive = new TimelineLite;
                    tlSweetLadyImageActive.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_image'), 0, {
                        transformOrigin:"left 50%"
                    });
                },50)

            })

            if($('.freddie_sweet_lady_slider .et_pb_slider').hasClass('et_slider_auto')) {
                $('.freddie_sweet_lady_slider .et_pb_slider').removeClass('et_slider_auto').removeClass('et_slider_auto_ignore_hover');
              //  console.log('AUTO');
                var classes = $('.freddie_sweet_lady_slider .et_pb_slider').attr('class');
               // var this_class = $('.freddie_sidewalk_header .et_pb_slider [class^="et_slider_speed_"]').get();

               var n = classes.search("et_slider_speed_");

             //   console.log('class '+n);

               var speed = classes.substring(n).split(" ")[0];

               speed = speed.split("_")[3]-500;

             //   console.log('speed '+speed);


                 setInterval(function () {
                    $('.freddie_sweet_lady_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').click();
               //      console.log('Click end');

                }, speed)


            }


            var tlSideSweetLadyActive = new TimelineLite;
            var tlSideSweetLadyTitleActive = new TimelineLite;
            $('.freddie_sweet_lady_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next, .freddie_sweet_lady_slider .et_pb_slider .et-pb-controllers a').on('click', function () {
                setTimeout(function () {

                    var tlSweetLadyImageMoved = new TimelineLite;
                    tlSweetLadyImageMoved.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-moved-slide .et_pb_slide_image'), 0.8, {
                        scaleX: 0
                    });

                    var tlSweetLadyImageActive = new TimelineLite;
                    tlSweetLadyImageActive.to( $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_image'), 0.8, {
                        scaleX: 1
                    });





                    // var tlSideSweetLadyMoved = new TimelineLite;
                    // tlSideSweetLadyMoved.to($('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide .char'), 0.3, {
                    //     opacity: 0
                    // },0)

                    tlSideSweetLadyActive.clear();
                    tlSideSweetLadyTitleActive.clear();

                    $('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide .char').css('opacity', 0)








                    var charsContent = $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_content .char ').toArray();
                    var charsTitle = $('.freddie_sweet_lady_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_title .char ').toArray();

                    setTimeout(function () {
                        // tlSideSweetLadyMoved.to($('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide .char'), 0, {
                        //     opacity: 0
                        // },0)
                        tlSideSweetLadyActive.clear();
                        tlSideSweetLadyTitleActive.clear();



                        tlSideSweetLadyActive.staggerFromTo(charsContent, 0.5, {
                            opacity: 0
                        }, {
                            opacity: 1,
                            ease: Back.easeOut
                        }, 0.004);


                        tlSideSweetLadyTitleActive.staggerFromTo(charsTitle, 0.6, {
                            opacity: 0
                        }, {
                            opacity: 1,
                            ease: Back.easeOut
                        }, 0.04);


                        setTimeout(function () {
                            $('.freddie_sweet_lady_slider .et_pb_slider .et_pb_slide:not(.et-pb-active-slide) .char').css('opacity', 0)
                        },500)

                    },1000)
                },50)
            })
        }

    }, freddieSweetLadyTimeOut)

})(jQuery);