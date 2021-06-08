 (function($) {

     var ctaTimeOut = 0;

     if ($('body').hasClass('et-fb')) {
         ctaTimeOut = 7000;
     }    

      setTimeout(function() {

         //    features Script

        $(".feature2-venus .cta_circle_hover").each(function() {
            var titleText = $(this).find('.et_pb_promo_description h2').text();
            $(this).find('.et_pb_promo_description h2').html('<span>' + titleText + '</span>');
        });

        $("body .et_pb_promo.cta_hover").hover(
            function() {
                $(this).find(".et_pb_promo_description strong").show(300);
            },
            function() {
                $(this).find(".et_pb_promo_description strong").hide(300);
            }
        );


        $("body .testimonial_blurb").each(function() {
            $(this).find('.et_pb_blurb_container').insertBefore($(this).find('.et_pb_main_blurb_image'));
        });

        $("body .testimonial_blurb").hover(
            function() {
                $(this).find(".et_pb_blurb_container").animate({
                    opacity: 1,
                    display: "inline-block",
                    width: "toggle",
                    height: "toggle"
                }, 400);
                $(this).find(".et_pb_blurb_container").css('display', 'inline-block');
            },
            function() {
                $(this).find(".et_pb_blurb_container").animate({
                    opacity: 0,
                    display: "none",
                    width: "toggle",
                    height: "toggle"
                }, 400);
            }
        );




    }, ctaTimeOut);

})(jQuery);