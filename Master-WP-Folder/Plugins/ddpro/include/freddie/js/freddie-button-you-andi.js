(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieButtonsTimeOut = 1000;

    if (isIE()) {
        freddieButtonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieButtonsTimeOut = 10000;
    }

    setTimeout(function () {

        // Freddie Button You And I


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_you_andi ').each(function () {
            $(this).parent('.et_pb_button_module_wrapper').addClass('freddie_button_you_andi_parent')
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');
        })


        $('<div class="arrow"><div class="line line_1"></div><div class="line line_2"></div></div>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_you_andi '));
        // $(' <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress circle_progress_bottom"/> </svg><svg class="top_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress circle_progress_top"/> </svg>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_you_andi '));
        $('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"> <circle cx="17" cy="17" r="15.5" class="circle__background"/> <circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>').appendTo($('.et_pb_button_module_wrapper .et_pb_button.freddie_button_you_andi '));

        var tlYouAndCircle = new TimelineLite();
        tlYouAndCircle.to($(".et_pb_button_module_wrapper .et_pb_button.freddie_button_you_andi .circle_progress_top"), 0, {
            rotationX: -180,
            transformOrigin: "center"
        }, 0)


        TweenMax.set('.freddie_button_you_andi .circle__progress', {drawSVG: 0});

        $('.et_pb_button_module_wrapper.freddie_button_you_andi_parent').on('click', function () {
            window.location.href = $(this).find('a.et_pb_button').attr('href')
        })

        $('.et_pb_button_module_wrapper.freddie_button_you_andi_parent').hover(
            function () {
                var selfYouAndI = this;
                var percentageComplete = 1;

                selfYouAndI.tlYouAndiCircle = new TimelineLite();

                selfYouAndI.tlYouAndiCircle
                    .fromTo($(this).find(".circle__progress"), 1.3, {
                        drawSVG: "0%",
                        rotation: 0,
                    }, {
                        drawSVG: "0 100%",
                        rotation: "360deg",
                        transformOrigin: "center",
                        ease: Power3.easeOut
                    }, 0)

                    .to($(this).find(".arrow"), 0.4, {
                        right: 1,
                        ease: Power3.easeOut
                    }, 0)
                    .to($(this).find(".line"), 0.4, {
                        width: 2,
                        rotation: 0,
                        ease: Power3.easeOut
                    }, 0)
                    .to($(this).find(".line"), 0.4, {
                        width: 8,
                        ease: Power3.easeOut
                    }, 0.5)
                    .to($(this).find(".line_1"), 0.4, {
                        width: 8,
                        rotation: "45deg",
                        ease: Power3.easeOut
                    }, 0.5)
                    .to($(this).find(".line_2"), 0.4, {
                        width: 8,
                        rotation: "-45deg",
                        ease: Power3.easeOut
                    }, 0.5)
                    .to($(this).find(".arrow"), 0, {
                        right: 40,
                        opacity: 0,
                        ease: Power3.easeOut
                    }, 0.4)
                    .to($(this).find(".arrow"), 0.4, {
                        right: 19,
                        opacity: 1,
                        ease: Power3.easeOut
                    }, 0.5);


                selfYouAndI.tlYouAndiCircle.play();
            }, function () {
                var selfYouAndI = this;
                selfYouAndI.tlYouAndiCircle.reverse();

            }
        )

    }, freddieButtonsTimeOut)

})(jQuery);