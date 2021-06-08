(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentNjalV2  = 1000;

    if (isIE()) {
        ragnarContentNjalV2 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentNjalV2 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_njal_v2').length !== 0){
            $('.ragnar_content_njal_v2 .ragnar_content_njal_v2_row').each(function (){
                if($(window).scrollTop() > $(this).offset().top -($(window).height()/2)){
                    $(this).addClass('visible')
                }else{
                    $(this).removeClass('visible')
                }
            })


            $(window).scroll(function (){
                $('.ragnar_content_njal_v2 .ragnar_content_njal_v2_row').each(function (){
                    if($(window).scrollTop() > $(this).offset().top - ($(window).height()/2)){
                        $(this).addClass('visible')
                    }else{
                        $(this).removeClass('visible')

                    }
                })



            })
        }

    }, ragnarContentNjalV2);

})(jQuery);