(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaCaseStudiesTakesTwo = 3500;

    if (isIE()) {
        tinaCaseStudiesTakesTwo = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaCaseStudiesTakesTwo = 10000;
    }

    setTimeout(function () {
        if($('.tina_case_studies_takes_two').length !== 0){
            var boxHeight = 0;
            $('.tina_case_studies_takes_two .et_pb_blurb').each(function () {
                if(boxHeight < $(this).find('.et_pb_blurb_content').outerHeight()){
                    boxHeight = $(this).find('.et_pb_blurb_content').outerHeight()
                }


            });

            $('.tina_case_studies_takes_two .et_pb_blurb .et_pb_blurb_content').outerHeight(boxHeight)
        }

    }, tinaCaseStudiesTakesTwo);

})(jQuery);