(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaVideoSage = 1500;

    if (isIE()) {
        tinaVideoSage = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaVideoSage = 10000;
    }

    setTimeout(function () {
        if($('.tina_video_sage').length !== 0){

            $(".tina_video_sage .et_pb_promo .et_pb_button").click(function (event) {
                event.preventDefault();
                $.fancybox({
                    'padding': 0,
                    'autoScale': false,
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'title': this.title,
                    'width': 680,
                    'height': 495,
                    'href': this.href,
                    'type': 'swf',
                    'swf': {
                        'wmode': 'transparent',
                        'allowfullscreen': 'true'
                    }
                });

                return false;
            });

            $(".tina_video_sage .et_pb_promo").click(function (e) {
                e.preventDefault();
                $(this).find('.et_pb_button').click();
            });


            var buttonText = $('.tina_video_sage .et_pb_button_wrapper .et_pb_button').text();
            $('.tina_video_sage .et_pb_button_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');
        }

    }, tinaVideoSage);

})(jQuery);