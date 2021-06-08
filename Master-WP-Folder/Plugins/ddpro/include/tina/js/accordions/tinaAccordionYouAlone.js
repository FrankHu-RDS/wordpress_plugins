(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionYouAlone = 2000;

    if (isIE()) {
        tinaAccordionYouAlone = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionYouAlone = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_you_alone').length !== 0) {

            $('.tina_accordion_you_alone .et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');



            $('.tina_accordion_you_alone .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').html('<div class="content_inner">'+ $(this).find('.et_pb_toggle_content').html() +'</div>')

                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');


            });




            $('.tina_accordion_you_alone .et_pb_toggle_title').click(function(e){
                e.preventDefault();

            });

            $('.tina_accordion_you_alone .et_pb_toggle').click(function(e){
                $('.tina_accordion_you_alone .et_pb_toggle').each(function () {
                    $(this).removeClass('et_pb_toggle_close');
                    $(this).removeClass('et_pb_toggle_open');
                    // $(this).height($(this).attr('height'));
                    $(this).find('.et_pb_toggle_content').css('cssText', ' max-height: 0 !important;')
                });


                var $toggle = $(this);

                if(!$toggle.hasClass('opened')){
                    $('.tina_accordion_you_alone .et_pb_toggle').removeClass('opened');
                    // $('.tina_accordion_looked_down .et_pb_accordion ').css('top', '-'+ prevAllHeight +'px');


                    $('.tina_accordion_you_alone .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');
                    // $toggle.height(accordionHeight);

                    // var thisTitle = $(this);
                    setTimeout(function () {
                        // var titleHeight =  thisTitle.outerHeight();
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ $toggle.find('.et_pb_toggle_content').attr('height') +'px !important;');
                    },50)

                }else{
                    $('.tina_accordion_you_alone .et_pb_toggle').removeClass('closed');
                    $toggle.removeClass('opened');
                    // $toggle.height($toggle.attr('height'));
                    $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: 0px !important;');
                    // $('.tina_accordion_looked_down .et_pb_accordion ').css('top', '0px')
                }
            })


            $('.tina_accordion_you_alone .et_pb_accordion').css('opacity', 1)
        }

    }, tinaAccordionYouAlone);

})(jQuery);