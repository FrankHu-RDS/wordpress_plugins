(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var abouNevermorePerson = 1500;

    if (isIE()) {
        abouNevermorePerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        abouNevermorePerson = 10000;
    }

    setTimeout(function () {
        if($('.freddie_nevermore_person_module.freddie_nevermore_person_module_about').length !== 0){
            setTimeout(function () {
                $('.freddie_nevermore_person_module.freddie_nevermore_person_module_about .et_pb_team_member').each(function () {
                    $(this).find('h4.et_pb_module_header').insertBefore($(this).find('.et_pb_member_position'));
                    $(this).find('.et_pb_member_social_links').insertAfter($(this).find('.et_pb_member_position'));
                })
            },1500)

        }

    }, abouNevermorePerson);

})(jQuery);