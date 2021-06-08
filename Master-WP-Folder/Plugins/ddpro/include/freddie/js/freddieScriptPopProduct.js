(function ($) {
    //  FREDDIE CONTENT *******************************************************

    const { __, _x, _n, _nx } = wp.i18n;
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


        if($('.pop_product').length !== 0){

            var pageUrl = window.location.href
            $('#page-container .pop_product .et_pb_shop li.product').each(function () {
                var check = "post-";
                var productId;

                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++) {
                    if (cls[i].indexOf(check) > -1) {
                        productId = cls[i].slice(check.length, cls[i].length);
                        break;
                    }
                }

                $('<a class="add_to_cart" href="'+ pageUrl +'/?add-to-cart='+ productId +'"></a>').appendTo($(this))


                var imageSrc = $(this).find('.et_shop_image img').attr('src');
                var imageSrcset = $(this).find('.et_shop_image img').attr('srcset');
                imageSrc = imageSrc.replace('-300x243', '');
                imageSrcset = imageSrc.replace('-300x243', '');
                $(this).find('.et_shop_image img').attr('src', imageSrc);
                $(this).find('.et_shop_image img').attr('srcset', imageSrcset);
            })




            //****************************************************************


            $('#page-container .pop_product .filter_col').prepend($('<div class="product_filter"><ul><li class="active_menu_item" postClass="all">'+__('All Work', 'ddpro')+'</li></ul></div>'));

            var check2 = "product_cat-";

            var producttem = [];
            var producttemShowHide;

            $('#page-container .pop_product li.product').each(function () {

                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++){
                    if (cls[i].indexOf(check2) > -1) {
                        $(this).attr('id', cls[i].slice(check2.length, cls[i].length))
                        producttem.push(cls[i].slice(check2.length, cls[i].length));
                    }
                }

            });

            function ArrNoDupe(a) {
                var temp = {};
                for (var i = 0; i < a.length; i++)
                    temp[a[i]] = true;
                var r = [];
                for (var k in temp)
                    r.push(k);
                return r;
            }

            producttem = ArrNoDupe(producttem);

            for (var i = 0; i < producttem.length; i++) {
                $('<li postClass="' + producttem[i] + '">' + producttem[i] + '</li>').appendTo($('#page-container .pop_product .filter_col ul'))
            }


            $('#page-container .pop_product .filter_col li[postclass="all"]').addClass('active_menu_item');


            $('#page-container .pop_product .filter_col li').on('click', function () {
                $('#page-container .pop_product .filter_col li').removeClass('active_menu_item');
                $(this).addClass('active_menu_item');

                var thisAttrClassName = $(this).attr('postclass');

                if(thisAttrClassName === 'all'){
                    $('#page-container .pop_product li.product').show();
                }else{
                    $('#page-container .pop_product li.product').each(function () {
                        if(thisAttrClassName === $(this).attr('id')){
                            $(this).show();
                        }else{
                            $(this).hide();
                        }
                    })
                }
            })


        }








    }, freddieOpenWindowsProductTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);