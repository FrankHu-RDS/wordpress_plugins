        (function ($) {
            var dianaCtaTimeOut = 1000;

            if($('body').hasClass('et-fb')){
                dianaCtaTimeOut = 10000;
            }

            function isIE() {
                ua = navigator.userAgent;
                var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

                return is_ie;
            }

            if (isIE()){
                dianaCtaTimeOut = 5000;
            }

            setTimeout(function(){
                $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers').clone().addClass('duplicate_controles').insertBefore('.diana_venerable_pricing_tables .et_pb_slides');

                $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers.duplicate_controles a').each(function () {
                    var controlText = $(this).text();
                    var controlbuttonText = $('.diana_venerable_pricing_tables .et_pb_slider .et_pb_slide:nth-child('+ controlText +') .et_pb_button').text();

                    $(this).html("<span class='control_number'>"+ controlText +"</span><span class='control_text'>"+ controlbuttonText +"</span>");

                });

                $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers.duplicate_controles a').on('click', function (e) {
                    e.preventDefault();

                    var controlText = $(this).find('.control_number').text();

                    $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers.duplicate_controles a').removeClass('et-pb-active-control');
                    $(this).addClass('et-pb-active-control');

                    $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers:not(.duplicate_controles) a:nth-child('+ controlText +')').click();
                });

                $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers:not(.duplicate_controles) a').on('click', function () {


                    var controlText = $(this).text();

                    $('.diana_venerable_pricing_tables .et_pb_slider .et-pb-controllers.duplicate_controles a:nth-child('+ controlText +')').click();
                })

            },dianaCtaTimeOut)
        })(jQuery);