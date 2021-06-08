(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieNeedsYouHeader = 2000;

    if (isIE()) {
        freddieNeedsYouHeader = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieNeedsYouHeader = 10000;
    }

    setTimeout(function () {


        if($('.freddie_needs_you_header').length !== 0){
            //Scroll effect
            var screenWidth = $(window).width();

            var bottomTExtWidth = $('.freddie_needs_you_header .bottom_text').width();
            var topTextWidth = $('.freddie_needs_you_header .top_text').width();

            var bottomTExtLeft = $('.freddie_needs_you_header .bottom_text').css('left').replace(/[^0-9\.]/g, '');
            var topTextLeft = $('.freddie_needs_you_header .top_text').css('left').replace(/[^0-9\.]/g, '');


            var bottomTExtRight = parseInt(bottomTExtWidth) + parseInt(bottomTExtLeft);
            var topTextRight = parseInt(topTextWidth) + parseInt(topTextLeft);


            var moveSize = bottomTExtRight / screenWidth;
            var moveSizeTop = topTextRight / screenWidth;



                $('.freddie_needs_you_header .top_text ').css('transform', 'translate(-' + $(window).scrollTop() * moveSizeTop + 'px,0)');
                $('.freddie_needs_you_header .bottom_text ').css('transform', 'translate(-' + $(window).scrollTop() * moveSize + 'px,0)');


            $(window).scroll(function () {
                if (screenWidth  >= $(this).scrollTop()) {
                    $('.freddie_needs_you_header .top_text ').css('transform', 'translate(-' + $(this).scrollTop() * moveSizeTop + 'px,0)');
                    $('.freddie_needs_you_header .bottom_text ').css('transform', 'translate(-' + $(this).scrollTop() * moveSize + 'px,0)');
                }else{
                    $('.freddie_needs_you_header .top_text ').css('transform', 'translate(-' + (topTextRight + 100) + 'px,0)');
                    $('.freddie_needs_you_header .bottom_text ').css('transform', 'translate(-' + (bottomTExtRight + 100) + 'px,0)');
                }

            });
        }




    }, freddieNeedsYouHeader);


})(jQuery);