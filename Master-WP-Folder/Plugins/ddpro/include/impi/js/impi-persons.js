(function ($) {

    $('<a class="icons_button"><span>+</span></a>').prependTo($('.impi_person_2 .et_pb_member_social_links'));

    $('.impi_person_2 .et_pb_member_social_links a.icons_button').on('click', function () {
        if ($(this).parent('.et_pb_member_social_links').hasClass('animation')) {
            $(this).parent('.et_pb_member_social_links').removeClass('animation');
        } else {
            $(this).parent('.et_pb_member_social_links').addClass('animation');
        }
    })


    //        Person 3 Slider

    //            Slide Sizes  ***************************************************************************

    var timeOutImpiPerson3Inner = 2500;
    var timeOutImpiPerson3 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutImpiPerson3 = 7000;
        var timeOutImpiPerson3Inner = 0;
    }
    setTimeout(function () {
        if ($('.impi_person_3').length > 0) {
            setTimeout(function () {
                $('<div class="impi_person3_slide_outer_container"><div class="person3_slide_container"></div></div>').appendTo($('.impi_person_3 .et_pb_column_4_4'));
                $('.impi_person_3 .et_pb_team_member').each(function () {
                    $(this).appendTo($('.person3_slide_container'));
                });


                $('.impi_person_3 .et_pb_team_member:first-child').addClass('active_slide');
                var showPersonSlideritems = 2;


                if ($(window).width() <= "767") {
                    showPersonSlideritems = 1;

                }

                var slideItemsCount = $('.impi_person_3 .et_pb_team_member').length;
                var slideInnerWidth = $('.impi_person_3 .et_pb_column_4_4').width();

                $('.impi_person_3 .et_pb_team_member').css("cssText", "width: " + Math.floor(slideInnerWidth / showPersonSlideritems) + "px !important;");
                var slideItemswidth = $('.impi_person_3 .et_pb_team_member').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('.impi_person_3 .person3_slide_container').css("cssText", "width: " + slideWidth + "px !important;");
            }, timeOutImpiPerson3Inner);
        }


        //            Slide Arrows  ***************************************************************************


        setTimeout(function () {
            $('<div class="persons3-slider-arrows"><a class="person-arrow-prev" href="#">#</a><a class="person-arrow-next" href="#">$</a></div>').appendTo($('.impi_person_3 .et_pb_column_4_4'));

            var person_3_afterActiveElement = 1;
            var person_3_nthElement = 2;

            if ($(window).width() <= "767") {
                person_3_afterActiveElement = 0;
                person_3_nthElement = 1;
            }

            $('.impi_person_3 .persons3-slider-arrows a.person-arrow-prev').on('click', function () {
                if ($('.impi_person_3 .et_pb_team_member.active_slide').prev().length === 1) {
                    $('.impi_person_3 .et_pb_team_member.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                } else {
                    $('.impi_person_3 .et_pb_team_member.active_slide').removeClass('active_slide');
                    $('.impi_person_3 .et_pb_team_member:nth-last-child(' + person_3_nthElement + ')').addClass('active_slide');
                }
            });

            $('.impi_person_3 .persons3-slider-arrows a.person-arrow-next').on('click', function () {

                if ($('.impi_person_3 .et_pb_team_member.active_slide').nextAll().length > person_3_afterActiveElement) {
                    $('.impi_person_3 .et_pb_team_member.active_slide').removeClass('active_slide').next().addClass('active_slide');
                } else {
                    $('.impi_person_3 .et_pb_team_member.active_slide').removeClass('active_slide');
                    $('.impi_person_3 .et_pb_team_member:first-child').addClass('active_slide');
                }
            });

            $('.impi_person_3 .persons3-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                var slideItemswidth = $('.impi_person_3 .et_pb_team_member').outerWidth();
                var slider5SlideSize1 = $('.impi_person_3 .et_pb_team_member.active_slide').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                $('.impi_person_3 .person3_slide_container').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            });
        }, timeOutImpiPerson3Inner);
    }, timeOutImpiPerson3);

    //        End Person 3 Slider


    //        Person 4 Slider

    //            Slide Sizes  ***************************************************************************

    var timeOutImpiPerson4Inner = 2500;
    var timeOutImpiPerson4 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutImpiPerson4 = 7000;
        var timeOutImpiPerson4Inner = 0;
    }

    setTimeout(function () {
        if ($('.impi_person_4').length > 0) {
            setTimeout(function () {
                $('<div class="impi_person4_slide_outer_container"><div class="person4_slide_container"></div></div>').appendTo($('.impi_person_4 .et_pb_column_3_4'));
                $('.impi_person_4').each(function () {
                    $(this).find('.et_pb_team_member').appendTo($(this).find('.person4_slide_container'));
                });


                $('.impi_person_4 .et_pb_team_member:first-child').addClass('active_slide');
                var showPersonSlideritems = 3;

                if ($(window).width() <= "767") {
                    showPersonSlideritems = 2;

                }

                if ($(window).width() <= "480") {
                    showPersonSlideritems = 1;

                }

                var slideItemsCount = [];
                $('.impi_person_4').each(function () {
                    slideItemsCount = $(this).find('.et_pb_team_member').length;


                    var slideInnerWidth = $(this).find('.et_pb_column_3_4').width();
                    $('<div class="slider_number"><span class="slider_active_number">' + showPersonSlideritems + '</span>/<span>' + slideItemsCount + '</span></div>').insertAfter($(this).find('.et_pb_promo'));

                    $(this).find('.et_pb_team_member').css("cssText", "width: " + Math.floor(slideInnerWidth / showPersonSlideritems) + "px !important;");

                    var slideItemswidth = $(this).find('.et_pb_team_member').outerWidth();
                    var slideWidth = slideItemsCount * slideItemswidth;

                    $(this).find('.person4_slide_container').css("cssText", "width: " + slideWidth + "px !important;");

                });
            }, timeOutImpiPerson4Inner);
        }


        //            Slide Arrows  ***************************************************************************


        setTimeout(function () {
            $('<div class="persons4-slider-arrows"><a class="person-arrow-prev" href="#">4</a><a class="person-arrow-next" href="#">5</a></div>').appendTo($('.impi_person_4 .et_pb_row '));

            var person_3_afterActiveElement = 2;
            var person_3_nthElement = 3;

            if ($(window).width() <= "767") {
                person_3_afterActiveElement = 1;
                person_3_nthElement = 2;
            }

            if ($(window).width() <= "480") {
                person_3_afterActiveElement = 0;
                person_3_nthElement = 1;
            }

            $('.impi_person_4 .persons4-slider-arrows a.person-arrow-prev').on('click', function () {

                if ($(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').prev().length === 1) {
                    $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                } else {
                    $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').removeClass('active_slide');
                    $(this).closest('.impi_person_4').find('.et_pb_team_member:nth-last-child(' + person_3_nthElement + ')').addClass('active_slide');
                }
            });

            $('.impi_person_4 .persons4-slider-arrows a.person-arrow-next').on('click', function () {

                if ($(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').nextAll().length > person_3_afterActiveElement) {
                    $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').removeClass('active_slide').next().addClass('active_slide');
                } else {
                    $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').removeClass('active_slide');
                    $(this).closest('.impi_person_4').find('.et_pb_team_member:first-child').addClass('active_slide');
                }
            });

            var showPersonSlideritems = 3;

            if ($(window).width() <= "767") {
                showPersonSlideritems = 2;

            }

            if ($(window).width() <= "480") {
                showPersonSlideritems = 1;

            }

            $('.impi_person_4 .persons4-slider-arrows a').on('click', function (event) {
                event.preventDefault();


                var showSlideItemsCount = $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').prevAll().length + showPersonSlideritems;
                $(this).closest('.impi_person_4').find('.slider_number .slider_active_number').text(showSlideItemsCount);


                var slideItemswidth = $(this).closest('.impi_person_4').find('.et_pb_team_member').outerWidth();
                var slider5SlideSize1 = $(this).closest('.impi_person_4').find('.et_pb_team_member.active_slide').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                $(this).closest('.impi_person_4').find('.person4_slide_container').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            });
        }, timeOutImpiPerson4Inner);
    }, timeOutImpiPerson4);

    //        End Person 4 Slider


    //        Person 1 Slider

    $('.impi_person_1 .et_pb_team_member').each(function () {
        $(this).find('.et_pb_team_member_description p.et_pb_member_position').appendTo($(this).find('.et_pb_team_member_description'));
    });


    $('.et_pb_team_member_description p:not(.et_pb_member_position)').each(function () {
        $(this).succinct({
            size: 240
        });
    });


    //            Slide Sizes  ***************************************************************************

    var timeOutImpiPerson1Inner = 2500;
    var timeOutImpiPerson1 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutImpiPerson1 = 7000;
        timeOutImpiPerson1Inner = 0;
    }

    setTimeout(function () {
        if ($('.impi_person_1').length > 0) {
            setTimeout(function () {
                $('<div class="impi_person1_slide_outer_container"><div class="person1_slide_container"></div></div>').appendTo($('.impi_person_1 .et_pb_column_4_4'));
                $('<div class="impi_person1_slide_outer_container"><div class="person1_slide_container"></div></div>').appendTo($('.impi_box_slider_person .et_pb_column_2_3'));
                $('.impi_person_1').each(function () {
                    $(this).find('.et_pb_team_member').appendTo($(this).find('.person1_slide_container'));
                });


                $('.impi_person_1 .et_pb_team_member:first-child').addClass('active_slide');
                var slideItemsCount = $('.impi_person_1 .et_pb_team_member').length;


                $('<div class="slide_dots"></div>').appendTo($('.impi_person_1 .impi_person1_slide_outer_container '));

                $('.impi_person_1 ').each(function () {
                    var descHeight = 0;
                    $(this).find('.et_pb_team_member .et_pb_team_member_description').each(function () {
                        var thisHeight = $(this).outerHeight();
                        if (thisHeight > descHeight) {
                            descHeight = thisHeight;
                        }
                    });


                    descHeight = descHeight + 20;
                    $(this).find('.impi_person1_slide_outer_container .slide_dots').css('top', descHeight);

                });

                $('.impi_person_1').each(function () {
                    var slideItemsCount = $(this).find('.et_pb_team_member').length;
                    for (i = 0; i < slideItemsCount; i++) {
                        $('<a class="dor_' + i + '">' + i + '</a>').appendTo($(this).find('.impi_person1_slide_outer_container .slide_dots'));
                    }
                });


                $('.impi_person_1 .impi_person1_slide_outer_container .slide_dots a:first-child').addClass('active_dot');
                $('.impi_person_1 .impi_person1_slide_outer_container .slide_dots a').on('click', function () {
                    $('.impi_person_1 .impi_person1_slide_outer_container .slide_dots a').removeClass('active_dot');
                    $(this).addClass('active_dot');
                    var dotsSlideCount = $(this).text();
                    var dotsSlideCount2 = parseInt(dotsSlideCount) + 1;
                    $('.impi_person_1 .et_pb_team_member.active_slide').removeClass('active_slide');

                    $('.impi_person_1 .et_pb_team_member:nth-child(' + dotsSlideCount2 + ')').addClass('active_slide');

                    if ($('.impi_person_1 .et_pb_team_member.active_slide').nextAll().length <= 0) {
                        nextBgImage = $('.impi_person_1 .et_pb_team_member:first-child .et_pb_team_member_image img').attr('src');

                    }

                    if ($('.impi_person_1 .et_pb_team_member.active_slide').nextAll().length > 0) {
                        nextBgImage = $('.impi_person_1 .et_pb_team_member.active_slide').next().find('.et_pb_team_member_image img').attr('src');

                    }

                    $('.impi_person_1 .persons1-slider-arrows a.person-arrow-next .next_post_img').css('background-image', 'url(' + nextBgImage + ')')

                });

            }, timeOutImpiPerson1Inner);
        }


        //            Slide Arrows  ***************************************************************************


        setTimeout(function () {
            $('<div class="persons1-slider-arrows"><a class="person-arrow-prev" href="#"><span class="icon">4</span><span class="next_post_img"></span></a><a class="person-arrow-next" href="#"><span class="icon">5</span><span class="next_post_img"></span></a></div>').appendTo($('.impi_person_1 .et_pb_column_4_4 '));
            $('<div class="persons1-slider-arrows"><a class="person-arrow-prev" href="#"><span class="icon">4</span><span class="next_post_img"></span></a><a class="person-arrow-next" href="#"><span class="icon">5</span><span class="next_post_img"></span></a></div>').appendTo($('.impi_box_slider_person .et_pb_column_2_3 '));
            var nextBgImage = "";

            nextBgImage = $('.impi_person_1 .et_pb_team_member:nth-child(2) .et_pb_team_member_image img').attr('src');

            $('.impi_person_1 .persons1-slider-arrows a.person-arrow-next .next_post_img').css('background-image', 'url(' + nextBgImage + ')');

            var person_3_afterActiveElement = 0;
            var person_3_nthElement = 1;

            if ($(window).width() <= "480") {
                person_3_afterActiveElement = 0;
                person_3_nthElement = 1;
            }

            $('.impi_person_1 .persons1-slider-arrows a.person-arrow-prev').on('click', function () {
                console.log($(this).parent().parent().find('.et_pb_team_member.active_slide').prevAll().length);
                $('.person1_slide_container').removeClass('clickedPrev').removeClass('clickedNext').addClass('clickedPrev');
                if ($(this).parent().parent().find('.et_pb_team_member.active_slide').prev().length === 1) {
                    $('.impi_person_1 .et_pb_team_member.moved_slide').removeClass('moved_slide');
                    $('.impi_person_1 .et_pb_team_member.active_slide').addClass('moved_slide').removeClass('active_slide').prev().addClass('active_slide');
                } else {
                    $('.impi_person_1 .et_pb_team_member.moved_slide').removeClass('moved_slide');
                    $('.impi_person_1 .et_pb_team_member.active_slide').addClass('moved_slide').removeClass('active_slide');
                    $('.impi_person_1 .et_pb_team_member:nth-last-child(' + person_3_nthElement + ')').addClass('active_slide');
                }
            });

            $('.impi_person_1 .persons1-slider-arrows a.person-arrow-next').on('click', function () {

                $('.impi_person_1 .person1_slide_container').removeClass('clickedNext').removeClass('clickedPrev').addClass('clickedNext');
                if ($('.impi_person_1 .et_pb_team_member.active_slide').nextAll().length > person_3_afterActiveElement) {
                    $('.impi_person_1 .et_pb_team_member.moved_slide').removeClass('moved_slide');
                    $('.impi_person_1 .et_pb_team_member.active_slide').addClass('moved_slide').removeClass('active_slide').next().addClass('active_slide');


                } else {
                    $('.impi_person_1 .et_pb_team_member.moved_slide').removeClass('moved_slide');
                    $('.impi_person_1 .et_pb_team_member.active_slide').addClass('moved_slide').removeClass('active_slide');
                    $('.impi_person_1 .et_pb_team_member:first-child').addClass('active_slide');
                }

            });

            $('.impi_person_1 .persons1-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                var beforeActiveSlide = $(this).parent().parent().find('.et_pb_team_member.active_slide').prevAll().length;

                $('.impi_person_1 .impi_person1_slide_outer_container .slide_dots a').removeClass('active_dot');
                $('.impi_person_1 .impi_person1_slide_outer_container .slide_dots a.dor_' + beforeActiveSlide + '').addClass('active_dot');
                if ($('.impi_person_1 .et_pb_team_member.active_slide').nextAll().length <= 0) {
                    nextBgImage = $('.impi_person_1 .et_pb_team_member:first-child .et_pb_team_member_image img').attr('src');
                }

                if ($('.impi_person_1 .et_pb_team_member.active_slide').nextAll().length > 0) {
                    nextBgImage = $('.impi_person_1 .et_pb_team_member.active_slide').next().find('.et_pb_team_member_image img').attr('src');
                }

                $('.impi_person_1 .persons1-slider-arrows a.person-arrow-next .next_post_img').css('background-image', 'url(' + nextBgImage + ')')

            });
        }, timeOutImpiPerson1Inner);
    }, timeOutImpiPerson1);


    //        End Person 1 Slider


    //              Impi Guardian Person Module

    var timeOutPortfolio6 = 0;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio6 = 2000;
    }


    function isIE() {
        ua = navigator.userAgent;
        /* MSIE used to detect old browsers and Trident used to newer ones*/
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }
    /* Create an alert to show if the browser is IE or not */
    if (isIE()){
        timeOutPortfolio6 = 3000;
    }

    function guardianPerson() {


        if ($('.impi_guardian_person ').length > 0) {


            $('<div class="person-slider-items"></div>').appendTo($('body .impi_guardian_person .et_pb_column_3_4'));
            $('<div class="person-slider-arrows"><a class="person-arrow-prev" href="#">B</a><a class="person-arrow-next" href="#">C</a></div>').appendTo($('body .impi_guardian_person .et_pb_column_3_4'));

            $('.impi_guardian_person .et_pb_team_member:first-child').addClass('active_slide');



            setTimeout(function () {
                var nextBgImageSlide1 = $('.impi_guardian_person .et_pb_team_member:nth-child(2) .et_pb_team_member_image img').attr('src');
                $('<div class="slider_next_post_img"></div>').appendTo($('.impi_guardian_person .et_pb_column_1_4'));

                $('.impi_guardian_person .slider_next_post_img').css('background-image', 'url('+ nextBgImageSlide1 +')');

                $('.impi_guardian_person .et_pb_team_member').each(function () {

                    $(this).css({'width' : Math.floor($('.impi_guardian_person .et_pb_column_3_4').width())});
                    $(this).appendTo($('.impi_guardian_person .person-slider-items'));

                });


                var showPersonSlideritems = 1;
                var slideItemsCount = $('.impi_guardian_person .et_pb_team_member').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showPersonSlideritems + '</span>/<span>0' + slideItemsCount + '</span></div>').insertAfter($('.impi_guardian_person .person-slider-arrows'));

                var slideItemswidth = $('.impi_guardian_person .et_pb_team_member').outerHeight();
                var slideWidth = slideItemsCount * slideItemswidth;


                $('.impi_guardian_person .et_pb_column_3_4').css("cssText", "height: " + slideItemswidth + "px !important;");
                $('.impi_guardian_person .person-slider-items').css("cssText", "height: " + slideWidth + "px !important;");


                $('.impi_guardian_person .person-slider-arrows a.person-arrow-prev').on('click', function () {
                    if ($('.impi_guardian_person .et_pb_team_member.active_slide').prev().length === 1) {
                        $('.impi_guardian_person .et_pb_team_member.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    } else {
                        $('.impi_guardian_person .et_pb_team_member.active_slide').removeClass('active_slide');
                        $('.impi_guardian_person .et_pb_team_member:last-child').addClass('active_slide');
                    }
                });

                $('.impi_guardian_person .person-slider-arrows a.person-arrow-next').on('click', function () {
                    if ($('.impi_guardian_person .et_pb_team_member.active_slide').nextAll().length > 0) {
                        $('.impi_guardian_person .et_pb_team_member.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    } else {
                        $('.impi_guardian_person .et_pb_team_member.active_slide').removeClass('active_slide');
                        $('.impi_guardian_person .et_pb_team_member:first-child').addClass('active_slide');
                    }



                });

                $('.impi_guardian_person .person-slider-arrows a').on('click', function (event) {
                    event.preventDefault();
                    var sliderSlideSize1 = $('.impi_guardian_person .et_pb_team_member.active_slide').prevAll().length;
                    var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                    $('.impi_guardian_person .person-slider-items').css('transform', 'translate(0, -' + sliderSlideSize2 + 'px)');

                    var showSlideItemsCount = $('.impi_guardian_person .et_pb_team_member.active_slide').prevAll().length + showPersonSlideritems;
                    $('.impi_guardian_person .slider_number .slider_active_number').text('0' + showSlideItemsCount);


                    setTimeout(function () {
                        if ($('.impi_guardian_person .et_pb_team_member.active_slide').nextAll().length <= 0) {
                            nextBgImageSlide1 = $('.impi_guardian_person .et_pb_team_member:first-child .et_pb_team_member_image img').attr('src');
                        }

                        if ($('.impi_guardian_person .et_pb_team_member.active_slide').nextAll().length > 0) {
                            nextBgImageSlide1 = $('.impi_guardian_person .et_pb_team_member.active_slide').next().find(' .et_pb_team_member_image img').attr('src');
                        }

                        $('.impi_guardian_person .slider_next_post_img').css('background-image', 'url('+ nextBgImageSlide1 +')');
                    }, 100);

                });


            }, 1500);
        }
    }

    setTimeout(function () {
        guardianPerson();
    }, timeOutPortfolio6);
    setTimeout(function () {
        var hoverCount6 = 1;
        $('body.et-fb .impi_guardian_person').hover(function () {
            if (hoverCount6 === 1) {
                guardianPerson();
                hoverCount6 = 0;
            }

        });
    }, timeOutPortfolio6);

})(jQuery);