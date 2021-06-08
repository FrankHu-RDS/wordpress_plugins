(function($) {


    var ctaTimeOut = 0;

    if ($('body').hasClass('et-fb')) {
        ctaTimeOut = 7000;
    }

    setTimeout(function() {
        //   Persons

        $('.person1-venus .et_pb_team_member').each(function() {
            $("<div class='person_content'></div>").appendTo($(this));
            $(this).find('.et_pb_team_member_image').appendTo($(this).find('.person_content'));
            $(this).find('.et_pb_team_member_description').appendTo($(this).find('.person_content'));
        });

        $('.person1-venus .et_pb_team_member').hover(
            function() {
                $('.person1-venus .et_pb_column .et_pb_team_member').removeClass('main_module').addClass('no_hover_module');
                $(this).addClass('main_module');
            },
            function() {
                $('.person1-venus .et_pb_column .et_pb_team_member').removeClass('no_hover_module');
            }
        );


        $('body.et-fb .person1-venus .et_pb_team_member').hover(
            function() {
                setTimeout(function() {
                    $('body.et-fb .person1-venus .et_pb_team_member.et_pb_hovered').addClass('main_module').addClass('no_hover_module');
                }, 200);
            }
        );


        //   End Persons

    }, ctaTimeOut);

})(jQuery);