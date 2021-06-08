(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContactSidewalk = 1000;

    if (isIE()) {
        tinaContactSidewalk = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContactSidewalk = 10000;
    }

    setTimeout(function () {
        $('.tina_contact_form_talk_now .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })
        });


        $('.tina_contact_form_talk_now .et_pb_contact_form_container p.et_pb_contact_field').each(function () {
            var formWidth = $(this).closest('form.et_pb_contact_form').width();
            var labelWidth = $(this).find('.et_pb_contact_form_label').width();
            // $(this).find('input').css('text-indent', (labelWidth + 20) + 'px')
            $(this).find('input').css('width', (formWidth - labelWidth - 20) + 'px')
            $(this).find('textarea').attr('textIndent', (labelWidth + 20) + 'px' )
            $(this).find('textarea').css('cssText', 'text-indent: ' + (labelWidth + 20) + 'px;' )
        });


        $('.tina_contact_form_talk_now .et_pb_contact_form_container textarea').on('keydown', function () {
            var el = $(this);
            setTimeout(function(){
                el.css('cssText', 'height:auto; padding:0');
                el.css('cssText', 'text-indent:'  + el.attr('textIndent'));
                el.css('cssText', 'height:' + el.get(0).scrollHeight + 'px; text-indent:' + el.attr('textIndent'));
            },0);
        });

    }, tinaContactSidewalk);

})(jQuery);