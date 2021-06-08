(function ($) {


    var timeOutContactPerson2 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutContactPerson2 = 10000;
    }

    setTimeout(function () {

        $('.hello_person .filter_menu .et_pb_text_inner ul li').each(function () {
            var topicName = $(this).text().toLowerCase().replace(" ", "_");
            $(this).attr('topic', topicName);
        });

        $('.hello_person .et_pb_team_member').each(function () {
            // $(this).find('.et_pb_team_member_description').wrapInner('<p class="hello_text"></p>');
            var helloText = $(this).find('.et_pb_team_member_description p:not(.et_pb_member_position)').text();
            if (!helloText) {
                var this_html = $(this).find('.et_pb_team_member_description').html();
                var helloText = $(this).find('.et_pb_team_member_description').children().remove().end().text();
                $(this).find('.et_pb_team_member_description').html(this_html);
                $(this).find('.et_pb_team_member_description').contents().filter(function () {
                    return (this.nodeType === 3);
                }).remove();
            }
            // console.log(' helloText '+ helloText);
            $('<div class="image_hover"><span>' + helloText + '</span></div>').appendTo($(this).find('.et_pb_team_member_image'));
            $(this).find('.et_pb_team_member_description p:not(.et_pb_member_position)').remove();

        });

        $('.hello_person .et_pb_team_member').hoverdir({
            hoverDelay: 75,
            hoverElem: '.image_hover'
        });

        $('.hello_person .filter_menu .et_pb_text_inner ul li:first-child').addClass('active_menu_item');
        var attrPromo = $('.hello_person .filter_menu .et_pb_text_inner ul li:first-child').attr('topic');
        $('.hello_person .et_pb_column .et_pb_team_member').each(function () {
            if ($(this).hasClass(attrPromo)) {
                $(this).show('slow');
            } else {
                $(this).hide('slow');
            }
        });

        setTimeout(function () {
            var personHeight = 0;
            $('.hello_person .et_pb_column .et_pb_team_member').each(function () {
                if(personHeight <= $(this).height()){
                    personHeight = $(this).height();
                }
            });
            $('.hello_person .et_pb_column .et_pb_team_member').height(personHeight)
        },1000);


        $('.hello_person .filter_menu .et_pb_text_inner ul li').click(function () {
            $('.hello_person .filter_menu .et_pb_text_inner ul li').removeClass('active_menu_item');
            $(this).addClass('active_menu_item');

            var attrPromo = $(this).attr('topic');
            $('.hello_person .et_pb_column .et_pb_team_member ').each(function () {
                if ($(this).hasClass(attrPromo)) {
                    $(this).show('slow');
                } else {
                    $(this).hide('slow');
                }
            });
        });
    }, timeOutContactPerson2);





    var timeOutContactPerson1Inner = 2500;
    var timeOutContactPerson1 = 0;

    if ($('body').hasClass('et-fb')) {
        timeOutContactPerson1 = 7000;
        timeOutContactPerson1Inner = 0;
    }

    setTimeout(function () {
        if ($('.big_pop_person').length > 0) {
            if (!$('body').hasClass('et-fb')) {
                setTimeout(function () {
                    var dotImnage = "";
                    var dotName = "";
                    var dotPosition = "";

                    $('<div class="person1_slide_outer_container"><div class="person1_slide_container"></div></div>').appendTo($('.big_pop_person'));
                    $('.big_pop_person .pop_person_info').each(function () {
                        $(this).appendTo($('.person1_slide_container'));

                    });


                    $('.big_pop_person .pop_person_info:first-child').addClass('active_slide');
                    var slideItemsCount = $('.big_pop_person .pop_person_info').length;



                    $('<div class="slide_arrow"><div class="slide_arrow_icon"></div></div>').appendTo($('.big_pop_person .person1_slide_outer_container '));
                    $('<div class="slide_dots"></div>').appendTo($('.big_pop_person .person1_slide_outer_container '));

                    for (i = 0; i < slideItemsCount; i++) {
                        dotImnage = $('.big_pop_person .pop_person_info:nth-child('+ (i + 1) +') .et_pb_image img').attr('src');
                        dotName = $('.big_pop_person .pop_person_info:nth-child('+ (i + 1) +') .name_surname h2').text();
                        dotPosition = $('.big_pop_person .pop_person_info:nth-child('+ (i + 1) +') .name_surname .et_pb_promo_description').clone().children().remove().end().text();
                        // console.log(dotPosition);


                        $('<a count="' + i + '"><div class="image" style="background-image: url('+ dotImnage +')"></div><h2>'+ dotName +'</h2><p>'+ dotPosition +'</p></a>').appendTo($('.big_pop_person .person1_slide_outer_container .slide_dots'));
                    }

                    var prevElWidth = $('.big_pop_person .person1_slide_outer_container .slide_dots a').width();

                    $('.big_pop_person .slide_arrow .slide_arrow_icon').css('left', prevElWidth/2);

                    $('.big_pop_person .person1_slide_outer_container .slide_dots a:first-child').addClass('active_dot');
                    $('.big_pop_person .person1_slide_outer_container .slide_dots a').on('click', function () {


                        setTimeout(function () {
                            var prevElCount = $('.big_pop_person .person1_slide_outer_container .slide_dots a.active_dot').prevAll().length;
                            var arrowSlideSizeHalf = prevElWidth/2;
                            var arrowSlideSize = prevElCount * prevElWidth + arrowSlideSizeHalf;

                            $('.big_pop_person .slide_arrow .slide_arrow_icon').css('left', arrowSlideSize);
                        },200);



                        $('.big_pop_person .person1_slide_outer_container .slide_dots a').removeClass('active_dot');
                        $(this).addClass('active_dot');
                        var dotsSlideCount = $(this).attr('count');
                        var dotsSlideCount2 = parseInt(dotsSlideCount) + 1;
                        $('.big_pop_person .pop_person_info.active_slide').removeClass('active_slide');

                        $('.big_pop_person .pop_person_info:nth-child(' + dotsSlideCount2 + ')').addClass('active_slide');


                    });



                    if($('.big_pop_person').hasClass('autoSlide')){

                        var slideSpeed = $('.big_pop_person').attr('id');


                        if (slideSpeed){
                            var timeOutPersonSlider = slideSpeed;
                        }else{
                            var timeOutPersonSlider = 5000;
                        }


                        function autoSlide() {
                            if($('.big_pop_person .person1_slide_outer_container .slide_dots a.active_dot').next().length > 0){
                                $('.big_pop_person .person1_slide_outer_container .slide_dots a.active_dot').removeClass('active_dot').next().addClass('active_dot');
                            }else{
                                $('.big_pop_person .person1_slide_outer_container .slide_dots a.active_dot').removeClass('active_dot');
                                $('.big_pop_person .person1_slide_outer_container .slide_dots a:first-child').addClass('active_dot');
                            }


                            $('.big_pop_person .person1_slide_outer_container .slide_dots a.active_dot').trigger('click');
                        }
                    }

                    var myVar = setInterval(autoSlide, timeOutPersonSlider);

                    function myStopFunction() {
                        clearInterval(myVar);
                    }

                    $('.big_pop_person .slide_dots').hover(
                        function() {
                            myStopFunction();
                        }, function() {
                            myVar = setInterval(autoSlide, timeOutPersonSlider);
                        }
                    )

                }, timeOutContactPerson1Inner);
            }
        }

    }, timeOutContactPerson1);




})(jQuery);