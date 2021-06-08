(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarTabsTheTrack  = 1000;

    if (isIE()) {
        ragnarTabsTheTrack = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarTabsTheTrack = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_tabs_the_track').length !== 0){
            function freddieTuttiFruttiContent() {
                var windowHeight = $(window).height();

                var scrollTopSize = $(window).scrollTop();


                var scrollCount = 1;
                $('.ragnar_tabs_the_track .sticky_text .et_pb_text ul li').each(function () {
                    var liText = $(this).find('a').attr('href').replace(/\#/g, '');
                    if($('.ragnar_tabs_the_track .et_pb_row#' + liText).length != 0){

                        var elementTop =   $('.ragnar_tabs_the_track .et_pb_row#' + liText).offset().top;


                        if (parseInt(elementTop) <= parseInt(scrollTopSize) + parseInt(windowHeight) / 2) {
                            // console.log('li text - ' + $(this).find('a').attr('href').replace(/\#/g, ''))
                            // console.log(scrollCount + ' - ' + liText)
                            // scrollCount =scrollCount + 1

                            console.log('.ragnar_tabs_the_track .et_pb_row#' + liText)
                            $('.ragnar_tabs_the_track .sticky_text .et_pb_text ul li').removeClass('active_item');
                            $(this).addClass('active_item');
                        }
                    }

                })


                // $('.ragnar_tabs_the_track .et_pb_row:not(.sticky_text)').each(function () {
                //     var elementTop = $(this).offset().top;
                //     var elementId = $(this).attr('id');
                //     // console.log('Element Top - ' + parseInt(elementTop))
                //     // console.log('ScrollTopSize - ' + parseInt(scrollTopSize))
                //     // console.log('window height - ' + parseInt(windowHeight) / 2)
                //
                //     if (parseInt(elementTop) <= parseInt(scrollTopSize) + parseInt(windowHeight) / 2) {
                //         if (elementId) {
                //             // console.log(elementId)
                //
                //             // console.log(elementId)
                //             // console.log(elementId)
                //             // console.log(parseInt(scrollTopSize) + parseInt(windowHeight) / 2)
                //             var scrollCount = 1;
                //             $('.ragnar_tabs_the_track .sticky_text .et_pb_text ul li').each(function () {

                //                 if ($(this).find('a').attr('href').replace(/\#/g, '') === elementId) {
                //                     console.log('li text - ' + $(this).find('a').attr('href').replace(/\#/g, ''))
                //                     console.log(scrollCount + ' - ' + elementId)
                //                     scrollCount =scrollCount + 1
                //                     $('.ragnar_tabs_the_track .sticky_text .et_pb_text ul li').removeClass('active_item');
                //                     $(this).addClass('active_item');
                //                 }
                //             })
                //         }
                //
                //     }
                // })
            }


            freddieTuttiFruttiContent();

            $(window).scroll(function () {
                freddieTuttiFruttiContent();
            });





        }

    }, ragnarTabsTheTrack);

})(jQuery);