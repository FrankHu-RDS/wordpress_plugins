(function ($) {
    // body:not(.et-fb) .diana_overlays_popup6

  //  console.log('%% '+ ddp_php_vars.ddp_pop_scroll_per);

    $('body:not(.et-fb) .diana_overlays_popup6, body:not(.et-fb) .diana_overlays_popup8, body:not(.et-fb) .diana_overlays_popup7, body:not(.et-fb) .diana_overlays_popup5, body:not(.et-fb) .ddp_pop_up, body:not(.et-fb) .diana_overlays_popup4, body:not(.et-fb) .diana_overlays_popup3, body:not(.et-fb) .diana_overlays_popup2, body:not(.et-fb) [class*=ragnar_popups_]').insertAfter('#page-container > :last-child');

    function ddp_show_pop_up() {


        if ($.cookie('ddp_pop_up_cookie') !== 'ddpPopUpCookie') {


            if(ddp_php_vars.ddp_pop_template.indexOf('custom') !== -1) { // custom

                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .ddp_pop_up').show('slow');
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_1') { // diana 6
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup6').show('slow');
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_2') { // diana 8
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup8').show('slow');
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_3') { // diana 7
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup7').show('slow');
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_4') { // diana 5
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeIn(300).addClass('opened');
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_5') { // diana 4
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeIn(200).addClass('opened');
                $('.diana_overlays_popup4 .et_pb_search input.et_pb_s').focus();
            }
            if(ddp_php_vars.ddp_pop_template === 'diana_6') { // diana 3
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .et_pb_section:not(.diana_overlays_popup3)').css('transform', 'scale3d(0.7,0.7,1)');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeIn(200).addClass('opened');
                $('.diana_overlays_popup3 .et_pb_search input.et_pb_s').focus();
            }

            if(ddp_php_vars.ddp_pop_template === 'diana_7') { // diana 2
                for (var i = 1; i < 18 ; i++) {
                    if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                        $('body:not(.et-fb) .ragnar_popups_'+i).hide('slow').removeClass('opened_popup');
                    }
                }
                $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                $('body:not(.et-fb) .diana_overlays_popup2').fadeIn(200).addClass('opened');
            }

            for (var i = 1; i < 18 ; i++) {
                if(ddp_php_vars.ddp_pop_template === 'ragnar_'+i) { // ragnar
                   // console.log('RAGNAR POP_UP');
                    $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                    $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                    $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                    $('body:not(.et-fb) .ddpdm_pop_up').hide('slow');
                    $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                    $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                    $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                    $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
                    $('body:not(.et-fb) .ragnar_popups_'+i).insertAfter('#page-container > :last-child');
                    $('body:not(.et-fb) .ragnar_popups_'+i).css("display", "flex").hide().fadeIn().addClass('opened_popup');
                }
            }
        }

        setTimeout(function () {

        $('body:not(.et-fb) .diana_overlays_popup6 a.close_icon, \
            body:not(.et-fb) .diana_overlays_popup8 a.close_icon, \
            body:not(.et-fb) .diana_overlays_popup7 a.close_icon, \
            body:not(.et-fb) .diana_overlays_popup5 a.close_icon, \
            body:not(.et-fb) .ddp_pop_up a.close_icon, \
            body:not(.et-fb) .diana_overlays_popup4 a.close_icon,\
            body:not(.et-fb) .diana_overlays_popup3 a.close_icon,\
            body:not(.et-fb) .diana_overlays_popup2 a.close_icon').on('click', function () {
                //console.log('click on close');
                if ($.cookie('ddp_pop_up_cookie') !== 'ddpPopUpCookie') {
                    $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
                        $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
                        $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
                        $('body:not(.et-fb) .ddp_pop_up').hide('slow');
                        $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
                        $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
                        $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
                        $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');

                        $.cookie('ddp_pop_up_cookie', 'ddpPopUpCookie', {
                            expires: ddp_php_vars.ddp_pop_days,
                            path: '/'
                        });
                }
            });
        }, 300);
    }

    // on page load with a delay

    if(ddp_php_vars.ddp_pop_show_load === '1') {
        //console.log('test');
        setTimeout(function () {
            ddp_show_pop_up();
        }, ddp_php_vars.ddp_pop_delay * 1000);
    }

    // if(ddp_php_vars.ddp_pop_show_leave !== '1' && ddp_php_vars.ddp_pop_show_scroll !== '1') {

    //     ddp_show_pop_up();
    // }

    if (ddp_php_vars.ddp_pop_show_leave === '1') {
        $('html').mouseleave(function () {
            //console.log('mouse has left the building!');
            ddp_show_pop_up();

        });
    }

      function ddp_on_scroll() {
        var pctScrolled = 0;
        var winheight = $(window).height()
        var docheight = $(document).height()
        var scrollTop = $(window).scrollTop()
        var trackLength = docheight - winheight
        var pctScrolled = Math.floor(scrollTop / trackLength * 100) // gets percentage scrolled (ie: 80 NaN if tracklength === 0)
        // console.log(pctScrolled + '% scrolled')
        // console.log(ddp_php_vars.ddp_pop_scroll_per)

        if (pctScrolled >= ddp_php_vars.ddp_pop_scroll_per) {
           ddp_show_pop_up();
        }
    }

    if (ddp_php_vars.ddp_pop_show_scroll === '1') {

    $(window).on("scroll", function () {
            ddp_on_scroll();

        });
    }


     //Triggers on click

    $('body:not(.et-fb) .ddp_pop_up_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .ddp_pop_up').show('slow');
    })

    $('body:not(.et-fb) .popup_contact_form_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup6').show('slow');
    })

    $('body:not(.et-fb) .popup_pricing_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup8').show('slow');
    })

     $('body:not(.et-fb) .popup_portfolio_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup7').show('slow');
    })

      $('body:not(.et-fb) .popup_striking_search_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup5').fadeIn(300).addClass('opened');
    })


    //console.log('test');
    $('body:not(.et-fb) .popup_prominent_search_trigger').on('click', function (e) {
        e.preventDefault();

        $('body:not(.et-fb) .diana_overlays_popup4').fadeIn(200).addClass('opened');
        $('.diana_overlays_popup4 .et_pb_search input.et_pb_s').focus();
    })

    $('body:not(.et-fb) .popup_special_search_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .et_pb_section:not(.diana_overlays_popup3)').css('transform', 'scale3d(0.7,0.7,1)');
        $('body:not(.et-fb) .diana_overlays_popup3').fadeIn(200).addClass('opened');
        $('.diana_overlays_popup3 .et_pb_search input.et_pb_s').focus();
    })

     $('body:not(.et-fb) .popup_salient_search_trigger').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup2').fadeIn(200).addClass('opened');
    })



    //////////////////////

    $('.ddp_pop_up .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .ddp_pop_up').hide('slow');
    })

     $('.diana_overlays_popup6 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup6').hide('slow');
    })

     $('.diana_overlays_popup8 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup8').hide('slow');
    })

    $('.diana_overlays_popup7 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup7').hide('slow');
    })

     $('.diana_overlays_popup5 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup5').fadeOut(300).removeClass('opened');
    })

    $('.diana_overlays_popup7 .et_pb_column .et_pb_portfolio_item').on('click', function (e) {
       var portfolioLink = $(this).find('h2.et_pb_module_header a').attr('href');
       window.location.href = portfolioLink;
    })

    var timeOutPt = 0;

    if ($('body').hasClass('et-fb')) {

        var timeOutPt = 8000;
    }
    setTimeout(function () {
        $('.diana_overlays_popup8 .et_pb_column .et_pb_pricing .et_pb_pricing_table ').each(function () {
            $(this).find('.et_pb_pricing_content_top').insertBefore($(this).find('.et_pb_best_value'));
        })
    },timeOutPt)

        //Diana Popup 4 *********************************


    $('.diana_overlays_popup4 .et_pb_search input.et_pb_s').on("change paste keyup", function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup4 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }else{
            $('.diana_overlays_popup4 .et_pb_search label.screen-reader-text').css("cssText", "display: none !important");
        }
    });


    $('.diana_overlays_popup4 .et_pb_search input.et_pb_s').blur(function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup4 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }
    })

    $('.diana_overlays_popup4 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup4').fadeOut(200).removeClass('opened');
    })


    var timeOutSearch4 = 200;

    if ($('body').hasClass('et-fb')) {
        var timeOutSearch4 = 10000;
    }

    setTimeout(function () {
        $('.diana_overlays_popup4 .et_pb_search input.et_pb_searchsubmit').attr('value', 'T');
        var inputPlace = $('.diana_overlays_popup4 .et_pb_search input.et_pb_s').attr('placeholder');
        $('.diana_overlays_popup4 .et_pb_search label.screen-reader-text').text(inputPlace);
    },timeOutSearch4)

    setInterval(function () {
        if($("body.et-fb #et-fb-app-frame").contents().find(".diana_overlays_popup4 .et_pb_search input.et_pb_searchsubmit").val() !== 'T'){

            $("body.et-fb #et-fb-app-frame").contents().find(".diana_overlays_popup4 .et_pb_search input.et_pb_searchsubmit").val('T');
        }

    },1)



    //Diana Popup 3 *********************************



    $('.diana_overlays_popup3 .et_pb_search input.et_pb_s').on("change paste keyup", function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup3 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }else{
            $('.diana_overlays_popup3 .et_pb_search label.screen-reader-text').css("cssText", "display: none !important");
        }
    });


    $('.diana_overlays_popup3 .et_pb_search input.et_pb_s').blur(function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup3 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }
    })

    $('.diana_overlays_popup3 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
        $('body:not(.et-fb) .et_pb_section:not(.diana_overlays_popup3)').css('transform', 'scale(1)');
    })


    $(document).on('keyup',function(evt) {
        if (evt.keyCode === 27 && $('body:not(.et-fb) .diana_overlays_popup3').length > 0) {
            $('body:not(.et-fb) .diana_overlays_popup3').fadeOut(200).removeClass('opened');
            $('body:not(.et-fb) .et_pb_section:not(.diana_overlays_popup3)').css('transform', 'scale3d(1,1,1)');
        }
    });

    if($('.diana_overlays_popup3').length > 0){
        $('body:not(.et-fb) .et_pb_section:not([class*="diana_overlays"])').css('transition', '0.5s')
    }


    var timeOutSearch3 = 200;

    if ($('body').hasClass('et-fb')) {
        var timeOutSearch3 = 10000;
    }

    setTimeout(function () {
        var input3Place = $('.diana_overlays_popup3 .et_pb_search input.et_pb_s').attr('placeholder');
        $('.diana_overlays_popup3 .et_pb_search label.screen-reader-text').text(input3Place);
    },timeOutSearch3)




    //Diana Popup 2 *********************************


    $('.diana_overlays_popup2 .et_pb_column .et_pb_button_module_wrapper .close_icon ').on('click', function (e) {
        e.preventDefault();
        $('body:not(.et-fb) .diana_overlays_popup2').fadeOut(200).removeClass('opened');
    })


    var timeOutSearch4 = 200;

    if ($('body').hasClass('et-fb')) {
        var timeOutSearch4 = 10000;
    }

    setTimeout(function () {
        $('.diana_overlays_popup2 .et_pb_search input.et_pb_searchsubmit').attr('value', 'U');
        var inputPlace = $('.diana_overlays_popup2 .et_pb_search input.et_pb_s').attr('placeholder');
        $('.diana_overlays_popup2 .et_pb_search label.screen-reader-text').text(inputPlace);
    },timeOutSearch4)

    setInterval(function () {
        if($("body.et-fb #et-fb-app-frame").contents().find(".diana_overlays_popup2 .et_pb_search input.et_pb_searchsubmit").val() !== 'U'){

            $("body.et-fb #et-fb-app-frame").contents().find(".diana_overlays_popup2 .et_pb_search input.et_pb_searchsubmit").val('U');
        }

    },1)


    $('.diana_overlays_popup2 .et_pb_search input.et_pb_s').on("change paste keyup", function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup2 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }else{
            $('.diana_overlays_popup2 .et_pb_search label.screen-reader-text').css("cssText", "display: none !important");
        }
    });


    $('.diana_overlays_popup2 .et_pb_search input.et_pb_s').blur(function () {
        if($(this).attr('value') === ""){
            $('.diana_overlays_popup2 .et_pb_search label.screen-reader-text').css("cssText", "display: block !important");
        }
    })




})(jQuery);
