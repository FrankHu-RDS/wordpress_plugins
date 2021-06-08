(function ($) {
    //  FREDDIE HEADERS *******************************************************

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieHeadersTimeOut = 500;

    if (isIE()) {
        freddieHeadersTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieHeadersTimeOut = 10000;
    }

    setTimeout(function () {
        $('body').addClass("load_done");
    }, 5000);


    setTimeout(function () {
        $('.freddie_kind_of_magic_header .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        });


        var sectionBgImage = $('.freddie_kind_of_magic_header').css('background-image');
        var aboutBgImage = $('.freddie_kind_of_magic_header .about_cta').css('background-image');
        $('.freddie_kind_of_magic_header .about_cta').css('background-image', 'none');

        var exploreBgImage = $('.freddie_kind_of_magic_header .explore_cta').css('background-image');
        $('.freddie_kind_of_magic_header .explore_cta').css('background-image', 'none');

        $('.freddie_kind_of_magic_header .about_cta').hover(function () {
            $('.freddie_kind_of_magic_header').css('cssText', 'background-image: '+ aboutBgImage +' !important;');
            $('.freddie_kind_of_magic_header').addClass("hovered");
            $('.freddie_kind_of_magic_header .about_hover_text').addClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').addClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').addClass("hovered");
        }, function () {
            $('.freddie_kind_of_magic_header .about_hover_text').removeClass("hovered");
            if(sectionBgImage){
                $('.freddie_kind_of_magic_header').css('cssText', 'background-image: '+ sectionBgImage +' !important;');
            }else{
                $('.freddie_kind_of_magic_header').css('cssText', 'background-image: none !important');
            }

            $('.freddie_kind_of_magic_header').removeClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
        });

        $('.freddie_kind_of_magic_header .explore_cta').hover(function () {
            $('.freddie_kind_of_magic_header').css('cssText', 'background-image: '+ exploreBgImage +' !important;');
            $('.freddie_kind_of_magic_header').addClass("hovered");
            $('.freddie_kind_of_magic_header .explore_hover_text').addClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').addClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').addClass("hovered");
        }, function () {
            $('.freddie_kind_of_magic_header .explore_hover_text').removeClass("hovered");
            if(sectionBgImage){
                $('.freddie_kind_of_magic_header').css('cssText', 'background-image: '+ sectionBgImage +' !important;');
            }else{
                $('.freddie_kind_of_magic_header').css('cssText', 'background-image: none !important');
            }
            $('.freddie_kind_of_magic_header').removeClass("hovered");
            $('.freddie_kind_of_magic_header .cta_not_hover').removeClass("hovered");
            $('.freddie_kind_of_magic_header .about_cta').removeClass("hovered");
            $('.freddie_kind_of_magic_header .explore_cta').removeClass("hovered");
        });

        setTimeout(function () {
            $('#page-container .freddie_kind_of_magic_header .et_pb_row ').css('cssText', 'opacity: 1 !important;')
        },1500)

        // Freddie Drowse Header


        if ($('.freddie_drowse_header').length !== 0) {
            var splitText = new SplitText(".freddie_drowse_header .et_pb_column_4_4 .et_pb_promo_description p", {
                type: "words,chars",
                charsClass: "char char++",
                position: "static"
            });
        }


        $('.freddie_drowse_header .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        })


        /*Freddie All Dead header*/


        if ($('.freddie_all_dead_header').length !== 0) {
            setTimeout(function () {
                var bgImageFirst = $(".freddie_all_dead_header").css('background-image');

                $('.freddie_all_dead_header .et_pb_text.text_link').hover(
                    function () {
                        var bgImage = $(this).css('background-image');
                        $('.freddie_all_dead_header').css("cssText", "background-image: " + bgImage + " !important");
                    }, function () {
                        $('.freddie_all_dead_header').css("cssText", "background-image: " + bgImageFirst + " !important");
                    }
                )
            }, 1000)
        }


        // Freddie For Everyone Header

        $('<svg class="module__wave wave_3"  viewBox="0 0 1000 158"> <path id="start" d="M 1000 31.36 C 1000 73.57 1000 115.78 1000 158 C 666.66 158 333.33 158 0 158 C 0 105.85 0 53.71 0 71.56 C 159.67 177.68 433.75 -73.67 542.6 37.3 C 816.22 307.09 720.64 26.32 1000 251.36"></path> </svg>').appendTo($('.freddie_for_everyone_header '));
        $('<svg class="module__wave wave_2" viewBox="0 0 1000 158"> <path id="start" d="M 1000 20.1 V 158 H 0 V 62 c -40 168.5 157.3 -75 360.6 -17.2 C 894.7 228.2 589.9 -83.4 1000 44.1 Z"></path> <path id="end" d="M1000,157v1H0v-1h502.6H1000z"></path> </svg>').appendTo($('.freddie_for_everyone_header '));
        $('<svg class="module__wave wave_1" viewBox="0 0 1000 158"> <path id="start" d="M 1000 32.61 C 1000 94.2 1000 96.39 1000 177.8 C 666.66 158 333.33 158 0 158 C 0 76.36 0 74.74 -138.7 62.61 C 149.84 256.87 226.2 27.53 554.29 103.79 C 886.84 196.29 800.97 18.03 1000 141.61")></path> <path id="end" d="M1000,157v1H0v-1h502.6H1000z"></path> </svg>').appendTo($('.freddie_for_everyone_header '));

        const wave = $(".module__wave path");

        const animation = TweenMax.to('.module__wave #start', 1, {
            morphSVG: "#end",
            ease: Power1.easeOut,
            paused: true
        });

        //     window.addEventListener('scroll', () => {
        //         const progress = Math.max(Math.min(scrollY, 800), 1) / 800;
        //         animation.progress(progress);
        // });

        // console.log(scrollY);
      //  console.log($(window).scrollTop());
        $(window).scroll(function () {
            const progress = Math.max(Math.min($(window).scrollTop(), 800), 1) / 800
            animation.progress(progress)
        });


        /*Freddie All Dead header*/


        if ($('.freddie_princes_of_the_universe').length !== 0) {
            setTimeout(function () {
                var bgImageFirst = $(".freddie_princes_of_the_universe .et_pb_image img").attr('src');

                $('.freddie_princes_of_the_universe .et_pb_text.text_link').hover(
                    function () {
                        var bgImage = $(this).css('background-image');
                        bgImage = bgImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                        $('.freddie_princes_of_the_universe .et_pb_image img').attr("src", bgImage);

                        // $(".freddie_princes_of_the_universe .et_pb_image img").hide(400, function() {
                        //         $(".freddie_princes_of_the_universe .et_pb_image img").attr('src',bgImage);
                        //     }).show(400);


                    }, function () {
                        $('.freddie_princes_of_the_universe .et_pb_image img').attr("src", bgImageFirst);

                        // $(".freddie_princes_of_the_universe .et_pb_image img").fadeOut(400, function() {
                        //     $(".freddie_princes_of_the_universe .et_pb_image img").attr('src',bgImageFirst);
                        // }).fadeIn(400);
                    }
                )


                $(".thumbs a").click(function (e) {
                    e.preventDefault();
                    $imgURL = $(this).attr("href");

                });


            }, 1000)
        }


        // Freddie Fairy King Header

        if ($('.freddie_fairy_king_header').length !== 0) {

            $('.freddie_fairy_king_header .et_pb_promo ').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            });

            setTimeout(function () {
                $('.freddie_fairy_king_header .blurbs_list_column .et_pb_blurb').css('cssText', 'cursor: pointer !important;')
            }, 200);

            var bgImageFirst = $('.freddie_fairy_king_header .blurbs_list_column .et_pb_blurb.active_blurb img').attr('src');
            var titleTextFirst = $('.freddie_fairy_king_header .blurbs_list_column .et_pb_blurb.active_blurb .et_pb_module_header').text();
            $('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb img').attr("src", bgImageFirst);

            $('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb .et_pb_module_header').text(titleTextFirst);
			 $('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb img').attr("srcset", '');

            $('.freddie_fairy_king_header .blurbs_list_column .et_pb_blurb').on('click',
                function (e) {
                    e.preventDefault();
                    $('.freddie_fairy_king_header .blurbs_list_column .et_pb_blurb').removeClass('active_blurb');
                    $(this).addClass('active_blurb');

                    var bgImage = $(this).find('img').attr('src');
                    var titleText = $(this).find('.et_pb_module_header').text();
                    $(".freddie_fairy_king_header .main_blurb_column .et_pb_blurb img").fadeOut(400, function () {
                        $('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb img').attr("src", bgImage);
                    }).fadeIn(400);

                    TweenLite.to($('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb .et_pb_module_header'), 0.8, {
                        text: titleText,
                        ease: Linear.easeNone
                    });
                }
            );


            var columnes = $('.freddie_fairy_king_header .et_pb_row_inner.text_row .et_pb_column_1_3 ');
            $('.freddie_fairy_king_header .header_close_icon ').on('click', function () {
                var iconTopSize = $(this).css('top');
                var imageHeight = $('.freddie_fairy_king_header .main_blurb_column .et_pb_blurb').outerHeight();
                var rowHeight = $('.freddie_fairy_king_header .et_pb_row_inner.text_row ').outerHeight();
                var iconNewTopSize = imageHeight - rowHeight;


                if (!$(this).hasClass('opened')) {
                    $(this).css('top', parseInt(iconNewTopSize, 10) - 38 + 'px');
                    TweenLite.to($('.freddie_fairy_king_header .et_pb_row_inner.text_row '), 0.8, {y: '0%'});
                    TweenMax.staggerTo(columnes, 0.8, {
                        y: "0",
                        opacity: 1,
                        delay: 0.3
                    }, 0.2);
                    $(this).addClass('opened');
                } else {
                    $(this).css('top', parseInt(iconTopSize, 10) - (parseInt(imageHeight, 10) - parseInt(rowHeight, 10)) + 'px');
                    TweenLite.to($('.freddie_fairy_king_header .et_pb_row_inner.text_row '), 0.8, {y: '101%'});
                    TweenMax.staggerTo(columnes, 0.8, {
                        y: "80px",
                        opacity: 0,
                        delay: 0
                    }, 0.1);
                    $(this).removeClass('opened');
                }
            });


            if ($(window).width() <= 480) {
                $('.freddie_fairy_king_header .et_pb_row_inner.text_row').insertAfter($('.freddie_fairy_king_header .et_pb_row > .et_pb_column_1_3'))
            }


        }


        //    Freddie I Want It All Header


        if ($('.freddie_i_want_it_all_header').length !== 0) {

            $('body').addClass('freddie_want_it_all_header_exist')

            var windowHeight = $(window).height();

            var lastScrollTop = 0;


            var st = $(window).scrollTop();

            if (st > 0) {
                $('.freddie_i_want_it_all_header').addClass('scroll_top_enable');
            }

        }
            function freddieWantHeaderScroll() {
                if ($('.freddie_i_want_it_all_header').length !== 0) {
                    st = $(this).scrollTop();
                    console.log(st);
                    if (st > lastScrollTop) {
                        if (st > 0 && st <= windowHeight && !$('.freddie_i_want_it_all_header').hasClass('scroll_top_enable')) {
                            $('.freddie_i_want_it_all_header').addClass('scroll_top_enable');
                            // $(window).scrollTop(0)
                        }

                    } else {
                        if (st <= 0 && $('.freddie_i_want_it_all_header').hasClass('scroll_top_enable')) {
                            $('.freddie_i_want_it_all_header').removeClass('scroll_top_enable')

                        }
                    }
                    lastScrollTop = st;
                }
            }


            $(window).scroll(function(event){
                freddieWantHeaderScroll();
            })
            if ($('body').hasClass('os-host')) {
                var freddieHeaderWantItAll = OverlayScrollbars($("body"), {
                    callbacks: {
                        onScroll: function () { freddieWantHeaderScroll(); }
                    }
                });

            }

             // Freddie Bring Music header
        setTimeout(function () {
            var descTopMargin = $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide  .et_pb_slide_description').css('margin-top');
            descTopMargin = parseInt(descTopMargin, 10);
            var descHeight = 0;
            $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                $('<div class="hover_container"></div>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'))

                if (descHeight <= $(this).find('.et_pb_slide_description').height()) {
                    descHeight = $(this).find('.et_pb_slide_description').height();
                }

                $(this).find('.et_pb_button_wrapper').insertBefore($(this).find('.et_pb_slide_title'))
            })


            $('.freddie_bring_music_header .et_pb_column .et_pb_social_media_follow').css('top', descHeight + descTopMargin + 10)
            $('.freddie_bring_music_header .et_pb_column .et_pb_social_media_follow').css('top', descHeight + descTopMargin + 42)
            $('#page-container .freddie_bring_music_header .et_pb_slider .et-pb-slider-arrows').prepend($('<span class="number">01</span>'));


            var prevText = $('#page-container .freddie_bring_music_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text();

            $('#page-container .freddie_bring_music_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text(prevText.replace('ious', ''))

            for (var i = 1; i <= 10; i++) {
                $('<div class="image_box image_box_' + i + '"></div>').appendTo($('.freddie_bring_music_header .et_pb_slide_image'))
            }


            $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                var slideImage = $(this).find('.et_pb_slide_image img').attr('src');
                $('<img src="' + slideImage + '">').appendTo($(this).find('.image_box'))

            })

            var imageHeight = $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide .et_pb_slide_image img').height()
            $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide .image_box img').height(imageHeight)


            if ($('.freddie_bring_music_header').length !== 0) {
                var splitText = new SplitText(".freddie_bring_music_header .et_pb_slide_title", {
                    type: "words,chars",
                    charsClass: "char char++",
                    position: "static"
                });

                var tlDontTryHeader1 = new TimelineLite;
                tlDontTryHeader1.to($('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-active-slide .char'), 0, {
                    opacity: 1
                })
            }

            $('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-active-slide').addClass('done');
            $('.freddie_bring_music_header .et-pb-slider-arrows a').on('click', function (e) {
                var thisA = $(this).closest('.et_pb_slider');
                e.preventDefault();
                thisA.find('.et_pb_slide').addClass('done');
                // thisA.find('.et_pb_slide.et-pb-active-slide').addClass('done');
                setTimeout(function () {


                    var prevElemLengts = $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    if (prevElemLengts < 10) {
                        prevElemLengts = "0" + prevElemLengts;
                    }
                    $('.freddie_bring_music_header .et-pb-slider-arrows span.number').text(prevElemLengts);

                    var tlDontTryHeader2 = new TimelineLite;
                    tlDontTryHeader2.to($('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-moved-slide .char'), 0, {
                        opacity: 0
                    },0.5)
                    var tlDontTryHeader = new TimelineLite;


                    var chars = thisA.find('.et-pb-active-slide .char ').toArray();

                    setTimeout(function () {
                        tlDontTryHeader.staggerFromTo(chars, 0.5, {
                            opacity: 0
                        }, {
                            opacity: 1,
                            ease: Power3.easeOut
                        }, 0.08);
                    },1200)


                }, 50)

                setTimeout(function () {
                    thisA.find('.et_pb_slide').removeClass('done');
                    thisA.find('.et_pb_slide.et-pb-active-slide').addClass('done');
                },1000)


            })


            if ($('.freddie_bring_music_header .et_pb_slider').hasClass('et_slider_auto')) {
                setInterval(function () {
                    if (!$('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-active-slide').hasClass('done')) {

                        var prevElemLengts = $('.freddie_bring_music_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                        if (prevElemLengts < 10) {
                            prevElemLengts = "0" + prevElemLengts;
                        }
                        $('.freddie_bring_music_header .et-pb-slider-arrows span.number').text(prevElemLengts);

                        var tlDontTryHeader3 = new TimelineLite;
                        tlDontTryHeader3.to($('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-moved-slide .char'), 0, {
                            opacity: 0
                        },0.5)

                        var tlDontTryHeaderAuto = new TimelineLite;


                        var chars2 = $('.freddie_bring_music_header .et_pb_slider .et-pb-active-slide .char ').toArray();


                        tlDontTryHeaderAuto.staggerFromTo(chars2, 0.5, {
                            opacity: 0
                        }, {
                            opacity: 1,
                            ease: Power3.easeOut
                        }, 0.08);
                        $('.freddie_bring_music_header .et_pb_slider .et_pb_slide').removeClass('done')
                        $('.freddie_bring_music_header .et_pb_slider .et_pb_slide.et-pb-active-slide').addClass('done')
                    }
                }, 200)
            }
        }, 1500)

// Freddie All Dead header Hero

        setTimeout(function () {
            if ($('.frddie_all_dead_header_hero').length !== 0) {
                var descTopMargin = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide  .et_pb_slide_description').css('margin-top');
                descTopMargin = parseInt(descTopMargin, 10);
                var imageHeight =  $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide .et_pb_slide_image img').height();


                var descHeight = 0;
                $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                    if (descHeight <= $(this).find('.et_pb_slide_description').height()) {
                        descHeight = $(this).find('.et_pb_slide_description').height();
                    }

                })



                $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide .et_pb_slide_description').height(descHeight);

                var nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_title').text()

                $('#page-container .frddie_all_dead_header_hero .et_pb_slider .et-pb-slider-arrows').prepend($('<span class="number">01</span><span class="next_slide_title">' + nextSlideTitle + '</span>'));




                if ($('.frddie_all_dead_header_hero').length !== 0) {
                    var splitText = new SplitText(".frddie_all_dead_header_hero .et_pb_slide_title", {
                        type: "words,chars",
                        charsClass: "char char++",
                        position: "static"
                    });

                    var tlDontTryHeader1 = new TimelineLite;
                    tlDontTryHeader1.to($('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slide.et-pb-active-slide .et_pb_slide_title > div'), 0, {
                        opacity: 1,
                        y: 0
                    })
                }



                $('.frddie_all_dead_header_hero .et-pb-slider-arrows a.et-pb-arrow-next, .frddie_all_dead_header_hero .et-pb-controllers a').on('click', function (e) {
                    setTimeout(function () {
                        if ($('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').nextAll('.et_pb_slide').length !== 0) {
                            nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_title').text()
                        } else {
                            nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide:first-child').find('.et_pb_slide_title').text()
                        }
                    }, 50)
                })

                $('.frddie_all_dead_header_hero .et-pb-slider-arrows a.et-pb-arrow-prev, .frddie_all_dead_header_hero .et-pb-controllers a').on('click', function (e) {
                    setTimeout(function () {
                        if ($('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length !== 0) {
                            nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prev().find('.et_pb_slide_title').text()
                        } else {
                            nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide:last-child').find('.et_pb_slide_title').text()
                        }
                    }, 50)
                })




                function deadHeaderText() {
                    setTimeout(function () {
                        var tlDontTryHeader2 = new TimelineLite;
                        tlDontTryHeader2.to($('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slide.et-pb-moved-slide .et_pb_slide_title > div'), 0, {
                            opacity: 0,
                            y: "70%"
                        },0.5)



                        var charsDiv = $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-active-slide .et_pb_slide_title > div ').toArray();
                        var chars = $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-active-slide .et_pb_slide_title .char ').toArray();
                        var tlDontTryHeader = new TimelineLite;
                        tlDontTryHeader.staggerFromTo(charsDiv, 1.7, {
                            opacity: 0,
                            y: "70%"
                        }, {
                            opacity: 1,
                            y: "0%",
                            ease: Power3.easeOut
                        }, 0);


                        $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-active-slide .et_pb_slide_title > div ').each(function () {
                            var minNumber = 1;
                            var maxNumber = $(this).find('.char').length;

                            var randomNumber = randomNumberFromRange(minNumber, maxNumber);
                            var randomNumber2 = randomNumberFromRange(minNumber, maxNumber);
                            var randomNumber3 = randomNumberFromRange(minNumber, maxNumber);

                            function randomNumberFromRange(min,max)
                            {
                                return Math.floor(Math.random()*(max-min+1)+min);
                            }


                            var tlDontTryHeaderChars = new TimelineLite;
                            tlDontTryHeaderChars.staggerFromTo($(this).find('.char:nth-child('+ randomNumber +')'), 1.8, {
                                y: "40%"
                            }, {
                                y: "0%",
                                ease: Power3.easeOut
                            }, 0);
                            var tlDontTryHeaderChars2 = new TimelineLite;
                            tlDontTryHeaderChars2.staggerFromTo($(this).find('.char:nth-child('+ randomNumber2 +')'), 2, {
                                y: "40%"
                            }, {
                                y: "0%",
                                ease: Power3.easeOut
                            }, 0);
                            var tlDontTryHeaderChars3 = new TimelineLite;
                            tlDontTryHeaderChars3.staggerFromTo($(this).find('.char:nth-child('+ randomNumber3 +')'), 2.5, {
                                y: "40%"
                            }, {
                                y: "0%",
                                ease: Power3.easeOut
                            }, 0);



                        })
                    },1200)
                }

                $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a.et-pb-active-control').addClass('done')

                $('.frddie_all_dead_header_hero .et-pb-slider-arrows a, .frddie_all_dead_header_hero .et-pb-controllers a').on('click', function (e) {
                    e.preventDefault();
                    $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a').removeClass('done');
                    $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a.et-pb-active-control').addClass('done')
                    $('.frddie_all_dead_header_hero').addClass('deactive')
                    setTimeout(function () {

                        var prevElemLengts = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                        if (prevElemLengts < 10) {
                            prevElemLengts = "0" + prevElemLengts;
                        }
                        $('.frddie_all_dead_header_hero .et-pb-slider-arrows span.number').text(prevElemLengts);

                        deadHeaderText()

                        TweenLite.to($('.frddie_all_dead_header_hero .et-pb-slider-arrows span.next_slide_title'), 0.8, {
                            text: nextSlideTitle,
                            ease: Linear.easeNone
                        });


                    }, 50)


                    setTimeout(function () {
                        $('.frddie_all_dead_header_hero').removeClass('deactive')
                    }, 3200)

                })

                if ($('.frddie_all_dead_header_hero .et_pb_slider').hasClass('et_slider_auto')) {
                    setInterval(function () {
                        setTimeout(function () {
                            if(!$('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a.et-pb-active-control').hasClass('done')){

                                if ($('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').nextAll('.et_pb_slide').length !== 0) {
                                    nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_title').text()
                                } else {
                                    nextSlideTitle = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide:first-child').find('.et_pb_slide_title').text()
                                }


                                var prevElemLengts = $('.frddie_all_dead_header_hero .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                                if (prevElemLengts < 10) {
                                    prevElemLengts = "0" + prevElemLengts;
                                }
                                $('.frddie_all_dead_header_hero .et-pb-slider-arrows span.number').text(prevElemLengts);


                                TweenLite.to($('.frddie_all_dead_header_hero .et-pb-slider-arrows span.next_slide_title'), 0.8, {
                                    text: nextSlideTitle,
                                    ease: Linear.easeNone
                                });

                                deadHeaderText()


                                $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a').removeClass('done')
                                $('.frddie_all_dead_header_hero .et_pb_slider .et-pb-controllers a.et-pb-active-control').addClass('done')
                            }
                        },1000)





                    }, 2000)
                }


                //    *******************************************************************************************




                    $('.frddie_all_dead_header_hero .et-pb-slider-arrows a').addClass('scene-nav')
                    $('.frddie_all_dead_header_hero .et-pb-slider-arrows a.et-pb-arrow-prev').attr('data-nav', 'prev');
                    $('.frddie_all_dead_header_hero .et-pb-slider-arrows a.et-pb-arrow-next').attr('data-nav', 'next');
                    var imageImage = $('.frddie_all_dead_header_hero .hover_image img').attr('src');


                    var spriteImages = document.querySelectorAll('.frddie_all_dead_header_hero .et_pb_slide img');
                    var spriteImagesSrc = [];

                    for (var i = 0; i < spriteImages.length; i++) {
                        var img = spriteImages[i];
                        spriteImagesSrc.push(img.getAttribute('src'));
                    }

                    var initCanvasSlideshow = new CanvasSlideshow({
                        sprites: spriteImagesSrc,
                        displacementImage: imageImage,
                        // autoPlay: false,
                        autoPlaySpeed: [10, 2],
                        displaceScale: [200, 70]
                    });


                    //    *******************************************************************************************

                    $('.frddie_all_dead_header_hero ').css('cssText', 'opacity: 1 !important')
                }


            }
            ,
            2500
            )


        //    Freddie The show header


        if ($('.freddie_the_show_header').length !== 0) {
            setTimeout(function () {
                $(".freddie_the_show_header .et_pb_slider .et_pb_slides .et_pb_button_wrapper .et_pb_button").each(function () {
                    var text = $(this).text();
                    $(this).html('<span>' + text + '</span>');
                    $('<div class="line"></div>').appendTo($(this));

                    var splitButtonTorriate = new SplitText($(this).find("span"), {
                        type: "chars",
                        charsClass: "char char++",
                        position: "reletive"
                    });
                })








                $('.freddie_the_show_header .et_pb_slider .et_pb_slides .et_pb_button_wrapper .et_pb_button').hover(
                    function () {
                        var thisTl = this;

                        thisTl.t1Torriate = new TimelineLite;
                        var charsButtonTorriate = $(this).find('.char').toArray();
                        thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0.1, {
                            y: "-5px",
                            ease: Power0.easeNone
                        }, 0.02)
                            .staggerTo(charsButtonTorriate, 0.1, {
                                y: "0",
                                ease: Power0.easeNone
                            }, 0.02, "-=0");

                        thisTl.t1Torriate.play();
                    }, function () {
                        var thisTl = this;
                        var charsButtonTorriate = $(this).find('.char').toArray();
                        thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0, {
                            y: "0",
                            ease: Power0.easeNone
                        }, 0)
                    }
                )




                $('<div class="slide_next_image"></div>').insertAfter($(".freddie_the_show_header .et_pb_slider .et_pb_slides"));
                $('.freddie_the_show_header .et_pb_slide ').each(function () {
                    var nextImage = $(this).find('.et_pb_slide_image img').attr('src');
                    $('<img class="next_image" src="' + nextImage + '">').appendTo($(this).closest('.et_pb_slider').find('.slide_next_image'));

                })


                var prevElements = $('.freddie_the_show_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                $('.freddie_the_show_header .et_pb_slider .slide_next_image img:nth-child(' + (prevElements + 1) + ')').addClass('active');
                $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_left_top');


                if ($('.freddie_the_show_header').length !== 0) {
                    var splitText1 = new SplitText(".freddie_the_show_header .et_pb_slide_title", {
                        type: "words,chars",
                        charsClass: "char char++",
                        position: "static"
                    });

                    var splitText2 = new SplitText(".freddie_the_show_header .et_pb_slide_content", {
                        type: "words,chars",
                        charsClass: "char char++",
                        position: "static"
                    });

                    var tlSHowHeader1 = new TimelineLite;
                    tlSHowHeader1.to($('.freddie_the_show_header .et_pb_slider .et_pb_slide.et-pb-active-slide .char'), 0, {
                        opacity: 1,
                        scaleX: 1,
                        transformOrigin:"50% bottom",
                        scaleY: 1
                    })
                }

                $('.freddie_the_show_header .et_pb_slider .et-pb-slider-arrows a, .freddie_the_show_header .et_pb_slider .et-pb-controllers a').on('click', function (e) {
                    var thisA = $(this).closest('.et_pb_slider');

                    e.preventDefault();
                    setTimeout(function () {

                        var prevElementsLength = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                        thisA.find('.slide_next_image').find('img').removeClass('active');
                        thisA.find('.slide_next_image').find(' img:nth-child(' + (prevElementsLength + 1) + ')').addClass('active');


                        var tlShowHeader3 = new TimelineLite;
                        tlShowHeader3.to($('.freddie_the_show_header .et_pb_slider .et_pb_slide.et-pb-moved-slide .char'), 0, {
                            opacity: 0
                        },0.5)

                        var tlshowHeader = new TimelineLite;
                        var tlshowHeaderContent = new TimelineLite;


                        var charsTitle = thisA.find('.et-pb-active-slide .et_pb_slide_title .char ').toArray();
                        var charsContent = thisA.find('.et-pb-active-slide .et_pb_slide_content .char ').toArray();

                        setTimeout(function () {
                            tlshowHeader.staggerFromTo(charsTitle, 1, {
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
                            }, 0.08);

                            tlshowHeaderContent.staggerFromTo(charsContent, 1.2, {
                                opacity: 0,
                                scaleX: 0,
                                transformOrigin:"50% bottom",
                                scaleY: 0
                            }, {
                                opacity: 1,
                                scaleX: 1,
                                scaleY: 1,
                                transformOrigin:"50% bottom",
                                ease: Elastic.easeOut
                            }, 0.02);
                        },1200)

                    }, 50)

                })


                var slidesCount = $('.freddie_the_show_header .et_pb_slider .et_pb_slides .et_pb_slide').length;
                if (slidesCount <= 9) {
                    slidesCount = '0' + slidesCount;
                }

                $('<div class="slider_number"><span class="active_number">01</span><span class="line"></span><span class="total_number">' + slidesCount + '</span></div>').insertAfter($('.freddie_the_show_header .et-pb-controllers'))

                $('.freddie_the_show_header .et-pb-controllers a').on('click', function (e) {
                    e.preventDefault();
                    $('.freddie_the_show_header .et_pb_slider .et-pb-controllers a ').removeClass('done');
                    $(this).addClass('done');
                    setTimeout(function () {
                        var prevElemLengts = $('.freddie_the_show_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                        if (prevElemLengts < 10) {
                            prevElemLengts = "0" + prevElemLengts;
                        }
                        $('.freddie_the_show_header .slider_number span.active_number').text(prevElemLengts);


                        if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_left_top')) {
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_left_top')
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_none')
                        } else if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_none')) {
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_none')
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_left_bottom')
                        } else if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_left_bottom')) {
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_left_bottom')
                            $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_left_top')
                        }

                    }, 50)


                })

                if ($('.freddie_the_show_header .et_pb_slider').hasClass('et_slider_auto')) {
                    setInterval(function () {
                        if (!$('.freddie_the_show_header .et_pb_slider .et-pb-controllers a.et-pb-active-control').hasClass('done')) {
                            var prevElemLengts = $('.freddie_the_show_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                            if (prevElemLengts < 10) {
                                prevElemLengts = "0" + prevElemLengts;
                            }
                            $('.freddie_the_show_header .slider_number span.active_number').text(prevElemLengts);


                            var prevElementsLength = $('.freddie_the_show_header .et_pb_slide.et-pb-active-slide').prevAll().length;

                            $('.freddie_the_show_header .slide_next_image').find('img').removeClass('active');
                            $('.freddie_the_show_header .slide_next_image').find(' img:nth-child(' + (prevElementsLength + 1) + ')').addClass('active');

                            if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_left_top')) {
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_left_top')
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_none')
                            } else if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_none')) {
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_none')
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_left_bottom')
                            } else if ($('.freddie_the_show_header .et_pb_slider .slide_next_image').hasClass('slide_image_radius_left_bottom')) {
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').removeClass('slide_image_radius_left_bottom')
                                $('.freddie_the_show_header .et_pb_slider .slide_next_image').addClass('slide_image_radius_left_top')
                            }




                            var tlShowHeader3 = new TimelineLite;
                            tlShowHeader3.to($('.freddie_the_show_header .et_pb_slider .et_pb_slide.et-pb-moved-slide .char'), 0, {
                                opacity: 0
                            },0.5)

                            var tlshowHeader = new TimelineLite;
                            var tlshowHeaderContent = new TimelineLite;


                            var charsTitle = $('.freddie_the_show_header .et-pb-active-slide .et_pb_slide_title .char ').toArray();
                            var charsContent = $('.freddie_the_show_header .et-pb-active-slide .et_pb_slide_content .char ').toArray();

                            setTimeout(function () {
                                tlshowHeader.staggerFromTo(charsTitle, 1, {
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
                                }, 0.08);

                                tlshowHeaderContent.staggerFromTo(charsContent, 1.2, {
                                    opacity: 0,
                                    scaleX: 0,
                                    transformOrigin:"50% bottom",
                                    scaleY: 0
                                }, {
                                    opacity: 1,
                                    scaleX: 1,
                                    scaleY: 1,
                                    transformOrigin:"50% bottom",
                                    ease: Elastic.easeOut
                                }, 0.02);
                            },1200)




                            $('.freddie_the_show_header .et_pb_slider .et-pb-controllers a ').removeClass('done')
                            $('.freddie_the_show_header .et_pb_slider .et-pb-controllers a.et-pb-active-control ').addClass('done')
                        }


                    }, 50)
                }
            }, 1500)
        }


        //    Freddie Friends Header

        if ($('.freddie_friends_header').length !== 0) {
            setTimeout(function () {

                $('.freddie_friends_header').each(function () {
                    // var titleText = $(this).find('.et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide .et_pb_slide_title').text();
                    // var paragraphText = $(this).find('.et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide .et_pb_slide_content').text();
                    // $('<div class="slide_text_container"><h2>' + titleText + '</h2><p>' + paragraphText + '</p></div>').insertAfter($(this).find(".et_pb_slider"));
                    $('<div class="slide_next_image"></div>').insertAfter($(this).find(".et_pb_slider"));


                    var slidesCount = $(this).find('.et_pb_slider .et_pb_slides .et_pb_slide').length;
                    if (slidesCount <= 9) {
                        slidesCount = '0' + slidesCount;
                    }
                    $('<div class="slider_number"><span class="active_number">01</span><span class="line"></span><span class="total_number">' + slidesCount + '</span></div>').insertBefore($(this).find('.et_pb_slider'))


                    $(this).find('.et_pb_slide ').each(function () {
                        var nextImage = $(this).find('.et_pb_slide_image img').attr('src');
                        $('<img class="next_image" src="' + nextImage + '">').appendTo($(this).closest('.et_pb_slider').next('.slide_next_image'));
                    })


                    // var prevElements = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                    $(this).find('.slide_next_image img:last-child').addClass('active');


                    $(this).find('.et-pb-slider-arrows a').on('click', function (e) {
                        var thisA = $(this).closest('.et_pb_slider');
                        e.preventDefault();
                        setTimeout(function () {
                            var prevElemLengts = thisA.find('.et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                            if (prevElemLengts < 10) {
                                prevElemLengts = "0" + prevElemLengts;
                            }

                            thisA.prev('.slider_number').find('span.active_number').text(prevElemLengts);

                            thisA.next('.slide_next_image').find('img').removeClass('active');

                            var prevElementsLength = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                            if (prevElementsLength !== 0) {
                                thisA.next('.slide_next_image').find(' img:nth-child(' + (prevElementsLength ) + ')').addClass('active');
                            } else {
                                thisA.next('.slide_next_image').find(' img:last-child').addClass('active');
                            }


                            zIndex++;


                        }, 50)


                    })

                })

                if ($('.freddie_friends_header .et_pb_slider').hasClass('et_slider_auto')) {
                    // var zIndexAuto = 1;
                    setInterval(function () {
                        if (!$('.freddie_friends_header .et_pb_slider .et-pb-controllers a.et-pb-active-control').hasClass('done')) {
                            var prevElemLengts = $('.freddie_friends_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                            if (prevElemLengts < 10) {
                                prevElemLengts = "0" + prevElemLengts;
                            }

                            $('.freddie_friends_header .slider_number span.active_number').text(prevElemLengts);


                            var prevElementsLength = $('.freddie_friends_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;

                            $('.freddie_friends_header .slide_next_image img').removeClass('active');

                            if (prevElementsLength !== 0) {
                                $('.freddie_friends_header .slide_next_image img:nth-child(' + (prevElementsLength ) + ')').addClass('active');
                            } else {
                                $('.freddie_friends_header .slide_next_image img:last-child').addClass('active');
                            }


                            $('.freddie_friends_header .et_pb_slider .et-pb-controllers a').removeClass('done')
                            $('.freddie_friends_header .et_pb_slider .et-pb-controllers a.et-pb-active-control').addClass('done')
                        }

                    }, 50)
                }
            }, 1500)
        }


        // Freddie We are header
        if ($('.freddie_we_are_header').length !== 0) {
            setTimeout(function () {

                $('<div class="line"></div>').appendTo($('#page-container #main-content .freddie_we_are_header .et_pb_promo .et_pb_button_wrapper a.et_pb_button'));


                var tlLiar = new TimelineLite;
                $('#page-container #main-content .freddie_we_are_header .et_pb_promo .et_pb_button_wrapper a.et_pb_button').hover(
                    function () {
                        var motherLoveLine = $(this).find('.line');
                        tlLiar.to(motherLoveLine, 0.4, {
                            width: "40px",
                            ease: Power3.easeInOut
                        }, 0)
                    }, function () {
                        var motherLoveLine = $(this).find('.line');
                        tlLiar.clear();
                        var tl2Liar = new TimelineLite;
                        tl2Liar.to(motherLoveLine, 0.4, {
                            width: "100%",
                            ease: Power3.easeInOut
                        }, 0)
                    }
                )


                $('<div class="images_container"></div>').appendTo($('.freddie_we_are_header'));
                var firstImageSrc = $('.freddie_we_are_header .et_pb_column_1_5:first-child .et_pb_blurb .et_pb_main_blurb_image img').attr('src')
                var bgImageSrc = $('.freddie_we_are_header').css('background-image')
                bgImageSrc = bgImageSrc.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

                $('<img class="first_image" src="' + firstImageSrc + '">').appendTo($('.freddie_we_are_header .images_container'))


                var blurbCount = 1;
                $('.freddie_we_are_header .et_pb_blurb ').each(function () {
                    var titletext = $(this).find('h2.et_pb_module_header').text().toLowerCase().replace(/ /g, ";");
                    var imageSrc = $(this).find('.et_pb_main_blurb_image img').attr('src');
                    $(this).attr('hover_image', titletext);

                    $('<img class="image_' + blurbCount + ' ' + titletext + '" src="' + imageSrc + '">').appendTo($('.freddie_we_are_header .images_container'))
                    $('<div class="inner_canvas inner_canvas_' + blurbCount + ' ' + titletext + '"></div>').appendTo($('.freddie_we_are_header .images_container'))
                    blurbCount++;
                })


                var hovers = new Array();

                // var hover1;
                for (var i = 1; i <= 5; i++) {
                    var newImageSrc = $('.freddie_we_are_header .images_container .image_' + i).attr('src')
                    hovers[i] = new hoverEffect({
                        parent: document.querySelector('.inner_canvas_' + i),
                        intensity1: 1,
                        intensity2: 1,
                        speedIn: 0.2,
                        speedOut: 0.2,
                        hover: false,
                        image1: firstImageSrc,
                        image2: newImageSrc,
                        displacementImage: bgImageSrc
                    })
                }


                $('.freddie_we_are_header .et_pb_blurb ').hover(function () {

                    var prevBlurbs = $(this).closest('.et_pb_column ').prevAll('.et_pb_column').length + 1;
                    $('.freddie_we_are_header .images_container .inner_canvas_' + prevBlurbs).css('opacity', 1)
                    hovers[prevBlurbs].next({});


                }, function () {
                    var prevBlurbs = $(this).closest('.et_pb_column ').prevAll('.et_pb_column').length + 1;
                    $('.freddie_we_are_header .images_container .inner_canvas_' + prevBlurbs).css('opacity', 0)
                    hovers[prevBlurbs].previous({});

                })


                var canvasHeigth = $('.freddie_we_are_header .images_container img.first_image').height();
                $('.freddie_we_are_header .images_container .inner_canvas').height(canvasHeigth)


            }, 2000)


        }


        // Freddie Hang on Header

        if ($('.freddie_hang_on_header').length !== 0) {
            setTimeout(function () {

                // Freddie Button You And I


                $('.freddie_hang_on_header .et_pb_slider .et_pb_slide .et_pb_button_wrapper .et_pb_button ').each(function () {
                    var buttonText = $(this).text();
                    $(this).html('<span>' + buttonText + '</span>');
                })


                $('<div class="arrow"><div class="line line_1"></div><div class="line line_2"></div></div>').appendTo($('.freddie_hang_on_header .et_pb_slider .et_pb_slide .et_pb_button_wrapper .et_pb_button '));
                $('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>').appendTo($('.freddie_hang_on_header .et_pb_slider .et_pb_slide .et_pb_button_wrapper .et_pb_button '));


                $('<div class="arrow"><div class="line line_1"></div><div class="line line_2"></div></div>').appendTo($('.freddie_hang_on_header .et_pb_slider .et-pb-slider-arrows a'));
                $('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>').appendTo($('.freddie_hang_on_header .et_pb_slider .et-pb-slider-arrows a'));

                var tlYouAndCircle = new TimelineLite();
                tlYouAndCircle.to($(".freddie_hang_on_header .et_pb_slider .et_pb_slide .et_pb_button_wrapper .et_pb_button .circle_progress_top"), 0, {
                    rotationX: -180,
                    transformOrigin: "center"
                }, 0)


                TweenMax.set('.freddie_hang_on_header .circle__progress', {drawSVG: 0});
                TweenMax.set('.freddie_hang_on_header .circle__progress', {drawSVG: 0});


                $('.freddie_hang_on_header .et_pb_slider .et_pb_slide .et_pb_button_wrapper .et_pb_button, .freddie_hang_on_header .et_pb_slider .et-pb-slider-arrows a ').hover(
                    function () {
                        var selfYouAndI = this;
                        var percentageComplete = 1;

                        selfYouAndI.tlYouAndiCircle = new TimelineLite();

                        selfYouAndI.tlYouAndiCircle
                            .fromTo($(this).find(".circle__progress"), 1.3, {
                                drawSVG: "0%",
                                rotation: 0,
                            }, {
                                drawSVG: "0 100%",
                                rotation: "360deg",
                                transformOrigin: "center",
                                ease: Power3.easeOut
                            }, 0)

                            .to($(this).find(".arrow"), 0.4, {
                                right: 1,
                                ease: Power3.easeOut
                            }, 0)
                            .to($(this).find(".line"), 0.4, {
                                width: 2,
                                rotation: 0,
                                ease: Power3.easeOut
                            }, 0)
                            .to($(this).find(".line"), 0.4, {
                                width: 8,
                                ease: Power3.easeOut
                            }, 0.5)
                            .to($(this).find(".line_1"), 0.4, {
                                width: 8,
                                rotation: "45deg",
                                ease: Power3.easeOut
                            }, 0.5)
                            .to($(this).find(".line_2"), 0.4, {
                                width: 8,
                                rotation: "-45deg",
                                ease: Power3.easeOut
                            }, 0.5)
                            .to($(this).find(".arrow"), 0, {
                                right: 40,
                                opacity: 0,
                                ease: Power3.easeOut
                            }, 0.4)
                            .to($(this).find(".arrow"), 0.4, {
                                right: 19,
                                opacity: 1,
                                ease: Power3.easeOut
                            }, 0.5);


                        selfYouAndI.tlYouAndiCircle.play();
                    }, function () {
                        var selfYouAndI = this;
                        selfYouAndI.tlYouAndiCircle.reverse();

                    }
                )


   $('.freddie_hang_on_header').each(function () {
                    $('<div class="slide_next_image"></div>').insertAfter($(this).find(".et_pb_slider"));


                    var headerHeight = $(this).height();
                    var descHeight = 0;
                    var descHeightOut = 0;
                    $(this).find('.et_pb_slide ').each(function () {
                        var nextImage = $(this).find('.et_pb_slide_image img').attr('src');
                        $(this).find('.et_pb_slide_description').prepend($('<div class="description_bg"></div>'));
                        $('<img class="next_image" src="' + nextImage + '">').appendTo($(this).closest('.et_pb_slider').next('.slide_next_image'));


                        if ($(this).find('.et_pb_slide_description').height() >= descHeight) {
                            descHeight = $(this).find('.et_pb_slide_description').height();
                            descHeightOut = $(this).find('.et_pb_slide_description').outerHeight();
                        }
                    })

                    $(this).find('.et_pb_slide .et_pb_slide_description').height(descHeight)
                    $(this).find('.slide_next_image').height(descHeightOut)
                    $(this).find('.description_bg').height(0)
                    $(this).find('.et-pb-active-slide .description_bg').height(descHeightOut)

                    var prevElements = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                    $(this).find('.slide_next_image img:nth-child(' + (prevElements + 2) + ')').addClass('active');


                    var tlHangOnHeader1 = new TimelineLite();

                    tlHangOnHeader1
                    .to($(this).find('.et_pb_slide.et-pb-active-slide .et_pb_slide_content'), 0, {
                        y:0﻿,
                    opacity: 1,
                        ease: Power2.easeIn
                }, 0)
                    .to($(this).find('.et_pb_slide.et-pb-active-slide .et_pb_button_wrapper a.et_pb_button'), 0, {
                        y:0﻿,
                    opacity: 1,
                        ease: Power2.easeIn
                }, 0.3)

                    var tlHangOnHeaderImage1 = new TimelineLite();
                    tlHangOnHeaderImage1
                        .to($(this).find('.et_pb_slide.et-pb-active-slide .et_pb_slide_image img'), 0, {
                            y: "0"﻿
                }, 0)

                    var nextImageWidth =   $(this).find('.slide_next_image').width();
                    $(this).find('.et-pb-slider-arrows a, .et-pb-controllers a').on('click', function (e) {
                        var thisA = $(this).closest('.et_pb_slider');
                        e.preventDefault();
                        setTimeout(function () {

                            var tlHangOnHeader = new TimelineLite();
                            tlHangOnHeader
                                .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_content'), 0.7, {
                                    y:"-100%"﻿,
                            opacity: 0,
                                ease: Power2.easeIn
                        }, 0.6)
                            .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_content'), 0, {
                                y:"100%"﻿
                        }, 1.5)
                            .to(thisA.find('.et_pb_slide.et-pb-active-slide .et_pb_slide_content'), 0.7, {
                                y: "0%"﻿,
                            opacity: 1,
                                ease: Power2.easeIn
                        },2)
                            .to(thisA.next('.slide_next_image'), 0.7, {
                                width: 0﻿,
                                ease: Power2.easeIn
                        },0)
                            .to(thisA.next('.slide_next_image'), 0.7, {
                                width: nextImageWidth,
                                ease: Power2.easeIn
                        },1.2)



                            var tlHangOnHeaderButton = new TimelineLite();
                            tlHangOnHeaderButton
                                .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_button_wrapper a.et_pb_button'), 0.7, {
                                    y: "-100%",
                                    opacity: 0,
                                    ease: Power2.easeIn
                                }, 0.2)
                                .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_button_wrapper a.et_pb_button'), 0, {
                                    y: "100%"
                                }, 1.6)
                                .to(thisA.find('.et_pb_slide.et-pb-active-slide .et_pb_button_wrapper a.et_pb_button'), 0.7, {
                                    y: "0%"﻿,
                            opacity: 1,
                                ease: Power2.easeIn
                        }, 1.9)


                            var tlHangOnHeaderImage = new TimelineLite();
                            tlHangOnHeaderImage
                                .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_image img'), 1, {
                                    y: "-100%"﻿,
                            ease: Power2.easeIn
                        }, 0.8)
                            .to(thisA.find('.et_pb_slide.et-pb-active-slide .et_pb_slide_image img'), 1, {
                                y: "0%",
                                ease: Power2.easeIn
                            },0.8)
                            .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_image img'), 0, {
                                y:"100%"﻿
                        }, 1.9)



                            //****************************************************
                            var tlHangOnHeaderMoveSlide = new TimelineLite();

                            tlHangOnHeaderMoveSlide
                                .to(thisA.find('.et-pb-moved-slide .description_bg'), 0.8, {
                                    transformOrigin:"top center"﻿,
                                    height: headerHeight,
                                    ease: Power2.easeIn
                                }, 0)
                                .to(thisA.find('.et-pb-moved-slide .description_bg'), 0.8, {
                                    transformOrigin:"top center"﻿,
                                    scaleY: 0,
                                        ease: Power2.easeIn
                                }, 0.8)
                                .to(thisA.find('.et-pb-moved-slide .description_bg'), 0, {
                                    scaleY: 1,
                                    height: 0
                                }, 5)

                            var tlHangOnHeaderActiveSlide = new TimelineLite();

                            tlHangOnHeaderActiveSlide
                                .to(thisA.find('.et-pb-active-slide .description_bg'), 0.8, {
                                    transformOrigin:"top center"﻿,
                                    height: descHeightOut,
                                    ease: Power2.easeIn
                                }, 1.6)

//****************************************************
                            // tlHangOnHeader
                            //     .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_content'), 0.5, {
                            //         y: '-100%'﻿,
                            //         opacity: 0,
                            //         ease: Power2.easeIn
                            //     }, 0.9)
                            // .to(thisA.find('.et_pb_slide.et-pb-moved-slide .et_pb_button_wrapper a.et_pb_button'), 0.5, {
                            //         y: '-100%'﻿,
                            //         opacity: 0,
                            //         ease: Power2.easeIn
                            //     }, 1)
                        //     .to(thisA.find('.et_pb_slide.et-pb-active-slide .et_pb_button_wrapper a.et_pb_button'), 0.5, {
                        //         y:0﻿,
                        //     opacity: 1,
                        //         ease: Power2.easeIn
                        // }, 0)


                            if (thisA.find('.et-pb-active-slide').nextAll().length !== 0) {
                                var prevElementsLength = thisA.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                            } else {
                                var prevElementsLength = -1;
                            }


                            thisA.next('.slide_next_image').find('img').removeClass('active');
                            thisA.next('.slide_next_image').find(' img:nth-child(' + (prevElementsLength + 2) + ')').addClass('active');

                        }, 50)


                    })


       if ($(this).find('.et_pb_slider').hasClass('et_slider_auto')) {
           var thisAauto = $(this).find('.et_pb_slider');
           setInterval(function () {
               if (!thisAauto.find('.et-pb-controllers a.et-pb-active-control').hasClass('done')) {
                   console.log('test')
                   // var thisA = $(this).closest('.et_pb_slider');
                   // e.preventDefault();
                   setTimeout(function () {

                       var tlHangOnHeaderAuto = new TimelineLite();
                       tlHangOnHeaderAuto
                           .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_content'), 0.7, {
                               y:"-100%"﻿,
                       opacity: 0,
                           ease: Power2.easeIn
                   }, 0.6)
                       .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_content'), 0, {
                           y:"100%"﻿
                   }, 1.5)
                       .to(thisAauto.find('.et_pb_slide.et-pb-active-slide .et_pb_slide_content'), 0.7, {
                           y: "0%"﻿,
                       opacity: 1,
                           ease: Power2.easeIn
                   },2)
                       .to(thisAauto.next('.slide_next_image'), 0.7, {
                           width: 0﻿,
                       ease: Power2.easeIn
                   },0)
                       .to(thisAauto.next('.slide_next_image'), 0.7, {
                           width: nextImageWidth,
                           ease: Power2.easeIn
                       },1.2)



                       var tlHangOnHeaderAutoButton = new TimelineLite();
                       tlHangOnHeaderAutoButton
                           .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_button_wrapper a.et_pb_button'), 0.7, {
                               y: "-100%",
                               opacity: 0,
                               ease: Power2.easeIn
                           }, 0.2)
                           .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_button_wrapper a.et_pb_button'), 0, {
                               y: "100%"
                           }, 1.6)
                           .to(thisAauto.find('.et_pb_slide.et-pb-active-slide .et_pb_button_wrapper a.et_pb_button'), 0.7, {
                               y: "0%"﻿,
                       opacity: 1,
                           ease: Power2.easeIn
                   }, 1.9)


                       var tlHangOnHeaderAutoImage = new TimelineLite();
                       tlHangOnHeaderAutoImage
                           .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_image img'), 1, {
                               y: "-100%"﻿,
                       ease: Power2.easeIn
                   }, 0.8)
                       .to(thisAauto.find('.et_pb_slide.et-pb-active-slide .et_pb_slide_image img'), 1, {
                           y: "0%",
                           ease: Power2.easeIn
                       },0.8)
                           .to(thisAauto.find('.et_pb_slide.et-pb-moved-slide .et_pb_slide_image img'), 0, {
                               y:"100%"﻿
                   }, 1.9)



                       //****************************************************
                       var tlHangOnHeaderAutoMoveSlide = new TimelineLite();

                       tlHangOnHeaderAutoMoveSlide
                           .to(thisAauto.find('.et-pb-moved-slide .description_bg'), 0.8, {
                               transformOrigin:"top center"﻿,
                       height: headerHeight,
                           ease: Power2.easeIn
                   }, 0)
                       .to(thisAauto.find('.et-pb-moved-slide .description_bg'), 0.8, {
                           transformOrigin:"top center"﻿,
                       scaleY: 0,
                           ease: Power2.easeIn
                   }, 0.8)
                       .to(thisAauto.find('.et-pb-moved-slide .description_bg'), 0, {
                           scaleY: 1,
                           height: 0
                       }, 5)

                       var tlHangOnHeaderAutoActiveSlide = new TimelineLite();

                       tlHangOnHeaderAutoActiveSlide
                           .to(thisAauto.find('.et-pb-active-slide .description_bg'), 0.8, {
                               transformOrigin:"top center"﻿,
                       height: descHeightOut,
                           ease: Power2.easeIn
                   }, 1.6)


                       if (thisAauto.find('.et-pb-active-slide').nextAll().length !== 0) {
                           var prevElementsLength = thisAauto.find('.et_pb_slide.et-pb-active-slide').prevAll().length;

                       } else {
                           var prevElementsLength = -1;
                       }


                       thisAauto.next('.slide_next_image').find('img').removeClass('active');
                       thisAauto.next('.slide_next_image').find(' img:nth-child(' + (prevElementsLength + 2) + ')').addClass('active');




                       thisAauto.find('.et-pb-controllers a').removeClass('done')
                       thisAauto.find('.et-pb-controllers a.et-pb-active-control').addClass('done')
                   })
               }

           }, 50)
       }

                })
            }, 1500)
        }


        //    Freddie Born To Header*

        if ($('.freddie_born_to_header').length !== 0) {
            setTimeout(function () {
                $('.freddie_born_to_header .et_pb_blurb').hover(function () {
                    var titletext = $(this).find('.et_pb_blurb_container h4.et_pb_module_header').text();


                    $('.freddie_born_to_header .et_pb_text .et_pb_text_inner').animate({'opacity': 0}, 100, function () {
                        $(this).text(titletext).animate({'opacity': 1}, 100);
                    });
                }, function () {
                    var titletext = $(this).find('.et_pb_blurb_container h4.et_pb_module_header').text();
                    $('.freddie_born_to_header .et_pb_text .et_pb_text_inner').text(titletext)
                })
            }, 1500)
        }


        // Freddie Leap Ahead Header

        if ($('.freddie_leap_ahead_header').length !== 0) {
            setTimeout(function () {
                var slideHeight = 0;
                $('body .freddie_leap_ahead_header .et_pb_slider .et_pb_slides .et_pb_slide ').each(function () {
                    if(slideHeight < $(this).height()){
                        slideHeight = $(this).height();
                    }
                })

                $('body .freddie_leap_ahead_header .et_pb_slider .et_pb_slides .et_pb_slide ').height(slideHeight);

                $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides').prepend($('<div class="top_click_container"></div>'))

                $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides .top_click_container').hover(function () {
                    $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides').addClass('hovered');
                }, function () {
                    $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides').removeClass('hovered');
                })
                $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides .top_click_container').on('click', function () {
                    var slideLink = $('body:not(.et-fb) .freddie_leap_ahead_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide a.et_pb_button ').attr('href');
                    window.location.href = slideLink;
                })

                $('<div class="number">01</div>').insertBefore($('.freddie_leap_ahead_header .et_pb_slider '));
                $('<div class="control_dots"></div>').appendTo($('#main-content .freddie_leap_ahead_header .et_pb_slider .et-pb-controllers'));

                $('#main-content .freddie_leap_ahead_header .et_pb_slider .et-pb-controllers a').each(function () {
                    $(this).appendTo('.freddie_leap_ahead_header .et_pb_slider .et-pb-controllers .control_dots')
                    $('<div class="dot_circle"></div>').appendTo($(this))
                })


                $('<p class="next_prev_text">&nbsp;</p>').appendTo($('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a'))
                var dotsCount = $('#main-content .freddie_leap_ahead_header .et_pb_slider .et-pb-controllers a').length;
                var rotateSize = 360 / dotsCount;

                for (var i = 1; i <= dotsCount; i++) {
                    $("#main-content .freddie_leap_ahead_header .et_pb_slider .et-pb-controllers a:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }

                $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').hover(function () {
                    if ($('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next('.et_pb_slide').length !== 0) {
                        var nextTitle = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next('.et_pb_slide').find('.et_pb_slide_title').text();

                    } else {
                        var nextTitle = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide:first-child .et_pb_slide_title').text();
                    }

                    TweenLite.to($(this).find('.next_prev_text'), 0.5, {
                        text: nextTitle,
                        ease: Linear.easeNone
                    });

                }, function () {
                    TweenLite.to($(this).find('.next_prev_text'), 0.5, {
                        text: '&nbsp;',
                        ease: Linear.easeNone
                    });
                })

                $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').hover(function () {
                    if ($('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prev('.et_pb_slide').length !== 0) {
                        var prevText = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prev('.et_pb_slide').find('.et_pb_slide_title').text();
                    } else {
                        var prevText = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide:last-child .et_pb_slide_title').text();
                    }


                    TweenLite.to($(this).find('.next_prev_text'), 0.5, {
                        text: prevText,
                        ease: Linear.easeNone
                    });
                }, function () {
                    TweenLite.to($(this).find('.next_prev_text'), 0.5, {
                        text: '&nbsp;',
                        ease: Linear.easeNone
                    });
                })

                $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
                    var thisButton = $(this);
                    setTimeout(function () {
                        if ($('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next('.et_pb_slide').length !== 0) {
                            var nextTitle = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').next('.et_pb_slide').find('.et_pb_slide_title').text();

                        } else {
                            var nextTitle = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide:first-child .et_pb_slide_title').text();
                        }

                        TweenLite.to(thisButton.find('.next_prev_text'), 0.5, {
                            text: nextTitle,
                            ease: Linear.easeNone
                        });
                    }, 50)


                })


                $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                    var thisButton = $(this);
                    setTimeout(function () {

                        if ($('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prev('.et_pb_slide').length !== 0) {
                            var prevText = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide.et-pb-active-slide').prev('.et_pb_slide').find('.et_pb_slide_title').text();
                        } else {
                            var prevText = $('#page-container #main-content .freddie_leap_ahead_header .et_pb_slider .et_pb_slide:last-child .et_pb_slide_title').text();
                        }

                        TweenLite.to(thisButton.find('.next_prev_text'), 0.5, {
                            text: prevText,
                            ease: Linear.easeNone
                        });
                    }, 50)

                })


                $('.freddie_leap_ahead_header .et-pb-controllers').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="17" class="circle__progress"/> </svg>'))


                TweenMax.set('.freddie_leap_ahead_header .circle__progress', {drawSVG: '0%'});
                var circleRotate = 100 / dotsCount;


                $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows a, .freddie_leap_ahead_header .et-pb-controllers a').on('click', function () {
                    setTimeout(function () {
                        var prevElemLengts = $('.freddie_leap_ahead_header .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                        if (prevElemLengts < 10) {
                            prevElemLengts = "0" + prevElemLengts;
                        }
                        $('.freddie_leap_ahead_header div.number').text(prevElemLengts);


                        // var dotBg = $('.freddie_leap_ahead_header .et_pb_slider .et-pb-slider-arrows ')

                        for (var i = 1; i <= dotsCount; i++) {
                            $("#main-content .freddie_leap_ahead_header .et_pb_slider .et-pb-controllers a:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                        }


                        var prevDotsCount = $('.freddie_leap_ahead_header a.et-pb-active-control').prevAll().length + 1
                        prevDotsCount = prevDotsCount * circleRotate

                        var tlCircle = new TimelineLite();
                        tlCircle.to($('.freddie_leap_ahead_header .circle__progress'), 0.5, {
                            drawSVG: (prevDotsCount - 0.57) + "%"
                        })
                    }, 50)

                })


                $('.freddie_leap_ahead_header form.et_pb_searchform .et_pb_searchsubmit').attr('value', 'U')


                if($('.freddie_leap_ahead_header .et_pb_slider').hasClass('et_slider_auto')){
                    setInterval(function () {
                        var showSlideItemsCount = $('.freddie_leap_ahead_header .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;

                        if (showSlideItemsCount <= 9) {
                            $('.freddie_leap_ahead_header div.number').text("0" + showSlideItemsCount);
                        } else {
                            $('.freddie_leap_ahead_header div.number').text(showSlideItemsCount);
                        }
                    },100)
                }

            }, 1500)
        }


    }, freddieHeadersTimeOut);

    //  END FREDDIE HEADERS *******************************************************
})(jQuery);