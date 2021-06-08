(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPopupsV16  = 1000;

    if (isIE()) {
        ragnarPopupsV16 = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPopupsV16 = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_popups_16').length !== 0){
            $('body:not(.et-fb) .ragnar_pop_up_16').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_16').css("display", "flex").hide().fadeIn();
                $('body:not(.et-fb) .ragnar_popups_16').addClass('opened_popup')
            })


            $('.ragnar_popups_16 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
                e.preventDefault();
                $('body:not(.et-fb) .ragnar_popups_16').hide('slow');
                $('body:not(.et-fb) .ragnar_popups_16').removeClass('opened_popup')
            })



        }

    }, ragnarPopupsV16);

})(jQuery);