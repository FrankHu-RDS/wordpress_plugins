(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieEventTimeOut = 500;

    if (isIE()) {
        freddieEventTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieEventTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_event').length !== 0){
            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').on('click', function () {
                var pageLink = $(this).find('.portfolio_image').attr('href');
                window.location.href = pageLink;
            })
            $('.freddie_event:not(.freddie_event_simple ) .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {
                $('<div class="line line_right"></div>').appendTo($(this).find('.portfolio_image'));
                $('<div class="line line_top"></div>').appendTo($(this).find('.portfolio_image'));
                $('<div class="line line_left"></div>').appendTo($(this).find('.portfolio_image'));
                $('<div class="line line_bottom"></div>').appendTo($(this).find('.portfolio_image'));
            })


            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {


                if($(this).find('.et_portfolio_image').height() >= $(this).find('.et_portfolio_image img').height()){
                    $(this).find('.et_portfolio_image').addClass('small_height');
                }else{
                    $(this).find('.et_portfolio_image').addClass('big_height');
                }
            })


            var portfolioHeight = 0;
            var portfolioTitleHeight = 0;

            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {
                if($(this).find('.myexcerpt').height() >= portfolioHeight){
                    portfolioHeight = $(this).find('.myexcerpt').height()
                }
                if($(this).find('h2.et_pb_module_header').height() >= portfolioTitleHeight){
                    portfolioTitleHeight = $(this).find('h2.et_pb_module_header').height()
                }
            })

            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item .myexcerpt').height(portfolioHeight);
            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item h2.et_pb_module_header').height(portfolioTitleHeight);


            $('.freddie_event .et_pb_portfolio .et_pb_portfolio_filters .et_pb_portfolio_filter').on('click', function () {
                setTimeout(function () {

                    if($('.freddie_event:not(.freddie_event_simple ) .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item .line').length === 0){
                        $('.freddie_event:not(.freddie_event_simple ) .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {
                            $('<div class="line line_right"></div>').appendTo($(this).find('.portfolio_image'));
                            $('<div class="line line_top"></div>').appendTo($(this).find('.portfolio_image'));
                            $('<div class="line line_left"></div>').appendTo($(this).find('.portfolio_image'));
                            $('<div class="line line_bottom"></div>').appendTo($(this).find('.portfolio_image'));
                        })
                    }



                    $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {


                        if($(this).find('.et_portfolio_image').height() >= $(this).find('.et_portfolio_image img').height()){
                            $(this).find('.et_portfolio_image').addClass('small_height');
                        }else{
                            $(this).find('.et_portfolio_image').addClass('big_height');
                        }
                    })


                    $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item ').each(function () {
                        if($(this).find('.myexcerpt').height() >= portfolioHeight){
                            portfolioHeight = $(this).find('.myexcerpt').height()
                        }
                        if($(this).find('h2.et_pb_module_header').height() >= portfolioTitleHeight){
                            portfolioTitleHeight = $(this).find('h2.et_pb_module_header').height()
                        }
                    })

                    $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item .myexcerpt').height(portfolioHeight);
                    $('.freddie_event .et_pb_portfolio .et_pb_portfolio_items_wrapper .et_pb_portfolio_item h2.et_pb_module_header').height(portfolioTitleHeight);
                },50)
            })

        }


    }, freddieEventTimeOut);

})(jQuery);