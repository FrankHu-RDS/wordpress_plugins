(function($) {

    if ($('.freddie_all_girls_post_title .et_pb_title_meta_container').length > 0) {
        let author = $('.freddie_all_girls_post_title .et_pb_title_meta_container .author').html();
        let date = $('.freddie_all_girls_post_title  .et_pb_title_meta_container .published').html();
       // $('.freddie_all_girls_post_title  .et_pb_title_meta_container > a:not([rel="catagory tag"])').addClass('comments');
        if ($('.freddie_all_girls_post_title  .et_pb_title_meta_container > a[rel="category tag"]').length > 0) {
            var category = '';
            $('.freddie_all_girls_post_title  .et_pb_title_meta_container > a[rel="category tag"]').each(function(){
                category = category + $(this)[0].outerHTML+ ", ";
            });
            
        }

        if (category !== "" && category !== undefined) { category = category.slice(0, -2);}

        let comments_text = $('.freddie_all_girls_post_title  .et_pb_title_meta_container .comments-number').text();
        comments_text = comments_text.split(' ')[0];
        // $('.et_pb_title_meta_container .comments-number').text(comments_text);
        let comments = $('.freddie_all_girls_post_title  .et_pb_title_meta_container .comments-number').html();

        let meta = $('.freddie_all_girls_post_title  .et_pb_title_meta_container').text();

        meta = meta.split(' ')[1];

        meta = '<span class="meta">' + meta + '</span>';

        if (category !== undefined) (newMeta = meta + " " + author + " <span class='meta divided'>|</span> " + category  + " " + " <span class='meta divided'>|</span>" + date);
        else newMeta = meta + " " + author + " <span class='meta divided'>|</span> " + date;

        if (comments !== undefined) comments = "<dvi class='comments'>" + comments + "</div>";

        if (comments !== undefined) newMeta = newMeta + comments;

        $('.et_pb_title_meta_container').html(newMeta);


    }

    // if ($('.freddie_all_girls_post_comments #comment-section.nocomments').length > 0) {
    //     $('.freddie_all_girls_post_author').parents('.et_pb_section').addClass('no-comments');
    // }

    function freddie_to_son_blog_resize_margin() {
        var height = $('.freddie_all_girls_post_title .et_pb_title_featured_container').height();
        //console.log("height "+height);
        var margin = -(height / 2) + 53;
        var padding = height / 2 - 103;
        $('.freddie_all_girls_post_title .et_pb_title_featured_container').css('margin-bottom', margin + "px");
        $('.freddie_all_girls_post_content_section').css('padding-top', padding + "px");
    }

    freddie_to_son_blog_resize_margin();

    $(window).resize(function() {
        if ($(window).width() > 980) freddie_to_son_blog_resize_margin();
        else $('.freddie_all_girls_post_title .et_pb_title_featured_container').parents('.et_pb_section').css('margin-bottom', "0");
    });
})(jQuery);