       (function ($) {
            var dianaContentsTimeOut = 0;

            if($('body').hasClass('et-fb')){
                dianaContentsTimeOut = 10000;
            }

            setTimeout(function(){
                var buttonText = $('.diana_love_this_content  .et_pb_promo.love_button .et_pb_button').text();
                $('.diana_love_this_content  .et_pb_promo.love_button .et_pb_button').html('<span>'+ buttonText +'</span>');

                var buttonTextVB = $("body.et-fb #et-fb-app-frame").contents().find('.diana_love_this_content  .et_pb_promo.love_button .et_pb_button').text();
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_love_this_content  .et_pb_promo.love_button .et_pb_button').html('<span>'+ buttonTextVB +'</span>');
            },dianaContentsTimeOut)


            var dianaContentsSliderTimeOut = 1000;

            if($('body').hasClass('et-fb')){
                dianaContentsSliderTimeOut = 10000;
            }

            function isIE() {
                ua = navigator.userAgent;
                var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

                return is_ie;
            }

            if (isIE()){
                dianaContentsSliderTimeOut = 5000;
            }

            setTimeout(function(){
                $('.diana_magnificent_content .et_pb_slider .et-pb-controllers').clone().addClass('duplicate_controles').insertBefore('.diana_magnificent_content .et_pb_slides');

                $('.diana_magnificent_content .et_pb_slider .et-pb-controllers.duplicate_controles a').each(function () {
                    var controlText = $(this).text();
                    var controlbuttonText = $('.diana_magnificent_content .et_pb_slider .et_pb_slide:nth-child('+ controlText +') .et_pb_button').text();

                    $(this).html("<span class='control_number'>"+ controlText +"</span><span class='control_text'>"+ controlbuttonText +"</span>");

                });

                $('.diana_magnificent_content .et_pb_slider .et-pb-controllers.duplicate_controles a').on('click', function (e) {
                    e.preventDefault();

                    var controlText = $(this).find('.control_number').text();

                    $('.diana_magnificent_content .et_pb_slider .et-pb-controllers.duplicate_controles a').removeClass('et-pb-active-control');
                    $(this).addClass('et-pb-active-control');

                    $('.diana_magnificent_content .et_pb_slider .et-pb-controllers:not(.duplicate_controles) a:nth-child('+ controlText +')').click();
                });

                $('.diana_magnificent_content .et_pb_slider .et-pb-controllers:not(.duplicate_controles) a').on('click', function () {


                    var controlText = $(this).text();

                    $('.diana_magnificent_content .et_pb_slider .et-pb-controllers.duplicate_controles a:nth-child('+ controlText +')').click();
                })

            },dianaContentsSliderTimeOut)





//            Diana Tour Timeline


            if ($(window).width() <= 767) {
                $('.diana_tour_timeline .et_pb_row.image_right').each(function () {
                    $(this).find('.et_pb_column_3_5 ').insertBefore($(this).find('.et_pb_column_2_5'));
                })
            }

            $(window).resize(function () {
                if ($(window).width() <= 767) {
                    $('.diana_tour_timeline .et_pb_row.image_right ').each(function () {
                        $(this).find('.et_pb_column_3_5 ').insertBefore($(this).find('.et_pb_column_2_5'));
                    })
                } else {
                    $('.diana_tour_timeline .et_pb_row.image_right').each(function () {
                        $(this).find('.et_pb_column_3_5 ').insertAfter($(this).find('.et_pb_column_2_5'));
                    })
                }
            });



            setTimeout(function(){
            if ($('.diana_news_intro_content').length > 0) {
                $('.diana_news_intro_content .et_pb_posts .et_pb_post').each(function () {
                    $(this).find('.post-meta ').insertBefore($(this).find('h2.entry-title'));
                })
            }
            },dianaContentsSliderTimeOut)

        })(jQuery);