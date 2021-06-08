(function ($) {

    // clear the placeholder on click
    var timeOutContactForms = 0;


    if ($('body').hasClass('et-fb')) {

        var timeOutContactForms = 10000;
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



}, timeOutContactForms);
})(jQuery);