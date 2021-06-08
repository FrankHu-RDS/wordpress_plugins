(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaSidebarMyBeggining = 0;

    if (isIE()) {
        tinaSidebarMyBeggining = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaSidebarMyBeggining = 10000;
    }

    setTimeout(function () {

        if($('.tina_my_beggining_sidebar').length !== 0){

            $('.tina_my_beggining_sidebar .et_pb_newsletter_button_wrap .et_pb_newsletter_button ').each(function () {
                $(this).find('.et_pb_newsletter_button_text').html('<div class="button_arrow_icon"><div class="arrow"></div></div>')
            })

            $('.tina_my_beggining_sidebar .et_pb_newsletter_form p:not(.et_pb_signup_custom_field)').each(function () {
                $('<div class="hover_lines"></div>').insertBefore($(this).find('input'))
            })

            var fieldsCount = $('.tina_my_beggining_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').length;
            $('.tina_my_beggining_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field')
            if(fieldsCount > 1){
                $('.tina_my_beggining_sidebar .et_pb_newsletter_form form').addClass('form_fields_count')
                $('.tina_my_beggining_sidebar p.et_pb_newsletter_field:not(.et_pb_signup_custom_field)').addClass('form_field fields_count_'+ fieldsCount)
            }


            $('.tina_my_beggining_sidebar .et_pb_slider .et_pb_slide ').each(function () {
                $(this).find('h2.et_pb_slide_title').insertAfter($(this).find('.et_pb_slide_content'))
            })



                $('.tina_my_beggining_sidebar .et_pb_tabs .et_pb_tab .et_pb_tab_content a').each(function () {
                    $('<div class="tab_arrow_icon"><div class="arrow"></div></div>').appendTo($(this))
                })


        }

    }, tinaSidebarMyBeggining);

})(jQuery);