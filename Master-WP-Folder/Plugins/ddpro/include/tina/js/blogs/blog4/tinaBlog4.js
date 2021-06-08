(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlog4 = 2000;

    if (isIE()) {
        tinaBlog4 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlog4 = 10000;
    }

    setTimeout(function () {

        if ($('body .tina_blog_4_comments').length !== 0) {


            $('.tina_blog_4 .et_pb_post_content > p').each(function () {
                if ($(this).find('img').length !== 0) {
                    $(this).addClass('contains_image')
                }
            })


            var screenWidht = $(window).width();
            var colWidht = $('.tina_blog_4 .et_pb_post_content').width();


            $('.tina_blog_4 .et_pb_post_content .wp-caption').each(function () {
                if ($(this).find('p.wp-caption-text').text() === 'full_width') {
                    $(this).addClass('full_width');
                    // $(this).width(screenWidht)
                    $(this).css('cssText', 'width: '+ screenWidht +'px !important; margin-left: -' + (screenWidht - colWidht)/2 + 'px !important;')
                }
            })


            if ($('.tina_blog_4 .et_pb_post_content > p:first-child').hasClass('contains_image')) {
                $('.tina_blog_4 .tina_blog4_author_info').insertAfter($('.tina_blog_4 .et_pb_post_content > p:first-child'))
            } else {
                $('.tina_blog_4 .tina_blog4_author_info').remove()
            }
        }

        if ($('body .tina_blog_4_comments').length !== 0) {


            $('#page-container .tina_blog_4_comments  form.comment-form p.comment-form-comment').insertAfter($('#page-container .tina_blog_4_comments  form.comment-form p.comment-form-email'))


            // $('#page-container .tina_blog_4_comments form.comment-form p textarea, #page-container .tina_blog_4_comments form.comment-form p input').val('')


            $('#page-container .tina_blog_4_comments form.comment-form p textarea, #page-container .tina_blog_4_comments form.comment-form p input').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_4_comments form.comment-form p textarea, #page-container .tina_blog_4_comments form.comment-form p input').blur(function () {
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


    }, tinaBlog4);

})(jQuery);