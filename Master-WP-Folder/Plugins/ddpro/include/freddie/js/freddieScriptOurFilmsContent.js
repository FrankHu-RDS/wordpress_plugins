(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieFilmsTimeOut = 2000;

    if (isIE()) {
        freddieFilmsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieFilmsTimeOut = 10000;
    }

    if($('.freddie_our_films_content').length !== 0){
        $('.video_slider_container .et_pb_column').css('cssText', 'opacity: 0 !important');
    }

    setTimeout(function () {
        if($('.freddie_our_films_content').length !== 0){
            console.log('test')
            var slideItemWidth = $('.video_slider_container .et_pb_column_4_4 ').width();
            var slideItemCount = $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide').length;

            $('.video_slider_container').css('opacity', 1);
            $('.video_slider_container').css('display', "none");


            $('<div class="slider_main_container"></div>').insertBefore($('.video_slider_container .et-pb-slider-arrows'));
            $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slides').appendTo($('.video_slider_container .slider_main_container'))

            $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slides').width(slideItemWidth*slideItemCount);
            $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide').width(slideItemWidth);
            $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide:first-child').addClass('active_slide');


            setTimeout(function () {


                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next ').on("click", function (e) {
                    e.preventDefault();
                    if($('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').nextAll().length !== 0){
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                    }else{
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide');
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide:first-child').addClass('active_slide');
                    }
                });

                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on("click", function (e) {
                    e.preventDefault();
                    if($('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').prevAll().length !== 0){
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                    }else{
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide');
                        $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide:last-child').addClass('active_slide');
                    }
                });

                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et-pb-slider-arrows a ').on("click", function (e) {
                    e.preventDefault();
                    var transformSize = $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').prevAll().length * slideItemWidth;


                    $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slides').css('transform', 'translate(-'+ transformSize +'px,0)')
                });
            },1000);


            var buttonNumber = 0;
            $('.freddie_our_films_content .et_pb_button_module_wrapper .et_pb_button ').each(function () {
                $(this).addClass('button_'+ buttonNumber);
                buttonNumber++;
            });

            $('.freddie_our_films_content .et_pb_button_module_wrapper .et_pb_button  ').on("click", function (e) {
                e.preventDefault();


                var check = "button_";
                var slideItem;

                var cls = $(this).attr('class').split(' ');
                for (var i = 0; i < cls.length; i++) {

                    if (cls[i].indexOf(check) > -1) {
                        slideItem = cls[i].slice(check.length, cls[i].length);

                    }
                }

                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide').removeClass('active_slide');
                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.et_pb_video_slider_item_' + slideItem).addClass('active_slide');
                var transformSize = $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide.active_slide').prevAll().length * slideItemWidth;


                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slides').css('transform', 'translate(-'+ transformSize +'px,0)');

                $('.video_slider_container').fadeIn( "slow" );
            });


            $('.video_slider_container .et_pb_blurb ').on('click', function () {
                $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide').each(function () {
                    var iframe = $(this).find('iframe');
                    var iframeSrc = iframe.attr('src');
                    iframe.attr('src', iframeSrc);

                })
                $('.video_slider_container').fadeOut( "slow" );
            });
            $('.video_slider_container .et_pb_video_slider .et_pb_slider .et_pb_slide').each(function () {
                $(this).removeClass('et-pb-active-slide');
            })



            setTimeout(function () {
                $('.video_slider_container .et_pb_column').css('cssText', 'opacity: 1 !important');
            }, 2000)
        }


    }, freddieFilmsTimeOut);

})(jQuery);