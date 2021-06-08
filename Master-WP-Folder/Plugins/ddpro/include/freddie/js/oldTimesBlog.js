

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var oldTimesBlog = 500;

    if (isIE()) {
        oldTimesBlog = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        oldTimesBlog = 10000;
    }

    setTimeout(function () {
        if($('.old-times-blog-sec').length !== 0){

            var blogHeight = 0;
            $('.old-times-blog-sec article.et_pb_post').each(function () {
                if(blogHeight < $(this).height()){
                    blogHeight = $(this).height()
                }



                var thisBlog = $(this);
                setTimeout(function () {




                    if(thisBlog.find('.entry-featured-image-url').height() >  thisBlog.find('.entry-featured-image-url img').height()){
                        thisBlog.find('.entry-featured-image-url').addClass('smallheight')
                    }else{
                        thisBlog.find('.entry-featured-image-url').addClass('bigheight')
                    }

                },1500)
            })

            $('.old-times-blog-sec article.et_pb_post').height(blogHeight)

            $('.old-times-blog-sec article.et_pb_post').tilt({
                glare: true,
                maxGlare: .5
            })

            $('#old-times-blog-hero-blog .et_pb_post:nth-child(2), #old-times-blog-hero-blog .et_pb_post:nth-child(3)').tilt({
                glare: true,
                maxGlare: .5
            })

            $('#old-times-blog-hero-blog .et_pb_post:nth-child(1)').tilt({
                maxTilt: 4,
            })


            $("#old-times-blog-hero-blog .et_pb_post:nth-child(2) h2.entry-title a, #old-times-blog-hero-blog .et_pb_post:nth-child(3) h2.entry-title a").html(function(){
                return $(this).html().substr(0,35);
            });

            $("#old-times-blog-hero-blog .et_pb_post:nth-child(2) h2.entry-title a, #old-times-blog-hero-blog .et_pb_post:nth-child(3) h2.entry-title a").each(function () {
                var thisText = $(this).text();
                $(this).text(thisText + ' . . .')
            })
        }


    }, oldTimesBlog);

})(jQuery);