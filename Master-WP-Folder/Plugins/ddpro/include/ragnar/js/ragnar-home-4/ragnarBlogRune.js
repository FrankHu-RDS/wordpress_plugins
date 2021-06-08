(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogRune  = 1000;

    if (isIE()) {
        ragnarBlogRune = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogRune = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_blog_rune').length !== 0){
            var postTitleHeight = 0;
            var postContentHeight = 0;
            var imageHeight = 100000;
            $('.ragnar_blog_rune article.et_pb_post').each(function () {
                if($(this).find('.entry-featured-image-url').length == 0){
                    $(this).addClass('no_image')
                }

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


                if(postTitleHeight < $(this).find('.entry-title').outerHeight()){
                    postTitleHeight = $(this).find('.entry-title').outerHeight()
                }
                if(postContentHeight < $(this).find('.post-content-inner').outerHeight()){
                    postContentHeight = $(this).find('.post-content-inner').outerHeight()
                }



                if($(this).find('.entry-featured-image-url').height() < imageHeight){
                    imageHeight = $(this).find('.entry-featured-image-url').height()
                }
            });

            $('.ragnar_blog_rune article.et_pb_post .entry-featured-image-url').height(imageHeight)


            $('.ragnar_blog_rune article.et_pb_post .entry-title').outerHeight(postTitleHeight)
            $('.ragnar_blog_rune article.et_pb_post .post-content-inner').outerHeight(postContentHeight)
        }

    }, ragnarBlogRune)

})(jQuery);