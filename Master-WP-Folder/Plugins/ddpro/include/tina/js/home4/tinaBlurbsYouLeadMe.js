(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsYouLeadMe = 3000;

    if (isIE()) {
        tinaBlurbsYouLeadMe = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsYouLeadMe = 10000;
    }

    setTimeout(function () {
        if($('.tina_you_lead_me_blurbs').length !== 0){
            $('.tina_you_lead_me_blurbs .et_pb_blurb').each(function () {
                $(this).find('.et_pb_blurb_description').insertBefore($(this).find('h4.et_pb_module_header'))
            })



            var slideContBgImage = $('.tina_you_lead_me_blurbs').css('background-image');
            $('.tina_you_lead_me_blurbs .et_pb_blurb').hover(

                function() {
                    var slideBgImage = $(this).find('.et_pb_image_wrap img').attr('src');
                    if (slideBgImage !== 'none') {
                        $('.tina_you_lead_me_blurbs').css('cssText', 'background-image: url(' + slideBgImage + ') !important;');
                    }

                },
                function() {
                                           $('.tina_you_lead_me_blurbs').css('cssText', 'background-image: ' + slideContBgImage + ' !important;');
                }
            );
        }

    }, tinaBlurbsYouLeadMe);

})(jQuery);