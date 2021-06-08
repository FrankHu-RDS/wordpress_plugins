(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogBjorn  = 500;

    if (isIE()) {
        ragnarBlogBjorn = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogBjorn = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_blog_bjorn').length !== 0){

            var imageHeight = 100000;
            $('.ragnar_blog_bjorn .et_pb_posts  .et_pb_post  .post-meta').each(function () {

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
                    var html = author.outerHTML + ' | ';
                    html += date;
                } else {
                    var html = date;
                }


                html += "<span class='categories'>" + categories + "</span>";

                $(this).html(html);
            });

            $('.ragnar_blog_bjorn .et_pb_posts .et_pb_post').each(function (){
                if($(this).find('.entry-featured-image-url').length == 0){
                    $(this).addClass('no_image')
                }

                $(this).find('.post-meta').insertBefore($(this).find('.entry-title'))

                if($(this).find('.entry-featured-image-url').length != 0){
                    if($(this).find('.entry-featured-image-url').height() < imageHeight){
                        imageHeight = $(this).find('.entry-featured-image-url').height()
                    }
                }

            })

            $('.ragnar_blog_bjorn article.et_pb_post .entry-featured-image-url').height(imageHeight)

            $('.ragnar_blog_bjorn .et_pb_posts .et_pb_post').on('click', function (){
                var postLink = $(this).find('.entry-title a').attr('href');
                if(postLink){
                    window.location.href = postLink
                }
            })

            setInterval(function () {
                $('body .ragnar_blog_bjorn .et_pb_posts  .et_pb_post  .post-meta').each(function () {
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
                            var html = author.outerHTML + ' | ';
                            html += date;
                        } else {
                            var html = date;
                        }


                        html += "<span class='categories'>" + categories + "</span>";

                        $(this).html(html);

                        $(this).addClass('div_added');
                    }
                });



                if (!$('.ragnar_blog_bjorn .et_pb_posts .et_pb_post').hasClass('div_added')) {
                    $('.ragnar_blog_bjorn .et_pb_posts .et_pb_post').each(function (){

                        if($(this).find('.entry-featured-image-url').length == 0){
                            $(this).addClass('no_image')
                        }
                        $(this).find('.post-meta').insertBefore($(this).find('.entry-title'))

                        if($(this).find('.entry-featured-image-url').length != 0){
                            if($(this).find('.entry-featured-image-url').height() < imageHeight){
                                imageHeight = $(this).find('.entry-featured-image-url').height()
                            }
                        }

                
                        $('.ragnar_blog_bjorn .et_pb_posts .et_pb_post').addClass('div_added')
                        
                    })

                    $('.ragnar_blog_bjorn article.et_pb_post .entry-featured-image-url').height(imageHeight)
                }



            }, 200);




        }


    }, ragnarBlogBjorn)

})(jQuery);