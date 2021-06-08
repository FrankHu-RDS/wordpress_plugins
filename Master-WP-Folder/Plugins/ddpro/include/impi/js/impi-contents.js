 (function ($) {

            if ($(window).width() <= 1280) {
                $('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .image_row').insertBefore($('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .text_row'))
            }

            $(window).resize(function () {
                if ($(window).width() <= 1280) {
                    $('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .image_row').insertBefore($('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .text_row'))
                } else {
                    $('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .image_row').insertAfter($('#page-container #main-content .impi_stories_content .impi_stories_content_row_pink .text_row'))
                }
            })

        })(jQuery);