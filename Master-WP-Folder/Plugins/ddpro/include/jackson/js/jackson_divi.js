(function($) {
    // Pricing Tables
    const { __, _x, _n, _nx } = wp.i18n;

    setTimeout(function() {
        var timeOutTeam = 1500;
        if ($('body').hasClass("ie")) {
            timeOutTeam = 4500;
        }

        var priceContHeight = 0;
        setTimeout(function() {
            $('.seo_home_pricing_tables .et_pb_pricing_content').each(function() {
                var postHeight = $(this).height();
                if (postHeight > priceContHeight) {
                    priceContHeight = postHeight
                }
            });

            $('.seo_home_pricing_tables .et_pb_pricing_content').height(priceContHeight);
        }, timeOutTeam);
    }, 500);

    // Person

    setTimeout(function() {
        $('.seo_team .et_pb_team_member').each(function() {
            var imageGif = $(this).css('background-image');
            $('<div class="image_back"></div>').insertAfter($(this).find('.et_pb_team_member_image img')).css('background-image', imageGif);
            $(this).css('background-image', 'none');
            $('.seo_team').css('opacity', 1)
        })
    }, 4500);

    // Blog

    $(".seo_blog .et_pb_posts .et_pb_post  .post-meta").each(function() {
        if ("undefined" !== $(this).find("span.author")[0]) var e = $(this).find("span.author")[0];
        var i = $(this).find("span.published")[0],
            n = $(this).find('a[rel="category tag"]').toArray(),
            _ = $(this).find(".published").text(),
            a = _.replace(/\d+/g, ""),
            s = parseInt(_);
        if (9 >= s && (s = "0" + s), i = '<span class="published"><span class="day"> ' + s + '</span><span class="month"> ' + a + "</span></span>", n = $.map(n, function($) {
                return $.outerHTML
            }), n = n.join(", "), e) {
            var o = "Posted " + e.outerHTML + " / ";
            o += i, o += "<span class='categories'>" + n + "</span>"
        } else {
            var o = i;
            o += "<span class='categories'>" + n + "</span>"
        }
        $(this).html(o)
    });

    setTimeout(function() {
        $("body.et-fb .seo_blog .et_pb_posts .et_pb_post  .post-meta").each(function() {
        if ("undefined" !== $(this).find("span.author")[0]) var e = $(this).find("span.author")[0];
        var i = $(this).find("span.published")[0],
            n = $(this).find('a[rel="category tag"]').toArray(),
            _ = $(this).find(".published").text(),
            a = _.replace(/\d+/g, ""),
            s = parseInt(_);
        if (9 >= s && (s = "0" + s), i = '<span class="published"><span class="day"> ' + s + '</span><span class="month"> ' + a + "</span></span>", n = $.map(n, function($) {
                return $.outerHTML
            }), n = n.join(", "), e) {
            var o = "Posted " + e.outerHTML + " / ";
            o += i, o += "<span class='categories'>" + n + "</span>"
        } else {
            var o = i;
            o += "<span class='categories'>" + n + "</span>"
        }
        $(this).html(o)
    });
         $('body.et-fb .seo_blog article.et_pb_post').each(function() {

        if ($(this).find($('.post_info')).length === 0) {
            $('<div class="post_info"></div>').appendTo($(this));
        }

        $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
        $(this).find('.post-meta').appendTo($(this).find('.post_info'));
        $(this).find('.post-content').appendTo($(this).find('.post_info'));
    });
    }, 1500);



    //            setTimeout(function () {
    $('.seo_blog article.et_pb_post').each(function() {

        if ($(this).find($('.post_info')).length === 0) {
            $('<div class="post_info"></div>').appendTo($(this));
        }

        $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
        $(this).find('.post-meta').appendTo($(this).find('.post_info'));
        $(this).find('.post-content').appendTo($(this).find('.post_info'));
    });
    //            }, 500);


    $.fn.isVisible = function() {
        var win = $(window);

        var viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();

        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();

        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    };

    var maximagesCount = '';
    if ($('.shapes_images_section').length !== 0) {

        $(window).scroll(function() {
            $('.shapes_images_section .et_pb_image').each(function() {
                if ($(this).isVisible()) {
                    $(this).addClass('animate_image');
                    maximagesCount = $('.shapes_images_section .et_pb_image.animate_image').length;
                } else {
                    $(this).removeClass('animate_image');
                }
            });
        });

        var minimagesCount = 0;
        setInterval(function() {
            var random = Math.floor(Math.random() * (maximagesCount - minimagesCount + 1)) + minimagesCount;
            $('.shapes_images_section .et_pb_image.animate_image:eq(' + random + ')').addClass('inViewPort');
        }, 500);

        setInterval(function() {
            $('.shapes_images_section .et_pb_image').removeClass('inViewPort');
        }, 25000);
    }

    // Newsletter Form

    $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"])').each(function() {
        $(this).find('input').insertBefore($(this).find('label'));
        $(this).find('label[for="et_pb_signup_lastname"]').each(function() {
            $(this).text("Surname");
        });
        $(this).find('label[for="et_pb_signup_firstname"]').each(function() {
            if ($(this).prev().attr('placeholder') === __('Last Name', 'ddpro')) {
                $(this).text(__("Surname", 'ddpro'));
            } else $(this).text(__("Name", 'ddpro'));
        });

        $(this).find('input.et_pb_signup_firstname').required = false;
    });

    $(' .et_pb_newsletter .et_pb_newsletter_form input').focus(function() {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_newsletter .et_pb_newsletter_form input').blur(function() {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });

    // Contact Form

    $('input,textarea').focus(function() {
        if ($(this).attr('placeholder') !== '') {
            $(this).attr('data-placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', '');
        }
    });
    $('input,textarea').blur(function() {

        if ($(this).attr('placeholder') === '') {
            $(this).attr('placeholder', $(this).attr('data-placeholder'));
        }
    });

    $('.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function() {
        $(this).find('textarea').insertBefore($(this).find('label'));
        $(this).find('input').insertBefore($(this).find('label'));
    });


    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').focus(function() {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').blur(function() {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });


    //Comment Form


    $('#comment-wrap #respond p:not(.form-submit) textarea, #comment-wrap #respond p:not(.form-submit) input').focus(function() {
        $(this).parent("p").addClass("focus");
    });

    $('#comment-wrap #respond p:not(.form-submit) textarea, #comment-wrap #respond p:not(.form-submit) input').blur(function() {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });

    $('#comment-wrap #respond p').each(function () {
        $(this).find('label').insertAfter($(this).find('textarea'));
        $(this).find('label').insertAfter($(this).find('input'));
    })



    // Pop-up

    $("body .video-popup h4").click(function() {
        $(this).find('a').attr('href', "");
        $("body .video-popup .et_pb_main_blurb_image a").click();
    });

    $("body .video-popup h4 a").click(function (e) {
        e.preventDefault();
    });

    $("body .video-popup .et_pb_main_blurb_image a").click(function(event) {
        event.preventDefault();
        $.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 680,
            'height': 495,
            'href': this.href,
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });

        return false;
    });



//    Single Post

    if($('body.single .cat_page_content .et_pb_column_2_3').length !== 0){
        $('body.single-post .et_pb_post .et_post_meta_wrapper:first-child').insertBefore('body.single-post .cat_page_content .et_pb_column_2_3 .et_pb_text:first-child');
        $('body.single-post .et_pb_post .et_post_meta_wrapper:last-child').appendTo('body.single-post .cat_page_content .et_pb_column_2_3');
        $('body.single-post #main-content > .container > .et_post_meta_wrapper').appendTo('body.single-post .cat_page_content .et_pb_column_2_3');
    }else{
        $('body.single-post .et_pb_post .et_post_meta_wrapper:first-child').insertAfter('body.single-post .et_pb_post .single_post_bunner');
        $('body.single-post .et_pb_post .et_post_meta_wrapper:last-child').insertAfter('body.single-post .et_pb_post .cat_page_content');
    }



    $('#comment-wrap #respond p.comment-form-comment').insertAfter($('#comment-wrap #respond p.comment-form-email'));
    $('body.single-post .tags_section').insertAfter($('body.single-post .cat_page_content .et_pb_column_2_3 article'));

})(jQuery);