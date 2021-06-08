(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaTabsYouAgain = 2000;

    if (isIE()) {
        tinaTabsYouAgain = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaTabsYouAgain = 10000;
    }

    setTimeout(function () {
        if($('.tina_you_again_tabs').length !== 0){
            var tabHeight = 0;
            $('.tina_you_again_tabs .et_pb_all_tabs .et_pb_tab').each(function () {
                $(this).find('img').unwrap();
                $('<div class="tab_image"></div>').insertBefore($(this).find('.et_pb_tab_content'));
                $(this).find('img').appendTo($(this).find('.tab_image'))

                $(this).attr('height-size', $(this).outerHeight())


                if(tabHeight < $(this).outerHeight()){
                    tabHeight = $(this).outerHeight()
                }
                $(this).css('height', 0)
            })

            $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls li:first-child').addClass('active_li')
            $('.tina_you_again_tabs .et_pb_all_tabs').height(tabHeight)
            $('.tina_you_again_tabs .et_pb_tabs .et_pb_tab.et-pb-active-slide').css('height', $('.tina_you_again_tabs .et_pb_tabs .et_pb_tab.et-pb-active-slide').attr('height-size'))

            var controllesTopSize = $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls').css('top')
             controllesTopSize = parseInt(controllesTopSize, 10);



            $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls a').on('click', function () {
                var thisItem = $(this);
                setTimeout(function () {
                    console.log('clicked')
                    $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls li').removeClass('active_li')
                    $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls li.et_pb_tab_active').addClass('active_li')
                    // $(this).parent('li').addClass('active_li')
                    var prevElements = $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls li.active_li').prevAll().length
                    var elementsHeight = $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls li').outerHeight();
                    var topSize = controllesTopSize - (prevElements * elementsHeight)
                    $('.tina_you_again_tabs .et_pb_tabs .et_pb_tabs_controls').css('top', topSize)

                    $('.tina_you_again_tabs .et_pb_tabs .et_pb_tab').css('height', 0)
                    $('.tina_you_again_tabs .et_pb_tabs .et_pb_tab.et-pb-active-slide').css('height', $('.tina_you_again_tabs .et_pb_tabs .et_pb_tab.et-pb-active-slide').attr('height-size'))
                },0)
            })



        }

    }, tinaTabsYouAgain);

})(jQuery);