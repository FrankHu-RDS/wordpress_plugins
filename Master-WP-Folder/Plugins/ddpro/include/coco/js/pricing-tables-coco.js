(function ($) {
    //        Coco Pricing Table Slider

    //            Slide Sizes  ***************************************************************************

    var timeOutCocoPTInner = 1000;
    var timeOutCocoPT = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoPT = 10000;
        var timeOutCocoPTInner = 0;
    }
    setTimeout(function () {
        if ($('.coco_bold_pricing_tables').length > 0) {
            $('body .coco_bold_pricing_tables .et_pb_pricing .et_pb_pricing_table').each(function () {

                var headingCount = 0;
                $(this).find('.et_pb_pricing_content ul li').each(function () {
                    if ($(this).contents().find("h3").length !== 0) {
                        headingCount = headingCount + 1;
                        $(this).addClass('price_heading').addClass('col_' + headingCount);

                    } else {
                        $(this).addClass('col_' + headingCount);
                    }
                });


                for (var i = 1; i <= headingCount; i++) {
                    $('<div class="column_' + i + '"></div>').appendTo($(this).find('.et_pb_pricing_content ul'));
                    $(this).find('.et_pb_pricing_content ul li.col_' + i + '').appendTo($(this).find('.et_pb_pricing_content ul div.column_' + i + ''));
                }
            });





            setTimeout(function () {


                $('.coco_bold_pricing_tables .et_pb_pricing_table:first-child').addClass('active_slide');
                var showPersonSlideritems = 2;


                if ($(window).width() <= "767") {
                    showPersonSlideritems = 1;

                }

                var slideItemsCount = $('.coco_bold_pricing_tables .et_pb_pricing_table').length;
                var slideInnerWidth = $('.coco_bold_pricing_tables .et_pb_pricing ').width();

                $('.coco_bold_pricing_tables .et_pb_pricing_table').css("cssText", "width: " + Math.floor(slideInnerWidth) + "px !important;");
                var slideItemswidth = $('.coco_bold_pricing_tables .et_pb_pricing_table').outerWidth();
                var slideWidth = slideItemsCount * slideItemswidth;

                $('.coco_bold_pricing_tables .et_pb_pricing_table_wrap').css("cssText", "width: " + slideWidth + "px !important;");
            }, timeOutCocoPTInner);
        }


        //            Slide Arrows  ***************************************************************************


        setTimeout(function () {
            $('<div class="coco-pt-slider-arrows"><a class="coco-arrow-prev" href="#"><span class="icon">4</span><span class="text">basic</span></a><a class="coco-arrow-next" href="#"><span class="icon">5</span><span class="text">pro</span></a></div>').appendTo($('.coco_bold_pricing_tables .et_pb_column_3_5'));


            $('.coco_bold_pricing_tables .coco-pt-slider-arrows a.coco-arrow-prev').on('click', function () {
                console.log('prev');
                $('.coco_bold_pricing_tables .et_pb_pricing_table').removeClass('active_slide');
                $('.coco_bold_pricing_tables .et_pb_pricing_table:not(.et_pb_featured_table)').addClass('active_slide');
            });

            $('.coco_bold_pricing_tables .coco-pt-slider-arrows a.coco-arrow-next').on('click', function () {
                console.log('next');
                $('.coco_bold_pricing_tables .et_pb_pricing_table').removeClass('active_slide');
                $('.coco_bold_pricing_tables .et_pb_pricing_table.et_pb_featured_table').addClass('active_slide');
            });

            $('.coco_bold_pricing_tables .coco-pt-slider-arrows a').on('click', function (event) {
                event.preventDefault();

                var slideItemswidth = $('.coco_bold_pricing_tables .et_pb_pricing_table').outerWidth();
                var slider5SlideSize1 = $('.coco_bold_pricing_tables .et_pb_pricing_table.active_slide').prevAll().length;
                var slider5SlideSize2 = slider5SlideSize1 * slideItemswidth;

                $('.coco_bold_pricing_tables .et_pb_pricing_table_wrap').css('transform', 'translate(-' + slider5SlideSize2 + 'px, 0)');

            });
        }, timeOutCocoPTInner);
    }, timeOutCocoPT);

//        End Coco Pricing Table Slider

})(jQuery);