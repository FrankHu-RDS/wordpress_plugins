(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsWannaBe = 3000;

    if (isIE()) {
        tinaBlurbsWannaBe = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsWannaBe = 10000;
    }

    setTimeout(function () {
        if($('.tina_i_wanna_be_blurbs').length !== 0){
            $('.tina_i_wanna_be_blurbs .et_pb_column .et_pb_promo').each(function () {
                $(this).height($(this).height())
            })
            $('.tina_i_wanna_be_blurbs .et_pb_column .et_pb_promo_description > div').each(function () {
                var thisHeight = $(this).height();
                $(this).attr('dscription-height', thisHeight)



                $(this).closest('.et_pb_promo_description').css('position', 'absolute')
                $(this).css('max-height', 0)
            })


            $('.tina_i_wanna_be_blurbs .et_pb_column .et_pb_promo').hover(function () {
                $(this).find('.et_pb_promo_description > div').css('max-height', $(this).find('.et_pb_promo_description > div').attr('dscription-height') + 'px')
            },function () {
                $(this).find('.et_pb_promo_description > div').css('max-height', 0)
            })

            $('.tina_i_wanna_be_blurbs .et_pb_promo .et_pb_promo_description').css('opacity', 1)
        }

    }, tinaBlurbsWannaBe);

})(jQuery);