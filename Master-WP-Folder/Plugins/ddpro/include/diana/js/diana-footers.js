        (function ($) {
            var dianaFooterTimeOut = 0;

            if($('body').hasClass('et-fb')){
                dianaFooterTimeOut = 10000;
            }


            setTimeout(function(){
                $('.diana_home9_footer .et_pb_column .et_pb_promo a').each(function () {
                    if($(this).parent('p').length !== 0){
                        $(this).unwrap();
                    }

                    $(this).wrap("<p></p>");
                });

                var buttonText = $('.diana_marked_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_marked_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');

                var buttonText = $('.diana_glorious_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_glorious_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');

                var buttonText = $('.diana_piece_of_cake_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_piece_of_cake_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');

                var buttonTextVB = $("body.et-fb #et-fb-app-frame").contents().find('.diana_piece_of_cake_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_piece_of_cake_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonTextVB +'</span>');


                var buttonTextf9 = $('.diana_home9_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_home9_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonTextf9 +'</span>');

                var buttonTextVBf9 = $("body.et-fb #et-fb-app-frame").contents().find('.diana_home9_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $("body.et-fb #et-fb-app-frame").contents().find('.diana_home9_footer .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonTextVBf9 +'</span>');
            },dianaFooterTimeOut)


        })(jQuery);