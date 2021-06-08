(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieButtonsTimeOut = 1000;

    if (isIE()) {
        freddieButtonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieButtonsTimeOut = 10000;
    }

    setTimeout(function () {
        // Freddie Button Seaside

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_seaside ').each(function () {
            var buttonText = $(this).text();
            $(this).html('<span>' + buttonText + '</span>');

            $(this).prepend($('<div class="button_icon"><div class="bg_color_big"></div><div class="bg_color"></div><div class="hover_bg_color"></div><div class="hover_border"></div><div class="icon"></div></div>'));
        })


        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_seaside').on('mouseenter', function () {

            var self = this;

            var $playBtn = $(this);
            TweenMax.set($playBtn.find('circle'), {transformOrigin: "center center"});


            self.spinTl = new TimelineMax({repeat: -1});
            self.spinTl.to($playBtn.find('.hover_border'), 5, {rotation: 360, ease: Linear.easeNone});

            var onReverse = function () {
                var self = this;
                self.spinTl.pause();
            };

            self.hoverTl = new TimelineMax({paused: true, onReverseComplete: onReverse, onReverseCompleteScope: self});
            self.hoverTl.to($playBtn.find('.bg_color'), .25, {scale: 0, ease: Circ.easeIn}, "start")
                .to($playBtn.find('.bg_color_big'), .45, {scale: 0, ease: Circ.easeIn}, "start")

                .to($playBtn.find('span'), .20, {y: 5, ease: Circ.easeIn}, "end")
                .to($playBtn.find('.hover_bg_color'), .20, {scale: 1.2, ease: Circ.easeOut}, "end")
                .to($playBtn.find('.hover_border'), .35, {scale: 1.35, ease: Circ.easeOut}, "end");
            self.hoverTl.timeScale(1.1);

            $el = $(this);

            self.hoverTl.play();
            self.spinTl.play();
        })
            .on('mouseleave', function () {
                var self = this;
                $el = $(this);

                self.hoverTl.reverse();
            });
    }, freddieButtonsTimeOut)

})(jQuery);