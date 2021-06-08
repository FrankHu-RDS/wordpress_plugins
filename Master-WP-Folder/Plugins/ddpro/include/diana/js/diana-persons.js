    (function ($) {


        var timeOutDianaPersons = 1500;

        function isIE() {
            ua = navigator.userAgent;
            var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

            return is_ie;
        }

        if (isIE()){
            timeOutDianaPersons = 5000;
        }

        if($('body').hasClass('et-fb')){
            timeOutDianaPersons = 10000;
        }

//        Diana Noble Person Module

        setTimeout(function () {
            if ($('.diana_noble_person_module').length !== 0) {
                var buttonText = $('.diana_noble_person_module .et_pb_column .et_pb_button_module_wrapper .et_pb_button').text();
                $('.diana_noble_person_module .et_pb_column .et_pb_button_module_wrapper .et_pb_button').html('<span>'+ buttonText +'</span>');



                var dianaImageHeight = $('.diana_noble_person_module .et_pb_slider .et_pb_slide .et_pb_slide_image img').height();
                var dianaArrowsHeight = $('.diana_noble_person_module .et_pb_slider .et-pb-slider-arrows a').outerHeight();
                var arrowsTopSize = dianaImageHeight - dianaArrowsHeight;

                $('.diana_noble_person_module .et_pb_slider .et-pb-slider-arrows').css('top', arrowsTopSize + 'px');

                var nextSlideImage = $('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');

                var prevSlideImage = $('.diana_noble_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');

                $('<div class="prev_post_image"></div>').appendTo('.diana_noble_person_module .et_pb_column_1_4:first-child');
                // $('<div class="next_post_image"></div>').appendTo('.diana_noble_person_module .et_pb_column_1_4:last-child');
                $('<div class="next_post_image"></div>').appendTo('.diana_noble_person_module .et_pb_column_1_4.et-last-child');

                $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImage +')');
                $('.diana_noble_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImage +')');



                $('.diana_noble_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-next').on('click', function () {
                    setTimeout(function () {
                        if ($('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                            var nextSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                            $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                        }else{
                            var nextSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
                            $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                        }
                        var prevSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_image img').attr('src');
                        $('.diana_noble_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                    }, 0)

                });

                $('.diana_noble_person_module .et_pb_slider .et-pb-slider-arrows a.et-pb-arrow-prev').on('click', function () {
                    setTimeout(function () {
                        if ($('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
                            var prevSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_image img').attr('src');
                            $('.diana_noble_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                        }else{
                            var prevSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');
                            $('.diana_noble_person_module .prev_post_image').css('background-image', 'url('+ prevSlideImageClick +')');
                        }
                        var nextSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et-pb-moved-slide').find('.et_pb_slide_image img').attr('src');
                        $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
                    }, 0)

                });




            }
        }, timeOutDianaPersons);


        setInterval(function () {

            if ($('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').nextAll().length > 0) {
                var nextSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide.et-pb-active-slide').next().find('.et_pb_slide_image img').attr('src');
                $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
            }else{
                var nextSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide:first-child').find('.et_pb_slide_image img').attr('src');
                $('.diana_noble_person_module .next_post_image').css('background-image', 'url('+ nextSlideImageClick +')');
            }


            if ($('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').prevAll().length > 0) {
                var prevSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et-pb-active-slide').prev().find('.et_pb_slide_image img').attr('src');
                $('.diana_noble_person_module .prev_post_image').css('background-image', 'url(' + prevSlideImageClick + ')');
            } else {
                var prevSlideImageClick = $('.diana_noble_person_module .et_pb_slider .et_pb_slide:last-child').find('.et_pb_slide_image img').attr('src');
                $('.diana_noble_person_module .prev_post_image').css('background-image', 'url(' + prevSlideImageClick + ')');
            }


        },50);


        setTimeout(function () {
            $('.diana_vip_person_module .et_pb_team_member').each(function () {
                $(this).find('.et_pb_member_social_links').insertAfter($(this).find('.et_pb_team_member_image img'));
            })

            $("body.et-fb #et-fb-app-frame").contents().find('.diana_vip_person_module .et_pb_team_member').each(function () {
                $("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_member_social_links').insertAfter($("body.et-fb #et-fb-app-frame").contents().find($(this)).find('.et_pb_team_member_image img'));
            })
        }, timeOutDianaPersons);


        setTimeout(function () {
            if ($('.diana_officer_person_module').length !== 0) {

                $( ".diana_officer_person_module .persons_row" ).hover(
                    function() {
                        $( this ).find('.et_pb_team_member').addClass('hovered_for_all');
                    }, function() {
                        $( this ).find('.et_pb_team_member').removeClass('hovered_for_all');
                    }
                );

                $( ".diana_officer_person_module .et_pb_team_member" ).hover(
                    function() {
                        $( ".diana_officer_person_module .et_pb_team_member" ).addClass('no_hovered_item');
                        $( this ).addClass('hovered_item');
                    }, function() {
                        $( ".diana_officer_person_module .et_pb_team_member" ).removeClass('no_hovered_item');
                        $( this ).removeClass('hovered_item');
                    }
                );

            }

            if ($("body.et-fb #et-fb-app-frame").contents().find('.diana_officer_person_module').length !== 0) {

                $("body.et-fb #et-fb-app-frame").contents().find(".diana_officer_person_module .persons_row" ).hover(
                    function() {
                        $("body.et-fb #et-fb-app-frame").contents().find($( this )).find('.et_pb_team_member').addClass('hovered_for_all');
                    }, function() {
                        $("body.et-fb #et-fb-app-frame").contents().find($( this )).find('.et_pb_team_member').removeClass('hovered_for_all');
                    }
                );

                $("body.et-fb #et-fb-app-frame").contents().find( ".diana_officer_person_module .et_pb_team_member" ).hover(
                    function() {
                        $("body.et-fb #et-fb-app-frame").contents().find( ".diana_officer_person_module .et_pb_team_member" ).addClass('no_hovered_item');
                        $("body.et-fb #et-fb-app-frame").contents().find($(this)).addClass('hovered_item');
                    }, function() {
                        $("body.et-fb #et-fb-app-frame").contents().find( ".diana_officer_person_module .et_pb_team_member" ).removeClass('no_hovered_item');
                        $("body.et-fb #et-fb-app-frame").contents().find($( this )).removeClass('hovered_item');
                    }
                );

            }
        }, timeOutDianaPersons);

    })(jQuery);