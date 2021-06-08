(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPopupsV14  = 1000;

    if (isIE()) {
        ragnarPopupsV14 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPopupsV14 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_popups_14').length !== 0){

            $('body:not(.et-fb) .ragnar_pop_up_14').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_14').css("display", "flex").hide().fadeIn();
                $('body:not(.et-fb) .ragnar_popups_14').addClass('opened_popup')
            })


            $('.ragnar_popups_14 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_14').hide('slow');
                $('body:not(.et-fb) .ragnar_popups_14').removeClass('opened_popup')
            })





        }

    }, ragnarPopupsV14);

})(jQuery);