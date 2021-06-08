(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogTheFlame = 1500;

    if (isIE()) {
        tinaBlogTheFlame = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogTheFlame = 10000;
    }

    setTimeout(function () {
        if ($('.tina_the_flame_blog').length !== 0) {

            setInterval(function () {
                if(!$('.tina_the_flame_blog article').hasClass('done')){
                    $('.tina_the_flame_blog article .post-meta').each(function() {
                        var author = $(this).find('span.author')[0];
                        var date = $(this).find('span.published')[0];
                        var categories = $(this).find('a[rel="tag"]').toArray();
                        categories = $.map(categories, function(element) {
                            return element.outerHTML;
                        });
                        categories = categories.join(', ');

                        var html = author.outerHTML;

                        html += date.outerHTML;
                        html += "<span class='categories'>" + categories + "</span>"

                        $(this).html(html);
                    });


                    var articleHeight = 0;

                    $('.tina_the_flame_blog article').each(function () {

                        if($(this).height() > articleHeight){
                            articleHeight = $(this).outerHeight()
                        }

                        var avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');

                        if(!avatarUrl){
                            avatarUrl =  $(this).find('.entry-title a').html();
                            newAvatarUrl = avatarUrl.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
                            $(this).find('.entry-title a').html(newAvatarUrl);

                            avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');
                        }


                        var avatarCode = '<img alt="author avatar" src="'+ avatarUrl +'" class="avatar avatar-92 photo" height="92" width="92">';
                        $(avatarCode).insertBefore($(this).find('.entry-title'))


                        var headerText = $(this).find('h2.entry-title a').text();
                        newHeaderText = headerText.replace(/<dataavatar.+?dataavatar>/g, '');
                        $(this).find('h2.entry-title a').text(newHeaderText);

                        $('<div class="arrow"></div>').appendTo($(this).find('.more-link'))

                    });

                    $('.tina_the_flame_blog article').height(articleHeight)


                    $('.tina_the_flame_blog article').addClass('done')
                }
            },50)

        }

    }, tinaBlogTheFlame);

})(jQuery);