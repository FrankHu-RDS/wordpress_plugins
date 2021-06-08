(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlurbsKeeper  = 1000;

    if (isIE()) {
        ragnarBlurbsKeeper = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlurbsKeeper = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_blurbs_keeper').length !== 0){
            $('.ragnar_blurbs_keeper .et_pb_blurb ').each(function (){
                if($(this).find('.et_pb_blurb_description p img').length !== 0){
                    $(this).find('.et_pb_blurb_description p img').unwrap();
                    $(this).find('.et_pb_blurb_description img').insertBefore($(this).find('.et_pb_module_header'))
                }
            })
        }


    }, ragnarBlurbsKeeper)

})(jQuery);