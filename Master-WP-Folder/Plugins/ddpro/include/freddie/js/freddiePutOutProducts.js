(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieOpenWindowsProductTimeOut = 2000;

    if (isIE()) {
        freddieOpenWindowsProductTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieOpenWindowsProductTimeOut = 10000;
    }

    setTimeout(function () {


        if ($('.freddie_put_out_products').length !== 0) {
            var pageUrl = window.location.href;
            pageUrl = pageUrl.split('/?')[0];


            if (pageUrl.substr(pageUrl.length - 1) === '/') {
                pageUrl = pageUrl.slice(0, -1);
            }

            $('.freddie_put_out_products .et_pb_shop li.product').each(function () {
                var check = "post-";
                var productId;

                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++) {

                    if (cls[i].indexOf(check) > -1) {
                        productId = cls[i].slice(check.length, cls[i].length);
                        break;
                    }
                }

                $('<a class="add_to_cart" href="' + pageUrl + '/?add-to-cart=' + productId + '"></a>').appendTo($(this))


                var imageSrc = $(this).find('.et_shop_image img').attr('src');
                var imageSrcset = $(this).find('.et_shop_image img').attr('srcset');

                imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');


                $(this).find('.et_shop_image img').attr('src', imageSrc);
                $(this).find('.et_shop_image img').attr('srcset', imageSrcset);

            });



            $.fn.isInViewport = function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();

                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                return elementBottom > viewportTop && elementTop < viewportBottom;
            };



            var productSectionHeight = $('.freddie_put_out_products').height();
            var windowHeight = $(window).height();
            var productTopSize = $('.freddie_put_out_products .et_pb_shop li.type-product:nth-child(3n+2)').css('top').replace(/[^0-9\.]/g, '');



            var moveSize = productTopSize / productSectionHeight;

            $(window).on('resize scroll', function() {
                $('.freddie_put_out_products .et_pb_shop li.type-product').each(function() {
                    if ($(this).isInViewport()) {
                        $(this).addClass('is_inview');
                    } else {
                    }
                });

                var SectionTopSize = $('.freddie_put_out_products').offset().top - windowHeight;

                if((productSectionHeight + SectionTopSize) >= $(window).scrollTop() && $(window).scrollTop()  >= SectionTopSize ){
                        var moveStep = ($(window).scrollTop() - SectionTopSize) * moveSize;
                    $('.freddie_put_out_products .et_pb_shop li.type-product:nth-child(3n+2)').css('transform', 'translate(0, ' + moveStep + 'px)');
                    $('.freddie_put_out_products .et_pb_shop li.type-product:not(:nth-child(3n+2))').css('transform', 'translate(0, -' + moveStep + 'px)');

                }


            });
        }





    }, freddieOpenWindowsProductTimeOut);

    //  END FREDDIE CONTENT *******************************************************

})(jQuery);