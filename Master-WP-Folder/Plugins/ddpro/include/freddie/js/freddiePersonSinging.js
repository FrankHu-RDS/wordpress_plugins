(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var frddieSingingPersonModule = 1000;

    if (isIE()) {
        frddieSingingPersonModule = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        frddieSingingPersonModule = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_singing_person_module').length !== 0) {
            $(".freddie_singing_person_module .et_pb_team_member").each(function () {
                var splitButtonTorriate = new SplitText($(this).find('h4.et_pb_module_header'), {
                    type: "words,chars",
                    charsClass: "char char++",
                    position: "static"
                });
                });



                $('.freddie_singing_person_module .et_pb_column').hover(
                    function () {
                        var tlshowHeader = new TimelineLite;
                        var charsTitle = $(this).find('h4.et_pb_module_header .char ').toArray();

                        tlshowHeader.staggerTo(charsTitle, 0.5,  {
                            opacity: 1,
                            y: 0,
                            ease: Back.easeOut
                        }, 0.03);

                    }, function () {
                        var thisChar = $(this)
                        setTimeout(function () {
                            var tlshowHeader = new TimelineLite;
                            var charsTitle = thisChar.find('h4.et_pb_module_header .char ').toArray();

                            tlshowHeader.staggerTo(charsTitle, 0.5,  {
                                opacity: 0,
                                y: '30px',
                                ease: Back.easeOut
                            }, 0.03);
                        },300)

                    }
                )

            }

        },frddieSingingPersonModule)

})(jQuery);