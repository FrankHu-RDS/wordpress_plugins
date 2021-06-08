(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var headlineHeader = 500;

    if (isIE()) {
        headlineHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        headlineHeader = 10000;
    }


    if ($('body').hasClass('et-tb')) {
        headlineHeader = 10000;

        setInterval(function () {
             $('.freddie_headline_header .et_pb_search input.et_pb_searchsubmit').attr('value', 'U');
            if($(window).width() > 980){
                $('.freddie_headline_header .et_pb_menu .et_pb_menu__logo-wrap').appendTo('.freddie_headline_header .logo_col');
            }
        },10000)
    }

    setTimeout(function () {
        if($('body:not(.et-fb) .freddie_headline_header').length !== 0){

            $('.freddie_headline_header .et_pb_search input.et_pb_searchsubmit').attr('value', 'U')

            if($(window).width() > 980){
                $('.freddie_headline_header .et_pb_menu .et_pb_menu__logo-wrap').appendTo('.freddie_headline_header .logo_col');


                $('.freddie_headline_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').each(function () {
                    var linkText = $(this).children('a').text();
                    $(this).children('a').html($('<span class="text">'+ linkText +'</span>'))
                })




                $('.freddie_headline_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li').on('mouseenter', function () {

                    var self = this;

                    var $playBtn = $(this).find('.text');


                    self.hoverTl = new TimelineMax();
                    self.hoverTl.to($playBtn, .25, {
                        x: '100%',
                        opacity: 0,
                        ease: Circ.easeIn
                    })
                        .to($playBtn, 0, {
                            x: '-100%',
                            opacity: 0,
                            ease: Circ.easeIn
                        },0.25)
                        .to($playBtn, .25, {
                            x: '0%',
                            opacity: 1,
                            ease: Circ.easeIn
                        },0.26)

                    $el = $(this);

                    self.hoverTl.play();
                })
                    .on('mouseleave', function () {
                        var self = this;
                        $el = $(this);

                        self.hoverTl.reverse();
                    });
            }


        }


    }, headlineHeader);

})(jQuery);