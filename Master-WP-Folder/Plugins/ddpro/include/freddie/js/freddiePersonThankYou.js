(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieThankYouPersonModule  = 1000;

    if (isIE()) {
        freddieThankYouPersonModule = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieThankYouPersonModule = 10000;
    }

    setTimeout(function () {

        if($('.freddie_thank_you_person_module').length !== 0){

            $('.freddie_thank_you_person_module .et_pb_team_member ').each(function () {
                $(this).find('.et_pb_member_position ').insertBefore($(this).find('.et_pb_team_member_image  '));
            })



            if($(".freddie_thank_you_person_module .circle_text_cont").length !== 0){
                $('.freddie_thank_you_person_module .et_pb_column  ').each(function () {
                    $(this).find(".circle_text_cont").insertBefore($(this).find('.et_pb_team_member .et_pb_team_member_image img'))
                })

                $(".freddie_thank_you_person_module .circle_text_cont .et_pb_text_inner").each(function () {
                    if ($(this).find('p').length !== 0) {
                        $(this).find('p').addClass('circle_text');
                    } else {
                        $(this).contents().filter(function () {
                            return this.nodeType === 3;
                        }).wrap("<div class='circle_text'></div>");
                        $(this).find('.circle_text:nth-child(1)').remove();
                    }


                    var paragraphText = $(this).find('.circle_text').text();

                    paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                    $(this).find('.circle_text').html(paragraphText);


                    var split = new SplitText($(this).find(".circle_text"), {
                        type: "chars",
                        charsClass: "char char++",
                        position: "absolute"
                    });



                    var childs = $(this).find(".char");

                    for (var i = 0; i < childs.length; i++) {
                        childs[i].style.display = "inline";
                        childs[i].style.width = "100%";
                        childs[i].style.top = 0;
                        childs[i].style.left = 0;
                    }

                    var t2 = new TimelineLite;
                    var chars = split.chars;
                    var inner = $(this).find(".circle_text");

                    TweenLite.set($(this).find(".circle_text"), {perspective: 400});

                    var itemsLength = childs.length;
                    var rotateSize = 350 / itemsLength;

                    for (var i = 1; i <= itemsLength; i++) {
                        $(this).find(".char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                    }

                    t2.to(inner, 30, {
                        rotation: "360",
                        repeat: -1,
                        ease: Linear.easeNone
                    }, 0);

                })









                $('.freddie_thank_you_person_module .et_pb_team_member ').hover(
                    function () {
                        var t1ThankYou = new TimelineLite;
                        var t2ThankYou = new TimelineLite;


                        var chars = $(this).find('.char').toArray();
                        // var inner = $(this).find(".circle_text");

                        t1ThankYou.staggerFromTo(chars, 0.4, {
                            opacity: 0,
                            scale: 0.8
                        }, {
                            opacity: 1,
                            scale: 1,
                            ease: Power3.easeOut
                        }, 0.01);

                        // t2ThankYou.to(inner, 30, {
                        //     rotation: "360",
                        //     repeat: -1,
                        //     ease: Linear.easeNone
                        // }, 0);


                    }, function () {
                        var t1ThankYou = new TimelineLite;
                        var t2ThankYou = new TimelineLite;

                        var chars = $(this).find('.char').toArray();
                        // var inner = $(this).find(".circle_text");

                        t1ThankYou.staggerFromTo(chars, 0.4, {
                            opacity: 1,
                            scale: 1
                        }, {
                            opacity: 0,
                            scale: 0.8,
                            ease: Power3.easeOut
                        }, 0.01);


                    }
                )


            }
        }

    }, freddieThankYouPersonModule)

})(jQuery);