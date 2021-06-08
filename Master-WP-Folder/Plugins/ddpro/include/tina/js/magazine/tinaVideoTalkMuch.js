(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaVideoTalkMuch = 2000;

    if (isIE()) {
        tinaVideoTalkMuch = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaVideoTalkMuch = 10000;
    }

    setTimeout(function () {


        if ($('.tina_video_talk_much').length !== 0) {
            $('.tina_video_talk_much').each(function () {
                $('<div class="nn-cursor"><div class="nn-cursor-text">I</div></div>').appendTo($(this))
            })


            $('.tina_video_talk_much .et_pb_button_module_wrapper').each(function () {
                $('<div class="arrow"></div>').appendTo($(this).find('.et_pb_button '))
            });


            $('.tina_video_talk_much .et_pb_video').hover(
                function (e) {
                    $(this).closest('.tina_video_talk_much').addClass('-text')
                }, function () {
                    $(this).closest('.tina_video_talk_much').removeClass('-text')

                }
            )


            $('.tina_video_talk_much ').mousemove(function(e) {
                hoverBoxWidth = $(this).find('.nn-cursor').width()/2;
                hoverBoxHeight = $(this).find('.nn-cursor').outerHeight()/2;
                $(this).find('.nn-cursor').offset({
                    left: e.pageX - hoverBoxWidth,
                    top: e.pageY - hoverBoxHeight
                });

            });
        }





    }, tinaVideoTalkMuch);


})(jQuery);