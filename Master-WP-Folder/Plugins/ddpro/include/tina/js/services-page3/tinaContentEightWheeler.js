(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentEightWheeler = 3000;

    if (isIE()) {
        tinaContentEightWheeler = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentEightWheeler = 10000;
    }

    setTimeout(function () {
        if ($('.tina_content_eight_wheeler').length !== 0) {

            $('.tina_content_eight_wheeler .et_pb_row.circles_row').prepend($('<div class="animation_dot"></div>'))


            $('.tina_content_eight_wheeler .et_pb_promo').each(function () {
                $('<div class="arrow"></div>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button '))
            });



            var rowHeight =  $('.tina_content_eight_wheeler .et_pb_row.circles_row').height();


            var lineWidth = 2*((rowHeight/2)*(rowHeight/2));
            lineWidth = Math.sqrt(lineWidth) -rowHeight/2;
            lineWidth = lineWidth*lineWidth;


            var x = lineWidth/2;
            x= Math.sqrt(x)


            $('.tina_content_eight_wheeler .et_pb_row.circles_row .animation_dot').css('top', rowHeight/2)

            var dot = $('.tina_content_eight_wheeler .et_pb_row.circles_row .animation_dot');

            TweenMax.to(dot, 4, {
                bezier: {
                    curviness: 1.5,
                    values: [
                        {left:0, top:rowHeight/2},


                        {left:(x), top:x},
                        {left:rowHeight/2, top:0},
                        {left:(rowHeight- x), top:x},
                        {left:rowHeight, top:rowHeight/2},
                        {left:(rowHeight+ x), top:(rowHeight-x)},
                        {left:rowHeight*1.5, top:rowHeight},
                        {left:(rowHeight*2-x), top:(rowHeight-x)},
                        {left:rowHeight*2, top:rowHeight/2},
                        {left:(rowHeight*2+ x), top:x},
                        {left:rowHeight*2.5, top:0},
                        {left:(rowHeight*3- x), top:x},
                        {left:rowHeight*3, top:rowHeight/2},
                        {left:(rowHeight*3+ x), top:rowHeight-x},
                        {left:rowHeight*3.5, top:rowHeight},
                        {left:(rowHeight*4- x), top:rowHeight-x},
                        {left:rowHeight*4, top:rowHeight/2},
                        {left:(rowHeight*4- x), top:x},
                        {left:rowHeight*3.5, top:0},
                        {left:(rowHeight*3+ x), top:x},
                        {left:rowHeight*3, top:rowHeight/2},
                        {left:(rowHeight*3- x), top:rowHeight-x},
                        {left:rowHeight*2.5, top:rowHeight},
                        {left:(rowHeight*2+ x), top:rowHeight-x},
                        {left:rowHeight*2, top:rowHeight/2},
                        {left:(rowHeight*2- x), top:x},

                        {left:rowHeight*1.5, top:0},
                        {left:(rowHeight+ x), top:x},
                        {left:rowHeight, top:rowHeight/2},
                        {left:(rowHeight- x), top:rowHeight-x},
                        {left:rowHeight/2, top:rowHeight},
                        {left:(x), top:rowHeight-x},
                        {left:0, top:rowHeight/2}




                    ]


                },
                ease: Linear.easeNone,
                repeat:-1
            })


            $('.tina_content_eight_wheeler .et_pb_row.circles_row .animation_dot').css('opacity', 1)

        }

    }, tinaContentEightWheeler);

})(jQuery);