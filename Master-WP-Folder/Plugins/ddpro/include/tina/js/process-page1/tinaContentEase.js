(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentEase = 3000;

    if (isIE()) {
        tinaContentEase = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentEase = 10000;
    }

    setTimeout(function () {
        if ($('.tina_content_ease').length !== 0) {
            var buttonText = $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').text();
            $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');



            $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').height(  $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').outerWidth())
            $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').prepend($('<div class="animation_dot"></div>'))

            var buttonWidth =  $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button').outerWidth();


            $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button .animation_dot').css('top', buttonWidth/2)

            var dot = $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button .animation_dot');

            TweenMax.to(dot, 4, {
                bezier: {
                    curviness: 1.5,
                    values: [
                        {left:0, top:buttonWidth/2},
                        {left:buttonWidth/2, top:0},
                        {left:buttonWidth, top:buttonWidth/2},
                        {left:buttonWidth/2, top:buttonWidth},
                        {left:0, top:buttonWidth/2},
                    ]


                },
                ease: Linear.easeNone,
                repeat:-1
            })



            $('.tina_content_ease .et_pb_button_module_wrapper .et_pb_button .animation_dot').css('opacity', 1);




            $('body:not(.et-fb) .tina_content_ease').prepend($('<div class="top_container"></div>'))

            $('body:not(.et-fb) .tina_content_ease .top_row ').appendTo('.tina_content_ease .top_container')
            $('body:not(.et-fb) .tina_content_ease .middle_row ').appendTo('.tina_content_ease .top_container')





            var sectionHeight = $('.tina_content_ease').outerHeight();
            var imageHeight = $('.tina_content_ease .bottom_row').outerHeight();
            var topRowHeight = $('.tina_content_ease .top_container').outerHeight();
            $('.tina_content_ease').css('cssText', 'padding-bottom: '+ imageHeight +'px; padding-top: '+ topRowHeight +'px')





            var circleHeight = $('.tina_content_ease .circle_box').height();

            $(window).scroll(function () {


                if($(window).scrollTop() > $('.tina_content_ease').offset().top  &&  $(window).scrollTop() + $(window).height() < $('.tina_content_ease').offset().top + $('.tina_content_ease').outerHeight()) {
                    $('.tina_content_ease .top_container').css('position', 'fixed')
                    $('.tina_content_ease .bottom_row').css('position', 'fixed')
                    $('.tina_content_ease .top_container').css('top', '0px')
                    $('.tina_content_ease .bottom_row').css('top', '0px');


                    var scrollSize = (10/($('.tina_content_ease').outerHeight()-$(window).height())) * ($(window).scrollTop() - $('.tina_content_ease').offset().top);
                    var buttonScrollSize = 400 - (400/($('.tina_content_ease').outerHeight()-$(window).height())) * ($(window).scrollTop() - $('.tina_content_ease').offset().top);



                    if(scrollSize>=1){
                        $('.tina_content_ease .circle_box').css('transform', 'scale('+ scrollSize +')')
                        $('.tina_content_ease .et_pb_button_module_wrapper').css('transform', 'translate(0px, '+ buttonScrollSize +'px)')
                    }
                    $('.tina_content_ease .bottom_row').removeClass('visible')


                }else if($(window).scrollTop() + $(window).height() > $('.tina_content_ease').offset().top + $('.tina_content_ease').outerHeight()){
                    $('.tina_content_ease .top_container').css('position', 'absolute')
                    $('.tina_content_ease .bottom_row').css('position', 'absolute')

                    $('.tina_content_ease .top_container').css('top', ($('.tina_content_ease').outerHeight() - $('.tina_content_ease .top_container').outerHeight()) + 'px')
                    $('.tina_content_ease .bottom_row').css('top', ($('.tina_content_ease').outerHeight() - $('.tina_content_ease .bottom_row').outerHeight()) + 'px')
                    $('.tina_content_ease .circle_box').css('transform', 'scale(10)');
                    $('.tina_content_ease .bottom_row').addClass('visible')
                }else{
                    $('.tina_content_ease .top_container').css('top', '0px')
                    $('.tina_content_ease .bottom_row').css('top', '0px')
                    $('.tina_content_ease .top_container').css('position', 'absolute')
                    $('.tina_content_ease .bottom_row').css('position', 'absolute')
                    $('.tina_content_ease .circle_box').css('transform', 'scale(1)')
                    $('.tina_content_ease .bottom_row').removeClass('visible')
                }
            })
        }

    }, tinaContentEase);

})(jQuery);