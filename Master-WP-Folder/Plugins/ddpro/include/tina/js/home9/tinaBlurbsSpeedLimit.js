(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsSpeedLimit = 1000;

    if (isIE()) {
        tinaBlurbsSpeedLimit = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsSpeedLimit = 10000;
    }

    setTimeout(function () {
        if($('.tina_blurbs_speed_limit ').length !== 0){

            $('.tina_blurbs_speed_limit .et_pb_blurb ').each(function () {
                $(this).find('.et_pb_main_blurb_image').insertAfter($(this).find('.et_pb_blurb_container'))
            });




        }


    }, tinaBlurbsSpeedLimit);

})(jQuery);