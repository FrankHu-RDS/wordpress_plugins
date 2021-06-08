(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var dianaAuthoritativeProductTimeOut = 1000;

    if (isIE()) {
        dianaAuthoritativeProductTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaAuthoritativeProductTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.diana_authoritative_products').length !== 0) {
            $('.diana_authoritative_products .et_pb_shop li.type-product').each(function () {
                $('<div class="product_info"></div>').appendTo($(this).find('a.woocommerce-LoopProduct-link'));
                $(this).find('h2.woocommerce-loop-product__title').appendTo($(this).find('.product_info'))
                $(this).find('span.price').appendTo($(this).find('.product_info'));

                var imageSrc = $(this).find('.et_shop_image img').attr('src');
                var imageSrcset = $(this).find('.et_shop_image img').attr('srcset');
                console.log(imageSrc);
                //console.log(imageSrcset);
                imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                console.log(imageSrc);
                // imageSrc = imageSrc.replace('-370x400', '');
                // imageSrcset = imageSrc.replace('-370x400', '');
                $(this).find('.et_shop_image img').attr('src', imageSrc);
                $(this).find('.et_shop_image img').attr('srcset', imageSrcset);
            })


            if(!isIE()){
                console.log('not IE')
                $('.diana_authoritative_products .et_pb_shop li.type-product').tilt({
                    glare: true,
                    maxGlare: .5,
                    maxTilt: 4
                })
            }





            $.fn.isInViewport = function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();

                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                return elementBottom > viewportTop && elementTop < viewportBottom;
            };

            $(window).on('resize scroll', function() {
                $('.diana_authoritative_products .et_pb_shop li.type-product').each(function() {
                    if ($(this).isInViewport()) {
                        $(this).addClass('is_inview');
                    } else {
                        $(this).removeClass('is_inview');
                    }
                });


                // console.log('Current scroll from the top: ' + window.pageYOffset);

            });
        }
    }, dianaAuthoritativeProductTimeOut)

})(jQuery);