(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonModuleMyBand  = 1000;

    if (isIE()) {
        freddiePersonModuleMyBand = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonModuleMyBand = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_my_band').length !== 0){
            $('.freddie_person_module_my_band .et_pb_team_member ').each(function () {
                $(this).find('.et_pb_team_member_description > div ').insertBefore($(this).find('h4.et_pb_module_header '));
                $(this).find('.et_pb_team_member_description > div ').prepend($(this).find('.et_pb_team_member_image '));
            })
        }

    }, freddiePersonModuleMyBand)

})(jQuery);