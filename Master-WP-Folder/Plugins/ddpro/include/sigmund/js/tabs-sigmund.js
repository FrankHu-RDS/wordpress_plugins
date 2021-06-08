(function ($) {

    var timeOutTabs = 1000;
    if ($('body').hasClass('et-fb')) {
        timeOutTabs = 7000;
    }


    setTimeout(function () {
        var count = 1;
        console.log('first count - ' + count);
        $('.intro_tabs .et_pb_tabs .et_pb_tab ').each(function () {
            var tabImage = $(this).css('background-image');
            var tabtriangelImage = $(this).parent('.et_pb_all_tabs').css('background-image');
            tabImage = tabImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");
            tabtriangelImage = tabtriangelImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");

            $('<div class="right_content"><img class="bg_image" src="' + tabtriangelImage + '"><div class="tab_image"><img src="' + tabImage + '"></div></div>').appendTo($(this));
            $(this).css('background-image', 'none');


            if (count === $('.intro_tabs .et_pb_tabs .et_pb_tab').length) {
                $(this).parent('.et_pb_all_tabs').css('background-image', 'none');
            }
            count = count + 1;

        })
    }, timeOutTabs);


})(jQuery);