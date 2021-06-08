(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var freddieButtonsTimeOut = 1000;

    if (isIE()) {
        freddieButtonsTimeOut = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        freddieButtonsTimeOut = 10000;
    }

    setTimeout(function () {
        // Freddie Button Rendezvous

        $('.et_pb_button_module_wrapper .et_pb_button.freddie_button_rendezvous ').prepend($('<svg class="loader1" height="39"  viewBox="0 0 46 39" width="46"  xmlns="http://www.w3.org/2000/svg" style="visibility: visible;"><g transform="matrix(1 0 0 -1 0 39)"> <rect rx="0" width="3px" height="17px"></rect> <rect rx="0" width="3px"  height="23px" x="11"></rect> <rect rx="0" width="3px"  height="27px" x="21"></rect> <rect rx="0" width="3px"  height="33px" x="31"></rect><rect rx="0" width="3px"  height="39px" x="41"></rect> </g> </svg>'));

        //    ***********************************************************************************


        function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        TweenMax.set('svg', {
            visibility: 'visible'
        });

// Loader 1


        $('.freddie_button_rendezvous').hover(
            function () {

                var selfRendezvous = this;

                const loader1Bar1Heights = [20, 22, 29, 39, 33, 32, 30, 26, 23, 17, 35, 13, 37, 15, 27, 28, 2, 23, 35, 38, 20];
                selfRendezvous.loader1Bar1Timeline = new TimelineMax({paused: true, repeat: -1});
                const loader1Bar2Heights = [39, 23, 33, 5, 30, 23, 28, 33, 12, 14, 25, 39];
                selfRendezvous.loader1Bar2Timeline = new TimelineMax({paused: true, repeat: -1});
                const loader1Bar3Heights = [15, 34, 25, 23, 30, 23, 34, 10, 39, 35, 21, 19];
                selfRendezvous.loader1Bar3Timeline = new TimelineMax({paused: true, repeat: -1});
                const loader1Bar4Heights = [30, 28, 13, 39, 21, 35, 14, 38, 34, 23, 29, 30];
                selfRendezvous.loader1Bar4Timeline = new TimelineMax({paused: true, repeat: -1});
                const loader1Bar5Heights = [39, 23, 33, 5, 30, 23, 28, 33, 12, 14, 25, 39];
                selfRendezvous.loader1Bar5Timeline = new TimelineMax({paused: true, repeat: -1});

                function tlArrayStep(element, timeline, duration, array) {
                    for (let i = 0, length = array.length; i < length; i++) {
                        timeline.to(element, duration, {height: array[i]});
                    }
                }

                tlArrayStep($(this).find('rect:nth-child(1)'), selfRendezvous.loader1Bar1Timeline, (4.3 / loader1Bar1Heights.length), loader1Bar1Heights);
                tlArrayStep($(this).find('rect:nth-child(2)'), selfRendezvous.loader1Bar2Timeline, (2 / loader1Bar2Heights.length), loader1Bar2Heights);
                tlArrayStep($(this).find('rect:nth-child(3)'), selfRendezvous.loader1Bar3Timeline, (1.4 / loader1Bar3Heights.length), loader1Bar3Heights);
                tlArrayStep($(this).find('rect:nth-child(4)'), selfRendezvous.loader1Bar4Timeline, (2 / loader1Bar4Heights.length), loader1Bar4Heights);
                tlArrayStep($(this).find('rect:nth-child(5)'), selfRendezvous.loader1Bar5Timeline, (2 / loader1Bar4Heights.length), loader1Bar5Heights);


                selfRendezvous.loader1Bar1Timeline.play();
                selfRendezvous.loader1Bar2Timeline.play();
                selfRendezvous.loader1Bar3Timeline.play();
                selfRendezvous.loader1Bar4Timeline.play();
                selfRendezvous.loader1Bar5Timeline.play();
            }, function () {
                var selfRendezvous = this;
                selfRendezvous.loader1Bar1Timeline.stop();
                selfRendezvous.loader1Bar2Timeline.stop();
                selfRendezvous.loader1Bar3Timeline.stop();
                selfRendezvous.loader1Bar4Timeline.stop();
                selfRendezvous.loader1Bar5Timeline.stop();
            }
        )
    }, freddieButtonsTimeOut)

})(jQuery);