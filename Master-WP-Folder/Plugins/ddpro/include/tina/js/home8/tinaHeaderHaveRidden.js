(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderHaveRidden = 1500;

    if (isIE()) {
        tinaHeaderHaveRidden = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderHaveRidden = 10000;
    }

    setTimeout(function () {
        if($('.tina_header_have_ridden').length !== 0){
            $('.tina_header_have_ridden .et_pb_slider .et_pb_slide').each(function () {
                var slideImage = $(this).css('background-image')
                $(this).css('background-image', 'none');

                $('<div class="right_image"></div>').insertAfter($(this).find('.et_pb_slide_description'))
                $('<div class="left_box"></div>').insertAfter($(this).find('.et_pb_slide_description'))

                $(this).find('.right_image').css('background-image', slideImage);

                $(this).find('.et_pb_slide_description').appendTo($(this).find('.left_box'))
                $(this).find('.et_pb_slide_image').appendTo($(this).find('.left_box'))
                $(this).find('.et_pb_button_wrapper').appendTo($(this).find('.right_image'))


                var buttonPhargraph= $(this).find('.et_pb_slide_description h6').text();
                $(this).find('.et_pb_slide_description h6').remove();

                $(this).find('.et_pb_button_wrapper .et_pb_button').html('<span class="button_title">'+ $(this).find('.et_pb_button_wrapper .et_pb_button').text() +'</span><span class="button_text">'+ buttonPhargraph +'</span>')

                var imageTitle= $(this).find('.et_pb_slide_description h5').text();
                $(this).find('.et_pb_slide_description h5').remove();

                $('<div class="image_caption">'+ imageTitle +'</div>').appendTo($(this).find('.et_pb_slide_image'))
            })

            $('.tina_header_have_ridden .et_pb_slider .et-pb-controllers a').each(function () {
                $(this).prepend($('  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))
            })


            TweenMax.set('.tina_header_have_ridden .et_pb_slider .circle__progress', {drawSVG: '0%'});
            TweenMax.set('.tina_header_have_ridden .et_pb_slider a.et-pb-active-control .circle__progress', {drawSVG: '100%'});

            $('.tina_header_have_ridden .et-pb-controllers a').on('click', function (event) {

                var thisDot = $(this)

                var tlCircle = new TimelineLite();
                tlCircle.to($('.tina_header_have_ridden .et-pb-controllers a .circle__progress'), 0.4, {
                    drawSVG: "0 0%",
                    ease: Linear.easeNone
                });

                    var tlCircleFirst = new TimelineLite();
                    tlCircleFirst.to(thisDot.find('.circle__progress'), 0.4, {
                        drawSVG: "100%",
                        ease: Linear.easeNone
                    });

            })



            if ($('.tina_header_have_ridden .et_pb_slider').hasClass('et_slider_auto')) {
                setInterval(function () {

                        var tlCircle = new TimelineLite();
                        tlCircle.to($('.tina_header_have_ridden .et_slide_transition_to_next .et-pb-controllers a .circle__progress'), 0.4, {
                            drawSVG: "0 0%",
                            ease: Linear.easeNone
                        });


                            var tlCircleFirst = new TimelineLite();
                            tlCircleFirst.to($('.tina_header_have_ridden .et_slide_transition_to_next .et-pb-controllers a.et-pb-active-control .circle__progress'), 0.4, {
                                drawSVG: "100%",
                                ease: Linear.easeNone
                            });




                },200)
            }

        }

    }, tinaHeaderHaveRidden);

})(jQuery);