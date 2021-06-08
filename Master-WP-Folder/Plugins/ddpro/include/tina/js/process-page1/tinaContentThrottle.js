(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentThrottle = 3000;

    if (isIE()) {
        tinaContentThrottle = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentThrottle = 10000;
    }

    setTimeout(function () {
        if ($('.tina_content_throttle').length !== 0) {

            $('.tina_content_throttle .et_pb_row.circles_row').prepend($('<div class="animation_dot"></div>'))

            var rowHeight =  $('.tina_content_throttle .et_pb_row.circles_row').height();
            var colWidht =  $('.tina_content_throttle .et_pb_row.circles_row .et_pb_column ').css('margin-right');
            colWidht = parseFloat(colWidht.replace(/-/g, ''));
            colWidht= parseInt(colWidht, 10);

            var y = rowHeight/2 - colWidht/2;


            var z = (rowHeight/2)*(rowHeight/2) - (y*y);

            z = Math.sqrt(z)*2;
            z = (rowHeight - z)/2



            var lineWidth = 2*((rowHeight/2)*(rowHeight/2));
            lineWidth = Math.sqrt(lineWidth) -rowHeight/2;
            lineWidth = lineWidth*lineWidth;

            var x = lineWidth/2;
            x= Math.sqrt(x)


            $('.tina_content_throttle .et_pb_row.circles_row .animation_dot').css('top', rowHeight/2)

            var dot = $('.tina_content_throttle .et_pb_row.circles_row .animation_dot');

            TweenMax.to(dot, 4, {
                bezier: {
                    curviness: 1.5,
                    values: [
                        {left:0, top:rowHeight/2},


                        {left:(x), top:x},
                        {left:rowHeight/2, top:0},
                        {left:(rowHeight- x), top:x},
                        {left:rowHeight, top:rowHeight/2},
                        {left:rowHeight-colWidht/2, top:rowHeight-z},
                        {left:rowHeight-colWidht/2, top:rowHeight-z},
                        {left:rowHeight-colWidht/2, top:rowHeight-z},
                        {left:rowHeight-colWidht, top:rowHeight/2},
                        {left:rowHeight-colWidht/2, top:z},
                        {left:rowHeight*1.5-colWidht, top:0},
                        {left:rowHeight*2-colWidht*1.5, top:z},
                        {left:rowHeight*2-colWidht, top:rowHeight/2},
                        {left:rowHeight*2-colWidht*1.5, top:rowHeight-z},
                        {left:rowHeight*2-colWidht*1.5, top:rowHeight-z},
                        {left:rowHeight*2-colWidht*1.5, top:rowHeight-z},
                        {left:rowHeight*2-colWidht*2, top:rowHeight/2},
                        {left:rowHeight*2-colWidht*1.5, top:z},
                        {left:rowHeight*2.5-colWidht*2, top:0},
                        {left:rowHeight*3-(colWidht*2)-x, top:x},
                        {left:rowHeight*3-colWidht*2, top:rowHeight/2},


                        {left:rowHeight*3-(colWidht*2)-x, top:rowHeight-x},
                        {left:rowHeight*2.5-colWidht*2, top:rowHeight},
                        {left:rowHeight*2-colWidht*1.5, top:rowHeight-z},
                        {left:rowHeight*2-colWidht*2, top:rowHeight/2},
                        {left:rowHeight*2-colWidht*1.5, top:z},
                        {left:rowHeight*2-colWidht*1.5, top:z},
                        {left:rowHeight*2-colWidht*1.5, top:z},
                        {left:rowHeight*2-colWidht, top:rowHeight/2},
                        {left:rowHeight*2-colWidht*1.5, top:rowHeight-z},
                        {left:rowHeight*1.5-colWidht, top:rowHeight},
                        {left:rowHeight-colWidht/2, top:rowHeight-z},
                        {left:rowHeight-colWidht, top:rowHeight/2},
                        {left:rowHeight-colWidht/2, top:z},
                        {left:rowHeight-colWidht/2, top:z},
                        {left:rowHeight-colWidht/2, top:z},
                        {left:rowHeight, top:rowHeight/2},
                        {left:rowHeight-colWidht/2, top:rowHeight-z},
                        {left:rowHeight/2, top:rowHeight},
                        {left:x, top:rowHeight-x},
                        {left:0, top:rowHeight/2},

                    ]


                },
                ease: Linear.easeNone,
                repeat:-1
            })


            $('.tina_content_throttle .et_pb_row.circles_row .animation_dot').css('opacity', 1);





            $('<div class="scroll_circle"></div>').appendTo('.tina_content_throttle .top_row')
            $('<div class="circles_container"><div class="circles_container_inner"></div></div>').appendTo($('.tina_content_throttle'))
            $('.tina_content_throttle .middle_row').appendTo('.tina_content_throttle .circles_container .circles_container_inner')
            $('.tina_content_throttle .circles_row ').appendTo('.tina_content_throttle .circles_container .circles_container_inner')



            var topSectionHeight = $('.tina_content_throttle .et_pb_row.top_row').outerHeight();
            topSectionHeight = parseInt(topSectionHeight, 10);



            var circlesContainerHeight = $('.tina_content_throttle .circles_container').outerHeight();
            var topContainerHeight = $('.tina_content_throttle .top_row').outerHeight();
            $('.tina_content_throttle').css('cssText', 'padding-bottom: '+ circlesContainerHeight +'px; padding-top: '+ topContainerHeight +'px')





            var circleTopSize = $('.tina_content_throttle .circles_row ').offset().top - $('.tina_content_throttle').offset().top
            $('.tina_content_throttle .scroll_circle').css('cssText', 'width: '+ rowHeight +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale(7);')


            $(window).scroll(function () {
                if($(window).scrollTop() > $('.tina_content_throttle').offset().top  &&  $(window).scrollTop() + $(window).height() < $('.tina_content_throttle').offset().top + $('.tina_content_throttle').outerHeight()) {
                    $('.tina_content_throttle .circles_container').css('position', 'fixed')
                    $('.tina_content_throttle .top_row').css('position', 'fixed')
                    $('.tina_content_throttle .circles_container').css('top', '0px')
                    $('.tina_content_throttle .top_row').css('top', '0px');


                    var scrollSize = 7 - ((7/($('.tina_content_throttle').outerHeight()-$(window).height())) * ($(window).scrollTop() - $('.tina_content_throttle').offset().top));


                    $('.tina_content_throttle .scroll_circle').css('cssText', 'width: '+ rowHeight +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale('+ (scrollSize+0.5) +');')


                    if(scrollSize+0.5 <= 1.01){
                        $('.tina_content_throttle .circles_container .circles_container_inner').css('opacity', 1)
                    }else{
                        $('.tina_content_throttle .circles_container .circles_container_inner').css('opacity', 0)
                    }


                }else if($(window).scrollTop() + $(window).height() > $('.tina_content_throttle').offset().top + $('.tina_content_throttle').outerHeight()){
                    $('.tina_content_throttle .circles_container').css('position', 'absolute')
                    $('.tina_content_throttle .top_row').css('position', 'absolute')

                    $('.tina_content_throttle .circles_container').css('top', ($('.tina_content_throttle').outerHeight() - $('.tina_content_throttle .top_row').outerHeight()) + 'px')
                    $('.tina_content_throttle .top_row').css('top', ($('.tina_content_throttle').outerHeight() - $('.tina_content_throttle .circles_container').outerHeight()) + 'px')

                    $('.tina_content_throttle .scroll_circle').css('cssText', 'width: '+ rowHeight +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale(0.5) ;')

                    $('.tina_content_throttle .circles_container .circles_container_inner').css('opacity', 1)
                }else{
                    $('.tina_content_throttle .circles_container').css('top', '0px')
                    $('.tina_content_throttle .top_row').css('top', '0px')
                    $('.tina_content_throttle .circles_container').css('position', 'absolute')
                    $('.tina_content_throttle .top_row').css('position', 'absolute')

                    $('.tina_content_throttle .scroll_circle').css('cssText', 'width: '+ rowHeight +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale(7) ;')


                    $('.tina_content_throttle .circles_container .circles_container_inner').css('opacity', 0)
                }
            })


            $('.tina_content_throttle').css('opacity', 1)
        }

    }, tinaContentThrottle);

})(jQuery);