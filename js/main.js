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
        initAccessibleCarousels();

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

        $('.menu-toggle').each(function () {
            const $toggle = $(this);
            $toggle.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const $parentLi = $toggle.closest('li');
                const $submenu = $parentLi.find('.sub-menu');
                const $icon = $toggle.find('.menu-toggle-icon');

                if (!$submenu.length) return;

                const isExpanded = $toggle.attr('aria-expanded') === 'true';

                if (isExpanded) {
                    $submenu.addClass('hidden');
                    $toggle.attr('aria-expanded', 'false');
                    $icon.removeClass('rotate-180');
                } else {
                    $submenu.removeClass('hidden');
                    $toggle.attr('aria-expanded', 'true');
                    $icon.addClass('rotate-180');
                }
            });
        });
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

            if (!prefersReducedMotion && typeof window.EmblaCarouselAutoplay !== 'undefined') {
                autoplayPlugin = window.EmblaCarouselAutoplay({
                    delay: 5000,
                    stopOnInteraction: true,
                    stopOnMouseEnter: false,
                    stopOnFocusIn: true,
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

            function focusCurrentSlide() {
                const idx = embla.selectedScrollSnap();
                if (slides[idx]) {
                    slides[idx].focus();
                }
            }

            // Prev / Next
            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    embla.scrollPrev();
                    updateUI();
                    focusCurrentSlide();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    embla.scrollNext();
                    updateUI();
                    focusCurrentSlide();
                });
            }

            // Dots
            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    const index = parseInt(dot.getAttribute('data-index'), 10);
                    embla.scrollTo(index);
                    updateUI();
                    focusCurrentSlide();
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
                    focusCurrentSlide();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    embla.scrollNext();
                    updateUI();
                    focusCurrentSlide();
                }
            });

            // Pause on hover
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

            // On slide change (including auto)
            embla.on('select', updateUI);

            // Initial UI
            updateUI();
        });
    }
})();
