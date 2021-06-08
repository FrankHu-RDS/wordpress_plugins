(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonRockingWorlde  = 1000;

    if (isIE()) {
        freddiePersonRockingWorlde = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonRockingWorlde = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_rocking_world').length !== 0){
            $('.freddie_person_module_rocking_world .et_pb_team_member ').each(function () {
                $(this).find('h4.et_pb_module_header').insertBefore($(this).find('.et_pb_team_member_image'));
                $(this).find('.et_pb_team_member_description strong').insertAfter($(this).find('.et_pb_team_member_image'));
            })
        }

    }, freddiePersonRockingWorlde)

})(jQuery);