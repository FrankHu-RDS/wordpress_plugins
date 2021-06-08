(function($) {
    const { __, _x, _n, _nx } = wp.i18n;
    $('#wpbody').addClass('ddp-assistant');
    var iframeHtml = '<h3 class="et-tb-admin-container-header divi-tb-header" id="divi-tb-header"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57.45 41.66"><defs><style>.cls-1{fill:#a6e40f;}.cls-2{fill:#fff;}.cls-3{fill:#c00;}.cls-4{fill:#303a47;}.cls-5{fill:none;stroke:#303a47;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><g id="Layer0_2_FILL" data-name="Layer0 2 FILL"><path class="cls-1" d="M34,3.73a1.05,1.05,0,0,0-.3-.15q-6-3-10.85-2.5a11.65,11.65,0,0,0-6.25,2.65,13.09,13.09,0,0,0-1.2,1.15A15.52,15.52,0,0,0,11.71,13a12.43,12.43,0,0,1-2.55,6.2,51.77,51.77,0,0,1-4.4,5.2,25,25,0,0,0-3.6,4.95A7.59,7.59,0,0,0,1,35.33c.1.26.22.53.35.8a8.16,8.16,0,0,0,1,1.55l.55.6a16.47,16.47,0,0,0,2,1.45,14.25,14.25,0,0,0,6.2,1.9,25.21,25.21,0,0,0,7.15-.25A26.12,26.12,0,0,0,25.06,39a12.23,12.23,0,0,1,4.6-.55h.4a42.86,42.86,0,0,1,6,1.05l6.2,1.4a32.09,32.09,0,0,0,6.05.7A8.8,8.8,0,0,0,53.16,40a10.34,10.34,0,0,0,2.65-2.3A9.14,9.14,0,0,0,57.36,35a11.71,11.71,0,0,0-.55-8.5q-2.14-5.7-8.9-12.3A60.15,60.15,0,0,0,34,3.73Z" transform="translate(-0.48 -1.02)"/></g><g id="Layer0_2_MEMBER_1_FILL" data-name="Layer0 2 MEMBER 1 FILL"><path class="cls-2" d="M23.56,6.23a2.28,2.28,0,0,1-.15.35,7.51,7.51,0,0,0-.6,2.55.75.75,0,0,1,.3.2,1.37,1.37,0,0,1,.25.75,1.42,1.42,0,0,1-.25.75,1,1,0,0,1-1.5,0,1.29,1.29,0,0,1-.3-.75,1.24,1.24,0,0,1,.3-.75h.05a.56.56,0,0,1,.15-.1,8,8,0,0,1,.7-3H12.31V41.68H46V6.23h-8.1a7.66,7.66,0,0,1,.7,3,.36.36,0,0,1,.15.1h.05a1.24,1.24,0,0,1,.3.75,1.29,1.29,0,0,1-.3.75,1,1,0,0,1-1.5,0,1.51,1.51,0,0,1-.25-.75,1.45,1.45,0,0,1,.25-.75.43.43,0,0,1,.3-.15,7.18,7.18,0,0,0-.6-2.6l-.15-.35H23.56m5.55,15.6q1.26-3.1,4.15-2.6,3.15.24,3.2,3.95A3.11,3.11,0,0,1,35,26.23a10.41,10.41,0,0,1-2.5,1.9c-1.76,1.16-2.8,2.2-3.1,3.1-.33-.9-1.43-1.84-3.3-2.8a14,14,0,0,1-2.8-1.8,3.55,3.55,0,0,1-1.65-2.85q0-3.55,2.8-4.35Q27.46,18.68,29.11,21.83Z" transform="translate(-0.48 -1.02)"/><path class="cls-3" d="M33.26,19.23q-2.89-.51-4.15,2.6-1.65-3.15-4.65-2.4t-2.8,4.35a3.55,3.55,0,0,0,1.65,2.85,14,14,0,0,0,2.8,1.8c1.87,1,3,1.9,3.3,2.8.3-.9,1.34-1.94,3.1-3.1a10.41,10.41,0,0,0,2.5-1.9,3.11,3.11,0,0,0,1.45-3.05Q36.42,19.48,33.26,19.23Z" transform="translate(-0.48 -1.02)"/><path class="cls-4" d="M23.41,6.58a2.28,2.28,0,0,0,.15-.35,8.09,8.09,0,0,1,1.45-2,6.73,6.73,0,0,1,2.35-1.55,10.34,10.34,0,0,1,1.45-.5L30.21,2l1.45.15a10.64,10.64,0,0,1,1.4.5,6.64,6.64,0,0,1,2.35,1.55,7.84,7.84,0,0,1,1.45,2l.15.35a7.18,7.18,0,0,1,.6,2.6.43.43,0,0,0-.3.15,1.45,1.45,0,0,0-.25.75,1.51,1.51,0,0,0,.25.75,1,1,0,0,0,1.5,0,1.29,1.29,0,0,0,.3-.75,1.24,1.24,0,0,0-.3-.75h-.05a.36.36,0,0,0-.15-.1,7.66,7.66,0,0,0-.7-3V6.18a10.58,10.58,0,0,0-1.75-2.65,8.4,8.4,0,0,0-2.7-1.8,7.37,7.37,0,0,0-3.1-.65h-.3a7.4,7.4,0,0,0-3.1.65,8.62,8.62,0,0,0-2.7,1.8,11.16,11.16,0,0,0-1.75,2.65v.05a8,8,0,0,0-.7,3,.56.56,0,0,0-.15.1h-.05a1.24,1.24,0,0,0-.3.75,1.29,1.29,0,0,0,.3.75,1,1,0,0,0,1.5,0,1.42,1.42,0,0,0,.25-.75,1.37,1.37,0,0,0-.25-.75.75.75,0,0,0-.3-.2A7.51,7.51,0,0,1,23.41,6.58Z" transform="translate(-0.48 -1.02)"/></g><path id="Layer0_2_MEMBER_1_1_STROKES" data-name="Layer0 2 MEMBER 1 1 STROKES" class="cls-5" d="M22.51,6.23H12.31V41.68H46V6.23h-8.1m-1,0H23.56m9.7,13q3.15.24,3.2,3.95A3.11,3.11,0,0,1,35,26.23a10.41,10.41,0,0,1-2.5,1.9c-1.76,1.16-2.8,2.2-3.1,3.1-.33-.9-1.43-1.84-3.3-2.8a14,14,0,0,1-2.8-1.8,3.55,3.55,0,0,1-1.65-2.85q0-3.55,2.8-4.35,3-.75,4.65,2.4Q30.37,18.73,33.26,19.23Z" transform="translate(-0.48 -1.02)"/></svg>\
    <span>'+__('Divi Den Pro Templates for Divi Theme Builder', 'ddpro')+'</span>\
    <a href="/wp-admin/admin.php?page=divi_den_pro_dashboard&tab=ddp_start_here" target="_blank" class="ddp-tb-how-to-button-link">\
    <button type="button" class="et-common-button ddp-tb-back-button ddp-tb-how-to-button">\
    <span class="et-tb-admin-save-button__label">'+__('Read / Watch A Quick Tutorial', 'ddpro')+'</span></button></a>\
    <a href="#et-theme-builder">\
    <button type="button" class="et-common-button ddp-tb-back-button">\
    <span class="et-tb-admin-save-button__label">'+__('Back to Divi Theme Builder', 'ddpro')+'</span></button></a></h3>\
    <iframe id="ondemanIframe" name="ondemandIframe" class="TbIframe" src="https://ondemand.divi-den.com/new-download-divi-theme-builder-templates-search-44rdfhfghw/"></iframe>';

    $(iframeHtml).insertAfter($('#et-theme-builder'));

    var buttonHtml = '<a href="#divi-tb-header"><button type="button" class="et-common-button ddp-tb-main-button">\
    <span class="et-tb-admin-save-button__label">'+__('Divi Den Pro Templates for Divi Theme Builder', 'ddpro')+'</span></button></a>';


    setTimeout(function() {
        $(buttonHtml).insertAfter($('button.et-tb-admin-save-button'));
    }, 1000);

    function ddp_change_iframe_w() {
        let headerWidth = $('.divi-tb-header').outerWidth() + 'px';
        $('iframe.TbIframe').attr('style', 'max-width: ' + headerWidth);
    }

    ddp_change_iframe_w();

    window.addEventListener('resize', function(event) {
        ddp_change_iframe_w();
    });



})(jQuery);