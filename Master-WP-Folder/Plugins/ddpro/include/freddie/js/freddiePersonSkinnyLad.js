(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieSkinnyLadPerson = 1000;

    if (isIE()) {
        freddieSkinnyLadPerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieSkinnyLadPerson = 10000;
    }

    setTimeout(function () {

        if($('.freddie_person_module_skinny_lad ').length !== 0){



            $('.freddie_person_module_skinny_lad  .et_pb_team_member').each(function () {
                $('<div class="icon_box"></div>').insertAfter($(this).find('.et_pb_team_member_image'))
                $(this).find('.et_pb_member_social_links').insertBefore($(this).find('.et_pb_team_member_description'))
            })



            $('.freddie_person_module_skinny_lad .et_pb_team_member').hover(
                function () {

                        var tlshowHeader = new TimelineLite;
                        var charsTitle = $(this).find('.et_pb_member_social_links li').toArray();

                        tlshowHeader.staggerTo(charsTitle, 0.5,  {
                            x: 0,
                            opacity: 1
                        }, 0.03);



                }, function () {
                    var tlshowHeader = new TimelineLite;
                    var charsTitle = $(this).find('.et_pb_member_social_links li').toArray();

                    tlshowHeader.staggerTo(charsTitle, 0.5,  {
                        x: '30px',
                        opacity: 0
                    }, 0.03);

                }
            )


        }

    }, freddieSkinnyLadPerson)

})(jQuery);