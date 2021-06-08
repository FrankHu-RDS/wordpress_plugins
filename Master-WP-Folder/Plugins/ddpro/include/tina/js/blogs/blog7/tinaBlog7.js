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

        if ($('body .tina_blog_7').length !== 0) {
            $('.tina_blog_7 form.comment-form p.comment-form-comment').prepend($('.tina_blog_7 .form_author_image'))


            // $('.tina_blog_7 .tina_its_alright_blog article.et_pb_post').on('click', function () {
            //     var postUrl = $(this).find('.entry-title a').attr('href');
            //     if(postUrl){
            //         window.location.href = postUrl;
            //     }
            // })



            // $('#page-container .tina_blog_7 form.comment-form p input, #page-container .tina_blog_7 form.comment-form p textarea').val('')


            $('#page-container .tina_blog_7 form.comment-form p input, #page-container .tina_blog_7 form.comment-form p textarea').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_7 form.comment-form p input, #page-container .tina_blog_7 form.comment-form p textarea').blur(function () {
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