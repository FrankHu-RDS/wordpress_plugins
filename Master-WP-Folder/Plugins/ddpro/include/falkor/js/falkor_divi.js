! function(a) {
    "use strict";
    a.fn.succinct = function(b) {
        var c = a.extend({ size: 240, omission: "...", ignore: !0 }, b);
        return this.each(function() {
            var b, d, e = a(this),
                f = /[!-\/:-@\[-`{-~]$/,
                g = function() {
                    e.each(function() {
                        b = a(this).html(), b.length > c.size && (d = a.trim(b).substring(0, c.size).split(" ").slice(0, -1).join(" "), c.ignore && (d = d.replace(f, "")), a(this).html(d + c.omission))
                    })
                };
            g()
        })
    }
}(jQuery);

(function($) { //            Blogs
    const { __, _x, _n, _nx } = wp.i18n;

    $('.et_pb_section.falkor_blog article.et_pb_post, .et_pb_section.falkor_blog_page_content article.et_pb_post, .et_pb_section.falkor_blog_3 article.et_pb_post, .et_pb_section.falkor_blog_4 article.et_pb_post').on('click', function() {
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



    $('.falkor_blog_5  .et_pb_post  .post-meta').each(function() {
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

        categories = $.map(categories, function(element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = 'By ' + author.outerHTML + ' | ';
        html += date;

        html += "<span class='categories'>" + categories + "</span>";

        $(this).html(html);
    });

    $('.falkor_blog_5 .et_pb_post .post-content p').each(function() {
        $(this).succinct({
            size: 90
        });
    });

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);

    //            GF



    $('.gform_wrapper form .gform_body .gform_fields > li').each(function() {
        var thisLi = $(this);
        $(this).find('input, textarea').focus(function() {
            thisLi.addClass("focus");
        });

        $(this).find('input, textarea').blur(function() {
            if ($(this).val()) {
                thisLi.addClass("filled");
            } else {
                thisLi.removeClass("filled");
            }
            thisLi.removeClass("focus");
        });
    });


    //            For only Subscribe2 form
    $(' .form_2 .gform_wrapper form .gform_body .gform_fields > li input').focus(function() {
        $(".form_2  form").addClass("focus-cont");
    });

    $('.form_2 .gform_wrapper form .gform_body .gform_fields > li input').blur(function() {
        if ($(this).val()) {
            $(".form_2  form").addClass("filled-cont");
        } else {
            $(".form_2  form").removeClass("filled-cont");
        }
        $(".form_2  form").removeClass("focus-cont");
    });


    //            Submit button for Form 1

    $(function() {

        $(".form_1 .gform_footer ").click(function() {
            if (!$(".form_1 .gform_footer ").hasClass('processed')) {
                $(this).addClass("onclic", 250, validate());
            }
        });

        function validate() {
            if (!$(".form_1 .gform_footer ").hasClass('processed')) {
                setTimeout(function() {

                    $(".form_1 .gform_footer ").removeClass("onclic");
                    $(".form_1 .gform_footer ").addClass("validate", 450, callback());
                    $(".form_1 .gform_footer ").addClass("processed");
                }, 2000);
            }
        }

        function callback() {

            setTimeout(function() {
                $(".form_1 .gform_footer .gform_button").trigger("click");
            }, 200);

        }
    });


    //            Submit button for Form 2

    $(function() {

        $(".form_2 .gform_footer ").click(function() {
            if (!$(".form_2 .gform_footer ").hasClass('processed')) {
                $(this).addClass("onclic", 250, validate());
            }
        });

        function validate() {
            if (!$(".form_2 .gform_footer ").hasClass('processed')) {
                setTimeout(function() {

                    $(".form_2 .gform_footer ").removeClass("onclic");
                    $(".form_2 .gform_footer ").addClass("validate", 450, callback());
                    $(".form_2 .gform_footer ").addClass("processed");
                }, 2000);
            }
        }

        function callback() {

            setTimeout(function() {
                $(".form_2 .gform_footer .gform_button").trigger("click");
            }, 200);

        }
    });

    //            Submit button for Form 3


    $(function() {
        $('.form_3 .gform_footer').on('click', function() {
            if (!$(".form_3 .gform_footer ").hasClass('processed')) {
                $(this).addClass('bar');
                $(this).addClass("processed");
            }

            setTimeout(function() {
                $('.form_3 .gform_footer').removeClass('bar');
                $('.form_3 .gform_footer').addClass('done', 450, callback());

            }, 1500);

            function callback() {

                setTimeout(function() {
                    $(".form_3 .gform_footer .gform_button").trigger("click");
                }, 500);

            }
        });


    });


    //            Submit button for Form 4

    $(function() {

        $(".form_4 .gform_footer ").click(function() {
            if (!$(".form_4 .gform_footer ").hasClass('processed')) {
                $(this).addClass("onclic", 250, validate());
            }
        });

        function validate() {
            if (!$(".form_4 .gform_footer ").hasClass('processed')) {
                setTimeout(function() {

                    $(".form_4 .gform_footer ").removeClass("onclic");
                    $(".form_4 .gform_footer ").addClass("validate", 450, callback());
                    $(".form_4 .gform_footer ").addClass("processed");
                }, 2000);
            }
        }

        function callback() {

            setTimeout(function() {
                $(".form_4 .gform_footer .gform_button").trigger("click");
            }, 200);

        }
    });


    //            Submit button for Form 5

    $(function() {
        $('.form_5 .gform_footer').on('click', function() {
            if (!$(".form_5 .gform_footer ").hasClass('processed')) {
                $(this).addClass('active');
                $(this).addClass("processed");
            }

            setTimeout(function() {
                $(".form_5 .gform_footer .gform_button").trigger("click");
            }, 1000);
        });
    });

    //            Submit button for Form 6

    $(function() {
        $('.form_6 .gform_footer').click(function(e) {
            if (!$(".form_6 .gform_footer ").hasClass('processed')) {
                $(this).addClass('dark');

                var x = e.pageX + 'px';
                var y = e.pageY + 'px';
                var img = $('<div class="blip"></div>');
                var div = $('<div class="blip"></div>');
                div.append(img);
                $('.form_6 .gform_footer').append(div);
                $(".form_6 .gform_footer ").addClass("processed");
            }
            setTimeout(function() {
                $('.form_6 .gform_footer').removeClass('dark');
                $('.form_6 .gform_footer').addClass('done', 450, callback());

            }, 1500);

            function callback() {

                setTimeout(function() {
                    $(".form_6 .gform_footer .gform_button").trigger("click");
                }, 200);

            }
        });

    });

    //            Submit button for Form 7

    $(function() {
        $(".form_7 .gform_footer ").click(function() {
            if (!$(".form_7 .gform_footer ").hasClass('processed')) {
                $(this).addClass("onclic", 250, validate());
            }
        });

        function validate() {
            if (!$(".form_7 .gform_footer ").hasClass('processed')) {
                setTimeout(function() {

                    $(".form_7 .gform_footer ").removeClass("onclic");
                    $(".form_7 .gform_footer ").addClass("validate", 450, callback());
                    $(".form_7 .gform_footer ").addClass("processed");
                }, 2000);
            }
        }

        function callback() {

            setTimeout(function() {
                $(".form_7 .gform_footer .gform_button").trigger("click");
            }, 200);

        }

    });


    //            Contact Forms


    // $('.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function() {
    //     $(this).find('textarea').insertBefore($(this).find('label'));
    //     $(this).find('input').insertBefore($(this).find('label'));
    // });


    var formsDelay = 0;
    if ($('body').hasClass('et-fb')) {
        formsDelay = 8000;
    }


    setTimeout(function () {

        $('body.et-fb .contact_1_falkor textarea[data-original_id="message"]').parent().attr('data-id', 'message')

    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function() {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function() {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });
    },formsDelay)

    //            Form mermaid contact form 1


    var optText = $('.contact_form_1 .et_pb_contact_field[data-type="select"] select option:first-child').text();
    var finalOptText = optText.replace(/\-/g, ' ').replace(/\ /g, ' ');
    $('.contact_form_1 .et_pb_contact_field[data-type="select"] select option:first-child').text(finalOptText);

    $('<span class="price">$</span>').insertBefore($('.contact_form_1 p.et_pb_contact_field[data-id="price"] input'));


    //            Form mermaid contact form 4


    $(' .contact_form_4 .et_pb_contact_form  p[data-id="type_of_project"] .et_pb_contact_field_radio, .contact_form_4 .et_pb_contact_form  p[data-id="price"] .et_pb_contact_field_radio').on('click', function() {
        if ($(this).hasClass('clicked')) {

        } else {
            $(this).parent('.et_pb_contact_field_radio_list').find('.et_pb_contact_field_radio').removeClass('clicked');
            $(this).addClass('clicked');
        }
    });


    $('<div class="details"></div>').insertBefore('.contact_form_4 form p[data-id="type_of_project"]');
    $('<div class="start_date"></div>').insertAfter('.contact_form_4 form p[data-id="type_of_project"]');
    $('<div class="end_date"></div>').insertBefore('.contact_form_4 form p[data-id="price"]');

    $('.contact_form_4 p[data-id="name"], .contact_form_4 p[data-id="email"], .contact_form_4 p[data-id="phone"]').appendTo('.contact_form_4 .details');
    $('.contact_form_4 p[data-id="select_month"], .contact_form_4 p[data-id="select_year"], .contact_form_4 p[data-id="no_big_rsuh"]').appendTo('.contact_form_4 .start_date');
    $('.contact_form_4 p[data-id="select_end_month"], .contact_form_4 p[data-id="select_end_year"], .contact_form_4 p[data-id="when_its_ready"]').appendTo('.contact_form_4 .end_date');


    //            For button Unique first

    $('.button_unique').each(function() {
        $(this).parent('.et_pb_button_module_wrapper').addClass('button_unique_wrapper');
    });


    //            For blurb 8

    if ($(window).width() >= 981) {
        $('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_main_blurb_image').insertAfter($('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_blurb_container'))
    }

    $(window).resize(function() {
        if ($(window).width() >= 981) {
            $('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_main_blurb_image').insertAfter($('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_blurb_container'))
        } else {
            $('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_main_blurb_image').insertBefore($('.blurb_8 .et_pb_column_1_3:nth-child(2) .et_pb_blurb_container'))
        }
    });


    $(".team3 .et_pb_column_1_2 .et_pb_team_member  ").hover(function() {
        $(".team3 .et_pb_column_1_2 .et_pb_team_member  ").addClass("noHover");
        $(this).addClass("hover");
    }, function() {
        $(".team3 .et_pb_column_1_2 .et_pb_team_member  ").removeClass("noHover");
        $(this).removeClass("hover");
    });


    var blurb10Delay = 0;
    if ($('body').hasClass('et-fb')) {
        blurb10Delay = 8000;
    }

    setTimeout(function () {
        $(".blurb_10_f .et_pb_column .et_pb_blurb").hover(function () {
            setTimeout(function () {
                $(".blurb_10_f .et_pb_column .et_pb_blurb").addClass("noHover");
                $(this).addClass("hover")
            },200)

        }, function () {
            setTimeout(function () {
            $(".blurb_10_f .et_pb_column .et_pb_blurb").removeClass("noHover");
            $(this).removeClass("hover")
            },200)
        });
    },blurb10Delay)




    //            Slider Module

    $('.slider_1 .et_pb_slide').each(function() {
        var imgSrc = $(this).css('background-image');
        imgSrc = imgSrc.replace('url(', '').replace(')', '').replace(/\"/gi, "");

        $('<img src=" ' + imgSrc + ' ">').insertBefore($(this).find('.et_pb_container'));
        $(this).css('background-image', 'none');
    });


    $('.slider_1 .et_pb_slide .et_pb_slide_description').on('click', function() {
        var descLink = $(this).find('a.et_pb_button').attr('href');
        if (descLink) {
            window.location.href = descLink;
        }

    });

    //    Form Accordion Search Submit Button

    $('.accordion_2 .et_pb_column_1_3 .et_pb_searchform .et_pb_searchsubmit').val('U');


    //Animation for blurb 1


    $(".blurbs_1 .et_pb_blurb ").hover(
        function() {
            $(this).addClass("hover");
        },
        function() {
            $(this).removeClass("hover");
        }
    );


    //            Adding Class in scroll

    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    setTimeout(function(){

    $('.falkor.et_pb_section:not(.header_2_f)').each(function() {

        if ($(this).isInViewport()) {

            $(this).addClass('view_port');

        } else {
            $(this).removeClass('view_port');
        }

    });
     }, 100);

    $(window).on('resize scroll', function() {
        $('.falkor.et_pb_section:not(.header_2_f):not(.blurb_2_f )').each(function() {
            if ($(this).isInViewport()) {
                $(this).addClass('view_port');
            } else {
                $(this).removeClass('view_port');
            }
        });
    });

    $(window).on('resize scroll', function() {
        $('.falkor.et_pb_section.header_2_f').each(function() {
            if ($(this).isInViewport()) {
                $(this).addClass('view_port');
            }
        });
        $('.falkor.et_pb_section.blurb_2_f').each(function() {
            if ($(this).isInViewport()) {
                $(this).addClass('view_port');
            }
        });
    });


    //            For Blog titles and excerpts


    $.fn.succinct = function(options) {

        var settings = $.extend({
            size: 240,
            omission: '...',
            ignore: true
        }, options);

        return this.each(function() {

            var textDefault,
                textTruncated,
                elements = $(this),
                regex = /[!-\/:-@\[-`{-~]$/,
                init = function() {
                    elements.each(function() {
                        textDefault = $(this).html();

                        if (textDefault.length > settings.size) {
                            textTruncated = $.trim(textDefault)
                                .substring(0, settings.size)
                                .split(' ')
                                .slice(0, -1)
                                .join(' ');

                            if (settings.ignore) {
                                textTruncated = textTruncated.replace(regex, '');
                            }

                            $(this).html(textTruncated + settings.omission);
                        }
                    });
                };
            init();
        });
    };

    $('.footer_5_f .et_pb_posts .entry-title a').succinct({
        size: 35
    });

    // Parse html tags for titles

    var titlesDelay = 0;
    if ($('body').hasClass('et-fb')) {
        titlesDelay = 5000;
    }

    //  if ($('body').hasClass('et-fb')) {
    //      setInterval(parseHtmlTags, 1000);
    // }

    setTimeout(parseHtmlTags, titlesDelay);
    // setInterval(parseHtmlTagsVB, 500);

    function parseHtmlTagsVB() {
        parseHtmlTags();
    }

    $('input.et-fb-settings-option-input--block[type="text"]').keypress(function() {
        parseHtmlTagsVB();
    });


    // parseHtmlTags();

    function parseHtmlTags() {
        $('.et_pb_column h1, .et_pb_column h2, .et_pb_column h3, .et_pb_column h4, .et_pb_column h5, .et_pb_column h6').each(function() {
            falkor_title = $(this).html();
            falkor_title_new = falkor_title.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
            $(this).html(falkor_title_new);
        });
    }



    // Newsletter Form

    $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"])').each(function() {
        $(this).find('input').insertBefore($(this).find('label'));
        $(this).find('label[for="et_pb_signup_lastname"]').each(function() {
            $(this).text(__("Surname", 'ddpro'));
        });
        $(this).find('label[for="et_pb_signup_firstname"]').each(function() {
            if ($(this).prev().attr('placeholder') === __('Last Name', 'ddpro')) {
                $(this).text(__("Surname", 'ddpro'));
            } else $(this).text(__("Name", 'ddpro'));
        });

        $(this).find('input.et_pb_signup_firstname').required = false;
    });

    setTimeout(function () {
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
},formsDelay)

    //    Aweber Form

    $('.form_2 .et_pb_newsletter .et_pb_newsletter_form > input[name="et_pb_signup_provider"]').each(function() {
        if ($(this).attr('value') === 'aweber') {
            $(this).parent('.et_pb_newsletter_form').addClass('aweber_form');
        }
    });

    // Headers

    // video pop-up
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

    $("body .video-popup h4 a").click(function (e) {
        e.preventDefault();
    });

    $("body .video-popup h4").click(function (e) {
        e.preventDefault();
        $(this).find("a").attr('href', '');
        $(this).closest('.et_pb_blurb_content').find(".et_pb_main_blurb_image a").click();
    });

    $("body .video-popup-cta a").click(function(event) {
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

    setTimeout(function() {
        $('.edge .footer_6_f .et_pb_newsletter').each(function() {
            $(this).find('input, textarea').attr('placeholder', '')
        });
    }, 5000);

    //        Portfolio Slider


    if ($('.portfolio_slider').length > 0) {
        var showSlideritems = 3;
        var slideSliderItemsCount = 2;
        var slideInterval = 8000;


        if ($(document).width() <= "767") {
            showSlideritems = 2;
            slideSliderItemsCount = 1;
        } else if ($(document).width() <= "481") {
            showSlideritems = 1;
            slideSliderItemsCount = 1;
        }
        $('.portfolio_slider .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:first-child,.portfolio_slider .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:nth-child(2)').clone().insertAfter('.portfolio_slider .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:last-child');
        setTimeout(function() {
            var slideItemsCount = $('.portfolio_slider .et_pb_gallery_items   .et_pb_gallery_item ').length;
            var slideInnerWidth = $(document).width();
            $('.portfolio_slider .et_pb_gallery_items   .et_pb_gallery_item ').css("cssText", "width: " + Math.floor(slideInnerWidth / showSlideritems) + "px !important;");
            var slideItemswidth = $('.portfolio_slider .et_pb_gallery_items   .et_pb_gallery_item ')[0].getBoundingClientRect().width;
            var slideWidth = slideItemsCount * slideItemswidth;


            $('.portfolio_slider .et_pb_gallery').css("cssText", "width:" + slideInnerWidth + "px !important;");
            $('.portfolio_slider .et_pb_gallery  .et_pb_gallery_items  ').css("cssText", "width: " + slideWidth + "px !important;");

            $('.portfolio_slider .et_pb_gallery .et_pb_gallery_items').css('margin-left', -(slideItemswidth / 2));


            $('<div class="slide-controllers"></div>').appendTo('.portfolio_slider .et_pb_gallery');

            var dotsCount = slideItemsCount / slideSliderItemsCount;
            for (var i = 0; i < dotsCount - 1; i++) {
                $('<a class="dot dot-' + i + '">' + i + '</a>').appendTo('.portfolio_slider .slide-controllers');
            }

            $('.slide-controllers a:first-child').addClass('active');
            $('.slide-controllers a').on('click', function() {
                $('.slide-controllers a').removeClass('active');
                $(this).addClass('active');
                var translateLeftSize = $(this).text();
                var translateLeft = translateLeftSize * slideSliderItemsCount;
                var translate = -(translateLeft * slideItemswidth);
                $('.portfolio_slider .et_pb_gallery .et_pb_gallery_items ').css({ "transform": "translate3d(" + translate + "px, 0px, 0px)" });

            });
        }, 1000);


        //        Auto rotate

        $(function() {
            var timer = setInterval(SlideItems, slideInterval);

            function SlideItems() {
                if ($("a.dot.active").next().length !== 0) {
                    $("a.dot.active").next().trigger("click");
                } else {
                    $("a.dot:first-child").trigger("click");
                }
            }
        });
    }


    //        Portfolio Slider End


    //            Blurbs Link

    // $('body .et_pb_section:not(.blurb_12_f):not(.flipcards-section) .et_pb_blurb:not(.video-popup)').each(function() {
    //     var headLink = $(this).find('h4 a').attr('href');
    //     var headLink2 = $(this).find('.et_pb_main_blurb_image a').attr('href');
    //     if (headLink) {
    //         $(this).css("cssText", "cursor: pointer !important;");
    //     } else if (headLink2) {
    //         $(this).css("cssText", "cursor: pointer !important;");
    //     } else {
    //         $(this).css("cssText", "cursor: unset !important;");
    //     }
    // });
    //
    // $('body .et_pb_blurb:not(.video-popup)').on('click', function(e) {
    //     var pageLink = $(this).find('h4 > a').attr('href');
    //     if(pageLink) {var thisPageLinkTarget = $(this).find('h4 > a').attr('target'); }
    //     if(!pageLink) {pageLink = $(this).find('.et_pb_main_blurb_image a').attr('href');
    //     var thisPageLinkTarget = $(this).find('.et_pb_main_blurb_image a').attr('target');}
    //     // console.log('pageLink ' + pageLink);
    //     // console.log('thisPageLinkTarget' + thisPageLinkTarget);
    //     if (pageLink) {
    //         e.preventDefault();
    //         if (thisPageLinkTarget) {
    //             window.open(
    //                 pageLink,
    //                 '_blank'
    //             );
    //         } else window.location.href = pageLink;
    //     }
    // });



    //            Blurb 12
    var blurb12Delay = 0;
    if ($('body').hasClass('et-fb')) {
        blurb12Delay = 8000;
    }

    setTimeout(function () {
    if ($('.blurb_12_f').length !== 0) {


        $('<div class="close_button"></div>').appendTo($('.blurb_12_f .et_pb_row:last-child .et_pb_blurb'));
        $('<div class="close_button"></div>').appendTo($('.blurb_12_f .et_pb_row.et-last-child .et_pb_blurb'));
        $('.blurb_12_f .et_pb_row:last-child .et_pb_blurb .et_pb_main_blurb_image').each(function() {
            var bgUrl = $(this).find('img').attr('src');
            $(this).css('background-image', 'url(' + bgUrl + ')');
            $(this).find('img').remove();
        });

        $('.blurb_12_f .et_pb_row.et-last-child .et_pb_blurb .et_pb_main_blurb_image').each(function() {
            var bgUrl = $(this).find('img').attr('src');
            $(this).css('background-image', 'url(' + bgUrl + ')');
            $(this).find('img').remove();
        });


        var $cont = document.querySelector('.blurb_12_f .et_pb_row:last-child');
        var $elsArr = [].slice.call(document.querySelectorAll('.blurb_12_f .et_pb_row:last-child .et_pb_blurb'));
        var $closeBtnsArr = [].slice.call(document.querySelectorAll('.blurb_12_f .et_pb_row:last-child .et_pb_blurb .close_button'));

        if($('body').hasClass('et-fb')){
            $cont = document.querySelector('.blurb_12_f .et_pb_row.et-last-child');
            $elsArr = [].slice.call(document.querySelectorAll('.blurb_12_f .et_pb_row.et-last-child .et_pb_blurb'));
            $closeBtnsArr = [].slice.call(document.querySelectorAll('.blurb_12_f .et_pb_row.et-last-child .et_pb_blurb .close_button'));
        }

        setTimeout(function() {
            $cont.classList.remove('s--inactive');
        }, 200);

        $elsArr.forEach(function($el) {
            $el.addEventListener('click', function() {
                if (this.classList.contains('s--active')) return;
                $cont.classList.add('s--el-active');
                this.classList.add('s--active');
            });
        });

        $closeBtnsArr.forEach(function($btn) {
            $btn.addEventListener('click', function(e) {
                e.stopPropagation();
                $cont.classList.remove('s--el-active');
                document.querySelector('.et_pb_blurb.s--active').classList.remove('s--active');
            });
        });
    }
    },blurb12Delay);
    //            Falkor Team 3

    var person3Delay = 0;
    if ($('body').hasClass('et-fb')) {
        person3Delay = 8000;
    }

    setTimeout(function () {
        $('.person_3_f .et_pb_team_member').each(function () {
            $(this).find('p.et_pb_member_position').insertBefore($(this).find('h4.et_pb_module_header'));
        });
    },person3Delay)

    //            Falkor Slider
    var beforeText = 0;
    setTimeout(function() {
        $('.falkor_slider.falkor_slider_2 .et_pb_slider .et-pb-slider-arrows').clone().addClass('slide_arrows').insertAfter('.falkor_slider.falkor_slider_2 .et_pb_slider .et-pb-slider-arrows');
    }, 1000);

    function sliderFunction() {
        setTimeout(function() {
            $('.falkor_slider_1 .et_pb_slider').each(function() {
                var slideHeigth = $(this).find('.et_pb_slide').height();
                $(this).height(slideHeigth);
            });
        }, 400);
        setTimeout(function() {
            $('.falkor_slider .et-pb-controllers a').each(function() {
                var controlText = $(this).text();
                if (controlText.length === 1) {
                    $(this).text(beforeText + controlText);
                } else {
                    $(this).text(controlText);
                }
            });


            $('.falkor_slider_2 .et_pb_slider').each(function() {
                var slideContWidth = $(this).parent('.et_pb_column').width();
                var slideItemWidth = slideContWidth;
                var slideItemsCount = $(this).find('.et_pb_slide').length;
                $(this).width(slideItemWidth);
                $(this).find('.et_pb_slides').width(slideItemsCount * slideItemWidth);
                $(this).find('.et_pb_slide').width(slideContWidth);

            });


            var topSize = 0;
            if ($(window).width() < 480) {
                topSize = 28.5;
            } else {
                topSize = 41.5;
            }


            $('.falkor_slider_1 .et-pb-controllers a').on('click', function() {
                if ($(this).hasClass('active')) {

                } else {
                    var prevEl1 = $(this).prevAll().length;
                    var elHeight = $(this).height();
                    var controlsTop = prevEl1 * elHeight;

                    $('.falkor_slider_1 .et-pb-controllers').css('top', 'calc(' + topSize + '% - ' + controlsTop + 'px)');


                    $('.falkor_slider_1 .et-pb-controllers a').removeClass('active');
                    $(this).addClass('active');
                }


                setTimeout(function() {
                    $('.falkor_slider_1 .et_pb_slider').each(function() {
                        var fSlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var fPrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').height();
                        var fSlideMoveSize = fSlideSize * fPrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(0, -' + fSlideMoveSize + 'px)');
                    });
                }, 200);
            });

            $('.falkor_slider_1 .et-pb-slider-arrows a').on('click', function() {
                setTimeout(function() {
                    $('.falkor_slider_1 .et_pb_slider').each(function() {
                        var fSlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var fPrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').height();
                        var fSlideMoveSize = fSlideSize * fPrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(0, -' + fSlideMoveSize + 'px)');
                    });
                }, 200);
            });

             setInterval(function() {
                    $('.falkor_slider_1 .et_pb_slider').each(function() {
                        var fSlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var fPrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').height();
                        var fSlideMoveSize = fSlideSize * fPrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(0, -' + fSlideMoveSize + 'px)');
                    });
                }, 200);

            var slide2_top = 15;
            if ($(window).width() <= 767) {
                slide2_top = 35;
            }

            $('.falkor_slider_2 .et-pb-controllers a').on('click', function() {
                if ($(this).hasClass('active')) {

                } else {
                    var prevEl2 = $(this).prevAll().length;
                    var elwidth = $(this).width();
                    var controlsLeft = prevEl2 * elwidth;
                    $('.falkor_slider_2 .et-pb-controllers').css('left', 'calc(' + slide2_top + '% - ' + controlsLeft + 'px)');

                    $('.falkor_slider_2 .et-pb-controllers a').removeClass('active');
                    $(this).addClass('active');
                }


                setTimeout(function() {
                    $('.falkor_slider_2 .et_pb_slider').each(function() {
                        var f2SlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var f2PrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').width();
                        var f2SlideMoveSize = f2SlideSize * f2PrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(-' + f2SlideMoveSize + 'px, 0)');
                    });
                }, 200);
            });

            $('.falkor_slider_2 .et-pb-slider-arrows a').on('click', function() {
                setTimeout(function() {
                    $('.falkor_slider_2 .et_pb_slider').each(function() {
                        var f2SlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var f2PrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').width();
                        var f2SlideMoveSize = f2SlideSize * f2PrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(-' + f2SlideMoveSize + 'px, 0)');
                    });
                }, 200);
            });

            setInterval(function() {
                    $('.falkor_slider_2 .et_pb_slider').each(function() {
                        var f2SlideSize = $(this).find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                        var f2PrevElHeight = $(this).find('.et_pb_slide.et-pb-active-slide').width();
                        var f2SlideMoveSize = f2SlideSize * f2PrevElHeight;
                        $(this).find('.et_pb_slides').css('transform', 'translate(-' + f2SlideMoveSize + 'px, 0)');
                    });
                }, 200);

        }, 1000);
    }


    sliderFunction();


    $(window).resize(function() {
        sliderFunction();
    });


    //            Falkor Pricing Tabel

    $('.pricing_tabel_falkor .et_pb_pricing_table').each(function() {
        $(this).find('.et_pb_pricing_heading').insertAfter($(this).find('.et_pb_et_price'));
    });


    $('.falkor-pt2 .et_pb_pricing_table').each(function() {
        var priceFrequency = $(this).find('.et_pb_frequency').text().replace('/', '');
        $(this).find('.et_pb_frequency').text(priceFrequency);
    });


    //         Falkor Blog Slider

    $('#page-container .falkor_blog_4.falkor_home_blog_4 article .more-link').each(function() {
        $(this).text('More Details');
    });



    var blogTimeOut = 500;

    if ($('body').hasClass('et-fb')) {
        blogTimeOut = 5000;
    }

        setTimeout(function() {
            if ($('.blog_slider').length > 0) {
            $('.blog_slider .et_pb_slide').on('click', function(event) {
                var pageUrl = $(this).find('a.et_pb_more_button.et_pb_button').attr('href');
                if (pageUrl) {
                    event.preventDefault();
                    window.location.href = pageUrl;
                }
            });





            var showBlogSlideritems = 2.35;


            if ($(document).width() <= "767") {
                showBlogSlideritems = 2;
            }

            if ($(document).width() <= "481") {
                showBlogSlideritems = 1;
            }
            var slideItemsCount = $('.blog_slider.et_pb_slider .et_pb_slide').length;
            var slideInnerWidth = $('.falkor_blog .et_pb_column_2_3').width();
            $('.blog_slider.et_pb_slider .et_pb_slide').css("cssText", "width: " + Math.floor(slideInnerWidth / showBlogSlideritems) + "px !important;");
            var slideItemswidth = $('.blog_slider.et_pb_slider .et_pb_slide')[0].getBoundingClientRect().width;
            var slideWidth = slideItemsCount * slideItemswidth;

            $('.blog_slider.et_pb_slider .et_pb_slides').css("cssText", "width: " + slideWidth + "px !important;");

            $('.blog_slider .et-pb-slider-arrows a').on('click', function(event) {
                event.preventDefault();
                setTimeout(function() {
                    var sliderSlideSize1 = $('.blog_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var sliderSlideSize2 = sliderSlideSize1 * slideItemswidth;

                    if($(window).width() >= 482){
                        if ($('.blog_slider .et_pb_slide.et-pb-active-slide').nextAll().length !== 0) {
                            $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
                        } else {
                            $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + (sliderSlideSize2 - slideItemswidth) + 'px, 0)');
                        }
                    }else{
                        if ($('.blog_slider .et_pb_slide.et-pb-active-slide').nextAll().length >= 0) {
                            $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
                        } else {
                            $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + (sliderSlideSize2 - slideItemswidth) + 'px, 0)');
                        }
                    }

                }, 200)
            });

            if ($(document).width() > 767) {
                $(".falkor_blog  .et_pb_slider").mousemove(function(e) {

                    var parentOffset = $(this).parent().offset();

                    var relX = e.pageX - parentOffset.left;
                    var rightSize = slideInnerWidth - relX;
                    var sliderHoverSlideSize1 = $('.blog_slider .et_pb_slide.et-pb-active-slide').prevAll().length;
                    var sliderHoverSlideSize2 = sliderHoverSlideSize1 * slideItemswidth + (slideItemswidth * 0.65);
                    var sliderHoverSlideSize3 = sliderHoverSlideSize1 * slideItemswidth;
                    if (rightSize <= 30) {

                        if ($('.blog_slider .et_pb_slide.et-pb-active-slide').nextAll().length >= 2) {
                            $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderHoverSlideSize2 + 'px, 0)');

                        } else {
                            //                                    $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderHoverSlideSize3 + 'px, 0)');
                        }

                    }

                    if (relX <= 30) {
                        $('.blog_slider.et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderHoverSlideSize3 + 'px, 0)');
                    }
                });
            }

            }
        }, blogTimeOut);



    //        Falkor blog Slider End


    //           Falkor Blog Titles exept

    $('.falkor_blog .et_pb_post_slider .et_pb_slide_content > p:not(.post-meta)').each(function() {
        $(this).succinct({
            size: 70
        });
    });

    var blog3TimeOut = 500;

    if ($('body').hasClass('et-fb')) {
        blog3TimeOut = 5000;
    }
    setTimeout(function () {
    $('.falkor_blog_3 .et_pb_post .post-content p').each(function() {
        $(this).succinct({
            size: 80
        });
    });

    $('.falkor_blog_4 .et_pb_post .post-content p').each(function() {
        $(this).addClass('succinct_done');
        $(this).succinct({
            size: 55
        });
    });
    },blog3TimeOut)
    setInterval(function() {
        $('.falkor_blog_4 .et_pb_post .post-content p').each(function() {
            if (!$(this).hasClass('succinct_done')) {
                $(this).addClass('succinct_done');
                $(this).succinct({
                    size: 55
                });
            }

        });
    }, 200);
    setTimeout(function () {

        $('body.et-fb .falkor_blog_4 .et_pb_post').each(function() {
            $(this).find('a.more-link').appendTo($(this).find('.post-content'));
        })


    $('.falkor_blog_4 .et_pb_post, .falkor_blog_3 .et_pb_post').on('click', function(event) {
        var pageUrl = $(this).find('h2.entry-title a').attr('href');
        if (pageUrl) {
            event.preventDefault();
            window.location.href = pageUrl;
        }
    });


    //            Falkor Blog 3 bg Image


    $('.falkor_blog_3 article').each(function() {
        var bgImageSrc = $(this).find('a.entry-featured-image-url img').attr('src');
        $(this).css('background-image', 'url(' + bgImageSrc + ')');
    });
},blog3TimeOut)

    //            Falkor Blurbs Button

    var blurbs3TimeOut = 0;

    if ($('body').hasClass('et-fb')) {
        blurbs3TimeOut = 8000;
    }

    setTimeout(function () {

    $('.blurb_19_f .et_pb_column, .blurb_20_f .et_pb_column').each(function() {
        $(this).find('.et_pb_button_module_wrapper ').insertAfter($(this).find('.et_pb_blurb_description'));
    });

    $('.blurb_16_f .et_pb_column').each(function() {
        $(this).find('.et_pb_button_module_wrapper ').insertAfter($(this).find('.et_pb_blurb_description'));
    });
    },blurbs3TimeOut)

    //            Falkor Testimonials move content text


    $('.falkor-testimonial5 .et_pb_testimonial').each(function() {
        $(this).find('.et_pb_testimonial_description_inner p:not(.et_pb_testimonial_meta)').insertAfter($(this).find('.et_pb_testimonial_description_inner p.et_pb_testimonial_meta'));
    })


})(jQuery);