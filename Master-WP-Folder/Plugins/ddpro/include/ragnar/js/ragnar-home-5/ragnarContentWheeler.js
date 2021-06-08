(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentWheeler  = 1000;

    if (isIE()) {
        ragnarContentWheeler = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentWheeler = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_wheeler').length !== 0){

            $('.ragnar_content_wheeler .et_pb_column_1_4').hover(function (){
                setTimeout(function (){
                    $('.ragnar_content_wheeler .et_pb_column_1_4').addClass('hovered')
                },100)

            },function (){
                setTimeout(function (){
                    $('.ragnar_content_wheeler .et_pb_column_1_4').removeClass('hovered')
                },100)

            })

        }

    }, ragnarContentWheeler)

})(jQuery);