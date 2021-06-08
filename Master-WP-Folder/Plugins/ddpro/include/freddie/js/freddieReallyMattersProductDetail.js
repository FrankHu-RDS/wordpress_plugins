(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieReallyMattersProductDetail = 1000;

    if (isIE()) {
        freddieReallyMattersProductDetail = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieReallyMattersProductDetail = 10000;
    }

     if ($('body').hasClass('et-tb')) {
        freddieReallyMattersProductDetail = 20000;
    }

    setTimeout(function () {
        if($('.freddie_really_matters_product_detail').length !== 0) {
            $('<div class="quantity-nav"><div class="quantity-button quantity-up">B</div><div class="quantity-button quantity-down">C</div></div>').insertAfter('body .freddie_really_matters_product_detail .quantity input');
            $('body.single-product .freddie_really_matters_product_detail .quantity').each(function () {
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
                var thumbsHeigth = $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs').height();
                var thumbsItemsCount = $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs li').length;
                $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs li').height((thumbsHeigth / thumbsItemsCount) - 20)
                $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs li').each(function () {
                    if($(this).find('img').hasClass('flex-active')){
                        $(this).addClass('active-item')
                    }
                    var productImage = $(this).find('img').attr('src');

                    productImage = productImage.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                    $(this).css('background-image', 'url('+ productImage +')')
                })
            },1000)


            $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs li').on('click', function () {
                var thisLi = $(this);
                setTimeout(function () {
                    $('.freddie_really_matters_product_detail .flex-control-nav.flex-control-thumbs li').removeClass('active-item')
                    if(thisLi.find('img').hasClass('flex-active')){
                        thisLi.addClass('active-item')
                    }
                },50)

            })
            $('.freddie_really_matters_product_detail').css('opacity', 1)

        }
        }, freddieReallyMattersProductDetail)

})(jQuery);




