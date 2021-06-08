(function ($) {


    $('.side_by_side_blog .et_pb_slide .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();

        var dateDay = $(this).find('.published').text();
        var html = "";
        if (dateDay) {
            date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
            html = date;
        }

        if (author) {
            if (dateDay) {
                html = date + '<span class="line">|</span>';
                html += author.outerHTML;
            } else {
                html = author.outerHTML;
            }
        }

        if (categories.length !== 0) {
            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });
            categories = categories.join(', ');
            html += "<span class='categories'>" + categories + "</span>";
        }


        $(this).html(html);


    });


    $('.side_by_side_blog .et_pb_slide').each(function () {
        $(this).find('.post-meta .categories').insertBefore($(this).find('h2.et_pb_slide_title'));
    });


    var titleHeight = 0;
    setTimeout(function () {
        $('.side_by_side_blog .et_pb_slide').each(function () {
            var thisTitleHeight = $(this).find('h2.et_pb_slide_title a').height();
            if (thisTitleHeight > titleHeight) {
                titleHeight = thisTitleHeight;
            }
        });

        $('.side_by_side_blog .et_pb_slide h2.et_pb_slide_title a').height(titleHeight);
    }, 500);


    var timeOutImpiBlog2Inner = 1000;
    var timeOutImpiBlog2 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutImpiBlog2 = 7000;
        var timeOutImpiBlog2Inner = 0;
    }
    setTimeout(function () {
        if ($('.side_by_side_blog').length > 0) {
            setTimeout(function () {

                $('.side_by_side_blog .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($('.side_by_side_blog .et_pb_slide:last-child'));
                var showBlog2Slideritems = 2;


                if ($(window).width() <= "767") {
                    showBlog2Slideritems = 1;
                }

                var blogSlideItemsCount = $('.side_by_side_blog .et_pb_slide').length;
                var blogSlideInnerWidth = $('.side_by_side_blog .et_pb_column_4_4').width();

                $('.side_by_side_blog .et_pb_slide').css("cssText", "width: " + Math.floor(blogSlideInnerWidth / showBlog2Slideritems) + "px !important;");
                var blogSlideItemswidth = $('.side_by_side_blog .et_pb_slide').outerWidth();
                var blogSlideWidth = blogSlideItemsCount * blogSlideItemswidth;

                $('.side_by_side_blog .et_pb_slides').css("cssText", "width: " + blogSlideWidth + "px !important;");
                $('.side_by_side_blog .et_pb_slide').each(function () {
                    var bgImage = $(this).find('.et_pb_slide_image img').attr('src');
                    $(this).css('background-image', 'url(' + bgImage + ')');
                    $(this).find('.et_pb_slide_image').remove();
                    $('.side_by_side_blog').css('opacity', 1);
                })
            }, timeOutImpiBlog2Inner);
        }


//    Slide Arrows  ***************************************************************************


        setTimeout(function () {

            $('.side_by_side_blog .et-pb-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                setTimeout(function () {
                    var blogSlideItemswidth = $('.side_by_side_blog .et_pb_slide').outerWidth();
                    var slider5SlideSize1 = $('.side_by_side_blog .et_pb_slide.et-pb-active-slide').prevAll().length;

                    var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                    $('.side_by_side_blog .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                }, 300)


            });

            setInterval(function () {
                if($('.side_by_side_blog .et_pb_post_slider').hasClass('et_slider_auto')) {
                    var blogSlideItemswidth = $('.side_by_side_blog .et_pb_slide').outerWidth();
                    var slider5SlideSize1 = $('.side_by_side_blog .et_pb_slide.et-pb-active-slide').prevAll().length;

                    var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                    $('.side_by_side_blog .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                }
            }, 50)

            var blogHeight = 0;
            setTimeout(function () {
                $('.side_by_side_blog .et_pb_slide').each(function () {
                    var thisHeight = $(this).height();
                    if (thisHeight > blogHeight) {
                        blogHeight = thisHeight;
                    }
                });

                $('.side_by_side_blog .et_pb_slide ').height(blogHeight);
            }, 500);
        }, timeOutImpiBlog2Inner);
    }, timeOutImpiBlog2);




    setInterval(function () {
        if(!$('.impi_postcard_blog .et_pb_posts article').hasClass('done')){
            $('.impi_postcard_blog .et_pb_post .post-meta').each(function () {
                var author = $(this).find('span.author')[0];
                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="tag"]').toArray();

                var dateDay = $(this).find('.published').text();
                var html = "";
                if (dateDay) {
                    date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                    html = date;
                }

                if (author) {
                    if (dateDay) {
                        html = date + '<span class="line">|</span>';
                        html += author.outerHTML;
                    } else {
                        html = author.outerHTML;
                    }
                }

                if (categories.length !== 0) {
                    categories = $.map(categories, function (element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');
                    html += "<span class='categories'>" + categories + "</span>";
                }


                $(this).html(html);


            });


            $('.impi_postcard_blog .et_pb_post').each(function () {
                $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title'));
            });


            var titleHeight = 0;
            // setTimeout(function () {
            $('.impi_postcard_blog .et_pb_post').each(function () {
                var thisTitleHeight = $(this).find('h2.entry-title a').height();
                if (thisTitleHeight > titleHeight) {
                    titleHeight = thisTitleHeight;
                }

                var bgImage = $(this).find('.entry-featured-image-url img').attr('src');
                $(this).css('background-image', 'url(' + bgImage + ')');
                $(this).find('.entry-featured-image-url').remove();
            });

            $('.impi_postcard_blog .et_pb_post h2.entry-title a').height(titleHeight);


            // }, 500);



            $('.impi_postcard_blog .et_pb_posts article').addClass('done')
        }
    },50)





    $('.impi_fill_up_blog .et_pb_post .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();

        var dateDay = $(this).find('.published').text();
        var html = "";
        if (dateDay) {
            date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
            html = date;
        }

        if (author) {
            if (dateDay) {
                html = date;
                html += author.outerHTML;
            } else {
                html = author.outerHTML;
            }
        }

        if (categories.length !== 0) {
            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });
            categories = categories.join(', ');
            html += "<span class='categories'>" + categories + "</span>";
        }


        $(this).html(html);


    });


    $('.impi_fill_up_blog .et_pb_post').each(function () {
        $(this).find('.post-meta .published').insertBefore($(this).find('h2.entry-title'));
    });


    var titleHeight = 0;
    setTimeout(function () {
        $('.impi_fill_up_blog .et_pb_post').each(function () {
            var thisTitleHeight = $(this).find('h2.entry-title a').height();
            if (thisTitleHeight > titleHeight) {
                titleHeight = thisTitleHeight;
            }

        });

        $('.impi_fill_up_blog .et_pb_post h2.et_pb_slide_title a').height(titleHeight);


    }, 500);










    $('.impi_timeline_blog .et_pb_post .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();

        var dateDay = $(this).find('.published').text();
        var html = "";

        var month = dateDay.replace(/\d+/g, '');
        var day = parseInt(dateDay);





        if (categories.length !== 0) {
            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });
            categories = categories.join(', ');
            html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
        }

        if (dateDay) {
            var topDate = '<span class="top_date"><span class="day">' + day +'</span><span class="month">' + month + '</span></span>';

            date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
            html += date + topDate;
        }

        if (author) {
            if (dateDay) {
                html = date + '<span class="line">|</span>';
                html += author.outerHTML;
            } else {
                html = author.outerHTML;
            }
        }




        $(this).html(html);


    });



    $('.impi_timeline_blog .et_pb_post').each(function () {
        $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
    });



    setInterval(function () {
        if(!$('.impi_timeline_blog .et_pb_posts article').hasClass('done')){
            $('.impi_timeline_blog .et_pb_post .post-meta').each(function () {
                var author = $(this).find('span.author')[0];
                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="category tag"]').toArray();

                var dateDay = $(this).find('.published').text();
                var html = "";

                var month = dateDay.replace(/\d+/g, '');
                var day = parseInt(dateDay);





                if (categories.length !== 0) {
                    categories = $.map(categories, function (element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');
                    html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
                }

                if (dateDay) {
                    var topDate = '<span class="top_date"><span class="day">' + day +'</span><span class="month">' + month + '</span></span>';

                    date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                    html += date + topDate;
                }

                if (author) {
                    if (dateDay) {
                        html = date + '<span class="line">|</span>';
                        html += author.outerHTML;
                    } else {
                        html = author.outerHTML;
                    }
                }




                $(this).html(html);


            });



            $('.impi_timeline_blog .et_pb_post').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
            });


            $('.impi_timeline_blog .et_pb_posts article').addClass('done');
        }
    },50);
})(jQuery);