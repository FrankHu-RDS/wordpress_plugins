(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var iHaveBlurbTimeOut = 1500;

    if (isIE()) {
        iHaveBlurbTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        iHaveBlurbTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_i_have_blurb').length !== 0){
            $('.freddie_i_have_blurb .et_pb_column').hover(
                function() {
                    $(this).find("h4.et_pb_module_header span").animate({
                        opacity: 1,
                        display: "inline-block",
                        width: "toggle",
                        height: "toggle"
                    }, 400);
                    $(this).find("h4.et_pb_module_header").css('display', 'inline-block');
                },
                function() {
                    $(this).find("h4.et_pb_module_header span").animate({
                        opacity: 0,
                        display: "none",
                        width: "toggle",
                        height: "toggle"
                    }, 400);
                }
            );

        }

    }, iHaveBlurbTimeOut);

})(jQuery);