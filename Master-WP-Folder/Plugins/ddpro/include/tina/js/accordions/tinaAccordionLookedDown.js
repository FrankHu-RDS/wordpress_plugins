(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionLookedDown = 2000;

    if (isIE()) {
        tinaAccordionLookedDown = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionLookedDown = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_looked_down').length !== 0) {
            $('.tina_accordion_looked_down .et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');



            $('.tina_accordion_looked_down .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');
                $(this).attr('height', $(this).outerHeight());
                $(this).attr('margin-bottom', parseInt($(this).css('margin-bottom'), 10));

                var elementsTopSize = 0;
                if($(this).prevAll().length !== 0){
                    $(this).prevAll().each(function () {
                        elementsTopSize += parseInt($(this).attr('height')) + parseInt($(this).attr('margin-bottom'));
                    });
                }

                $(this).css('top', elementsTopSize)



                var imageSrc = $(this).css('background-image')
                $(this).css('background-image', 'none')
                imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                if(imageSrc !== 'none'){
                    $('<div class="image_box"><img src="'+ imageSrc +'"></div>').insertBefore($(this).find('.et_pb_toggle_title'))
                }
            });


            var accordionHeight = $('.tina_accordion_looked_down .et_pb_accordion').height();
            $('.tina_accordion_looked_down .et_pb_accordion .et_pb_toggle').css('position', 'absolute');

            $('.tina_accordion_looked_down .accordion_col').height(accordionHeight);

            $('.tina_accordion_looked_down .et_pb_toggle_title').click(function(e){
                e.preventDefault();

            });

            $('.tina_accordion_looked_down .et_pb_toggle').click(function(e){
                $('.tina_accordion_looked_down .et_pb_toggle').each(function () {
                    $(this).removeClass('et_pb_toggle_close');
                    $(this).removeClass('et_pb_toggle_open');
                    // $(this).height($(this).attr('height'));
                    $(this).find('.et_pb_toggle_content').css('cssText', ' max-height: 0 !important;')
                });


                var $toggle = $(this);

                if(!$toggle.hasClass('opened')){
                    $('.tina_accordion_looked_down .et_pb_toggle').removeClass('opened');
                    var prevAllHeight = 0;
                    $toggle.prevAll().each(function () {
                        prevAllHeight += parseInt($(this).attr('height')) + parseInt($(this).attr('margin-bottom'));
                    });

                    // $('.tina_accordion_looked_down .et_pb_accordion ').css('top', '-'+ prevAllHeight +'px');


                    $('.tina_accordion_looked_down .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');
                    // $toggle.height(accordionHeight);

                    // var thisTitle = $(this);
                    setTimeout(function () {
                        // var titleHeight =  thisTitle.outerHeight();
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ $toggle.find('.et_pb_toggle_content').attr('height') +'px !important;');
                    },50)

                }else{
                    $('.tina_accordion_looked_down .et_pb_toggle').removeClass('closed');
                    $toggle.removeClass('opened');
                    // $toggle.height($toggle.attr('height'));
                    $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: 0px !important;');
                    // $('.tina_accordion_looked_down .et_pb_accordion ').css('top', '0px')
                }
            })



            $('.tina_accordion_looked_down .et_pb_accordion').css('opacity', 1)
        }

    }, tinaAccordionLookedDown);

})(jQuery);