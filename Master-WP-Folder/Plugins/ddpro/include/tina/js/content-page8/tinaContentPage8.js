(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentPage8 = 500;

    if (isIE()) {
        tinaContentPage8 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentPage8 = 10000;
    }

    setTimeout(function () {
        if($('.tina_contentpage8_cta').length !== 0){
            $("body .tina_contentpage8_cta .et_pb_promo").hover(
                function() {
                    $(this).find(".et_pb_promo_description strong").show(300);
                },
                function() {
                    $(this).find(".et_pb_promo_description strong").hide(300);
                }
            );
        }

    }, tinaContentPage8);

})(jQuery);