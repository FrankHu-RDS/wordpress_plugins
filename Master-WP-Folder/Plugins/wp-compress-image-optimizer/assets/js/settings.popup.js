jQuery(document).ready(function ($) {

    /**
     * @since 3.3.0
     */
    $('.thumbnails-popup').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: '',
            html: jQuery('#thumbnails-popup').html(),
            width: 900,
            customClass: 'thumbnail-popup-container',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            onOpen: function () {

                var checkbox_list = $('#checkbox-list-container', '#swal2-content');
                $.post(ajaxurl, {action: 'wps_ic_get_thumbnail_checkboxes'}, function (response) {
                    if (response.success) {
                        $(checkbox_list).html(response.data.html);


                        /**
                         * Select/Deselect all
                         */
                        var checkboxes = $('.checkbox-container', '#swal2-content');
                        var all_selected = true;
                        $(checkboxes).each(function (i, item) {
                            console.log($('input', item).is(':checked'));
                            if (!$('input', item).is(':checked')) {
                                all_selected = false;
                            }
                        });

                        console.log(all_selected);

                        if (all_selected) {
                            var a = $('.wp-ic-thumbnails-select-all', '#swal2-content');
                            $('h3', a).text('Deselect All Sizes');
                            $(a).data('checked', 'true');
                            input = $(a).data('checked');
                        }

                        $('.wp-ic-thumbnails-select-all', '#swal2-content').on('click', function (e) {
                            e.preventDefault();

                            var select_all = true;
                            var a = $(this);
                            var input = $(this).data('checked');
                            var checkboxes = $('.checkbox-container', '#swal2-content');


                            if (input == 'false' || input == false) {
                                console.log('select all');
                                $('h3', a).text('Deselect All Sizes');
                                $(a).data('checked', 'true');
                                $(checkboxes).each(function (i, item) {
                                    if (!$('input', item).is(':checked')) {
                                        $(item).trigger('click');
                                    }
                                });
                            } else {
                                console.log('deselect all');
                                $('h3', a).text('Select All Sizes');
                                $(a).data('checked', 'false');
                                $(checkboxes).each(function (i, item) {
                                    if ($('input', item).is(':checked')) {
                                        $(item).trigger('click');
                                    }
                                });
                            }

                            return false;

                        });

                        $('.checkbox-container', '#swal2-content').on('click', function (e) {
                            var container = $(this);
                            var label = $('label', container);
                            var input = $('input', container);

                            if ($(input).is(':checked')) {
                                console.log('checked');
                                $(container).addClass('popup-deactivated');
                                $(input).removeClass('checked');
                                $(input).attr('checked', '');
                                $(input).removeAttr('checked');
                            } else {
                                console.log('NOT checked');
                                $(container).removeClass('popup-deactivated');
                                $(input).addClass('checked');
                                $(input).attr('checked', 'checked');
                            }
                        });

                        // Save
                        $('.popup-save', '#swal2-content').on('click', function (e) {
                            e.preventDefault();

                            var checkboxes = $('.popup-checkbox', '#swal2-content');
                            var inputs = $('input', checkboxes);
                            var selected_thumbs = '';

                            $(inputs).each(function (i, item) {
                                var checkbox = $(item);
                                var thumb_size = $(item).val();
                                var checked = $(item).is(':checked');

                                if (checked) {
                                    selected_thumbs += thumb_size + ',';
                                }
                            });

                            swal.close();
                            Swal.fire({
                                title: '',
                                html: jQuery('#ic_setting_saving').html(),
                                width: 900,
                                showCloseButton: false,
                                showCancelButton: false,
                                showConfirmButton: false,
                                closeOnClickOutside: false
                            });

                            $.post(ajaxurl, {action: 'wps_ic_settings_change', what: 'thumbnails', value: selected_thumbs}, function (response) {
                                if (response.success) {

                                    swal.close();

                                } else {
                                    alert('Oops! We weren\'t able to save your settings! :(');
                                }
                            });


                        });

                    }
                });

            },
            onClose: function () {
                swal.close();
                //$('.swal2-container').remove();
            }
        });

    });

});