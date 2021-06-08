(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieHeaderGoingSlightlyMad = 1500;

    if (isIE()) {
        freddieHeaderGoingSlightlyMad = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieHeaderGoingSlightlyMad = 10000;
    }

    setTimeout(function () {
        if($('.freddie_header_going_slightly_mad ').length !== 0){

            $(".freddie_header_going_slightly_mad .et_pb_button_module_wrapper .et_pb_button").click(function (event) {
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

    }, freddieHeaderGoingSlightlyMad);

})(jQuery);