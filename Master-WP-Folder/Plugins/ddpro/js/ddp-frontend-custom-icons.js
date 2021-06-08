jQuery(document).ready(function($) {

    setInterval(function() {
        $('span.et-pb-icon').each(function() {
            var this_content = $(this).text();

            if (this_content.indexOf('ddp') > -1) {
                //console.log(this_content);
                symbol_data = this_content.split("|");
                if (symbol_data.length >= 1) {
                    // FA
                    if (this_content.indexOf('ddp-fa-icon') > -1) $(this).addClass('ddp-divi-icon ddp-fa-icon');
                    // MD
                    if (this_content.indexOf('ddp-md-icon') > -1) $(this).addClass('ddp-divi-icon ddp-md-icon');
                    $(this).html(symbol_data[2]);
                    // | symbol
                    //	console.log('symbol_data[1] '+symbol_data[1]);
                    if (this_content.indexOf('et-icon-quotations-circle') > -1) $(this).html("|");
                }
            }
        });
    }, 50);

    setInterval(function() {

        $('span.et_pb_inline_icon, a.et_pb_custom_button_icon, button.et_pb_custom_button_icon').each(function() {
            var this_content = $(this).data('icon');

           // console.log('this_content ' + this_content);


            if (this_content.indexOf('ddp') > -1) {
                //console.log(this_content);
                symbol_data = this_content.split("|");
                if (symbol_data.length >= 1) {
                    // FA
                    if (this_content.indexOf('ddp-fa-icon') > -1) $(this).addClass('ddp-divi-icon ddp-fa-icon');
                    // MD
                    if (this_content.indexOf('ddp-md-icon') > -1) $(this).addClass('ddp-divi-icon ddp-md-icon');
                    $(this).attr('data-icon', symbol_data[2]);
                    // | symbol
                    //console.log('symbol_data[1] '+symbol_data[1]);
                    if (this_content.indexOf('et-icon-quotations-circle') > -1) $(this).attr('data-icon', "|");
                }

            }
        });
    }, 50);

}); //jQuery(document).ready(function($)