(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentDescendant = 1000;

    if (isIE()) {
        ragnarContentDescendant = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentDescendant = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_descendant').length !== 0){
            var topRowWidth = $('.ragnar_content_descendant .ragnar_content_descendant_top_row').width();
            var topRowColWidth = $('.ragnar_content_descendant .ragnar_content_descendant_top_row .et_pb_column_3_4 ').width();
            var windowWidth = $(window).width();

            $('.ragnar_content_descendant .ragnar_content_descendant_row .et_pb_column_3_4').width((windowWidth-topRowWidth)/2 + topRowColWidth);
        }

    }, ragnarContentDescendant);

})(jQuery);