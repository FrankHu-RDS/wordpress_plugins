(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var noBlameTimeOut = 2000;

    if (isIE()) {
        noBlameTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        noBlameTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_no_blame_blurb').length !== 0){
            var blameBlurbHeight = 0;
            $('.freddie_no_blame_blurb .et_pb_blurb').each(function () {
                if(blameBlurbHeight < $(this).find('.et_pb_blurb_content').height()){
                    blameBlurbHeight = $(this).find('.et_pb_blurb_content').height();
                }
            })

            $('.freddie_no_blame_blurb .et_pb_blurb .et_pb_blurb_content').height(blameBlurbHeight)
        }

    }, noBlameTimeOut);

})(jQuery);