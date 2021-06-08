(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var prettyLightsTabs = 1500;

    if (isIE()) {
        prettyLightsTabs = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        prettyLightsTabs = 10000;
    }

    setTimeout(function () {
        if($('.freddie_pretty_lights_tabs').length !== 0){
            var item = 1;
            $('.freddie_pretty_lights_tabs .et_pb_tabs .et_pb_tabs_controls li').each(function(){

                var tabIcon = $('.freddie_pretty_lights_tabs  .et_pb_all_tabs .et_pb_tab:nth-child('+ item +')').css('background-image');
                if(tabIcon) {
                    $('.freddie_pretty_lights_tabs .et_pb_all_tabs .et_pb_tab:nth-child('+ item +')').css('background-image', 'none');
                    tabIcon = tabIcon.replace('url(', '').replace(')', '').replace(/\"/gi, "");
                    $(this).find('a').html($('<img src="' + tabIcon + '">'));
                }

                item++;
            });

            $('.freddie_pretty_lights_tabs .et_pb_all_tabs .et_pb_tab:first-child').addClass('et_pb_active_content et-pb-active-slide');
        }

    }, prettyLightsTabs);

})(jQuery);