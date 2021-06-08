(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var DianaFashionHeaderTimeOut = 1000;

    if (isIE()) {
        DianaFashionHeaderTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        DianaFashionHeaderTimeOut = 10000;
    }

    setTimeout(function () {
       if($('.diana_fashion_header').length !== 0) {

           // $('.diana_fashion_header').prepend($('<div class="info_outer_container"></div>'));
           // $('.diana_fashion_header .info_row').appendTo($('.diana_fashion_header .info_outer_container'));


           // var rowHeight = 0
           // $('.diana_fashion_header .info_row').each(function () {
           //     if(rowHeight < $(this).height()){
           //         rowHeight = $(this).height()
           //     }
           //
           //     $('.diana_fashion_header .info_row').height($())
           // })



           // $('.diana_fashion_header .info_row:first-child .et_pb_column').show(0)

           var rowHeight = 0;
           $('.diana_fashion_header .info_row').each(function () {
               if(rowHeight < $(this).height()){
                   rowHeight = $(this).height();
               }
           })

           $('.diana_fashion_header .info_row').height(rowHeight)
           $('.diana_fashion_header .info_row:first-child').addClass('active_row')

           $('.diana_fashion_header .et_pb_blurb').on('click', function () {
               var attrId = $(this).attr('id');
               $('.diana_fashion_header .info_row').removeClass('active_row')
               // $('.diana_fashion_header .info_row .et_pb_column').hide('slow')
               $('.diana_fashion_header .info_row ').each(function () {
                   if($(this).hasClass(attrId)){
                       $(this).addClass('active_row');
                       // $(this).find('.et_pb_column').show('slow');


                   }
               })
               var bgImage = $(this).css('background-image');
               console.log(bgImage)

               // $(".diana_fashion_header").fadeOut(600, function () {
                   $('.diana_fashion_header').css('cssText', 'background-image:' + bgImage + '!important');
               // }).fadeIn(600);





           })
       }
    }, DianaFashionHeaderTimeOut)

})(jQuery);