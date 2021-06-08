(function ($) {


    var ctaTimeOut = 0;

    if ($('body').hasClass('et-fb')) {
        ctaTimeOut = 7000;
    }

    setTimeout(function () {
        //    Blog Scripts ****************************************************


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

        $('<div class="button_hover"></div>').appendTo($('.blog1_venus .left_blogs article .post-content'));
        $('<div class="more_link_cont"></div>').appendTo($('.blog1_venus .left_blogs article .post-content'));

        $('.blog1_venus .left_blogs article .post-content .more-link').appendTo($('.blog1_venus .left_blogs article .post-content .more_link_cont'));
        $('.blog1_venus .left_blogs article .post-content .button_hover').appendTo($('.blog1_venus .left_blogs article .post-content .more_link_cont'));

        var blogBg = $('.blog1_venus .left_blogs article .entry-featured-image-url img').attr('src');
        $('.blog1_venus .left_blogs').css('background-image', 'url(' + blogBg + ')');

        $('.blog1_venus .left_blogs article .entry-featured-image-url').remove();

        setInterval(function () {
        $('.blog1_venus article .post-meta, .blog2_venus article .post-meta, .blog3_venus article .post-meta').each(function () {
            if(!$(this).hasClass('added')) {
                var author = $(this).find('span.author')[0];
                var date = $(this).find('span.published')[0];
                var categories = $(this).find('a[rel="tag"]').toArray();

                var dateDay = $(this).find('.published').text();
                var html = "";
                if (dateDay) {
                    date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                    html = date;
                }

                if (author) {
                    if (dateDay) {
                        html = date + ' | ';
                        html += author.outerHTML;
                    } else {
                        html = author.outerHTML;
                    }
                }

                if (categories.length !== 0) {
                    categories = $.map(categories, function (element) {
                        return element.outerHTML;
                    });
                    categories = categories.join(', ');
                    html += "<span class='categories'>" + categories + "</span>";
                }


                $(this).html(html);
                $(this).addClass('added');
            }

        });

            $('.blog1_venus article, .blog2_venus article, .blog3_venus article').each(function () {
                if(!$(this).hasClass('added-cats')){
                    $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title'));
                    $(this).addClass('added-cats');
                }
            });

        },100)


        $('.blog3_venus article').each(function () {
            $(this).find('.post-meta').insertAfter($(this).find('.post-content'));
        });

        $('.blog1_venus article, .blog2_venus article, .blog3_venus article').each(function () {
            $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title'));
        });


        // $('.blog2_venus article .post-content p, .blog3_venus article .post-content p').each(function () {
        //     $(this).succinct({
        //         size: 60
        //     });
        // });

        $('.blog2_venus article h2 a').each(function () {
            $(this).succinct({
                size: 50
            });
        });


        var titleHeight = 0;
        setTimeout(function () {
            $('.blog2_venus article').each(function () {
                var thisTitleHeight = $(this).find('h2.entry-title').height();
                if (thisTitleHeight > titleHeight) {
                    titleHeight = thisTitleHeight;
                }
            });

            $('.blog2_venus article h2.entry-title').height(titleHeight);
        }, 500);
        setTimeout(function () {

        $('.blog3_venus .et_pb_posts').prepend($('<div class="blog_filter"><ul><li class="active_menu_item" postClass="all">All</li></ul></div>'));
        var elements = [];

            $('.blog3_venus article').each(function () {
            elements.push($(this).find('.categories a:first-child').text());
            $(this).addClass($(this).find('.categories a:first-child').text());

        });

        function ArrNoDupe(a) {
            var temp = {};
            for (var i = 0; i < a.length; i++)
                temp[a[i]] = true;
            var r = [];
            for (var k in temp)
                r.push(k);
            return r;
        }

        elements = ArrNoDupe(elements);
        //    elements = $.unique(elements);;

        for (var i = 0; i < elements.length; i++) {
            $('<li postClass="' + elements[i] + '">' + elements[i] + '</li>').appendTo($('.blog3_venus .blog_filter ul'))
        }

        }, 500);




        setTimeout(function () {
            var titleHeightBlog3 = 0;
            $('.blog3_venus article').each(function () {
                var thisTitleHeight3 = $(this).find('h2.entry-title').height();
                if (thisTitleHeight3 > titleHeightBlog3) {
                    titleHeightBlog3 = thisTitleHeight3;
                }
            })
            $('.blog3_venus article h2.entry-title').height(titleHeightBlog3);
        }, 500);

        setTimeout(function () {
            var allWord = $('.blog3_venus .et_pb_posts').attr('id');
           // console.log(allWord);
            if(allWord){
                $('.blog3_venus .et_pb_posts .blog_filter li:first-child').text(allWord);
            }
        },600);

        setInterval(function () {

                $('.blog3_venus article').each(function () {
                    $(this).addClass('all');

                    if (!$(this).hasClass('added')) {



                        $(this).find('.post-meta').each(function () {
                            var author = $(this).find('span.author')[0];
                            var date = $(this).find('span.published')[0];
                            var categories = $(this).find('a[rel="tag"]').toArray();

                            var dateDay = $(this).find('.published').text();
                            var html = "";
                            if (dateDay) {
                                date = '<span class="published"><span class="day"> ' + dateDay + '</span></span>';
                                html = date;
                            }

                            if (author) {
                                if (dateDay) {
                                    html = date + ' | ';
                                    html += author.outerHTML;
                                } else {
                                    html = author.outerHTML;
                                }
                            }

                            if (categories.length !== 0) {
                                categories = $.map(categories, function (element) {
                                    return element.outerHTML;
                                });
                                categories = categories.join(', ');
                                html += "<span class='categories'>" + categories + "</span>";
                            }


                            $(this).html(html);
                        })


                        $(this).find('.post-meta').insertAfter($(this).find('.post-content'));


                        $(this).find('.post-meta .categories').insertBefore($(this).find('h2.entry-title'));


                        // $(this).find('.post-content p').each(function () {
                        //     $(this).succinct({
                        //         size: 60
                        //     });
                        // });


                        $(this).addClass($(this).find('.categories a:first-child').text()).addClass('all');

                        $(this).find('h2 a').each(function () {
                            $(this).succinct({
                                size: 60
                            });
                        });


                        //    Blog 3 Added hover Images Container and


                        var imageClass = 1;
                        var postsLenght = 6;

                        $(this).prepend($('<div class="images_cont"></div>'));
                        for (imageClass = 1; imageClass <= postsLenght; imageClass++) {
                            $('<div class="hover_image hover_image' + imageClass + '"></div>').appendTo($(this).find('.images_cont'));

                            $('.blog3_venus .hover_images_container .hover_img' + imageClass + ' img').clone().appendTo($(this).find('.hover_image' + imageClass))
                        }


                        $('.blog3_venus .pagination a').on('click', function () {
                            $('.blog3_venus .blog_filter ul li').removeClass('active_menu_item');
                            $('.blog3_venus .blog_filter ul li[postclass="all"]').addClass('active_menu_item');
                            $('.blog3_venus article').show('slow');
                        })


                        $(this).addClass('added');
                    }

                })


                $('.blog3_venus .pagination a').on('click', function () {
                    setTimeout(function () {
                        $('.blog3_venus article h2.entry-title').removeClass('added');
                    }, 300)

                })

                if (!$('.blog3_venus article h2.entry-title').hasClass('added')) {
                    setTimeout(function () {
                        var elements = [];
                        $('.blog3_venus article').each(function () {


                            elements.push($(this).find('.categories a:first-child').text());


                            function ArrNoDupe(a) {
                                var temp = {};
                                for (var i = 0; i < a.length; i++)
                                    temp[a[i]] = true;
                                var r = [];
                                for (var k in temp)
                                    r.push(k);
                                return r;
                            }

                            elements = ArrNoDupe(elements);
                            //    elements = $.unique(elements);

                        });


                        $('.blog3_venus .blog_filter ul li:not([postClass="all"])').remove();

                        for (var i = 0; i < elements.length; i++) {

                            $('<li postClass="' + elements[i] + '">' + elements[i] + '</li>').appendTo($('.blog3_venus .blog_filter ul'))
                        }


                        //    Blog 3 Filter Menu Click

                        $('.blog3_venus .blog_filter ul li').on('click', function () {
                            $('.blog3_venus .blog_filter ul li').removeClass('active_menu_item');
                            $(this).addClass('active_menu_item');
                            var attrActiveItem = $(this).attr('postClass');

                          //  attrClass = 'category-'+ attrActiveItem.replace(/\s+/g, '-').toLowerCase();
                            $('.blog3_venus article').each(function () {
                                if ($(this).hasClass(attrActiveItem)) {
                                    $(this).show('slow');
                                } else {
                                    $(this).hide('slow');
                                }
                            })
                        });

                        $('.blog3_venus article h2.entry-title').addClass('added');
                    }, 200)
                }


            },
            200
        )

        //    End Blog Scripts **************************************************
    }, ctaTimeOut);

    setTimeout(function(){ $(window).trigger('resize');}, 500);
    setTimeout(function(){ $(window).trigger('resize');}, 1000);
    setTimeout(function(){ $(window).trigger('resize');}, 1500);
    setTimeout(function(){ $(window).trigger('resize');}, 2000);

})(jQuery);