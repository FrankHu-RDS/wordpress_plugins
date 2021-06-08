(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieMyTimeRecentProducts = 500;

    if (isIE()) {
        freddieMyTimeRecentProducts = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieMyTimeRecentProducts = 10000;
    }

    if ($('body').hasClass('et-tb')) {
        freddieMyTimeRecentProducts = 10000;
    }

    setTimeout(function () {
        if ($('.freddie_my_time_recent_products').length !== 0) {


            var pageUrl = window.location.pathname
            var postInfoHeight = 0;

            $('#page-container .freddie_my_time_recent_products .et_pb_wc_related_products li.product').each(function () {
                var check = "post-";
                var productId;

                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++) {
                    if (cls[i].indexOf(check) > -1) {
                        productId = cls[i].slice(check.length, cls[i].length);
                        break;
                    }
                }

                var imageSrc = $(this).find('.et_shop_image img.attachment-woocommerce_thumbnail ').attr('src');
                if(imageSrc){
                    imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                    $(this).find('.et_shop_image img.attachment-woocommerce_thumbnail').attr('src', imageSrc);

                    $(this).find('.et_shop_image img').removeAttr('width')
                    $(this).find('.et_shop_image img').removeAttr('height')

                }
                $('<div class="product_info"></div>').appendTo($(this).find('a.woocommerce-LoopProduct-link'));
                $(this).find('h2.woocommerce-loop-product__title').appendTo($(this).find('.product_info'))
                $(this).find('.star-rating').appendTo($(this).find('.product_info'))
                $(this).find('.price').appendTo($(this).find('.product_info'))
                $(this).find('.price').appendTo($(this).find('.product_info'))


                $('<a class="add_to_cart" href="' + pageUrl + '/?add-to-cart=' + productId + '"></a>').insertAfter($(this).find('span.price'))


                var thisProduct = $(this);
                setTimeout(function () {




                    if(thisProduct.find('.et_shop_image').height() >  thisProduct.find('.et_shop_image img').height()){
                        thisProduct.find('.et_shop_image').addClass('small_height')
                    }else{
                        thisProduct.find('.et_shop_image').addClass('big_height')
                    }

                    $('.freddie_my_time_recent_products').css('opacity', 1)
                },1500)

                if (postInfoHeight < $(this).find('.product_info').outerHeight()) {
                    postInfoHeight = $(this).find('.product_info').outerHeight();
                }




            })
            $('.freddie_my_time_recent_products .et_pb_wc_related_products .et_shop_image').css('margin-bottom', postInfoHeight)



        }
    }, freddieMyTimeRecentProducts)

})(jQuery);




