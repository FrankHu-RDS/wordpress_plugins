(function ($) {

    setTimeout(function () {
        $("body .impi-video-popup h4 a").click(function (event) {
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

        $("body .impi-video-popup .et_pb_main_blurb_image a").click(function (event) {
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
    },1000)



    $("body .impi-video-popup-slider .et_pb_button").click(function (event) {
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

       })(jQuery);