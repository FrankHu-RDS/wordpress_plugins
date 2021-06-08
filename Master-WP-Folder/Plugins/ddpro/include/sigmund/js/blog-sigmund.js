!function (a) {
    "use strict";
    a.fn.succinct = function (b) {
        var c = a.extend({size: 240, omission: "...", ignore: !0}, b);
        return this.each(function () {
            var b, d, e = a(this),
                f = /[!-\/:-@\[-`{-~]$/,
                g = function () {
                    e.each(function () {
                        b = a(this).html(), b.length > c.size && (d = a.trim(b).substring(0, c.size).split(" ").slice(0, -1).join(" "), c.ignore && (d = d.replace(f, "")), a(this).html(d + c.omission))
                    })
                };
            g()
        })
    }


}(jQuery);

(function ($) {
    var blogHeight = 0;
    setInterval(function () {
        if (!$('.sigmund_hover_effect_article .et_pb_ajax_pagination_container').hasClass('done')) {
            $('.sigmund_hover_effect_article article').each(function () {
                var thisHeight = $(this).height();
                if (thisHeight > blogHeight) {
                    blogHeight = thisHeight;
                }
            });

            $('.sigmund_hover_effect_article article').height(blogHeight);
            $('.sigmund_hover_effect_article .et_pb_ajax_pagination_container').addClass('done');
        }

    }, 500);

    // setInterval(function () {
    //     if (!$('.sigmund_hover_effect_article .et_pb_post .post-content').hasClass('done')) {
    //         $('.sigmund_hover_effect_article .et_pb_post .post-content p').each(function () {
    //             $(this).succinct({
    //                 size: 55
    //             });
    //         });
    //
    //         $('.sigmund_hover_effect_article .et_pb_post .post-content').addClass('done');
    //     }
    // }, 200);

    setInterval(function () {
        if (!$('.sigmund_hover_effect_article .pagination').hasClass('done')) {
            $('.sigmund_hover_effect_article .pagination .alignleft a').text($('.sigmund_hover_effect_article .pagination .alignleft a').text().replace(/\«/g, ' '));
            $('.sigmund_hover_effect_article .pagination .alignright a').text($('.sigmund_hover_effect_article .pagination .alignright a').text().replace(/\»/g, ' '));

            $('.sigmund_hover_effect_article .pagination').addClass('done');
        }

    }, 200)
})(jQuery);