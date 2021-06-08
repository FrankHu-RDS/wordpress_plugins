(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var  dianaContentNeverKnew  = 1500;

    if (isIE()) {
        dianaContentNeverKnew = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaContentNeverKnew = 10000;
    }

    setTimeout(function () {
        if($('.diana_never_knew_content').length !== 0){
            $('body:not(.et-fb) .diana_never_knew_content .et_pb_column_1_3.et-last-child').prepend('<div class="circle_box"></div>')
            $('.diana_never_knew_content .et_pb_column_1_3:first-child').prepend('<div class="circle_box"></div>')

            var blurbHeight = 0;
            $('body:not(.et-fb) .diana_never_knew_content .et_pb_promo').each(function () {
                if(blurbHeight < $(this).outerHeight()){
                    blurbHeight = $(this).outerHeight()
                }
            })

            $('body:not(.et-fb) .diana_never_knew_content .et_pb_promo').outerHeight(blurbHeight)
            $('body:not(.et-fb) .diana_never_knew_content .circle_box').width(blurbHeight)
            $('body:not(.et-fb) .diana_never_knew_content .circle_box').height(blurbHeight)
        }

    }, dianaContentNeverKnew);

})(jQuery);