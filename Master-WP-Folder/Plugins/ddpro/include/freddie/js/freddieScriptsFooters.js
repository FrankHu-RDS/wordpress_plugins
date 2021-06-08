(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieFootersTimeOut = 1000;

    if (isIE()) {
        freddieFootersTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieFootersTimeOut = 10000;
    }

    setTimeout(function () {

        if ($('.freddie_prowl_footer').length !== 0) {


            $('.freddie_prowl_footer .et_pb_button_module_wrapper .et_pb_button ').each(function () {
                $('<span class="button_circle"></span>').appendTo($(this));
                $('<span class="button_circle hover"></span>').appendTo($(this));
            })

            $('.freddie_prowl_footer .et_pb_row.row_first').each(function () {
                $(this).prepend('<div class="image_overlay"></div>');
            })

            function PageTransitionFooter() {
                var scrollTopSize = $(window).scrollTop();
                var documentHeight = $(window).height();
                $('.freddie_prowl_footer').each(function () {
                    var funContentTop = $(this).offset().top;
                    var funContentPadding = $(this).css('padding-top').replace('px', '');
                    var funContentHeight = $(this).outerHeight();

                    var elementTopSize = parseInt(funContentTop) + parseInt(funContentPadding);
                    var elementEndTopSize = funContentTop + (funContentHeight / 2);

                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= elementTopSize + 210 && scrollTopSize <= elementEndTopSize) {
                        $(this).addClass('visible');

                        var t1Testimonials = new TimelineLite;
                        t1Testimonials.to($(this).find('.image_overlay'), 0.7, {
                            width: "100%",
                            ease: Circ.easeOut
                        }, 0)
                            .to($(this).find('.image_overlay'), 0.7, {
                                height: 0,
                                ease: Circ.easeOut
                            }, 0.7)
                    }
                })
            }

            $(window).scroll(function () {

                PageTransitionFooter();

            })

            if ($('body').hasClass('os-host')) {
                var instance = OverlayScrollbars($("body"), {
                    callbacks: {
                        onScroll: function () {
                            PageTransitionFooter();
                        }
                    }
                });
            }

        }


        // Freddie Dear Friends Footer


        setTimeout(function () {
            if( $('.freddie_dear_friends_footer').length !== 0){
                $('.freddie_dear_friends_footer .et_pb_promo.explore_cta ').each(function () {
                    $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                    $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
                })


                var exploreBgImage = $('.freddie_dear_friends_footer .explore_cta').css('background-image');
                var sectionBgImage = $('.freddie_dear_friends_footer .et_parallax_bg.et_pb_parallax_css').css('background-image');
                $('.freddie_dear_friends_footer .explore_cta').css('background-image', 'none');

                $('.freddie_dear_friends_footer .explore_cta').hover(function () {
                    $('.freddie_dear_friends_footer .et_parallax_bg.et_pb_parallax_css').css('cssText', 'background-image: ' + exploreBgImage + ' !important');
                    $('.freddie_dear_friends_footer .explore_cta').addClass("hovered");
                }, function () {
                    $('.freddie_dear_friends_footer .et_parallax_bg.et_pb_parallax_css').css('cssText', 'background-image: ' + sectionBgImage + ' !important');
                    $('.freddie_dear_friends_footer .explore_cta').removeClass("hovered");
                });


                $('.freddie_dear_friends_footer .et_pb_subscribe .et_pb_button').each(function () {
                    $(this).prepend($('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><circle cx="17" cy="17" r="15.5" class="circle__progress"/> </svg>'))
                })


                TweenMax.set('.freddie_dear_friends_footer .et_pb_subscribe .et_pb_button .circle__progress', {drawSVG: '82%'});
                $('.freddie_dear_friends_footer .et_pb_subscribe .et_pb_button').hover(
                    function () {
                        var thisTl = this;
                        thisTl.tl = new TimelineLite();
                        thisTl.tl
                            .to($(this).find(".circle__progress"), 0.5, {
                                drawSVG: "100%",
                                ease: Power3.easeInOut
                            }, 0)


                        thisTl.tl.play();
                    }, function () {
                        var thisTl = this;
                        thisTl.tl.reverse();
                    }
                )


                if ($(".freddie_dear_friends_footer #circle_text .et_pb_text_inner p").length !== 0) {
                    var text = $(".freddie_dear_friends_footer #circle_text .et_pb_text_inner p").text();
                    $(".freddie_dear_friends_footer #circle_text .et_pb_text_inner").html(text);
                }

                var split = new SplitText(".freddie_dear_friends_footer #circle_text .et_pb_text_inner", {
                    type: "chars",
                    charsClass: "char char++",
                    position: "absolute"
                });
                var childs = $(".freddie_dear_friends_footer .char");

                for (var i = 0; i < childs.length; i++) {
                    childs[i].style.display = "inline";
                    childs[i].style.width = "100%";
                    childs[i].style.top = 0;
                    childs[i].style.left = 0;
                }


                var t2 = new TimelineLite;
                var chars = split.chars;
                var inner = $(".freddie_dear_friends_footer #circle_text");

                TweenLite.set(".freddie_dear_friends_footer #circle_text .et_pb_text_inner", {perspective: 400});


                var itemsLength = childs.length;
                var rotateSize = 350 / itemsLength;


                for (var i = 1; i <= itemsLength; i++) {
                    $(".freddie_dear_friends_footer #circle_text .et_pb_text_inner .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                }


                t2.to(inner, 40, {
                    rotation:"360",
                    repeat: -1,
                    ease: Linear.easeNone
                });
            }



            function PageTransitionFriendsFooter() {
                var scrollTopSize = $(window).scrollTop();
                var documentHeight = $(window).height();
                var items = $('.freddie_dear_friends_footer .left_menu .et_pb_text ul li').toArray();


                if ($('.freddie_dear_friends_footer').length !== 0) {
                    $('.freddie_dear_friends_footer').each(function () {

                        var tansitionSectionTop = $(this).offset().top;
                        var tansitionSectionPadding = $(this).css('padding-top').replace('px', '');
                        var tansitionSectionHeight = $(this).outerHeight();

                        var tansitionSectionTopSize = parseInt(tansitionSectionTop) + parseInt(tansitionSectionPadding);
                        var tansitionSectionEndTopSize = tansitionSectionTop + (tansitionSectionHeight / 2);


                        if (parseInt(scrollTopSize) + parseInt(documentHeight / 2) >= tansitionSectionTopSize && scrollTopSize <= tansitionSectionEndTopSize) {
                            if(!$(this).hasClass('visible')){
                                $(this).addClass('visible');
                                setTimeout(function () {
                                    TweenMax.staggerTo(items, 0.3, {
                                        marginLeft: "0",
                                        opacity: 1
                                    }, 0.1);
                                }, 1000)


                                var thisTl = this;
                                thisTl.tl = new TimelineLite();
                                thisTl.tl
                                    .to($(this).find(".left_menu"), 1.4, {
                                        left: 0,
                                        ease: Power3.easeInOut
                                    }, 0)
                                    .to($(this).find(".et_pb_promo.animate_cta"), 1, {
                                        opacity: 1,
                                        ease: Power3.easeInOut
                                    }, 0)


                                thisTl.tl.play();
                            }

                        } else {
                            if($(this).hasClass('visible')){
                                $(this).removeClass('visible');

                                TweenMax.staggerTo(items, 0.3, {
                                    marginLeft: "-50px",
                                    opacity: 0
                                }, 0.2);


                                var thisTl = this;
                                thisTl.tl = new TimelineLite();
                                thisTl.tl
                                    .to($(this).find(".left_menu"), 1.4, {
                                        left: -317,
                                        ease: Power3.easeInOut
                                    }, 0)
                                    .to($(this).find(".et_pb_promo.animate_cta"), 1, {
                                        opacity: 0,
                                        ease: Power3.easeInOut
                                    }, 0)

                                thisTl.tl.play();
                            }

                        }
                    })

                }
            }


            PageTransitionFriendsFooter()

            $(window).scroll(function () {
                PageTransitionFriendsFooter();
            })


            if ($('body').hasClass('os-host')) {
                var instanceFooter = OverlayScrollbars($("body"), {
                    callbacks: {
                        onScroll: function () {
                            PageTransitionFriendsFooter();
                        }
                    }
                });
            }




if($('.freddie_days_of_our_lifes_footer').length !== 0){
      if($(".freddie_days_of_our_lifes_footer .circle_text_promo").length !== 0){

            $(".freddie_days_of_our_lifes_footer .circle_text_promo .et_pb_promo_description").each(function () {
                if ($(this).find('p').length !== 0) {
                    $(this).find('p').addClass('circle_text');
                } else {
                    $(this).contents().filter(function () {
                        return this.nodeType === 3;
                    }).wrap("<div class='circle_text'></div>");
                    $(this).find('.circle_text:nth-child(1)').remove();
                }


                var paragraphText = $(this).find('.circle_text').text();

                paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                $(this).find('.circle_text').html(paragraphText);
            })

            var split = new SplitText(".freddie_days_of_our_lifes_footer .circle_text_promo .et_pb_promo_description .circle_text", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childs = $(".freddie_days_of_our_lifes_footer .char");

            for (var i = 0; i < childs.length; i++) {
                childs[i].style.display = "inline";
                childs[i].style.width = "100%";
                childs[i].style.top = 0;
                childs[i].style.left = 0;
            }

            var t2 = new TimelineLite;
            var chars = split.chars;
            var inner = $(".freddie_days_of_our_lifes_footer .circle_text_promo .et_pb_promo_description .circle_text");

            TweenLite.set(".freddie_days_of_our_lifes_footer .circle_text_promo .et_pb_promo_description .circle_text", {perspective: 400});

            var itemsLength = childs.length;
            var rotateSize = 350 / itemsLength;

            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_days_of_our_lifes_footer .circle_text_promo .et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2.to(inner, 30, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            }, 0);




          setInterval(function () {
              $("body.et-tb .freddie_days_of_our_lifes_footer .circle_text_promo").each(function () {

                  var thisPromo = $(this)
                  if (thisPromo.find('p').length !== 0) {
                      thisPromo.find('p').addClass('circle_text');
                  } else {
                      thisPromo.contents().filter(function () {
                          return this.nodeType === 3;
                      }).wrap("<div class='circle_text'></div>");
                      thisPromo.find('.circle_text:nth-child(1)').remove();
                  }


                  var paragraphText = thisPromo.find('.circle_text').text();

                  paragraphText = paragraphText.replace(/ /g, '&nbsp;');

                  thisPromo.find('.circle_text').html(paragraphText);

                  var split = new SplitText(thisPromo.find(".circle_text"), {
                      type: "chars",
                      charsClass: "char char++",
                      position: "absolute"
                  });

                  var childs = thisPromo.find(".char");

                  for (var i = 0; i < childs.length; i++) {
                      childs[i].style.display = "inline";
                      childs[i].style.width = "100%";
                      childs[i].style.top = 0;
                      childs[i].style.left = 0;
                  }

                  var t2 = new TimelineLite;
                  var chars = split.chars;
                  var inner = thisPromo.find(".et_pb_promo_description .circle_text");

                  TweenLite.set(thisPromo.find(".et_pb_promo_description .circle_text"), {perspective: 400});

                  var itemsLength = childs.length;
                  var rotateSize = 350 / itemsLength;

                  for (var i = 1; i <= itemsLength; i++) {
                      thisPromo.find(".et_pb_promo_description .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
                  }
              })
          },20)
        }
    }
}, 1500)




        if($('.freddie_we_created_footer').length !== 0){
            $('.freddie_we_created_footer').prepend($('<svg class="module__wave" viewBox="0 0 1000 162"> <path id="end" d="M 1000 20.1 V 162 H 0 V 22 c 88 178.5 375.3 -35 440.6 40.8 C 634.7 308.2 669.9 6.6 1000 36.1 Z"></path> <path id="start2" d="M1000,162v1H0v-1h502.6H1000z"></path><path id="start" d="M1000,162v1H0v-1h502.6H1000z"></path> </svg>'));

            const wave = $(".module__wave path");


            var windowHeight = $(window).height();
            var elementTop = $('.freddie_we_created_footer').position().top - windowHeight/2;


            $(window).scroll(function () {
                elementTop = $('.freddie_we_created_footer').position().top - windowHeight/2;
                var scrollTopSize = $(window).scrollTop();


                if(scrollTopSize >= elementTop){

                    TweenLite.to(".freddie_we_created_footer .module__wave #start", 0.7, {
                        morphSVG: ".freddie_we_created_footer #end",
                        ease: Power1.easeOut
                    });
                }else{
                    TweenLite.to(".freddie_we_created_footer .module__wave #start", 0.7, {morphSVG:".freddie_we_created_footer #start2",  ease: Power1.easeOut});
                }

            });


            if ($('body').hasClass('os-host')) {
                setTimeout(function () {
                    var instanceFooter = OverlayScrollbars($("body"), {
                        callbacks: {
                            onScroll: function () {
                                elementTop = $('.freddie_we_created_footer').position().top - windowHeight/2;
                                var scrollTopSize = $('.os-viewport').scrollTop();
                                if(scrollTopSize >= elementTop){
                                    TweenLite.to(".module__wave #start", 0.7, {
                                        morphSVG: "#end",
                                        ease: Power1.easeOut
                                    });
                                }else{
                                    TweenLite.to(".module__wave #start", 0.7, {morphSVG:"#start2",  ease: Power1.easeOut});
                                }
                            }
                        }
                    });
                },4000)

            }
        }

        if($('.freddie_wavy_footer').length !== 0){
            $('.freddie_wavy_footer').prepend($('<svg class="module__wave" viewBox="0 0 1000 162"> <path id="end" d="M 1000 20.1 V 162 H 0 V 22 c 88 178.5 375.3 -35 440.6 40.8 C 634.7 308.2 669.9 6.6 1000 36.1 Z"></path> <path id="start2" d="M1000,162v1H0v-1h502.6H1000z"></path><path id="start" d="M1000,162v1H0v-1h502.6H1000z"></path> </svg>'));

            const wave = $(".module__wave path");


            var windowHeight = $(window).height();
            var elementTop = $('.freddie_wavy_footer').position().top - windowHeight;


            $(window).scroll(function () {
                elementTop = $('.freddie_wavy_footer').position().top - windowHeight;
                var scrollTopSize = $(window).scrollTop();


                if(scrollTopSize >= elementTop){
                    TweenLite.to(".freddie_wavy_footer .module__wave #start", 0.7, {
                        morphSVG: ".freddie_wavy_footer #end",
                        ease: Power1.easeOut
                    });
                }else{
                    TweenLite.to(".freddie_wavy_footer .module__wave #start", 0.7, {morphSVG:".freddie_wavy_footer #start2",  ease: Power1.easeOut});
                }

            });


            if ($('body').hasClass('os-host')) {
                setTimeout(function () {
                    var instanceFooter = OverlayScrollbars($("body"), {
                        callbacks: {
                            onScroll: function () {
                                elementTop = $('.freddie_wavy_footer').position().top - windowHeight;
                                var scrollTopSize = $('.os-viewport').scrollTop();
                                if(scrollTopSize >= elementTop){
                                    TweenLite.to(".module__wave #start", 0.7, {
                                        morphSVG: "#end",
                                        ease: Power1.easeOut
                                    });
                                }else{
                                    TweenLite.to(".module__wave #start", 0.7, {morphSVG:"#start2",  ease: Power1.easeOut});
                                }
                            }
                        }
                    });
                },6000)

            }
        }



    }, freddieFootersTimeOut);


})(jQuery);