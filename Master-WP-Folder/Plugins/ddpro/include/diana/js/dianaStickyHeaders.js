(function ($) {

    // console.log('ddp_php_vars.ddp_sticky_bar_delay ' + ddp_php_vars.ddp_sticky_delay);
    // console.log('ddp_php_vars.ddp_sticky_cookie_days ' + ddp_php_vars.ddp_sticky_cookie_days);
    // console.log('ddp_php_vars.ddp_sticky_show_leave ' + ddp_php_vars.ddp_sticky_show_leave);
    // console.log('ddp_php_vars.ddp_sticky_show_scroll ' + ddp_php_vars.ddp_sticky_show_scroll);
    // console.log('ddp_php_vars.ddp_sticky_bar_scroll_per ' + ddp_php_vars.ddp_sticky_bar_scroll_per);

    var global_ddp_sticky_bar_scroll_per = ddp_php_vars.ddp_sticky_bar_scroll_per;

    function ddp_on_scroll() {
        var pctScrolled = 0;
        var winheight = $(window).height()
        var docheight = $(document).height()
        var scrollTop = $(window).scrollTop()
        var trackLength = docheight - winheight
        var pctScrolled = Math.floor(scrollTop / trackLength * 100) // gets percentage scrolled (ie: 80 NaN if tracklength === 0)
        //console.log(pctScrolled + '% scrolled');
       // console.log('global_ddp_sticky_bar_scroll_per ' + global_ddp_sticky_bar_scroll_per);

        if (pctScrolled >= global_ddp_sticky_bar_scroll_per) {
           // console.log('TRUE');
            if ($.cookie('notice') !== 'ddpStickyBarCookie') {
                $('body #main-header').addClass('notice_is_exist');
                $('body #page-container').addClass('notice_is_exist');
            }
            if (ddp_php_vars.ddp_sticky_bar_position !== 'bottom') {
                var sticky_bar_h = $('#page-container.notice_is_exist .ddp_header_top_section').height();
                $('body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+div:not(.et-fixed-header), body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+header:not(.et-fixed-header), body.et_fixed_nav.page-template-page-template-blank #page-container.notice_is_exist .ddp_header_top_section+div').css('padding-top', sticky_bar_h + 'px');
            }
        }
    }

    if (ddp_php_vars.ddp_sticky_show_scroll === '1') {
        ddp_on_scroll();
        $(window).on("scroll", function () {
            ddp_on_scroll();

        })
    }

    $('body #page-container.notice_is_exist > .et-fixed-header').css('padding-top', 0);

     $(window).on("scroll", function () {
           $('body #page-container.notice_is_exist > .et-fixed-header').css('padding-top', 0);

            var sticky_bar_h = $('#page-container.notice_is_exist .ddp_header_top_section').height();
            $('body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+div:not(.et-fixed-header), body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+header:not(.et-fixed-header), body.et_fixed_nav.page-template-page-template-blank #page-container.notice_is_exist .ddp_header_top_section+div').css('padding-top', sticky_bar_h +'px');
        })


    $('body:not(.et-fb) .ddp_header_top_section').insertBefore('#page-container > :first-child');
    $('.ddp_header_top_section a.close_icon').on('click', function () {
        if ($.cookie('notice') !== 'ddpStickyBarCookie') {
            $('.ddp_header_top_section').slideUp();
            $('.ddp_header_top_section+div, .ddp_header_top_section+header').css('cssText', 'padding-top: 0 !important');
            $('body #main-header').removeClass('notice_is_exist');
            $('body #page-container').removeClass('notice_is_exist');
            $.cookie('notice', 'ddpStickyBarCookie', {
                expires: parseInt(ddp_php_vars.ddp_sticky_cookie_days),
                path: '/'
            });
        }
    });

    if (ddp_php_vars.ddp_sticky_show_leave !== '1' && ddp_php_vars.ddp_sticky_show_scroll !== '1') {

        setTimeout(function () {
            if ($.cookie('notice') !== 'ddpStickyBarCookie') {
                $('body #main-header').addClass('notice_is_exist');
                $('body #page-container').addClass('notice_is_exist');
            }

        }, ddp_php_vars.ddp_sticky_delay * 1000);
    } //if(ddp_php_vars.ddp_sticky_show_leave !== true)
    else if (ddp_php_vars.ddp_sticky_show_leave === '1') {
        $('html').mouseleave(function () {
            //console.log('mouse has left the building!');
            if ($.cookie('notice') !== 'ddpStickyBarCookie') {
                $('body #main-header').addClass('notice_is_exist');
                $('body #page-container').addClass('notice_is_exist');
            }
            if (ddp_php_vars.ddp_sticky_bar_position !== 'bottom') {
                var sticky_bar_h = $('#page-container.notice_is_exist .ddp_header_top_section').height();
                $('body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+div:not(.et-fixed-header), body:not(.et_fixed_nav):not(.et-fb) #page-container.notice_is_exist .ddp_header_top_section+header:not(.et-fixed-header), body.et_fixed_nav.page-template-page-template-blank #page-container.notice_is_exist .ddp_header_top_section+div').css('padding-top', sticky_bar_h +'px');
            }
        });
    }

    var olddays = $('.et_pb_countdown_timer .days .value');

    olddays.each(function () {
        var oldday = $(this);
        oldday.after(oldday.clone());
        oldday.next().wrap('<span></span>');
    }).hide();


    (function update_days() {
        olddays.each(function () {
            var oldday = $(this);
            var days = oldday.html();
            if (days.substr(0, 1) === '0') {
                days = days.slice(1);
            }
            oldday.next().find('.value').html(days);
        });
        setTimeout(function () {
            update_days();
        }, 1000);
    })()


    $("body .et_pb_promo.cta_hover").hover(
        function () {
            $(this).find(".et_pb_promo_description strong").show(300);
        },
        function () {
            $(this).find(".et_pb_promo_description strong").hide(300);
        }
    );


})(jQuery);