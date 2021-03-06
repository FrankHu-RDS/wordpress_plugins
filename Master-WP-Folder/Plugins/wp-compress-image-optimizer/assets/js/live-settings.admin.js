jQuery(document).ready(function ($) {

    function change_service_status(active) {
        if (!active) {
            $('.wps-ic-service-status').removeClass('paused').addClass('active').html('Live Optimization Active');
            $('.local-requests-left').hide();
            $('.requests-left').show();
            $('.bulk-button').hide();
        } else {
            $('.wps-ic-service-status').removeClass('active').addClass('paused').html('Live Optimization Paused');
            $('.local-requests-left').show();
            $('.requests-left').hide();
            $('.bulk-button').show();
        }
    }

    /**
     * @since 5.00.59
     */
    $('.wps-ic-service-status').on('click', function (e) {
        e.preventDefault();
        $('.wps-ic-live-cdn-ajax').trigger('click');
        return false;
    });

    /**
     * @since 5.00.59
     */
    $('.wps-ic-ajax-checkbox').on('click', function (e) {
        e.preventDefault();

        if ($(this).hasClass('locked')) {
            return false;
        }

        var parent = $(this);
        var checkbox = $('input[type="checkbox"]', parent);
        var setting_name = $(checkbox).data('setting_name');
        var value = $(checkbox).data('setting_value');
        var checked = $(checkbox).is(':checked');
        var on_span = $(checkbox).data('on-text');
        var off_span = $(checkbox).data('off-text');
        var leftover_popup = $(parent).hasClass('no-leftover-popup');

        var span = $('span', parent);
        var label_holder = $('.label-holder', parent);

        /**
         * Is this service status change?
         */
        if (setting_name == 'live-cdn') {

            if (leftover_popup) {
                Swal.fire({
                    title: '',
                    html: jQuery('#no-credits-popup').html(),
                    width: 600,
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonText: 'Okay, I Understand',
                    allowOutsideClick: true,
                    customClass: {
                        container: 'no-padding-popup-bottom-bg switch-legacy-popup',
                    },
                    onOpen: function () {
                    }
                });
                return false;
            }

            change_service_status(checked);
        }

        if (checked) {
            $(checkbox).prop('checked', false);
        } else {
            $(checkbox).prop('checked', true);
        }

        /*
         * If label change on status change should occur
         */
        if (typeof on_span !== 'undefined' && typeof off_span !== 'undefined') {
            if (on_span != '' && off_span != '') {
                if (checked) {
                    $(span).html(off_span);
                } else {
                    $(span).html(on_span);
                }
            }
        }

        /*
         * If label change on status change should occur
         */
        if (typeof label_holder !== 'undefined' && typeof label_holder !== 'undefined') {
            if (checked) {
                $(label_holder).html('Off');
            } else {
                $(label_holder).html('On');
            }
        }

        $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_ajax_checkbox', setting_name: setting_name, value: value, checked: checked}, function (response) {
            if (response.success) {
                // OK
            } else {
                // Error Popup
            }
        });

        return false;
    });

    /** New Above **/


    var tooltips = 0;
    var ajax_run = true;


    /**
     * Additional configuration in advanced settings
     * @since 5.00.59
     */
    $('.button-save-settings').on('click', function (e) {
        e.preventDefault();


        var inputFields = $('input[name^="wp-ic-setting"]');
        var settings = '';
        var parsed = '';

        $(inputFields).each(function (index, value) {
            var checked = $(this).is(':checked');
            if (checked) {
                checked = '1';
            } else {
                checked = '0';
            }
            parsed = parsed + $(this).data('setting_name') + '=' + checked + '&';
        });

        parsed = parsed.replace(/\&$/, '');

        Swal.fire({
            title: '',
            html: jQuery('#saving-settings-popup').html(),
            width: 600,
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            customClass: {
                container: 'no-padding-popup-bottom-bg',
            },
            onOpen: function () {

                $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_save_all_settings', settings: parsed}, function (response) {
                    if (response.success) {
                        swal.close();

                        Swal.fire({
                            title: '',
                            html: jQuery('#settings-saved-popup').html(),
                            width: 600,
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: true,
                            showCloseButton: true,
                            customClass: {
                                container: 'no-padding-popup-bottom-bg',
                            },
                        });

                    } else {
                        alert('Oops! We weren\'t able to save your settings! :(');
                    }
                });

                //swal.close();

            }
        });

        // saving-settings-popup
        // settings-saved-popup

        return false;
    });


    /**
     * Additional configuration in advanced settings
     * @since 5.00.54
     */
    $('.wps-ic-additional-configuration').on('click', function (e) {
        e.preventDefault();
        return false;
    })


    /*
    * Circle
    */
    $('#circle-big').circleProgress({
        size: 160,
        startAngle: -Math.PI / 6 * 3,
        lineCap: 'round',
        thickness: '6',
        fill: {
            gradient: ["#1c87f1", "#3c4cdf"],
            gradientAngle: Math.PI / 7
        }
    });

    /**
     * @since 4.0.0
     * Status: Required 5.00.00
     */
    $('.projected-flag-ok').tooltipster({
        maxWidth: '300',
        delay: 50,
        speed: 100
    });


    /**
     * @since 4.0.0
     * Status: Required 5.00.00
     */
    $('.projected-flag-warning').tooltipster({
        maxWidth: '300',
        delay: 50,
        speed: 100,
        theme: 'warning-tooltip-theme',
    });


    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    $('.tooltip').tooltipster({
        maxWidth: '300',
    });

    /**
     * @since 5.00.20
     */
    $('.btn-purge-cdn').on('click', function (e) {
        e.preventDefault();
        var btn = $(this);
        var span = $('span', btn);
        var loading = $('#purge-cdn-loading', btn);

        $(btn).addClass('loading');
        $(loading).show();
        $(span).html('Purging');

        $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_purge_cdn'}, function (response) {

            if (response.success) {
                $(btn).removeClass('loading');
                $(loading).hide();
                $(span).html('Purge CDN');
            } else {
                alert('Oops! We weren\'t able to purge your CDN! :(');
            }
        });

        return false;
    });

    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    $('.whole-checkbox-autopilot>div').on('click', function (e) {
        e.preventDefault();

        if ($(this).parent().hasClass('disabled-no-popup')) {
            return false;
        }
        if ($(this).parent().hasClass('disabled')) {
            // Disable Local Popup
            return false;

            Swal.fire({
                title: '',
                html: jQuery('#local-disabled-popup').html(),
                width: 900,
                showCancelButton: true,
                cancelButtonColor: '#fdfdfd',
                cancelButtonText: "Ok",
                showConfirmButton: false,
                customClass: {
                    container: 'no-padding-popup-bottom-bg switch-legacy-popup local-disabled-popup',
                },
                onOpen: function () {


                }
            });
            return false;
        }

        saving_settings = true;
        var parent = $(this).parent();
        var input = $('input', parent);
        var setting_name = $(input).data('setting_name');
        var value = $(input).data('setting_value');
        var checked = $(input).is(':checked');
        var informative = $('span', parent);
        var div = $(parent);
        var ap_status = $(parent).data('autopilot-status');

        if (ap_status == '1') {
            // Turning OFF
            Swal.fire({
                title: '',
                html: jQuery('#legacy-enable-popup').html(),
                width: 900,
                showCancelButton: true,
                cancelButtonColor: '#fdfdfd',
                confirmButtonColor: '#fdfdfd',
                confirmButtonText: 'Switch to Local',
                cancelButtonText: "Stay on Live",
                customClass: {
                    container: 'no-padding-popup-bottom-bg switch-legacy-popup',
                },
                onOpen: function () {


                }
            }).then(function (isConfirm) {
                if (isConfirm.value == true) {

                    $(parent).data('autopilot-status', '0');

                    if ($(input).is(':checked')) {
                        $(input).prop('checked', false);
                        checked = false;
                        value = 0;
                        if (!$(informative).hasClass('no-change')) {
                            $(informative).html('Local');
                        }

                        $('.wps-ic-local-compress').show();
                        $('.wps-ic-live-compress').hide();
                    } else {
                        $(input).prop('checked', true);
                        checked = true;
                        value = 1;

                        if (!$(informative).hasClass('no-change')) {
                            $(informative).html('Live CDN');
                        }

                        $('.wps-ic-local-compress').hide();
                        $('.wps-ic-live-compress').show();
                    }

                    $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting_name, value: value, checked: checked, checkbox: true}, function (response) {
                        if (response.success) {
                            // Nothing
                            saving_settings = false;

                            $('.wps-ic-legacy-option').removeClass('wps-ic-legacy-hide').show();
                            window.location.reload();

                        } else {
                            alert('Oops! We weren\'t able to save your settings! :(');
                        }
                    });
                } else {
                    return false;
                }
            });
        } else {
            $(parent).data('autopilot-status', '1');
            if ($(input).is(':checked')) {
                $(input).prop('checked', false);
                checked = false;
                value = 0;
                if (!$(informative).hasClass('no-change')) {
                    $(informative).html('Local');
                }

                $('.wps-ic-local-compress').show();
                $('.wps-ic-live-compress').hide();
            } else {
                $(input).prop('checked', true);
                checked = true;
                value = 1;

                if (!$(informative).hasClass('no-change')) {
                    $(informative).html('Live CDN');
                }

                $('.wps-ic-local-compress').hide();
                $('.wps-ic-live-compress').show();
            }

            $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting_name, value: value, checked: checked, checkbox: true}, function (response) {
                if (response.success) {
                    // Nothing
                    saving_settings = false;

                    //$('.wps-ic-legacy-option').addClass('wps-ic-legacy-hide').hide();
                    window.location.reload();
                } else {
                    alert('Oops! We weren\'t able to save your settings! :(');
                }
            });
        }


    });


    function disable_other_toggles(action) {

        var standard = $('.whole-checkbox');

        if (action == 'disable') {
            $(standard).addClass('disable');
        } else {
            $(standard).removeClass('disable');
        }
    }


    /**
     * @since 4.35.00
     */
    $('.close-pro-btn').on('click', function (e) {
        e.preventDefault();
        $('.upgrade-to-pro-container').fadeOut(500);
        $.post(ajaxurl, {action: 'wps_ic_hide_pro_notice'}, function (response) {
            if (response.success) {

            }
        });
        return false;
    });


    /**
     * Change Optimization
     */
    $('.wps-ic-change-optimization').on('click', function (e) {
        e.preventDefault();


        var link = $(this);
        var value = $(link).data('optimization_level');

        $('input#wp-ic-setting-optimization').attr('value', value);

        $.post(ajaxurl, {action: 'wps_ic_settings_change', what: 'optimization', value: value}, function (response) {
            if (response.success) {
                // Nothing
            } else {
                alert('Oops! We weren\'t able to save your settings! :(');
            }
        });
    });


    function lockedPopup() {
        Swal.fire({
            title: '',
            html: jQuery('#locked-popup').html(),
            width: 600,
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: true,
            showCloseButton: true,
            customClass: {
                container: 'no-padding-popup-bottom-bg',
            },
            onOpen: function () {


            }
        });
        disable_other_toggles('enable');
        return false;
    }

    $('.button-locked').on('click', function (e) {
        e.preventDefault();
        return false;
    })

    $('.checkbox-container-v2.locked').on('click', function (e) {
        e.preventDefault();
        //lockedPopup();
        return false;
    });

    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    $('.whole-checkbox>div').on('click', function (e) {
        e.preventDefault();

        saving_settings = true;
        var parent = $(this).parent();
        var input = $('input', parent);
        var setting_name = $(input).data('setting_name');
        var value = $(input).data('setting_value');
        var checked = $(input).is(':checked');
        var informative = $('span', parent);
        var div = $(parent);

        if (!checked) {
            if ($(this).hasClass('locked') || $(this).parent().hasClass('locked')) {
                e.preventDefault();
                //lockedPopup();
                return false;
            }
        }

        disable_other_toggles('disable');

        // If setting is CSS/JS then change minify also
        if (setting_name == 'css' || setting_name == 'js') {
            if ($(input).is(':checked')) {

                setTimeout(function () {
                    $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting_name + '-minify', value: 0, checked: false, checkbox: true}, function (response) {
                        if (response.success) {
                            // Nothing
                            //saving_settings = false;
                            $('#' + setting_name + '-minify-toggle').prop('checked', false);
                        } else {
                            alert('Oops! We weren\'t able to save your settings! :(');
                        }
                    });
                }, 1000);

                $('.minify-' + setting_name + '-checkbox').css('display', 'none');
            } else {
                $('.minify-' + setting_name + '-checkbox').css('display', 'inline-block');
            }
        }

        if ($(input).is(':checked')) {
            $(input).prop('checked', false);
            checked = false;
            value = 0;
            if (!$(informative).hasClass('no-change')) {
                if (setting_name == 'css-minify' || setting_name == 'js-minify') {
                    $(informative).html('Minify');
                } else {
                    $(informative).html('OFF');
                }
            }
        } else {
            $(input).prop('checked', true);
            checked = true;
            value = 1;

            if (!$(informative).hasClass('no-change')) {
                if (setting_name == 'css-minify' || setting_name == 'js-minify') {
                    $(informative).html('Minify');
                } else {
                    $(informative).html('ON');
                }
            }
        }


        // Turning On?
        if (value == 1) {
            show_popup_for(setting_name);
        }

        // Is AutoPilot?
        if (setting_name == 'autopilot') {
            if ($(input).is(':checked')) {
                $(div).css('padding-top', '13px');
                $('.wp-ic-select-box.disabled').hide();
                $('.wp-ic-select-box.enabled').show();
            } else {
                $(div).css('padding-top', '40px');
                $('.wp-ic-select-box.disabled').show();
                $('.wp-ic-select-box.enabled').hide();
            }
        }


        if (setting_name == 'live_api') {
            if (checked) {
                /**
                 * Enabled Live
                 */
                $('.live-option-row').attr('style', 'opacity:1;');
                $('.ic-live-overlay').attr('style', 'display:none;opacity:0;visibility:hidden;');

                $('#ic-legacy-row').attr('style', 'opacity:0.3;position:relative;');
                $('#ic-legacy-overlay').attr('style', 'display:block;opacity:1;visibility:visible;');
            } else {
                /**
                 * Disabled Live
                 */
                $('.live-option-row').attr('style', 'opacity:0.3;position:relative;');
                $('.ic-live-overlay').attr('style', 'display:block;opacity:1;visibility:visible;');

                $('#ic-legacy-row').attr('style', 'opacity:1;');
                $('#ic-legacy-overlay').attr('style', 'display:none;opacity:0;visibility:hidden;');
            }
        }


        // Show CDN scanning popup
        if (setting_name == 'cdn' && value == 1 && checked == true) {
            show_cdn_popup();
        }


        $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting_name, value: value, checked: checked, checkbox: true}, function (response) {
            disable_other_toggles('enable');

            if (response.success) {
                // Nothing
                saving_settings = false;
            } else {
                alert('Oops! We weren\'t able to save your settings! :(');
            }
        });
    });


    function show_popup_for(setting_name) {

        if (setting_name == 'lazy' || setting_name == 'generate_adaptive' || setting_name == 'css' || setting_name == 'js' || setting_name == 'js-minify' || setting_name == 'css-minify' || setting_name == 'defer-js' || setting_name == 'css_combine') {
            show_compatibility_popup(setting_name);
        }

    }


    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    function show_compatibility_popup(popupID) {
        Swal.fire({
            title: '',
            html: jQuery('#' + popupID + '-compatibility-popup').html(),
            width: 600,
            showCancelButton: false,
            showConfirmButton: true,
            confirmButtonText: 'Okay, I Understand',
            allowOutsideClick: false,
            customClass: {
                container: 'no-padding-popup-bottom-bg switch-legacy-popup',
            },
            onOpen: function () {


            }
        });
    }


    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    $('.wp-ic-ajax-checkbox-v2').on('click', function (e) {
        e.preventDefault();

        saving_settings = true;
        var parent = $(this).parent().parent();
        var input = $('input', parent);
        var setting = $(input).data('setting_name');
        var value = $(input).data('setting_value');
        var checked = $(input).is(':checked');
        var informative = $('span', parent);

        if ($(input).is(':checked')) {
            $(input).prop('checked', false);
            checked = false;
            value = 0;
            if (!$(informative).hasClass('no-change')) {
                $(informative).html('OFF');
            }
        } else {
            $(input).prop('checked', true);
            checked = true;
            value = 1;

            if (!$(informative).hasClass('no-change')) {
                $(informative).html('ON');
            }
        }

        // Show CDN scanning popup
        if (setting == 'cdn' && value == 1 && checked == true) {
            show_cdn_popup();
        }

        $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting, value: value, checked: checked, checkbox: true}, function (response) {
            if (response.success) {
                // Nothing
                saving_settings = false;
            } else {
                alert('Oops! We weren\'t able to save your settings! :(');
            }
        });
    });


    /**
     * @since 3.3.0
     * Status: Required 5.00.00
     */
    $('.wp-ic-ajax-input').focusout(function (e) {
        e.preventDefault();

        var parent = $(this).parent();
        var input = $('input', parent);
        var setting = $(input).data('setting_name');
        var value = $(input).attr('value');

        $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_settings_change', what: setting, value: value, checked: false, checkbox: false}, function (response) {
            if (response.success) {
                // Nothing
            } else {
                alert('Oops! We weren\'t able to save your settings! :(');
            }
        });
    });


    /**
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    if ($('.wps-ic-trigger_connect').length) {
        var link = $('.wps-ic-authorize-api').attr('href');
        $.ajaxSetup({async: false, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_authorize_api'}, function (response) {
            if (response.success) {
                window.location.href = link;
            } else {
                alert(response.data);
            }
        });
    }


    /**
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    $('.button-tooltips').on('click', function (e) {
        e.preventDefault;

        var link = $(this);
        var tooltips_on = $(this).data('tooltips');

        if (tooltips_on == '0') {
            // Turn  it on
            $('span', link).html('On');
            tooltips = 1;
        } else {
            $('span', link).html('Off');
            tooltips = 0;
        }

        return false;
    });


    /**
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    $('form#wps_ic_activate_form').submit(function (e) {
        e.preventDefault();

        var error = false;
        var form = $(this);
        var loading = $('.wps-ic-form-loading-container');

        var apikey = $('input[name="apikey"]', form).val();
        var fail_test = $('input[name="fail_test"]', form).val();

        if (apikey == '') {
            $('input[name="apikey"]', form).addClass('ic_required');
            error = true;
        }

        if (error == false) {

            $(form).hide(function () {
                $(loading).show();

                Swal.fire({
                    title: '',
                    html: $('#wps-ic-connection-tests').html(),
                    showConfirmButton: false,
                    showCloseButton: false,
                    allowOutsideClick: false,
                    onOpen: function () {
                        jQuery('body').on('click', '.wps-ic-swal-close', function (e) {
                            e.preventDefault();

                            swal.close();
                        });
                    }
                });

                $.post(ajaxurl, {action: 'wps_ic_api_test', test_id: 'verify_api_key', apikey: apikey, fail_test: fail_test}, function (response) {
                    if (response.success == true) {

                        test_finished(form, loading, 'verify_api_key', 'success');

                        if (run_Ajax()) {
                            $.post(ajaxurl, {action: 'wps_ic_api_connect', apikey: apikey, fail_test: fail_test}, function (response) {
                                if (response.success == true) {

                                    test_finished(form, loading, 'finalization', 'success');

                                    $(form).hide();
                                    $(loading).hide();
                                    swal.close();

                                    Swal.fire({
                                        title: '',
                                        html: $('#wps-ic-connection-tests-done').html(),
                                        showConfirmButton: false,
                                        showCloseButton: false,
                                        allowOutsideClick: false,
                                        onOpen: function () {
                                            jQuery('body').on('click', '.wps-ic-swal-close', function (e) {
                                                e.preventDefault();
                                                swal.close();
                                            });
                                        }
                                    });

                                } else {
                                    test_finished(form, loading, 'finalization', 'failed');
                                }
                            });
                        }

                    } else {
                        test_finished(form, loading, 'verify_api_key', 'failed', response.data.code);
                    }

                });

            });

        }

        return false;
    });


    /**
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    function run_Ajax() {
        if (ajax_run == false) {
            console.log('Ajax Canceled');
            return false;
        } else {
            return true;
        }
    }


    /**
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    function test_finished(form, loading, test, status, message) {
        var swalcontainer = $('#swal2-content');
        var msg = '';
        var title = '';

        if (status == 'failed') {
            $(loading).hide();
            $(form).show();
            $('.wps-ic-swal-close', swalcontainer).attr('value', 'Close');


            $('ul>li[data-test="' + test + '"] span', swalcontainer).removeClass('running').addClass('failed');
            $('ul>li[data-test="' + test + '"] span', swalcontainer).removeClass('fa-dot-circle').addClass('fa-check');

            if (test == 'verify_api_key') {
                msg = 'Your api key does not match our records.';
                title = 'API Key Validation';
            } else if (test == 'communication_with_portal') {
                msg = 'Your site cannot communicate with the portal.';
                title = 'Portal Communication';
            } else if (test == 'image_compress') {

                if (message == 'unable_upload') {
                    msg = 'We were not able to upload & optimize a test image.';
                } else if (message == 'unable_compress') {
                    msg = 'We were not able to compress the test image.';
                } else if (message == 'no_attachments') {
                    msg = 'We did not find any attachments to compress.';
                }

                title = 'Image Compress';
            } else if (test == 'image_restore') {

                if (message == 'unable_restore') {
                    msg = 'We were not able to restore the test image.';
                }

                title = 'Image Restore';
            }

            swal.close();

            $('ul>li', '#wps-ic-test-error').html('<span class="fas"></span> ' + title);
            $('ul>li span', '#wps-ic-test-error').addClass('failed');
            $('ul>li span', '#wps-ic-test-error').addClass('fa-times');
            $('.ic-error-msg', '#wps-ic-test-error').html(msg);

            Swal.fire({
                title: '',
                html: $('#wps-ic-test-error').html(),
                showConfirmButton: false,
                showCloseButton: true,
                allowOutsideClick: false,
                onOpen: function () {
                    jQuery('body').on('click', '.wps-ic-swal-close', function (e) {
                        e.preventDefault();
                        window.location.reload();
                        swal.close();
                    });

                },
                onClose: function () {
                    window.location.reload();
                }
            });

        } else {
            $('ul>li[data-test="' + test + '"] span', swalcontainer).removeClass('running').addClass('success');
            $('ul>li[data-test="' + test + '"] span', swalcontainer).removeClass('fa-dot-circle').addClass('fa-check');
        }
    }


    /**
     * Authorize with remote API
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    $('.wps-ic-authorize-api').on('click', function (e) {

        $.ajaxSetup({async: false, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_authorize_api'}, function (response) {
            if (response.success) {
                window.location.reload();
            } else {
                alert(response.data);
            }
        });

    });


    /**
     * Deauthorize with remote API
     * @since 3.3.0
     * Status: Maybe not required? TODO
     */
    $('.wps-ic-deauthorize-api').on('click', function (e) {

        $.ajaxSetup({async: false, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_deauthorize_api'}, function (response) {
            if (response.success) {
                window.location.reload();
            } else {
                alert(response.data);
            }
        });

    });


});