(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogHalfdan  = 1000;

    if (isIE()) {
        ragnarBlogHalfdan = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogHalfdan = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_blog_halfdan ').length !== 0){
            var contentHeight = 0;
            var titleHeight = 0;
            var metaHeight = 0;
            $('.ragnar_blog_halfdan article.et_pb_post').each(function (){
                if($(this).find('.entry-featured-image-url').length == 0){
                    $(this).addClass('no_image')
                }

                var imageSrc = $(this).find('.entry-featured-image-url img').attr('src');
                $(this).css('background-image', 'url('+ imageSrc +')')

                if($(this).find('.post-content-inner').outerHeight() > contentHeight){
                    contentHeight = $(this).find('.post-content-inner').outerHeight();
                }
                if($(this).find('.entry-title').outerHeight() > titleHeight){
                    titleHeight = $(this).find('.entry-title').outerHeight();
                }
                if($(this).find('.post-meta').outerHeight() > metaHeight){
                    metaHeight = $(this).find('.post-meta').outerHeight();
                }
            })

            $('.ragnar_blog_halfdan article.et_pb_post .post-content-inner').outerHeight(contentHeight);
            $('.ragnar_blog_halfdan article.et_pb_post .entry-title').outerHeight(titleHeight);
            $('.ragnar_blog_halfdan article.et_pb_post .post-meta').outerHeight(metaHeight);


            $('.ragnar_blog_halfdan  .et_pb_row:last-child').height($('.ragnar_blog_halfdan article.et_pb_post:first-child').outerHeight())


            $('.ragnar_blog_halfdan article.et_pb_post').hover(function (){
                $('.ragnar_blog_halfdan article.et_pb_post').addClass('hovered')
                $(this).removeClass('hovered')
            }, function (){
                $('.ragnar_blog_halfdan article.et_pb_post').removeClass('hovered')
            })



            $('.ragnar_blog_halfdan article.et_pb_post').on('click', function (){
                var postLink = $(this).find('.entry-title a').attr('href');
                if(postLink){
                    window.location.href = postLink
                }

            })
        }


    }, ragnarBlogHalfdan)

})(jQuery);