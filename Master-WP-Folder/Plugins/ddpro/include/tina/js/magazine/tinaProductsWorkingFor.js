(function ($) {


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaProductsWorkingFor = 2000;

    if (isIE()) {
        tinaProductsWorkingFor = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaProductsWorkingFor = 10000;
    }

    setTimeout(function () {


        if ($('.tina_products_working_for').length !== 0) {

            $('.tina_products_working_for').each(function () {
                $('<div class="nn-cursor"><div class="nn-cursor-text">T</div></div>').appendTo($(this))
            })

            $('.tina_products_working_for .et_pb_shop li.product').each(function () {
                $(this).find('span.price').insertBefore($(this).find('.woocommerce-loop-product__title'))
            })


            $('.tina_products_working_for .et_pb_button_module_wrapper').each(function () {
                $('<div class="arrow"></div>').appendTo($(this).find('.et_pb_button '))
            });


            $('.tina_products_working_for .et_pb_shop li.product').hover(
                function (e) {
                    $(this).closest('.tina_products_working_for').addClass('-text')
                }, function () {
                    $(this).closest('.tina_products_working_for').removeClass('-text')

                }
            )


            $('.tina_products_working_for ').mousemove(function(e) {
                hoverBoxWidth = $(this).find('.nn-cursor').width()/2;
                hoverBoxHeight = $(this).find('.nn-cursor').outerHeight()/2;
                $(this).find('.nn-cursor').offset({
                    left: e.pageX - hoverBoxWidth,
                    top: e.pageY - hoverBoxHeight
                });

            });
        }


    }, tinaProductsWorkingFor);


})(jQuery);