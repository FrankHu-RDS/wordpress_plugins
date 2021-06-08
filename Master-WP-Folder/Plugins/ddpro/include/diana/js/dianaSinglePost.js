
(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var dianaContentsSliderTimeOut = 0;

    if (isIE()){
        dianaContentsSliderTimeOut = 5000;
    }

    if($('body').hasClass('et-fb')){
        dianaContentsSliderTimeOut = 10000;
    }

    setTimeout(function(){

        $('body.single.single-post .diana_single_post_banner').insertBefore($('body.single.single-post  #main-content'));




        $('body.single.single-post article.et_pb_post .post-meta').each(function () {
            var author = $(this).find('span.author')[0];
            var date = $(this).find('span.published')[0];
            var categories = $(this).find('a[rel="category tag"]').toArray();

            var dateDay = $(this).find('.published').html();
            var html = "";

            if (author) {
                html += "<div><span class='meta_title'>Author:</span>" + author.outerHTML + "</div>";
            }

            if (dateDay) {
                html += "<div><span class='meta_title'>Published on:</span>" + dateDay + "</div>";
            }

            if (categories) {
                categories = $.map(categories, function (element) {
                    return element.outerHTML;
                });
                categories = categories.join(', ');
                html += "<div><span class='meta_title'>Published in:</span>" + "<span class='categories'>" + categories + "</span>" + "</div>";
            }

            $(this).html(html);
        });



        $('body.single.single-post #comment-wrap #respond').insertBefore($('body.single.single-post #comment-wrap ol.commentlist '));
        $('#comment-wrap #respond p.comment-form-comment').insertAfter($('#comment-wrap #respond p.comment-form-email'));

    },dianaContentsSliderTimeOut)





})(jQuery);
