(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var marinaTimeOut = 1500;

    if (isIE()) {
        marinaTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        marinaTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.marina_hard_life_blog').length !== 0){
            $('.freddie_hard_life_blog.marina_hard_life_blog .et_pb_posts .et_pb_post').each(function () {
                var imageSrc = $(this).find('.entry-featured-image-url img').attr('src');
                $(this).css('background-image', 'url('+ imageSrc +')')
            })
        }
        if($('.marina_tutti_frutti_content').length !== 0){
            $('.marina_tutti_frutti_content .et_pb_posts .et_pb_post').each(function () {
                var imageSrc = $(this).find('.entry-featured-image-url img').attr('src');
                $(this).css('background-image', 'url('+ imageSrc +')')
            })
        }

    }, marinaTimeOut);

})(jQuery);