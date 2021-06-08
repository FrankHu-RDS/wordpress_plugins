(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonYouGot  = 1500;

    if (isIE()) {
        freddiePersonYouGot = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonYouGot = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_you_got').length !== 0){
            $('.freddie_person_module_you_got .et_pb_team_member ').each(function () {
                $(this).find('.et_pb_team_member_image').prepend($('<div class="hover_box"></div>'))
                var thisHeight = $(this).height();
                var descHeight = $(this).find('.et_pb_team_member_description').outerHeight();
                var topBoxHeight = thisHeight - descHeight;

                $(this).find('.hover_box').height(topBoxHeight- 10);

                // $(this).find('.et_pb_member_social_links').insertAfter($(this).find('.et_pb_team_member_description'));
            })
        }

    }, freddiePersonYouGot)

})(jQuery);