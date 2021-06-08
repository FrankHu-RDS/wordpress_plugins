(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieGalleryEveryOne  = 2000;

    if (isIE()) {
        freddieGalleryEveryOne = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieGalleryEveryOne = 10000;
    }

    setTimeout(function () {

        if($('.freddie_gallery_be_somebody').length !== 0){
            $('.freddie_gallery_be_somebody .et_pb_gallery_item').each(function () {
                $(this).find('h3.et_pb_gallery_title').html('</span><span class="title_text">'+ $(this).find('h3.et_pb_gallery_title').text() +'</span>')
                $(this).find('h3.et_pb_gallery_title').appendTo($(this).find('.et_pb_gallery_image a'))

                var imageSrc = $(this).find('img').attr('src');
                var imageSrcset = $(this).find('img').attr('srcset');

                imageSrc = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');
                imageSrcset = imageSrc.replace(/-([0-9][0-9][0-9]x[0-9][0-9])\w+/g, '');

                $(this).find('img').attr('src', imageSrc);
                $(this).find('img').attr('srcset', imageSrcset);

                if($(this).css('display') === 'block'){
                    $(this).addClass('show_item');
                }


                // var split = new SplitText($(this).find('h3.et_pb_gallery_title .title_text'), {
                //     type: "words,chars",
                //     charsClass: "char char++",
                //     position: "static"
                // });

                var itemLink = $(this).find('.et_pb_gallery_caption').text();


                if(itemLink){
                    $('<span class="item_link link_exist"><span class="icon_box" urlText="'+ itemLink +'" title=""></span></span>').appendTo($(this).find('.et_pb_gallery_image > a'))
                }else{
                    $('<span class="item_link"><span class="icon_box" title=""></span></span>').appendTo($(this).find('.et_pb_gallery_image > a'))
                }
            });


            $('.freddie_gallery_be_somebody .et_pb_gallery_item .item_link.link_exist .icon_box').on('click', function () {
                var thisItem = $(this);
                setTimeout(function () {
                    $('.mfp-gallery').remove();
                    $('.mfp-fade').remove();
                    window.location.href = thisItem.attr('urlText')
                },10)



            })

            $('<div class="gutter_width"></div>').appendTo('.freddie_gallery_be_somebody .et_pb_gallery .et_pb_gallery_items');
            function masonryGallery() {
                setTimeout(function () {
                    var $container = $('.freddie_gallery_be_somebody .et_pb_gallery_items');
                    $container.masonry({
                        columnWidth: '.freddie_gallery_be_somebody .et_pb_gallery_item.show_item ',
                        itemSelector: '.freddie_gallery_be_somebody .et_pb_gallery_item.show_item ',
                        gutter: '.gutter_width'
                    });

                }, 0);
            }
            setTimeout(function () {
                masonryGallery();
                $('.freddie_gallery_be_somebody .et_pb_gallery .et_pb_gallery_item').hoverdir({
                    hoverDelay: 75,
                    hoverElem: '.et_overlay'
                });

                $('.freddie_gallery_be_somebody .et_pb_gallery .et_pb_gallery_pagination ul li').on('click', function () {
                    setTimeout(function () {
                        $('.freddie_gallery_be_somebody .et_pb_gallery_item').removeClass('show_item')

                        $('.freddie_gallery_be_somebody .et_pb_gallery_items').masonry('destroy');
                        $('.freddie_gallery_be_somebody .et_pb_gallery_item').each(function () {
                            if($(this).css('display') === 'block'){
                                $(this).addClass('show_item')

                            }
                        })


                        masonryGallery();

                    },0.1)

                })
            },100)


            // $('.freddie_gallery_be_somebody .et_pb_gallery_item').hover(
            //     function () {
            //         var tlshowHeader = new TimelineLite;
            //         var charsTitle = $(this).find('h3.et_pb_gallery_title .char ').toArray();
            //
            //         tlshowHeader.staggerTo(charsTitle, 0.5,  {
            //             opacity: 1,
            //             ease: Back.easeOut
            //         }, 0.03);
            //
            //     }, function () {
            //         var thisChar = $(this)
            //         setTimeout(function () {
            //             var tlshowHeader = new TimelineLite;
            //             var charsTitle = thisChar.find('h3.et_pb_gallery_title .char ').toArray();
            //
            //             tlshowHeader.staggerTo(charsTitle, 0.5,  {
            //                 opacity: 0,
            //                 ease: Back.easeOut
            //             }, 0.03);
            //         },300)
            //
            //
            //     }
            // )
        }




    }, freddieGalleryEveryOne)

})(jQuery);