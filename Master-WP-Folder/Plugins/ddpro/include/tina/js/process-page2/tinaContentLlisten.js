(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentLlisten = 3000;

    if (isIE()) {
        tinaContentLlisten = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentLlisten = 10000;
    }

    setTimeout(function () {
        if ($('body:not(.et-fb) .tina_content_listen').length !== 0) {

            $('.tina_content_listen .et_pb_row.circles_row').prepend($('<div class="animation_dot"></div>'))

            var rowHeight =  $('.tina_content_listen .et_pb_row.circles_row').height();
            var colWidht =  $('.tina_content_listen .et_pb_row.circles_row .et_pb_column ').css('margin-right');
            colWidht = parseFloat(colWidht.replace(/-/g, ''));
            colWidht= parseInt(colWidht, 10);







            var lineWidth = 2*((rowHeight/2)*(rowHeight/2));
            lineWidth = Math.sqrt(lineWidth) -rowHeight/2;
            lineWidth = lineWidth*lineWidth;

            var x = lineWidth/2;
            x= Math.sqrt(x)


            $('.tina_content_listen .et_pb_row.circles_row .animation_dot').css('top', rowHeight/2)

            var dot = $('.tina_content_listen .et_pb_row.circles_row .animation_dot');

            TweenMax.to(dot, 4, {
                bezier: {
                    curviness: 0,
                    values: [
                        {left:0, top:rowHeight/2},


                        {left:(rowHeight/2), top:0},
                        {left:(rowHeight), top:rowHeight/2},
                        {left:(rowHeight-colWidht/2), top:(rowHeight/2 + colWidht/2)},
                        {left:(rowHeight-colWidht), top:(rowHeight/2)},
                        {left:(rowHeight*1.5-colWidht), top:0},
                        {left:(rowHeight*2-colWidht), top:rowHeight/2},
                        {left:(rowHeight*2-colWidht*1.5), top:(rowHeight/2 + colWidht/2)},
                        {left:(rowHeight*2-colWidht*2), top:(rowHeight/2)},
                        {left:(rowHeight*2.5 - colWidht*2), top:0},
                        {left:(rowHeight*3 - colWidht*2), top:(rowHeight/2)},
                        {left:(rowHeight*3-colWidht*2.5), top:(rowHeight/2 + colWidht/2)},
                        {left:(rowHeight*3-colWidht*3), top:(rowHeight/2)},
                        {left:(rowHeight*3.5-colWidht*3), top:0},
                        {left:(rowHeight*4-colWidht*3), top:(rowHeight/2)},

                        {left:(rowHeight*3.5-colWidht*3), top:(rowHeight)},
                        {left:(rowHeight*3-colWidht*3), top:(rowHeight/2)},
                        {left:(rowHeight*3-colWidht*2.5), top:(rowHeight/2 - colWidht/2)},
                        {left:(rowHeight*3 - colWidht*2), top:(rowHeight/2)},
                        {left:(rowHeight*2.5 - colWidht*2), top:rowHeight},
                        {left:(rowHeight*2-colWidht*2), top:(rowHeight/2)},
                        {left:(rowHeight*2-colWidht*1.5), top:(rowHeight/2 - colWidht/2)},
                        {left:(rowHeight*2-colWidht), top:(rowHeight/2)},
                        {left:(rowHeight*1.5-colWidht), top:rowHeight},
                        {left:(rowHeight-colWidht), top:(rowHeight/2)},
                        {left:(rowHeight-colWidht/2), top:(rowHeight/2 - colWidht/2)},
                        {left:(rowHeight), top:rowHeight/2},
                        {left:(rowHeight/2), top:rowHeight},
                        {left:0, top:rowHeight/2},

                    ]


                },
                ease: Linear.easeNone,
                repeat:-1
            })


            $('.tina_content_listen .et_pb_row.circles_row .animation_dot').css('opacity', 1);





            $('<div class="scroll_circle"></div>').appendTo('.tina_content_listen .top_row')
            $('<div class="circles_container"><div class="circles_container_inner"></div></div>').appendTo($('.tina_content_listen'))
            $('.tina_content_listen .middle_row').appendTo('.tina_content_listen .circles_container .circles_container_inner')
            $('.tina_content_listen .circles_row ').appendTo('.tina_content_listen .circles_container .circles_container_inner')



            var topSectionHeight = $('.tina_content_listen .et_pb_row.top_row').outerHeight();
            topSectionHeight = parseInt(topSectionHeight, 10);



            var circlesContainerHeight = $('.tina_content_listen .circles_container').outerHeight();
            var topContainerHeight = $('.tina_content_listen .top_row').outerHeight();
            $('.tina_content_listen').css('cssText', 'padding-bottom: '+ circlesContainerHeight +'px; padding-top: '+ topContainerHeight +'px')


            var scaleSize = 35;
            if($(window).width() <= 980){
                scaleSize = 85;
            }


            var circleTopSize = ($('.tina_content_listen .circles_row ').offset().top - $('.tina_content_listen').offset().top) + (rowHeight/2 - colWidht/2)
            $('.tina_content_listen .scroll_circle').css('cssText', 'width: '+ colWidht +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale('+ scaleSize +');')




            $(window).scroll(function () {
                if($(window).scrollTop() > $('.tina_content_listen').offset().top  &&  $(window).scrollTop() + $(window).height() < $('.tina_content_listen').offset().top + $('.tina_content_listen').outerHeight()) {
                    $('.tina_content_listen .circles_container').css('position', 'fixed')
                    $('.tina_content_listen .top_row').css('position', 'fixed')
                    $('.tina_content_listen .circles_container').css('top', '0px')
                    $('.tina_content_listen .top_row').css('top', '0px');


                    var scrollSize = scaleSize - ((scaleSize/($('.tina_content_listen').outerHeight()-$(window).height())) * ($(window).scrollTop() - $('.tina_content_listen').offset().top));


                    $('.tina_content_listen .scroll_circle').css('cssText', 'width: '+ colWidht +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale('+ (scrollSize+1) +');')


                    if(scrollSize+1 <= 1.05){
                        $('.tina_content_listen .circles_container .circles_container_inner').css('opacity', 1)
                    }else{
                        $('.tina_content_listen .circles_container .circles_container_inner').css('opacity', 0)
                    }


                }else if($(window).scrollTop() + $(window).height() > $('.tina_content_listen').offset().top + $('.tina_content_listen').outerHeight()){
                    $('.tina_content_listen .circles_container').css('position', 'absolute')
                    $('.tina_content_listen .top_row').css('position', 'absolute')

                    $('.tina_content_listen .circles_container').css('top', ($('.tina_content_listen').outerHeight() - $('.tina_content_listen .top_row').outerHeight()) + 'px')
                    $('.tina_content_listen .top_row').css('top', ($('.tina_content_listen').outerHeight() - $('.tina_content_listen .circles_container').outerHeight()) + 'px')

                    $('.tina_content_listen .scroll_circle').css('cssText', 'width: '+ colWidht +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale(1);')

                    $('.tina_content_listen .circles_container .circles_container_inner').css('opacity', 1)
                }else{
                    $('.tina_content_listen .circles_container').css('top', '0px')
                    $('.tina_content_listen .top_row').css('top', '0px')
                    $('.tina_content_listen .circles_container').css('position', 'absolute')
                    $('.tina_content_listen .top_row').css('position', 'absolute')

                    $('.tina_content_listen .scroll_circle').css('cssText', 'width: '+ colWidht +'px; top: '+  circleTopSize  +'px; transform: translate(-50%, 0) scale('+ scaleSize +');')


                    $('.tina_content_listen .circles_container .circles_container_inner').css('opacity', 0)
                }
            })




            $('.tina_content_listen .et_pb_promo .et_pb_button_wrapper .et_pb_button').prepend($('<div class="circle"></div><div class="line"></div>'));


            var tlLazing = new TimelineLite;
            $('.tina_content_listen .et_pb_promo .et_pb_button_wrapper .et_pb_button').hover(
                function () {
                    var lazingLine = $(this).find('.line');
                    var lazingCircle = $(this).find('.circle');

                    tlLazing.to(lazingLine, 0.4, {
                        height: "19px"
                    }, 0)
                        .to(lazingCircle, 0.4, {
                            scale: 1.1,
                            rotation: 25,
                            opacity: 1
                        }, 0)
                }, function () {
                    tlLazing.clear();
                    var lazingLine = $(this).find('.line');
                    var lazingCircle = $(this).find('.circle');

                    var tl2Lazing = new TimelineLite;
                    tl2Lazing.to(lazingLine, 0.4, {
                        height: "58px"
                    }, 0)
                        .to(lazingCircle, 0.4, {
                            scale: 1,
                            rotation: 0,
                            opacity: 0.2
                        }, 0)
                }
            )


            $('.tina_content_listen').css('opacity', 1)
        }

    }, tinaContentLlisten);

})(jQuery);