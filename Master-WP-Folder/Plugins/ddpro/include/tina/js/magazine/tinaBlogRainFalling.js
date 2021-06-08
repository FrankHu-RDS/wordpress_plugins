(function ($) {
    const { __, _x, _n, _nx } = wp.i18n;
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaBlogRainFalling = 2000;

    if (isIE()) {
        tinaBlogRainFalling = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaBlogRainFalling = 10000;
    }

    setTimeout(function () {


        if ($('.tina_blog_rain_falling ').length !== 0) {

            var hoverBoxWidth = 0;
            var hoverBoxHeight = 0;
            var pathCount = 0;

            $('.tina_blog_rain_falling').each(function () {
                $('<div class="nn-cursor"><div class="nn-cursor-text">'+__('Read', 'ddpro')+'</div></div>').appendTo($(this))
            })



            $('.tina_blog_rain_falling  article.et_pb_post').each(function () {

                if($(this).find('img').length !== 0){
                    var imageSrc = $(this).find('img').attr('src');
                    var imageSrcset = $(this).find('img').attr('srcset');

                    imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                    imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');


                    $(this).find('img').attr('src', imageSrc);
                    $(this).find('img').attr('srcset', imageSrcset);
                }


            });



            $('.tina_blog_rain_falling .et_pb_button_module_wrapper').each(function () {
                $('<div class="arrow"></div>').appendTo($(this).find('.et_pb_button '))
            });



            $('.tina_blog_rain_falling  article.et_pb_post').on('click', function () {
                var postLink =  $(this).find('.entry-title a').attr('href');
                if(postLink){
                    window.location.href = postLink
                }
            })

            $('.tina_blog_rain_falling  article.et_pb_post').hover(
                function (e) {
                    $(this).closest('.tina_blog_rain_falling').addClass('-text')
                }, function () {
                    $(this).closest('.tina_blog_rain_falling').removeClass('-text')

                }
            )

            $('.tina_blog_rain_falling ').mousemove(function(e) {
                hoverBoxWidth = $(this).find('.nn-cursor').width()/2;
                hoverBoxHeight = $(this).find('.nn-cursor').outerHeight()/2;
                $(this).find('.nn-cursor').offset({
                    left: e.pageX - hoverBoxWidth,
                    top: e.pageY - hoverBoxHeight
                });

            });
        }





    }, tinaBlogRainFalling);


})(jQuery);