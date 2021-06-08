(function ($) {

    var freedieSongSliderTimeOut = 500;

    if ($('body').hasClass('et-fb')) {
        freedieSongSliderTimeOut = 10000;
    }

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    if (isIE()) {
        freedieSongSliderTimeOut = 14000;
    }

    setTimeout(function () {
        if($('body .freddie_song_slider').length !== 0){
            var audioItemsLenght = $('.freddie_song_slider .et_pb_audio_module').length
            $('<div class="slide_buttons_and_number"><span>01</span><a class="next_button"></a><a class="prev_button"></a></div>').appendTo('.freddie_song_slider .et_pb_column_4_4 ')

            $('.freddie_song_slider .et_pb_audio_module:first-child').addClass('active_audio');
            $('.freddie_song_slider .et_pb_audio_module.et-first-child').addClass('active_audio');


            $('.freddie_song_slider .slide_buttons_and_number a').on('click', function (e) {
                e.preventDefault();

                if($(this).closest('.et_pb_column ').find('.active_audio').find('.mejs-button.mejs-playpause-button').hasClass('mejs-pause')){
                    $(this).closest('.et_pb_column ').find('.active_audio').find('.mejs-button.mejs-playpause-button')[0].click()
                }

            })


            $('.freddie_song_slider .slide_buttons_and_number a.next_button').on('click', function (e) {
                e.preventDefault();
                if($('.freddie_song_slider .et_pb_audio_module.active_audio').nextAll('.et_pb_audio_module').length > 0){
                    $('.freddie_song_slider .et_pb_audio_module.active_audio').removeClass('active_audio').next().addClass('active_audio')
                }else{
                    $('.freddie_song_slider .et_pb_audio_module.active_audio').removeClass('active_audio');
                    $('.freddie_song_slider .et_pb_audio_module:first-child').addClass('active_audio');
                    $('.freddie_song_slider .et_pb_audio_module.et-first-child').addClass('active_audio');
                }

            })

            $('.freddie_song_slider .slide_buttons_and_number a.prev_button').on('click', function (e) {
                e.preventDefault();
                if($('.freddie_song_slider .et_pb_audio_module.active_audio').prevAll('.et_pb_audio_module').length > 0){
                    $('.freddie_song_slider .et_pb_audio_module.active_audio').removeClass('active_audio').prev().addClass('active_audio')
                }else{
                    $('.freddie_song_slider .et_pb_audio_module.active_audio').removeClass('active_audio');
                    $('.freddie_song_slider .et_pb_audio_module:nth-child('+ audioItemsLenght +')').addClass('active_audio');
                    $('.freddie_song_slider .et_pb_audio_module.et-last-child').addClass('active_audio');

                }

            })

            var activeItemVb;
            activeItemVb = $('.freddie_song_slider .et_pb_audio_module.active_audio').prevAll().length + 1;
            $('.freddie_song_slider .slide_buttons_and_number a').on('click', function (e) {
                e.preventDefault();

                var prevElemLengts = $('.freddie_song_slider .et_pb_audio_module.active_audio').prevAll('.et_pb_audio_module').length + 1;
                if(prevElemLengts < 10){
                    prevElemLengts = "0" + prevElemLengts;
                }
                $('.freddie_song_slider .slide_buttons_and_number span').text(prevElemLengts);


                activeItemVb = $('.freddie_song_slider .et_pb_audio_module.active_audio').prevAll().length + 1;
            })



            $('body.et-fb .freddie_song_slider').hover(
                function () {
                    setTimeout(function () {
                        $('.freddie_song_slider .et_pb_audio_module:nth-child('+ activeItemVb +')').addClass('active_audio');
                    },50)
            })


            $('body.et-fb .freddie_song_slider .et_pb_audio_module').hover(
                function () {
                    setTimeout(function () {
                        $('.freddie_song_slider .et_pb_audio_module:nth-child('+ activeItemVb +')').addClass('active_audio');
                    },50)
            })


            $('<svg xmlns="http://www.w3.org/2000/svg" class="bg_svg svg1" version="1.0" width="1900.000000pt" height="203.000000pt" viewBox="0 0 1900.000000 203.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,203.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path class="start" d="M15371 1525 c-205 -46 -409 -150 -933 -476 -157 -98 -342 -210 -410 -248 -68 -38 -138 -79 -156 -90 -42 -26 -282 -134 -397 -178 -364 -139 -773 -196 -1172 -162 -352 29 -696 114 -1131 278 -467 176 -744 228 -1157 218 -278 -7 -395 -25 -748 -114 -165 -41 -559 -176 -682 -233 -40 -19 -175 -70 -515 -196 -472 -175 -845 -243 -1174 -215 -271 23 -485 86 -756 224 -511 261 -648 328 -785 386 -300 128 -578 214 -840 261 -347 63 -697 45 -1055 -54 -69 -19 -150 -43 -180 -54 -30 -11 -71 -25 -90 -32 -106 -37 -278 -104 -295 -115 -11 -6 -38 -18 -60 -25 -21 -7 -150 -62 -285 -122 -369 -165 -593 -234 -905 -278 -451 -65 -1001 -50 -1515 40 -138 24 -130 23 -130 6 0 -15 29 -21 255 -55 226 -34 433 -52 680 -58 494 -12 916 46 1291 178 74 26 452 188 639 274 28 13 106 45 175 70 69 26 144 56 167 66 23 11 48 19 56 19 8 0 40 9 73 20 32 12 122 36 199 55 356 87 647 95 1010 29 163 -29 184 -34 325 -78 339 -104 644 -238 1140 -502 405 -214 661 -286 1025 -287 257 -1 459 32 764 124 144 43 474 164 681 249 147 61 504 188 710 254 279 88 591 136 893 136 355 0 621 -49 976 -181 660 -245 1008 -321 1471 -322 446 0 817 89 1240 295 208 102 335 174 630 358 391 243 485 298 661 385 214 105 292 127 469 133 207 6 361 -30 595 -142 154 -74 186 -92 362 -213 166 -114 337 -249 608 -479 440 -374 626 -512 796 -593 133 -64 189 -75 379 -76 237 0 378 33 608 145 89 44 122 65 122 78 0 16 -19 9 -115 -40 -264 -135 -552 -187 -795 -144 -188 34 -381 154 -765 476 -114 96 -271 228 -348 293 -499 419 -827 615 -1175 704 -84 21 -351 26 -431 8z"/><path class="end" xmlns="http://www.w3.org/2000/svg" d="M530 1526 c-158 -28 -287 -73 -442 -153 -59 -30 -88 -51 -88 -62 0 -14 22 -6 115 41 227 116 434 165 659 155 147 -6 213 -21 320 -72 162 -77 321 -194 741 -550 627 -530 907 -716 1235 -823 163 -52 194 -57 375 -56 156 0 177 2 260 28 179 55 396 171 857 457 352 219 492 300 673 389 574 281 1110 359 1733 254 278 -46 521 -115 860 -243 434 -164 717 -221 1087 -221 469 1 825 86 1585 382 728 283 962 351 1315 380 358 29 685 -42 1045 -225 511 -261 648 -328 785 -386 536 -228 997 -324 1401 -292 404 31 719 128 1401 432 372 166 596 235 908 279 451 65 1001 50 1515 -40 138 -24 130 -23 130 -6 0 9 -21 18 -62 25 -751 130 -1444 119 -1985 -33 -153 -43 -258 -84 -558 -216 -464 -204 -696 -290 -949 -350 -575 -137 -1098 -68 -1814 239 -163 70 -363 169 -642 317 -402 213 -660 286 -1020 288 -247 1 -448 -31 -734 -114 -169 -49 -302 -98 -726 -263 -784 -305 -1123 -387 -1593 -387 -355 0 -621 49 -976 181 -660 245 -1008 321 -1471 322 -443 0 -808 -86 -1235 -292 -197 -95 -326 -169 -662 -378 -357 -222 -462 -283 -645 -373 -203 -100 -282 -122 -458 -128 -215 -7 -383 36 -630 159 -249 125 -504 309 -935 675 -536 455 -740 596 -940 649 -82 22 -336 29 -435 11z"/> </g> </svg>').appendTo($('body .freddie_song_slider'))
            $('<svg xmlns="http://www.w3.org/2000/svg" class="bg_svg svg2" viewBox="0 0 1900.000000 108.000000"> <g transform="translate(0.000000,108.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path class="start" d="M16442 1069 c-141 -24 -299 -82 -647 -237 -350 -155 -572 -240 -840 -322 -719 -218 -1371 -281 -1940 -189 -345 56 -602 142 -1150 386 -148 66 -313 136 -365 156 -420 155 -756 153 -1251 -9 -244 -80 -525 -195 -1171 -482 -429 -191 -570 -239 -828 -279 -156 -24 -479 -24 -640 1 -356 54 -628 140 -1209 383 -581 243 -767 294 -1010 279 -152 -9 -297 -45 -666 -166 -433 -142 -624 -190 -890 -221 -139 -17 -496 -17 -640 -1 -254 29 -545 91 -805 172 -410 128 -728 196 -1100 237 -372 40 -973 15 -1268 -52 -12 -3 -22 -12 -22 -21 0 -10 6 -14 18 -10 101 30 437 66 687 73 524 14 1053 -62 1598 -231 725 -226 1258 -268 1839 -146 175 37 287 70 633 185 331 110 476 145 635 152 239 11 404 -37 1010 -290 571 -238 881 -333 1235 -378 126 -16 453 -16 565 0 126 18 301 59 416 96 55 18 294 119 530 223 926 410 1212 513 1542 557 361 48 594 -6 1182 -270 285 -129 445 -193 631 -253 376 -122 716 -170 1124 -159 397 10 772 72 1225 203 329 94 535 171 968 363 463 205 579 237 822 228 167 -6 271 -30 459 -103 121 -47 903 -439 1512 -758 197 -102 360 -186 363 -186 3 0 6 6 6 13 0 17 -397 227 -1281 676 -544 276 -696 339 -910 376 -91 16 -282 18 -367 4z"/><path class="end" xmlns="http://www.w3.org/2000/svg" d="M0 1067 c0 -7 78 -54 173 -104 632 -334 1517 -781 1652 -836 222 -91 381 -127 555 -127 226 0 361 41 825 248 350 155 572 240 840 322 719 218 1371 281 1940 189 345 -56 602 -142 1150 -386 149 -66 313 -136 365 -156 420 -155 756 -153 1251 9 244 80 525 195 1171 482 429 191 570 239 828 279 156 24 479 24 640 -1 356 -54 628 -140 1209 -383 581 -243 767 -294 1010 -279 152 9 297 45 666 166 433 142 624 190 890 221 139 17 496 17 640 1 254 -29 545 -91 805 -172 410 -128 728 -196 1100 -237 372 -40 973 -15 1268 52 12 3 22 12 22 21 0 10 -6 14 -17 10 -102 -30 -438 -66 -688 -73 -524 -14 -1053 62 -1598 231 -725 226 -1258 268 -1839 146 -175 -37 -287 -70 -633 -185 -331 -110 -476 -145 -635 -152 -239 -11 -404 37 -1010 290 -571 238 -881 333 -1235 378 -126 16 -453 16 -565 0 -126 -18 -301 -59 -416 -96 -55 -18 -294 -119 -530 -223 -926 -410 -1212 -513 -1542 -557 -361 -48 -594 6 -1182 270 -285 129 -445 193 -631 253 -376 122 -716 170 -1124 159 -397 -10 -772 -72 -1225 -203 -329 -94 -535 -171 -968 -363 -463 -205 -579 -237 -822 -228 -167 6 -271 30 -459 103 -121 47 -903 439 -1512 758 -197 102 -360 186 -363 186 -3 0 -6 -6 -6 -13z"/> </g> </svg>').appendTo($('body .freddie_song_slider'))
            $('<svg xmlns="http://www.w3.org/2000/svg" class="bg_svg svg3" version="1.0" width="1900.000000pt" height="185.000000pt" viewBox="0 0 1900.000000 185.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,185.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path class="start" d="M7102 1839 c-414 -30 -793 -170 -1357 -503 -358 -212 -593 -345 -723 -410 -619 -310 -1161 -426 -1853 -396 -625 27 -1174 128 -1764 325 -470 156 -919 365 -1304 606 -51 33 -95 59 -97 59 -2 0 -4 -6 -4 -14 0 -35 465 -299 770 -436 827 -373 1726 -570 2594 -571 409 0 692 39 1035 142 359 107 625 235 1231 592 459 271 664 374 922 462 248 85 456 119 723 118 205 0 343 -17 576 -69 488 -108 861 -258 1501 -605 286 -155 460 -243 588 -297 278 -116 519 -162 752 -141 250 21 436 86 759 263 457 252 885 389 1409 452 199 24 617 24 823 0 830 -96 1536 -415 2212 -996 340 -293 632 -413 1001 -412 622 2 1291 416 2012 1245 65 74 92 113 90 128 -2 16 -24 -5 -103 -98 -136 -161 -444 -473 -589 -597 -553 -473 -1065 -689 -1528 -646 -319 29 -564 145 -873 410 -319 274 -605 465 -937 624 -550 265 -1092 389 -1698 389 -357 0 -627 -33 -951 -117 -313 -82 -654 -222 -924 -379 -320 -187 -656 -271 -944 -238 -261 31 -488 117 -919 348 -562 302 -704 372 -962 475 -282 114 -638 216 -900 258 -116 18 -373 42 -430 38 -14 0 -76 -5 -138 -9z"/><path class="end" xmlns="http://www.w3.org/2000/svg" d="M16778 1839 c-318 -26 -579 -147 -883 -409 -676 -581 -1382 -900 -2212 -996 -206 -24 -624 -24 -823 0 -524 63 -952 200 -1409 452 -323 177 -509 242 -759 263 -233 21 -474 -25 -752 -141 -128 -54 -302 -142 -588 -297 -640 -347 -1013 -497 -1501 -605 -233 -52 -371 -69 -576 -69 -267 -1 -475 33 -723 118 -258 88 -463 191 -922 462 -606 357 -872 485 -1231 592 -343 103 -626 142 -1035 142 -868 -1 -1767 -198 -2594 -571 -305 -137 -770 -401 -770 -436 0 -8 2 -14 4 -14 2 0 46 26 97 59 168 105 307 181 522 286 284 139 483 221 782 320 590 197 1139 298 1764 325 692 30 1234 -86 1853 -396 130 -65 365 -198 723 -410 577 -340 940 -473 1380 -504 465 -33 1081 113 1713 404 138 63 271 132 694 359 431 231 658 317 919 348 288 33 624 -51 944 -238 434 -253 939 -418 1470 -479 205 -24 605 -24 810 0 469 54 878 172 1293 372 332 159 618 350 937 624 309 265 554 381 873 410 463 43 975 -173 1528 -646 145 -124 453 -436 589 -597 79 -93 101 -114 103 -98 8 51 -443 525 -719 757 -527 443 -1036 651 -1501 613z"/> </g> </svg>').appendTo($('body .freddie_song_slider'))

            var tl = new TimelineMax({delay:5, repeat:-1}),
                mySquare = $(".freddie_song_slider .svg1 .start");
                mySquare2 = $(".freddie_song_slider .svg2 .start");
                mySquare3 = $(".freddie_song_slider .svg3 .start");
            // tl.staggerFromTo(mySquare, 5, {drawSVG:"10%", ease:Linear.easeNone})
            TweenMax.to(mySquare, 0, {drawSVG:0});

            TweenMax.to(mySquare, 1.5, {drawSVG: "100%", delay:1,  yoyo:true});


            TweenMax.to(mySquare2, 0, {drawSVG:0});

            TweenMax.to(mySquare2, 1.5, {drawSVG: "100%", delay:1,  yoyo:true});


            TweenMax.to(mySquare3, 0, {drawSVG:0});

            TweenMax.to(mySquare3, 1.5, {drawSVG: "100%", delay:1,  yoyo:true});

            TweenMax.to($('.freddie_song_slider .et_pb_column_4_4'), 0.4, {opacity: 1, scale: 1, delay:2.5, ease: Back.easeOut.config(1.7),  yoyo:true});
            TweenMax.to($('.freddie_song_slider .slide_buttons_and_number'), 0.4, {opacity: 1, scale: 1, delay:2.7, ease: Back.easeOut.config(1.7),  yoyo:true});

            $('.freddie_song_slider .et_pb_audio_module').each(function () {
                $('<div class="top_play_button"></div>').insertBefore($(this).find('.et_pb_audio_cover_art'))
            })

            $('.freddie_song_slider .et_pb_audio_module .top_play_button').on('click', function () {
                $(this).parent('.et_pb_audio_module').find('.mejs-button.mejs-playpause-button')[0].click();
            })
            setTimeout(function () {
                $('.freddie_song_slider .et_pb_audio_module .et_pb_audio_module_content .mejs-container .mejs-inner .mejs-controls .mejs-button.mejs-playpause-button')
                $('.freddie_song_slider .et_pb_audio_module .mejs-button.mejs-playpause-button').on('click', function () {
                    if($(this).hasClass('mejs-play')){
                        $(this).closest('.mejs-inner').closest('.et_pb_audio_module_content ').parent().find('.top_play_button').addClass('played');

                        var thisTimeLine = this;

                        thisTimeLine.tl = new TimelineMax({delay:0, repeat:-1}),
                            mySquare = $(".freddie_song_slider .svg2 .start");
                        mySquare2 = $(".freddie_song_slider .svg1 .start");
                        mySquare3 = $(".freddie_song_slider .svg3 .start");


                        thisTimeLine.tl.to(mySquare, 2, {morphSVG:".freddie_song_slider .svg2 .end", ease:Linear.easeNone})
                            .to(mySquare, 2, {morphSVG:".freddie_song_slider .svg2 .start", ease:Linear.easeNone})


                        thisTimeLine.tl2 = new TimelineMax({delay:0, repeat:-1}),

                            thisTimeLine.tl2.to(mySquare2, 1.6, {morphSVG:".freddie_song_slider .svg1 .end", ease:Linear.easeNone})
                                .to(mySquare2,  1.6, {morphSVG:".freddie_song_slider .svg1 .start", ease:Linear.easeNone})

                        thisTimeLine.tl3 = new TimelineMax({delay:0, repeat:-1}),

                            thisTimeLine.tl3.to(mySquare3, 1.9, {morphSVG:".freddie_song_slider .svg3 .end", ease:Linear.easeNone})
                                .to(mySquare3,  1.9, {morphSVG:".freddie_song_slider .svg3 .start", ease:Linear.easeNone})
                    }else if($(this).hasClass('mejs-pause')){
                        $(this).closest('.mejs-container').closest('.et_pb_audio_module_content').parent().find('.top_play_button').removeClass('played');
                        var thisTimeLine = this;
                        thisTimeLine.tl.clear();
                        thisTimeLine.tl2.clear();
                        thisTimeLine.tl3.clear();
                        thisTimeLine.tl4 = new TimelineMax({delay:0, repeat:0}),
                            mySquare = $(".freddie_song_slider .svg2 .start");
                        mySquare2 = $(".freddie_song_slider .svg1 .start");
                        mySquare3 = $(".freddie_song_slider .svg3 .start");


                        thisTimeLine.tl4.to(mySquare, 0.5, {morphSVG:".freddie_song_slider .svg2 .start", ease:Linear.easeNone})


                        thisTimeLine.tl5 = new TimelineMax({delay:0, repeat:0}),

                            thisTimeLine.tl5.to(mySquare2, 0.5, {morphSVG:".freddie_song_slider .svg1 .start", ease:Linear.easeNone})

                        thisTimeLine.tl6 = new TimelineMax({delay:0, repeat:0}),

                            thisTimeLine.tl6.to(mySquare3, 0.5, {morphSVG:".freddie_song_slider .svg3 .start", ease:Linear.easeNone})
                    }
                })
            },2000)

        }
    }, freedieSongSliderTimeOut)

})(jQuery);