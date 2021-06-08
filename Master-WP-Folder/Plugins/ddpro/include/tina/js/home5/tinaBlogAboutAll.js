(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogAboutAll = 2000;

    if (isIE()) {
        tinaBlogAboutAll = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogAboutAll = 10000;
    }

    setTimeout(function () {
        if($('.tina_about_all_blog').length !== 0){

            setInterval(function () {
                if(!$('.tina_about_all_blog article.et_pb_post').hasClass('done')){
                    var blogHeight = 0;

                    $('.tina_about_all_blog article.et_pb_post').each(function () {
                        $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'))

                        if(blogHeight < $(this).outerHeight()){
                            blogHeight = $(this).outerHeight()
                        }

                        $('<div class="blog_hover_icon"><div></div></div>').appendTo($(this))
                    })

                    $('.tina_about_all_blog article.et_pb_post').outerHeight(blogHeight)

                    $('.tina_about_all_blog article.et_pb_post').addClass('done')

                }



            },50)


            $('.tina_about_all_blog article.et_pb_post').on('click', function () {
                var pageUrl = $(this).find('a').attr('href');
                if(pageUrl){
                    window.location.href = pageUrl
                }
            })



        }

    }, tinaBlogAboutAll);

})(jQuery);