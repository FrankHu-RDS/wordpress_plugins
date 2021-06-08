(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieNeverMorePersonTimeOut = 1500;

    if (isIE()) {
        freddieNeverMorePersonTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieNeverMorePersonTimeOut = 10000;
    }

    setTimeout(function () {

       if($('.freddie_nevermore_person_module').length !== 0){
           $('.freddie_nevermore_person_module .et_pb_team_member').each(function () {
               $(this).find('h4.et_pb_module_header').insertBefore($(this).find('.et_pb_team_member_image'));
               $(this).find('.et_pb_member_position').insertAfter($(this).find('.et_pb_team_member_image img'));


               var paddingLeft = $(this).css('padding-left');
               paddingLeft = parseInt(paddingLeft, 10);;

               var blurbWidht = $(this).innerWidth() - (paddingLeft*2);

               $(this).find('.et_pb_team_member_image ').width(blurbWidht);

           })


           $('.freddie_nevermore_person_module .et_pb_team_member').hover(function () {
                   $(this).closest('.et_pb_column').find('.et_pb_team_member').removeClass('hovered_person');
                   $(this).closest('.et_pb_column').find('.et_pb_team_member').addClass('no_hovered_person');
                   $(this).removeClass('no_hovered_person');
                   $(this).addClass('hovered_person');
               }, function () {
                   $(this).closest('.et_pb_column').find('.et_pb_team_member').removeClass('hovered_person');
                   $(this).closest('.et_pb_column').find('.et_pb_team_member').removeClass('no_hovered_person');
               }
           )


           if($(window).width() <= 767){
               $('.freddie_nevermore_person_module .et_pb_team_member').on('click', function () {
                   if($(this).find('.et_pb_team_member_description').css('display') === 'block'){
                       $(this).find('.et_pb_team_member_description').hide('slow');
                   }else{
                       $(this).find('.et_pb_team_member_description').show('slow');
                   }
               })
           }
       }

    }, freddieNeverMorePersonTimeOut);


})(jQuery);