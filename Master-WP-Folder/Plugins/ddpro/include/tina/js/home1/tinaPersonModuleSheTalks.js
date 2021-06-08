(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSheTalksPerson = 1500;

    if (isIE()) {
        tinaSheTalksPerson = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSheTalksPerson = 10000;
    }

    setTimeout(function () {
        if ($('.tina_she_talks_person_module').length !== 0) {
            $('.tina_she_talks_person_module .et_pb_slider.small_slider .et_pb_slide').each(function () {
                var titleText = $(this).find('h2.et_pb_slide_title').text();


                var childCount = $(this).prevAll('.et_pb_slide').length + 1;

                $(this).closest('.et_pb_slider.small_slider').find($('.et-pb-controllers a:nth-child(' + childCount + ')')).html('<span class="title">' + titleText + '</span>')
            })


            $('.tina_she_talks_person_module .et_pb_slider.big_slider .et_pb_slide:first-child').addClass('active_slide');


            $('.tina_she_talks_person_module .et_pb_slider.small_slider .et-pb-slider-arrows a, .tina_she_talks_person_module .et_pb_slider.small_slider .et-pb-controllers a').on('click', function () {
                var thisItem = $(this);
                setTimeout(function () {
                    var prevElements = thisItem.closest('.et_pb_slider').find('.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    $('.tina_she_talks_person_module .et_pb_slider.big_slider .et_pb_slide').removeClass('active_slide')
                    $('.tina_she_talks_person_module .et_pb_slider.big_slider .et_pb_slide:nth-child('+ prevElements +')').addClass('active_slide')
                }, 50)

            })


            if( $('.tina_she_talks_person_module .et_pb_slider.small_slider').hasClass('et_slider_auto')){
                setInterval(function () {
                    var prevElements = $('.tina_she_talks_person_module .et_pb_slider.small_slider .et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    $('.tina_she_talks_person_module .et_pb_slider.big_slider .et_pb_slide').removeClass('active_slide')
                    $('.tina_she_talks_person_module .et_pb_slider.big_slider .et_pb_slide:nth-child('+ prevElements +')').addClass('active_slide')
                }, 50)
            }

        }

    }, tinaSheTalksPerson);

})(jQuery);