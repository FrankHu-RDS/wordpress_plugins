(function($) {

    if ($('.freddie_to_son_post_title .et_pb_title_meta_container').length > 0) {
        let author = $('.freddie_to_son_post_title .et_pb_title_meta_container .author').html();
        let date = $('.freddie_to_son_post_title  .et_pb_title_meta_container .published').html();
        $('.freddie_to_son_post_title  .et_pb_title_meta_container > a').addClass('comments');
        let category = $('.freddie_to_son_post_title  .et_pb_title_meta_container > a')[0].outerHTML;

        let comments_text = $('.freddie_to_son_post_title  .et_pb_title_meta_container .comments-number').text();
        if (typeof comments_text !== 'undefined') comments_text = comments_text.split(' ')[0];
        // $('.et_pb_title_meta_container .comments-number').text(comments_text);
        let comments = $('.freddie_to_son_post_title  .et_pb_title_meta_container .comments-number').html();

        if (typeof comments !== 'undefined') comments = comments.replace(" comments", "");
        else comments = "";

        let meta = $('.freddie_to_son_post_title  .et_pb_title_meta_container').text();

        if (typeof meta !== "undefined") meta = meta.split(' ')[1];
        else meta = "";

        // console.log(author);
        // console.log(date);
        // console.log(category);
        //console.log(comments);
        // console.log('meta ' + meta);

        let image = "";

        if ($('.freddie_to_son_post_author .et_pb_image_wrap').length > 0) {
            image = $('.freddie_to_son_post_author .et_pb_image_wrap').html();
        }

        let newMeta = image + date + " " + meta + " " + author + " " + comments;

        $('.et_pb_title_meta_container').html(newMeta);

        //  str.substr(0,str.indexOf(' '))

        $(category).insertBefore('h1.entry-title');

        $(".to_son_latest_posts article").on("click", function(e){
            e.preventDefault();
            $(this).first('a')[0].click();

        });

        if ($('.freddie_to_son_tags').children().length === 0) {
            $('.freddie_to_son_tags').parents('.et_pb_row').hide();
        }

        // if ($('.freddie_to_son_post_comments #comment-section.nocomments').length > 0) {
        //     $('.freddie_to_son_post_comments').parents('.et_pb_row').hide();
        // }

    }

    $(".freddie_to_son_post_comments p.comment-form-comment").insertBefore(".freddie_to_son_post_comments p.form-submit");


    function freddie_to_son_blog_resize_margin() {
        var height = $('.freddie_to_son_post_title .et_pb_title_featured_container').height();
        //console.log("height "+height);
        var margin = height - 451;
        $('.freddie_to_son_post_title .et_pb_title_featured_container').parents('.et_pb_section').css('margin-bottom', margin + "px");
    }

    freddie_to_son_blog_resize_margin();

    $(window).resize(function() {
        if ($(window).width() > 980) freddie_to_son_blog_resize_margin();
        else $('.freddie_to_son_post_title .et_pb_title_featured_container').parents('.et_pb_section').css('margin-bottom', "0");
    });
})(jQuery);