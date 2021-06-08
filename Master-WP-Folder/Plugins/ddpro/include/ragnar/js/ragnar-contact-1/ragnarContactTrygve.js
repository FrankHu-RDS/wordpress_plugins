(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarBlogBjorn  = 500;

    if (isIE()) {
        ragnarBlogBjorn = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarBlogBjorn = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_contact_trygve .ragnar_contact_trygve_form').length !== 0){
            $('.ragnar_contact_trygve .ragnar_contact_trygve_form p.et_pb_contact_field').each(function(){
                $('<div class="bottom_line"></div>').appendTo($(this))
            })
            $('.ragnar_contact_trygve .ragnar_contact_trygve_form input, .ragnar_contact_trygve .ragnar_contact_trygve_form textarea').on('click', function(){
                if($(this).val().length === 0){
                    $(this).closest('p.et_pb_contact_field').find('.bottom_line').css('width','0px');
                }
            })

            $('.ragnar_contact_trygve .ragnar_contact_trygve_form input, .ragnar_contact_trygve .ragnar_contact_trygve_form textarea').keyup(function(){
                var value = $(this).val();
                var size  = value.length;

                // size = size*2;
                $(this).closest('p.et_pb_contact_field').find('.bottom_line').css('width',(size*9) + 'px');

            });




        }


    }, ragnarBlogBjorn)

})(jQuery);