(function($) {

    var img_src = $('.freddie_that_glitter_blog_post_featured_image .et_pb_title_featured_container img').attr('src');

    img_src = img_src.replace('-675x1030', '');
    $('.freddie_that_glitter_blog_post_featured_image .et_pb_title_featured_container img').attr('src', img_src);

    $('.freddie_that_glitter_blog_post_featured_image .et_pb_title_featured_container img').attr('srcset', img_src);

    // $('.freddie_that_glitter_blog_post_featured_image .et_pb_title_featured_container img').attr('width', '100%');
    // $('.freddie_that_glitter_blog_post_featured_image .et_pb_title_featured_container img').attr('height', 'auto');

    $(window).scroll(function(event) {
        $('.freddie_that_glitter_blog_post_featured_image').css('top', '0');
        $('.freddie_that_glitter_blog_post_featured_image').css('max-height', $(window).height()+'px');
        console.log($(window).height());
    });
})(jQuery);