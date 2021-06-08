(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var stepsNearerBlurbTimeOut = 1500;

    if (isIE()) {
        stepsNearerBlurbTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        stepsNearerBlurbTimeOut = 10000;
    }

    setTimeout(function () {
        if($('.freddie_steps_nearer_blurb  ').length !== 0){
            var stepBlurbHeight = 0;
            $('.freddie_steps_nearer_blurb  .et_pb_blurb ').each(function () {
                $('<div class="top_line line"></div>').appendTo($(this));

                if(stepBlurbHeight < $(this).height()){
                    stepBlurbHeight = $(this).height();
                }
            })

            $('.freddie_steps_nearer_blurb  .et_pb_blurb ').height(stepBlurbHeight)


            var tlTheLineBlurb;




            $('.freddie_steps_nearer_blurb .et_pb_blurb ').hover(function () {

                tlTheLineBlurb = new TimelineLite();

                tlTheLineBlurb.to($(this).find('.top_line'), 0.3, {
                    top: '0',
                    height: '4px',
                    ease: Power2.easeOut
                },0)
                    .to($(this).find('.top_line'), 0.3, {
                        width: '100%',
                        ease: Power2.easeOut
                    },0.3)




            }, function () {
                tlTheLineBlurb.reverse();

            })

        }

    }, stepsNearerBlurbTimeOut);

})(jQuery);