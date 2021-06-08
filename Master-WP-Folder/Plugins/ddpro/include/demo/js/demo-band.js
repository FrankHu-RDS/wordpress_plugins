(function ($) {
            setTimeout(function () {

                $('.demo_band_blurb_M .et_pb_blurb').each(function () {
                    var blurbHeight = $(this).find('.et_pb_blurb_content').height();



                    $(this).find('.et_pb_blurb_content').css('cssText', 'min-height: '+ blurbHeight +'px !important');

                });
            },1500)


})(jQuery);


(function ($) {
        setTimeout(function () {
            var classCount = 1;
            $('.slider_2_M.demo_band_slider .et_pb_slide').each(function () {
                var attrText = $(this).find('.et_pb_slide_description h2').text();
                var attrContentText = $(this).find('.et_pb_slide_description .et_pb_slide_content').text();


                $('.slider_2_M.demo_band_slider .et-pb-controllers a:nth-child(' + classCount + ')').html('<span class="dot"></span><p class="title">'+ attrText +'</p><p>'+ attrContentText +'</p>');

                classCount++;
            });
        },1100)

})(jQuery);