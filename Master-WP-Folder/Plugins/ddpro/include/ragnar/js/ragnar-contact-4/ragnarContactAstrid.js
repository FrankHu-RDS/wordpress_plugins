(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContactAstrid  = 1000;

    if (isIE()) {
        ragnarContactAstrid = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContactAstrid = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_astrid ').length !== 0){
            var shapeCount = 1;
            $('.ragnar_content_astrid .et_pb_blurb').each(function () {
                $(this).prepend($('<div class="astrid-content-shapes-'+ shapeCount +'"><div class="astrid-content-shapes-'+ shapeCount +'-shape-1"></div><div class="astrid-content-shapes-'+ shapeCount +'-shape-2"></div></div>'));

                if(shapeCount === 4){
                    $('<div class="astrid-4-inner-shape"></div>').appendTo($(this).find('.astrid-content-shapes-4-shape-1'))
                    $('<div class="astrid-4-inner-shape"></div>').appendTo($(this).find('.astrid-content-shapes-4-shape-2'))
                }

                shapeCount = shapeCount + 1;
            })
        }

    }, ragnarContactAstrid);

})(jQuery);