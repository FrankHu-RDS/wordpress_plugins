(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPricingTablesPinchOf = 2000;

    if (isIE()) {
        tinaPricingTablesPinchOf = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPricingTablesPinchOf = 10000;
    }

    setTimeout(function () {


        if ($('.tina_pricing_tables_pinch_of ').length !== 0) {
                $('.tina_pricing_tables_pinch_of .et_pb_pricing .et_pb_pricing_table').each(function () {
                    $(this).find('.et_pb_pricing_content_top').insertBefore($(this).find('.et_pb_best_value'))
                    $(this).find('.et_pb_button_wrapper').insertBefore($(this).find('.et_pb_pricing_content'))


                    $('<div class="line line_left"></div><div class="line line_right"></div>').appendTo($(this))

                    if($(this).hasClass('et_pb_featured_table')){
                        var priceText = $(this).find('.et_pb_sum').text()
                        var dollarText = $(this).find('.et_pb_dollar_sign').text()
                        $('<div class="price_text">'+ priceText +'</div>').appendTo($(this).find('.et_pb_sum'))
                        $('<div class="price_text">'+ dollarText +'</div>').appendTo($(this).find('.et_pb_dollar_sign'))
                        $('<div class="featured_table_background_color"></div>').appendTo($(this))
                    }
                })










            var pricingHeight = $('.tina_pricing_tables_pinch_of .et_pb_pricing.et_pb_module').outerHeight()/2;



            $(window).scroll(function () {

                $('.tina_pricing_tables_pinch_of .et_pb_pricing.et_pb_module .et_pb_pricing_table').each(function () {
                    if($(window).scrollTop() + $(window).height() > $(this).offset().top + ($(this).outerHeight()/2) && $(window).scrollTop() + $(window).height() < $(this).offset().top + $(this).outerHeight()) {

                        var scrollSize = (100 / ($(this).outerHeight()/2)) * (($(window).scrollTop() + $(window).height()) - ($(this).offset().top + ($(this).outerHeight()/2)));

                        if($(this).hasClass('et_pb_featured_table')){
                            $(this).find('.featured_table_background_color').css('width', scrollSize + '%')
                            $(this).find('.et_pb_et_price .price_text ').css('opacity', scrollSize + '%')
                        }


                        $(this).find('.line ').css('height', scrollSize + '%')


                    }else if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight()){
                        if($(this).hasClass('et_pb_featured_table')){
                            $(this).find('.featured_table_background_color').css('width', '100%')
                            $(this).find('.et_pb_et_price .price_text ').css('opacity', '100%')
                        }


                        $(this).find('.line ').css('height', '100%')


                    }else{
                        if($(this).hasClass('et_pb_featured_table')){
                            $(this).find('.featured_table_background_color').css('width', '0%')
                            $(this).find('.et_pb_et_price .price_text ').css('opacity', '0%')
                        }



                        $(this).find('.line ').css('height', '0%')

                    }
                })




            })
        }





    }, tinaPricingTablesPinchOf);


})(jQuery);