(function ($) {

    var freedieAlbumTimeOut = 100;

    if ($('body').hasClass('et-fb')) {
        freedieAlbumTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieAlbumTimeOut = 5000;
    }

    setTimeout(function () {
        if($('body .freddie_album').length !== 0){
            $('.freddie_album .et_pb_audio_module ').each(function () {
                var audioName = $(this).find('h2.et_pb_module_header').text();
                var artistName = $(this).find('.et_audio_module_meta strong').text();

                $(this).find('h2.et_pb_module_header').remove();
                $(this).find('.et_audio_module_meta strong').remove();

                var genreName = $(this).find('.et_audio_module_meta').text().replace(/\s/g,'').replace("by|", "");
                $(this).find('.et_audio_module_meta').html("<p class='audio_name'>"+ audioName +"</p><p class='artist_name'>"+ artistName +"</p><p class='genre_name'>"+ genreName +"</p>")
            })


            $('.freddie_album .et_pb_audio_module ').on('click', function () {
                $('.freddie_album .et_pb_audio_module ').removeClass('played');
                if($(this).find('.mejs-playpause-button').hasClass('mejs-play')){
                    $(this).addClass('played');
                }else{
                    $(this).removeClass('played');
                }
            })



            setTimeout(function () {
                var showItemsCount = 4;

                if ($(window).width() <= 980) {
                    showItemsCount = 2;
                }

                if ($(window).width() <= 480) {
                    showItemsCount = 1;
                }


                var sliderWidth = $('.freddie_album .freddie_album_more_by_name .et_pb_slider').width();
                var slidesCount = $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide').length;
                var slidesWidth = sliderWidth / showItemsCount;
                var sliderContainerWidth = slidesCount * slidesWidth;


                $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide').width(slidesWidth);
                $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slides').width(sliderContainerWidth + 30);
                $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slides .et_pb_slide:first-child').addClass('active_slide');


                $('.freddie_album .freddie_album_more_by_name .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function (e) {
                    e.preventDefault();

                    var thisArrow = $(this);
                    setTimeout(function () {
                        if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').nextAll().length >= showItemsCount) {
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                        }else{
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide:first-child').addClass('active_slide');
                        }
                    }, 50)
                })

                $('.freddie_album .freddie_album_more_by_name .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function (e) {
                    e.preventDefault();

                    var thisArrow = $(this);
                    setTimeout(function () {
                        if (thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length !== 0) {
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide').prev().addClass('active_slide');
                        }else{
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').removeClass('active_slide');
                            thisArrow.closest('.et_pb_slider').find('.et_pb_slide:nth-last-child('+ showItemsCount +')').addClass('active_slide');
                        }
                    }, 50)
                })


                $('.freddie_album .freddie_album_more_by_name .et-pb-slider-arrows a').on('click', function (e) {
                    e.preventDefault();

                    var thisArrow = $(this);
                    setTimeout(function () {

                        var slideBeforeItems = thisArrow.closest('.et_pb_slider').find('.et_pb_slide.active_slide').prevAll().length;
                        thisArrow.closest('.et_pb_slider').find('.et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                    }, 50)


                })


                if($('.freddie_album .freddie_album_more_by_name .et_pb_slider').hasClass('et_slider_auto')){
                    // sd=parseInt(sd);
                    var arrClasses = [];
                    $(".freddie_album .freddie_album_more_by_name .et_pb_slider[class*='et_slider_speed_']").removeClass(function () {
                        var className = this.className.match(/et_slider_speed_\d+/);
                        if (className) {
                            arrClasses.push(className[0]); //if it is the one then push it to array
                            return className[0]; //return it for removal
                        }
                    });
                    var className = arrClasses[0];
                    className = className.replace(/[^\d]+/, '');

                    setInterval(function () {
                        if ($('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide.active_slide').nextAll().length >= showItemsCount) {
                            $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide').next().addClass('active_slide');
                        }else{
                            $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide.active_slide').removeClass('active_slide');
                            $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide:first-child').addClass('active_slide');
                        }

                        var slideBeforeItems = $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slide.active_slide').prevAll().length;
                        $('.freddie_album .freddie_album_more_by_name .et_pb_slider .et_pb_slides').css("transform", "translate(-" + slideBeforeItems * slidesWidth + "px, 0)");
                    },className)
                }
            },1500)




        }
    }, freedieAlbumTimeOut)

})(jQuery);