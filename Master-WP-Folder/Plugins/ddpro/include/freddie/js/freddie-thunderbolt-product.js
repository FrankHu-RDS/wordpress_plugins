(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieThunderboltProductDetail = 1000;

    if (isIE()) {
        freddieThunderboltProductDetail = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieThunderboltProductDetail = 10000;
    }

    if ($('body').hasClass('et-tb')) {
        freddieThunderboltProductDetail = 15000;
    }

    setTimeout(function () {
        if($('.freddie_thunderbolt_product').length !== 0) {
            $('<div class="quantity-nav"><div class="quantity-button quantity-up">B</div><div class="quantity-button quantity-down">C</div></div>').insertAfter('body .freddie_thunderbolt_product .quantity input');
            $('body.single-product .quantity').each(function () {
                var spinner = $(this),
                    input = spinner.find('input[type="number"]'),
                    btnUp = spinner.find('.quantity-up'),
                    btnDown = spinner.find('.quantity-down'),
                    min = input.attr('min'),
                    max = input.attr('max');

                btnUp.click(function () {
                    var oldValue = parseFloat(input.val());
                    var newVal = oldValue + 1;

                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                });

                btnDown.click(function () {
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


            setTimeout(function () {
                $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs').insertBefore('.freddie_thunderbolt_product .flex-viewport')


                var thumbsHeigth = $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs').height();
                var thumbsItemsCount = $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').length;
                $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').height((thumbsHeigth / thumbsItemsCount) - 20)
                $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').each(function () {
                    // if($(this).find('img').hasClass('flex-active')){
                    //     $(this).addClass('active_item')
                    // }
                    var productImage = $(this).find('img').attr('src');

                    productImage = productImage.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                    $(this).css('background-image', 'url('+ productImage +')')
                })
            },1000)


            $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').each(function () {
                var imageSrc = $(this).find('img').attr('src');

                imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                $(this).find('img').attr('src', imageSrc);
            })
            $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').on('click', function () {
                var thisLi = $(this);
                var thisLiImgSrc = $(this).find('img').attr('src');
                setTimeout(function () {
                    $('.freddie_thunderbolt_product .woocommerce-product-gallery__image').each(function () {
                        if($(this).find('img').attr('src') === thisLiImgSrc){
                            var thisTopSize = $(this).offset().top - 50;
                            var body = $("html, body");
                            body.stop().animate({scrollTop:thisTopSize}, 800, 'swing', function() {

                            });
                            // $(window).scrollTop(parseInt(thisTopSize) + 50)
                        }

                    })
                    $('.freddie_thunderbolt_product .flex-control-nav.flex-control-thumbs li').removeClass('active_item')
                    if(thisLi.find('img').hasClass('flex-active')){
                        thisLi.addClass('active_item')
                    }
                },50)

            })






            if($('.circle_text_blurb').length !== 0){



                $('body .freddie_thunderbolt_product .circle_text_blurb').hover(
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


                $("body .freddie_thunderbolt_product .circle_text_blurb .et_pb_blurb_description").each(function () {
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

                var split = new SplitText("body .freddie_thunderbolt_product .circle_text_blurb .circle_text", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });

                var childs = $("body .freddie_thunderbolt_product .circle_text_blurb .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }

                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $("body .freddie_thunderbolt_product .circle_text_blurb .circle_text");

                TweenLite.set("body .freddie_thunderbolt_product .circle_text_blurb .circle_text", {perspective: 400});

                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;

                for (var i = 1; i <= itemsLength; i++) {
                    $("body .freddie_thunderbolt_product .circle_text_blurb .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }

                t2.to(inner, 30, {
                    rotation: "360",
                    repeat: -1,
                    ease: Linear.easeNone
                }, 0);
            }


            // $('.freddie_thunderbolt_product .flex-control-thumbs li:first-child').addClass('active_item');



            function freddieThunderboltProduct() {
                var windowHeight = $(window).height();

                var scrollTopSize = $(window).scrollTop();
                if ($('.freddie_thunderbolt_product ').length !== 0) {
                    $('.freddie_thunderbolt_product .woocommerce-product-gallery__image').each(function () {
                        var elementTop = $(this).offset().top;

                        if (parseInt(elementTop) <= parseInt(scrollTopSize) + 50 ) {
                            var elementId = $(this).find('img').attr('src');

                            if(elementId){
                                $('.freddie_thunderbolt_product .flex-control-thumbs li').each(function () {
                                    if($(this).find('img').attr('src') === elementId){
                                        $('.freddie_thunderbolt_product .flex-control-thumbs li').removeClass('active_item');
                                        $(this).addClass('active_item');
                                    }
                                })
                            }

                        }
                    })

                }
            }

            freddieThunderboltProduct();

            $(window).scroll(function () {
                freddieThunderboltProduct();
            });


            if ($('body').hasClass('os-host')) {

                var instanceContentTuttiFrutti = OverlayScrollbars($("body"), {
                    callbacks: {
                        onScroll: function () {
                            freddieThunderboltProduct();
                        }
                    }
                });
            }






            $('.freddie_thunderbolt_product').css('opacity', 1)








        //    Releted Products  ******************************************


            if($('.freddie_little_silhouetto_related_products').length !== 0) {
                var pageUrl = window.location.href;
                pageUrl = pageUrl.split('/?')[0];


                if (pageUrl.substr(pageUrl.length - 1) === '/') {
                    pageUrl = pageUrl.slice(0, -1);
                }




                var showItemsCount = 2;


                if ($(window).width() <= 767) {
                    showItemsCount = 1;
                }


                $('.freddie_little_silhouetto_related_products .et_pb_shop li.product').each(function () {
                    var check = "post-";
                    var productId;

                    var cls = $(this).attr('class').split(' ');
                    for (var i = 0; i < cls.length; i++) {

                        if (cls[i].indexOf(check) > -1) {
                            productId = cls[i].slice(check.length, cls[i].length);
                            break;
                        }
                    }
                    $(this).find('span.price').appendTo($(this).find('.et_shop_image'))


                    if($(this).closest('.et_pb_shop').hasClass('products_slider_2_col')){
                        $('<a class="add_to_cart" href="' + pageUrl + '/?add-to-cart=' + productId + '"></a>').appendTo($(this).find('.et_shop_image'))
                    }else{
                        $('<a class="add_to_cart" href="' + pageUrl + '/?add-to-cart=' + productId + '"></a>').insertAfter($(this).find('.et_shop_image'))
                    }


                })


                $('.freddie_little_silhouetto_related_products').each(function () {
                $(this).find('.et_pb_shop').each(function () {
                    if($(this).hasClass('products_slider_1_col')){
                        showItemsCount = 1;
                    }


                    $(this).find(' li.product:first-child').addClass('active_slide');


                    var sliderWidth = $(this).width();


                    var slidesCount = $(this).find('li.product').length;
                    var slidesWidth = sliderWidth / showItemsCount;
                    var sliderContainerWidth = slidesCount * slidesWidth;


                    $(this).find('li.product').css('cssText', 'width: '+ slidesWidth +'px !important');
                    $(this).find('ul.products ').width(sliderContainerWidth);

                    $('<div class="slide_dots"></div>').appendTo($(this))


                    if($(this).hasClass('products_slider_2_col') && $(window).width() >= 768){
                        slidesCount = slidesCount - 1
                    }


                    for(var i = 1; i <= slidesCount; i++){
                        $('<div class="slide_dot">'+ i +'</div>').appendTo($(this).find('.slide_dots'))
                    }
                })



                })

                $('.freddie_little_silhouetto_related_products .et_pb_shop .slide_dot:first-child').addClass('active_dot')

                $('.freddie_little_silhouetto_related_products .et_pb_shop .slide_dot').on('click', function (e) {
                    e.preventDefault();

                    $(this).closest('.et_pb_shop').find('.slide_dot').removeClass('active_dot')
                    $(this).addClass('active_dot')

                    var prevElementsCount = $(this).prevAll().length;
                    var thisArrow = $(this);
                    setTimeout(function () {
                        var slidesWidth = thisArrow.closest('.et_pb_shop').find('li.product').width();

                        thisArrow.closest('.et_pb_shop').find('ul.products').css("transform", "translate(-" + prevElementsCount * slidesWidth + "px, 0)");
                    }, 100)


                })
            }





        }
    }, freddieThunderboltProductDetail)

})(jQuery);




