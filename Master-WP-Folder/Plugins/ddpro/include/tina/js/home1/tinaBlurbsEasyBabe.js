(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlurbsEasyBabe = 3000;

    if (isIE()) {
        tinaBlurbsEasyBabe = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlurbsEasyBabe = 10000;
    }

    setTimeout(function () {
        if($('.tina_easy_babe_blurbs').length !== 0){
            if ($(window).width() > 980) {
               $('.tina_easy_babe_blurbs .et_pb_column .et_pb_blurb_description').each(function () {
                   var thisHeight = $(this).height();
                   $(this).attr('dscription-height', thisHeight)

                   var thisHtml = $(this).html();
                   $(this).html('<div class="description_inner_cont">'+ thisHtml +'</div>')


                   $(this).css('max-height', 0)
               })

               var touchClick = 0;
               $('.tina_easy_babe_blurbs .et_pb_column').on('click touchstart', function () {
                   touchClick = 1;
               })

               $('.tina_easy_babe_blurbs .et_pb_column').hover(function () {
                   if(touchClick !== 1){
                       $(this).find('.et_pb_blurb_description').css('max-height', $(this).find('.et_pb_blurb_description').attr('dscription-height') + 'px')
                   }

               },function () {
                   $(this).find('.et_pb_blurb_description').css('max-height', 0)
               })

               $('.tina_easy_babe_blurbs .et_pb_blurb .et_pb_blurb_container').css('opacity', 1)
           }
        }

    }, tinaBlurbsEasyBabe);

})(jQuery);