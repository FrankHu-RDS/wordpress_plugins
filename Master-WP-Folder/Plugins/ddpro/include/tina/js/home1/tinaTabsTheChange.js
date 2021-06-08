(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTheChangeTabs = 2500;

    if (isIE()) {
        tinaTheChangeTabs = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTheChangeTabs = 10000;
    }

    setTimeout(function () {
        if($('.tina_the_change_tabs ').length !== 0){
            var t1ChangeTabs = new TimelineLite;
            $('.tina_the_change_tabs  .et_pb_promo h2.et_pb_module_header').hover(function () {
                $(this).closest('.et_pb_promo_description').addClass('hovered')
                $('.tina_the_change_tabs  .et_pb_promo .et_pb_promo_description').addClass('no_hovered')


                var chars = $(this).closest('.et_pb_promo_description').find('ul li').toArray();

                t1ChangeTabs.staggerFromTo(chars, 0.8, {
                    opacity: 0,
                    y: 40
                }, {
                    opacity: 1,
                    y: 0,
                    ease: Power3.easeOut
                }, 0.08);
            },function () {
                $(this).closest('.et_pb_promo_description').removeClass('hovered')
                $('.tina_the_change_tabs  .et_pb_promo .et_pb_promo_description').removeClass('no_hovered')

                t1ChangeTabs.clear();
                var t1ChangeTabsHoverOff = new TimelineLite;


                var chars = $(this).closest('.et_pb_promo_description').find('ul li').toArray();

                t1ChangeTabsHoverOff.to($(this).closest('.et_pb_promo_description').find('ul li'), 0, {
                    opacity: 0,
                    y: 40
                })
            })


        }

    }, tinaTheChangeTabs);

})(jQuery);