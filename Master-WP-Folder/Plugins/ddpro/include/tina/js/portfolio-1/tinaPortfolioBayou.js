(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPortfolioBayou = 1500;

    if (isIE()) {
        tinaPortfolioBayou = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPortfolioBayou = 10000;
    }

    setTimeout(function () {
        if($('.tina_portfolio_bayou').length !== 0){
            function masonryPortfolio() {
                    var $container = $('.tina_portfolio_bayou .et_pb_portfolio_items');
                    $container.masonry({
                        columnWidth: '.project',
                        itemSelector: '.project',
                        gutter: '.gutter_width'
                    });
            }



                if($('body.et-fb .tina_portfolio_bayou').length !== 0){
                    $('<div class="gutter_width"></div>').appendTo('body.et-fb .pegasus_portfolio_3 .et_pb_portfolio_items');
                    masonryPortfolio();
                }





                var hoverCount3 = 1;
                $('body.et-fb .tina_portfolio_bayou').hover(function () {
                    if (hoverCount3 === 1) {
                        $('<div class="gutter_width"></div>').appendTo('body.et-fb .tina_portfolio_bayou .et_pb_portfolio_items');
                        masonryPortfolio();
                        hoverCount3 = 0;
                    }

                });

            if ($('body').hasClass('et-fb')) {
                setInterval(function () {
                    if (!$('body.et-fb .tina_portfolio_bayou .et_pb_column').hasClass('divi_added')) {
                        $('<div class="gutter_width"></div>').appendTo('body.et-fb .pegasus_portfolio_3 .et_pb_portfolio_items');
                        masonryPortfolio();
                        $('body.et-fb .tina_portfolio_bayou .et_pb_column').addClass('divi_added')
                    }
                }, 200);
            }

            $('<div class="gutter_width"></div>').appendTo('.tina_portfolio_bayou .et_pb_portfolio_items');






            if( $('.tina_portfolio_bayou').length !== 0){
                masonryPortfolio()
            }








            $('.tina_portfolio_bayou .et_pb_portfolio .type-project').each(function () {
                $('<div class="image_cont"></div>').appendTo($(this).find('.et_portfolio_image'))
                $('<div class="shadow shadow_1"></div><div class="shadow shadow_2"></div><div class="shadow shadow_3"></div><div class="shadow shadow_4"></div>').appendTo($(this).find('.et_portfolio_image .image_cont'))
                $(this).find('.et_portfolio_image img').appendTo($(this).find('.image_cont'))
            })







            var windowWidhtHalf = $(window).width()/2;


                $('.tina_portfolio_bayou .et_pb_portfolio .type-project').hover(function () {

                    hoverFunction($(this))
                },function () {
                    $(this).find('.shadow').css('transform', 'translate( 0px, 0)')
                    $(this).find('.et_portfolio_image').css('transform', 'scale(1) translate(0px, 0)')
                })


            $('.tina_portfolio_bayou .et_pb_portfolio_items_wrapper').css('min-height', $('.tina_portfolio_bayou .et_pb_portfolio_items').height());

            $('.tina_portfolio_bayou .et_pb_portfolio_filters .et_pb_portfolio_filter a').on('click', function () {
                setTimeout(function () {
                    $('<div class="gutter_width"></div>').appendTo('.tina_portfolio_bayou .et_pb_portfolio_items');
                    $('.tina_portfolio_bayou .et_pb_portfolio_items').masonry('destroy');
                    masonryPortfolio();


                    if($('.tina_portfolio_bayou .shadow').length === 0){
                        $('.tina_portfolio_bayou .et_pb_portfolio .type-project').each(function () {
                            $('<div class="image_cont"></div>').appendTo($(this).find('.et_portfolio_image'))
                            $('<div class="shadow shadow_1"></div><div class="shadow shadow_2"></div><div class="shadow shadow_3"></div><div class="shadow shadow_4"></div>').appendTo($(this).find('.et_portfolio_image .image_cont'))
                            $(this).find('.et_portfolio_image img').appendTo($(this).find('.image_cont'))
                        })
                    }





                    $('.tina_portfolio_bayou .et_pb_portfolio .type-project').hover(function () {
                        hoverFunction($(this))
                    },function () {
                        $(this).find('.shadow').css('transform', 'translate( 0px, 0)')
                        $(this).find('.et_portfolio_image').css('transform', 'scale(1) translate(0px, 0)')
                    })

                    $('.tina_portfolio_bayou .et_pb_portfolio_items_wrapper').css('min-height', $('.tina_portfolio_bayou .et_pb_portfolio_items').height());
                }, 50)
            });

            function hoverFunction(e) {

                var itemWidht = e.width()/2;
                var itemOffsetLeft = e.offset().left;
                var itemLeft = itemWidht + itemOffsetLeft;

                var transformSize1 = 6;

                if($(window).width() <= 767){
                    transformSize1 = 3;
                }


                var transformSize2 = 0;

                var self = this;
                self.hoverTl = new TimelineMax();
                self.hoverTlShadow = new TimelineMax();
                self.hoverTl.set(e.find('.et_portfolio_image'), {perspective:800, transformStyle: "preserve-3d"});

                if(itemLeft < windowWidhtHalf-20){
                    e.find('.shadow').each(function () {
                        transformSize2 = transformSize2 + transformSize1;
                        $(this).css('transform', 'translate(' + transformSize2 +'px, 0)');

                    })
                    e.find('.et_portfolio_image').css('cssText', ' transform-origin: right bottom; transform: scale(1.05) translate(-'+ 4*transformSize1 +'px, 6px);')

                    self.hoverTl.to(e.find('.image_cont img'), 0.2, {rotationX: -5, skewX: 2}, "start")
                        .to(e.find('.image_cont img'), 0.2, {rotationX: 0, skewX: 0}, "end");
                }else if(itemLeft > windowWidhtHalf+20){
                    e.find('.shadow').each(function () {
                        transformSize2 = transformSize2 + transformSize1;
                        $(this).css('transform', 'translate(-' + transformSize2 +'px, 0)');
                    })
                    e.find('.et_portfolio_image').css('cssText', ' transform-origin: left bottom; transform: scale(1.05) translate('+ 4*transformSize1 +'px, 6px);')

                    self.hoverTl.to(e.find('.image_cont img'), 0.2, {rotationX: -5, skewX: -2}, "start")
                        .to(e.find('.image_cont img'), 0.2, {rotationX: 0, skewX: 0}, "end");
                }else{
                    e.find('.et_portfolio_image').css('cssText', ' transform-origin: center bottom; transform: scale(1.05) translate(0, 6px);')

                    self.hoverTl.to(e.find('.image_cont img'), 0.2, {rotationX: -5, skewX: 0}, "start")
                        .to(e.find('.image_cont img'), 0.2, {rotationX: 0, skewX: 0}, "end");
                }
            }


        }

    }, tinaPortfolioBayou);

})(jQuery);



