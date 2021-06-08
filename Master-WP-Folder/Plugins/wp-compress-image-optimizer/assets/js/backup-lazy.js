var elementorInvislibe = [];
var lazyImages = [];
var active;
var activeRegular;
var img_count = 1;
var browserWidth;
var forceWidth = 0;
var jsDebug = 0;

function load() {
    browserWidth = window.innerWidth;
    lazyImages = [].slice.call(document.querySelectorAll("img.wps-ic-live-cdn"));
    elementorInvisible = [].slice.call(document.querySelectorAll("section.elementor-invisible"));
    active = false;
    activeRegular = false;
    lazyLoad();
}

if (wpc_vars.js_debug == 'true') {
    jsDebug = 1;
    console.log('JS Debug is Enabled');
}

var parent_before = false;
var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

if (jsDebug) {
    console.log('Safari: ' + isSafari);
}

function lazyLoad() {
    if (active === false) {
        active = true;

        elementorInvisible.forEach(function (elementorSection) {
            if ((elementorSection.getBoundingClientRect().top <= window.innerHeight
                && elementorSection.getBoundingClientRect().bottom >= 0)
                && getComputedStyle(elementorSection).display !== "none") {
                elementorSection.classList.remove('elementor-invisible');

                elementorInvisible = elementorInvisible.filter(function (section) {
                    return section !== elementorSection;
                });
            }
        });

        lazyImages.forEach(function (lazyImage) {

            if ((lazyImage.getBoundingClientRect().top <= window.innerHeight + 400
                && lazyImage.getBoundingClientRect().bottom >= 0)
                && getComputedStyle(lazyImage).display !== "none") {

                imageExtension = '';
                imageFilename = '';

                if (typeof lazyImage.dataset.src !== 'undefined') {

                    if (lazyImage.dataset.src.endsWith('url:https')) {
                        return;
                    }

                    imageFilename = lazyImage.dataset.src;
                    imageExtension = lazyImage.dataset.src.split('.').pop();
                } else if (typeof lazyImage.src !== 'undefined') {
                    if (lazyImage.src.endsWith('url:https')) {
                        return;
                    }

                    imageFilename = lazyImage.dataset.src;
                    imageExtension = lazyImage.src.split('.').pop();
                }


                if (imageExtension !== '') {
                    if (imageExtension !== 'jpg' && imageExtension !== 'jpeg' && imageExtension !== 'gif' && imageExtension !== 'png' && imageExtension !== 'svg' && lazyImage.src.includes('svg+xml') == false && lazyImage.src.includes('placeholder.svg') == false) {
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

                // Integrations
                masonry = lazyImage.closest(".masonry");

                if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                    if (!lazyImage.src.includes('svg+xml')) {
                        lazyImage.src = 'data:image/svg+xml;charset=UTF-8,base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAwIiBoZWlnaHQ9IjEwMDAiPjxwYXRoIGQ9Ik0yIDJoMTAwMHYxMDAwSDJ6IiBmaWxsPSIjZmZmIiBvcGFjaXR5PSIwIi8+PC9zdmc+';
                    }
                }

                imageStyle = window.getComputedStyle(lazyImage);
                ImageWidthPreloaded = Math.round(parseInt(imageStyle.width));

                image_parent = lazyImage.parentNode;
                parent_style = window.getComputedStyle(image_parent);
                parent_width = Math.round(parseInt(parent_style.width));

                if (parent_width<ImageWidthPreloaded) {
                    ImageWidthPreloaded = parent_width;
                }

                imageWidth = ImageWidthPreloaded;

                imageWidthNatural = lazyImage.dataset.width;
                imageHeightNatural = lazyImage.dataset.height;

                imageIsLogo = false;

                imageClass = [].slice.call(lazyImage.classList);
                imageClass = imageClass.join(" ");
                imageIsLogoClass = imageClass.includes("logo");
                imageIsLogoSrc = imageFilename.includes("logo");

                if (imageIsLogoClass || imageIsLogoSrc) {
                    imageIsLogo = true;
                }

                if (jsDebug) {
                    console.log('Image logo: ' + imageIsLogo);
                }

                if (!imageIsLogo || typeof imageIsLogo == 'undefined') {
                    imageIsLogo = false;

                    if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                        if (!imageWidth || imageWidth == 0 || typeof imageWidth == 'undefined') {

                            if (jsDebug) {
                                console.log('Image Width Preloaded ' + imageWidth);
                            }

                            // LazyLoad Things
                            image_parent_type = lazyImage.parentNode.nodeName.toLowerCase();

                            if (image_parent_type == 'a') {
                                image_parent = lazyImage.parentNode.parentElement;
                            } else {
                                image_parent = lazyImage.parentNode;
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

                        }
                        else {
                            imgWidth = Math.round(parseInt(imageWidth));

                            // PArent
                            image_parent_type = lazyImage.parentNode.nodeName.toLowerCase();

                            if (image_parent_type == 'a') {
                                image_parent = lazyImage.parentNode.parentElement;
                            } else {
                                image_parent = lazyImage.parentNode;
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
                        image_parent = lazyImage.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    }
                }
                else {
                    if (wpc_vars.adaptive_enabled == '1' || wpc_vars.adaptive_enabled == 'true') {
                        imgWidth = 200;
                        image_parent = lazyImage.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    } else {
                        imgWidth = 1;
                        image_parent = lazyImage.parentNode;
                        parent_style = window.getComputedStyle(image_parent);
                        parent_width = Math.round(parseInt(parent_style.width));
                        parent_height = Math.round(parseInt(parent_style.height));
                    }
                }

                if (imgWidth > browserWidth) {
                    imgWidth = browserWidth;
                }

                if (!imgWidth || imgWidth == 0 || typeof imgWidth == 'undefined') {
                    imgWidth = 1;
                }

                imageRatio = imageWidthNatural / imageHeightNatural;


                if (imageRatio < 1) {
                    newWidth = (parent_height * imageRatio);
                    imgWidth = Math.round(newWidth);
                }

                if (imageIsLogo && (imgWidth < 200 || (!imgWidth || imgWidth == 0 || typeof imgWidth == 'undefined'))) {
                    imgWidth = 200;
                }

                if (forceWidth > 0 && imgWidth > 320) {
                    imgWidth = forceWidth;
                }

                if (jsDebug) {
                    console.log('Image:');
                    console.log(lazyImage);
                    console.log('Image Width: ' + imgWidth);
                }

                if (typeof lazyImage.dataset.src !== 'undefined') {
                    newApiURL = lazyImage.dataset.src;
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

                    lazyImage.src = newApiURL;
                } else {
                    if (jsDebug) {
                        console.log('Type of lazyImage is Undefined');
                        console.log(lazyImage);
                    }
                }

                lazyImage.classList.remove("wps-ic-lazy-image");
                lazyImage.classList.add("fade-in");

                lazyImages = lazyImages.filter(function (image) {
                    return image !== lazyImage;
                });


            }
        });

        active = false;
    }
}


window.addEventListener("resize", lazyLoad);
window.addEventListener("orientationchange", lazyLoad);
document.addEventListener("scroll", lazyLoad);
document.addEventListener("DOMContentLoaded", load);