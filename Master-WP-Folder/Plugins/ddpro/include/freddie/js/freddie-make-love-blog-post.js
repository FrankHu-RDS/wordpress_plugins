(function($) {
    $(".freddie_make_love_blog_comments p.comment-form-comment").insertBefore(".freddie_make_love_blog_comments p.form-submit");

    setInterval(function() {
        $("body.et-tb .freddie_make_love_blog_comments p.comment-form-comment").insertBefore("body.et-tb .freddie_make_love_blog_comments p.form-submit");
    }, 300);

    if (!$('body').hasClass('et-tb')) $('.freddie_make_love_blog_post .et_pb_post_title:nth-of-type(2) p.et_pb_title_meta_container').html($('.freddie_make_love_blog_post .et_pb_post_title:nth-of-type(2) p.et_pb_title_meta_container').html().replace('|', ''))

})(jQuery);