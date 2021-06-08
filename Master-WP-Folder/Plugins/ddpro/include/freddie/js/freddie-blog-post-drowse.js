(function($) {

    if ($('.freddie_drowse_post_title .et_pb_title_meta_container').length > 0) {
        let author = $('.freddie_drowse_post_title .et_pb_title_meta_container .author').html();
        let date = $('.freddie_drowse_post_title  .et_pb_title_meta_container .published').html();
        $('.freddie_drowse_post_title  .et_pb_title_meta_container > a').addClass('comments');
        let category = $('.freddie_drowse_post_title  .et_pb_title_meta_container > a')[0].outerHTML;

        let comments = $('.freddie_drowse_post_title  .et_pb_title_meta_container .comments-number').html();
        let meta = $('.freddie_drowse_post_title  .et_pb_title_meta_container').text();

        meta = meta.split(' ')[1];

        meta = '<span class="meta">' + meta + '</span>';

        if (comments !== undefined) comments = "<dvi class='comments'>" + comments + "</div>";


        let newMeta = meta + " " + author + "  <span class='meta divided'>|</span> " + date;

        if (comments !== undefined) newMeta = newMeta + comments;

        $('.et_pb_title_meta_container').html(newMeta);

        $(category).insertBefore('h1.entry-title');

    }

    if ($(window).width() > 768) {

        setInterval(function() {

            var maxHeight = Math.max.apply(null, $(".freddie_entertain_you_blog article").map(function() {
                return $(this).height();
            }).get());

            $(".freddie_entertain_you_blog article").each(function() {

                var currentHeight = $(this).height();
                console.log('currentHeight ' + currentHeight);
                if (currentHeight < maxHeight) $(this).height(maxHeight);
            });

        }, 500);
    }

    if ($('.freddie_drowse_post_title .et_pb_title_featured_container').children().length === 0) {
        $('.freddie_drowse_post_title .et_pb_title_featured_container').hide();
    }

    if ($('.freddie_drowse_post_author:not(.freddie_all_girls_post_author) .et_pb_text:last-child .et_pb_text_inner').children().length === 0) {
        $('.freddie_drowse_post_author:not(.freddie_all_girls_post_author) .et_pb_text:last-child .et_pb_text_inner').addClass('last-empty');
    }

    // if ($('.freddie_drowse_post_comments #comment-section.nocomments').length > 0) {
    //     $('.freddie_drowse_post_comments').parents('.et_pb_row ').hide();
    // }


})(jQuery);