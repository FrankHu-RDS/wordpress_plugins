(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieAccordionsTimeOut = 0;

    if (isIE()) {
        freddieAccordionsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieAccordionsTimeOut = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_blurred_vision_accordion').length !== 0) {

            $('.freddie_blurred_vision_accordion .et_pb_accordion').each(function () {
                $(this).prepend('<div class="toggle_icon"></div>');
            })

            $('.freddie_blurred_vision_accordion .et_pb_toggle').on("click", function () {
                $('.toggle_icon').css("top", $(this).position().top);

                var prevElCount = $(this).prevAll('.et_pb_toggle').length + 1;
                // var check = "et_pb_accordion_item_";
                // var slideItem;
                //
                // var cls = $(this).attr('class').split(' ');
                // for (var i = 0; i < cls.length; i++) {
                //
                //     if (cls[i].indexOf(check) > -1) {
                //         slideItem = cls[i].slice(check.length, cls[i].length);
                //
                //     }
                // }




                $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide').each(function () {
                    if( $(this).find('.et_pb_video_box video').length !== 0){
                        var videoSrc = $(this).find('.et_pb_video_box').html()
                        $(this).find('.et_pb_video_box').html('')
                        $(this).find('.et_pb_video_box').html(videoSrc)
                    }
                    if( $(this).find('iframe').length !== 0){
                        $(this).find('iframe').attr('src', $(this).find('iframe').attr('src').replace("autoplay=1", "autoplay=0"));
                        var iframeSrc = $(this).find('.fluid-width-video-wrapper').html()
                        $(this).find('.fluid-width-video-wrapper').html('')
                        $(this).find('.fluid-width-video-wrapper').html(iframeSrc)
                    }

                })


                $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide').removeClass('et-pb-active-slide');
                $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide:nth-child('+ prevElCount +')').addClass('et-pb-active-slide')
                $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide').hide("slow");
                $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide:nth-child('+ prevElCount +')').show("slow")
            })


            $('.freddie_blurred_vision_accordion .et_pb_video_slider .et_pb_slider .et_pb_slide').each(function () {
                $(this).removeClass('et-pb-active-slide');
            })
        }


    }, freddieAccordionsTimeOut);

})(jQuery);