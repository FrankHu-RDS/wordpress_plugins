(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieYoureHotContactFormTimeOut = 1000;

    if (isIE()) {
        freddieYoureHotContactFormTimeOut = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieYoureHotContactFormTimeOut = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_youre_hot_contact_form').length !== 0) {


            if($('body').hasClass('et-fb')){
                $('.freddie_youre_hot_contact_form  form p').each(function () {
                    if($(this).find('input').length !== 0){
                        var dateId = $(this).find('input').attr('data-original_id')
                    }else if($(this).find('select').length !== 0){
                        var dateId = $(this).find('select').attr('data-original_id')
                    }else{
                        var dateId = $(this).find('textarea').attr('data-original_id')
                    }

                    $(this).attr('data-id', dateId)
                })
            }


            $('<div class="details"></div>').insertBefore('.freddie_youre_hot_contact_form  form p[data-id="type_of_project"]');
            $('<div class="start_date"></div>').insertAfter('.freddie_youre_hot_contact_form  form p[data-id="type_of_project"]');
            $('<div class="end_date"></div>').insertBefore('.freddie_youre_hot_contact_form  form p[data-id="message"]');
            $('.freddie_youre_hot_contact_form  p[data-id="name"], .freddie_youre_hot_contact_form  p[data-id="email"], .freddie_youre_hot_contact_form  p[data-id="phone"], .freddie_youre_hot_contact_form  p[data-id="company"]').appendTo(".freddie_youre_hot_contact_form  .details");
            $('.freddie_youre_hot_contact_form  p[data-id="select_month"], .freddie_youre_hot_contact_form  p[data-id="select_year"], .freddie_youre_hot_contact_form  p[data-id="no_big_rush"]').appendTo(".freddie_youre_hot_contact_form  .start_date");
            $('.freddie_youre_hot_contact_form  p[data-id="select_end_month"], .freddie_youre_hot_contact_form  p[data-id="select_end_year"], .freddie_youre_hot_contact_form  p[data-id="when_its_ready"]').appendTo(".freddie_youre_hot_contact_form  .end_date");
        }

    }, freddieYoureHotContactFormTimeOut)

})(jQuery);