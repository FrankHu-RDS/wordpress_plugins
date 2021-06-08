(function($) {


    if($('.animate_header').length !== 0){
        var texts = [];
        $('.animate_header .texts_for_typing h1').each(function() {
            texts.push($(this).text());
        });
        var typed = new Typed('.animate_header h1.typed', {
            strings: texts,
            typeSpeed: 100,
            loop: true
        });
    }

})(jQuery);