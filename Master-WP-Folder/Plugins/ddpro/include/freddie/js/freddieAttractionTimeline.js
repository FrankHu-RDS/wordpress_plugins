(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieAttractionTimeline = 2000;

    if (isIE()) {
        freddieAttractionTimeline = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieAttractionTimeline = 10000;
    }

    setTimeout(function () {
        if($('.freddie_attraction_timeline').length !== 0){
            var tabHeight = 0;
            $('.freddie_attraction_timeline .et_pb_tabs .et_pb_tab').each(function () {
                var tabContent = 0;
                $('<div class="tab_left_content"></div>').insertBefore($(this).find('.et_pb_tab_content'))
                $($(this).find('strong')).appendTo($(this).find('.tab_left_content'))

                if($(this).find('.et_pb_tab_content').height() > $(this).find('.tab_left_content').height()){
                    $(this).find('.tab_left_content').height($(this).find('.et_pb_tab_content').height())
                }else{
                    $(this).find('.et_pb_tab_content').height($(this).find('.tab_left_content').height())
                }


                if($(this).height() > tabHeight){
                    tabHeight = $(this).height();
                }
            })

            $('.freddie_attraction_timeline .et_pb_tabs .et_pb_tab').height(tabHeight)



            // setInterval(function () {
            //     $('.freddie_attraction_timeline .et_pb_tabs .et_pb_tab').each(function () {
            //         var tabContent = 0;
            //
            //         if($(this).find('.et_pb_tab_content').height() > $(this).find('.tab_left_content').height()){
            //             $(this).find('.tab_left_content').height($(this).find('.et_pb_tab_content').height())
            //         }else{
            //             $(this).find('.et_pb_tab_content').height($(this).find('.tab_left_content').height())
            //         }
            //     })
            // },100)
        }

    }, freddieAttractionTimeline);

})(jQuery);