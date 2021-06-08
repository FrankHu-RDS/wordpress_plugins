/*
 * Copyright (c) 2014 Mike King (@micjamking)
 *
 * jQuery Succinct plugin
 * Version 1.1.0 (October 2014)
 *
 * Licensed under the MIT License
 */
/*global jQuery*/

! function(a) {
    "use strict";
    a.fn.succinct = function(b) {
        var c = a.extend({ size: 240, omission: "...", ignore: !0 }, b);
        return this.each(function() {
            var b, d, e = a(this),
                f = /[!-\/:-@\[-`{-~]$/,
                g = function() { e.each(function() { b = a(this).html(), b.length > c.size && (d = a.trim(b).substring(0, c.size).split(" ").slice(0, -1).join(" "), c.ignore && (d = d.replace(f, "")), a(this).html(d + c.omission)) }) };
            g()
        })
    }
}(jQuery);

/* For blogs layout*/

(function($) {
    const { __, _x, _n, _nx } = wp.i18n;

    $('.et_pb_section article.et_pb_post').on('click', function() {
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

    $('.blog_1 article, .blog_2 article, .blog_4 article').each(function() {
        var avatarUrl = $(this).find('dataavatar').attr('data-avatar-url');
        //console.log(avatarUrl);
        if(avatarUrl) var avatarCode = '<img alt="author avatar" src="'+ avatarUrl +'" class="avatar avatar-92 photo" height="92" width="92">';
        //console.log(avatarCode);
        if(avatarCode) $(avatarCode).insertBefore($(this).find('.author.vcard a'))
    });

    $('.blog_1 .post-meta, .blog_2 .post-meta, .blog_5 .post-meta').each(function() {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();
        categories = $.map(categories, function(element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = author.outerHTML;
        html += date.outerHTML;
        html += "<span class='categories'>" + categories + "</span>"

        $(this).html(html);
    });

    $('.blog_1 article').each(function () {
        $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title a'));
    });

    $('dataavatar').remove();

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);
})(jQuery);

(function ($) {
    $('h4 a').each(function(){
    var headerText = $(this).text();
    newHeaderText = headerText.replace(/<dataavatar.+?dataavatar>/g, '');
    $(this).text(newHeaderText);
    })
})(jQuery);

(function($) {

    $('.blog_1 h2 > a').each(function() {
        $(this).succinct({
            size: 90
        });

    });

    $('.blog_3 h2 > a').each(function() {
        $(this).succinct({
            size: 50
        });

    });

    $('.blog_4 h2 > a').each(function() {
        $(this).succinct({
            size: 70
        });

    });

    $('.blog_5 h2 > a').each(function() {
        $(this).succinct({
            size: 70
        });

    });

    $('.blog_6 h2').each(function() {
        $(this).find('a').succinct({
            size: 90
        });

    });


    // blog 6 title height

    function blog_6_resize() {
        blog_6 = [];
        $('.blog_6 h2').each(function() {
            var blog6h = $(this).height();
            blog_6.push(blog6h);

        });

        var maxh = Math.max.apply(Math, blog_6);

        $('.blog_6 h2').each(function() {
            $(this).height(maxh);
        });
    }

    // blog 1 title height

    function blog_1_resize() {
        blog_1 = [];
        $('.blog_1 h2 > a').each(function() {
            var blog1h = $(this).height();
            blog_1.push(blog1h);

        });

        var maxh = Math.max.apply(Math, blog_1);

        $('.blog_1 h2 > a').each(function() {
            $(this).height(maxh);
        });
    }

    // blog 2 title height

    function blog_2_resize() {
        blog_2 = [];
        $('.blog_2 h2 > a').each(function() {
            var blog2h = $(this).height();
            blog_2.push(blog2h);

        });

        var maxh = Math.max.apply(Math, blog_2);

        $('.blog_2 h2 > a').each(function() {
            $(this).height(maxh);
        });
    }

    // blog 3 title height

    function blog_3_resize() {
        blog_3 = [];
        $('.blog_3 h2 a').each(function() {
            var blog3h = $(this).height();
            blog_3.push(blog3h);

        });

        var maxh = Math.max.apply(Math, blog_3);

        $('.blog_3 h2 a').each(function() {
            $(this).height(maxh);
        });
    }

    // blog 4 title height

    function blog_4_resize() {
        blog_4 = [];
        $('.blog_4 h2').each(function() {
            var blog4h = $(this).height();
            blog_4.push(blog4h);

        });

        var maxh = Math.max.apply(Math, blog_4);

        $('.blog_4 h2').each(function() {
            $(this).height(maxh);
        });
    }

    // blog 5 title height

    function blog_5_resize() {
        blog_5 = [];
        $('.blog_5 h2').each(function() {
            var blog5h = $(this).height();
            blog_5.push(blog5h);

        });

        var maxh = Math.max.apply(Math, blog_5);

        $('.blog_5 h2').each(function() {
            $(this).height(maxh);
        });
    }

    // blurbs 1  height

    function blurbs_1_resize() {
        blurbs_1 = [];
        $('.blurbs_1 .et_pb_blurb_container').each(function() {
            var blurbs1h = $(this).height();
            blurbs_1.push(blurbs1h);

        });

        var maxh = Math.max.apply(Math, blurbs_1);

        $('.blurbs_1 .et_pb_blurb_container').each(function() {
            $(this).height(maxh);
        });
    }

    // blurbs 2

    $('.blurbs_2 .et_pb_blurb_description').each(function() {
        $(this).succinct({
            size: 110
        });

    });

    // blurbs 3  height

    function blurbs_3_resize() {
        blurbs_3 = [];
        $('.blurbs_3 .et_pb_blurb_container').each(function() {
            var blurbs3h = $(this).height();
            blurbs_3.push(blurbs3h);

        });

        var maxh = Math.max.apply(Math, blurbs_3);

        $('.blurbs_3 .et_pb_blurb_container').each(function() {
            $(this).height(maxh + 15);
        });
    }



    setTimeout(function() {
        blog_1_resize();
        blog_2_resize();
        blog_3_resize();
        blog_4_resize();
        blog_5_resize();
        blog_6_resize();

        blurbs_1_resize();
        blurbs_3_resize();
    }, 200);


    var win = $(this);



    if (win.width() <= 980) {
        $('.blog_2 h2 > a').each(function() {
            $(this).succinct({
                size: 1000
            });

        });
    } else {
        $('.blog_2 h2 > a').each(function() {
            $(this).succinct({
                size: 85
            });

        });
    }

    $(window).on('resize', function() {
        blog_1_resize();
        blog_2_resize();
        blog_3_resize();
        blog_4_resize();
        blog_5_resize();
        blog_6_resize();

       // blurbs_1_resize();
        // blurbs_3_resize();
        var win = $(this); //this = window
        if (win.height() >= 820) { /* ... */ }
        if (win.width() <= 600) {} else {}
    });
})(jQuery);


/* For Form module focus action*/

(function($) {

        // clear the placeholder on click

    $('input,textarea').focus(function() {
      if ($(this).attr('placeholder') !== '') {
        $(this).attr('data-placeholder', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
       }
    });
    $('input,textarea').blur(function() {

      if ($(this).attr('placeholder') === '') {
        $(this).attr('placeholder', $(this).attr('data-placeholder'));
       // console.log($(this).attr('placeholder'));

      }
    });

    //            Contact Forms


   $('.contact_5.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function() {
       $(this).find('textarea').insertBefore($(this).find('label'));
       $(this).find('input').insertBefore($(this).find('label'));
   });

   if($('body').hasClass('et-fb')) {
        setTimeout(function() {
            $('.contact_5.et_pb_section .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]):not([data-type="radio"])').each(function() {
           $(this).find('textarea').insertBefore($(this).find('label'));
           $(this).find('input').insertBefore($(this).find('label'));
       });

              $('.blog_1 .post-meta, .blog_2 .post-meta, .blog_5 .post-meta').each(function() {
        var author = $(this).find('span.author')[0];
        var date = $(this).find('span.published')[0];
        var categories = $(this).find('a[rel="category tag"]').toArray();
        categories = $.map(categories, function(element) {
            return element.outerHTML;
        });
        categories = categories.join(', ');

        var html = author.outerHTML;
        html += date.outerHTML;
        html += "<span class='categories'>" + categories + "</span>"

        $(this).html(html);
    });

    $('.blog_1 article').each(function () {
        $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title a'));
    });


        }, 2000);

   }

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

})(jQuery);

/*Unicorn Content Module 6 - Make the contact us box animation a clickable link  - please change "#" url link in the first blurb settings */

(function($) {

    $('.content6 .et_pb_column_1_3 .front').parent().on('click', function() {
        var pageUrl = $(this).find('.et_pb_main_blurb_image a').attr('href');
        var thisPageUrlTarget = $(this).find('.et_pb_main_blurb_image a').attr('target');

        if (pageUrl) {
            if (thisPageUrlTarget) {
                window.open(
                    pageUrl,
                    '_blank'
                );
            } else window.location.href = pageUrl;
        }
    });


})(jQuery);



/* Person module click action*/

(function($) {
    $('.et_pb_team_member').on('click', function() {
        var personPageLink = $(this).find('.person_link a').attr('href');
        var thisPersonPageLinkTarget = $(this).find('.person_link a').attr('target');

        if (personPageLink) {
            if (thisPersonPageLinkTarget) {
                window.open(
                    personPageLink,
                    '_blank'
                );
            } else window.location.href = personPageLink;
        }

    })
})(jQuery);

/* For Email optin Divi kit focus action*/

(function($) {

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


//    Aweber Form

    $('.form_2 .et_pb_newsletter .et_pb_newsletter_form p').each(function () {
        //console.log($('.form_2 .et_pb_newsletter .et_pb_newsletter_form p').length);
        if($('.form_2 .et_pb_newsletter .et_pb_newsletter_form p').length === 3){
            $(this).parent('.et_pb_newsletter_form').addClass('aweber_form');
        }
    })

})(jQuery);

/* Blurb module click action*/

(function($) {
    $('div.et_pb_section[class*=blurb]:not(.blurb5):not([class*=_f]):not([class*=_blurb]) .et_pb_blurb').each(function() {
        $(this).addClass('unicorn_blurb');
    });

    $('.et_pb_blurb.unicorn_blurb').on('click', function() {

        if ($(this).hasClass('back')) {

            var blurbPageLink = $(this).prev().find('.et_pb_blurb_content a').attr('href');
            var blurbPageLinkTarget = $(this).prev().find('.et_pb_blurb_content a').attr('target');
        } else {
            var blurbPageLink = $(this).find('.et_pb_blurb_content a').attr('href');
            var blurbPageLinkTarget = $(this).find('.et_pb_blurb_content a').attr('target');
        }

        if (blurbPageLink) {
            if (blurbPageLinkTarget) {
                window.open(
                    blurbPageLink,
                    '_blank'
                );
            } else window.location.href = blurbPageLink;
        }

    })
})(jQuery);

/* For featured modules background*/

(function($) {

 $('.features8 .et_pb_blurb').each(function() {
        var src = $(this).find('.et_pb_blurb_container > p > img').attr('src');
        if (src) {
            $("<style type='text/css'> .features8 .et_pb_blurb:before {background-image: url(" + src + ") !important;} </style>").appendTo("head");

            $(this).find('.et_pb_blurb_container > p').remove();


        }
    });

    $('.features10 .et_pb_row:first-child .et_pb_blurb').each(function() {
        var src = $(this).find('.et_pb_blurb_container > p > img').attr('src');
        if (src) {
            $("<style type='text/css'> .features10 .et_pb_row:first-child .et_pb_blurb:before {background-image: url(" + src + ") !important;} </style>").appendTo("head");

            $(this).find('.et_pb_blurb_container > p > img').remove();


        }
    });
})(jQuery);

// Pricing tables

(function($) {
    $('.et_pb_pricing_table').each(function() {
        if ($(this).find('.et_pb_dollar_sign').length > 0) {
            var sign = $(this).find('.et_pb_dollar_sign').text();
            $(this).find('.et_pb_sum').attr('data-sign', sign);
        }
    });
})(jQuery);


// Content 4

(function($) {
    $('.content4 .et_pb_toggle_content h5').each(function() {
        $(this).addClass('et_pb_toggle_title');
    });
})(jQuery);

(function($) {
    $('.content1 .et_pb_toggle_title, .contact_4 .et_pb_toggle_title').click(function() {
        var $toggle = $(this).closest('.et_pb_toggle');
        if (!$toggle.hasClass('et_pb_accordion_toggling')) {
            var $accordion = $toggle.closest('.et_pb_accordion');
            if ($toggle.hasClass('et_pb_toggle_open')) {
                $accordion.addClass('et_pb_accordion_toggling');
                $toggle.find('.et_pb_toggle_content').slideToggle(700, function() {
                    $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');

                });
            }
            setTimeout(function() {
                $accordion.removeClass('et_pb_accordion_toggling');
            }, 750);
        }
    });
})(jQuery);


// features

 (function($) {
    $('.features8 .et_pb_blurb h4').each(function() {
		if ($(this).find('a').length > 0) {
			$(this).find('a').succinct({
            size: 26
        });
		}
		else
		{
        $(this).succinct({
            size: 26
        });
}

     });
 })(jQuery);


//    Futures 7
(function ($) {
   var height = 1;
   var blurbHeight = "";
   if($(window).width() > 1120){
       setTimeout(function () {
           $('.features7 .et_pb_column.text_rigth .et_pb_blurb').each(function () {
               blurbHeight = $(this).height();
               var blurbHeight2 = $('.features7 .et_pb_column:not(.text_rigth) .et_pb_blurb:nth-child(' + height + ')').height();
               if (blurbHeight > blurbHeight2) {
                   $('.features7 .et_pb_column:not(.text_rigth) .et_pb_blurb:nth-child(' + height + ')').height(blurbHeight)
               } else {
                   $(this).height(blurbHeight2);
               }
               height++;
           })
       }, 1000);
   }
})(jQuery);