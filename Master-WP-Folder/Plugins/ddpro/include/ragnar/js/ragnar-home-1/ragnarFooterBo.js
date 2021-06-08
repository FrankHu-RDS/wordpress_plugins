(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogBjorn  = 500;

    if (isIE()) {
        ragnarBlogBjorn = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogBjorn = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_footer_ro').length !== 0){
            $('.ragnar_footer_ro .ragnar_top_row .et_pb_column').each(function (){
                var bgImage = $(this).find('.et_pb_image img').attr('src');
                $('<div class="images_wrap" style="background-image: url('+ bgImage +')"></div>').appendTo( $('.ragnar_footer_ro .ragnar_footer_ro_bg_image'))
            })
            
            $('.ragnar_footer_ro .ragnar_footer_ro_bg_image .et_pb_column').remove()
            
            $('.ragnar_footer_ro .ragnar_top_row .et_pb_column').hover(function (){
                var elCount = $(this).prevAll().length + 1;
                $('.ragnar_footer_ro .ragnar_footer_ro_bg_image .images_wrap').removeClass('active')
                $('.ragnar_footer_ro .ragnar_footer_ro_bg_image .images_wrap:nth-child('+ elCount +')').addClass('active')

                $('.ragnar_footer_ro .ragnar_top_row .et_pb_column').addClass('activ_col')
                $(this).removeClass('activ_col')
            },function (){
                $('.ragnar_footer_ro .ragnar_top_row .et_pb_column').removeClass('activ_col')
                $('.ragnar_footer_ro .ragnar_footer_ro_bg_image .images_wrap').removeClass('active')
            })






            $('.ragnar_footer_ro .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $(this).find('.et_pb_newsletter_button_text').html( $(this).find('.et_pb_newsletter_button_text').text() + '<div class="button_arrow_icon"><div class="arrow"></div></div>')
                // $('<div class="button_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
            })








            var fieldsCount = $('.ragnar_footer_ro p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.ragnar_footer_ro p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.ragnar_footer_ro .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.ragnar_footer_ro p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }
        }


    }, ragnarBlogBjorn)

})(jQuery);