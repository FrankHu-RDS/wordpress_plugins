(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlog6 = 2000;

    if (isIE()) {
        tinaBlog6 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlog6 = 10000;
    }

    setTimeout(function () {

        if ($('body .tina_blog_6').length !== 0) {


            $('.tina_blog_6 .et_pb_post_content .wp-caption').each(function () {
                if ($(this).find('p.wp-caption-text').text() === 'full_width') {
                    $(this).addClass('full_width');
                }
            })


            $('.tina_blog_6 .et_pb_posts_nav span.nav-label').each(function () {
                $(this).html('<span class="line"></span>')
            })
            $('.tina_blog_6 .et_pb_posts_nav > span').each(function () {
                var postTilte = $(this).find('a').attr('href')
                postTilte = postTilte.substring(0, postTilte.length - 1).split("/").pop().replace(/\-/g, ' ');;



                $('<div class="post-title">'+ postTilte +'</div>').appendTo($(this).find('a'))
            })



            $('#page-container .tina_blog_6  form.comment-form p.comment-form-comment').insertBefore($('#page-container .tina_blog_6  form.comment-form p.form-submit'))


            // $('#page-container .tina_blog_6 form.comment-form p textarea, #page-container .tina_blog_6 form.comment-form p input').val('')


            $('#page-container .tina_blog_6 form.comment-form p textarea, #page-container .tina_blog_6 form.comment-form p input').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_6 form.comment-form p textarea, #page-container .tina_blog_6 form.comment-form p input').blur(function () {
                if ($(this).val() === $(this).closest('p').find('label').text()) {
                    $(this).val('')
                }


                if ($(this).val()) {
                    $(this).parent().addClass("filled");
                } else {
                    $(this).parent().removeClass("filled");
                }
                $(this).parent("p").removeClass("focus");
            });





        }


    }, tinaBlog6);

})(jQuery);