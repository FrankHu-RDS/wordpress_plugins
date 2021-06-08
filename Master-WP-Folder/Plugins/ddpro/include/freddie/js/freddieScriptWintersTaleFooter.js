(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var wintersTaleFooter = 1500;

    if (isIE()) {
        wintersTaleFooter = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        wintersTaleFooter = 10000;
    }

    setTimeout(function () {
        if($('.freddie_winters_tale_footer').length !== 0){
            $('.freddie_winters_tale_footer .et_pb_button_module_wrapper .et_pb_button').each(function () {
               var buttonText = $(this).text();
                $(this).html('<span class="button_text">'+ buttonText +'</span>');
            })
        }

    }, wintersTaleFooter);

})(jQuery);