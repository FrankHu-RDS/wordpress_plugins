(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarHeaderArne  = 50;

    if (isIE()) {
        ragnarHeaderArne = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarHeaderArne = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_header_arne').length !== 0){



            var animationDelay = 0.1;
            var animationDelayDots = 150;
            for (i=1; i<= $('.ragnar_header_arne .dna_dot').length; i++){
                $('.ragnar_header_arne .dna_dot:nth-child('+ i +')').css('cssText', 'animation-delay:' + animationDelay*i + 's')
           
                $('.ragnar_header_arne .dna_dot:nth-child('+ i +')').delay(animationDelayDots*i).queue(function () {
                        $(this).css('opacity', 1).dequeue()
                    });
            }



        }


    }, ragnarHeaderArne)

})(jQuery);