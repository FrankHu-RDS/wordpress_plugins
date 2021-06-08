(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePtTimeOut = 0;

    if (isIE()) {
        freddiePtTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePtTimeOut = 10000;
    }

    setTimeout(function () {

        $('<div class="et-pb-slider-arrows"><a class="et-pb-arrow-prev" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"></circle> </svg><span>'+__('Previous', 'ddpro')+'</span></a><div class="slide_line_arrows"><span class="number number_first">01</span><div class="slide_line"><div class="slide_inline_line"></div></div><span class="number number_last"></span></div><a class="et-pb-arrow-next" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" style="visibility: visible;"><circle cx="17" cy="17" r="15.5" class="circle__progress"></circle> </svg><span></span></a></div>').appendTo('.freddie_hello_mary_lou_pricing_tables .et_pb_column_1_3');
        $('<div class="left_side"></div><div class="right_side"></div>').appendTo('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table');
        $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table:first-child').addClass('active_slide').show('slow');
        var slidesCount = $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table').length;


        if (slidesCount <= 9) {
            $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows .number.number_last').text("0" + slidesCount);
        } else {
            $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows .number.number_last').text(slidesCount);
        }

        $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table').each(function () {
            $(this).find('.et_pb_pricing_content_top').appendTo($(this).find('.left_side'));
            $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.left_side'));
            $(this).find('.et_pb_pricing_heading').appendTo($(this).find('.right_side'));
            $(this).find('.et_pb_pricing_content').appendTo($(this).find('.right_side'));


            $(' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));



        })


        TweenMax.set('.freddie_hello_mary_lou_pricing_tables .et_pb_button_wrapper .et_pb_button .circle__progress', {drawSVG: '82%'});
        $('.freddie_hello_mary_lou_pricing_tables .et_pb_button_wrapper .et_pb_button').hover(
            function () {
                var thisTl = this;
                thisTl.tl = new TimelineLite();
                thisTl.tl
                    .to($(this).find(".circle__progress"), 0.5, {
                        drawSVG: "100%",
                        ease: Power3.easeInOut
                    }, 0)


                thisTl.tl.play();
            }, function () {
                var thisTl = this;
                thisTl.tl.reverse();
            }
        )

        TweenMax.set('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows a .circle__progress', {drawSVG: '82%'});
        $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows a').hover(
            function () {
                var thisTl = this;
                thisTl.tl = new TimelineLite();
                thisTl.tl
                    .to($(this).find(".circle__progress"), 0.5, {
                        drawSVG: "100%",
                        ease: Power3.easeInOut
                    }, 0)


                thisTl.tl.play();
            }, function () {
                var thisTl = this;
                thisTl.tl.reverse();
            }
        )


        $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows a').on('click', function (e) {
            e.preventDefault();

            setTimeout(function () {
                var prevElementsCount = $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').prevAll().length + 1;
                console.log(prevElementsCount);
                if ($('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').nextAll().length !== 0) {
                    var prevElementsLength = $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').prevAll().length;

                } else {
                    var prevElementsLength = -1;
                }

                if (prevElementsCount <= 9) {
                    prevElementsCount = "0" + prevElementsCount
                }

                $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows .number.number_first').text(prevElementsCount);
            }, 50)

        })

        $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
            if ($('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').nextAll().length !== 0) {
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').removeClass('active_slide').next('.et_pb_pricing_table').addClass('active_slide');

            } else {
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').removeClass('active_slide');
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table:first-child').addClass('active_slide')
            }

        })

        $('.freddie_hello_mary_lou_pricing_tables .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {

            if ($('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').prevAll().length !== 0) {
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').removeClass('active_slide').prev('.et_pb_pricing_table').addClass('active_slide');
            } else {
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table.active_slide').removeClass('active_slide');
                $('.freddie_hello_mary_lou_pricing_tables .et_pb_pricing_table:last-child').addClass('active_slide');
            }
        })

    }, freddiePtTimeOut);


})(jQuery);