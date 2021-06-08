(function ($) {

    function isIE() {
        ua = navigator.userAgent;
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    var ragnarContentErik  = 1000;

    if (isIE()) {
        ragnarContentErik = 10000;
    }

    if ($('body').hasClass('et-fb')) {
        ragnarContentErik = 10000;
    }

    setTimeout(function () {

        if($('.ragnar_content_erik ').length !== 0){
            function Shape(shapeName, x, y, z) {
                this.shapeName = shapeName || "cube";
                this.rotationX = x || 0;
                this.rotationY = y || 0;
                this.rotationZ = z || 0;

                this.edges = [];
                this.vertexs = [];
                this.rotatedVertexs = [];

                this.setShape(shapeName);
            }

            Shape.prototype.setShape = function (shapeName) {
                if(shapeName) this.shapeName = shapeName;

                if (this.shapeName === "cross") {
                    this.edges = [
                        [0, 1],
                        [0, 2],
                        [0, 4],
                        [1, 3],
                        [1, 5],
                        [2, 3],
                        [2, 6],
                        [3, 7],
                        [4, 5],
                        [4, 6],
                        [5, 7],
                        [7, 6],
                        [8, 9],
                        [8, 10],
                        [8, 12],
                        [9, 11],
                        [9, 13],
                        [10, 11],
                        [10, 14],
                        [11, 15],
                        [12, 13],
                        [12, 14],
                        [13, 15],
                        [15, 14],
                        [16, 17],
                        [16, 18],
                        [16, 20],
                        [17, 19],
                        [17, 21],
                        [18, 19],
                        [18, 22],
                        [19, 23],
                        [20, 21],
                        [20, 22],
                        [21, 23],
                        [23, 22]
                    ];
                    this.vertexs = [
                        [100.0, 50.0, 50.0],
                        [100.0, -50.0, 50.0],
                        [-100.0, 50.0, 50.0],
                        [-100.0, -50.0, 50.0],
                        [100.0, 50.0, -50.0],
                        [100.0, -50.0, -50.0],
                        [-100.0, 50.0, -50.0],
                        [-100.0, -50.0, -50.0],
                        [50.0, 100.0, 50.0],
                        [50.0, -100.0, 50.0],
                        [-50.0, 100.0, 50.0],
                        [-50.0, -100.0, 50.0],
                        [50.0, 100.0, -50.0],
                        [50.0, -100.0, -50.0],
                        [-50.0, 100.0, -50.0],
                        [-50.0, -100.0, -50.0],
                        [50.0, 50.0, 100.0],
                        [50.0, -50.0, 100.0],
                        [-50.0, 50.0, 100.0],
                        [-50.0, -50.0, 100.0],
                        [50.0, 50.0, -100.0],
                        [50.0, -50.0, -100.0],
                        [-50.0, 50.0, -100.0],
                        [-50.0, -50.0, -100.0]
                    ];
                }


                if (this.shapeName === "cube") {
                    this.edges = [
                        [0, 1],
                        [0, 2],
                        [0, 4],
                        [1, 3],
                        [1, 5],
                        [2, 3],
                        [2, 6],
                        [3, 7],
                        [4, 5],
                        [4, 6],
                        [5, 7],
                        [7, 6]
                    ];
                    this.vertexs = [
                        [100.0, 100.0, 100.0],
                        [100.0, -100.0, 100.0],
                        [-100.0, 100.0, 100.0],
                        [-100.0, -100.0, 100.0],
                        [100.0, 100.0, -100.0],
                        [100.0, -100.0, -100.0],
                        [-100.0, 100.0, -100.0],
                        [-100.0, -100.0, -100.0]
                    ];
                }

                if (this.shapeName === "e") {
                    this.edges = [
                        [0, 1],
                        [1, 2],
                        [2, 3],
                        [3, 4],
                        [4, 5],
                        [5, 6],
                        [6, 7],
                        [7, 8],
                        [8, 9],
                        [9, 10],
                        [10, 11],
                        [11, 0],
                        [12, 13],
                        [13, 14],
                        [14, 15],
                        [15, 16],
                        [16, 17],
                        [17, 18],
                        [18, 19],
                        [19, 20],
                        [20, 21],
                        [21, 22],
                        [22, 23],
                        [23, 12],
                        [0, 12],
                        [1, 13],
                        [2, 14],
                        [3, 15],
                        [4, 16],
                        [5, 17],
                        [6, 18],
                        [7, 19],
                        [8, 20],
                        [9, 21],
                        [10, 22],
                        [11, 23]
                    ];
                    this.vertexs = [
                        [-100.0, -100.0, 20],
                        [100.0, -100.0, 20],
                        [100.0, -60.0, 20],
                        [-60.0, -60.0, 20],
                        [-60.0, -20.0, 20],
                        [20.0, -20.0, 20],
                        [20.0, 20.0, 20],
                        [-60.0, 20.0, 20],
                        [-60.0, 60.0, 20],
                        [100.0, 60.0, 20],
                        [100.0, 100.0, 20],
                        [-100.0, 100.0, 20],
                        [-100.0, -100.0, -20],
                        [100.0, -100.0, -20],
                        [100.0, -60.0, -20],
                        [-60.0, -60.0, -20],
                        [-60.0, -20.0, -20],
                        [20.0, -20.0, -20],
                        [20.0, 20.0, -20],
                        [-60.0, 20.0, -20],
                        [-60.0, 60.0, -20],
                        [100.0, 60.0, -20],
                        [100.0, 100.0, -20],
                        [-100.0, 100.0, -20]
                    ];
                }


                if (this.shapeName === "teserac") {
                    this.edges = [
                        [0, 1],
                        [0, 2],
                        [0, 4],
                        [1, 3],
                        [1, 5],
                        [2, 3],
                        [2, 6],
                        [3, 7],
                        [4, 5],
                        [4, 6],
                        [5, 7],
                        [7, 6],
                        [8, 9],
                        [8, 10],
                        [8, 12],
                        [9, 11],
                        [9, 13],
                        [10, 11],
                        [10, 14],
                        [11, 15],
                        [12, 13],
                        [12, 14],
                        [13, 15],
                        [15, 14],
                        [0, 8],
                        [1, 9],
                        [2, 10],
                        [3, 11],
                        [4, 12],
                        [5, 13],
                        [6, 14],
                        [7, 15]
                    ];
                    this.vertexs = [
                        [100.0, 100.0, 100.0],
                        [100.0, -100.0, 100.0],
                        [-100.0, 100.0, 100.0],
                        [-100.0, -100.0, 100.0],
                        [100.0, 100.0, -100.0],
                        [100.0, -100.0, -100.0],
                        [-100.0, 100.0, -100.0],
                        [-100.0, -100.0, -100.0],
                        [50.0, 50.0, 50.0],
                        [50.0, -50.0, 50.0],
                        [-50.0, 50.0, 50.0],
                        [-50.0, -50.0, 50.0],
                        [50.0, 50.0, -50.0],
                        [50.0, -50.0, -50.0],
                        [-50.0, 50.0, -50.0],
                        [-50.0, -50.0, -50.0]
                    ];
                }
            }

            Shape.prototype.rotateVertex = function (vertex, coord1, coord2, rotation) {
                var x = vertex[coord1];
                var y = vertex[coord2];
                var mod = Math.sqrt(x * x + y * y)
                var angle = rotation + Math.atan2(y, x);
                vertex[coord1] = mod * Math.cos(angle);
                vertex[coord2] = mod * Math.sin(angle);
            };


            Shape.prototype.update = function () {
                var i = this.vertexs.length;
                while (i--) {
                    this.rotatedVertexs[i] = this.vertexs[i].slice();
                    this.rotateVertex(this.rotatedVertexs[i], 1, 2, this.rotationX);
                    this.rotateVertex(this.rotatedVertexs[i], 0, 2, this.rotationY);
                    this.rotateVertex(this.rotatedVertexs[i], 0, 1, this.rotationZ);
                }
            };


            Shape.prototype.draw = function (ctx) {
                var offsetX = ctx.canvas.width / 2;
                var offsetY = ctx.canvas.height / 2;

                var i = this.edges.length;
                while (i--) {
                    var vertex1 = this.rotatedVertexs[this.edges[i][0]];
                    var vertex2 = this.rotatedVertexs[this.edges[i][1]];

                    ctx.beginPath();
                    ctx.moveTo(vertex1[0] + offsetX, vertex1[1] + offsetY);
                    ctx.lineTo(vertex2[0] + offsetX, vertex2[1] + offsetY);
                    ctx.shadowColor = "rgba(0, 0, 0, 0.4)";
                    ctx.shadowBlur = 20;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = offsetY;
                    ctx.stroke();
                }
            };




            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext("2d");
            var WIDTH = canvas.width = window.innerWidth;
            var HEIGHT = canvas.height = window.innerHeight;

            var shape = new Shape("cube");
// var gui = new dat.GUI();
// gui.add(settings, 'rotationX').min(0.00).max(6.28).step(0.02).onChange(update);
// gui.add(settings, 'rotationY').min(0.00).max(6.28).step(0.02).onChange(update);
// gui.add(settings, 'rotationZ').min(0.00).max(6.28).step(0.02).onChange(update);
// gui.add(settings, 'shape', ['cross', 'cube', 'e', 'teserac']).onChange(changeShape);

            window.onresize = function () {
                WIDTH = canvas.width = window.innerWidth
                HEIGHT = canvas.height = window.innerHeight;
            };

            var rX = 0;
            var rY = 0;
            var rZ = 0;
            var oX = 0;
            var oY = 0;
            document.onmousedown = document.onmousemove = function (e) {
                if (!e.which) return;

                if (e.type === "mousedown") oX = rX + e.pageX;
                if (e.type === "mousedown") oY = rY + e.pageY;
                rY = oY - e.pageY;
                rX = oX - e.pageX;

                update();
            };


            function wheelHandler(e) {
                var delta = delta || -e.detail / 3 || e.wheelDelta / 120;
                shape.rotationZ += delta/10;
            };
            document.addEventListener('mousewheel', wheelHandler, false);
            document.addEventListener('DOMMouseScroll', wheelHandler, false);

            var autoX = false;
            var autoY = false;
            var autoZ = true;

            var speed = 100;
            var x = 0;
            var y = 0;
            var z = 0;
            (function loop() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                if(autoX) rX++;
                if(autoY) rY++;
                if(autoZ) rZ++;

                x += (rX - x) / 10;
                y += (rY - y) / 10;
                z += (rZ - z) / 10;

                shape.rotationX = y * -0.01;
                shape.rotationY = x * -0.01;
                shape.rotationZ = z * -0.01;
                // shape.rotationX = rY * -0.01;
                // shape.rotationY = rX * -0.01;

                shape.update();
                shape.draw(ctx);

                requestAnimationFrame(loop);
            }());
        }


    }, ragnarContentErik)

})(jQuery);