(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogLoudWhistle = 500;

    if (isIE()) {
        ragnarBlogLoudWhistle = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogLoudWhistle = 10000;
    }

    setTimeout(function () {
        if ($('.ragnar_blog_loud_whistle').length !== 0) {
            var topTextHight = 0;
            var contentTextHight = 0;
            $('.ragnar_blog_loud_whistle .et_pb_posts article.et_pb_post').each(function () {
               var postImage = $(this).find('.entry-featured-image-url img').attr('src')
                $(this).find('.entry-featured-image-url').remove()
                if(postImage){
                    $(this).css('background-image', 'url('+ postImage +')')
                }


                $(this).prepend($('<div class="top_text"></div>'))
                $(this).find('.entry-title').appendTo($(this).find('.top_text'))
                $(this).find('.post-meta').appendTo($(this).find('.top_text'))

                if(topTextHight < $(this).find('.top_text').height()){
                    topTextHight = $(this).find('.top_text').height()
                }
                if(contentTextHight < $(this).find('.post-content-inner').height()){
                    contentTextHight = $(this).find('.post-content-inner').height()
                }

            })

            $('.ragnar_blog_loud_whistle .et_pb_posts article.et_pb_post .top_text').height(topTextHight)
            $('.ragnar_blog_loud_whistle .et_pb_posts article.et_pb_post .post-content-inner').height(contentTextHight)


            $('.ragnar_blog_loud_whistle .et_pb_posts article.et_pb_post').on('click', function (){
                var postLink = $(this).find('.entry-title a').attr('href')
                if(postLink){
                    window.location.href = postLink
                }
            })
        }

    }, ragnarBlogLoudWhistle);

})(jQuery);