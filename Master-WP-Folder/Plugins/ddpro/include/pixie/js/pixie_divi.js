(function ($) {

    //            For Blog titles and excerpts
    $.fn.succinct = function (options) {

        var settings = $.extend({
            size: 240,
            omission: '...',
            ignore: true
        }, options);

        return this.each(function () {

            var textDefault,
                textTruncated,
                elements = $(this),
                regex = /[!-\/:-@\[-`{-~]$/,
                init = function () {
                    elements.each(function () {
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

    //            For pixie person 5

    setTimeout(function () {
        $('.pixie_person_5 .et_pb_team_member, .pixie_person_6 .et_pb_team_member').each(function () {
            var imageGif = $(this).css('background-image');
            $('<div class="image_back"></div>').insertAfter($(this).find('.et_pb_team_member_image img')).css('background-image', imageGif);
            $(this).css('background-image', 'none');
            $('.pixie_person_5, .pixie_person_6').css('opacity', 1)
        })
    }, 1500);

    setTimeout(function () {
        $('body.et-fb .pixie_person_5 .et_pb_team_member, body.et-fb .pixie_person_6 .et_pb_team_member').each(function () {
            var imageGif = $(this).css('background-image');
            $('<div class="image_back"></div>').insertAfter($(this).find('.et_pb_team_member_image img')).css('background-image', imageGif);
            $(this).css('background-image', 'none');
            $('.pixie_person_5, .pixie_person_6').css('opacity', 1)
        })
    }, 5000);


    //            For pixie person 7 hover

    $('.pixie_person_7 .et_pb_row:last-child .et_pb_column').mouseover(function () {
        //console.log('test');
    });

    $(".pixie_person_7 .et_pb_row:last-child .et_pb_column .et_pb_team_member").hover(
        function () {
            $(this).parent('.et_pb_column').addClass('hovered');
        },
        function () {
            $(this).parent('.et_pb_column').removeClass('hovered');
        }
    );


    //            For pixie blogs


    var blogDaley = 0;

    if ($('body').hasClass('et-fb')) {
        blogDaley = 5000;
    }



    setInterval(function () {


        $('.blog_1_pixie article, .blog_2_pixie article').each(function () {
            if (!$(this).hasClass('done')) {
                $('.blog_1_pixie .et_pb_ajax_pagination_container style').remove();
                $('.blog_2_pixie .et_pb_ajax_pagination_container style').remove();

                if( $('.author').length ){
                  var author = $(this).find('span.author')[0]; 
                }
                
                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="category tag"]').toArray();
                categories = $.map(categories, function (element) {
                    return element.outerHTML;
                });

                categories = categories.join(', ');

                var pieces = $(this).find('.post-meta').text().split(/[\s|]+/);
                var commentCount = pieces[pieces.length - 2];
                var commentText = pieces[pieces.length - 1];

                //console.log(pieces);
                //console.log(commentCount);
                //console.log(commentText);

                var comments = "<span class='comment'>" + commentCount + ' ' + commentText + "</span>";

               if( $('.author').length ){
                var autherComHtml = '<div class="bottom_box">' + author.outerHTML + comments + '</div>';
               }

                var html = "<span class='categories'>" + categories + "</span>";
                html += ' // ' + date.outerHTML;
                
                if( $('.author').length ){
                html += autherComHtml;
                }

                $(this).find('.post-meta').html(html);

                $(this).addClass('done');
            }

        });

        $('.blog_3_pixie .et_pb_post').each(function () {
            if (!$(this).hasClass('done')) {

                $('.blog_3_pixie .et_pb_ajax_pagination_container style').remove();

                $(this).find('.post-meta').insertAfter($(this).find('.post-content'));

                $(this).addClass('done');
            }
        });


    }, 200);

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);


    //            Cut Text




    setTimeout(function () {
        $('.blog_3_pixie .et_pb_post .entry-title a').each(function () {
            $(this).succinct({
                size: 50
            });
        });

        var meta3Size = 0;
        $('.blog_3_pixie .et_pb_post .post-meta').each(function () {
            var thisMeta3Size = $(this).height();
            //                    console.log(blogTitleSize);
            if (thisMeta3Size > meta3Size) {
                meta3Size = thisMeta3Size;
            }
        });
        //                console.log(titleSize);
        $('.blog_3_pixie .et_pb_post .post-meta').height(meta3Size);

        $('.blog_3_pixie .et_pb_post').each(function () {
            if (!$(this).hasClass('done')) {

                $('.blog_3_pixie .et_pb_ajax_pagination_container style').remove();

                $(this).find('.post-meta').insertAfter($(this).find('.post-content'));

                $(this).addClass('done');
            }
        });

        var title3Size = 0;
        $('.blog_3_pixie .et_pb_post .entry-title a').each(function () {
            var blogTitle3Size = $(this).height();

            if (blogTitle3Size > title3Size) {
                title3Size = blogTitle3Size;
            }

        });
        $('.blog_3_pixie .et_pb_post .entry-title a').height(title3Size);
    }, blogDaley);

    setTimeout(function () {
        var title1Size = 0;
        $('.blog_1_pixie .et_pb_post .entry-title a').each(function () {
            var blogTitle1Size = $(this).height();
            //                    console.log(blogTitleSize);
            if (blogTitle1Size > title1Size) {
                title1Size = blogTitle1Size;
            }
            $(this).succinct({
                size: 80
            });
        });
        //                console.log(titleSize);
        $('.blog_1_pixie .et_pb_post .entry-title a').height(title1Size);
    }, blogDaley);

    setTimeout(function () {
        var title2Size = 0;
        $('.blog_2_pixie .et_pb_post .entry-title a').each(function () {
            var blogTitle2Size = $(this).height();
            //                    console.log(blogTitleSize);
            if (blogTitle2Size > title2Size) {
                title2Size = blogTitle2Size;
            }
            $(this).succinct({
                size: 80
            });
        });
        //                console.log(titleSize);
        $('.blog_2_pixie .et_pb_post .entry-title a').height(title2Size);
    }, blogDaley);

    //            Pricing table

    $('.pricing_tables_pixie_1 .et_pb_pricing_content').each(function () {
        $(this).find('.post-meta').insertAfter($(this).find('.post-content'));
    });

    var priceContHeight = 0;
    setTimeout(function () {
        $('.pricing_tables_pixie_1 .et_pb_pricing_content').each(function () {
            var postHeight = $(this).height();
            //console.log(postHeight);
            if (postHeight > priceContHeight) {
                priceContHeight = postHeight
            }
        });

        $('.pricing_tables_pixie_1 .et_pb_pricing_content').height(priceContHeight);
    }, 2000);

    // Parse html tags for titles

    var titlesDelay = 0;
    if ($('body').hasClass('et-fb')) {
        titlesDelay = 5000;
    }


    setTimeout(pixieparseHtmlTags, titlesDelay);

    function pixieparseHtmlTagsVB() {
        pixieparseHtmlTags();
    }

    $('input.et-fb-settings-option-input--block[type="text"]').keypress(function () {
        //console.log('change!');
        pixieparseHtmlTagsVB();
    });


    function pixieparseHtmlTags() {
        $('.et_pb_column h1, .et_pb_column h2, .et_pb_column h3, .et_pb_column h4, .et_pb_column h5, .et_pb_column h6, .pixie_tabs .et_pb_tabs_controls a, .pixie_testimonials_5 .et_pb_testimonial_author').each(function () {
            pixie_title = $(this).html();
            pixie_title_new = pixie_title.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
            $(this).html(pixie_title_new);
        });
    }


    setInterval(function () {
        $('.et_pb_contact_form_container .et_pb_contact_main_title').each(function () {
            //console.log('test');
            if(!$(this).hasClass('added')){
                pixie_title = $(this).html();
                pixie_title_new = pixie_title.replace(/&lt;/g, "<").replace(/&gt;/g, ">");
                $(this).html(pixie_title_new);

                $(this).addClass('added');
            }

        });
    },100)


    //        Blurbs

    $('.pixie_blurb_2 .et_pb_column').on('click', function (event) {
        event.preventDefault();
        var pageUrl = $(this).find('.et_pb_image a').attr('href');
        var pageUrlTarget = $(this).find('.et_pb_image a').attr('target');
        if (!pageUrl) {
            pageUrl = $(this).find('.et_pb_blurb_content .et_pb_module_header a').attr('href');
            pageUrlTarget = $(this).find('.et_pb_blurb_content .et_pb_module_header a').attr('target');
        }
        // console.log('pageUrl ' + pageUrl);
        // console.log('pageUrlTarget ' + pageUrlTarget);
        if (pageUrl) {
            if (pageUrlTarget) {
                event.preventDefault();
                window.open(pageUrl, '_blank');
            }
            else {
                event.preventDefault();
                window.location.href = pageUrl;
            }
        }
    });


    $('.pixie_blurb_3 .et_pb_column_1_4 .et_pb_blurb_description').each(function () {
        $(this).succinct({
            size: 100
        });
    });

    $('.pixie_blurb_3 .et_pb_column_1_2 .et_pb_blurb_description').each(function () {
        $(this).succinct({
            size: 190
        });
    });


    //            Testimonials 5

    $('.pixie_testimonials_5 .et_pb_testimonial_description').each(function () {
        $(this).find('p:not(.et_pb_testimonial_meta)').insertAfter($(this).find('p.et_pb_testimonial_meta'));
    });


    //         Testimonials 8


    //Slide Sizes
    var slideaDelay = 2000;
    if ($('body').hasClass('et-fb')) {
        slideaDelay = 7000;
    }

    var tSliderWidth = "";
    var tWindowWidth = "";
    var tSlideItemWidth = "";
    var tSlideItemCount = "";
    var tMargRight = "";
    var classCount = "1";

    var slideLastItems = 3;
    if($(window).width() <= 767){
        slideLastItems = 1;
    }

    setTimeout(function () {

        $('.pixie_testimonials_8 .et_pb_slides').each(function () {
            tSliderWidth = $('.pixie_testimonials_8 .et_pb_slider').width();
            tWindowWidth = $(window).width();
            if (tWindowWidth >= 768) {
                $(this).find('.et_pb_slide').width(Math.floor(tSliderWidth / slideLastItems));
            } else {
                $(this).find('.et_pb_slide').width(tSliderWidth);
            }

            tSlideItemWidth = $(this).find('.et_pb_slide').width();
            tSlideItemCount = $(this).find('.et_pb_slide').length + 2;

            $(this).width(Math.floor(tSlideItemWidth) * tSlideItemCount);

            $(this).find('.et_pb_slide:first-child').addClass('active_slide')
            if($(window).width() >= 768){
                $('.pixie_testimonials_8 .et-pb-controllers a:nth-last-child(2)').remove();
                $('.pixie_testimonials_8 .et-pb-controllers a:nth-last-child(1)').remove();
            }

        });


        //Slider Slide
        $('.pixie_testimonials_8 .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
            if($(this).closest('.et_pb_slider').find('.active_slide').nextAll('.et_pb_slide').length > slideLastItems - 1){
                $(this).closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide')
            }else{
                $(this).closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                $(this).closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide');
            }
        })

        $('.pixie_testimonials_8 .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
            if($(this).closest('.et_pb_slider').find('.active_slide').prev('.et_pb_slide').length !== 0){
                $(this).closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev('.et_pb_slide').addClass('active_slide')
            }else{
                $(this).closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                $(this).closest('.et_pb_slider').find('.et_pb_slide:nth-last-child('+ slideLastItems +')').addClass('active_slide');
            }
        })

        $('.pixie_testimonials_8 .et-pb-slider-arrows a').on('click', function () {
            var prevEl2 = $(this).closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;
            console.log(prevEl2)
            var thisArrow = $(this);

            setTimeout(function () {
                thisArrow.closest('.et_pb_slider').find('.et-pb-controllers a').removeClass('active_control');
                thisArrow.closest('.et_pb_slider').find('.et-pb-controllers a:nth-child('+ (prevEl2 + 1) +')').addClass('active_control')
            },3)


            var slideSize2 = tSlideItemWidth * prevEl2 - tMargRight;
            $(this).closest('.et_pb_slider').find('.et_pb_slides').css('margin-left', -slideSize2);
        })




        $('.pixie_testimonials_8 .et-pb-controllers a:first-child').addClass('active_control');
        $('.pixie_testimonials_8 .et-pb-controllers a').on('click', function () {
            var thisDot = $(this);
            setTimeout(function () {
                $('.pixie_testimonials_8 .et-pb-controllers a').removeClass('active_control');
                thisDot.addClass('active_control');
                prevEl = $('.pixie_testimonials_8 .et_pb_slide.et-pb-active-slide').prevAll().length;
                slideSize = tSlideItemWidth * prevEl - tMargRight;
                $('.pixie_testimonials_8 .et_pb_slides').css('margin-left', -slideSize);

            }, 500);

        });

        //        Auto rotate




        if ($('.pixie_testimonials_8 .et_pb_slider').hasClass('et_slider_auto')) {
            var thisS = $(this);
            var prevElementsLength;
            var check = "et_slider_speed_";
            var slideTransition;
            $('[class^="et_slider_speed_"], [class*=" et_slider_speed_"]').each(function () {
                // Get array of class names
                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++) {

                    if (cls[i].indexOf(check) > -1) {
                        slideTransition = cls[i].slice(check.length, cls[i].length);

                    }
                }
            });
            slideTransition2 = slideTransition;




            function sliderInterval() {


                // setTimeout(function () {


                if ($('.pixie_testimonials_8 .et_pb_slider .et_pb_slide.active_slide').nextAll('.et_pb_slide').length > slideLastItems - 1) {
                    console.log('test')
                    $('.pixie_testimonials_8 .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide').next('.et_pb_slide').addClass('active_slide')
                } else {
                    $('.pixie_testimonials_8 .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide')
                    $('.pixie_testimonials_8 .et_pb_slider .et_pb_slide:first-child').addClass('active_slide')
                }

                var prevEl2 = $('.pixie_testimonials_8 .et_pb_slider .et_pb_slide.active_slide').prevAll().length;
                console.log(prevEl2)
                var thisArrow = $(this);

                setTimeout(function () {
                    $('.pixie_testimonials_8 .et_pb_slider .et-pb-controllers a').removeClass('active_control');
                    $('.pixie_testimonials_8 .et_pb_slider .et-pb-controllers a:nth-child(' + (prevEl2 + 1) + ')').addClass('active_control')
                }, 3)


                var slideSize2 = tSlideItemWidth * prevEl2 - tMargRight;
                $('.pixie_testimonials_8 .et_pb_slider .et_pb_slides').css('margin-left', -slideSize2);

                // }, slideTransition2)


            }


            var myTimer = setInterval(sliderInterval, slideTransition2);


            $('.pixie_testimonials_8 .et-pb-slider-arrows a, .pixie_testimonials_8 .et-pb-controllers a').on('click', function (event) {
                clearInterval(myTimer);
                myTimer = setInterval(sliderInterval, slideTransition);

            })
        }
    }, slideaDelay);

    // End Testimonials 8

    // Headers

    // video pop-up

    $("body .video-popup h4").click(function () {
        $(this).find('a').attr('href', "");
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


    //            header 8


    $('.pixie-header8 .et_pb_column .et_pb_blurb').on('click touch', function (event) {
        event.preventDefault();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(this).hasClass('first_click')) {
                var pageUrl = $(this).find('h4 a').attr('href');
                if (pageUrl) {
                    window.location.href = pageUrl;
                }
            } else {
                $('.pixie-header8 .et_pb_column .et_pb_blurb').removeClass('first_click');
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

    var Header8Daley = 0;

    if ($('body').hasClass('et-fb')) {
        Header8Daley = 8000;
    }
    setTimeout(function () {
    $(".pixie-header8  .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").hover(function () {
        $(".pixie-header8  .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").addClass("noHover");
        $(this).addClass("hover")
    }, function () {
        $(".pixie-header8  .et_pb_column .et_pb_blurb, .blurb_10_f .et_pb_column .et_pb_blurb").removeClass("noHover");
        $(this).removeClass("hover")
    });
    },Header8Daley)

    //Content Modules

    $('.pixie-content2 .et_pb_blurb, .pixie-content4 .et_pb_blurb, .pixie-content7 .et_pb_blurb, .pixie-content10 .et_pb_blurb, .pixie-content17 .et_pb_blurb, .pixie-content18 .et_pb_blurb, .pixie-content21 .et_pb_blurb').on('click', function () {
        var pageUrl = $(this).find('h4 a').attr('href');
        if (pageUrl) {
            window.location.href = pageUrl;
        }
    });

    $('.pixie-content3 .et_pb_blurb, .pixie-content5 .et_pb_blurb, .pixie-content8 .et_pb_blurb').on('click', function () {
        var pageUrl = $(this).find('.et_pb_main_blurb_image a').attr('href');
        if (pageUrl) {
            window.location.href = pageUrl;
        }
    });

    $('.pixie-content6 .et_pb_column_1_3').on('click', function () {
        var pageUrl = $(this).find('.et_pb_blurb_container h4 a').attr('href');
        if (pageUrl) {
            window.location.href = pageUrl;
        }
    });

    // Newsletter Form

    var contactNewsletterDaley = 0;

    if ($('body').hasClass('et-fb')) {
        contactNewsletterDaley = 8000;
    }
    setTimeout(function () {
        $(' .et_pb_newsletter .et_pb_newsletter_form p:not([data-type="checkbox"]):not([data-type="radio"])').each(function () {
            $(this).find('input').insertBefore($(this).find('label'));
            $(this).find('label[for="et_pb_signup_lastname"]').each(function () {
                $(this).text("Surname");
            });
            $(this).find('label[for="et_pb_signup_firstname"]').each(function () {
                $(this).text("Name");
            });

            $(this).find('input.et_pb_signup_firstname').required = false;
        });
    },contactNewsletterDaley);




    setTimeout(function () {


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
    },contactNewsletterDaley)

    $('.pixel-footer2 .et_pb_contact_form p[data-type="select"] select option:first-child').remove();


    $('.pixie-contact1 .et_pb_contact_form .et_pb_contact_submit').on('click', function () {
        setTimeout(function () {
            if ($('.pixie-contact1 .et_pb_contact_form_container .et_pb_contact').length = 0) {
                $('.pixie-contact1 .et_pb_contact_form_container').addClass('submit')
            }
        }, 1000)
    });


    //Contact Forms

    var contactDaley = 0;

    if ($('body').hasClass('et-fb')) {
        contactDaley = 8000;
    }
    setTimeout(function () {
        $('.et_pb_section .et_pb_contact form:not(.wpcf7-form) p:not([data-type="checkbox"]):not([data-type="radio"])').each(function () {
            $(this).find('textarea').insertBefore($(this).find('label'));
            $(this).find('input').insertBefore($(this).find('label'));
        });
    },contactDaley)


    setTimeout(function () {


    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function () {
        $(this).parent("p").addClass("focus");
    });

    $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("filled");
        } else {
            $(this).parent().removeClass("filled");
        }
        $(this).parent("p").removeClass("focus");
    });


        var dateId = $('body.et-fb .pixie-contact2 textarea[data-original_id="message"]').attr('data-original_id');
        $('body.et-fb .pixie-contact2 textarea[data-original_id="message"]').parent().attr('data-id', dateId);
    },contactDaley)
    //            For Pixie footer 1 subscribe


    $('.pixel-footer1 .et_pb_newsletter p label, .pixie-contact1 .et_pb_newsletter p label').text('Your e-mail')
    $('.unknown .pixel-footer2 .et_pb_contact_form p, .pixie-contact1 .et_pb_contact_form p, .pixie-contact2 .et_pb_contact_form p, .pixie-contact3 .et_pb_contact_form p').each(function () {
        $(this).find('input, textarea').attr('placeholder', '')
    });

    setTimeout(function () {
        $('.unknown .pixel-footer2 .et_pb_contact_form p, body.et-fb .pixie-contact1 .et_pb_contact_form p, body.et-fb .pixie-contact2 .et_pb_contact_form p,body.et-fb .pixie-contact3 .et_pb_contact_form p').each(function () {
            $(this).find('input, textarea').attr('placeholder', '')
        });
    }, 5000)


    //            For Pixie Call to Action 6


    $('.pixie-cta6 .et_pb_newsletter p label[for="et_pb_signup_firstname"]').text('Your name');
    $('.pixie-cta6 .et_pb_newsletter p label[for="et_pb_signup_email"]').text('Your e-mail');


    //        Portfolio Slider


    if ($('.portfolio_slider_pixie').length > 0) {
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
        $('.portfolio_slider_pixie .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:first-child,.portfolio_slider_pixie .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:nth-child(2)').clone().insertAfter('.portfolio_slider_pixie .et_pb_gallery .et_pb_gallery_items .et_pb_gallery_item:last-child');
        setTimeout(function () {
            var slideItemsCount = $('.portfolio_slider_pixie .et_pb_gallery_items   .et_pb_gallery_item ').length;
            var slideInnerWidth = $(document).width();
            $('.portfolio_slider_pixie .et_pb_gallery_items   .et_pb_gallery_item ').css("cssText", "width: " + Math.floor(slideInnerWidth / showSlideritems) + "px !important;");
            var slideItemswidth = $('.portfolio_slider_pixie .et_pb_gallery_items   .et_pb_gallery_item ')[0].getBoundingClientRect().width;
            var slideWidth = slideItemsCount * slideItemswidth;

            //console.log(slideItemsCount);
            //console.log("cssText", "width:" + slideInnerWidth + "px!important;");
            $('.portfolio_slider_pixie .et_pb_gallery').css("cssText", "width:" + slideInnerWidth + "px !important;");
            $('.portfolio_slider_pixie .et_pb_gallery  .et_pb_gallery_items  ').css("cssText", "width: " + slideWidth + "px !important;");

            $('.portfolio_slider_pixie .et_pb_gallery .et_pb_gallery_items').css('margin-left', -(slideItemswidth / 2));


            $('<div class="slide-controllers"></div>').appendTo('.portfolio_slider_pixie .et_pb_gallery');

            var dotsCount = slideItemsCount / slideSliderItemsCount;
            for (var i = 0; i < dotsCount - 1; i++) {
                $('<a class="dot dot-' + i + '">' + i + '</a>').appendTo('.portfolio_slider_pixie .slide-controllers');
            }

            $('.slide-controllers a:first-child').addClass('active');
            $('.slide-controllers a').on('click', function () {
                $('.slide-controllers a').removeClass('active');
                $(this).addClass('active');
                var translateLeftSize = $(this).text();
                var translateLeft = translateLeftSize * slideSliderItemsCount;
                var translate = -(translateLeft * slideItemswidth);
                $('.portfolio_slider_pixie .et_pb_gallery .et_pb_gallery_items ').css({"transform": "translate3d(" + translate + "px, 0px, 0px)"});

            });
        }, 1000);


        //        Auto rotate

        $(function () {
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

    // $('body .et_pb_section:not(.flipcards-section) .et_pb_blurb:not(.video-popup)').each(function () {
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

    // $('body .et_pb_blurb:not(.video-popup)').on('click', function() {
    //     var pageLink = $(this).find('h4 a').attr('href');
    //     var pageLink2 = $(this).find('.et_pb_main_blurb_image a').attr('href');
    //     if (pageLink) {
    //         window.location.href = pageLink;
    //     } else if (pageLink2) {
    //         window.location.href = pageLink2;
    //     }
    // });


    // $('div.et_pb_section[class*=pixie_] .et_pb_blurb').each(function () {
    //     $(this).addClass('pixie_blurb_click');
    // });
    //
    // $('body .et_pb_section:not(.pixie_blurb_2) .et_pb_blurb.pixie_blurb_click:not(.video-popup)').on('click', function (event) {
    //     event.preventDefault();
    //     var pageUrl = $(this).find('h4 a').attr('href');
    //     var pageUrlTarget = $(this).find('h4 a').attr('target');
    //     if (!pageUrl) {
    //         pageUrl = $(this).find('.et_pb_main_blurb_image a').attr('href');
    //         pageUrlTarget = $(this).find('.et_pb_main_blurb_image a').attr('target');
    //     }
    //
    //     if (pageUrl) {
    //         if (pageUrlTarget) {
    //             event.preventDefault();
    //             window.open(pageUrl, '_blank');
    //         }
    //         else {
    //             event.preventDefault();
    //             window.location.href = pageUrl;
    //         }
    //     }
    // });


    //            Portfolio


    var portfolioDeley = 400;

    if ($('body').hasClass('et-fb')) {
        portfolioDeley = 8000;
    }

    function portfolioLoad() {
        setTimeout(function () {
            var count = $('#page-container .pixie_portfolio1 .et_pb_portfolio_items .et_pb_portfolio_item').length;
            var i = 1;

            function transition() {
                $('#page-container .pixie_portfolio1 .et_pb_portfolio_items .et_pb_portfolio_item:nth-child(' + i + ')').addClass('active_item');
                i++;
            }

            setInterval(function () {
                if (i <= count) {
                    transition()
                }
            }, 60);
        }, 100);
    }

    setTimeout(function () {
        $('#page-container .pixie_portfolio1 .et_pb_portfolio_items').addClass('loadCont');
    }, portfolioDeley);

    $('#page-container .pixie_portfolio1 .et_pb_portfolio .et_pb_portfolio_filters li').on('click', function () {
        $('#page-container .pixie_portfolio1 .et_pb_portfolio_items').removeClass('loadCont');
        portfolioLoad();
    })


    //    Accordion Close on click

    $('div[class*="pixie-"] .et_pb_toggle_title').click(function () {
        $('.et_pb_toggle_title').removeClass('opened');
        $(this).addClass('opened');
        var $toggle = $(this).closest('.et_pb_toggle');
        if (!$toggle.hasClass('et_pb_accordion_toggling')) {
            var $accordion = $toggle.closest('.et_pb_accordion');
            if ($toggle.hasClass('et_pb_toggle_open')) {
                $accordion.addClass('et_pb_accordion_toggling');
                $toggle.find('.et_pb_toggle_content').slideToggle(700, function () {
                    $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
                });
            }
            setTimeout(function () {
                $accordion.removeClass('et_pb_accordion_toggling');
            }, 750);
        }
    });

})(jQuery);