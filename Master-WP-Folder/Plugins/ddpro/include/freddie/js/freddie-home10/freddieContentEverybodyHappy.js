(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieContentEverybodyHappy = 2000;

    if (isIE()) {
        freddieContentEverybodyHappy = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieContentEverybodyHappy = 10000;
    }

    setTimeout(function () {


        if($('.freddie_content_everybody_happy').length !== 0){

            $('.freddie_content_everybody_happy .et_pb_image img').each(function () {
                $(this).attr("srcset", '');
            })

            var bgImageFirst = $(".freddie_content_everybody_happy .et_pb_image img").attr('src');

            $('.freddie_content_everybody_happy .et_pb_text.text_link .et_pb_text_inner').hover(
                function () {
                    var bgImage = $(this).closest('.et_pb_text').css('background-image');
                    bgImage = bgImage.replace('url(', '').replace(')', '').replace(/\"/gi, "");


                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').css("transform", 'scaleX(0)');
                    },0)

                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').attr("src", bgImage);
                    },100)

                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').css("transform", 'scaleX(1)');
                    },200)



                    // $(".freddie_content_everybody_happy .et_pb_image img").hide(400, function() {
                    //         $(".freddie_content_everybody_happy .et_pb_image img").attr('src',bgImage);
                    //     }).show(400);


                }, function () {


                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').css("transform", 'scaleX(0)');
                    },0)

                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').attr("src", bgImageFirst);
                    },100)

                    setTimeout(function () {
                        $('.freddie_content_everybody_happy .et_pb_image img').css("transform", 'scaleX(1)');
                    },200)



                    // $(".freddie_content_everybody_happy .et_pb_image img").fadeOut(400, function() {
                    //     $(".freddie_content_everybody_happy .et_pb_image img").attr('src',bgImageFirst);
                    // }).fadeIn(400);
                }
            )




        }


    }, freddieContentEverybodyHappy);

})(jQuery);