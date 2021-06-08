(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonsTimeOut = 2000;

    if (isIE()) {
        freddiePersonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonsTimeOut = 10000;
    }

    setTimeout(function () {

       if ($('.freddie_dead_on_time_personal').length !== 0) {
            var showItemsCount = 4;

            if ($(window).width() <= 980) {
                showItemsCount = 3;
            }
            if ($(window).width() <= 767) {
                showItemsCount = 2;
            }
            if ($(window).width() <= 480) {
                showItemsCount = 1;
            }

            $('.freddie_dead_on_time_personal').each(function () {
                if($(this).hasClass('freddie_alive_on_time_person')){
                    if ($(window).width() >= 981) {
                        $(this).find('.et_pb_slider .et_pb_slide:first-child').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'))
                        $(this).find('.et_pb_slider .et_pb_slide:nth-child(2)').clone().insertAfter($(this).find('.et_pb_slider .et_pb_slide:last-child'))
                    }
                }

                $(this).find('.et_pb_slider .et_pb_slide:first-child').addClass('active_slide');


                var sliderWidth = $(this).find('.et_pb_slider').width();

                if($(this).hasClass('freddie_alive_on_time_person')){
                    var sliderWidth = $(this).find('.slider_row').width();
                }


                var slidesCount = $(this).find('.et_pb_slider .et_pb_slide').length;
                var slidesWidth = sliderWidth / showItemsCount;
                var sliderContainerWidth = slidesCount * slidesWidth;


                $(this).find('.et_pb_slider .et_pb_slide').width(slidesWidth);
                $(this).find('.et_pb_slider .et_pb_slides').width(sliderContainerWidth);


                if($(this).hasClass('freddie_alive_on_time_person')){
                    if ($(window).width() >= 981) {
                        var arrowRught = $(this).find('.et-pb-slider-arrows').css('right');
                        arrowRught = parseInt(arrowRught, 10);
                        $(this).find('.et-pb-slider-arrows').css('right', (arrowRught + slidesWidth) + 'px')
                        $(this).find('.et_pb_slider ').css('margin-left', '-'+ slidesWidth +'px');
                        $(this).find('.et_pb_slider ').css('margin-right', '-'+ slidesWidth +'px');
                    }

                }
            })

            $('.freddie_dead_on_time_personal .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
                e.preventDefault();
                var thisArrow = $(this);
                setTimeout(function () {
                    if(thisArrow.closest('.freddie_dead_on_time_personal').hasClass('freddie_alive_on_time_person') && $(window).width() >= 981){

                            if(thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length <= (showItemsCount + 1)){
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide')
                            }else{
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide');
                            }


                    }else{
                        if(thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length <= (showItemsCount -1)){
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide')
                        }else{
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide');
                        }
                    }

                }, 100)
            })

            $('.freddie_dead_on_time_personal .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
                e.preventDefault();
                var thisArrow = $(this);
                setTimeout(function () {
                    if(thisArrow.closest('.freddie_dead_on_time_personal').hasClass('freddie_alive_on_time_person') && $(window).width() >= 981){

                            if(thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length <= 0){
                                var lastActiveItem = thisArrow.closest('.et_pb_slider').find('.et_pb_slide').length - (showItemsCount + 1);
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-child('+ lastActiveItem +')').addClass('active_slide')
                            }else{
                                thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev('.et_pb_slide').addClass('active_slide');
                            }

                    }else{
                        if(thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length <= 0){
                            var lastActiveItem = thisArrow.closest('.et_pb_slider').find('.et_pb_slide').length - (showItemsCount - 1);
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide')
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-child('+ lastActiveItem +')').addClass('active_slide')
                        }else{
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev('.et_pb_slide').addClass('active_slide');
                        }
                    }

                }, 100)
            })


            $('.freddie_dead_on_time_personal .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();

                var thisArrow = $(this);
                setTimeout(function () {
                    var slidesWidth = thisArrow.closest('.et_pb_slider').find('.et_pb_slide').width();
                    var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;

                    thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                }, 100)


            })

        }

        // Freddie Lap of gods Person Module

        if($('.freddie_lap_of_gods_person_module').length !== 0){
            var windowHeight = $(window).height();
            var elementSectionTop = $('.freddie_lap_of_gods_person_module').offset().top;
            var elementPersons = $('.freddie_lap_of_gods_person_module .et_pb_team_member').toArray();
            var scrollTopSize = $(window).scrollTop();


            if(scrollTopSize >= elementSectionTop){
                var t1Team = new TimelineLite;
                t1Team.staggerTo($('.freddie_lap_of_gods_person_module .et_pb_team_member'), 0.6, {
                    x: 0,
                    y: 0,
                    opacity: 1,
                    ease: Power4.easeOut
                }, .1);
            }


            var scrollTopAfterScrolling = 1;

            if($('body').hasClass('logged-in')){
                scrollTopAfterScrolling = 33;

                if($(window).width() <= 782){
                    scrollTopAfterScrolling = 47;
                }
            }



            var lastScrollTop = 0;
        }


           function freddieLapFooterScroll() {

               if($('.freddie_lap_of_gods_person_module').length !== 0) {


                   // scrollTopSize = $(window).scrollTop();

                   var st = $(this).scrollTop();


                   if (st > lastScrollTop) {
                       if (st > 0 && !$('.freddie_lap_of_gods_person_module').hasClass('visible')) {

                           var t1Team = new TimelineLite;
                           t1Team.staggerTo(elementPersons, 2, {
                               x: 0,
                               y: 0,
                               opacity: 1,
                               delay: 1,
                               ease: Power4.easeOut
                           }, .1);

                           t1Team2 = new TimelineLite;
                           t1Team2.to($('.freddie_lap_of_gods_person_module .et_pb_text'), 1, {
                               x: 0,
                               y: 0,
                               opacity: 1,
                               ease: Power4.easeOut
                           }, 1);

                           $('.freddie_lap_of_gods_person_module').addClass('visible')

                           setTimeout(function () {
                               if(!$('.freddie_lap_of_gods_person_module').hasClass('disable_animation')){
                                   $(window).scrollTop(1);
                               }
                               $('.freddie_lap_of_gods_person_module').css('position', 'relative');

                           }, 2000)


                       }

                   } else {
                       if (st <= 0 && $('.freddie_lap_of_gods_person_module').hasClass('visible')) {
                           var t1Team = new TimelineLite;
                           t1Team.staggerTo(elementPersons, 2, {
                               x: 0,
                               y: "300px",
                               opacity: 0,
                               ease: Power4.easeOut
                           }, .1);

                           t1Team2 = new TimelineLite;
                           t1Team2.to($('.freddie_lap_of_gods_person_module .et_pb_text'), 1, {
                               x: 0,
                               y: "150px",
                               opacity: 0,
                               ease: Power4.easeOut
                           }, 0.5);


                           $('.freddie_lap_of_gods_person_module').removeClass('visible');
                           $('.freddie_lap_of_gods_person_module').css('position', 'fixed');
                       }
                   }
                   lastScrollTop = st;
               }
           }

        var pathname = window.location.href;

        setTimeout(function () {


            if(pathname.indexOf('#') > -1){
                var n = pathname.lastIndexOf('#');
                var result = pathname.substring(n + 1);
                $('.freddie_lap_of_gods_person_module').css('position', 'relative');
                TweenLite.to(window, 2, {scrollTo:"#" + result});

            }
        },0)
        var scrollTimeOut = 0;
        if(pathname.indexOf('#') > -1){
            scrollTimeOut = 2100;
        }

        setTimeout(function () {
            $(window).scroll(function () {
                freddieLapFooterScroll();
            })
            scrollTimeOut = 0;
        },scrollTimeOut)

            if ($('body').hasClass('os-host')) {
                var freddiePersonLapOfGods = OverlayScrollbars($("body"), {
                    callbacks: {
                        onScroll: function () { freddieLapFooterScroll(); }
                    }
                });

            }

            // Freddie Waltz person module

        $('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {

            $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
        })



        setTimeout(function () {
            var nextElemBgImage = $('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
            $('<div class="next_slide_image"></div>').insertAfter( $('#page-container .freddie_waltz_person_module .et_pb_slider .et-pb-slider-arrows'))
            $('.freddie_waltz_person_module .et_pb_slider .next_slide_image').css('background-image', 'url('+ nextElemBgImage +')');


            $('#page-container .freddie_waltz_person_module .et_pb_slider .et-pb-slider-arrows').prepend($('<span class="number">01</span>'));


            var prevText = $('#page-container .freddie_waltz_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text();

            $('#page-container .freddie_waltz_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text(prevText.replace('ious', ''))

            $('.freddie_waltz_person_module .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();
                setTimeout(function () {
                    var prevElemLengts = $('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    if (prevElemLengts < 10) {
                        prevElemLengts = "0" + prevElemLengts;
                    }
                    $('.freddie_waltz_person_module .et-pb-slider-arrows span.number').text(prevElemLengts);


                    if($('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').nextAll().length !== 0){
                        nextElemBgImage = $('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                        $('.freddie_waltz_person_module .et_pb_slider .next_slide_image').css('background-image', 'url('+ nextElemBgImage +')');
                    }else{
                        nextElemBgImage = $('.freddie_waltz_person_module .et_pb_slider .et_pb_slides .et_pb_slide:first-child .et_pb_slide_image img').attr('src');
                        $('.freddie_waltz_person_module .et_pb_slider .next_slide_image').css('background-image', 'url('+ nextElemBgImage +')');
                    }

                }, 50)


            })
        },1500)


    }, freddiePersonsTimeOut);

})(jQuery);