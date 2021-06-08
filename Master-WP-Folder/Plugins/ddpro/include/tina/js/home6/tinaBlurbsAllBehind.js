(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsAllBehind = 1500;

    if (isIE()) {
        tinaBlurbsAllBehind = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsAllBehind = 10000;
    }

    setTimeout(function () {
        if($('.tina_all_behind_blurbs ').length !== 0){
            $('.tina_all_behind_blurbs  .et_pb_button_wrapper .et_pb_button').each(function (){
                var buttonText = $(this).text();
                $(this).html('<span>'+ buttonText +'</span>');
            })
        }

    }, tinaBlurbsAllBehind);

})(jQuery);