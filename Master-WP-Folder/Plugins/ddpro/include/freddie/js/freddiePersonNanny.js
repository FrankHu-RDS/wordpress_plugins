(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieNannyPerson = 1000;

    if (isIE()) {
        freddieNannyPerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieNannyPerson = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_nanny').length !== 0){



            $('.freddie_person_module_nanny .et_pb_team_member').each(function () {
                $(this).find('h4.et_pb_module_header').appendTo($(this).find('.et_pb_team_member_image'))
                $(this).find('p.et_pb_member_position').appendTo($(this).find('.et_pb_team_member_description'))
            })



        }

    }, freddieNannyPerson)

})(jQuery);