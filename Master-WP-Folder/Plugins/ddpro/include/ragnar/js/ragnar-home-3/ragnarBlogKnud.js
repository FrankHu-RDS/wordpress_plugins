(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogKnud  = 1000;

    if (isIE()) {
        ragnarBlogKnud = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogKnud = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_blog_knud').length !== 0){


            $('.ragnar_blog_knud .et_pb_posts  .et_pb_post  .post-meta').each(function () {

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
                    var html = author.outerHTML ;
                    html += date;
                } else {
                    var html = date;
                }


                html += "<span class='categories'>" + categories + "</span>";

                $(this).html(html);
            });

            setInterval(function () {
                $('body.et-fb .ragnar_blog_knud .et_pb_posts  .et_pb_post  .post-meta').each(function () {
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
                            var html = '<span class="auther_posted">Posted</span> ' + author.outerHTML;
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

        }

    }, ragnarBlogKnud)

})(jQuery);