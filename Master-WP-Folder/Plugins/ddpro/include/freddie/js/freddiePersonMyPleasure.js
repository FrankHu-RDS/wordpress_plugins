(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddiePersonMyPleasure  = 1000;

    if (isIE()) {
        freddiePersonMyPleasure = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddiePersonMyPleasure = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_my_pleasure').length !== 0){
            $('.freddie_person_module_my_pleasure  .et_pb_column ').hover(
                function () {
                $(this).find('.et_pb_team_member_description > div').hide(300);
            }, function () {
                    $(this).find('.et_pb_team_member_description > div').show(300);
                })
        }

    }, freddiePersonMyPleasure)

})(jQuery);