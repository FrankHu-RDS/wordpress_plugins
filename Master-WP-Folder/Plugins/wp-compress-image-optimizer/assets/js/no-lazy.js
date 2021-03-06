var regularImages = [];
var pictureTag = [];
var active;
var activeRegular;
var img_count = 1;
var browserWidth;
var forceWidth = 0;
var jsDebug = 0;

var WPCgetParents = function (elem) {

    // Set up a parent array
    var parents = [];

    // Push each parent element to the array
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
        if (elem.childElementCount > 1) {
            break;
        } else {
            parents.push(elem);
        }
    }

    // Return our parent array
    return parents;

};

function load() {
    browserWidth = window.innerWidth;
    regularImages = [].slice.call(document.querySelectorAll("img"));
    pictureTag = [].slice.call(document.querySelectorAll("picture.wps-ic-picture-tag"));
    active = false;
    activeRegular = false;
    regularLoad();
    pictureLoad();
}

if (wpc_vars.js_debug == 'true') {
    jsDebug = 1;
    console.log('JS Debug is Enabled');
}

var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

if (jsDebug) {
    console.log('Safari: ' + isSafari);
}
function pictureLoad() {
    pictureTag.forEach(function (pictureImage) {

        imgWidth = 0;
        var children = pictureImage.children;
        var pictureParent = WPCgetParents(pictureImage.parentNode);

        var last = Object.keys(pictureParent)[pictureParent.length - 1];
        pictureParent = Object.values(pictureParent)[last];

        parent_style = window.getComputedStyle(pictureParent);
        var widthIsPercent = parent_style.width.indexOf("%") > -1;

        if (widthIsPercent) {
            pictureParent = pictureParent.parentNode;
            parent_style = window.getComputedStyle(pictureParent);
        }

        var widthIsPercent = parent_style.width.indexOf("%") > -1;
        if (widthIsPercent) {
            parent_width = 1;
        } else {
            parent_width = Math.round(parseInt(parent_style.width));
        }

        if ((parent_width !== 0 && typeof parent_width !== 'undefined')) {
            // We found a great image size, use it
            imgWidth = parent_width;
        } else {
            imgWidth = 1;
        }

        for (var i = 0; i < children.length; i++) {
            var srcset = children[i].srcset;
            var src = children[i].src;
            if (srcset) {

                newApiURL = children[i].srcset;
                newApiURL = newApiURL.replace(/w:(\d{1,5})/g, 'w:' + imgWidth);

                if (window.devicePixelRatio >= 2 && wpc_vars.retina_enabled == 'true') {
                    newApiURL = newApiURL.replace(/retina:false/g, 'retina:true');

                    if (jsDebug) {
                        console.log('Retina set to True');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                } else {
                    newApiURL = newApiURL.replace(/retina:true/g, 'retina:false');

                    if (jsDebug) {
                        console.log('Retina set to False');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                }

                if (wpc_vars.webp_enabled == 'true' && isSafari == false) {
                    newApiURL = newApiURL.replace(/webp:false/g, 'webp:true');

                    if (jsDebug) {
                        console.log('WebP set to True');
                    }

                } else {
                    newApiURL = newApiURL.replace(/webp:true/g, 'webp:false');

                    if (jsDebug) {
                        console.log('WebP set to False');
                    }

                }

                if (wpc_vars.exif == 'true') {
                    newApiURL = newApiURL.replace(/exif:false/g, 'exif:true');
                } else {
                    newApiURL = newApiURL.replace(/exif:true/g, '');
                    newApiURL = newApiURL.replace(/exif:false/g, '');
                }

                children[i].srcset = newApiURL;
            }
            if (src) {

                newApiURL = children[i].src;
                newApiURL = newApiURL.replace(/w:(\d{1,5})/g, 'w:' + imgWidth);

                if (window.devicePixelRatio >= 2 && wpc_vars.retina_enabled == 'true') {
                    newApiURL = newApiURL.replace(/retina:false/g, 'retina:true');

                    if (jsDebug) {
                        console.log('Retina set to True');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                } else {
                    newApiURL = newApiURL.replace(/retina:true/g, 'retina:false');

                    if (jsDebug) {
                        console.log('Retina set to False');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                }

                if (wpc_vars.webp_enabled == 'true' && isSafari == false) {
                    newApiURL = newApiURL.replace(/webp:false/g, 'webp:true');

                    if (jsDebug) {
                        console.log('WebP set to True');
                    }

                } else {
                    newApiURL = newApiURL.replace(/webp:true/g, 'webp:false');

                    if (jsDebug) {
                        console.log('WebP set to False');
                    }

                }

                if (wpc_vars.exif == 'true') {
                    newApiURL = newApiURL.replace(/exif:false/g, 'exif:true');
                } else {
                    newApiURL = newApiURL.replace(/exif:true/g, '');
                    newApiURL = newApiURL.replace(/exif:false/g, '');
                }

                children[i].src = newApiURL;
            }
        }


    });
}

function regularLoad() {
    if (activeRegular === false) {
        activeRegular = true;

        regularImages.forEach(function (Image) {

            if (Image.classList.contains('wpc-no-lazy-loaded')) {
                return;
            }

            imageExtension = '';

            if (typeof Image.dataset.src !== 'undefined') {
                imageExtension = Image.dataset.src.split('.').pop();
            } else if (typeof Image.src !== 'undefined') {
                imageExtension = Image.src.split('.').pop();
            }

            if (imageExtension !== '') {
                if (imageExtension !== 'jpg' && imageExtension !== 'jpeg' && imageExtension !== 'gif' && imageExtension !== 'png' && imageExtension !== 'svg') {
                    return;
                }
            }


            if (wpc_vars.speed_test == '1') {
                if (img_count >= 6) {
                    return;
                } else {
                    forceWidth = 320;
                }

                img_count++;
            }


            if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                if (!Image.src.includes('svg+xml')) {
                    Image.src = 'data:image/svg+xml;charset=UTF-8,base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAwIiBoZWlnaHQ9IjEwMDAiPjxwYXRoIGQ9Ik0yIDJoMTAwMHYxMDAwSDJ6IiBmaWxsPSIjZmZmIiBvcGFjaXR5PSIwIi8+PC9zdmc+';
                }
            }


            imageStyle = window.getComputedStyle(Image);
            ImageWidthPreloaded = Math.round(parseInt(imageStyle.width));

            image_parent = WPCgetParents(Image);

            if (jsDebug) {
                console.log('lazyImage parent:');
                console.log(image_parent);
                console.log(image_parent.length);
                console.log(Object.keys(image_parent)[image_parent.length - 1]);
                console.log('--lazyImage parent end--');
            }

            var last = Object.keys(image_parent)[image_parent.length-1];
            image_parent = Object.values(image_parent)[last];

            parent_style = window.getComputedStyle(image_parent);
            var widthIsPercent = parent_style.width.indexOf("%") > -1;

            if (widthIsPercent) {
                image_parent = image_parent.parentNode;
                parent_style = window.getComputedStyle(image_parent);
            }

            var widthIsPercent = parent_style.width.indexOf("%") > -1;
            if (widthIsPercent) {
                parent_width = 1;
            } else {
                parent_width = Math.round(parseInt(parent_style.width));
            }

            if (jsDebug) {
                console.log(image_parent);
                console.log(parent_style);
                console.log('Parent Width: ' + parent_style.width);
                console.log('--lazyImage parent end--');
            }

            if ((parent_width !== 0 && typeof parent_width !== 'undefined')) {
                // We found a great image size, use it
                imgWidth = parent_width;
            }
            else {

                imageWidth = ImageWidthPreloaded;

                imageFilename = Image.dataset.src;
                imageWidthNatural = Image.dataset.width;
                imageHeightNatural = Image.dataset.height;

                imageIsLogo = false;

                imageClass = [].slice.call(Image.classList);
                imageClass = imageClass.join(" ");
                imageIsLogoClass = imageClass.includes("logo");
                imageIsLogoSrc = imageFilename.includes("logo");

                if (imageIsLogoClass || imageIsLogoSrc) {
                    imageIsLogo = true;
                }

                if (jsDebug) {
                    console.log('Image logo: ' + imageIsLogo);
                }

                if (typeof imageIsLogo == 'undefined' || !imageIsLogo) {
                    imageIsLogo = false;

                    if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                        if (!imageWidth || imageWidth == 0 || typeof imageWidth == 'undefined') {

                            if (jsDebug) {
                                console.log('Image Width Preloaded ' + imageWidth);
                            }

                            // LazyLoad Things
                            image_parent_type = Image.parentNode.nodeName.toLowerCase();

                            if (image_parent_type == 'a') {
                                image_parent = Image.parentNode.parentElement;
                            } else {
                                image_parent = Image.parentNode;
                            }

                            parent_style = window.getComputedStyle(image_parent);


                            if (parent_style.width == 'auto') {
                                image_parent = image_parent.parentNode;
                                parent_style = window.getComputedStyle(image_parent);
                            }

                            parent_width = Math.round(parseInt(parent_style.width));
                            imgWidth = Math.round(parseInt(parent_style.width));

                            if (jsDebug) {
                                console.log('Image Width set to: ' + imgWidth);
                                console.log(image_parent);
                            }

                            if (imgWidth == parent_width) {
                                image_parent = image_parent.parentNode;
                                parent_style = window.getComputedStyle(image_parent);
                                parent_width = Math.round(parseInt(parent_style.width));
                            }

                            if (jsDebug) {
                                console.log('Parent set to #131: ' + image_parent);
                            }

                            if (isNaN(imgWidth) || imgWidth <= 0) {
                                imgWidth = browserWidth;
                            }

                        } else {
                            imgWidth = Math.round(parseInt(imageWidth));

                            // PArent
                            image_parent_type = Image.parentNode.nodeName.toLowerCase();

                            if (image_parent_type == 'a') {
                                image_parent = Image.parentNode.parentElement;
                            } else {
                                image_parent = Image.parentNode;
                            }

                            parent_style = window.getComputedStyle(image_parent);
                            parent_width = Math.round(parseInt(parent_style.width));
                            parent_height = Math.round(parseInt(parent_style.height));

                            if (jsDebug) {
                                console.log('Image Width set to #158: ' + imgWidth);
                                console.log(image_parent);
                                console.log(parent_width);
                            }

                            if (isNaN(parent_width)) {
                                image_parent = image_parent.parentNode;
                                parent_style = window.getComputedStyle(image_parent);
                                parent_width = Math.round(parseInt(parent_style.width));
                                parent_height = Math.round(parseInt(parent_style.height));
                            }

                            if (imgWidth == parent_width) {
                                image_parent = image_parent.parentNode;
                                parent_style = window.getComputedStyle(image_parent);
                                parent_width = Math.round(parseInt(parent_style.width));
                                parent_height = Math.round(parseInt(parent_style.height));
                            }


                            if (isNaN(imgWidth) || isNaN(parent_width)) {
                                imgWidth = browserWidth;
                            }

                            if (imgWidth > browserWidth) {
                                imgWidth = browserWidth;
                            }

                        }
                    } else {
                        imgWidth = 1;
                        image_parent = Image.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    }
                } else {
                    if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                        imgWidth = 200;
                        image_parent = Image.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    } else {
                        imgWidth = 1;
                        image_parent = Image.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    }
                }


                if (imgWidth > browserWidth) {
                    imgWidth = browserWidth;
                }

                if (typeof imgWidth == 'undefined' || !imgWidth || imgWidth == 0) {
                    imgWidth = 1;
                }

                imageRatio = imageWidthNatural / imageHeightNatural;


                if (typeof parent_height == 'undefined' || !parent_height || parent_height == 0) {
                    parent_height = Math.round(parseInt(parent_style.height));
                }

                if (typeof parent_height == 'undefined' || !parent_height || parent_height == 0) {
                    parent_height = Image.dataset.height;
                }

                if (imageRatio < 1) {
                    newWidth = (parent_height * imageRatio);
                    imgWidth = Math.round(newWidth);
                }


                if (typeof imgWidth == 'undefined' || imageIsLogo && (imgWidth < 200 || (!imgWidth || imgWidth == 0))) {
                    imgWidth = 200;
                }

            }

            if (forceWidth > 0 && imgWidth > 320) {
                imgWidth = forceWidth;
            }

            if (jsDebug) {
                console.log('Image:');
                console.log(Image);
                console.log('Image Width: ' + imgWidth);
            }

            if (isNaN(imgWidth) || imgWidth<=0) {
                imgWidth = 1;
            }

            if (typeof Image.dataset.src !== 'undefined') {
                newApiURL = Image.dataset.src;
                newApiURL = newApiURL.replace(/w:(\d{1,5})/g, 'w:' + imgWidth);

                if (window.devicePixelRatio >= 2 && wpc_vars.retina_enabled == 'true') {
                    newApiURL = newApiURL.replace(/retina:false/g, 'retina:true');

                    if (jsDebug) {
                        console.log('Retina set to True');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                } else {
                    newApiURL = newApiURL.replace(/retina:true/g, 'retina:false');

                    if (jsDebug) {
                        console.log('Retina set to False');
                        console.log('DevicePixelRation ' + window.devicePixelRatio);
                    }

                }

                if (wpc_vars.webp_enabled == 'true' && isSafari == false) {
                    newApiURL = newApiURL.replace(/webp:false/g, 'webp:true');

                    if (jsDebug) {
                        console.log('WebP set to True');
                    }

                } else {
                    newApiURL = newApiURL.replace(/webp:true/g, 'webp:false');

                    if (jsDebug) {
                        console.log('WebP set to False');
                    }

                }

                if (wpc_vars.exif == 'true') {
                    newApiURL = newApiURL.replace(/exif:false/g, 'exif:true');
                } else {
                    newApiURL = newApiURL.replace(/exif:true/g, '');
                    newApiURL = newApiURL.replace(/exif:false/g, '');
                }

                Image.src = newApiURL;
            } else {
                if (jsDebug) {
                    console.log('Type of lazyImage is Undefined');
                    console.log(Image);
                }
            }

            Image.style.opacity = 0;
            Image.classList.add("ic-fade-in");
            Image.classList.add("wpc-no-lazy-loaded");
            Image.style.opacity = 1;

            //Image.src = newApiURL;
            //Image.classList.add("wpc-no-lazy-loaded");

        });

        activeRegular = false;
    }
}

window.addEventListener("resize", regularLoad);
window.addEventListener("orientationchange", regularLoad);
document.addEventListener("scroll", regularLoad);
document.addEventListener("DOMContentLoaded", load);