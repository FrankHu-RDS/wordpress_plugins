(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentNjal  = 1000;

    if (isIE()) {
        ragnarContentNjal = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentNjal = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_njal').length !== 0){
            var windoWidth = $(window).width();
            var rowWidth = $('.ragnar_content_njal .et_pb_row').width();

            $('.ragnar_content_njal .left_side_image').width((windoWidth - rowWidth)/2)


            var descHeight = 0;
            $('.ragnar_content_njal .et_pb_promo').each(function (){
                if($(this).find('.et_pb_promo_description').outerHeight() > descHeight){
                    descHeight = $(this).find('.et_pb_promo_description').outerHeight()
                }
            })

            $('.ragnar_content_njal .et_pb_promo .et_pb_promo_description').outerHeight(descHeight)
        }

    }, ragnarContentNjal)

})(jQuery);