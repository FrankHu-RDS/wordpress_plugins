(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarPersonRoar  = 1000;

    if (isIE()) {
        ragnarPersonRoar = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarPersonRoar = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_person_module_roar').length !== 0){
            var firstImageHeight = $('.ragnar_person_module_roar .ragnar_person_module_roar_row .et_pb_column:first-child .et_pb_team_member_image img').height();



            $('.ragnar_person_module_roar .ragnar_person_module_roar_row').each(function (){
                if($(window).scrollTop() > $(this).offset().top ){
                    $(this).addClass('visible')
                    var imageHeight = $(this).find('.et_pb_column:nth-child(2) .et_pb_team_member_image');
                    TweenMax.to(imageHeight, 0.4, {
                        maxHeight: firstImageHeight + 'px'
                    })

                }else{
                    $(this).removeClass('visible')
                    var imageHeight = $(this).find('.et_pb_column:nth-child(2) .et_pb_team_member_image');
                    TweenMax.to(imageHeight, 0.4, {
                        maxHeight: (firstImageHeight+127) + 'px'
                    })

                }
            })

            $(window).scroll(function (){
                $('.ragnar_person_module_roar .ragnar_person_module_roar_row').each(function (){
                    if($(window).scrollTop() > $(this).offset().top ){
                        $(this).addClass('visible')
                        var imageHeight = $(this).find('.et_pb_column:nth-child(2) .et_pb_team_member_image');
                        TweenMax.to(imageHeight, 0.4, {
                            maxHeight: firstImageHeight + 'px'
                        })

                    }else{
                        $(this).removeClass('visible')
                        var imageHeight = $(this).find('.et_pb_column:nth-child(2) .et_pb_team_member_image');
                        TweenMax.to(imageHeight, 0.4, {
                            maxHeight: (firstImageHeight+127) + 'px'
                        })

                    }
                })

            })

        }

    }, ragnarPersonRoar)

})(jQuery);