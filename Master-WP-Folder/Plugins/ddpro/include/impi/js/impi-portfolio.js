        (function ($) {
            //            Slide Sizes  ***************************************************************************
            var timeOutPortfolio5 = 2000;
            if ($('body').hasClass('et-fb')) {
                timeOutPortfolio5 = 10000;
            }

            function ImpiPortfolioSlider() {
                if ($('.impi_warrior_slider_portfolio .et_pb_portfolio ').length > 0) {

                    $('.impi_warrior_slider_portfolio').each(function () {


                        $(this).find('.et_pb_portfolio .type-project:first-child').addClass('active_slide');
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


                        var slideItemsCount = $(this).find('.et_pb_portfolio .type-project').length;
                        var slideInnerWidth = $(this).find(' .et_pb_column_4_4').width();



                        $(this).find('.et_pb_portfolio .type-project').css("cssText", "width: " + slideInnerWidth / showBlog5Slideritems + "px !important;");


                        var slideItemswidth = slideInnerWidth / showBlog5Slideritems;
                        var slideWidth = slideItemsCount * slideItemswidth;


                        $(this).find('.et_pb_portfolio .et_pb_ajax_pagination_container').css("cssText", "width: " + Math.round(slideWidth) + "px !important;");




                        $('<div class="slider_number"><span class="numers_line"><span class="numers_line_inner"></span></span></div>').insertAfter($(this).find('.et_pb_portfolio'));

                        var lineWidth = $(this).find('.slider_number .numers_line').width();
                        var lineInnerWidth = lineWidth/slideItemsCount;
                        var lineInnerWidth2 = lineInnerWidth*showBlog5Slideritems;
                        $(this).find('.slider_number .numers_line .numers_line_inner').width(lineInnerWidth2);
                    })
                }

            }

            //            Slide Arrows  ***************************************************************************

            $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#">#</a><a class="portfolio-arrow-next" href="#">$</a></div>').appendTo($('.impi_warrior_slider_portfolio .et_pb_portfolio'));
            setTimeout(function () {
                var portfolio5LastElements = 3;
                var showBlog5Slideritems = 4;

                if ($(window).width() <= "980") {
                    portfolio5LastElements = 2;
                    showBlog5Slideritems = 3;
                }

                if ($(window).width() <= "767") {
                    portfolio5LastElements = 1;
                    showBlog5Slideritems = 2;
                }
                if ($(window).width() <= "480") {
                    portfolio5LastElements = 0;
                    showBlog5Slideritems = 1;
                }






                $('.impi_warrior_slider_portfolio .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                    if ($(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').prev().length === 1) {
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    } else {
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').removeClass('active_slide');
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project:nth-last-child(4)').addClass('active_slide');
                    }
                });

                $('.impi_warrior_slider_portfolio .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
                    if ($(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').nextAll().length > portfolio5LastElements) {
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    } else {
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').removeClass('active_slide');
                        $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project:first-child').addClass('active_slide');
                    }
                });

                $('.impi_warrior_slider_portfolio .portfolio-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    var showSlideItemsCountLine2 = $(this).closest('.impi_warrior_slider_portfolio').find('.type-project').length;
                    var lineWidth = $(this).closest('.impi_warrior_slider_portfolio').find('.slider_number .numers_line').width();

                    var showSlideItemsCountLine = $(this).closest('.impi_warrior_slider_portfolio').find('.type-project.active_slide').prevAll().length;

                    var lineInnerWidth = lineWidth/showSlideItemsCountLine2;
                    var lineInnerWidth2 = lineInnerWidth*showSlideItemsCountLine;



                    var slideItemswidth = $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project').outerWidth();
                    var slider5SlideSize1 = $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .type-project.active_slide').prevAll().length;
                    var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                    $(this).closest('.impi_warrior_slider_portfolio').find('.et_pb_portfolio .et_pb_ajax_pagination_container').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');



                    $(this).closest('.impi_warrior_slider_portfolio').find('.slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth2 +'px,0)')

                });
            }, timeOutPortfolio5);


            //           Call Slide Function  ***************************************************************************
            setTimeout(function () {
                ImpiPortfolioSlider();
            }, timeOutPortfolio5);


            setTimeout(function () {
                var hoverCount5 = 1;
                $('body.et-fb .impi_warrior_slider_portfolio').hover(function () {
                    if (hoverCount5 === 1) {
                        ImpiPortfolioSlider();
                        hoverCount5 = 0;
                    }

                });
            }, timeOutPortfolio5);
            if ($('body').hasClass('et-fb')) {
                setInterval(function () {
                    if (!$('body.et-fb .impi_warrior_slider_portfolio').hasClass('divi_added')) {
                        ImpiPortfolioSlider();
                        $('body.et-fb .impi_warrior_slider_portfolio').addClass('divi_added')
                    }
                }, 200)
            }



//            Impi Champ Portfolio









            var timeOutPortfolio6 = 0;
            if ($('body').hasClass('et-fb')) {
                timeOutPortfolio6 = 10000;
            }


            function champPortfolio() {


                if ($('.impi_champ_portfolio .et_pb_filterable_portfolio ').length > 0) {
                    $('<div class="champ_portfolio_items"></div>').appendTo($('.impi_champ_portfolio .et_pb_portfolio_items_wrapper'));



                    $('<div class="portfolio-slider-arrows"><a class="portfolio-arrow-prev" href="#">B</a><a class="portfolio-arrow-next" href="#">C</a></div>').appendTo($('.impi_champ_portfolio .et_pb_filterable_portfolio  '));
                    $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');

                    var itemCountAttr = 1;
                    setTimeout(function () {
                        $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project').each(function () {
                            var itemLink = $(this).find('h2.et_pb_module_header a').attr('href');
                            var bgImage = $(this).find('.et_portfolio_image img').attr('src');
                            $(this).css({'background-image' : 'url('+ bgImage +')', 'width' : Math.floor($('.impi_champ_portfolio .et_pb_column_4_4').width())});
                            $(this).find('.portfolio_image').remove();


                            $('<a href="'+ itemLink +'" class="view_button">view the case study</a>').insertAfter($(this).find('h2.et_pb_module_header'));

                            var itemTitle = $(this).find('h2.et_pb_module_header a').text();
                            $('<div class="item" count="'+ itemCountAttr +'"><h2 class="item_title">'+ itemTitle +'</h2><div class="item_image" style="background-image: url('+ bgImage +')"></div></div>').appendTo($('.impi_champ_portfolio .et_pb_portfolio_items_wrapper .champ_portfolio_items'));

                            itemCountAttr++;
                        });


                        var slideItemsCount = $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project').length;


                        var slideItemswidth = $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project').outerHeight();
                        var slideWidth = slideItemsCount * slideItemswidth;


                        $('.impi_champ_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_items_wrapper').css("cssText", "height: " + slideItemswidth + "px !important;");
                        $('.impi_champ_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_items').css("cssText", "height: " + slideWidth + "px !important;");


                        $('.impi_champ_portfolio .portfolio-slider-arrows a.portfolio-arrow-prev').on('click', function () {
                            if ($('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').prev().length === 1) {
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                            } else {
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project:last-child').addClass('active_slide');
                            }
                        });

                        $('.impi_champ_portfolio .portfolio-slider-arrows a.portfolio-arrow-next').on('click', function () {
                            if ($('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').nextAll().length > 0) {
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide').next().addClass('active_slide');
                            } else {
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').removeClass('active_slide');
                                $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project:first-child').addClass('active_slide');
                            }



                        });

                        $('.impi_champ_portfolio .portfolio-slider-arrows a').on('click', function (event) {
                            event.preventDefault();
                            var sliderSlideSize1 = $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
                            var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                            $('.impi_champ_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(0, -' + sliderSlideSize2 + 'px)');

                            setTimeout(function () {
                                $('.impi_champ_portfolio .et_pb_portfolio .champ_portfolio_items .item').removeClass('active_dot');
                                $('.impi_champ_portfolio .et_pb_portfolio .champ_portfolio_items .item:nth-child('+ (sliderSlideSize1+1) +')').addClass('active_dot');
                            },200)


                        });

                        $('.impi_champ_portfolio .et_pb_portfolio .champ_portfolio_items .item:first-child').addClass('active_dot');
                        $('.impi_champ_portfolio .et_pb_portfolio .champ_portfolio_items .item').on('click', function () {
                            var dotText = $(this).attr('count');

                            $('.impi_champ_portfolio .et_pb_portfolio .type-project').removeClass('active_slide');
                            $('.impi_champ_portfolio .et_pb_portfolio .type-project:nth-child('+ dotText +')').addClass('active_slide');
                            $('.impi_champ_portfolio .et_pb_portfolio .champ_portfolio_items .item').removeClass('active_dot');
                            $(this).addClass('active_dot');

                            var sliderSlideSize1 = $('.impi_champ_portfolio .et_pb_filterable_portfolio .type-project.active_slide').prevAll().length;
                            var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                            $('.impi_champ_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_items').css('transform', 'translate(0, -' + sliderSlideSize2 + 'px)');

                        });

                    }, 1500);
                }
            }

            setTimeout(function () {
                champPortfolio();
            }, timeOutPortfolio6);
            setTimeout(function () {
                var hoverCount6 = 1;
                $('body.et-fb .impi_champ_portfolio').hover(function () {
                    if (hoverCount6 === 1) {
                        champPortfolio();
                        hoverCount6 = 0;
                    }

                });
            }, timeOutPortfolio6);





            var timeOutImpiPortfolio3 = 1000;
            if ($('body').hasClass('et-fb')) {
                timeOutImpiPortfolio3 = 10000;
            }
            function masonryPortfolio() {
                setTimeout(function () {
                    var $container = $('.impi_about_me_portfolio .et_pb_portfolio_items');
                    $container.masonry({
                        columnWidth: '.project',
                        itemSelector: '.project',
                        gutter: '.gutter_width'
                    });

                }, 1000);
            }


            setTimeout(function () {
                $('<div class="gutter_width"></div>').appendTo('body.et-fb .impi_about_me_portfolio .et_pb_portfolio_items');
                masonryPortfolio();
            }, timeOutImpiPortfolio3);


            setTimeout(function () {
                var hoverCount3 = 1;
                $('body.et-fb .impi_about_me_portfolio').hover(function () {
                    if (hoverCount3 === 1) {
                        $('<div class="gutter_width"></div>').appendTo('body.et-fb .impi_about_me_portfolio .et_pb_portfolio_items');
                        masonryPortfolio();
                        hoverCount3 = 0;
                    }

                });
            }, timeOutImpiPortfolio3);
            if ($('body').hasClass('et-fb')) {
                setInterval(function () {
                    if (!$('body.et-fb .impi_about_me_portfolio .et_pb_column').hasClass('divi_added')) {
                        $('<div class="gutter_width"></div>').appendTo('body.et-fb .impi_about_me_portfolio .et_pb_portfolio_items');
                        masonryPortfolio();
                        $('body.et-fb .impi_about_me_portfolio .et_pb_column').addClass('divi_added')
                    }
                }, 200);
            }

            $('<div class="gutter_width"></div>').appendTo('.impi_about_me_portfolio .et_pb_portfolio_items');


            $('.impi_about_me_portfolio .et_pb_portfolio_items .type-project').each(function () {
                $('<div class="image_hover"></div>').appendTo($(this).find('.et_portfolio_image'));

            });

            $('.impi_about_me_portfolio .et_pb_portfolio_items .type-project').hoverdir({
                hoverDelay: 75,
                hoverElem: '.image_hover'
            });



        })(jQuery);