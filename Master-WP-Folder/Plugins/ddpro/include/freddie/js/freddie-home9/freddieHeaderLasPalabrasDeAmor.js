(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieHeaderLasPalabrasDeAmor = 2500;

    if (isIE()) {
        freddieHeaderLasPalabrasDeAmor = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieHeaderLasPalabrasDeAmor = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_header_las_palabras_de_amor ').length !== 0) {
            $('.freddie_header_las_palabras_de_amor .et_pb_slider .et_pb_slide').each(function () {
                $(this).find('.et_pb_slide_image').css('background-image', 'url('+ $(this).find('.et_pb_slide_image img').attr('src') +')')
                $(this).find('.et_pb_slide_image img').remove();
            })


            $('.freddie_header_las_palabras_de_amor .et_pb_slider .et-pb-controllers a').each(function () {
                if($(this).text() <= 9){
                    $(this).text('0' + $(this).text())
                }
            })
        }



    }, freddieHeaderLasPalabrasDeAmor);

})(jQuery);