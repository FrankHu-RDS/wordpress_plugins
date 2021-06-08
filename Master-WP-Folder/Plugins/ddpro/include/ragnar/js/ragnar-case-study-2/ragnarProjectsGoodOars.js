(function ($) {
    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarGoodProjectsOars  = 1000;

    if (isIE()) {
        ragnarGoodProjectsOars = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarGoodProjectsOars = 10000;
    }

    setTimeout(function () {
        if($('.ragnar_projects_good_oars').length !== 0){
            var projectCount = 1;

            $('.ragnar_projects_good_oars .et_pb_portfolio .project.type-project').each(function () {
                if(projectCount < 10){
                    $(this).find('.et_pb_module_header').prepend($('<div class="project_number"> 0'+ projectCount +'</div>'));
                }else{
                    $(this).find('.et_pb_module_header').prepend($('<div class="project_number">'+ projectCount +'</div>'));
                }


                projectCount = projectCount + 1
                $('<div class="arrow_wrap"><div class="arrow_bg"></div><div class="arrow"></div></div>').appendTo($(this))

                var imageSrc = $(this).find('.et_portfolio_image img').attr('src');
                $(this).find('.et_portfolio_image').remove();
                if(imageSrc){
                    $(this).prepend($('<div class="project_bg_image" style="background-image: url('+ imageSrc +');"></div>'))
                    // $(this).css('background-image', 'url('+ imageSrc +')')
                }else{
                    $(this).addClass('project_without_image')
                }

            })
        }

    }, ragnarGoodProjectsOars);

})(jQuery);