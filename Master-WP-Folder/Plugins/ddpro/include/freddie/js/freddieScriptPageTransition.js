(function ($) {


     $('body').addClass("freddie");
    //  FREDDIE HEADERS *******************************************************

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieTransitionTimeOut = 2000;

    if (isIE()) {
        freddieTransitionTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieTransitionTimeOut = 10000;
    }

    if($('.page_loader').length !== 0){
        setTimeout(function () {
            $('body').addClass("load_done");
        },5000)
    }else{
        $('body').addClass("load_done");
    }


    if($('.page_loader_svg').length !== 0){


        $('<div class="count"></div>').insertBefore($('.page_loader_svg .et_pb_text'))
        $('.count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: 100 }, {
                duration: 4000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter) + '%');
                }
            });
        });
        $('.page_loader_svg .et_pb_text_inner').animate({width:'100%'}, 4000)
        setTimeout(function () {
            $('body').addClass("page_load_done");
        },4000)
    }


    setTimeout(function () {
        setTimeout(function () {
            $('#page-container .freddie_brighton_rock_blurbs .et_pb_text').css('cssText', 'opacity: 1 !important; position: fixed !important;');
            $('#page-container .freddie_brighton_rock_blurbs.disable_transition  .et_pb_text').css('cssText', 'opacity: 1 !important; position: static !important;')
        },2300)
        //Transitions on Scroll
        if ($(".freddie_brighton_rock_blurbs .et_pb_text_inner p").length !== 0) {
            var text = $(".freddie_brighton_rock_blurbs .et_pb_text_inner p").text();
            $(".freddie_brighton_rock_blurbs .et_pb_text_inner").html(text);

        var splitBlurbs = new SplitText(".freddie_brighton_rock_blurbs .et_pb_text .et_pb_text_inner", {
            type: "words.chars",
            charsClass: "char char++",
            position: "static"
        });

        var charsBlurbs = splitBlurbs.chars;

        }


        function PageTransition() {
            var scrollTopSize = $(window).scrollTop();
            var documentHeight = $(window).height();

            if($('.freddie_transition_section').length !== 0){
                $('.freddie_transition_section').each(function () {
                    var tansitionSectionTop = $(this).offset().top;
                    var tansitionSectionPadding = $(this).css('padding-top').replace('px', '');
                    var tansitionSectionHeight = $(this).outerHeight();

                    var tansitionSectionTopSize =  parseInt(tansitionSectionTop) + parseInt(tansitionSectionPadding);
                    var tansitionSectionEndTopSize = tansitionSectionTop + (tansitionSectionHeight / 2);

                    if (parseInt(scrollTopSize) + parseInt(documentHeight) >= tansitionSectionTopSize + 210 && scrollTopSize <= tansitionSectionEndTopSize) {
                        $(this).find('.freddie_transition_section_bg_image').addClass('visible');
                        $('this').addClass('visible');
                    } else {
                        $(this).find('.freddie_transition_section_bg_image').removeClass('visible');
                        $(this).removeClass('visible');
                    }
                })

            }





            if($('.freddie_big_spender_intro_content').length !== 0){
                var bigSpenderContentTop = $('.freddie_big_spender_intro_content').offset().top;
                var bigSpenderContentPadding = $('.freddie_big_spender_intro_content').css('padding-top').replace('px', '');
                var bigSpenderContentHeight = $('.freddie_big_spender_intro_content').outerHeight();

                var elementTopSize = parseInt(bigSpenderContentTop) + parseInt(bigSpenderContentPadding);
                var elementEndTopSize = bigSpenderContentTop + (bigSpenderContentHeight / 2);

                if (parseInt(scrollTopSize) + parseInt(documentHeight)  >= elementTopSize + 210 && scrollTopSize <= elementEndTopSize) {
                    $('.freddie_big_spender_intro_content_bg_image').addClass('visible');
                    $('.freddie_big_spender_intro_content').addClass('visible');
                } else {
                    $('.freddie_big_spender_intro_content_bg_image').removeClass('visible');
                    $('.freddie_big_spender_intro_content').removeClass('visible');
                }
            }


            if($('.freddie_cool_cat_content').length !== 0){
                var bigCoolContentTop = $('.freddie_cool_cat_content').offset().top;
                var bigCoolContentHeight = $('.freddie_cool_cat_content').outerHeight();

                var elementCoolContentTopSize = bigCoolContentTop - (bigCoolContentHeight / 2);
                var elementEndCoolContentTopSize = bigCoolContentTop + (bigCoolContentHeight / 2);

                if (scrollTopSize >= elementCoolContentTopSize && scrollTopSize <= elementEndCoolContentTopSize) {
                    $('.freddie_cool_cat_content_bg_image').addClass('visible');
                } else {
                    $('.freddie_cool_cat_content_bg_image').removeClass('visible');
                }
            }



            if($('.freddie_brighton_rock_blurbs').length !== 0) {
                var bigBrightonBlurbTop = $('.freddie_brighton_rock_blurbs ').offset().top;
                var bigBrightonBlurbHeight = $('.freddie_brighton_rock_blurbs ').outerHeight();

                var elementBrightonTopSize = bigBrightonBlurbTop + (bigBrightonBlurbHeight - 500);

                if (scrollTopSize >= bigBrightonBlurbTop && scrollTopSize <= elementBrightonTopSize) {
                    $('.freddie_brighton_rock_blurbs').addClass('visible');
                    var t1 = new TimelineLite;
                    t1.staggerTo(charsBlurbs, 1.5, {
                        opacity: 1,
                        scaleY: 1,
                        ease: Elastic.easeOut
                    }, .02);
                } else {
                    $('.freddie_brighton_rock_blurbs').removeClass('visible');

                    var t1 = new TimelineLite;
                    t1.staggerTo(charsBlurbs, 1.5, {
                        opacity: 0,
                        scaleY: 0,
                        ease: Elastic.easeOut
                    }, .02);
                }
            }

        }

        PageTransition()

        $(window).scroll(function () {

            PageTransition();

        })


        if($('body').hasClass('os-host')){
            var instance = OverlayScrollbars($("body"), {
                callbacks : {
                    onScroll : function() { PageTransition(); }
                }
            });
        }

    }, freddieTransitionTimeOut);

})(jQuery);