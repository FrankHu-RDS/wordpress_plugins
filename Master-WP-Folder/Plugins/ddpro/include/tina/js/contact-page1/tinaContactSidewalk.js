(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentPage8 = 1000;

    if (isIE()) {
        tinaContentPage8 = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentPage8 = 10000;
    }

    setTimeout(function () {
        // Classes

        var bodyHeight = $(window).height();

       $('body:not(.et-fb) .tina-sidewalk-contact-body').outerHeight(bodyHeight);
        var bottomRowHeight  = $('.sidewalk-contact-bottom-row').outerHeight();
        var sectionHeight  = $('.tina-sidewalk-contact-body').height();
        $('body:not(.et-fb) .tina-sidewalk-contact-row').height(sectionHeight - bottomRowHeight);


        $('body:not(.et-fb) .tina-sidewalk-contact-row').hover(function() {
            var thisItem = $(this);
            setTimeout(function () {
                $('.tina-sidewalk-contact-row').removeClass('active');
                $('.tina-sidewalk-contact-row').addClass('inactive');
                thisItem.removeClass('inactive');
                thisItem.addClass('active');
            },100)

        }, function () {

            setTimeout(function () {
                $('.tina-sidewalk-contact-row').removeClass('active');
                $('.tina-sidewalk-contact-row').removeClass('inactive');
            },100)

        });


        $('.tina-sidewalk-contact-row .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })

        })

    }, tinaContentPage8);

})(jQuery);