(function ($) {

            $(".sigmun_make_jump_header .et_pb_blurb").each(function (e) {
                var i = $(this).find(".et_pb_main_blurb_image img").attr("src");
                $(this).find(".et_pb_blurb_container h4").css({background: "url(" + i + ")"})
            });

            setInterval(function () {
                $(".sigmun_make_jump_header .et_pb_blurb").each(function (e) {
                    if (!$(this).hasClass('div_added')) {
                        var i = $(this).find(".et_pb_main_blurb_image img").attr("src");
                        $(this).find(".et_pb_blurb_container h4").css({background: "url(" + i + ")"});
                        $(this).addClass('div_added');
                    }
                });

            }, 200);
        })(jQuery);