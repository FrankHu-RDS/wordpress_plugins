(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaPersonModuleCallIt = 1500;

    if (isIE()) {
        tinaPersonModuleCallIt = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaPersonModuleCallIt = 10000;
    }

    setTimeout(function () {
        if($('.tina_person_call_it ').length !== 0){
            $('.tina_person_call_it .et_pb_team_member').each(function () {
                $(this).find('ul.et_pb_member_social_links').insertBefore($(this).find('.et_pb_team_member_description'))
            })

        }

    }, tinaPersonModuleCallIt);

})(jQuery);