(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieGalleryEveryChild  = 1000;

    if (isIE()) {
        freddieGalleryEveryChild = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieGalleryEveryChild = 10000;
    }

    setTimeout(function () {

        if($('.freddie_gallery_every_child').length !== 0){
            $('.freddie_gallery_every_child .et_pb_gallery_item').each(function () {
                var itemLink = $(this).find('.et_pb_gallery_caption').text();




                $(this).find('h3.et_pb_gallery_title').html('<span class="title_text">'+ $(this).find('h3.et_pb_gallery_title').text() +'</span><span class="icons"></span>')


                if(itemLink){
                    $('<span class="item_link link_exist"><span class="icon_box" urlText="'+ itemLink +'" title=""></span></span>').appendTo($(this).find('h3.et_pb_gallery_title .icons'))
                }else{
                    $('<span class="item_link"><span class="icon_box" title=""></span></span>').appendTo($(this).find('h3.et_pb_gallery_title .icons'))
                }


                $(this).find('h3.et_pb_gallery_title').appendTo($(this).find('.et_pb_gallery_image .et_overlay'))

                var imageSrc = $(this).find('img').attr('src');
                var imageSrcset = $(this).find('img').attr('srcset');

                imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                $(this).find('img').attr('src', imageSrc);
                $(this).find('img').attr('srcset', imageSrcset);

            });


            $('.freddie_gallery_every_child .et_pb_gallery_item .item_link.link_exist .icon_box').on('click', function () {
                var thisItem = $(this);
                setTimeout(function () {
                    $('.mfp-gallery').remove();
                    $('.mfp-fade').remove();
                    window.location.href = thisItem.attr('urlText')
                },10)



            })



            // $('.freddie_gallery_every_child .et_pb_gallery_item').hover(function () {
            //     var thisHeight = $(this).height();
            //     var descHeight = $(this).find('h3.et_pb_gallery_title').outerHeight();
            //     var topBoxHeight = thisHeight - descHeight;
            //
            //     $(this).find('.et_overlay ').height(topBoxHeight);
            // },function(){
            //     $(this).find('.et_overlay ').height(0);
            // })
        }




    }, freddieGalleryEveryChild)

})(jQuery);