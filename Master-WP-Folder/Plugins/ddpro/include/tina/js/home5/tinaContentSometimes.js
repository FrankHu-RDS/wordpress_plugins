(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentSometimes = 2000;

    if (isIE()) {
        tinaContentSometimes = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentSometimes = 10000;
    }

    setTimeout(function () {
        if($('.tina_sometimes_content ').length !== 0){
            $('.tina_sometimes_content .et_pb_promo').each(function () {
                $('<div class="cta_content"></div>').appendTo($(this).find('.et_pb_promo_description'))
                $(this).find('.et_pb_promo_description > div').appendTo($(this).find('.cta_content'))
                $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.cta_content'))


                var titleText = $(this).find(' h2.et_pb_module_header').text()
                 $(this).find(' h2.et_pb_module_header').html('<span>'+ titleText +'</span>')

            })

            // $('.tina_sometimes_content .et_pb_promo:first-child .cta_content').show()
            $('.tina_sometimes_content  .et_pb_promo:first-child').addClass('first_promo')

            var t1ChangeTabs = new TimelineLite;
            $('.tina_sometimes_content  .et_pb_promo:not(:first-child)').hover(function () {
                $('.tina_sometimes_content  .et_pb_promo:first-child').removeClass('first_promo')
                $(this).addClass('hovered')
                $('.tina_sometimes_content  .et_pb_promo').addClass('no_hovered')

                if($(window).width() >= 768){
                    $('.tina_sometimes_content  .et_pb_promo:first-child .cta_content').hide(0)
                    $(this).find('.cta_content').show(0)
                }else{
                    $('.tina_sometimes_content  .et_pb_promo:first-child .cta_content').hide('slow')
                    $(this).find('.cta_content').show('slow')
                }


                var chars = $(this).find('.cta_content > div').toArray();

                t1ChangeTabs.staggerFromTo(chars, 0.8, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    ease: Power3.easeOut
                }, 0.08);
            },function () {
                $(this).removeClass('hovered')
                $('.tina_sometimes_content  .et_pb_promo').removeClass('no_hovered')
                $('.tina_sometimes_content  .et_pb_promo:first-child').addClass('first_promo')

                t1ChangeTabs.clear();
                var t1ChangeTabsHoverOff = new TimelineLite;
                var t1ChangeTabsHoverOff2 = new TimelineLite;


                var chars = $(this).find('.cta_content > div').toArray();

                t1ChangeTabsHoverOff.to(chars, 0, {
                    opacity: 0,
                    y: 40
                })
                if($(window).width() >= 768) {
                    $(this).find('.cta_content').hide(0)
                    $('.tina_sometimes_content .et_pb_promo:first-child .cta_content').show(0)
                }else{
                    $(this).find('.cta_content').hide('slow')
                    $('.tina_sometimes_content .et_pb_promo:first-child .cta_content').show('slow')
                }


                var chars2 = $('.tina_sometimes_content  .et_pb_promo:first-child .cta_content > div').toArray();

                t1ChangeTabsHoverOff2.staggerFromTo(chars2, 0.8, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    ease: Power3.easeOut
                }, 0.08);
            })
        }

    }, tinaContentSometimes);

})(jQuery);