(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPortfolioGoodOars  = 1000;

    if (isIE()) {
        ragnarPortfolioGoodOars = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPortfolioGoodOars = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_portfolio_good_oars').length !== 0){
            $('.ragnar_portfolio_good_oars .et_pb_posts article.et_pb_post').each(function (){
                $('<div class="right_box"></div>').insertBefore($(this).find('.entry-title'))
                $(this).find('.entry-title').appendTo($(this).find('.right_box'))
                $(this).find('.post-meta').appendTo($(this).find('.right_box'))
            })

            $('.ragnar_portfolio_good_oars .et_pb_posts article.et_pb_post').each(function (){
                if($(window).scrollTop() > $(this).offset().top - ($(window).height() - 100)){
                    $(this).addClass('image_visible')
                }else{
                    $(this).removeClass('image_visible')

                }

                if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight()){
                    $(this).addClass('visible')
                }else{
                    $(this).removeClass('visible')

                }
            })
            $(window).scroll(function (){


                $('.ragnar_portfolio_good_oars .et_pb_posts article.et_pb_post').each(function (){
                    if($(window).scrollTop() > $(this).offset().top - ($(window).height() - 100)){
                        $(this).addClass('image_visible')
                    }

                    if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight()){
                        $(this).addClass('visible')
                    }else{
                        $(this).removeClass('visible')

                    }
                })

            })




            setTimeout(function () {

                $('.ragnar_portfolio_good_oars .et_pb_posts').prepend($('<div class="projects_filter"><ul><li class="active_menu_item" postClass="all">All</li></ul></div>'));
                var elements = [];

                $('.ragnar_portfolio_good_oars article').each(function () {
                    $(this).addClass('all');

                    elements.push($(this).find('.post-meta a[rel="tag"]:first-child').text());
                    $(this).addClass($(this).find('.post-meta a[rel="tag"]:first-child').text());

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

                for (var i = 0; i < elements.length; i++) {
                    $('<li postClass="' + elements[i] + '">' + elements[i] + '</li>').appendTo($('.ragnar_portfolio_good_oars .projects_filter ul'))
                }

            }, 500);


            setTimeout(function () {
                var allWord = $('.ragnar_portfolio_good_oars .et_pb_posts').attr('id');
                if(allWord){
                    $('.ragnar_portfolio_good_oars .et_pb_posts .projects_filter li:first-child').text(allWord);
                }


                $('.ragnar_portfolio_good_oars .projects_filter ul li').on('click', function () {
                    $('.ragnar_portfolio_good_oars .projects_filter ul li').removeClass('active_menu_item');
                    $(this).addClass('active_menu_item');
                    var attrActiveItem = $(this).attr('postClass');

                    $('.ragnar_portfolio_good_oars article').each(function () {
                        if ($(this).hasClass(attrActiveItem)) {
                            $(this).show('slow');
                            $(this).addClass('image_visible')
                            $(this).addClass('visible')
                        } else {
                            $(this).hide('slow');
                        }

                      
                    })
                });
            },600);




        }

    }, ragnarPortfolioGoodOars)

})(jQuery);