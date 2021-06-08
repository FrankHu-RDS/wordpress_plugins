(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionCommonSense = 3000;

    if (isIE()) {
        tinaAccordionCommonSense = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionCommonSense = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_common_sense').length !== 0) {
            $('.tina_accordion_common_sense .et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');



            $('.tina_accordion_common_sense .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').html('<div class="content_inner">'+ $(this).find('.et_pb_toggle_content').html() +'</div>')

                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');





                var imageSrc = $(this).css('background-image')
                $(this).css('background-image', 'none')
                imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                if(imageSrc !== 'none'){
                    // $('<div class="image_box_hover"><img src="'+ imageSrc +'"></div>').insertBefore($(this).find('.et_pb_toggle_title'))
                    $('<div class="image_box"><img src="'+ imageSrc +'"></div>').insertBefore($(this).find('.et_pb_toggle_title'))
                }

            });








            $('.tina_accordion_common_sense .et_pb_toggle_title').click(function(e){
                e.preventDefault();
            });


            $('.tina_accordion_common_sense .et_pb_toggle').click(function(e){


                var $toggle = $(this);

                if(!$toggle.hasClass('opened')){
                    $('.tina_accordion_common_sense .et_pb_toggle .et_pb_toggle_content').css('cssText', ' max-height: 0 !important;');
                    $('.tina_accordion_common_sense .et_pb_toggle').removeClass('et_pb_toggle_close');
                    $('.tina_accordion_common_sense .et_pb_toggle').removeClass('et_pb_toggle_open');
                    $('.tina_accordion_common_sense .et_pb_toggle').removeClass('opened');


                    $('.tina_accordion_common_sense .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');
                    setTimeout(function () {
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ $toggle.find('.et_pb_toggle_content').attr('height') +'px !important;');
                    },50)

                }else{
                }
            })




            setTimeout(function () {
                $('.tina_accordion_common_sense .et_pb_toggle:first-child .et_pb_toggle_content').css('cssText', 'max-height: '+ $('.tina_accordion_common_sense .et_pb_toggle:first-child .et_pb_toggle_content').attr('height') +'px !important;');
                $('.tina_accordion_common_sense .et_pb_toggle:first-child').addClass('opened');

                $('.tina_accordion_common_sense .accordion_col').css('min-height', $('.tina_accordion_common_sense .et_pb_accordion').height())
                $('.tina_accordion_common_sense .et_pb_accordion').css('opacity', 1);
            },1000)
        }

    }, tinaAccordionCommonSense);

})(jQuery);