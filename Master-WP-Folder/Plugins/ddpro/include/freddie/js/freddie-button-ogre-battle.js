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
        // Freddie Button Ogre Battle


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_ogre_battle ').prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))
        $('<div class="line"></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_ogre_battle'));


        TweenMax.set('.freddie_button_ogre_battle .circle__progress', {drawSVG: '82%'});
        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_ogre_battle ').hover(
            function () {
                var ogreBattleLine = $(this).find('.line');
                var percentageComplete = 1;
                var tlCircle = new TimelineLite();
                tlCircle.fromTo($(this).find(".circle__progress"), 0.5, {
                    drawSVG: "82%"
                }, {
                    drawSVG: "0 0",
                    ease: Power3.easeInOut
                })
                    .to(ogreBattleLine, 0.5, {
                        width: "100%",
                        ease: Power3.easeInOut
                    }, 0);

            }, function () {
                var ogreBattleLine = $(this).find('.line');
                var percentageComplete = 0;
                var tlCircle = new TimelineLite();
                tlCircle.to($(this).find(".circle__progress"), 0.5, {
                    drawSVG: "82%",
                    ease: Power3.easeInOut
                })
                    .to(ogreBattleLine, 0.5, {
                        width: "0",
                        ease: Power3.easeInOut
                    }, 0);
                ;

            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);