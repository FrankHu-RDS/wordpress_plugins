       (function ($) {


           $('.et_pb_column .et_pb_social_media_follow').each(function () {
               $(this).find('li').each(function () {
                   var socialIconName = $(this).find('a').attr('title').replace('Follow on','');
                   $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
               })

           })

           followDelay = 1000;

            if ($('body').hasClass('et-fb')) {
             followDelay = 5000;
            }

            setTimeout(function () {

            $('body.et-fb .et_pb_column .et_pb_social_media_follow').each(function () {
               $(this).find('li').each(function () {
                   var socialIconName = $(this).find('a').attr('title').replace('Follow on','');
                   $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
               })

           })
            }, followDelay);


            setTimeout(function () {
                var nextBgImageSlide1 = "";

                nextBgImageSlide1 = $('.impi_sliders_1 .et_pb_slide:nth-child(2)').css('background-image');
                $('<div class="slider_next_post_img"></div>').appendTo($('.impi_sliders_1 .et-pb-slider-arrows'));

                $('.impi_sliders_1 .et-pb-slider-arrows .slider_next_post_img').css('background-image', nextBgImageSlide1);

                $(".impi_sliders_1 .et_pb_slider .et-pb-slider-arrows a").on('click', function (e) {
                    setTimeout(function () {
                        if ($('.impi_sliders_1 .et_pb_slide.et-pb-active-slide').nextAll().length <= 0) {
                            nextBgImageSlide1 = $('.impi_sliders_1 .et_pb_slide:first-child').css('background-image');
                        }

                        if ($('.impi_sliders_1 .et_pb_slide.et-pb-active-slide').nextAll().length > 0) {
                            nextBgImageSlide1 = $('.impi_sliders_1 .et_pb_slide.et-pb-active-slide').next().css('background-image');
                        }

                        $('.impi_sliders_1 .et-pb-slider-arrows .slider_next_post_img').css('background-image', nextBgImageSlide1);
                    }, 100);
                });
            }, 1000);


           setInterval(function () {


               if ($('.impi_sliders_1 .et_slider_auto .et_pb_slide.et-pb-active-slide').nextAll().length <= 0) {
                   nextBgImageSlide1 = $('.impi_sliders_1 .et_slider_auto .et_pb_slide:first-child').css('background-image');
               }

               if ($('.impi_sliders_1 .et_slider_auto .et_pb_slide.et-pb-active-slide').nextAll().length > 0) {
                   nextBgImageSlide1 = $('.impi_sliders_1 .et_slider_auto .et_pb_slide.et-pb-active-slide').next().css('background-image');
               }

               $('.impi_sliders_1 .et_slider_auto .et-pb-slider-arrows .slider_next_post_img').css('background-image', nextBgImageSlide1);




           },100)


            setTimeout(function () {
                $('.impi_sliders_2 .et-pb-slider-arrows').insertBefore($('.impi_sliders_2 .et_pb_slides'))
            }, 1000);


//            Slider 3


           setTimeout(function () {
               $('.impi_sliders_3').each(function () {
                   $(this).find('.et-pb-slider-arrows').insertBefore($(this).find('.et_pb_slides'));
               })

           }, 1000);


           //            Slide Sizes  ***************************************************************************

           var timeOutImpiSlider3Inner = 1000;
           var timeOutImpiSlider3 = 0;

           if ($('body').hasClass('et-fb')) {
               timeOutImpiSlider3 = 7000;
               var timeOutImpiSlider3Inner = 0;
           }
           setTimeout(function () {
               if ($('.impi_sliders_3').length > 0) {
                   setTimeout(function () {

                       $('.impi_sliders_3').each(function () {


                           var showPersonSlideritems = 3;


                           if ($(window).width() >= "2000") {
                               $(this).find('.et_pb_slider .et_pb_slide:nth-child(3)').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'));
                               showPersonSlideritems = 4;
                           }

                           if ($(window).width() >= "981") {
                               $(this).find('.et_pb_slider .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'));
                               $(this).find('.et_pb_slider .et_pb_slide:nth-child(2)').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'));
                               $(this).find('.et_pb_slider .et_pb_slide:nth-child(3)').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'));
                               // $(this).find('.et_pb_slider .et_pb_slide:nth-child(2)').clone().insertBefore($(this).find('.et_pb_slider .et_pb_slide:first-child'));
                           }


                           if ($(window).width() <= "980" && $(window).width() >= "768") {
                               $(this).find('.et_pb_slider .et_pb_slide:nth-child(2)').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'));
                               $(this).find('.et_pb_slider .et_pb_slide:nth-child(2)').clone().insertBefore($(this).find('.et_pb_slider .et_pb_slide:first-child'));
                               showPersonSlideritems = 2;
                           }


                           if ($(window).width() <= "767") {
                               showPersonSlideritems = 1;
                           }

                           var slideItemsCount = $(this).find('.et_pb_slide').length;
                           var slideInnerWidth = $(this).width();
                           var SlideItemsWidth1 = slideInnerWidth / showPersonSlideritems;

                           $(this).find('.et_pb_slide').css("cssText", "width: " + Math.floor(SlideItemsWidth1 - 30) + "px !important;");
                           var slideItemswidth = $(this).find('.et_pb_slide').outerWidth() + 30;
                           var slideWidth = slideItemsCount * slideItemswidth;

                           var sliderLeftSize = slideItemswidth - 94;

                           if ($(window).width() <= "767") {
                               sliderLeftSize = 0;
                           }

                           $(this).find('.et_pb_slides').css({
                               "width": slideWidth + "px",
                               "margin-left": "-" + sliderLeftSize + "px"
                           });
                           $(this).css('opacity', 1);
                       })
                   }, timeOutImpiSlider3Inner);
               }


               //            Slide Arrows  ***************************************************************************


               setTimeout(function () {
                   $('.impi_sliders_3 .et-pb-slider-arrows a').on('click', function (event) {
                       event.preventDefault();
                       var thisClosest = $(this);
                       setTimeout(function () {
                           var countBeforeElement = 0;

                           if ($(window).width() <= "767") {
                               countBeforeElement = 0;
                           }
                           var slideItemswidth = thisClosest.closest('.et_pb_slider').find('.et_pb_slide').outerWidth() + 30;
                           var slider5SlideSize1 = thisClosest.closest('.et_pb_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                           var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                           thisClosest.closest('.et_pb_slider').find('.et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                       }, 100)
                   });


                   if($('.impi_sliders_3 .et_pb_slider').hasClass('et_slider_auto')){
                       setInterval(function () {
                           var countBeforeElement = 0;

                           if ($(window).width() <= "767") {
                               countBeforeElement = 0;
                           }
                           var slideItemswidth = $('.impi_sliders_3 .et_pb_slide').outerWidth() + 30;
                           var slider5SlideSize1 = $('.impi_sliders_3 .et_pb_slide.et-pb-active-slide').prevAll().length - countBeforeElement;
                           var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                           $('.impi_sliders_3 .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                       },100)
                   }
               }, timeOutImpiSlider3Inner);
           }, timeOutImpiSlider3);

//        End Person 3 Slider





           setTimeout(function () {
               var nextBgImageSlide1 = "";

               nextBgImageSlide1 = $('.impi_next_here_header .et_pb_slide:nth-child(2)').css('background-image');
               var nextTitleSlide1 = $('.impi_next_here_header .et_pb_slide:nth-child(2) h2.et_pb_slide_title').text();
               $('<div class="next_slide_info"><div class="slider_next_post_img"></div><h2 class="next_title">'+ nextTitleSlide1 +'<h2></div>').insertBefore($('.impi_next_here_header .et_pb_slides'));

               $('.impi_next_here_header .slider_next_post_img').css('background-image', nextBgImageSlide1);




               var homeSlideItemsCount = $('.impi_next_here_header .et_pb_slide').length;

               $('<div class="slider_number"><span class="numers_line"><span class="numers_line_inner"></span></span><</div>').insertAfter($('.impi_next_here_header .et_pb_slider'));
               var lineWidth = $('.impi_next_here_header .slider_number .numers_line').width();
               var lineInnerWidth = lineWidth/homeSlideItemsCount;
               $('.impi_next_here_header .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

               $(".impi_next_here_header .et_pb_slider .et-pb-slider-arrows a").on('click', function (e) {
                   setTimeout(function () {
                       if ($('.impi_next_here_header .et_pb_slide.et-pb-active-slide').nextAll().length <= 0) {
                           nextBgImageSlide1 = $('.impi_next_here_header .et_pb_slide:first-child').css('background-image');
                           nextTitleSlide1 = $('.impi_next_here_header .et_pb_slide:first-child h2.et_pb_slide_title').text();
                       }

                       if ($('.impi_next_here_header .et_pb_slide.et-pb-active-slide').nextAll().length > 0) {
                           nextBgImageSlide1 = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').next().css('background-image');
                           nextTitleSlide1 = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').next().find('h2.et_pb_slide_title').text()
                       }

                       $('.impi_next_here_header .slider_next_post_img').css('background-image', nextBgImageSlide1);
                       $('.impi_next_here_header .next_title').text(nextTitleSlide1);


                       setTimeout(function () {
                           var showSlideItemsCountLine = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').prevAll().length;
                           var showSlideItemsCount = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                           $('.impi_next_here_header .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                           $('.impi_next_here_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)')

                       }, 200);
                   }, 100);
               });
           }, 1500);




           setInterval(function () {



               var showHomeSlideritems = 1;
               var homeSlideItemsCount = $('.impi_next_here_header .et_pb_slide').length;
               var lineWidth = $('.impi_next_here_header .slider_number .numers_line').width();
               var lineInnerWidth = lineWidth/homeSlideItemsCount;
               var showSlideItemsCountLine = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').prevAll().length;
               var showSlideItemsCount = $('.impi_next_here_header .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;



               $('.impi_next_here_header .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*showSlideItemsCountLine +'px,0)');



           }, 50);




           //Impi Ally Header
           setTimeout(function () {
               if ($('.impi_ally_header').length !== 0) {


                   var activeSlideNumber = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').prevAll().length;
                   var activeSlideNumber1 = activeSlideNumber + 2;
                   var activeSlideNumber2 = activeSlideNumber + 3;


                   var nextSlideTitle = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();

                   var next2SlideTitle = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').next().next().find('h2.et_pb_slide_title').text();



                   $('<div class="next_post_title_container"><div class="next_post"><span class="sldie_count">0'+ activeSlideNumber1 +'</span><h2 class="next_post_title">' + nextSlideTitle + '</h2></div><div class="next2_post"><span class="sldie_count2">0'+ activeSlideNumber2 +'</span><h2 class="next2_post_title">' + next2SlideTitle + '</h2></div></div>').insertAfter($('.impi_ally_header .et_pb_slides '));

                   $('.impi_ally_header .et_pb_slider .et-pb-slider-arrows a, .impi_ally_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                       setTimeout(function () {

                           if ($('.impi_ally_header .et_pb_slider .et-pb-active-slide').nextAll().length > 1) {
                               var activeSlideNumberClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').prevAll().length;
                               var activeSlideNumber1Click = activeSlideNumberClick + 2;
                               var activeSlideNumber2Click = activeSlideNumberClick + 3;
                               $('.impi_ally_header .sldie_count').text('0'+ activeSlideNumber1Click);
                               $('.impi_ally_header .sldie_count2').text('0'+ activeSlideNumber2Click);
                               var nextSlideTitleClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();

                               $('.impi_ally_header .next_post_title').text(nextSlideTitleClick);

                               var next2SlideTitleClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').next().next().find('h2.et_pb_slide_title').text();

                               $('.impi_ally_header .next2_post_title').text(next2SlideTitleClick);


                           } else if ($('.impi_ally_header .et_pb_slider .et-pb-active-slide').nextAll().length === 1){
                               var activeSlideNumberClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').prevAll().length;
                               var activeSlideNumber1Click = activeSlideNumberClick + 2;
                               var activeSlideNumber2Click = 1;
                               $('.impi_ally_header .sldie_count').text('0'+ activeSlideNumber1Click);
                               $('.impi_ally_header .sldie_count2').text('0'+ activeSlideNumber2Click);

                               var nextSlideTitleClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').next().find('h2.et_pb_slide_title').text();

                               $('.impi_ally_header .next_post_title').text(nextSlideTitleClick);

                               var next2SlideTitleClick = $('.impi_ally_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();

                               $('.impi_ally_header .next2_post_title').text(next2SlideTitleClick);

                           }else if ($('.impi_ally_header .et_pb_slider .et-pb-active-slide').nextAll().length === 0){

                               var activeSlideNumber1Click = 1;
                               var activeSlideNumber2Click = 2;
                               $('.impi_ally_header .sldie_count').text('0'+ activeSlideNumber1Click);
                               $('.impi_ally_header .sldie_count2').text('0'+ activeSlideNumber2Click);
                               var activeSlideNumberClick = $('.impi_ally_header .et_pb_slider .et-pb-active-slide').prevAll().length;
                               var activeSlideNumber1Click = activeSlideNumber + 1;
                               var activeSlideNumber2Click = activeSlideNumber + 2;
                               $('.impi_ally_header .sldie_count').text('0'+ activeSlideNumber1Click);
                               $('.impi_ally_header .sldie_count2').text('0'+ activeSlideNumber2Click);

                               var nextSlideTitleClick = $('.impi_ally_header .et_pb_slider .et_pb_slide:first-child').find('h2.et_pb_slide_title').text();

                               $('.impi_ally_header .next_post_title').text(nextSlideTitleClick);

                               var next2SlideTitleClick = $('.impi_ally_header .et_pb_slider .et_pb_slide:nth-child(2)').find('h2.et_pb_slide_title').text();
                               $('.impi_ally_header .next2_post_title').text(next2SlideTitleClick);
                           }

                       }, 0)

                   })
               }
           }, 1000);



           var endorser_header_timeOut = 1500;

           function isIE() {
               ua = navigator.userAgent;
               /* MSIE used to detect old browsers and Trident used to newer ones*/
               var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

               return is_ie;
           }
           /* Create an alert to show if the browser is IE or not */
           if (isIE()){
               endorser_header_timeOut = 5000;
           }


           setTimeout(function () {


               $('.impi_endorser_header .et_pb_slider .et-pb-controllers a').each(function () {
                   var thisNumber = $(this).text();
                   $(this).html('<span class="slide_number">0'+ thisNumber +'</span><div class="slide_title"></div>');
               });

               var classCountC = "1";
               $('.impi_endorser_header .et_pb_slide').each(function () {
                   var attrText = $(this).find('.et_pb_slide_description .et_pb_slide_title').text();
                   $('.impi_endorser_header .et-pb-controllers a:nth-child(' + classCountC + ') .slide_title').text(attrText);
                   classCountC++;
               });

               $('.impi_endorser_header .et_pb_slider .et-pb-controllers a.et-pb-active-control .slide_title').show('slow');


               $('.impi_endorser_header .et_pb_slider .et-pb-controllers a').on('click', function () {
                   $('.impi_endorser_header .et_pb_slider .et-pb-controllers a .slide_title').slideUp('slow');
                   $(this).find('.slide_title').slideDown('slow');
               });

               $('.impi_endorser_header .et-pb-slider-arrows a').on('click', function () {
                   setTimeout(function () {
                       $('.impi_endorser_header .et_pb_slider .et-pb-controllers a .slide_title').hide('slow');
                       $('.impi_endorser_header .et_pb_slider .et-pb-controllers a.et-pb-active-control .slide_title').show('slow');
                   },200)

               })

           }, endorser_header_timeOut);





           setTimeout(function () {
               $('.impi_top_dog_header .et_pb_slider .et_pb_slide').each(function () {
                   var buttonBgImage = $(this).css('background-image');
//                    buttonBgImage = buttonBgImage.replace('url(','').replace(')','').replace(/\"/gi, "");

                   $(this).find('.et_pb_button_wrapper .et_pb_button').css('background-image', buttonBgImage);
                   $(this).css('background-image', 'none');
               })
           }, endorser_header_timeOut);




           setTimeout(function () {
               var nextBgImageSlide1 = $('.impi_heroine_product_slider .et_pb_slide:nth-child(2) .et_pb_slide_image img').attr('src');
               $('<div class="slider_next_post_img"></div>').insertAfter($('.impi_heroine_product_slider .et_pb_slides'));

               $('.impi_heroine_product_slider .slider_next_post_img').css('background-image', 'url('+ nextBgImageSlide1 +')');


               $('.impi_heroine_product_slider .et-pb-controllers a, .impi_heroine_product_slider .et-pb-slider-arrows a').on('click', function (event) {
                   event.preventDefault();

                   setTimeout(function () {
                       if ($('.impi_heroine_product_slider .et_pb_slide.et-pb-active-slide').nextAll().length <= 0) {
                           nextBgImageSlide1 = $('.impi_heroine_product_slider .et_pb_slide:first-child .et_pb_slide_image img').attr('src');
                       }

                       if ($('.impi_heroine_product_slider .et_pb_slide.et-pb-active-slide').nextAll().length > 0) {
                           nextBgImageSlide1 = $('.impi_heroine_product_slider .et_pb_slide.et-pb-active-slide').next().find(' .et_pb_slide_image img').attr('src');
                       }

                       $('.impi_heroine_product_slider .slider_next_post_img').css('background-image', 'url('+ nextBgImageSlide1 +')');
                   }, 100);

               });
           }, endorser_header_timeOut);


        })(jQuery);