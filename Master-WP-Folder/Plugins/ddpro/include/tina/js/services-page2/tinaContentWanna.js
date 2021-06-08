(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentWanna = 1500;

    if (isIE()) {
        tinaContentWanna = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentWanna = 10000;
    }

    setTimeout(function () {
        if ($('.tina_wanna_content').length !== 0) {


            $.fn.isInViewport = function () {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + ($(window).height() / 1.6);
                return elementBottom > viewportTop && elementTop < viewportBottom;
            };

            $('.tina_wanna_content .et_pb_column .et_pb_promo').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('visible')
                }
            })

            $(window).scroll(function () {
                $('.tina_wanna_content .et_pb_column .et_pb_promo').each(function () {
                    if ($(this).isInViewport()) {
                        $(this).addClass('visible')
                    }
                })
            })




        }

    }, tinaContentWanna);

})(jQuery);