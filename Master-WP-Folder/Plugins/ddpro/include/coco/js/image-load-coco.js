    (function ($) {
        $.fn.isInViewport = function () {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();

            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            return elementBottom > viewportTop && elementTop < viewportBottom;
        };

        setTimeout(function () {


            $('.animation').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('animate_section');

                    var count = $('.animate_section .et_pb_blurb').length;
                    var i = 1;

                    function transition() {
                        $('.animation.animate_section .et_pb_blurb:nth-child(' + i + ')').addClass('view_port_animation');
                        i++;
                    }

                    setInterval(function () {
                        if (i <= count) {
                            transition()
                        }
                    }, 60);
                } else {
                    $(this).removeClass('animate_section');
                    $(this).find('.et_pb_blurb').removeClass('view_port_animation');
                }


            });

            $('.animation').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('animate_section');

                    var count = $('.animate_section .et_pb_image').length;
                    var i = 1;

                    function transition() {
                        $('.animation.animate_section .et_pb_image:nth-child(' + i + ')').addClass('view_port_animation');
                        i++;
                    }

                    setInterval(function () {
                        if (i <= count) {
                            transition()
                        }
                    }, 60);
                } else {
                    $(this).removeClass('animate_section');
                    $(this).find('.et_pb_image').removeClass('view_port_animation');
                }


            });


        }, 100);

        


        $(window).on('resize scroll', function () {
            $('.animation').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('animate_section');
                        $('.animation.animate_section .et_pb_blurb').addClass('view_port_animation');
                } else {
                   // $(this).removeClass('animate_section');
                    //$(this).find('.et_pb_blurb').removeClass('view_port_animation');
                }


            });

            $('.animation').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('animate_section');

                    var count = $('.animate_section .et_pb_image').length;
                    var i = 1;

                    function transition() {
                        $('.animation.animate_section .et_pb_image:nth-child(' + i + ')').addClass('view_port_animation');
                        i++;
                    }

                    setInterval(function () {
                        if (i <= count) {
                            transition()
                        }
                    }, 60);
                } else {
                   // $(this).removeClass('animate_section');
                   // $(this).find('.et_pb_image').removeClass('view_port_animation');
                }


            });
        });
    })(jQuery);