(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlog3 = 2000;

    if (isIE()) {
        tinaBlog3 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlog3 = 10000;
    }

    setTimeout(function () {

        if ($('body .tina_blog_3').length !== 0) {
            if($('.tina_blog_3 form.comment-form p.comment-form-comment').length !== 0){
                $('.tina_blog_3 form.comment-form p.comment-form-comment').prepend($('.tina_blog_3 .form_author_image'));
                $('.tina_blog_3 .form_author_image').css('opacity', 1)
            }else{
                $('.tina_blog_3 .form_author_image').remove();
            }


            var imageSrc = $('.tina_blog_3 .et_pb_image.optin_button_icon img').attr('src');
            $('.tina_blog_3  .et_pb_newsletter_form p .et_pb_newsletter_button_text').html('<img src="'+ imageSrc +'">' + $('.tina_blog_3  .et_pb_newsletter_form p .et_pb_newsletter_button_text').text())

            $('body:not(.et-fb) .tina_blog_3 .et_pb_image.optin_button_icon').remove();


            $('.tina_blog_3 .et_pb_posts article.et_pb_post').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('.entry-title'))
            })

            $('.tina_blog_3 .et_pb_posts article.et_pb_post').on('click', function () {
                var articleLink = $(this).find('.entry-title a').attr('href');
                if(articleLink){
                    window.location.href = articleLink
                }
            })


            var fieldsCount = $('.tina_blog_3 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_blog_3 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_blog_3 .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_blog_3 p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }



            // $('#page-container .tina_blog_3 form.comment-form p input, #page-container .tina_blog_3 form.comment-form p textarea').val('')


            $('#page-container .tina_blog_3 form.comment-form p input, #page-container .tina_blog_3 form.comment-form p textarea').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_3 form.comment-form p input, #page-container .tina_blog_3 form.comment-form p textarea').blur(function () {
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




    }, tinaBlog3);

})(jQuery);