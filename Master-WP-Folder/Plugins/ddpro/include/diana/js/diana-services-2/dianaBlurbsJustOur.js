(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var  dianaBlurbsJustOur  = 1500;

    if (isIE()) {
        dianaBlurbsJustOur = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaBlurbsJustOur = 10000;
    }

    setTimeout(function () {
        if($('.diana_just_our_blurbs ').length !== 0){

            var blurbHeight = 0;
            $('.diana_just_our_blurbs .et_pb_blurb').each(function () {
                $(this).find('.et_pb_module_header').insertBefore($(this).find('.et_pb_main_blurb_image'))
                // if(blurbHeight < $(this).outerHeight()){
                //     blurbHeight = $(this).outerHeight()
                // }
            })

            // $('body:not(.et-fb) .diana_never_knew_content .et_pb_promo').outerHeight(blurbHeight)
            // $('body:not(.et-fb) .diana_never_knew_content .circle_box').width(blurbHeight)
            // $('body:not(.et-fb) .diana_never_knew_content .circle_box').height(blurbHeight)
        }

    }, dianaBlurbsJustOur);

})(jQuery);