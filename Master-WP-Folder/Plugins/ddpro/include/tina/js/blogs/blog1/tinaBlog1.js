(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlog1 = 2000;

    if (isIE()) {
        tinaBlog1 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlog1 = 10000;
    }

    setTimeout(function () {

        if ($('body .tina_blog_1_navigate').length !== 0) {
            $('.tina_blog_1_navigate .et_pb_posts_nav > span').each(function () {
                var postTilte = $(this).find('a').attr('href')
                postTilte = postTilte.substring(0, postTilte.length - 1).split("/").pop().replace(/\-/g, ' ');;



                $('<div class="post-title">'+ postTilte +'</div>').appendTo($(this))
            })

            // var valText = $('#page-container .tina_blog_1_navigate form.comment-form p input, #page-container .tina_blog_1_navigate form.comment-form p textarea').val()
            // $('#page-container .tina_blog_1_navigate form.comment-form p input, #page-container .tina_blog_1_navigate form.comment-form p textarea').val('')


            $('#page-container .tina_blog_1_navigate form.comment-form p input, #page-container .tina_blog_1_navigate form.comment-form p textarea').focus(function() {
                $(this).parent("p").addClass("focus");
            });

            $('#page-container .tina_blog_1_navigate form.comment-form p input, #page-container .tina_blog_1_navigate form.comment-form p textarea').blur(function () {
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

        if ($('body .tina_blog_1_optin').length !== 0) {
            var fieldsCount = $('.tina_blog_1_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_blog_1_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_blog_1_optin .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_blog_1_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }



        if ($('body .tina_blog_1_recent_posts').length !== 0) {



                $('.tina_blog_1_recent_posts article .post-meta').each(function() {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];
                    var categories = $(this).find('a[rel="tag"]').toArray();
                    categories = $.map(categories, function(element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');

                    var html = author.outerHTML;

                    html += date.outerHTML;
                    html += "<span class='categories'>" + categories + "</span>"

                    $(this).html(html);
                });

            $('.tina_blog_1_recent_posts article').each(function() {
                $(this).find('.author').insertBefore($(this).find('.entry-title'))
            })



            var titleHeight = 0;

            $('.tina_blog_1_recent_posts article .entry-title').each(function() {
                        if($(this).outerHeight() > titleHeight){
                            titleHeight = $(this).outerHeight()
                        }
            })

            $('.tina_blog_1_recent_posts article .entry-title').outerHeight(titleHeight)


            $('.tina_blog_1_recent_posts article').on('click', function () {
                var postLink = $(this).find('.entry-title a').attr('href')
                if(postLink){
                    window.location.href = postLink
                }
            })
        }

    }, tinaBlog1);

})(jQuery);