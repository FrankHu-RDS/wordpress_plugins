(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentMister = 3000;

    if (isIE()) {
        tinaContentMister = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentMister = 10000;
    }

    setTimeout(function () {
        if ($('.tina_content_mister').length !== 0) {




            $('body:not(.et-fb) .tina_content_mister').prepend($('<div class="top_container"></div>'))

            $('body:not(.et-fb) .tina_content_mister .first_row ').appendTo('.tina_content_mister .top_container')
            $('body:not(.et-fb) .tina_content_mister .shape_row ').appendTo('.tina_content_mister .top_container')





            var sectionHeight = $('.tina_content_mister').outerHeight();
            var imageHeight = $('.tina_content_mister .image_row').outerHeight();
            var topRowHeight = $('.tina_content_mister .top_container').outerHeight();
            $('.tina_content_mister').css('cssText', 'padding-bottom: '+ imageHeight*1.3 +'px; padding-top: '+ topRowHeight +'px')





            $(window).scroll(function () {


                if($(window).scrollTop() + $(window).height() > $('.tina_content_mister').offset().top + $('.tina_content_mister .top_container').outerHeight()  &&  $(window).scrollTop() + $(window).height() < $('.tina_content_mister').offset().top + $('.tina_content_mister').outerHeight()) {


                    $('.tina_content_mister .top_container').css('position', 'fixed')
                    $('.tina_content_mister .image_row').css('position', 'fixed')
                    $('.tina_content_mister .top_container').css('top',  $(window).height() - $('.tina_content_mister .top_container').outerHeight() +'px')
                    $('.tina_content_mister .image_row').css('top', '0px');


                    var scrollSize = (10/($('.tina_content_mister').outerHeight()-$(window).height())) * ($(window).scrollTop() - $('.tina_content_mister').offset().top);


                    if(scrollSize>=1){
                        $('.tina_content_mister .circle_box').css('transform', 'scale('+ scrollSize +')')
                    }



                }else if($(window).scrollTop() + $(window).height() > $('.tina_content_mister').offset().top + $('.tina_content_mister').outerHeight()){
                    $('.tina_content_mister .top_container').css('position', 'absolute')
                    $('.tina_content_mister .image_row').css('position', 'absolute')

                    $('.tina_content_mister .top_container').css('top', ($('.tina_content_mister').outerHeight() - $('.tina_content_mister .top_container').outerHeight()) + 'px')
                    $('.tina_content_mister .image_row').css('top', ($('.tina_content_mister').outerHeight() - $('.tina_content_mister .image_row').outerHeight()) + 'px')
                    $('.tina_content_mister .circle_box').css('transform', 'scale(10)');
                    $('.tina_content_mister .image_row').addClass('visible')
                }else{
                    $('.tina_content_mister .top_container').css('top', '0px')
                    $('.tina_content_mister .image_row').css('top', ($('.tina_content_mister .top_container').outerHeight() - $(window).height()) +'px')
                    $('.tina_content_mister .top_container').css('position', 'absolute')
                    $('.tina_content_mister .image_row').css('position', 'absolute')
                    $('.tina_content_mister .circle_box').css('transform', 'scale(1)')
                    $('.tina_content_mister .image_row').removeClass('visible')
                }
            })
        }

    }, tinaContentMister);

})(jQuery);