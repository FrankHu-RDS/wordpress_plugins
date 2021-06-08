(function($) {

    var ctaTimeOut = 0;

    if ($('body').hasClass('et-fb')) {
        ctaTimeOut = 7000;
    }

    setTimeout(function() {

        //    Contact Form Script **********************************************

        //Remove placeholder on focus

        $('input,textarea').focus(function () {
            if ($(this).attr('placeholder') !== '') {
                $(this).attr('data-placeholder', $(this).attr('placeholder'));

                $(this).attr('placeholder', '');
            }
        });
        $('input,textarea').blur(function () {
            if ($(this).attr('placeholder') === '') {
                $(this).attr('placeholder', $(this).attr('data-placeholder'));
            }
        });

        (function($) {
            $('.form_focuse_venus .et_pb_contact_form p.et_pb_contact_field:not([data-type=checkbox]):not([data-type="radio"])').each(function() {
                $('<span class="form__placeholder"></span>').appendTo($(this));
                var spanText = $(this).find('label').text();
                $(this).find('.form__placeholder').text(spanText);
            });




            const lineEq = (y2, y1, x2, x1, currentVal) => {
                // y = mx + b
                var m = (y2 - y1) / (x2 - x1),
                    b = y1 - m * x1;
                return m * currentVal + b;
            };
            const shuffleArray = arr => arr.sort(() => Math.random() - 0.5);

            const formItems = Array.from(document.querySelectorAll('.form_focuse_venus p.et_pb_contact_field:not([data-type=checkbox]):not([data-type="radio"]).et_pb_contact_field '));
            formItems.forEach((item) => {
                const inputEl = item.querySelector('.form_focuse_venus p.et_pb_contact_field:not([data-type=checkbox]):not([data-type="radio"]) .input');
            if (inputEl) {
                const label = item.querySelector('.form_focuse_venus p.et_pb_contact_field:not([data-type=checkbox]):not([data-type="radio"]) .et_pb_contact_form_label');
                const placeholder = item.querySelector('.form_focuse_venus p.et_pb_contact_field:not([data-type=checkbox]):not([data-type="radio"]) .form__placeholder');
                charming(label);
                const labelLetters = Array.from(label.querySelectorAll('span'));

                charming(placeholder);
                const placeholderLetters = Array.from(placeholder.querySelectorAll('span'));
                const lettersTotal = placeholderLetters.length;
                const lettersPosArr = shuffleArray(Array.from(Array(lettersTotal).keys()));
                let currentVisible = lettersTotal;

                // whatever we do, start at [distanceThreshold.max]px from the element and end at [distanceThreshold.min]px from the element.
                const distanceThreshold = { min: 0, max: 50 };

                new Nearby(inputEl, {
                        onProgress: (distance) => {
                        const point = lineEq(lettersTotal, 0, distanceThreshold.max, distanceThreshold.min, distance);
                const visible = Math.max(0, Math.min(lettersTotal, Math.floor(point)));
                if (currentVisible !== visible) {
                    // hide placeholder and show label.
                    if (visible < currentVisible) {
                        for (let i = 0, len = lettersPosArr.length - visible; i < len; ++i) {
                            const letter = placeholderLetters[lettersPosArr[i]];
                            if (letter.dataset.state !== 'hidden') {
                                letter.dataset.state = 'hidden';
                                TweenMax.to(letter, 0.5, {
                                    //ease: 'Back.easeIn',
                                    ease: 'Expo.easeOut',
                                    y: '-200%',
                                    opacity: 0
                                });

                                TweenMax.to(labelLetters[lettersPosArr[i]], 0.5, {
                                    //ease: 'Back.easeOut',
                                    //delay: 0.4,
                                    ease: 'Expo.easeOut',
                                    y: '0%',
                                    startAt: { y: '200%' },
                                    opacity: 1
                                });
                            }
                        }
                    }
                    // hide label and show placeholder. (only if input doesn't have a value).
                    else if (inputEl.value.length === 0) {
                        for (let i = lettersTotal - 1, len = lettersTotal - (lettersPosArr.length - visible); i >= lettersTotal - len; --i) {
                            const letter = placeholderLetters[lettersPosArr[i]];
                            if (letter.dataset.state === 'hidden') {
                                letter.dataset.state = '';
                                TweenMax.to(letter, 0.2, {
                                    ease: 'Circ.easeOut',
                                    y: '0%',
                                    //overwrite: 'all',
                                    opacity: 1
                                });

                                TweenMax.to(labelLetters[lettersPosArr[i]], 1, {
                                    ease: 'Circ.easeOut',
                                    y: '200%',
                                    //overwrite: 'all',
                                    opacity: 0
                                });
                            }
                        }
                    }

                    if (visible <= 0) {
                        inputEl.focus();
                    }

                    currentVisible = visible;

                }
            }
            });

                inputEl.addEventListener('input', () => {
                    if (inputEl.value.length !== 0) {
                    placeholder.style.opacity = 0;
                } else {
                    placeholder.style.opacity = 1;
                }
            });
            }
        });
        })(jQuery);



        $(' .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').focus(function() {
            $(this).parent("p").addClass("focus");
        });

        $('.et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) input,  .et_pb_contact .et_pb_contact_form  p:not([data-type="checkbox"]) textarea').blur(function() {
            if ($(this).val()) {
                $(this).parent().addClass("filled");
            } else {
                $(this).parent().removeClass("filled");
            }
            $(this).parent("p").removeClass("focus");
        });



        $('.contact_form1_venus .et_pb_blurb').on('click', function(event) {
            var pageUrl = $(this).find('.et_pb_main_blurb_image a').attr('href');
            var pageUrlTarget = $(this).find('.et_pb_main_blurb_image a').attr('target');
            if (pageUrl) {
                if (pageUrlTarget) {
                    event.preventDefault();
                    window.open(pageUrl, '_blank');
                } else {
                    event.preventDefault();
                    window.location.href = pageUrl;
                }
            }
        });

        //    End Contact Form Script **********************************************

    }, ctaTimeOut);

})(jQuery);