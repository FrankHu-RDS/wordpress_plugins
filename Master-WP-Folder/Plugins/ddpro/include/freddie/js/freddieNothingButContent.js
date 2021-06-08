(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieNothingButContent = 2000;

    if (isIE()) {
        freddieNothingButContent = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieNothingButContent = 10000;
    }

    setTimeout(function () {
        if($('.freddie_nothing_but_content').length !== 0){
            var elementTop = $('.freddie_nothing_but_content').offset().top;



            $(window).scroll(function () {

                if($(window).scrollTop() >= (elementTop + $(window).height())){
                   $('.freddie_nothing_but_content .et_pb_row.text_row').addClass('hide_text')
                   $('.freddie_nothing_but_content .et_pb_row.row_images').addClass('show_images')
                }else{
                    $('.freddie_nothing_but_content .et_pb_row.text_row').removeClass('hide_text')
                    $('.freddie_nothing_but_content .et_pb_row.row_images').removeClass('show_images')
                }
            })

        }

    }, freddieNothingButContent);

})(jQuery);