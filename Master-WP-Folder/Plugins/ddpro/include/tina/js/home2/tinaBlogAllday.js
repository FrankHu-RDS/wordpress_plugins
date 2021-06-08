(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogAllDay = 1500;

    if (isIE()) {
        tinaBlogAllDay = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogAllDay = 10000;
    }

    setTimeout(function () {
        if ($('.tina_all_day_blog').length !== 0) {


            setInterval(function () {
                if (!$('.tina_all_day_blog article').hasClass('done')) {
                    $('.tina_all_day_blog article .post-meta').each(function () {
                        var author = $(this).find('span.author')[0];
                        var date = $(this).find('span.published')[0];
                        var categories = $(this).find('a[rel="tag"]').toArray();
                        categories = $.map(categories, function (element) {
                            return element.outerHTML;
                        });
                        categories = categories.join(', ');

                        var html = author.outerHTML;

                        html += date.outerHTML;
                        html += "<span class='categories'>" + categories + "</span>"

                        $(this).html(html);
                    });

                    $('.tina_all_day_blog article').each(function () {
                        if($(this).find('.entry-featured-image-url').length === 0){
                            $(this).addClass('no_image')
                        }
                        // $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title'));


                        if($(this).find('dataavatar').length !== 0){
                            var avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');
                            var avatarCode = '<img alt="author avatar" src="' + avatarUrl + '" class="avatar avatar-92 photo" height="92" width="92">';
                            $(avatarCode).insertBefore($(this).find('.author.vcard'))


                            var headerText = $(this).find('h2.entry-title a').text();
                            newHeaderText = headerText.replace(/<dataavatar.+?dataavatar>/g, '');
                            $(this).find('h2.entry-title a').text(newHeaderText);
                        }



                        $('<div class="post_content_box"></div>').appendTo($(this));

                        $(this).find('.categories').appendTo($(this).find('.post_content_box'))
                        $(this).find('.entry-title').appendTo($(this).find('.post_content_box'))
                        $(this).find('.post-meta').appendTo($(this).find('.post_content_box'))
                        $(this).find('.post-content').appendTo($(this).find('.post_content_box'))
                    });

                    $('.tina_all_day_blog article').addClass('done')
                }

            }, 100)

        }

    }, tinaBlogAllDay);

})(jQuery);