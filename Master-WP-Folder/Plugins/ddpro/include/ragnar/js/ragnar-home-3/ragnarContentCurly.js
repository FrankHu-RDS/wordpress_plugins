(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentCurly  = 1000;

    if (isIE()) {
        ragnarContentCurly = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentCurly = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_content_curly').length !== 0){
            $('.ragnar_content_curly .ragnar_content_curly_row').each(function (){
                if($(window).scrollTop() > $(this).offset().top -($(window).height()/2)){
                    $(this).addClass('visible')
                }else{
                    $(this).removeClass('visible')
                }
            })


            var splitCtaText = new SplitText($(".ragnar_content_curly .et_pb_column_3_5 .et_pb_promo .et_pb_module_header"), {
                type: "words",
                wordsClass: "word",
                position: "reletive"
            });
            var splitCtaText = new SplitText($(".ragnar_content_curly .et_pb_column_3_5 .et_pb_promo p"), {
                type: "words",
                wordsClass: "word",
                position: "reletive"
            });


            $('.ragnar_content_curly .et_pb_column_3_5 .et_pb_promo').each(function (){
                if($(window).scrollTop() > $(this).offset().top - ($(window).height()/1.25)){
                    $(this).addClass('visible')
                    var thisTl = this;
                    thisTl.t1Torriate = new TimelineLite;
                    var charsCtaTExt = $(this).find('.word').toArray();
                    thisTl.t1Torriate.staggerTo(charsCtaTExt, 0.2, {
                        scaleY: "1",
                        ease: Power0.easeNone
                    }, 0.01)
                }


            })

            $(window).scroll(function (){
                $('.ragnar_content_curly .ragnar_content_curly_row').each(function (){
                    if($(window).scrollTop() > $(this).offset().top - ($(window).height()/2)){
                        $(this).addClass('visible')
                    }else{
                        $(this).removeClass('visible')

                    }
                })


                $('.ragnar_content_curly .et_pb_column_3_5 .et_pb_promo').each(function (){
                    if($(window).scrollTop() > $(this).offset().top - ($(window).height()/1.25)){
                        $(this).addClass('visible')
                        var thisTl = this;
                        thisTl.t1Torriate = new TimelineLite;
                        var charsCtaTExt = $(this).find('.word').toArray();
                        thisTl.t1Torriate.staggerTo(charsCtaTExt, 0.2, {
                            scaleY: "1",
                            ease: Power0.easeNone
                        }, 0.01)
                    }


                })

            })




        }

    }, ragnarContentCurly)

})(jQuery);