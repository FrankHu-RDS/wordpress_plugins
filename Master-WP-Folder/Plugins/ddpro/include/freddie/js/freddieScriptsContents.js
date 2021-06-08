(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieContentsTimeOut = 1000;

    if (isIE()) {
        freddieContentsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieContentsTimeOut = 10000;
    }

    setTimeout(function () {

        $('.freddie_body_langauge_content .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        })

        /*Freddie Doing All Right Content*/

        if ($(".freddie_doing_all_right_content #circle_text .et_pb_text_inner p").length !== 0) {
            var text = $(".freddie_doing_all_right_content #circle_text .et_pb_text_inner p").text();
            $(".freddie_doing_all_right_content #circle_text .et_pb_text_inner").html(text);

            var splitContent = new SplitText(".freddie_doing_all_right_content #circle_text .et_pb_text_inner", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childsContent = $(".freddie_doing_all_right_content .char");
            for (var i = 0; i < childsContent.length; i++) {
                childsContent[i].style.display = "inline";
                childsContent[i].style.width = "100%";
                childsContent[i].style.top = 0;
                childsContent[i].style.left = 0;
            }

            var t2Content = new TimelineLite;
            var charsContent = splitContent.chars;
            var inner = document.getElementById("circle_text");

            TweenLite.set(".freddie_doing_all_right_content #circle_text .et_pb_text_inner", {perspective: 400});


            var itemsLength = childsContent.length;
            var rotateSize = 350 / itemsLength;


            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_doing_all_right_content #circle_text .et_pb_text_inner .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2Content.to(inner, 40, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            });
        }

        $('.freddie_cool_cat_content .et_pb_promo ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
            $('<span class="button_circle hover"></span>').appendTo($(this).find('.et_pb_button_wrapper .et_pb_button'));
        })


        $('.freddie_fun_it_content .et_pb_blurb').each(function () {
            $(this).find('.et_pb_main_blurb_image').prepend('<div class="image_overlay"></div>');
        })

        $('.freddie_fun_it_content .et_pb_blurb').hover(
            function () {
                var thisTl = this;
                thisTl.tl = new TimelineLite();
                thisTl.tl
                    .to($(this).find("img"), 1.5, {
                        scale: 1.03,
                        rotationY: 5,
                        transformOrigin: "right",
                        ease: Linear.easeNone
                    }, 0)
                    .to($(this).find(".et_pb_main_blurb_image"), 0.8, {
                        rotationY: -8,
                        x: -3,
                        transformOrigin: "right",
                        ease: Circ.easeOut
                    }, 0)


                thisTl.tl.play();
            }, function () {
                var thisTl = this;
                thisTl.tl.reverse();
            }
        )


        $('.freddie_fun_it_content .et_pb_column_4_4 .et_pb_button_module_wrapper .et_pb_button ').each(function () {
            $('<span class="button_circle"></span>').appendTo($(this));
            $('<span class="button_circle hover"></span>').appendTo($(this));
        })


        if ($('.freddie_fun_it_content').length !== 0) {
            var splitFunContentH = new SplitText(".freddie_fun_it_content .et_pb_blurb_container h4", {
                type: "words,chars",
                charsClass: "char char++",
                position: "reletive"
            });

            if($('.freddie_fun_it_content .et_pb_blurb_description p').length !== 0){
                var splitFunContentP = new SplitText(".freddie_fun_it_content .et_pb_blurb_description p", {
                    type: "words,chars",
                    charsClass: "char char++",
                    position: "reletive"
                });
            }



        }

        function PageTransitionContents() {
            var scrollTopSize = $(window).scrollTop();
            if ($('body').hasClass('os-host')) {
                var scrollTopSize = $('.os-viewport').scrollTop();
            }

            var documentHeight = $(window).height();
            if ($('.freddie_fun_it_content').length !== 0) {

                $('.freddie_fun_it_content .et_pb_blurb').each(function () {

                    var funContentTop = $(this).offset().top;
                    // var funContentPadding = $(this).css('padding-top').replace('px', '');
                    var funContentHeight = $(this).outerHeight();
                    if ($('body').hasClass('os-host')) {
                        funContentTop = $('.freddie_fun_it_content').position().top;
                    }

                    var elementTopSize = funContentTop ;
                    var elementEndTopSize = funContentTop + (funContentHeight / 2);



                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= elementTopSize && scrollTopSize <= elementEndTopSize) {
                        $(this).addClass('visible');


                        var charsContentH = $(this).find('h4.et_pb_module_header .char').toArray();
                        var charsContentP = $(this).find('.et_pb_blurb_description .char').toArray();
                        var t1 = new TimelineLite;
                        var t12 = new TimelineLite;
                        var t13 = new TimelineLite;
                        var t14 = new TimelineLite;
                        t1.to($(this).find('.image_overlay'), 1.5, {
                            height: 0,
                            ease: Circ.easeOut
                        }, 0)
                        t12.to($(this), 1.5, {
                            opacity: 1,
                            x: 0,
                            y: 0,
                            ease: Circ.easeOut
                        }, 0)
                        t13.staggerTo(charsContentH, 1, {
                            x: 0,
                            y: 0,
                            opacity: 1,
                            ease: Circ.easeOut
                        }, .1)
                        t14.staggerTo(charsContentP, 0.6, {
                            x: 0,
                            y: 0,
                            opacity: 1,
                            ease: Circ.easeOut
                        }, .1);


                    }

                })
            }

        }



        $(window).scroll(function () {

            PageTransitionContents();

        })
        if ($('.freddie_fun_it_content').length !== 0) {
            setTimeout(function () {
                if ($('body').hasClass('os-host')) {
                    var instanceFunItContent = OverlayScrollbars($("body"), {
                        callbacks: {
                            onScroll: function () {
                                PageTransitionContents();
                            }
                        }
                    });
                }
            }, 5000)
        }


        // Freddie Innuendo content
        function ContentPageTransition() {
            var scrollTopSize = $(window).scrollTop();
            var documentHeight = $(window).height();

            if ($('.freddie_innuendo_content').length !== 0) {
                $('.freddie_innuendo_content').each(function () {
                    var tansitionSectionTop = $(this).offset().top;
                    var tansitionSectionPadding = $(this).css('padding-top').replace('px', '');
                    var tansitionSectionHeight = $(this).outerHeight();

                    var tansitionSectionTopSize = parseInt(tansitionSectionTop) + parseInt(tansitionSectionPadding);
                    var tansitionSectionEndTopSize = tansitionSectionTop;

                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= tansitionSectionTopSize + 500 && scrollTopSize <= tansitionSectionEndTopSize) {
                        $(this).find('.freddie_innuendo_content_bg_image').addClass('visible');
                        $('this').addClass('visible');
                    } else {
                        $(this).find('.freddie_innuendo_content_bg_image').removeClass('visible');
                        $(this).removeClass('visible');
                    }
                })

            }
        }


        ContentPageTransition()

        $(window).scroll(function () {

            ContentPageTransition();

        })


        if ($('body').hasClass('os-host')) {
            var instance = OverlayScrollbars($("body"), {
                callbacks: {
                    onScroll: function () {
                        ContentPageTransition();
                    }
                }
            });
        }


        if ($(".freddie_innuendo_content #circle_text .et_pb_text_inner p").length !== 0) {
            var text = $(".freddie_innuendo_content #circle_text .et_pb_text_inner p").text();
            $(".freddie_innuendo_content #circle_text .et_pb_text_inner").html(text);

            var splitContent = new SplitText(".freddie_innuendo_content #circle_text .et_pb_text_inner", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childsContent = $(".freddie_innuendo_content .char");
            for (var i = 0; i < childsContent.length; i++) {
                childsContent[i].style.display = "inline";
                childsContent[i].style.width = "100%";
                childsContent[i].style.top = 0;
                childsContent[i].style.left = 0;
            }

            var t2Content = new TimelineLite;
            var charsContent = splitContent.chars;
            var inner = document.getElementById("circle_text");

            TweenLite.set(".freddie_innuendo_content #circle_text .et_pb_text_inner", {perspective: 400});

            var itemsLength = childsContent.length;
            var rotateSize = 350 / itemsLength;


            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_innuendo_content #circle_text .et_pb_text_inner .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2Content.to(inner, 40, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            });
        }


        // Freddie Scandal Content

        if ($(".freddie_scandal_content #circle_text .et_pb_text_inner p").length !== 0) {
            var text = $(".freddie_scandal_content #circle_text .et_pb_text_inner p").text();
            $(".freddie_scandal_content #circle_text .et_pb_text_inner").html(text);

            var splitContent = new SplitText(".freddie_scandal_content #circle_text .et_pb_text_inner", {
                type: "chars",
                charsClass: "char char++",
                position: "absolute"
            });

            var childsContent = $(".freddie_scandal_content .char");
            for (var i = 0; i < childsContent.length; i++) {
                childsContent[i].style.display = "inline";
                childsContent[i].style.width = "100%";
                childsContent[i].style.top = 0;
                childsContent[i].style.left = 0;
            }

            var t2Content = new TimelineLite;
            var charsContent = splitContent.chars;
            var inner = $(".freddie_scandal_content #circle_text");

            TweenLite.set(".freddie_scandal_content #circle_text .et_pb_text_inner", {perspective: 400});

            var itemsLength = childsContent.length;
            var rotateSize = 350 / itemsLength;


            for (var i = 1; i <= itemsLength; i++) {
                $(".freddie_scandal_content #circle_text .et_pb_text_inner .char:nth-child(" + i + ")").css('transform', 'rotate(' + rotateSize * i + 'deg)')
            }

            t2Content.to(inner, 40, {
                rotation: "360",
                repeat: -1,
                ease: Linear.easeNone
            });
        }


        // Freddie Tutti Frutti content


        if ($('.freddie_tutti_frutti_content ').length !== 0) {
            $('.freddie_tutti_frutti_content .et_pb_posts .et_pb_post ').each(function () {
                $(this).find('.post-meta').insertBefore($(this).find('h2.entry-title'));
                $('<span class="button_circle"></span>').appendTo($(this).find('.more-link'));
                $('<span class="button_circle hover"></span>').appendTo($(this).find('.more-link'));
            })


            $('.freddie_tutti_frutti_content .et_pb_contact_form_container form button.et_pb_contact_submit').prepend($('<div class="left"></div><div class="center"></div><div class="right"></div>'));

            var tl = new TimelineLite;
            $('.freddie_tutti_frutti_content .et_pb_contact_form_container form button.et_pb_contact_submit').hover(
                function () {
                    var jealousyLeft = $(this).find('.left');
                    var jealousyCenter = $(this).find('.center');
                    var jealousyRight = $(this).find('.right');


                    tl.to(jealousyRight, 0.4, {
                        width: "100%",
                        x: "25px"
                    }, 0)
                        .to(jealousyCenter, 0.4, {
                            width: "100%"
                        }, 0)
                        .to(jealousyCenter, 0.1, {
                            scaleX: 0
                        }, 0.5)
                        .to(jealousyLeft, 0.1, {
                            width: "100%",
                            x: "25px"
                        }, 0.5)

                }, function () {
                    tl.clear();
                    var jealousyLeft = $(this).find('.left');
                    var jealousyCenter = $(this).find('.center');
                    var jealousyRight = $(this).find('.right');

                    var tl2 = new TimelineLite;
                    tl2.to(jealousyRight, 0.1, {
                        width: "50px",
                        x: "-25px"
                    }, 0.3)
                        .to(jealousyCenter, 0.3, {
                            scaleX: 1
                        }, 0)
                        .to(jealousyCenter, 0.1, {
                            width: "0%"
                        }, 0.3)
                        .to(jealousyLeft, 0.3, {
                            width: "50px",
                            x: "-25px"
                        }, 0)

                }
            )


            $('.freddie_tutti_frutti_content .freddie_tutti_frutti_content_left_text .et_pb_text ul li:first-child').addClass('active_item');
        }

        function freddieTuttiFruttiContent() {
            var windowHeight = $(window).height();

            var scrollTopSize = $(window).scrollTop();
            if ($('.freddie_tutti_frutti_content ').length !== 0) {
                $('.freddie_tutti_frutti_content .et_pb_row:not(.freddie_tutti_frutti_content_left_text) .et_pb_module').each(function () {
                    var elementTop = $(this).offset().top;

                    if (parseInt(elementTop) <= parseInt(scrollTopSize) + parseInt(windowHeight) / 2) {
                        var elementId = $(this).attr('id');

                        if(elementId){
                            $('.freddie_tutti_frutti_content .freddie_tutti_frutti_content_left_text .et_pb_text ul li').each(function () {
                                if($(this).find('a').attr('href').replace(/\#/g, '') === elementId){
                                    $('.freddie_tutti_frutti_content .freddie_tutti_frutti_content_left_text .et_pb_text ul li').removeClass('active_item');
                                    $(this).addClass('active_item');
                                }
                            })
                        }

                    }
                })

            }
        }

        freddieTuttiFruttiContent();

        $(window).scroll(function () {
            freddieTuttiFruttiContent();
        });


        if ($('body').hasClass('os-host')) {

            var instanceContentTuttiFrutti = OverlayScrollbars($("body"), {
                callbacks: {
                    onScroll: function () {
                        freddieTuttiFruttiContent();
                    }
                }
            });
        }

        // Freddie Artist Case Study Content

        setTimeout(function () {
        if($('.freddie_artist_case_study_content').length !== 0){


            $('#page-container .freddie_artist_case_study_content .et_pb_slider .et-pb-slider-arrows').prepend($('<span class="number">01</span>'));

            var prevText = $('#page-container .freddie_artist_case_study_content .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text();
                $('#page-container .freddie_artist_case_study_content .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev span').text(prevText.replace('ious', ''))
            $('.freddie_artist_case_study_content .et-pb-slider-arrows a').on('click', function (e) {
                e.preventDefault();
                setTimeout(function () {
                    var prevElemLengts = $('.freddie_artist_case_study_content .et_pb_slider .et_pb_slides .et_pb_slide.et-pb-active-slide').prevAll('.et_pb_slide').length + 1;
                    if (prevElemLengts < 10) {
                        prevElemLengts = "0" + prevElemLengts;
                    }
                    $('.freddie_artist_case_study_content .et-pb-slider-arrows span.number').text(prevElemLengts);

                }, 50)


            })


            $('.freddie_artist_case_study_content .et_pb_audio_module .mejs-playpause-button').on('click', function () {
                $('.freddie_artist_case_study_content .et_pb_audio_module ').removeClass('played');
                if($(this).hasClass('mejs-play')){
                    $(this).closest('.mejs-inner').closest('.et_pb_audio_module_content ').parent().addClass('played');
                }else{
                    $(this).closest('.mejs-inner').closest('.et_pb_audio_module_content ').parent().removeClass('played');
                }
            })


            if($('.freddie_artist_case_study_content .et_pb_slider').hasClass('et_slider_auto')){
                setInterval(function () {
                    var showSlideItemsCount = $('.freddie_artist_case_study_content .et_pb_slide.et-pb-active-slide').prevAll().length + 1;

                    if (showSlideItemsCount <= 9) {
                        $('.freddie_artist_case_study_content .et-pb-slider-arrows span.number').text("0" + showSlideItemsCount);
                    } else {
                        $('.freddie_artist_case_study_content .et-pb-slider-arrows span.number').text(showSlideItemsCount);
                    }
                },100)
            }
        }
        },2000)


    }, freddieContentsTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);