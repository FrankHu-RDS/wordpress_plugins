(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogThisTown = 2000;

    if (isIE()) {
        tinaBlogThisTown = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogThisTown = 10000;
    }

    setTimeout(function () {


        if ($('.tina_blog_this_town').length !== 0) {


            $('.tina_blog_this_town article.et_pb_post').each(function () {

                if($(this).find('img').length !== 0){
                    var imageSrc = $(this).find('img').attr('src');
                    var imageSrcset = $(this).find('img').attr('srcset');

                    imageSrc = imageSrc.replace(/-([0-9][0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                    imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                    imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                    imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                    $(this).find('img').attr('src', imageSrc);
                    $(this).find('img').attr('srcset', imageSrcset);
                }

            });


            var postContentHeight = 0;

            var contentHeight = 0
            var metaHeight = 0
            var postMargin = 0
            // var imageHeight = 0
            var imageMargin = 0
            var metaMargin = 0

            var colHeight = $('.tina_blog_this_town .et_pb_column.two_col').height()

            $('.tina_blog_this_town .two_col article.et_pb_post').each(function () {
                if($(this).find('.post-content').height() > postContentHeight){
                    postContentHeight = $(this).find('.post-content').height();
                }
            })

            $('.tina_blog_this_town .two_col article.et_pb_post .post-content').height(postContentHeight);

            $('.tina_blog_this_town .two_col article.et_pb_post').each(function () {

                contentHeight = $(this).find('.post-content').height()
                metaHeight = $(this).find('.post-meta').height()
                postMargin = $(this).css('margin-bottom')
                postMargin = parseInt(postMargin, 10)
                // imageHeight = $(this).find('.entry-featured-image-url').height()
                imageMargin = $(this).find('.entry-featured-image-url').css('margin-bottom')
                imageMargin = parseInt(imageMargin, 10)
                metaMargin = $(this).find('.post-meta').css('margin-bottom')
                metaMargin = parseInt(metaMargin, 10)
            });


            if($('.tina_blog_this_town .one_col article.et_pb_post .entry-featured-image-url img').width() > $('.tina_blog_this_town .one_col article.et_pb_post .entry-featured-image-url img').height()){
                $('.tina_blog_this_town .one_col article.et_pb_post .entry-featured-image-url').addClass('small_height')
            }


            $('.tina_blog_this_town .one_col article.et_pb_post .entry-featured-image-url').height(colHeight - (imageMargin + metaHeight + contentHeight + metaMargin + postMargin))

        }





    }, tinaBlogThisTown);


})(jQuery);