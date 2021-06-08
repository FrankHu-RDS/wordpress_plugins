(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentThesePlaces = 1500;

    if (isIE()) {
        tinaContentThesePlaces = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentThesePlaces = 10000;
    }

    setTimeout(function () {
        if ($('.tina_their_faces_content').length !== 0) {

            $(".tina_their_faces_content .video-popup h4").each(function () {
                $(this).find('a').attr('href', "");
            });


            $(".tina_their_faces_content .video-popup.et_pb_button").click(function (event) {
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

    }, tinaContentThesePlaces);

})(jQuery);