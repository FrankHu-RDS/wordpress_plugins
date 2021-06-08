(function ($) {
    var timeOutCocoPortfolio = 1000;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoPortfolio = 10000;
    }
    setTimeout(function () {
        $('.coco_decor_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_item').each(function () {
            var bgImage = $(this).find('.et_portfolio_image img').attr('src');
            $(this).css('background-image', 'url(' + bgImage + ')');
        });

        $('.coco_decor_portfolio .et_pb_filterable_portfolio .et_pb_portfolio_item').on('click', function () {
            var thisLink = $(this).find('h2 a').attr('href');
            window.location.href = thisLink;
        })
    },timeOutCocoPortfolio)

})(jQuery);