(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsMeAndYou = 3000;

    if (isIE()) {
        tinaBlurbsMeAndYou = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsMeAndYou = 10000;
    }

    setTimeout(function () {
        if($('.tina_blurbs_me_and_you').length !== 0){
            var boxHeight = 0;
            $('.tina_blurbs_me_and_you .et_pb_blurb').each(function () {
                if(boxHeight < $(this).find('.et_pb_blurb_content').outerHeight()){
                    boxHeight = $(this).find('.et_pb_blurb_content').outerHeight()
                }


            });

            $('.tina_blurbs_me_and_you .et_pb_blurb .et_pb_blurb_content').outerHeight(boxHeight)
        }

    }, tinaBlurbsMeAndYou);

})(jQuery);