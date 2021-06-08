(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonModuleItsLate = 2000;

    if (isIE()) {
        freddiePersonModuleItsLate = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonModuleItsLate = 10000;
    }

    setTimeout(function () {


        if($('.freddie_person_module_Its_late').length !== 0){
            $('<div class="slide_line_arrows"><span class="number number_first">01</span><div class="slide_line"><div class="slide_inline_line"></div></div><span class="number number_last"></span></div>').insertAfter($('.freddie_person_module_Its_late .et_pb_slider .et-pb-slider-arrows .et-pb-arrow-prev'));



            $('.freddie_person_module_Its_late ').each(function () {
                var thisItem = $(this);

                var slidesCount = thisItem.find('.et_pb_slide').length;
                if (slidesCount <= 9) {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text("0" + slidesCount);
                } else {
                    thisItem.find('.et-pb-slider-arrows .number.number_last').text(slidesCount);
                }







                var slidesCount = 1;
                $(this).find('.et_pb_slide ').each(function () {
                    $('<div class="slide_number"></div>').insertBefore($(this).find('.et_pb_slide_image'));

                    if (slidesCount <= 9) {
                        $(this).find('.slide_number').text("0" + slidesCount);
                    } else {
                        $(this).find('.slide_number').text(slidesCount);
                    }

                    slidesCount = slidesCount + 1;


                })


                var prevElements = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;



                if ($(this).find('.et_pb_slider').hasClass('et_slider_auto')) {
                    var thisS = $(this);
                    var prevElementsLength;
                    // var check = "et_slider_speed_";
                    // var slideTransition;
                    // $('[class^="et_slider_speed_"], [class*=" et_slider_speed_"]').each(function () {
                    //     // Get array of class names
                    //     var cls = $(this).attr('class').split(' ');
                    //     for (var i = 0; i < cls.length; i++) {
                    //
                    //         if (cls[i].indexOf(check) > -1) {
                    //             slideTransition = cls[i].slice(check.length, cls[i].length);
                    //
                    //         }
                    //     }
                    // });
                    // slideTransition2 = slideTransition / 1000;
                    // var thistl = this;
                    // thistl.tl = new TimelineLite();
                    // thistl.tl.fromTo(thisS.find(".slide_inline_line"), slideTransition2, {
                    //     width: 0
                    // }, {
                    //     width: "100%",
                    //     ease: Power3.easeInOut
                    // }, 0)
                    //
                    // thistl.tl.play();

                    // setInterval(function () {
                    //
                    //     thistl.tl2 = new TimelineLite();
                    //     thistl.tl2.fromTo(thisS.find(".slide_inline_line"), slideTransition2, {
                    //         width: 0
                    //     }, {
                    //         width: "100%",
                    //         ease: Power3.easeInOut
                    //     }, 0)
                    //
                    //     thistl.tl2.play();
                    // }, slideTransition)

                    setInterval(function () {
                        var prevElementsCount = thisS.find('.et_pb_slide.et-pb-active-slide').prevAll().length + 1;
                        if (thisS.find('.et_pb_slide.et-pb-active-slide').nextAll().length !== 0) {
                            prevElementsLength = thisS.find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        } else {
                            prevElementsLength = -1;
                        }

                        if (prevElementsCount <= 9) {
                            prevElementsCount = "0" + prevElementsCount
                        }

                        thisS.find('.et-pb-slider-arrows .number.number_first').text(prevElementsCount);

                    }, 50)
                }


            })


            $('.freddie_person_module_Its_late .et_pb_slider .et-pb-slider-arrows a').on("click", function () {
                var thisA = $(this).closest('.et_pb_slider');
                setTimeout(function () {
                    var prevElementsCount = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length + 1;
                    if (thisA.find('.et-pb-active-slide').nextAll().length !== 0) {
                        var prevElementsLength = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                    } else {
                        var prevElementsLength = -1;
                    }

                    if (prevElementsCount <= 9) {
                        prevElementsCount = "0" + prevElementsCount
                    }

                    thisA.find('.et-pb-slider-arrows .number.number_first').text(prevElementsCount);



                    var tl = new TimelineLite();
                    tl.fromTo(thisA.find(".slide_inline_line"), 0.8, {
                        width: 0
                    }, {
                        width: "100%",
                        ease: Power3.easeInOut
                    }, 0)


                }, 50)
            })



        }


    }, freddiePersonModuleItsLate);

})(jQuery);