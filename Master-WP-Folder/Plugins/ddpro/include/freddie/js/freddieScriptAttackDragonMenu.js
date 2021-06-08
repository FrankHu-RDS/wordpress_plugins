(function ($) {

    var freedieMenuAttackDragonTimeOut = 1500;

    if ($('body').hasClass('et-fb')) {
        freedieMenuAttackDragonTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieMenuAttackDragonTimeOut = 8000;
    }

    setTimeout(function () {

        if($('body:not(.et-fb) .freddie_attack_dragon_menu_container').hasClass('fixed')){
            $('body:not(.et-fb) .freddie_attack_dragon_menu').addClass('fixed');
            var menuHeight = $('.freddie_attack_dragon_menu_container').outerHeight();
            $('#et-main-area').css('padding-top', menuHeight + 'px');
        }

        var $freddie_menu_icon = $(".freddie_attack_dragon_menu_container .freddie_menu_icon");
        var $linea_01 = $(".freddie_attack_dragon_menu_container .line.line_01_btn_menu");
        var $linea_02 = $(".freddie_attack_dragon_menu_container .line.line_02_btn_menu");
        var $linea_03 = $(".freddie_attack_dragon_menu_container .line.line_03_btn_menu");
        var $BTN_01 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(1)");
        var $BTN_02 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(2)");
        var $BTN_03 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(3)");
        var $BTN_04 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(4)");
        var $BTN_05 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(5)");
        var $BTN_06 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(6)");
        var $BTN_07 = $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li:nth-child(7)");


        function close_despliega_menu() {
            TweenMax.to
            ($linea_02, 0.2, {delay:1.8,scale: 1});

            TweenMax.to
            ($linea_01, 0.2, {y:0, rotation:0, ease:Back.easeOut,delay:1.3});

            TweenMax.to
            ($linea_03, 0.3, {top:17, y:0, rotation:0, ease:Back.easeOut,delay:1.5});


                TweenMax.to(
                    $BTN_01, 1.2,
                    {bezier:[{x:-280, y:-7}, {x:100, y:900}],
                        delay: 0}
                );

                TweenMax.to(
                    $BTN_02, 1.2,
                    {bezier:[{x:-280, y:-7}, {x:-1100, y:500}],
                        delay: 0.4}
                );

                TweenMax.to(
                    $BTN_03, 1.2,
                    {bezier:[{x:-500, y:-97}, {x:-900, y:-900}],
                        delay: 0.7}
                );

                TweenMax.to(
                    $BTN_04, 1.3,
                {bezier:[{x:-50, y:-600}, {x:-300, y:-900}],
                    delay: 0.1}
                );

                TweenMax.to(
                    $BTN_05, 1.5,
                {bezier:[{x:34, y:127}, {x:400, y:900}],
                    delay: 0.3}
                );

                TweenMax.to(
                    $BTN_06, 1,
                {bezier:[{x:280, y:-160}, {x:900, y:-900}],
                    delay: 0.5}
                );


            TweenMax.to(
                $BTN_07, 1.7,
                {bezier:[{x:50, y:127}, {x:500, y:900}],
                    delay: 0.4}
            );

        };

        close_despliega_menu();





        function despliega_menu(){

                TweenMax.to
                ($linea_02, 0.2, {delay:1,scale: 0});

                TweenMax.to
                ($linea_01, 0.2, {y:8.5, rotation:45, ease:Back.easeOut,delay:1.3});

                TweenMax.to
                ($linea_03, 0.3, {top:0, y:8.5, rotation:-45, ease:Back.easeOut,delay:1.5});



                TweenMax.to(
                    $BTN_01, 1.2,
                    {bezier:[{x:-280, y:-7}, {x:0, y:0}],
                        scale:1,
                        rotation:0,
                        delay: 1,
                        opacity: 1,
                        ease:Power2.easeOut}
                );

                TweenMax.to(
                    $BTN_02, 1.2,
                    {bezier:[{x:-280, y:-7}, {x:0, y:0}],
                        scale:1,
                        rotation:0,
                        opacity: 1,
                        delay: 0.8,
                        ease:Power2.easeOut}
                );

                TweenMax.to(
                    $BTN_03, 1.2,
                    {bezier:[{x:-500, y:-97}, {x:0, y:0}],
                        scale:1,
                        rotation:0,
                        opacity: 1,
                        delay: 0.6,
                        ease:Power2.easeOut}
                );

                TweenMax.to(
                    $BTN_04, 1,
                    {bezier:[{x:-50, y:-600}, {x:0, y:0}],
                        scale:1,
                        rotation:0,
                        opacity: 1,
                        delay: 0.8,
                        ease:Power2.easeOut}
                );


                TweenMax.to(
                    $BTN_05, 1.5,
                    {bezier:[{x:34, y:127}, {x:0, y:0}],
                        rotation:0,
                        opacity: 1,
                        delay: 0.9,
                        scale:1,
                        ease:Power2.easeOut}
                );

                TweenMax.to(
                    $BTN_06, 1,
                    {bezier:[{x:280, y:-160}, {x:0, y:0}],
                        scale:1,
                        rotation:0,
                        opacity: 1,
                        delay: 0.5,
                        ease:Power2.easeOut}
                );

            TweenMax.to(
                $BTN_07, 1.7,
                {bezier:[{x:50, y:127}, {x:0, y:0}],
                    rotation:0,
                    opacity: 1,
                    delay: 1.1,
                    scale:1,
                    ease:Power2.easeOut}
            );




        };


        function openMenuAttack() {
            $('.freddie_attack_dragon_menu_container').addClass('opened');
            var item = $('.freddie_attack_dragon_menu');
            TweenMax.to(item, 0.4, {
                left: 0,
                opacity: 1
            })

            $('body').addClass('menu_opened');
        }

        function closeMenuAttack() {
            $('.freddie_attack_dragon_menu_container').removeClass('opened');
            var item = $('.freddie_attack_dragon_menu');
            TweenMax.to(item, 0.4, {
                left: "-100%",
                opacity: 0,
                delay: 1,
            })

            setTimeout(function () {
                $('body').removeClass('menu_opened');
            },800)

        }

        $('.freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li').on("click", function () {
            var pageLink = $(this).find('a').attr('href');
            window.location.href = pageLink;
        })

        $('.freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li').each(function () {
            $('<div class="bg_color"></div>').appendTo($(this))
        })



        $(".freddie_attack_dragon_menu .et_pb_fullwidth_menu .fullwidth-menu-nav ul li").hover(

            function(){
                var t2Attack = new TimelineLite;
                TweenMax.to(
                    $(this).find('.bg_color'), 1.5,
                    {scale:1.1,
                        opacity:1,
                        ease: Elastic.easeOut}
                );
                t2Attack.to('.bg_color', 40, {
                    rotation:"360",
                    repeat: -1,
                    ease: Linear.easeNone
                });

            },
            function(){
                TweenMax.to(
                    $(this).find('.bg_color'),1.5,
                    {scale:1,
                        opacity:0,
                        ease: Elastic.easeOut}
                );
            }
            )




        $('.freddie_attack_dragon_menu_container .freddie_menu_icon').on('click', function () {
            if (!$('.freddie_attack_dragon_menu_container').hasClass('opened')) {
                openMenuAttack();
                despliega_menu();
            } else if ($('.freddie_attack_dragon_menu_container').hasClass('opened')) {
                closeMenuAttack();
                close_despliega_menu();
            }
        });
    },freedieMenuAttackDragonTimeOut)

})(jQuery);