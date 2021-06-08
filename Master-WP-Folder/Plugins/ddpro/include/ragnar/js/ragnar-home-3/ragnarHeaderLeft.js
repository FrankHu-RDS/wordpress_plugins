(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarHeaderLeft  = 1000;

    if (isIE()) {
        ragnarHeaderLeft = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarHeaderLeft = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_header_left').length !== 0){
            var zIndex = 16;
            $('.ragnar_header_left').prepend($('<div class="box_wrapper"></div>'))
            for(var i = 1; i <= 15; i++){
                $('.ragnar_header_left .box_wrapper').prepend($('<div class="box box_'+ i +'"></div>'))

            }



            var animationDelay = 0.1;
            var animationDelayDots = 100;
            for (i=1; i<= $('.ragnar_header_left .box').length; i++){
                $('.ragnar_header_left .box:nth-child('+ i +')').css('cssText', 'animation-delay:' + animationDelay + 's; z-index: ' + zIndex)

                zIndex = zIndex - 1
                // $('.ragnar_header_left .box:nth-child('+ i +')').addClass('visible')
                $('.ragnar_header_left .box:nth-child('+ i +')').delay(animationDelayDots).queue(function () {
                    // $(this).css('opacity', 1).dequeue()
                    $(this).addClass('visible').dequeue()
                });

                animationDelay = animationDelay + 0.4
                animationDelayDots = animationDelayDots + 400
            }

        }

    }, ragnarHeaderLeft)

})(jQuery);