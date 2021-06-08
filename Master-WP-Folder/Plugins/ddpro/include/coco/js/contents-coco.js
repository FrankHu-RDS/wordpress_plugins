(function ($) {

    var timeOutCocoContents = 500;

    if ($('body').hasClass('et-fb')) {
        timeOutCocoContents = 10000;
    }
    setTimeout(function() {
       $('.coco_start_today_content').each(function(){
           $(this).find('.et_pb_blurb .et_pb_main_blurb_image').insertAfter($(this).find('.et_pb_blurb h4'));
       });
    },timeOutCocoContents)
})(jQuery);