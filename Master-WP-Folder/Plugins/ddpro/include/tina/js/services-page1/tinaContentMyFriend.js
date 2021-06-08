(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentMyFriend = 1500;

    if (isIE()) {
        tinaContentMyFriend = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentMyFriend = 10000;
    }

    setTimeout(function () {
        if ($('.tina_my_friend_content').length !== 0) {

            $.fn.isInViewport = function () {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + ($(window).height() / 1.6);
                return elementBottom > viewportTop && elementTop < viewportBottom;
            };

            $('.tina_my_friend_content  .et_pb_column .et_pb_promo').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('visible')
                }
            })
            $('.tina_my_friend_content  .et_pb_column .et_pb_blurb').each(function () {
               var imageSrc = $(this).find('img').attr('src')
               $(this).find('.et_pb_main_blurb_image').css('background-image', 'url('+ imageSrc +')')
            })



            var slideItemWidth = $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_blurb').width();
            var slideItemMargin = $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_blurb').css('margin-left');
            slideItemMargin = parseInt(slideItemMargin, 10);
            var slideItemCount = $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_blurb').length;
            $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').css('cssText', 'width: ' + ((slideItemWidth + slideItemMargin) * slideItemCount) + 'px !important;');

            var screenHeight = $(window).height();
            var rowHeight = $('.tina_my_friend_content .tina_my_friend_content_slide_row').outerHeight() - $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').outerHeight();
            var topSlideWidth = $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').width();

            var slideRightOffset = topSlideWidth - $(window).width();
            var moveSlideSizeTop = slideRightOffset / rowHeight;

            var rowPaddingTop = $('.tina_my_friend_content .tina_my_friend_content_slide_row').css('padding-top')
            var rowPaddingBottom = $('.tina_my_friend_content .tina_my_friend_content_slide_row').css('padding-bottom')


            var transTop = 0;
            var transLeft = 0;


            var topTextWidth = $('.tina_my_friend_content .et_pb_text').width();
            var moveSizeTop = topTextWidth / screenHeight;


            $('.tina_my_friend_content  .et_pb_column .et_pb_promo').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('visible')
                }
            })
            var elementBottomSize = $('.tina_my_friend_content .tina_my_friend_content_slide_row').outerHeight() - ($('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').height() + parseInt(rowPaddingBottom, 10) + parseInt(rowPaddingTop, 10))



            if ($(window).scrollTop() >= $('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top + rowHeight) {
                transLeft = (rowHeight + parseInt(rowPaddingTop, 10)) * moveSlideSizeTop

                $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').css('cssText', 'width: ' + ((slideItemWidth + slideItemMargin) * slideItemCount) + 'px !important; position: relative !important; left: -' + transLeft + 'px;')
            }

            if ($('.tina_my_friend_content .et_pb_text ').offset().top <= $(window).scrollTop() + screenHeight) {
                $('.tina_my_friend_content .et_pb_text ').css('transform', 'translate(-' + (screenHeight - ($('.tina_my_friend_content .et_pb_text').offset().top - $(window).scrollTop())) * moveSizeTop + 'px,0)');
            } else if ($('.tina_my_friend_content .et_pb_text ').offset().top > $(window).scrollTop() + screenHeight) {
                $('.tina_my_friend_content .et_pb_text ').css('transform', 'translate(0,0)');
            }



            $(window).scroll(function () {
                $('.tina_my_friend_content  .et_pb_column .et_pb_promo').each(function () {
                    if ($(this).isInViewport()) {
                        $(this).addClass('visible')
                    }
                })
                var elementBottomSize = $('.tina_my_friend_content .tina_my_friend_content_slide_row').outerHeight() - ($('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').height() + parseInt(rowPaddingBottom, 10) + parseInt(rowPaddingTop, 10))

                if ($('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top <= $(window).scrollTop() && $(window).scrollTop() - elementBottomSize <= $('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top) {
                    transLeft = (($(window).scrollTop() - $('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top) * moveSlideSizeTop) + 120
                    $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').css('cssText', 'width: ' + ((slideItemWidth + slideItemMargin) * slideItemCount) + 'px !important; position: fixed !important; top: ' + rowPaddingTop + ';  left: -' + transLeft + 'px;');
                    transTop = $(window).scrollTop() - $('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top;
                } else if ($('.tina_my_friend_content .tina_my_friend_content_slide_row').offset().top >= $(window).scrollTop()) {
                    $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').css('cssText', 'width: ' + ((slideItemWidth + slideItemMargin) * slideItemCount) + 'px !important; position: relative !important; left: -0px;')
                } else {
                    $('.tina_my_friend_content .tina_my_friend_content_slide_row .et_pb_column').css('cssText', 'width: ' + ((slideItemWidth + slideItemMargin) * slideItemCount) + 'px !important; position: relative !important; transform: translate(0px, ' + (rowHeight - parseInt(rowPaddingTop, 10) - parseInt(rowPaddingBottom, 10)) + 'px); left: -' + transLeft + 'px;')
                }

                if ($('.tina_my_friend_content .et_pb_text ').offset().top <= $(window).scrollTop() + screenHeight) {
                    $('.tina_my_friend_content .et_pb_text ').css('transform', 'translate(-' + (screenHeight - ($('.tina_my_friend_content .et_pb_text').offset().top - $(window).scrollTop())) * moveSizeTop + 'px,0)');
                } else if ($('.tina_my_friend_content .et_pb_text ').offset().top > $(window).scrollTop() + screenHeight) {
                    $('.tina_my_friend_content .et_pb_text ').css('transform', 'translate(0,0)');
                }
            });
        }

    }, tinaContentMyFriend);

})(jQuery);