(function ($) {

    var ddProMenuTimeOut = 200;

    if($('body').hasClass('et-fb')){
        ddProMenuTimeOut = 10000
    }


    setTimeout(function () {
        if($(window).width() > 980){
            $('.ddp_mega_menu_item').each(function () {
                var itemId = $(this).attr('id');
                $('.ddp_mega_menu .fullwidth-menu li').each(function () {
                    if($(this).hasClass(itemId)){
                        $('<ul class="sub-menu mega"></ul>').appendTo($(this));
                        $('#'+ itemId +'.ddp_mega_menu_item').addClass('moved').appendTo($(this).find('ul.sub-menu'));
                    }
                })
            })

            $('.ddp_mega_menu_item:not(".moved")').remove();
        }else{
            $('.ddp_mega_menu_item').remove();
        }
    },ddProMenuTimeOut);

})(jQuery);