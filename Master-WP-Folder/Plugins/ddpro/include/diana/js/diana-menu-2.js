(function($) {

    //    Menu 2

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
        }
    });

    var menu2TimeOut = 1000;

    if ($('body').hasClass('et-fb')) {
        menu2TimeOut = 10000
    }


    setTimeout(function() {
        $('.et_pb_section.menu2_page_menu').appendTo('.menu2_top_section .et_pb_column_1_2 ');
    }, menu2TimeOut)


    setTimeout(function() {
        if($('.menu2_top_section').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }


        if (!$('body').hasClass('et-tb')) {
            $('.menu_item').each(function() {
                var itemId = $(this).attr('id');
                $('.menu2_top_section .fullwidth-menu li').each(function() {
                    if ($(this).hasClass(itemId)) {
                        $('<ul class="sub-menu mega"></ul>').appendTo($(this));
                        $('#' + itemId + '.menu_item').addClass('moved').appendTo($(this).find('ul.sub-menu'));
                    }


                })
            })

            $('.menu_item:not(".moved")').remove();
        }
        $('.menu2_page_menu .fullwidth-menu #News .et_pb_newsletter p.et_pb_newsletter_field.et_pb_signup_custom_field').insertAfter($('.menu2_page_menu .fullwidth-menu #News .et_pb_newsletter p.et_pb_newsletter_button_wrap'));
        $('.menu2_page_menu .fullwidth-menu #News .et_pb_button_module_wrapper').appendTo($('.menu2_page_menu .fullwidth-menu #News .et_pb_newsletter p.et_pb_newsletter_field.et_pb_signup_custom_field .et_pb_contact_field_checkbox label'));


        if ($(window).width() <= 980) {
            var mobileMenu = $('.menu2_top_section .et_mobile_nav_menu a span.mobile_menu_bar').html();
            $('.menu2_top_section .et_mobile_nav_menu a').html('');
            $('<span class="mobile_menu_bar"></span>').appendTo($('.menu2_top_section .et_mobile_nav_menu a'));
            $('.menu2_top_section .et_mobile_nav_menu a span.mobile_menu_bar').html(mobileMenu);

            $('<span class="sub_menu_close_icon">Q</span>').appendTo('.menu2_top_section .fullwidth-menu-nav .sub-menu.mega');
            $('.menu2_top_section .et_mobile_nav_menu a span.mobile_menu_bar').on('click', function(e) {
                e.preventDefault();

                if ($('.menu2_top_section .fullwidth-menu-nav').css('display') === 'block') {
                    $('.menu2_top_section .fullwidth-menu-nav').hide('slow');
                    $('.menu2_top_section .et_mobile_nav_menu a span.mobile_menu_bar').removeClass('opened');
                } else if ($('.menu2_top_section .fullwidth-menu-nav').css('display') === 'none') {
                    $('.menu2_top_section .fullwidth-menu-nav').show('slow');
                    $('.menu2_top_section .et_mobile_nav_menu a span.mobile_menu_bar').addClass('opened');
                }
            })

            var windowHeight = $(window).height();
            var menuHeight = $('.menu1_logo_section').height();
            console.log(windowHeight);
            console.log(menuHeight);
            var menuMinHeight = windowHeight - menuHeight;
            $('.menu2_top_section .et_pb_fullwidth_menu > .et_pb_row .fullwidth-menu-nav .fullwidth-menu .sub-menu.mega').css('min-height', menuMinHeight + 'px')
            $('.menu2_top_section .fullwidth-menu-nav').css('min-height', menuMinHeight + 'px')
            $('.menu2_top_section .fullwidth-menu > li > a').on('click', function() {
                $('.menu2_top_section .fullwidth-menu-nav .sub-menu.mega').removeClass('closed');
            })

            $('.menu2_top_section .fullwidth-menu-nav .sub_menu_close_icon').on('click', function() {
                $(this).parent('.sub-menu.mega').addClass('closed');
            })


            $('.menu2_page_menu').insertAfter('.menu2_top_section > .et_pb_row ');
        }

        if ($(window).width() <= 767) {
            $('.menu2_page_menu #News.menu_item .et_pb_text').on('click', function() {
                if ($(' .menu2_page_menu #News .et_pb_posts').css('display') === "none") {
                    $(' .menu2_page_menu #News .et_pb_posts').show('slow');
                } else {
                    $(' .menu2_page_menu #News .et_pb_posts').hide('slow');
                }
            })
        }


        $('.menu2_top_section .search_and_social_icons .et_pb_blurb ').on('click', function() {
            if ($('.menu2_top_section .et_pb_search').css('display') === "none") {
                $('.menu2_top_section .et_pb_search').show('slow');
            } else {
                $('.menu2_top_section .et_pb_search').hide('slow');
            }
        })

        if ($('body:not(.et-fb) #custom-ddp-menu .menu2_top_section').hasClass('fixed')) {
            $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
            var menuHeight = $('#custom-ddp-menu').height();
            $('#et-main-area').css('padding-top', menuHeight + 'px');
        }

        $('.menu2_top_section #Cases .et_pb_blurb:first-child').addClass('active');
        $('.menu2_top_section #Cases .et_pb_blurb').hover(
            function() {
                $('.menu2_top_section #Cases .et_pb_blurb').removeClass('active');
                $(this).addClass('active');
                var itemBg = $(this).find('.et_pb_main_blurb_image img').attr('src');

                $('.menu2_top_section #Cases .et_pb_image img').attr('src', itemBg);
                $('.menu2_top_section #Cases .et_pb_image img').attr('srcset', '');
            }
        )





        //    News



        $('.menu2_page_menu #News .et_pb_post .post-meta').each(function() {
            var author = $(this).find('span.author')[0];
            var date = $(this).find('span.published')[0];
            var categories = $(this).find('a[rel="category tag"]').toArray();

            var dateDay = $(this).find('.published').text();
            var html = "";

            // var month = dateDay.replace(/\d+/g, '');
            // var day = parseInt(dateDay);





            if (categories.length !== 0) {
                categories = $.map(categories, function(element) {
                    return element.outerHTML;
                });
                categories = categories.join(', ');
                html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
            }

            if (dateDay) {
                // var topDate = '<span class="top_date">'+ dateDay +'</span>';

                date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                html += date;
            }

            if (author) {
                if (dateDay) {
                    html = date + '<span class="line">|</span>';
                    html += author.outerHTML;
                } else {
                    html = author.outerHTML;
                }
            }




            $(this).html(html);


        });

        setInterval(function() {
            if (!$('.menu2_page_menu #News .et_pb_posts article').hasClass('done')) {
                $('.menu2_page_menu #News .et_pb_post .post-meta').each(function() {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];
                    var categories = $(this).find('a[rel="category tag"]').toArray();

                    var dateDay = $(this).find('.published').text();
                    var html = "";

                    var month = dateDay.replace(/\d+/g, '');
                    var day = parseInt(dateDay);





                    if (categories.length !== 0) {
                        categories = $.map(categories, function(element) {
                            return element.outerHTML;
                        });
                        categories = categories.join(', ');
                        html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
                    }

                    if (dateDay) {
                        // var topDate = '<span class="top_date"><span class="day">' + day +'</span><span class="month">' + month + '</span></span>';

                        date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                        html += date;
                    }

                    if (author) {
                        if (dateDay) {
                            html = date + '<span class="line">|</span>';
                            html += author.outerHTML;
                        } else {
                            html = author.outerHTML;
                        }
                    }




                    $(this).html(html);


                });




                $('.menu2_page_menu #News .et_pb_posts article').addClass('done');


            }
        }, 50);



        $('.menu2_page_menu #News .et_pb_posts article').each(function() {
            $('<div class="post-info"></div>').appendTo($(this));
            $(this).find('h2.entry-title').appendTo($(this).find('.post-info'));
            $(this).find('.post-meta').appendTo($(this).find('.post-info'));
        });

        var lengthFilters = $(' .menu2_page_menu #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_item').length;
        for (var i = 4; i <= lengthFilters; i++) {
            $('.menu2_page_menu #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_item:nth-child(' + i + ')').addClass('delete');

        }
        $('.menu2_page_menu #Portfolio .et_pb_filterable_portfolio .et_pb_portfolio_item.delete').remove();


        $('.menu2_page_menu #Portfolio .et_pb_portfolio_item').each(function() {
            $('<div class="project-info"></div>').appendTo($(this));
            $(this).find('h2.et_pb_module_header').appendTo($(this).find('.project-info'));
            $(this).find('.myexcerpt').appendTo($(this).find('.project-info'));
        });

    }, menu2TimeOut)

})(jQuery);