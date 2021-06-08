(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaItsAlrightBlog = 2000;

    if (isIE()) {
        tinaItsAlrightBlog = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaItsAlrightBlog = 10000;
    }

    setTimeout(function () {
        if($('.tina_its_alright_blog').length !== 0){
            var postHeight = 0;
            var titleHeight = 0;
            $('.tina_its_alright_blog article.et_pb_post').each(function () {

                var imageSrc = $(this).find('.entry-featured-image-url img ').attr('src');
                // var imageSrcSet = $(this).find('.entry-featured-image-url img ').attr('srcset');
                // imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                // imageSrcSet = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                // $(this).find('.entry-featured-image-url img').attr('src', imageSrc);
                // $(this).find('.entry-featured-image-url img').attr('srcset', imageSrcSet);


                $(this).css('background-image', 'url("'+ imageSrc +'")');
                $(this).find('.entry-featured-image-url').remove();

                $('<div class="post_info"></div>').appendTo($(this))

                $(this).find('.post-meta').appendTo($(this).find('.post_info'))
                $(this).find('h2.entry-title').appendTo($(this).find('.post_info'))
                $(this).find('.post-content').appendTo($(this).find('.post_info'))


                if($(this).find('h2.entry-title').height() > titleHeight){
                    titleHeight = $(this).find('h2.entry-title').height()
                }



                if($(this).height() > postHeight){
                    postHeight = $(this).height()
                }

            })


            $('.tina_its_alright_blog article.et_pb_post h2.entry-title').height(titleHeight)
            $('.tina_its_alright_blog article.et_pb_post').height(postHeight)

            $('.tina_its_alright_blog article.et_pb_post .post-content').each(function () {
                var thisHeight = $(this).height();
                $(this).attr('dscription-height', thisHeight)



                $(this).css('max-height', 0)
            })


            $('.tina_its_alright_blog article.et_pb_post').hover(function () {
                $(this).find('.post-content').css('max-height', $(this).find('.post-content').attr('dscription-height') + 'px')
            },function () {
                $(this).find('.post-content').css('max-height', 0)
            })

            $('.tina_its_alright_blog article .post_info').css('cssText', 'opacity: 1; position :absolute;')
        }

    }, tinaItsAlrightBlog);

})(jQuery);