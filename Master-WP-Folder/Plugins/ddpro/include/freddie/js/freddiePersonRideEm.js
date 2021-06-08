(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonRideEm  = 1000;

    if (isIE()) {
        freddiePersonRideEm = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonRideEm = 10000;
    }

    setTimeout(function () {

        if($('.freddie_ride_em_person_module').length !== 0){
            $('.freddie_ride_em_person_module .et_pb_team_member ').each(function () {
                $(this).find('.et_pb_member_social_links').insertAfter($(this).find('.et_pb_team_member_description'));
            })
        }

    }, freddiePersonRideEm)

})(jQuery);