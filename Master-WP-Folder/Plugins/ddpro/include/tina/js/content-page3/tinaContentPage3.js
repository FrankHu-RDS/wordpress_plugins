(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentPage3 = 500;

    if (isIE()) {
        tinaContentPage3 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentPage3 = 10000;
    }

    setTimeout(function () {
        if ($('.tina_content3_header').length !== 0) {

            $(".tina_content3_header .video-popup.et_pb_button").click(function (event) {
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


        }

    }, tinaContentPage3);

})(jQuery);