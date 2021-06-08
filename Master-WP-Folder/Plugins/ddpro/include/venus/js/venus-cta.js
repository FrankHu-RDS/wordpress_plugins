 (function($) {
     var ctaTimeOut = 0;

     if ($('body').hasClass('et-fb')) {
         ctaTimeOut = 7000;
     }

     setTimeout(function() {

         //CTA **********************

         $('.cta1_venus .et_pb_blurb').hover(
             function() {
                 $('.cta1_venus .et_pb_column .et_pb_blurb').removeClass('main_blurb').addClass('no_hover_blurb');
                 $(this).addClass('main_blurb');
             },
             function() {
                 $('.cta1_venus .et_pb_column .et_pb_blurb').removeClass('no_hover_blurb');
             }
         );

         $('.cta3_venus .et_pb_column:last-child .et_pb_blurb').hover(
             function() {
                 $('.cta3_venus .et_pb_column:last-child .et_pb_blurb').removeClass('main_blurb').addClass('no_hover_blurb');
                 $(this).addClass('main_blurb');
             },
             function() {
                 $('.cta3_venus .et_pb_column:last-child .et_pb_blurb').removeClass('no_hover_blurb');
             }
         );



         $('body.et-fb .cta1_venus .et_pb_blurb').hover(
             function() {
                 setTimeout(function() {
                     $('body.et-fb .cta1_venus .et_pb_blurb.et_pb_hovered').addClass('main_blurb').addClass('no_hover_blurb');
                 }, 200);

             }
         );

         $('body.et-fb  .cta3_venus .et_pb_column.et-last-child .et_pb_blurb').hover(
             function() {
                 setTimeout(function() {
                     $('body.et-fb  .cta3_venus .et_pb_column.et-last-child .et_pb_blurb.et_pb_hovered').addClass('main_blurb').addClass('no_hover_blurb');
                 }, 200);
             }
         );


         // End CTA **********************
    }, ctaTimeOut);

})(jQuery);