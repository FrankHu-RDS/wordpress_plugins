(function ($) {

    var timeOutPortfolio3 = 1000;
    if ($('body').hasClass('et-fb')) {
        timeOutPortfolio3 = 10000;
    }

    function masonryPortfolio() {
        setTimeout(function () {
            var $container = $('.pleasing_portfolio .et_pb_portfolio_items');
            $container.masonry({
                columnWidth: '.project',
                itemSelector: '.project',
                gutter: '.gutter_width'
            });

        }, 0);
    }


    setTimeout(function () {
        $('<div class="gutter_width"></div>').appendTo('body.et-fb .pleasing_portfolio .et_pb_portfolio_items');
        masonryPortfolio();
    }, timeOutPortfolio3);


    setTimeout(function () {
        var hoverCount3 = 1;
        $('body.et-fb .pleasing_portfolio').hover(function () {
            if (hoverCount3 === 1) {
                $('<div class="gutter_width"></div>').appendTo('body.et-fb .pleasing_portfolio .et_pb_portfolio_items');
                masonryPortfolio();
                hoverCount3 = 0;
            }

        });
    }, timeOutPortfolio3);

    setTimeout(function () {
        if ($('body').hasClass('et-fb')) {
            setInterval(function () {
                if (!$('body.et-fb .pleasing_portfolio .et_pb_column').hasClass('divi_added')) {
                    $('<div class="gutter_width"></div>').appendTo('body.et-fb .pleasing_portfolio .et_pb_portfolio_items');
                    masonryPortfolio();
                    $('body.et-fb .pleasing_portfolio .et_pb_column').addClass('divi_added')
                }
            }, 200);
        }


        $('<div class="gutter_width"></div>').appendTo('.pleasing_portfolio .et_pb_portfolio_items');


        $('.pleasing_portfolio .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
            setTimeout(function () {
                $('<div class="gutter_width"></div>').appendTo('.pleasing_portfolio .et_pb_portfolio_items');
                $('.pleasing_portfolio .et_pb_portfolio_items').masonry('destroy');
                masonryPortfolio();
            }, 50)
        });
    }, timeOutPortfolio3);

    // setInterval(function () {
    //     if(!$('.pleasing_portfolio .et_pb_filterable_portfolio ').hasClass('done')){
    //         $('<div class="gutter_width"></div>').appendTo('.pleasing_portfolio .et_pb_portfolio_items');
    //         $('.pleasing_portfolio .et_pb_portfolio_items').masonry('destroy');
    //         masonryPortfolio();
    //
    //         $('.pleasing_portfolio .et_pb_filterable_portfolio ').addClass('done')
    //     }
    //
    // },50)

})(jQuery);