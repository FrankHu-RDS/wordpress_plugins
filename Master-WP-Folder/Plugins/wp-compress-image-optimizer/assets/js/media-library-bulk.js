jQuery(document).ready(function ($) {


    var BulkHeartbeatIntervalRunning = false;

    /**
     * Media Library - Heartbeat
     */
    var BulkHeartbeatInterval = setInterval(function () {

        if (!BulkHeartbeatIntervalRunning) {
            BulkHeartbeatIntervalRunning = true;
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {action: 'wps_ic_media_library_bulk_heartbeat'},
                success: function (response) {
                    BulkHeartbeatIntervalRunning = false;
                }
            });
        }

    }, 30000);


    $('.button-start-bulk-restore').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_media_library_bulk_restore_start'},
            success: function (response) {

                $('#bulk-start-container').hide();
                $('.bulk-preparing-restore').show();

                doRestoreProcess();
            }
        });
        return false;
    });


    $('.button-start-bulk-compress').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_media_library_bulk_compress_start'},
            success: function (response) {

                $('#bulk-start-container').hide();
                $('.bulk-preparing-optimize').show();

                doCompressProcess();
            }
        });
        return false;
    });


    /**
     * Start the bulk process
     */
    function doProcess_Background() {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_doBulkCompress_Background'},
            success: function (response) {

            }
        });
    }


    function updateRestoreStatusProgressCount(data) {
        var progress = $('.bulk-restore-status-progress');
        var restoredImages = $('.bulk-images-restored', progress);
        $(restoredImages).html('<h3>' + data.finished +'/' + data.total + '</h3><h5>Images Restored</h5>');
        $(progress).show();
    }


    function updateCompressStatusProgressCount(data) {
        var progress = $('.bulk-compress-status-progress');
        var compressedImages = $('.bulk-images-compressed', progress);
        var compressedThumbs = $('.bulk-thumbs-compressed', progress);
        var totalSavings = $('.bulk-total-savings', progress);
        var thumbSavings = $('.bulk-thumbs-savings', progress);
        var avgReduction = $('.bulk-avg-reduction', progress);

        $(compressedImages).html(data.progressCompressedImages);
        $(compressedThumbs).html(data.progressCompressedThumbs);
        $(totalSavings).html(data.progressTotalSavings);
        $(thumbSavings).html(data.progressThumbsSavings);
        $(avgReduction).html(data.progressAvgReduction);
        $(progress).show();
    }


    function updateStatusProgressBar(progress_percent) {
        var progress = $('.bulk-status-progress-bar');
        var progressBar = $('.progress-bar-inner', '.bulk-status-progress-bar');
        $(progress).show();
        $(progressBar).css('width', progress_percent + '%');
    }


    function FinishedRestoreProcess() {
        clearInterval(BulkHeartbeatInterval);
        var bulkFinished = $('.bulk-finished');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_getBulkStats', type:'restore'},
            success: function (response) {
                $('.bulk-status-progress-bar').hide();
                $('.bulk-status').hide();
                $(bulkFinished).show().html(response.data.html);
            }
        });
    }


    function FinishedCompressProcess() {
        clearInterval(BulkHeartbeatInterval);
        var bulkFinished = $('.bulk-finished');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_getBulkStats', type:'compress'},
            success: function (response) {
                $('.bulk-status-progress-bar').hide();
                $('.bulk-status').hide();
                $(bulkFinished).show().html(response.data.html);
            }
        });
    }


    /**
     * Start the bulk process
     */
    function doRestoreProcess() {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_doBulkRestore'},
            success: function (response) {
                if (response.success == false) {
                    clearInterval(BulkHeartbeatInterval);
                } else {
                    $('.bulk-preparing-restore').hide();
                    $('.bulk-status').html(response.data.html);
                    $('.wps-ic-bulk-before img', '.wps-ic-bulk-html-wrapper').animate({opacity: 1});
                    $('.wps-ic-bulk-after img', '.wps-ic-bulk-html-wrapper').animate({opacity: 1});
                    $('.bulk-status').fadeIn(300);
                    updateStatusProgressBar(response.data.progress);
                    updateRestoreStatusProgressCount(response.data);

                    if (response.data.leftover > 0) {
                        doRestoreProcess();
                    } else {
                        FinishedRestoreProcess();
                    }
                }
            }
        });
    }


    /**
     * Start the bulk process
     */
    function doCompressProcess() {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {action: 'wps_ic_doBulkCompress'},
            success: function (response) {
                if (response.success == false) {
                    clearInterval(BulkHeartbeatInterval);
                } else {
                    $('.bulk-preparing-optimize').hide();
                    $('.bulk-status').html(response.data.html);
                    $('.wps-ic-bulk-before img', '.wps-ic-bulk-html-wrapper').animate({opacity: 1});
                    $('.wps-ic-bulk-after img', '.wps-ic-bulk-html-wrapper').animate({opacity: 1});
                    $('.bulk-status').fadeIn(300);
                    updateStatusProgressBar(response.data.progress);
                    updateCompressStatusProgressCount(response.data);

                    if (response.data.leftover > 0) {
                        doCompressProcess();
                    } else {
                        FinishedCompressProcess();
                    }
                }
            }
        });
    }


});