(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsMyShoulder = 2000;

    if (isIE()) {
        tinaBlurbsMyShoulder = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsMyShoulder = 10000;
    }

    setTimeout(function () {
        if($('.tina_my_shoulder_blurbs').length !== 0){
            $('.tina_my_shoulder_blurbs  .et_pb_blurb .et_pb_blurb_description a').each(function () {
                var buttonText = $(this).text();
                $(this).html('<span>'+ buttonText +'</span>');
            })

            var titleHeight = 0;
            $('.tina_my_shoulder_blurbs  .et_pb_blurb .et_pb_blurb_container h4').each(function () {
                if(titleHeight < $(this).outerHeight()){
                    titleHeight = $(this).outerHeight()
                }
            })

            $('.tina_my_shoulder_blurbs  .et_pb_blurb .et_pb_blurb_container h4').outerHeight(titleHeight)

        }

    }, tinaBlurbsMyShoulder);

})(jQuery);