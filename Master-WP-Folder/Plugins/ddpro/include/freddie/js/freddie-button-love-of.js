(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieButtonsTimeOut = 1000;

    if (isIE()) {
        freddieButtonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieButtonsTimeOut = 10000;
    }

    setTimeout(function () {
        //Freddie Button Love Of


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_love_of').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');


            $('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.35 18.19"> <g> <path class="st0" d="M1.78,8.37c13.87,3.87,25.38,4.93,34.55,3.2c9.17-1.7,16.92-3.02,23.25-3.95c6.37-0.97,13.6-0.82,21.7,0.45   c8.13,1.27,14.85,1.92,20.15,1.95c5.27,0.07,9.32-0.48,12.15-1.65c2.83-1.17,4.45-1.87,4.85-2.1"/> <path class="st1" d="M108.53,1.72l7.95,2.25c0.97,0.3,1.67,0.57,2.1,0.8c0.53,0.37,0.85,0.78,0.95,1.25c0.1,0.5-0.03,0.97-0.4,1.4   c-1.47,2.03-3.75,5.05-6.85,9.05"/> </g> </svg>').appendTo($(this))
        })

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_love_of ').hover(
            function () {
                var thistl = this;
                thistl.tlLoveOf = new TimelineLite();
                thistl.tlLoveOf.to($(this).find('path.st0'), 0.4, {
                    opacity: 1,
                    ease: Power1.easeInOut
                },  0)
                    .to($(this).find('path.st1'), 0.4, {
                        opacity: 1,
                        ease: Power1.easeInOut
                    }, 0.2);

                thistl.tlLoveOf.play();

            }, function () {
                var thistl = this;
                thistl.tlLoveOf.reverse();


            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);