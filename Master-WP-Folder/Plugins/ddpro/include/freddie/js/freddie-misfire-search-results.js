(function($) {

    var title_html = $(".freddie_misfire_search_results_title .et_pb_post_title .entry-title").html();

    //  console.log(title_html);

    if (typeof title_html !== "undefined") {
        var start_pos = title_html.indexOf('"') + 1;
        var end_pos = title_html.indexOf('"', start_pos);
        var text_to_get = title_html.substring(start_pos, end_pos);

        text_to_get = "<span>" + text_to_get + "</span>";

        var text_before = title_html.substring(0, start_pos - 1);


        // console.log(text_to_get);
        // console.log(text_before);

        var final_html = text_before + text_to_get;

        if (final_html) $(".freddie_misfire_search_results_title .et_pb_post_title .entry-title").html(final_html);
    }

    setInterval(function() {
        if ($(window).width() > 980) {
            $('.freddie_misfire_search_results article').each(function() {

                $(this).find('.entry-title a').succinct({
                    size: 60
                });
            });

            var maxHeight = Math.max.apply(null, $(".freddie_misfire_search_results article").map(function() {
                return $(this).outerHeight();
            }).get());

            // console.log(maxHeight);

            $('.freddie_misfire_search_results article').each(function() {

                if ($(this).height() < maxHeight) { $(this).css("height", maxHeight + "px"); }
            });
        }

        $(".freddie_misfire_search_results_search_again .et_pb_searchsubmit").val('U');
    }, 200);

    

})(jQuery);