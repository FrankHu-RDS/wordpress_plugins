(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionTheStart = 2000;

    if (isIE()) {
        tinaAccordionTheStart = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionTheStart = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_the_start').length !== 0) {
            $('.tina_accordion_the_start .et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');



            $('.tina_accordion_the_start .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').html('<div class="content_inner">'+ $(this).find('.et_pb_toggle_content').html() +'</div>')

                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');
            });


            $('.tina_accordion_the_start .et_pb_toggle:first-child .et_pb_toggle_content').css('cssText', 'max-height: '+ $('.tina_accordion_the_start .et_pb_toggle:first-child .et_pb_toggle_content').attr('height') +'px !important;');
            $('.tina_accordion_the_start .et_pb_toggle:first-child').addClass('opened');

            $('.tina_accordion_the_start .et_pb_toggle_title').click(function(e){
                e.preventDefault();
            });

            $('.tina_accordion_the_start .et_pb_toggle').click(function(e){

                var $toggle = $(this);

                if(!$toggle.hasClass('opened')){
                    $('.tina_accordion_the_start .et_pb_toggle .et_pb_toggle_content').css('cssText', ' max-height: 0 !important;');
                    $('.tina_accordion_the_start .et_pb_toggle').removeClass('et_pb_toggle_close');
                    $('.tina_accordion_the_start .et_pb_toggle').removeClass('et_pb_toggle_open');
                    $('.tina_accordion_the_start .et_pb_toggle').removeClass('opened');


                    $('.tina_accordion_the_start .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');
                    setTimeout(function () {
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ $toggle.find('.et_pb_toggle_content').attr('height') +'px !important;');
                    },50)

                }else{
                }
            })



            $('.tina_accordion_the_start .et_pb_accordion').css('opacity', 1)
        }

    }, tinaAccordionTheStart);

})(jQuery);