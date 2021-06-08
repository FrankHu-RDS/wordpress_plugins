(function($) {

    $('body.single-product .product .summary p.price').insertBefore($('body.single-product .product .summary h1.product_title'));
    $('<div class="quantity-nav"><div class="quantity-button quantity-up">L</div><div class="quantity-button quantity-down">K</div></div>').insertAfter('body.single-product .quantity input');
    $('body.single-product .quantity').each(function() {
        var spinner = $(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            var newVal = oldValue + 1;

            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });


    var showImagesCount = 1;
    var showImagesCount2 = $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image').length;
    setTimeout(function() {
        $('<div class="slider_number"><span class="slider_active_number">0' + showImagesCount + '</span>/<span>0' + showImagesCount2 + '</span></div>').insertAfter($('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs'));

        $('<div class="coco-product-slider-arrows"><a class="coco-arrow-prev" href="#"><span class="icon">4</span></a><a class="coco-arrow-next" href="#"><span class="icon">5</span></a></div>').appendTo($('body.single-product div.product .slider_number'));


        $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li').each(function() {
            if ($(this).find('img').hasClass('flex-active')) {
                $(this).addClass('active_item');
            }
        });

        $('body.single-product div.product .coco-product-slider-arrows a.coco-arrow-next').on('click', function() {
            if ($('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').nextAll().length === 0) {
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').removeClass('flex-active-slide');
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image:first-child').addClass('flex-active-slide');

                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').removeClass('flex-active');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li:first-child').addClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li:first-child').find('img').addClass('flex-active');
            } else {
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').removeClass('flex-active-slide').next().addClass('flex-active-slide');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').removeClass('flex-active');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item').next().addClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').addClass('flex-active');

            }
        });


        $('body.single-product div.product .coco-product-slider-arrows a.coco-arrow-prev').on('click', function() {
            if ($('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').prevAll().length === 0) {
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').removeClass('flex-active-slide');
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image:last-child').addClass('flex-active-slide');

                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').removeClass('flex-active');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li:last-child').addClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li:last-child').find('img').addClass('flex-active');
            } else {
                $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').removeClass('flex-active-slide').prev().addClass('flex-active-slide');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').removeClass('flex-active');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item').prev().addClass('active_item');
                $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').find('img').addClass('flex-active');

            }
        });



        var productWidth = $('body.single-product div.product div.woocommerce-product-gallery').width();
        $('body.single-product div.product .coco-product-slider-arrows a').on('click', function(event) {
            event.preventDefault();

            var prevLength = $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').prevAll().length;
            $('body.single-product div.product div.images .woocommerce-product-gallery__wrapper').css('transform', 'translate3d(-' + prevLength * productWidth + 'px,0,0)')



            setTimeout(function() {
                var showSlideItemsCount = $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').prevAll().length + showImagesCount;

                $('body.single-product .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);
        });

        $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li').on('click', function() {
            $('body.single-product div.product div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item');
            $(this).addClass('active_item');

            setTimeout(function() {
                var showSlideItemsCount = $('body.single-product #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').prevAll().length + showImagesCount;

                $('body.single-product .slider_number .slider_active_number').text('0' + showSlideItemsCount);

            }, 200);

        });
    }, 500);
})(jQuery);