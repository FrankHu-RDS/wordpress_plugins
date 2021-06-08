jQuery(document).ready(function ($) {

    var credits = 0;
    var credit_unit = 'KB';

    $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_get_credits_ajax'},
        function(response){

            var data = response.data.data;
            credit_unit = data.unit;

            if (data.type == 'shared') {
                if (data.credits > 0) {
                    credits = data.credits;
                } else {
                    credits = 0;
                    credit_unit = "KB";
                }
            } else {
                if (data.credits > 0) {
                    credits = data.credits;
                } else {
                    credits = 0;
                    credit_unit = "KB";
                }
            }
        }
    );

    $('.tooltip').tooltipster({
        maxWidth: '300',
    });

    $('.dropdown-toggle').on('click', function () {
        var btn = $(this);
        var group = $(this).parent();
        $(group).toggleClass('open');
    });

    /**
     * Switch Box
     * @since 3.3.0
     */
    $('a', '.recompress-form .wp-ic-select-box').on('click', function (e) {
        e.preventDefault();

        var link = $(this);
        var li = $(this).parent();
        var ul = $(li).parent();
        var div = $(ul).parent();

        if ($(div).hasClass('disabled')) {
            return false;
        }

        $('li', ul).removeClass('current');
        $(link).parent().addClass('current');
    });

    /**
     * Before Unload function
     */

    /**
     * Compress Next In Queue
     */
    function library_compress_next_in_queue() {

        $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {action: 'wps_ic_library_compress_next_in_queue'},
                success: function (response) {

                    if (response.success == false || response.success == 'false') {
                    } else {

                        setTimeout(function () {
                            library_compress_next_in_queue();
                        }, 2500);
                    }

                },
                error: function (response) {
                    setTimeout(function () {
                        library_compress_next_in_queue();
                    }, 2500);
                }
            }
        );

    }


    function anythingQueued() {


        fetchLibraryCompressedImages();
        //fetchLibraryRestoredImages();
        //fetchUnCompressedImages();

    }

    //var checkQueue = setInterval(function () {
    anythingQueued();
    //}, 10000);


    /***
     * Get all compressed images which have not been updated in table
     */
    var checks = 10;
    function fetchLibraryCompressedImages() {
        jQuery.post(ajaxurl, {action: 'get_library_compressed_images'}, function (response) {

            if (response.data == 'compressing') {
                return true;
            }

            console.log('Compressed images: ');
            console.log(response.data);

            if (response.success) {
                jQuery.each(response.data, function (i, item) {
                    var row = jQuery('tr#post-' + i);
                    var info = jQuery('div#wp-ic-image-' + i);
                    var actions = jQuery('div#wp-ic-image-actions-' + i);

                    jQuery(info).html(item.info);
                    jQuery(actions).html(item.actions);

                    jQuery('#wp-ic-image-loading-' + i).hide();
                    jQuery(actions).show();
                    //doQueue();
                });
            } else {
                if (checks>0) {
                    checks--;
                    setTimeout(function () {
                        anythingQueued();
                    }, 8000);
                }
            }
        });
    }


    /***
     * Get all restored images which have not been updated in table
     */
    function fetchLibraryRestoredImages() {
        jQuery.post(ajaxurl, {action: 'get_library_restored_images'}, function (response) {


            if (response.data == 'restoring') {
                return true;
            }

            if (response.success) {
                jQuery.each(response.data, function (i, item) {
                    var row = jQuery('tr#post-' + i);
                    var info = jQuery('div#wp-ic-image-' + i);
                    var actions = jQuery('div#wp-ic-image-actions-' + i);

                    jQuery(info).html(item.info);
                    jQuery(actions).html(item.actions);

                    jQuery('#wp-ic-image-loading-' + i).hide();
                    jQuery(actions).show();
                    //doQueue();
                });
            }
        });
    }


    /**
     * Single Image Restore - Click in Media Library
     */
    $('.wps-ic-restore-single').on('click', function (e) {
        e.preventDefault();

        var other_buttons = $('.wps-ic-restore-single');
        $(other_buttons).attr('disabled', 'disabled');

        setTimeout(function () {
            $(other_buttons).removeAttr('disabled');
        }, 350);

        var button = $(this);
        var attachment_id = $(button).data('image_id');
        var type = $(button).data('type');

        var parent = $('#wp-ic-image-actions-' + attachment_id);
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(parent).hide();
        $(loading).show();

        /****
         * Send Ajax call to WordPress and save the clicked attachmentID
         * to the Restore Queue for processing
         */
        $.ajaxSetup({async: true, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_restore_single_btn', attachment_id: attachment_id, type: type}, function (response) {

            if (response.success == true) {
                setTimeout(function () {
                    anythingQueued();
                }, 3000);
            }

        });


    });


    /**
     * Compare Image Compress - Click in Media library
     */
    $('.wps-ic-compare-single').on('click', function (e) {
        e.preventDefault();

        var attID = $(this).data('image_id');

        // ic_compare_popup
        Swal.fire({
            title: '',
            html: jQuery('#ic_compare_loading').html(),
            width: 900,
            customClass: 'compare-popup-container',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            onOpen: function () {

                $.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: {action: 'wps_ic_compare_results', attachmentID: attID},
                    success: function (response) {

                        if (response.success) {
                            var compare_popup = jQuery('#ic_compare_popup');
                            $('.left-option img.original', compare_popup).attr('src', response.data.original);
                            $('.left-option span.original', compare_popup).html('' + response.data.original_size + '');
                            $('.right-option img.compressed', compare_popup).attr('src', response.data.compressed);
                            $('.right-option span.compressed', compare_popup).html('' + response.data.compressed_size + '');
                            $('.results', compare_popup).html('' + response.data.results + '');
                            $('.mb-savings', compare_popup).html('' + response.data.mb_savings + '');
                        }

                        Swal.fire({
                            title: '',
                            html: jQuery('#ic_compare_popup').html(),
                            width: 900,
                            customClass: 'compare-popup-container',
                            showCloseButton: true,
                            showCancelButton: false,
                            showConfirmButton: false,
                            onOpen: function () {


                            },
                            onClose: function () {

                            }
                        });

                    }
                });

            },
            onClose: function () {

            }
        });

        return false;
    });


    /**
     * Recompress Image - Click in Media library
     */
    $('.wps-ic-recompress-single').on('click', function (e) {
        e.preventDefault();

        var attID = $(this).data('image_id');
        var compress_quality = '';
        var original_uri = '';
        var attachmentID = attID;
        var resize = true;
        var resize_size = 0;

        Swal.fire({
            title: '',
            html: jQuery('#ic_recompress_loading').html(),
            width: 900,
            customClass: 'compare-popup-container',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            onOpen: function () {

                $.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: {action: 'wps_ic_recompress_init', attachmentID: attID},
                    success: function (response) {

                        if (response.success) {
                            var compare_popup = jQuery('#ic_recompress_popup');
                            $('.left-option img.original', compare_popup).attr('src', response.data.original);
                            $('.left-option span.original', compare_popup).html('' + response.data.original_size + '');

                            $('.right-option img.compressed', compare_popup).attr('src', response.data.compressed);
                            $('.right-option span.compressed', compare_popup).html('' + response.data.compressed_size + '');
                            $('.results', compare_popup).html('' + response.data.results + '');
                            $('.mb-savings', compare_popup).html('' + response.data.mb_savings + '');

                            original_uri = response.data.original;
                            compress_quality = response.data.compress_quality;
                        }


                        jQuery('.recompress-form .wp-ic-select-box a').parent().removeClass('current');
                        jQuery('.recompress-form .wp-ic-select-box a[data-optimization_level="' + compress_quality + '"]').parent().addClass('current');

                        Swal.fire({
                            title: '',
                            html: jQuery('#ic_recompress_popup').html(),
                            width: 900,
                            customClass: 'compare-popup-container',
                            showCloseButton: true,
                            showCancelButton: false,
                            showConfirmButton: false,
                            onOpen: function () {

                                var swal_container = $('#swal2-content');

                                resize_size = jQuery('input[name="resize_size"]', swal_container).val();
                                resize = jQuery('input[name="resize"]', swal_container).is(':checked');

                                jQuery('.recompress-form .wp-ic-select-box a', swal_container).click(function (e) {
                                    e.preventDefault();

                                    var link = $(this);
                                    var li = $(this).parent();
                                    var ul = $(li).parent();
                                    var div = $(ul).parent();

                                    if ($(div).hasClass('disabled')) {
                                        return false;
                                    }

                                    $('li', ul).removeClass('current');
                                    $(link).parent().addClass('current');

                                    compress_quality = $(link).data('optimization_level');
                                });

                                jQuery('.wp-ic-ajax-checkbox-v2', swal_container).click(function (e) {
                                    e.preventDefault();

                                    var parent = $(this).parent().parent();
                                    var input = $('input', parent);
                                    var setting = $(input).data('setting_name');
                                    var value = $(input).data('setting_value');
                                    var checked = $(input).is(':checked');
                                    value = $(input).data('setting_value');

                                    if ($(input).is(':checked')) {
                                        $(input).removeAttr('checked');
                                        checked = false;
                                        resize = false;
                                    } else {
                                        $(input).attr('checked', 'checked');
                                        checked = true;
                                        resize = true;
                                    }

                                });

                                jQuery('.recompress-form .button-recompress', swal_container).click(function (e) {
                                    e.preventDefault();

                                    var form = $('.recompress-form');

                                    $(form).hide();
                                    $('.recompress-results').hide();
                                    $('.recompress-loading').show();

                                    resize_size = jQuery('input[name="resize_size"]', swal_container).val();
                                    resize = jQuery('input[name="resize"]', swal_container).is(':checked');

                                    $.ajaxSetup({async: true, cache: false});
                                    $.post(ajaxurl, {action: 'wps_ic_single_recompress', attachment_id: attachmentID, compress_quality: compress_quality, resize: resize, resize_size: resize_size}, function (response) {

                                        if (response.success == true) {

                                            var table_row = $('#post-' + attachmentID);
                                            var image_info = $('.wp-ic-image-info', table_row);
                                            var image_actions = $('.wps-ic-media-actions', table_row);


                                            $.ajax({
                                                type: "POST",
                                                url: ajaxurl,
                                                data: {action: 'wps_ic_recompress_init', attachmentID: attID},
                                                success: function (response) {

                                                    if (response.success) {

                                                        // Percentage
                                                        $('.wps-ic-compressed>h5:first-of-type', image_info).html(response.data.percentage + '%');

                                                        // Total Saved
                                                        $('.wps-ic-compressed>h5:nth-of-type(2)', image_info).html(response.data.mb_savings);

                                                        // Old size
                                                        $('.wps-ic-weight', image_actions).html('<span class="strike">' + response.data.original_size + '</span>');
                                                        $('.wps-ic-size', image_actions).html('<span>' + response.data.dimmensions + '</span>');
                                                        $('.wps-ic-size-compressed', image_actions).html('<span>' + response.data.compressed_size + '</span>');

                                                        $('.left-option img.original', swal_container).attr('src', response.data.original);
                                                        $('.left-option span.original', swal_container).html('' + response.data.original_size + '');

                                                        $('.right-option img.compressed', swal_container).attr('src', response.data.compressed);
                                                        $('.right-option span.compressed', swal_container).html('' + response.data.compressed_size + '');
                                                        $('.results', swal_container).html('' + response.data.results + '');
                                                        $('.mb-savings', swal_container).html('' + response.data.mb_savings + '');

                                                        $(form).show();
                                                        $('.recompress-results').show();
                                                        $('.recompress-loading').hide();
                                                    }
                                                }
                                            });

                                        } else {
                                            $(form).show();
                                        }

                                    });
                                });


                            },
                            onClose: function () {

                            }
                        });

                    }
                });

            },
            onClose: function () {

            }
        });

        return false;
    });


    function show_nocredits_dialog(credits, images, unit = 'KB') {

        if (unit == '') {
            space = '';
        } else {
            space = ' ';
        }

        var images = images.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        jQuery('p.ic-content-replace', '#legacy-no-credits').html('Purchase or allocate more credits to optimize your entire library, you’ll need at least ' + images + space + unit + ', but only have ' + credits + ' ' + credit_unit + ' remaining.');
        var imgs = Math.round(credits/100);
        jQuery('.cta-btn-optimize-count', '#legacy-no-credits').html('Optimize (' + (imgs) + ') Images');


        if (credits == 0 || typeof credits == 'undefined') {
            jQuery('.cta-btn-optimize-count', '#legacy-no-credits').hide();
        }

        var html = jQuery('#legacy-no-credits').html();

        Swal.fire({
            title: '',
            html: html,
            width: 650,
            padding: 0,
            customClass: {
                container: 'no-credits-popup',
            },
            showCancelButton: false,
            showConfirmButton: false,
            cancelButtonColor: '#fdfdfd',
            confirmButtonColor: '#fdfdfd',
            confirmButtonText: 'Go to Manager',
            cancelButtonText: 'Optimize (' + credits + ') Images',
            allowOutsideClick: true,
            onBeforeOpen: () => {

            },
            onOpen: function () {
                var container = jQuery('.swal2-container');
                $('.cta-btn-optimize-count', container).on('click', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '',
                        html: jQuery('#legacy-compress-prepare').html(),
                        width: 650,
                        padding: 0,
                        customClass: {
                            container: 'no-padding-popup-bottom-bg',
                            cancelButton: 'close-white-text-bigger'
                        },
                        showConfirmButton: false,
                        showCancelButton: true,
                        cancelButtonColor: '#0091f6',
                        cancelButtonText: 'Stop',
                        allowOutsideClick: false,
                        onOpen: function () {

                            setTimeout(function () {
                                $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_legacy_compress_all', hash: Math.random().toString(36).substring(7)}, function (response) {
                                    if (response.success) {
                                        setTimeout(function () {
                                            Swal.close();
                                            window.location.reload();
                                        }, 2000);
                                    } else {
                                        alert('Oops! We weren\'t able to start the process! :(');
                                    }
                                });
                            }, 2000);

                        }
                    }).then(function(msg){
                        // function when confirm button clicked
                        if(msg.dismiss == 'cancel'){
                            $.post(wps_ic_vars.ajaxurl, {action: 'wps_ic_legacy_all_stop', hash: Math.random().toString(36).substring(7)}, function (response) {
                                if (response.success) {
                                    setTimeout(function () {
                                        Swal.close();
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    alert('Oops! We weren\'t able to stop the process! :(');
                                }
                            });
                        }

                    }, function(dismiss){
                    });

                    return false;
                });
            }
        }).then(function (isConfirm) {

            if (isConfirm.value == 'undefined') {
                // Compress all
            } else {
                // Go to Manager
                Swal.close();
                return false;
            }
        });
    }

    /**
     * Single Image Compress - Click in Media library
     */
    $('.wps-ic-compress-single').on('click', function (e) {
        e.preventDefault();

        var other_buttons = $('.wps-ic-compress-single');
        $(other_buttons).attr('disabled', 'disabled');

        setTimeout(function () {
            $(other_buttons).removeAttr('disabled');
        }, 350);

        var button = $(this);
        var attachment_id = $(button).data('image_id');
        var image_weight = $(button).data('image-weight');

        var parent = $('#wp-ic-image-actions-' + attachment_id);
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(parent).hide();
        $(loading).show();

        var left_credits = credits/1000000000;

        if (left_credits>=1) {
            // More than 1 GB
        } else {
            // Less than 1 GB
            left_credits = credits/1000000; // Left MB
            if (left_credits>=1) {
                // More than 1 MB
            } else {
                // Less than 1 MB
                show_nocredits_dialog(left_credits, image_weight, '');
                $(parent).show();
                $(loading).hide();
                return false;
            }
        }


        /****
         * Send Ajax call to WordPress and save the clicked attachmentID
         * to the Compress Queue for processing
         */
        $.ajaxSetup({async: true, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_single_compress_btn', attachment_id: attachment_id}, function (response) {

            if (response.success == true) {

                setTimeout(function () {
                    anythingQueued();
                }, 3000);


            } else {

            }

        });

        return false;
    });


});