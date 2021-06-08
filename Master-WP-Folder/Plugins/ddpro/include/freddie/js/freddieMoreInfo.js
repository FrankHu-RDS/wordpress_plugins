(function ($) {
    //  FREDDIE CONTENT *******************************************************


    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieMoreInfoTimeOut = 2000;

    if (isIE()) {
        freddieMoreInfoTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieMoreInfoTimeOut = 10000;
    }

    setTimeout(function () {




        function findAvtiveMenuItem() {
            var windowScrollTopSize = $(window).scrollTop();
            if ($('body').hasClass('os-host')) {
                var windowScrollTopSize = $('.os-viewport').scrollTop();
            }

            $('.et_pb_section').each(function () {

                if ($(this).position().top - menuTopSize - headerHeight <= windowScrollTopSize && windowScrollTopSize <= $(this).position().top - menuTopSize - headerHeight + $(this).outerHeight()) {

                    var sectionId = $(this).attr('id');

                    var sectionHeight = $(this).outerHeight();
                    var scrollSizeSection = windowScrollTopSize - $(this).position().top + menuTopSize + headerHeight;
                    scrollSizeSection = scrollSizeSection / sectionHeight * 100;



                    $('.freddie_more_info .et_pb_row .et_pb_text ul li').each(function () {

                        if (sectionId) {
                            if ($(this).find('a').attr('href').replace('#', '') === sectionId) {

                                $(this).addClass('active_menu_item');
                                var menuItemWidth = $(this).width();
                                itemLeft = $(this).position().left;

                                hoverBgWidth = menuItemWidth * scrollSizeSection / 100;


                            } else {
                                $(this).removeClass('active_menu_item');

                            }
                        }


                    })

                    $(this).addClass('visible_section');
                } else {
                    $(this).removeClass('visible_section');
                }


            })

        }

        function moreInfoScroll() {
            setTimeout(function () {
            var windowScrollTopSize = $(window).scrollTop();
            if ($('body').hasClass('os-host')) {
                var windowScrollTopSize = $('.os-viewport').scrollTop();
            }

            if ($('header#main-header').length !== 0) {
                headerHeight = $('header#main-header').height();
            }

            if ($('body').hasClass('et_fixed_nav')) {
                menuTopSize = 0 + headerHeight;
            }

            if ($('body').hasClass('logged-in')) {
                menuTopSize = 32;
            }

            if ($('body').hasClass('logged-in') && $('body').hasClass('et_fixed_nav')) {
                menuTopSize = 32 + headerHeight;
            }

            $('.freddie_more_info .et_pb_row .et_pb_text ').css('top', menuTopSize + 'px')

            if ($('body').hasClass('et_fixed_nav')) {
                if (windowScrollTopSize >= imageHeight) {
                    $('.freddie_more_info .et_pb_row .et_pb_text ').css('position', 'fixed')
                } else {
                    $('.freddie_more_info .et_pb_row .et_pb_text ').css('position', 'static');
                    $('.freddie_more_info .hover_bg').width(0);
                }
            } else {
                if (windowScrollTopSize >= imageHeight + headerHeight) {
                    $('.freddie_more_info .et_pb_row .et_pb_text ').css('position', 'fixed')
                } else {
                    $('.freddie_more_info .et_pb_row .et_pb_text').css('position', 'static');
                    $('.freddie_more_info .hover_bg').width(0);
                }
            }


            findAvtiveMenuItem();

            $('.freddie_more_info .et_pb_row .et_pb_text ul li').removeClass('prev_item')
            $('.freddie_more_info .et_pb_row .et_pb_text ul li.active_menu_item').prevAll().addClass('prev_item')


            TweenMax.to($('.freddie_more_info .hover_bg'), 0.5, {
                width: itemLeft + hoverBgWidth,
                ease: Power2.easeOut
            })


            if (windowScrollTopSize + $(window).height() === $(document).height()) {
                TweenMax.to($('.freddie_more_info .hover_bg'), 0.5, {
                    width: '100%',
                    ease: Power2.easeOut
                })
            }

            if ($('body').hasClass('et_fixed_nav')) {
                if (windowScrollTopSize < imageHeight) {
                    TweenMax.to($('.freddie_more_info .hover_bg'), 0.5, {
                        width: 0,
                        ease: Power2.easeOut
                    })
                }
            } else {
                if (windowScrollTopSize < imageHeight + headerHeight) {
                    TweenMax.to($('.freddie_more_info .hover_bg'), 0.5, {
                        width: 0,
                        ease: Power2.easeOut
                    })
                }
            }
            },250)
        }

        if ($('.freddie_more_info').length !== 0) {

            $('<div class="hover_bg"></div>').appendTo('.freddie_more_info .et_pb_row .et_pb_text ul');
        }

        if ($('.freddie_more_info').length !== 0) {
            var hoverBgWidth = 0;
            var itemLeft = 0;
            var menuTopSize = 0;
            var imageHeight = 0;
            if($('.freddie_more_info img').length !== 0){
                imageHeight = $('.freddie_more_info img').height();
            }
            var headerHeight = 0;
            moreInfoScroll();
        }


        $(window).scroll(function () {
            moreInfoScroll();
        })

        setTimeout(function () {


            if ($('body').hasClass('os-host')) {
                if ($('.freddie_more_info').length !== 0) {
                    var instance = OverlayScrollbars($("body"), {
                        callbacks: {
                            onScroll: function () {

                                moreInfoScroll();
                            }
                        }
                    });
                }
            }
        },3000)



    }, freddieMoreInfoTimeOut);

})(jQuery);