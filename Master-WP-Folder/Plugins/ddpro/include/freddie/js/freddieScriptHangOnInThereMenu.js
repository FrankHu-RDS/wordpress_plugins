(function ($) {
    var freedieMenuHangTimeOut = 1500;

    if ($('body').hasClass('et-fb')) {
        freedieMenuHangTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieMenuHangTimeOut = 8000;
    }

    setTimeout(function () {
        if($('.freddie_hang_on_in_there_menu_container').length !== 0) {
            $('#custom-ddp-menu').css('cssText', 'z-index: 99 !important;     position: relative;')
        }
if($('.freddie_hang_on_in_there_menu_container').length !== 0){
    var $linea_01 = $(".freddie_hang_on_in_there_menu_container .line.line_01_btn_menu");
    var $linea_02 = $(".freddie_hang_on_in_there_menu_container .line.line_02_btn_menu");
    var $linea_03 = $(".freddie_hang_on_in_there_menu_container .line.line_03_btn_menu");

    function close_despliega_menu() {
        TweenMax.to
        ($linea_02, 0.2, {delay: 1.6, scale: 1});

        TweenMax.to
        ($linea_01, 0.2, {y: 0, rotation: 0, ease: Back.easeOut, delay: 1.1});

        TweenMax.to
        ($linea_03, 0.3, {top: 14, y: 0, rotation: 0, ease: Back.easeOut, delay: 1.2});
    };


    function despliega_menu() {
        TweenMax.to
        ($linea_02, 0.2, {delay: 1, scale: 0});

        TweenMax.to
        ($linea_01, 0.2, {y: 8.5, rotation: 45, ease: Back.easeOut, delay: 1.3});

        TweenMax.to
        ($linea_03, 0.3, {top: 0, y: 8.5, rotation: -45, ease: Back.easeOut, delay: 1.5});
    };


    $('.freddie_hang_on_in_there_menu').each(function () {
        $(this).insertBefore($('.freddie_hang_on_in_there_menu_container .et_pb_social_media_follow'))
    });

    $('.freddie_hang_on_in_there_menu_container .et_pb_social_media_follow').each(function () {
        $(this).find('li').each(function () {
            var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
            $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
        })

    });


    var menuWidth = 704;
    var closedMenuWidth = 101;
    var thisWidth = 300;
    if($(window).width() <= 1500){
        thisWidth = 140;
    }
    if($(window).width() <= 767){
        menuWidth = 470;
        closedMenuWidth = 70;
    }

    if($(window).width() <= 480){
        menuWidth = 310;
        closedMenuWidth = 40;
    }


    function getDistDancer(point1, point2) {
        var b = point2.offset().left - point1.pageX;

        return Math.ceil(Math.sqrt(b * b));
    }

    if($(window).width() >= 1025){
        $('body').on("mousemove",
            function (event) {

                var thisTimeLine = this;
                var dist;
                var mouse = event;
                var button = $(this).find('.freddie_hang_on_in_there_menu_container .menu__inner');

                dist = getDistDancer(mouse, button);

                thisTimeLine.tlGetDownCircle = new TimelineLite();
                if (!$(".freddie_hang_on_in_there_menu_container").hasClass('opened')) {
                    if (dist <= thisWidth) {
                        thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container "), 0.5, {
                            width: menuWidth,
                            ease: Power2.easeOut
                        }, 0);

                        // thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                        //     x: 0,
                        //     ease: Power2.easeOut
                        // }, 0);

                        $(".freddie_hang_on_in_there_menu_container").addClass('opened');
                        despliega_menu()

                    } else if (dist <= thisWidth + (thisWidth / 2)) {
                        var size = (thisWidth + (thisWidth / 2) - dist) * 2;


                        thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container "), 0.5, {
                            width: size,
                            ease: Power2.easeOut
                        }, 0);


                    }

                    if ((dist - thisWidth) <= 66) {
                        var menuLeftSize = (dist - thisWidth);

                        thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                            x: -menuLeftSize,
                            ease: Power2.easeOut
                        }, 0);
                    }
                } else {
                    if (dist >= menuWidth) {
                        thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container"), 0.8, {
                            width: closedMenuWidth,
                            ease: Power2.easeOut
                        }, 0);

                        thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                            x: -66,
                            delay: 0.2,
                            ease: Power2.easeOut
                        }, 0);
                        $('.freddie_hang_on_in_there_menu_container').removeClass('opened');
                        close_despliega_menu();
                    }
                }
                $(" .freddie_hang_on_in_there_menu_container.opened .freddie_menu_icon ").on('click', function () {
                    thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container"), 0.8, {
                        width: closedMenuWidth,
                        ease: Power2.easeOut
                    }, 0);
                    thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                        x: -66,
                        delay: 0.2,
                        ease: Power2.easeOut
                    }, 0);

                    $('.freddie_hang_on_in_there_menu_container').removeClass('opened');
                    close_despliega_menu();
                })
            }
        );
    }else{


        $(" .freddie_hang_on_in_there_menu_container .close_icon_row").on('click', function () {

            if(!$(" .freddie_hang_on_in_there_menu_container").hasClass('opened')){
                console.log('open');
                var thisTimeLine = this;
                thisTimeLine.tlGetDownCircle = new TimelineLite();
                thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container "), 0.5, {
                    width: menuWidth,
                    ease: Power2.easeOut
                }, 0);

                thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                    x: 0,
                    ease: Power2.easeOut
                }, 0);

                $(".freddie_hang_on_in_there_menu_container").addClass('opened');
                despliega_menu()
            }else{
                console.log('close');
                var thisTimeLine = this;
                thisTimeLine.tlGetDownCircle = new TimelineLite();
                thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container"), 0.8, {
                    width: closedMenuWidth,
                    ease: Power2.easeOut
                }, 0);
                thisTimeLine.tlGetDownCircle.to($(" .freddie_hang_on_in_there_menu_container .menu__inner"), 1, {
                    x: -66,
                    delay: 0.2,
                    ease: Power2.easeOut
                }, 0);

                $('.freddie_hang_on_in_there_menu_container').removeClass('opened');
                close_despliega_menu();
            }

        })
    }




    $('.freddie_hang_on_in_there_menu_container .freddie_hang_on_in_there_menu ul.fullwidth-menu li a').hover(
        function (e) {
            e.preventDefault();
            $('.freddie_hang_on_in_there_menu_container .freddie_hang_on_in_there_menu ul.fullwidth-menu').addClass('hovered');
        }, function () {
            $('.freddie_hang_on_in_there_menu_container .freddie_hang_on_in_there_menu ul.fullwidth-menu').removeClass('hovered');
        })
}





    }, freedieMenuHangTimeOut)
})(jQuery);
