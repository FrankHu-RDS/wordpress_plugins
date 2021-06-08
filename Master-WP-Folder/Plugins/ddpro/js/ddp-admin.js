var ddd_full_stop = 0;

var json_counters_array = [];
jQuery(document).ready(function($) {
    const { __, _x, _n, _nx } = wp.i18n;
    // clipboard for report
    $("#ddp-success-report").hide(),
        new Clipboard("#ddp-copy-report").on("success", function() {
            $("#ddp-success-report").show();
        });

    new Clipboard('#ddp-copy-url').on("success", function() {
        $("#ddp-success-url").show();
    });

    $('.ddp-assistant .nav-tab.ddp_wl, .ddp-assistant .nav-tab.ddp_options').wrapAll('<div class="nav-tabs-subtabs"></div>');
    $('.ddp-assistant .nav-tab.ddp_divi_theme_builder, .ddp-assistant .nav-tab.ddp_settings').wrapAll('<div class="nav-tabs-subtabs-theme-builder"></div>');


    jQuery('.wrap.ddp-assistant:not(.activated) a.nav-tab:not(.divi_den_pro_dashboard):not(.ddp_assistant_system_status):not(.ddp_assistant_help_faq):not(.ddp_start_here):not(.ddp_latest_feed)').addClass('disabled');
    jQuery('table.ddp-report-table td a, table.ddp-report-table th a').on('click touch', function(event) {
        event.preventDefault();
    });
    jQuery('#wp-ddp_wp_content-wrap').appendTo('tr#wp-ddp-column td:not(.ddp-save-buttons)').show();

    //  setTimeout(function() { jQuery('.ddp-assistant>h1').insertBefore('div.ddp-breadcrumbs'); }, 100);

    function ddp_get_tinymce_content() {
        if (jQuery(".ddp_wl_settings #wp-content-wrap").hasClass("tmce-active")) {
            return tinyMCE.activeEditor.getContent();
        } else {
            return jQuery('#html_text_area_id').val();
        }
    }

    if (jQuery('.form-table.ddp_wl label input[name=ddp_plugin_name]').length > 0) {
        ddp_n = jQuery('.form-table.ddp_wl label input[name=ddp_plugin_name]').val();
        ddp_n = ddp_n.replace(/\s+/g, '_').toLowerCase();
        ddp_url_path = window.location.pathname;
        jQuery('.new_admin_url').html(window.location.protocol + '//' + window.location.hostname + ddp_url_path + '?page=' + ddp_n + '_dashboard<strong>_wl</strong>');
    }

    jQuery('.form-table.ddp_wl label input[name=ddp_plugin_name]').on('keyup', function() {
        ddp_n = $(this).val();
        ddp_n = ddp_n.replace(/\s+/g, '_').toLowerCase();
        ddp_url_path = window.location.pathname;
        jQuery('.new_admin_url').html(window.location.protocol + '//' + window.location.hostname + ddp_url_path + '?page=' + ddp_n + '_dashboard<strong>_wl</strong>');
    });

    jQuery('.ddp-breadcrumbs--end').text(jQuery('a.nav-tab-active').text());

    // WL Submit Button

    jQuery('p.submit.ddp_wl.save_settings input').on('click touch', function(event) {
        event.preventDefault();
        ddd_full_stop = 0;

        jQuery('.form-table.ddp_wl label input, .form-table.ddp_wl label textarea, #wp-ddp_wp_content-wrap').each(function() {
            //if($('input#ddp_wl').is(":checked")) {
            if ($(this).attr('id') !== 'wp-ddp_wp_content-wrap' && $(this).attr('name') !== 'ddp_plugin_icon') {
                if ($(this).val() === '') {
                    ddd_full_stop = 1;
                    $(this).addClass('not-filled');
                    $(this).siblings('.ddp-error-message').remove();
                    $(this).after('<span class="ddp-error-message">This field is required</span>')
                }
                // else {ddd_full_stop = 0;
                //    $(this).removeClass('not-filled');
                //     $(this).siblings('.ddp-error-message').remove();}
            }
            // }
        });


        if (ddd_full_stop === 0) {
            $(this).next().hide();

            jQuery('.form-table.ddp_wl label input, .form-table.ddp_wl label textarea, #wp-ddp_wp_content-wrap').each(function() {

                if ($(this).attr('id') === 'wp-ddp_wp_content-wrap') {
                    ajax_option = 'ddp_wp_content';
                    ajax_val = tinyMCE.activeEditor.getContent();
                } else {
                    ajax_option = $(this).attr('name');
                    ajax_val = $(this).val();
                }


                if (ajax_option === 'ddp_plugin_name') {
                    var new_name = ajax_val;
                    var new_link = ajax_val.replace(/\s+/g, '_').toLowerCase();
                    if (jQuery('input[name=ddp_wl]').is(":checked")) {
                        redirect_link = window.location.pathname + '?page=' + new_link + '_dashboard_wl&tab=ddp_wl'
                    } else redirect_link = window.location.pathname + '?page=divi_den_pro_dashboard&tab=ddp_wl';
                    if (jQuery('input[name=ddp_hide_menu]').is(":checked")) {
                        redirect_link = window.location.pathname.replace('admin.php', '');
                    }
                }
                //if ( ddd_full_stop === 0) {

                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: 'action=ddp_update_option&ddp_option=' + ajax_option + '&ddp_option_val=' + ajax_val+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                    success: function(data) {
                        if (redirect_link) window.location.replace(redirect_link);
                        else window.location.reload();
                    },
                    error: function(data) {}
                });
                // }
            });
        } else {
            $(this).next().show();
        }
    });

    jQuery('p input#submit_wl.submit_wl_disabled, p input#submit_wl.submit_wl_enabled').on('click', function(event) {
        event.preventDefault();
        ddd_full_stop = 0;

        let ddp_wl_enabled_loaded_html = '<div class="ddp_wl_loaded"><p>'+__('One moment please... Activating white label mode', 'ddpro')+'</p></div>';
        let ddp_wl_disabled_loaded_html = '<div class="ddp_wl_loaded"><p>'+__('One moment please... Deactivating white label mode', 'ddpro')+'</p></div>';

        if ($(this).hasClass('submit_wl_disabled')) {
            $('#ddp-wl-pop-up').html(ddp_wl_enabled_loaded_html);
        }
        if ($(this).hasClass('submit_wl_enabled')) {
            $('#ddp-wl-pop-up').html(ddp_wl_disabled_loaded_html);
        }

        jQuery('.form-table.ddp_wl label input, .form-table.ddp_wl label textarea, #wp-ddp_wp_content-wrap').each(function() {
            //if($('input#ddp_wl').is(":checked")) {
            if ($(this).attr('id') !== 'wp-ddp_wp_content-wrap' && $(this).attr('name') !== 'ddp_plugin_icon') {
                if ($(this).val() === '') {
                    ddd_full_stop = 1;
                    $(this).addClass('not-filled');
                    $(this).siblings('.ddp-error-message').remove();
                    $(this).after('<span class="ddp-error-message">This field is required</span>')
                }
                // else {ddd_full_stop = 0;
                //    $(this).removeClass('not-filled');
                //     $(this).siblings('.ddp-error-message').remove();}
            }
            // }
        });
        if (ddd_full_stop === 0) {
            $(this).next().hide();
            $('.ddp_wl_hidden .et-box-content .et_pb_button_slider').click();
            $('.submit.ddp_wl.save_settings input').click();
        } else {
            $(this).next().show();
        }
    });

});

jQuery(document).ready(function($) {
    $('#ddp-preview-window').insertAfter('body > :last-child');
    $('#ddp-wl-pop-up').insertBefore('body > #ddp-preview-window');

    jQuery.fn.center = function() {
        this.css("position", "absolute");
        this.css("top", (jQuery(window).height() / 10 + +jQuery(window).scrollTop() + "px"));
        this.css("left", (jQuery(window).width() - this.outerWidth()) / 2 + jQuery(window).scrollLeft() + "px");
        return this;
    }

    $('#ddp-preview').on('click', function() {
        jQuery("#ddp-preview-window").center();
        $('#ddp-preview-window').show();
    });

    $('#ddp-preview-close').on('click', function() {
        $('#ddp-preview-window').hide();
    });

     $('#submit_wl_pop_up').on('click', function(event) {
        event.preventDefault();
        ddd_full_stop = 0;
         jQuery('.form-table.ddp_wl label input, .form-table.ddp_wl label textarea, #wp-ddp_wp_content-wrap').each(function() {
            //if($('input#ddp_wl').is(":checked")) {
            if ($(this).attr('id') !== 'wp-ddp_wp_content-wrap' && $(this).attr('name') !== 'ddp_plugin_icon') {
                if ($(this).val() === '') {
                    ddd_full_stop = 1;
                    $(this).addClass('not-filled');
                    $(this).siblings('.ddp-error-message').remove();
                    $(this).after('<span class="ddp-error-message">This field is required</span>')
                }
                // else {ddd_full_stop = 0;
                //    $(this).removeClass('not-filled');
                //     $(this).siblings('.ddp-error-message').remove();}
            }
            // }
        });
        if (ddd_full_stop === 0) {
            $(this).next().hide();
            jQuery("#ddp-wl-pop-up").center();
            $('#ddp-wl-pop-up').show();
        } else {
            $(this).next().show();
        }
    });

    $('#ddp-wl-pop-up-close, #ddp-wl-pop-up-close-cancel').on('click', function() {
        $('#ddp-wl-pop-up').hide();
    });


    // main function
    function onIframeLoad() {
        setTimeout(function() {
            $('iframe#ondemanIframe').on('load', function() {
                var frame = document.getElementById('ondemanIframe');

                // remove divi loading animation
                $('#et_pb_loading_animation').remove();


                jQuery.ajax({
                    type: 'GET',
                    url: ajaxurl,
                    data: 'action=ddp_get_option',
                    success: function(data) {
                        var ddp_sp_enable = data + '';
                        if (ddp_sp_enable === 'enabled') {
                            if(frame !== null && frame.contentWindow !== null) frame.contentWindow.postMessage('pro_membership_activated', '*');
                        } else {
                            if(frame !== null && frame.contentWindow !== null) frame.contentWindow.postMessage('pro_membership_deactivated', '*');
                        }
                    }
                });
                // function to get post id from the url parameter 'post'
                function getUrlVars() {
                    var vars = [],
                        hash;
                    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                    for (var i = 0; i < hashes.length; i++) {
                        hash = hashes[i].split('=');
                        vars.push(hash[0]);
                        vars[hash[0]] = hash[1];
                    }
                    return vars;
                }

                var post_id = getUrlVars()["post"];

                // Create IE + others compatible event handler
                var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
                var eventer = window[eventMethod];
                var messageEvent = eventMethod === "attachEvent" ? "onmessage" : "message";

                // Show featured images for sections - backend divi builder

                if ($('ul.et_pb_saved_layouts_list').length > 0) {
                    $('ul.et_pb_saved_layouts_list li:not(.added_image)').each(function() {
                        this_title = $(this).find('a').text();
                        this_class = this_title.replace(/-+/g, '').replace(/\s+/g, '-').toLowerCase();
                        $(this).addClass(this_class);
                        $(this).addClass('added_image');
                        jQuery.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: 'action=ddp_show_featured_image&ddp_title_image=' + this_title+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                            success: function(data) {
                                if (data !== '') {
                                    img_link = data.substring(data.indexOf("|") + 1);
                                    img_post_title = data.replace(img_link, '').replace('|', '');
                                    $('ul.et_pb_saved_layouts_list li:not(.with-image)').each(function() {
                                        this_title = $(this).find('a').text();
                                        if (this_title === img_post_title) {
                                            $(this).find('a').before('<img src="' + img_link + '" class="ddp_preview" />');
                                            $(this).addClass('with-image');
                                        }
                                    });
                                }
                            },
                            error: function(data) {

                            }
                        });

                    });
                    //$('ul.et_pb_saved_layouts_list').addClass('ddp_images_sent');
                }


                // Show featured images for sections - visual divi builder

                setInterval(function() {
                    if ($('div.et-fb-settings-options-tab-modules_library ul:not(.ddp_images_sent)').length > 0) {
                        $('div.et-fb-settings-options-tab-modules_library ul li:not(.added_image):not(.with-image)').each(function() {
                            this_title = $(this).find('span.et_module_title').text().trim();
                            this_class = this_title.replace(/-+/g, '').replace(/\s+/g, '-').toLowerCase();
                            $(this).addClass(this_class);
                            $(this).addClass('added_image');
                            //$(this).css('min-height', '180px');
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: 'action=ddp_show_featured_image&ddp_title_image=' + this_title+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                                success: function(data) {
                                    if (data !== '') {
                                        img_link = data.substring(data.indexOf("|") + 1);
                                        img_post_title = data.replace(img_link, '').replace('|', '');
                                        $('div.et-fb-settings-options-tab-modules_library ul li:not(.with-image)').each(function() {
                                            this_title = $(this).find('span.et_module_title').text().trim();
                                            if (this_title === img_post_title && $(this).find('img.ddp_preview').length === 0) {
                                                $(this).find('span.et_module_title').after('<img src="' + img_link + '" class="ddp_preview" />');
                                                $(this).addClass('with-image');
                                            }
                                        });
                                    }
                                },
                                error: function(data) {}
                            });

                        });
                        //$('div.et-fb-settings-options-tab-modules_library ul').addClass('ddp_images_sent');
                    }

                }, 10);
                var global_json_counter = 0;
                var json_counter = 0;
                // Listen to message from child window
                eventer(messageEvent, function(e) {

                    if (e.origin === 'https://ondemand.divi-den.com') {
                        var response;
                        if (jQuery.type(e.data) === 'string') { // check if the response is text

                            if (~e.data.indexOf('context')) { // if the response is a divi json file
                                $('body .ddp-assistant .saving_message').show();
                                var ddp_replace_content = 'off';

                                // if (jQuery('.ddp-replace-content input').attr("checked") === 'checked') {
                                //     ddp_replace_content = 'on';
                                // }
                                if (jQuery('#et_pb_main_container > .et_pb_section .et_pb_module_block').length <= 0) {
                                    ddp_replace_content = 'on';
                                }


                                response = jQuery.parseJSON(e.data);
                                if (response) {
                                    if (!$(frame).hasClass('settingsIframe') && !$(frame).hasClass('vbIframe') && response.context === 'et_builder') {
                                        layout = JSON.stringify(response);
                                        var ddp_list = jQuery('.et-pb-all-modules-tab .et-pb-load-layouts');
                                        var ddp_li = ddp_list.children('li').last().clone(true);
                                        ddp_li.addClass('layout_here');
                                        ddp_li.appendTo(ddp_list);
                                        jQuery('.layout_here').data('layout_id', {
                                            layout: layout,
                                            replace_content: ddp_replace_content
                                        });
                                        jQuery('.layout_here .et_pb_layout_button_load').click();
                                    } else if (response.context === 'et_builder_layouts' || $(frame).hasClass('settingsIframe')) {
                                        response_data = encodeURIComponent(JSON.stringify(response));

                                        //response_data = encodeURIComponent(JSON.stringify(response.data));

                                        // import to library

                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            // processData: false,
                                            data: 'action=ddp_import_posts&posts=' + response_data+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                                            success: function(data) {
                                                if ($("div.sectionSaved").length === 0) {
                                                    $('.ddp-tab-section, .ddp-tab-module').html('<div class="sectionSaved">\
                                                    <p>'+__('<strong>Success!</strong> Your section/module is being saved to your local Divi library.', 'ddpro')+'</p>\
                                                    <h3>'+__('Choose your next step...', 'ddpro')+'</h3>\
                                                    <p>'+__('1. Find new modules and save to your library', 'ddpro')+'</p>\
                                                    <a href="#" class="ddp_close">'+__('Find New Pro Modules', 'ddpro')+'</a>\
                                                    <p>'+__('2. Begin editing - Use the "Add From Library" tab to load sections/modules from local Divi Library', 'ddpro')+'</p>\
                                                    <a href="#" class="ddp_reload">'+__('To Continue - Save and Reload Page', 'ddpro')+'</a>\
                                                    '+__('(please do it manually if you are in Divi Frontend Builder or Divi Theme Builder)', 'ddpro')+'</div>');
                                                    $('body .ddp-tab-section a.ddp_reload, body .ddp-tab-module a.ddp_reload').on('click', function(e) {
                                                        e.preventDefault();
                                                        $('div.sectionSaved').html('<h3 class="ddp_loading_text">Reloading...</h3>');
                                                        $('input.button-primary#publish').click();
                                                        $('button.et-fb-button--publish').click();
                                                        $('li#wp-admin-bar-et-disable-visual-builder a.ab-item').click();
                                                    });

                                                    var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                                                    if (ddp_wl_options_for_js.ddp_status === 'enabled' && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                                                        ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-api-ljljdfre935/?uid=' + ddp_rand;
                                                        ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-api-fdge43y/?uid=' + ddp_rand;
                                                    } else {
                                                        ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-no-api-asdfv324/?uid=' + ddp_rand;
                                                        ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-no-api-33jwer3/?uid=' + ddp_rand;
                                                    }


                                                    $('body .ddp-tab-section a.ddp_close').on('click', function(e) {
                                                        e.preventDefault();
                                                        $('div.sectionSaved').html('<h3 class="ddp_loading_text">Loading...</h3>');
                                                        $('.ddp-tab-section').html('<iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" style="width: 100%;height: 100%;" src="' + ddp_sections_link + '"></iframe>');
                                                        onIframeLoad();
                                                    });
                                                    $('body .ddp-tab-module a.ddp_close').on('click', function(e) {
                                                        e.preventDefault();
                                                        $('div.sectionSaved').html('<h3 class="ddp_loading_text">Loading...</h3>');
                                                        $('.ddp-tab-module').html('<iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" style="width: 100%;height: 100%;" src="' + ddp_modules_link + '"></iframe>');
                                                        onIframeLoad();
                                                    });
                                                }
                                                $('body .ddp-assistant .saving_message').hide();
                                                $('body .ddp-assistant .loaded_message').show();
                                                setTimeout(function() {
                                                    $('body .ddp-assistant .loaded_message').hide();
                                                }, 5500);
                                            },
                                            error: function(data) {
                                                console.log(data);
                                            }
                                        });

                                    } // if(response.context === 'et_builder_layouts')
                                    else if (response.context === 'et_theme_builder') {
                                    }
                                } //  if (response)
                            } // if (~e.data.indexOf('context'))
                            else if (~e.data.indexOf('.')) { // if the response is a css file
                                $('input#_et_pb_custom_css').val(e.data);
                            } else if (~e.data.indexOf(',jpg') || ~e.data.indexOf(',png')) { //a featured image link
                                ddp_featured_image_url = e.data.replace(/\,/g, '.')
                                setTimeout(function() {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        // processData: false,
                                        data: 'action=ddp_import_featured_image&ddp_featured_image=' + ddp_featured_image_url+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                                        success: function(data) {},
                                        error: function(data) {}
                                    });
                                }, 5000); //setTimeout(function(){
                            }
                        } //if jQuery.type(e.data) === 'string'
                    } //if (e.origin === 'https://ondemand.divi-den.com') {
                }, false); // eventer(messageEvent, function(e) {


            }); //  $('iframe#ondemanIframe').on('load', function()

        }, 200);
    }
    //function onIframeLoad()

    $('body .ddp-assistant .loaded_message span.close').on('click', function() {
        $('body .ddp-assistant .loaded_message').hide();
    });

    $('body .ddp-assistant .saving_message span.close').on('click', function() {
        $('body .ddp-assistant .saving_message').hide();
    });


    if (typeof ajaxurl === 'undefined') {
        ajaxurl = ddp_wl_options_for_js.ddp_ajax_url;
    }


    if ($('body').hasClass('et-fb') || $('body').hasClass('wp-admin')) {

        // isert Divi Den Pro Tabs to Divi builder
        jQuery.ajax({
            type: 'GET',
            url: ajaxurl,
            data: 'action=ddp_get_option_wl',
            success: function(data) {
                var ddp_enable = data + '';
                if (ddp_enable === 'disabled') { // check if the DDD is enabled in settings

                    onIframeLoad(); // our main function

                    // Insert layout from library
                    $(document).on('mouseup', '.et-pb-layout-buttons-load', function() {
                        setTimeout(function() {

                            var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                            if (ddp_wl_options_for_js.ddp_status === 'enabled' && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                                ddp_layouts_link = 'https://ondemand.divi-den.com/new-api-layouts-search-ghaser65/?uid=' + ddp_rand;
                            } else {
                                ddp_layouts_link = 'https://ondemand.divi-den.com/new-no-api-layouts-search-dngfh4q2/?uid=' + ddp_rand;
                            }

                            var tabbar = $('.et-pb-saved-modules-switcher');
                            if (ddp_wl_options_for_js.ddp_plugin_setting_tab_position === 'on') {
                                if (tabbar.length) {
                                    tabbar.append('<li class="ddp" data-open_tab="ddp-tab" data-layout_type="layout"><a href="#"><img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li>');
                                    $(".et_pb_modal_settings").append('<div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-layout">\
                                <div class="et-dlib-load-options ddp-replace-content et-fb-checkboxes-category-wrap"><p>\
                                '+__('Important: if you\'re replacing the content, please manually clear the layout and update the page, then load the new layout.', 'ddpro')+'</p></div>\
                                <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" src="' + ddp_layouts_link + '"></iframe></div>');
                                }
                            } else {
                                $('li.et-pb-options-tabs-links-active').removeClass('et-pb-options-tabs-links-active');
                                $('div.active-container').removeClass('active-container').css('opacity', 0);
                                tabbar.prepend('<li class="ddp et-pb-options-tabs-links-active" data-open_tab="ddp-tab" data-layout_type="layout"><a href="#"><img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li>');
                                $(".et_pb_modal_settings").append('<div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-layout active-container" style="opacity: 1;">\
                                <div class="et-dlib-load-options ddp-replace-content et-fb-checkboxes-category-wrap"><p>\
                                '+__('Important: if you\'re replacing the content, please manually clear the layout and update the page, then load the new layout.', 'ddpro')+'</p></div>\
                                <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" src="' + ddp_layouts_link + '"></iframe></div>');
                            }
                        }, 200);

                        onIframeLoad();

                    });

                    //Insert section from library
                    $(document).on('mouseup', '.et-pb-section-add-saved', function() {
                        setTimeout(function() {

                            jQuery('.et_pb_modal_settings.et_pb_modal_no_tabs').removeClass('et_pb_modal_no_tabs');

                            var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                            if (ddp_wl_options_for_js.ddp_status === 'enabled' && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                                ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-api-ljljdfre935/?uid=' + ddp_rand;
                            } else ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-no-api-asdfv324/?uid=' + ddp_rand;

                            if (ddp_wl_options_for_js.ddp_plugin_setting_tab_position === 'on') {
                                jQuery('.et_pb_modal_settings_container h3').after(' \
                        <ul class="et-pb-options-tabs-links et-pb-saved-modules-switcher">  \
                            <li class="et-pb-saved-module et-pb-options-tabs-links-active"" data-open_tab="et-pb-saved-modules-tab" > \
                                <a href="#">'+__('Add From Library', 'ddpro')+'</a>    \
                            </li>   \
                            <li class="ddp" data-open_tab="ddp-tab" data-layout_type="section"><a href="#">\
                        <img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li> \
                        </ul>   \
                        <div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-section" \
                        style="display:block !important;" ><iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" \
                        src="' + ddp_sections_link + '"></iframe></div>');

                            } // if ddp_wl_options_for_js.ddp_plugin_setting_tab_position
                            else {
                                $('li.et-pb-options-tabs-links-active').removeClass('et-pb-options-tabs-links-active');
                                $('div.active-container').removeClass('active-container').css('opacity', 0);
                                jQuery('.et_pb_modal_settings_container h3').after(' \
                        <ul class="et-pb-options-tabs-links et-pb-saved-modules-switcher">  \
                            <li class="ddp et-pb-options-tabs-links-active" data-open_tab="ddp-tab" data-layout_type="section" style="opacity: 1;"><a href="#">\
                        <img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li> \
                        <li class="et-pb-saved-module" data-open_tab="et-pb-saved-modules-tab" > \
                                <a href="#">'+__('Add From Library', 'ddpro')+'</a>    \
                            </li>   \
                        </ul>   \
                        <div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-section active-container" \
                        style="display:block !important; opacity: 1 !important;" ><iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" \
                        src="' + ddp_sections_link + '"></iframe></div>');

                            }

                        }, 200);

                        onIframeLoad();
                    });


                    //Insert modules from library
                    $(document).on('mouseup', '.et-pb-column .et-pb-insert-module', function() {
                        setTimeout(function() {

                            jQuery('.et_pb_modal_settings.et_pb_modal_no_tabs').removeClass('et_pb_modal_no_tabs');

                            var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                            if (ddp_wl_options_for_js.ddp_status === 'enabled' && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                                ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-api-fdge43y/?uid=' + ddp_rand;
                            } else ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-no-api-33jwer3/?uid=' + ddp_rand;

                            // $('li.et-pb-options-tabs-links-active').removeClass('et-pb-options-tabs-links-active');
                            // $('div.active-container').removeClass('active-container').css('opacity', 0);

                            $('.et-pb-options-tabs-links.et-pb-saved-modules-switcher').remove();
                            if (ddp_wl_options_for_js.ddp_plugin_setting_tab_position === 'on') {
                                jQuery('.et_pb_modal_settings_container h3').after('<ul class="et-pb-options-tabs-links et-pb-saved-modules-switcher"><li class="et-pb-new-module et-pb-options-tabs-links-active data-open_tab="et-pb-all-modules-tab"><a href="#">'+__('New Module', 'ddpro')+'</a></li><li class="et-pb-saved-module" data-open_tab="et-pb-saved-modules-tab" ><a href="#">'+__('Add From Library', 'ddpro')+'</a></li><li class="ddp" data-open_tab="ddp-tab" data-layout_type="section"><a href="#"><img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li></ul>   \
                    <div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-module" \
                    style="display:block !important;" ><iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" \
                    src="' + ddp_modules_link + '"></iframe></div>');
                            } else {
                                //  $('.et-pb-options-tabs-links.et-pb-saved-modules-switcher').remove();
                                $('li.et-pb-options-tabs-links-active').removeClass('et-pb-options-tabs-links-active');
                                $('div.active-container').removeClass('active-container').css('opacity', 0);
                                jQuery('.et_pb_modal_settings_container h3').after(' \
                    <ul class="et-pb-options-tabs-links et-pb-saved-modules-switcher">  \
                    <li class="ddp et-pb-options-tabs-links-active" data-open_tab="ddp-tab" data-layout_type="section"><a href="#">\
                    <img height="25" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li> \
                        <li class="et-pb-new-module data-open_tab="et-pb-all-modules-tab">\
                            <a href="#">'+__('New Module', 'ddpro')+'</a>\
                        </li>\
                        <li class="et-pb-saved-module" data-open_tab="et-pb-saved-modules-tab" > \
                            <a href="#">'+__('Add From Library', 'ddpro')+'</a>    \
                        </li>   \
                        </ul>   \
                    <div class="et-pb-main-settings et-pb-main-settings-full ddp-tab ddp-tab-module active-container"  \
                    style="display:block !important; opacity: 1 !important;" ><iframe id="ondemanIframe" name="ondemandIframe" class="sectionsIframe" \
                    src="' + ddp_modules_link + '"></iframe></div> \
                ');
                            }

                        }, 200);

                        onIframeLoad();
                    });


                    setInterval(function() {

                        // VISUAL BUILDER SECTIONS and MODULES

                        this_column_parent = $('a.modules_all').parents('div#et-fb-settings-column');
                        if ( $('.ddp').length <= 0 && this_column_parent.hasClass('et-fb-modal-settings--modules_all') && !this_column_parent.hasClass('et-fb-tooltip-modal--load_layout')  && !this_column_parent.hasClass('et_fb_add_row_modal')) {
                            var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                            if (ddp_wl_options_for_js.ddp_status === 'enabled'  && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                                ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-api-ljljdfre935/?uid=' + ddp_rand;
                                ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-api-fdge43y/?uid=' + ddp_rand;
                            } else {
                                ddp_sections_link = 'https://ondemand.divi-den.com/sections-search-no-api-asdfv324/?uid=' + ddp_rand;
                                ddp_modules_link = 'https://ondemand.divi-den.com/modules-search-no-api-33jwer3/?uid=' + ddp_rand;
                            }


                            if (ddp_wl_options_for_js.ddp_plugin_setting_tab_position === 'on') { // DDP tab at the end of nav


                                // add navigation item


                                $('a.modules_all').parents('.et-fb-settings-tabs-nav').append('<li class="ddp et-fb-settings-tabs-nav-item" data-open_tab="ddp-tab" data-layout_type="layout"><a href="#">\
                                <img width="20" style=" margin-bottom: -5px;margin-right: 5px;     margin-top: -3px;" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li>');

                                // Insert Section modal
                                if (this_column_parent.hasClass('et_fb_add_section_modal')) {
                                    $(".et-fb-settings-options-wrap > .et-fb-settings-options").append('<div class="et-fb-settings-options-tab et-fb-all-modules et-fb-modules-list et-fb-settings-options ddp-tab ddp-tab-section">\
                                        <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" \
                                    src="' + ddp_sections_link + '" style="width: 100%;height: 100%;"></iframe></div>');
                                }

                                // Insert Module modal
                                if (this_column_parent.hasClass('et-fb-modal-add-module-container') && !this_column_parent.hasClass('et_fb_add_row_modal') && !this_column_parent.hasClass('et_fb_add_section_modal')) {
                                    $(".et-fb-settings-options-wrap > .et-fb-settings-options").append('<div class="et-fb-settings-options-tab et-fb-all-modules et-fb-modules-list et-fb-settings-options ddp-tab ddp-tab-section ddp-tab-module">\
                                    <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" \
                                src="' + ddp_modules_link + '" style="width: 100%;height: 100%;"></iframe></div>');
                                }

                            }

                            else { // DDP tab at the beginning of nav
                                $('a.modules_all').parents('.et-fb-settings-tabs-nav').prepend('<li class="ddp et-fb-settings-tabs-nav-item et-fb-settings-tabs-nav-item--active" data-open_tab="ddp-tab" data-layout_type="layout"><a href="#">\
                                <img width="20" style=" margin-bottom: -5px;margin-right: 5px;     margin-top: -3px;" src="' + ddp_wl_options_for_js.ddp_wl_i_for_js + '" /> <span>' + ddp_wl_options_for_js.ddp_wl_pn_for_js + '</span></a></li>');


                                // Insert Section modal
                                if (this_column_parent.hasClass('et_fb_add_section_modal')) {
                                    $(".et-fb-settings-options-wrap > .et-fb-settings-options").prepend('<div class="et-fb-settings-options-tab et-fb-all-modules et-fb-modules-list et-fb-settings-options et-fb-settings-options-tab--active ddp-tab ddp-tab-section">\
                                    <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" \
                                    src="' + ddp_sections_link + '" style="width: 100%;height: 100%; opacity:"></iframe></div>');
                                }

                                // Insert Module modal
                                if (this_column_parent.hasClass('et-fb-modal-add-module-container') && !this_column_parent.hasClass('et_fb_add_row_modal') && !this_column_parent.hasClass('et_fb_add_section_modal')) {
                                     $(".et-fb-settings-options-wrap > .et-fb-settings-options").prepend('<div class="et-fb-settings-options-tab et-fb-all-modules et-fb-modules-list et-fb-settings-options et-fb-settings-options-tab--active ddp-tab ddp-tab-section ddp-tab-module">\
                                    <iframe id="ondemanIframe" name="ondemandIframe" class="layoutsIframe" \
                                src="' + ddp_modules_link + '" style="width: 100%;height: 100%;"></iframe></div>');
                                }

                                $('.ddp-tab-section').siblings('div').removeClass('et-fb-settings-options-tab--active');
                                $('.et-fb-settings-tabs-nav li.ddp a').parent('li').siblings().removeClass('et-fb-settings-tabs-nav-item--active');
                                $('.ddp').parents('.et-fb-settings-tabs-nav').addClass('ddp-tab-parent');
                                $('.ddp-tab-section').parents('div.et-fb-settings-options').removeClass('ddp-option-parent');

                            }

                            onIframeLoad();

                        }


                        if ($('li[data-open_tab="ddp-tab"]').length > 0) {
                            if($('li.et-fb-settings-options_tab_modules_library').hasClass('et-fb-settings-tabs-nav-item--active')) {
                                $('li.et-fb-settings-options_tab_modules_library.et-fb-settings-tabs-nav-item--active').parents('#et-fb-settings-column').find('div.et-fb-settings-options-tab-modules_library').addClass('et-fb-settings-options-tab--active');
                            }
                            else  {
                                $('li.et-fb-settings-options_tab_modules_library.et-fb-settings-tabs-nav-item--active').parents('#et-fb-settings-column').find('div.et-fb-settings-options-tab-modules_library').removeClass('et-fb-settings-options-tab--active');
                            }

                            if($('li.et-fb-settings-options_tab_modules_all').hasClass('et-fb-settings-tabs-nav-item--active')) {
                                $('li.et-fb-settings-options_tab_modules_all.et-fb-settings-tabs-nav-item--active').parents('#et-fb-settings-column').find('div.et-fb-settings-options-tab-modules_all').addClass('et-fb-settings-options-tab--active');
                            }
                            else  {
                                $('li.et-fb-settings-options_tab_modules_all.et-fb-settings-tabs-nav-item--active').parents('#et-fb-settings-column').find('div.et-fb-settings-options-tab-modules_all').removeClass('et-fb-settings-options-tab--active');
                            }
                        }

                        $('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li:not(.ddp) a').on('click', function() {
                            $('.ddp-tab-section').removeClass('et-fb-settings-options-tab--active');
                            $(this).parent('li.et-fb-settings-tabs-nav-item').siblings('li').removeClass('et-fb-settings-tabs-nav-item--active');
                            $(this).parent('li.et-fb-settings-tabs-nav-item').addClass('et-fb-settings-tabs-nav-item--active');

                            $(this).parents('.et-fb-main-settings').find('.ddp-option-parent').removeClass('ddp-option-parent');
                            $('a.modules_all').parents('#et-fb-settings-column').removeClass('ddp-column-parent');
                            $(this).parents('.et-fb-settings-tabs-nav').removeClass('ddp-tab-parent');

                        });

                        $('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp a').on('click', function(e) {
                            e.preventDefault();
                            $(this).parent('li.et-fb-settings-tabs-nav-item').siblings().removeClass('et-fb-settings-tabs-nav-item--active');
                            $('.ddp-tab-section').siblings('div').removeClass('et-fb-settings-options-tab--active');
                            $(this).parent('li.et-fb-settings-tabs-nav-item ').addClass('et-fb-settings-tabs-nav-item--active');
                            $('.ddp-tab-section').addClass('et-fb-settings-options-tab--active');

                            $('.ddp-tab-section').parents('div.et-fb-settings-options-wrap').addClass('ddp-option-parent');
                            $('a.modules_all').parents('#et-fb-settings-column').addClass('ddp-column-parent');
                            $(this).parents('.et-fb-settings-tabs-nav').addClass('ddp-tab-parent');

                        });

                         if($('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp').hasClass('et-fb-settings-tabs-nav-item--active')) {
                            if(!$('.ddp-tab-section').parents('div.et-fb-settings-options-wrap').hasClass('ddp-option-parent')) $('.ddp-tab-section').parents('div.et-fb-settings-options-wrap').addClass('ddp-option-parent');
                            if(!$('a.modules_all').parents('#et-fb-settings-column').hasClass('ddp-column-parent')) $('a.modules_all').parents('#et-fb-settings-column').addClass('ddp-column-parent');
                            if(!$('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp').parents('.et-fb-settings-tabs-nav').hasClass('ddp-tab-parent')) $('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp').parents('.et-fb-settings-tabs-nav').addClass('ddp-tab-parent');
                        }
                        else {
                            if($('.ddp-tab-section').parents('div.et-fb-settings-options-wrap').hasClass('ddp-option-parent')) $('.ddp-tab-section').parents('div.et-fb-settings-options-wrap').removeClass('ddp-option-parent');
                            if($('a.modules_all').parents('#et-fb-settings-column').hasClass('ddp-column-parent')) $('a.modules_all').parents('#et-fb-settings-column').removeClass('ddp-column-parent');
                            if($('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp').parents('.et-fb-settings-tabs-nav').hasClass('ddp-tab-parent')) $('.et-fb-main-settings--add_new_module .et-fb-settings-tabs-nav li.ddp').parents('.et-fb-settings-tabs-nav').addClass('ddp-tab-parent');
                        }

                    }, 300);

                } else onIframeLoad(); //if (ddp_enable === 'enabled')
            },
            error: function(data) {}
        }); // ajax

    } //if($('body').hasClass('et-fb') || $('body').hasClass('wp-admin'))

    setInterval(function() {
        if ($('iframe#ondemandIframe.settingsIframe').length) {
            onIframeLoad();
        }
    }, 1000);

    // Yes - No button UI
    $('.ddp-assistant .yes_no_button').each(function() {
        var $checkbox = $(this);
        var value = $checkbox.is(':checked');
        var state = value ? 'et_pb_on_state' : 'et_pb_off_state';
        var $template = $($('#epanel-yes-no-button-template').html()).find('.et_pb_yes_no_button').addClass(state);

        $checkbox.hide().after($template);

        if ('et_pb_static_css_file' === $checkbox.attr('id')) {
            $checkbox
                .parent()
                .addClass(state)
                .next()
                .addClass('et_pb_clear_static_css')
                .on('click', function() {
                    epanel_clear_static_css(false, true);
                });

            if (!value) {
                $checkbox.parents('.et-epanel-box').next().hide();
            }
        }

    });

    // Save settings button

    $('.ddp_settings.save_settings input#submit').on('click', function(e) {
        e.preventDefault();

        $(".ddp-archive-settings .et-epanel-box select").each(function() {
            var this_option = $(this).attr('id');
            var this_val = $(this).val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: 'action=ddp_update_option&ddp_option=' + this_option + '&ddp_option_val=' + this_val+'&ddp_nonce='+ddp_wl_options_for_js.ddp_nonce,
                success: function(data) {
                    window.location.reload();
                },
                error: function(data) {}
            });

        });
    });

    // Enable / Disable ddp button
    $('.ddp-assistant .et-box-content').on('click', '.et_pb_yes_no_button', function(e) {
        e.preventDefault();
        var $click_area = $(this),
            $box_content = $click_area.parents('.et-box-content'),
            $checkbox = $box_content.find('input[type="checkbox"]'),
            $state = $box_content.find('.et_pb_yes_no_button');

        $ddp_option = $box_content.find('input').attr('name');

        $state.toggleClass('et_pb_on_state et_pb_off_state');

        if ($checkbox.is(':checked')) {
            $checkbox.prop('checked', false);
        } else {
            $checkbox.prop('checked', true);
        }

        if ($click_area.hasClass('et_pb_on_state')) {
            ajax_value = 'enabled';
            if ($click_area.hasClass('ddp_enable')) {
                var ddp_rand = Math.floor((Math.random() * 1000000) + 1);
                if (ddp_wl_options_for_js.ddp_status === 'enabled' && ddp_wl_options_for_js.ddp_on_hold_status.replace(/\s/g, '') !== 'yes') {
                    ddp_layouts_link = 'https://ondemand.divi-den.com/new-api-layouts-search-ghaser65/?uid=' + ddp_rand;
                } else {
                    ddp_layouts_link = 'https://ondemand.divi-den.com/new-no-api-layouts-search-dngfh4q2/?uid=' + ddp_rand;
                }
                $('<iframe id="ondemanIframe" name="ondemandIframe" src="' + ddp_layouts_link + '"></iframe>').insertAfter('.ddp-assistant hr');
                onIframeLoad();
            }
        } else {
            ajax_value = 'disabled';
            //if ($click_area.hasClass('ddp_enable')) { $('.ddp-assistant iframe#ondemanIframe').remove(); }

        }

        if (ddd_full_stop === 0) {

            // update ddp enable / disable option
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: 'action=ddp_update_option&ddp_option=' + $ddp_option + '&ddp_option_val=' + ajax_value + '&ddp_nonce=' + ddp_wl_options_for_js.ddp_nonce,
                success: function(data) {},
                error: function(data) {}
            });
        }

    });

    $('.main > div:not(.ddp-wl-dash) .ddp-accordion .ddp-accordion-header').click(function() {
        //Expand or collapse this panel
        $(this).next('.ddp-accordion-content').slideToggle('fast');
        $(this).parent('.ddp-accordion').toggleClass('closed').toggleClass('opened');

        $('.ddp-accordion.opened h3 span').html('–');
        $('.ddp-accordion.closed h3 span').html('+');

        //Hide the other panels
        //  $(".ddp-accordion-content").not($(this).next('.ddp-accordion-content')).slideUp('fast');

    });

    $('.main > div.ddp-wl-dash .ddp-accordion .ddp-accordion-header .et-box-title').click(function() {
        //Expand or collapse this panel
        $(this).parents('.ddp-accordion-header').next('.ddp-accordion-content').slideToggle('fast');
        $(this).parents('.ddp-accordion').toggleClass('closed').toggleClass('opened');

        $('.ddp-accordion.opened h3 span').html('–');
        $('.ddp-accordion.closed h3 span').html('+');

        //Hide the other panels
        //  $(".ddp-accordion-content").not($(this).next('.ddp-accordion-content')).slideUp('fast');

    });

    setTimeout(function() {
        if ($('.ddp-assistant.activated h2.nav-tab-wrapper').length > 0) {
            $('div[data-dismissible=disable-ddpro-cache-notice-forever]').insertAfter('.ddp-assistant.activated h2.nav-tab-wrapper');
            $('div[data-dismissible=disable-ddpro-cache-notice-forever]').show();
        }

    }, 300);

    setInterval(function() {
        if ($('iframe#ondemanIframe').length > 0) {
            $('div[data-dismissible=disable-ddpro-cache-notice-forever]:not(.shown)').insertBefore('iframe#ondemanIframe');
            $('div[data-dismissible=disable-ddpro-cache-notice-forever]:not(.shown)').show();
            $('div[data-dismissible=disable-ddpro-cache-notice-forever]').addClass('shown');
        }

        if($('div.ddpdm-active-notice').length > 0) {
            $('div[data-dismissible=disable-ddpwpd-active-notice-forever]').remove();
        }
    }, 100);


    $('input[name="ddp_plugin_name"]').alphanum({
        allowSpace: true, // Allow the space character
        allowUpper: true // Allow Upper Case characters
    });


    // PLUGIN SETTING

    // tap position


    if ($("input#ddp_plugin_setting_tab_position").length > 0) {

        jQuery.ajax({
            type: 'GET',
            url: ajaxurl,
            data: 'action=ddp_get_option_ddp_plugin_setting_tab_position',
            success: function(data) {
                if ((data) === 'on') $("input#ddp_plugin_setting_tab_position").prop('checked', true);
                else $("input#ddp_plugin_setting_tab_position").prop('checked', false);
            },
            error: function(data) {}
        });


        $("input#ddp_plugin_setting_tab_position").on('change', function() {
            var this_option = $(this).attr('id');

            if ($(this).prop('checked') === true) $(this).val('on');
            else $(this).val('off');

            var this_val = $(this).val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: 'action=ddp_update_option&ddp_option=' + this_option + '&ddp_option_val=' + this_val + '&ddp_nonce=' + ddp_wl_options_for_js.ddp_nonce,
                success: function(data) {},
                error: function(data) {}
            });

        }); // $("input#ddp-setting-tab-position").on
    } //if( $("input#ddp_plugin_setting_tap_position").length > 0)

    // Dashboard left menu

    function getUrlVars() {
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    var current_tab_url = getUrlVars()["tab"];
    var current_page_url = getUrlVars()["page"];


    $('.toplevel_page_divi_den_pro_dashboard ul.wp-submenu-wrap li a').each(function() {
        $(this).removeClass('current');
        $(this).closest('li').removeClass('current');

        var menu_url = $(this).attr('href');
        var menu_url_tab = menu_url.split('&tab=')[1];

        if (menu_url_tab === current_tab_url && current_tab_url !== undefined) {
            $(this).addClass('current');
            $(this).closest('li').addClass('current');
        }

        if (current_page_url === 'divi_den_pro_dashboard' && current_tab_url === undefined) {
            $('li.toplevel_page_divi_den_pro_dashboard li.wp-first-item').addClass('current');
        }

    });


    if ($('.ddp-assistant .nav-tab-active').text() === 'API Key') {
        const { __, _x, _n, _nx } = wp.i18n;
        //console.log('API key page!');
        $('.ddp-assistant .main > *').wrapAll('<div class="ddp-api-dash"><div class="ddp-columns"></div></div>');
        $('.ddp-assistant .main .ddp-columns > :nth-child(n+9)').wrapAll('<div class="ddp-second-column ddp-hidden"></div>');
        $('.ddp-assistant .main .ddp-columns > :nth-child(-n+8)').wrapAll('<div class="ddp-first-column"></div>');
       // $('.ddp-assistant .ddp-second-column table.form-table').insertAfter('.ddp-assistant .ddp-first-column table.form-table').hide();
        $('<p class="ddp-deactivate-warning">'+__('Caution: While a domain is not actively registered, some plugin functions will not be available. Live layouts and modules may be affected. Proceed with caution.', 'ddpro')+'</p>').insertAfter('.ddp-assistant.activated:not(.inactive_on_hold) .ddp-first-column p.submit input#submit');
    }

    $('.ddp-assistant .nav-tabs-subtabs a').each(function() {
        if ($(this).hasClass('nav-tab-active')) {
            $('.ddp-assistant .nav-tab.ddp_advanced').addClass('nav-tab-active');
            $('.ddp-assistant .nav-tabs-subtabs').show();
        }
    });

    if ($('.ddp-assistant .nav-tab.ddp_advanced').hasClass('nav-tab-active')) {
        $('.ddp-assistant .nav-tabs-subtabs').show();
    } else {
        $('.ddp-assistant .nav-tabs-subtabs').hide();
    }

    $('.ddp-assistant .nav-tabs-subtabs-theme-builder a').each(function() {
        if ($(this).hasClass('nav-tab-active')) {
            $('.ddp-assistant .nav-tab.ddp_theme_builder').addClass('nav-tab-active');
            $('.ddp-assistant .nav-tabs-subtabs--theme-builder').show();
        }
    });

    if ($('.ddp-assistant .nav-tab.ddp_theme_builder').hasClass('nav-tab-active')) {
        $('.ddp-assistant .nav-tabs-subtabs-theme-builder').show();
    } else {
        $('.ddp-assistant .nav-tabs-subtabs-theme-builder').hide();
    }



    if ($('.ddp-assistant .nav-tab.ddp_advanced').length > 0) {
        var old_adv_href = $('.ddp-assistant .nav-tab.ddp_advanced').attr('href');
        if (old_adv_href) var new_adv_href = old_adv_href.replace("ddp_advanced", "ddp_wl");
        $('.ddp-assistant .nav-tab.ddp_advanced').attr('href', new_adv_href);
    }

    if ($('.ddp-assistant .nav-tab.ddp_theme_builder').length > 0) {
        var old_adv_href = $('.ddp-assistant .nav-tab.ddp_theme_builder').attr('href');
        if (old_adv_href) var new_adv_href = old_adv_href.replace("ddp_theme_builder", "ddp_divi_theme_builder");
        $('.ddp-assistant .nav-tab.ddp_theme_builder').attr('href', new_adv_href);
    }

    if ($('.ddp-assistant.on_hold:not(.activated) .nav-tab.ddp_subscription_on_hold').length > 0) {
       var old_adv_href = $('.ddp-assistant .nav-tab.ddp_theme_builder').attr('href');
        if (old_adv_href) var new_adv_href = old_adv_href.replace("ddp_divi_theme_builder", "ddp_subscription_on_hold");
        $('.ddp-assistant .nav-tab.ddp_theme_builder').attr('href', new_adv_href);
    }

    if ($('.ddp-assistant.on_hold:not(.activated) .nav-tab.ddp_subscription_on_hold').length > 0) {
        if (current_tab_url === 'ddp_divi_theme_builder') {
            let new_location = window.location.href.replace('ddp_divi_theme_builder', 'ddp_subscription_on_hold');
            window.location.href = new_location;
        }

        if (current_tab_url === 'ddp_settings') {
            let new_location = window.location.href.replace('ddp_settings', 'ddp_subscription_on_hold');
            window.location.href = new_location;
        }
    }

    if ($('.ddp-assistant.on_hold.activated.inactive_on_hold .nav-tab.ddp_subscription_on_hold').length > 0) {
        $('.ddp-assistant.on_hold.activated.inactive_on_hold .nav-tab.ddp_subscription_on_hold').remove();

    }

    ddp_iframe_height();

    window.addEventListener('resize', function(event) {
        ddp_iframe_height();
    });

    function ddp_iframe_height() {
        if ($('.ddp-assistant').width() > 0) {
            let iframe_height = 0;
            let screen_height = $('body').height();
            let h1_height = $('.ddp-assistant > h1').outerHeight();
            let h2_height = $('.ddp-assistant > h2').outerHeight();
            let footer_height = $('#wpfooter').outerHeight();
            if ($('.ddp-php-templates').width() > 0) {
                let sub_nav_height = $('.nav-tabs-subtabs').outerHeight();

                let text_height = $('.ddp-first-column > p').outerHeight() + $('.ddp-first-column > a').outerHeight() + 40;

                iframe_height = screen_height - h1_height - h2_height - footer_height - text_height - sub_nav_height - 60;
            } else {
                iframe_height = screen_height - h1_height - h2_height - footer_height - 10;

            }

            if (iframe_height !== 0) $('body .ddp-assistant div.main iframe:not(.ddp-youtube):not(.ddp-support-frame):not(#ddp_wp_content_ifr)').height(iframe_height);
        }

    }


    $('.form-table.ddp_wl th div.ddp-info-icon').on('click', function() {
        // console.log('click on button');
        $(this).siblings('span').toggleClass('ddp-info-span-show');
    });

    const { __, _x, _n, _nx } = wp.i18n;

    $('.ddp-assistant.activated:not(.inactive_on_hold) .ddp-api-dash p.submit input#submit').val(__('Remove this domain', 'ddpro'));
    $('.ddp-assistant.activated .ddp-api-dash p.submit input#submit').addClass('ddp-api-deactivate');

    $('.ddp-assistant.activated .ddp-api-dash p.submit input#submit.ddp-api-deactivate').on('click', function() {
        $('.ddp-assistant.activated .ddp-api-dash .et_pb_on_value')[0].click();
    });

    // masonry for Latest tab
    if ($('.ddp-assistant .ddp_divi_latest_feed').length > 0) {
        $('.ddp-assistant .ddp_divi_latest_feed .ddp-first-column').masonry({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.ddp-latest-feed-item',
        });
    }

   // if ($('.ddp_theme_builder').hasClass('nav-tab-active') || $('.ddp_advanced').hasClass('nav-tab-active') || $('.ddp_subscription_on_hold'.length > 0)) $('.cache-warning').remove();

    $('body.toplevel_page_et_divi_options > .notice, body[class*="divi_page_"] > .notice').insertBefore('#wpbody-content #wrapper');
}); //jQuery(document).ready(function($)