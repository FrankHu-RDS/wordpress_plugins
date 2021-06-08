        (function ($) {

            if($(window).width() < 981){
                $('.diana_petticoat_blurbs .image_right ').each(function () {
                    $(this).find('.et_pb_column_1_3').insertAfter( $(this).find('.et_pb_column_2_3'));
                })
            }
            var dianaBlurbsTimeOut = 1500;

            if($('body').hasClass('et-fb')){
                dianaBlurbsTimeOut = 10000;
            }

            function isIE() {
                ua = navigator.userAgent;
                var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

                return is_ie;
            }

            if (isIE()){
                dianaBlurbsTimeOut = 5000;
            }

            setTimeout(function () {



                $('.diana_great_flip_blurbs .flip_blurbs .et_pb_blurb').each(function () {
                    var imageSrc = $(this).css('background-image');
                    imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
                
                    $(this).css('background-image', "none");
                    $('<div class="blurb_image"><img src="'+ imageSrc +'"></div>').insertBefore($(this).find('h4.et_pb_module_header'));
                });

                $("#et-fb-app-frame").contents().find('.diana_great_flip_blurbs .flip_blurbs .et_pb_blurb').each(function () {

                    var imageSrc = $("#et-fb-app-frame").contents().find($(this)).css('background-image');
                    imageSrc = imageSrc.replace('url(','').replace(')','').replace(/\"/gi, "");

                    $("#et-fb-app-frame").contents().find($(this)).css('background-image', "none");

                    $('<div class="blurb_image"><img src="'+ imageSrc +'"></div>').insertBefore($("#et-fb-app-frame").contents().find($(this)).find('h4.et_pb_module_header'));
                })
            }, dianaBlurbsTimeOut)


            

        })(jQuery);