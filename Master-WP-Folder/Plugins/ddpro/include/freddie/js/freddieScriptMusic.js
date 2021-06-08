(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;

    var freedieMusicTimeOut = 1000;

    if ($('body').hasClass('et-fb')) {
        freedieMusicTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieMusicTimeOut = 14000;
    }

    setTimeout(function () {
        if($('body .freddie_music').length !== 0){

            $('.freddie_music .et_pb_row  ').prepend($('<div class="audio_filter"><ul><li genre="all" class="active">'+__('All', 'ddpro')+'</li></ul></div>'))

            $('body .freddie_music .et_pb_audio_module').each(function () {
                var audioWidth = $(this).width();
                $(this).find('.et_pb_audio_module_content ').outerWidth(audioWidth);

                var s = $(this).find('.et_audio_module_meta').html();
                s = s.substring(0, s.indexOf('|'));

                var genre = $(this).find('.et_audio_module_meta').html().replace(s, '').replace("|", '').replace(/\s/g,'').toLowerCase();
                $(this).attr('genre', genre);

                $('<li genre="'+ genre +'">'+ genre +'</li>').appendTo($('.freddie_music .audio_filter ul'))

                $(this).find('.et_audio_module_meta').html(s)
            })

            var seen = {};
            $('.freddie_music .audio_filter li').each(function() {
                var txt = $(this).text();
                if (seen[txt])
                    $(this).remove();
                else
                    seen[txt] = true;
            });



            $('.freddie_music .et_pb_audio_module ').on('click', function () {
                $('.freddie_music .et_pb_audio_module ').removeClass('played');
                if($(this).find('.mejs-playpause-button').hasClass('mejs-play')){
                    $(this).addClass('played');
                }else{
                    $(this).removeClass('played');
                }
            })

            $('.freddie_music .audio_filter li').on('click', function () {
                $('.freddie_music .audio_filter li').removeClass('active')
                $(this).addClass('active')
                if($(this).attr('genre') === "all"){
                    $('body .freddie_music .et_pb_audio_module').show();
                }else{
                    var thisAttr = $(this).attr('genre');
                    $('body .freddie_music .et_pb_audio_module').each(function () {
                        if($(this).attr('genre') === thisAttr){
                            $(this).show();
                        }else{
                            $(this).hide()
                        }
                    })
                }
            })


            var chars = $('body .freddie_music .et_pb_audio_module').toArray();
            var filterItems = $('.freddie_music .audio_filter ul li ').toArray();
            var t1Music = new TimelineLite;
            t1Music.staggerFromTo(chars, 0.4, {
                opacity: 0,
                scale: 0.3
            }, {
                opacity: 1,
                scale: 1,
                ease: Back.easeOut.config(1.7)
            }, 0.1);

            setTimeout(function () {
                var filterItems = $('.freddie_music .audio_filter ul li ').toArray();
                var t1LiMusic = new TimelineLite;
                t1LiMusic.staggerFromTo(filterItems, 0.5, {
                    opacity: 0,
                    scale: 0.3
                }, {
                    opacity: 1,
                    scale: 1,
                    ease: Back.easeOut.config(1.7)
                }, 0.1);


            },1000)



        }

    }, freedieMusicTimeOut)

})(jQuery);