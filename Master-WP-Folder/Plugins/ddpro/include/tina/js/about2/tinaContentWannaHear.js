(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var tinaContentWannaHear = 1500;

    if (isIE()) {
        tinaContentWannaHear = 5000;
    }

    if ($('body').hasClass('et-fb')) {
        tinaContentWannaHear = 10000;
    }

    setTimeout(function () {
        if($('.tina_content_wanna_hear').length !== 0){
            // $('.tina_content_wanna_hear .et_pb_image img').imgbubbles({})

            $('<svg id="svg" viewBox="0 0 1000 1000"><path id="path2"></path> <g id="dot-container"></g></svg>').insertBefore('.tina_content_wanna_hear .et_pb_image ')


            var blob2 = createBlob({
                element: document.querySelector("#path2"),
                numPoints: 7,
                centerX: 500,
                centerY: 500,
                minRadius: 200,
                maxRadius: 225,
                minDuration: 2,
                maxDuration: 5
            });



            function createBlob(options) {

                var points = [];
                var path = options.element;
                var slice = (Math.PI * 2) / options.numPoints;
                var startAngle = random(Math.PI * 2);

                var tl = new TimelineMax({
                    onUpdate: update
                });

                for (var i = 0; i < options.numPoints; i++) {

                    var angle = startAngle + i * slice;
                    var duration = random(options.minDuration, options.maxDuration);

                    var point = {
                        x: options.centerX + Math.cos(angle) * options.minRadius,
                        y: options.centerY + Math.sin(angle) * options.minRadius
                    };

                    var tween = TweenMax.to(point, duration, {
                        x: options.centerX + Math.cos(angle) * options.maxRadius,
                        y: options.centerY + Math.sin(angle) * options.maxRadius,
                        repeat: -1,
                        yoyo: true,
                        ease: Sine.easeInOut
                    });

                    tl.add(tween, -random(duration));
                    points.push(point);
                }

                options.tl = tl;
                options.points = points;

                function update() {
                    path.setAttribute("d", cardinal(points, true, 1));
                }

                return options;
            }


            function cardinal(data, closed, tension) {

                if (data.length < 1) return "M0 0";
                if (tension == null) tension = 1;

                var size = data.length - (closed ? 0 : 1);
                var path = "M" + data[0].x + " " + data[0].y + " C";

                for (var i = 0; i < size; i++) {

                    var p0, p1, p2, p3;

                    if (closed) {
                        p0 = data[(i - 1 + size) % size];
                        p1 = data[i];
                        p2 = data[(i + 1) % size];
                        p3 = data[(i + 2) % size];

                    } else {
                        p0 = i == 0 ? data[0] : data[i - 1];
                        p1 = data[i];
                        p2 = data[i + 1];
                        p3 = i == size - 1 ? p2 : data[i + 2];
                    }

                    var x1 = p1.x + (p2.x - p0.x) / 6 * tension;
                    var y1 = p1.y + (p2.y - p0.y) / 6 * tension;

                    var x2 = p2.x - (p3.x - p1.x) / 6 * tension;
                    var y2 = p2.y - (p3.y - p1.y) / 6 * tension;

                    path += " " + x1 + " " + y1 + " " + x2 + " " + y2 + " " + p2.x + " " + p2.y;
                }

                return closed ? path + "z" : path;
            }

            function random(min, max) {
                if (max == null) { max = min; min = 0; }
                if (min > max) { var tmp = min; min = max; max = tmp; }
                return min + (max - min) * Math.random();
            }

        }

    }, tinaContentWannaHear);

})(jQuery);