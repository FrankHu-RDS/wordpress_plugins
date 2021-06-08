(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaNumbersOrignal = 1500;

    if (isIE()) {
        tinaNumbersOrignal = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaNumbersOrignal = 10000;
    }

    setTimeout(function () {
        if($('.tina_numbers_orignal').length !== 0){
            var buttonText = $('.tina_numbers_orignal .et_pb_button_module_wrapper .et_pb_button').text();
            $('.tina_numbers_orignal .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');
            var numberHeight = 0;
           $('.tina_numbers_orignal .et_pb_number_counter').each(function () {
               if(numberHeight < $(this).outerHeight()){
                   numberHeight = $(this).outerHeight()
               }


           });
           console.log(numberHeight)

            $('.tina_numbers_orignal .et_pb_number_counter').outerHeight(numberHeight)
        }

    }, tinaNumbersOrignal);

})(jQuery);