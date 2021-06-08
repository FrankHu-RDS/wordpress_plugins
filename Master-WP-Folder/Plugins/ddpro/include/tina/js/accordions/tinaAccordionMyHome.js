(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionMyHome = 2000;

    if (isIE()) {
        tinaAccordionMyHome = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionMyHome = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_my_home').length !== 0) {




            $(window).resize(function () {
                if($(window).width() <= 767){
                    $('.tina_accordion_my_home .image_row').insertBefore($('.tina_accordion_my_home .accordion_row'))
                }else{
                    $('.tina_accordion_my_home .image_row').insertAfter($('.tina_accordion_my_home .accordion_row'))
                }
            })

            $('.tina_accordion_my_home .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');



                var imageSrc = $(this).css('background-image')
                $(this).css('background-image', 'none')
                imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                if(imageSrc !== 'none'){
                    $('<div class="image_box"><img src="'+ imageSrc +'"></div>').insertBefore($(this).find('.et_pb_toggle_title'))
                }
            });

            $('.tina_accordion_my_home .et_pb_toggle:first-child .et_pb_toggle_content').css('cssText', 'max-height: '+ $('.tina_accordion_my_home .et_pb_toggle:first-child .et_pb_toggle_content').attr('height') +'px !important;');
            $('.tina_accordion_my_home .et_pb_toggle:first-child').addClass('opened');



            $('.tina_accordion_my_home .et_pb_slider .et_pb_slide:first-child').addClass('active_slide')

            $('.tina_accordion_my_home .et_pb_toggle_title').click(function(e){
                e.preventDefault();

            });



            $('.tina_accordion_my_home .et_pb_toggle').click(function(e){

                var $toggle = $(this);

                if(!$toggle.hasClass('opened')){
                    $('.tina_accordion_my_home .et_pb_toggle .et_pb_toggle_content').css('cssText', ' max-height: 0 !important;');
                    $('.tina_accordion_my_home .et_pb_toggle').removeClass('et_pb_toggle_close');
                    $('.tina_accordion_my_home .et_pb_toggle').removeClass('et_pb_toggle_open');
                    $('.tina_accordion_my_home .et_pb_toggle').removeClass('opened');
                    $('.tina_accordion_my_home .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');


                    $('.tina_accordion_my_home .et_pb_slider .et_pb_slide').removeClass('active_slide')
                    $('.tina_accordion_my_home .et_pb_slider .et_pb_slide:nth-child('+ ($(this).prevAll().length + 1) +')').addClass('active_slide')

                    setTimeout(function () {
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ $toggle.find('.et_pb_toggle_content').attr('height') +'px !important;');
                    },50)

                }else{
                }
            })



            $('.tina_accordion_my_home .et_pb_accordion').css('opacity', 1)
        }

    }, tinaAccordionMyHome);

})(jQuery);