    (function ($) {

        var timeOutDianaSliders = 1500;

        function isIE() {
            ua = navigator.userAgent;
            /* MSIE used to detect old browsers and Trident used to newer ones*/
            var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

            return is_ie;
        }
        /* Create an alert to show if the browser is IE or not */
        if (isIE()){
            timeOutDianaSliders = 5000;
        }

        if ($('body').hasClass('et-fb')) {
            timeOutDianaSliders = 10000;
        }

        setTimeout(function () {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.diana_famed_slider .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_famed_slider .et_pb_slider .et-pb-slider-arrows'));
            var lineWidth = $('.diana_famed_slider .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.diana_famed_slider .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.diana_famed_slider .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCountLine = $('.diana_famed_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.diana_famed_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.diana_famed_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.diana_famed_slider .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 200);

            });

        }, timeOutDianaSliders);
        setInterval(function () {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.diana_famed_slider .et_pb_slide').length;
            var lineWidth = $('.diana_famed_slider .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.diana_famed_slider .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
            var showSlideItemsCountLine = $('.diana_famed_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
            var showSlideItemsCount = $('.diana_famed_slider .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.diana_famed_slider .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            $('.diana_famed_slider .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

        }, 50);





//        Diana Celebrated Header




        setTimeout(function () {

            if($('.diana_celebrated_header').length !== 0){
                var buttonText = $('.diana_celebrated_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_celebrated_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');


                $('.diana_celebrated_header .et_pb_slide').each(function () {
                    $(this).find('.et_pb_button_wrapper').insertBefore($(this).find('.et_pb_slide_description'));
                })
            }

            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.diana_celebrated_header .et_pb_slide').length;

            $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_celebrated_header .et_pb_slider .et-pb-slider-arrows'));
            var lineWidth = $('.diana_celebrated_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.diana_celebrated_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

            $('.diana_celebrated_header .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var showSlideItemsCountLine = $('.diana_celebrated_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.diana_celebrated_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.diana_celebrated_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.diana_celebrated_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 200);

            });

        }, timeOutDianaSliders);
        setInterval(function () {
            var showHomeSlideritems = 1;
            var homeSlideItemsCount = $('.diana_celebrated_header .et_pb_slide').length;
            var lineWidth = $('.diana_celebrated_header .slider_number .numers_line').width();
            var lineInnerWidth = lineWidth/homeSlideItemsCount;
            $('.diana_celebrated_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
            var showSlideItemsCountLine = $('.diana_celebrated_header .et_pb_slide.et-pb-active-slide').prevAll().length;
            var showSlideItemsCount = $('.diana_celebrated_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

            $('.diana_celebrated_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            $('.diana_celebrated_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

        }, 50);


        setTimeout(function () {

            if($('.diana_prominent_slider').length !== 0){
                $('.diana_prominent_slider .et_pb_slider .et_pb_slide').each(function () {
                    $(this).find('.et_pb_slide_content').insertBefore($(this).find('.et_pb_slide_image img'));
                });
            }

        }, timeOutDianaSliders);




//        Diana Noted Header

        setTimeout(function () {
            if($('.diana_noted_header').length !== 0){
                var buttonText = $('.diana_noted_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_noted_header .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');
            }
            $('.diana_noted_header .et_pb_slider .et-pb-controllers a').each(function () {
                var thisText = $(this).text();
                if (thisText <= 9) {
                    thisText = '0' + thisText;
                }
                $(this).html("<span class='slide_title'></span><span class='slide_number'>"+ thisText +"</span>");
            });

            var nthChild = 1;
            $('.diana_noted_header .et_pb_slider .et_pb_slides .et_pb_slide').each(function () {
                var slideTitle = $(this).find('.et_pb_slide_description h2').text();

                $(this).parent().parent().find('.et-pb-controllers a:nth-child('+ nthChild +') .slide_title').text(slideTitle);
                nthChild++;
            });


        }, timeOutDianaSliders);


            function dianaNotedHeader() {


                if ($('.diana_noted_header ').length > 0) {
                    setTimeout(function () {



                        var slideItemsCount = $('.diana_noted_header .et_pb_slide').length;

                        var slideItemswidth = $('.diana_noted_header .et_pb_slide').outerHeight();
                        var slideWidth = slideItemsCount * slideItemswidth;


                        $('.diana_noted_header .et_pb_slider ').css("cssText", "height: " + slideItemswidth + "px !important;");
                        $('.diana_noted_header .et_pb_slides').css("cssText", "height: " + slideWidth + "px !important;");



                        $('.diana_noted_header .et-pb-controllers a').on('click', function (event) {
                            event.preventDefault();
                            var sliderSlideSize1 = $('.diana_noted_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                            var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                            $('.diana_noted_header .et_pb_slides').css('transform', 'translate(0, -' + sliderSlideSize2 + 'px)');



                        });


                    }, timeOutDianaSliders);
                }
            }

            setTimeout(function () {
                dianaNotedHeader();
            }, 0);
            setTimeout(function () {
                var hoverCount6 = 1;
                $('body.et-fb .impi_guardian_person').hover(function () {
                    if (hoverCount6 === 1) {
                        dianaNotedHeader();
                        hoverCount6 = 0;
                    }

                });
            }, 0);


            setInterval(function () {
                var slideItemswidth = $('.diana_noted_header .et_pb_slide').outerHeight();
                var sliderSlideSize1 = $('.diana_noted_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                $('.diana_noted_header .et_pb_slides').css('transform', 'translate(0, -' + sliderSlideSize2 + 'px)');
            },50);





        /*noble header*/
        setTimeout(function () {
           $('.diana_noble_header .et_pb_slider .et-pb-controllers a').each(function () {
               var thisText = $(this).text();
               if(thisText <= 9){
                   thisText = '0' + thisText;
               }
               $(this).text(thisText);
           })

        }, timeOutDianaSliders);








        //        Diana Majestic Header


        setTimeout(function () {
            if($('.diana_majestic_header').length !== 0){
                $('.diana_majestic_header .et_pb_slide').each(function(){
                    console.log("test");
                    var buttonImage = $(this).find('.et_pb_slide_image img').attr('src');
                    $(this).find('.et_pb_button').css('background-image', 'url('+ buttonImage +')');

                    $('<div class="slide_info"></div>').insertAfter($(this).find('h2.et_pb_slide_title'));
                    $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.slide_info'));
                    $(this).find('.et_pb_slide_content').appendTo($(this).find('.slide_info'));

                });



                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_majestic_header .et_pb_slide').length;

                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_majestic_header .et_pb_slider .et-pb-slider-arrows'));
                var lineWidth = $('.diana_majestic_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_majestic_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

                $('.diana_majestic_header .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var showSlideItemsCountLine = $('.diana_majestic_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var showSlideItemsCount = $('.diana_majestic_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $('.diana_majestic_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                        $('.diana_majestic_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                    }, 200);

                });
            }
        }, timeOutDianaSliders);
        setInterval(function () {
            if($('.diana_majestic_header').length !== 0) {
                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_majestic_header .et_pb_slide').length;
                var lineWidth = $('.diana_majestic_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth / homeSlideItemsCount;
                $('.diana_majestic_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                var showSlideItemsCountLine = $('.diana_majestic_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.diana_majestic_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.diana_majestic_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.diana_majestic_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate(' + lineInnerWidth * showSlideItemsCountLine + 'px,0)')
            }
        }, 50);




        setTimeout(function () {
        if($('.diana_fancy_header ').length !== 0){


                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_fancy_header .et_pb_slide').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_fancy_header .et_pb_slider .et-pb-slider-arrows'));
                var lineWidth = $('.diana_fancy_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_fancy_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

                $('.diana_fancy_header .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var showSlideItemsCountLine = $('.diana_fancy_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var showSlideItemsCount = $('.diana_fancy_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $('.diana_fancy_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                        $('.diana_fancy_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                    }, 200);

                });


                var descMarginTop = $('.diana_fancy_header .et_pb_slide .et_pb_slide_description').css('margin-top').replace('px', '');
                descMarginTop = Math.round(descMarginTop);
                var titleHeight = $('.diana_fancy_header .et_pb_slide h2.et_pb_slide_title').height();

                var topSize = titleHeight + descMarginTop + 37;

                $('.diana_fancy_header .et_pb_slider .slider_number').css('top', topSize);


                $('body .diana_fancy_header .et_pb_button_module_wrapper').each(function () {
                    if($(this).find('.et_pb_button').hasClass('email_button')){
                        $(this).addClass('email_button');
                    }

                    if($(this).find('.et_pb_button').hasClass('phone_button')){
                        $(this).addClass('phone_button');
                    }
                });







            setInterval(function () {
                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_fancy_header .et_pb_slide').length;
                var lineWidth = $('.diana_fancy_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_fancy_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                var showSlideItemsCountLine = $('.diana_fancy_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                var showSlideItemsCount = $('.diana_fancy_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                $('.diana_fancy_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                $('.diana_fancy_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

            }, 50);
        }

            if($("body.et-fb #et-fb-app-frame").contents().find('.diana_fancy_header').length !== 0){
                console.log(timeOutDianaSliders);
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_fancy_header .et_pb_button_module_wrapper').each(function () {
                    console.log(timeOutDianaSliders);
                    if($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_button').hasClass('email_button')){
                        $("body.et-fb #et-fb-app-frame").contents().find($(this)).addClass('email_button');
                    }

                    if($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_button').hasClass('phone_button')){
                        $("body.et-fb #et-fb-app-frame").contents().find($(this)).addClass('phone_button');
                    }
                })
            }
        },timeOutDianaSliders);





        setTimeout(function () {
            if($('.diana_showy_header').length !== 0){
                var imageSrc = $('.diana_showy_header').css('background-image');
                imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                $('.diana_showy_header').css('cssText', 'background-image: none !important');

                $('.diana_showy_header .et_pb_slider .et_pb_slide').each(function () {
                    $(this).find('.et_pb_slide_description .et_pb_slide_content strong').unwrap().insertBefore($(this).find('.et_pb_slide_description h2'))
                    $('<img src="' + imageSrc + '">').insertBefore($(this).find('.et_pb_slide_description'));
                });

            }

            if($("body.et-fb #et-fb-app-frame").contents().find('.diana_showy_header').length !== 0){
                var imageSrcVB = $("body.et-fb #et-fb-app-frame").contents().find('.diana_showy_header').css('background-image');

                imageSrcVB = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_showy_header').css('cssText', 'background-image: none !important');

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_showy_header .et_pb_slider .et_pb_slide').each(function () {
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description .et_pb_slide_content strong').unwrap().insertBefore($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description h2'))
                    $('<img src="' + imageSrcVB + '">').insertBefore($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description'));
                })
            }
        },timeOutDianaSliders);


        setTimeout(function () {
            if($('.diana_dig_slider ').length !== 0){
                $('.diana_dig_slider .et_pb_slider .et_pb_slide').each(function () {
                    $(this).find('.et_pb_slide_description h2').insertAfter($(this).find('.et_pb_slide_description .et_pb_slide_content'));

                });
            }

            if($("body.et-fb #et-fb-app-frame").contents().find('.diana_dig_slider').length !== 0){
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_dig_slider .et_pb_slider .et_pb_slide').each(function () {
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description h2').insertAfter($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description .et_pb_slide_content'));

                });
            }
        },timeOutDianaSliders);


        setTimeout(function () {
            if($('.diana_dean_header').length !== 0){
                $('.diana_dean_header .et_pb_slider .et_pb_slide').each(function () {
                    $(this).find('.et_pb_slide_description').insertBefore($(this).find('.et_pb_slide_image'));

                });


                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_dean_header .et_pb_slide').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_dean_header .et_pb_slider .et-pb-slider-arrows'));
                var lineWidth = $('.diana_dean_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_dean_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);


                $('.diana_dean_header .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var showSlideItemsCountLine = $('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var showSlideItemsCount = $('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $('.diana_dean_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                        $('.diana_dean_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                    }, 200);

                });

                setInterval(function () {
                    var showHomeSlideritems = 1;
                    var homeSlideItemsCount = $('.diana_dean_header .et_pb_slide').length;
                    var lineWidth = $('.diana_dean_header .slider_number .numers_line').width();
                    var lineInnerWidth = lineWidth/homeSlideItemsCount;
                    $('.diana_dean_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                    var showSlideItemsCountLine = $('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.diana_dean_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $('.diana_dean_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 50);
            }


            if($("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header').length !== 0){
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slider .et_pb_slide').each(function () {
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description').insertBefore($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_image'));

                });


                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slider .et-pb-slider-arrows'));
                var lineWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);


                $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var showSlideItemsCountLine = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var showSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                    }, 200);

                });

                setInterval(function () {
                    var showHomeSlideritems = 1;
                    var homeSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide').length;
                    var lineWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line').width();
                    var lineInnerWidth = lineWidth/homeSlideItemsCount;
                    $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);
                    var showSlideItemsCountLine = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var showSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    $("body.et-fb #et-fb-app-frame").contents().find('.diana_dean_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                }, 50);
            }





        },timeOutDianaSliders);

        // top brass header


        setTimeout(function () {

            if($('.diana_top_brass_header').length !== 0) {
                $('.diana_top_brass_header .et_pb_slider .et-pb-controllers a').each(function () {
                    var thisNumber = $(this).text();
                    if(thisNumber <= 9){
                        thisNumber = '0' + thisNumber;
                    }
                    $(this).html('<span class="slide_title"></span><span class="slide_number">' + thisNumber + '</span>');
                });

                var classCountC = "1";
                $('.diana_top_brass_header  .et_pb_slide').each(function () {
                    var attrText = $(this).find('.et_pb_slide_description h2').text();
                    $('.diana_top_brass_header .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                    classCountC++;
                });






                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $('.diana_top_brass_header .et_pb_slide').length;

                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="line">|</span><span>0' + homeSlideItemsCount + '</span></div>').insertAfter($('.diana_top_brass_header .et_pb_slider .et-pb-controllers'));


                $('.diana_top_brass_header .et-pb-slider-arrows a, .diana_top_brass_header .et-pb-controllers a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var showSlideItemsCount = $('.diana_top_brass_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $('.diana_top_brass_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    }, 200);

                });

                setInterval(function () {
                    var showHomeSlideritems = 1;
                    var showSlideItemsCount = $('.diana_top_brass_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                    $('.diana_top_brass_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                }, 50);

            }
        }, timeOutDianaSliders);

        setTimeout(function () {
        if ($('body:not(.et-fb) .diana_crowned_content').length > 0) {
            var contHeight = 0;

            $('.diana_crowned_content .et_pb_slide').each(function () {
                var contHeightSize = $(this).find('.et_pb_slide_content').outerHeight();
                if(contHeightSize > contHeight){
                    contHeight = contHeightSize;
                }
            });


            $('<div class="slider_outer_containe"></div>').insertBefore($('.diana_crowned_content .et_pb_slides'));
            $('.diana_crowned_content .et_pb_slides').appendTo($('.diana_crowned_content .slider_outer_containe'));
            $('.diana_crowned_content .slider_outer_containe').css('padding-bottom', contHeight + 'px');
            $('.diana_crowned_content .slider_outer_containe').css('margin-bottom', -contHeight + 'px');


            $('.diana_crowned_content .et_pb_slide:first-child').addClass('active_slide');
            var showBlog2Slideritems = 2;
            var afterSlidesCount = 1;

            if ($(window).width() <= "767") {
                showBlog2Slideritems = 1;
                var afterSlidesCount = 0;
            }

            var blogSlideItemsCount = $('.diana_crowned_content .et_pb_slide').length;
            var blogSlideInnerWidth = $('.diana_crowned_content .et_pb_column_3_5').width();

            $('.diana_crowned_content .et_pb_slide').css("cssText", "width: " + blogSlideInnerWidth / showBlog2Slideritems + "px !important;");
            var blogSlideItemswidth = $('.diana_crowned_content .et_pb_slide').outerWidth();
            var blogSlideWidth = blogSlideItemsCount * blogSlideItemswidth + 5;

            $('.diana_crowned_content .et_pb_slides').css("cssText", "width: " + blogSlideWidth + "px !important;");




            //            Slide Arrows  ***************************************************************************



            $('.diana_crowned_content .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    if($('.diana_crowned_content .et_pb_slide.active_slide').nextAll().length > afterSlidesCount){
                        $('.diana_crowned_content .et_pb_slide.active_slide').removeClass("active_slide").next().addClass('active_slide');
                    }else{
                        $('.diana_crowned_content .et_pb_slide.active_slide').removeClass("active_slide");
                        $('.diana_crowned_content .et_pb_slide:first-child').addClass("active_slide");
                    }
                }, 50)

            })


            $('.diana_crowned_content .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    if($('.diana_crowned_content .et_pb_slide.active_slide').prevAll().length > 0){
                        $('.diana_crowned_content .et_pb_slide.active_slide').removeClass("active_slide").prev().addClass('active_slide');
                    }else{
                        $('.diana_crowned_content .et_pb_slide.active_slide').removeClass("active_slide");
                        $('.diana_crowned_content .et_pb_slide:nth-last-child('+ showBlog2Slideritems +')').addClass("active_slide");
                    }
                }, 50)

            })

            $('.diana_crowned_content .et-pb-slider-arrows a, .diana_crowned_content .et-pb-controllers a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var blogSlideInnerWidth = $('.diana_crowned_content .et_pb_column_3_5').width();
                    var blogSlideItemswidth = blogSlideInnerWidth / showBlog2Slideritems;

                    var slider5SlideSize1 = $('.diana_crowned_content .et_pb_slide.active_slide').prevAll().length;
                    var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                    $('.diana_crowned_content .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

                }, 50)

            });
        }

            if ($("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content').length > 0) {

                var contHeight = 0;

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide').each(function () {

                    var contHeightSize = $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_content').outerHeight();
                    if(contHeightSize > contHeight){
                        contHeight = contHeightSize;
                    }
                });

                $('<div class="slider_outer_containe"></div>').insertBefore($("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slides'));
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slides').appendTo($("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .slider_outer_containe'));
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .slider_outer_containe').css('padding-bottom', contHeight + 'px');
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .slider_outer_containe').css('margin-bottom', -contHeight + 'px');


                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide:last-child'));
                var showBlog2Slideritems = 2;

                if ($(window).width() <= "767") {
                    showBlog2Slideritems = 1;
                }

                var blogSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide').length;
                var blogSlideInnerWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_column_3_5').width();

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide').css("cssText", "width: " + blogSlideInnerWidth / showBlog2Slideritems + "px !important;");
                var blogSlideItemswidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide').outerWidth();
                var blogSlideWidth = blogSlideItemsCount * blogSlideItemswidth + 5;

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slides').css("cssText", "width: " + blogSlideWidth + "px !important;");




                //            Slide Arrows  ***************************************************************************



                $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et-pb-slider-arrows a, .diana_crowned_content .et-pb-controllers a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var blogSlideInnerWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_column_3_5').width();
                        var blogSlideItemswidth = blogSlideInnerWidth / showBlog2Slideritems;

                        var slider5SlideSize1 = $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_crowned_content .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

                    }, 50)

                });
            }
        }, timeOutDianaSliders);

    })(jQuery);