(function($) {
     var ctaTimeOut = 0;

     if ($('body').hasClass('et-fb')) {
         ctaTimeOut = 7000;
     }

     setTimeout(function() {
             //    Newsletter Form Script ***********************************************

        $(' .et_pb_newsletter .et_pb_newsletter_form  p input').focus(function() {
            $(this).parent("p").addClass("focus");
            $(this).closest(".et_pb_newsletter_form").addClass("focus");
        });

        $('.et_pb_newsletter .et_pb_newsletter_form  p input').blur(function() {
            if ($(this).val()) {
                $(this).closest(".et_pb_newsletter_form").addClass("filled");
                $(this).parent().addClass("filled");
            } else {
                $(this).closest(".et_pb_newsletter_form").removeClass("filled");
                $(this).parent().removeClass("filled");
            }
            $(this).closest(".et_pb_newsletter_form").removeClass("focus");
            $(this).parent("p").removeClass("focus");
        });




        $('<div class="form_container"></div>').appendTo($('.optin_module3_venus .et_pb_row >  .et_pb_column:nth-child(2)'));
        $('.optin_module3_venus .et_pb_newsletter').appendTo($('.optin_module3_venus .et_pb_row > .et_pb_column:nth-child(2) .form_container'));


        $('<div class="name_after_icon"></div>').insertAfter($('.optin_module3_venus .et_pb_newsletter input#et_pb_signup_firstname'));
        $('<div class="email_after_icon"></div>').insertAfter($('.optin_module3_venus .et_pb_newsletter input#et_pb_signup_email'));

        //    End Newsletter Form Script ***********************************************
    }, ctaTimeOut);

})(jQuery);