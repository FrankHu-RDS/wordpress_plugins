

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var PleadingHeader = 500;

    if (isIE()) {
        PleadingHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        PleadingHeader = 10000;
    }

    setTimeout(function () {
        if($('body:not(.et-fb) .freddie_pleading_header').length !== 0){
            $('#page-container .freddie_pleading_header .et-menu > li > a').each(function () {
                var itemText = $(this).text();
                $(this).html('<span class="text">'+ itemText +'</span>')
            })
        }


    }, PleadingHeader);

})(jQuery);