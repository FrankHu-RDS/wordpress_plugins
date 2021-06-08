(function ($) {

    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieContentsTimeOut = 0;

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

        console.log(itemsLength);
        console.log(rotateSize);


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





    }, freddieContentsTimeOut);

    //  END FREDDIE CONTENT *******************************************************
})(jQuery);