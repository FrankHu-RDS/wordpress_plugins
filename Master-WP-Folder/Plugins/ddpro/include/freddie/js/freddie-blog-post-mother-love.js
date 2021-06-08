(function($) {
    setInterval(function() {
        if ($(window).width() > 980) {
            $('.freddie_blog_post_mother_love_blog3 article').each(function() {

                $(this).find('.entry-title a').succinct({
                    size: 60
                });
            });
        }
    }, 200);

    $(".freddie_blog_post_mother_love_blog3 article").on("click", function(e) {
        e.preventDefault();
        $(this).first('a')[0].click();

    });

    if ($('.freddie_blog_post_mother_love_tags .et_pb_text_inner').children().length === 0) {
        $('.freddie_blog_post_mother_love_tags').hide();
    }

    // if ($('.freddie_blog_post_mother_love_comments #comment-section.nocomments').length > 0) {
    //     $('.freddie_blog_post_mother_love_comments').hide();
    // }
})(jQuery);