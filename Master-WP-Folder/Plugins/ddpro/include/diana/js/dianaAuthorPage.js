(function ($) {
    $('body.archive.author .et_pb_post .post-meta').each(function () {
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




    $('body.archive.author .et_pb_post').each(function () {
        $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
        $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
    });






    setInterval(function () {
        if(!$('body.archive.author article').hasClass('done')){
            $('body.archive.author .et_pb_post .post-meta').each(function () {
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



            $('body.archive.author .et_pb_post').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
                $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
            });



            $('body.archive.author article').addClass('done');
        }
    },50);
})(jQuery);