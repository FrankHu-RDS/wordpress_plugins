(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var modernTimesBlog = 500;

    if (isIE()) {
        modernTimesBlog = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        modernTimesBlog = 10000;
    }

    setTimeout(function () {
        if($('.modern-times-blog-sec').length !== 0){


            $('.freddie_really_does_archive_blog .et_pb_post').each(function () {
                $(this).find('.entry-featured-image-url').css('background-image', 'url('+ $(this).find('.entry-featured-image-url img').attr('src') +')')
            })


            $('.modern-times-blog-cat-link .et_pb_button_module_wrapper .et_pb_button ').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this));
                $('<span class="button_circle hover"></span>').appendTo($(this));
            })




            $("#modern-times-blog-hero-blog .et_pb_post:nth-child(2) h2.entry-title a, #modern-times-blog-hero-blog .et_pb_post:nth-child(3) h2.entry-title a").html(function(){
                return $(this).html().substr(0,40);
            });

            $("#modern-times-blog-hero-blog .et_pb_post:nth-child(2) h2.entry-title a, #modern-times-blog-hero-blog .et_pb_post:nth-child(3) h2.entry-title a").each(function () {
                var thisText = $(this).text();
                $(this).text(thisText + ' . . .')
            })
        }


    }, modernTimesBlog);

})(jQuery);