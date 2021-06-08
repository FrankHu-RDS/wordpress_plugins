(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var  dianaBlurbsGoodbye  = 1500;

    if (isIE()) {
        dianaBlurbsGoodbye = 7000;
    }

    if ($('body').hasClass('et-fb')) {
        dianaBlurbsGoodbye = 10000;
    }

    setTimeout(function () {
        if($('.diana_goodbye_blurbs').length !== 0){
            var firstTextHeight = $('.diana_goodbye_blurbs .first_text.et_pb_text').outerHeight();
            var middleTextHeight = $('.diana_goodbye_blurbs .second_text.et_pb_text').outerHeight();

            var textHeight = firstTextHeight + middleTextHeight;

            $('.diana_goodbye_blurbs .column_nth_2').css('margin-top', textHeight + 'px')
            $('.diana_goodbye_blurbs .column_nth_3').css('margin-top', firstTextHeight + 'px')


            var titleHeight = 0;
            $('.diana_goodbye_blurbs .et_pb_blurb ').each(function () {

                if($(this).find('h4.et_pb_module_header').height() > titleHeight){
                    titleHeight = $(this).find('h4.et_pb_module_header').height() + 1;
                }
            })

            $('body:not(.ie) .diana_goodbye_blurbs .et_pb_blurb h4.et_pb_module_header').height(titleHeight)

            var titleWidht = 0;
            $('body.ie .diana_goodbye_blurbs .et_pb_blurb ').each(function () {
                console.log($(this).find('h4.et_pb_module_header span').width())
                if($(this).find('h4.et_pb_module_header span').width() > titleWidht){
                    titleWidht = $(this).find('h4.et_pb_module_header span').width() + 1;
                }
            })

            $('body.ie .diana_goodbye_blurbs .et_pb_blurb h4.et_pb_module_header').height(titleWidht)
            $('body.ie .diana_goodbye_blurbs .et_pb_blurb h4.et_pb_module_header span').width(titleWidht)

        }

    }, dianaBlurbsGoodbye);

})(jQuery);