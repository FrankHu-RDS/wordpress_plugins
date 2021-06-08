(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentTTove  = 1000;

    if (isIE()) {
        ragnarContentTTove = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentTTove = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_tove').length !== 0){
            var shapeCount = 1;
            $('.ragnar_content_tove .et_pb_blurb').each(function () {
                $(this).prepend($('<div class="tove-content-shapes-'+ shapeCount +'"><div class="tove-content-shapes-'+ shapeCount +'-shape-1"></div><div class="tove-content-shapes-'+ shapeCount +'-shape-2"></div></div>'));

                if(shapeCount === 4){
                    $('<div class="tove-4-inner-shape"></div>').appendTo($(this).find('.tove-content-shapes-4-shape-1'))
                    $('<div class="tove-4-inner-shape"></div>').appendTo($(this).find('.tove-content-shapes-4-shape-2'))
                }

                shapeCount = shapeCount + 1;
            })
        }

    }, ragnarContentTTove);

})(jQuery);