(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieEveryTimePerson = 1000;

    if (isIE()) {
        freddieEveryTimePerson = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieEveryTimePerson = 10000;
    }

    setTimeout(function () {

        if($('.freddie_every_time_person_module').length !== 0){

            var hoverBoxWidth = 0;
            var hoverBoxHeight = 0;

            $('.freddie_every_time_person_module  .et_pb_team_member').each(function () {

                $('<div class="image_hover_box"><div class="image_box"></div></div>').insertAfter($(this).find('.et_pb_team_member_image'));

                $(this).find('.image_hover_box .image_box').css('background-image', 'url('+ $(this).closest('.et_pb_column').find('.et_pb_image img').attr('src') +')');

                hoverBoxWidth = $(this).find('.image_hover_box').width()/2;
                hoverBoxHeight = $(this).find('.image_hover_box').height()/2;

                    var memberBoxWidth = $(this).width() + 1;
                    var memberBoxHeight = $(this).height() + 1;

                    $(this).find('.image_hover_box .image_box').css('background-size', memberBoxWidth + 'px '+ memberBoxHeight +'px')
            })


            $('.freddie_every_time_person_module .et_pb_team_member').hover(
                function (e) {
                    $(this).find('.image_hover_box .image_box').addClass('active_item')
                }, function () {
                    $(this).find('.image_hover_box .image_box').removeClass('active_item')

                }
            )

            $('.freddie_every_time_person_module .et_pb_team_member').mousemove(function(e) {

                $('.freddie_every_time_person_module .et_pb_team_member .image_hover_box').offset({
                    left: e.pageX - hoverBoxWidth,
                    top: e.pageY - hoverBoxHeight
                });

                var elementTop = $(this).offset().top - (e.pageY - hoverBoxHeight);
                var elementLeft = $(this).offset().left - (e.pageX - hoverBoxWidth);

                $('.freddie_every_time_person_module .et_pb_team_member .image_hover_box .image_box').css('background-position', elementLeft + 'px ' + elementTop +'px')
            });
        }

    }, freddieEveryTimePerson)

})(jQuery);