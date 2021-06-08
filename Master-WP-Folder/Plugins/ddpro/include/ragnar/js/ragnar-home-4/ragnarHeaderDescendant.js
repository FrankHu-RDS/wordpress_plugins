(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarHeaderDescendant  = 1000;

    if (isIE()) {
        ragnarHeaderDescendant = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarHeaderDescendant = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_header_descendant').length !== 0){
            // var windoWidth = $(window).width();
            // var rowWidth = $('.ragnar_header_descendant .et_pb_row').width();
            //
            // $('.ragnar_content_njal .right_big_image').width((windoWidth - rowWidth)/2)



        }

    }, ragnarHeaderDescendant)

})(jQuery);