(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTheGirl = 1500;

    if (isIE()) {
        tinaTheGirl = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTheGirl = 10000;
    }

    setTimeout(function () {
        if ($('.tina_the_girl_header').length !== 0) {
            $('.tina_the_girl_header .et_pb_slider.small_slider .et_pb_slide').each(function () {
                var titleText = $(this).find('h2.et_pb_slide_title').text();


                var childCount = $(this).prevAll('.et_pb_slide').length + 1;

                $(this).closest('.et_pb_slider.small_slider').find($('.et-pb-controllers a:nth-child(' + childCount + ')')).html('<span class="title">' + titleText + '</span>')
            })


            $('.tina_the_girl_header .et_pb_slider.big_slider .et_pb_slide:first-child').addClass('active_slide')


            $('.tina_the_girl_header .et_pb_slider.small_slider .et-pb-slider-arrows a, .tina_the_girl_header .et_pb_slider.small_slider .et-pb-controllers a').on('click', function () {
                var thisItem = $(this);
                setTimeout(function () {
                    var prevElements = thisItem.closest('.et_pb_slider').find('.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    $('.tina_the_girl_header .et_pb_slider.big_slider .et_pb_slide').removeClass('active_slide')
                    $('.tina_the_girl_header .et_pb_slider.big_slider .et_pb_slide:nth-child('+ prevElements +')').addClass('active_slide')
                }, 50)

            })

            if($('.tina_the_girl_header .et_pb_slider.big_slider').hasClass('et_slider_auto')){
                setInterval(function (){
                    var prevElements = $('.tina_the_girl_header .et_pb_slider.small_slider .et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    $('.tina_the_girl_header .et_pb_slider.big_slider .et_pb_slide').removeClass('active_slide')
                    $('.tina_the_girl_header .et_pb_slider.big_slider .et_pb_slide:nth-child('+ prevElements +')').addClass('active_slide')
                },50)
            }

        }

    }, tinaTheGirl);

})(jQuery);