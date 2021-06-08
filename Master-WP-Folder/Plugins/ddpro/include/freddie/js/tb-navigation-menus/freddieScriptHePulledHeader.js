

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var hePulledHeader = 500;

    if (isIE()) {
        hePulledHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        hePulledHeader = 10000;
    }

    if ($('body').hasClass('et-tb')) {
        hePulledHeader = 10000;

        setInterval(function () {
            if($(window).width() > 980){
                $('.freddie_he_pulled_header .et_pb_menu .et_pb_menu__logo-wrap').appendTo('.freddie_he_pulled_header .logo_col')
            }
        },10000)
    }

    setTimeout(function () {
        if($('body:not(.et-fb) .freddie_he_pulled_header').length !== 0){
            if($(window).width() > 980){

                $('.freddie_he_pulled_header .et_pb_menu .et_pb_menu__logo-wrap').appendTo('.freddie_he_pulled_header .logo_col')
                $('.freddie_he_pulled_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').each(function () {
                    var linkText = $(this).children('a').text()
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_he_pulled_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).children('a').html($('<div class="item_container"><span class="text">'+ linkText +'</span></div>'))
                        $(this).children('a').find('.item_container').prepend($('.freddie_he_pulled_header .menu_images .image_item_' + itemCount))
                    }
                })
            }else{
                $('.freddie_he_pulled_header .et_pb_menu .et_mobile_nav_menu ul.et_mobile_menu > li').each(function () {
                    var itemCount = $(this).prevAll().length + 1;
                    if($('.freddie_he_pulled_header .menu_images .image_item_' + itemCount).length !== 0){
                        $(this).children('a').prepend($('.freddie_he_pulled_header .menu_images .image_item_' + itemCount))
                    }
                })
            }


            $('.freddie_he_pulled_header .menu_images').remove()





            $('.freddie_he_pulled_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').on('mouseenter', function () {

                var self = this;

                var $playBtn = $(this).find('.item_container');


                self.hoverTl = new TimelineMax();
                self.hoverTl.to($playBtn, .2, {
                    y: '100%',
                    opacity: 0,
                    ease: Circ.easeIn
                })
                    .to($playBtn, 0, {
                        y: '-100%',
                        opacity: 0,
                        ease: Circ.easeIn
                    },0.2)
                    .to($playBtn, .15, {
                        y: '0%',
                        opacity: 1,
                        ease: Circ.easeIn
                    },0.2)

                $el = $(this);

                self.hoverTl.play();
            })
                .on('mouseleave', function () {
                    var self = this;
                    $el = $(this);

                    self.hoverTl.reverse();
                });
        }


    }, hePulledHeader);

})(jQuery);