(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentWay = 1500;

    if (isIE()) {
        tinaContentWay = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentWay = 10000;
    }

    setTimeout(function () {
        if($('.tina_content_way ').length !== 0){
            $('.tina_content_way .et_pb_image:first-child').addClass('active_image')
            $('.tina_content_way .et_pb_image').hover(function (){
                $('.tina_content_way .et_pb_image').removeClass('active_image')
                $(this).addClass('active_image')
            })

        }

    }, tinaContentWay);

})(jQuery);