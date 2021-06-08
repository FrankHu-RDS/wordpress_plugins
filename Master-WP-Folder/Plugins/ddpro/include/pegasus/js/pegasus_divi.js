(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    // clear the placeholder on click

    var timeOutPegasus = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutPegasus = 10000;
    }

    $('input,textarea').focus(function () {
        if ($(this).attr('placeholder') !== '') {
            $(this).attr('data-placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', '');
        }
    });
    $('input,textarea').blur(function () {

        if ($(this).attr('placeholder') === '') {
            $(this).attr('placeholder', $(this).attr('data-placeholder'));

        }
    });


    $.fn.succinct = function (options) {

        var settings = $.extend({
            size: 240,
            omission: '...',
            ignore: true
        }, options);

        return this.each(function () {

            var textDefault,
                textTruncated,
                elements = $(this),
                regex = /[!-\/:-@\[-`{-~]$/,
                init = function () {
                    elements.each(function () {
                        textDefault = $(this).html();

                        if (textDefault.length > settings.size) {
                            textTruncated = $.trim(textDefault)
                                .substring(0, settings.size)
                                .split(' ')
                                .slice(0, -1)
                                .join(' ');

                            if (settings.ignore) {
                                textTruncated = textTruncated.replace(regex, '');
                            }

                            $(this).html(textTruncated + settings.omission);
                        }
                    });
                };
            init();
        });
    };


//          Fancybox

    // $("body .video-popup h4").each(function () {
    //     $(this).find('a').attr('href', "");
    // });


    $("body .video-popup.et_pb_button").click(function (event) {
        event.preventDefault();
        $.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 680,
            'height': 495,
            'href': this.href,
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });

        return false;
    });


    $("body .video-popup a").click(function (event) {
        event.preventDefault();
        $.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 680,
            'height': 495,
            'href': this.href,
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });

        return false;
    });


    $("body .video-popup h4").click(function (e) {
        e.preventDefault();
        $(this).find("a").attr('href', '');
        $(this).closest('.et_pb_blurb_content').find(".et_pb_main_blurb_image a").click();
    });

    $('.pegasus_portfolio_1 .et_pb_portfolio .type-project').on('click', function () {
        var projectLink = $(this).find('a').attr('href');
        if (projectLink) {
            window.location.href = projectLink;
        }
    });


//            Contact Forms


    setTimeout(function () {


        $('.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function () {
            $(this).find('textarea').insertBefore($(this).find('label'));
            $(this).find('input').insertBefore($(this).find('label'));
        });


        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function () {
            $(this).parent("p").addClass("focus");
        });

        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function () {
            if ($(this).val()) {
                $(this).parent().addClass("filled");
            } else {
                $(this).parent().removeClass("filled");
            }
            $(this).parent("p").removeClass("focus");
        });


        //          Newsletter Form

        $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"])').each(function () {
            $(this).find('input').insertBefore($(this).find('label'));

            $(this).find('input.et_pb_signup_firstname').required = false;
        });

        $(' .et_pb_newsletter .et_pb_newsletter_form input').focus(function () {
            $(this).parent("p").addClass("focus");
        });

        $(' .et_pb_newsletter .et_pb_newsletter_form input').blur(function () {
            if ($(this).val()) {
                $(this).parent().addClass("filled");
            } else {
                $(this).parent().removeClass("filled");
            }
            $(this).parent("p").removeClass("focus");
        });

    },timeOutPegasus);
//Portfolio 2 slider
    var timeOut = 2000;
    var timeOut1 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOut1 = 7000;
    }

    setTimeout(function () {
        if ($('.pegasus_portfolio_2 .et_pb_portfolio ').length > 0) {
            $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-next" href="#">$</a><a class="portfolio-arrow-prev" href="#">#</a></div>').appendTo($('.pegasus_portfolio_2 .et_pb_portfolio  '));
            $('.pegasus_portfolio_2 .et_pb_portfolio .type-project:first-child').addClass('active_slide');
            var showBlogSlideritems = 2.55;


            if ($(window).width() <= "767") {
                showBlogSlideritems = 2;
            }
            if ($(window).width() <= "480") {
                showBlogSlideritems = 1.35;
            }


            setTimeout(function () {
                var slideItemsCount = $('.pegasus_portfolio_2 .et_pb_portfolio .type-project').length;
                var slideInnerWidth = $('.pegasus_portfolio_2 .et_pb_column_2_3').width();
                $('.pegasus_portfolio_2 .et_pb_portfolio .type-project').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlogSlideritems) + "px !important;");

                var slideItemswidth = $('.pegasus_portfolio_2 .et_pb_portfolio .type-project').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('body.et-fb .pegasus_portfolio_2 .et_pb_portfolio .et_pb_portfolio_grid_items').css("cssText", "width: " + slideWidth + "px !important;");
                $('.pegasus_portfolio_2 .et_pb_portfolio .et_pb_ajax_pagination_container').css("cssText", "width: " + slideWidth + "px !important;");


                $('.pegasus_portfolio_2 .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                    if ($('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').prev().length === 1) {
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    } else {
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').removeClass('active_slide');
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project:nth-last-child(2)').addClass('active_slide');
                    }
                });

                $('.pegasus_portfolio_2 .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
                    if ($('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').nextAll().length !== 1) {
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    } else {
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').removeClass('active_slide');
                        $('.pegasus_portfolio_2 .et_pb_portfolio .type-project:first-child').addClass('active_slide');
                    }
                });

                $('.pegasus_portfolio_2 .portfolio-slider-arrows a').on('click', function (event) {
                    event.preventDefault();
                    var sliderSlideSize1 = $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').prevAll().length;
                    var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                    $('body.et-fb .pegasus_portfolio_2 .et_pb_portfolio .et_pb_portfolio_grid_items').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
                    $('.pegasus_portfolio_2 .et_pb_portfolio .et_pb_ajax_pagination_container').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');

                    $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').each(function () {
                        var dotText = $(this).text();
                        var prevElCount = $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').prevAll().length;
                        if (prevElCount / 2 === dotText) {
                            $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').removeClass('active_dot');
                            $(this).addClass('active_dot');
                        }
                    });

                });


//Dots control
                $('<div class="slide_dots"></div>').appendTo($('.pegasus_portfolio_2 .et_pb_portfolio  '));
                var controlsCount = slideItemsCount / 2;
                var dotsCount = Math.floor(controlsCount);
                var controlSlideSize = 2 * slideItemswidth;

                for (i = 0; i < dotsCount; i++) {
                    $('<a class="dor_' + i + '">' + i + '</a>').appendTo($('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots'));
                }


                $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a:first-child').addClass('active_dot');
                $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').on('click', function () {
                    $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').removeClass('active_dot');
                    $(this).addClass('active_dot');
                    var dotsSlideCount = $(this).text();

                    $('body.et-fb .pegasus_portfolio_2 .et_pb_portfolio .et_pb_portfolio_grid_items').css('transform', 'translate(-' + dotsSlideCount * controlSlideSize + 'px, 0)');
                    $('.pegasus_portfolio_2 .et_pb_portfolio .et_pb_ajax_pagination_container').css('transform', 'translate(-' + dotsSlideCount * controlSlideSize + 'px, 0)');
                });


            }, timeOut);
        }
    }, timeOut1);

    setTimeout(function () {
        $(".pegasus_portfolio_2 .et_pb_portfolio").fadeIn('slow');
    }, 2000)


//            Porfolio 4

//            Slide Sizes  ***************************************************************************
    var timeOutPortfolio4 = 2000;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio4 = 10000;
    }
    function pegasusSlider4() {
        if ($('.pegasus_portfolio_4 .et_pb_filterable_portfolio ').length > 0) {
            $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project').each(function () {
                if($(this).find('.portfolio_image').length !== 0){
                    $(this).addClass('has_image')
                }
                $('<div class="portfolio_content"></div>').appendTo($(this));
                $(this).find('h2.et_pb_module_header').appendTo($(this).find('.portfolio_content'));
                $(this).find('.myexcerpt').appendTo($(this).find('.portfolio_content'));
            });
            $('<div class="portfolio_content"></div>').appendTo($(''));

            $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
            var showBlog4Slideritems = 3;


            if ($(window).width() <= "767") {
                showBlog4Slideritems = 2;
            }
            if ($(window).width() <= "480") {
                showBlog4Slideritems = 1;
            }

            var slideItemsCount = $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project').length;
            var slideInnerWidth = $('.pegasus_portfolio_4 .et_pb_column_4_4').width();
            $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlog4Slideritems) + "px !important;");
//                    var slideItemswidth = $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project')[0].getBoundingClientRect().width;
            var slideItemswidth = $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project').outerWidth();
            var slideWidth = slideItemsCount * slideItemswidth;

            $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .et_pb_portfolio_items').css("cssText", "width: " + slideWidth + "px !important;");

        }
    }


    //            Slide Arrows  ***************************************************************************
    $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#">D</a><a class="portfolio-arrow-next" href="#">E</a></div>').appendTo($('.pegasus_portfolio_4 .et_pb_filterable_portfolio  '));
    setTimeout(function () {
        var portfolio4LastElements = 2;

        if ($(window).width() <= "767") {
            portfolio4LastElements = 1;
        }
        if ($(window).width() <= "480") {
            portfolio4LastElements = 0;
        }

        $('.pegasus_portfolio_4 .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
            if ($('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 1) {
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
            } else {
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project:nth-last-child(3)').addClass('active_slide');
            }
        });

        $('.pegasus_portfolio_4 .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
            if ($('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').nextAll().length > portfolio4LastElements) {
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
            } else {
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
            }
        });

        $('.pegasus_portfolio_4 .portfolio-slider-arrows a').on('click', function (event) {
            event.preventDefault();
            var slideItemswidth = $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project').outerWidth();
            var sliderSlideSize1 = $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
            var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

            $('.pegasus_portfolio_4 .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');

        });


        $('.pegasus_portfolio_4 .et_pb_portfolio_items .et_pb_portfolio_item').on('click', function () {
            var thisUrl = $(this).find('.et_pb_module_header a').attr('href');
            if(thisUrl){
                window.location.href = thisUrl
            }
        })

    }, timeOutPortfolio4);

//           Call Slide Function  ***************************************************************************
    setTimeout(function () {
        pegasusSlider4();
    }, timeOutPortfolio4);

    setTimeout(function () {
        var hoverCount = 1;
        $('body.et-fb .pegasus_portfolio_4').hover(function () {
            if (hoverCount === 1) {
                pegasusSlider4();
                hoverCount = 0;
            }

        });
    }, timeOutPortfolio4);

    $('.pegasus_portfolio_4 .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
        setTimeout(function () {
            pegasusSlider4();
        }, 200);
    });


//            Porfolio 5


//            Slide Sizes  ***************************************************************************
    var timeOutPortfolio5 = 2000;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio5 = 10000;
    }

    function pegasusSlider5() {
        if ($('.pegasus_portfolio_5 .et_pb_filterable_portfolio ').length > 0) {

            $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
            var showBlog5Slideritems = 4;

            if ($(window).width() <= "980") {
                showBlog5Slideritems = 3;
            }

            if ($(window).width() <= "767") {
                showBlog5Slideritems = 2;
            }
            if ($(window).width() <= "480") {
                showBlog5Slideritems = 1;
            }


            var slideItemsCount = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project').length;
            var slideInnerWidth = $('.pegasus_portfolio_5 .et_pb_column_4_4').width();
            $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlog5Slideritems) + "px !important;");
//                    var slideItemswidth = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project')[0].getBoundingClientRect().width;
            var slideItemswidth = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project').outerWidth();
            var slideWidth = slideItemsCount * slideItemswidth;

            $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .et_pb_portfolio_items').css("cssText", "width: " + slideWidth + "px !important;");
        }

    }

    //            Slide Arrows  ***************************************************************************

    $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#">#</a><a class="portfolio-arrow-next" href="#">$</a></div>').appendTo($('.pegasus_portfolio_5 .et_pb_filterable_portfolio'));
    setTimeout(function () {
        var portfolio5LastElements = 3;

        if ($(window).width() <= "980") {
            portfolio5LastElements = 2;
        }

        if ($(window).width() <= "767") {
            portfolio5LastElements = 1;
        }
        if ($(window).width() <= "480") {
            portfolio5LastElements = 0;
        }


        $('.pegasus_portfolio_5 .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
            if ($('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 1) {
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
            } else {
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project:nth-last-child(4)').addClass('active_slide');
            }
        });

        $('.pegasus_portfolio_5 .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
            if ($('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').nextAll().length > portfolio5LastElements) {
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
            } else {
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
            }
        });

        $('.pegasus_portfolio_5 .portfolio-slider-arrows a').on('click', function (event) {
            event.preventDefault();
//                    var slideItemswidth = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project')[0].getBoundingClientRect().width;
            var slideItemswidth = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project').outerWidth();
            var slider5SlideSize1 = $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
            var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

            $('.pegasus_portfolio_5 .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

        });
    }, timeOutPortfolio5);


    //           Call Slide Function  ***************************************************************************
    setTimeout(function () {
        pegasusSlider5();
    }, timeOutPortfolio5);


    setTimeout(function () {
        var hoverCount5 = 1;
        $('body.et-fb .pegasus_portfolio_5').hover(function () {
            if (hoverCount === 1) {
                pegasusSlider5();
                hoverCount5 = 0;
            }

        });
    }, timeOutPortfolio5);
    if ($('body').hasClass('et-fb')) {
        setInterval(function () {
            if (!$('body.et-fb .pegasus_portfolio_5').hasClass('divi_added')) {
                pegasusSlider5();
                $('body.et-fb .pegasus_portfolio_5').addClass('divi_added')
            }
        }, 200)
    }

    $('.pegasus_portfolio_5 .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
        setTimeout(function () {
            pegasusSlider5();
        }, 200);
    });

//            Portfolio 6

    var timeOutPortfolio6 = 0;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio6 = 10000;
    }


    function Portfolio6() {


        if ($('.pegasus_portfolio_6 .et_pb_filterable_portfolio ').length > 0) {
            $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project').each(function () {
                $('<div class="portfolio_content"></div>').appendTo($(this));
                $(this).find('h2.et_pb_module_header').appendTo($(this).find('.portfolio_content'));
                $(this).find('.myexcerpt').appendTo($(this).find('.portfolio_content'));
                $(this).find('.portfolio_date').appendTo($(this).find('.portfolio_content'));
                $(this).find('.portfolio_auther').appendTo($(this).find('.portfolio_content'));
                $(this).find('.post-meta').appendTo($(this).find('.portfolio_content'));
            });
            $('<div class="portfolio_content"></div>').appendTo($(''));
            $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#">'+__('PREV', 'ddpro')+'</a><a class="portfolio-arrow-next" href="#">'+__('NEXT', 'ddpro')+'</a></div>').appendTo($('.pegasus_portfolio_6 .et_pb_filterable_portfolio  '));
            $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');


            setTimeout(function () {
                var slideItemsCount = $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project').length;
                var slideInnerWidth = $('.pegasus_portfolio_6 .et_pb_column_4_4').width();
                $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project').css("cssText", "width: " + Math.floor(slideInnerWidth) + "px !important;");
//                    var slideItemswidth = $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project')[0].getBoundingClientRect().width;
                var slideItemswidth = $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .et_pb_portfolio_items').css("cssText", "width: " + slideWidth + "px !important;");


                $('.pegasus_portfolio_6 .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                    if ($('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 1) {
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    } else {
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project:last-child').addClass('active_slide');
                    }
                });

                $('.pegasus_portfolio_6 .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
                    if ($('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').nextAll().length > 0) {
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    } else {
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                        $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
                    }


                    $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').each(function () {
                        var dotText = $(this).text();
                        var prevElCount = $('.pegasus_portfolio_2 .et_pb_portfolio .type-project.active_slide').prevAll().length;
                        if (prevElCount / 2 === dotText) {
                            $('.pegasus_portfolio_2 .et_pb_portfolio .slide_dots a').removeClass('active_dot');
                            $(this).addClass('active_dot');
                        }
                    });
                });

                $('.pegasus_portfolio_6 .portfolio-slider-arrows a').on('click', function (event) {
                    event.preventDefault();
                    var sliderSlideSize1 = $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
                    var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                    $('.pegasus_portfolio_6 .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');

                });


            }, 3000);
        }
    }

    setTimeout(function () {
        Portfolio6();
    }, timeOutPortfolio6);
    setTimeout(function () {
        var hoverCount6 = 1;
        $('body.et-fb .pegasus_portfolio_6').hover(function () {
            if (hoverCount6 === 1) {
                Portfolio6();
                hoverCount6 = 0;
            }

        });
    }, timeOutPortfolio5);


//            Slider 2

    var timeOutSlider2 = 1000;
    if ($('body').hasClass('et-fb')) {
        timeOutSlider2 = 10000;
    }

    setTimeout(function () {
        $('.pegasus_slider_2 .et_pb_slider .et_pb_slide_description').on('click', function () {
            var slideUrl = $(this).find('a').attr('href');
            window.location.href = slideUrl;
        });

        $('.pegasus_slider_2 .et-pb-slider-arrows').each(function () {
            $(this).find('.et-pb-arrow-prev').insertAfter($(this).find('.et-pb-arrow-next'));
        })
    }, timeOutSlider2);


//            Slider 3


//            Slide Sizes  ***************************************************************************




    function pegasusSliderModule3() {
        if ($('.pegasus_slider_3 .et_pb_filterable_portfolio ').length > 0) {
            $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').each(function () {
                $('<div class="portfolio_content"></div>').appendTo($(this));
                $(this).find('h2.et_pb_module_header').appendTo($(this).find('.portfolio_content'));
                $(this).find('.myexcerpt').appendTo($(this).find('.portfolio_content'));
            });

            $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');


            var slideItemsCount = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').length;
            var slideInnerWidth = $('.pegasus_slider_3  .et_pb_column_4_4').width();
            $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').css("cssText", "width: " + Math.floor(slideInnerWidth) + "px !important;");

            var slideItemswidth = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').outerWidth();
            var slideWidth = slideItemsCount * slideItemswidth;

            $('.pegasus_slider_3 .et_pb_filterable_portfolio .et_pb_portfolio_items').css("cssText", "width: " + slideWidth + "px !important;");

            var slideItemsheight = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').height();
            $('.pegasus_slider_3 .et_pb_portfolio_items_wrapper ').css('max-height', '' + slideItemsheight + 'px');
        }


    }

    //            Slide Arrows  ***************************************************************************


    function sliderControls() {
        $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#"><span>4</span></a><a class="portfolio-arrow-next" href="#"><span>5</span></a></div>').appendTo($('.pegasus_slider_3 .et_pb_filterable_portfolio'));
        var slideHeight = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project .et_portfolio_image').height();
        $('.pegasus_slider_3 .portfolio-slider-arrows a').each(function () {
            $(this).height(slideHeight);
        });
        var bgSrcNext = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:nth-child(2)').find('.et_portfolio_image img').attr('src');
        var bgSrcPrev = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:last-child').find('.et_portfolio_image img').attr('src');
        $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').css('background-image', 'url(' + bgSrcPrev + ')');
        $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').css('background-image', 'url(' + bgSrcNext + ')');


        $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length > 0) {
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
            } else {
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:last-child').addClass('active_slide');
            }
        });

        $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {

            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').nextAll().length > 0) {
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');

            } else {
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
            }
        });


        $('<div class="slide_dots"></div>').insertBefore($('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_filters '));

        $('.pegasus_slider_3 .portfolio-slider-arrows a').on('click', function (event) {
            event.preventDefault();

            var slideItemswidth = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').outerWidth();

            var slider5SlideSize1 = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
            var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;


            var bgSrcNext = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').next().find('.et_portfolio_image img').attr('src');
            var bgSrcPrev = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prev().find('.et_portfolio_image img').attr('src');
            $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').css('background-image', 'url(' + bgSrcPrev + ')');
            $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').css('background-image', 'url(' + bgSrcNext + ')');
            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').next().length === 0) {
                bgSrcNext = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:first-child').find('.et_portfolio_image img').attr('src');
                $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').css('background-image', 'url(' + bgSrcNext + ')');
            }

            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 0) {
                bgSrcPrev = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:last-child').find('.et_portfolio_image img').attr('src');
                $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').css('background-image', 'url(' + bgSrcPrev + ')');
            }

            $('.pegasus_slider_3 .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            $('.pegasus_slider_3 .et_pb_portfolio .slide_dots a').each(function () {
                var dotText = $(this).text();
                var prevElCount = $('.pegasus_slider_3 .et_pb_portfolio .type-project.active_slide').prevAll().length;
                if (prevElCount === dotText) {
                    $('.pegasus_slider_3 .et_pb_portfolio .slide_dots a').removeClass('active_dot');
                    $(this).addClass('active_dot');
                }
            });
        });


        var slideItemsCount = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project').length;
        var slideItemswidth = $('.pegasus_slider_3 .et_pb_filterable_portfolio').outerWidth();


        for (i = 0; i < slideItemsCount; i++) {
            $('<a class="dor_' + i + '">' + i + '</a>').appendTo($('.pegasus_slider_3 .et_pb_portfolio .slide_dots'));
        }


        $('.pegasus_slider_3 .et_pb_portfolio .slide_dots a:first-child').addClass('active_dot');
        $('.pegasus_slider_3 .et_pb_portfolio .slide_dots a').on('click', function () {
            $('.pegasus_slider_3 .et_pb_portfolio .slide_dots a').removeClass('active_dot');
            $(this).addClass('active_dot');
            var dotsSlideCount = $(this).text();
            var dotsSlideCount2 = parseInt(dotsSlideCount) + 1;
            $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');

            $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:nth-child(' + dotsSlideCount2 + ')').addClass('active_slide');
            $('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_items').css('transform', 'translate(-' + dotsSlideCount * slideItemswidth + 'px, 0)');


            var bgSrcNext = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').next().find('.et_portfolio_image img').attr('src');
            var bgSrcPrev = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prev().find('.et_portfolio_image img').attr('src');
            $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').css('background-image', 'url(' + bgSrcPrev + ')');
            $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').css('background-image', 'url(' + bgSrcNext + ')');
            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').next().length === 0) {
                bgSrcNext = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:first-child').find('.et_portfolio_image img').attr('src');
                $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-next').css('background-image', 'url(' + bgSrcNext + ')');
            }

            if ($('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 0) {
                bgSrcPrev = $('.pegasus_slider_3 .et_pb_filterable_portfolio .type-project:last-child').find('.et_portfolio_image img').attr('src');
                $('.pegasus_slider_3 .portfolio-slider-arrows a.portfolio-arrow-prev').css('background-image', 'url(' + bgSrcPrev + ')');
            }
        });


    }

    $('.pegasus_slider_3').css('opacity', 0);

    var timeOutSlider3 = 2000;
    if ($('body').hasClass('et-fb')) {
        timeOutSlider3 = 10000;
    }

    //           Call Slide Function  ***************************************************************************
    setTimeout(function () {
        $('.pegasus_slider_3 .et_pb_portfolio_filters ').insertAfter($('.pegasus_slider_3 .et_pb_portfolio_items_wrapper'));
        $('.pegasus_slider_3').css('opacity', 1);
        pegasusSliderModule3();
        sliderControls();
    }, timeOutSlider3);

    if ($('body').hasClass('et-fb')) {
        setTimeout(function () {
//                    $('<div class="slide_dots"></div>').insertBefore($('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_filters '));
            $('body.et-fb .pegasus_slider_3').css('opacity', 1);
        }, 7000)
    }

    setTimeout(function () {
        var hoverCountslider3 = 1;
        $('body.et-fb .pegasus_slider_3').hover(function () {
            setTimeout(function () {
                if (hoverCountslider3 === 1) {
                    $('.pegasus_slider_3 .et_pb_portfolio_filters ').insertAfter($('.pegasus_slider_3 .et_pb_portfolio_items_wrapper'));
//                        $('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_items_wrapper').insertBefore($('.slide_dots'));
                    $('.pegasus_slider_3').css('opacity', 1);
                    pegasusSliderModule3();
                    sliderControls();
                    hoverCountslider3 = 0;
                }
            },200)


        });
    }, timeOutSlider3);

    $('.pegasus_slider_3 .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
        $('.pegasus_slider_3 .et_pb_portfolio .portfolio-slider-arrows').css('opacity', 0);
        $('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_items_wrapper').css('opacity', 0);
        setTimeout(function () {
            $('.pegasus_slider_3 .et_pb_filterable_portfolio .portfolio-slider-arrows').remove();
            $('.pegasus_slider_3 .et_pb_portfolio .slide_dots').remove();
            pegasusSliderModule3();

            sliderControls();
        }, 50);
        setTimeout(function () {
            $('.pegasus_slider_3 .et_pb_portfolio .portfolio-slider-arrows').css('opacity', 1);
            $('.pegasus_slider_3 .et_pb_portfolio .et_pb_portfolio_items_wrapper').css('opacity', 1);
        }, 200)
    });


    //            Slider 4


//            Slide Sizes  ***************************************************************************


    function pegasusSliderModule4() {
        if ($('.pegasus_slider_4').length > 0) {


            $('<div class="slide_right_box"><div class="slide_descriptions"></div><div class="slide_navigation"></div></div>').appendTo('.pegasus_slider_4 .et_pb_slides');
            var classFirst = 1;
            var classDots = 1;
            $('.pegasus_slider_4 .et_pb_slide').each(function () {

                $(this).find('.et_pb_button_wrapper').attr('id', 'slide_' + classFirst).appendTo('.slide_navigation');
                $(this).find('.et_pb_slide_description').addClass('slide_' + classFirst);
                $(this).find('.et_pb_slide_description').appendTo($('.slide_descriptions'));

                $(this).addClass('slide_' + classFirst);
                classFirst++;
            });


            setTimeout(function () {
                var descFirstHeight = 0;
                $('.slide_right_box .slide_descriptions .et_pb_slide_description').each(function () {
                    var descHeight = $(this).height();
                    if (descHeight > descFirstHeight) {
                        descFirstHeight = descHeight;
                    }
                });

                $('.slide_right_box .slide_descriptions').css('min-height', descFirstHeight);


                $('.pegasus_slider_4 .et-pb-controllers a').each(function () {
                    var dotBg = $('.pegasus_slider_4 .et_pb_slide.slide_' + classDots).css('background-image');


                    $(this).attr('id', 'slide_' + classDots).css('background-image', dotBg);
                    classDots++;
                });

                $('.pegasus_slider_4 .et-pb-controllers a').on('click', function (event) {
                    event.preventDefault();
                    var dotClass = $(this).attr('id');
                    $('.pegasus_slider_4 .et_pb_slide').css('cssText', 'opacity: 0 !important; z-index: 1 !important');

                    $('.pegasus_slider_4 .et_pb_button_wrapper a').removeClass('active_nav');
                    $('.pegasus_slider_4 .et_pb_slide_description').css('opacity', 0);

                    $('.pegasus_slider_4 .et_pb_slide.' + dotClass + '').css('cssText', 'opacity: 1 !important; z-index: 3 !important');
                    // $('.pegasus_slider_4 .et_pb_slide.' + dotClass + '').css('cssText', 'z-index: 3 !important');

                    $('.pegasus_slider_4 .et_pb_button_wrapper#' + dotClass + ' a').addClass('active_nav');

                    $('.pegasus_slider_4 .et_pb_slide_description.' + dotClass + '').css('opacity', 1);
                });
            }, 2000);


            $('.pegasus_slider_4 .et_pb_button_wrapper a').on('click', function (event) {
                event.preventDefault();


                    $('.pegasus_slider_4 .et_pb_slide').css('cssText', 'opacity: 0 !important; z-index 1: !important');
                    // $('.pegasus_slider_4 .et_pb_slide').css('cssText', 'z-index 1: !important');
                    $('.pegasus_slider_4 .et_pb_slide_description').css('opacity', 0);
                    $('.pegasus_slider_4 .et-pb-controllers a').removeClass('et-pb-active-control');

                    $('.pegasus_slider_4 .et_pb_button_wrapper a').removeClass('active_nav');
                $(this).addClass('active_nav');
                var thisClass = $(this).parent().attr('id');
                    $('.pegasus_slider_4 .et-pb-controllers a#' + thisClass + '').addClass('et-pb-active-control');
                    $('.pegasus_slider_4 .et_pb_slide.' + thisClass + '').css('cssText', 'opacity: 1 !important; z-index: 3 !important');
                    // $('.pegasus_slider_4 .et_pb_slide.' + thisClass + '').css('cssText', 'z-index: 3 !important');
                    $('.pegasus_slider_4 .et_pb_slide_description.' + thisClass + '').css('opacity', 1);


            });


            $('.pegasus_slider_4 .et_pb_slide.slide_1').css('cssText', 'opacity: 1 !important; z-index: 3 !important');
            // $('.pegasus_slider_4 .et_pb_slide.slide_1').css('cssText', 'z-index: 3 !important');
            $('.pegasus_slider_4 .et_pb_slide_description.slide_1').css('opacity', 1);
            $('.pegasus_slider_4 .et_pb_button_wrapper#slide_1 a').addClass('active_nav');




        }
    }

    var timeOutSlider4 = 0;
    if ($('body').hasClass('et-fb')) {
        timeOutSlider4 = 8000;
    }

    setTimeout(function () {
        if($('.pegasus_slider_4 .et_pb_slider').hasClass('et_slider_auto')){

            var arrClasses = [];
            $(".pegasus_slider_4 .et_pb_slider[class*='et_slider_speed_']").removeClass(function () {
                var className = this.className.match(/et_slider_speed_\d+/);
                if (className) {
                    arrClasses.push(className[0]);
                    return className[0];
                }
            });

            var className = arrClasses[0];
            className = className.replace(/[^\d]+/, '');

            console.log(className)
            setInterval(function () {



            if($('.pegasus_slider_4 .et-pb-controllers a.et-pb-active-control').next().length !== 0){
                $('.pegasus_slider_4 .et-pb-controllers a.et-pb-active-control').removeClass('et-pb-active-control').next().addClass('et-pb-active-control')
            }else{
                $('.pegasus_slider_4 .et-pb-controllers a.et-pb-active-control').removeClass('et-pb-active-control');
                $('.pegasus_slider_4 .et-pb-controllers a:first-child').addClass('et-pb-active-control');
            }

            var dotClass = $('.pegasus_slider_4 .et-pb-controllers a.et-pb-active-control').attr('id');
                $('.pegasus_slider_4 .et_pb_slide').css('cssText', 'opacity: 0 !important; z-index 1: !important');
            $('.pegasus_slider_4 .et_pb_button_wrapper a').removeClass('active_nav');
            $('.pegasus_slider_4 .et_pb_slide_description').css('opacity', 0);

                $('.pegasus_slider_4 .et_pb_slide.' + dotClass + '').css('cssText', 'opacity: 1 !important; z-index: 3 !important');

            $('.pegasus_slider_4 .et_pb_button_wrapper#' + dotClass + ' a').addClass('active_nav');

            $('.pegasus_slider_4 .et_pb_slide_description.' + dotClass + '').css('opacity', 1);

            },className)
        }
    }, 1000)

    setTimeout(function () {
        pegasusSliderModule4();

    }, timeOutSlider4);

    setTimeout(function () {
        $('.pegasus_slider_4 .et-pb-controllers a').on('click', function () {
            var classclickDots = 1;
            $('.pegasus_slider_4 .et-pb-controllers a').each(function () {
                var dotBg = $('.pegasus_slider_4 .et_pb_slide.slide_' + classclickDots).css('background-image');


                $(this).attr('id', 'slide_' + classclickDots).css('background-image', dotBg);
                classclickDots++;
            });
        });
    }, 2000);


    //            Pegasus Blogs

    $('.pegasus_blog_1 .et_pb_posts  article.et_pb_post, .pegasus_blog_3 .et_pb_posts  article.et_pb_post').each(function () {
        $('<div class="post_info"></div>').appendTo(this);


        $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
        $(this).find('.post-meta').appendTo($(this).find('.post_info'));
        $(this).find('.post-content').appendTo($(this).find('.post_info'));


    });


    $('.pegasus_blog_2 article, .pegasus_blog_3 article, .pegasus_blog_5 article, .pegasus_blog_6 article, .pegasus_blog_7 article').on('click', function () {
        var projectLink = $(this).find('h2.entry-title a').attr('href');
        if (projectLink) {
            window.location.href = projectLink;
        }
    });

    $('.pegasus_blog_6 .entry-featured-image-url').each(function () {
        $("<div class='text_read_more'></div>").appendTo($(this));
    });

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);


    setInterval(function () {
        $('.pegasus_blog_6 .entry-featured-image-url').each(function () {
            if (!$('.pegasus_blog_6 .entry-featured-image-url').hasClass('div_added')) {
                $("<div class='text_read_more'></div>").appendTo($(this));
                $(this).addClass('div_added');
            }
        });


        $('body.et-fb .et_pb_posts  .et_pb_post').each(function () {
            if (!$(this).hasClass('div_added')) {
                $('<div class="post_info"></div>').appendTo($(this));
                $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
                $(this).find('.post-meta').appendTo($(this).find('.post_info'));
                $(this).find('.post-content').appendTo($(this).find('.post_info'));
                $(this).find('.more-link').appendTo($(this).find('.post_info .post-content'));
                $(this).addClass('div_added');
            }
        })
    }, 200);


    setTimeout(function () {
        $('.pegasus_blog_1 article').each(function () {
            $(this).find('.post_info .post-meta').insertBefore($(this).find('.post_info h2.entry-title'));


        });

        $('.pegasus_blog_1 article:not(:first-child)').each(function () {
            $(this).find('h2.entry-title a').succinct({
                size: 50
            });
        });

        $('.pegasus_blog_1 article:first-child h2.entry-title a').succinct({
            size: 130
        });


    }, 500);


//            Blog 2

    $('.pegasus_blog_2 .et_pb_posts  .et_pb_post  .post-meta, .pegasus_blog_7 .et_pb_posts  .et_pb_post  .post-meta, .pegasus_blog_6 .et_pb_posts  .et_pb_post  .post-meta').each(function () {

        var author = $(this).find('span.author')[0];

        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="tag"]').toArray();

        var dateDay = $(this).find('.published').text();
        var month = dateDay.replace(/\d+/g, '');
        var day = parseInt(dateDay);


        if (day <= 9) {
            day = '0' + day;
        }

        if (dateDay) {
            date = '<span class="published"><span class="day"> ' + day + '</span><span class="month"> ' + month + '</span></span>';
        }


        if (categories) {
            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });
            categories = categories.join(', ');
        }


        if (author) {
            var html = '<span class="auther_posted">Posted</span> ' + author.outerHTML + ' / ';
            html += date;
        } else {
            var html = date;
        }


        html += "<span class='categories'>" + categories + "</span>";

        $(this).html(html);
    });

    setInterval(function () {
        $('body.et-fb .pegasus_blog_2 .et_pb_posts  .et_pb_post  .post-meta, body.et-fb .pegasus_blog_7 .et_pb_posts  .et_pb_post  .post-meta, .pegasus_blog_6 .et_pb_posts  .et_pb_post  .post-meta').each(function () {
            if (!$(this).hasClass('div_added')) {
                var author = $(this).find('span.author')[0];

                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="tag"]').toArray();

                var dateDay = $(this).find('.published').text();
                var month = dateDay.replace(/\d+/g, '');
                var day = parseInt(dateDay);


                if (day <= 9) {
                    day = '0' + day;
                }

                if (dateDay) {
                    date = '<span class="published"><span class="day"> ' + day + '</span><span class="month"> ' + month + '</span></span>';
                }


                if (categories) {
                    categories = $.map(categories, function (element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');
                }


                if (author) {
                    var html = '<span class="auther_posted">Posted</span> ' + author.outerHTML + ' / ';
                    html += date;
                } else {
                    var html = date;
                }


                html += "<span class='categories'>" + categories + "</span>";

                $(this).html(html);


                $(this).find('.categories').insertBefore($(this).find('.published'));
                $(this).prependTo($(this).parent('.et_pb_post'));

                $(this).addClass('div_added');
            }
        });
    }, 200);

    setTimeout(function () {
        if($('body.et-fb .pegasus_blog_6').length !== 0){
            if (!$('body.et-fb .pegasus_blog_6 .et_pb_ajax_pagination_container').hasClass('div_added')) {
                $('<div class="gutter_blog_width"></div>').appendTo('.pegasus_blog_6 .et_pb_ajax_pagination_container');

                var $container = $('.pegasus_blog_6 .et_pb_ajax_pagination_container');
                $container.masonry({
                    columnWidth: '.et_pb_post',
                    itemSelector: '.et_pb_post',
                    gutter: '.gutter_blog_width'
                });



                $('.pegasus_blog_6 article .post-meta').each(
                    function () {
                        $(this).find('.categories').html($(this).find('.categories').html().replace(',',''))
                    }
                )



                $('body.et-fb .pegasus_blog_6 .et_pb_ajax_pagination_container').addClass('div_added');
            }
        }



    }, timeOutPegasus);

    setInterval(function () {
        if($('.pegasus_blog_6').length !== 0){
            if (!$('.pegasus_blog_6 .et_pb_ajax_pagination_container').hasClass('div_added')) {
                $('<div class="gutter_blog_width"></div>').appendTo('.pegasus_blog_6 .et_pb_ajax_pagination_container');

                var $container = $('.pegasus_blog_6 .et_pb_ajax_pagination_container');
                $container.masonry({
                    columnWidth: '.et_pb_post',
                    itemSelector: '.et_pb_post',
                    gutter: '.gutter_blog_width'
                });



                $('.pegasus_blog_6 article .post-meta').each(
                    function () {
                        $(this).find('.categories').html($(this).find('.categories').html().replace(',',''))
                    }
                )



                $('.pegasus_blog_6 .et_pb_ajax_pagination_container').addClass('div_added');
            }
        }



    }, 200);


    setTimeout(function () {
        if($('.pegasus_blog_6').length !== 0){
            var $container = $('.pegasus_blog_6 .et_pb_ajax_pagination_container');
            $container.masonry({
                columnWidth: '.et_pb_post',
                itemSelector: '.et_pb_post',
                gutter: '.gutter_blog_width'
            });
        }

    }, timeOutPegasus);


    setTimeout(function () {
        $('.pegasus_blog_6 .et_pb_posts  .et_pb_post').each(function () {
            $(this).find('.post_info .post-meta').prependTo($(this));
        });


        $('.pegasus_blog_2 article').each(function () {
            $(this).find('h2.entry-title a').succinct({
                size: 60
            });

            $(this).find('.post-content p').succinct({
                size: 150
            });
        });

        $('.pegasus_blog_3 article').each(function () {

            $(this).find('.post-content p').succinct({
                size: 100
            });
        });

        $('.pegasus_blog_4 article').each(function () {
            $(this).find('h2.entry-title a').succinct({
                size: 90
            });

            $(this).find('.post-content p').succinct({
                size: 130
            });
        });

        $('.pegasus_blog_6 article').each(function () {
            $(this).find('h2.entry-title a').succinct({
                size: 140
            });

            $(this).find('.post-content p').succinct({
                size: 100
            });
        });



        $('.pegasus_blog_7 article').each(function () {
            $(this).find('h2.entry-title a').succinct({
                size: 80
            });

            $(this).find('.post-content p').succinct({
                size: 150
            });
        });

    }, timeOutPegasus);


//            End Blogs


//            Header


    $('.pegasus_header_5 .et_pb_column').on('inview', function (event, isInView) {
        if (isInView) {
            $(this).addClass('viewPortColumn');
        }
    });


    var blurbBgFirst = $('.pegasus_header_5 .et_pb_blurb:first-of-type .et_pb_main_blurb_image img').attr('src');
    $('.pegasus_header_5 .et_pb_column').css('background-image', 'url(' + blurbBgFirst + ')');

    $('.pegasus_header_5 .et_pb_blurb').hover(
        function () {
            var blurbBg = $(this).find('.et_pb_main_blurb_image img').attr('src');
            var element = $(this);

            element.addClass("active");
            element.parent('.et_pb_column').css('background-image', 'url(' + blurbBg + ')');


        }, function () {
            $(this).removeClass("active");
        }
    );


    $('.pegasus_header_5 .et_pb_blurb').on('click', function () {
        var pageLink = $(this).find('h4 a').attr('href');
        if (pageLink) {
            window.location.href = pageLink;
        }
    });

    $('.pegasus_header_4 .et_pb_slide ').each(function () {
        $(this).find('.et_pb_slide_description').insertBefore($(this).find('.et_pb_slide_image'))
    });


    $(".pegasus_header_9 .et_pb_blurb").each(function (e) {
        var i = $(this).find(".et_pb_main_blurb_image img").attr("src");
        $(this).find(".et_pb_blurb_container h4").css({background: "url(" + i + ")"})
    });

    setInterval(function () {
        $("body.et-fb .pegasus_header_9 .et_pb_blurb").each(function (e) {
            if (!$(this).hasClass('div_added')) {
                var i = $(this).find(".et_pb_main_blurb_image img").attr("src");
                $(this).find(".et_pb_blurb_container h4").css({background: "url(" + i + ")"});
                $(this).addClass('div_added');
            }

        });


        $('body.et-fb .pegasus_header_5 .et_pb_column').on('inview', function (event, isInView) {
            if (!$(this).hasClass('divi_added')) {
                if (isInView) {
                    $(this).addClass('viewPortColumn');
                }
                $(this).addClass('divi_added')
            }

        });

    }, 200);

    setTimeout(function () {
        var blurbBgFirst = $('body.et-fb .pegasus_header_5 .et_pb_blurb:first-of-type .et_pb_main_blurb_image img').attr('src');
        $('body.et-fb .pegasus_header_5 .et_pb_column').css('background-image', 'url(' + blurbBgFirst + ')');

        $('body.et-fb .pegasus_header_5 .et_pb_blurb').hover(
            function () {
                var blurbBg = $(this).find('.et_pb_main_blurb_image img').attr('src');
                var element = $(this);

                element.addClass("active");
                element.parent('.et_pb_column').css('background-image', 'url(' + blurbBg + ')');


            }, function () {
                $(this).removeClass("active");
            }
        );
    }, 5000)


//            Header 6 Slider

    var timeHeader6Slider = 2000;
    if ($('body').hasClass('et-fb')) {
        timeHeader6Slider = 10000;
    }






    setTimeout(function () {

        if ($('.pegasus_header_6').length !== 0) {

            var imageHeightHeader6 = $('.pegasus_header_6 .et_pb_slide_with_image:first-child').outerHeight()+178;
            $('.pegasus_header_6').css('max-height', imageHeightHeader6+'px');

            var header_6_showElements = 3;
            var header_6_nextPrevElements = 3.85;
            var header_6_activeElements = 2.08;

            if ($(window).width() <= 767) {
                header_6_showElements = 1;

                header_6_nextPrevElements = 1;
                header_6_activeElements = 0;
            }

            $('.pegasus_header_6 .et_pb_slide:last-child').clone().insertBefore($('.pegasus_header_6 .et_pb_slide:first-child'));
            $('.pegasus_header_6 .et_pb_slide:nth-child(3)').clone().insertAfter($('.pegasus_header_6 .et_pb_slide:last-child'));

            $('.pegasus_header_6 .et_pb_slide:nth-child(2)').addClass('active_item');

            var slideHeader6ItemsCount = $('.pegasus_header_6 .et_pb_slide').length;
            var slideHeader6ItemsWidth = $('.pegasus_header_6 .et_pb_slide').width();
            var slideHeader6ContainerWidth = slideHeader6ItemsCount * slideHeader6ItemsWidth;
            var slideHeader6OuterContainerWidth = $('.pegasus_header_6 .et_pb_row').width();
            $('.pegasus_header_6 .et_pb_slides').width(slideHeader6ContainerWidth);



            $('.pegasus_header_6 .et_pb_slide').each(function () {
                // this_width=Math.floor(slideHeader6OuterContainerWidth) / header_6_showElements;
                // $(this).attr('style', 'width: '+this_width+'px;');
                $('.pegasus_header_6 .et_pb_slides .et_pb_slide').css("cssText", "width: " + Math.floor(slideHeader6OuterContainerWidth) / header_6_showElements + "px;");
            });

            $('.pegasus_header_6 .et_pb_slide.active_item').prev().addClass('prev').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
            $('.pegasus_header_6 .et_pb_slide.active_item').next().addClass('next').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
            $('.pegasus_header_6 .et_pb_slide.active_item').width(slideHeader6OuterContainerWidth / header_6_activeElements);


            if ($(window).width() <= 767) {
                var sliderSlideSize6 = $('.pegasus_header_6 .et_pb_slide.active_item').prevAll().length;
                var sliderSlideSize2 = sliderSlideSize6 * slideHeader6ItemsWidth;
                $('.pegasus_header_6 .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
            }


            $('.pegasus_header_6 .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
                if($('.pegasus_header_6 .et_pb_slide.active_item').nextAll().length >= 2){
                    $('.pegasus_header_6 .et_pb_slide.active_item').removeClass('active_item').next().addClass('active_item');
                }else{
                    $('.pegasus_header_6 .et_pb_slide.active_item').removeClass('active_item');
                    $('.pegasus_header_6 .et_pb_slide:nth-child(2)').addClass('active_item');
                }
            })


            $('.pegasus_header_6 .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                if($('.pegasus_header_6 .et_pb_slide.active_item').prevAll().length >= 2){
                    $('.pegasus_header_6 .et_pb_slide.active_item').removeClass('active_item').prev().addClass('active_item');
                }else{
                    $('.pegasus_header_6 .et_pb_slide.active_item').removeClass('active_item');
                    $('.pegasus_header_6 .et_pb_slide:nth-last-child(2)').addClass('active_item');
                }
            })


            $('.pegasus_header_6 .et-pb-slider-arrows a').on('click', function () {

                $('.pegasus_header_6 .et_pb_slide').removeClass('prev');
                $('.pegasus_header_6 .et_pb_slide').removeClass('next');
                setTimeout(function () {
                    var slideHeader6OuterContainerWidth = $('.pegasus_header_6 .et_pb_row').width();
                    var slideHeader6ItemsWidth = 0;
                    $('.pegasus_header_6 .et_pb_slide').each(function () {
                        if (!$(this).hasClass('prev') && !$(this).hasClass('next') && !$(this).hasClass('active_item')) {
                            slideHeader6ItemsWidth = $(this).width();
                        }
                    });


                    var sliderSlideSize6 = $('.pegasus_header_6 .et_pb_slide.active_item').prevAll().length - 1;

                    if ($(window).width() <= 767) {
                        sliderSlideSize6 = $('.pegasus_header_6 .et_pb_slide.active_item').prevAll().length;
                    }

                    $('.pegasus_header_6 .et_pb_slide').width(slideHeader6ItemsWidth);
                    $('.pegasus_header_6 .et_pb_slides').css('style', 'transform: translate(0px)');
                    $('.pegasus_header_6 .et_pb_slide.active_item').prev().addClass('prev').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
                    $('.pegasus_header_6 .et_pb_slide.active_item').next().addClass('next').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
                    $('.pegasus_header_6 .et_pb_slide.active_item').width(slideHeader6OuterContainerWidth / header_6_activeElements);

                    var sliderSlideSize2 = sliderSlideSize6 * slideHeader6ItemsWidth;

                    $('.pegasus_header_6 .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
                }, 500);
            });

            $('.pegasus_header_6 .et_pb_row').css('opacity', 1);

        }
    }, timeHeader6Slider);



    //        Header 6 Script For Visual Builder
    // setTimeout(function () {
    //     if ($('body.et-fb .pegasus_header_6').length !== 0) {
    //         setInterval(function () {
    //             if (!$('body.et-fb .pegasus_header_6 .et_pb_column_4_4').hasClass('div_added')) {
    //
    //                 var header_6_showElements = 3;
    //                 var header_6_nextPrevElements = 3.85;
    //                 var header_6_activeElements = 2.08;
    //
    //                 if ($(window).width() <= 767) {
    //                     header_6_showElements = 1;
    //
    //                     header_6_nextPrevElements = 1;
    //                     header_6_activeElements = 0;
    //                 }
    //                 $('.pegasus_header_6 .et_pb_slide:last-child').clone().insertBefore($('.pegasus_header_6 .et_pb_slide:first-child'));
    //                 $('.pegasus_header_6 .et_pb_slide:nth-child(3)').clone().insertAfter($('.pegasus_header_6 .et_pb_slide:last-child'));
    //                 var slideHeader6ItemsCount = $('.pegasus_header_6 .et_pb_slide').length;
    //                 var slideHeader6ItemsWidth = $('.pegasus_header_6 .et_pb_slide').width();
    //                 var slideHeader6ContainerWidth = slideHeader6ItemsCount * slideHeader6ItemsWidth;
    //                 var slideHeader6OuterContainerWidth = $('.pegasus_header_6 .et_pb_row').width();
    //                 $('.pegasus_header_6 .et_pb_slides').width(slideHeader6ContainerWidth);
    //
    //
    //                 $('.pegasus_header_6 .et_pb_slide').each(function () {
    //                     $('.pegasus_header_6 .et_pb_slides .et_pb_slide').css("cssText", "width: " + Math.floor(slideHeader6OuterContainerWidth) / header_6_showElements + "px;");
    //                 });
    //
    //                 $('.pegasus_header_6 .et_pb_slide.et-pb-active-slide').prev().addClass('prev').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
    //                 $('.pegasus_header_6 .et_pb_slide.et-pb-active-slide').next().addClass('next').width(slideHeader6OuterContainerWidth / header_6_nextPrevElements);
    //                 $('.pegasus_header_6 .et_pb_slide.et-pb-active-slide').width(slideHeader6OuterContainerWidth / header_6_activeElements);
    //
    //
    //                 if ($(window).width() <= 767) {
    //                     var sliderSlideSize6 = $('.pegasus_header_6 .et_pb_slide.et-pb-active-slide').prevAll().length;
    //                     var sliderSlideSize2 = sliderSlideSize6 * slideHeader6ItemsWidth;
    //                     $('.pegasus_header_6 .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
    //                 }
    //
    //
    //                 $('body.et-fb .pegasus_header_6 .et_pb_column_4_4').addClass('div_added');
    //             }
    //         }, 200);
    //     }
    // }, 8000);





//            end Header

    var timeOutPortfolio3 = 1000;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio3 = 10000;
    }

    function masonryPortfolio() {
        setTimeout(function () {
            var $container = $('.pegasus_portfolio_3 .et_pb_portfolio_items');
            $container.masonry({
                columnWidth: '.project',
                itemSelector: '.project',
                gutter: '.gutter_width'
            });

        }, 1000);
    }


    setTimeout(function () {
        if($('body.et-fb .pegasus_portfolio_3').length !== 0){
            $('<div class="gutter_width"></div>').appendTo('body.et-fb .pegasus_portfolio_3 .et_pb_portfolio_items');
            masonryPortfolio();
        }

    }, timeOutPortfolio3);


    setTimeout(function () {
        var hoverCount3 = 1;
        $('body.et-fb .pegasus_portfolio_3').hover(function () {
            if (hoverCount3 === 1) {
                $('<div class="gutter_width"></div>').appendTo('body.et-fb .pegasus_portfolio_3 .et_pb_portfolio_items');
                masonryPortfolio();
                hoverCount3 = 0;
            }

        });
    }, timeOutPortfolio3);
    if ($('body').hasClass('et-fb')) {
        setInterval(function () {
            if (!$('body.et-fb .pegasus_portfolio_3 .et_pb_column').hasClass('divi_added')) {
                $('<div class="gutter_width"></div>').appendTo('body.et-fb .pegasus_portfolio_3 .et_pb_portfolio_items');
                masonryPortfolio();
                $('body.et-fb .pegasus_portfolio_3 .et_pb_column').addClass('divi_added')
            }
        }, 200);
    }

    $('<div class="gutter_width"></div>').appendTo('.pegasus_portfolio_3 .et_pb_portfolio_items');


    $('.pegasus_portfolio_3 .et_pb_portfolio_items .type-project').each(function () {
        $('<div class="image_hover"></div>').appendTo($(this).find('.et_portfolio_image'));

    });



        if( $('.pegasus_portfolio_3').length !== 0){
            masonryPortfolio()
            $('.pegasus_portfolio_3 .et_pb_portfolio_items .type-project').hoverdir({
                hoverDelay: 75,
                hoverElem: '.image_hover'
            });
        }



    setTimeout(function () {
        $('.pegasus_portfolio_3 .et_pb_portfolio_items_wrapper').css('min-height', $('.pegasus_portfolio_3 .et_pb_portfolio_items').height())
    },1500)


    function imagesInViewport() {
        $('.pegasus_portfolio_1.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_2.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_3.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_4.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_5.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_6.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_7.et_pb_section .et_pb_portfolio .type-project, .pegasus_portfolio_8.et_pb_section .et_pb_portfolio .type-project').on('inview', function (event, isInView) {
            if (isInView) {
                $(this).addClass('viewPortProject');
                setTimeout(function () {
                    var count = $('.et_pb_section .et_pb_portfolio .type-project').length;
                    var i = 1;

                    function transition() {
                        $('.et_pb_section .et_pb_portfolio .viewPortProject.type-project:nth-child(' + i + ')').addClass('active_item');
                        i++;
                    }

                    setInterval(function () {
                        if (i <= count) {
                            transition()
                        }
                    }, 60);
                }, 100);
            } else {

            }
        });
    }


    var timeOutPortfolioImage = 0;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolioImage = 8000;
    }
    setTimeout(function () {
        imagesInViewport();
    }, timeOutPortfolioImage);



    $('.et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
        setTimeout(function () {
            imagesInViewport();
        }, 500)
    });

    $('.pegasus_portfolio_3 .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
        setTimeout(function () {
            $('<div class="gutter_width"></div>').appendTo('.pegasus_portfolio_3 .et_pb_portfolio_items');
            $('.pegasus_portfolio_3 .et_pb_portfolio_items').masonry('destroy');
            masonryPortfolio();
            $('.pegasus_portfolio_3 .et_pb_portfolio_items .type-project').hoverdir({
                hoverDelay: 75,
                hoverElem: '.image_hover'
            });


        }, 10)
    });

    setTimeout(function () {
        $('.pegasus-blurb7 .et_pb_blurb').each(function () {
            $('<div class="image_hover"></div>').appendTo($(this).find('.et_pb_main_blurb_image'));

        });

        if($('.pegasus-blurb7').length !== 0){
            $('.pegasus-blurb7 .et_pb_blurb').hoverdir({
                hoverDelay: 75,
                hoverElem: '.image_hover'
            });
        }


        $('.pegasus-blurb15 .et_pb_blurb').each(function () {
            $('<div class="image_hover"></div>').appendTo($(this));

        });

        if($('.pegasus-blurb15').length !== 0){
            $('.pegasus-blurb15 .et_pb_blurb').hoverdir({
                hoverDelay: 75,
                hoverElem: '.image_hover'
            });
        }

    }, timeOutPegasus);



//            Persons Module

    var timeOutPerson1 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutPerson1 = 7000;
    }
    setTimeout(function () {
        if ($('.pegasus_person_1').length > 0) {
            $('<div class="persons-slider-arrows"><a class="portfolio-arrow-prev" href="#">#</a><a class="portfolio-arrow-next" href="#">$</a></div>').appendTo($('.pegasus_person_1 .et_pb_column_2_3'));
            $('.pegasus_person_1 .et_pb_team_member:first-child').addClass('active_slide');
            var showBlogSlideritems = 2.55;
            var person_1_afterActiveElement = 2;
            var person_1_nthElement = 3;

            if ($(window).width() <= "980") {
                person_1_afterActiveElement = 1;
                person_1_nthElement = 2;
            }
            if ($(window).width() <= "767") {
                showBlogSlideritems = 2;
            }
            if ($(window).width() <= "480") {
                showBlogSlideritems = 1.35;
                person_1_afterActiveElement = 0;
                person_1_nthElement = 1;
            }

            var timeOutPerson1Inner = 2000;

            if ($('body').hasClass('et-fb')) {
                timeOutPerson1Inner = 0;
            }


            setTimeout(function () {
                $('<div class="person_slide_outer_container"><div class="person_slide_container"></div></div>').appendTo($('.pegasus_person_1 .et_pb_column_2_3'));
                var slideItemsCount;
                var slideItemswidth;
                $('.pegasus_person_1').each(function () {

                    $(this).find('.et_pb_team_member').appendTo($(this).find('.person_slide_container'));


                    $(this).find('.et_pb_team_member:first-child').clone().removeClass('et_clickable').addClass('active_slide').insertAfter($(this).find('.et_pb_team_member:first-child'));
                    $(this).find('.et_pb_team_member:first-child').removeClass('active_slide').insertAfter($(this).find('.et_pb_team_member:last-child'));

                    slideItemsCount = $(this).find('.et_pb_team_member').length;
                    var slideInnerWidth = $(this).find('.et_pb_column_2_3').width();
                    $(this).find('.et_pb_team_member').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlogSlideritems) + "px !important;");

                    slideItemswidth = $(this).find('.et_pb_team_member').outerWidth();
                    var slideWidth = slideItemsCount * slideItemswidth;

                    $(this).find('.person_slide_container').css("cssText", "width: " + slideWidth + "px !important;");
                    if ($(window).width() >= "981") {
                        $(this).find('.person_slide_container').css('transform', 'translate(-' + slideItemswidth / showBlogSlideritems + 'px, 0)');
                    }




                    $('<div class="slide_dots"></div>').appendTo($(this).find('.et_pb_column_2_3'));
                    var controlsCount = slideItemsCount / 2;
                    var dotsCount = Math.floor(controlsCount);
                    var controlSlideSize = 2 * slideItemswidth;

                    for (i = 0; i < dotsCount; i++) {
                        $('<a class="dor_' + i + '">' + i + '</a>').appendTo($(this).find('.slide_dots'));
                    }


                    $(this).find('.slide_dots a:first-child').addClass('active_dot');
                })

                $('.pegasus_person_1 .persons-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                    if ($(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').prev().length === 1) {
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    } else {
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').removeClass('active_slide');
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member:nth-last-child(' + person_1_nthElement + ')').addClass('active_slide');
                    }
                });

                $('.pegasus_person_1 .persons-slider-arrows a.portfolio-arrow-next').on('click', function () {
                    if ($(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').nextAll().length !== person_1_afterActiveElement) {
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    } else {
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').removeClass('active_slide');
                        $(this).closest('.pegasus_person_1').find('.et_pb_team_member:first-child').addClass('active_slide');
                    }
                });

                $('.pegasus_person_1 .persons-slider-arrows a').on('click', function (event) {
                    event.preventDefault();
                    var sliderSlideSize1 = $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').prevAll().length;
                    var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;
                    if ($(window).width() >= 981) {
                        var sliderSlideSize3 = sliderSlideSize2 + (slideItemswidth / showBlogSlideritems);
                    } else {
                        var sliderSlideSize3 = sliderSlideSize2;
                    }


                    $(this).closest('.pegasus_person_1').find('.person_slide_container').css('transform', 'translate(-' + sliderSlideSize3 + 'px, 0)');

                    $(this).closest('.pegasus_person_1').find('.slide_dots a').each(function () {
                        var dotText = $(this).text();
                        var prevElCount = $(this).closest('.pegasus_person_1').find('.et_pb_team_member.active_slide').prevAll().length;
                        if (prevElCount / 2 === dotText) {
                            $(this).closest('.pegasus_person_1').find('.slide_dots a').removeClass('active_dot');
                            $(this).addClass('active_dot');
                        }
                    });

                });


//Dots control


                $('.pegasus_person_1 .slide_dots a').on('click', function () {
                    $(this).closest('.pegasus_person_1').find('.slide_dots a').removeClass('active_dot');
                    $(this).addClass('active_dot');
                    var dotsSlideCount = $(this).text();


                    slideItemswidth = $('.pegasus_person_1 .et_pb_team_member').outerWidth();
                    var controlSlideSize = 2 * slideItemswidth;

                    if ($(window).width() >= 981) {



                        if((parseInt(dotsSlideCount)+1)*2 ===  $('.pegasus_person_1 .et_pb_team_member').length){
                            var dotsClickMove = (dotsSlideCount * controlSlideSize) + (slideItemswidth / showBlogSlideritems) - slideItemswidth;
                        }else{
                            var dotsClickMove = (dotsSlideCount * controlSlideSize) + (slideItemswidth / showBlogSlideritems);
                        }

                    } else {
                        var dotsClickMove = dotsSlideCount * controlSlideSize;
                    }


                    $(this).closest('.pegasus_person_1').find('.person_slide_container').css('transform', 'translate(-' + dotsClickMove + 'px, 0)');
                });


            }, timeOutPerson1Inner);
        }

    }, timeOutPerson1);


//            Person 2

    //            Slide Sizes  ***************************************************************************

    var timeOutPerson2Inner = 2500;
    var timeOutPerson2 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutPerson2 = 7000;
        var timeOutPerson2Inner = 0;
    }
    setTimeout(function () {
        if ($('.pegasus_person_2').length > 0) {
            setTimeout(function () {
                $('<div class="person2_slide_outer_container"><div class="person2_slide_container"></div></div>').appendTo($('.pegasus_person_2 .et_pb_column_4_4'));
                $('.pegasus_person_2 .et_pb_team_member').each(function () {
                    $(this).appendTo($('.person2_slide_container'));
                });


                $('.pegasus_person_2 .et_pb_team_member:first-child').addClass('active_slide');
                var showPersonSlideritems = 4;


                if ($(window).width() <= "980") {
                    showPersonSlideritems = 3;

                }

                if ($(window).width() <= "767") {
                    showPersonSlideritems = 2;

                }
                if ($(window).width() <= "480") {
                    showPersonSlideritems = 1;

                }

                var slideItemsCount = $('.pegasus_person_2 .et_pb_team_member').length;
                var slideInnerWidth = $('.pegasus_person_2 .et_pb_column_4_4').width();

                $('.pegasus_person_2 .et_pb_team_member').css("cssText", "width: " + Math.floor(slideInnerWidth / showPersonSlideritems) + "px !important;");
                var slideItemswidth = $('.pegasus_person_2 .et_pb_team_member').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('.pegasus_person_2 .person2_slide_container').css("cssText", "width: " + slideWidth + "px !important;");
            }, timeOutPerson2Inner);
        }


        //            Slide Arrows  ***************************************************************************

        $('<div class="persons2-slider-arrows"><a class="portfolio-arrow-prev" href="#">#</a><a class="portfolio-arrow-next" href="#">$</a></div>').appendTo($('.pegasus_person_2 .et_pb_column_4_4'));
        setTimeout(function () {
            var person_2_afterActiveElement = 3;
            var person_2_nthElement = 4;

            if ($(window).width() <= "980") {
                person_2_afterActiveElement = 2;
                person_2_nthElement = 3;
            }

            if ($(window).width() <= "767") {
                person_2_afterActiveElement = 1;
                person_2_nthElement = 2;
            }
            if ($(window).width() <= "480") {
                person_2_afterActiveElement = 0;
                person_2_nthElement = 1;
            }

            $('.pegasus_person_2 .persons2-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                if ($('.pegasus_person_2 .et_pb_team_member.active_slide').prev().length === 1) {
                    $('.pegasus_person_2 .et_pb_team_member.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                } else {
                    $('.pegasus_person_2 .et_pb_team_member.active_slide').removeClass('active_slide');
                    $('.pegasus_person_2 .et_pb_team_member:nth-last-child(' + person_2_nthElement + ')').addClass('active_slide');
                }
            });

            $('.pegasus_person_2 .persons2-slider-arrows a.portfolio-arrow-next').on('click', function () {

                if ($('.pegasus_person_2 .et_pb_team_member.active_slide').nextAll().length > person_2_afterActiveElement) {
                    $('.pegasus_person_2 .et_pb_team_member.active_slide').removeClass('active_slide').next().addClass('active_slide');
                } else {
                    $('.pegasus_person_2 .et_pb_team_member.active_slide').removeClass('active_slide');
                    $('.pegasus_person_2 .et_pb_team_member:first-child').addClass('active_slide');
                }
            });

            $('.pegasus_person_2 .persons2-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                var slideItemswidth = $('.pegasus_person_2 .et_pb_team_member').outerWidth();
                var slider5SlideSize1 = $('.pegasus_person_2 .et_pb_team_member.active_slide').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                $('.pegasus_person_2 .person2_slide_container').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            });
        }, timeOutPerson2Inner);
    }, timeOutPerson2);



//            Pegasus Tabs

    var timeOutPegasusTab = 400;

    if ($('body').hasClass('et-fb')) {
        timeOutPegasusTab = 8000;
    }
    setTimeout(function () {

        $('.pegasus_tabs').each(function(){
            var item = 1;
            $(this).find('.et_pb_tabs .et_pb_tabs_controls li').each(function(){
                var tabIcon = $(this).closest('.et_pb_tabs').find('.et_pb_all_tabs .et_pb_tab:nth-child('+ item +')').css('background-image');
                if(tabIcon) {
                    $(this).closest('.et_pb_tabs ').find('.et_pb_all_tabs .et_pb_tab:nth-child('+ item +')').css('background-image', 'none');
                    tabIcon = tabIcon.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                    $(this).find('a').html($('<img src="' + tabIcon + '">'));
                }

                item++;
            });
        });

        $('.pegasus_tabs .et_pb_all_tabs .et_pb_tab:first-child').addClass('et_pb_active_content et-pb-active-slide');
    }, timeOutPegasusTab);

    setTimeout(function () {
        $('.pegasus_tabs .et_pb_row').css('opacity', 1);
    }, timeOutPegasusTab);

//            Pricing Table

    var timePricePegInner = 1500;


    if ($('body').hasClass('et-fb')) {
        timePricePegInner = 8000;
    }

    setTimeout(function () {





        $('#page-container .pegasus_pricing_tables1 a.button.yearly').addClass('active_button');
        $('#page-container .pegasus_pricing_tables1 a.button').on('click', function (event) {
            event.preventDefault();
            $('#page-container .pegasus_pricing_tables1 a.button').removeClass('active_button');
            $(this).addClass('active_button');
            if ($(this).hasClass('yearly')) {
                $('#page-container .pegasus_pricing_tables1 .et_pb_pricing.monthly').css('transform', 'scale(0)');
                setTimeout(function () {

                    $('#page-container .pegasus_pricing_tables1 .et_pb_pricing.yearly').css('transform', 'scale(1)');
                }, 300)

            } else {
                $('#page-container .pegasus_pricing_tables1 .et_pb_pricing.yearly').css('transform', 'scale(0)');
                setTimeout(function () {
                    $('#page-container .pegasus_pricing_tables1 .et_pb_pricing.monthly').css('transform', 'scale(1)');
                }, 300)

            }
        });


        var thisItem;
        $(".pegasus_pricing_tables1 .et_pb_pricing_table").hover(

            function () {
                thisItem = $(this);

                setTimeout(function(){
                    thisItem.addClass('hover');
                    $(".pegasus_pricing_tables1 .et_pb_pricing_table").addClass('noHover');
                },200)
            }, function () {
                setTimeout(function(){
                    $(".pegasus_pricing_tables1 .et_pb_pricing_table").removeClass('hover');
                    $(".pegasus_pricing_tables1 .et_pb_pricing_table").removeClass('noHover');
                },200)
            }


        );

        var pricingFirstHeight = 0;
        $('#page-container .pegasus_pricing_tables1 .et_pb_pricing.et_pb_module ').each(function () {
            var pricingHeight = $(this).height();
            if (pricingHeight > pricingFirstHeight) {
                pricingFirstHeight = pricingHeight;
            }
        });

        $('.pegasus_pricing_tables1 .et_pb_column_1_2:last-child').css('min-height', pricingFirstHeight);
    }, timePricePegInner);
//            Testimonials

    var myString = $('.pegasus-tstm1 .et_pb_testimonial_meta');

    if (myString.length !== 0) {
        myString.html(myString.html().replace(',', ''));
    }


    $('.pegasus-tstm4 .et_pb_testimonial .et_pb_testimonial_description').each(function () {
        $(this).find('.et_pb_testimonial_description_inner').insertAfter($(this).find('.et_pb_testimonial_meta'));
    });


    $('.pegasus-tstm6 .et_pb_testimonial .et_pb_testimonial_description .et_pb_testimonial_description_inner').each(function () {
        $(this).find('.et_pb_testimonial_author').insertBefore($(this).find('p:first-child'));
    });


    //            Form Project Planner


    $(' .pegasus_project_planner_form  .et_pb_contact_form  p[data-id="type_of_project"] .et_pb_contact_field_radio, .pegasus_project_planner_form  .et_pb_contact_form  p[data-id="price"] .et_pb_contact_field_radio').on('click', function () {
        if ($(this).hasClass('clicked')) {

        } else {
            $(this).parent('.et_pb_contact_field_options_list').find('.et_pb_contact_field_radio').removeClass('clicked');
            $(this).addClass('clicked');
        }
    });


    $('<div class="brief_descripion"></div>').insertBefore('#page-container .pegasus_project_planner_form p[data-id=message]');
    $('<div class="details"></div>').insertBefore('.pegasus_project_planner_form  form p[data-id="type_of_project"]');
    $('<div class="start_date"></div>').insertAfter('.pegasus_project_planner_form  form p[data-id="type_of_project"]');
    $('<div class="end_date"></div>').insertBefore('.pegasus_project_planner_form  form p[data-id="price"]');

    $('.pegasus_project_planner_form  p[data-id="name"], .pegasus_project_planner_form  p[data-id="email"], .pegasus_project_planner_form  p[data-id="phone"]').appendTo('.pegasus_project_planner_form  .details');
    $('.pegasus_project_planner_form  p[data-id="select_month"], .pegasus_project_planner_form  p[data-id="select_year"], .pegasus_project_planner_form  p[data-id="no_big_rsuh"]').appendTo('.pegasus_project_planner_form  .start_date');
    $('.pegasus_project_planner_form  p[data-id="select_end_month"], .pegasus_project_planner_form  p[data-id="select_end_year"], .pegasus_project_planner_form  p[data-id="when_its_ready"]').appendTo('.pegasus_project_planner_form  .end_date');


    setTimeout(function () {
        $('body .cat_page_content .et_pb_column_1_3 .et_pb_search input.et_pb_searchsubmit').attr('value', 'U');
    }, 500);





})(jQuery);