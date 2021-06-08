(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieTabsMoreOfThatJazz = 2500;

    if (isIE()) {
        freddieTabsMoreOfThatJazz = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieTabsMoreOfThatJazz = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_tabs_more_of_that_jazz ').length !== 0) {
            $('.freddie_tabs_more_of_that_jazz .freddie_tabs_more_of_that_jazz_left_text .et_pb_text ul li:first-child').addClass('active_item');


            $('.freddie_tabs_more_of_that_jazz .et_pb_row .half_cta ').each(function () {
                var titlePadding = $(this).find('.et_pb_module_header').css('padding-bottom');
                titlePadding = parseInt(titlePadding, 10)
                var textHeight = $(this).find('.et_pb_promo_description > div').height();
                var buttonHeight = $(this).find('.et_pb_button_wrapper').height();

                $(this).attr('hover-size', titlePadding+textHeight+buttonHeight)
                $(this).find('.et_pb_promo_description').css('transform', 'translate(0px, '+ $(this).attr('hover-size') +'px)')
            })


            $('.freddie_tabs_more_of_that_jazz .et_pb_row .half_cta ').hover(function () {
                $(this).find('.et_pb_promo_description').css('transform', 'translate(0px, 0px)')
            },function () {
                $(this).find('.et_pb_promo_description').css('transform', 'translate(0px, '+ $(this).attr('hover-size') +'px)')
            })



        function freddieTuttiFruttiContent() {
            var windowHeight = $(window).height();

            var scrollTopSize = $(window).scrollTop();
            if ($('.freddie_tabs_more_of_that_jazz ').length !== 0) {
                $('.freddie_tabs_more_of_that_jazz .et_pb_row:not(.freddie_tabs_more_of_that_jazz_left_text) .et_pb_module').each(function () {
                    var elementTop = $(this).offset().top;

                    if (parseInt(elementTop) <= parseInt(scrollTopSize) + parseInt(windowHeight) / 2) {
                        var elementId = $(this).attr('id');

                        if(elementId){
                            $('.freddie_tabs_more_of_that_jazz .freddie_tabs_more_of_that_jazz_left_text .et_pb_text ul li').each(function () {
                                if($(this).find('a').attr('href').replace(/\#/g, '') === elementId){
                                    $('.freddie_tabs_more_of_that_jazz .freddie_tabs_more_of_that_jazz_left_text .et_pb_text ul li').removeClass('active_item');
                                    $(this).addClass('active_item');
                                }
                            })
                        }

                    }
                })

            }
        }

        freddieTuttiFruttiContent();

        $(window).scroll(function () {
            freddieTuttiFruttiContent();
        });


        if ($('body').hasClass('os-host')) {

            var instanceContentTuttiFrutti = OverlayScrollbars($("body"), {
                callbacks: {
                    onScroll: function () {
                        freddieTuttiFruttiContent();
                    }
                }
            });
        }





        $('.freddie_tabs_more_of_that_jazz .et_pb_pricing_table').each(function () {
            if($(this).find('.et_pb_best_value').length !== 0){
                $(this).prepend($('<div class="bottom_box"></div>'))
            }

            $(this).prepend($('<div class="top_box"></div>'))
            $(this).find('.top_box').prepend($('<div class="left_side"></div>'))
            $(this).find('.et_pb_pricing_heading').appendTo($(this).find('.left_side'));
            $(this).find('.et_pb_pricing_content_top').appendTo($(this).find('.left_side'));
            $(this).find('.et_pb_pricing_content').appendTo($(this).find('.top_box'));
            $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.top_box'));
            $(this).find('.et_pb_best_value').appendTo($(this).find('.bottom_box'));
            $('<div class="save_text"></div>').appendTo($(this).find('.bottom_box'));
            $(this).find('.et_pb_button_wrapper').clone().appendTo($(this).find('.bottom_box'));


            $(' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));



        })

        TweenMax.set('.freddie_tabs_more_of_that_jazz .et_pb_button_wrapper .et_pb_button .circle__progress', {drawSVG: '82%'});
        $('.freddie_tabs_more_of_that_jazz .et_pb_button_wrapper .et_pb_button').hover(
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



        $('<div class="bottom_bg_box"></div>').appendTo($('.freddie_tabs_more_of_that_jazz'))

        var sectionTop = $('.freddie_tabs_more_of_that_jazz').offset().top;
        var sectionHeight = $('.freddie_tabs_more_of_that_jazz').outerHeight();
        var divTop = $('.freddie_tabs_more_of_that_jazz .top_of_yellow_box').offset().top;

        $('.freddie_tabs_more_of_that_jazz .bottom_bg_box').height((sectionHeight-(divTop-sectionTop)) + 50)

        }
    }, freddieTabsMoreOfThatJazz);

})(jQuery);