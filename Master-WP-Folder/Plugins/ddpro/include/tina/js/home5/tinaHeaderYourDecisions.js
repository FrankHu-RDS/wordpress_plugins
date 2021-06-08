(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaHeaderYourDecisions = 2000;

    if (isIE()) {
        tinaHeaderYourDecisions = 6000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaHeaderYourDecisions = 10000;
    }

    setTimeout(function () {
        if($('.tina_your_decisions_header').length !== 0){
            $('.tina_your_decisions_header .et_pb_social_media_follow').each(function () {
                $(this).find('li').each(function () {
                    var socialIconName = $(this).find('a').attr('title').replace(__('Follow on', 'ddpro'), '');
                    $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
                })

            })


            $('.tina_your_decisions_header .et-pb-controllers').insertBefore($('.tina_your_decisions_header .et-pb-slider-arrows a.et-pb-arrow-next'));
            $('<div class="slider_images"></div>').insertAfter($('.tina_your_decisions_header .et_pb_slider .et_pb_slides'));

            var slideHeight = 0;
            $('.tina_your_decisions_header .et_pb_slider .et_pb_slide').each(function () {
                $('<img src="'+ $(this).find('.et_pb_slide_image img').attr('src') +'">').appendTo($(this).closest('.et_pb_slider').find('.slider_images'));
                $(this).find('.et_pb_slide_image').remove()

                if(slideHeight < $(this).height()){
                    slideHeight = $(this).height()
                }
            })


            $('.tina_your_decisions_header .et_pb_slider .slider_images img:nth-child(1)').clone().insertAfter($('.tina_your_decisions_header .et_pb_slider .slider_images img:last-child'))
            $('.tina_your_decisions_header .et_pb_slider .slider_images img:nth-child(2)').clone().insertAfter($('.tina_your_decisions_header .et_pb_slider .slider_images img:last-child'))

            $('.tina_your_decisions_header .et_pb_slider .et_pb_slide').height(slideHeight)


            var imageMarginRight = $('.tina_your_decisions_header .slider_images img').css('margin-right');
            var imageWidth = $('.tina_your_decisions_header .slider_images img').width();
            var imageCount = $('.tina_your_decisions_header .slider_images img').length;
             imageMarginRight = parseInt(imageMarginRight, 10);

            $('.tina_your_decisions_header .slider_images').width((imageWidth+imageMarginRight)*imageCount)


            $('.tina_your_decisions_header .et-pb-controllers a, .tina_your_decisions_header .et-pb-slider-arrows a').on('click', function () {
                var thisControl = $(this)
                setTimeout(function () {
                    var prevElCount = thisControl.closest('.et_pb_slider').find('.et_pb_slide.et-pb-active-slide').prevAll().length;
                    thisControl.closest('.et_pb_slider').addClass('test');

                    thisControl.closest('.et_pb_slider').find('.slider_images img').css('transform', 'translate(-'+ prevElCount * (imageWidth+imageMarginRight) +'px, 0)')
                },500)
            })
        }

    }, tinaHeaderYourDecisions);

})(jQuery);