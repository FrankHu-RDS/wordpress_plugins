(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentSpear  = 1000;

    if (isIE()) {
        ragnarContentSpear = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentSpear = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_spear').length !== 0){
            $('body:not(.et-fb) .ragnar_content_spear .ragnar_content_spear_row .et_pb_image').each(function (){
                var iamgeSrc = $(this).find('img').attr('src')
                $(this).css('background-image', 'url('+ iamgeSrc +')')
                $(this).find('img').remove()
            })


            $('.ragnar_content_spear .ragnar_content_spear_row').each(function (){
                if($(window).scrollTop() > $(this).position().top ){
                    $(this).addClass('visible')
                }else{
                    $(this).removeClass('visible')
                }
            })

            $(window).scroll(function (){
                $('.ragnar_content_spear .ragnar_content_spear_row').each(function (){
                    if($(window).scrollTop() > $(this).offset().top ){
                        $(this).addClass('visible')

                    }else{
                        $(this).removeClass('visible')

                    }
                })

            })

        }

    }, ragnarContentSpear)

})(jQuery);