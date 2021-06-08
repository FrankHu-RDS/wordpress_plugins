(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaArchive1 = 2000;

    if (isIE()) {
        tinaArchive1 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaArchive1 = 10000;
    }

    setTimeout(function () {
        if ($('body .tina_archive_1').length !== 0) {

            $.fn.isInViewport = function () {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                return elementBottom > viewportTop && elementTop < viewportBottom;
            };


            var postsCount = 0;

            $('body .tina_archive_1 article.et_pb_post').each(function () {
                var str = $(this).find('.published').text();
                var lastword = str.split(" ").pop();

                if ($('.year_' + lastword + '').length === 0) {
                    postsCount = 1;
                    $('<div class="year_container year_' + lastword + '" year="' + lastword + '"><div class="year_container_inner"></div></div>').appendTo($(this).closest('.et_pb_ajax_pagination_container'))
                    $(this).appendTo($('.year_' + lastword + ' .year_container_inner'))
                } else {
                    postsCount = postsCount + 1;

                    $('.year_' + lastword + '').attr('postCount', postsCount)
                    $(this).appendTo($('.year_' + lastword + ' .year_container_inner'))
                }


                $(this).find('.post-meta').insertBefore($(this).find('.entry-title'))
                $(this).find('.post-meta').html($(this).find('.post-meta').html().replace("|", ""));

                $(this).find('.post-meta .published').remove()

            })


            var countBoxWidth = 0;
            var postsHeight = 0;
            $('body .tina_archive_1 .year_container').each(function () {
                $(this).find('.year_container_inner').prepend($('<div class="post_date_and_count"><span class="date">' + $(this).attr('year') + '</span><span class="count">' + $(this).attr('postcount') + '</span></div>'))
                $('<div class="arrows"><a class="arrow_prev">#</a><a class="arrow_next">$</a></div>').appendTo($(this))
                $('<div class="slide_line"><div class="slide_line_inner"></div></div>').insertBefore($(this).find('.year_container_inner'))

                var sliderWidth = $(this).width();


                $(this).find('article.et_pb_post').outerWidth($(this).find('article.et_pb_post').outerWidth());
                $(this).find('article.et_pb_post').css('margin-right', $(this).find('article.et_pb_post').css('margin-right'));


                $(this).find('article.et_pb_post:nth-child(2)').addClass('active_item')

                if ($(this).find('.post_date_and_count').outerWidth() > countBoxWidth) {
                    countBoxWidth = $(this).find('.post_date_and_count').outerWidth()
                }


                $(this).find('article.et_pb_post').each(function () {

                    if (postsHeight < $(this).outerHeight()) {
                        postsHeight = $(this).outerHeight()
                    }
                })

                $(this).find('article.et_pb_post').outerHeight(postsHeight)
            })

            $('body .tina_archive_1 .year_container .post_date_and_count').outerWidth(countBoxWidth)

            $('body .tina_archive_1 .year_container').each(function () {
                var slidesCount = $(this).attr('postcount');
                $(this).find('.year_container_inner').width(($(this).find('article.et_pb_post').outerWidth() * slidesCount) + (parseInt($(this).find('article.et_pb_post').css('margin-right'), 10) * slidesCount) + 50 + $('body .tina_archive_1 .year_container .post_date_and_count').outerWidth())
            })


            //Arrow Click Function


            var movedSize = 3;
            var movedSizeLast = 2;

            if ($(window).width() <= 1390) {
                movedSize = 2;
            }
            if ($(window).width() <= 767) {
                movedSize = 1;
            }


            $('body .tina_archive_1 .year_container .arrows a.arrow_prev').on('click', function () {
                if ($(this).closest('.year_container').find('article.et_pb_post.active_item').prev('article.et_pb_post').length !== 0) {
                    $(this).closest('.year_container').find('article.et_pb_post.active_item').removeClass('active_item').prev('article.et_pb_post').addClass('active_item')
                } else {
                    $(this).closest('.year_container').find('article.et_pb_post.active_item').removeClass('active_item')
                    $(this).closest('.year_container').find('article.et_pb_post:nth-last-child(' + movedSize + ')').addClass('active_item')
                }
            })

            $('body .tina_archive_1 .year_container .arrows a.arrow_next').on('click', function () {
                if ($(this).closest('.year_container').find('article.et_pb_post.active_item').nextAll('article.et_pb_post').length > movedSizeLast) {
                    $(this).closest('.year_container').find('article.et_pb_post.active_item').removeClass('active_item').next('article.et_pb_post').addClass('active_item')
                } else {
                    $(this).closest('.year_container').find('article.et_pb_post.active_item').removeClass('active_item')
                    $(this).closest('.year_container').find('article.et_pb_post:nth-child(2)').addClass('active_item')
                }
            })


            $('body .tina_archive_1 .year_container .arrows a').on('click', function () {
                var thisArrow = $(this)

                setTimeout(function () {
                    var prevElCounts = thisArrow.closest('.year_container').find('article.et_pb_post.active_item').prevAll('article.et_pb_post').length
                    var elWidth = thisArrow.closest('.year_container').find('article.et_pb_post').outerWidth()
                    var elMargin = parseInt(thisArrow.closest('.year_container').find('article.et_pb_post').css('margin-right'), 10)

                    var lineWidth = thisArrow.closest('.year_container').find('.slide_line').width();
                    var lineMovedSize = lineWidth / (parseInt(thisArrow.closest('.year_container').attr('postcount')) - movedSize);


                    thisArrow.closest('.year_container').find('.slide_line .slide_line_inner').width(lineMovedSize * (prevElCounts))

                    thisArrow.closest('.year_container').find('.year_container_inner').css('transform', 'translate(-' + (elMargin + elWidth) * prevElCounts + 'px,0px)')
                }, 50)


            })


            $('body:not(.et-tb) .tina_archive_1 .posts_row').css('opacity', 1)

            $('body .tina_archive_1 .year_container').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('visible')
                }
            })

            $(window).on('resize scroll', function () {
                $('body .tina_archive_1 .year_container').each(function () {
                    if ($(this).isInViewport()) {
                        $(this).addClass('visible')
                    }
                })

            });



            $('body .tina_archive_1 article.et_pb_post').on('click', function () {
                var postLink =  $(this).find('.entry-title a').attr('href');
                if(postLink){
                    window.location.href = postLink
                }
            })
        }

    }, tinaArchive1);

})(jQuery);