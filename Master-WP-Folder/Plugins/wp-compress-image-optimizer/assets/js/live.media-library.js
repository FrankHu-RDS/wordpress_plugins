jQuery(document).ready(function ($) {

    $('.tooltip').tooltipster({
        maxWidth: '300',
    });

    $('.dropdown-toggle').on('click', function () {
        var btn = $(this);
        var group = $(this).parent();
        $(group).toggleClass('open');
    });

    /**
     * Compress Live
     * wps-ic-compress-live
     */

    

    $('.wps-ic-compress-live').on('click', function (e) {

        e.preventDefault();

        var button = $(this);
        var attachment_id = $(button).data('attachment_id');
        console.log(attachment_id);

        var parent = $('#wp-ic-image-actions-' + attachment_id);
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(parent).hide();
        $(loading).show();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_compress_live', attachment_id: attachment_id},
            success: function (response) {
                // Image data
                $('div#wp-ic-image-' + attachment_id).html(response.data.info);

                // Setup new actions
                $('div#wp-ic-image-actions-' + attachment_id).html(response.data.actions);

                $(parent).show();
                $(loading).hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
            }
        });

    });

    /**
     * Exclude
     * wps-ic-exclude-live
     */
    $('.wps-ic-exclude-live,.wps-ic-include-live').on('click', function (e) {
        e.preventDefault();

        var button = $(this);
        var attachment_id = $(button).data('attachment_id');

        var parent = $('#wp-ic-image-actions-' + attachment_id);
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(parent).hide();
        $(loading).show();


        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_exclude_live', attachment_id: attachment_id},
            success: function (response) {
                // Image data
                $('div#wp-ic-image-' + attachment_id).html(response.data.info);

                // Setup new actions
                $('div#wp-ic-image-actions-' + attachment_id).html(response.data.actions);

                $(parent).show();
                $(loading).hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
            }
        });

    });


    /**
     * Exclude Link
     * wps-ic-exclude-live-link
     */
    /*
    $('.wps-ic-exclude-live-link,.wps-ic-include-live-link').on('click', function (e) {
        e.preventDefault();

        var link = $(this);
        var action = $(link).data('action');
        var attachment_id = $(link).data('attachment_id');
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(link).hide();
        $(loading).show();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_exclude_live', attachment_id: attachment_id},
            success: function (response) {

                if (action == 'exclude') {
                    // Show include
                    $('#wps-ic-exclude-live-link-' + attachment_id).hide();
                    $('#wps-ic-include-live-link-' + attachment_id).show();
                } else {
                    // Show exclude
                    $('#wps-ic-exclude-live-link-' + attachment_id).show();
                    $('#wps-ic-include-live-link-' + attachment_id).hide();
                }

                $(loading).hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
            }
        });

    });*/


    /**
     * Single Image Restore - Click in Media Library
     */
    $('.wps-ic-restore-live').on('click', function (e) {
        e.preventDefault();

        var other_buttons = $('.wps-ic-restore-live');
        $(other_buttons).attr('disabled', 'disabled');

        setTimeout(function () {
            $(other_buttons).removeAttr('disabled');
        }, 350);

        var button = $(this);
        var attachment_id = $(button).data('image_id');

        var row = jQuery('tr#post-' + attachment_id);
        var image_info = $('.wp-ic-image-info', row);
        var image_actions = $('.wp-ic-image-actions', row);
        var loading = $('#wp-ic-image-loading-' + attachment_id);

        $(image_actions).hide();
        $(image_info).hide();
        $(loading).show();

        /****
         * Send Ajax call to WordPress and save the clicked attachmentID
         * to the Restore Queue for processing
         */
        $.ajaxSetup({async: true, cache: false});
        $.post(ajaxurl, {action: 'wps_ic_restore_live', attachment_id: attachment_id}, function (response) {

            if (response.success == true) {

                jQuery.each(response.data, function (i, item) {

                    $(item).each(function (index, attachment_data) {
                        var html = restored_image_results(attachment_data);
                        var info = get_image_info(attachment_data, 'restore');

                        $(loading).hide();
                        $(image_info).html(info).show();
                        $(image_actions).show().html(html);

                    });

                });

            }

        });


    });


    /**
     * Compare Image Compress - Click in Media library
     */
    $('.wps-ic-compare-live').on('click', function (e) {
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
                    data: {action: 'wps_ic_compare_live', attachmentID: attID},
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
    $('.wps-ic-recompress-live').on('click', function (e) {
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
                    data: {action: 'wps_ic_recompress_load', attachmentID: attID,compress_quality: compress_quality},
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
                                    $.post(ajaxurl, {action: 'wps_ic_recompress_live', attachment_id: attachmentID, compress_quality: compress_quality}, function (response) {

                                        if (response.success == true) {

                                            var table_row = $('#post-' + attachmentID);
                                            var image_info = $('.wp-ic-image-info', table_row);
                                            var image_actions = $('.wps-ic-media-actions', table_row);


                                            $.ajax({
                                                type: "POST",
                                                url: ajaxurl,
                                                data: {action: 'wps_ic_recompress_load', attachmentID: attID, compress_quality: compress_quality},
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



    function get_image_info(data, type) {
        var html = '';

        if (type == 'compress' || type== '') {
            html = '<div class="wps-ic-compressed">' +
                '<img src="' + data.info_logo + '" />' +
                '<h5>' + data.saved_percent + '%</h5>' +
                '<h5>' + data.saved + '</h5>' +
                '<h5>Saved</h5>' +
                '</div>';
        } else {
            html = '<div class="wps-ic-uncompressed">' +
                '<img src="' + data.info_logo + '" />' +
                '<h5>Not Viewed</h5>' +
                '</div>';
        }
        return html;
    }


    function compressed_image_results(data) {

        var html = '';
        html = '<div class="wps-ic-media-actions"><div class="wps-ic-half-media-actions">' +
            '<ul class="wps-ic-noncompressed-icon">' +
            '<li class="wps-ic-weight"><span class="strike">' + data.noncompressed_size + '</span></li>' +
            '</ul>' +
            '</div>' +
            '<div class="wps-ic-half-media-actions">' +
            '<ul class="wps-ic-noncompressed-icon">' +
            '<li class="wps-ic-size-compressed"><span>' + data.compressed_size + '</span></li>' +
            '</ul>' +
            '</div>' +
            '<div class="wps-ic-media-actions-toolbox">' +
            '<ul class="wps-ic-noncompressed-icon">' +
            '<li class="wps-ic-action">' +
            '<button type="button" class="btn btn-info wps-ic-restore-live" data-image_id="' + data.ID + '">Restore</button>' +
            '<button type="button" class="btn btn-compare wps-ic-recompress-live tooltip" data-image_id="' + data.ID + '" style="margin-left:5px;" title="Override."><i class="icon demo-icon icon-rocket"></i></button>' +
            '</li>' +
            '</ul>' +
            '</div></div>';
        return html;

    }

    function restored_image_results(data) {

        var html = '';
        html = '<div class="wps-ic-media-actions"><div class="wps-ic-half-media-actions">' +
            '<ul class="wps-ic-noncompressed-icon">' +
            '<li class="wps-ic-weight">' + data.noncompressed_size + '</li>' +
            '</ul>' +
            '</div>' +
            '<div class="wps-ic-media-actions-toolbox">' +
            '<ul class="wps-ic-noncompressed-icon">' +
            '<li class="wps-ic-action">' +
            '<div class="btn-group">\n' +
            '<button type="button" class="btn btn-success wps-ic-compress-live" data-image_id="' + data.ID + '">Compress</button>\n' +
            '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
            '<span class="caret"></span>\n' +
            '<span class="sr-only">Toggle Dropdown</span>\n' +
            '</button>\n' +
            '<ul class="dropdown-menu">\n' +
            '<li><a href="#" class="wps-ic-exclude-live" data-attachment_id="' + data.ID + '">Exclude</a></li>' +
            '</ul>\n' +
            '</div>' +
            '</li>' +
            '</ul>' +
            '</div></div>';
        return html;

    }

});