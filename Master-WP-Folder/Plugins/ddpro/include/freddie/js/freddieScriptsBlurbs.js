(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieBlurbsTimeOut = 0;

    if (isIE()) {
        freddieBlurbsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieBlurbsTimeOut = 10000;
    }

    setTimeout(function () {

        $('.freddie_fight_from_the_inside_blurbs .et_pb_blurb.hover_blurb ').each(function () {
            $(this).prepend($('  <div class="arrow"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg></div>'))
            $(this).prepend($('<div class="bg_color"><div class="bg_color_inside"></div><div class="bg_color_inside"></div><div class="bg_color_inside"></div><div class="bg_color_inside"></div><div class="bg_color_inside"></div><div class="bg_color_inside"></div></div>'));
        })


        setTimeout(function () {

            $('.freddie_fight_from_the_inside_blurbs .et_pb_blurb.hover_blurb ').each(function () {
                var leftSize = 0;
                var rect = $(this)[0].getBoundingClientRect();

                var bgWidth;
                if (rect.bgWidth) {
                    bgWidth = rect.bgWidth;
                } else {
                    bgWidth = rect.right - rect.left;
                }

                var count = $(this).find('.bg_color_inside').length;

                $(this).find('.bg_color_inside').each(function () {
                    $(this).width(bgWidth / count);
                    $(this).css('left', leftSize);

                    leftSize += bgWidth / count;
                })


            })
        }, 1500)

        TweenMax.set('.freddie_fight_from_the_inside_blurbs .circle__progress', {drawSVG: '82%'});
        $('.freddie_fight_from_the_inside_blurbs .et_pb_blurb.hover_blurb ').hover(
            function () {
                var thisTl = this;
                thisTl.tl = new TimelineLite();
                thisTl.tl.to($(this).find(".et_pb_main_blurb_image"), 0.3, {
                    x: 0,
                    ease: Linear.easeNone
                }, 0)
                    .to($(this).find("h4.et_pb_module_header"), 0.3, {
                        x: 51,
                        ease: Linear.easeNone
                    }, 0)

                    .to($(this).find(".bg_color_inside"), 0.5, {
                        scaleX: 1,
                        transformOrigin: "left",
                        ease: Power3.easeInOut
                    }, 0)
                    .to($(this).find(".arrow"), 0.5, {
                        right: 11,
                        ease: Power3.easeInOut
                    }, 0)

                thisTl.tl.play();
            }, function () {
                var thisTl = this;
                thisTl.tl.reverse();
            }
        )

        $('.freddie_fight_from_the_inside_blurbs .et_pb_blurb.hover_blurb .arrow').hover(
            function () {
                var thisTl = this;
                thisTl.tl = new TimelineLite();
                thisTl.tl
                    .to($(this).find(".circle__progress"), 0.5, {
                        drawSVG: "100%",
                        ease: Power3.easeInOut
                    }, 0)


                thisTl.tl.play();
            }, function () {
                var thisTl = this;
                thisTl.tl.reverse();
            }
        )

        $('.freddie_fight_from_the_inside_blurbs .et_pb_button_module_wrapper .et_pb_button ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this));
            $('<span class="button_circle hover"></span>').appendTo($(this));
        })


        $('.freddie_good_company_blurbs .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        })


        //    Freddie Live With You Blurbs
        setTimeout(function () {
            if ($('.freddie_live_with_you_blurbs ').length !== 0) {
                var blurbHeight = 0;
                $('body:not(.ie) .freddie_live_with_you_blurbs .et_pb_blurb ').each(function () {
                    if (blurbHeight <= $(this).height()) {
                        blurbHeight = $(this).height();
                    }
                })

                $('body:not(.ie) .freddie_live_with_you_blurbs .et_pb_blurb ').height(blurbHeight + 65);


                var blurbHeightIe = 0;
                $('body.ie .freddie_live_with_you_blurbs .et_pb_blurb ').each(function () {
                    if (blurbHeightIe <= $(this).find('.et_pb_blurb_content').height()) {
                        blurbHeightIe = $(this).find('.et_pb_blurb_content').height();
                    }
                })

                $('body.ie .freddie_live_with_you_blurbs .et_pb_blurb ').height(blurbHeightIe + 65);
            }

            $('.freddie_live_with_you_blurbs .et_pb_blurb ').each(function () {
                $(this).find('.et_pb_blurb_description').hide();
            })

            $('.freddie_live_with_you_blurbs .et_pb_blurb ').hover(
                function () {
                    $(this).find('.et_pb_blurb_description').show(400);
                }, function () {
                    $(this).find('.et_pb_blurb_description').hide(400);
                }
            )
        }, 2000)


        //    Freddie Nevermore Blurbs
        setTimeout(function () {
            $('.freddie_nevermore_blurbs .et_pb_blurb').each(function () {
                $('<div class="blurb_description"></div>').insertAfter($(this).find('.et_pb_blurb_content'));
                $(this).find('.et_pb_blurb_description').appendTo($(this).find('.blurb_description'));


                var blurbWidht = $(this).find('.et_pb_blurb_content').width();
                $(this).find('.et_pb_blurb_content').width(blurbWidht);

            })


            $('.freddie_nevermore_blurbs .et_pb_blurb').hover(function () {
                    $('.freddie_nevermore_blurbs .et_pb_blurb').removeClass('hovered_blurb');
                    $('.freddie_nevermore_blurbs .et_pb_blurb').addClass('no_hovered_blurb');
                    $(this).removeClass('no_hovered_blurb');
                    $(this).addClass('hovered_blurb');
                }, function () {
                    $('.freddie_nevermore_blurbs .et_pb_blurb').removeClass('hovered_blurb');
                    $('.freddie_nevermore_blurbs .et_pb_blurb').removeClass('no_hovered_blurb');
                }
            )


            if($(window).width() <= 767){
                $('.freddie_nevermore_blurbs .et_pb_blurb').on('click', function () {
                    if($(this).find('.blurb_description').css('display') === 'block'){
                        $(this).find('.blurb_description').hide('slow');
                    }else{
                        $(this).find('.blurb_description').show('slow');
                    }
                })
            }
        }, 1500)


    }, freddieBlurbsTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);