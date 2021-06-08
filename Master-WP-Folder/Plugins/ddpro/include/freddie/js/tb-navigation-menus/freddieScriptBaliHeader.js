

(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var baliHeader = 500;

    if (isIE()) {
        baliHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        baliHeader = 10000;
    }

    setTimeout(function () {
        if($('.freddie_bali_header ').length !== 0){

            $('.freddie_bali_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li > a').each(function () {
                var text = $(this).text();
                $(this).html('<span>' + text + '</span>');
            })

            var splitButtonTorriate = new SplitText(".freddie_bali_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li > a span", {
                type: "chars",
                charsClass: "char char++",
                position: "reletive"
            });


            $('.freddie_bali_header .et_pb_menu .et_pb_menu__wrap ul.et-menu > li ').hover(
                function () {
                    var thisTl = this;

                    thisTl.t1Torriate = new TimelineLite;
                    var charsButtonTorriate = $(this).children('a').find('.char').toArray();
                    thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0.1, {
                        y: "-5px",
                        ease: Power0.easeNone
                    }, 0.02)
                        .staggerTo(charsButtonTorriate, 0.1, {
                            y: "0",
                            ease: Power0.easeNone
                        }, 0.02, "-=0");

                    thisTl.t1Torriate.play();
                }, function () {
                    // var thisTl = this;
                    // var charsButtonTorriate = $(this).find('.char').toArray();
                    // thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0, {
                    //     y: "0",
                    //     ease: Power0.easeNone
                    // }, 0)

                    var thisTl = this;

                    thisTl.t1Torriate = new TimelineLite;
                    var charsButtonTorriate = $(this).children('a').find('.char').toArray();
                    thisTl.t1Torriate.staggerTo(charsButtonTorriate, 0.1, {
                        y: "-5px",
                        ease: Power0.easeNone
                    }, 0.02)
                        .staggerTo(charsButtonTorriate, 0.1, {
                            y: "0",
                            ease: Power0.easeNone
                        }, 0.02, "-=0");

                    thisTl.t1Torriate.play();
                }
            )
        }


    }, baliHeader);

})(jQuery);