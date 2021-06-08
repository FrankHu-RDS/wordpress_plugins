(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieMyHeartHeaderTimeOut = 0;

    if (isIE()) {
        freddieMyHeartHeaderTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieMyHeartHeaderTimeOut = 10000;
    }

    setTimeout(function () {


        if($('.freddie_my_heart_header').length !== 0){
            $("#page-container .freddie_my_heart_header .et_pb_posts .et_pb_post h2.entry-title a").html(function(){
                return $(this).html().substr(0,50);
            });

            $("#page-container .freddie_my_heart_header .et_pb_posts .et_pb_post h2.entry-title a").each(function () {
                var thisText = $(this).text();
                $(this).text(thisText + ' . . .')
            })


            $('#page-container .freddie_my_heart_header .et_pb_slide').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            })


            $('#page-container .freddie_my_heart_header .et_pb_posts .et_pb_post').each(function () {
                $('<div class="post_content_container"></div>').insertAfter($(this).find('.entry-featured-image-url'));
                $(this).find('h2.entry-title').appendTo($(this).find('.post_content_container'));
                $(this).find('.post-content').appendTo($(this).find('.post_content_container'));
            })

            $('#page-container .freddie_my_heart_header .et_pb_posts .et_pb_post').each(function () {


                if($(this).find('.entry-featured-image-url').height() >= $(this).find('.entry-featured-image-url img').height()){
                    $(this).find('.entry-featured-image-url').addClass('small_height');
                }else{
                    $(this).find('.entry-featured-image-url').addClass('big_height');
                }
            })
        }





    }, freddieMyHeartHeaderTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);