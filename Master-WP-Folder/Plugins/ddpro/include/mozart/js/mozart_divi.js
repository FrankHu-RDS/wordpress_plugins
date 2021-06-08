!function (a) {
    "use strict";
    a.fn.succinct = function (b) {
        var c = a.extend({size: 240, omission: "...", ignore: !0}, b);
        return this.each(function () {
            var b, d, e = a(this),
                f = /[!-\/:-@\[-`{-~]$/,
                g = function () {
                    e.each(function () {
                        b = a(this).html(), b.length > c.size && (d = a.trim(b).substring(0, c.size).split(" ").slice(0, -1).join(" "), c.ignore && (d = d.replace(f, "")), a(this).html(d + c.omission))
                    })
                };
            g()
        })
    }
}(jQuery);

// Blog module

(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    $('.et_pb_section article.et_pb_post').on('click', function () {
        var pageLink = $(this).find('.entry-title > a').attr('href');
        var thisPageLinkTarget = $(this).find('.entry-title > a').attr('target');

        if (pageLink) {
            if (thisPageLinkTarget) {
                window.open(
                    pageLink,
                    '_blank'
                );
            } else window.location.href = pageLink;
        }
    });

    $('.moz_blog article').each(function () {
        var avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');
        //console.log(avatarUrl);
        if(avatarUrl) var avatarCode = '<img alt="author avatar" src="' + avatarUrl + '" class="avatar avatar-92 photo" height="92" width="92">';
        //console.log(avatarCode);
        if(avatarCode) $(avatarCode).insertBefore($(this).find('.author.vcard a'))
    });

    $('.moz_blog .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();
        categories = $.map(categories, function (element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = author.outerHTML;
        html += date.outerHTML;
        html += "<span class='categories'>" + categories + "</span>"

        $(this).html(html);
    });

    //            $('dataavatar').remove();

    function blog_2_resize() {
        var blog_2 = [];
        $('.moz_blog h2 > a').each(function () {
            var blog2h = $(this).height();
            blog_2.push(blog2h);

        });

        var maxh = Math.max.apply(Math, blog_2);

        $('.moz_blog h2 > a').each(function () {
            $(this).height(maxh);
        });
    }

    setTimeout(function () {
        blog_2_resize();
    }, 1000);

    $(window).on('resize', function () {
        blog_2_resize();

        var win = $(this); //this = window
        if (win.height() >= 820) { /* ... */
        }
        if (win.width() <= 600) {
        } else {
        }
    });

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);

    // $('.finance_footer .et_pb_newsletter label[for="et_pb_signup_email"]').text('Your e-mail');
})(jQuery);

// Team module

(function ($) {
    $(".team_page_blurbs .et_pb_blurb ").hover(
        function () {
            $(this).addClass("hover");
        },
        function () {
            $(this).removeClass("hover");
        }
    );
})(jQuery);

(function ($) {
    $('#page-container .mozart_consult_team .et_pb_team_member').on('click', function () {
        var teamPage = $(this).find('a.mozart_team_link').attr('href');
        if (teamPage) {
            window.location.href = teamPage;
        }
    });

    $('#page-container .mozart_conference_speakers .et_pb_team_member').on('click', function () {
        var teamPage = $(this).find('a.mozart_conference_person_link').attr('href');
        if (teamPage) {
            window.location.href = teamPage;
        }
    })
})(jQuery);


// video pop-up

(function ($) {

    $("body .video-popup h4 a").attr('href', '');
    $("body .video-popup h4").click(function (event) {
        //console.log('test');
        event.preventDefault();
        $("body .video-popup .et_pb_main_blurb_image a").click();
    });

    $("body .video-popup .et_pb_main_blurb_image a").click(function (event) {
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

    $("body .video-popup.et_pb_image a").click(function (event) {
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
})(jQuery);

// newsletter

(function ($) {
    $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"]):not([data-type="radio"])').each(function () {
        $(this).find('input').insertBefore($(this).find('label'));
        $(this).find('label[for="et_pb_signup_lastname"]').each(function () {
            $(this).text("Surname");
        });
        $(this).find('label[for="et_pb_signup_firstname"]').each(function () {
            if ($(this).prev().attr('placeholder') === __('Last Name', 'ddpro')) {
                $(this).text(__("Surname", 'ddpro'));
            } else $(this).text(__("Name", 'ddpro'));
        });

        $(this).find('input.et_pb_signup_firstname').required = false;
    });

    $(' .et_pb_newsletter .et_pb_newsletter_form input').focus(function () {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_newsletter .et_pb_newsletter_form input').blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });


    // $('.cat_page_content .et_pb_newsletter p label[for="et_pb_signup_firstname"]').text('Your Name...');
    // $('.cat_page_content .et_pb_newsletter p label[for="et_pb_signup_email"]').text('Your Email...');
    // $('.mozart_footer .et_pb_newsletter_form p label[for="et_pb_signup_email"]').text('Your e-mail');


})(jQuery);


// contact

(function ($) {


    $('input,textarea').focus(function () {
        if ($(this).attr('placeholder') !== '') {
            $(this).attr('data-placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', '');
        }
    });
    $('input,textarea').blur(function () {

        if ($(this).attr('placeholder') === '') {
            $(this).attr('placeholder', $(this).attr('data-placeholder'));
            //console.log($(this).attr('placeholder'));

        }
    });

    $('.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function () {
        $(this).find('textarea').insertBefore($(this).find('label'));
        $(this).find('input').insertBefore($(this).find('label'));
    });


    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').focus(function () {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });

})(jQuery);

// blog

(function ($) {

    //            setTimeout(function () {
    $('.moz_blog article.et_pb_post, .mozart_investment_blog article.et_pb_post').each(function () {

        if ($(this).find($('.post_info')).length === 0) {
           // console.log($(this).find($('.post_info')));
            $('<div class="post_info"></div>').appendTo($(this));
        }

        $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
        $(this).find('.post-meta').appendTo($(this).find('.post_info'));
        $(this).find('.post-content').appendTo($(this).find('.post_info'));
    });
    //            }, 4500);

    // FB
    setTimeout(function () {
        $('body.et-fb .moz_blog article.et_pb_post, body.et-fb .mozart_investment_blog article.et_pb_post').each(function () {

            if ($(this).find($('.post_info')).length === 0) {
               // console.log($(this).find($('.post_info')));
                $('<div class="post_info"></div>').appendTo($(this));
            }

            $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
            $(this).find('.post-meta').appendTo($(this).find('.post_info'));
            $(this).find('.post-content').appendTo($(this).find('.post_info'));
        });
    }, 4500);

})(jQuery);

// hover

(function ($) {
    $('.mozart_start_up_blurbs .et_pb_blurb').each(function () {
        $('<div class="inner_box"></div>').appendTo($(this));

    });

    setTimeout(function () {
        var blurbHeight = $('.mozart_start_up_blurbs .et_pb_blurb').height();
        var blurbWidth = $('.mozart_start_up_blurbs .et_pb_blurb').width();
        var minNumberForHeight = 0;
        var maxNumberForHeight = blurbHeight;
        var minNumberForWidth = 0;
        var maxNumberForWidth = blurbWidth;


        $('.mozart_start_up_blurbs .et_pb_blurb').hover(
            function () {
                var numberForHeight = Math.floor(Math.random() * (maxNumberForHeight - minNumberForHeight + 1) + minNumberForHeight);
                var numberForWidth = Math.floor(Math.random() * (maxNumberForWidth - minNumberForWidth + 1) + minNumberForWidth);
                $(this).find(".inner_box").css({
                    'transform': 'scale(1)',
                    'width': blurbHeight * 3,
                    'height': blurbHeight * 3,
                    'left': numberForWidth - blurbWidth * 2,
                    'top': numberForHeight - blurbHeight * 1.5
                });
            },
            function () {
                $(this).find(".inner_box").css({
                    'transform': 'scale(0)'
                });
            }
        )
    }, 500);


})(jQuery);

// start up blog

(function ($) {
    var blogDaley = 0;

    if ($('body').hasClass('et-fb')) {
        blogDaley = 5000;
    }

    setTimeout(function () {
        $('.mozart_start_up_blog  .post-meta').each(function () {
            var author = $(this).find('span.author')[0];
            var date = $(this).find('span.published')[0];
            var categories = $(this).find('a[rel="category tag"]').toArray();
            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });

            categories = categories.join(', ');

            var pieces = $(this).text().split(/[\s|]+/);
            var commentCount = pieces[pieces.length - 2];
            var commentText = pieces[pieces.length - 1];
            var comments = "<span class='comment'>" + commentCount + ' ' + commentText + "</span>";

            var autherComHtml = '<div class="bottom_box">' + author.outerHTML + comments + '</div>';

            var html = "<span class='categories'>" + categories + "</span>";
            html += ' // ' + date.outerHTML;
            html += autherComHtml;


            $(this).html(html);
        });
    }, blogDaley);

    setTimeout(function () {
        var title1Size = 0;
        $('.mozart_start_up_blog .et_pb_post .entry-title a').each(function () {
            var blogTitle1Size = $(this).height();
            //                    console.log(blogTitleSize);
            if (blogTitle1Size > title1Size) {
                title1Size = blogTitle1Size;
            }

        });
        //                console.log(titleSize);
        $('.mozart_start_up_blog  .et_pb_post .entry-title a').height(title1Size);
    }, 1000);


})(jQuery);
// Header

(function ($) {
    $('.mozart_investment_header .et_pb_column .et_pb_blurb').on('click touch', function (event) {
        event.preventDefault();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(this).hasClass('first_click')) {
                var pageUrl = $(this).find('h4 a').attr('href');
                if (pageUrl) {
                    window.location.href = pageUrl;
                }
            } else {
                $('.mozart_investment_header .et_pb_column .et_pb_blurb').removeClass('first_click');
                $(this).addClass('first_click');
                window.location.href = base_url;
            }
        } else {
            var pageUrl = $(this).find('h4 a').attr('href');
            if (pageUrl) {
                window.location.href = pageUrl;
            }
        }
    });


    $(".mozart_investment_header  .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").hover(function () {
        $(".mozart_investment_header .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").addClass("noHover");
        $(this).addClass("hover")
    }, function () {
        $(".mozart_investment_header .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").removeClass("noHover");
        $(this).removeClass("hover")
    });


})(jQuery);

// investments blog

(function ($) {
    $('.mozart_investment_blog article').each(function () {
        $(this).find('.avatar ').insertBefore($(this).find('.author.vcard a'));
    });

    $('.mozart_investment_blog article').each(function () {
        var avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');
        //console.log(avatarUrl);
        if(avatarUrl) var avatarCode = '<img alt="author avatar" src="' + avatarUrl + '" class="avatar avatar-92 photo" height="92" width="92">';
        //console.log(avatarCode);
        if(avatarCode) $(avatarCode).insertBefore($(this).find('.author.vcard a'))
    });

    $('.mozart_investment_blog .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();
        categories = $.map(categories, function (element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = author.outerHTML;
        html += date.outerHTML;
        html += "<span class='categories'>" + categories + "</span>"

        $(this).html(html);
    });


    function mozart_investment_blog_resize() {
        var blog_2 = [];
        $('.mozart_investment_blog h2 > a').each(function () {
            var blog2h = $(this).height();
            blog_2.push(blog2h);
        });

        var maxh = Math.max.apply(Math, blog_2);

        $('.mozart_investment_blog h2 > a').each(function () {
            $(this).height(maxh);
        });
    }

    setTimeout(function () {
        mozart_investment_blog_resize();
    }, 200);


    //            Simple Blog

    setTimeout(function () {
        $('.moz_simple_blog article').each(function () {
            $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
        });
    }, 1000);

    function mozart_simple_blog_resize() {
        var blog_2 = [];
        $('.moz_simple_blog h2 > a').each(function () {
            $(this).succinct({
                size: 50
            });
            var blog2h = $(this).height();
            blog_2.push(blog2h);

        });

        var maxh = Math.max.apply(Math, blog_2);

        $('.moz_simple_blog h2 > a').each(function () {
            $(this).height(maxh);
        });
    }

    setTimeout(function () {
        mozart_simple_blog_resize();
        $('.moz_simple_blog .post-content p').each(function () {
            $(this).succinct({
                size: 100
            });
        });
    }, 500);


    setTimeout(function () {
        if ($('.cat_page_content .pagination .alignleft a').text() === "" && $('.cat_page_content .pagination .alignright a').text() === "") {
            $('.cat_page_content .pagination').remove();
        }
    }, 500)


})(jQuery);


// slider

(function ($) {
    setTimeout(function () {
        $('.mozart_corporation_slider').css('display', 'block')
    }, 1000);

    setTimeout(function () {
        //Slide Sizes
        var prevEl = 0;
        var slideSize = 0;
        var windowWidth = "";
        var slideItemWidth = "";
        var slideItemCount = "";
        var margRight = "";
        var classCount = "1";
        $('.mozart_corporation_slider ').each(function () {
            $(this).find('.et_pb_slides').each(function () {
                windowWidth = $(window).width();
                slideItemWidth = $(this).find('.et_pb_slide').width();
                slideItemCount = $(this).find('.et_pb_slide').length + 2;
                $(this).width(slideItemWidth * slideItemCount);

                margRight = (windowWidth - 3 * slideItemWidth) / 2;

                $(this).css('margin-left', margRight);


                //Adding First and last Elements
                $(this).find('.et_pb_slide:last-child').clone().insertBefore($(this).find('.et_pb_slide:first-child'));
                $(this).find('.et_pb_slide:nth-child(2)').clone().removeClass('et-pb-active-slide').insertAfter($(this).find('.et_pb_slide:last-child'));

                prevEl = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                slideSize = slideItemWidth * prevEl - margRight;

                $(this).find('.et_pb_slides').css('margin-left', -slideSize);
            });
        });

        $('.mozart_corporation_slider .et_pb_slide').each(function () {
            var attrText = $(this).find('.et_pb_slide_description h2').text();
            $('.mozart_corporation_slider .et-pb-controllers a:nth-child(' + classCount + ')').attr('text', attrText);
            classCount++;
        });
        //Slider Slide

        $('body:not(.et-fb) .mozart_corporation_slider .et-pb-controllers a').on('click', function () {
            $('.mozart_corporation_slider .et_pb_slides').addClass('active_slider');
            //                    $(this).parent().prev().addClass('active_slider');
            setTimeout(function () {
                prevEl = $('.active_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                slideSize = slideItemWidth * prevEl - margRight;
                $('.active_slider').css('margin-left', -slideSize);
            }, 100)

        });

        $('body.et-fb .mozart_corporation_slider .et-pb-controllers a').on('click', function (e) {
            e.preventDefault();
            });

         $('.mozart_corporation_slider .et_pb_slides').addClass('active_slider');
            //                    $(this).parent().prev().addClass('active_slider');
            setInterval(function () {
                prevEl = $('.active_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                slideSize = slideItemWidth * prevEl - margRight;
                $('.active_slider').css('margin-left', -slideSize);
            }, 200)

        //Adding Title in controls


    }, 4000);


})(jQuery);


// blog coach

(function ($) {
    $('.mozart_coach_blog .post-meta').each(function () {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();
        categories = $.map(categories, function (element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = author.outerHTML;
        html += date.outerHTML;
        html += "<span class='categories'>" + categories + "</span>"

        $(this).html(html);
    });


    function blog_5_resize() {
        blog_5 = [];
        $('.mozart_coach_blog h2').each(function () {
            var blog5h = $(this).height();
            blog_5.push(blog5h);

        });

        var maxh = Math.max.apply(Math, blog_5);

        $('.mozart_coach_blog h2').each(function () {
            $(this).height(maxh);
        });
    }


    setTimeout(function () {
        blog_5_resize();
    }, 200);


    // Parse html tags for titles

    var titlesDelay = 0;
    if ($('body').hasClass('et-fb')) {
        titlesDelay = 5000;
    }


    $('.et_pb_number_counter h3.title, .et_pb_toggle h5.et_pb_toggle_title').each(function () {
        pixie_title = $(this).html();
        pixie_title_new = pixie_title.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
        $(this).html(pixie_title_new);
    });
    //Single Post


    //Comment Form


    $('#comment-wrap #respond p:not(.form-submit) textarea, #comment-wrap #respond p:not(.form-submit) input').focus(function () {
        $(this).parent("p").addClass("focus");
    });

    $('#comment-wrap #respond p:not(.form-submit) textarea, #comment-wrap #respond p:not(.form-submit) input').blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });

    $('#comment-wrap #respond p:not(.wpgdprc-checkbox)').each(function () {
        $(this).find('label').insertAfter($(this).find('textarea'));
        $(this).find('label').insertAfter($(this).find('input'));
    });

    if ($('body.single .cat_page_content .et_pb_column_2_3').length !== 0) {
        $('body.single-post .et_pb_post .et_post_meta_wrapper:first-child').insertBefore('body.single-post .cat_page_content .et_pb_column_2_3 .et_pb_text:first-child');
        $('body.single-post .et_pb_post .et_post_meta_wrapper:last-child').appendTo('body.single-post .cat_page_content .et_pb_column_2_3');
        $('body.single-post #main-content > .container > .et_post_meta_wrapper').appendTo('body.single-post .cat_page_content .et_pb_column_2_3');
    } else {
        $('body.single-post .et_pb_post .et_post_meta_wrapper:first-child').insertAfter('body.single-post .et_pb_post .single_post_bunner');
        $('body.single-post .et_pb_post .et_post_meta_wrapper:last-child').insertAfter('body.single-post .et_pb_post .cat_page_content');
    }


    $('#comment-wrap #respond p.comment-form-comment').insertAfter($('#comment-wrap #respond p.comment-form-email'));
    $('body.single-post .tags_section').insertAfter($('body.single-post .cat_page_content .et_pb_column_2_3 article'));

})(jQuery);