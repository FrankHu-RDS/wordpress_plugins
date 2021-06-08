(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieTheBonesPerson  = 2000;

    if (isIE()) {
        freddieTheBonesPerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieTheBonesPerson = 10000;
    }

    setTimeout(function () {

        if($('.freddie_the_bones_person_module ').length !== 0){
            $('.freddie_the_bones_person_module  .et_pb_team_member ').each(function () {
                var descHeight = $(this).find('.et_pb_team_member_description > div').outerHeight();
                $(this).find('.et_pb_team_member_description').prepend($('<div class="person_text_cont"><div class="bottom_lines"></div></div>'));
                $(this).find('h4.et_pb_module_header').appendTo($(this).find('.person_text_cont'))
                $(this).find('p.et_pb_member_position').appendTo($(this).find('.person_text_cont'))

                // $(this).find('.et_pb_team_member_image').prepend($('<div class="hover_box"></div>'))
                var thisHeight = $(this).find('.et_pb_team_member_description').height();
                var thisTitleHeight = $(this).find('h4.et_pb_module_header').outerHeight();

                var topBoxHeight = thisHeight - descHeight;

                var bottomLinesHeight = topBoxHeight - thisTitleHeight;

                $(this).find('.person_text_cont').height(topBoxHeight - 10);
                $(this).find('.bottom_lines').height(bottomLinesHeight - 15);



                var splitButtonTorriate = new SplitText($(this).find('h4.et_pb_module_header'), {
                    type: "words,chars",
                    charsClass: "char char++",
                    position: "static"
                });
            })


            $('.freddie_the_bones_person_module .et_pb_team_member').hover(
                function () {
                    var thisChar = $(this)
                    setTimeout(function () {
                        var tlshowHeader = new TimelineLite;
                        var charsTitle = thisChar.find('h4.et_pb_module_header .char ').toArray();

                        tlshowHeader.staggerTo(charsTitle, 0.5,  {
                            opacity: 1,
                            y: 0,
                            ease: Back.easeOut
                        }, 0.03);
                    },300)




                }, function () {
                    var tlshowHeader = new TimelineLite;
                    var charsTitle = $(this).find('h4.et_pb_module_header .char ').toArray();

                    tlshowHeader.staggerTo(charsTitle, 0.5,  {
                        opacity: 0,
                        y: '20px',
                        ease: Back.easeOut
                    }, 0.03);

                }
            )
        }

    }, freddieTheBonesPerson)

})(jQuery);