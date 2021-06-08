(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaAccordionChargeOf = 2000;

    if (isIE()) {
        tinaAccordionChargeOf = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaAccordionChargeOf = 10000;
    }

    setTimeout(function () {
        if ($('.tina_accordion_chardge_of').length !== 0) {

            $('.tina_accordion_chardge_of .et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

            $('.tina_accordion_chardge_of .et_pb_toggle').each(function () {
                $(this).find('.et_pb_toggle_content').attr('height', $(this).find('.et_pb_toggle_content').height());
                $(this).find('.et_pb_toggle_content').css('cssText', 'max-height: 0 !important;');
                $(this).attr('height', $(this).height());
                $(this).attr('margin-bottom', parseInt($(this).css('margin-bottom'), 10));

            });


            var accordionHeight = $('.tina_accordion_chardge_of .et_pb_accordion').height();

            $('.tina_accordion_chardge_of .et_pb_toggle').each(function () {
                if($(this).find('.et_pb_toggle_content').attr('height') > accordionHeight - $(this).find('h5.et_pb_toggle_title').outerHeight()){
                    $(this).find('.et_pb_toggle_content').addClass('scrollable')
                }
            })

            $('.tina_accordion_chardge_of .accordion_col').height(accordionHeight);

            $('.tina_accordion_chardge_of .et_pb_toggle_title').click(function(e){
                e.preventDefault();


                $('.tina_accordion_chardge_of .et_pb_toggle').each(function () {
                    $(this).removeClass('et_pb_toggle_close');
                    $(this).removeClass('et_pb_toggle_open');
                    $(this).height($(this).attr('height'));
                    $(this).find('.et_pb_toggle_content').css('cssText', ' max-height: 0 !important;')
                });

                var $toggle = $(this).closest('.et_pb_toggle');

                if(!$toggle.hasClass('opened')){
                    var prevAllHeight = 0;
                    $toggle.prevAll().each(function () {
                        prevAllHeight += parseInt($(this).attr('height')) + parseInt($(this).attr('margin-bottom'));
                    });

                    $('.tina_accordion_chardge_of .et_pb_accordion ').css('top', '-'+ prevAllHeight +'px');


                    $('.tina_accordion_chardge_of .et_pb_toggle').addClass('closed');
                    $toggle.addClass('opened');
                    $toggle.height(accordionHeight);

                    var thisTitle = $(this);
                    setTimeout(function () {
                        var titleHeight =  thisTitle.outerHeight();
                        $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: '+ (accordionHeight - titleHeight - 60) +'px !important;');
                    },300)

                }else{
                    $('.tina_accordion_chardge_of .et_pb_toggle').removeClass('closed');
                    $toggle.removeClass('opened');
                    $toggle.height($toggle.attr('height'));
                    $toggle.find('.et_pb_toggle_content').css('cssText', 'max-height: 0px !important;');
                    $('.tina_accordion_chardge_of .et_pb_accordion ').css('top', '0px')
                }


            });


            $('.tina_accordion_chardge_of .et_pb_accordion .et_pb_toggle .et_pb_toggle_content').on('scrollstart', function() {
                $('.tina_accordion_chardge_of .et_pb_accordion .et_pb_toggle.opened .et_pb_toggle_title').css('box-shadow', '0 0 10px rgba(0,0,0,0.1)')
            });


            $('.tina_accordion_chardge_of .et_pb_accordion .et_pb_toggle .et_pb_toggle_content').scroll(function() {
                clearTimeout($.data(this, 'scrollTimer'));
                $.data(this, 'scrollTimer', setTimeout(function() {
                    $('.tina_accordion_chardge_of .et_pb_accordion .et_pb_toggle.opened .et_pb_toggle_title').css('box-shadow', '0 0 0 rgba(0,0,0,0)')
                }, 250));
            });


            $('.tina_accordion_chardge_of .et_pb_accordion').css('opacity', 1)
        }

    }, tinaAccordionChargeOf);

})(jQuery);