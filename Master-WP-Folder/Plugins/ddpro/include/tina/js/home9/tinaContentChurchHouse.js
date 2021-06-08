(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentChurchHouse = 1500;

    if (isIE()) {
        tinaContentChurchHouse = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentChurchHouse = 10000;
    }

    setTimeout(function () {
        if($('.tina_content_church_house ').length !== 0){

            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button').each(function () {
                $(this).html('<span>'+ $(this).text() +'</span>')
            });



            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').attr('width',  $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').outerWidth());
            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').attr('padding',  $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').css('padding-right'));
            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').outerWidth(0)
            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').css('padding-right', 0)


            $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button').hover(function () {
                $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').outerWidth($('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').attr('width'))
                $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').css('padding-right', $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').attr('padding'))
            },function () {
                $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').outerWidth(0)
                $('.tina_content_church_house .et_pb_button_wrapper .et_pb_button span').css('padding-right', 0)
            })
        }


    }, tinaContentChurchHouse);

})(jQuery);