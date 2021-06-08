(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieBlueEyedPerson = 1000;

    if (isIE()) {
        freddieBlueEyedPerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieBlueEyedPerson = 10000;
    }

    setTimeout(function () {

        if($('.freddie_blue_eyed_person_module').length !== 0){



            var itemCount = 1;

            $('.freddie_blue_eyed_person_module .et_pb_team_member').each(function () {
                $(this).addClass('member_' + itemCount)

                var thisBgImage = $(this).find('.et_pb_team_member_image img').attr('src');

                $('<img class="image_'+ itemCount +'" src="'+ thisBgImage +'">').appendTo($(this).closest('.et_pb_row').find('.images_col'))

                itemCount++;
                var splitButtonTorriate = new SplitText($(this).find('.et_pb_team_member_description > div a'), {
                    type: "words,chars",
                    charsClass: "char char++",
                    position: "static"
                });
            })


            $('.freddie_blue_eyed_person_module .images_col img:first-child').addClass('active_image');

            $('.freddie_blue_eyed_person_module .et_pb_team_member').hover(
                function () {
                    var thisCount = $(this).prevAll('.et_pb_team_member').length + 1;


                    $('.freddie_blue_eyed_person_module .images_col img').removeClass('active_image')
                    $('.freddie_blue_eyed_person_module .images_col img.image_' + thisCount).addClass('active_image')

                        var tlshowHeader = new TimelineLite;
                        var charsTitle = $(this).find('.et_pb_team_member_description > div a .char').toArray();

                        tlshowHeader.staggerTo(charsTitle, 0.5,  {
                            opacity: 1,
                            ease: Back.easeOut
                        }, 0.03);

                }, function () {
                    var tlshowHeader = new TimelineLite;
                    var charsTitle = $(this).find('.et_pb_team_member_description > div a .char').toArray();

                    tlshowHeader.staggerTo(charsTitle, 0.5,  {
                        opacity: 0,
                        ease: Back.easeOut
                    }, 0.03);

                }
            )
        }

    }, freddieBlueEyedPerson)

})(jQuery);