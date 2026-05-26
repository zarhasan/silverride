/**
 * Main JavaScript for SilverRide Theme
 */

(function () {
    'use strict';

    const $ = cash;

    document.addEventListener('DOMContentLoaded', function () {
        initVideoPlayback();
        initComplianceVideo();
        initTranscriptToggles();
        initToCToggle();
        initMobileMenu();
        initHeroPageVideo();
        addProseToElementor();
        initAlternateBgHover();

        // Inject play/pause button into carousels with mt-6 md:mt-12 class
        (() => {
            const $carousel = $('[data-carousel].mt-6.md\\:mt-12');
            if (!$carousel.length) return;
            if ($carousel.find('[data-carousel-play-pause]').length) return;

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.setAttribute('data-carousel-play-pause', '');
            btn.setAttribute('aria-label', 'Pause carousel');
            btn.className = 'flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-full border border-gray-300 hover:border-gray-400 transition-colors duration-200';

            const playSpan = document.createElement('span');
            playSpan.className = 'embla__play-icon hidden';
            playSpan.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>';

            const pauseSpan = document.createElement('span');
            pauseSpan.className = 'embla__pause-icon';
            pauseSpan.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>';

            btn.appendChild(playSpan);
            btn.appendChild(pauseSpan);

            const $liveRegion = $carousel.find('[data-carousel-live-region]');
            if ($liveRegion.length) {
                $(btn).insertBefore($liveRegion);
            } else {
                $carousel.append(btn);
            }
        })();

        initAccessibleCarousels();
        initToCHighlighter();
        initFaqAccordions();

        // Add screen-reader-only h1 on thank-you page and hide visual h2 from AT
        (() => {
            if (!window.location.pathname.includes('thank-you/')) return;

            const $heading = $('h2.text-4xl');
            if (!$heading.length) return;

            $heading.attr('aria-hidden', 'true');

            const $srHeading = $('<h1 class="sr-only" tabindex="-1">Thank you for scheduling your ride</h1>');
            $heading.after($srHeading);
            $srHeading.focus();
        })();

        (() => {
            const $grid = $('[data-section-id="section_title-default"][data-heading-level="h3"] + [data-section-id^="grid-"] h3');
            if (!$grid.length) return;
            $grid.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '4',
                });
            });
        })();

        (() => {
            const $sections = $('[data-section-id="section_title-default"][data-heading-level="h2"]').nextAll('[data-section-id^="information"]');
            if (!$sections.length) return;

            $sections.each((i, el) => {
                const $headings = $(el).find('h2');
                if (!$headings.length) return;

                $headings.attr({
                    'role': 'heading',
                    'aria-level': '3',
                });
            });
        })();

        (() => {
            const $sections = $('[data-section-id="section_title-default"][data-heading-level="h1"]').nextAll('[data-section-id="leanpress_forms"]');
            if (!$sections.length) return;

            $sections.each((i, el) => {
                const $headings = $(el).find('h3');
                if (!$headings.length) return;

                $headings.attr({
                    'role': 'heading',
                    'aria-level': '2',
                });
            });
        })();

        (() => {
            const $sections = $('[data-section-id^="grid-"]');

            if (!$sections.length) return;

            $sections.each((i, el) => {
                const $headings = $(el).find('h3');
                const $links = $(el).find('a').filter((i, a) => $(a).text().trim().toLowerCase() === 'learn more');

                if (!$headings.length || !$links.length) return;

                $headings.each((j, heading) => {
                    const headingId = 'grid-heading-' + i + '-' + j;
                    $(heading).attr('id', headingId);
                    $links.eq(j).attr('aria-describedby', headingId);
                });
            });
        })();

        // On schedule-a-ride page, treat specific h2 as h1 for accessibility
        (() => {
            if (!window.location.pathname.includes('schedule-a-ride/')) return;

            const $headings = $('h2.capitalize.tracking-wide');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '1',
                });
            });
        })();

        (() => {
            if (!window.location.pathname.includes('help/')) return;

            const $headings = $('.max-w-4xl.text-center h2.font-bold.text-3xl');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '1',
                });
            });
        })();

        (() => {
            if (!window.location.pathname.includes('driver-san-francisco/')) return;

            const $headings = $('h2.font-semibold.text-3xl');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '1',
                });
            });
        })();

        (() => {
            if (!window.location.pathname.includes('support/')) return;

            const $headings = $('h2.font-bold.text-3xl');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '1',
                });
            });
        })();

        // On contact-us page, promote .prose h4 to aria-level="2" heading
        (() => {
            if (!window.location.pathname.includes('contact-us/')) return;

            const $headings = $('.prose h4');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '2',
                });
            });
        })();

        (() => {
            if (!window.location.pathname.includes('agencies/')) return;

            const $headings = $('article .prose p strong');
            if (!$headings.length) return;

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '4',
                });
            });
        })();

        (() => {
            const $desktopMenuItems = $('.primary-menu li.menu-item-has-children');
            if (!$desktopMenuItems.length) return;

            $desktopMenuItems.each(function () {
                const $link = $(this).children('a').first();
                const $submenu = $(this).children('.sub-menu').first();
                if (!$link.length || !$submenu.length) return;

                $submenu.attr('aria-label', $link.text().trim() + ' submenu');
            });

            const $menuHeatingItems = $('.primary-menu li.menu-item-has-children > a[href="#"]');
            if (!$menuHeatingItems.length) return;
            $menuHeatingItems.attr('role', 'heading').attr('aria-level', '2').removeAttr('href');
        })();

        // Dismiss desktop submenus with Escape key and restore on refocus/hover
        (() => {
            const $primaryMenu = $('.primary-menu');
            if (!$primaryMenu.length) return;

            $primaryMenu.on('keydown.dismissSubmenu', function (e) {
                if (e.key !== 'Escape') return;

                const $visibleSubMenus = $primaryMenu.find('li.menu-item-has-children > .sub-menu').filter(function () {
                    const style = window.getComputedStyle(this);
                    return style.display !== 'none' && style.visibility !== 'hidden';
                });

                if (!$visibleSubMenus.length) return;

                e.preventDefault();
                e.stopPropagation();

                $visibleSubMenus.each(function () {
                    const subMenu = this;
                    const $parentLi = $(subMenu).closest('li.menu-item-has-children');
                    const $link = $parentLi.children('a').first();

                    // Clean up any previous restoration listeners for this item
                    $parentLi.off('focusin.dismissRestore');
                    $parentLi.off('mouseenter.dismissRestore');

                    // Force-hide the submenu (overrides CSS :hover/:focus-within)
                    subMenu.style.display = 'none';

                    // Move focus to parent link if it was inside the submenu
                    if (subMenu.contains(document.activeElement) && $link.length) {
                        $link[0].focus();
                    }

                    function restoreSubmenu() {
                        subMenu.style.display = '';
                        $parentLi.off('focusin.dismissRestore');
                        $parentLi.off('mouseenter.dismissRestore');
                    }

                    // Delay binding so the synchronous focusin from .focus() is not caught
                    setTimeout(function () {
                        $parentLi.on('focusin.dismissRestore', function () {
                            restoreSubmenu();
                        });
                        $parentLi.on('mouseenter.dismissRestore', function () {
                            restoreSubmenu();
                        });
                    }, 0);
                });
            });
        })();

        (() => {
            const $sections = $('.learn-press-breadcrumb, .course-detail-info');
            if (!$sections.length) return;

            $sections.addClass('lp-content-area');
        })();

        (() => {
            const $learnPressCourse = $('#learn-press-course-description, .course-description, .lp-course-description');

            if (!$learnPressCourse.length) return;

            $learnPressCourse.addClass('prose');
            $learnPressCourse.addClass('text-lg');
        })();

        (() => {
            const $pages = $([
                '.page-lv-prasad-eye-institute',
                '.page-microsoft-documents-accessibility-training',
                '.page-pdf-accessibility-training',
                '.page-lp-privacy-policy',
                '.page-sitemap',
                '.page-terms-conditions',
                '.page-wp-drq-form'
            ].join(', '));

            const $h1 = $pages.find('h1');

            if ($h1.length > 0) return;

            const $heading = $pages.find('h2').first();

            if (!$heading.length) return;
            $heading.attr({
                'role': 'heading',
                'aria-level': '1',
            });
        })();

        (() => {
            const $page = $('.page-wp-drq-form, .page-request-a-document-form');

            if (!$page.length) return;

            const $headings = $page.find('.wpforms-field-html h3');

            $headings.each((i, el) => {
                $(el).attr({
                    'role': 'heading',
                    'aria-level': '2',
                });
            });
        })();

        (() => {
            const $grid = $('[data-section-id^="grid-"]');
            if (!$grid.length) return;

            const $h2 = $grid.find('h2').first();
            
            if ($h2.length < 1) {
                $grid.each((i, el) => {
                    const $headings = $(el).find('h3');
                    if (!$headings.length) return;
                    $headings.each((j, heading) => {
                        $(heading).attr({
                            'role': 'heading',
                            'aria-level': '2',
                        });
                    });
                });
            };
        })();

        (() => {
            const form = document.getElementById('blog-filters');
            if (!form) return;

            const search = form.querySelector('input[name="query"]');
            const category = form.querySelector('select[name="category"]');
            const sort = form.querySelector('select[name="sort"]');
            const searchSubmitBtn = form.querySelector('.blog-search-submit');

            function submitForm() {
                const params = new URLSearchParams();
                if (search && search.value.trim()) params.set('query', search.value.trim());
                if (category && category.value) params.set('category', category.value);
                if (sort && sort.value && sort.value !== 'newest') params.set('sort', sort.value);
                const qs = params.toString();
                window.location.href = window.location.pathname + (qs ? '?' + qs : '');
            }

            function updateSearchSubmitVisibility() {
                if (!searchSubmitBtn || !search) return;
                if (search.value.trim().length > 0) {
                    searchSubmitBtn.classList.add('visible');
                } else {
                    searchSubmitBtn.classList.remove('visible');
                }
            }

            if (search && searchSubmitBtn) {
                search.addEventListener('input', updateSearchSubmitVisibility);
                updateSearchSubmitVisibility();
            }

            if (category) category.addEventListener('change', submitForm);
            if (sort) sort.addEventListener('change', submitForm);

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                submitForm();
            });
        })();

        (() => {
            const $fields = $('.forminator-timepicker .forminator-field');

            $fields.each((i, field) => {
                const $label = $(field).find('.forminator-label');
                const $select = $(field).find('select.forminator-select2');

                if ($label.length) {
                    $label.insertAfter($select);
                };
            });

        })();

        // Add role="group" and aria-label to Forminator timepickers
        (() => {
            const $timeFields = $('.forminator-field-time');
            if (!$timeFields.length) return;

            $timeFields.each((i, el) => {
                const $field = $(el);
                const $timepicker = $field.find('.forminator-timepicker').first();
                if (!$timepicker.length) return;

                const $mainLabel = $field.find('.forminator-label').first();
                const labelText = $mainLabel.length ? $mainLabel.text().trim() : '';

                if (labelText) {
                    $timepicker.attr({
                        'role': 'group',
                        'aria-label': labelText,
                    });
                }
            });
        })();

        // Forminator form improvements
        (() => {
            const $forms = $('.forminator-custom-form');
            if (!$forms.length) return;

            $forms.each((i, form) => {
                const $form = $(form);
                const $msg = $form.find('.forminator-response-message');
                const $submit = $form.find('.forminator-button-submit');
                const $cols = $form.find('.forminator-row > .forminator-col');

                // Clone success/error message to appear after form
                const $msgClone = $msg.clone()
                    .removeClass('hidden')
                    .addClass('forminator-response-message-clone')
                    .hide();
                $msgClone.insertAfter($form);

                // Watch the original message for all changes, mirror to clone
                const syncClone = function () {
                    const orig = $msg[0];
                    const clone = $msgClone[0];
                    if (!orig || !clone) return;

                    // Copy all classes
                    clone.className = '';
                    orig.classList.forEach(function (cls) {
                        clone.classList.add(cls);
                    });
                    clone.classList.add('forminator-response-message-clone');

                    // Copy HTML content
                    clone.innerHTML = orig.innerHTML;

                    // Show/hide
                    if ($msg.hasClass('forminator-show')) {
                        $msgClone.show();
                    } else {
                        $msgClone.hide();
                    }
                };

                $msg.observe(syncClone, {
                    attributes: true,
                    childList: true,
                    subtree: true,
                });

                syncClone();

                // Re-enable submit button after AJAX response
                const reenable = function () {
                    $submit.removeAttr('disabled');
                };
                form.addEventListener('forminator:form:submit:success', reenable);
                form.addEventListener('forminator:form:submit:failed', reenable);

                form.addEventListener('forminator:form:submit:success', () => {
                    setTimeout(() => {
                        $msgClone.attr('tabindex', '-1').focus();
                    }, 100);
                });

                // Mark columns that contain nested columns
                $cols.each((j, col) => {
                    const $col = $(col);
                    if ($col.find('.forminator-row > .forminator-col').length) {
                        $col.addClass('forminator-col-has-children');
                    }
                });
            });
        })();

        // Add aria-labels to pagination links
        (() => {
            const $pageNumbers = $('ul.page-numbers');
            if (!$pageNumbers.length) return;

            const $links = $pageNumbers.find('a');
            if (!$links.length) return;

            $links.each(function () {
                const $link = $(this);
                const text = $link.text().trim();

                if (!text) return;

                const lowerText = text.toLowerCase();
                let label = '';

                if (lowerText === '←' || lowerText === '«' || lowerText === 'previous' || lowerText === 'prev') {
                    label = 'Go to previous page';
                } else if (lowerText === '→' || lowerText === '»' || lowerText === 'next') {
                    label = 'Go to next page';
                } else if (/^\d+$/.test(text)) {
                    label = 'Go to page ' + text;
                } else if (lowerText === '...' || lowerText === '…') {
                    label = 'More pages';
                }

                if (label) {
                    $link.attr('aria-label', label);
                }
            });
        })();
    });

    function initVideoPlayback() {
        const videoCards = document.querySelectorAll('.video-card');

        videoCards.forEach(function (card) {
            const videoType = card.dataset.videoType;

            if (videoType === 'embed') {
                initEmbedVideo(card);
            } else {
                initUploadVideo(card);
            }
        });
    }

    function initEmbedVideo(card) {
        var wrapper = card.querySelector('.video-embed-wrapper');
        if (!wrapper) return;

        var thumbnail = wrapper.querySelector('.video-thumbnail');
        var playOverlay = wrapper.querySelector('.play-button-overlay');
        var iframe = wrapper.querySelector('.video-iframe');
        var embedUrl = wrapper.dataset.embedUrl;

        if (!embedUrl) return;

        var isPlaying = false;
        var isLoaded = false;
        var playBtn = playOverlay ? playOverlay.querySelector('button') : null;
        var playBtnOriginalHTML = playBtn ? playBtn.innerHTML : '';

        var pauseBtnSVG = '<svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 96 96" fill="none"><rect x="30" y="26" width="12" height="44" rx="3" fill="#C41E3A"/><rect x="54" y="26" width="12" height="44" rx="3" fill="#C41E3A"/></svg>';

        function sendYouTubeCommand(command) {
            iframe.contentWindow.postMessage(
                JSON.stringify({ event: 'command', func: command, args: '' }),
                '*'
            );
        }

        function setButtonState(playing) {
            if (!playBtn) return;
            if (playing) {
                playBtn.innerHTML = pauseBtnSVG;
                playBtn.setAttribute('aria-label', 'Pause video');
            } else {
                playBtn.innerHTML = playBtnOriginalHTML;
                playBtn.setAttribute('aria-label', 'Play video');
            }
        }

        function playVideo() {
            if (!isLoaded) {
                if (thumbnail) thumbnail.classList.add('hidden');
                iframe.classList.remove('hidden');
                iframe.src = embedUrl + '&autoplay=1';
                isLoaded = true;
            } else {
                sendYouTubeCommand('playVideo');
                if (thumbnail) thumbnail.classList.add('hidden');
            }
            isPlaying = true;
            setButtonState(true);
        }

        function pauseVideo() {
            if (isLoaded) {
                sendYouTubeCommand('pauseVideo');
            }
            if (thumbnail) thumbnail.classList.remove('hidden');
            isPlaying = false;
            setButtonState(false);
        }

        function togglePlayPause(e) {
            e.preventDefault();
            if (isPlaying) {
                pauseVideo();
            } else {
                playVideo();
            }
        }

        playOverlay.addEventListener('click', togglePlayPause);

        wrapper.addEventListener('click', togglePlayPause);

        setButtonState(false);
    }

    function initUploadVideo(card) {
        var wrapper = card.querySelector('.video-upload-wrapper');
        if (!wrapper) return;

        var thumbnail = wrapper.querySelector('.video-thumbnail');
        var playOverlay = wrapper.querySelector('.play-button-overlay');
        var video = wrapper.querySelector('.video-element');
        var videoSrc = wrapper.dataset.videoSrc;

        if (!videoSrc || !video) return;

        video.removeAttribute('controls');

        var isPlaying = false;
        var iconCircle = playOverlay ? playOverlay.querySelector('div') : null;

        var playSVG = '<svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>';
        var pauseSVG = '<svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/></svg>';

        function setButtonState(playing) {
            if (!iconCircle) return;
            if (playing) {
                iconCircle.innerHTML = pauseSVG;
                iconCircle.setAttribute('aria-label', 'Pause video');
                iconCircle.setAttribute('role', 'button');
            } else {
                iconCircle.innerHTML = playSVG;
                iconCircle.setAttribute('aria-label', 'Play video');
                iconCircle.setAttribute('role', 'button');
            }
        }

        function playVideo() {
            if (thumbnail) thumbnail.classList.add('hidden');
            video.classList.remove('hidden');
            video.play();
            isPlaying = true;
            setButtonState(true);
        }

        function pauseVideo() {
            video.pause();
            if (thumbnail) thumbnail.classList.remove('hidden');
            isPlaying = false;
            setButtonState(false);
        }

        video.addEventListener('ended', function () {
            pauseVideo();
        });

        function togglePlayPause(e) {
            e.preventDefault();
            if (isPlaying) {
                pauseVideo();
            } else {
                playVideo();
            }
        }

        playOverlay.addEventListener('click', togglePlayPause);

        wrapper.addEventListener('click', togglePlayPause);

        setButtonState(false);
    }

    function initComplianceVideo() {
        const section = document.querySelector('.compliance-section');
        if (!section) return;

        const video = section.querySelector('.compliance-video');
        const playPauseBtn = section.querySelector('.compliance-play-pause');
        const playImg = playPauseBtn.querySelector('img:first-child');
        const pauseImg = playPauseBtn.querySelector('img:last-child');

        if (!video || !playPauseBtn || !playImg || !pauseImg) return;

        function updateButton(isPlaying) {
            if (isPlaying) {
                playImg.classList.add('hidden');
                pauseImg.classList.remove('hidden');
                playPauseBtn.setAttribute('aria-label', 'Pause video');
            } else {
                playImg.classList.remove('hidden');
                pauseImg.classList.add('hidden');
                playPauseBtn.setAttribute('aria-label', 'Play video');
            }
        }

        playPauseBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (video.paused || video.ended) {
                video.play();
                updateButton(true);
            } else {
                video.pause();
                updateButton(false);
            }
        });

        video.addEventListener('play', function () {
            updateButton(true);
        });

        video.addEventListener('pause', function () {
            updateButton(false);
        });

        video.addEventListener('ended', function () {
            updateButton(false);
        });
    }

    function initTranscriptToggles() {
        const transcriptToggles = document.querySelectorAll('.transcript-toggle');

        transcriptToggles.forEach(function (transcriptToggle) {
            const label = transcriptToggle.querySelector('.transcript-label');
            const chevronDown = transcriptToggle.querySelector('.transcript-chevron-down');
            const chevronUp = transcriptToggle.querySelector('.transcript-chevron-up');
            const content = transcriptToggle.closest('.transcript-wrapper').querySelector('.transcript-content');

            transcriptToggle.addEventListener('click', function (e) {
                e.preventDefault();
                const isOpen = !content.classList.contains('hidden');

                if (isOpen) {
                    content.classList.add('hidden');
                    label.textContent = 'Show Transcript';
                    chevronDown.classList.remove('hidden');
                    chevronUp.classList.add('hidden');
                    transcriptToggle.setAttribute('aria-expanded', 'false');
                } else {
                    content.classList.remove('hidden');
                    label.textContent = 'Hide Transcript';
                    chevronDown.classList.add('hidden');
                    chevronUp.classList.remove('hidden');
                    transcriptToggle.setAttribute('aria-expanded', 'true');
                }
            });
        });
    }

    function initToCToggle() {
        const tocToggle = document.querySelector('.toc-toggle');
        if (!tocToggle) return;

        const content = tocToggle.closest('.border').querySelector('.toc-content');
        const icon = tocToggle.querySelector('.toc-icon');

        if (!content || !icon) return;

        content.style.overflow = 'hidden';

        tocToggle.addEventListener('click', function (e) {
            e.preventDefault();
            const isExpanded = tocToggle.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                const currentHeight = content.scrollHeight;
                content.style.maxHeight = currentHeight + 'px';
                content.style.opacity = '0';
                requestAnimationFrame(function () {
                    content.style.maxHeight = '0';
                });
                setTimeout(function () {
                    content.classList.add('hidden');
                    content.style.maxHeight = '';
                    content.style.opacity = '';
                }, 300);
                tocToggle.setAttribute('aria-expanded', 'false');
                icon.classList.remove('rotate-180');
            } else {
                content.classList.remove('hidden');
                tocToggle.setAttribute('aria-expanded', 'true');
                icon.classList.add('rotate-180');
                content.style.maxHeight = '0';
                content.style.opacity = '0';
                requestAnimationFrame(function () {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    content.style.opacity = '1';
                });
                setTimeout(function () {
                    content.style.maxHeight = '';
                    content.style.opacity = '';
                }, 300);
            }
        });
    }

    function initMobileMenu() {
        const $menuToggle = $('.mobile-menu-toggle');
        const $mobileMenu = $('#mobile-menu');
        const $overlay = $('#mobile-menu-overlay');
        const $menuClose = $('.mobile-menu-close');

        if (!$menuToggle.length || !$mobileMenu.length) return;

        let previousActiveElement = null;

        function openMenu() {
            previousActiveElement = document.activeElement;
            $menuToggle.attr('aria-expanded', 'true');
            $mobileMenu.attr('aria-hidden', 'false');
            $overlay.addClass('active');
            $('body').addClass('menu-open');

            $mobileMenu.trapFocus($menuToggle[0]);
        }

        function closeMenu() {
            $menuToggle.attr('aria-expanded', 'false');
            $mobileMenu.attr('aria-hidden', 'true');
            $overlay.removeClass('active');
            $('body').removeClass('menu-open');

            $mobileMenu.untrapFocus();

            if (previousActiveElement) {
                previousActiveElement.focus();
            }
        }

        function toggleMenu() {
            const isExpanded = $menuToggle.attr('aria-expanded') === 'true';
            if (isExpanded) {
                closeMenu();
            } else {
                openMenu();
            }
        }

        $menuToggle.on('click', function (e) {
            e.preventDefault();
            toggleMenu();
        });

        $menuClose.on('click', function (e) {
            e.preventDefault();
            closeMenu();
        });

        $overlay.on('click', function () {
            closeMenu();
        });

        $mobileMenu.find('a').on('click', function () {
            closeMenu();
        });

        // Submenu toggle buttons for mobile menu
        (function () {
            const $toggles = $('.menu-toggle');
            if (!$toggles.length) return;

            $toggles.each(function () {
                const $toggle = $(this);

                $toggle.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const $parentLi = $toggle.closest('li');
                    const $submenu = $parentLi.children('.sub-menu');
                    const $icon = $toggle.find('.menu-toggle-icon');

                    if (!$submenu.length) return;

                    const isExpanded = $toggle.attr('aria-expanded') === 'true';

                    if (isExpanded) {
                        $submenu.addClass('hidden');
                        $submenu.attr('aria-hidden', 'true');
                        $toggle.attr('aria-expanded', 'false');
                        if ($icon.length) $icon.removeClass('rotate-180');
                    } else {
                        // Close sibling submenus (accordion)
                        const $siblings = $parentLi.siblings('li.menu-item-has-children');
                        $siblings.each(function () {
                            const $sibToggle = $(this).find('.menu-toggle').first();
                            if (!$sibToggle.length) return;
                            if ($sibToggle.attr('aria-expanded') !== 'true') return;
                            const $sibSub = $(this).children('.sub-menu');
                            const $sibIcon = $sibToggle.find('.menu-toggle-icon');
                            $sibSub.addClass('hidden');
                            $sibSub.attr('aria-hidden', 'true');
                            $sibToggle.attr('aria-expanded', 'false');
                            if ($sibIcon.length) $sibIcon.removeClass('rotate-180');
                        });

                        $submenu.removeClass('hidden');
                        $submenu.attr('aria-hidden', 'false');
                        $toggle.attr('aria-expanded', 'true');
                        if ($icon.length) $icon.addClass('rotate-180');
                    }
                });

                $toggle.on('keydown', function (e) {
                    if (e.key === 'Escape' && $toggle.attr('aria-expanded') === 'true') {
                        e.preventDefault();
                        e.stopPropagation();
                        $toggle.trigger('click');
                        $toggle.focus();
                    }
                });
            });
        })();

        // Dismiss mobile submenus with Escape key when focus is inside
        (function () {
            $mobileMenu.on('keydown.dismissMobileSubmenu', function (e) {
                if (e.key !== 'Escape') return;

                const activeEl = document.activeElement;
                if (!activeEl) return;

                const $activeSubMenu = $(activeEl).closest('.sub-menu');
                if (!$activeSubMenu.length) return;
                if ($activeSubMenu.hasClass('hidden')) return;

                e.preventDefault();
                e.stopPropagation();

                const $parentLi = $activeSubMenu.closest('li.menu-item-has-children');
                if (!$parentLi.length) return;

                const $toggle = $parentLi.find('.menu-toggle').first();
                if (!$toggle.length) return;

                $activeSubMenu.addClass('hidden');
                $activeSubMenu.attr('aria-hidden', 'true');
                $toggle.attr('aria-expanded', 'false');
                const $icon = $toggle.find('.menu-toggle-icon');
                if ($icon.length) $icon.removeClass('rotate-180');
                $toggle.focus();
            });
        })();

        // Initialize submenu aria-hidden on mobile page load
        (function () {
            const $mobileSubmenus = $mobileMenu.find('.sub-menu');
            if (!$mobileSubmenus.length) return;
            $mobileSubmenus.attr('aria-hidden', 'true');
        })();
    }

    function initHeroPageVideo() {
        const section = document.querySelector('.hero-page-video-wrapper');
        if (!section) return;

        const video = section.querySelector('.hero-page-video');
        const playPauseBtn = section.querySelector('.hero-page-play-pause');

        if (!video || !playPauseBtn) return;

        const playImg = playPauseBtn.querySelector('img:first-child');
        const pauseImg = playPauseBtn.querySelector('img:last-child');

        function updateButton(isPlaying) {
            if (isPlaying) {
                playImg.classList.add('hidden');
                pauseImg.classList.remove('hidden');
                playPauseBtn.setAttribute('aria-label', 'Pause video');
            } else {
                playImg.classList.remove('hidden');
                pauseImg.classList.add('hidden');
                playPauseBtn.setAttribute('aria-label', 'Play video');
            }
        }

        playPauseBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (video.paused || video.ended) {
                video.play();
                updateButton(true);
            } else {
                video.pause();
                updateButton(false);
            }
        });

        video.addEventListener('play', function () {
            updateButton(true);
        });

        video.addEventListener('pause', function () {
            updateButton(false);
        });

        video.addEventListener('ended', function () {
            updateButton(false);
        });
    }

    function addProseToElementor() {
        const proseElements = document.querySelectorAll('.elementor-widget-theme-post-content');

        proseElements.forEach(function (element) {
            element.classList.add('prose');
        });
    }

    function initAlternateBgHover() {
        const hoverElements = document.querySelectorAll('[data-hover-bg]');

        hoverElements.forEach(function (el) {
            const hoverBg = el.dataset.hoverBg;

            if (!hoverBg) return;

            el.addEventListener('mouseenter', function () {
                el.style.backgroundColor = hoverBg;
            });

            el.addEventListener('mouseleave', function () {
                el.style.backgroundColor = '';
            });
        });
    }

    function initAccessibleCarousels() {
        if (typeof window.EmblaCarousel === 'undefined') return;

        const carousels = document.querySelectorAll('[data-carousel]');
        if (!carousels.length) return;

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        carousels.forEach(function (carouselEl) {
            const viewport = carouselEl.querySelector('.embla__viewport');
            if (!viewport) return;

            const prevBtn = carouselEl.querySelector('[data-carousel-prev]');
            const nextBtn = carouselEl.querySelector('[data-carousel-next]');
            const playPauseBtn = carouselEl.querySelector('[data-carousel-play-pause]');
            const dots = Array.from(carouselEl.querySelectorAll('[data-carousel-dot]'));
            const liveRegion = carouselEl.querySelector('[data-carousel-live-region]');
            const playIcon = carouselEl.querySelector('.embla__play-icon');
            const pauseIcon = carouselEl.querySelector('.embla__pause-icon');
            const slides = Array.from(carouselEl.querySelectorAll('[data-carousel-slide]'));

            const options = {
                loop: true,
                align: 'start',
            };

            const plugins = [];
            let autoplayPlugin = null;

            const isTestimonialCarousel = carouselEl.classList.contains('mt-6') && carouselEl.classList.contains('md:mt-12');

            if (!prefersReducedMotion && typeof window.EmblaCarouselAutoplay !== 'undefined') {
                autoplayPlugin = window.EmblaCarouselAutoplay({
                    delay: 5000,
                    stopOnInteraction: true,
                    stopOnMouseEnter: false,
                    stopOnFocusIn: !isTestimonialCarousel,
                    playOnInit: true,
                });
                plugins.push(autoplayPlugin);
            }

            const embla = window.EmblaCarousel(viewport, options, plugins);

            function getTotalSlides() {
                return embla.scrollSnapList().length;
            }

            function updateUI() {
                const selected = embla.selectedScrollSnap();
                const total = getTotalSlides();

                // Update dots
                dots.forEach(function (dot, index) {
                    const isActive = index === selected;
                    dot.setAttribute('aria-current', isActive ? 'true' : 'false');
                    if (isActive) {
                        dot.classList.remove('bg-gray-300');
                        dot.classList.add('bg-primary');
                        if (dot.style) dot.style.backgroundColor = 'var(--theme-primary)';
                    } else {
                        dot.classList.add('bg-gray-300');
                        dot.classList.remove('bg-primary');
                        if (dot.style) dot.style.backgroundColor = '';
                    }
                });

                // Update live region
                if (liveRegion) {
                    liveRegion.textContent = 'Slide ' + (selected + 1) + ' of ' + total;
                }

                // Update play/pause button state
                if (playPauseBtn && autoplayPlugin) {
                    const playing = autoplayPlugin.isPlaying();
                    if (playing) {
                        playIcon.classList.add('hidden');
                        pauseIcon.classList.remove('hidden');
                        playPauseBtn.setAttribute('aria-label', 'Pause carousel');
                    } else {
                        playIcon.classList.remove('hidden');
                        pauseIcon.classList.add('hidden');
                        playPauseBtn.setAttribute('aria-label', 'Play carousel');
                    }
                }
            }

            // Prev / Next
            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    embla.scrollPrev();
                    updateUI();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    embla.scrollNext();
                    updateUI();
                });
            }

            // Dots
            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    const index = parseInt(dot.getAttribute('data-index'), 10);
                    embla.scrollTo(index);
                    updateUI();
                });
            });

            // Play / Pause
            if (playPauseBtn && autoplayPlugin) {
                playPauseBtn.addEventListener('click', function () {
                    if (autoplayPlugin.isPlaying()) {
                        autoplayPlugin.stop();
                    } else {
                        autoplayPlugin.play();
                    }
                    updateUI();
                });
            } else if (playPauseBtn) {
                playPauseBtn.setAttribute('disabled', 'true');
                playPauseBtn.setAttribute('aria-hidden', 'true');
                playPauseBtn.classList.add('hidden');
            }

            // Keyboard navigation
            carouselEl.addEventListener('keydown', function (e) {
                const activeEl = document.activeElement;
                if (!activeEl) return;
                const tag = activeEl.tagName.toLowerCase();
                const isEditable = activeEl.isContentEditable || tag === 'input' || tag === 'textarea' || tag === 'select';
                if (isEditable) return;

                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    embla.scrollPrev();
                    updateUI();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    embla.scrollNext();
                    updateUI();
                }
            });

            // Pause on hover / focus (skipped for testimonial carousels)
            if (!isTestimonialCarousel) {
                let wasPlayingOnHover = false;
                let focusInside = false;

                carouselEl.addEventListener('mouseenter', function () {
                    if (autoplayPlugin && autoplayPlugin.isPlaying()) {
                        wasPlayingOnHover = true;
                        autoplayPlugin.stop();
                        updateUI();
                    }
                });

                carouselEl.addEventListener('mouseleave', function () {
                    if (autoplayPlugin && wasPlayingOnHover && !focusInside) {
                        autoplayPlugin.play();
                        wasPlayingOnHover = false;
                        updateUI();
                    }
                });

                carouselEl.addEventListener('focusin', function () {
                    focusInside = true;
                    if (autoplayPlugin && autoplayPlugin.isPlaying()) {
                        wasPlayingOnHover = true;
                        autoplayPlugin.stop();
                        updateUI();
                    }
                });

                carouselEl.addEventListener('focusout', function (e) {
                    if (!carouselEl.contains(e.relatedTarget)) {
                        focusInside = false;
                        if (autoplayPlugin && wasPlayingOnHover) {
                            autoplayPlugin.play();
                            wasPlayingOnHover = false;
                            updateUI();
                        }
                    }
                });
            }

            // On slide change (including auto)
            embla.on('select', updateUI);

            // Initial UI
            updateUI();
        });
    }

    function initToCHighlighter() {
        const section = document.querySelector('[data-section-id="text-with_toc"]');
        if (!section) return;

        const tocNav = section.querySelector('aside nav');
        if (!tocNav) return;

        const tocBox = tocNav.parentElement;
        if (!tocBox) return;
        tocBox.style.position = 'relative';

        // Create highlighter element
        const highlighter = document.createElement('div');
        highlighter.setAttribute('aria-hidden', 'true');
        highlighter.style.cssText = 'position:absolute;left:0;top:0;width:4px;height:24px;background-color:var(--theme-primary);border-radius:9999px;transform:translateY(0);transition:transform 0.3s ease-out,opacity 0.3s ease-out;opacity:0;pointer-events:none;';
        tocBox.appendChild(highlighter);

        const headings = Array.from(section.querySelectorAll('h2[id]'));
        const links = Array.from(tocNav.querySelectorAll('a[href^="#"]'));
        if (!headings.length || !links.length) return;

        const header = document.querySelector('header');
        function getScrollOffset() {
            return (header ? header.offsetHeight : 0) + 24;
        }

        function updateActive() {
            const scrollPos = window.scrollY || window.pageYOffset;
            const offset = getScrollOffset();

            let activeHeading = null;
            for (let i = headings.length - 1; i >= 0; i--) {
                const headingTop = headings[i].getBoundingClientRect().top + scrollPos;
                if (scrollPos + offset >= headingTop) {
                    activeHeading = headings[i];
                    break;
                }
            }

            if (!activeHeading) {
                activeHeading = headings[0];
            }

            if (activeHeading) {
                const id = activeHeading.getAttribute('id');
                const activeLink = tocNav.querySelector('a[href="#' + id + '"]');
                if (activeLink) {
                    const boxRect = tocBox.getBoundingClientRect();
                    const linkRect = activeLink.getBoundingClientRect();
                    const top = linkRect.top - boxRect.top + (linkRect.height / 2) - 12;

                    highlighter.style.transform = 'translateY(' + top + 'px)';
                    highlighter.style.opacity = '1';

                    links.forEach(function (link) {
                        link.classList.remove('font-semibold', 'text-blue-700');
                    });
                    activeLink.classList.add('font-semibold', 'text-blue-700');
                }
            }
        }

        // Smooth scroll on TOC click and move focus to heading
        links.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const target = document.getElementById(targetId);
                if (!target) return;

                const offset = getScrollOffset();
                const top = target.getBoundingClientRect().top + (window.scrollY || window.pageYOffset) - offset;
                window.scrollTo({ top: top, behavior: 'smooth' });

                // Move focus to the heading (set tabindex temporarily if absent)
                const originalTabIndex = target.getAttribute('tabindex');
                if (originalTabIndex === null) {
                    target.setAttribute('tabindex', '-1');
                }
                target.focus({ preventScroll: true });
            });
        });

        window.addEventListener('scroll', updateActive, { passive: true });
        window.addEventListener('resize', updateActive);

        updateActive();
    }

    function initFaqAccordions() {
        const $faqItems = $('[data-faq-item]');
        if (!$faqItems.length) return;

        function closeAccordion($toggle, $content, $icon) {
            $toggle.attr('aria-expanded', 'false');
            $content.attr('aria-hidden', 'true');
            $content.css('display', 'none');
            $content.removeClass('max-h-96 opacity-100').addClass('max-h-0 opacity-0');
            $icon.removeClass('rotate-180');
        }

        function openAccordion($toggle, $content, $icon) {
            $toggle.attr('aria-expanded', 'true');
            $content.attr('aria-hidden', 'false');
            $content.css('display', 'block');
            $content.removeClass('max-h-0 opacity-0').addClass('max-h-96 opacity-100');
            $icon.addClass('rotate-180');
        }

        $faqItems.each(function () {
            const $item = $(this);
            const $toggle = $item.find('.faq-toggle');
            const $content = $item.find('.faq-content');
            const $icon = $item.find('.faq-icon');

            if (!$toggle.length || !$content.length || !$icon.length) return;

            // Ensure initial display state matches collapsed state
            if ($toggle.attr('aria-expanded') !== 'true') {
                $content.css('display', 'none');
            } else {
                $content.css('display', 'block');
            }

            $toggle.on('click', function () {
                const isExpanded = $toggle.attr('aria-expanded') === 'true';

                if (isExpanded) {
                    closeAccordion($toggle, $content, $icon);
                } else {
                    // Close all other accordions first
                    $faqItems.each(function () {
                        const $otherItem = $(this);
                        const $otherToggle = $otherItem.find('.faq-toggle');
                        const $otherContent = $otherItem.find('.faq-content');
                        const $otherIcon = $otherItem.find('.faq-icon');

                        if ($otherToggle.length && $otherToggle.attr('aria-expanded') === 'true') {
                            closeAccordion($otherToggle, $otherContent, $otherIcon);
                        }
                    });

                    openAccordion($toggle, $content, $icon);
                }
            });
        });
    }

})();
