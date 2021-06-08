(function ($) {


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieProcessCircleTimeOut = 500;

    if (isIE()) {
        freddieProcessCircleTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieProcessCircleTimeOut = 10000;
    }

    setTimeout(function () {

        if ($(".freddie_process_circle").length !== 0) {

            $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description").prepend('<div class="hover_bg"></div>')

            $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").each(function () {
                var liText = $(this).text();
                liText = liText.replace(/ /g, '&nbsp;');
                $(this).html(liText);


                var split = new SplitText($(this), {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });


                var thisChars = $(this);
                setTimeout(function () {
                    thisChars.find(".char").each(function () {
                        $(this).width($(this).width()*2)
                        $(this).css('margin-left', '-'+ $(this).width()/2 +'px')
                    })
                },1000)

                var childs = $(this).find(".char");
                var t2 = new TimelineLite;
                var chars = split.chars;
                var itemsLength = childs.length;

                var rotateSize = 4.5;

                var itemsRotateSize = 90 / rotateSize;

                itemsRotateSize = (((itemsRotateSize - itemsLength) / 2) * rotateSize) + 2.7;

                var j = 0;

                for (var i = 1; i <= itemsLength; i++) {

                    $(this).find(".char:nth-child(" + i + ")").css('transform', 'rotate(' + ((rotateSize * j) + itemsRotateSize) + 'deg)')
                    j++;
                }

            })


            $('.freddie_process_circle .et_pb_promo .et_pb_button ').each(function () {
                var buttonText = $(this).text();
                $(this).html('<span>' + buttonText + '</span>');

                $(this).prepend($('<div class="bg_color"></div>'));
            })


            var tlSoulBrother = new TimelineLite();
            $('.freddie_process_circle .et_pb_promo .et_pb_button ').hover(
                function () {

                    tlSoulBrother.to($(this).find('span'), 0.3, {
                        x: -35,
                        ease: Power0.easeNone
                    }, 0)
                        .to($(this).find('.bg_color'), 0, {
                            opacity: 1,
                            ease: Power0.easeNone

                        }, 0);
                }, function () {
                    tlSoulBrother.clear();
                    var tl2SoulBrother = new TimelineLite();
                    tl2SoulBrother.to($(this).find('span'), 0.3, {
                        x: 0,
                        ease: Power0.easeNone
                    }, 0)
                        .to($(this).find('.bg_color'), 0, {
                            opacity: 0,
                            ease: Power0.easeNone

                        }, 0);
                }
            )

            $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li:nth-of-type(1)").addClass('clicked');

            var  freddieProcessCircleTimeOutLiHover = 0;
            if ($('body').hasClass('et-fb')) {
                freddieProcessCircleTimeOutLiHover = 10000;
            }

            setTimeout(function () {
                $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").hover(
                    function () {
                        var thisLi = $(this);

                        $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").removeClass('hovered')
                        thisLi.addClass('hovered')
                        // $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description .hover_bg").css('transform', 'rotate(' + thisLi.prevAll('li').length * 90 + 'deg)')

                    }, function () {
                        var thisLi = $(this);
                        thisLi.removeClass('hovered')

                        // $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul .hover_bg").css('transform', 'rotate(' + $('.freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li.clicked').prevAll('li').length * 90 + 'deg)')

                    }
                )

         $(".freddie_process_circle").each(function(){
  
                $(this).find(".et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").on('click', function() {
                    var liBeforeElForRotate = $(this).prevAll('li').length;
                    var liBeforeEl = $(this).prevAll('li').length + 1;

                     $(this).closest('.freddie_process_circle').find('.et_pb_column .et_pb_promo ').hide('slow')
                     $(this).closest('.freddie_process_circle').find('.et_pb_column .et_pb_promo:nth-child(' + liBeforeEl + ')').show('slow')
                    // $(this).closest('.freddie_process_circle').find('.et_pb_column .et_pb_promo:nth-child(' + (liBeforeEl + 2) + ')').show('slow')


                     $(this).closest('.freddie_process_circle').find(".et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").removeClass('clicked')
                    $(this).addClass('clicked')


                      $(this).closest('.freddie_process_circle').find('.et_pb_column .et_pb_blurb .et_pb_blurb_description ul').css('transform', 'rotate('+ (45 - (liBeforeElForRotate*90)) +'deg)')
                });
                
         });
                
                
            },freddieProcessCircleTimeOutLiHover)



            $(".freddie_process_circle").css('opacity', 1);

            setTimeout(function () {
                $(".freddie_process_circle .et_pb_blurb").addClass('visible');
                $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description").css('transform', 'scale(1) rotate(0deg)')
                $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description").css('opacity', 1)
            }, 500)

            setTimeout(function () {
                $(".freddie_process_circle .et_pb_blurb").addClass('visible_border');
                $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description .hover_bg").css('opacity', 1)
            }, 2000)


            // Visual Builder



            $('body.et-fb .freddie_process_circle').hover(
                function () {
                    setTimeout(function () {
                        if ($('.freddie_process_circle .et_pb_column .et_pb_blurb .hover_bg').length === 0) {
                            $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description").prepend('<div class="hover_bg"></div>')
                        }

                        $(".freddie_process_circle .et_pb_blurb").addClass('visible');
                        $(".freddie_process_circle .et_pb_blurb").addClass('visible_border');
                        $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description .hover_bg").css('opacity', 1)
                        $(".freddie_process_circle .et_pb_column .et_pb_blurb .et_pb_blurb_description ul li").each(function () {
                            var liText = $(this).text();
                            liText = liText.replace(/ /g, '&nbsp;');
                            $(this).html(liText);


                            var split = new SplitText($(this), {
                                type: "chars",
                                charsClass: "char char++",
                                position: "absolute"
                            });

                            var childs = $(this).find(".char");
                            var t2 = new TimelineLite;
                            var chars = split.chars;
                            var itemsLength = childs.length;

                            var rotateSize = 4.5;

                            var itemsRotateSize = 90 / 4.5;

                            itemsRotateSize = (((itemsRotateSize - itemsLength) / 2) * 4.5) + 2.7;

                            var j = 0;

                            for (var i = 1; i <= itemsLength; i++) {

                                $(this).find(".char:nth-child(" + i + ")").css('transform', 'rotate(' + ((rotateSize * j) + itemsRotateSize) + 'deg)')
                                j++;
                            }

                        })
                    }, 50)
                })


        }

    }, freddieProcessCircleTimeOut);

})(jQuery);