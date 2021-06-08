 (function($) {
     //            Remove placeholder on focus

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


     //                Contact Form Script

     $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function() {
         $(this).parent("p").addClass("focus");
     });

     $('.et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function() {
         if ($(this).val()) {
             $(this).parent().addClass("filled");
         } else {
             $(this).parent().removeClass("filled");
         }
         $(this).parent("p").removeClass("focus");
     });

     //                Newsletter Form Script

     $(' .et_pb_newsletter .et_pb_newsletter_form  p input').focus(function() {
         $(this).parent("p").addClass("focus");
         $(this).closest(".et_pb_newsletter_form").addClass("focus");
     });

     $('.et_pb_newsletter .et_pb_newsletter_form  p input').blur(function() {
         if ($(this).val()) {
             $(this).closest(".et_pb_newsletter_form").addClass("filled");
             $(this).parent().addClass("filled");
         } else {
             $(this).closest(".et_pb_newsletter_form").removeClass("filled");
             $(this).parent().removeClass("filled");
         }
         $(this).closest(".et_pb_newsletter_form").removeClass("focus");
         $(this).parent("p").removeClass("focus");
     });

 })(jQuery);

 (function($) {

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


     var postBiggerHeight = 0;
     $('.jamie_blog .et_pb_posts  article.et_pb_post').each(function() {
         var postHeight = $(this).height();
         if (postHeight > postBiggerHeight) {
             postBiggerHeight = postHeight
         }
     });

     $('.jamie_blog .et_pb_posts  article.et_pb_post').height(postBiggerHeight);


     var postBiggerHeadingHeight = 0;
     $('.jamie_blog .et_pb_posts  article.et_pb_post').each(function() {
         var postHeadingHeight = $(this).find('h2.entry-title').height();
         if (postHeadingHeight > postBiggerHeadingHeight) {
             postBiggerHeadingHeight = postHeadingHeight
         }

     });
     $('.jamie_blog .et_pb_posts  article.et_pb_post h2.entry-title').height(postBiggerHeadingHeight);

     $('.jamie_blog .et_pb_posts  .et_pb_post  .post-meta').each(function() {
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
         var html = date;

         html += "<span class='categories'>" + categories + "</span>";

         $(this).html(html);
     });


     //            Blog Landing Page


     $('.jamie_blog_6 .entry-featured-image-url').each(function() {
         $("<div class='text_read_more'></div>").appendTo($(this));
     });


     setInterval(function() {
         $('.jamie_blog_6 .entry-featured-image-url').each(function() {
             if (!$('.jamie_blog_6 .entry-featured-image-url').hasClass('div_added')) {
                 $("<div class='text_read_more'></div>").appendTo($(this));
                 $(this).addClass('div_added');
             }
         });


         $('body.et-fb .et_pb_posts  .et_pb_post').each(function() {
             if (!$(this).hasClass('div_added')) {
                 $('<div class="post_info"></div>').appendTo($(this));
                 $(this).find('h2.entry-title').appendTo($(this).find('.post_info'));
                 $(this).find('.post-meta').appendTo($(this).find('.post_info'));
                 $(this).find('.post-content').appendTo($(this).find('.post_info'));
                 $(this).find('.more-link').appendTo($(this).find('.post_info .post-content'));
                 $(this).addClass('div_added');
             }
         })
     }, 200);


     $('.jamie_blog_6 .et_pb_posts .et_pb_post .post-meta').each(function() {

         var author = $(this).find('span.author')[0];

         var date = $(this).find('span.published')[0];
         var categories = $(this).find('a[rel="tag"]').toArray();

         var dateDay = $(this).find('.published').text();
         var month = dateDay.replace(/\d+/g, '');
         var day = parseInt(dateDay);


         if (day <= 9) {
             day = '0' + day;
         }

         if (dateDay) {
             date = '<span class="published"><span class="day"> ' + day + '</span><span class="month"> ' + month + '</span></span>';
         }


         if (categories) {
			 categories = $.map(categories, function(element) {
				 return element.outerHTML;
			 });
			 categories = categories.join(', ');
			 var html = date;
         }


         if (author) {
             var html = '<span class="auther_posted">Posted</span> ' + author.outerHTML + ' / ';
             html += date;
         } else {
             var html = date;
         }


         html += "<span class='categories a'>" + categories + "</span>";

         $(this).html(html);
     });

     setInterval(function() {
         $('.jamie_blog_6 .et_pb_posts  .et_pb_post  .post-meta, .jamie_home_blog  .et_pb_posts  .et_pb_post  .post-meta').each(function() {
             if (!$(this).hasClass('div_added')) {
                 var author = $(this).find('span.author')[0];

                 var date = $(this).find('span.published')[0];
                 var categories = $(this).find('a[rel="tag"]').toArray();

                 var dateDay = $(this).find('.published').text();
                 var month = dateDay.replace(/\d+/g, '');
                 var day = parseInt(dateDay);


                 if (day <= 9) {
                     day = '0' + day;
                 }

                 if (dateDay) {
                     date = '<span class="published"><span class="day"> ' + day + '</span><span class="month"> ' + month + '</span></span>';
                 }


                 if (categories) {
                     categories = $.map(categories, function(element) {
                         return element.outerHTML;
                     });
                     categories = categories.join(', ');
                 }


                 if (author) {
                     var html = '<span class="auther_posted">Posted</span> ' + author.outerHTML + ' / ';
                     html += date;
                 } else {
                     var html = date;
                 }


                 html += "<span class='categories'>" + categories + "</span>";

                 $(this).html(html);


                 $(this).find('.categories').insertBefore($(this).find('.published'));
                 $(this).prependTo($(this).parent('.et_pb_post'));

                 $(this).addClass('div_added');
             }
         });
     }, 200);

     setInterval(function() {
         if (!$('.jamie_blog_6 .et_pb_ajax_pagination_container').hasClass('div_added')) {
             $('<div class="gutter_blog_width"></div>').appendTo('.jamie_blog_6 .et_pb_ajax_pagination_container');

             var $container = $('.jamie_blog_6 .et_pb_ajax_pagination_container');
             $container.masonry({
                 columnWidth: '.et_pb_post',
                 itemSelector: '.et_pb_post',
                 gutter: '.gutter_blog_width'
             });

             $('.jamie_blog_6 .et_pb_ajax_pagination_container').addClass('div_added');
         }


     }, 200);


     setTimeout(function() {
         var $container = $('.jamie_blog_6 .et_pb_ajax_pagination_container');
         $container.masonry({
             columnWidth: '.et_pb_post',
             itemSelector: '.et_pb_post',
             gutter: '.gutter_blog_width'
         });
     }, 2500);


     setTimeout(function() {
         $('.jamie_blog_6 .et_pb_posts  .et_pb_post').each(function() {
             $(this).find('.post_info .post-meta').prependTo($(this));
         });

         $('.jamie_blog_6 article').each(function() {
             $(this).find('h2.entry-title a').succinct({
                 size: 50
             });

             $(this).find('.post-content p').succinct({
                 size: 100
             });
         });

     }, 800);

 })(jQuery);

 (function($) {

     $.fn.isInViewport = function() {
         var elementTop = $(this).offset().top;
         var elementBottom = elementTop + $(this).outerHeight();

         var viewportTop = $(window).scrollTop();
         var viewportBottom = viewportTop + $(window).height();

         return elementBottom > viewportTop && elementTop < viewportBottom;
     };


     setTimeout(function() {


         $('.animation').each(function() {
             if ($(this).isInViewport()) {
                 $(this).addClass('animate_section');

                 var count = $('.animate_section .et_pb_image').length;
                 var i = 1;

                 function transition() {
                     $('.animation.animate_section .et_pb_image:nth-child(' + i + ')').addClass('view_port_animation');
                     i++;
                 }

                 setInterval(function() {
                     if (i <= count) {
                         transition()
                     }
                 }, 60);
             } else {
                 $(this).removeClass('animate_section');
                 $(this).find('.et_pb_image').removeClass('view_port_animation');
             }


         });


     }, 100);


     $(window).on('resize scroll', function() {
         $('.animation').each(function() {
             if ($(this).isInViewport()) {
                 $(this).addClass('animate_section');

                 var count = $('.animate_section .et_pb_image').length;
                 var i = 1;

                 function transition() {
                     $('.animation.animate_section .et_pb_image:nth-child(' + i + ')').addClass('view_port_animation');
                     i++;
                 }

                 setInterval(function() {
                     if (i <= count) {
                         transition()
                     }
                 }, 60);
             }


         });


         //                For Columns

         $('.animation_col.elementor-section').each(function() {
             if ($(this).isInViewport()) {
                 $(this).addClass('animate_section_col');

                 var count = $('.animate_section_col .elementor-column').length;
                 var i = 1;

                 function transitionCol() {
                     $('.animation_col.elementor-section.animate_section_col .elementor-column:nth-child(' + i + ')').addClass('view_port_animation_col');
                     i++;
                 }

                 setInterval(function() {
                     if (i <= count) {
                         transitionCol()
                     }
                 }, 150);
             } else {
                 $(this).removeClass('animate_section_col');
                 $(this).find('.elementor-column').removeClass('view_port_animation_col');
             }

         });


     });

     //                For Columns

     $('.animation.et_pb_section').each(function() {
         if ($(this).isInViewport()) {
             $(this).addClass('animate_section');

             var count = $('.animate_section .et_pb_blurb ').length;
             var i = 1;

             function transitionCol() {
                 $('.animation.et_pb_section.animate_section .et_pb_blurb:nth-child(' + i + ')').addClass('view_port_animation');
                 i++;
             }

             setInterval(function() {
                 if (i <= count) {
                     transitionCol()
                 }
             }, 150);
         } else {
             $(this).removeClass('animate_section');
             $(this).find('.et_pb_blurb').removeClass('view_port_animation');
         }

     });


     $(window).on('resize scroll', function() {
         $('.animation.et_pb_section').each(function() {
             if ($(this).isInViewport()) {
                 $(this).addClass('animate_section');

                 var count = $('.animate_section .et_pb_blurb ').length;
                 var i = 1;

                 function transitionCol() {
                     $('.animation.et_pb_section.animate_section .et_pb_blurb:nth-child(' + i + ')').addClass('view_port_animation');
                     i++;
                 }

                 setInterval(function() {
                     if (i <= count) {
                         transitionCol()
                     }
                 }, 150);
             }

         });
     })


 })(jQuery);

 (function($) {


     var timeOutSlider = 1000;

     if ($('body').hasClass('et-fb')) {
         timeOutSlider = 7000;
     }

     setTimeout(function() {
         if ($('.jamie-home-hotel-rooms').length !== 0) {
             if ($(window).width() >= 481) {

                 // $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:last-child').clone().insertBefore($('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:first-child'));
                 $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:nth-child(2)').clone().insertAfter($('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:last-child'));
                 $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:nth-child(3)').clone().insertAfter($('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide:last-child'));
             }

             var showSlideItemsWidthRooms = 3;

             if ($(window).width() >= 768) {
                 showSlideItemsWidthRooms = 3;
             } else if ($(window).width() <= 767 && $(window).width() >= 481) {
                 showSlideItemsWidthRooms = 2;
             } else if ($(window).width() <= 480) {
                 showSlideItemsWidthRooms = 1;
             }

             var sliderContainerWidthRooms = $('.jamie-home-hotel-rooms .et_pb_row.slider_row').width();
             var sliderItemsCountRooms = $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide').length;
             var showItemsWidthRooms = sliderContainerWidthRooms / showSlideItemsWidthRooms;

             $('.jamie-home-hotel-rooms .et_pb_slider').width(sliderContainerWidthRooms);
             $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slides').width(sliderItemsCountRooms * showItemsWidthRooms);
             $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide').width(showItemsWidthRooms);


             $('.jamie-home-hotel-rooms .et-pb-slider-arrows a, .jamie-home-hotel-rooms .et-pb-controllers a').on('click', function(event) {
                 event.preventDefault();

                 if ($(window).width() <= 480) {
                     setTimeout(function() {
                         sliderSlideSize1Rooms = $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;

                         sliderSlideSize2Rooms = sliderSlideSize1Rooms * showItemsWidthRooms;

                         $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2Rooms + 'px, 0)');
                     }, 200)

                 } else {
                     setTimeout(function() {
                         var sliderSlideSize1Rooms = $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length ;
                         var sliderSlideSize2Rooms = sliderSlideSize1Rooms * showItemsWidthRooms;

                         $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2Rooms + 'px, 0)');

                     }, 200)
                 }
             });


             setInterval(function () {
                 if($('.jamie-home-hotel-rooms .et_pb_slider').hasClass('et_slider_auto')){
                     if ($(window).width() <= 480) {
                         setTimeout(function() {
                             sliderSlideSize1Rooms = $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;

                             sliderSlideSize2Rooms = sliderSlideSize1Rooms * showItemsWidthRooms;

                             $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2Rooms + 'px, 0)');
                         }, 200)

                     } else {
                         setTimeout(function() {
                             var sliderSlideSize1Rooms = $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                             var sliderSlideSize2Rooms = sliderSlideSize1Rooms * showItemsWidthRooms;

                             $('.jamie-home-hotel-rooms .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2Rooms + 'px, 0)');

                         }, 200)
                     }
                 }

             },50)

         }

         if ($('.jamie-home-hotel-offers').length !== 0) {
             if ($(window).width() >= 481) {
                 $('.jamie-home-hotel-offers .et_pb_slider').each(function () {
                     $(this).find('.et_pb_slide:nth-child(2)').clone().insertAfter($(this).find('.et_pb_slide:last-child'));
                     $(this).find('.et_pb_slide:nth-child(3)').clone().insertAfter($(this).find('.et_pb_slide:last-child'));
                 })

             }

             var showSlideItemsWidth = 4;

             if ($(window).width() >= 981) {
                     $('.jamie-home-hotel-offers .et_pb_slider').each(function () {
                         $(this).find('.et_pb_slide:nth-child(4)').clone().insertAfter($(this).find('.et_pb_slide:last-child'));
                     })
                 showSlideItemsWidth = 4;
             } else if ($(window).width() <= 980 && $(window).width() >= 768) {
                 showSlideItemsWidth = 3;
             } else if ($(window).width() <= 767 && $(window).width() >= 481) {
                 showSlideItemsWidth = 2;
             } else if ($(window).width() <= 480) {
                 showSlideItemsWidth = 1;
             }

             $('.jamie-home-hotel-offers').each(function () {
                 var sliderContainerWidth = $(this).find('.et_pb_row.slider_row').width();
                 var sliderItemsCount = $(this).find('.et_pb_slider .et_pb_slide').length;
                 var showItemsWidth = sliderContainerWidth / showSlideItemsWidth;


                 $(this).find('.et_pb_slider').width(sliderContainerWidth);
                 $(this).find('.et_pb_slider .et_pb_slides').width(sliderItemsCount * showItemsWidth);
                 $(this).find('.et_pb_slider .et_pb_slide').width(showItemsWidth);
             });

             $('.jamie-home-hotel-offers .et-pb-slider-arrows a, .jamie-home-hotel-offers .et-pb-controllers a').on('click', function(event) {
                 event.preventDefault();
                 var thisItem = $(this);

                 var sliderContainerWidth = $(this).parent().parent().find('.et_pb_slide').width();
                 var sliderItemsCount = $(this).parent().parent().find('.et_pb_slide').length;
                 var showItemsWidth = sliderContainerWidth / showSlideItemsWidth;




                     setTimeout(function() {
                         var sliderSlideSize1 = thisItem.closest('.et_pb_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                         var sliderSlideSize2 = sliderSlideSize1 * sliderContainerWidth;
                         con
                         thisItem.closest('.et_pb_slider').find('.et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');


                     }, 200)

             });


             setInterval(function () {
                 if($('.jamie-home-hotel-offers .et_pb_slider').hasClass('et_slider_auto')){
                     if ($(window).width() <= 480) {
                         setTimeout(function() {
                             sliderSlideSize1 = $('.jamie-home-hotel-offers .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length;

                             sliderSlideSize2 = sliderSlideSize1 * showItemsWidth;

                             $('.jamie-home-hotel-offers .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');
                         }, 200)

                     } else {
                         setTimeout(function() {
                             var sliderSlideSize1 = $('.jamie-home-hotel-offers .et_pb_slider .et_pb_slide.et-pb-active-slide').prevAll().length - 1;
                             var sliderSlideSize2 = sliderSlideSize1 * showItemsWidth;

                             $('.jamie-home-hotel-offers .et_pb_slider .et_pb_slides').css('transform', 'translate(-' + sliderSlideSize2 + 'px, 0)');

                         }, 200)
                     }
                 }
             },50)

         }
     }, timeOutSlider);
 })
 (jQuery);