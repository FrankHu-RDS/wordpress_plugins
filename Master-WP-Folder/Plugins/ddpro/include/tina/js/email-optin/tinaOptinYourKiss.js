(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaOptinYourKiss = 0;

    if (isIE()) {
        tinaOptinYourKiss = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaOptinYourKiss = 10000;
    }

    setTimeout(function () {
        if($('.tina_your_kiss_optin').length !== 0){

            $('.tina_your_kiss_optin  .et_pb_newsletter_form p input#et_pb_signup_lastname').parent('p').addClass('first_name')
            $('.tina_your_kiss_optin  .et_pb_newsletter_form p input#et_pb_signup_firstname').parent('p').addClass('first_name')
            $('.tina_your_kiss_optin  .et_pb_newsletter_form p input#et_pb_signup_email').parent('p').addClass('email')



            $('.tina_your_kiss_optin .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })



            $('.tina_your_kiss_optin .et_pb_newsletter p.email').prepend('<div class="blur_bg"></div>')
            $('.tina_your_kiss_optin .et_pb_newsletter p.first_name').prepend('<div class="blur_bg"></div>')

            var bgImage = $('.tina_your_kiss_optin').css('background-image');
            var sectionBgSize = $('.tina_your_kiss_optin').css('background-size');


            if(bgImage){

                var sectiontBoxWidth =  $('.tina_your_kiss_optin').width() + 1;
                var sectiontBoxHeight = $('.tina_your_kiss_optin').outerHeight() + 1;

                $('.tina_your_kiss_optin .et_pb_newsletter p').each(function (e) {
                    $(this).offset({
                        left: e.pageX,
                        top: e.pageY
                    });


                    $('.tina_your_kiss_optin').offset({
                        top: e.pageY
                    });

                    var elementTop = $(this).offset().top - $('.tina_your_kiss_optin').offset().top;

                    $(this).find('.blur_bg').css('cssText', 'background-image: '+ bgImage +'; top: -'+ elementTop +'px; left: -'+ $(this).offset().left +'px; width: '+ sectiontBoxWidth +'px; height: '+ sectiontBoxHeight +'px;')
                })

            }




            var fieldsCount = $('.tina_your_kiss_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            if(fieldsCount > 1){
                $('.tina_your_kiss_optin .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_your_kiss_optin p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }


        }

    }, tinaOptinYourKiss);

})(jQuery);