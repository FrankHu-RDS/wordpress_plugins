(function ($) {

    // clear the placeholder on click

    var timeOutSigmundContact = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutSigmundContact = 10000;
    }

    setTimeout(function () {
        $('input,textarea').focus(function () {
            if ($(this).attr('placeholder') !== '') {
                $(this).attr('data-placeholder', $(this).attr('placeholder'));
                $(this).attr('placeholder', '');
            }
        });
        $('input,textarea').blur(function () {

            if ($(this).attr('placeholder') === '') {
                $(this).attr('placeholder', $(this).attr('data-placeholder'));

            }
        });


        $('body.et-fb .et_pb_contact_form  p').each(function () {
            var inputDate = $(this).find('input').attr('data-original_id');
            var textareaDate = $(this).find('textarea').attr('data-original_id');

            if(inputDate){
                $(this).attr('data-id', inputDate);
            }
            if(textareaDate){
                $(this).attr('data-id', textareaDate);
            }
        })

        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function () {
            $(this).parent("p").addClass("focus");
        });

        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function () {
            if ($(this).val()) {
                $(this).parent().addClass("filled");
            } else {
                $(this).parent().removeClass("filled");
            }
            $(this).parent("p").removeClass("focus");
        });

        $('.helpful_blurbs .et_pb_column .et_pb_social_media_follow').each(function () {
            $(this).find('li').each(function () {
                var socialIconName = $(this).find('a').attr('title').replace('Follow on', '');
                $(this).find('a .et_pb_social_media_follow_network_name').text(socialIconName);
            })

        })


    }, timeOutSigmundContact)


})(jQuery);