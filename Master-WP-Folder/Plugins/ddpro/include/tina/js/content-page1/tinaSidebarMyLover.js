(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSliderMyLover = 3000;

    if (isIE()) {
        tinaSliderMyLover = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSliderMyLover = 10000;
    }

    setTimeout(function () {
        if($('.tina_my_lover_sidebar_cta ').length !== 0){
            $('.tina_my_lover_sidebar_cta .et_pb_promo_description div').each(function () {
                var thisHeight = $(this).height();

                $(this).attr('dscription-height', thisHeight)

                var thisHtml = $(this).html();
                $(this).html('<div class="description_inner_cont">'+ thisHtml +'</div>')

                var thisPromoHeight = $(this).closest('.et_pb_promo').height();

                $(this).closest('.et_pb_promo').height(thisPromoHeight);
                $(this).closest('.et_pb_promo .et_pb_promo_description ').css('position', 'absolute');
                $(this).find('div').css('max-height', 0)
            })


            $('.tina_my_lover_sidebar_cta').hover(function () {
                $(this).find('.et_pb_promo_description div').css('max-height', $(this).find('.et_pb_promo_description div').attr('dscription-height') + 'px')
            },function () {
                $(this).find('.et_pb_promo_description div').css('max-height', 0)
            })

            $('.tina_my_lover_sidebar_cta .et_pb_promo_description').css('opacity', 1)


            // $('.tina_the_change_tabs.tina_my_lover_sidebar .et_pb_promo:not(.tina_my_lover_sidebar_cta) .et_pb_module_header').hover(function () {
            //     $(this).closest('.et_pb_promo_description').find('div ul').show('slow')
            // },function () {
            //     $(this).closest('.et_pb_promo_description').find('div ul').hide('slow')
            // })
        }




        if($('.tina_my_lover_sidebar_tabs').length !== 0){
            var t1ChangeTabs = new TimelineLite;
            var t1ChangeTabs2 = new TimelineLite;
            $('.tina_my_lover_sidebar_tabs.et_pb_promo').each(function () {
                $(this).find('.et_pb_promo_description > div').attr('div-height', $(this).find('.et_pb_promo_description > div').height())
                $(this).find('.et_pb_promo_description > div').height(0)
            })
            $('.tina_my_lover_sidebar_tabs.et_pb_promo').hover(function () {
                $(this).addClass('hovered')
                $('.tina_my_lover_sidebar_tabs.et_pb_promo').addClass('no_hovered')


                var divHeight = $(this).find('.et_pb_promo_description > div').attr('div-height')

                var chars = $(this).find('.et_pb_promo_description ul li').toArray();

                t1ChangeTabs.staggerFromTo(chars, 0.8, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    ease: Power3.easeOut
                }, 0.08);

                t1ChangeTabs2.staggerFromTo($(this).find('.et_pb_promo_description > div'), 0.5, {
                    height: 0
                }, {
                    height: divHeight
                }, 0.08);

            },function () {
                $(this).removeClass('hovered')
                $('.tina_my_lover_sidebar_tabs.et_pb_promo').removeClass('no_hovered')

                t1ChangeTabs.clear();
                t1ChangeTabs2.clear();
                var t1ChangeTabsHoverOff = new TimelineLite;
                var t1ChangeTabsHoverOff2 = new TimelineLite;


                var chars = $(this).find('.et_pb_promo_description').find('ul li').toArray();

                t1ChangeTabsHoverOff.to($(this).find('.et_pb_promo_description ul li'), 0, {
                    opacity: 0,
                    y: 40
                })
                t1ChangeTabsHoverOff2.to($(this).find('.et_pb_promo_description > div'), 0.5, {
                    height: 0
                })
            })


        }

    }, tinaSliderMyLover);

})(jQuery);