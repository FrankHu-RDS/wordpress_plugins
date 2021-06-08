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


        if($('.freddie_open_windows_products').length !== 0){
            var pageUrl = window.location.href
            pageUrl = pageUrl.split('/?')[0];


            if(pageUrl.substr(pageUrl.length - 1) === '/'){
                pageUrl = pageUrl.slice(0, -1);
            }

            $('.freddie_open_windows_products .et_pb_shop li.product').each(function () {
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

            })
        }





    }, freddieOpenWindowsProductTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);