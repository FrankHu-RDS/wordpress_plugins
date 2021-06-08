(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaCtaImMoving = 2000;

    if (isIE()) {
        tinaCtaImMoving = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaCtaImMoving = 10000;
    }

    setTimeout(function () {

        if ($('.tina_cta_im_moving').length !== 0) {

            var textHeight = $('.tina_cta_im_moving .bg_text_row .et_pb_text').height();
            var sectionHeight = $('.tina_cta_im_moving').outerHeight();




            $(window).scroll(function () {

                if ($('.tina_cta_im_moving').offset().top < $(window).scrollTop() + $(window).height() && $('.tina_cta_im_moving').offset().top + $('.tina_cta_im_moving').outerHeight() > $(window).scrollTop()) {
                    var scrollSize = ((textHeight-sectionHeight)/($(window).height()+sectionHeight)) * (($(window).scrollTop()+$(window).height()) - $('.tina_cta_im_moving').offset().top);
                    $('.tina_cta_im_moving .bg_text_row .et_pb_text').css('transform', 'translate(0,-'+ scrollSize +'px)')
                }else{


                }
            })
        }
    }, tinaCtaImMoving);

})(jQuery);