(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentSecondTry = 1000;

    if (isIE()) {
        tinaContentSecondTry = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentSecondTry = 10000;
    }

    setTimeout(function () {

        if ($('.tina_content_second_try').length !== 0) {





        $('<div class="blurbs_container"></div>').appendTo($('body:not(.et-fb) .tina_content_second_try'))
        $('<div class="map_container"></div>').insertBefore($('body:not(.et-fb) .tina_content_second_try .map_row '))
        $('body:not(.et-fb) .tina_content_second_try .map_wrraper').appendTo($('body:not(.et-fb) .tina_content_second_try .map_container '))
        $('body:not(.et-fb) .tina_content_second_try .map_row ').appendTo('.tina_content_second_try .map_container')
        $('body:not(.et-fb) .tina_content_second_try .title_row ').appendTo('.tina_content_second_try .blurbs_container')
        $('body:not(.et-fb) .tina_content_second_try .blurbs_row ').appendTo('.tina_content_second_try .blurbs_container')



        var blurbsContHeight = $('.tina_content_second_try .blurbs_container').height();
        var mapContHeight = $('.tina_content_second_try .map_container').height()*1.5;

        $('.tina_content_second_try').css('padding-top', mapContHeight + 'px');


        $.fn.isInViewport = function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight() + blurbsContHeight*2;
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop;
            return elementBottom > viewportTop && elementTop < viewportBottom;
        };



        $('.tina_content_second_try .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })

        })


        var windowHeight = $(window).height();
        if($(window).width() <=767){
            $('.tina_content_second_try .map_row .et_pb_column_1_2 ').appendTo($('.tina_content_second_try .map_row '));
            windowHeight = windowHeight/2;
        }


        $(window).resize(function () {
            if($(window).width() <=767){
                $('.tina_content_second_try .map_row .et_pb_column_1_2 ').appendTo($('.tina_content_second_try .map_row '));
            }else{
                $('.tina_content_second_try .map_row .et_pb_column_1_2 ').insertAfter($('.tina_content_second_try .map_row .et_pb_column_1_4:first-child'));
            }
        })


        $(window).scroll(function () {



                if ($('.tina_content_second_try').isInViewport()) {

                    $('.tina_content_second_try .map_container').css('position', 'fixed');

                }else{
                    $('.tina_content_second_try .map_container').css('position', 'absolute');
                }





            if ($('.tina_content_second_try').offset().top + mapContHeight < $(window).scrollTop() && $('.tina_content_second_try').offset().top + $('.tina_content_second_try').outerHeight() + blurbsContHeight > $(window).scrollTop() + $(window).height()) {

                $('.tina_content_second_try .map_container').css('display', 'none');

                var scrollSize = (1/$(window).height()) * ($(window).scrollTop() - ($('.tina_content_second_try').offset().top + $('.tina_content_second_try .blurbs_container .et_pb_row ').outerHeight()));
                var imageScrollSize = 1 - (0.5/$(window).height()) * ($(window).scrollTop() - ($('.tina_content_second_try').offset().top + $('.tina_content_second_try .blurbs_container .et_pb_row ').outerHeight()));

            }else if ($('.tina_content_second_try').offset().top + mapContHeight > $(window).scrollTop()) {
                $('.tina_content_second_try .map_container').css('display', 'block');

            }

            if($('.tina_content_second_try .blurbs_container').offset().top< $(window).scrollTop() + $(window).height()){
                    $('.tina_content_second_try .map_wrraper').addClass('map_visible')
            }else{
                $('.tina_content_second_try .map_wrraper').removeClass('map_visible')
            }
            })
        }
    }, tinaContentSecondTry);

})(jQuery);