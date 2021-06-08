!function (t) {
    t(".person3_M  .et_pb_column_1_2 .et_pb_team_member  ").hover(function () {
        t(".person3_M  .et_pb_column_1_2 .et_pb_team_member  ").addClass("noHover"), t(this).addClass("hover")
    }, function () {
        t(".person3_M  .et_pb_column_1_2 .et_pb_team_member  ").removeClass("noHover"), t(this).removeClass("hover")
    }), t(".button_unique").each(function () {
        t(this).parent(".et_pb_button_module_wrapper").addClass("button_unique_wrapper")
    }), t(".mask_2_M a.et_pb_button.read-our-news ").on("click", function (e) {
        e.preventDefault(), t("html").addClass("clicked"), t("body").addClass("clicked_mask").addClass("unclicked_mask"), setTimeout(function () {
            t("body").removeClass("unclicked_mask")
        }, 800)
    }), t(".mask_2_M a.et_pb_button.close_button").on("click", function (e) {
        e.preventDefault(), t("html").removeClass("clicked"), t("body").removeClass("clicked_mask").addClass("unclicked_mask");
        var i = t(".mask_2_M").offset();
        t(document).scrollTop(i.top), setTimeout(function () {
            t("body").removeClass("unclicked_mask")
        }, 800)
    }), t(".mask_1_M a.et_pb_button.team_button ").on("click", function (e) {
        e.preventDefault(), t("html").addClass("clicked_mask_1"), t("body").addClass("clicked_button");
        var i = t(this).attr("href");
        setTimeout(function () {
            window.location.href = i
        }, 1e3), t("body").hasClass("safari") && setTimeout(function () {
            t("body").removeClass("clicked_button")
        }, 2e3)
    }), t.easing.smoothmove = function (t, e, i, n, _) {
        return -n * (e /= _) * (e - 2) + i
    },  t(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').focus(function () {
        t(this).parent("p").addClass("focus")
    }), t(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"]) textarea').blur(function () {
        t(this).val() ? t(this).parent().addClass("filled") : t(this).parent().removeClass("filled"), t(this).parent("p").removeClass("focus")
    });
    var o = t('.contact_form_1_M    .et_pb_contact_field[data-type="select"] select option:first-child').text(),
        c = o.replace(/\-/g, " ").replace(/\ /g, " ");
    t('.contact_form_1_M  .et_pb_contact_field[data-type="select"] select option:first-child').text(c), t('<span class="price"></span>').insertBefore(t('.contact_form_1_M   p.et_pb_contact_field[data-id="price"] input')), t(' .contact_form_4_M  .et_pb_contact_form  p[data-id="type_of_project"] .et_pb_contact_field_radio, .contact_form_4_M  .et_pb_contact_form  p[data-id="price"] .et_pb_contact_field_radio').on("click", function () {
        t(this).hasClass("clicked") || (t(this).parent(".et_pb_contact_field_options_list").find(".et_pb_contact_field_radio").removeClass("clicked"), t(this).addClass("clicked"))
    }), t('<div class="details"></div>').insertBefore('.contact_form_4_M  form p[data-id="type_of_project"]'), t('<div class="start_date"></div>').insertAfter('.contact_form_4_M  form p[data-id="type_of_project"]'), t('<div class="end_date"></div>').insertBefore('.contact_form_4_M  form p[data-id="price"]'), t('.contact_form_4_M  p[data-id="name"], .contact_form_4_M  p[data-id="email"], .contact_form_4_M  p[data-id="phone"]').appendTo(".contact_form_4_M  .details"), t('.contact_form_4_M  p[data-id="select_month"], .contact_form_4_M  p[data-id="select_year"], .contact_form_4_M  p[data-id="no_big_rsuh"]').appendTo(".contact_form_4_M  .start_date"), t('.contact_form_4_M  p[data-id="select_end_month"], .contact_form_4_M  p[data-id="select_end_year"], .contact_form_4_M  p[data-id="when_its_ready"]').appendTo(".contact_form_4_M  .end_date"), t(".blog_landing_M .et_pb_posts .et_pb_post  .post-meta, .blog_portrait_M .et_pb_posts .et_pb_post  .post-meta, .blog_circle_M .et_pb_posts .et_pb_post  .post-meta, .blog_no_images_M .et_pb_posts .et_pb_post  .post-meta, .blog-landing-image-reveal_M .et_pb_posts .et_pb_post  .post-meta").each(function () {
        if ("undefined" !== t(this).find("span.author")[0]) var e = t(this).find("span.author")[0];
        var i = t(this).find("span.published")[0],
            n = t(this).find('a[rel="category tag"]').toArray(),
            _ = t(this).find(".published").text(),
            a = _.replace(/\d+/g, ""),
            s = parseInt(_);
        if (9 >= s && (s = "0" + s), i = '<span class="published"><span class="day"> ' + s + '</span><span class="month"> ' + a + "</span></span>", n = t.map(n, function (t) {
                return t.outerHTML
            }), n = n.join(", "), e) {
            var o = "Posted " + e.outerHTML + " / ";
            o += i, o += "<span class='categories'>" + n + "</span>"
        } else {
            var o = i;
            o += "<span class='categories'>" + n + "</span>"
        }
        t(this).html(o)
    }), t.fn.succinct = function (e) {
        var i = t.extend({size: 240, omission: "...", ignore: !0}, e);
        return this.each(function () {
            var e, n, _ = t(this),
                a = /[!-\/:-@\[-`{-~]$/,
                s = function () {
                    _.each(function () {
                        e = t(this).html(), e.length > i.size && (n = t.trim(e).substring(0, i.size).split(" ").slice(0, -1).join(" "), i.ignore && (n = n.replace(a, "")), t(this).html(n + i.omission))
                    })
                };
            s()
        })
    }, t("#page-container .blog-landing-image-reveal_M .entry-title a").succinct({size: 67}), t(".blog_landing_M .entry-title a").succinct({size: 67}), t(".blog_portrait_M .entry-title a").succinct({size: 67}), t(".blog_no_images_M .post-content p").succinct({size: 150}), t(".blog_no_images_M .entry-title a").succinct({size: 67}), t(".blog_circle_M .entry-title a").succinct({size: 80}), setTimeout(function () {
        t("article.et_pb_post").each(function () {
            var e = t(this).find(".entry-featured-image-url").height(),
                i = t(this).find(".entry-featured-image-url img").height();
            e > i && t(this).find(".entry-featured-image-url").addClass("smallheight")
        })
    }, 1e3), setTimeout(function () {
        var e = 0,
            i = 0;
        t("#page-container .blog-landing-image-reveal_M article").each(function () {
            var n = t(this).height(),
                _ = t(this).find(".entry-title").height();
            n > e && (e = n), _ > i && (i = _)
        }), t("#page-container .blog-landing-image-reveal_M article .entry-title").height(i), t("#page-container .blog-landing-image-reveal_M article").height(e)
    }, 1e3), t(window).resize(function () {
        t("#page-container .blog-landing-image-reveal_M article").css("height", "auto")
    });

}(jQuery);
jQuery(".circle-blog .et_pb_post").each(function () {
    var e = jQuery(this).find(".entry-featured-image-url").attr("href");
    jQuery(this).wrap("<a href='" + e + "' class='newa'></a>")
});
!function (t) {
    t(".content_10_M .et_pb_row").on("click touchend", function () {
        thisalink = t(this).find(".et_pb_image a").attr("href"), thisatarget = t(this).find(".et_pb_image a").attr("target"), thisalink && ("_blank" === thisatarget ? window.open(thisalink, "_blank") : window.location.href = thisalink)
    })
}(jQuery);

(function ($) {
    // Slider Module only for Slider 1

    setTimeout(function () {
        $('.slider_1_M .et_pb_slide').each(function () {
            var imgSrc = $(this).css('background-image');
            imgSrc = imgSrc.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            $('<img src=" ' + imgSrc + ' ">').insertBefore($(this).find('.et_pb_container'));
            $(this).css('background-image', 'none');
        });
    }, 500);


    $('.slider_1_M .et_pb_slide .et_pb_slide_description').on('click', function () {
        var descLink = $(this).find('a.et_pb_button').attr('href');
        if (descLink) {
            window.location.href = descLink;
        }
    });

// Slider Module only for Slider 2
    setTimeout(function () {
        $('.slider_2_M').css('display', 'block')
    }, 1000);

    setTimeout(function () {
        //Slide Sizes
        var windowWidth = "";
        var slideItemWidth = "";
        var slideItemCount = "";
        var margRight = "";
        //Adding Title in controls

        $('.slider_2_M').each(function () {
            var classCount = "1";

            $(this).find('.et_pb_slide').each(function () {

                var attrText = $(this).find('.et_pb_slide_description h2').text();
                $(this).parent().parent().find('.et-pb-controllers a:nth-child(' + classCount + ')').attr('text', attrText);

                classCount++;
            });
        });
        $('.slider_2_M ').each(function () {
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


        //Slider Slide

        $('.slider_2_M .et-pb-controllers a').on('click', function () {
            $(this).parent().parent().find('.et_pb_slides').removeClass('active_slider')
            $(this).parent().parent().find('.et_pb_slides').addClass('active_slider')
            setTimeout(function () {
                prevEl = $(this).parent().parent().find('.active_slider .et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                slideSize = slideItemWidth * prevEl - margRight;
                $(this).parent().parent().find('.active_slider').css('margin-left', -slideSize);
            }, 100)

        });

        $('.slider_2_M .et_pb_slides').removeClass('active_slider')
        $('.slider_2_M .et_pb_slides').addClass('active_slider')
        setInterval(function () {
            $('.slider_2_M').each(function () {
                prevEl = $(this).find('.active_slider .et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                slideSize = slideItemWidth * prevEl - margRight;
                $(this).find('.active_slider').css('margin-left', -slideSize);
            })

        }, 100)




    }, 1000);


    // End Slider Module only for Slider 2


    //Blurb 8

    if ($(window).width() <= 981) {
        $('.blurb_8_M  .et_pb_row').each(function () {
            $(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.image')).insertBefore($(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.title')));
        })

    }

    $(window).resize(function () {
        if ($(window).width() >= 981) {
            $('.blurb_8_M  .et_pb_row').each(function () {
                $(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.image')).insertAfter($(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.text')));
            })
        } else {
            $('.blurb_8_M  .et_pb_row').each(function () {
                $(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.image')).insertBefore($(this).find($('.et_pb_column_1_3:nth-child(2) .et_pb_blurb.title')));
            })
        }
    });


    // Slider Module only for Slider 3


    var slideItemsCount = "";
    $('.slider_3_M .et_pb_slides').each(function () {
        slideItemsCount = $(this).find('.et_pb_slide').length;

    });

    setTimeout(function () {
        $('<div class="slide_count"><span class="current">01</span>/<span>0' + slideItemsCount + '</span></div>').insertBefore('.slider_3_M .et-pb-slider-arrows .et-pb-arrow-prev');

        $('.slider_3_M .et-pb-slider-arrows a').on('click', function () {
            setTimeout(function () {
                var prevElAc = $('.slider_3_M .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                $('.slider_3_M .slide_count .current').text('0' + prevElAc + '');
            }, 500);
        });
    }, 2000);


    setInterval(function () {
        if ($('.slider_3_M .et_pb_slider ').hasClass('et_slider_auto')) {
            //console.log('slide');
            var prevElAc = $('.slider_3_M .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

            $('.slider_3_M .slide_count .current').text('0' + prevElAc + '');
        }
    }, 200);

     setInterval(function () {
        if ($('.slider_3_M .et_pb_slider ').hasClass('et_slider_auto')) {
           // console.log('slide');
            var prevElAc = $('.slider_3_M .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

            $('.slider_3_M .slide_count .current').text('0' + prevElAc + '');
        }
    }, 200)

    // End Slider Module only for Slider 3


    // clear the placeholder on click

    $('input,textarea').focus(function () {
        if ($(this).attr('placeholder') !== '') {
            $(this).attr('data-placeholder', $(this).attr('placeholder'));

            $(this).attr('placeholder', '');
        }
    });
    $('input,textarea').blur(function () {
        if ($(this).attr('placeholder') === '') {
            $(this).attr('placeholder', $(this).attr('data-placeholder'));
        }
    });

    // click for blurbs 9
    $('.blurb_9_M .et_pb_blurb, .blurbs_4_M .et_pb_blurb').on('click', function () {

        var blurbPageLink = $(this).find('.et_pb_blurb_content a').attr('href');
        var blurbPageLinkTarget = $(this).find('.et_pb_blurb_content a').attr('target');

        if (blurbPageLink) {
            if (blurbPageLinkTarget) {
                window.open(
                    blurbPageLink,
                    '_blank'
                );
            } else window.location.href = blurbPageLink;
        }
    });


    if ($(window).width() <= 767) {
        $('.content_10_M .et_pb_row ').each(function () {
            $(this).find('.column_text').insertAfter($(this).find('.column_image '));
        })

    }

    $(window).resize(function () {
        if ($(window).width() <= 767) {
            $('.content_10_M .et_pb_row ').each(function () {
                $(this).find('.column_text').insertAfter($(this).find('.column_image '));
            })
        } else {
            $('.content_10_M .et_pb_row ').each(function () {
                $(this).find('.column_text').insertBefore($(this).find('.column_image '));
            })
        }
    });


    // blog pagination
    function unicornReloadBlog() {
        $('.blog_landing_M .et_pb_posts .et_pb_post  .post-meta, .blog_portrait_M .et_pb_posts .et_pb_post  .post-meta, .blog_circle_M .et_pb_posts .et_pb_post  .post-meta, .blog_no_images_M .et_pb_posts .et_pb_post  .post-meta, .blog-landing-image-reveal_M .et_pb_posts .et_pb_post  .post-meta').each(function () {
            var author = $(this).find('span.author')[0];
            var date = $(this).find('span.published')[0];
            var categories = $(this).find('a[rel="category tag"]').toArray();

            var dateDay = $(this).find('.published').text();
            var month = dateDay.replace(/\d+/g, '');
            var day = parseInt(dateDay);

            if (day <= 9) {
                day = '0' + day;
            }

            date = '<span class="published"><span class="day"> ' + day + '</span><span class="month"> ' + month + '</span></span>';

            categories = $.map(categories, function (element) {
                return element.outerHTML;
            });

            categories = categories.join(', ');

            if (author) var html = 'Posted ' + author.outerHTML + ' / ';
            else var html = "";


            html += date;

            html += "<span class='categories'>" + categories + "</span>";

            $(this).html(html);
        });

        $('.blog_no_images_M  article.et_pb_post, .blog_landing_M article.et_pb_post').each(function () {

            if ($(this).find($('.post_info')).length === 0) {
                $('<div class="post_info"></div>').appendTo($(this));
            }

            $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
            $(this).find('.post-meta').appendTo($(this).find('.post_info'));
            $(this).find('.post-content').appendTo($(this).find('.post_info'));
        });
    }

    if($('body').hasClass('et-fb')) {
        setTimeout(function () {
            unicornReloadBlog();

            $(".person3_M  .et_pb_column_1_2 .et_pb_team_member").hover(function () {
                $(".person3_M  .et_pb_column_1_2 .et_pb_team_member").addClass("noHover"), $(this).addClass("hover")
            }, function () {
                $(".person3_M  .et_pb_column_1_2 .et_pb_team_member").removeClass("noHover"), $(this).removeClass("hover")
            });



            $(".mask_2_M a.et_pb_button.read-our-news ").on("click", function (e) {
                e.preventDefault();
                    $("html").addClass("clicked");
                        $("body").addClass("clicked_mask").addClass("unclicked_mask");
                            setTimeout(function () {
                    $("body").removeClass("unclicked_mask");
                }, 800)
            })
             $(".mask_2_M a.et_pb_button.close_button").on("click", function (e) {
                e.preventDefault();
                $("html").removeClass("clicked");
                    $("body").removeClass("clicked_mask").addClass("unclicked_mask");
                var i = $(".mask_2_M").offset();
                $(document).scrollTop(i.top);
                    setTimeout(function () {
                    $("body").removeClass("unclicked_mask")
                }, 800)
            }), $(".mask_1_M a.et_pb_button.team_button ").on("click", function (e) {
                e.preventDefault(), $("html").addClass("clicked_mask_1"), $("body").addClass("clicked_button");
                var i = $(this).attr("href");
                setTimeou$(function () {
                    window.location.href = i
                }, 1e3), $("body").hasClass("safari") && setTimeou$(function () {
                    $("body").removeClass("clicked_button")
                }, 2e3)
            }), $.easing.smoothmove = function (t, e, i, n, _) {
                return -n * (e /= _) * (e - 2) + i
            };
        }, 10000);
    }

    var refreshUniBlogonClick = null;

    $('body').on('click', '.et_pb_ajax_pagination_container .wp-pagenavi a,.et_pb_ajax_pagination_container .pagination a', function () {
        clearInterval(refreshUniBlogonClick);
        refreshUniBlogonClick = setInterval(unicornReloadBlog, 300);
    });

    $("body .video-popup a").click(function (event) {
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

    $('<div class="post_info"></div>').appendTo(".blog_no_images_M .et_pb_posts  .et_pb_post");
    $('<div class="post_info"></div>').appendTo(".blog_portrait_M .et_pb_posts  .et_pb_post");
    $('<div class="post_info"></div>').appendTo(".blog_circle_M .et_pb_posts  .et_pb_post");
    $('<div class="post_info"></div>').appendTo(".blog_landing_M  .et_pb_posts  .et_pb_post");
    $(".blog_no_images_M .et_pb_posts  .et_pb_post, .blog_portrait_M .et_pb_posts  .et_pb_post, .blog_circle_M .et_pb_posts  .et_pb_post, .blog_landing_M  .et_pb_posts  .et_pb_post ").each(function () {
        $(this).find("h2.entry-title").appendTo($(this).find(".post_info"));
        $(this).find(".post-meta").appendTo($(this).find(".post_info"));
        $(this).find(".post-content").appendTo($(this).find(".post_info"))
    }),


//    3 Column Reveal Contact Form Capcha

    $('.contact_form_1_M .et_contact_bottom_container .et_pb_contact_right').insertBefore('.contact_form_1_M .et_contact_bottom_container');
    $('.contact_form_2_M .et_contact_bottom_container .et_pb_contact_right').insertBefore('.contact_form_2_M .et_contact_bottom_container');
    $('.contact_form_3_M .et_contact_bottom_container .et_pb_contact_right').insertBefore('.contact_form_3_M .et_contact_bottom_container');
    $('.contact_form_4_M .et_contact_bottom_container .et_pb_contact_right').insertBefore('.contact_form_4_M .et_contact_bottom_container');

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);


    var timeOutblurb1m = 0;

    if($('body').hasClass('et-fb')){
        timeOutblurb1m = 8000;
    }
    var thisBlurb;
    setTimeout(function () {
        $(".blurbs_1_M .et_pb_blurb ").hover(

            function () {
                thisBlurb = $(this);
            setTimeout(function () {
                thisBlurb.addClass("hover")
            },50)

        }, function () {
            setTimeout(function () {
                thisBlurb.removeClass("hover")
            },50)
        }
        )
    }, timeOutblurb1m);


    var timeOutcontent14M = 0;

    if($('body').hasClass('et-fb')){
        timeOutcontent14M = 8000;
    }
    var thisBlurb;
    setTimeout(function () {
    $(".content_14_M .et_pb_blurb").each(function (e) {
        var i = $(this).find(".et_pb_main_blurb_image img").attr("src");
        $(this).find(".et_pb_blurb_container h4").css({background: "url(" + i + ")"})
    })

    $(".content_14_M .et_pb_blurb").on("mousemove", function (e) {
        var i = $(this).offset();
        $(this).find("h4").animate({
            "background-position-x": -(e.pageX - i.left),
            "background-position-y": -(e.pageY - i.top)
        }, {queue: !1, duration: 200, easing: "smoothmove"})
    })
    },timeOutcontent14M)

})(jQuery);