    (function ($) {

        var dianaBlogTimeOut = 1500;

        if($('body').hasClass('et-fb')){
            dianaBlogTimeOut = 10000;
        }


        setTimeout(function() {


            $('.diana_stately_blog .et_pb_post .post-meta').each(function () {
                var author = $(this).find('span.author')[0];
                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="category tag"]').toArray();

                var dateDay = $(this).find('.published').text();
                var html = "";

                var month = dateDay.replace(/\d+/g, '');
                var day = parseInt(dateDay);




                if (dateDay) {
                    var topDate = '<span class="top_date"><span class="day">' + day + '</span><span class="month">' + month + '</span></span>';

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

                if (categories.length !== 0) {
                    categories = $.map(categories, function (element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');
                    html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
                }


                $(this).html(html);


            });


            $('.diana_stately_blog  .et_pb_post').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
                $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
            });

            $("#et-fb-app-frame").contents().find('.diana_stately_blog  .et_pb_post').each(function () {
                $("#et-fb-app-frame").contents().find($(this)).find('.post-meta').insertBefore($("#et-fb-app-frame").contents().find($(this)).find('h2.entry-title'));
                $("#et-fb-app-frame").contents().find($(this)).find('.published').insertAfter($("#et-fb-app-frame").contents().find($(this)).find('.entry-featured-image-url img'));
            });

        },dianaBlogTimeOut);



        setInterval(function () {
            if(!$('.diana_stately_blog .et_pb_posts article').hasClass('done')){
                $('.diana_stately_blog .et_pb_post .post-meta').each(function () {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];
                    var categories = $(this).find('a[rel="category tag"]').toArray();

                    var dateDay = $(this).find('.published').text();
                    var html = "";

                    var month = dateDay.replace(/\d+/g, '');
                    var day = parseInt(dateDay);







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

                    if (categories.length !== 0) {
                        categories = $.map(categories, function (element) {
                            return element.outerHTML;
                        });
                        categories = categories.join(', ');
                        html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
                    }




                    $(this).html(html);


                });



                $('.diana_stately_blog .et_pb_post').each(function () {
                    $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
                    $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
                });



                $('.diana_stately_blog .et_pb_posts article').addClass('done');
            }
        },50);









        setTimeout(function () {
            if ($('body:not(.et-fb) .diana_baronial_blog').length > 0) {

                $('<div class="slider_outer_containe"></div>').insertBefore($('.diana_baronial_blog .et_pb_slides'));
                    $('.diana_baronial_blog .et_pb_slides').appendTo($('.diana_baronial_blog .slider_outer_containe'));


                $('.diana_baronial_blog  .et_pb_slide .post-meta').each(function () {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];

                    var dateDay = $(this).find('.published').text();
                    var html = "";


                    if (author) {
                            html = "By " + author.outerHTML + "/ ";
                    }

                    if (dateDay) {
                        date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                        html += date;
                    }
                    $(this).html(html);

                });


                var showHomeSlideritems = 1;
                var showHomeSlideritemsFirst = 1;
                var homeSlideItemsCount = $('.diana_baronial_blog .et_pb_slide').length;
                if(homeSlideItemsCount <= 9){
                    homeSlideItemsCount = '0' + homeSlideItemsCount;

                }else{
                    showHomeSlideritemsFirst = '0' + showHomeSlideritemsFirst;
                }
                $('<div class="slider_number"><span class="slider_active_number">' + showHomeSlideritemsFirst + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>' + homeSlideItemsCount + '</span></div>').insertBefore($('.diana_baronial_blog .et_pb_slider .et-pb-slider-arrows'));

                var lineWidth = $('.diana_baronial_blog .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $('.diana_baronial_blog .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

                $('.diana_baronial_blog  .et_pb_slide').each(function () {
                    $(this).find('.post-meta').appendTo($(this).find('.et_pb_slide_description .et_pb_slide_content '));
                });


                    $('.diana_baronial_blog .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($('.diana_baronial_blog .et_pb_slide:last-child'));
                    $('.diana_baronial_blog .et_pb_slide:nth-child(2)').clone().removeClass('et-pb-active-slide').insertAfter($('.diana_baronial_blog .et_pb_slide:last-child'));
                    var showBlog2Slideritems = 3;


                if ($(window).width() <= "980") {
                    showBlog2Slideritems = 2;
                }

                    if ($(window).width() <= "767") {
                        showBlog2Slideritems = 1;
                    }

                    var blogSlideItemsCount = $('.diana_baronial_blog .et_pb_slide').length;
                    var blogSlideInnerWidth = $('.diana_baronial_blog .et_pb_column_4_4').width();

                    $('.diana_baronial_blog .et_pb_slide').css("cssText", "width: " + blogSlideInnerWidth / showBlog2Slideritems + "px !important;");
                    var blogSlideItemswidth = $('.diana_baronial_blog .et_pb_slide').outerWidth();
                    var blogSlideWidth = blogSlideItemsCount * blogSlideItemswidth + 5;

                    $('.diana_baronial_blog .et_pb_slides').css("cssText", "width: " + blogSlideWidth + "px !important;");






            //            Slide Arrows  ***************************************************************************



                $('.diana_baronial_blog .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var blogSlideInnerWidth = $('.diana_baronial_blog .et_pb_column_4_4').width();
                        var blogSlideItemswidth = blogSlideInnerWidth / showBlog2Slideritems;

                        var slider5SlideSize1 = $('.diana_baronial_blog .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                        $('.diana_baronial_blog .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                            var showSlideItemsCount = $('.diana_baronial_blog .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;
                        if(showSlideItemsCount <= 9 ){
                            showSlideItemsCount = '0' + showSlideItemsCount
                        }
                            $('.diana_baronial_blog .slider_number .slider_active_number').text(showSlideItemsCount);

                            $('.diana_baronial_blog .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*slider5SlideSize1 +'px,0)')


                    }, 50)


                });
            }




//          For VB

            if ($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog').length > 0) {

                $('<div class="slider_outer_containe"></div>').insertBefore($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slides'));
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slides').appendTo($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .slider_outer_containe'));


                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog  .et_pb_slide .post-meta').each(function () {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];

                    var dateDay = $(this).find('.published').text();
                    var html = "";


                    if (author) {
                        html = "By " + author.outerHTML + "/ ";
                    }

                    if (dateDay) {
                        date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                        html += date;
                    }
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).html(html);

                });


                var showHomeSlideritems = 1;
                var homeSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide').length;
                $('<div class="slider_number"><span class="slider_active_number">0' + showHomeSlideritems + '</span><span class="numers_line"><span class="numers_line_inner"></span></span><span>0' + homeSlideItemsCount + '</span></div>').insertBefore($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slider .et-pb-slider-arrows'));

                var lineWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .slider_number .numers_line').width();
                var lineInnerWidth = lineWidth/homeSlideItemsCount;
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .slider_number .numers_line .numers_line_inner').width(lineInnerWidth);

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog  .et_pb_slide').each(function () {
                    $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.post-meta').appendTo($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_slide_description .et_pb_slide_content '));
                });


                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide:first-child').clone().removeClass('et-pb-active-slide').insertAfter($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide:last-child'));
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide:nth-child(2)').clone().removeClass('et-pb-active-slide').insertAfter($("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide:last-child'));
                var showBlog2Slideritems = 3;


                if ($(window).width() <= "767") {
                    showBlog2Slideritems = 1;
                }

                var blogSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide').length;
                var blogSlideInnerWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_column_4_4').width();

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide').css("cssText", "width: " + blogSlideInnerWidth / showBlog2Slideritems + "px !important;");
                var blogSlideItemswidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide').outerWidth();
                var blogSlideWidth = blogSlideItemsCount * blogSlideItemswidth;

                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slides').css("cssText", "width: " + blogSlideWidth + "px !important;");




                //            Slide Arrows  ***************************************************************************



                $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et-pb-slider-arrows a').on('click', function (event) {
                    event.preventDefault();

                    setTimeout(function () {
                        var blogSlideInnerWidth = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_column_4_4').width();
                        var blogSlideItemswidth = blogSlideInnerWidth / showBlog2Slideritems;

                        var slider5SlideSize1 = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide.et-pb-active-slide').prevAll().length;
                        var slider5SlideSize2 = slider5SlideSize1 * blogSlideItemswidth;

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slides').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');
                        var showSlideItemsCount = $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .et_pb_slide.et-pb-active-slide').prevAll().length + showHomeSlideritems;

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                        $("body.et-fb #et-fb-app-frame").contents().find('.diana_baronial_blog .slider_number .numers_line .numers_line_inner').css('transform', 'translate('+ lineInnerWidth*slider5SlideSize1 +'px,0)')


                    }, 50)


                });
            }



        }, dianaBlogTimeOut);
    })(jQuery);