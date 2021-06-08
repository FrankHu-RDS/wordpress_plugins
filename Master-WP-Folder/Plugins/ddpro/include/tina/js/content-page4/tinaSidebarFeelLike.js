(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarFeelLike = 0;

    if (isIE()) {
        tinaSidebarFeelLike = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarFeelLike = 10000;
    }

    setTimeout(function () {

        if($('.tina_feel_like_sidebar').length !== 0){
            var slideBgImage;
            setTimeout(function () {
                $('.tina_feel_like_sidebar .et_pb_slider').prepend($('<div class="triangle"><div class="triangle-inner"></div></div>'))
                $('.tina_feel_like_sidebar .et_pb_slider .et_pb_slide ').each(function () {
                    $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))

                    slideBgImage = $(this).css('background-image');
                    $(this).css('background-image', 'none');
                })

                $('.tina_feel_like_sidebar .et_pb_slider').css('background-image', slideBgImage);


                $('.tina_feel_like_sidebar .et_pb_posts article.et_pb_post').each(function () {
                    $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'))

                    $('<div class="blog_hover_icon"><div></div></div>').appendTo($(this).find('.more-link '))
                })



                $('.tina_feel_like_sidebar .et_pb_blurb').each(function () {
                    $('<div class="blurb_hover_icon"><div></div></div>').appendTo($(this))
                })

            },500)


        }

    }, tinaSidebarFeelLike);

})(jQuery);