(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieOpenWindowsProductTimeOut = 1000;

    if (isIE()) {
        freddieOpenWindowsProductTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieOpenWindowsProductTimeOut = 10000;
    }

    setTimeout(function () {


        if($('body .product_webdesign_package_top_section').length !== 0){


            $('body .product_webdesign_package_top_section .mac_book_image').insertBefore($('body .product_webdesign_package_top_section .flex-viewport'));
            $('body .product_webdesign_package_top_section .product .summary p.price').insertBefore($('body .product_webdesign_package_top_section .product .summary h1.product_title'));
            $('body .product_webdesign_package_top_section .type-product.sale span.onsale').insertBefore($('body .product_webdesign_package_top_section .product .summary p.price'));

            $('<div class="quantity-nav"><div class="quantity-button quantity-up">B</div><div class="quantity-button quantity-down">C</div></div>').insertAfter('body .product_webdesign_package_top_section .quantity input');
            $('body  .product_webdesign_package_top_section .quantity').each(function() {
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
            var showImagesCount2 = $('body #page-container .product_webdesign_package_top_section .woocommerce-product-gallery .woocommerce-product-gallery__image').length;
            setTimeout(function () {
                var slide2_top = 21.3;
                if ($(window).width() <= 767) {
                    slide2_top = 35;
                }

                var sliderNumbers = 1;
                $('body .product_webdesign_package_top_section .woocommerce-product-gallery .flex-control-thumbs li').each(function () {
                    // var thisHtml =  $(this).html();
                    $('<span class="slide_number"></span>').appendTo($(this));

                    if(sliderNumbers <= 9){
                        sliderNumbers = '0' + sliderNumbers;
                    }

                    $(this).find('.slide_number').text(sliderNumbers)
                    sliderNumbers++;
                })







                $('body .product_webdesign_package_top_section div.woocommerce-product-gallery .flex-control-thumbs li:first-child').addClass('active_item')

                $('body .product_webdesign_package_top_section div.woocommerce-product-gallery .flex-control-thumbs li').each(function () {
                    if($(this).find('img').hasClass('flex-active')){
                        $(this).addClass('active_item');
                    }
                });

                $('body .product_webdesign_package_top_section div.woocommerce-product-gallery .flex-control-thumbs li').on('click', function () {
                    console.log('clicked')
                    if ($(this).hasClass('active_item')) {

                    } else {
                        var prevEl2 = $(this).prevAll().length;
                        var elwidth = $(this).width();
                        var controlsLeft = prevEl2 * elwidth;
                        $('body .product_webdesign_package_top_section .woocommerce-product-gallery .flex-control-thumbs').css('left', 'calc(' + slide2_top + '% - ' + controlsLeft + 'px)');

                        $('body .product_webdesign_package_top_section .woocommerce-product-gallery .flex-control-thumbs li').removeClass('active');
                        $(this).addClass('active');
                    }



                    $('body .product_webdesign_package_top_section div.woocommerce-product-gallery .flex-control-thumbs li.active_item').removeClass('active_item');
                    $(this).addClass('active_item');

                    setTimeout(function () {
                        var showSlideItemsCount = $('body .product_webdesign_package_top_section #page-container .product .woocommerce-product-gallery .woocommerce-product-gallery__image.flex-active-slide').prevAll().length + showImagesCount;

                        $('body. .product_webdesign_package_top_section .slider_number .slider_active_number').text('0' + showSlideItemsCount);

                    }, 200);

                });
            },500);


            if($('.circle_text_blurb').length !== 0){



                $('body .product_webdesign_package_top_section .circle_text_blurb').hover(
                    function() {
                        $(this).find("h4.et_pb_module_header").animate({
                            opacity: 1,
                            display: "inline-block",
                            width: "toggle",
                            height: "toggle"
                        }, 400);
                        $(this).find("h4.et_pb_module_header").css('display', 'inline-block');
                    },
                    function() {
                        $(this).find("h4.et_pb_module_header").animate({
                            opacity: 0,
                            display: "none",
                            width: "toggle",
                            height: "toggle"
                        }, 400);
                    }
                );


                $("body .product_webdesign_package_top_section .circle_text_blurb .et_pb_blurb_description").each(function () {
                    if ($(this).find('p').length !== 0) {
                        $(this).find('p').addClass('circle_text');
                    } else {
                        $(this).contents().filter(function () {
                            return this.nodeType === 3;
                        }).wrap("<div class='circle_text'></div>");
                        $(this).find('.circle_text:nth-child(1)').remove();
                    }


                    var paragraphText = $(this).find('.circle_text').text();

                    paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                    $(this).find('.circle_text').html(paragraphText);
                })

                var split = new SplitText("body .product_webdesign_package_top_section .circle_text_blurb .circle_text", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });

                var childs = $("body .product_webdesign_package_top_section .circle_text_blurb .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }

                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $("body .product_webdesign_package_top_section .circle_text_blurb .circle_text");

                TweenLite.set("body .product_webdesign_package_top_section .circle_text_blurb .circle_text", {perspective: 400});

                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;

                for (var i = 1; i <= itemsLength; i++) {
                    $("body .product_webdesign_package_top_section .circle_text_blurb .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }

                t2.to(inner, 30, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                }, 0);
            }
















            if($('body .product_webdesign_package_top_section form').hasClass('variations_form')){
                $('body .product_webdesign_package_top_section .et_pb_wc_add_to_cart').addClass('variations_form_wrapper')
            }


            if($('body .product_webdesign_package_top_section .woocommerce-product-gallery--with-images .flex-viewport').length === 0){
                $('body .product_webdesign_package_top_section .et_pb_wc_images').addClass('no_product_galery')
            }
        }








    }, freddieOpenWindowsProductTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);