(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlurbsRuler  = 1000;

    if (isIE()) {
        ragnarBlurbsRuler = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlurbsRuler = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_blurbs_ruler').length !== 0){
            var contentHeight = 0;
            $('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo').each(function (){
                if($(this).find('.et_pb_promo_description').outerHeight() > contentHeight){
                    contentHeight = $(this).find('.et_pb_promo_description').outerHeight();
                }
            })

            $('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo .et_pb_promo_description').outerHeight(contentHeight);


            $('.ragnar_blurbs_ruler .et_pb_row:last-child').height($('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo:first-child').outerHeight())


            $('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo').hover(function (){
                $('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo').addClass('hovered')
                $(this).removeClass('hovered')
            }, function (){
                $('.ragnar_blurbs_ruler .et_pb_row:last-child .et_pb_promo').removeClass('hovered')
            })
        }


    }, ragnarBlurbsRuler)

})(jQuery);