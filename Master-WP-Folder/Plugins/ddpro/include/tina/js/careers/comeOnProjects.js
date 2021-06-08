! function(a) {
    "use strict";
    a.fn.succinct = function(b) {
        var c = a.extend({ size: 240, omission: "...", ignore: !0 }, b);
        return this.each(function() {
            var b, d, e = a(this),
                f = /[!-\/:-@\[-`{-~]$/,
                g = function() {
                    e.each(function() {
                        b = a(this).html(), b.length > c.size && (d = a.trim(b).substring(0, c.size).split(" ").slice(0, -1).join(" "), c.ignore && (d = d.replace(f, "")), a(this).html(d + c.omission))
                    })
                };
            g()
        })
    }
}(jQuery);


(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var careeas = 1500;

    if (isIE()) {
        careeas = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        careeas = 10000;
    }

    setTimeout(function () {
        if ($('.come_on_blurbs').length !== 0) {
            var titleHeight = 0;
            var contentHeight = 0;

            $('.come_on_blurbs article .entry-title a').each(function() {
                $(this).succinct({
                    size: 50
                });


                if($(this).height()> titleHeight){
                    titleHeight = $(this).height();
                }
            });

            $('.come_on_blurbs article .post-content .post-content-inner').each(function() {
                if($(this).height()> contentHeight){
                    contentHeight = $(this).height();
                }
            })



            $('.come_on_blurbs article .entry-title a').height(titleHeight)
            $('.come_on_blurbs article .post-content .post-content-inner').height(contentHeight)
        }

    }, careeas);

})(jQuery);