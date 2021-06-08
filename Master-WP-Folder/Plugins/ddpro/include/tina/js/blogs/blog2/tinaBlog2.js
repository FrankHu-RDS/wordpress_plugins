(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlog2 = 2000;

    if (isIE()) {
        tinaBlog2 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlog2 = 10000;
    }

    setTimeout(function () {

        if ($('body .tina_blog_2').length !== 0) {
            $('.tina_blog_2 .et_pb_posts_nav > span').each(function () {
                var postTilte = $(this).find('a').attr('href')
                postTilte = postTilte.substring(0, postTilte.length - 1).split("/").pop().replace(/\-/g, ' ');;

                $('<div class="post-title">'+ postTilte +'</div>').appendTo($(this))
            })

            $('#page-container .tina_blog_2 form.comment-form p.comment-form-comment').insertAfter($('#page-container .tina_blog_2 form.comment-form p.comment-form-email'))


            if($('.tina_blog_2 .post_featured_image .et_pb_image_wrap img').height() < $('.tina_blog_2 .post_featured_image .et_pb_image_wrap').height()){
                $('.tina_blog_2 .post_featured_image').addClass('small_image')
            }


            $('#page-container .tina_blog_2 #comment-wrap .commentlist li article.comment-body').each(function () {
                $('<div class="line"></div>').appendTo($(this))
            })


            var childsCount = 1;
            $('#page-container .tina_blog_2 #comment-wrap .commentlist ul.children').each(function () {
                    var marginLeft = parseInt($(this).closest('.children').css('margin-left'), 10);

                    $(this).children('li').find('article').each(function () {
                        $(this).find('.line').css('left', '-' + childsCount*marginLeft + 'px')
                    })

                childsCount++
            })




            // $('#page-container .tina_blog_2 form.comment-form p input, #page-container .tina_blog_2 form.comment-form p textarea').val('')


            $('#page-container .tina_blog_2 form.comment-form p input, #page-container .tina_blog_2 form.comment-form p textarea').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_2 form.comment-form p input, #page-container .tina_blog_2 form.comment-form p textarea').blur(function () {
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




    }, tinaBlog2);

})(jQuery);