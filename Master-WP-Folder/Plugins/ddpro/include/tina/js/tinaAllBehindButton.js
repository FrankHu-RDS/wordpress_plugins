(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAllBehindButton = 1500;

    if (isIE()) {
        tinaAllBehindButton = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAllBehindButton = 10000;
    }

    setTimeout(function () {
        if($('.et_pb_button_module_wrapper .tina_all_behind_button.et_pb_button').length !== 0){
            $(' .et_pb_button_module_wrapper .tina_all_behind_button.et_pb_button').each(function () {
                var buttonText = $(this).text();
                $(this).html('<span>'+ buttonText +'</span>');
            })


        }

    }, tinaAllBehindButton);

})(jQuery);