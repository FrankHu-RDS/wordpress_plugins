(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieBlogsTimeOut = 1500;

    if (isIE()) {
        freddieBlogsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieBlogsTimeOut = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_drowse_blog ').length !== 0) {
            setInterval(function () {
                $('.freddie_drowse_blog .et_pb_posts').each(function () {
                    if(!$(this).find('article').hasClass('done')){
                        $(this).find('.et_pb_post ').each(function () {
                            $('<div class="blog_info"></div>').appendTo($(this));
                            $(this).find('h2.entry-title').appendTo($(this).find('.blog_info'));
                            $(this).find('.post-meta').appendTo($(this).find('.blog_info'));
                            $(this).find('.post-content').appendTo($(this).find('.blog_info'));
                        });


                        $(this).find('.et_pb_post ').each(function () {

                            $(this).find('h2.entry-title a').succinct({
                                size: 55
                            });
                        });

                        $(this).find('.et_pb_post ').each(function () {

                            $(this).find('h2.entry-title a').succinct({
                                size: 55
                            });
                        });

                        $(this).find(' article').addClass('done')
                    }
                });

            },50);


        }


        if ($('.freddie_hard_life_blog ').length !== 0) {

            var hardBlogHeight = 0;
            $('.freddie_hard_life_blog .et_pb_posts .et_pb_post ').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));

                if(hardBlogHeight < $(this).height()){
                    hardBlogHeight = $(this).height();
                }
            })

            $('.freddie_hard_life_blog .et_pb_posts .et_pb_post').height(hardBlogHeight);

        }

        if ($('.freddie_hot_and_cold_blog ').length !== 0) {
            var postHeight = 0;
            $('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post ').each(function () {
                if(postHeight < $(this).outerHeight()){
                    postHeight = $(this).outerHeight();
                }
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));



                if(!$(this).hasClass('done')){
                    $(this).find(' a.more-link').prepend($('<div class="left"></div><div class="center"></div><div class="right"></div>'));
                    $(this).addClass('done')
                }
            })

            $('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post ').outerHeight(postHeight);






            $('.freddie_hot_and_cold_blog .pagination a').on('click', function () {
                setTimeout(function () {
                    $('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post').removeClass('buttonHover')
                },2000)

            })

            setInterval(function () {

                $('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post ').each(function () {
                    if(!$(this).hasClass('done')){
                        $(this).find(' a.more-link').prepend($('<div class="left"></div><div class="center"></div><div class="right"></div>'));
                        $(this).addClass('done')
                    }
                })

                if(!$('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post').hasClass('buttonHover')){
                    var tl = new TimelineLite;
                    $('.freddie_hot_and_cold_blog a.more-link').hover(
                        function () {
                            var jealousyLeft = $(this).find('.left');
                            var jealousyCenter = $(this).find('.center');
                            var jealousyRight = $(this).find('.right');


                            tl.to(jealousyRight, 0.4, {
                                width: "100%",
                                x: "25px"
                            }, 0)
                                .to(jealousyCenter, 0.4, {
                                    width: "100%"
                                }, 0)
                                .to(jealousyCenter, 0.1, {
                                    scaleX: 0
                                }, 0.5)
                                .to(jealousyLeft, 0.1, {
                                    width: "100%",
                                    x: "25px"
                                }, 0.5)

                        }, function () {
                            tl.clear();
                            var jealousyLeft = $(this).find('.left');
                            var jealousyCenter = $(this).find('.center');
                            var jealousyRight = $(this).find('.right');

                            var tl2 = new TimelineLite;
                            tl2.to(jealousyRight, 0.1, {
                                width: "50px",
                                x: "-25px"
                            }, 0.3)
                                .to(jealousyCenter, 0.3, {
                                    scaleX: 1
                                }, 0)
                                .to(jealousyCenter, 0.1, {
                                    width: "0%"
                                }, 0.3)
                                .to(jealousyLeft, 0.3, {
                                    width: "50px",
                                    x: "-25px"
                                }, 0)

                        }
                    )


                    $('.freddie_hot_and_cold_blog .et_pb_posts .et_pb_post').addClass('buttonHover')
                }

            },50)
        }


    }, freddieBlogsTimeOut);

})(jQuery);