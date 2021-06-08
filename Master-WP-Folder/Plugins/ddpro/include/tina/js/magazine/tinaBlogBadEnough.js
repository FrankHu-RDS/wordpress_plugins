(function ($) {


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogBadEnough = 2000;

    if (isIE()) {
        tinaBlogBadEnough = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogBadEnough = 10000;
    }

    setTimeout(function () {


        if ($('.tina_blog_bad_enough').length !== 0) {

            var postHeight = 0;
            $('.tina_blog_bad_enough article.et_pb_post').each(function () {
                if($(this).outerHeight() > postHeight){
                    postHeight = $(this).outerHeight();
                }
            })

            $('.tina_blog_bad_enough article.et_pb_post').outerHeight(postHeight)



            $('.tina_blog_bad_enough  article.et_pb_post').on('click', function () {
                var postLink =  $(this).find('.entry-title a').attr('href');
                if(postLink){
                    window.location.href = postLink
                }
            })
        }


    }, tinaBlogBadEnough);


})(jQuery);