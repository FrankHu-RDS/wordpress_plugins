(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentKare  = 1000;

    if (isIE()) {
        ragnarContentKare = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentKare = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_kare').length !== 0){
            var tileTextHeight = $('body:not(.et-fb) .ragnar_content_kare .scroll_text_title_light .et_pb_text_inner').outerHeight()
            var tileTexWidth = $('body:not(.et-fb) .ragnar_content_kare .scroll_text_title_light .et_pb_text_inner').width()
            $('body:not(.et-fb) .ragnar_content_kare .scroll_text_title_dark .et_pb_text_inner').outerHeight(0)

            $('body:not(.et-fb) .ragnar_content_kare .scroll_text_title_light .et_pb_text_inner').height(tileTextHeight)



            $('body:not(.et-fb) .ragnar_content_kare').prepend($('<div class="images_wrap"></div>'))
            $('.ragnar_content_kare .images_row').appendTo($('.ragnar_content_kare .images_wrap'))

            $('<div class="bg_color bg_color_left"></div><div class="bg_color bg_color_right"></div>').appendTo($('.ragnar_content_kare .images_row.images_row_last'))
            $('<div class="scroll_texts"></div>').appendTo($('.ragnar_content_kare .scroll_text_col'))
            $('.ragnar_content_kare .scroll_text_col .et_pb_text ').appendTo($('.ragnar_content_kare .scroll_texts'))


            $('body:not(.et-fb) .ragnar_content_kare .scroll_texts .et_pb_text .et_pb_text_inner').width(tileTexWidth)

            $('.ragnar_content_kare .images_row .et_pb_column ').each(function (){
               var textHeight = $('.ragnar_content_kare .scroll_text_title_light').outerHeight()
                $(this).height(textHeight)
            })

            var imagesHeight = $('.ragnar_content_kare .images_wrap').height()


            $('.ragnar_content_kare .scroll_text_col').css('margin-top', imagesHeight).css('height', 2*$('.ragnar_content_kare .scroll_text_title_light').outerHeight())

            $(window).on("scroll", function (){
                $('.ragnar_content_kare .scroll_image').each(function (){

                    if($('.ragnar_content_kare').offset().top + imagesHeight + $('.ragnar_content_kare .scroll_text_title_light').outerHeight() >= $(window).scrollTop() + $(window).height() && $(window).scrollTop() + $(window).height() >= $('.ragnar_content_kare').offset().top + imagesHeight){
                        $(this).addClass('visible')
                        $('.ragnar_content_kare .images_wrap').css('cssText', 'top: auto; bottom: 0; position:fixed; transform: translate(0px, -0px);');


                        var scrollSize = (100/ $('.ragnar_content_kare .scroll_text_title_light').outerHeight()) * (($(window).scrollTop() + $(window).height())-($('.ragnar_content_kare').offset().top + imagesHeight))
                        var scrollSizeCols = (50/ $('.ragnar_content_kare .scroll_text_title_light').outerHeight()) * (($(window).scrollTop() + $(window).height())-($('.ragnar_content_kare').offset().top + imagesHeight))
                        var scrollSizeTopCols = (2/ $('.ragnar_content_kare .scroll_text_title_light').outerHeight()) * (($(window).scrollTop() + $(window).height())-($('.ragnar_content_kare').offset().top + imagesHeight))
                        $('.ragnar_content_kare .bg_color.bg_color_left').css('transform', 'translate(-'+ scrollSize +'%, 0px)')
                        $('.ragnar_content_kare .bg_color.bg_color_right').css('transform', 'translate('+ scrollSize +'%, 0px)')
                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').prevAll('.et_pb_column').css('right', scrollSizeCols +'%')
                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').nextAll('.et_pb_column').css('left', scrollSizeCols +'%')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(n+2):nth-last-child(-n+2)').css('left', scrollSizeTopCols +'%').css('transform', 'translate(0px, -'+ scrollSizeCols +'%)')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(-n+2):nth-last-child(n+2)').css('right', scrollSizeTopCols +'%').css('transform', 'translate(0px, -'+ scrollSizeCols +'%)')


                        $('.ragnar_content_kare .scroll_text_col .et_pb_text').css('cssText', 'top: auto; bottom: auto; position:static;')
                        $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_light .et_pb_text_inner p').css('height', tileTextHeight)
                        $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_dark .et_pb_text_inner').css('height', 0)
                        $('.ragnar_content_kare .bottom_text ').removeClass('visible')
                    }else if($(window).scrollTop() + $(window).height() >= $('.ragnar_content_kare').offset().top + imagesHeight + $('.ragnar_content_kare .scroll_text_title_light').outerHeight()){
                        var imageBottom = ($(window).scrollTop() + $(window).height()) - ($('.ragnar_content_kare').offset().top + imagesHeight + $('.ragnar_content_kare .scroll_text_title_light').outerHeight())
                        $('.ragnar_content_kare .images_wrap').css('cssText', 'top: auto; bottom: 0px; position:fixed;     transform: translate(0px, -' + imageBottom + 'px);')
                        $('.ragnar_content_kare .bg_color.bg_color_left').css('transform', 'translate(-100%, 0px)')
                        $('.ragnar_content_kare .bg_color.bg_color_right').css('transform', 'translate(100%, 0px)')


                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').prevAll('.et_pb_column').css('right', '50%')
                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').nextAll('.et_pb_column').css('left', '50%')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(n+2):nth-last-child(-n+2)').css('left', '2%').css('transform', 'translate(0px, -50%)')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(-n+2):nth-last-child(n+2)').css('right', '2%').css('transform', 'translate(0px, -50%)')


                        var scrollSizeTopCols = (tileTextHeight/$('.ragnar_content_kare .scroll_text_title_light').outerHeight()) * (($(window).scrollTop() + $(window).height())-($('.ragnar_content_kare').offset().top + imagesHeight + $('.ragnar_content_kare .scroll_text_title_light').outerHeight()))


                        $('.ragnar_content_kare .scroll_text_col .et_pb_text').css('cssText', 'top: auto; bottom: 0px; position:fixed;')
                        $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_light .et_pb_text_inner p').css('height', tileTextHeight - scrollSizeTopCols)
                        $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_dark .et_pb_text_inner').css('height', scrollSizeTopCols)
                        $('.ragnar_content_kare .bottom_text ').removeClass('visible')

                    }else{
                        $(this).removeClass('visible')
                        $('.ragnar_content_kare .images_wrap').css('cssText', 'top: 0; bottom: auto; position:absolute; transform: translate(0px, -0px);');
                        $('.ragnar_content_kare .bg_color.bg_color_left').css('transform', 'translate(0%, 0px)')
                        $('.ragnar_content_kare .bg_color.bg_color_right').css('transform', 'translate(0%, 0px)')
                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').prevAll('.et_pb_column').css('right', '0')
                        $('.ragnar_content_kare .images_row_last .et_pb_column.scroll_image').nextAll('.et_pb_column').css('left', '0')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(n+2):nth-last-child(-n+2)').css('left', '0').css('transform', 'translate(0px, 0%)')
                        $('.ragnar_content_kare .images_row:not(.images_row_last) .et_pb_column:nth-child(-n+2):nth-last-child(n+2)').css('right', '0').css('transform', 'translate(0px, 0%)')
                    }



                })

                if($(window).scrollTop() + $(window).height() >= $('.ragnar_content_kare').offset().top + imagesHeight + $('.ragnar_content_kare .scroll_text_col').outerHeight()){
                    $('.ragnar_content_kare .scroll_text_col .et_pb_text').css('cssText', 'top: auto; bottom: 0px; position:absolute;')
                    $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_light .et_pb_text_inner p').css('height', 0)
                    $('.ragnar_content_kare .scroll_text_col .et_pb_text.scroll_text_title_dark .et_pb_text_inner').css('height', tileTextHeight)
                    $('.ragnar_content_kare .bottom_text ').addClass('visible')
                }
            })




        }

    }, ragnarContentKare)

})(jQuery);