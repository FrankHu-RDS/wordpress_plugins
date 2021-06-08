(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderThinkingAbout = 1500;

    if (isIE()) {
        tinaHeaderThinkingAbout = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderThinkingAbout = 10000;
    }

    setTimeout(function () {
        if($('.tina_thinking_about_header').length !== 0){
            var buttonText = $('.tina_thinking_about_header .et_pb_button_wrapper .et_pb_button').text();
            $('.tina_thinking_about_header .et_pb_button_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');
        }

    }, tinaHeaderThinkingAbout);

})(jQuery);