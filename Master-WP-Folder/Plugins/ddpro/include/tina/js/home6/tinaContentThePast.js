(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentThePast = 1500;

    if (isIE()) {
        tinaContentThePast = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentThePast = 10000;
    }

    setTimeout(function () {
        if($('.tina_the_past_content ').length !== 0){
            var buttonText = $('.tina_the_past_content  .et_pb_button_wrapper .et_pb_button').text();
            $('.tina_the_past_content  .et_pb_button_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');
        }

    }, tinaContentThePast);

})(jQuery);