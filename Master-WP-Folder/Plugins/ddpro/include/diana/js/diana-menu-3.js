(function ($) {

//    Menu 2

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

    var menu3TimeOut = 1500;

    if($('body').hasClass('et-fb')){
        menu3TimeOut = 10000
    }








    setTimeout(function () {
        if($('.menu3_page_menu').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }
        $('.et_pb_section.menu3_page_menu').appendTo('.menu3_top_section .et_pb_column_1_2 ');
        $("body.et-fb #et-fb-app-frame").contents().find(".et_pb_section.menu3_page_menu").appendTo($("body.et-fb #et-fb-app-frame").contents().find(".menu3_top_section .et_pb_column_1_2"));
    },menu3TimeOut)




    setTimeout(function () {



        if(!$('body').hasClass('et-tb')){
            $('.menu_item').each(function () {
                var itemId = $(this).attr('id');
                $('.menu3_top_section .fullwidth-menu li').each(function () {
                    if ($(this).hasClass(itemId)) {
                        $('<ul class="sub-menu mega"></ul>').appendTo($(this));
                        $('#' + itemId + '.menu_item').addClass('moved').appendTo($(this).find('ul.sub-menu'));
                    }


                })
            })

            $('.menu_item:not(".moved")').remove();
        }

        if($(window).width() <= 980){
            var mobileMenu = $('.menu3_top_section .et_mobile_nav_menu a span.mobile_menu_bar').html();
            $('.menu3_top_section .et_mobile_nav_menu a').html('');
            $('<span class="mobile_menu_bar"></span>').appendTo($('.menu3_top_section .et_mobile_nav_menu a'));
            $('.menu3_top_section .et_mobile_nav_menu a span.mobile_menu_bar').html(mobileMenu);

            $('<span class="sub_menu_close_icon">Q</span>').appendTo('.menu3_top_section .fullwidth-menu-nav .sub-menu.mega');
            $('.menu3_top_section .et_mobile_nav_menu a span.mobile_menu_bar').on('click', function (e) {
                e.preventDefault();

                if($('.menu3_top_section .fullwidth-menu-nav').css('display') === 'block'){
                    $('.menu3_top_section .fullwidth-menu-nav').hide('slow');
                    $('.menu3_top_section .et_mobile_nav_menu a span.mobile_menu_bar').removeClass('opened');
                }else  if($('.menu3_top_section .fullwidth-menu-nav').css('display') === 'none'){
                    $('.menu3_top_section .fullwidth-menu-nav').show('slow');
                    $('.menu3_top_section .et_mobile_nav_menu a span.mobile_menu_bar').addClass('opened');
                }
            })

            var windowHeight = $(window).height();
            var menuHeight = $('.menu1_logo_section').height();
            console.log(windowHeight);
            console.log(menuHeight);
            var menuMinHeight = windowHeight - menuHeight;
            $('.menu3_top_section .et_pb_fullwidth_menu > .et_pb_row .fullwidth-menu-nav .fullwidth-menu .sub-menu.mega').css('min-height', menuMinHeight + 'px')
            $('.menu3_top_section .fullwidth-menu-nav').css('min-height', menuMinHeight + 'px')
            $('.menu3_top_section .fullwidth-menu > li > a').on('click', function () {
                $('.menu3_top_section .fullwidth-menu-nav .sub-menu.mega').removeClass('closed');
            })

            $('.menu3_top_section .fullwidth-menu-nav .sub_menu_close_icon').on('click', function () {
                $(this).parent('.sub-menu.mega').addClass('closed');
            })


            $('.menu3_page_menu ').insertAfter('.menu3_top_section > .et_pb_row ');

            $('#Pricing .et_pb_column_1_4').insertAfter($('#Pricing .et_pb_column_3_4'));

            $('#Pricing .et_pb_pricing_table ').each(function () {
                $(this).find('span.et_pb_best_value').insertBefore($(this).find('ul.et_pb_pricing'));
            })

        }

        if($(window).width() <= 767){
            $(' .menu3_top_section #Solutions.menu_item .et_pb_promo h2').on('click', function () {
                if($(this).parent().find('ul').css('display') === "none"){
                    $(this).parent().find('ul').show('slow');
                    $(this).closest('.et_pb_promo').find('.et_pb_button_wrapper').show('slow');
                }else{
                    $(this).parent().find('ul').hide('slow');
                    $(this).closest('.et_pb_promo').find('.et_pb_button_wrapper').hide('slow');
                }
            })

            $(' .menu3_top_section #Pricing.menu_item .et_pb_pricing_table').on('click', function () {
                if($(this).find('.et_pb_pricing_content').css('display') === "none"){
                    $(this).find('.et_pb_pricing_content').show('slow');
                }else{
                    $(this).find('.et_pb_pricing_content').hide('slow');
                }
            })
        }



        $('.menu3_top_section .search_and_social_icons .et_pb_blurb ').on('click', function () {
            if ($('.menu3_top_section .et_pb_search').css('display') === "none") {
                $('.menu3_top_section .et_pb_search').show('slow');
            } else {
                $('.menu3_top_section .et_pb_search').hide('slow');
            }
        })

        if($('body:not(.et-fb) #custom-ddp-menu .menu3_top_section').hasClass('fixed')){
            $('body:not(.et-fb) #custom-ddp-menu').addClass('fixed');
            var menuHeight = $('#custom-ddp-menu').height();
            $('#et-main-area').css('padding-top', menuHeight + 'px');
        }


        //    News



        $('#News .et_pb_post .post-meta').each(function () {
            var author = $(this).find('span.author')[0];
            var date = $(this).find('span.published')[0];
            var categories = $(this).find('a[rel="category tag"]').toArray();

            var dateDay = $(this).find('.published').text();
            var html = "";

            var month = dateDay.replace(/\d+/g, '');
            var day = parseInt(dateDay);





            if (categories.length !== 0) {
                categories = $.map(categories, function (element) {
                    return element.outerHTML;
                });
                categories = categories.join(', ');
                html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
            }

            if (dateDay) {
                var topDate = '<span class="top_date"><span class="day">' + day +'</span><span class="month">' + month + '</span></span>';

                date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                html += date + topDate;
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




        $('#News .et_pb_post').each(function () {
            $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
            $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
        });




        setInterval(function () {
            if(!$('#News .et_pb_posts article').hasClass('done')){
                $('#News .et_pb_post .post-meta').each(function () {
                    var author = $(this).find('span.author')[0];
                    var date = $(this).find('span.published')[0];
                    var categories = $(this).find('a[rel="category tag"]').toArray();

                    var dateDay = $(this).find('.published').text();
                    var html = "";

                    var month = dateDay.replace(/\d+/g, '');
                    var day = parseInt(dateDay);





                    if (categories.length !== 0) {
                        categories = $.map(categories, function (element) {
                            return element.outerHTML;
                        });
                        categories = categories.join(', ');
                        html += "<span class='categories'>" + categories + "</span><span class='line'>/</span>";
                    }

                    if (dateDay) {
                        var topDate = '<span class="top_date"><span class="day">' + day +'</span><span class="month">' + month + '</span></span>';

                        date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                        html += date + topDate;
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



                $('#News .et_pb_post').each(function () {
                    $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
                    $(this).find('.published').insertAfter($(this).find('.entry-featured-image-url img'));
                });



                $('#News .et_pb_posts article').addClass('done');
            }
        },50);


    }, menu3TimeOut)

})(jQuery);